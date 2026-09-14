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

    <!-- Material Icons CSS (Fixed Link) -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">

    <style>
        .nav-item {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .nav-link {
            display: flex;
            align-items: center;
        }

        .navbar-nav.ml-auto {
            margin-left: auto;
            display: flex;
            align-items: center;
        }

        .material-icons-outlined {
            margin-right: 8px;
        }

        .question_part {
            border: 1px solid gray;
            margin-top: 15px;
            padding: 10px;
            border-radius: 5px;
            background-color: #F7F7F7;
            height: 85px;
        }

        /* Styling for question options */
        .options {
            list-style-type: none;
            padding-left: 0;
        }

        .options li {
            display: flex;
            align-items: center;
            margin: 10px 0;
            padding: 5px;
            gap: 10px;

        }

        .options li:hover {

            cursor: pointer;
        }

        .options input[type="radio"] {
            margin-right: 10px;
        }


        .question {
            margin-bottom: 15px;
        }

        .row {
            margin-top: 20px;
        }

        .tabs {
            display: flex;
            margin-bottom: 20px;
            justify-content: space-between;


        }

        .tab {
            display: flex;
            gap: 15px;
            padding: 10px 20px;
            cursor: pointer;
            font-weight: bold;
            text-align: center;
            align-items: center;
            border-bottom: none;
            margin-right: 5px;
            border-radius: 4px 4px 0 0;
            transition: background-color 0.3s;
        }

        .tab:hover {
            /* background-color: #f1f1f1; */
        }

        .tab.active {

            color: green;

        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 25px;
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



        .question-number.active {
            padding: 2px 4px;
            border: 3px solid green;

        }

        .question-link {
            text-decoration: none;
            color: gray;

        }

        .question-link.active {
            border: 2px solid gray;
            width: 25px;

        }

        .tab .question-links {
            display: none;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 5px;
        }

        .tab .question-placeholder {
            display: block;
            font-size: 12px;
            color: #999;
        }

        .tab.active .question-links {
            display: flex;
        }

        .tab.active .question-placeholder {
            display: none;
        }

        /* sidebar css  */
        .sidebar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
            margin-bottom: 10px;
            padding: 5px 10px;
        }

        .close-btn {
            cursor: pointer;
            font-size: 24px;
            padding: 4px 8px;
            border-radius: 4px;
        }

        .close-btn:hover {
            background-color: #ddd;
        }

        .sidebar {
            height: 85%;
            width: 0;
            position: fixed;
            top: 0;
            right: 0;
            background-color: #f1f1f1;
            overflow-x: hidden;
            transition: width 0.3s;
            /* padding: 20px; */
            z-index: 1050;
        }

        .sidebar.open {
            width: 300px;
        }

        #main-content {
            transition: margin-right 0.3s ease;
        }

        #main-content.shifted {
            margin-right: 300px;
        }

        /* Popup note style */
        .note-popup {
            position: absolute;
            background: yellow;
            padding: 10px;
            border: 1px solid #ccc;
            cursor: move;
            z-index: 2000;
            width: 200px;
            box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.2);
        }

        .note-popup .close-note {
            position: absolute;
            top: 2px;
            right: 5px;
            cursor: pointer;
            font-weight: bold;
            color: #333;
        }

        .custom-context-menu {
            position: absolute;
            background: white;
            border: 1px solid #ccc;
            z-index: 2100;
        }

        .custom-context-menu div {
            padding: 8px 12px;
            cursor: pointer;
        }

        .custom-context-menu div:hover {
            background: #eee;
        }

        ul.options {
            line-height: 5px;
        }

        li {
            margin-top: 15px;
        }

        .ques {
            font-weight: bold;
        }

        /* map style  */
        .map-wrapper {
            position: relative;
            width: 800px;
            margin: 40px auto;
        }

        .map-wrapper img {
            width: 100%;
            display: block;
        }

        .map-wrapper input[type="text"] {
            position: absolute;
            width: 125px;
            padding: 2px 5px;
            border: 1px solid #000;
            border-radius: 4px;
        }

        /* Position inputs based on image layout */
        .input-16 {
            top: 535px;
            left: 50px;
        }

        .input-17 {
            top: 220px;
            left: 65px;
        }

        .input-18 {
            top: 220px;
            left: 314px;
        }

        .input-19 {
            top: -5px;
            right: 16px;
        }

        .input-20 {
            top: 305px;
            right: 15px;
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
            background: orange;
            border: 1px solid #333;
            border-radius: 3px;
            bottom: 70%;
            left: 50%;
            transform: translateX(-50%);
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.2s;
            z-index: 1000;
        }

        mark[data-tooltip]:hover::after {
            opacity: 1;
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
            border: none;
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
            margin-bottom: 18px;
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
            font-size: 14px;
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
            font-size: 16px;
            transition: all 0.3s;
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
            font-size: 15px;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        #startModal #startTestButton:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }

        #startModal #startTestButton:active {
            transform: translateY(0);
        }

        .modal-backdrop {
            background-color: rgba(0, 0, 0, 0.95) !important;
            opacity: 1 !important;
        }

        .modal-backdrop.show {
            opacity: 1 !important;
        }
    </style>
</head>

<body>
    <form action="{{ route('test.submit') }}" method="POST" id="testForm" spellcheck="false" autocomplete="off">
        @csrf
        <!-- Sidebar -->
        <div id="sidebar" class="sidebar">
            <div class="sidebar-header">
                <h5>Notes</h5>
                <span class="close-btn">&times;</span>
            </div>

        </div>
        <div id="main-content">
            <nav class="navbar navbar-expand-lg" style="background-color: #e9bec2;">
                <div class="container-fluid px-5">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">
                                     <span class="material-icons-outlined" style="vertical-align: middle; margin-right: 5px;">schedule</span>
                                    <strong id="timer">30 minutes left</strong>
                                </a>
                            </li>
                            <li class="nav-item">
                                <span class="material-icons-outlined">headset_mic</span>
                                <audio id="testAudio" src="{{ asset('audio/Test-10.mp3') }}"
                                    preload="auto"></audio>Audio is
                                playing...

                            </li>
                        </ul>
                        <!-- Aligning the Finish button and note icon to the right -->
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item me-3">
                                <button id="finishButton" class="btn btn-outline-dark">Finish test</button>
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
                <h4>Notes & Highlights</h4>
                <button id="closeSidebar" style="
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

            <!-- question part 1 -->
            <div class="container-fluid px-5">
                <div class="tab-content active" id="part1" style="margin-bottom: 80px;">
                    {{-- hidden input  --}}
                    <input type="hidden" name="test_name" value="{{ $testName ?? 'listeningFour' }}">
                    <input type="hidden" name="student_id" value="{{ auth()->id() ?? session('student_batch_id') }}">
                    <input type="hidden" name="exam_student_id" id="examStudentIdField" value="">
                    <input type="hidden" name="assignment_id" value="{{ $assignmentId ?? '' }}">
                    <div class="question_part">
                        <h4>Part 1</h4>
                        <p>Questions 1–10  </p>
                    </div>

                    <div class="mt-4">
                        <!--<h4>Questions 1–4</h4>-->
                        <div class="d-flex  align-items-center gap-3 ">

                            <h4>Questions 1–4</h4>
                           <!-- <audio controls
                                src="{{ asset('audio/105.MP3') }}"></audio> --> 
                        </div><br>
                        <p>Answer the questions. Write <strong>NO MORE THAN THREE WORDS AND/OR A NUMBER</strong> in each gap.</p>

                        <h5 class="mt-3"><strong>DVD Customer Profile</strong></h5>
                        
                        <p>Have you owned a DVD player before? No</p>
                        <p>What is the maximum you want to spend on a DVD player?  <input type="text" name="q1" placeholder="1" class="inline-input" value="{{ $answers[1] ?? '' }}" id="1"></p>
                        <p>How often do you watch DVDs?  <input type="text" name="q2" placeholder="2" class="inline-input" value="{{ $answers[2] ?? '' }}" id="2"></p>
                        <p>What type of films do you enjoy?  <input type="text" name="q3" placeholder="3" class="inline-input" value="{{ $answers[3] ?? '' }}" id="3"></p>
                        <p>What other DVDs (non-film) do you watch?  <input type="text" name="q4" placeholder="4" class="inline-input" value="{{ $answers[4] ?? '' }}" id="4"></p>

                        <hr class="my-4">

                        <h4>Questions 5–10</h4>
                        <p>Complete the Table below. Write <strong>NO MORE THAN TWO WORDS AND/OR A NUMBER</strong> in each gap.</p>

                        <table class="table table-bordered mt-3" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Player</th>
                                    <th>Features</th>
                                    <th>Cost</th>
                                    <th>After-sales service</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>DB 30</td>
                                    <td>basic</td>
                                    <td>£69</td>
                                    <td> <input type="text" name="q5" placeholder="5" class="inline-input" value="{{ $answers[5] ?? '' }}" id="5"> only</td>
                                </tr>
                                <tr>
                                    <td>XL 643</td>
                                    <td>Can also  <input type="text" name="q6" placeholder="6" class="inline-input" value="{{ $answers[6] ?? '' }}" id="6"></td>
                                    <td> <input type="text" name="q7" placeholder="7" class="inline-input" value="{{ $answers[7] ?? '' }}" id="7"></td>
                                    <td> <input type="text" name="q8" placeholder="8" class="inline-input" value="{{ $answers[8] ?? '' }}" id="8"> at reduced cost</td>
                                </tr>
                                <tr>
                                    <td>TriX 24</td>
                                    <td>Will also play  <input type="text" name="q9" placeholder="9" class="inline-input" value="{{ $answers[9] ?? '' }}" id="9"></td>
                                    <td>£94 including <input type="text" name="q10" placeholder="10" class="inline-input" value="{{ $answers[10] ?? '' }}" id="10"></td>
                                    <td>Guaranteed for 3 years</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    

                </div>
                <!-- question part 2 -->
                <div class="tab-content" id="part2" style="margin-bottom: 80px;">
                    <div class="question_part">
                        <h4>Part 2</h4>
                        <p>Questions 11–20</p>
                    </div>

                    <div class="mt-4">
                        <h4>Questions 11–20</h4>
                        <p>Complete the sentences. Write <strong>NO MORE THAN THREE WORDS</strong> in each gap.</p>

                        <h5 class="mt-3"><strong>Your home:</strong></h5>
                        <p> A quarter of break-ins are through the <input type="text" name="q11" placeholder="11" class="inline-input" value="{{ $answers[11] ?? '' }}" id="11"></p>
                        <p> The <input type="text" name="q12" placeholder="12" class="inline-input" value="{{ $answers[12] ?? '' }}" id="12"> of the house should also be protected.</p>
                        <p> You should warn burglars your house is alarmed by putting a <input type="text" name="q13" placeholder="13" class="inline-input" value="{{ $answers[13] ?? '' }}" id="13"> in the window.</p>

                        <h5 class="mt-3"><strong>The alarms:</strong></h5>
                        <p> The alarms show a constant <input type="text" name="q14" placeholder="14" class="inline-input" value="{{ $answers[14] ?? '' }}" id="14"></p>
                        <p> The alarms can be set off by a <input type="text" name="q15" placeholder="15" class="inline-input" value="{{ $answers[15] ?? '' }}" id="15"></p>
                        <p> The alarms are connected to the <input type="text" name="q16" placeholder="16" class="inline-input" value="{{ $answers[16] ?? '' }}" id="16"></p>

                        <h5 class="mt-3"><strong>Installation:</strong></h5>
                        <p> The alarms are usually installed in <input type="text" name="q17" placeholder="17" class="inline-input" value="{{ $answers[17] ?? '' }}" id="17"></p>
                        <p> The security code should be kept <input type="text" name="q18" placeholder="18" class="inline-input" value="{{ $answers[18] ?? '' }}" id="18"></p>
                        <p> The alarms can be installed <input type="text" name="q19" placeholder="19" class="inline-input" value="{{ $answers[19] ?? '' }}" id="19"> at an additional cost.</p>
                        <p> Customers can pay <input type="text" name="q20" placeholder="20" class="inline-input" value="{{ $answers[20] ?? '' }}" id="20"> for their alarm system.</p>
                    </div>



                </div>
                <!-- question part 3 -->
                <div class="tab-content" id="part3" style="margin-bottom: 80px;">
                    <div class="question_part">
                        <h4>Part 3</h4>
                        <p>Questions 21–30</p>
                    </div>

                    <div class="mt-4">
                        <h4>Questions 21–27</h4>
                        <p>Complete the summary below. Write <strong>ONE WORD ONLY</strong> in each gap.</p>

                        <h5 class="mt-3"><strong>Essay Writing</strong></h5>
                        <p>Essay writing is simply the process of  <input type="text" name="q21" placeholder="21" class="inline-input" value="{{ $answers[21] ?? '' }}" id="21"> information and presenting your  <input type="text" name="q22" placeholder="22" class="inline-input" value="{{ $answers[22] ?? '' }}" id="22">.</p>
                        <p>You will need to use skills of analysis,  <input type="text" name="q23" placeholder="23" class="inline-input" value="{{ $answers[23] ?? '' }}" id="23"> and expression.</p>
                        <p>The key to producing a good essay is in the  <input type="text" name="q24" placeholder="24" class="inline-input" value="{{ $answers[24] ?? '' }}" id="24">.</p>
                        <p>You will find several books in the library to help you with the particular  <input type="text" name="q25" placeholder="25" class="inline-input" value="{{ $answers[25] ?? '' }}" id="25"> of academic writing.</p>
                        <p>When you have completed your essay you must remember to  <input type="text" name="q26" placeholder="26" class="inline-input" value="{{ $answers[26] ?? '' }}" id="26"> it carefully and take out anything irrelevant.</p>
                        <p>Also, once you have received your mark, you should check your essay through as, by doing this, you can  <input type="text" name="q27" placeholder="27" class="inline-input" value="{{ $answers[27] ?? '' }}" id="27"> from it.</p>

                        <hr class="my-4">

                        <h4>Questions 28–30</h4>

                        <p>Choose three correct answer.</br>
                             28-30 Which <strong>THREE</strong> pieces of advice does the tutor give the student?</p>

                        <div class="mt-3" id="q28-30-container">
                            <label style="display: block; margin: 10px 0;">
                                <input type="checkbox" class="q28-30-checkbox" value="A" data-question-group="28-30" {{ ($answers[28] ?? '') == 'A' || ($answers[29] ?? '') == 'A' || ($answers[30] ?? '') == 'A' ? 'checked' : '' }}> break the question down into smaller questions
                            </label>
                            <label style="display: block; margin: 10px 0;">
                                <input type="checkbox" class="q28-30-checkbox" value="B" data-question-group="28-30" {{ ($answers[28] ?? '') == 'B' || ($answers[29] ?? '') == 'B' || ($answers[30] ?? '') == 'B' ? 'checked' : '' }}> check the vocabulary in the question
                            </label>
                            <label style="display: block; margin: 10px 0;">
                                <input type="checkbox" class="q28-30-checkbox" value="C" data-question-group="28-30" {{ ($answers[28] ?? '') == 'C' || ($answers[29] ?? '') == 'C' || ($answers[30] ?? '') == 'C' ? 'checked' : '' }}> limit how much you read
                            </label>
                            <label style="display: block; margin: 10px 0;">
                                <input type="checkbox" class="q28-30-checkbox" value="D" data-question-group="28-30" {{ ($answers[28] ?? '') == 'D' || ($answers[29] ?? '') == 'D' || ($answers[30] ?? '') == 'D' ? 'checked' : '' }}> make sure you have good notes
                            </label>
                            <label style="display: block; margin: 10px 0;">
                                <input type="checkbox" class="q28-30-checkbox" value="E" data-question-group="28-30" {{ ($answers[28] ?? '') == 'E' || ($answers[29] ?? '') == 'E' || ($answers[30] ?? '') == 'E' ? 'checked' : '' }}> use only a few quotations
                            </label>
                            <label style="display: block; margin: 10px 0;">
                                <input type="checkbox" class="q28-30-checkbox" value="F" data-question-group="28-30" {{ ($answers[28] ?? '') == 'F' || ($answers[29] ?? '') == 'F' || ($answers[30] ?? '') == 'F' ? 'checked' : '' }}> ask a friend to read your essay
                            </label>
                            <label style="display: block; margin: 10px 0;">
                                <input type="checkbox" class="q28-30-checkbox" value="G" data-question-group="28-30" {{ ($answers[28] ?? '') == 'G' || ($answers[29] ?? '') == 'G' || ($answers[30] ?? '') == 'G' ? 'checked' : '' }}> try to be objective
                            </label>
                            <input type="hidden" name="q28" id="q28" value="{{ $answers[28] ?? '' }}">
                            <input type="hidden" name="q29" id="q29" value="{{ $answers[29] ?? '' }}">
                            <input type="hidden" name="q30" id="q30" value="{{ $answers[30] ?? '' }}">
                        </div>
                    </div>

                </div>

                <!-- question part 4 -->
                <div class="tab-content " id="part4" style="margin-bottom: 80px;">
                    <div class="question_part">
                        <h4>Part 4</h4>
                        <p>Questions 31–40</p>
                    </div>

                    <div class="mt-4">
                        <h4>Questions 31–36</h4>
                        <p>Complete the flowchart below. Write <strong>ONE WORD ONLY</strong> in each gap.</p>

                        <h5 class="mt-3"><strong>Exchange Rate Project</strong></h5>
                        <p> <input type="text" name="q31" placeholder="31" class="inline-input" value="{{ $answers[31] ?? '' }}" id="31"> a currency</p>
                        <p>imagine you need to  <input type="text" name="q32" placeholder="32" class="inline-input" value="{{ $answers[32] ?? '' }}" id="32"> £100</p>
                        <p> <input type="text" name="q33" placeholder="33" class="inline-input" value="{{ $answers[33] ?? '' }}" id="33"> facts about the state of your country’s economy</p>
                        <p>look at other students’ notes on their countries</p>
                        <p>decide what your exchange ‘rate’ is going to be against each currency</p>
                        <p>try to  <input type="text" name="q34" placeholder="34" class="inline-input" value="{{ $answers[34] ?? '' }}" id="34"> your currency</p>
                        <p> <input type="text" name="q35" placeholder="35" class="inline-input" value="{{ $answers[35] ?? '' }}" id="35"> other currency if you want</p>
                        <p><input type="text" name="q36" placeholder="36" class="inline-input" value="{{ $answers[36] ?? '' }}" id="36"> your profit</p>

                        <hr class="my-4">

                        <h4>Questions 37–40</h4>
                        <p>Answer the questions. Write <strong>NO MORE THAN THREE WORDS AND/OR A NUMBER</strong> in each gap.</p>

                        <p> How many main trading partners does the UK have? <input type="text" name="q37" placeholder="37" class="inline-input" value="{{ $answers[37] ?? '' }}" id="37"></p>
                        <p> Which sector does the tutor want students to study? <input type="text" name="q38" placeholder="38" class="inline-input" value="{{ $answers[38] ?? '' }}" id="38"></p>
                        <p> What does the tutor want students to look at changes in? <input type="text" name="q39" placeholder="39" class="inline-input" value="{{ $answers[39] ?? '' }}" id="39"></p>
                        <p> When does the tutor want the project completed by? <input type="text" name="q40" placeholder="40" class="inline-input" value="{{ $answers[40] ?? '' }}" id="40"></p>
                    </div>


                </div>
    </form>
    <!--Alart Modal exam start-->
    <div class="modal fade" id="startModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true"  data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Start Listening Test</h5>
                </div>
                <div class="modal-body">
                    <p class="instruction-text">Please enter your Student ID and click OK to begin the listening test.</p>
                    <div class="form-group">
                        <label for="studentIdInput" class="form-label">Student ID</label>
                        <input type="text" 
                               class="form-control" 
                               id="studentIdInput" 
                               placeholder="Enter your Student ID" 
                               minlength="8"
                               inputmode="text"
                               pattern="[A-Za-z0-9]{8,}"
                               required>
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
                    <h5 class="modal-title" id="finishModalLabel">Are you sure you want to complete the test?
                    </h5>
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
    </div>
    </div>


    <div class="tabs fixed-bottom " style="background-color: white; margin:0px; margin-top: 100px;">
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
        <div class="tab " data-tab="part2">
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
        <div class="tab " data-tab="part3">
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
        <div class="tab " data-tab="part4">
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
        <!-- <div class="fixed-bottom d-flex justify-content-end mb-5 px-5">
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
                    t.querySelector('.question-links').style.display = 'none';
                    t.querySelector('.question-placeholder').style.display = 'block';
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
                    qLinks.style.display = 'flex';
                    qPlaceholder.style.display = 'none';
                } else {
                    qLinks.style.display = 'none';
                    qPlaceholder.style.display = 'block';
                }
            });
        });
    </script>

    <script>
        document.querySelectorAll('.question-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const qNum = this.getAttribute('data-question');

                // Remove existing active styles
                document.querySelectorAll('.question-number').forEach(num => num.classList.remove(
                    'active'));

                // If question has a number span (1-6), add active style
                const numberBox = document.getElementById(`question-${qNum}-number`);
                if (numberBox) {
                    numberBox.classList.add('active');

                    // Scroll to label (1–6)
                    const questionLabel = document.getElementById(qNum);
                    if (questionLabel) {
                        questionLabel.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                    }
                }

                // If it's an input field (7–10), focus it
                const inputField = document.getElementById(qNum);
                if (inputField && inputField.tagName === 'INPUT') {
                    inputField.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                    inputField.focus();
                }
            });
        });
    </script>
    <script>
        const questionLinks = document.querySelectorAll('.question-link');

        questionLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();

                // Remove "active" class from all links
                questionLinks.forEach(l => l.classList.remove('active'));

                // Add "active" class to clicked link
                this.classList.add('active');
            });
        });
    </script>
    {{-- alart and timer script and finished test script  --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const startModal = new bootstrap.Modal(document.getElementById('startModal'));
            const finishModal = new bootstrap.Modal(document.getElementById('finishModal'));
            const startButton = document.getElementById('startTestButton');
            const finishButton = document.getElementById('finishButton');
            const continueButton = document.getElementById('continueButton');
            const timerElement = document.getElementById('timer');
            const audio = document.getElementById('testAudio');
            const testForm = document.getElementById('testForm');

            // Timer functionality
            let timeRemaining = 0;
            let timerInterval;
            const specificAudio = new Audio('{{ asset("audio/105.MP3") }}');
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

            // Start test: play audio and start timer when OK button is clicked
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
                        elem.requestFullscreen().catch(err => {
                            console.log('Fullscreen request failed:', err);
                        });
                    } else if (elem.webkitRequestFullscreen) {
                        elem.webkitRequestFullscreen();
                    } else if (elem.msRequestFullscreen) {
                        elem.msRequestFullscreen();
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
                
                // Also play the main test audio if available
                if (audio) {
                    audio.play().catch(error => {
                        console.log('Main audio play failed:', error);
                    });
                }
            });

            // Show finish modal when Finish Test button clicked
            finishButton.addEventListener('click', function(e) {
                e.preventDefault();
                finishModal.show();
            });

            // Prevent double submission
            let isSubmitting = false;

            // When user clicks "Continue" → submit form
            continueButton.addEventListener('click', function() {
                if (isSubmitting) {
                    return; // Prevent double submission
                }
                isSubmitting = true;
                
                // Disable the button to prevent multiple clicks
                continueButton.disabled = true;
                continueButton.textContent = 'Submitting...';
                
                testForm.submit();
            });

            // Autosave on input change (radio, text, checkbox) with 10-second debouncing

            let autosaveDebounceTimer = null;
            const dirtyInputs = new Map();

            function autosaveInput(input) {
                if (!input || !input.name) {
                    console.log('Autosave skipped: no input or name');
                    return;
                }

                const formData = new FormData();
                formData.append('student_id', '{{ auth()->id() ?? session("student_batch_id") }}');
                const testNameField = document.querySelector('input[name="test_name"]');
                if (testNameField && testNameField.value) {
                    formData.append('test_name', testNameField.value);
                }

                const assignmentIdField = document.querySelector('input[name="assignment_id"]');
                if (assignmentIdField && assignmentIdField.value) {
                    formData.append('assignment_id', assignmentIdField.value);
                }

                const examStudentIdField = document.querySelector('input[name="exam_student_id"]');
                if (examStudentIdField && examStudentIdField.value) {
                    formData.append('custom_student_id', examStudentIdField.value);
                }

                if (input.type === 'checkbox') {
                    const groupName = input.name;
                    const selectedValues = Array.from(document.querySelectorAll(`input[name="${groupName}"]:checked`))
                        .map(cb => cb.value);
                    const questionNumber = groupName.replace('q', '').replace('[]', '');
                    formData.append('question_number', questionNumber);
                    formData.append('answer', selectedValues.join(','));
                    console.log(`Checkbox group: ${groupName}, Question: ${questionNumber}, Values: ${selectedValues.join(',')}`);
                } else {
                    formData.append('question_number', input.name.replace('q', ''));
                    formData.append('answer', input.value);
                }

                fetch('{{ route('test.autosave') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                }).then(response => {
                    if (!response.ok) throw new Error('Network response was not ok');
                    console.log(`Autosaved: ${input.name}`);
                }).catch(err => console.error('Autosave failed', err));
            }

            function markDirty(input) {
                if (!input || !input.name) return;
                dirtyInputs.set(input.name, input);
                scheduleAutosaveFlush();
            }

            function flushDirtyInputs() {
                if (!dirtyInputs.size) return;
                dirtyInputs.forEach((input) => {
                    autosaveInput(input);
                });
                dirtyInputs.clear();
            }

            function scheduleAutosaveFlush() {
                if (autosaveDebounceTimer) {
                    clearTimeout(autosaveDebounceTimer);
                }
                autosaveDebounceTimer = setTimeout(function() {
                    flushDirtyInputs();
                }, 10000);
            }

            if (testForm) {
                // Prevent Enter key from submitting the form
                testForm.addEventListener('keypress', function(e) {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        return false;
                    }
                });
                
                testForm.addEventListener('submit', function() {
                    if (autosaveDebounceTimer) {
                        clearTimeout(autosaveDebounceTimer);
                        autosaveDebounceTimer = null;
                    }
                    flushDirtyInputs();
                });
            }

            document.querySelectorAll('input[type="radio"], input[type="text"], input[type="checkbox"]').forEach(
                input => {
                    input.addEventListener('change', function() {
                        markDirty(this);
                    });
                });
        });
    </script>

    <!-- Arrow button script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const allLinks = Array.from(document.querySelectorAll('.question-link'));
            let currentIndex = 0;

            function highlightLinkAndNumber(qNum) {
                // Remove existing active styles
                allLinks.forEach(link => link.classList.remove('active'));
                document.querySelectorAll('.question-number').forEach(num => num.classList.remove('active'));

                // Activate the current question-link
                const currentLink = allLinks.find(l => l.getAttribute('data-question') === qNum);
                if (currentLink) currentLink.classList.add('active');

                // Highlight number box
                const numberBox = document.getElementById(`question-${qNum}-number`);
                if (numberBox) numberBox.classList.add('active');
            }

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
                        qLinks.style.display = 'flex';
                        qPlaceholder.style.display = 'none';
                    } else {
                        tab.classList.remove('active');
                        qLinks.style.display = 'none';
                        qPlaceholder.style.display = 'block';
                    }
                });
            }

            function scrollAndFocus(num) {
                const label = document.getElementById(num);
                if (label) label.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });

                const inputField = document.getElementById(num);
                if (inputField && inputField.tagName === 'INPUT') {
                    setTimeout(() => inputField.focus(), 400);
                }
            }

            function setActiveQuestion(index) {
                currentIndex = index;
                const qNum = allLinks[index].getAttribute('data-question');

                highlightLinkAndNumber(qNum);
                activateTabForQuestion(qNum);
                scrollAndFocus(qNum);
            }

            // Attach listener to question-number links
            allLinks.forEach((link, index) => {
                link.addEventListener('click', e => {
                    e.preventDefault();
                    setActiveQuestion(index);
                });
            });

            document.getElementById('prev-question').addEventListener('click', () => {
                if (currentIndex > 0) setActiveQuestion(currentIndex - 1);
            });

            document.getElementById('next-question').addEventListener('click', () => {
                if (currentIndex < allLinks.length - 1) setActiveQuestion(currentIndex + 1);
            });

            // Track manual input field clicks to update currentIndex
            document.querySelectorAll('input[type="text"], input[type="checkbox"], input[type="radio"]').forEach(input => {
                // Skip q28-30 checkboxes as they are handled separately
                if (input.classList.contains('q28-30-checkbox')) {
                    return;
                }
                
                input.addEventListener('focus', function() {
                    const questionNum = this.id || this.name.replace('q', '').replace('[]', '');
                    const linkIndex = allLinks.findIndex(link => link.getAttribute('data-question') === questionNum);
                    if (linkIndex !== -1) {
                        currentIndex = linkIndex;
                        highlightLinkAndNumber(questionNum);
                    }
                });
            });

            // Initial setup - don't activate any question by default
            // setActiveQuestion(0);
        });
    </script>

    <!-- sidebar js code  -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');
            const noteToggle = document.getElementById('noteToggle');
            const closeBtn = sidebar.querySelector('.close-btn');

            noteToggle.addEventListener('click', () => {
                sidebar.classList.add('open');
                mainContent.classList.add('shifted');
            });

            closeBtn.addEventListener('click', () => {
                sidebar.classList.remove('open');
                mainContent.classList.remove('shifted');
            });
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

        function getTableCell(node) {
            let parent = node && node.nodeType === Node.TEXT_NODE ? node.parentNode : node;
            while (parent) {
                if (parent.tagName === 'TD' || parent.tagName === 'TH') return parent;
                parent = parent.parentNode;
            }
            return null;
        }

        function highlightRange(range) {
            if (!range || range.collapsed) return [];

            const startContainer = range.startContainer;
            const endContainer = range.endContainer;
            const startOffset = range.startOffset;
            const endOffset = range.endOffset;
            const marks = [];

            const startCell = getTableCell(startContainer);
            const endCell = getTableCell(endContainer);

            if (startCell && endCell && startCell !== endCell) {
                if (startContainer && startContainer.nodeType === Node.TEXT_NODE) {
                    const selectedText = startContainer.textContent.substring(startOffset);
                    if (selectedText.trim()) {
                        const mark = document.createElement('mark');
                        mark.style.backgroundColor = 'yellow';
                        mark.textContent = selectedText;
                        const beforeText = startContainer.textContent.substring(0, startOffset);
                        const parent = startContainer.parentNode;
                        if (beforeText) parent.insertBefore(document.createTextNode(beforeText), startContainer);
                        parent.insertBefore(mark, startContainer);
                        parent.removeChild(startContainer);
                        marks.push(mark);
                    }
                }
                return marks;
            }

            if (startContainer === endContainer && startContainer && startContainer.nodeType === Node.TEXT_NODE) {
                const selectedText = startContainer.textContent.substring(startOffset, endOffset);
                if (!selectedText.trim()) return marks;
                const mark = document.createElement('mark');
                mark.style.backgroundColor = 'yellow';
                mark.textContent = selectedText;
                const beforeText = startContainer.textContent.substring(0, startOffset);
                const afterText = startContainer.textContent.substring(endOffset);
                const parent = startContainer.parentNode;
                if (beforeText) parent.insertBefore(document.createTextNode(beforeText), startContainer);
                parent.insertBefore(mark, startContainer);
                if (afterText) parent.insertBefore(document.createTextNode(afterText), startContainer);
                parent.removeChild(startContainer);
                marks.push(mark);
                return marks;
            }

            const textNodes = [];
            const walker = document.createTreeWalker(range.commonAncestorContainer, NodeFilter.SHOW_TEXT, null, false);
            let node;
            let inRange = false;
            while (node = walker.nextNode()) {
                if (node === startContainer) inRange = true;
                if (inRange) {
                    if (startCell) {
                        const nodeCell = getTableCell(node);
                        if (nodeCell && nodeCell !== startCell) continue;
                    }
                    textNodes.push(node);
                }
                if (node === endContainer) break;
            }

            textNodes.forEach((textNode) => {
                let start = 0;
                let end = textNode.textContent.length;
                if (textNode === startContainer) start = startOffset;
                if (textNode === endContainer) end = endOffset;
                if (start >= end) return;
                const selectedText = textNode.textContent.substring(start, end);
                if (!selectedText.trim()) return;
                const mark = document.createElement('mark');
                mark.style.backgroundColor = 'yellow';
                mark.textContent = selectedText;
                const beforeText = textNode.textContent.substring(0, start);
                const afterText = textNode.textContent.substring(end);
                const parent = textNode.parentNode;
                if (beforeText) parent.insertBefore(document.createTextNode(beforeText), textNode);
                parent.insertBefore(mark, textNode);
                if (afterText) parent.insertBefore(document.createTextNode(afterText), textNode);
                parent.removeChild(textNode);
                marks.push(mark);
            });

            return marks;
        }

        function markRangeWithAttrs(range, attrs = {}) {
            const marks = highlightRange(range);
            marks.forEach((mark) => {
                Object.keys(attrs).forEach((k) => { mark.dataset[k] = attrs[k]; });
            });
            return marks;
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
                sidebar.style.right = '0px';

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
                <h4>Notes</h4>
                <button id="closeSidebar" style="
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
                // Handle both sidebar mechanisms
                sidebar.style.right = '-300px';
                sidebar.classList.remove('open');
                
                // Also handle main content shift
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
    {{-- select maximum number checkbox  --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Define groups with their max selections
            const checkboxGroups = [
                { name: 'q14_15[]', max: 2 }
            ];

            checkboxGroups.forEach(group => {
                const checkboxes = document.querySelectorAll(`input[name="${group.name}"]`);
                checkboxes.forEach(checkbox => {
                    checkbox.addEventListener('change', function() {
                        const checked = Array.from(checkboxes).filter(cb => cb.checked);
                        if (checked.length > group.max) {
                            this.checked = false;
                        }
                    });
                });
            });

            // Handle Questions 28-30 checkbox limit (max 3 selections)
            const q28_30_checkboxes = document.querySelectorAll('.q28-30-checkbox');
            q28_30_checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const checkedCount = Array.from(q28_30_checkboxes).filter(cb => cb.checked).length;
                    if (checkedCount > 3) {
                        this.checked = false;
                    }
                });
            });
        });
    </script>

    {{-- Questions 28-30 activation script (same as listeningThree Q29-30) --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const container = document.getElementById('q28-30-container');
            const checkboxes = container ? Array.from(container.querySelectorAll('.q28-30-checkbox')) : [];
            const q28Hidden = document.getElementById('q28');
            const q29Hidden = document.getElementById('q29');
            const q30Hidden = document.getElementById('q30');

            if (!checkboxes.length || !q28Hidden || !q29Hidden || !q30Hidden) return;

            function syncHidden() {
                const selected = checkboxes.filter(cb => cb.checked).map(cb => cb.value);
                q28Hidden.value = selected[0] || '';
                q29Hidden.value = selected[1] || '';
                q30Hidden.value = selected[2] || '';

                q28Hidden.dispatchEvent(new Event('change'));
                q29Hidden.dispatchEvent(new Event('change'));
                q30Hidden.dispatchEvent(new Event('change'));

                const targetQuestion = selected.length === 1 ? '28' : (selected.length === 2 ? '29' : (selected.length === 3 ? '30' : null));
                if (targetQuestion) {
                    document.querySelectorAll('.question-link').forEach(l => l.classList.remove('active'));
                    const targetLink = document.querySelector(`.question-link[data-question="${targetQuestion}"]`);
                    if (targetLink) targetLink.classList.add('active');
                }
            }

            // Sync only after user interaction
            checkboxes.forEach(cb => cb.addEventListener('change', syncHidden));
        });
    </script>

   {{-- input auto sujection off  --}}
    <script>
                document.addEventListener('DOMContentLoaded', function() {
            // Get all input fields within the form
            const inputs = document.querySelectorAll('#testForm input');

            // Loop through each input and set autocomplete to "off"
            inputs.forEach(function(input) {
                input.setAttribute('autocomplete', 'off');
            });
        });
    </script>

    {{-- Hide placeholder on focus --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('input[type="text"]');

            inputs.forEach(function(input) {
                // Store original placeholder
                const originalPlaceholder = input.getAttribute('placeholder');

                // Hide placeholder on focus
                input.addEventListener('focus', function() {
                    this.setAttribute('placeholder', '');
                });

                // Restore placeholder on blur if input is empty
                input.addEventListener('blur', function() {
                    if (this.value === '') {
                        this.setAttribute('placeholder', originalPlaceholder);
                    }
                });
            });
        });
    </script>



</body>

</html>
