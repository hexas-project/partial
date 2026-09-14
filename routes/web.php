<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminOnly;
use App\Models\Reading;
use Illuminate\Http\Request;


// Frontend Test Routes - Accessible to admin or student session
Route::middleware('admin_or_student')->controller(FrontendController::class)->group(function () {
    Route::get('/speaking/zero', 'speakingZero')->name('speaking.zero');
    Route::get('/speaking/one', 'speakingOne')->name('speaking.one');
    Route::get('/speaking/two', 'speakingTwo')->name('speaking.two');
    Route::get('/speaking/three', 'speakingThree')->name('speaking.three');

    Route::get('/reading/gt', 'readingGT')->name('reading.gt');
    Route::get('/reading/academic', 'readingAcademic')->name('reading.academic');
    Route::get('/reading/gt/classOne', 'readingGTClassOne')->name('reading.gt.class.one');
    Route::get('/reading/gt/classTwo', 'readingGTClassTwo')->name('reading.gt.class.two');
    Route::get('/reading/gt/classThree', 'readingGTClassThree')->name('reading.gt.class.three');
    Route::get('/reading/gt/classFour', 'readingGTClassFour')->name('reading.gt.class.four');
    Route::get('/reading/gt/classFive', 'readingGTClassFive')->name('reading.gt.class.five');
    Route::get('/reading/gt/classSix', 'readingGTClassSix')->name('reading.gt.class.six');
    Route::get('/reading/gt/classSeven', 'readingGTClassSeven')->name('reading.gt.class.seven');

    Route::get('/reading/five', 'readingClassFive')->name('reading.class.five');
    Route::get('/reading/class/six', 'readingClassSix')->name('reading.class.six');
    Route::get('/reading/class/seven', 'readingClassSeven')->name('reading.class.seven');
    Route::get('/reading/class/eight', 'readingClassEight')->name('reading.class.eight');
    Route::get('/reading/class/nine', 'readingClassNine')->name('reading.class.nine');
    Route::get('/reading/class/ten', 'readingClassTen')->name('reading.class.ten');
    Route::get('/reading/class/eleven', 'readingClassEleven')->name('reading.class.eleven');
    Route::get('/reading/class/twelve', 'readingClassTwelve')->name('reading.class.twelve');

    Route::get('/reading/eight', 'readingEight')->name('reading.eight');
    Route::get('/reading/nine', 'readingNine')->name('reading.nine');
    Route::get('/reading/one', 'readingOne')->name('reading.one');
    Route::get('/reading/two', 'readingTwo')->name('reading.two');
    Route::get('/reading/three', 'readingThree')->name('reading.three');
    Route::get('/reading/four', 'readingFour')->name('reading.four');

    Route::post('/reading/submit', 'readingSubmitTest')->name('reading.submit');
    Route::post('/reading/autosave', 'readingAutoSave')->name('reading.autosave');

    // Writing Task One
    Route::get('/writing/taskOne/classOne', 'writingTaskOneCOne')->name('writing.task.one.one');
    Route::get('/writing/taskOne/classTwo', 'writingTaskOneCTwo')->name('writing.task.one.two');
    Route::get('/writing/taskOne/classThree', 'writingTaskOneCThree')->name('writing.task.one.three');
    Route::get('/writing/taskOne/classFour', 'writingTaskOneCFour')->name('writing.task.one.four');
    Route::get('/writing/taskOne/classFive', 'writingTaskOneCFive')->name('writing.task.one.five');
    Route::get('/writing/taskOne/classSix', 'writingTaskOneCSix')->name('writing.task.one.six');
    Route::get('/writing/taskOne/classSeven', 'writingTaskOneCSeven')->name('writing.task.one.seven');
    Route::get('/writing/taskOne/classEight', 'writingTaskOneCEight')->name('writing.task.one.eight');
    Route::get('/writing/taskOne/classNine', 'writingTaskOneCNine')->name('writing.task.one.nine');

    // Writing Task Two
    Route::get('/writing/taskTwo/classOne', 'writingTaskTwoCOne')->name('writing.task.two.one');
    Route::get('/writing/taskTwo/classTwo', 'writingTaskTwoCTwo')->name('writing.task.two.two');
    Route::get('/writing/taskTwo/classThree', 'writingTaskTwoCThree')->name('writing.task.two.three');
    Route::get('/writing/taskTwo/classFour', 'writingTaskTwoCFour')->name('writing.task.two.four');
    Route::get('/writing/taskTwo/classFive', 'writingTaskTwoCFive')->name('writing.task.two.five');
    Route::get('/writing/taskTwo/classSix', 'writingTaskTwoCSix')->name('writing.task.two.six');
    Route::get('/writing/taskTwo/classSeven', 'writingTaskTwoCSeven')->name('writing.task.two.seven');
    Route::get('/writing/taskTwo/classEight', 'writingTaskTwoCEight')->name('writing.task.two.eight');
    Route::get('/writing/taskTwo/classNine', 'writingTaskTwoCNine')->name('writing.task.two.nine');
    Route::get('/writing/taskTwo/classTen', 'writingTaskTwoCTen')->name('writing.task.two.ten');
    Route::get('/writing/taskTwo/classEleven', 'writingTaskTwoCEleven')->name('writing.task.two.eleven');
    Route::get('/writing/taskTwo/classTwelve', 'writingTaskTwoCTwelve')->name('writing.task.two.twelve');

    Route::post('/writing/submit', 'writingSubmitTest')->name('writing.submit');
    Route::post('/writing/autosave', 'writingAutoSave')->name('writing.autosave');

    Route::get('/listening/one', 'listeningOne')->name('listening.one');
    Route::get('/listening/two', 'listeningTwo')->name('listening.two');
    Route::get('/listening/three', 'listeningThree')->name('listening.three');
    Route::get('/listening/four', 'listeningFour')->name('listening.four');
    Route::get('/listening/fourone', 'listeningFourOne')->name('listening.fourOne');
    Route::get('/listening/five', 'listeningFive')->name('listening.five');
    Route::get('/listening/seven', 'listeningSeven')->name('listening.seven');
    Route::get('/listening/eight', 'listeningEight')->name('listening.eight');
    Route::get('/listening/nine', 'listeningNine')->name('listening.nine');
    Route::get('/listening/ten', 'listeningTen')->name('listening.ten');
    Route::get('/listening/eleven', 'listeningEleven')->name('listening.eleven');
    Route::get('/listening/twelve', 'listeningTwelve')->name('listening.twelve');
    Route::get('/listening/matching', 'listeningMatching')->name('listening.matching');

    Route::post('/test-submit', 'submitTest')->name('test.submit');
    Route::post('/test-autosave', 'autoSave')->name('test.autosave');

    // Server-side resume (cross-device): timer deadline + audio position
    Route::post('/test-progress/save', 'saveTestProgress')->name('test.progress.save');
    Route::get('/test-progress/get', 'getTestProgress')->name('test.progress.get');
    Route::post('/test-progress/clear', 'clearTestProgress')->name('test.progress.clear');
    Route::get('/listening/result/{testName}', 'showListeningTestResult')->name('listening.test.result');
    Route::get('/reading/result/{testName}', 'showReadingTestResult')->name('reading.test.result');
});

Route::middleware('auth')->group(function () {

    // Homepage - Requires admin login
    Route::middleware(AdminOnly::class)->controller(FrontendController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/index', 'index');

        Route::get('/index/speaking/test', 'speakingIndex')->name('speaking.index');
        Route::get('/index/listening/test', 'listeningIndex')->name('listening.index');
        Route::get('/index/reading/test', 'readingIndex')->name('reading.index');
        Route::get('/index/writing/test', 'writingIndex')->name('writing.index');

        Route::get('/index/writing/taskOne', 'writingIndexTaskOne')->name('writing.index.task.one');
        Route::get('/index/writing/taskTwo', 'writingIndexTaskTwo')->name('writing.index.task.two');
    });

    // Dashboard — only admin
    // Route::middleware(AdminOnly::class)->group(function () {
    //     Route::get('/dashboard', function () {
    //         return view('dashboard');
    //     })->name('dashboard');
    // });

   

    // Backend — only admin
   
     Route::controller(BackendController::class)->group(function () {
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');

    // Listening
    Route::get('/listening/answer/page','listeningAnswer')->name('listening.answer');
    Route::get('/listening/answer/{testName}','getListeningAnswers')->name('listening.answer.get');
    Route::post('/listening/answer','listeningAnswerStore')->name('listening.answer.store');
    Route::get('/listening-results','listeningResultsList')->name('listening.results.list');
    Route::get('/listening-result-band-scores','listeningBandScoreResults')->name('listening.results.band');
    Route::get('/export-listening-band-score-pdf', 'exportListeningBandScorePDF')->name('export.listening.band.pdf');
    Route::get('/listening-result/{studentId}/{testName}/{submissionId?}', 'listeningResultDetails')->name('listening.result.details');

    // Reading
    Route::get('/reading/answer/page','readingAnswer')->name('reading.answer');
    Route::get('/reading/answer/{testName}','getReadingAnswers')->name('reading.answer.get');
    Route::post('/reading/answer','readingAnswerStore')->name('reading.answer.store');
    Route::get('/reading-results','readingResultsList')->name('reading.results.list');
    Route::get('/reading-result-band-scores','readingBandScoreResults')->name('reading.results.band');
    Route::get('/export-reading-band-score-pdf', 'exportReadingBandScorePDF')->name('export.reading.band.pdf');
    Route::get('/reading-result/{studentId}/{testName}/{submissionId?}', 'readingResultDetails')->name('reading.result.details');

    // Writing
    Route::get('/writing-results','writngResultsList')->name('writing.results.list');
    Route::get('/writing-result/{studentId}/{testName}/{submissionId?}', 'writingResultDetails')->name('writing.result.details');

    // PDFs
    Route::get('/export-result-pdf/{testName}/{submissionId}', 'exportResultPDF')->name('export.result.pdf');
    Route::get('/export-reading-result-pdf/{testName}/{submissionId}', 'exportReadingResultPDF')->name('export.reading.result.pdf');
    Route::get('/export-writing-result-pdf/{testName}/{submissionId}', 'exportWritingResultPDF')->name('export.writing.result.pdf');

    // Register
    Route::get('/register/student', 'RegisterUser')->name('register.user');
    Route::post('/register/create', 'RegisterUserCreate')->name('register.user.create');
    Route::get('/register/teacher/list', 'RegisterTeacherList')->name('register.teacher.list');
    Route::post('/register/user/update/{id}', 'update')->name('users.update');
    Route::delete('/register/user/delete/{id}','destroy')->name('users.destroy');

    // Batch Enrollment (must be before batch management to avoid route conflict)
    Route::get('/batch-enrollment', 'batchEnrollmentPage')->name('batch.enrollment.page');
    Route::post('/batch-enrollment/store', 'storeBatchEnrollment')->name('batch.enrollment.store');
    Route::get('/view-students', 'viewStudentsPage')->name('view.students.page');
    Route::get('/batch/view/{id}', 'viewBatch')->name('batch.view');
    Route::delete('/batch/delete/{id}', 'deleteBatch')->name('batch.delete');
    Route::delete('/batch-student/delete/{id}', 'deleteBatchStudent')->name('batch.student.delete');

    // Assign Test
    Route::get('/assign-test', 'assignTestPage')->name('assign.test.page');
    Route::get('/get-exam-names', 'getExamNames')->name('get.exam.names');
    Route::get('/assigned-test-list', 'assignedTestList')->name('assigned.test.list');
    Route::post('/select-tests', 'selectTestsPage')->name('select.tests.page');
    Route::post('/assign-tests-final', 'assignTestsFinalPage')->name('assign.tests.final');
    Route::post('/save-test-assignments', 'saveTestAssignments')->name('save.test.assignments');
    Route::put('/update-assignment-dates/{id}', 'updateAssignmentDates')->name('update.assignment.dates');

    // Batch Management
    Route::get('/batch/{batch}', 'showBatchStudents')->name('batch.students');
    Route::post('/batch/{batch}/toggle-course', 'toggleCourse')->name('batch.toggleCourse');

    // Marks
    Route::post('/writing/{student}/{test}/marks', 'storeWritingMark')->name('results.marks.store');

    // (Optional consolidated page)
    // Route::get('/teacher/batch/{batch}/results', 'teacherBatchResults')->name('teacher.batch.results');
    
    // Evaluation Routes
    Route::get('/evaluation/ielts', 'ieltsEvaluation')->name('evaluation.ielts');
    Route::get('/evaluation/evaluate/{testName}/{submissionId}', 'evaluateStudent')->name('evaluation.evaluate');
    Route::get('/evaluation/view-score/{studentId}/{testName}/{submissionId?}', 'viewScore')->name('evaluation.view-score');
    Route::get('/evaluation/view-report/{studentId}/{testName}/{submissionId?}', 'viewReport')->name('evaluation.view-report');
});


 

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Student Login & Dashboard - Outside admin auth middleware
Route::controller(BackendController::class)->group(function () {
    Route::get('/exam/login', 'studentLoginPage')->name('student.login');
    Route::post('/exam/login', 'studentLoginSubmit')->name('student.login.submit');
    Route::middleware('single_student_session')->group(function () {
        Route::get('/exam/dashboard', 'studentDashboard')->name('student.dashboard');
        Route::get('/student/logout', 'studentLogout')->name('student.logout');
        Route::get('/test/confirm/{assignmentId}/{category}/{testId}', 'testConfirmation')->name('test.confirmation');
    });
});



require __DIR__.'/auth.php';
