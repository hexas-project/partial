<?php

namespace App\Support\LoadTest;

use App\Models\Batch;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * "Sob user ek sathe test e click korle koto jon k service dite parbo" — sei
 * proshner uttor ber kore.
 *
 * Kaj ta 4 dhap e hoy, ar dhap gulo alada rakha khub joruri:
 *
 *  0) BASELINE  — ekta matro request, kono chap chara. Ek jon user ekla thakle
 *                 page ta koto ms e ashe. Eta na janle "koto jon ek sathe" hisab
 *                 kora jay na.
 *  1) PREPARE   — protita virtual user login kore session banay. Eta aste aste
 *                 hoy (concurrency kom), karon eta mapa hocche na — ei dhap er
 *                 chap number noshto korbe.
 *  2) BLAST     — SOB user EK-I muhurte target page e hit kore. Ei dhap tai asol
 *                 pariksha: exam suru hole jemon hoy.
 *  3) CLEANUP   — banano temporary batch ar session muche fela hoy.
 *
 * Blast er por hisab (Little's Law):
 *
 *      ek sathe service pacche  =  throughput (req/sec) x baseline (sec)
 *
 * Keno eta thik: 100 ta request er protita 4 second niyeche mane eta noy je
 * server 100 ta ek sathe cholachhe — beshir bhag oi 4 second line e dariye
 * chhilo. Kintu (koto ta sesh hocche prti second) x (ekta request er asol somoy)
 * — eita thik oi shonkha ta dey je koto ta request sotti kore ek sathe kaj
 * korchhilo.
 */
class LoadTestRunner
{
    /** Temporary batch gulo ei prefix niye toiri hoy — cleanup ei prefix dhore. */
    public const SIM_PREFIX = 'LOADTEST';

    /** Login dhape ek sathe koto ta — mapa hocche na tai kom rakha hoy. */
    private const PREPARE_CONCURRENCY = 8;

    private LoadTestState $state;

    /** @var array<int,array<string,mixed>> */
    private array $rows = [];

    /** @var array<string,mixed> */
    private array $snapshot = [];

    private int $seq = 0;

    private float $lastFlush = 0.0;

    /** @var array<int,int> */
    private array $dbConnectedSamples = [];

    /** @var array<int,int> */
    private array $dbRunningSamples = [];

    private ?int $dbIdleConnected = null;

    /** @var list<Batch> */
    private array $createdBatches = [];

    /** Real mode e je asol batch gulote amra login korechi — sesh e restore korte hobe. */
    private array $touchedBatchIds = [];

    private string $cookieDir;

    public function __construct(
        private string $runId,
        private string $baseUrl,
        private string $targetPath,
        private string $targetLabel,
        private int $userCount,
        private string $mode = 'simulated',
        private int $timeout = 60,
    ) {
        $this->state     = new LoadTestState($this->runId);
        $this->baseUrl   = rtrim($this->baseUrl, '/');
        $this->cookieDir = LoadTestState::dir() . DIRECTORY_SEPARATOR . 'cookies-' . $this->runId;
    }

    /**
     * @return array<string,mixed> final snapshot
     */
    public function run(): array
    {
        $this->state->clearStop();

        if (!is_dir($this->cookieDir)) {
            @mkdir($this->cookieDir, 0775, true);
        }

        $this->snapshot = [
            'run_id'     => $this->runId,
            'status'     => 'running',
            'phase'      => 'starting',
            'phase_text' => 'Suru hocche...',
            'started_at' => microtime(true),
            'config'     => [
                'users'        => $this->userCount,
                'target'       => $this->targetPath,
                'target_label' => $this->targetLabel,
                'mode'         => $this->mode,
                'base_url'     => $this->baseUrl,
                'timeout'      => $this->timeout,
            ],
            'server'   => $this->webServerCapacity(),
            'prepared' => 0,
            'prepare_failed' => 0,
            'completed' => 0,
            'ok'        => 0,
            'failed'    => 0,
            'baseline_ms' => null,
            'metrics'   => null,
            'live'      => ['inflight' => 0, 'db_connected' => null, 'db_running' => null],
            'error'     => null,
            'rows'      => [],
        ];

        $this->flush(true);

        try {
            $users = $this->resolveUsers();

            if (count($users) < 1) {
                throw new \RuntimeException('Kono virtual user toiri kora gelo na.');
            }

            // Config e chaowa songkhya theke kom pawa gele row gulo mile jay
            $this->userCount = count($users);
            $this->snapshot['config']['users'] = $this->userCount;

            $this->initRows($users);
            $this->prepareSessions($users);

            if ($this->state->stopRequested()) {
                return $this->finish('cancelled');
            }

            $this->measureBaseline();

            if ($this->state->stopRequested()) {
                return $this->finish('cancelled');
            }

            $this->blast($users);

            return $this->finish($this->state->stopRequested() ? 'cancelled' : 'done');
        } catch (\Throwable $e) {
            $this->snapshot['error'] = $e->getMessage();

            return $this->finish('failed');
        } finally {
            $this->cleanup();
        }
    }

    // ===================================================================
    // Phase: user accounts
    // ===================================================================

    /**
     * Virtual user = ekta login account. Ei software e login hoy Batch er
     * username/password diye, ar ek Batch e ek somoye ek-i session thakte pare
     * (EnsureSingleStudentSession). Tai protita virtual user er alada batch lage
     * — noyto ek e onner session kete debe ar test tai vul hobe.
     *
     * @return list<array{label:string,username:string,password:string,batch_id:int}>
     */
    private function resolveUsers(): array
    {
        $this->setPhase('accounts', 'User account toiri hocche...');

        if ($this->mode === 'real') {
            // Asol batch gulo — ekdom bastob, kintu oi batch e keu logged in
            // thakle se logout hoye jabe. UI te eta warning diye bola ache.
            $batches = Batch::query()
                ->where('exam_name', 'not like', self::SIM_PREFIX . '%')
                ->orderBy('id')
                ->limit($this->userCount)
                ->get();

            $this->touchedBatchIds = $batches->pluck('id')->all();

            return $batches->map(fn (Batch $b) => [
                'label'    => $b->batch_name ?: $b->exam_name,
                'username' => (string) $b->username,
                'password' => (string) $b->password,
                'batch_id' => (int) $b->id,
            ])->all();
        }

        // Simulated: asol data ke chuye na. Test sesh e muche fela hoy.
        $users = [];
        $stamp = $this->runId;

        for ($i = 1; $i <= $this->userCount; $i++) {
            $username = 'lt' . $stamp . str_pad((string) $i, 4, '0', STR_PAD_LEFT);
            $password = 'lt' . $stamp;

            $batch = Batch::create([
                'exam_name'  => self::SIM_PREFIX . '-' . $stamp . '-' . $i,
                'batch_name' => self::SIM_PREFIX . ' VU ' . $i . ' (' . $stamp . ')',
                'type'       => 'Academic',
                'mobile'     => '01700000000',
                'email'      => $username . '@loadtest.invalid',
                'username'   => $username,
                'password'   => $password,
            ]);

            $this->createdBatches[] = $batch;

            $users[] = [
                'label'    => 'Virtual user ' . $i,
                'username' => $username,
                'password' => $password,
                'batch_id' => (int) $batch->id,
            ];

            if ($i % 25 === 0) {
                $this->snapshot['phase_text'] = "User account toiri hocche... ({$i}/{$this->userCount})";
                $this->flush();
            }
        }

        return $users;
    }

    /** @param list<array<string,mixed>> $users */
    private function initRows(array $users): void
    {
        foreach ($users as $i => $u) {
            $this->rows[$i] = [
                'i'          => $i + 1,
                'label'      => $u['label'],
                'username'   => $u['username'],
                'login'      => 'pending',
                'login_ms'   => null,
                'status'     => null,
                'result'     => 'pending',
                'total_ms'   => null,
                'ttfb_ms'    => null,
                'connect_ms' => null,
                'wait_ms'    => null,
                'minutes'    => null,
                'started_ms' => null,
                'ended_ms'   => null,
                'bytes'      => null,
                'error'      => null,
                'seq'        => null,
            ];
        }

        $this->flush(true);
    }

    // ===================================================================
    // Phase: prepare (login)
    // ===================================================================

    /** @param list<array<string,mixed>> $users */
    private function prepareSessions(array $users): void
    {
        $this->setPhase('prepare', 'Session toiri hocche (login)...');

        // Prepare e protita user er 2 ta request lage (login page + login POST).
        // Progress bar er jonno duitakei ekta ganona te dhori — noyto prothom
        // dhap e bar ta thik hoye boshe thake ar mone hoy atke geche.
        $this->snapshot['prepare_progress']       = 0;
        $this->snapshot['prepare_progress_total'] = count($users) * 2;

        // Dhap 1 — login page ana, session cookie ar CSRF token pawar jonno.
        $reqs = [];

        foreach ($users as $i => $u) {
            $reqs[$i] = [
                'url'    => $this->baseUrl . '/exam/login',
                'method' => 'GET',
                'cookie' => $this->cookieFile($i),
                'body'   => true,
            ];
        }

        $tokens = [];
        $page   = $this->parallel($reqs, self::PREPARE_CONCURRENCY, function () {
            $this->snapshot['prepare_progress']++;
            $this->flush();
        });

        foreach ($page as $i => $res) {
            $tokens[$i] = $this->extractToken($res['body'] ?? '');
        }

        // Dhap 2 — asol login POST. force_login=1 dewa hoy jate oi account e
        // purono kono session thakle eta atke na jay.
        $reqs = [];

        foreach ($users as $i => $u) {
            if (empty($tokens[$i])) {
                $this->rows[$i]['login']  = 'failed';
                $this->rows[$i]['result'] = 'skipped';
                $this->rows[$i]['error']  = 'Login page theke CSRF token pawa jay ni (HTTP ' . ($page[$i]['status'] ?? '?') . ')';
                $this->snapshot['prepare_failed']++;

                continue;
            }

            $reqs[$i] = [
                'url'    => $this->baseUrl . '/exam/login',
                'method' => 'POST',
                'cookie' => $this->cookieFile($i),
                'post'   => [
                    '_token'      => $tokens[$i],
                    'username'    => $u['username'],
                    'password'    => $u['password'],
                    'force_login' => '1',
                ],
            ];
        }

        // Protita login sesh hoar sathe sathe-i hisab kori — sob sesh hoar por
        // korle progress bar puro prepare dhap ta jure 0 e boshe thakto.
        $this->parallel($reqs, self::PREPARE_CONCURRENCY, function (int $i, array $res) use ($users) {
            // Login thik hole /exam/dashboard e 302 redirect ashe.
            $ok = ($res['status'] ?? 0) === 302
                && str_contains((string) ($res['location'] ?? ''), '/exam/dashboard');

            if ($ok) {
                $this->rows[$i]['login']    = 'ok';
                $this->rows[$i]['login_ms'] = round((float) $res['total_ms'], 1);
                $this->snapshot['prepared']++;
            } else {
                $this->rows[$i]['login']  = 'failed';
                $this->rows[$i]['result'] = 'skipped';
                $this->rows[$i]['error']  = $res['error']
                    ?: 'Login hoy ni (HTTP ' . ($res['status'] ?? '?') . ')';
                $this->snapshot['prepare_failed']++;
            }

            $this->snapshot['prepare_progress']++;
            $this->snapshot['phase_text'] = 'Session toiri hocche (login)... '
                . $this->snapshot['prepared'] . '/' . count($users);

            $this->flush();
        });

        $this->flush(true);
    }

    // ===================================================================
    // Phase: baseline
    // ===================================================================

    /**
     * Ek jon user ekla hit korle page ta koto ms ney. Duibar kora hoy — prothom
     * bar e blade compile / opcache warm hoy, tai ditiyo ta-i asol number.
     *
     */
    private function measureBaseline(): void
    {
        $this->setPhase('baseline', 'Baseline mapa hocche (ek jon user, kono chap chara)...');

        $i = $this->firstLoggedInIndex();

        if ($i === null) {
            return;
        }

        $req = [0 => [
            'url'    => $this->baseUrl . $this->targetPath,
            'method' => 'GET',
            'cookie' => $this->cookieFile($i),
        ]];

        $last = null;

        for ($attempt = 0; $attempt < 2; $attempt++) {
            $res  = $this->parallel($req, 1);
            $last = $res[0] ?? null;
        }

        if ($last && ($last['status'] ?? 0) === 200) {
            $this->snapshot['baseline_ms'] = round((float) $last['total_ms'], 1);
        }

        $this->flush(true);
    }

    // ===================================================================
    // Phase: blast
    // ===================================================================

    /** @param list<array<string,mixed>> $users */
    private function blast(array $users): void
    {
        $this->setPhase('blast', 'Sob user ek sathe hit korche...');

        // Blast er thik age DB te koto ta connection idle obosthay ache — pore
        // peak theke eta bad dile bojha jay koto ta web worker sotti kaj korlo.
        $this->dbIdleConnected = ServerCapacity::threadsConnected();
        $this->snapshot['live']['db_idle_connected'] = $this->dbIdleConnected;

        $reqs = [];

        foreach ($users as $i => $u) {
            if ($this->rows[$i]['login'] !== 'ok') {
                continue;
            }

            $reqs[$i] = [
                'url'    => $this->baseUrl . $this->targetPath,
                'method' => 'GET',
                'cookie' => $this->cookieFile($i),
                'peek'   => true,   // shudhu ektu body rakhi, purota noy
            ];
        }

        if (empty($reqs)) {
            throw new \RuntimeException('Ekta user o login korte pare ni — blast kora gelo na. Uporer error column dekhun.');
        }

        $this->snapshot['blast_total'] = count($reqs);
        $blastStart = microtime(true);

        // concurrency = sob gulo. Ei ek line-i "aksathe hit" ta ghotay.
        $this->parallel(
            $reqs,
            count($reqs),
            function (int $key, array $res) use ($blastStart) {
                $this->recordBlastResult($key, $res, $blastStart);
            },
            true,
        );

        $wallMs = (microtime(true) - $blastStart) * 1000;

        $this->snapshot['metrics'] = $this->computeMetrics($wallMs);
        $this->flush(true);
    }

    /** @param array<string,mixed> $res */
    private function recordBlastResult(int $key, array $res, float $blastStart): void
    {
        $row = &$this->rows[$key];

        $row['seq']        = ++$this->seq;
        $row['status']     = $res['status'] ?? null;
        $row['total_ms']   = $res['total_ms'] !== null ? round((float) $res['total_ms'], 1) : null;
        $row['ttfb_ms']    = $res['ttfb_ms'] !== null ? round((float) $res['ttfb_ms'], 1) : null;
        $row['connect_ms'] = $res['connect_ms'] !== null ? round((float) $res['connect_ms'], 1) : null;
        $row['bytes']      = $res['bytes'] ?? null;
        $row['started_ms'] = 0.0;
        $row['ended_ms']   = round(($res['finished_at'] - $blastStart) * 1000, 1);
        $row['minutes']    = $row['total_ms'] !== null ? round($row['total_ms'] / 60000, 3) : null;

        $baseline = $this->snapshot['baseline_ms'];

        // Line e koto khon daria chilo = mot somoy - ekla thakle jeto somoy
        $row['wait_ms'] = ($baseline && $row['total_ms'] !== null)
            ? round(max(0, $row['total_ms'] - $baseline), 1)
            : null;

        $status = (int) ($res['status'] ?? 0);

        if ($res['error']) {
            $row['result'] = 'error';
            $row['error']  = $res['error'];
            $this->snapshot['failed']++;
        } elseif ($status === 200) {
            $row['result'] = 'ok';
            $this->snapshot['ok']++;
        } elseif ($status === 302) {
            // Redirect mane middleware take login page e ferot pathiyeche —
            // access pay ni.
            $row['result'] = 'denied';
            $row['error']  = 'Redirect: ' . ($res['location'] ?? 'login page');
            $this->snapshot['failed']++;
        } else {
            $row['result'] = 'http_' . $status;
            $row['error']  = $this->firstLine((string) ($res['body'] ?? '')) ?: ('HTTP ' . $status);
            $this->snapshot['failed']++;
        }

        unset($row);

        $this->snapshot['completed']++;
    }

    // ===================================================================
    // Metrics
    // ===================================================================

    /** @return array<string,mixed> */
    private function computeMetrics(float $wallMs): array
    {
        $durations = [];

        foreach ($this->rows as $row) {
            if ($row['result'] === 'ok' && $row['total_ms'] !== null) {
                $durations[] = (float) $row['total_ms'];
            }
        }

        sort($durations);

        $ok       = count($durations);
        $baseline = (float) ($this->snapshot['baseline_ms'] ?? 0);
        $wallSec  = max($wallMs / 1000, 0.000001);
        $rps      = $ok / $wallSec;

        // ---- Little's Law: ek sathe koto ta sotti kore service pacche ----
        $served = ($baseline > 0) ? ($rps * ($baseline / 1000)) : null;

        $peakConnected = $this->dbConnectedSamples ? max($this->dbConnectedSamples) : null;
        $peakRunning   = $this->dbRunningSamples ? max($this->dbRunningSamples) : null;

        // DB er dik theke dekha worker shonkha: peak theke idle bad.
        $dbObserved = ($peakConnected !== null && $this->dbIdleConnected !== null)
            ? max(0, $peakConnected - $this->dbIdleConnected)
            : null;

        return [
            'wall_ms'    => round($wallMs, 1),
            'ok'         => $ok,
            'failed'     => (int) $this->snapshot['failed'],
            'min_ms'     => $ok ? round($durations[0], 1) : null,
            'avg_ms'     => $ok ? round(array_sum($durations) / $ok, 1) : null,
            'median_ms'  => $this->percentile($durations, 50),
            'p90_ms'     => $this->percentile($durations, 90),
            'p95_ms'     => $this->percentile($durations, 95),
            'max_ms'     => $ok ? round($durations[$ok - 1], 1) : null,
            'rps'        => round($rps, 2),
            'baseline_ms' => $baseline ?: null,

            // Headline: "ek sathe koto jon"
            'served_concurrency' => $served !== null ? round($served, 1) : null,

            // Sobcheye deri kora user koto ta "line" pichone chilo
            'queue_depth' => ($baseline > 0 && $ok)
                ? round($durations[$ok - 1] / $baseline, 1)
                : null,

            'db_peak_connected' => $peakConnected,
            'db_peak_running'   => $peakRunning,
            'db_idle_connected' => $this->dbIdleConnected,
            'db_observed_workers' => $dbObserved,
            'samples'           => count($this->dbConnectedSamples),
        ];
    }

    /** @param list<float> $sorted */
    private function percentile(array $sorted, int $p): ?float
    {
        $n = count($sorted);

        if ($n === 0) {
            return null;
        }

        $idx = (int) ceil(($p / 100) * $n) - 1;

        return round($sorted[max(0, min($n - 1, $idx))], 1);
    }

    // ===================================================================
    // curl_multi engine
    // ===================================================================

    /**
     * Onek gulo request ek sathe chalay.
     *
     * @param  array<int,array<string,mixed>> $requests
     * @param  int  $concurrency  ek sathe koto ta — blast e eta = sob gulo
     * @param  callable|null $onDone  protita sesh hoar sathe sathe dak pore
     * @param  bool $sampleDb  blast er somoy DB er live obostha nite hobe kina
     * @return array<int,array<string,mixed>>
     */
    private function parallel(
        array $requests,
        int $concurrency,
        ?callable $onDone = null,
        bool $sampleDb = false,
    ): array {
        if (empty($requests)) {
            return [];
        }

        $mh = curl_multi_init();

        // Default e curl nijei connection reuse/limit kore. Amra chai protita
        // "user" er nijer alada connection — asol browser jemon kore.
        curl_multi_setopt($mh, CURLMOPT_MAXCONNECTS, max(10, $concurrency));

        if (defined('CURLMOPT_MAX_TOTAL_CONNECTIONS')) {
            // 0 = curl nijer theke kono chhad debe na
            curl_multi_setopt($mh, CURLMOPT_MAX_TOTAL_CONNECTIONS, 0);
        }

        $keys    = array_keys($requests);
        $pending = $keys;
        $active  = [];
        $results = [];
        $started = microtime(true);
        $lastSample = 0.0;

        $add = function () use (&$pending, &$active, $requests, $mh, $concurrency) {
            while (count($active) < $concurrency && !empty($pending)) {
                $key = array_shift($pending);
                $ch  = $this->makeHandle($requests[$key]);

                curl_multi_add_handle($mh, $ch);
                $active[(int) $ch] = ['key' => $key, 'ch' => $ch, 'started_at' => microtime(true)];
            }
        };

        $add();

        do {
            $mrc = curl_multi_exec($mh, $running);

            while ($info = curl_multi_info_read($mh)) {
                if ($info['msg'] !== CURLMSG_DONE) {
                    continue;
                }

                $ch  = $info['handle'];
                $id  = (int) $ch;
                $key = $active[$id]['key'] ?? null;

                if ($key !== null) {
                    $results[$key] = $this->readHandle($ch, $requests[$key], $active[$id]['started_at']);

                    if ($onDone) {
                        $onDone($key, $results[$key]);
                    }

                    unset($active[$id]);
                }

                curl_multi_remove_handle($mh, $ch);
                curl_close($ch);
            }

            $add();

            $now = microtime(true);

            if ($sampleDb && ($now - $lastSample) > 0.1) {
                $lastSample = $now;
                $this->sampleDb();
                $this->snapshot['live']['inflight'] = count($active);
                $this->flush();
            }

            if ($this->state->stopRequested()) {
                break;
            }

            // Timeout er cheye onek beshi somoy gele je kono karone atke ache
            if (($now - $started) > ($this->timeout + 30)) {
                break;
            }

            if ($running > 0 || !empty($pending)) {
                curl_multi_select($mh, 0.05);
            }
        } while ($running > 0 || !empty($active) || !empty($pending));

        // Baki thaka handle gulo bondho kori
        foreach ($active as $id => $slot) {
            curl_multi_remove_handle($mh, $slot['ch']);
            curl_close($slot['ch']);

            $results[$slot['key']] = $this->emptyResult('Cancel/timeout er karone sesh hoy ni');
        }

        curl_multi_close($mh);

        return $results;
    }

    /** @param array<string,mixed> $req */
    private function makeHandle(array $req)
    {
        $ch = curl_init();

        $opts = [
            CURLOPT_URL            => $req['url'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => true,
            CURLOPT_FOLLOWLOCATION => false,   // 302 nijei dekhte chai
            CURLOPT_TIMEOUT        => $this->timeout,
            CURLOPT_CONNECTTIMEOUT => min(15, $this->timeout),
            CURLOPT_FRESH_CONNECT  => true,    // protita user er nijer connection
            CURLOPT_COOKIEFILE     => $req['cookie'],
            CURLOPT_COOKIEJAR      => $req['cookie'],
            CURLOPT_ENCODING       => '',
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_USERAGENT      => 'HexasLoadTest/1.0',
            CURLOPT_HTTPHEADER     => ['Accept: text/html,application/xhtml+xml', 'Connection: close'],
        ];

        if (($req['method'] ?? 'GET') === 'POST') {
            $opts[CURLOPT_POST]       = true;
            $opts[CURLOPT_POSTFIELDS] = http_build_query($req['post'] ?? []);
        }

        curl_setopt_array($ch, $opts);

        return $ch;
    }

    /**
     * @param  array<string,mixed> $req
     * @return array<string,mixed>
     */
    private function readHandle($ch, array $req, float $startedAt): array
    {
        $raw     = curl_multi_getcontent($ch);
        $errno   = curl_errno($ch);
        $error   = $errno ? ('curl(' . $errno . '): ' . curl_error($ch)) : null;
        $info    = curl_getinfo($ch);
        $hdrSize = (int) ($info['header_size'] ?? 0);

        $headers = $raw !== null ? substr((string) $raw, 0, $hdrSize) : '';
        $body    = $raw !== null ? substr((string) $raw, $hdrSize) : '';

        $keepBody = ($req['body'] ?? false) === true;
        $peek     = ($req['peek'] ?? false) === true;

        return [
            'status'      => (int) ($info['http_code'] ?? 0),
            'total_ms'    => isset($info['total_time']) ? $info['total_time'] * 1000 : null,
            'ttfb_ms'     => isset($info['starttransfer_time']) ? $info['starttransfer_time'] * 1000 : null,
            'connect_ms'  => isset($info['connect_time']) ? $info['connect_time'] * 1000 : null,
            'bytes'       => strlen($body),
            'location'    => $this->headerValue($headers, 'location'),
            'body'        => $keepBody ? $body : ($peek ? substr($body, 0, 300) : null),
            'error'       => $error,
            'started_at'  => $startedAt,
            'finished_at' => microtime(true),
        ];
    }

    /** @return array<string,mixed> */
    private function emptyResult(string $error): array
    {
        return [
            'status' => 0, 'total_ms' => null, 'ttfb_ms' => null, 'connect_ms' => null,
            'bytes' => null, 'location' => null, 'body' => null, 'error' => $error,
            'started_at' => microtime(true), 'finished_at' => microtime(true),
        ];
    }

    // ===================================================================
    // Helpers
    // ===================================================================

    /**
     * Worker limit ta ei CLI process er noy — WEB server er dorkar.
     *
     * Ei command chole `cli` SAPI te, kintu student ra hit kore `cli-server` /
     * `fpm-fcgi` te. CLI theke snapshot nile "worker limit: jana jay ni" ashto.
     * Tai controller button chapar somoy web process er snapshot ta state file e
     * likhe rakhe — ekhane sei ta tule ani, shudhu DB angsho ta taja kore nei.
     *
     * @return array<string,mixed>
     */
    private function webServerCapacity(): array
    {
        $existing = $this->state->read();
        $fromWeb  = $existing['server'] ?? null;

        if (is_array($fromWeb) && !empty($fromWeb['workers'])) {
            $fromWeb['database']   = ServerCapacity::database();
            $fromWeb['measured_from'] = 'web (' . ($fromWeb['sapi'] ?? '?') . ')';

            return $fromWeb;
        }

        // Command hate chalale (page theke noy) — CLI er snapshot-i sombol
        $snapshot = ServerCapacity::snapshot();
        $snapshot['measured_from'] = 'cli';

        return $snapshot;
    }

    private function sampleDb(): void
    {
        $connected = ServerCapacity::threadsConnected();
        $running   = ServerCapacity::threadsRunning();

        if ($connected !== null) {
            $this->dbConnectedSamples[] = $connected;
            $this->snapshot['live']['db_connected'] = $connected;
            $this->snapshot['live']['db_peak_connected'] = max($this->dbConnectedSamples);
        }

        if ($running !== null) {
            $this->dbRunningSamples[] = $running;
            $this->snapshot['live']['db_running'] = $running;
        }
    }

    private function cookieFile(int $i): string
    {
        return $this->cookieDir . DIRECTORY_SEPARATOR . 'u' . $i . '.txt';
    }

    private function extractToken(string $html): ?string
    {
        if ($html === '') {
            return null;
        }

        if (preg_match('/name="_token"\s+value="([^"]+)"/', $html, $m)) {
            return $m[1];
        }

        if (preg_match('/name="csrf-token"\s+content="([^"]+)"/', $html, $m)) {
            return $m[1];
        }

        return null;
    }

    private function headerValue(string $headers, string $name): ?string
    {
        if (preg_match('/^' . preg_quote($name, '/') . ':\s*(.+)$/mi', $headers, $m)) {
            return trim($m[1]);
        }

        return null;
    }

    private function firstLine(string $body): ?string
    {
        $text = trim(strip_tags($body));

        if ($text === '') {
            return null;
        }

        return Str::limit(preg_replace('/\s+/', ' ', $text), 120);
    }

    private function firstLoggedInIndex(): ?int
    {
        foreach ($this->rows as $i => $row) {
            if ($row['login'] === 'ok') {
                return $i;
            }
        }

        return null;
    }

    private function setPhase(string $phase, string $text): void
    {
        $this->snapshot['phase']      = $phase;
        $this->snapshot['phase_text'] = $text;
        $this->flush(true);
    }

    /** Beshi ghon ghon disk e likhle seta nijei kaj slow kore — tai throttle. */
    private function flush(bool $force = false): void
    {
        $now = microtime(true);

        if (!$force && ($now - $this->lastFlush) < 0.12) {
            return;
        }

        $this->lastFlush = $now;

        $this->snapshot['rows'] = array_values($this->rows);

        $this->state->write($this->snapshot);
    }

    /** @return array<string,mixed> */
    private function finish(string $status): array
    {
        $this->snapshot['status']   = $status;
        $this->snapshot['phase']    = 'done';
        $this->snapshot['finished_at'] = microtime(true);
        $this->snapshot['phase_text'] = match ($status) {
            'done'      => 'Sesh',
            'cancelled' => 'Bondho kora hoyeche',
            default     => 'Failed',
        };

        $this->snapshot['live']['inflight'] = 0;

        $this->flush(true);

        return $this->snapshot;
    }

    /** Banano batch, session ar cookie file — sob muche fela hoy. */
    private function cleanup(): void
    {
        try {
            if (!empty($this->createdBatches)) {
                $ids     = array_map(fn (Batch $b) => $b->id, $this->createdBatches);
                $tokens  = Batch::whereIn('id', $ids)->pluck('active_session_token')->filter()->all();

                if (!empty($tokens)) {
                    DB::table(config('session.table', 'sessions'))->whereIn('id', $tokens)->delete();
                }

                Batch::whereIn('id', $ids)->delete();
            }

            // Real mode e asol batch muchi na — kintu amader banano session ta
            // rekhe dile oi account ta "onno device e login ache" dekhabe ar
            // asol student atke jabe. Tai session muche token khali kore dei.
            if (!empty($this->touchedBatchIds)) {
                $tokens = Batch::whereIn('id', $this->touchedBatchIds)
                    ->pluck('active_session_token')
                    ->filter()
                    ->all();

                if (!empty($tokens)) {
                    DB::table(config('session.table', 'sessions'))->whereIn('id', $tokens)->delete();
                }

                Batch::whereIn('id', $this->touchedBatchIds)->update(['active_session_token' => null]);
            }
        } catch (\Throwable $e) {
            // Cleanup fail korle o result ta dekhano-i valo
        }

        foreach (glob($this->cookieDir . DIRECTORY_SEPARATOR . '*') ?: [] as $file) {
            @unlink($file);
        }

        @rmdir($this->cookieDir);
    }

    /**
     * Age kono run crash korle je LOADTEST batch gulo pore ache — segulo saf kore.
     */
    public static function purgeStaleSimulatedBatches(): int
    {
        $batches = Batch::where('exam_name', 'like', self::SIM_PREFIX . '-%')->get();

        if ($batches->isEmpty()) {
            return 0;
        }

        $tokens = $batches->pluck('active_session_token')->filter()->all();

        if (!empty($tokens)) {
            DB::table(config('session.table', 'sessions'))->whereIn('id', $tokens)->delete();
        }

        Batch::whereIn('id', $batches->pluck('id'))->delete();

        return $batches->count();
    }
}
