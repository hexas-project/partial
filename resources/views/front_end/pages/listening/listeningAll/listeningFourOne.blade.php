<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <script>
        window._hxClosingTime = {{ $closingTimestamp ?? 'null' }};
        window._hxAssignmentId = {{ $assignmentId ?? 'null' }};
    </script>
    <script src="{{ asset('js/disable-find.js') . '?v=20260831b' }}"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">

    <style>
        .question_part {
            border: 1px solid gray;
            margin-top: 15px;
            padding: 10px;
            border-radius: 5px;
            background-color: #F7F7F7;
            height: 85px;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .tabs {
            display: flex;
            justify-content: space-between;
        }

        .tab {
            display: flex;
            gap: 15px;
            padding: 10px 20px;
            cursor: pointer;
            font-weight: bold;
            align-items: center;
            border-radius: 4px 4px 0 0;
        }

        .tab.active {
            color: green;
        }

        .tab .question-links {
            display: none;
            flex-wrap: wrap;
            gap: 12px;
        }

        .tab.active .question-links {
            display: flex;
        }

        .tab .question-placeholder {
            display: block;
            font-size: 12px;
            color: #999;
        }

        .tab.active .question-placeholder {
            display: none;
        }

        .question-link {
            text-decoration: none;
            color: gray;
        }

        .question-link.active {
            border: 2px solid gray;
            width: 25px;
            text-align: center;
        }

        .question-link.answered {
            color: green;
            font-weight: 700;
        }

        #startModal .modal-dialog {
            max-width: 450px;
        }

        #startModal .modal-content {
            border-radius: 12px;
            border: none;
            box-shadow: 0 10px 40px rgba(0,0,0,0.15);
        }

        #startModal .modal-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 12px 12px 0 0;
            border-bottom: none;
            padding: 18px 25px;
        }

        #startModal .modal-title {
            font-weight: 600;
            font-size: 18px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        #startModal .modal-title::before {
            content: "🎧";
            font-size: 24px;
        }

        #startModal .modal-body {
            padding: 25px 25px;
            background: #f8f9fa;
        }

        #startModal .instruction-text {
            color: #555;
            font-size: 14px;
            line-height: 1.5;
            margin-bottom: 20px;
            text-align: center;
        }

        #startModal .form-group {
            background: white;
            padding: 16px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        #startModal .form-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        #startModal .form-label::before {
            content: "👤";
            font-size: 18px;
        }

        #startModal #studentIdInput {
            padding: 14px 16px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.3s ease;
            width: 100%;
        }

        #startModal #studentIdInput:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            outline: none;
        }

        #startModal #studentIdInput::placeholder {
            color: #aaa;
        }

        #startModal #studentIdError {
            color: #dc3545;
            font-size: 13px;
            margin-top: 8px;
            display: none;
            font-weight: 500;
        }

        #startModal .modal-footer {
            padding: 16px 25px;
            border: none;
            background: white;
            border-radius: 0 0 12px 12px;
            justify-content: center;
        }

        #startModal #startTestButton {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 12px 40px;
            border-radius: 8px;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 13px;
            transition: all 0.3s ease;
            letter-spacing: 1px;
        }

        #startModal #startTestButton:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }

        #startModal #startTestButton:active {
            transform: translateY(0);
        }

        .modal-backdrop.show {
            opacity: 0.92;
        }

        /* .inline-input {
            border: none;
            border-bottom: 1px dotted #000;
            outline: none;
            background: transparent;
            border-radius: 0;
            padding: 0 2px;
            margin: 0 4px;
            min-width: 140px;
        } */

        .inline-input:focus {
            /* border-bottom: 1px dotted #000; */
            outline: none;
            box-shadow: none;
        }

        .options {
            list-style-type: none;
            padding-left: 0;
        }

        .options li {
            display: flex;
            align-items: center;
            margin: 10px 0;
            gap: 10px;
        }

        .options li:hover {
            cursor: pointer;
        }

        .options input[type="checkbox"] {
            margin-right: 10px;
        }

        .sidebar.open {
            right: 0px !important;
        }

        #main-content {
            transition: margin-right 0.3s ease;
        }

        #main-content.shifted {
            margin-right: 300px;
        }

        .mark,
        mark {
            padding: 0px !important;

        }

        mark[data-tooltip] {
            position: relative;
            cursor: pointer;
        }

        mark[data-tooltip]::after {
            content: '';
            position: absolute;
            width: 10px;
            height: 10px;
            background-color: red;
            border-radius: 50%;
            top: -5px;
            right: -5px;
            opacity: 0;
            transition: opacity 0.3s;
            z-index: 1000;
        }

        mark[data-tooltip]:hover::after {
            opacity: 1;
        }
    </style>
</head>

<body>
    <form action="{{ route('test.submit') }}" method="POST" id="testForm" spellcheck="false" autocomplete="off">
        @csrf

        @php
            $selected24_25 = array_values(array_filter([
                $answers[24] ?? null,
                $answers[25] ?? null,
            ], fn($v) => $v !== null && $v !== ''));

            $selected28_30 = array_values(array_filter([
                $answers[28] ?? null,
                $answers[29] ?? null,
                $answers[30] ?? null,
            ], fn($v) => $v !== null && $v !== ''));
        @endphp

        <nav class="navbar navbar-expand-lg" style="background-color: #e9bec2;">
            <div class="container-fluid px-5">
                 <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                <div class="collapse navbar-collapse show" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">
                                 <span class="material-icons-outlined" style="vertical-align: middle; margin-right: 5px;">schedule</span>
                                <strong id="timer">30 minutes left</strong>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item me-3">
                            <button id="finishButton" type="button" class="btn btn-outline-dark">Finish test</button>
                        </li>
                        <li class="nav-item">
                            <span id="noteToggle" class="material-icons-outlined">note_alt</span>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- CUSTOM CONTEXT MENU -->
        <div id="customContextMenu"
            style="
            position: absolute;
            background: white;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 5px;
            z-index: 999;
            display: none;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
            <div id="highlightOption" style="padding: 5px; cursor: pointer;">ðŸ–️ Highlight</div>
            <div id="notesOption" style="padding: 5px; cursor: pointer;">ðŸ“ Notes</div>
            <div id="clearOption" style="padding: 5px; cursor: pointer;">🗑️ Clear</div>
            <div id="allClear" style="padding: 5px; cursor: pointer;">🗑️ Clear all</div>
        </div>

        <!-- SIDEBAR FOR NOTES -->
        <div id="sidebar" style="
            position: fixed;
            top: 0;
            right: -300px;
            width: 300px;
            height: 100vh;
            background: #f9f9f9;
            border-left: 1px solid #ccc;
            z-index: 1000;
            overflow-y: auto;
            transition: right 0.3s ease;
            padding: 10px;
        ">
            <h4>Notes</h4>
            <button id="closeSidebar" type="button" style="
                position: absolute;
                top: 10px;
                right: 10px;
                background: none;
                border: none;
                font-size: 20px;
                cursor: pointer;
            ">&times;</button>
        </div>

        <!-- SIDEBAR TOGGLE BUTTON -->
        <button id="toggleSidebar" style="
            position: fixed;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            background: #ffffffff;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            z-index: 999;
        "></button>

        <div id="main-content" class="container-fluid px-5">
            <div class="tab-content active" id="part1" style="margin-bottom: 80px;">
                <input type="hidden" name="test_name" value="{{ $testName ?? 'listeningFourOne' }}">
                <input type="hidden" name="student_id" value="{{ auth()->id() ?? session('student_batch_id') }}">
                <input type="hidden" name="exam_student_id" id="examStudentIdField" value="">
                <input type="hidden" name="assignment_id" value="{{ $assignmentId ?? '' }}">

                <div class="question_part">
                    <h4>Part 1</h4>
                    <p>Questions 1–10</p>
                </div>

                <div class="mt-4">
                    <div class="d-flex align-items-center gap-3">
                        <h4>Questions 1–10</h4>
                        <!-- <audio controls src="{{ asset('audio/Partial104.mp3') }}"></audio> -->
                    </div><br>
                    <p><em>Choose The correct answer of question 1-4.</em></p>
                    <h5 class="mt-3"><strong>Example</strong></h5>
                    <p>Which <strong>course</strong> is the man interested in?</p>
                    <p>A. English</p>
                    <p>B. Mandarin</p>
                    <p>C. Japanese</p>

                    <p class="mt-3"><strong>1. What kind of course is the man seeking?</strong></p>
                    <p>
                        <label class="d-flex align-items-center gap-2">
                            <input type="radio" name="q1" value="A" {{ ($answers[1] ?? '') == 'A' ? 'checked' : '' }}>
                             Daytime
                        </label>
                    </p>
                    <p>
                        <label class="d-flex align-items-center gap-2">
                            <input type="radio" name="q1" value="B" {{ ($answers[1] ?? '') == 'B' ? 'checked' : '' }}>
                             Evenings
                        </label>
                    </p>
                    <p>
                        <label class="d-flex align-items-center gap-2">
                            <input type="radio" name="q1" value="C" {{ ($answers[1] ?? '') == 'C' ? 'checked' : '' }}>
                             Weekends
                        </label>
                    </p>

                    <p class="mt-3"><strong>2. How long does the man want to study?</strong></p>
                    <p>
                        <label class="d-flex align-items-center gap-2">
                            <input type="radio" name="q2" value="A" {{ ($answers[2] ?? '') == 'A' ? 'checked' : '' }}>
                             12 weeks
                        </label>
                    </p>
                    <p>
                        <label class="d-flex align-items-center gap-2">
                            <input type="radio" name="q2" value="B" {{ ($answers[2] ?? '') == 'B' ? 'checked' : '' }}>
                             6 months
                        </label>
                    </p>
                    <p>
                        <label class="d-flex align-items-center gap-2">
                            <input type="radio" name="q2" value="C" {{ ($answers[2] ?? '') == 'C' ? 'checked' : '' }}>
                             8 months
                        </label>
                    </p>

                    <p class="mt-3"><strong>3 What proficiency level is the student?</strong></p>
                    <p>
                        <label class="d-flex align-items-center gap-2">
                            <input type="radio" name="q3" value="A" {{ ($answers[3] ?? '') == 'A' ? 'checked' : '' }}>
                             Beginner
                        </label>
                    </p>
                    <p>
                        <label class="d-flex align-items-center gap-2">
                            <input type="radio" name="q3" value="B" {{ ($answers[3] ?? '') == 'B' ? 'checked' : '' }}>
                             Intermediate
                        </label>
                    </p>
                    <p>
                        <label class="d-flex align-items-center gap-2">
                            <input type="radio" name="q3" value="C" {{ ($answers[3] ?? '') == 'C' ? 'checked' : '' }}>
                             Advanced
                        </label>
                    </p>

                    <p class="mt-3"><strong>4. When does the man want to start the course?</strong></p>
                    <p>
                        <label class="d-flex align-items-center gap-2">
                            <input type="radio" name="q4" value="A" {{ ($answers[4] ?? '') == 'A' ? 'checked' : '' }}>
                             March
                        </label>
                    </p>
                    <p>
                        <label class="d-flex align-items-center gap-2">
                            <input type="radio" name="q4" value="B" {{ ($answers[4] ?? '') == 'B' ? 'checked' : '' }}>
                             June
                        </label>
                    </p>
                    <p>
                        <label class="d-flex align-items-center gap-2">
                            <input type="radio" name="q4" value="C" {{ ($answers[4] ?? '') == 'C' ? 'checked' : '' }}>
                             September
                        </label>
                    </p>

                    <hr class="my-4">

                    <h4>Question 5-10</h4>
                    <p> complete the form.<br> Write <strong>NO MORE THAN THREE WORDS </strong>in each gap.</p>
                    

                    <p class="mt-3">Name: Richard <input type="text" name="q5" class="inline-input" placeholder="5" value="{{ $answers[5] ?? '' }}" id="5"></p>
                    <p>E-mail address: <input type="text" name="q6" class="inline-input" placeholder="6" value="{{ $answers[6] ?? '' }}" id="6">@hotmail.com</p>
                    <p>Date of birth: <input type="text" name="q7" class="inline-input" placeholder="7" value="{{ $answers[7] ?? '' }}" id="7">1980</p>
                    <p>Reason for studying Japanese: <input type="text" name="q8" class="inline-input" placeholder="8" value="{{ $answers[8] ?? '' }}" id="8"></p>
                    <p>Specific learning needs: <input type="text" name="q9" class="inline-input" placeholder="9" value="{{ $answers[9] ?? '' }}" id="9"></p>
                    <p>Place of previous study (if any): <input type="text" name="q10" class="inline-input" placeholder="10" value="{{ $answers[10] ?? '' }}" id="10"></p>
                </div>
            </div>

            <div class="tab-content" id="part2" style="margin-bottom: 80px;">
                <div class="question_part">
                    <h4>Part 2</h4>
                    <p>Questions 11–20</p>
                </div>

                <div class="mt-4">
                    <p><em>Complete the sentences below.</em></p>
                    <p><strong>NO MORE THAN THREE WORDS AND/OR A NUMBER</strong> for each gap.</p>

                    <p class="mt-3">The story illustrates that dogs are <input type="text" name="q11" class="inline-input" placeholder="11" value="{{ $answers[11] ?? '' }}" id="11"> animals.</p>
                    <p>The people of the town built a <input type="text" name="q12" class="inline-input" placeholder="12" value="{{ $answers[12] ?? '' }}" id="12"> of a dog.</p>

                    <h5 class="mt-4"><strong>Questions 13-20</strong></h5>
                    <p><strong>NO MORE THAN THREE WORDS AND/OR A NUMBER</strong> for each gap.</p>

                    <div class="table-responsive mt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>TYPE OF WORKING DOG</th>
                                    <th>ESSENTIAL CHARACTERISTICS FOR THE JOB</th>
                                    <th>ADDITIONAL INFORMATION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Sheep dogs</td>
                                    <td>Smart, obedient</td>
                                    <td>Herd sheep<br>and <input type="text" name="q13" class="inline-input" placeholder="13" value="{{ $answers[13] ?? '' }}" id="13"> them</td>
                                </tr>
                                <tr>
                                    <td>Guide dogs</td>
                                    <td>Confident and <input type="text" name="q14" class="inline-input" placeholder="14" value="{{ $answers[14] ?? '' }}" id="14"></td>
                                    <td>Training paid for<br>by <input type="text" name="q15" class="inline-input" placeholder="15" value="{{ $answers[15] ?? '' }}" id="15"></td>
                                </tr>
                                <tr>
                                    <td>Guard dogs and<br><input type="text" name="q16" class="inline-input" placeholder="16" value="{{ $answers[16] ?? '' }}" id="16"><br>  </td>
                                    <td>Tough and courageous</td>
                                    <td>Dogs and trainers available through<br><input type="text" name="q17" class="inline-input" placeholder="17" value="{{ $answers[17] ?? '' }}" id="17"> </td>
                                </tr>
                                <tr>
                                    <td>Detector dogs</td>
                                    <td>Need to really <input type="text" name="q18" class="inline-input" placeholder="18" value="{{ $answers[18] ?? '' }}" id="18"></td>
                                    <td>In Sydney they<br>catch <input type="text" name="q19" class="inline-input" placeholder="19" value="{{ $answers[19] ?? '' }}" id="19"> a month</td>
                                </tr>
                                <tr>
                                    <td>Transport dogs</td>
                                    <td>Happy working <input type="text" name="q20" class="inline-input" placeholder="20" value="{{ $answers[20] ?? '' }}" id="20"></td>
                                    <td>International treaty bans huskies<br>from Antarctica</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="tab-content" id="part3" style="margin-bottom: 80px;">
                <div class="question_part">
                    <h4>Part 3</h4>
                    <p>Questions 21–30</p>
                </div>

                <div class="mt-4">
                    <h5><strong>Question 21-23</strong></h5>
                    <p><em>Complete the notes below.</em></p>
                    <p>Write <strong>NO MORE THAN THREE WORDS</strong> or <strong>A NUMBER</strong> for each answer.</p>

                    <h5 class="mt-3"><strong>Braille - a system of writing for the blind</strong></h5>

                    <ul class="mt-3">
                        <li>Louis Braille was blinded as a child in his <input type="text" name="q21" class="inline-input" placeholder="21" value="{{ $answers[21] ?? '' }}" id="21"></li>
                        <li>Braille invented the writing system in the year <input type="text" name="q22" class="inline-input" placeholder="22" value="{{ $answers[22] ?? '' }}" id="22"></li>
                        <li>An early writing system for the blind used embossed letters.</li>
                        <li>A military system using dots was called <input type="text" name="q23" class="inline-input" placeholder="23" value="{{ $answers[23] ?? '' }}" id="23"></li>
                    </ul>

                    <h5 class="mt-4"><strong>Questions 24-27</strong></h5>
                    <p><em>Choose the correct answer.
                    </em></p>

                    <p class="mt-3"><strong>24. Which diagram shows the Braille positions?</strong></p>
                    <span id="24"></span>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td>oooo<br>oooo<br>oooo</td>
                                <td>oo<br>oo<br>oo</td>
                                <td>ooo<br>ooo</td>
                            </tr>
                            <tr>
                                <td>A</td>
                                <td>B</td>
                                <td>C</td>
                            </tr>
                        </table>
                    </div>
                    <div class="mt-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q24" id="q24_A" value="A" {{ ($answers[24] ?? '') === 'A' ? 'checked' : '' }}>
                            <label class="form-check-label" for="q24_A">A</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q24" id="q24_B" value="B" {{ ($answers[24] ?? '') === 'B' ? 'checked' : '' }}>
                            <label class="form-check-label" for="q24_B">B</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q24" id="q24_C" value="C" {{ ($answers[24] ?? '') === 'C' ? 'checked' : '' }}>
                            <label class="form-check-label" for="q24_C">C</label>
                        </div>
                    </div>

                    <p class="mt-3"><strong>25 What can the combined dots represent?</strong></p>
                    <span id="25"></span>
                    <div class="mt-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q25" id="q25_A" value="A" {{ ($answers[25] ?? '') === 'A' ? 'checked' : '' }}>
                            <label class="form-check-label" for="q25_A"> both letters and words</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q25" id="q25_B" value="B" {{ ($answers[25] ?? '') === 'B' ? 'checked' : '' }}>
                            <label class="form-check-label" for="q25_B"> only individual words</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q25" id="q25_C" value="C" {{ ($answers[25] ?? '') === 'C' ? 'checked' : '' }}>
                            <label class="form-check-label" for="q25_C"> only letters of the alphabet</label>
                        </div>
                    </div>

                    <p class="mt-3"><strong>26. When was the Braille system officially adopted?</strong></p>
                    <span id="26"></span>
                    <div class="mt-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q26" id="q26_A" value="A" {{ ($answers[26] ?? '') === 'A' ? 'checked' : '' }}>
                            <label class="form-check-label" for="q26_A"> as soon as it was invented</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q26" id="q26_B" value="B" {{ ($answers[26] ?? '') === 'B' ? 'checked' : '' }}>
                            <label class="form-check-label" for="q26_B"> two years after it was invented</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q26" id="q26_C" value="C" {{ ($answers[26] ?? '') === 'C' ? 'checked' : '' }}>
                            <label class="form-check-label" for="q26_C"> after Louis Braille had died</label>
                        </div>
                    </div>

                    <p class="mt-3"><strong>27. What is unusual about the way Braille is written?</strong></p>
                    <span id="27"></span>
                    <div class="mt-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q27" id="q27_A" value="A" {{ ($answers[27] ?? '') === 'A' ? 'checked' : '' }}>
                            <label class="form-check-label" for="q27_A"> It can only be written using a machine.</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q27" id="q27_B" value="B" {{ ($answers[27] ?? '') === 'B' ? 'checked' : '' }}>
                            <label class="form-check-label" for="q27_B"> The texts have to be read backwards.</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q27" id="q27_C" value="C" {{ ($answers[27] ?? '') === 'C' ? 'checked' : '' }}>
                            <label class="form-check-label" for="q27_C"> Handwritten Braille is created in reverse.</label>
                        </div>
                    </div>

                    <h5 class="mt-4"><strong>Questions 28-30</strong></h5>
                    <p>What <strong>THREE SUBJECTS</strong> use Braille code?</p>
                    <ul class="options" data-range="28-30">
                        <li><label for="q28-30_a"><input type="checkbox" id="q28-30_a" name="q28-30[]" value="A" {{ in_array('A', $selected28_30, true) ? 'checked' : '' }}>  physics</label></li>
                        <li><label for="q28-30_b"><input type="checkbox" id="q28-30_b" name="q28-30[]" value="B" {{ in_array('B', $selected28_30, true) ? 'checked' : '' }}>  Maths</label></li>
                        <li><label for="q28-30_c"><input type="checkbox" id="q28-30_c" name="q28-30[]" value="C" {{ in_array('C', $selected28_30, true) ? 'checked' : '' }}>  Music</label></li>
                        <li><label for="q28-30_d"><input type="checkbox" id="q28-30_d" name="q28-30[]" value="D" {{ in_array('D', $selected28_30, true) ? 'checked' : '' }}>  Theater study</label></li>
                        <li><label for="q28-30_e"><input type="checkbox" id="q28-30_e" name="q28-30[]" value="E" {{ in_array('E', $selected28_30, true) ? 'checked' : '' }}>  Science</label></li>
                    </ul>
                </div>
            </div>

            <div class="tab-content" id="part4" style="margin-bottom: 80px;">
                <div class="question_part">
                    <h4>Part 4</h4>
                    <p>Questions 31–40</p>
                </div>

                <div class="mt-4">
                    <h5 class="mt-3"><strong>Question 31-35</strong></h5>
                    <p>Complete the notes. <strong>Write NO MORE THAN THREE WORDS </strong>and/ or <strong>A NUMBER </strong>in each gap.</P>

                    <h5 class="mt-3"><strong>Question:</strong></h5>
                    <p>Can babies remember any <input type="text" name="q31" class="inline-input" placeholder="31" value="{{ $answers[31] ?? '' }}" id="31">?</p>

                    <h5 class="mt-4"><strong>Experiment with babies:</strong></h5>
                    <p><strong>Apparatus:</strong></p>
                    <p>baby in cot</p>
                    <p>colourful mobile</p>
                    <p>some <input type="text" name="q32" class="inline-input" placeholder="32" value="{{ $answers[32] ?? '' }}" id="32"></p>
                    <p>Re-introduce mobile between one and <input type="text" name="q33" class="inline-input" placeholder="33" value="{{ $answers[33] ?? '' }}" id="33">later.</p>

                    <h5 class="mt-4"><strong>Table showing memory test results</strong></h5>
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Baby's age</th>
                                    <th>Maximum memory span</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2 months</td>
                                    <td>2 days</td>
                                </tr>
                                <tr>
                                    <td>3 months</td>
                                    <td><input type="text" name="q34" class="inline-input" placeholder="34" value="{{ $answers[34] ?? '' }}" id="34"></td>
                                </tr>
                                <tr>
                                    <td>21 months</td>
                                    <td>several weeks</td>
                                </tr>
                                <tr>
                                    <td>2 years</td>
                                    <td><input type="text" name="q35" class="inline-input" placeholder="35" value="{{ $answers[35] ?? '' }}" id="35"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h5 class="mt-4"><strong>Questions 36-40</strong></h5>
                    <p>Write <strong>NO MORE THAN TWO WORDS OR NUMBER</strong> for each answer</p>

                    <div class="border p-3 mt-3">
                        <p><strong>Research questions:</strong></p>
                        <p>Is memory linked to <input type="text" name="q36" class="inline-input" placeholder="36" value="{{ $answers[36] ?? '' }}" id="36"> development?</p>
                        <p>Can babies <input type="text" name="q37" class="inline-input" placeholder="37" value="{{ $answers[37] ?? '' }}" id="37">their memories?</p>
                        <p><strong>Experiment with older children:</strong></p>
                        <p>Stages in incident:</p>
                        <p>a) lecture taking place</p>
                        <p>b) object falls over</p>
                        <p>c) <input type="text" name="q38" class="inline-input" placeholder="38" value="{{ $answers[38] ?? '' }}" id="38"></p>
                    </div>

                    <h5 class="mt-4"><strong>Table showing memory test results</strong></h5>
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Age</th>
                                    <th>% remembered next day</th>
                                    <th>% remembered after 5 months</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Adults</td>
                                    <td>70%</td>
                                    <td><input type="text" name="q39" class="inline-input" placeholder="39" value="{{ $answers[39] ?? '' }}" id="39"></td>
                                </tr>
                                <tr>
                                    <td>9-year-olds</td>
                                    <td>70%</td>
                                    <td>Less than 60%</td>
                                </tr>
                                <tr>
                                    <td>6-year-olds</td>
                                    <td>Just under 70%</td>
                                    <td>better than <input type="text" name="q40" class="inline-input" placeholder="40" value="{{ $answers[40] ?? '' }}" id="40"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="fixed-bottom d-flex justify-content-end mb-5 px-5" style="z-index: 999;">
            <button id="prev-question" class="btn btn-dark me-2" style="font-size: 1.5rem;">&#8592;</button>
            <button id="next-question" class="btn btn-dark ms-2" style="font-size: 1.5rem;">&#8594;</button>
        </div> -->
        <div class="fixed-bottom d-flex justify-content-end mb-5 px-5" style="gap: 5px; z-index: 2050; pointer-events: none;">
            <button id="prev-question" type="button" class="btn btn-dark" style="font-size: 1.5rem; pointer-events: auto;">
                <span class="material-icons-outlined">arrow_back</span>
            </button>
            <button id="next-question" type="button" class="btn btn-dark" style="font-size: 1.5rem; pointer-events: auto;">
                <span class="material-icons-outlined">arrow_forward</span>
            </button>
        </div>

        <div class="tabs fixed-bottom" style="background-color: white; margin:0px; margin-top: 100px;">
            <div class="tab active" data-tab="part1">
                <span class="tab-title">Part 1</span>
                <div class="question-links">
                    <a href="#" class="question-link" data-question="1">1</a>
                    <a href="#" class="question-link" data-question="2">2</a>
                    <a href="#" class="question-link" data-question="3">3</a>
                    <a href="#" class="question-link" data-question="4">4</a>
                    <a href="#" class="question-link" data-question="5">5</a>
                    <a href="#" class="question-link" data-question="6">6</a>
                    <a href="#" class="question-link" data-question="7">7</a>
                    <a href="#" class="question-link" data-question="8">8</a>
                    <a href="#" class="question-link" data-question="9">9</a>
                    <a href="#" class="question-link" data-question="10">10</a>
                </div>
                <span class="question-placeholder">1 of 10</span>
            </div>
            <div class="tab" data-tab="part2">
                <span class="tab-title">Part 2</span>
                <div class="question-links">
                    <a href="#" class="question-link" data-question="11">11</a>
                    <a href="#" class="question-link" data-question="12">12</a>
                    <a href="#" class="question-link" data-question="13">13</a>
                    <a href="#" class="question-link" data-question="14">14</a>
                    <a href="#" class="question-link" data-question="15">15</a>
                    <a href="#" class="question-link" data-question="16">16</a>
                    <a href="#" class="question-link" data-question="17">17</a>
                    <a href="#" class="question-link" data-question="18">18</a>
                    <a href="#" class="question-link" data-question="19">19</a>
                    <a href="#" class="question-link" data-question="20">20</a>
                </div>
                <span class="question-placeholder">11 of 20</span>
            </div>
            <div class="tab" data-tab="part3">
                <span class="tab-title">Part 3</span>
                <div class="question-links">
                    <a href="#" class="question-link" data-question="21">21</a>
                    <a href="#" class="question-link" data-question="22">22</a>
                    <a href="#" class="question-link" data-question="23">23</a>
                    <a href="#" class="question-link" data-question="24">24</a>
                    <a href="#" class="question-link" data-question="25">25</a>
                    <a href="#" class="question-link" data-question="26">26</a>
                    <a href="#" class="question-link" data-question="27">27</a>
                    <a href="#" class="question-link" data-question="28">28</a>
                    <a href="#" class="question-link" data-question="29">29</a>
                    <a href="#" class="question-link" data-question="30">30</a>
                </div>
                <span class="question-placeholder">21 of 30</span>
            </div>
            <div class="tab" data-tab="part4">
                <span class="tab-title">Part 4</span>
                <div class="question-links">
                    <a href="#" class="question-link" data-question="31">31</a>
                    <a href="#" class="question-link" data-question="32">32</a>
                    <a href="#" class="question-link" data-question="33">33</a>
                    <a href="#" class="question-link" data-question="34">34</a>
                    <a href="#" class="question-link" data-question="35">35</a>
                    <a href="#" class="question-link" data-question="36">36</a>
                    <a href="#" class="question-link" data-question="37">37</a>
                    <a href="#" class="question-link" data-question="38">38</a>
                    <a href="#" class="question-link" data-question="39">39</a>
                    <a href="#" class="question-link" data-question="40">40</a>
                </div>
                <span class="question-placeholder">31 of 40</span>
            </div>
        </div>
    </form>

    <!-- Start Modal -->
    <div class="modal fade" id="startModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Start Listening Test</h5>
                </div>
                <div class="modal-body">
                    <p class="instruction-text">Please enter your Student ID and click OK to begin the listening test.</p>
                    <div class="form-group">
                        <label for="studentIdInput" class="form-label">Student ID</label>
                        <input type="text" class="form-control" id="studentIdInput" placeholder="Enter your Student ID" minlength="8" inputmode="text" pattern="[A-Za-z0-9]{8,}" required>
                        <small id="studentIdError">⚠️ Student ID must be at least 8 characters</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="startTestButton" type="button" class="btn btn-primary">Start Test</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Finish Test Modal -->
    <div class="modal fade" id="finishModal" tabindex="-1" aria-labelledby="finishModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="finishModalLabel">Are you sure you want to complete the test?</h5>
                </div>
                <div class="modal-body">
                    Once you continue, you'll be taken back to the index page.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Go back</button>
                    <button type="button" class="btn btn-primary" id="continueButton">Continue</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const tabs = document.querySelectorAll('.tab');
        const tabContents = document.querySelectorAll('.tab-content');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                // Remove active from all tabs and content
                tabs.forEach(t => {
                    t.classList.remove('active');
                    const qLinks = t.querySelector('.question-links');
                    const qPlaceholder = t.querySelector('.question-placeholder');
                    if (qLinks) qLinks.style.display = 'none';
                    if (qPlaceholder) qPlaceholder.style.display = 'block';
                });

                tabContents.forEach(content => content.classList.remove('active'));

                // Activate current tab and content
                tab.classList.add('active');
                const tabId = tab.getAttribute('data-tab');
                document.getElementById(tabId).classList.add('active');

                // Show question-links, hide placeholder
                const qLinks = tab.querySelector('.question-links');
                const qPlaceholder = tab.querySelector('.question-placeholder');
                if (qLinks && qPlaceholder) {
                    qLinks.style.display = 'flex';
                    qPlaceholder.style.display = 'none';
                }
            });
        });

        // Initial setup: show only part1 question links
        window.addEventListener('DOMContentLoaded', () => {
            tabs.forEach(tab => {
                const qLinks = tab.querySelector('.question-links');
                const qPlaceholder = tab.querySelector('.question-placeholder');
                if (tab.getAttribute('data-tab') === 'part1') {
                    tab.classList.add('active');
                    if (qLinks) qLinks.style.display = 'flex';
                    if (qPlaceholder) qPlaceholder.style.display = 'none';
                } else {
                    if (qLinks) qLinks.style.display = 'none';
                    if (qPlaceholder) qPlaceholder.style.display = 'block';
                }
            });
        });

        document.querySelectorAll('.question-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelectorAll('.question-link').forEach(l => l.classList.remove('active'));
                this.classList.add('active');
                const qNum = this.getAttribute('data-question');
                const el = document.getElementById(qNum);
                if (el) {
                    el.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    if (el.tagName === 'INPUT') el.focus();
                }
            });
        });

        function setAnswered(questionNumber, isAnswered) {
            const link = document.querySelector(`.question-link[data-question="${questionNumber}"]`);
            if (!link) return;
            if (isAnswered) link.classList.add('answered');
            else link.classList.remove('answered');
        }

        // Update answered state for Q24–Q27 (radio) like other questions
        function refreshAnswered24To27() {
            [24, 25, 26, 27].forEach((n) => {
                const checked = document.querySelector(`input[type="radio"][name="q${n}"]:checked`);
                setAnswered(String(n), !!checked);
            });
        }

        // Update answered state for Q28–Q30 (checkbox group: choose THREE)
        function refreshAnswered28To30() {
            const checked = document.querySelectorAll('input[type="checkbox"][name="q28-30[]"]:checked').length;
            setAnswered('28', checked >= 1);
            setAnswered('29', checked >= 2);
            setAnswered('30', checked >= 3);

            // Progress active link based on how many options are selected
            const target = String(Math.min(30, 27 + Math.max(1, checked)));
            document.querySelectorAll('.question-link').forEach(l => l.classList.remove('active'));
            const targetLink = document.querySelector(`.question-link[data-question="${target}"]`);
            if (targetLink) targetLink.classList.add('active');
        }

        // Initialize on page load (handles returning with saved answers)
        document.addEventListener('DOMContentLoaded', refreshAnswered24To27);
        document.querySelectorAll('input[type="radio"][name="q24"], input[type="radio"][name="q25"], input[type="radio"][name="q26"], input[type="radio"][name="q27"]').forEach((radio) => {
            radio.addEventListener('change', refreshAnswered24To27);
        });

        document.addEventListener('DOMContentLoaded', refreshAnswered28To30);
        document.querySelectorAll('input[type="checkbox"][name="q28-30[]"]').forEach((cb) => {
            cb.addEventListener('change', refreshAnswered28To30);
        });

        document.addEventListener('DOMContentLoaded', function() {
            const startModal = new bootstrap.Modal(document.getElementById('startModal'));
            const finishModal = new bootstrap.Modal(document.getElementById('finishModal'));
            const startButton = document.getElementById('startTestButton');
            const finishButton = document.getElementById('finishButton');
            const continueButton = document.getElementById('continueButton');

            startModal.show();

            const studentIdInput = document.getElementById('studentIdInput');
            if (studentIdInput) {
                studentIdInput.addEventListener('keypress', function(event) {
                    if (event.key === 'Enter') {
                        event.preventDefault();
                        startButton.click();
                    }
                });
            }

            // Timer functionality
            let timeRemaining = 0;
            let timerInterval;
            const specificAudio = new Audio('{{ asset("audio/Partial104.mp3") }}');
            specificAudio.preload = 'metadata';
            window._hxAudio = specificAudio;
            specificAudio.addEventListener('loadedmetadata', function () {
                if (timeRemaining === 0) timeRemaining = Math.ceil(specificAudio.duration);
            }, { once: true });

            function updateTimer() {
                const minutes = Math.floor(timeRemaining / 60);
                const seconds = timeRemaining % 60;
                document.getElementById('timer').textContent = `${minutes} : ${seconds.toString().padStart(2, '0')} minutes remaining`;
                
                if (timeRemaining <= 0) {
                    clearInterval(timerInterval);
                    document.getElementById('testForm').submit();
                }
                timeRemaining--;
            }

            // Start test: validate Student ID, then play audio and start timer
            startButton.addEventListener('click', function() {
                const studentIdInput = document.getElementById('studentIdInput');
                const studentIdError = document.getElementById('studentIdError');

                if (studentIdInput && studentIdError) {
                    const studentId = studentIdInput.value.trim();
                    const isValidStudentId = /^[a-zA-Z0-9]{8,}$/.test(studentId);
                    if (!isValidStudentId) {
                        studentIdError.textContent = '⚠️ Student ID must be at least 8 characters';
                        studentIdError.style.display = 'block';
                        studentIdInput.style.borderColor = 'red';
                        return;
                    }

                    sessionStorage.setItem('examStudentId', studentId);

                    const examStudentIdField = document.getElementById('examStudentIdField');
                    if (examStudentIdField) {
                        examStudentIdField.value = studentId;
                    }
                    studentIdError.style.display = 'none';
                    studentIdInput.style.borderColor = '#ddd';
                    startModal.hide();

                    const elem = document.documentElement;
                    if (elem.requestFullscreen) {
                        elem.requestFullscreen().catch(() => {});
                    }
                }

                // Start the timer
                if (timeRemaining === 0) timeRemaining = Math.ceil(specificAudio.duration) || 30 * 60;
                timerInterval = setInterval(updateTimer, 1000);

                // Play the specific audio file
                (function () {
                    var _s = null;
                    var _aid = window._hxAssignmentId ? ('_' + window._hxAssignmentId) : '';
                    // key টা disable-find.js বানায় (Student ID সহ) — নিজে বানালে ওর সাথে মিলত না
                    var _key = window._hxResumeKey || ('hx_resume_' + window.location.pathname + _aid);
                    try { _s = JSON.parse(localStorage.getItem(_key)); } catch (e) {}
                    var _closingOk = !window._hxClosingTime || Date.now() < window._hxClosingTime;
                    if (_s && _s.audioTime > 0 && _s.remainingSeconds > 5 && _closingOk) {
                        var _target = _s.audioTime;
                        // ---- AUDIO RESUME: saved position à¦ direct jump (fast-forward ছাড়া) ----
                        // Range-support থাকলে (production) পà§রথম seek-ই সফল হয়। php artisan serve
                        // à¦র মতো server à¦ seek fail করে ০-তে ফিরে যায় — তখন muted রেখে অপেকà§ষা,
                        // target অংশ buffer à¦ à¦লে buffer থেকে seek। currentTime set করার পরপরই
                        // নতà§ন value দেখায় (seek pending), তাই সফলতা যাচাই হয় !seeking দিয়ে।
                        specificAudio.muted = true;
                        window.__hxSeekPending = true;
                        var _bufferedCovers = function (el, t) {
                            try {
                                for (var i = 0; i < el.buffered.length; i++) {
                                    if (el.buffered.start(i) <= t && t <= el.buffered.end(i)) return true;
                                }
                            } catch (e) {}
                            return false;
                        };
                        var _trySeek = function () { try { specificAudio.currentTime = _target; } catch (e) {} };
                        if (specificAudio.readyState >= 1) _trySeek();
                        else specificAudio.addEventListener('loadedmetadata', _trySeek, { once: true });
                        var _seekTries = 0;
                        var _seekIv = setInterval(function () {
                            // আসল সফলতা: কোনো seek pending নেই à¦বং position টিকে আছে
                            if (!specificAudio.seeking && specificAudio.currentTime >= _target - 1.5) {
                                window.__hxSeekPending = false;
                                specificAudio.muted = false;
                                clearInterval(_seekIv);
                                return;
                            }
                            // আগের seek বà§যরà§থ (০-তে ফিরে গেছে) — target অংশ buffer à¦ à¦লে আবার চেষà§টা
                            if (!specificAudio.seeking && _bufferedCovers(specificAudio, _target)) _trySeek();
                            if (++_seekTries > 60) {   // ~১৫ সেকেনà§ডেও না হলে হাল ছেড়ে unmute
                                window.__hxSeekPending = false;
                                specificAudio.muted = false;
                                clearInterval(_seekIv);
                            }
                        }, 250);
                    }
                })();
                specificAudio.play().catch(error => {
                    console.log('Audio play failed:', error);
                });
            });

            finishButton.addEventListener('click', function(e) {
                e.preventDefault();
                finishModal.show();
            });

            // Prevent double submission
            let isSubmitting = false;

            continueButton.addEventListener('click', function() {
                if (isSubmitting) {
                    return; // Prevent double submission
                }
                isSubmitting = true;
                
                // Disable the button to prevent multiple clicks
                continueButton.disabled = true;
                continueButton.textContent = 'Submitting...';
                
                document.getElementById('testForm').submit();
            });
        });

        // Autosave (debounced like listeningThree)
        document.addEventListener('DOMContentLoaded', function() {
            const dirtyInputs = new Map();
            let autosaveTimer = null;
            const autosaveDelayMs = 10000;

            function postAutosave(questionNumber, answer) {
                const formData = new FormData();
                formData.append('student_id', '{{ auth()->id() ?? session("student_batch_id") }}');
                formData.append('test_name', document.querySelector('input[name="test_name"]').value);
                formData.append('assignment_id', document.querySelector('input[name="assignment_id"]')?.value || '');
                formData.append('question_number', questionNumber);
                formData.append('answer', answer);

                return fetch('{{ route('test.autosave') }}', {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    body: formData
                }).catch(() => {});
            }

            function autosaveFromInput(input) {
                if (!input) return Promise.resolve();

                if (input.type === 'checkbox') {
                    const groupName = input.name;
                    const selectedValues = Array.from(document.querySelectorAll(`input[name="${groupName}"]:checked`)).map(cb => cb.value);
                    const questionNumber = groupName.replace('q', '').replace('[]', '');
                    return postAutosave(questionNumber, selectedValues.join(','));
                }

                if (input.type === 'radio') {
                    const name = input.name;
                    const checked = document.querySelector(`input[type="radio"][name="${name}"]:checked`);
                    const questionNumber = name.replace('q', '');
                    return postAutosave(questionNumber, checked ? checked.value : '');
                }

                const questionNumber = (input.name || '').replace('q', '');
                return postAutosave(questionNumber, input.value);
            }

            function flushDirtyAutosaves() {
                if (dirtyInputs.size === 0) return Promise.resolve();

                const inputs = Array.from(dirtyInputs.values());
                dirtyInputs.clear();

                let chain = Promise.resolve();
                inputs.forEach((inp) => {
                    chain = chain.then(() => autosaveFromInput(inp));
                });
                return chain;
            }

            function scheduleAutosaveFlush() {
                if (autosaveTimer) clearTimeout(autosaveTimer);
                autosaveTimer = setTimeout(() => {
                    flushDirtyAutosaves();
                }, autosaveDelayMs);
            }

            function markDirty(input) {
                if (!input) return;
                const key = input.name || input.id;
                if (!key) return;
                dirtyInputs.set(key, input);
                scheduleAutosaveFlush();
            }

            document.querySelectorAll('input[type="radio"], input[type="text"], input[type="checkbox"]').forEach(input => {
                input.addEventListener('change', function() {
                    markDirty(this);
                });
            });

            const form = document.getElementById('testForm');
            if (form) {
                // Prevent Enter key from submitting the form
                form.addEventListener('keypress', function(e) {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        return false;
                    }
                });
                
                form.addEventListener('submit', function(e) {
                    if (autosaveTimer) {
                        clearTimeout(autosaveTimer);
                        autosaveTimer = null;
                    }

                    e.preventDefault();
                    flushDirtyAutosaves().finally(() => {
                        form.submit();
                    });
                });
            }
        });

        document.querySelectorAll('.options').forEach(optionList => {
            const range = optionList.getAttribute('data-range');
            const [start, end] = range.split('-').map(Number);
            const maxSelections = end - start + 1;

            optionList.querySelectorAll('input[type="checkbox"]').forEach((checkbox) => {
                checkbox.addEventListener('change', function() {
                    const checked = optionList.querySelectorAll('input[type="checkbox"]:checked');
                    if (checked.length > maxSelections) {
                        this.checked = false;
                    }
                });
            });
        });

        document.querySelectorAll('input[type="text"]').forEach(input => {
            if (!input.hasAttribute('placeholder')) return;

            input.dataset.originalPlaceholder = input.getAttribute('placeholder') || '';

            input.addEventListener('focus', function() {
                this.setAttribute('placeholder', '');
            });

            input.addEventListener('blur', function() {
                if ((this.value || '').trim() === '') {
                    this.setAttribute('placeholder', this.dataset.originalPlaceholder || '');
                }
            });
        });

        // Arrow navigation script
        (function() {
            const allLinks = Array.from(document.querySelectorAll('.question-link'));
            let currentIndex = 0;

            function activateTabForQuestion(num) {
                const label = document.getElementById(num);
                if (!label) return;

                const partContent = label.closest('.tab-content');
                if (!partContent) return;

                document.querySelectorAll('.tab-content').forEach(tc => tc.classList.remove('active'));
                partContent.classList.add('active');

                document.querySelectorAll('.tab').forEach(tab => {
                    const qLinks = tab.querySelector('.question-links');
                    const qPlaceholder = tab.querySelector('.question-placeholder');

                    if (tab.getAttribute('data-tab') === partContent.id) {
                        tab.classList.add('active');
                        if (qLinks) qLinks.style.display = 'flex';
                        if (qPlaceholder) qPlaceholder.style.display = 'none';
                    } else {
                        tab.classList.remove('active');
                        if (qLinks) qLinks.style.display = 'none';
                        if (qPlaceholder) qPlaceholder.style.display = 'block';
                    }
                });
            }

            function scrollAndFocus(num) {
                const label = document.getElementById(num);
                if (label) {
                    label.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                }

                const inputField = document.getElementById(num);
                if (inputField && inputField.tagName === 'INPUT') {
                    setTimeout(() => inputField.focus(), 400);
                }
            }

            function setActiveQuestion(index) {
                currentIndex = index;
                const qNum = allLinks[index].getAttribute('data-question');

                allLinks.forEach(link => link.classList.remove('active'));
                allLinks[index].classList.add('active');

                activateTabForQuestion(qNum);
                scrollAndFocus(qNum);
            }

            allLinks.forEach((link, index) => {
                link.addEventListener('click', e => {
                    e.preventDefault();
                    setActiveQuestion(index);
                });
            });

            document.getElementById('prev-question').addEventListener('click', (e) => {
                e.preventDefault();
                if (currentIndex > 0) setActiveQuestion(currentIndex - 1);
            });

            document.getElementById('next-question').addEventListener('click', (e) => {
                e.preventDefault();
                if (currentIndex < allLinks.length - 1) setActiveQuestion(currentIndex + 1);
            });

            // Track manual input field clicks to update currentIndex
            document.querySelectorAll('input[type="text"], input[type="checkbox"], input[type="radio"]').forEach(input => {
                input.addEventListener('focus', function() {
                    let questionNum = this.id || this.name.replace('q', '').replace('[]', '');
                    // Radios can have ids like q24_A, normalize to 24
                    const idMatch = (this.id || '').match(/^q(\d+)_/);
                    if (idMatch && idMatch[1]) {
                        questionNum = idMatch[1];
                    }
                    // Checkbox groups can have ids like q28-30_a, normalize to 28
                    const rangeIdMatch = (this.id || '').match(/^q(\d+)-\d+_/);
                    if (rangeIdMatch && rangeIdMatch[1]) {
                        questionNum = rangeIdMatch[1];
                    }
                    const linkIndex = allLinks.findIndex(link => link.getAttribute('data-question') === questionNum);
                    if (linkIndex !== -1) {
                        currentIndex = linkIndex;
                        allLinks.forEach(link => link.classList.remove('active'));
                        allLinks[linkIndex].classList.add('active');
                    }
                });
            });

            setActiveQuestion(0);
        })();
    </script>

    <!-- sidebar js code  -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');
            const noteToggle = document.getElementById('noteToggle');
            const closeBtn = document.getElementById('closeSidebar');

            if (noteToggle && sidebar && mainContent) {
                noteToggle.addEventListener('click', (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    sidebar.style.right = '0px';
                    sidebar.classList.add('open');
                    mainContent.classList.add('shifted');
                });
            }

            if (closeBtn && sidebar && mainContent) {
                closeBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    sidebar.style.right = '-300px';
                    sidebar.classList.remove('open');
                    mainContent.classList.remove('shifted');
                });
            }
        });
    </script>

    <!-- highlight and note script  -->
    <script>
        // Highlight and Notes Functionality
        let selectionRange = null;
        let lastSelectionRange = null;
        let clickedMark = null;
        let activePopup = null;

        const contextMenu = document.getElementById('customContextMenu');
        const highlightOption = document.getElementById('highlightOption');
        const notesOption = document.getElementById('notesOption');
        const clearOption = document.getElementById('clearOption');
        const allClearOption = document.getElementById('allClear');
        const sidebar = document.getElementById('sidebar');
        const toggleSidebar = document.getElementById('toggleSidebar');
        const closeSidebar = document.getElementById('closeSidebar');

        // Preserve selection so multi-line highlights work even if right-click collapses selection
        function updateLastSelectionRange() {
            const selection = window.getSelection();
            if (selection && selection.rangeCount > 0 && selection.toString().trim() !== '') {
                lastSelectionRange = selection.getRangeAt(0).cloneRange();
            }
        }

        function highlightRange(range) {
            if (!range || range.collapsed) return;

            const commonAncestor = range.commonAncestorContainer;
            const root = commonAncestor.nodeType === Node.ELEMENT_NODE ? commonAncestor : commonAncestor.parentNode;
            if (!root) return;

            const walker = document.createTreeWalker(
                root,
                NodeFilter.SHOW_TEXT,
                {
                    acceptNode: (node) => {
                        if (!node || !node.nodeValue || node.nodeValue.trim() === '') return NodeFilter.FILTER_REJECT;
                        if (node.parentElement && node.parentElement.closest('mark')) return NodeFilter.FILTER_REJECT;
                        try {
                            return range.intersectsNode(node) ? NodeFilter.FILTER_ACCEPT : NodeFilter.FILTER_REJECT;
                        } catch (e) {
                            return NodeFilter.FILTER_REJECT;
                        }
                    }
                }
            );

            const textNodes = [];
            while (walker.nextNode()) {
                textNodes.push(walker.currentNode);
            }

            for (let i = textNodes.length - 1; i >= 0; i--) {
                const node = textNodes[i];
                const startOffset = (node === range.startContainer) ? range.startOffset : 0;
                const endOffset = (node === range.endContainer) ? range.endOffset : node.nodeValue.length;
                if (startOffset === endOffset) continue;

                const subRange = document.createRange();
                subRange.setStart(node, startOffset);
                subRange.setEnd(node, endOffset);

                const mark = document.createElement('mark');
                mark.style.backgroundColor = 'yellow';
                mark.appendChild(subRange.extractContents());
                subRange.insertNode(mark);
            }
        }

        function markRangeWithAttrs(range, attrs = {}) {
            if (!range || range.collapsed) return [];

            const commonAncestor = range.commonAncestorContainer;
            const root = commonAncestor.nodeType === Node.ELEMENT_NODE ? commonAncestor : commonAncestor.parentNode;
            if (!root) return [];

            const walker = document.createTreeWalker(
                root,
                NodeFilter.SHOW_TEXT,
                {
                    acceptNode: (node) => {
                        if (!node || !node.nodeValue || node.nodeValue.trim() === '') return NodeFilter.FILTER_REJECT;
                        if (node.parentElement && node.parentElement.closest('mark')) return NodeFilter.FILTER_REJECT;
                        try {
                            return range.intersectsNode(node) ? NodeFilter.FILTER_ACCEPT : NodeFilter.FILTER_REJECT;
                        } catch (e) {
                            return NodeFilter.FILTER_REJECT;
                        }
                    }
                }
            );

            const textNodes = [];
            while (walker.nextNode()) {
                textNodes.push(walker.currentNode);
            }

            const createdMarks = [];

            for (let i = textNodes.length - 1; i >= 0; i--) {
                const node = textNodes[i];
                const startOffset = (node === range.startContainer) ? range.startOffset : 0;
                const endOffset = (node === range.endContainer) ? range.endOffset : node.nodeValue.length;
                if (startOffset === endOffset) continue;

                const subRange = document.createRange();
                subRange.setStart(node, startOffset);
                subRange.setEnd(node, endOffset);

                const mark = document.createElement('mark');
                mark.style.backgroundColor = 'yellow';
                Object.keys(attrs).forEach((k) => {
                    mark.dataset[k] = attrs[k];
                });

                mark.appendChild(subRange.extractContents());
                subRange.insertNode(mark);
                createdMarks.push(mark);
            }

            return createdMarks;
        }

        function unwrapMark(markEl) {
            if (!markEl || !markEl.parentNode) return;
            const parent = markEl.parentNode;
            while (markEl.firstChild) {
                parent.insertBefore(markEl.firstChild, markEl);
            }
            parent.removeChild(markEl);
        }

        function marksForId(markId) {
            if (!markId) return [];
            return Array.from(document.querySelectorAll(`mark[data-mark-id="${markId}"]`));
        }

        document.addEventListener('mouseup', updateLastSelectionRange);
        document.addEventListener('keyup', updateLastSelectionRange);

        // Sidebar toggle functionality
        toggleSidebar.addEventListener('click', function() {
            if (sidebar.style.right === '0px') {
                sidebar.style.right = '-300px';
            } else {
                sidebar.style.right = '0px';
            }
        });

        closeSidebar.addEventListener('click', function() {
            sidebar.style.right = '-300px';
        });

        // Context menu on right-click
        document.addEventListener('contextmenu', function(e) {
            e.preventDefault();
            
            const selection = window.getSelection();
            clickedMark = null;
            
            // Check if clicked on highlighted text (mark element) or inside one
            let target = e.target;
            while (target && target.tagName !== 'MARK' && target.parentNode) {
                target = target.parentNode;
                if (target.tagName === 'MARK') break;
            }
            
            if (target && target.tagName === 'MARK') {
                clickedMark = target;
            }
            
            if (selection.toString().trim() !== '' || clickedMark) {
                selectionRange = clickedMark
                    ? null
                    : (selection.rangeCount > 0 ? selection.getRangeAt(0).cloneRange() : lastSelectionRange ? lastSelectionRange.cloneRange() : null);

                showContextMenuAt(e.clientX, e.clientY);
            }
        });

        // Hide context menu on click elsewhere
        document.addEventListener('click', function(e) {
            if (!contextMenu.contains(e.target)) {
                contextMenu.style.display = 'none';
            }
        });

        function showContextMenuAt(clientX, clientY) {
            contextMenu.style.display = 'block';

            const menuWidth = contextMenu.offsetWidth;
            const menuHeight = contextMenu.offsetHeight;

            const padding = 8;
            const viewportWidth = window.innerWidth;
            let viewportHeight = window.innerHeight;

            const bottomBar = document.querySelector('.tabs.fixed-bottom');
            const bottomBarHeight = bottomBar ? bottomBar.getBoundingClientRect().height : 0;
            const usableViewportHeight = Math.max(0, viewportHeight - bottomBarHeight);

            let left = clientX;
            let top = clientY;

            if (left + menuWidth + padding > viewportWidth) {
                left = viewportWidth - menuWidth - padding;
            }
            if (top + menuHeight + padding > usableViewportHeight) {
                top = usableViewportHeight - menuHeight - padding;
            }

            left = Math.max(padding, left);
            top = Math.max(padding, top);

            contextMenu.style.left = (left + window.scrollX) + 'px';
            contextMenu.style.top = (top + window.scrollY) + 'px';
        }

        // Highlight only
        highlightOption.addEventListener('click', function() {
            const rangeToUse = selectionRange || (lastSelectionRange ? lastSelectionRange.cloneRange() : null);
            if (rangeToUse) {
                highlightRange(rangeToUse);
            }
            contextMenu.style.display = 'none';
        });

        // Add note with popup
        notesOption.addEventListener('click', function() {
            // If right-clicked on already highlighted text, just open its popup
            if (clickedMark) {
                showNotePopup(clickedMark);
                contextMenu.style.display = 'none';
                return;
            }
            
            // Otherwise, create new highlight with note
            const rangeToUse = selectionRange || (lastSelectionRange ? lastSelectionRange.cloneRange() : null);
            if (rangeToUse) {
                const markId = Date.now().toString();
                const createdMarks = markRangeWithAttrs(rangeToUse, {
                    tooltip: '',
                    note: '',
                    markId: markId,
                });

                if (createdMarks.length === 0) {
                    contextMenu.style.display = 'none';
                    return;
                }

                const headerText = createdMarks.map(m => (m.innerText || '').trim()).filter(Boolean).join(' ').trim();

                createdMarks.forEach((mark) => {
                    mark.addEventListener('click', function(e) {
                        e.stopPropagation();
                        showNotePopup(mark);
                    });
                });

                // Also add entry to sidebar
                const noteDiv = document.createElement('div');
                noteDiv.classList.add('sidebar-note-item');
                noteDiv.innerHTML = `
                    <div class="sidebar-header" style="margin-bottom: 3px; cursor: pointer;">${headerText}</div>
                    <div class="sidebar-note-content" style="color: #666; white-space: pre-wrap;"></div>
                `;
                noteDiv.style.borderBottom = '1px solid #ccc';
                noteDiv.style.padding = '8px';
                
                noteDiv.dataset.markId = markId;
                
                sidebar.appendChild(noteDiv);

                // Click sidebar item to open popup
                noteDiv.addEventListener('click', () => {
                    showNotePopup(createdMarks[0]);
                });

                // Immediately show popup for new note
                showNotePopup(createdMarks[0]);
            }
            contextMenu.style.display = 'none';
        });

        // Clear single highlight - only works when right-clicking on highlighted text
        clearOption.addEventListener('click', function() {
            if (clickedMark) {
                const markId = clickedMark.dataset.markId;
                
                // Remove from sidebar
                if (markId) {
                    const sidebarItem = document.querySelector(`.sidebar-note-item[data-mark-id="${markId}"]`);
                    if (sidebarItem) {
                        sidebarItem.remove();
                    }
                }
                
                const marksToClear = markId ? marksForId(markId) : [clickedMark];
                marksToClear.forEach((m) => unwrapMark(m));

                clickedMark = null;
            }
            contextMenu.style.display = 'none';
        });

        // Clear all highlights and notes
        allClearOption.addEventListener('click', function() {
            document.querySelectorAll('mark').forEach(marked => {
                unwrapMark(marked);
            });
            const notePopup = document.querySelector('.note-popup');
            if (notePopup) notePopup.remove();
            activePopup = null;

            sidebar.innerHTML = `
                <h4>Notes & Highlights</h4>
                <button id="closeSidebar" type="button" style="
                    position: absolute;
                    top: 10px;
                    right: 10px;
                    background: none;
                    border: none;
                    font-size: 20px;
                    cursor: pointer;
                ">&times;</button>
            `;

            document.getElementById('closeSidebar').addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                sidebar.style.right = '-300px';
                sidebar.classList.remove('open');
                const mainContent = document.getElementById('main-content');
                if (mainContent) {
                    mainContent.classList.remove('shifted');
                }
            });

            // Auto close the notes area after clearing all
            setTimeout(() => {
                sidebar.style.right = '-300px';
                sidebar.classList.remove('open');

                const mainContent = document.getElementById('main-content');
                if (mainContent) {
                    mainContent.classList.remove('shifted');
                }
            }, 100);
            
            contextMenu.style.display = 'none';
        });

        // Function to show note popup for a mark element
        function showNotePopup(mark) {
            if (activePopup) {
                activePopup.remove();
                document.removeEventListener('click', handleOutsideClick);
            }

            const markIdForPopup = mark.dataset.markId;
            const popupHeaderText = markIdForPopup
                ? marksForId(markIdForPopup).map(m => (m.innerText || '').trim()).filter(Boolean).join(' ').trim()
                : (mark.innerText || '');

            const notePopup = document.createElement('div');
            notePopup.classList.add('note-popup');
            notePopup.style.position = 'absolute';
            notePopup.style.background = 'yellow';
            notePopup.style.padding = '10px';
            notePopup.style.border = '1px solid #ccc';
            notePopup.style.cursor = 'move';
            notePopup.style.zIndex = '2000';
            notePopup.style.width = '200px';
            notePopup.style.boxShadow = '2px 2px 8px rgba(0, 0, 0, 0.2)';
            
            notePopup.innerHTML = `
                <div class="drag-handle" style="background: linear-gradient(to bottom, #f0f0f0, #d0d0d0); padding: 8px; cursor: move; border-bottom: 2px solid #999; display: flex; justify-content: space-between; align-items: center; user-select: none;">
                    <span style="font-size: 12px; color: #666;">Drag to move</span>
                    <span class="close-note" style="cursor: pointer; font-size: 20px; font-weight: bold; color: #666;">&times;</span>
                </div>
                <div class="popup-header" contenteditable="true" style="font-weight: bold; cursor: text; padding: 8px; background: rgba(0,0,0,0.05); margin-bottom: 5px; border: 1px solid #ccc; outline: none;">${popupHeaderText}</div>
                <textarea placeholder="Add your note here..." style="width:100%; border:1px solid #ccc; background-color:yellow; min-height: 60px; cursor: text; padding: 5px; resize: vertical;">${mark.dataset.note || ''}</textarea>
            `;
            document.body.appendChild(notePopup);
            activePopup = notePopup;

            // Position popup near mark
            const rect = mark.getBoundingClientRect();
            notePopup.style.left = rect.left + window.scrollX + 'px';
            notePopup.style.top = rect.bottom + window.scrollY + 5 + 'px';

            // Close button
            notePopup.querySelector('.close-note').addEventListener('click', () => {
                notePopup.remove();
                activePopup = null;
                document.removeEventListener('click', handleOutsideClick);
            });

            // Save note text on input (real-time)
            const textarea = notePopup.querySelector('textarea');
            
            function updateNote() {
                const markId = mark.dataset.markId;
                if (markId) {
                    marksForId(markId).forEach((m) => {
                        m.dataset.note = textarea.value;
                    });
                } else {
                    mark.dataset.note = textarea.value;
                }
                
                // Update sidebar note content
                if (markId) {
                    const sidebarItem = document.querySelector(`.sidebar-note-item[data-mark-id="${markId}"]`);
                    if (sidebarItem) {
                        const sidebarNoteContent = sidebarItem.querySelector('.sidebar-note-content');
                        if (sidebarNoteContent) {
                            sidebarNoteContent.textContent = textarea.value;
                        }
                    }
                }
            }
            
            textarea.addEventListener('input', updateNote);
            textarea.addEventListener('blur', updateNote);
            
            // Focus textarea and position cursor at end so you can continue typing
            setTimeout(() => {
                textarea.focus();
                const length = textarea.value.length;
                textarea.setSelectionRange(length, length);
                textarea.scrollTop = textarea.scrollHeight;
            }, 100);

            // Save header text changes to sidebar
            const popupHeader = notePopup.querySelector('.popup-header');
            popupHeader.addEventListener('input', () => {
                const markId = mark.dataset.markId;
                if (markId) {
                    const sidebarItem = document.querySelector(`.sidebar-note-item[data-mark-id="${markId}"]`);
                    if (sidebarItem) {
                        const sidebarText = sidebarItem.querySelector('div');
                        if (sidebarText) {
                            sidebarText.textContent = popupHeader.innerText;
                        }
                    }
                }
            });
            
            // Make popup draggable from the drag handle
            let isDragging = false, offsetX, offsetY;
            const dragHandle = notePopup.querySelector('.drag-handle');
            
            dragHandle.addEventListener('mousedown', (e) => {
                // Don't drag if clicking the close button
                if (!e.target.classList.contains('close-note')) {
                    isDragging = true;
                    offsetX = e.clientX - notePopup.offsetLeft;
                    offsetY = e.clientY - notePopup.offsetTop;
                    e.preventDefault();
                }
            });
            
            document.addEventListener('mousemove', (e) => {
                if (isDragging) {
                    notePopup.style.left = (e.clientX - offsetX) + 'px';
                    notePopup.style.top = (e.clientY - offsetY) + 'px';
                }
            });
            
            document.addEventListener('mouseup', () => {
                isDragging = false;
            });

            setTimeout(() => {
                document.addEventListener('click', handleOutsideClick);
            }, 0);
        }

        function handleOutsideClick(e) {
            if (activePopup && !activePopup.contains(e.target) && e.target.tagName !== 'MARK') {
                activePopup.remove();
                activePopup = null;
                document.removeEventListener('click', handleOutsideClick);
            }
        }
    </script>
</body>

</html>
