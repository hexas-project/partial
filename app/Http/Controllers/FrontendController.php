<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Listining;
use App\Models\Reading;
use App\Models\Reading_result_admin;
use App\Models\Writing;
use App\Models\CourseToggle;
use Illuminate\Support\Facades\Auth;


class FrontendController extends Controller
{
    /**
     * Ek request e ekii assignment barbar DB theke ana hoto — page load e
     * getSavedListeningAnswersFor() ar getClosingTimestamp() duitai alada kore
     * TestAssignment::find() dakto. Ekhon ekbar ene dhore rakha hoy.
     */
    private array $assignmentCache = [];

    private function findAssignment(?int $assignmentId): ?\App\Models\TestAssignment
    {
        if (empty($assignmentId)) {
            return null;
        }

        if (!array_key_exists($assignmentId, $this->assignmentCache)) {
            $this->assignmentCache[$assignmentId] = \App\Models\TestAssignment::find($assignmentId);
        }

        return $this->assignmentCache[$assignmentId];
    }

    public function index()
{
    // Everyone can see the home page with the 3 big buttons
    return view('front_end.index');
}

private function studentAllowed(string $course): bool
{
    $u = auth()->user();
    if ($u && (int)$u->role === 0) { // student only
        $batch = $u->batch;
        return $batch && CourseToggle::isEnabledForBatch($batch, $course);
    }
    return true; // admins/teachers/guests: page content is visible
}

public function listeningIndex()
{
    $allowed = $this->studentAllowed('listening');
    return view('front_end.pages.listening.index', compact('allowed'));
}

public function readingIndex()
{
    $allowed = $this->studentAllowed('reading');
    return view('front_end.pages.reading.index', compact('allowed'));
}

public function writingIndex()
{
    $allowed = $this->studentAllowed('writing');
    return view('front_end.pages.writing.index', compact('allowed'));
}

private function getSavedWritingTasksFor(string $testName, ?int $assignmentId = null): array
{
    $studentId = auth()->id() ?? session('student_batch_id');
    if (!$studentId) return [];

    $assignment = null;
    if (!empty($assignmentId)) {
        $assignment = $this->findAssignment((int) $assignmentId);
        if (!$assignment) return [];

        $now = \Carbon\Carbon::now('Asia/Dhaka');
        if ($assignment->start_date > $now || $assignment->closing_date < $now) return [];
    }

    // LOWER(test_name) column er upor function chilo, tai index kono din kaje
    // lagto na — protibar full table scan hoto. DB collation utf8mb4_unicode_ci
    // (case-insensitive), tai plain where() ekii result dey, kintu index use kore.
    $attemptQuery = Writing::where('student_id', $studentId)
        ->where('test_name', $testName);

    if (!empty($assignmentId)) {
        $attemptQuery->where('assignment_id', $assignmentId);
    }

    $attempt = $attemptQuery->orderByDesc('updated_at')->first();

    if (!$attempt) return [];

    $tasks = $attempt->task;
    if (is_string($tasks)) {
        $tasks = json_decode($tasks, true);
    }
    return is_array($tasks) ? $tasks : [];
}

private function getSavedListeningAnswersFor(string $testName, ?int $assignmentId = null): array
{
    $studentId = auth()->id() ?? session('student_batch_id');
    if (!$studentId) return [];

    $assignment = null;
    if (!empty($assignmentId)) {
        $assignment = $this->findAssignment((int) $assignmentId);
        if (!$assignment) return [];

        $now = \Carbon\Carbon::now('Asia/Dhaka');
        if ($assignment->start_date > $now || $assignment->closing_date < $now) return [];
    }

    // Dekhun getSavedWritingTasksFor() — eki karone LOWER() sorano holo.
    $attemptQuery = Listining::where('student_id', $studentId)
        ->where('test_name', $testName);

    if (!empty($assignmentId)) {
        $attemptQuery->where('assignment_id', $assignmentId);
    }

    $attempt = $attemptQuery->orderByDesc('updated_at')->first();

    $answers = $attempt?->answers ?? [];
    return is_array($answers) ? $answers : [];
}





    // public function index()
    // {
    //     return view('front_end.index');
    // }

    // public function listeningIndex()
    // {
    //     return view('front_end.pages.listening.index');
    // }



    public function speakingIndex()
        {
        
            return view('front_end.pages.speaking.index');
        }
    public function speakingZero()
        {
        
            return view('front_end.pages.speaking.speakingZero');
        }
    public function speakingOne()
        {
        
            return view('front_end.pages.speaking.speakingOne');
        }
    public function speakingTwo()
        {
        
            return view('front_end.pages.speaking.speakingTwo');
        }
    public function speakingThree()
        {
        
            return view('front_end.pages.speaking.speakingThree');
        }




    private function getClosingTimestamp(?int $assignmentId): ?int
    {
        if (empty($assignmentId)) return null;
        $assignment = $this->findAssignment((int) $assignmentId);
        if ($assignment && $assignment->closing_date) {
            return \Carbon\Carbon::parse($assignment->closing_date)->timestamp * 1000;
        }
        return null;
    }

    // assignment er start_date - closing_date er vitore ache kina.
    // getSavedListeningAnswersFor() eki niyom use kore — tai duitai ek shathe mile.
    private function assignmentWindowOpen(?int $assignmentId): bool
    {
        $assignment = $this->findAssignment($assignmentId);
        if (!$assignment) return false;

        $now = \Carbon\Carbon::now('Asia/Dhaka');
        return $assignment->start_date <= $now && $assignment->closing_date >= $now;
    }

    // ---------- SERVER-SIDE RESUME (cross-device / power-loss) ----------
    // localStorage শুধু ওই browser এই থাকে — অন্য PC তে বা current চলে গিয়ে আবার
    // login করলে পাওয়া যায় না। তাই একই remaining_ms + audioTime server এও রাখা হয়।
    //
    // remaining_ms = কত সময় বাকি (deadline নয়)। test থেকে বেরিয়ে থাকলে ঘড়ি থেমে
    // থাকে, তাই ফিরে এসে timer আর audio ঠিক একই জায়গা থেকে শুরু হয়।

    private function resumeStudentId()
    {
        return auth()->id() ?? session('student_batch_id');
    }

    // resumeStudentId() আসলে batch id (batch এর username/password দিয়ে login) এবং
    // assignment_id-ও batch অনুযায়ী — অর্থাৎ এক batch এর সব student এর row এক হয়ে যেত।
    // start modal এ টাইপ করা Student ID-ই একমাত্র per-student পরিচয়, তাই সেটাও key এর অংশ।
    // যেসব page এ start modal নেই সেখানে '' যায় — ওই page গুলোর আচরণ আগের মতোই।
    private function resumeExamStudentId(Request $request)
    {
        $v = $request->input('exam_student_id', $request->query('exam_student_id'));
        $v = preg_replace('/[^a-zA-Z0-9]/', '', (string) $v);
        return substr($v, 0, 64);
    }

    public function saveTestProgress(Request $request)
    {
        $studentId = $this->resumeStudentId();
        $path = $request->input('path');
        if (!$studentId || !$path) {
            return response()->json(['status' => 'skipped']);
        }

        $assignmentId = $request->input('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;

        $remaining = $request->input('remaining_ms');
        $audio     = $request->input('audio_time');

        \App\Models\TestProgress::updateOrCreate(
            [
                'student_id'      => $studentId,
                'path'            => $path,
                'assignment_id'   => $assignmentId,
                'exam_student_id' => $this->resumeExamStudentId($request),
            ],
            [
                'remaining_ms' => is_numeric($remaining) ? max(0, (int) $remaining) : null,
                'audio_time'   => is_numeric($audio) ? (float) $audio : null,
            ]
        );

        return response()->json(['status' => 'saved']);
    }

    public function getTestProgress(Request $request)
    {
        $studentId = $this->resumeStudentId();
        $path = $request->query('path');
        if (!$studentId || !$path) {
            return response()->json((object) []);
        }

        $assignmentId = $request->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;

        // assignment এর closing date পেরিয়ে গেলে resume আর প্রযোজ্য নয়
        $closing = $this->getClosingTimestamp($assignmentId);
        if ($closing && (int) round(microtime(true) * 1000) >= $closing) {
            return response()->json((object) []);
        }

        $row = \App\Models\TestProgress::where('student_id', $studentId)
            ->where('path', $path)
            ->where('assignment_id', $assignmentId)
            ->where('exam_student_id', $this->resumeExamStudentId($request))
            ->first();

        // সময় ফুরিয়ে যাওয়া entry ফেরত দেওয়ার মানে নেই
        if (!$row || !$row->remaining_ms || $row->remaining_ms <= 0) {
            return response()->json((object) []);
        }

        return response()->json([
            'remaining_ms' => (int) $row->remaining_ms,
            'audio_time'   => $row->audio_time !== null ? (float) $row->audio_time : 0,
        ]);
    }

    public function clearTestProgress(Request $request)
    {
        $studentId = $this->resumeStudentId();
        $path = $request->input('path');
        if (!$studentId || !$path) {
            return response()->json(['status' => 'skipped']);
        }

        $assignmentId = $request->input('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;

        \App\Models\TestProgress::where('student_id', $studentId)
            ->where('path', $path)
            ->where('assignment_id', $assignmentId)
            ->where('exam_student_id', $this->resumeExamStudentId($request))
            ->delete();

        return response()->json(['status' => 'cleared']);
    }

    public function listeningOne()
    {
        $testName = 'listeningOne';
        $audioSrc = 'audio/Test-10.mp3';

        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;
        $answers = $this->getSavedListeningAnswersFor($testName, $assignmentId);
        $closingTimestamp = $this->getClosingTimestamp($assignmentId);

        return view('front_end.pages.listening.listeningAll.listeningClassOne', compact('testName', 'audioSrc', 'answers', 'assignmentId', 'closingTimestamp'));
    }
    public function listeningTwo()
    {
        $testName = 'class05-listening';

        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;
        $answers = $this->getSavedListeningAnswersFor($testName, $assignmentId);

        $paper = [
            [
                'tab' => 'part1',
                'title' => 'Part 1',
                'image' => 'images/listening/image1.jpg',
                'questions' => range(1, 10),
            ],
            [
                'tab' => 'part2',
                'title' => 'Part 2',
                'image' => 'images/listening/map-section2.png',
                'questions' => range(11, 20),
            ],
            [
                'tab' => 'part3',
                'title' => 'Part 3',
                'image' => 'images/listening/class11newq.png',
                'questions' => range(21, 30),
            ],
            [
                'tab' => 'part4',
                'title' => 'Part 4',
                'image' => 'images/listening/ss.png',
                'questions' => range(31, 40),
            ],
        ];

        $closingTimestamp = $this->getClosingTimestamp($assignmentId);
        return view('front_end.pages.listening.listeningAll.listeningClassTwo', compact('testName', 'answers', 'paper', 'assignmentId', 'closingTimestamp'));
    }
    public function listeningThree()
    {
        $testName = 'listeningThree';

        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;
        $answers = $this->getSavedListeningAnswersFor($testName, $assignmentId);
        $closingTimestamp = $this->getClosingTimestamp($assignmentId);

        return view('front_end.pages.listening.listeningAll.listeningThree', compact('testName', 'answers', 'assignmentId', 'closingTimestamp'));
    }
    public function listeningFour()
    {
        $testName = 'listeningFour';

        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;
        $answers = $this->getSavedListeningAnswersFor($testName, $assignmentId);
        $closingTimestamp = $this->getClosingTimestamp($assignmentId);

        return view('front_end.pages.listening.listeningAll.listeningFour', compact('testName', 'answers', 'assignmentId', 'closingTimestamp'));
    }
    public function listeningFive()
    {
        $testName = 'listeningFive';

        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;
        $answers = $this->getSavedListeningAnswersFor($testName, $assignmentId);

        // Prepare checkbox selections for questions 11-12, 13-14, 15-16, 27-28, 29-30
        $selected11_12 = array_values(array_filter([
            $answers[11] ?? null,
            $answers[12] ?? null,
        ], fn($v) => $v !== null && $v !== ''));

        $selected13_14 = array_values(array_filter([
            $answers[13] ?? null,
            $answers[14] ?? null,
        ], fn($v) => $v !== null && $v !== ''));

        $selected15_16 = array_values(array_filter([
            $answers[15] ?? null,
            $answers[16] ?? null,
        ], fn($v) => $v !== null && $v !== ''));

        $selected27_28 = array_values(array_filter([
            $answers[27] ?? null,
            $answers[28] ?? null,
        ], fn($v) => $v !== null && $v !== ''));

        $selected29_30 = array_values(array_filter([
            $answers[29] ?? null,
            $answers[30] ?? null,
        ], fn($v) => $v !== null && $v !== ''));

        $closingTimestamp = $this->getClosingTimestamp($assignmentId);
        return view('front_end.pages.listening.listeningAll.listeningFive', compact('testName', 'answers', 'assignmentId', 'closingTimestamp', 'selected11_12', 'selected13_14', 'selected15_16', 'selected27_28', 'selected29_30'));
    }

    public function listeningFourOne()
    {
        $testName = 'listeningFourOne';

        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;
        $answers = $this->getSavedListeningAnswersFor($testName, $assignmentId);
        $closingTimestamp = $this->getClosingTimestamp($assignmentId);

        return view('front_end.pages.listening.listeningAll.listeningFourOne', compact('testName', 'answers', 'assignmentId', 'closingTimestamp'));
    }

    public function listeningSeven()
    {
        $testName = 'listeningSeven';

        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;
        $answers = $this->getSavedListeningAnswersFor($testName, $assignmentId);
        $closingTimestamp = $this->getClosingTimestamp($assignmentId);

        return view('front_end.pages.listening.listeningAll.listeningSeven', compact('testName', 'answers', 'assignmentId', 'closingTimestamp'));
    }

    public function listeningEight()
    {
        $testName = 'listeningEight';

        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;
        $answers = $this->getSavedListeningAnswersFor($testName, $assignmentId);
        $closingTimestamp = $this->getClosingTimestamp($assignmentId);

        return view('front_end.pages.listening.listeningAll.listeningEight', compact('testName', 'answers', 'assignmentId', 'closingTimestamp'));
    }

    public function listeningNine()
    {
        $testName = 'listeningNine';

        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;
        $answers = $this->getSavedListeningAnswersFor($testName, $assignmentId);
        $closingTimestamp = $this->getClosingTimestamp($assignmentId);

        return view('front_end.pages.listening.listeningAll.listeningNine', compact('testName', 'answers', 'assignmentId', 'closingTimestamp'));
    }

    public function listeningTen()
    {
        $testName = 'listeningTen';

        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;
        $answers = $this->getSavedListeningAnswersFor($testName, $assignmentId);
        $closingTimestamp = $this->getClosingTimestamp($assignmentId);

        return view('front_end.pages.listening.listeningAll.listeningTen', compact('testName', 'answers', 'assignmentId', 'closingTimestamp'));
    }

    public function listeningEleven()
    {
        $testName = 'listeningEleven';

        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;
        $answers = $this->getSavedListeningAnswersFor($testName, $assignmentId);
        $closingTimestamp = $this->getClosingTimestamp($assignmentId);

        return view('front_end.pages.listening.listeningAll.listeningEleven', compact('testName', 'answers', 'assignmentId', 'closingTimestamp'));
    }

    public function listeningTwelve()
    {
        $testName = 'listeningTwelve';

        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;
        $answers = $this->getSavedListeningAnswersFor($testName, $assignmentId);
        $closingTimestamp = $this->getClosingTimestamp($assignmentId);

        return view('front_end.pages.listening.listeningAll.listeningTwelve', compact('testName', 'answers', 'assignmentId', 'closingTimestamp'));
    }
 
  
   


    // public function readingIndex()
    // {
    //     return view('front_end.pages.reading.index');
    // }


 
    public function readingOne()
    {
        $testName = 'class18_reading';

        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;

        $studentId = auth()->id() ?? session('student_batch_id');
        $answers = [];

        if ($studentId) {
            $attemptQuery = Reading::where('student_id', $studentId)
                ->where('test_name', $testName);

            if (!empty($assignmentId)) {
                $attemptQuery->where('assignment_id', $assignmentId);
            }

            $attempt = $attemptQuery->first();
            $answers = $attempt?->answers ?? [];
        }

        return view('front_end.pages.reading.readingOther.readingClassOne', compact('testName', 'answers', 'assignmentId'));
    }
    public function readingTwo()
    {
        $testName = 'class19_reading';

        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;

        $studentId = auth()->id() ?? session('student_batch_id');
        $answers = [];

        if ($studentId) {
            $attemptQuery = Reading::where('student_id', $studentId)
                ->where('test_name', $testName);

            if (!empty($assignmentId)) {
                $attemptQuery->where('assignment_id', $assignmentId);
            }

            $attempt = $attemptQuery->first();
            $answers = $attempt?->answers ?? [];
        }

        return view('front_end.pages.reading.readingOther.readingClassTwo', compact('testName', 'answers', 'assignmentId'));
    }
    public function readingThree()
    {
        $testName = 'class20_reading';

        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;

        $studentId = auth()->id() ?? session('student_batch_id');
        $answers = [];

        if ($studentId) {
            $attemptQuery = Reading::where('student_id', $studentId)
                ->where('test_name', $testName);

            if (!empty($assignmentId)) {
                $attemptQuery->where('assignment_id', $assignmentId);
            }

            $attempt = $attemptQuery->first();
            $answers = $attempt?->answers ?? [];
        }

        return view('front_end.pages.reading.readingOther.readingClassThree', compact('testName', 'answers', 'assignmentId'));
    }
    public function readingFour()
    {
        $testName = 'class04_reading';

        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;

        $studentId = auth()->id() ?? session('student_batch_id');
        $answers = [];

        if ($studentId) {
            $attemptQuery = Reading::where('student_id', $studentId)
                ->where('test_name', $testName)
                ->orderBy('created_at', 'desc');

            if (!empty($assignmentId)) {
                $attemptQuery->where('assignment_id', $assignmentId);
            }

            $attempt = $attemptQuery->first();
            $answers = $attempt?->answers ?? [];
        }

        return view('front_end.pages.reading.readingOther.readingClassFour', compact('testName', 'answers', 'assignmentId'));
    }
    public function readingClassFive()
    {
        $testName = 'class05_reading';

        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;

        $studentId = auth()->id() ?? session('student_batch_id');
        $answers = [];

        if ($studentId) {
            $attemptQuery = Reading::where('student_id', $studentId)
                ->where('test_name', $testName)
                ->orderBy('created_at', 'desc');

            if (!empty($assignmentId)) {
                $attemptQuery->where('assignment_id', $assignmentId);
            }

            $attempt = $attemptQuery->first();
            $answers = $attempt?->answers ?? [];
        }

        return view('front_end.pages.reading.readingOther.readingClassFive', compact('testName', 'answers', 'assignmentId'));
    }
    public function readingClassSix()
    {
        $testName = 'class06_reading';
        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;
        $studentId = auth()->id() ?? session('student_batch_id');
        $answers = [];
        if ($studentId) {
            $attemptQuery = Reading::where('student_id', $studentId)->where('test_name', $testName)->orderBy('created_at', 'desc');
            if (!empty($assignmentId)) {$attemptQuery->where('assignment_id', $assignmentId);}
            $attempt = $attemptQuery->first();
            $answers = $attempt?->answers ?? [];
        }
        return view('front_end.pages.reading.readingOther.readingClassSix', compact('testName', 'answers', 'assignmentId'));
    }
    public function readingClassSeven()
    {
        $testName = 'class07_reading';
        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;
        $studentId = auth()->id() ?? session('student_batch_id');
        $answers = [];
        if ($studentId) {
            $attemptQuery = Reading::where('student_id', $studentId)->where('test_name', $testName)->orderBy('created_at', 'desc');
            if (!empty($assignmentId)) {$attemptQuery->where('assignment_id', $assignmentId);}
            $attempt = $attemptQuery->first();
            $answers = $attempt?->answers ?? [];
        }
        return view('front_end.pages.reading.readingOther.readingClassSeven', compact('testName', 'answers', 'assignmentId'));
    }
    public function readingClassEight()
    {
        $testName = 'class08_reading';
        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;
        $studentId = auth()->id() ?? session('student_batch_id');
        $answers = [];
        if ($studentId) {
            $attemptQuery = Reading::where('student_id', $studentId)->where('test_name', $testName)->orderBy('created_at', 'desc');
            if (!empty($assignmentId)) {$attemptQuery->where('assignment_id', $assignmentId);}
            $attempt = $attemptQuery->first();
            $answers = $attempt?->answers ?? [];
        }
        return view('front_end.pages.reading.readingOther.readingClassEight', compact('testName', 'answers', 'assignmentId'));
    }

    public function readingClassNine()
    {
        $testName = 'class09_reading';
        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;
        $studentId = auth()->id() ?? session('student_batch_id');
        $answers = [];
        if ($studentId) {
            $attemptQuery = Reading::where('student_id', $studentId)->where('test_name', $testName)->orderBy('created_at', 'desc');
            if (!empty($assignmentId)) {$attemptQuery->where('assignment_id', $assignmentId);}
            $attempt = $attemptQuery->first();
            $answers = $attempt?->answers ?? [];
        }
        return view('front_end.pages.reading.readingOther.readingClassNine', compact('testName', 'answers', 'assignmentId'));
    }

    public function readingClassTen()
    {
        $testName = 'class10_reading';
        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;
        $studentId = auth()->id() ?? session('student_batch_id');
        $answers = [];
        if ($studentId) {
            $attemptQuery = Reading::where('student_id', $studentId)->where('test_name', $testName)->orderBy('created_at', 'desc');
            if (!empty($assignmentId)) {$attemptQuery->where('assignment_id', $assignmentId);}
            $attempt = $attemptQuery->first();
            $answers = $attempt?->answers ?? [];
        }
        return view('front_end.pages.reading.readingOther.readingClassTen', compact('testName', 'answers', 'assignmentId'));
    }

    public function readingClassEleven()
    {
        $testName = 'class11_reading';
        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;
        $studentId = auth()->id() ?? session('student_batch_id');
        $answers = [];
        if ($studentId) {
            $attemptQuery = Reading::where('student_id', $studentId)->where('test_name', $testName)->orderBy('created_at', 'desc');
            if (!empty($assignmentId)) {$attemptQuery->where('assignment_id', $assignmentId);}
            $attempt = $attemptQuery->first();
            $answers = $attempt?->answers ?? [];
        }
        return view('front_end.pages.reading.readingOther.readingClassEleven', compact('testName', 'answers', 'assignmentId'));
    }

    public function readingClassTwelve()
    {
        $testName = 'class12_reading';
        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;
        $studentId = auth()->id() ?? session('student_batch_id');
        $answers = [];
        if ($studentId) {
            $attemptQuery = Reading::where('student_id', $studentId)->where('test_name', $testName)->orderBy('created_at', 'desc');
            if (!empty($assignmentId)) {$attemptQuery->where('assignment_id', $assignmentId);}
            $attempt = $attemptQuery->first();
            $answers = $attempt?->answers ?? [];
        }
        return view('front_end.pages.reading.readingOther.readingClassTwelve', compact('testName', 'answers', 'assignmentId'));
    }

    public function readingGT()
    {
        return view('front_end.pages.reading.gt');
    }

    public function readingAcademic()
    {
        return view('front_end.pages.reading.academic');
    }

    public function readingGTClassOne()
    {
        $testName = 'gt_class1_reading';

        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;

        $studentId = auth()->id() ?? session('student_batch_id');
        $answers = [];

        if ($studentId) {
            $attemptQuery = Reading::where('student_id', $studentId)
                ->where('test_name', $testName);

            if (!empty($assignmentId)) {
                $attemptQuery->where('assignment_id', $assignmentId);
            }

            $attempt = $attemptQuery->first();
            $answers = $attempt?->answers ?? [];
        }

        return view('front_end.pages.reading.readingOther.readingGTClassOne', compact('testName', 'answers', 'assignmentId'));
    }

    public function readingGTClassTwo()
    {
        $testName = 'gt_class2_reading';

        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;

        $studentId = auth()->id() ?? session('student_batch_id');
        $answers = [];

        if ($studentId) {
            $attemptQuery = Reading::where('student_id', $studentId)
                ->where('test_name', $testName);

            if (!empty($assignmentId)) {
                $attemptQuery->where('assignment_id', $assignmentId);
            }

            $attempt = $attemptQuery->first();
            $answers = $attempt?->answers ?? [];
        }

        return view('front_end.pages.reading.readingOther.readingGTClassTwo', compact('testName', 'answers', 'assignmentId'));
    }

    public function readingGTClassThree()
    {
        $testName = 'gt_class3_reading';

        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;

        $studentId = auth()->id() ?? session('student_batch_id');
        $answers = [];

        if ($studentId) {
            $attemptQuery = Reading::where('student_id', $studentId)
                ->where('test_name', $testName);

            if (!empty($assignmentId)) {
                $attemptQuery->where('assignment_id', $assignmentId);
            }

            $attempt = $attemptQuery->first();
            $answers = $attempt?->answers ?? [];
        }

        return view('front_end.pages.reading.readingOther.readingGTClassThree', compact('testName', 'answers', 'assignmentId'));
    }

    public function readingGTClassFour()
    {
        $testName = 'gt_class4_reading';

        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;

        $studentId = auth()->id() ?? session('student_batch_id');
        $answers = [];

        if ($studentId) {
            $attemptQuery = Reading::where('student_id', $studentId)
                ->where('test_name', $testName);

            if (!empty($assignmentId)) {
                $attemptQuery->where('assignment_id', $assignmentId);
            }

            $attempt = $attemptQuery->first();
            $answers = $attempt?->answers ?? [];
        }

        return view('front_end.pages.reading.readingOther.readingGTClassFour', compact('testName', 'answers', 'assignmentId'));
    }

    public function readingGTClassFive()
    {
        $testName = 'gt_class5_reading';

        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;

        $studentId = auth()->id() ?? session('student_batch_id');
        $answers = [];

        if ($studentId) {
            $attemptQuery = Reading::where('student_id', $studentId)
                ->where('test_name', $testName);

            if (!empty($assignmentId)) {
                $attemptQuery->where('assignment_id', $assignmentId);
            }

            $attempt = $attemptQuery->first();
            $answers = $attempt?->answers ?? [];
        }

        return view('front_end.pages.reading.readingOther.readingGTClassFive', compact('testName', 'answers', 'assignmentId'));
    }

    public function readingGTClassSix()
    {
        $testName = 'gt_class6_reading';

        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;

        $studentId = auth()->id() ?? session('student_batch_id');
        $answers = [];

        if ($studentId) {
            $attemptQuery = Reading::where('student_id', $studentId)
                ->where('test_name', $testName);

            if (!empty($assignmentId)) {
                $attemptQuery->where('assignment_id', $assignmentId);
            }

            $attempt = $attemptQuery->first();
            $answers = $attempt?->answers ?? [];
        }

        return view('front_end.pages.reading.readingOther.readingGTClassSix', compact('testName', 'answers', 'assignmentId'));
    }

    public function readingGTClassSeven()
    {
        $testName = 'class22_reading';

        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;

        $studentId = auth()->id() ?? session('student_batch_id');
        $answers = [];

        if ($studentId) {
            $attemptQuery = Reading::where('student_id', $studentId)
                ->where('test_name', $testName);

            if (!empty($assignmentId)) {
                $attemptQuery->where('assignment_id', $assignmentId);
            }

            $attempt = $attemptQuery->first();
            $answers = $attempt?->answers ?? [];
        }

        return view('front_end.pages.reading.readingOther.readinggtclass7', compact('testName', 'answers', 'assignmentId'));
    }

    // public function writingIndex()
    // {
    //     return view('front_end.pages.writing.index');
    // }
    
    
        public function writingIndexTaskOne()
    {
        return view('front_end.pages.writing.taskOne');
    }

    public function writingIndexTaskTwo()
    {
        return view('front_end.pages.writing.taskTwo');
    }
  
    public function writingTaskOneCOne()
    {
        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;
        $savedTasks = $this->getSavedWritingTasksFor('class1_writing', $assignmentId);
        return view('front_end.pages.writing.writingAll.writingTaskOneOne', compact('savedTasks', 'assignmentId'));
    }
     public function writingTaskOneCTwo()
    {
        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;
        $savedTasks = $this->getSavedWritingTasksFor('class2_writing', $assignmentId);
        return view('front_end.pages.writing.writingAll.writingTaskOneTwo', compact('savedTasks', 'assignmentId'));
    }
    public function writingTaskOneCThree()
    {
        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;
        $savedTasks = $this->getSavedWritingTasksFor('class3_writing', $assignmentId);
        return view('front_end.pages.writing.writingAll.writingTaskOneCThree', compact('savedTasks', 'assignmentId'));
    }
    public function writingTaskOneCFour()
    {
        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;
        $savedTasks = $this->getSavedWritingTasksFor('class4_writing', $assignmentId);
        return view('front_end.pages.writing.writingAll.writingTaskOneCFour', compact('savedTasks', 'assignmentId'));
    }
    public function writingTaskOneCFive()
    {
        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;
        $savedTasks = $this->getSavedWritingTasksFor('class5_writing', $assignmentId);
        return view('front_end.pages.writing.writingAll.writingTaskOneCFive', compact('savedTasks', 'assignmentId'));
    }
    public function writingTaskOneCSix()
    {
        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;
        $savedTasks = $this->getSavedWritingTasksFor('class6_writing', $assignmentId);
        return view('front_end.pages.writing.writingAll.writingTaskOneCSix', compact('savedTasks', 'assignmentId'));
    }
    
     public function writingTaskOneCSeven()
    {
        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;
        $savedTasks = $this->getSavedWritingTasksFor('class7_writing', $assignmentId);
        return view('front_end.pages.writing.writingAll.writingTaskOneCSeven', compact('savedTasks', 'assignmentId'));
    }
    
    public function writingTaskOneCEight()
    {
        return view('front_end.pages.writing.writingAll.writingTaskOneEight');
    }
    public function writingTaskOneCNine()
    {
        return view('front_end.pages.writing.writingAll.writingTaskOneNine');
    }
    
    // writing task two 
    
     public function writingTaskTwoCOne()
    {
        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;
        $savedTasks = $this->getSavedWritingTasksFor('class12_writing', $assignmentId);
        return view('front_end.pages.writing.writingAll.writingTaskTwoOne', compact('savedTasks', 'assignmentId'));
    }
       public function writingTaskTwoCTwo()
    {
        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;
        $savedTasks = $this->getSavedWritingTasksFor('class27_writing', $assignmentId);
        return view('front_end.pages.writing.writingAll.writingTaskTwoTwo', compact('savedTasks', 'assignmentId'));
    }
       public function writingTaskTwoCThree()
    {
        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;
        $savedTasks = $this->getSavedWritingTasksFor('class28_writing', $assignmentId);
        return view('front_end.pages.writing.writingAll.writingTaskTwoThree', compact('savedTasks', 'assignmentId'));
    }
       public function writingTaskTwoCFour()
    {
        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;
        $savedTasks = $this->getSavedWritingTasksFor('class29_writing', $assignmentId);
        return view('front_end.pages.writing.writingAll.writingTaskTwoFour', compact('savedTasks', 'assignmentId'));
    }
       public function writingTaskTwoCFive()
    {
        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;
        $savedTasks = $this->getSavedWritingTasksFor('class30_writing', $assignmentId);
        return view('front_end.pages.writing.writingAll.writingTaskTwoFive', compact('savedTasks', 'assignmentId'));
    }

    public function writingTaskTwoCSix()
    {
        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;
        $savedTasks = $this->getSavedWritingTasksFor('class31_writing', $assignmentId);
        return view('front_end.pages.writing.writingAll.writingTaskTwoSix', compact('savedTasks', 'assignmentId'));
    }

    public function writingTaskTwoCSeven()
    {
        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;
        $savedTasks = $this->getSavedWritingTasksFor('class32_writing', $assignmentId);
        return view('front_end.pages.writing.writingAll.writingTaskTwoSeven', compact('savedTasks', 'assignmentId'));
    }

    public function writingTaskTwoCEight()
    {
        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;
        $savedTasks = $this->getSavedWritingTasksFor('class33_writing', $assignmentId);
        return view('front_end.pages.writing.writingAll.writingTaskTwoEight', compact('savedTasks', 'assignmentId'));
    }

    public function writingTaskTwoCNine()
    {
        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;
        $savedTasks = $this->getSavedWritingTasksFor('class34_writing', $assignmentId);
        return view('front_end.pages.writing.writingAll.writingTaskTwoNine', compact('savedTasks', 'assignmentId'));
    }

    public function writingTaskTwoCTen()
    {
        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;
        $savedTasks = $this->getSavedWritingTasksFor('class35_writing', $assignmentId);
        return view('front_end.pages.writing.writingAll.writingTaskTwoTen', compact('savedTasks', 'assignmentId'));
    }

    public function writingTaskTwoCEleven()
    {
        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;
        $savedTasks = $this->getSavedWritingTasksFor('class36_writing', $assignmentId);
        return view('front_end.pages.writing.writingAll.writingTaskTwoEleven', compact('savedTasks', 'assignmentId'));
    }

    public function writingTaskTwoCTwelve()
    {
        $assignmentId = request()->query('assignment_id');
        $assignmentId = is_numeric($assignmentId) ? (int) $assignmentId : null;
        $savedTasks = $this->getSavedWritingTasksFor('class37_writing', $assignmentId);
        return view('front_end.pages.writing.writingAll.writingTaskTwoTwelve', compact('savedTasks', 'assignmentId'));
    }
    



   
   



// Listening 

public function submitTest(Request $request)
{
    $studentId = $request->input('student_id');
    $testName = $request->input('test_name');
    $examStudentId = $request->input('exam_student_id');
    $assignmentId = $request->input('assignment_id');

    $answers = [];

    // Handle combined questions
    $combinedPerTest = [
               'MapsAndDiagram' => [
            '35-36' => 'q35-36',
            '37-38' => 'q37-38',
            '39-40' => 'q39-40',
        ],
        'MultipulChoiceShortAnswer' => [
            '41-42' => 'q41-42',
            '43-44' => 'q43-44',
            '45-46' => 'q45-46',
        ],
        'FullTest' => [
            '11-12' => 'q11-12',
            '13-14' => 'q13-14',
            
        ],
        'listeningFour' => [
            '5-6' => 'q5-6',
            
            
        ],
        'listeningOne' => [
            '17-18' => 'q17-18',
            '19-20' => 'q19-20',
            '25-26' => 'q25-26',
            '27-28' => 'q27-28',
            '29-30' => 'q29-30',
            
            
        ],
        'class05-listening' => [
            '16-20' => 'q16-20',
            '26-28' => 'q26-28',
                      
        ],
        'listeningThree' => [
            '24-25' => 'q24-25',
           
                      
        ],
        'listeningFourOne' => [
            '28-30' => 'q28-30',
        ],
        'listeningFive' => [
            '11-12' => 'q11-12',
            '13-14' => 'q13-14',
            '15-16' => 'q15-16',
            '27-28' => 'q27-28',
            '29-30' => 'q29-30',
        ],
        'listeningSeven' => [
            '16-20' => 'q16-20',
            '21-25' => 'q21-25',
            '29-30' => 'q29-30',
        ],
        'listeningEight' => [
            '23-24' => 'q23-24',
        ],
        'listeningNine' => [
            '15-16' => 'q15-16',
            '17-18' => 'q17-18',
            '19-20' => 'q19-20',
        ],
        'listeningEleven' => [
            '25-26' => 'q25-26',
            '27-28' => 'q27-28',
            '29-30' => 'q29-30',
        ],
    ];

    $combinedQuestions = $combinedPerTest[$testName] ?? [];

    foreach ($combinedQuestions as $range => $field) {
        $split = explode('-', $range);
        $start = (int)$split[0];
        $end = (int)$split[1];
        $fieldAnswers = $request->input($field, []);

        // If the combined field is not present, fall back to individual q{n} inputs
        // (useful for class05-listening where UI may use q16..q20 instead of q16-20[])
        if (empty($fieldAnswers)) {
            for ($qNum = $start; $qNum <= $end; $qNum++) {
                $ans = $request->input("q$qNum");
                if ($ans !== null) {
                    $answers[$qNum] = $ans;
                }
            }
            continue;
        }

        // Split into individual question numbers
        foreach ($fieldAnswers as $index => $ans) {
            $qNum = $start + $index;
            if ($qNum > $end) break;
            $answers[$qNum] = $ans;
        }
    }

    // Handle regular q1–q40
    for ($i = 1; $i <= 40; $i++) {
        // Skip if in combined
        $skip = false;
        foreach (array_keys($combinedQuestions) as $range) {
            [$start, $end] = explode('-', $range);
            if ($i >= $start && $i <= $end) {
                $skip = true;
                break;
            }
        }
        if ($skip) continue;

        $ans = $request->input("q$i");
        if ($ans !== null) {
            $answers[$i] = $ans;
        }
    }

    // Get batch info from session (stored during student login)
    $batchId = session('student_batch_id');
    $examName = session('student_exam_name');
    
    // Get custom student ID from request (entered in popup modal)
    $customStudentId = $request->input('exam_student_id', '');
    
    // Sort answers by question number to ensure sequential order
    ksort($answers);
    
    // ---------- KON ROW e boshbe ----------
    // Age shudhu custom_student_id NULL row (autosave row) khoja hoto. Kintu ekbar
    // Finish korlei oi row e ID boshe jay — tai assignment er somoy-er vitore resume
    // kore abar Finish korle NULL row ar match korto na, protibar notun row toiri
    // hoto (evaluation list e duplicate).
    //
    // Ekhon age dekha hoy: eki assignment e eki Student ID er row ache kina. Thakle
    // sheta-i update hoy — ek student er ek assignment e ek row-i thake.
    //
    // Closing date periye gele purono row e ar hat deowa hoy na (age jemon chilo
    // temon-i notun row hobe), karon tokhon shikkhok already evaluate kore
    // thakte paren — porer kono attempt jeno ta muche na dey.
    $findAttempt = function (bool $ownRow) use ($studentId, $testName, $assignmentId, $customStudentId) {
        $q = Listining::where('student_id', $studentId)
            ->where('test_name', $testName);

        if (!empty($assignmentId)) {
            $q->where('assignment_id', (int) $assignmentId);
        }

        if ($ownRow) {
            $q->where('custom_student_id', $customStudentId);
        } else {
            $q->whereNull('custom_student_id'); // autosave row
        }

        return $q->orderByDesc('updated_at')->first();
    };

    $attempt = null;
    if (!empty($assignmentId) && $customStudentId !== '' && $this->assignmentWindowOpen((int) $assignmentId)) {
        $attempt = $findAttempt(true);   // eki student er age submit kora row
    }
    if (!$attempt) {
        $attempt = $findAttempt(false);  // autosave row (prothom bar Finish)
    }
    
    if ($attempt) {
        // Update existing autosave record with final submission data
        $attempt->update([
            'answers' => $answers,
            'batch_id' => $batchId,
            'exam_name' => $examName,
            'assignment_id' => !empty($assignmentId) ? (int) $assignmentId : null,
            'custom_student_id' => $customStudentId,
            'updated_at' => now(),
        ]);
    } else {
        Listining::create([
            'student_id' => $studentId,
            'test_name' => $testName,
            'answers' => $answers,
            'batch_id' => $batchId,
            'exam_name' => $examName,
            'assignment_id' => !empty($assignmentId) ? (int) $assignmentId : null,
            'custom_student_id' => $customStudentId,
        ]);
    }

    // Store exam student ID in session for result page
    if ($examStudentId) {
        session(['exam_student_id' => $examStudentId]);
    }

    // Redirect to result page with test name
    return redirect()->route('listening.test.result', ['testName' => $testName]);
}



public function autoSave(Request $request)
{
    $studentId = $request->input('student_id');
    $testName = $request->input('test_name');
    $assignmentId = $request->input('assignment_id');
    $questionNumber = $request->input('question_number');
    $answer = $request->input('answer');


    // Use database transaction with locking to prevent race conditions
    return \DB::transaction(function() use ($studentId, $testName, $assignmentId, $questionNumber, $answer) {
        // Fetch or create attempt with lock
        $query = Listining::where('student_id', $studentId)
            ->where('test_name', $testName);
        
        if (!empty($assignmentId)) {
            $query->where('assignment_id', (int) $assignmentId);
        }
        
        $attempt = $query->lockForUpdate()->first();
        
        if (!$attempt) {
            $attempt = new Listining();
            $attempt->student_id = $studentId;
            $attempt->test_name = $testName;
            if (!empty($assignmentId)) {
                $attempt->assignment_id = (int) $assignmentId;
            }
        }

        $batchId = session('student_batch_id');
        $examName = session('student_exam_name');
        if ($batchId) $attempt->batch_id = $batchId;
        if ($examName) $attempt->exam_name = $examName;
        
        $answers = $attempt->answers ?? [];

    // Handle combined questions like 21-22
    if (preg_match('/(\d+)[-_](\d+)/', $questionNumber, $matches)) {
        $start = (int)$matches[1];
        $end = (int)$matches[2];
        $splitAnswers = array_filter(explode(',', $answer), fn($v) => $v !== '');

        // Clear all questions in range first
        for ($q = $start; $q <= $end; $q++) {
            unset($answers[$q]);
            unset($answers[(string)$q]); // Also clear string key if exists
        }

        // Then set the selected answers with integer keys
        foreach ($splitAnswers as $i => $ans) {
            $q = $start + $i;
            if ($q > $end) break;
            $answers[(int)$q] = $ans;
        }
    } else {
        // Convert numeric question numbers to integers
        $key = is_numeric($questionNumber) ? (int)$questionNumber : $questionNumber;
        $answers[$key] = $answer;
    }

    // Ensure all numeric keys are integers
    $normalizedAnswers = [];
    foreach ($answers as $key => $value) {
        $normalizedKey = is_numeric($key) ? (int)$key : $key;
        $normalizedAnswers[$normalizedKey] = $value;
    }
    
    $attempt->answers = $normalizedAnswers;
    $saved = $attempt->save();


        return response()->json(['status' => 'saved', 'debug' => ['saved' => $saved, 'answers_count' => count($normalizedAnswers)]]);
    });
}


//=============== Reading ==========================



public function readingSubmitTest(Request $request)
{
    $studentId = auth()->id() ?? session('student_batch_id') ?? $request->input('student_id');
    $testName = $request->input('test_name');
    $assignmentId = $request->input('assignment_id');

    $answers = [];

    // Handle combined questions
    $combinedPerTest = [
        'Mcq' => [
            '5-7' => 'q5-7',
        ],
    ];

    $combinedQuestions = $combinedPerTest[$testName] ?? [];

    foreach ($combinedQuestions as $range => $field) {
        [$start, $end] = explode('-', $range);
        $start = (int)$start;
        $end = (int)$end;

        $fieldAnswers = $request->input($field, []);

        foreach ($fieldAnswers as $index => $ans) {
            $qNum = $start + $index;
            if ($qNum > $end) break;
            $answers[$qNum] = $ans;
        }
    }

    // Handle normal questions (1–40)
    for ($i = 1; $i <= 40; $i++) {
        $skip = false;
        foreach (array_keys($combinedQuestions) as $range) {
            [$start, $end] = explode('-', $range);
            if ($i >= $start && $i <= $end) {
                $skip = true;
                break;
            }
        }
        if ($skip) continue;

        $ans = $request->input("q$i");
        
        // Special handling for Questions 1-3: if q1 comes as array, split into separate questions
        if ($i === 1 && is_array($ans)) {
            foreach ($ans as $index => $value) {
                $questionNum = $index + 1; // 1, 2, or 3
                if ($questionNum <= 3 && !empty($value)) {
                    $answers[$questionNum] = $value;
                }
            }
            // Skip questions 2 and 3 since we already handled them
            $i = 3;
            continue;
        }
        
        if ($ans !== null) {
            $answers[$i] = $ans;
        }
    }

    // Get batch info from session
    $batchId = session('student_batch_id');
    $examName = session('student_exam_name');
    
    // Get custom student ID from request
    $customStudentId = $request->input('exam_student_id', '');

    if (!empty($customStudentId)) {
        session(['exam_student_id' => $customStudentId]);
    }

    // Update existing autosave record (same row) or create if none exists
    $key = [
        'student_id' => $studentId,
        'test_name' => $testName,
    ];

    if (!empty($assignmentId)) {
        $key['assignment_id'] = (int) $assignmentId;
    }

    // Get existing record to merge with auto-saved answers
    $existingAttempt = Reading::where($key)->first();
    $existingAnswers = $existingAttempt ? ($existingAttempt->answers ?? []) : [];
    
    // Ensure both are arrays
    if (!is_array($existingAnswers)) {
        $existingAnswers = [];
    }
    
    // Merge: start with existing answers, then override with new form answers
    $mergedAnswers = $existingAnswers;
    foreach ($answers as $qNum => $answer) {
        $mergedAnswers[$qNum] = $answer;
    }

    Reading::updateOrCreate(
        $key,
        [
            'answers' => $mergedAnswers,
            'batch_id' => $batchId,
            'exam_name' => $examName,
            'assignment_id' => !empty($assignmentId) ? (int) $assignmentId : null,
            'custom_student_id' => $customStudentId,
        ]
    );

    return redirect()->route('reading.test.result', ['testName' => $testName]);
}


public function showReadingTestResult($testName)
{
    $studentId = auth()->id() ?? session('student_batch_id');

    $attempt = Reading::where('student_id', $studentId)
        ->where('test_name', $testName)
        ->orderBy('created_at', 'desc')
        ->first();

    if (!$attempt) {
        return redirect()->route('index')->with('error', 'Test attempt not found.');
    }

    $studentAnswers = $attempt->answers;

    $studentAnswers = array_filter($studentAnswers, function($key) {
        return is_numeric($key) && $key >= 1 && $key <= 40;
    }, ARRAY_FILTER_USE_KEY);

    $adminAnswers = Reading_result_admin::where('test_name', $testName)->first();
    $correctAnswers = $adminAnswers ? $adminAnswers->answers : [];

    $totalQuestions = 40;
    $totalAttempted = count($studentAnswers);
    $totalCorrect = 0;

    foreach ($studentAnswers as $qNum => $studentAns) {
        $correctAns = isset($correctAnswers[$qNum]) ? $correctAnswers[$qNum] : '';

        if ($this->isAnswerCorrect($studentAns, $correctAns)) {
            $totalCorrect++;
        }
    }

    $examName = $this->getExamNameFromAssignment($studentId, $testName);

    $questionTypes = $this->getReadingQuestionTypeBreakdown($studentAnswers, $correctAnswers);

    $bandScore = $this->calculateReadingBandScore($totalCorrect, $testName);

    $examStudentId = session('exam_student_id', '');

    $questionDetails = [];
    for ($i = 1; $i <= 40; $i++) {
        $studentAns = isset($studentAnswers[$i]) ? $studentAnswers[$i] : null;
        $correctAns = isset($correctAnswers[$i]) ? $correctAnswers[$i] : '';

        $status = 'unattempted';
        if ($studentAns !== null && $studentAns !== '') {
            if ($this->isAnswerCorrect($studentAns, $correctAns)) {
                $status = 'correct';
            } else {
                $status = 'wrong';
            }
        }

        $questionDetails[] = [
            'number' => $i,
            'student_answer' => $studentAns,
            'correct_answer' => $correctAns,
            'status' => $status
        ];
    }

    return view('front_end.pages.reading.test-result', compact(
        'testName',
        'examName',
        'questionTypes',
        'totalQuestions',
        'totalAttempted',
        'totalCorrect',
        'bandScore',
        'examStudentId',
        'questionDetails'
    ));
}

private function getReadingQuestionTypeBreakdown($studentAnswers, $correctAnswers)
{
    $questionTypes = [];

    $types = [
        [
            'name' => 'Reading : Part 1',
            'range' => [1, 13],
        ],
        [
            'name' => 'Reading : Part 2',
            'range' => [14, 26],
        ],
        [
            'name' => 'Reading : Part 3',
            'range' => [27, 40],
        ],
    ];

    foreach ($types as $type) {
        $start = $type['range'][0];
        $end = $type['range'][1];
        $total = $end - $start + 1;
        $attempted = 0;
        $correct = 0;

        for ($i = $start; $i <= $end; $i++) {
            if (isset($studentAnswers[$i]) && $studentAnswers[$i] !== '' && $studentAnswers[$i] !== null) {
                $attempted++;
                $correctAns = isset($correctAnswers[$i]) ? $correctAnswers[$i] : '';

                if ($this->isAnswerCorrect($studentAnswers[$i], $correctAns)) {
                    $correct++;
                }
            }
        }

        $questionTypes[] = [
            'name' => $type['name'],
            'total' => $total,
            'attempted' => $attempted,
            'correct' => $correct,
        ];
    }

    return $questionTypes;
}

private function calculateReadingBandScore($correctAnswers, $testName = '')
{
    // Determine if it's GT Reading or Academic Reading
    $isGTReading = stripos($testName, 'gt_class') !== false;

    if ($isGTReading) {
        // GT Reading Band Score
        if ($correctAnswers >= 40) return 9.0;
        if ($correctAnswers >= 39) return 8.5;
        if ($correctAnswers >= 37) return 8.0;
        if ($correctAnswers >= 36) return 7.5;
        if ($correctAnswers >= 34) return 7.0;
        if ($correctAnswers >= 32) return 6.5;
        if ($correctAnswers >= 30) return 6.0;
        if ($correctAnswers >= 27) return 5.5;
        if ($correctAnswers >= 23) return 5.0;
        if ($correctAnswers >= 19) return 4.5;
        if ($correctAnswers >= 15) return 4.0;
        if ($correctAnswers >= 12) return 3.5;
        if ($correctAnswers >= 9) return 3.0;
        if ($correctAnswers >= 6) return 2.5;
        if ($correctAnswers >= 4) return 2.0;
        if ($correctAnswers >= 1) return 1.0;
        return 0;
    } else {
        // Academic Reading Band Score
        if ($correctAnswers >= 39) return 9.0;  // 39-40
        if ($correctAnswers >= 37) return 8.5;  // 37-38
        if ($correctAnswers >= 35) return 8.0;  // 35-36
        if ($correctAnswers >= 33) return 7.5;  // 33-34
        if ($correctAnswers >= 30) return 7.0;  // 30-32
        if ($correctAnswers >= 27) return 6.5;  // 27-29
        if ($correctAnswers >= 23) return 6.0;  // 23-26
        if ($correctAnswers >= 19) return 5.5;  // 19-22
        if ($correctAnswers >= 15) return 5.0;  // 15-18
        if ($correctAnswers >= 13) return 4.5;  // 13-14
        if ($correctAnswers >= 10) return 4.0;  // 10-12
        if ($correctAnswers >= 8) return 3.5;   // 8-9
        if ($correctAnswers >= 6) return 3.0;   // 6-7
        if ($correctAnswers >= 4) return 2.5;   // 4-5
        if ($correctAnswers >= 2) return 2.0;   // 2-3
        if ($correctAnswers >= 1) return 1.0;   // 1
        return 0;
    }
}

// auto save like onchagne

public function readingAutoSave(Request $request)
{
    $resolvedStudentId = auth()->id() ?? session('student_batch_id') ?? $request->input('student_id');
    $request->merge(['student_id' => $resolvedStudentId]);

    $data = $request->validate([
        'student_id' => ['required', 'integer'],
        'test_name' => ['required', 'string'],
        'assignment_id' => ['nullable', 'integer'],
        'question_number' => ['required', 'string'],
        'answer' => ['nullable', 'string'],
    ]);

    $studentId = $data['student_id'];
    $testName = $data['test_name'];
    $assignmentId = $data['assignment_id'] ?? null;
    $questionNumber = $data['question_number'];
    $answer = $data['answer'] ?? '';

    $key = [
        'student_id' => $studentId,
        'test_name' => $testName,
    ];

    if (!empty($assignmentId)) {
        $key['assignment_id'] = (int) $assignmentId;
    }

    $attempt = Reading::firstOrNew($key);

    if (!empty($assignmentId)) {
        $attempt->assignment_id = (int) $assignmentId;
    }

    $answers = $attempt->answers ?? [];
    
    // Ensure $answers is an array
    if (!is_array($answers)) {
        $answers = [];
    }

    // Handle multi-part questions like "33_1", "33_2" -> combine into "33"
    if (preg_match('/^(\d+)_(\d+)$/', $questionNumber, $matches)) {
        $baseQuestion = $matches[1];
        $partNumber = (int)$matches[2];
        
        // Get existing combined answer or create new
        $existingAnswer = $answers[$baseQuestion] ?? '';
        $parts = $existingAnswer ? explode(' & ', $existingAnswer) : [];
        
        // Ensure array has enough elements
        while (count($parts) < $partNumber) {
            $parts[] = '';
        }
        
        // Update the specific part (1-indexed)
        $parts[$partNumber - 1] = trim($answer);
        
        // Combine parts with ' & ' separator
        $answers[$baseQuestion] = implode(' & ', $parts);
    }
    // Handle combined range like "38-40"
    elseif (preg_match('/(\d+)[-](\d+)/', $questionNumber, $matches)) {
        $start = (int)$matches[1];
        $end = (int)$matches[2];
        $splitAnswers = explode(',', $answer);

        foreach ($splitAnswers as $i => $ans) {
            $q = $start + $i;
            if ($q > $end) break;
            $answers[$q] = $ans;
        }
    } else {
        $answers[$questionNumber] = $answer;
    }

    $attempt->answers = $answers;
    $attempt->save();

    return response()->json(['status' => 'saved']);
}


// ======================= writing =============================




// public function writingSubmitTest(Request $request)
// {
//     $studentId = $request->input('student_id');
//     $testName = $request->input('test_name'); // must be constant for same test

//     $task = $request->input('task');

//     Writing::updateOrCreate(
//         ['student_id' => $studentId, 'test_name' => $testName],
//         ['task' => $task]
//     );

//     return redirect()->route('index')->with('success', 'Writing test submitted successfully!');
// }

// public function writingAutoSave(Request $request)
// {
//     $studentId = $request->input('student_id');
//     $testName = $request->input('test_name');
//     $task = $request->input('task');

//     // Update previous record or create if not exists
//     Writing::updateOrCreate(
//         ['student_id' => $studentId, 'test_name' => $testName],
//         ['task' => $task]
//     );

//     return response()->json(['status' => 'saved']);
// }


// new 

public function writingSubmitTest(Request $request)
{
    $resolvedStudentId = auth()->id() ?? session('student_batch_id') ?? $request->input('student_id');
    $request->merge(['student_id' => $resolvedStudentId]);

    $data = $request->validate([
        'student_id'      => ['required','integer'],
        'test_name'       => ['required','string'],
        'tasks'           => ['required','array'],
        'tasks.testOne'   => ['nullable','string'],
        'tasks.testTwo'   => ['nullable','string'],
        'tasks.testThree' => ['nullable','string'],
        'tasks.testFour'  => ['nullable','string'],
        'assignment_id'   => ['nullable','integer'],
    ]);

    // Get batch info from session
    $batchId = session('student_batch_id');
    $examName = session('student_exam_name');
    
    // Get custom student ID from request
    $customStudentId = $request->input('exam_student_id', '');
    
    Writing::updateOrCreate(
        [
            'student_id' => $data['student_id'],
            'test_name' => $data['test_name'],
            'assignment_id' => !empty($data['assignment_id']) ? (int) $data['assignment_id'] : null,
        ],
        [
            'task' => $data['tasks'],
            'batch_id' => $batchId,
            'exam_name' => $examName,
            'custom_student_id' => $customStudentId,
        ]
    );

    $redirectTo = $request->input('redirect_to');
    if ($redirectTo === 'student.dashboard') {
        return redirect()->route('student.dashboard')->with('success', 'Writing test submitted successfully!');
    }

    return redirect()->route('index')->with('success', 'Writing test submitted successfully!');
}

public function writingAutoSave(Request $request)
{
    $resolvedStudentId = auth()->id() ?? session('student_batch_id') ?? $request->input('student_id');
    $request->merge(['student_id' => $resolvedStudentId]);

    $data = $request->validate([
        'student_id'      => ['required','integer'],
        'test_name'       => ['required','string'],
        'tasks'           => ['required','array'],
        'tasks.testOne'   => ['nullable','string'],
        'tasks.testTwo'   => ['nullable','string'],
        'tasks.testThree' => ['nullable','string'],
        'tasks.testFour'  => ['nullable','string'],
        'assignment_id'   => ['nullable','integer'],
    ]);

    Writing::updateOrCreate(
        [
            'student_id' => $data['student_id'],
            'test_name' => $data['test_name'],
            'assignment_id' => !empty($data['assignment_id']) ? (int) $data['assignment_id'] : null,
        ],
        ['task' => $data['tasks']]
    );

    return response()->json(['status' => 'saved']);
}


public function showListeningTestResult($testName)
{
    $studentId = auth()->id() ?? session('student_batch_id');
    
    // Get student's latest answers for this test
    $attempt = Listining::where('student_id', $studentId)
        ->where('test_name', $testName)
        ->orderBy('created_at', 'desc')
        ->first();
    
    if (!$attempt) {
        return redirect()->route('index')->with('error', 'Test attempt not found.');
    }
    
    $studentAnswers = $attempt->answers;
    
    // Filter to only include numeric question keys (1-40)
    $studentAnswers = array_filter($studentAnswers, function($key) {
        return is_numeric($key) && $key >= 1 && $key <= 40;
    }, ARRAY_FILTER_USE_KEY);
    
    // Get correct answers from admin
    $adminAnswers = \App\Models\Listening_answer::where('test_name', $testName)->first();
    $correctAnswers = $adminAnswers ? $adminAnswers->answers : [];
    
    // Calculate scores
    $totalQuestions = 40;
    $totalAttempted = count($studentAnswers);
    $totalCorrect = 0;
    
    // Normalize and compare answers (handles / separated alternatives)
    foreach ($studentAnswers as $qNum => $studentAns) {
        $correctAns = isset($correctAnswers[$qNum]) ? $correctAnswers[$qNum] : '';
        
        if ($this->isAnswerCorrect($studentAns, $correctAns)) {
            $totalCorrect++;
        }
    }
    
    // Get exam name from assigned tests
    $examName = $this->getExamNameFromAssignment($studentId, $testName);
    
    // Question type breakdown by test
    $questionTypes = $this->getQuestionTypeBreakdown($testName, $studentAnswers, $correctAnswers);
    
    // Calculate band score (simplified IELTS band calculation)
    $bandScore = $this->calculateBandScore($totalCorrect);
    
    // Get exam student ID from session
    $examStudentId = session('exam_student_id', '');
    
    // Prepare question-wise details for Question-Wise tab
    $questionDetails = [];
    for ($i = 1; $i <= 40; $i++) {
        $studentAns = isset($studentAnswers[$i]) ? $studentAnswers[$i] : null;
        $correctAns = isset($correctAnswers[$i]) ? $correctAnswers[$i] : '';
        
        $status = 'unattempted'; // default
        if ($studentAns !== null && $studentAns !== '') {
            if ($this->isAnswerCorrect($studentAns, $correctAns)) {
                $status = 'correct';
            } else {
                $status = 'wrong';
            }
        }
        
        $questionDetails[] = [
            'number' => $i,
            'student_answer' => $studentAns,
            'correct_answer' => $correctAns,
            'status' => $status
        ];
    }
    
    return view('front_end.pages.listening.test-result', compact(
        'testName',
        'examName',
        'questionTypes',
        'totalQuestions',
        'totalAttempted',
        'totalCorrect',
        'bandScore',
        'examStudentId',
        'questionDetails'
    ));
}

private function normalizeAnswer($text)
{
    // Handle array input (for checkbox answers)
    if (is_array($text)) {
        $text = implode(',', $text);
    }
    
    $text = strtolower($text);
    $text = preg_replace('/\s+/', ' ', $text);
    return trim($text);
}

// Check if student answer matches any alternative answer separated by /
private function isAnswerCorrect($studentAnswer, $correctAnswer)
{
    $normalizedStudent = $this->normalizeAnswer($studentAnswer);
    
    // If correct answer contains /, split and check each alternative
    if (strpos($correctAnswer, '/') !== false) {
        $alternatives = explode('/', $correctAnswer);
        foreach ($alternatives as $alt) {
            $normalizedAlt = $this->normalizeAnswer($alt);
            if ($normalizedStudent === $normalizedAlt && $normalizedAlt !== '') {
                return true;
            }
        }
        return false;
    }
    
    // Simple comparison for answers without /
    $normalizedCorrect = $this->normalizeAnswer($correctAnswer);
    return $normalizedStudent === $normalizedCorrect && $normalizedCorrect !== '';
}

private function getExamNameFromAssignment($studentId, $testName)
{
    // Get batch ID from student record or session
    $batchId = null;
    
    if (auth()->check()) {
        $user = auth()->user();
        $batchId = $user->batch ?? null;
    } else {
        // For student sessions, get batch from student record
        $student = \App\Models\User::find($studentId);
        $batchId = $student ? $student->batch : session('student_batch_id');
    }
    
    // Try to get exam name from assigned tests if batch exists
    if ($batchId) {
        $assignment = \App\Models\TestAssignment::where('test_name', $testName)
            ->where('batch_id', $batchId)
            ->first();
        
        if ($assignment && $assignment->exam_name) {
            return $assignment->exam_name;
        }
    }
    
    // Fallback to formatted test name
    return ucfirst(str_replace(['_', '-'], ' ', $testName));
}

private function getQuestionTypeBreakdown($testName, $studentAnswers, $correctAnswers)
{
    $normalizedTestName = strtolower((string) $testName);

    // Define question type ranges for listening tests (part-wise)
    if (str_contains($normalizedTestName, 'listening')) {
        $types = [
            [
                'name' => 'Listening : Part 1',
                'range' => [1, 10],
            ],
            [
                'name' => 'Listening : Part 2',
                'range' => [11, 20],
            ],
            [
                'name' => 'Listening : Part 3',
                'range' => [21, 30],
            ],
            [
                'name' => 'Listening : Part 4',
                'range' => [31, 40],
            ],
        ];
    } else {
        // Default breakdown for other tests
        $types = [
            [
                'name' => 'Listening : Part 1-4',
                'range' => [1, 40],
            ],
        ];
    }
    
    $questionTypes = [];
    foreach ($types as $type) {
        $start = $type['range'][0];
        $end = $type['range'][1];
        $total = $end - $start + 1;
        $attempted = 0;
        $correct = 0;
        
        for ($i = $start; $i <= $end; $i++) {
            if (isset($studentAnswers[$i]) && $studentAnswers[$i] !== '' && $studentAnswers[$i] !== null) {
                $attempted++;
                $correctAns = isset($correctAnswers[$i]) ? $correctAnswers[$i] : '';
                
                if ($this->isAnswerCorrect($studentAnswers[$i], $correctAns)) {
                    $correct++;
                }
            }
        }
        
        $questionTypes[] = [
            'name' => $type['name'],
            'total' => $total,
            'attempted' => $attempted,
            'correct' => $correct,
        ];
    }
    
    return $questionTypes;
}

private function calculateBandScore($correctAnswers)
{
    // IELTS Listening band score conversion (exact standard)
    if ($correctAnswers >= 39) return 9.0;
    if ($correctAnswers >= 37) return 8.5;
    if ($correctAnswers >= 35) return 8.0;
    if ($correctAnswers >= 32) return 7.5;
    if ($correctAnswers >= 30) return 7.0;
    if ($correctAnswers >= 26) return 6.5;
    if ($correctAnswers >= 23) return 6.0;
    if ($correctAnswers >= 18) return 5.5;
    if ($correctAnswers >= 16) return 5.0;
    if ($correctAnswers >= 13) return 4.5;
    if ($correctAnswers >= 10) return 4.0;
    if ($correctAnswers >= 8) return 3.5;
    if ($correctAnswers >= 6) return 3.0;
    if ($correctAnswers >= 4) return 2.5;
    if ($correctAnswers >= 2) return 2.0;
    if ($correctAnswers >= 1) return 1.0;
    return 0;
}


}
