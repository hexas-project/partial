<?php

use App\Models\Batch;
use App\Models\Listining;
use App\Models\Reading;
use App\Models\TestAssignment;
use App\Models\User;
use App\Models\Writing;

/**
 * Dashboard er popup theke asa Student ID nie puro flow ta thik ache kina —
 * autosave -> submit -> result/evaluation page porjonto data (ID soho) thik moto
 * jacce kina, tin ta section er jonnoi.
 */

const SID = 'HX12345678';   // dashboard popup je rokom ID dey (8-12 alphanumeric)

// Asol browser e blade gula X-CSRF-TOKEN pathay. Test e token banano er dorkar nei —
// amra data flow test korchi. Baki middleware (student session check) chalu-i thake.
beforeEach(function () {
    $this->withoutMiddleware(\Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class);
});

function makeBatch(): Batch
{
    return Batch::create([
        'exam_name'  => 'Test Exam 01',
        'batch_name' => 'Batch A',
        'type'       => 'Academic',
        'mobile'     => '01700000000',
        'email'      => 'batch-a@example.com',
        'username'   => '11112222',
        'password'   => '33334444',
    ]);
}

function makeAssignment(Batch $batch, string $category, string $testName): TestAssignment
{
    return TestAssignment::create([
        'batch_id'      => $batch->id,
        'test_id'       => '49',
        'test_name'     => $testName,
        'test_category' => $category,
        'start_date'    => now()->subHour(),
        'closing_date'  => now()->addHours(3),
        'exam_name'     => $batch->exam_name,
        'username'      => $batch->username,
        'password'      => $batch->password,
        'status'        => 'active',
    ]);
}

/** Student login er por session ta jemon thake */
function asStudent(Batch $batch): array
{
    return [
        'student_logged_in'     => true,
        'student_batch_id'      => $batch->id,
        'student_username'      => $batch->username,
        'student_exam_name'     => $batch->exam_name,
        'student_session_token' => 'tok-test',
    ];
}

// ============================== LISTENING ==============================

it('listening: autosave -> submit, ID soho data thik jay', function () {
    $batch = makeBatch();
    $a = makeAssignment($batch, 'Academic_Listening', 'listeningEleven');
    $s = asStudent($batch);

    // --- AUTOSAVE (protita answer alada request e jay, ekhon jemon jay) ---
    foreach ([['1', 'apple'], ['2', 'banana'], ['3', 'cherry']] as [$q, $ans]) {
        $this->withSession($s)->post('/test-autosave', [
            'student_id'      => $batch->id,
            'test_name'       => 'listeningEleven',
            'assignment_id'   => $a->id,
            'question_number' => $q,
            'answer'          => $ans,
        ])->assertOk()->assertJsonPath('status', 'saved');
    }

    $row = Listining::where('assignment_id', $a->id)->first();
    expect($row)->not->toBeNull()
        ->and($row->answers)->toBe([1 => 'apple', 2 => 'banana', 3 => 'cherry'])
        ->and($row->batch_id)->toBe($batch->id)
        ->and($row->exam_name)->toBe('Test Exam 01')
        ->and($row->custom_student_id)->toBeNull();   // submit er age ID bosbe na

    // --- SUBMIT (popup er ID hidden field diye jay) ---
    $this->withSession($s)->post('/test-submit', [
        'student_id'      => $batch->id,
        'test_name'       => 'listeningEleven',
        'assignment_id'   => $a->id,
        'exam_student_id' => SID,
        'q1' => 'apple', 'q2' => 'banana', 'q3' => 'CHANGED',
    ])->assertRedirect(route('listening.test.result', ['testName' => 'listeningEleven']));

    // Autosave er row-tai update hoyeche — duplicate row toiri hoy ni
    expect(Listining::where('assignment_id', $a->id)->count())->toBe(1);

    $row->refresh();
    expect($row->custom_student_id)->toBe(SID)          // popup er ID DB te
        ->and($row->answers[3])->toBe('CHANGED')        // submit er value jite
        ->and($row->answers[1])->toBe('apple')
        ->and($row->assignment_id)->toBe($a->id)
        ->and($row->batch_id)->toBe($batch->id);
});

// ============================== READING ==============================

it('reading: autosave -> submit, ID soho data thik jay', function () {
    $batch = makeBatch();
    $a = makeAssignment($batch, 'Academic_Reading', 'readingClassEleven');
    $s = asStudent($batch);

    foreach ([['1', 'TRUE'], ['2', 'FALSE']] as [$q, $ans]) {
        $this->withSession($s)->post('/reading/autosave', [
            'student_id'      => $batch->id,
            'test_name'       => 'readingClassEleven',
            'assignment_id'   => $a->id,
            'question_number' => $q,
            'answer'          => $ans,
        ])->assertOk();
    }

    $row = Reading::where('assignment_id', $a->id)->first();
    expect($row)->not->toBeNull()
        ->and($row->answers[1])->toBe('TRUE')
        ->and($row->answers[2])->toBe('FALSE');

    $this->withSession($s)->post('/reading/submit', [
        'student_id'      => $batch->id,
        'test_name'       => 'readingClassEleven',
        'assignment_id'   => $a->id,
        'exam_student_id' => SID,
        'q1' => 'TRUE', 'q2' => 'NOT GIVEN', 'q3' => 'FALSE',
    ])->assertRedirect();

    expect(Reading::where('assignment_id', $a->id)->count())->toBe(1);

    $row->refresh();
    expect($row->custom_student_id)->toBe(SID)
        ->and($row->answers[2])->toBe('NOT GIVEN')
        ->and($row->answers[3])->toBe('FALSE')
        ->and($row->batch_id)->toBe($batch->id);
});

// ============================== WRITING ==============================

it('writing: autosave -> submit, ID soho data thik jay', function () {
    $batch = makeBatch();
    $a = makeAssignment($batch, 'Academic_Writing', 'writingTaskTwoCEleven');
    $s = asStudent($batch);

    $this->withSession($s)->post('/writing/autosave', [
        'student_id'    => $batch->id,
        'test_name'     => 'writingTaskTwoCEleven',
        'assignment_id' => $a->id,
        'tasks'         => ['testOne' => 'draft ekhono sesh hoy ni'],
    ])->assertOk();

    $row = Writing::where('assignment_id', $a->id)->first();
    expect($row)->not->toBeNull()
        ->and($row->task['testOne'])->toBe('draft ekhono sesh hoy ni');

    $this->withSession($s)->post('/writing/submit', [
        'student_id'      => $batch->id,
        'test_name'       => 'writingTaskTwoCEleven',
        'assignment_id'   => $a->id,
        'exam_student_id' => SID,
        'redirect_to'     => 'student.dashboard',
        'tasks'           => ['testOne' => 'final essay lekha hoye geche'],
    ])->assertRedirect(route('student.dashboard'));

    expect(Writing::where('assignment_id', $a->id)->count())->toBe(1);

    $row->refresh();
    expect($row->custom_student_id)->toBe(SID)
        ->and($row->task['testOne'])->toBe('final essay lekha hoye geche')
        ->and($row->batch_id)->toBe($batch->id);
});

// ====================== EVALUATION / RESULT PAGE ======================

it('evaluation page e student er ID ar data dekha jay', function () {
    $batch = makeBatch();
    $a = makeAssignment($batch, 'Academic_Listening', 'listeningEleven');
    $s = asStudent($batch);

    $this->withSession($s)->post('/test-autosave', [
        'student_id' => $batch->id, 'test_name' => 'listeningEleven',
        'assignment_id' => $a->id, 'question_number' => '1', 'answer' => 'apple',
    ])->assertOk();

    $this->withSession($s)->post('/test-submit', [
        'student_id' => $batch->id, 'test_name' => 'listeningEleven',
        'assignment_id' => $a->id, 'exam_student_id' => SID, 'q1' => 'apple',
    ])->assertRedirect();

    $row = Listining::where('assignment_id', $a->id)->first();
    expect($row->custom_student_id)->toBe(SID);

    $admin = User::factory()->create(['role' => 1]);

    // Band score list e student er ID dekha jacce
    $this->actingAs($admin)->get('/listening-result-band-scores')
        ->assertOk()
        ->assertSee(SID);

    // Result details page — evaluation ekhan theke-i hoy
    $this->actingAs($admin)
        ->get("/listening-result/{$batch->id}/listeningEleven/{$row->id}")
        ->assertOk()
        ->assertSee(SID);

    $this->actingAs($admin)->get('/evaluation/ielts')->assertOk()->assertSee(SID);
});

it('reading ar writing er result page eo ID pouchay', function () {
    $batch = makeBatch();
    $s = asStudent($batch);

    $ra = makeAssignment($batch, 'Academic_Reading', 'readingClassEleven');
    $this->withSession($s)->post('/reading/submit', [
        'student_id' => $batch->id, 'test_name' => 'readingClassEleven',
        'assignment_id' => $ra->id, 'exam_student_id' => SID, 'q1' => 'TRUE',
    ])->assertRedirect();

    $wa = makeAssignment($batch, 'Academic_Writing', 'writingTaskTwoCEleven');
    $this->withSession($s)->post('/writing/submit', [
        'student_id' => $batch->id, 'test_name' => 'writingTaskTwoCEleven',
        'assignment_id' => $wa->id, 'exam_student_id' => SID,
        'tasks' => ['testOne' => 'essay'],
    ])->assertRedirect();

    // DB te tin tateoi ID poucheche — eta-i asol jinis
    expect(Reading::first()->custom_student_id)->toBe(SID)
        ->and(Writing::first()->custom_student_id)->toBe(SID);

    $admin = User::factory()->create(['role' => 1]);
    $rid = Reading::first()->id;

    $this->actingAs($admin)->get('/reading-result-band-scores')->assertOk()->assertSee(SID);
    $this->actingAs($admin)->get('/writing-results')->assertOk()->assertSee(SID);
    $this->actingAs($admin)
        ->get("/reading-result/{$batch->id}/readingClassEleven/{$rid}")
        ->assertOk()->assertSee(SID);

    // Ei duita page e ID ta dekhano hoy na (purono design, data thik-i ache):
    //   /reading-results   -> query te shudhu student_id, test_name, created_at select kora
    //   /writing-result/.. -> details view e custom_student_id pass kora hoy na
    $this->actingAs($admin)->get('/reading-results')->assertOk();
});

/**
 * PUROONO BUG (amar change er sathe somporko nei):
 * BackendController::listeningResultsList() — line 454-674 — e $attempt,
 * $testName, $student, $wrongCount, $bandScore, $attemptId — 6 ta variable
 * kothao assign-i hoy na. listeningResultDetails() er code copy hoye ekhane
 * theke geche. Fole /listening-results route ta kokhono kaj kore ni.
 * Onno sob result page (band-scores, reading, writing, evaluation) thik ache.
 */
it('BUG: /listening-results route ta bhanga (purono)', function () {
    $admin = User::factory()->create(['role' => 1]);
    $this->actingAs($admin)->get('/listening-results')->assertStatus(500);
})->skip('Purono bug — thik korle ei test ta assertOk() e bodle den');

// ==================== DASHBOARD POPUP ER RULE ====================

it('dashboard popup ar test page er ID rule ek - student atkabe na', function () {
    // Dashboard er rule (dashboard.blade.php er SID_RULE)
    $dashboard = fn ($v) => (bool) preg_match('/^[a-zA-Z0-9]{8,12}$/', $v);

    // Test page gulor ASOL rule, code theke hubohu
    $pages = [
        '42 file'        => fn ($v) => (bool) preg_match('/^[a-zA-Z0-9]{8,}$/', $v),
        '5 file'         => fn ($v) => !(strlen($v) < 8),
        'listeningEight' => fn ($v) => strlen($v) >= 8 && strlen($v) <= 12,
    ];

    foreach (['12345678', 'ABCDEFGH', 'abc12345', '123456789012', 'A1b2C3d4E5f6', SID] as $id) {
        expect($dashboard($id))->toBeTrue("dashboard e '$id' accept howa uchit");
        foreach ($pages as $label => $rule) {
            expect($rule($id))->toBeTrue("'$id' ta $label e-o accept howa uchit - noyto student atke jabe");
        }
    }
});
