<?php



namespace App\Http\Controllers;



use App\Models\Listining;

use App\Models\CourseToggle;

use App\Models\Listening_answer;

use App\Models\TestAssignment;

use App\Models\TeacherBatch;

use App\Models\User;

use App\Models\ResultMark;

use Illuminate\Http\Request;

use App\Models\Reading;

use App\Models\Reading_result_admin;

use App\Models\Writing;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;





use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use PDF; 

use Illuminate\Support\Facades\Hash;






class BackendController extends Controller

{

    use AuthorizesRequests;



    // ================ listening page  =========================





    public function listeningAnswer(){

        return view('backend.pages.listening.listening-answer'); 

    }

   



    //=================== register ===============================



public function RegisterUser() {

   

    $users = User::whereIn('role', [0, 1])  

                 ->orderBy('created_at', 'desc')

                 ->paginate(10);



    return view('backend.pages.register.registerStudent', compact('users'));

}



  



    public function RegisterUserCreate(Request $request) {

        $request->validate([

            'name' => 'required|string|max:255',

            'email' => 'required|email|unique:users,email',

            'password' => 'required|string|min:6|confirmed',

            'role' => 'required|in:0,1,2',

            'batch' => 'nullable|string|max:255',

        ]);



        User::create([

            'name' => $request->name,

            'email' => $request->email,

            'password' => Hash::make($request->password),

            'role' => $request->role,

            'batch' => $request->batch,

        ]);



        return redirect()->route('register.user')->with('success', 'User registered successfully.');

    }







    // Update user

    public function update(Request $request, $id)

    {

        $request->validate([

            'name' => 'required|string|max:255',

            'email' => 'required|email|unique:users,email,' . $id,

            'role' => 'required|in:0,1,2',

            'batch' => 'nullable|string|max:255',

        ]);



        $user = User::findOrFail($id);  // Find the user by ID

        $user->update([

            'name' => $request->name,

            'email' => $request->email,

            'role' => $request->role,

            'batch' => $request->batch,

        ]);



        return redirect()->route('register.user')->with('success', 'User updated successfully.');

    }



    // Delete user

    public function destroy($id)

    {

        $user = User::findOrFail($id);  // Find the user by ID

        $user->delete();



        return redirect()->route('register.user')->with('success', 'User deleted successfully.');

    }



    //============= teacher register list ================



public function RegisterTeacherList() {

   

    $users = User::where('role', 2)

                 ->orderBy('created_at', 'desc')

                 ->paginate(10);

    return view('backend.pages.register.teacherList', compact('users'));

}









public function getListeningAnswers($testName)

{

    $answers = Listening_answer::where('test_name', $testName)->first();

    

    if ($answers) {

        return response()->json([

            'success' => true,

            'answers' => $answers->answers

        ]);

    }

    

    return response()->json([

        'success' => false,

        'message' => 'No answers found for this test'

    ]);

}



public function listeningAnswerStore(Request $request)

{

    $request->validate([

        'test_name' => 'required|string',

        'q_numbers' => 'required|array',

        'answers' => 'required|array',

    ]);



    $data = [];

    foreach ($request->q_numbers as $index => $q_number) {

        $data[$q_number] = $request->answers[$index];

    }



    Listening_answer::updateOrCreate(

        ['test_name' => $request->test_name],

        ['answers' => $data]

    );



    return redirect()->back()->with('success', 'Answers saved successfully!');

}





// match listening answer student and admin 



//  Helper: Normalize answer for comparison

    private function normalizeAnswer($text)

    {

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



    //  Check listening result for a student

    public function checkListeningResult($studentId, $testName)

    {

        $studentAnswers = Listining::where('student_id', $studentId)

            ->where('test_name', $testName)

            ->get();



        $correctCount = 0;

        $wrongCount = 0;



        foreach ($studentAnswers as $studentAnswer) {

            $adminAnswer = Listening_answer::where('test_name', $testName)

                ->where('question_number', $studentAnswer->question_number)

                ->first();



            if ($adminAnswer) {

                $correct = $this->normalizeAnswer($adminAnswer->correct_answer);

                $student = $this->normalizeAnswer($studentAnswer->answer);



                if ($correct === $student) {

                    $correctCount++;

                } else {

                    $wrongCount++;

                }

            }

        }



        $total = $correctCount + $wrongCount;



        return view('frontend.pages.listening-result', [

            'correct' => $correctCount,

            'wrong' => $wrongCount,

            'total' => $total,

        ]);

    }





// Listening result list 







public function listeningResultsList(Request $request)

{

    $user = auth()->user();



    if ($user->role == 1) {

        $query = Listining::query();

    } elseif ($user->role == 2) {

        $studentIds = $this->teacherStudentIds($user, $request->get('batch'));

        $query = Listining::whereIn('student_id', $studentIds);

    } else {

        $query = Listining::where('student_id', $user->id);

    }



    if ($request->filled('student_id')) {

        $query->where('custom_student_id', 'like', '%' . $request->student_id . '%');

    }

    if ($request->filled('attempted_date')) {

        $query->whereDate('created_at', $request->attempted_date);

    }

    if ($request->filled('type')) {

        $batchIds = \App\Models\Batch::where('type', $request->type)->pluck('id');

        $query->whereIn('batch_id', $batchIds);

    }



    $submittedTests = $query

        ->with(['student:id,name,batch'])

        ->orderBy('created_at', 'desc')

        ->paginate(20)

        ->withQueryString();



    foreach ($submittedTests as $submission) {

        if ($submission->batch_id) {

            $batch = \App\Models\Batch::find($submission->batch_id);

            if ($batch) {

                $submission->batch_type = $batch->type;

                if (!$submission->exam_name) {

                    $submission->exam_name = $batch->exam_name;

                }

            }

        }



        $assignment = \App\Models\TestAssignment::where('batch_id', $submission->batch_id)

            ->where('test_name', 'LIKE', '%Listening%')

            ->first();



        if ($assignment) {

            $submission->formatted_test_name = $assignment->test_name;

            if (!$submission->batch_type && $assignment->batch) {

                $submission->batch_type = $assignment->batch->type ?? 'N/A';

            }

        } else {

            $submission->formatted_test_name = $submission->test_name;

        }



        if (!isset($submission->batch_type)) {

            $submission->batch_type = '-';

        }

    }



    $myBatches = $user->role == 2 ? $user->batches()->pluck('batch')->unique()->sort()->values() : collect();

    $studentAnswers = $attempt->answers; // associative array

    $admin = Listening_answer::where('test_name', $testName)->first();

    $adminAnswers = collect($admin->answers ?? [])->map(fn($a) => $this->normalizeAnswer($a));



    $resultDetails = [];

    $correctCount = 0;

    $totalQuestions = 0;



    foreach ($studentAnswers as $qNum => $studentAns) {

        // Skip non-numeric keys (like custom_student_id, batch_id, etc.)

        if (!is_numeric($qNum)) {

            continue;

        }

        

        $totalQuestions++; // Count only numeric question keys

        

        $correct = $adminAnswers[$qNum] ?? '';



        $isCorrect = $this->isAnswerCorrect($studentAns, $correct);



        $resultDetails[] = [

            'question_number' => $qNum,

            'student_answer' => $studentAns,

            'correct_answer' => $adminAnswers->get($qNum, ''),

            'is_correct' => $isCorrect,

        ];



        if ($isCorrect) $correctCount++;

    }



    $wrongCount = $totalQuestions - $correctCount;

    $student = User::find($studentId);

    

    // Get custom_student_id from the attempt record

    $customStudentId = $attempt->custom_student_id ?? null;

    

    // If not in attempt, try to get from answers array (legacy support)

    if (empty($customStudentId) && isset($studentAnswers['custom_student_id'])) {

        $customStudentId = $studentAnswers['custom_student_id'];

    }

    

    // Get exam_name from the attempt record

    $examName = $attempt->exam_name ?? null;

    

    // Calculate band score based on correct answers

    $bandScore = $this->calculateListeningBandScore($correctCount);

    

    // Pass attempt ID for PDF export

    $attemptId = $attempt->id;



    return view('backend.pages.listening.result-details', compact('student', 'testName', 'resultDetails', 'correctCount', 'wrongCount', 'customStudentId', 'examName', 'bandScore', 'attemptId'));

}



public function listeningBandScoreResults(Request $request)

{

    $user = auth()->user();



    $selectedDate = $request->input('date');

    if (!$selectedDate) {

        $selectedDate = \Carbon\Carbon::now('Asia/Dhaka')->toDateString();

    }



    $assignmentIdsForDate = TestAssignment::query()

        ->whereDate('start_date', $selectedDate)

        ->where(function ($q) {

            $q->whereRaw('LOWER(test_category) = ?', ['listening'])

                ->orWhereRaw('LOWER(test_name) LIKE ?', ['%listening%']);

        })

        ->pluck('id');



    if ($user->role == 1) {

        $query = Listining::query();

    } elseif ($user->role == 2) {

        $studentIds = $this->teacherStudentIds($user, $request->get('batch'));

        $query = Listining::whereIn('student_id', $studentIds);

    } else {

        $query = Listining::where('student_id', $user->id);

    }



    $query->whereIn('assignment_id', $assignmentIdsForDate);



    if ($request->filled('student_id')) {

        $query->where('custom_student_id', 'like', '%' . $request->student_id . '%');

    }



    $results = $query

        ->orderBy('created_at', 'desc')

        ->get();



    $assignmentsById = TestAssignment::whereIn('id', $results->pluck('assignment_id')->filter()->unique())

        ->get()

        ->keyBy('id');



    foreach ($results as $row) {

        $assignment = $assignmentsById->get($row->assignment_id);

        $row->start_date = $assignment?->start_date;



        $admin = Listening_answer::where('test_name', $row->test_name)->first();

        $adminAnswers = collect($admin->answers ?? [])->map(fn($a) => $this->normalizeAnswer($a));



        $studentAnswers = $row->answers ?? [];

        $correctCount = 0;



        foreach ($studentAnswers as $qNum => $studentAns) {

            if (!is_numeric($qNum)) continue;

            $correct = $adminAnswers[$qNum] ?? '';

            if ($this->isAnswerCorrect($studentAns, $correct)) {

                $correctCount++;

            }

        }



        $row->band_score = $this->calculateListeningBandScore($correctCount);

    }



    $groupedResults = $results

        ->sortBy(fn($r) => $r->start_date?->timestamp ?? 0)

        ->groupBy(function ($r) {

            return $r->start_date ? $r->start_date->format('Y-m-d H:i') : 'N/A';

        });



    return view('backend.pages.listening.result', compact('groupedResults', 'selectedDate'));

}



public function exportListeningBandScorePDF(Request $request)

{

    $user = auth()->user();



    $selectedDate = $request->input('date');

    if (!$selectedDate) {

        $selectedDate = \Carbon\Carbon::now('Asia/Dhaka')->toDateString();

    }



    $requestedStart = $request->input('start', 'N/A');



    $assignmentIdsForDate = TestAssignment::query()

        ->whereDate('start_date', $selectedDate)

        ->where(function ($q) {

            $q->whereRaw('LOWER(test_category) = ?', ['listening'])

                ->orWhereRaw('LOWER(test_name) LIKE ?', ['%listening%']);

        })

        ->pluck('id');



    if ($user->role == 1) {

        $query = Listining::query();

    } elseif ($user->role == 2) {

        $studentIds = $this->teacherStudentIds($user, $request->get('batch'));

        $query = Listining::whereIn('student_id', $studentIds);

    } else {

        $query = Listining::where('student_id', $user->id);

    }



    $query->whereIn('assignment_id', $assignmentIdsForDate);



    if ($request->filled('student_id')) {

        $query->where('custom_student_id', 'like', '%' . $request->student_id . '%');

    }



    $results = $query

        ->orderBy('created_at', 'desc')

        ->get();



    $assignmentsById = TestAssignment::whereIn('id', $results->pluck('assignment_id')->filter()->unique())

        ->get()

        ->keyBy('id');



    foreach ($results as $row) {

        $assignment = $assignmentsById->get($row->assignment_id);

        $row->start_date = $assignment?->start_date;



        $admin = Listening_answer::where('test_name', $row->test_name)->first();

        $adminAnswers = collect($admin->answers ?? [])->map(fn($a) => $this->normalizeAnswer($a));



        $studentAnswers = $row->answers ?? [];

        $correctCount = 0;



        foreach ($studentAnswers as $qNum => $studentAns) {

            if (!is_numeric($qNum)) continue;

            $correct = $adminAnswers[$qNum] ?? '';

            if ($this->isAnswerCorrect($studentAns, $correct)) {

                $correctCount++;

            }

        }



        $row->band_score = $this->calculateListeningBandScore($correctCount);

    }



    $groupedResults = $results

        ->sortBy(fn($r) => $r->start_date?->timestamp ?? 0)

        ->groupBy(function ($r) {

            return $r->start_date ? $r->start_date->format('Y-m-d H:i') : 'N/A';

        });



    $rows = $groupedResults->get($requestedStart, collect());



    $displayStartTime = $requestedStart === 'N/A'

        ? 'N/A'

        : \Carbon\Carbon::parse($requestedStart)->format('M d, Y h:i A');



    $attemptedDateTime = str_replace([':', ' '], ['-', '_'], (string) $displayStartTime);

    $filename = 'listening_band_scores_' . $attemptedDateTime . '.pdf';



    $pdf = PDF::loadView('backend.pages.listening.band-score-group-pdf', [

        'selectedDate' => $selectedDate,

        'displayStartTime' => $displayStartTime,

        'rows' => $rows,

    ]);



    return $pdf->download($filename);

}



public function listeningResultDetails($studentId, $testName, $submissionId = null)

{

    $user = auth()->user();

    if ($user->role == 2) $this->ensureTeacherCanSeeStudent($user, (int) $studentId);

    elseif ($user->role != 1 && (int) $user->id != (int) $studentId) abort(403);



    $attemptQuery = Listining::where('student_id', (int) $studentId)

        ->whereRaw('LOWER(test_name) = ?', [strtolower((string) $testName)]);



    if (!empty($submissionId)) {

        $attemptQuery->where('id', (int) $submissionId);

    }



    $attempt = $attemptQuery->orderByDesc('id')->first();

    abort_if(!$attempt, 404, 'Listening attempt not found.');



    $studentAnswers = $attempt->answers ?? [];

    $admin = Listening_answer::whereRaw('LOWER(test_name) = ?', [strtolower((string) $testName)])->first();

    $adminAnswers = collect($admin->answers ?? [])->map(fn($a) => $this->normalizeAnswer($a));



    $resultDetails = [];

    $correctCount = 0;

    $totalQuestions = 0;



    foreach ($studentAnswers as $qNum => $studentAns) {

        if (!is_numeric($qNum)) {

            continue;

        }



        $totalQuestions++;



        $correct = $adminAnswers[$qNum] ?? '';

        $isCorrect = $this->isAnswerCorrect($studentAns, $correct);



        $resultDetails[] = [

            'question_number' => $qNum,

            'student_answer' => $studentAns,

            'correct_answer' => $adminAnswers->get($qNum, ''),

            'is_correct' => $isCorrect,

        ];



        if ($isCorrect) $correctCount++;

    }



    $wrongCount = $totalQuestions - $correctCount;

    $student = User::find($studentId);



    $customStudentId = $attempt->custom_student_id ?? null;

    if (empty($customStudentId) && isset($studentAnswers['custom_student_id'])) {

        $customStudentId = $studentAnswers['custom_student_id'];

    }



    $examName = $attempt->exam_name ?? null;

    $bandScore = $this->calculateListeningBandScore($correctCount);

    $attemptId = $attempt->id;



    return view('backend.pages.listening.result-details', compact('student', 'testName', 'resultDetails', 'correctCount', 'wrongCount', 'customStudentId', 'examName', 'bandScore', 'attemptId'));

}







// pdf create for listening





public function exportResultPDF($testName, $submissionId)

{

    $attempt = Listining::where('id', $submissionId)

        ->whereRaw('LOWER(test_name) = ?', [strtolower($testName)])

        ->first();



    if (!$attempt) {

        abort(404, 'Student attempt not found.');

    }



    $studentId = (int) $attempt->student_id;



    $user = auth()->user();

    if ($user->role == 2) $this->ensureTeacherCanSeeStudent($user, $studentId);

    elseif ($user->role != 1 && (int) $user->id != $studentId) abort(403);



    $studentAnswers = $attempt->answers ?? [];

    $admin = Listening_answer::whereRaw('LOWER(test_name) = ?', [strtolower($testName)])->first();

    $adminAnswers = collect($admin->answers ?? []);



    $resultDetails = [];

    $correctCount = 0;

    $totalQuestions = 0;



    foreach ($studentAnswers as $qNum => $studentAns) {

        // Skip non-numeric keys (like custom_student_id, batch_id, etc.)

        if (!is_numeric($qNum)) {

            continue;

        }

        

        $totalQuestions++;

        

        $correctAns = $adminAnswers[$qNum] ?? '';

        $isCorrect = $this->isAnswerCorrect($studentAns, $correctAns);



        $resultDetails[] = [

            'question_number' => $qNum,

            'student_answer' => $studentAns,

            'correct_answer' => $correctAns,

            'is_correct' => $isCorrect,

        ];



        if ($isCorrect) $correctCount++;

    }



    $wrongCount = $totalQuestions - $correctCount;

    $student = User::find($studentId);

    

    // Calculate band score

    $bandScore = $this->calculateListeningBandScore($correctCount);

    

    // Get custom_student_id and attempted_date from the attempt record

    $customStudentId = $attempt->custom_student_id ?? 'student';

    $examName = $attempt->exam_name ?? 'result';



    $assignment = null;

    if (!empty($attempt->assignment_id)) {

        $assignment = \App\Models\TestAssignment::find((int) $attempt->assignment_id);

    }



    if (!$assignment && !empty($attempt->batch_id)) {

        $assignment = \App\Models\TestAssignment::where('batch_id', $attempt->batch_id)

            ->where('test_name', 'LIKE', '%Listening%')

            ->orderByDesc('start_date')

            ->first();

    }



    $startDate = $assignment?->start_date;

    $attemptedDateTime = $startDate

        ? $startDate->format('M_d_Y_h-iA')

        : (($attempt->created_at ? $attempt->created_at->format('M_d_Y_h-iA') : now()->format('M_d_Y_h-iA')));

    

    // Replace spaces with underscores for valid filename

    $cleanStudentId = str_replace(' ', '_', $customStudentId);

    $cleanStudentId = preg_replace('/[^A-Za-z0-9_\-]/', '', (string) $cleanStudentId);

    

    // Create filename: studentid_attempteddate.pdf

    $filename = $cleanStudentId . '_' . $attemptedDateTime . '.pdf';



    $pdf = PDF::loadView('backend.pages.listening.result-details-pdf', compact(

        'student', 'testName', 'resultDetails', 'correctCount', 'wrongCount', 'customStudentId', 'examName', 'bandScore'

    ));



    return $pdf->download($filename);

}







// ============================== Reading page =====================================





public function readingAnswer()

{

    return view('backend.pages.reading.reading-answer');

}





public function getReadingAnswers($testName)

{

    $answers = Reading_result_admin::where('test_name', $testName)->first();



    if ($answers) {

        return response()->json([

            'success' => true,

            'answers' => $answers->answers,

        ]);

    }



    return response()->json([

        'success' => false,

        'message' => 'No answers found for this test',

    ]);

}









public function readingAnswerStore(Request $request)

{

    $request->validate([

        'test_name' => 'required|string',

        'q_numbers' => 'required|array',

        'answers' => 'required|array',

    ]);



    $answers = [];

    foreach ($request->q_numbers as $index => $q_number) {

        $answers[$q_number] = $request->answers[$index];

    }



    Reading_result_admin::updateOrCreate(

        ['test_name' => $request->test_name],

        ['answers' => $answers]

    );



    return redirect()->back()->with('success', 'Reading answers saved successfully!');

}









//  Normalize helper (same as listening)

private function normalizeAnswerReading($text)

{

    $text = strtolower($text);

    $text = preg_replace('/\s+/', ' ', $text);

    return trim($text);

}



private function isAnswerCorrectReading($studentAnswer, $correctAnswer)

{

    $normalizedStudent = $this->normalizeAnswerReading($studentAnswer);

    $normalizedStudent = trim($normalizedStudent);

    if ($normalizedStudent === '') return false;



    $correctAnswer = (string) $correctAnswer;

    if (strpos($correctAnswer, '/') !== false) {

        $alternatives = explode('/', $correctAnswer);

        foreach ($alternatives as $alt) {

            $normalizedAlt = $this->normalizeAnswerReading($alt);

            if ($normalizedAlt !== '' && $normalizedStudent === $normalizedAlt) {

                return true;

            }

        }

        return false;

    }



    $normalizedCorrect = $this->normalizeAnswerReading($correctAnswer);

    return $normalizedCorrect !== '' && $normalizedStudent === $normalizedCorrect;

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
        if ($correctAnswers >= 8)  return 3.5;  // 8-9
        if ($correctAnswers >= 6)  return 3.0;  // 6-7
        if ($correctAnswers >= 4)  return 2.5;  // 4-5
        if ($correctAnswers >= 2)  return 2.0;  // 2-3
        if ($correctAnswers >= 1)  return 1.0;  // 1
        return 0;
    }

}



//  Reading Result list 







public function readingResultsList(Request $request)

{

    $user = auth()->user();



    if ($user->role == 1) {

        $query = Reading::query();

    } elseif ($user->role == 2) {

        $studentIds = $this->teacherStudentIds($user, $request->get('batch'));

        $query = Reading::whereIn('student_id', $studentIds);

    } else {

        $query = Reading::where('student_id', $user->id);

    }



    $submittedTests = $query

        ->select('student_id','test_name','created_at')

        ->with(['student:id,name,batch'])

        ->distinct()

        ->orderBy('test_name')

        ->paginate(20);



    $myBatches = $user->role == 2 ? $user->batches()->pluck('batch')->unique()->sort()->values() : collect();



    return view('backend.pages.reading.reading-results-list', compact('submittedTests','myBatches'));

}



public function readingBandScoreResults(Request $request)

{

    $user = auth()->user();



    $selectedDate = $request->input('date');

    if (!$selectedDate) {

        $selectedDate = \Carbon\Carbon::now('Asia/Dhaka')->toDateString();

    }



    $assignments = TestAssignment::query()

        ->whereDate('start_date', $selectedDate)

        ->where(function ($q) {

            $q->whereRaw('LOWER(test_category) LIKE ?', ['%reading%'])

                ->orWhereRaw('LOWER(test_name) LIKE ?', ['%reading%']);

        })

        ->orderBy('start_date')

        ->get();



    $groupedResults = collect();



    foreach ($assignments as $assignment) {

        if ($user->role == 1) {

            $query = Reading::query();

        } elseif ($user->role == 2) {

            $studentIds = $this->teacherStudentIds($user, $request->get('batch'));

            $query = Reading::whereIn('student_id', $studentIds);

        } else {

            $query = Reading::where('student_id', $user->id);

        }



        $query->where('batch_id', $assignment->batch_id)

            ->whereBetween('created_at', [$assignment->start_date, $assignment->closing_date]);



        if ($request->filled('student_id')) {

            $query->where('custom_student_id', 'like', '%' . $request->student_id . '%');

        }



        $rows = $query->orderBy('created_at', 'desc')->get();



        foreach ($rows as $row) {

            $adminAnswersRaw = Reading_result_admin::whereRaw('LOWER(test_name) = ?', [strtolower((string) $row->test_name)])

                ->first()?->answers ?? [];

            $studentAnswers = $row->answers ?? [];

            $correctCount = 0;



            foreach ($studentAnswers as $qNum => $studentAns) {

                if (!is_numeric($qNum)) continue;

                $rawCorrect = $adminAnswersRaw[$qNum] ?? '';

                if ($this->isAnswerCorrectReading($studentAns, $rawCorrect)) {

                    $correctCount++;

                }

            }



            $row->band_score = $this->calculateReadingBandScore($correctCount, $row->test_name);

        }



        $key = $assignment->start_date ? $assignment->start_date->format('Y-m-d H:i') : 'N/A';

        if (!$groupedResults->has($key)) {

            $groupedResults[$key] = collect();

        }

        $groupedResults[$key] = $groupedResults[$key]->concat($rows);

    }



    return view('backend.pages.reading.result', compact('groupedResults', 'selectedDate'));

}



public function exportReadingBandScorePDF(Request $request)

{

    $user = auth()->user();



    $selectedDate = $request->input('date');

    if (!$selectedDate) {

        $selectedDate = \Carbon\Carbon::now('Asia/Dhaka')->toDateString();

    }



    $requestedStart = $request->input('start', 'N/A');



    $assignments = TestAssignment::query()

        ->whereDate('start_date', $selectedDate)

        ->where(function ($q) {

            $q->whereRaw('LOWER(test_category) LIKE ?', ['%reading%'])

                ->orWhereRaw('LOWER(test_name) LIKE ?', ['%reading%']);

        })

        ->orderBy('start_date')

        ->get();



    $groupedResults = collect();



    foreach ($assignments as $assignment) {

        if ($user->role == 1) {

            $query = Reading::query();

        } elseif ($user->role == 2) {

            $studentIds = $this->teacherStudentIds($user, $request->get('batch'));

            $query = Reading::whereIn('student_id', $studentIds);

        } else {

            $query = Reading::where('student_id', $user->id);

        }



        $query->where('batch_id', $assignment->batch_id)

            ->whereBetween('created_at', [$assignment->start_date, $assignment->closing_date]);



        if ($request->filled('student_id')) {

            $query->where('custom_student_id', 'like', '%' . $request->student_id . '%');

        }



        $rows = $query->orderBy('created_at', 'desc')->get();



        foreach ($rows as $row) {

            $adminAnswersRaw = Reading_result_admin::whereRaw('LOWER(test_name) = ?', [strtolower((string) $row->test_name)])

                ->first()?->answers ?? [];



            $studentAnswers = $row->answers ?? [];

            $correctCount = 0;



            foreach ($studentAnswers as $qNum => $studentAns) {

                if (!is_numeric($qNum)) continue;

                $rawCorrect = $adminAnswersRaw[$qNum] ?? '';

                if ($this->isAnswerCorrectReading($studentAns, $rawCorrect)) {

                    $correctCount++;

                }

            }



            $row->band_score = $this->calculateReadingBandScore($correctCount, $row->test_name);

        }



        $key = $assignment->start_date ? $assignment->start_date->format('Y-m-d H:i') : 'N/A';

        if (!$groupedResults->has($key)) {

            $groupedResults[$key] = collect();

        }

        $groupedResults[$key] = $groupedResults[$key]->concat($rows);

    }



    $rows = $groupedResults->get($requestedStart, collect());



    $displayStartTime = $requestedStart === 'N/A'

        ? 'N/A'

        : \Carbon\Carbon::parse($requestedStart)->format('M d, Y h:i A');



    $attemptedDateTime = str_replace([':', ' '], ['-', '_'], (string) $displayStartTime);

    $filename = 'reading_band_scores_' . $attemptedDateTime . '.pdf';



    $pdf = PDF::loadView('backend.pages.reading.band-score-group-pdf', [

        'selectedDate' => $selectedDate,

        'displayStartTime' => $displayStartTime,

        'rows' => $rows,

    ]);



    return $pdf->download($filename);

}

















// Show result details for a student







public function readingResultDetails($studentId, $testName)

{



    $user = auth()->user();

    if ($user->role == 2) $this->ensureTeacherCanSeeStudent($user, (int)$studentId);

    elseif ($user->role != 1 && $user->id != (int)$studentId) abort(403);





    $submissionId = request()->route('submissionId');

    if ($submissionId) {

        $attempt = Reading::where('id', $submissionId)

            ->where('student_id', $studentId)

            ->where('test_name', $testName)

            ->first();

    } else {

        $attempt = Reading::where('student_id', $studentId)

            ->where('test_name', $testName)

            ->orderBy('created_at', 'desc')

            ->first();

    }



    if (!$attempt) {

        abort(404, 'Reading attempt not found.');

    }



    $studentAnswers = $attempt->answers ?? [];



    $adminAnswersRaw = Reading_result_admin::where('test_name', $testName)->first()?->answers ?? [];



    $normalizedAdminAnswers = collect($adminAnswersRaw)->mapWithKeys(function ($value, $key) {

        return [$key => $this->normalizeAnswerReading($value)];

    });



    $resultDetails = [];

    $correctCount = 0;



    foreach ($studentAnswers as $qNum => $studentAns) {

        if (!is_numeric($qNum)) {

            continue;

        }

        $rawCorrect = $adminAnswersRaw[$qNum] ?? '';

        $isCorrect = $this->isAnswerCorrectReading($studentAns, $rawCorrect);



        $resultDetails[] = [

            'question_number'   => $qNum,

            'student_answer'    => $studentAns,

            'correct_answer'    => $rawCorrect, // use raw for display

            'is_correct'        => $isCorrect,

        ];



        if ($isCorrect) $correctCount++;

    }



    $totalQuestions = count(array_filter(array_keys($studentAnswers), 'is_numeric'));

    $wrongCount = $totalQuestions - $correctCount;

    $student = User::find($studentId);



    $customStudentId = $attempt->custom_student_id ?? null;

    $examName = $attempt->exam_name ?? null;

    $bandScore = $this->calculateReadingBandScore($correctCount, $testName);

    $attemptId = $attempt->id;



    return view('backend.pages.reading.reading-result-details', compact(

        'student',

        'testName',

        'resultDetails',

        'correctCount',

        'wrongCount',

        'customStudentId',

        'examName',

        'bandScore',

        'attemptId'

    ));

}









// pdf for reading 





public function exportReadingResultPDF($testName, $submissionId)

{

    $attempt = Reading::where('id', $submissionId)

        ->whereRaw('LOWER(test_name) = ?', [strtolower($testName)])

        ->first();



    if (!$attempt) {

        abort(404, 'Reading attempt not found.');

    }



    $studentId = (int) $attempt->student_id;



    $user = auth()->user();

    if ($user->role == 2) $this->ensureTeacherCanSeeStudent($user, $studentId);

    elseif ($user->role != 1 && (int) $user->id != $studentId) abort(403);



    $studentAnswers = $attempt->answers ?? [];

    $adminAnswersRaw = Reading_result_admin::whereRaw('LOWER(test_name) = ?', [strtolower($testName)])

        ->first()?->answers ?? [];



    $normalizedAdminAnswers = collect($adminAnswersRaw)->mapWithKeys(function ($val, $key) {

        return [$key => strtolower(trim($val))];

    });



    $resultDetails = [];



    foreach ($studentAnswers as $qNum => $studentAns) {

        $studentNormalized = strtolower(trim($studentAns));

        $correctNormalized = $normalizedAdminAnswers[$qNum] ?? '';

        $originalCorrect = $adminAnswersRaw[$qNum] ?? '';



        $resultDetails[] = [

            'question_number'   => $qNum,

            'student_answer'    => $studentAns,

            'correct_answer'    => $originalCorrect,

            'is_correct'        => $this->isAnswerCorrectReading($studentAns, $originalCorrect),

        ];

    }



    $correctCount = collect($resultDetails)->where('is_correct', true)->count();

    $wrongCount = collect($resultDetails)->where('is_correct', false)->count();

    $student = User::find($studentId);



    $customStudentId = $attempt->custom_student_id ?? 'student';

    $assignment = null;

    if (!empty($attempt->batch_id)) {

        $assignment = \App\Models\TestAssignment::where('batch_id', $attempt->batch_id)

            ->where('test_name', 'LIKE', '%Reading%')

            ->orderByDesc('start_date')

            ->first();

    }



    $startDate = $assignment?->start_date;

    $attemptedDateTime = $startDate

        ? $startDate->format('M_d_Y_h-iA')

        : (($attempt->created_at ? $attempt->created_at->format('M_d_Y_h-iA') : now()->format('M_d_Y_h-iA')));

    $cleanStudentId = str_replace(' ', '_', $customStudentId);

    $cleanStudentId = preg_replace('/[^A-Za-z0-9_\-]/', '', (string) $cleanStudentId);

    $filename = $cleanStudentId . '_' . $attemptedDateTime . '.pdf';



    $bandScore = $this->calculateReadingBandScore($correctCount, $testName);



    $pdf = PDF::loadView('backend.pages.reading.result-details-pdf', compact(

        'student', 'testName', 'resultDetails', 'correctCount', 'wrongCount', 'customStudentId', 'bandScore'

    ));



    return $pdf->download($filename);

}







// ============================== Writing ==================================









public function writngResultsList(Request $request)

{

    $user = auth()->user();



    if ($user->role == 1) {

        $query = Writing::query();

    } elseif ($user->role == 2) {

        $studentIds = $this->teacherStudentIds($user, $request->get('batch'));

        $query = Writing::whereIn('student_id', $studentIds);

    } else {

        $query = Writing::where('student_id', $user->id);

    }



    $submittedTests = $query

        ->select('id','student_id','test_name','created_at','custom_student_id','batch_id')

        ->with(['student:id,name,batch'])

        ->distinct()

        ->orderBy('created_at', 'desc')

        ->paginate(20);

    

    foreach ($submittedTests as $submission) {
        $assignment = \App\Models\TestAssignment::where('batch_id', $submission->batch_id)
            ->where('test_name', 'LIKE', '%Writing%')
            ->first();

        if ($assignment) {
            $submission->formatted_test_name = $assignment->test_name;
        } else {
            $submission->formatted_test_name = $submission->test_name;
        }
    }

    $myBatches = $user->role == 2 ? $user->batches()->pluck('batch')->unique()->sort()->values() : collect();



    return view('backend.pages.writing.writingList', compact('submittedTests','myBatches'));

}











// Show Writing result details for a student





public function writingResultDetails($studentId, $testName, $submissionId = null)

{

    $user = auth()->user();



    // Allow: admin; the student; or a teacher who owns the student's batch

    if ($user->role == 2) {

        $this->ensureTeacherCanSeeStudent($user, (int)$studentId);

    } elseif ($user->role != 1 && $user->id != (int)$studentId) {

        abort(403, 'Unauthorized.');

    }



    $attemptQuery = Writing::where('student_id', $studentId)

        ->whereRaw('LOWER(test_name) = ?', [strtolower($testName)]);



    if ($submissionId) {

        $attemptQuery->where('id', $submissionId);

    }



    $attempt = $attemptQuery

        ->orderByDesc('id')

        ->first();



    if (!$attempt) {

        abort(404, 'Writing attempt not found.');

    }



    // Check if 'task' is already an array, or if it's a string that needs to be decoded

    $tasks = $attempt->task;

    

    // Only decode if it's a string

    if (is_string($tasks)) {

        $tasks = json_decode($tasks, true);  // Decode the JSON into an array

    }



    // If decoding fails or the task is empty, initialize as an empty array

    if (json_last_error() !== JSON_ERROR_NONE || !is_array($tasks)) {

        $tasks = [];

    }



    // Now we can safely access the individual tasks

    $resultDetails = [

        'testOne'   => $tasks['testOne'] ?? '',

        'testTwo'   => $tasks['testTwo'] ?? '',

        'testThree' => $tasks['testThree'] ?? '',

        'testFour'  => $tasks['testFour'] ?? '',

    ];



    $student = User::find($studentId);



    $displayName = $attempt->exam_name;

    if (!$displayName && $attempt->batch_id) {

        $batch = \App\Models\Batch::find($attempt->batch_id);

        if ($batch && $batch->exam_name) {

            $displayName = $batch->exam_name;

        }

    }

    if (!$displayName) {

        $displayName = $student?->name;

    }



    // Fetch existing mark for THIS student + test (user-wise)

    $existingMark = ResultMark::where('student_id', $studentId)

        ->where('test_name', $testName)

        ->first();



    // If you show a “Total Mark” line

    $totalMark = $existingMark->marks ?? 0;



    // Keep for compatibility

    $correctCount = 0;

    $wrongCount = 0;



    $attemptedAt = $attempt->created_at;



    return view('backend.pages.writing.writing-result-details', compact(

        'student', 'displayName', 'testName', 'resultDetails', 'correctCount', 'wrongCount',

        'existingMark', 'totalMark', 'attemptedAt'

    ));

}









// PDF for Writing



public function exportWritingResultPDF($testName, $submissionId)

{

    $attempt = Writing::where('id', $submissionId)

        ->whereRaw('LOWER(test_name) = ?', [strtolower($testName)])

        ->first();



    if (!$attempt) {

        abort(404, 'Writing attempt not found.');

    }



    $studentId = (int) $attempt->student_id;



    $user = auth()->user();



    // Allow: admin; the student; or a teacher who owns the student's batch

    if ($user->role == 2) {

        $this->ensureTeacherCanSeeStudent($user, $studentId);

    } elseif ($user->role != 1 && (int) $user->id != $studentId) {

        abort(403, 'Unauthorized.');

    }



    // Check if 'task' is already an array or a string that needs to be decoded

    $tasks = $attempt->task;



    if (is_string($tasks)) {

        // Decode the JSON string into an array

        $tasks = json_decode($tasks, true);



        // Check for decoding errors

        if (json_last_error() !== JSON_ERROR_NONE || !is_array($tasks)) {

            $tasks = [];

        }

    }



    // Now, assign individual test answers

    $resultDetails = [

        'testOne'   => $tasks['testOne'] ?? '',

        'testTwo'   => $tasks['testTwo'] ?? '',

        'testThree' => $tasks['testThree'] ?? '',

        'testFour'  => $tasks['testFour'] ?? '',

    ];



    // Get saved marks

    $existingMark = ResultMark::where('student_id', $studentId)

        ->where('test_name', $testName)

        ->first();



    $totalMark = $existingMark->marks ?? 0;



    $student = User::find($studentId);



    $displayName = $attempt->exam_name;

    if (!$displayName && $attempt->batch_id) {

        $batch = \App\Models\Batch::find($attempt->batch_id);

        if ($batch && $batch->exam_name) {

            $displayName = $batch->exam_name;

        }

    }

    if (!$displayName) {

        $displayName = $student?->name;

    }



    $attemptedAt = $attempt->created_at;



    $customStudentId = $attempt->custom_student_id ?? null;

    if (empty($customStudentId) && is_array($tasks) && isset($tasks['custom_student_id'])) {

        $customStudentId = $tasks['custom_student_id'];

    }

    $customStudentId = $customStudentId ?: ($student->id ?? 'student');



    $formattedTestName = $testName;

    $assignment = null;

    if (!empty($attempt->batch_id)) {

        $assignment = \App\Models\TestAssignment::where('batch_id', $attempt->batch_id)

            ->where('test_name', 'LIKE', '%Writing%')

            ->orderByDesc('start_date')

            ->first();

        if ($assignment && !empty($assignment->test_name)) {

            $formattedTestName = $assignment->test_name;

        }

    }



    // Generate PDF

    $pdf = PDF::loadView(

        'backend.pages.writing.writing-details-pdf',

        compact('student', 'displayName', 'testName', 'formattedTestName', 'resultDetails', 'totalMark', 'attemptedAt', 'customStudentId')

    );

    $cleanStudentId = preg_replace('/[^A-Za-z0-9_\-]/', '', (string) $customStudentId);



    $startDate = $assignment?->start_date;

    $attemptedDateTime = $startDate

        ? $startDate->format('M-d-Y_h-iA')

        : ($attemptedAt ? $attemptedAt->format('M-d-Y_h-iA') : now()->format('M-d-Y_h-iA'));



    return $pdf->download($cleanStudentId . '_' . $attemptedDateTime . '.pdf');

}







//=========== marks ============



public function storeWritingMark(Request $request, $student, $test)

{

    // Only admins can set marks (as in your Blade)

    abort_unless(auth()->check() && auth()->user()->role == 1, 403);



    $request->validate([

        'marks' => ['required','integer','min:0'],

    ]);



    // Normalize route params

    $studentId = (int) $student;

    $testName  = (string) $test;



    ResultMark::updateOrCreate(

        ['student_id' => $studentId, 'test_name' => $testName],

        ['marks' => (int) $request->input('marks')]

    );



    return back()->with('success', 'Mark updated.');

}









//batch show



public function showBatchStudents($batch)

{

    $user = Auth::user();

    $batchNorm = $this->normalizeBatch($batch);



    // Teachers can only view their own batch (case-insensitive)

    if ($user->role == 2) {

        $owns = $user->batches()

            ->whereRaw('LOWER(batch) = ?', [$batchNorm])

            ->exists();

        abort_unless($owns, 403);

    }



    // Load students by normalized batch

    $students = User::where('role', 0)

        ->whereRaw('LOWER(batch) = ?', [$batchNorm])

        ->orderBy('name')

        ->get();



    // Global states (these may need normalization inside CourseToggle as well if you store mixed case)

    $listeningOn = CourseToggle::isEnabledForBatch($batch, 'listening');

    $readingOn   = CourseToggle::isEnabledForBatch($batch, 'reading');

    $writingOn   = CourseToggle::isEnabledForBatch($batch, 'writing');



    $my = $user->role == 2

        ? CourseToggle::where('teacher_id', $user->id)

            ->whereRaw('LOWER(batch) = ?', [$batchNorm])

            ->get()->keyBy('course')

        : collect();



    return view('backend.pages.assign.batch-students', compact(

        'batch', 'students', 'listeningOn', 'readingOn', 'writingOn', 'my'

    ));

}

















public function toggleCourse(Request $request, string $batch)

{

    $request->validate([

        'course'  => 'required|in:listening,reading,writing',

        'enabled' => 'required|boolean',

    ]);



    $user = auth()->user();

    abort_unless($user && $user->role == 2, 403); // teachers only



    // Ensure teacher owns this batch

    abort_unless($user->batches()->where('batch', $batch)->exists(), 403);



    \App\Models\CourseToggle::updateOrCreate(

        ['teacher_id' => $user->id, 'batch' => $batch, 'course' => $request->course],

        ['enabled' => (bool)$request->enabled]

    );



    return back()->with('success', ucfirst($request->course).' updated for batch '.$batch.'.');

}





// batch wise result shor for teacher 



// Get student IDs in teacher’s assigned batches; if $batch provided, also 403 if teacher doesn’t own it.

private function teacherStudentIds(User $teacher, ?string $batch = null)

{

    // Normalize all teacher batches

    $teacherBatchesNorm = $teacher->batches()->pluck('batch')

        ->map(fn($v) => $this->normalizeBatch($v))

        ->filter()

        ->unique()

        ->values();



    if ($batch !== null) {

        $batchNorm = $this->normalizeBatch($batch);

        abort_unless($teacherBatchesNorm->contains($batchNorm), 403);



        // Case-insensitive DB filter for the batch

        return User::where('role', 0)

            ->whereRaw('LOWER(batch) = ?', [$batchNorm])

            ->pluck('id');

    }



    // All students in any of the teacher’s batches (case-insensitive)

    return User::where('role', 0)

        ->whereIn(DB::raw('LOWER(batch)'), $teacherBatchesNorm->all())

        ->pluck('id');

}



// Ensure a teacher can see a specific student (student is in one of teacher’s batches)

private function ensureTeacherCanSeeStudent(User $teacher, int $studentId): void

{

    $student = User::findOrFail($studentId);



    // If you want to be strict that only "role=0" are students, keep the next line; otherwise comment it out.

    // abort_unless($student->role === 0, 403);



    $teacherBatchesNorm = $teacher->batches()->pluck('batch')

        ->map(fn($v) => $this->normalizeBatch($v))

        ->filter()

        ->unique();



    $studentBatchNorm = $this->normalizeBatch($student->batch);

    abort_unless($studentBatchNorm && $teacherBatchesNorm->contains($studentBatchNorm), 403);

}





private function normalizeBatch(?string $b): string

{

    return trim(mb_strtolower($b ?? ''));

}





//====================== Batch Enrollment ========================



public function batchEnrollmentPage()

{

    // Get all batches from batches table

    $batchList = \App\Models\Batch::orderBy('created_at', 'desc')

                    ->get()

                    ->map(function($batch) {

                        return [

                            'id' => $batch->id,

                            'exam_name' => $batch->exam_name,

                            'email' => $batch->email,

                            'type' => $batch->type,

                        ];

                    });

    

    // Get all students

    $students = User::where('role', 0)

                    ->orderBy('created_at', 'desc')

                    ->get();

    

    return view('backend.pages.assign.batchEnrollment', compact('batchList', 'students'));

}



public function viewStudentsPage(Request $request)

{

    $query = \App\Models\Batch::query();



    if ($request->filled('exam_name')) {

        $query->where('exam_name', 'like', '%' . $request->exam_name . '%');

    }



    if ($request->filled('type')) {

        $query->where('type', $request->type);

    }



    // Get all batches from batches table with pagination

    $batchList = $query->orderBy('created_at', 'desc')

        ->paginate(20)

        ->appends($request->query());



    $types = \App\Models\Batch::select('type')

        ->whereNotNull('type')

        ->distinct()

        ->orderBy('type')

        ->pluck('type');

    

    return view('backend.pages.assign.viewStudents', compact('batchList', 'types'));

}



public function storeBatchEnrollment(Request $request)

{

    $request->validate([

        'exam_name' => 'required|string|max:255|unique:batches,exam_name',

        'mobile' => 'nullable|string|max:20',

        'email' => 'nullable|email|unique:batches,email',

        'type' => 'required|in:GT,Academic',

    ]);



    $username = $this->generate8DigitNumber();

    $password = $this->generate8DigitNumber();



    $examName = trim((string) $request->exam_name);



    $batch = \App\Models\Batch::create([

        'exam_name' => $examName,

        'batch_name' => null,

        'type' => $request->type,

        'mobile' => $request->mobile,

        'email' => $request->email,

        'username' => $username,

        'password' => $password,

    ]);



    return response()->json([

        'success' => true,

        'message' => 'Batch created successfully!',

        'username' => $username,

        'password' => $password,

        'data' => $batch

    ]);

}



private function generateUsername($name)

{

    $baseName = strtolower(str_replace(' ', '', $name));

    $username = $baseName;

    $counter = 1;

    

    while (User::where('email', $username . '@partial.com')->exists()) {

        $username = $baseName . $counter;

        $counter++;

    }

    

    return $username;

}



private function generatePassword($length = 8)

{

    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $password = '';

    

    for ($i = 0; $i < $length; $i++) {

        $password .= $characters[rand(0, strlen($characters) - 1)];

    }

    

    return $password;

}



private function generate8DigitNumber()

{

    return str_pad(rand(0, 99999999), 8, '0', STR_PAD_LEFT);

}



public function deleteBatchStudent($id)

{

    $student = User::findOrFail($id);

    

    if ($student->role != 0) {

        return response()->json(['success' => false, 'message' => 'Only students can be deleted']);

    }

    

    $student->delete();

    

    return response()->json(['success' => true, 'message' => 'Student deleted successfully']);

}



public function viewBatch($id)

{

    $batch = \App\Models\Batch::findOrFail($id);

    

    // Get all test assignments for this batch

    $allAssignments = \App\Models\TestAssignment::where('batch_id', $id)

                                                 ->orderBy('start_date', 'desc')

                                                 ->get();

    

    // Categorize tests based on current time

    $now = \Carbon\Carbon::now('Asia/Dhaka');

    

    $upcomingTests = $allAssignments->filter(function($assignment) use ($now) {

        $startDate = \Carbon\Carbon::parse($assignment->start_date, 'Asia/Dhaka');

        return $now->lessThan($startDate);

    });

    

    $expiredTests = $allAssignments->filter(function($assignment) use ($now) {

        $closingDate = \Carbon\Carbon::parse($assignment->closing_date, 'Asia/Dhaka');

        return $now->greaterThan($closingDate);

    });

    

    // Test history would be completed tests (for now, we'll show empty as there's no completion tracking yet)

    $testHistory = collect([]);

    

    return view('backend.pages.assign.batchView', compact('batch', 'upcomingTests', 'expiredTests', 'testHistory'));

}



public function deleteBatch($id)

{

    $batch = \App\Models\Batch::find($id);

    

    if (!$batch) {

        return response()->json(['success' => false, 'message' => 'Batch not found']);

    }

    

    // Delete the batch

    $batch->delete();

    

    return response()->json([

        'success' => true, 

        'message' => 'Batch deleted successfully'

    ]);

}



//====================== Assign Test ========================



public function assignTestPage(Request $request)

{

    $examNames = null;

    

    if ($request->has('batch_type') && $request->has('exam_names')) {

        $batchType = $request->input('batch_type');

        $selectedExamNames = $request->input('exam_names');

        

        // Get exam names with student count

        $examNames = \App\Models\Batch::where('type', $batchType)

                                      ->whereIn('exam_name', $selectedExamNames)

                                      ->select('exam_name', 'type')

                                      ->get()

                                      ->map(function($batch) {

                                          // Count students for this exam name and type

                                          $count = \App\Models\Batch::where('exam_name', $batch->exam_name)

                                                                    ->where('type', $batch->type)

                                                                    ->count();

                                          return [

                                              'name' => $batch->exam_name,

                                              'type' => $batch->type,

                                              'student_count' => $count

                                          ];

                                      })

                                      ->unique('name')

                                      ->values();

    }

    

    return view('backend.pages.assign.assignTest', compact('examNames'));

}



public function getExamNames(Request $request)

{

    $batchType = $request->input('batch_type');

    

    // Get all batches for debugging

    $allBatches = \App\Models\Batch::select('exam_name', 'type')->get();

    \Log::info('All Batches:', $allBatches->toArray());

    \Log::info('Requested Batch Type:', ['type' => $batchType]);

    

    $examNames = \App\Models\Batch::where('type', $batchType)

                                  ->pluck('exam_name')

                                  ->unique()

                                  ->values();

    

    \Log::info('Exam Names Found:', $examNames->toArray());

    

    return response()->json([

        'exam_names' => $examNames,

        'count' => $examNames->count(),

        'batch_type' => $batchType

    ]);

}



public function assignedTestList(Request $request)

{

    // Start query with batch relationship

    $query = \App\Models\TestAssignment::with('batch');

    

    // Filter by exam name if provided

    if ($request->filled('exam_name')) {

        $query->where('exam_name', 'like', '%' . $request->exam_name . '%');

    }

    

    // Filter by type if provided

    if ($request->filled('type')) {

        $query->whereHas('batch', function($q) use ($request) {

            $q->where('type', $request->type);

        });

    }

    

    // Filter by start date if provided

    if ($request->filled('start_date')) {

        $query->whereDate('start_date', '>=', $request->start_date);

    }

    

    // Fetch test assignments with filters applied, paginate 50 per page

    $assignments = $query->orderBy('created_at', 'desc')->paginate(50);

    

    return view('backend.pages.assign.assignedTestList', compact('assignments'));

}



public function updateAssignmentDates(Request $request, $id)

{

    try {

        $request->validate([

            'start_date' => 'required|date',

            'closing_date' => 'required|date|after:start_date',

        ]);



        $assignment = \App\Models\TestAssignment::findOrFail($id);

        

        $assignment->start_date = $request->start_date;

        $assignment->closing_date = $request->closing_date;

        $assignment->save();



        return response()->json([

            'success' => true,

            'message' => 'Dates updated successfully'

        ]);

    } catch (\Exception $e) {

        return response()->json([

            'success' => false,

            'message' => $e->getMessage()

        ], 400);

    }

}



public function selectTestsPage(Request $request)

{

    $selectedExams = $request->input('selected_exams', []);

    

    if (empty($selectedExams)) {

        return redirect()->route('assign.test.page')->with('error', 'Please select at least one exam');

    }

    

    // Get all tests (excluding Speaking tests)

    $allTests = [

        // Academic Listening

        ['id' => 1, 'name' => '101 : Listening', 'category' => 'Academic_Listening', 'route' => '/listening/one'],

        ['id' => 2, 'name' => '102 : Listening', 'category' => 'Academic_Listening', 'route' => '/listening/two'],

        ['id' => 3, 'name' => '103 : Listening', 'category' => 'Academic_Listening', 'route' => '/listening/three'],

        ['id' => 4, 'name' => '104 : Listening', 'category' => 'Academic_Listening', 'route' => '/listening/fourone'],

        ['id' => 5, 'name' => '105 : Listening', 'category' => 'Academic_Listening', 'route' => '/listening/four'],

        ['id' => 6, 'name' => '106 : Listening', 'category' => 'Academic_Listening', 'route' => '/listening/five'],

        ['id' => 7, 'name' => '107 : Listening', 'category' => 'Academic_Listening', 'route' => '/listening/seven'],

        ['id' => 8, 'name' => '108 : Listening', 'category' => 'Academic_Listening', 'route' => '/listening/eight'],

        ['id' => 9, 'name' => '109 : Listening', 'category' => 'Academic_Listening', 'route' => '/listening/nine'],

        ['id' => 10, 'name' => '110 : Listening', 'category' => 'Academic_Listening', 'route' => '/listening/ten'],

        ['id' => 49, 'name' => '111 : Listening', 'category' => 'Academic_Listening', 'route' => '/listening/eleven'],

        ['id' => 50, 'name' => '112 : Listening', 'category' => 'Academic_Listening', 'route' => '/listening/twelve'],

        

        // Academic Writing

        ['id' => 11, 'name' => '101 : Writing', 'category' => 'Academic_Writing', 'route' => '/writing/taskTwo/classOne'],

        ['id' => 12, 'name' => '102 : Writing', 'category' => 'Academic_Writing', 'route' => '/writing/taskTwo/classTwo'],

        ['id' => 13, 'name' => '103 : Writing', 'category' => 'Academic_Writing', 'route' => '/writing/taskTwo/classThree'],

        ['id' => 14, 'name' => '104 : Writing', 'category' => 'Academic_Writing', 'route' => '/writing/taskTwo/classFour'],

        ['id' => 15, 'name' => '105 : Writing', 'category' => 'Academic_Writing', 'route' => '/writing/taskTwo/classFive'],

        ['id' => 16, 'name' => '106 : Writing', 'category' => 'Academic_Writing', 'route' => '/writing/taskTwo/classSix'],

        ['id' => 17, 'name' => '107 : Writing', 'category' => 'Academic_Writing', 'route' => '/writing/taskTwo/classSeven'],

        ['id' => 18, 'name' => '108 : Writing', 'category' => 'Academic_Writing', 'route' => '/writing/taskTwo/classEight'],

        ['id' => 19, 'name' => '109 : Writing', 'category' => 'Academic_Writing', 'route' => '/writing/taskTwo/classNine'],

        ['id' => 20, 'name' => '110 : Writing', 'category' => 'Academic_Writing', 'route' => '/writing/taskTwo/classTen'],

        ['id' => 21, 'name' => '111 : Writing', 'category' => 'Academic_Writing', 'route' => '/writing/taskTwo/classEleven'],

        ['id' => 22, 'name' => '112 : Writing', 'category' => 'Academic_Writing', 'route' => '/writing/taskTwo/classTwelve'],

        

        // Academic Reading

        ['id' => 23, 'name' => '01 : Reading', 'category' => 'Academic_Reading', 'route' => '/reading/one'],

        ['id' => 24, 'name' => '02 : Reading', 'category' => 'Academic_Reading', 'route' => '/reading/two'],

        ['id' => 25, 'name' => '03 : Reading', 'category' => 'Academic_Reading', 'route' => '/reading/three'],

        ['id' => 26, 'name' => '04 : Reading', 'category' => 'Academic_Reading', 'route' => '/reading/four'],

        ['id' => 27, 'name' => '05 : Reading', 'category' => 'Academic_Reading', 'route' => '/reading/five'],
        ['id' => 42, 'name' => '06 : Reading', 'category' => 'Academic_Reading', 'route' => '/reading/class/six'],
        ['id' => 43, 'name' => '07 : Reading', 'category' => 'Academic_Reading', 'route' => '/reading/class/seven'],
        ['id' => 44, 'name' => '08 : Reading', 'category' => 'Academic_Reading', 'route' => '/reading/class/eight'],
        ['id' => 45, 'name' => '09 : Reading', 'category' => 'Academic_Reading', 'route' => '/reading/class/nine'],
        ['id' => 46, 'name' => '10 : Reading', 'category' => 'Academic_Reading', 'route' => '/reading/class/ten'],
        ['id' => 47, 'name' => '11 : Reading', 'category' => 'Academic_Reading', 'route' => '/reading/class/eleven'],
        ['id' => 48, 'name' => '12 : Reading', 'category' => 'Academic_Reading', 'route' => '/reading/class/twelve'],

        

        // GT Writing (General Writing)
        ['id' => 28, 'name' => '101 : Writing', 'category' => 'GT_Writing', 'route' => '/writing/taskOne/classOne'],
        ['id' => 29, 'name' => '102 : Writing', 'category' => 'GT_Writing', 'route' => '/writing/taskOne/classTwo'],
        ['id' => 30, 'name' => '103 : Writing', 'category' => 'GT_Writing', 'route' => '/writing/taskOne/classThree'],
        ['id' => 31, 'name' => '104 : Writing', 'category' => 'GT_Writing', 'route' => '/writing/taskOne/classFour'],
        ['id' => 32, 'name' => '105 : Writing', 'category' => 'GT_Writing', 'route' => '/writing/taskOne/classFive'],
        ['id' => 33, 'name' => '106 : Writing', 'category' => 'GT_Writing', 'route' => '/writing/taskOne/classSix'],
        ['id' => 34, 'name' => '107 : Writing', 'category' => 'GT_Writing', 'route' => '/writing/taskOne/classSeven'],

        // GT Reading (General Reading)
        ['id' => 35, 'name' => '01 : Reading', 'category' => 'GT_Reading', 'route' => '/reading/gt/classOne'],
        ['id' => 36, 'name' => '02 : Reading', 'category' => 'GT_Reading', 'route' => '/reading/gt/classTwo'],
        ['id' => 37, 'name' => '03 : Reading', 'category' => 'GT_Reading', 'route' => '/reading/gt/classThree'],
        ['id' => 38, 'name' => '04 : Reading', 'category' => 'GT_Reading', 'route' => '/reading/gt/classFour'],
        ['id' => 39, 'name' => '05 : Reading', 'category' => 'GT_Reading', 'route' => '/reading/gt/classFive'],
        ['id' => 40, 'name' => '06 : Reading', 'category' => 'GT_Reading', 'route' => '/reading/gt/classSix'],
        ['id' => 41, 'name' => '07 : Reading', 'category' => 'GT_Reading', 'route' => '/reading/gt/classSeven'],

    ];

    

    return view('backend.pages.assign.selectTests', compact('selectedExams', 'allTests'));

}



public function assignTestsFinalPage(Request $request)

{

    $selectedExams = $request->input('selected_exams', []);

    $selectedTests = $request->input('selected_tests', []);

    

    if (empty($selectedExams) || empty($selectedTests)) {

        return redirect()->route('assign.test.page')->with('error', 'Please select exams and tests');

    }

    

    // Get batch details for selected exam names

    $batches = \App\Models\Batch::whereIn('exam_name', $selectedExams)->get();

    

    // Prepare assignments array

    $assignments = [];

    

    foreach ($selectedTests as $testData) {

        $testInfo = json_decode($testData, true);

        

        foreach ($batches as $batch) {

            $assignments[] = [

                'test_id' => $testInfo['id'],

                'test_name' => $testInfo['name'],

                'exam_name' => $batch->exam_name,

                'username' => $batch->username ?? 'N/A',

                'password' => $batch->password ?? 'N/A',

            ];

        }

    }

    

    return view('backend.pages.assign.assignTestsFinal', compact('assignments'));

}



public function saveTestAssignments(Request $request)

{

    $tests = $request->input('tests', []);

    

    if (empty($tests)) {

        return redirect()->back()->with('error', 'No test assignments to save');

    }

    

    try {

        foreach ($tests as $testData) {

            $testId = $testData['test_id'];

            $testName = $testData['test_name'];

            $timeSlots = $testData['time_slots'] ?? [];

            $exams = $testData['exams'] ?? [];

            

            // Determine test category based on test_id

            $testCategory = 'Academic_Listening'; // Default

            

            if (($testId >= 1 && $testId <= 10) || ($testId >= 49 && $testId <= 50)) {

                $testCategory = 'Academic_Listening';

            } elseif ($testId >= 11 && $testId <= 22) {

                $testCategory = 'Academic_Writing';

            } elseif (($testId >= 23 && $testId <= 27) || ($testId >= 42 && $testId <= 48)) {

                $testCategory = 'Academic_Reading';

            } elseif ($testId >= 28 && $testId <= 34) {

                $testCategory = 'GT_Writing';

            } elseif ($testId >= 35 && $testId <= 41) {

                $testCategory = 'GT_Reading';

            }

            

            // For each time slot, create assignments for all exams

            foreach ($timeSlots as $timeSlot) {

                $startDate = $timeSlot['start_date'];

                $closingDate = $timeSlot['closing_date'];

                

                foreach ($exams as $exam) {

                    // Get batch ID from exam name

                    \Log::info('Looking for batch with exam_name: ' . $exam['exam_name']);

                    $batch = \App\Models\Batch::where('exam_name', $exam['exam_name'])->first();

                    

                    if ($batch) {

                        \Log::info('Batch found - ID: ' . $batch->id . ', exam_name: ' . $batch->exam_name . ', created_at: ' . $batch->created_at);

                        

                        $assignment = \App\Models\TestAssignment::create([

                            'batch_id' => $batch->id,

                            'test_id' => $testId,

                            'test_name' => $testName,

                            'test_category' => $testCategory,

                            'start_date' => $startDate,

                            'closing_date' => $closingDate,

                            'exam_name' => $exam['exam_name'],

                            'username' => $exam['username'],

                            'password' => $exam['password'],

                            'status' => 'pending'

                        ]);

                        

                        \Log::info('Assignment created - ID: ' . $assignment->id . ', batch_id: ' . $assignment->batch_id);

                    } else {

                        \Log::warning('Batch NOT found for exam_name: ' . $exam['exam_name']);

                    }

                }

            }

        }

        

        return redirect()->route('assigned.test.list')->with('success', 'Tests assigned successfully!');

    } catch (\Exception $e) {

        return redirect()->back()->with('error', 'Error saving assignments: ' . $e->getMessage());

    }

}



//====================== Student Login & Dashboard ========================



public function studentLoginPage()

{

    return view('auth.student-login');

}



public function studentLoginSubmit(Request $request)

{

    $request->validate([

        'username' => 'required',

        'password' => 'required',

    ]);



    $username = $request->input('username');

    $password = $request->input('password');

    $forceLogin = (bool) $request->boolean('force_login');



    // Check if credentials match a batch

    $batch = \App\Models\Batch::where('username', $username)

                               ->where('password', $password)

                               ->first();



    if ($batch) {

        $existingSessionId = $batch->active_session_token;



        // Check if the stored session is still alive (database session driver)

        $hasLiveSession = false;

        if (!empty($existingSessionId)) {

            $existingSession = DB::table(config('session.table', 'sessions'))

                ->where('id', $existingSessionId)

                ->first();



            if ($existingSession) {

                $lifetimeSeconds = ((int) config('session.lifetime', 120)) * 60;

                $lastActivity = (int) ($existingSession->last_activity ?? 0);

                $hasLiveSession = $lastActivity > 0 && (time() - $lastActivity) < $lifetimeSeconds;

            }



            // If stale, clear it so popup won't show

            if (!$hasLiveSession) {

                $batch->active_session_token = null;

                $batch->save();

                $existingSessionId = null;

            }

        }



        // If active somewhere else, require confirmation

        if ($hasLiveSession && !$forceLogin) {

            return response()->view('auth.student-login', [

                'session_conflict' => true,

                'prefill_username' => $username,

                'prefill_password' => $password,

                'error_message' => 'This account is already logged in on another device.',

            ]);

        }



        // If force login, kill the previous session so the other device is logged out

        if ($forceLogin && !empty($existingSessionId)) {

            DB::table(config('session.table', 'sessions'))

                ->where('id', $existingSessionId)

                ->delete();

        }



        $request->session()->regenerate();

        $newSessionId = $request->session()->getId();



        $batch->active_session_token = $newSessionId;

        $batch->save();



        // Store student session

        session([

            'student_logged_in' => true,

            'student_batch_id' => $batch->id,

            'student_username' => $batch->username,

            'student_exam_name' => $batch->exam_name,

            'student_session_token' => $newSessionId,

        ]);



        return redirect()->route('student.dashboard');

    }



    return redirect()->back()->with('error', 'Invalid username or password');

}



public function studentDashboard()

{

    if (!session('student_logged_in')) {

        return redirect()->route('student.login')->with('error', 'Please login first');

    }



    $batchId = session('student_batch_id');

    

    // NOTE: ekhane 3 ta \Log::info chilo. Student dashboard protita student er
    // protita page load e hit hoy, ar LOG_LEVEL=debug thakay laravel.log ek file e
    // beree cholto — file append e exclusive lock lage, tai concurrency te eta
    // nijei ekta bottleneck chilo. Debug korte lagle temporary kore firiye anben.



    // Get all test assignments for this batch

    $assignments = \App\Models\TestAssignment::where('batch_id', $batchId)

                                             ->orderBy('start_date', 'asc')

                                             ->get();

    




    return view('student.dashboard', compact('assignments'));

}



public function testConfirmation($assignmentId, $category, $testId)

{

    // Map category to display name

    $categoryMap = [

        'Academic_Listening' => 'Listening',

        'Academic_Reading' => 'Academic Reading',

        'Academic_Writing' => 'Academic Writing',

        'GT_Reading' => 'General Reading',

        'GT_Writing' => 'General Writing'

    ];

    

    $testCategory = $categoryMap[$category] ?? $category;

    

    // Set timing based on category

    $timing = 30; // default

    if (strpos($category, 'Reading') !== false) {

        $timing = 60;

    } elseif (strpos($category, 'Writing') !== false) {

        $timing = 60;

    }

    

    // Determine the test route

    $testRoute = '';

    if ($category === 'Academic_Listening') {

        $listeningRoutes = [

            1 => '/listening/one',

            2 => '/listening/two',

            3 => '/listening/three',

            4 => '/listening/fourone',

            5 => '/listening/four',

            6 => '/listening/five',

            7 => '/listening/seven',

            8 => '/listening/eight',

            9 => '/listening/nine',

            10 => '/listening/ten',

            49 => '/listening/eleven',

            50 => '/listening/twelve'

        ];

        $testRoute = $listeningRoutes[$testId] ?? '/listening/one';

    } 

    elseif ($category === 'Academic_Writing') {

        $writingRoutes = [

            11 => '/writing/taskTwo/classOne',

            12 => '/writing/taskTwo/classTwo',

            13 => '/writing/taskTwo/classThree',

            14 => '/writing/taskTwo/classFour',

            15 => '/writing/taskTwo/classFive',

            16 => '/writing/taskTwo/classSix',

            17 => '/writing/taskTwo/classSeven',

            18 => '/writing/taskTwo/classEight',

            19 => '/writing/taskTwo/classNine',

            20 => '/writing/taskTwo/classTen',

            21 => '/writing/taskTwo/classEleven',

            22 => '/writing/taskTwo/classTwelve'

        ];

        $testRoute = $writingRoutes[$testId] ?? '/writing/taskTwo/classOne';

    }

    elseif ($category === 'Academic_Reading') {

        $readingRoutes = [

            23 => '/reading/one',

            24 => '/reading/two',

            25 => '/reading/three',

            26 => '/reading/four',

            27 => '/reading/five',

            42 => '/reading/class/six',

            43 => '/reading/class/seven',

            44 => '/reading/class/eight',

            45 => '/reading/class/nine',

            46 => '/reading/class/ten',

            47 => '/reading/class/eleven',

            48 => '/reading/class/twelve'

        ];

        $testRoute = $readingRoutes[$testId] ?? '/reading/one';

    }

    elseif ($category === 'GT_Reading') {

        $gtReadingRoutes = [

            35 => '/reading/gt/classOne',

            36 => '/reading/gt/classTwo',

            37 => '/reading/gt/classThree',

            38 => '/reading/gt/classFour',

            39 => '/reading/gt/classFive',

            40 => '/reading/gt/classSix',

            41 => '/reading/gt/classSeven'

        ];

        $testRoute = $gtReadingRoutes[$testId] ?? '/reading/gt/classOne';

    }

    elseif ($category === 'GT_Writing') {

        $gtWritingRoutes = [

            28 => '/writing/taskOne/classOne',

            29 => '/writing/taskOne/classTwo',

            30 => '/writing/taskOne/classThree',

            31 => '/writing/taskOne/classFour',

            32 => '/writing/taskOne/classFive',

            33 => '/writing/taskOne/classSix',

            34 => '/writing/taskOne/classSeven'

        ];

        $testRoute = $gtWritingRoutes[$testId] ?? '/writing/taskOne/classOne';

    }

    else {

        $testRoute = '/listening/one';

    }

    

    return view('student.test-confirmation', compact('testCategory', 'timing', 'testRoute', 'assignmentId'));

}



public function studentLogout()

{

    $batchId = session('student_batch_id');

    $token = session('student_session_token');



    if ($batchId && $token) {

        $batch = \App\Models\Batch::find($batchId);

        if ($batch && $batch->active_session_token === $token) {

            $batch->active_session_token = null;

            $batch->save();

        }

    }



    session()->forget(['student_logged_in', 'student_batch_id', 'student_username', 'student_exam_name', 'student_session_token']);

    return redirect()->route('student.login')->with('success', 'Logged out successfully');

}



// ================ Evaluation Methods =========================

public function ieltsEvaluation(Request $request)
{
    $perPage = 20;

    // Which table holds which test type
    $sources = [
        'Listening' => (new Listining)->getTable(),
        'Reading'   => (new Reading)->getTable(),
        'Writing'   => (new Writing)->getTable(),
    ];

    // Category filter => [test type, batch type]
    $categoryMap = [
        'Listening'        => ['Listening', null],
        'Academic Writing' => ['Writing',   'Academic'],
        'Academic Reading' => ['Reading',   'Academic'],
        'General Reading'  => ['Reading',   'GT'],
        'General Writing'  => ['Writing',   'GT'],
    ];

    $wantType      = null;
    $wantBatchType = null;
    if ($request->filled('category') && isset($categoryMap[$request->category])) {
        [$wantType, $wantBatchType] = $categoryMap[$request->category];
    }

    // -----------------------------------------------------------------
    // STEP 1: Light index query - only id / test_type / created_at.
    // The heavy `answers` (json) and `task` (longText) columns are never
    // loaded here, and all filtering + sorting happens inside MySQL.
    // -----------------------------------------------------------------
    $indexQueries = [];

    foreach ($sources as $type => $table) {
        if ($wantType !== null && $type !== $wantType) {
            continue;
        }

        $q = DB::table($table . ' as s')
            ->leftJoin('batches as b', 'b.id', '=', 's.batch_id')
            ->where(function ($w) {
                $w->whereNotNull('s.exam_name')->orWhereNotNull('s.batch_id');
            })
            ->select([
                's.id',
                DB::raw("'" . $type . "' as test_type"),
                's.created_at',
            ]);

        if ($request->filled('student_id')) {
            $q->where('s.custom_student_id', 'like', '%' . $request->student_id . '%');
        }

        if ($request->filled('attempted_date')) {
            $q->whereDate('s.created_at', $request->attempted_date);
        }

        if ($wantBatchType !== null) {
            $q->where('b.type', $wantBatchType);
        }

        $indexQueries[] = $q;
    }

    $currentPage = max(1, (int) $request->get('page', 1));

    if (empty($indexQueries)) {
        $submissions = new \Illuminate\Pagination\LengthAwarePaginator(
            collect(), 0, $perPage, $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('backend.pages.evaluation.ielts-evaluation', compact('submissions'));
    }

    $union = array_shift($indexQueries);
    foreach ($indexQueries as $q) {
        $union->unionAll($q);
    }

    $base  = DB::query()->fromSub($union, 'submissions_index');
    $total = (clone $base)->count();

    $rows = $base
        ->orderByDesc('created_at')
        ->forPage($currentPage, $perPage)
        ->get();

    // -----------------------------------------------------------------
    // STEP 2: Hydrate ONLY the rows on this page (max 20).
    // -----------------------------------------------------------------
    $idsByType = ['Listening' => [], 'Reading' => [], 'Writing' => []];
    foreach ($rows as $row) {
        $idsByType[$row->test_type][] = (int) $row->id;
    }

    $loaded = [
        'Listening' => empty($idsByType['Listening']) ? collect()
            : Listining::with('student')->whereIn('id', $idsByType['Listening'])->get()->keyBy('id'),
        'Reading' => empty($idsByType['Reading']) ? collect()
            : Reading::with('student')->whereIn('id', $idsByType['Reading'])->get()->keyBy('id'),
        'Writing' => empty($idsByType['Writing']) ? collect()
            : Writing::with('student')->whereIn('id', $idsByType['Writing'])->get()->keyBy('id'),
    ];

    $allSubmissions = collect();
    foreach ($rows as $row) {
        $model = $loaded[$row->test_type]->get((int) $row->id);
        if (!$model) {
            continue;
        }
        $model->test_type = $row->test_type;
        $allSubmissions->push($model);
    }

    // -----------------------------------------------------------------
    // STEP 3: Bulk-load batches + assignments (kills the N+1 queries).
    // -----------------------------------------------------------------
    $batchIds = $allSubmissions->pluck('batch_id')->filter()->unique()->values()->all();
    $batches  = empty($batchIds)
        ? collect()
        : \App\Models\Batch::whereIn('id', $batchIds)->get()->keyBy('id');

    $assignmentIds = $allSubmissions->pluck('assignment_id')->filter()->unique()->values()->all();
    $assignments   = empty($assignmentIds)
        ? collect()
        : TestAssignment::with('batch')->whereIn('id', $assignmentIds)->get()->keyBy('id');

    $assignmentsByBatch = empty($batchIds)
        ? collect()
        : TestAssignment::with('batch')
            ->whereIn('batch_id', $batchIds)
            ->orderByDesc('start_date')
            ->get()
            ->groupBy('batch_id');

    // -----------------------------------------------------------------
    // STEP 4: Same display logic as before - but zero extra queries.
    // -----------------------------------------------------------------
    foreach ($allSubmissions as $submission) {
        if ($submission->batch_id) {
            $batch = $batches->get($submission->batch_id);
            if ($batch) {
                $submission->batch_type = $batch->type;
                if (!$submission->exam_name) {
                    $submission->exam_name = $batch->exam_name;
                }
            }
        }

        $assignment = null;
        if (!empty($submission->assignment_id)) {
            $assignment = $assignments->get((int) $submission->assignment_id);
        }

        if (!$assignment && $submission->batch_id) {
            $needle = strtolower((string) $submission->test_type);
            $group  = $assignmentsByBatch->get($submission->batch_id);
            if ($group) {
                $assignment = $group->first(function ($a) use ($needle) {
                    return str_contains(strtolower((string) $a->test_name), $needle);
                });
            }
        }

        if ($assignment) {
            $submission->formatted_test_name = $assignment->test_name;
            if (!$submission->batch_type && $assignment->batch) {
                $submission->batch_type = $assignment->batch->type ?? 'N/A';
            }
            $submission->attempted_at = $assignment->start_date;
        } else {
            $submission->formatted_test_name = $submission->test_name;
            $submission->attempted_at = $submission->created_at;
        }

        if (!$submission->exam_name) {
            $submission->exam_name = $submission->student ? $submission->student->name : 'N/A';
        }

        if (!isset($submission->batch_type)) {
            $submission->batch_type = '-';
        }

        if (empty($submission->attempted_at)) {
            $submission->attempted_at = $submission->created_at;
        }
    }

    $submissions = new \Illuminate\Pagination\LengthAwarePaginator(
        $allSubmissions,
        $total,
        $perPage,
        $currentPage,
        ['path' => request()->url(), 'query' => request()->query()]
    );

    return view('backend.pages.evaluation.ielts-evaluation', compact('submissions'));
}


// public function ieltsEvaluation(Request $request)

// {

//     // Build query for listening submissions - only show assigned tests

//     $listeningQuery = Listining::with('student')

//         ->where(function($query) {

//             $query->whereNotNull('exam_name')

//                   ->orWhereNotNull('batch_id');

//         });

//     if ($request->filled('student_id')) {

//         $listeningQuery->where('custom_student_id', 'like', '%' . $request->student_id . '%');

//     }

//     $listeningSubmissions = $listeningQuery->get()->map(function($item) {

//         $item->test_type = 'Listening';

//         return $item;

//     });

    

//     // Build query for reading submissions - only show assigned tests

//     $readingQuery = \App\Models\Reading::with('student')

//         ->where(function($query) {

//             $query->whereNotNull('exam_name')

//                   ->orWhereNotNull('batch_id');

//         });

//     if ($request->filled('student_id')) {

//         $readingQuery->where('custom_student_id', 'like', '%' . $request->student_id . '%');

//     }

//     $readingSubmissions = $readingQuery->get()->map(function($item) {

//         $item->test_type = 'Reading';

//         return $item;

//     });

    

//     // Build query for writing submissions - only show assigned tests

//     $writingQuery = \App\Models\Writing::with('student')

//         ->where(function($query) {

//             $query->whereNotNull('exam_name')

//                   ->orWhereNotNull('batch_id');

//         });

//     if ($request->filled('student_id')) {

//         $writingQuery->where('custom_student_id', 'like', '%' . $request->student_id . '%');

//     }

//     $writingSubmissions = $writingQuery->get()->map(function($item) {

//         $item->test_type = 'Writing';

//         return $item;

//     });

    

//     // Combine all submissions

//     $allSubmissions = $listeningSubmissions

//         ->concat($readingSubmissions)

//         ->concat($writingSubmissions)

//         ->values();

    

//     // Process each submission to get batch type and formatted test name

//     foreach ($allSubmissions as $submission) {

//         // Get batch info

//         if ($submission->batch_id) {

//             $batch = \App\Models\Batch::find($submission->batch_id);

//             if ($batch) {

//                 $submission->batch_type = $batch->type; // Academic or GT

//                 if (!$submission->exam_name) {

//                     $submission->exam_name = $batch->exam_name;

//                 }

//             }

//         }



//         // Get formatted test name + attempted date from the specific assignment (preferred)

//         $assignment = null;

//         if (!empty($submission->assignment_id)) {

//             $assignment = \App\Models\TestAssignment::find((int) $submission->assignment_id);

//         }



//         // Fallback: infer assignment from batch + type

//         if (!$assignment) {

//             $assignment = \App\Models\TestAssignment::where('batch_id', $submission->batch_id)

//                 ->where('test_name', 'LIKE', '%' . $submission->test_type . '%')

//                 ->orderByDesc('start_date')

//                 ->first();

//         }

        

//         if ($assignment) {

//             $submission->formatted_test_name = $assignment->test_name; // e.g., "101 : Listening"

//             if (!$submission->batch_type && $assignment->batch) {

//                 $submission->batch_type = $assignment->batch->type ?? 'N/A';

//             }



//             // Only for display in Attempted Date column

//             $submission->attempted_at = $assignment->start_date;

//         } else {

//             $submission->formatted_test_name = $submission->test_name; // fallback to internal name

//             $submission->attempted_at = $submission->created_at;

//         }

        

//         // Fallback for exam_name

//         if (!$submission->exam_name) {

//             $submission->exam_name = $submission->student ? $submission->student->name : 'N/A';

//         }

        

//         // Fallback for batch_type

//         if (!isset($submission->batch_type)) {

//             $submission->batch_type = '-';

//         }



//         // Final fallback for attempted date

//         if (empty($submission->attempted_at)) {

//             $submission->attempted_at = $submission->created_at;

//         }



//     }



//     // Filter by attempted_date (previous behavior: based on submission created_at)

//     if ($request->filled('attempted_date')) {

//         $attemptedDate = $request->attempted_date;

//         $allSubmissions = $allSubmissions->filter(function($submission) use ($attemptedDate) {

//             return $submission->created_at

//                 && $submission->created_at->format('Y-m-d') === $attemptedDate;

//         })->values();

//     }



//     // Sort by submission time (previous behavior)

//     $allSubmissions = $allSubmissions

//         ->sortByDesc('created_at')

//         ->values();

    

//     // Filter by category if provided

//     if ($request->filled('category')) {

//         $category = $request->category;

//         $allSubmissions = $allSubmissions->filter(function($submission) use ($category) {

//             if ($category === 'Listening') {

//                 return $submission->test_type === 'Listening';

//             } elseif ($category === 'Academic Writing') {

//                 return $submission->test_type === 'Writing' && $submission->batch_type === 'Academic';

//             } elseif ($category === 'Academic Reading') {

//                 return $submission->test_type === 'Reading' && $submission->batch_type === 'Academic';

//             } elseif ($category === 'General Reading') {

//                 return $submission->test_type === 'Reading' && $submission->batch_type === 'GT';

//             } elseif ($category === 'General Writing') {

//                 return $submission->test_type === 'Writing' && $submission->batch_type === 'GT';

//             }

//             return true;

//         })->values();

//     }

    

//     // Paginate the combined collection

//     $perPage = 20;

//     $currentPage = request()->get('page', 1);

//     $submissions = new \Illuminate\Pagination\LengthAwarePaginator(

//         $allSubmissions->forPage($currentPage, $perPage),

//         $allSubmissions->count(),

//         $perPage,

//         $currentPage,

//         ['path' => request()->url(), 'query' => request()->query()]

//     );

    

//     return view('backend.pages.evaluation.ielts-evaluation', compact('submissions'));

// }



public function evaluateStudent($testName, $submissionId)

{

    $lower = strtolower((string) $testName);

    if (str_contains($lower, 'writing')) {

        $attempt = Writing::where('id', (int) $submissionId)

            ->whereRaw('LOWER(test_name) = ?', [strtolower((string) $testName)])

            ->first();



        abort_if(!$attempt, 404, 'Writing attempt not found.');



        return redirect()->route('writing.result.details', [

            'studentId' => $attempt->student_id,

            'testName' => $attempt->test_name,

            'submissionId' => $attempt->id,

        ]);

    }



    if (str_contains($lower, 'reading')) {

        $attempt = Reading::where('id', (int) $submissionId)

            ->where('test_name', $testName)

            ->first();



        abort_if(!$attempt, 404, 'Reading attempt not found.');



        return redirect()->route('reading.result.details', [

            'studentId' => $attempt->student_id,

            'testName' => $attempt->test_name,

            'submissionId' => $attempt->id,

        ]);

    }



    // Default: listening

    $attempt = Listining::where('id', (int) $submissionId)

        ->where('test_name', $testName)

        ->first();



    abort_if(!$attempt, 404, 'Listening attempt not found.');



    return redirect()->route('listening.result.details', [

        'studentId' => $attempt->student_id,

        'testName' => $attempt->test_name,

        'submissionId' => $attempt->id

    ]);

}



public function viewScore($studentId, $testName, $submissionId = null)

{

    $lower = strtolower((string) $testName);

    if (str_contains($lower, 'writing')) {

        return redirect()->route('writing.result.details', [

            'studentId' => $studentId,

            'testName' => $testName,

            'submissionId' => $submissionId,

        ]);

    }



    if (str_contains($lower, 'reading')) {

        return redirect()->route('reading.result.details', [

            'studentId' => $studentId,

            'testName' => $testName,

            'submissionId' => $submissionId,

        ]);

    }



    return redirect()->route('listening.result.details', [

        'studentId' => $studentId,

        'testName' => $testName,

        'submissionId' => $submissionId

    ]);

}



public function viewReport($studentId, $testName, $submissionId = null)

{

    $lower = strtolower((string) $testName);

    if (str_contains($lower, 'writing')) {

        return redirect()->route('writing.result.details', [

            'studentId' => $studentId,

            'testName' => $testName,

            'submissionId' => $submissionId,

        ]);

    }



    if (str_contains($lower, 'reading')) {

        return redirect()->route('reading.result.details', [

            'studentId' => $studentId,

            'testName' => $testName,

            'submissionId' => $submissionId,

        ]);

    }



    return redirect()->route('listening.result.details', [

        'studentId' => $studentId,

        'testName' => $testName,

        'submissionId' => $submissionId

    ]);

}



private function calculateListeningBandScore($correctAnswers)

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

