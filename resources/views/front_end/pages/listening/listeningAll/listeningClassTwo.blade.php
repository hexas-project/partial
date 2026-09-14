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

        .inline-input {
            padding: 2px 5px;
            margin: 0 4px;
            min-width: 140px;
        }

        .inline-input:focus {
            outline: auto;
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
                <div class="container-fluid  px-5">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">
                                     <span class="material-icons-outlined">schedule</span>
                                    <strong id="timer">30 minutes left</strong>
                                </a>
                            </li>
                            <li class="nav-item">
                                <span class="material-icons-outlined">headset_mic</span>
                                <!--<audio id="testAudio" src="{{ asset('audio/Test-10.mp3') }}"-->
                                <!--    preload="auto"></audio>-->
                                    Audio is playing...

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
                    <input type="hidden" name="test_name" value="{{ $testName ?? 'class05-listening' }}">
                    <input type="hidden" name="student_id" value="{{ auth()->id() ?? session('student_batch_id') }}">
                    <input type="hidden" name="exam_student_id" id="examStudentIdField" value="">
                    <input type="hidden" name="assignment_id" value="{{ $assignmentId ?? '' }}">
                    <div class="question_part">
                        <h4>Part 1</h4>
                        <!><p>Questions 1–10</p>
                    </div>

                    <div class="mt-4">
                        <!--<h4>Questions 1–7</h4>-->
                        <div class="d-flex  align-items-center gap-3 ">

                            <h4>Questions 1–7</h4>
                           <!-- <audio controls
                                src="{{ asset('audio/102.MP3') }}"></audio> --> 
                        </div><br>
                        <p><em>Complete the notes below.</em></p>
                        <p>Write <strong>NO MORE THAN THREE WORDS AND/OR A NUMBER</strong> each answer.</p>

                        <h5 class="mt-3"><strong>Courses Available</strong></h5>
                        <p>writing…….. in first term</p>
                        <p><input type="text" name="q1" placeholder="1" class="inline-input" value="{{ $answers[1] ?? '' }}" id="1"> in second term</p>
                        <p><input type="text" name="q2" placeholder="2" class="inline-input" value="{{ $answers[2] ?? '' }}" id="2"> throughout the year</p>
                        <p><input type="text" name="q3" placeholder="3" class="inline-input" value="{{ $answers[3] ?? '' }}" id="3"> during long vacation</p>
                        <p>Class sizes: <input type="text" name="q4" placeholder="4" class="inline-input" value="{{ $answers[4] ?? '' }}" id="4"> maximum</p>
                        <p>Course costs often paid by the <input type="text" name="q5" placeholder="5" class="inline-input" value="{{ $answers[5] ?? '' }}" id="5"></p>
                        <p>Exams available in <input type="text" name="q6" placeholder="6" class="inline-input" value="{{ $answers[6] ?? '' }}" id="6"></p>
                        <p>Must enroll by <input type="text" name="q7" placeholder="7" class="inline-input" value="{{ $answers[7] ?? '' }}" id="7"></p>

                        <hr class="my-4">

                        <h4>Questions 8–10</h4>
                        <p>Choose <strong>THREE</strong> correct answers.</p>
                        <p>Which <strong>THREE</strong> items does the student need to bring to the first class?</p>
                        
                        <div class="mt-3">
                            <div style="margin-bottom: 10px;">
                                <input type="checkbox" class="q8-10-checkbox" value="A" id="q8_A" style="margin-right: 8px;">
                                <label for="q8_A">passport</label>
                            </div>
                            <div style="margin-bottom: 10px;">
                                <input type="checkbox" class="q8-10-checkbox" value="B" id="q8_B" style="margin-right: 8px;">
                                <label for="q8_B">computer disk</label>
                            </div>
                            <div style="margin-bottom: 10px;">
                                <input type="checkbox" class="q8-10-checkbox" value="C" id="q8_C" style="margin-right: 8px;">
                                <label for="q8_C">note from tutor</label>
                            </div>
                            <div style="margin-bottom: 10px;">
                                <input type="checkbox" class="q8-10-checkbox" value="D" id="q8_D" style="margin-right: 8px;">
                                <label for="q8_D">notebook</label>
                            </div>
                            <div style="margin-bottom: 10px;">
                                <input type="checkbox" class="q8-10-checkbox" value="E" id="q8_E" style="margin-right: 8px;">
                                <label for="q8_E">student identity card</label>
                            </div>
                            <div style="margin-bottom: 10px;">
                                <input type="checkbox" class="q8-10-checkbox" value="F" id="q8_F" style="margin-right: 8px;">
                                <label for="q8_F">dictionary</label>
                            </div>
                            <div style="margin-bottom: 10px;">
                                <input type="checkbox" class="q8-10-checkbox" value="G" id="q8_G" style="margin-right: 8px;">
                                <label for="q8_G">registration form</label>
                            </div>
                        </div>
                        
                        <!-- Hidden inputs to store selected values -->
                        <input type="hidden" name="q8" id="8">
                        <input type="hidden" name="q9" id="9">
                        <input type="hidden" name="q10" id="10">
                    </div>
                </div>
                <!-- question part 2 -->
                <div class="tab-content" id="part2" style="margin-bottom: 80px;">
                    <div class="question_part">
                        <h4>Part 2</h4>
                        <p>Questions 11–20</p>
                    </div>

                    <div class="mt-4">
                        <h4>Questions 11–15</h4>
                        <p>Of which types of transport is the following true?</p>
                        <p>Choose the correct letter <strong>A, B or C</strong> for each feature.</p>

                        <div class="mt-2">
                            <p><strong>A</strong> tube</p>
                            <p><strong>B</strong> train</p>
                            <p><strong>C</strong> bus</p>
                        </div>

                        <h5 class="mt-3"><strong>Features of Transport</strong></h5>
                        
                        <!-- Table with clickable cells for Questions 11-15 -->
                        <table class="table table-bordered" style="background: white; width: 50%; margin-top: 15px;">
                            <thead>
                                <tr style="background: #e8f4f8;">
                                    <th style="width: 40px; text-align: center;">#</th>
                                    <th style="width: 250px;">Feature</th>
                                    <th style="width: 50px; text-align: center;">A</th>
                                    <th style="width: 50px; text-align: center;">B</th>
                                    <th style="width: 50px; text-align: center;">C</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center; font-weight: bold;">11</td>
                                    <td>cheapest</td>
                                    <td class="clickable-cell-q11" data-question="11" data-value="A" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                    <td class="clickable-cell-q11" data-question="11" data-value="B" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                    <td class="clickable-cell-q11" data-question="11" data-value="C" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                </tr>
                                <tr>
                                    <td style="text-align: center; font-weight: bold;">12</td>
                                    <td>most convenient</td>
                                    <td class="clickable-cell-q11" data-question="12" data-value="A" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                    <td class="clickable-cell-q11" data-question="12" data-value="B" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                    <td class="clickable-cell-q11" data-question="12" data-value="C" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                </tr>
                                <tr>
                                    <td style="text-align: center; font-weight: bold;">13</td>
                                    <td>most comfortable</td>
                                    <td class="clickable-cell-q11" data-question="13" data-value="A" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                    <td class="clickable-cell-q11" data-question="13" data-value="B" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                    <td class="clickable-cell-q11" data-question="13" data-value="C" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                </tr>
                                <tr>
                                    <td style="text-align: center; font-weight: bold;">14</td>
                                    <td>fastest</td>
                                    <td class="clickable-cell-q11" data-question="14" data-value="A" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                    <td class="clickable-cell-q11" data-question="14" data-value="B" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                    <td class="clickable-cell-q11" data-question="14" data-value="C" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                </tr>
                                <tr>
                                    <td style="text-align: center; font-weight: bold;">15</td>
                                    <td>most frequent service</td>
                                    <td class="clickable-cell-q11" data-question="15" data-value="A" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                    <td class="clickable-cell-q11" data-question="15" data-value="B" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                    <td class="clickable-cell-q11" data-question="15" data-value="C" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <!-- Hidden inputs to store selected values -->
                        <input type="hidden" name="q11" id="11">
                        <input type="hidden" name="q12" id="12">
                        <input type="hidden" name="q13" id="13">
                        <input type="hidden" name="q14" id="14">
                        <input type="hidden" name="q15" id="15">

                        <hr class="my-4">

                        <h4>Questions 16–20</h4>
                        <p><em>Label the map below.</em></p>
                        <p>The map has eight labels <strong>(A - G)</strong>Choose the correct label for each building.</p>
                        
                        <div class="mt-3">
                            <img src="{{ asset('images/listening/image1.jpg') }}" class="img-fluid" alt="Map for Questions 16–20">
                        </div>
                        
                        <div class="mt-3">
                            <!-- Table with clickable cells for Questions 16-20 -->
                            <table class="table table-bordered" style="background: white; width: 60%;">
                                <thead>
                                    <tr style="background: #e8f4f8;">
                                        <th style="width: 40px; text-align: center;">#</th>
                                        <th style="width: 200px;">Location</th>
                                        <th style="width: 50px; text-align: center;">A</th>
                                        <th style="width: 50px; text-align: center;">B</th>
                                        <th style="width: 50px; text-align: center;">C</th>
                                        <th style="width: 50px; text-align: center;">D</th>
                                        <th style="width: 50px; text-align: center;">E</th>
                                        <th style="width: 50px; text-align: center;">F</th>
                                        <th style="width: 50px; text-align: center;">G</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="text-align: center; font-weight: bold;">16</td>
                                        <td>bus stop</td>
                                        <td class="clickable-cell-q16" data-question="16" data-value="A" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        <td class="clickable-cell-q16" data-question="16" data-value="B" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        <td class="clickable-cell-q16" data-question="16" data-value="C" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        <td class="clickable-cell-q16" data-question="16" data-value="D" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        <td class="clickable-cell-q16" data-question="16" data-value="E" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        <td class="clickable-cell-q16" data-question="16" data-value="F" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        <td class="clickable-cell-q16" data-question="16" data-value="G" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center; font-weight: bold;">17</td>
                                        <td>train station</td>
                                        <td class="clickable-cell-q16" data-question="17" data-value="A" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        <td class="clickable-cell-q16" data-question="17" data-value="B" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        <td class="clickable-cell-q16" data-question="17" data-value="C" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        <td class="clickable-cell-q16" data-question="17" data-value="D" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        <td class="clickable-cell-q16" data-question="17" data-value="E" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        <td class="clickable-cell-q16" data-question="17" data-value="F" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        <td class="clickable-cell-q16" data-question="17" data-value="G" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center; font-weight: bold;">18</td>
                                        <td>tube entrance</td>
                                        <td class="clickable-cell-q16" data-question="18" data-value="A" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        <td class="clickable-cell-q16" data-question="18" data-value="B" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        <td class="clickable-cell-q16" data-question="18" data-value="C" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        <td class="clickable-cell-q16" data-question="18" data-value="D" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        <td class="clickable-cell-q16" data-question="18" data-value="E" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        <td class="clickable-cell-q16" data-question="18" data-value="F" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        <td class="clickable-cell-q16" data-question="18" data-value="G" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center; font-weight: bold;">19</td>
                                        <td>transport ticket office</td>
                                        <td class="clickable-cell-q16" data-question="19" data-value="A" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        <td class="clickable-cell-q16" data-question="19" data-value="B" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        <td class="clickable-cell-q16" data-question="19" data-value="C" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        <td class="clickable-cell-q16" data-question="19" data-value="D" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        <td class="clickable-cell-q16" data-question="19" data-value="E" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        <td class="clickable-cell-q16" data-question="19" data-value="F" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        <td class="clickable-cell-q16" data-question="19" data-value="G" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center; font-weight: bold;">20</td>
                                        <td>taxi rank</td>
                                        <td class="clickable-cell-q16" data-question="20" data-value="A" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        <td class="clickable-cell-q16" data-question="20" data-value="B" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        <td class="clickable-cell-q16" data-question="20" data-value="C" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        <td class="clickable-cell-q16" data-question="20" data-value="D" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        <td class="clickable-cell-q16" data-question="20" data-value="E" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        <td class="clickable-cell-q16" data-question="20" data-value="F" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        <td class="clickable-cell-q16" data-question="20" data-value="G" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <!-- Hidden inputs to store selected values -->
                            <input type="hidden" name="q16" id="16">
                            <input type="hidden" name="q17" id="17">
                            <input type="hidden" name="q18" id="18">
                            <input type="hidden" name="q19" id="19">
                            <input type="hidden" name="q20" id="20">
                        </div>
                    </div>
                </div>
                <!-- question part 3 -->
                <div class="tab-content" id="part3" style="margin-bottom: 80px;">
                    <div class="question_part">
                        <h4>Part 3</h4>
                        <p>Questions 21–30</p>
                    </div>

                    <div class="mt-4">
                        <h4>Questions 21–23</h4>
                        <p>What is the advantage of each course?</p>
                        <p>Choose the correct answer for each course from <strong>A—E</strong>.</p>

                        <h5 class="mt-3"><strong>Advantages of the Course</strong></h5>
                        <p><strong>A</strong> will be tested in the final exams</p>
                        <p><strong>B</strong> will be useful for a future job</p>
                        <p><strong>C</strong> will help with research skills</p>
                        <p><strong>D</strong> will improve writing skills</p>
                        <p><strong>E</strong> will support material already covered</p>

                        <h5 class="mt-3"><strong>Courses</strong></h5>
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered text-center" style="background: white; width: 50%;">
                                <thead>
                                    <tr>
                                        <th style="width: 60px;">#</th>
                                        <th style="text-align: left;">Course</th>
                                        <th style="width: 80px;">A</th>
                                        <th style="width: 80px;">B</th>
                                        <th style="width: 80px;">C</th>
                                        <th style="width: 80px;">D</th>
                                        <th style="width: 80px;">E</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="font-weight: bold;">21</td>
                                        <td style="text-align: left;">Science and Ethics</td>
                                        <td class="clickable-cell-q21" data-question="21" data-value="A" style="cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle; text-align: center;"></td>
                                        <td class="clickable-cell-q21" data-question="21" data-value="B" style="cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle; text-align: center;"></td>
                                        <td class="clickable-cell-q21" data-question="21" data-value="C" style="cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle; text-align: center;"></td>
                                        <td class="clickable-cell-q21" data-question="21" data-value="D" style="cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle; text-align: center;"></td>
                                        <td class="clickable-cell-q21" data-question="21" data-value="E" style="cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle; text-align: center;"></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;">22</td>
                                        <td style="text-align: left;">Pharmacology Prelim</td>
                                        <td class="clickable-cell-q21" data-question="22" data-value="A" style="cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle; text-align: center;"></td>
                                        <td class="clickable-cell-q21" data-question="22" data-value="B" style="cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle; text-align: center;"></td>
                                        <td class="clickable-cell-q21" data-question="22" data-value="C" style="cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle; text-align: center;"></td>
                                        <td class="clickable-cell-q21" data-question="22" data-value="D" style="cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle; text-align: center;"></td>
                                        <td class="clickable-cell-q21" data-question="22" data-value="E" style="cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle; text-align: center;"></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;">23</td>
                                        <td style="text-align: left;">Reporting Test Results</td>
                                        <td class="clickable-cell-q21" data-question="23" data-value="A" style="cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle; text-align: center;"></td>
                                        <td class="clickable-cell-q21" data-question="23" data-value="B" style="cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle; text-align: center;"></td>
                                        <td class="clickable-cell-q21" data-question="23" data-value="C" style="cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle; text-align: center;"></td>
                                        <td class="clickable-cell-q21" data-question="23" data-value="D" style="cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle; text-align: center;"></td>
                                        <td class="clickable-cell-q21" data-question="23" data-value="E" style="cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle; text-align: center;"></td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <!-- Hidden inputs to store selected values -->
                            <input type="hidden" name="q21" id="21">
                            <input type="hidden" name="q22" id="22">
                            <input type="hidden" name="q23" id="23">
                        </div>

                        <hr class="my-4">

                        <h4>Questions 24–30</h4>
                        <p><em>Complete the sentences below.</em></p>
                        <p>Write <strong>NO MORE THAN TWO WORDS</strong> for each answer.</p>

                        <p>The Maths course will run in the <input type="text" name="q24" placeholder="24" class="inline-input" value="{{ $answers[24] ?? '' }}" id="24"></p>
                        <p>The tutor for Pharmacology is visiting from <input type="text" name="q25" placeholder="25" class="inline-input" value="{{ $answers[25] ?? '' }}" id="25"></p>
                        <p><input type="text" name="q26" placeholder="26" class="inline-input" value="{{ $answers[26] ?? '' }}" id="26"> for the project must be submitted by the end of January.</p>
                        <p>Resources for experiments are available in the <input type="text" name="q27" placeholder="27" class="inline-input" value="{{ $answers[27] ?? '' }}" id="27"></p>
                        <p>Extra <input type="text" name="q28" placeholder="28" class="inline-input" value="{{ $answers[28] ?? '' }}" id="28"> will be held in December.</p>
                        <p>Students are allowed to do presentations in <input type="text" name="q29" placeholder="29" class="inline-input" value="{{ $answers[29] ?? '' }}" id="29"></p>
                        <p>Course assessment will be based on <input type="text" name="q30" placeholder="30" class="inline-input" value="{{ $answers[30] ?? '' }}" id="30"></p>
                    </div>
                </div>

                <!-- question part 4 -->
                <div class="tab-content " id="part4" style="margin-bottom: 80px;">
                    <div class="question_part">
                        <h4>Part 4</h4>
                        <p>Questions 31–40</p>
                    </div>

                    <div class="mt-4">
                        <h4>Questions 31–37</h4>
                        <p><em>Complete the table below.</em></p>
                        <p>Write <strong>NO MORE THAN TWO WORDS</strong> for each answer.</p>

                        <table class="table table-bordered mt-3" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>New Features</th>
                                    <th>Size</th>
                                    <th>Problems</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>transport</td>
                                    <td>individual transportation</td>
                                    <td>roads will be narrower</td>
                                    <td>levels of investment</td>
                                </tr>
                                <tr>
                                    <td>commercial areas</td>
                                    <td>roofs will have <input type="text" name="q31" placeholder="31" class="inline-input" value="{{ $answers[31] ?? '' }}" id="31"></td>
                                    <td><input type="text" name="q32" placeholder="32" class="inline-input" value="{{ $answers[32] ?? '' }}" id="32"> of current area</td>
                                    <td><input type="text" name="q33" placeholder="33" class="inline-input" value="{{ $answers[33] ?? '' }}" id="33"> will be limited to outskirts</td>
                                </tr>
                                <tr>
                                    <td>residential areas</td>
                                    <td>homes made of <input type="text" name="q34" placeholder="34" class="inline-input" value="{{ $answers[34] ?? '' }}" id="34"></td>
                                    <td>will be limited to 15,000</td>
                                    <td>providing enough housing for <input type="text" name="q35" placeholder="35" class="inline-input" value="{{ $answers[35] ?? '' }}" id="35"></td>
                                </tr>
                                <tr>
                                    <td>energy sources</td>
                                    <td><input type="text" name="q36" placeholder="36" class="inline-input" value="{{ $answers[36] ?? '' }}" id="36"> will be an energy source</td>
                                    <td>energy plants will be smaller</td>
                                    <td>noise and congestion caused by <input type="text" name="q37" placeholder="37" class="inline-input" value="{{ $answers[37] ?? '' }}" id="37"></td>
                                </tr>
                            </tbody>
                        </table>

                        <hr class="my-4">

                        <h4>Questions 38–40</h4>
                        <p>Answer the questions below.</p>
                        <p>Write <strong>NO MORE THAN TWO WORDS</strong>.</p>
                        <p>Which three types of accommodation does the speaker say will increase in city centers?</p>

                        <p><input type="text" name="q38" placeholder="38" class="inline-input" value="{{ $answers[38] ?? '' }}" id="38"></p>
                        <p><input type="text" name="q39" placeholder="39" class="inline-input" value="{{ $answers[39] ?? '' }}" id="39"></p>
                        <p><input type="text" name="q40" placeholder="40" class="inline-input" value="{{ $answers[40] ?? '' }}" id="40"></p>
                    </div>
                </div>
    </form>
    <!--Alart Modal exam start-->
    <style>
        /* Darker backdrop for start modal */
        .modal-backdrop.show {
            opacity: 0.85;
            background-color: #000;
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
            padding: 18px 25px;
            border: none;
        }
        
        #startModal .modal-title {
            font-size: 20px;
            font-weight: 600;
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
    </style>
    
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
        <!--<div class="tab " data-tab="part3">-->
        <!--    <span class="tab-title">Part 3</span>-->
        <!--    <div class="question-links">-->
        <!--        <a href="#" class="question-link" data-question="21">21</a>-->
        <!--        <a href="#" class="question-link" data-question="22">22</a>-->
        <!--        <a href="#" class="question-link" data-question="23">23</a>-->
        <!--        <a href="#" class="question-link" data-question="24">24</a>-->
        <!--        <a href="#" class="question-link" data-question="25">25</a>-->
        <!--        <a href="#" class="question-link" data-question="26">26</a>-->
        <!--        <a href="#" class="question-link" data-question="27">27</a>-->
        <!--        <a href="#" class="question-link" data-question="28">28</a>-->
        <!--        <a href="#" class="question-link" data-question="29">29</a>-->
        <!--        <a href="#" class="question-link" data-question="30">30</a>-->
        <!--    </div>-->
        <!--    <span class="question-placeholder">0 of 10</span>-->
        <!--</div>-->
        <!--<div class="tab " data-tab="part4">-->
        <!--    <span class="tab-title">Part 4</span>-->
        <!--    <div class="question-links">-->
        <!--        <a href="#" class="question-link" data-question="31">31</a>-->
        <!--        <a href="#" class="question-link" data-question="32">32</a>-->
        <!--        <a href="#" class="question-link" data-question="33">33</a>-->
        <!--        <a href="#" class="question-link" data-question="34">34</a>-->
        <!--        <a href="#" class="question-link" data-question="35">35</a>-->
        <!--        <a href="#" class="question-link" data-question="36">36</a>-->
        <!--        <a href="#" class="question-link" data-question="37">37</a>-->
        <!--        <a href="#" class="question-link" data-question="38">38</a>-->
        <!--        <a href="#" class="question-link" data-question="39">39</a>-->
        <!--        <a href="#" class="question-link" data-question="40">40</a>-->
        <!--    </div>-->
        <!--    <span class="question-placeholder">0 of 10</span>-->
        <!--</div>-->
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

            // Pre-load audio metadata to get duration
            const specificAudio = new Audio('{{ asset("audio/102.MP3") }}');
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

            // Add Enter key listener to student ID input
            const studentIdInput = document.getElementById('studentIdInput');
            studentIdInput.addEventListener('keypress', function(event) {
                if (event.key === 'Enter') {
                    event.preventDefault();
                    startButton.click();
                }
            });

            // Start test: play audio and start timer when OK button is clicked
            startButton.addEventListener('click', function() {
                // Get and validate Student ID
                const studentIdInput = document.getElementById('studentIdInput');
                const studentIdError = document.getElementById('studentIdError');
                const studentId = studentIdInput.value.trim();
                
                const isValidStudentId = /^[a-zA-Z0-9]{8,}$/.test(studentId);
                if (!isValidStudentId) {
                    studentIdError.textContent = '⚠️ Student ID must be at least 8 characters';
                    studentIdError.style.display = 'block';
                    studentIdInput.style.borderColor = 'red';
                    return;
                }
                
                // Store Student ID in sessionStorage and hidden input
                sessionStorage.setItem('examStudentId', studentId);
                document.getElementById('examStudentIdField').value = studentId;
                
                // Hide error and close modal
                studentIdError.style.display = 'none';
                studentIdInput.style.borderColor = '#ddd';
                startModal.hide();
                
                // Enter fullscreen mode
                const elem = document.documentElement;
                if (elem.requestFullscreen) {
                    elem.requestFullscreen().catch(err => {
                        console.log('Fullscreen request failed:', err);
                    });
                } else if (elem.webkitRequestFullscreen) { /* Safari */
                    elem.webkitRequestFullscreen();
                } else if (elem.msRequestFullscreen) { /* IE11 */
                    elem.msRequestFullscreen();
                }
                
                // Fallback if metadata not yet loaded
                if (timeRemaining === 0) timeRemaining = Math.ceil(specificAudio.duration) || 30 * 60;

                // Start the timer
                timerInterval = setInterval(updateTimer, 1000);
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

            // Autosave on input change (radio, text)

            let autosaveDebounceTimer = null;
            const dirtyInputs = new Map();

            function autosaveInput(input) {
                if (!input || !input.name) return;

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

                if (input.type === 'checkbox') {
                    const groupName = input.name;
                    const selectedValues = Array.from(document.querySelectorAll(`input[name="${groupName}"]:checked`))
                        .map(cb => cb.value);
                    formData.append('question_number', groupName.replace('q', '').replace('[]', ''));
                    formData.append('answer', selectedValues.join(','));
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

            // Global helper to set active question by number (for checkbox/radio/table clicks)
            window.setActiveQuestionByNumber = function(questionNum) {
                const linkIndex = allLinks.findIndex(link => link.getAttribute('data-question') === String(questionNum));
                if (linkIndex !== -1) {
                    currentIndex = linkIndex;
                    highlightLinkAndNumber(String(questionNum));
                }
            };

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
                input.addEventListener('focus', function() {
                    const questionNum = this.id || this.name.replace('q', '').replace('[]', '');
                    const linkIndex = allLinks.findIndex(link => link.getAttribute('data-question') === questionNum);
                    if (linkIndex !== -1) {
                        currentIndex = linkIndex;
                        highlightLinkAndNumber(questionNum);
                    }
                });
            });

            // Initial setup
            setActiveQuestion(0);
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
                selectionRange = clickedMark ? null : (selection.rangeCount > 0 ? selection.getRangeAt(0).cloneRange() : null);
                contextMenu.style.left = e.pageX + 'px';
                contextMenu.style.top = e.pageY + 'px';
                contextMenu.style.display = 'block';
            }
        });

        // Hide context menu on click elsewhere
        document.addEventListener('click', function(e) {
            if (!contextMenu.contains(e.target)) {
                contextMenu.style.display = 'none';
            }
        });

        // Helper function to check if node is inside a table
        function isInsideTable(node) {
            let parent = node.parentNode;
            while (parent) {
                if (parent.tagName === 'TABLE' || parent.tagName === 'TD' || parent.tagName === 'TH' || parent.tagName === 'TR') {
                    return true;
                }
                parent = parent.parentNode;
            }
            return false;
        }
        
        // Helper function to get the table cell containing a node
        function getTableCell(node) {
            let parent = node.nodeType === Node.TEXT_NODE ? node.parentNode : node;
            while (parent) {
                if (parent.tagName === 'TD' || parent.tagName === 'TH') {
                    return parent;
                }
                parent = parent.parentNode;
            }
            return null;
        }

        // Helper function to highlight text nodes in a range
        function highlightRange(range) {
            const createdMarks = [];
            const startContainer = range.startContainer;
            const endContainer = range.endContainer;
            const startOffset = range.startOffset;
            const endOffset = range.endOffset;
            
            // Check if selection crosses table cell boundaries
            const startCell = getTableCell(startContainer);
            const endCell = getTableCell(endContainer);
            
            // If selection is inside table and crosses cell boundaries, only highlight within the start cell
            if (startCell && endCell && startCell !== endCell) {
                if (startContainer.nodeType === Node.TEXT_NODE) {
                    const mark = document.createElement('mark');
                    mark.style.backgroundColor = 'yellow';
                    const selectedText = startContainer.textContent.substring(startOffset);
                    if (selectedText.trim()) {
                        mark.textContent = selectedText;
                        
                        const beforeText = startContainer.textContent.substring(0, startOffset);
                        const parent = startContainer.parentNode;
                        if (beforeText) parent.insertBefore(document.createTextNode(beforeText), startContainer);
                        parent.insertBefore(mark, startContainer);
                        parent.removeChild(startContainer);
                        createdMarks.push(mark);
                    }
                }
                return createdMarks;
            }
            
            // If start and end are in the same text node
            if (startContainer === endContainer && startContainer.nodeType === Node.TEXT_NODE) {
                const mark = document.createElement('mark');
                mark.style.backgroundColor = 'yellow';
                const selectedText = startContainer.textContent.substring(startOffset, endOffset);
                mark.textContent = selectedText;
                
                const beforeText = startContainer.textContent.substring(0, startOffset);
                const afterText = startContainer.textContent.substring(endOffset);
                
                const parent = startContainer.parentNode;
                if (beforeText) parent.insertBefore(document.createTextNode(beforeText), startContainer);
                parent.insertBefore(mark, startContainer);
                if (afterText) parent.insertBefore(document.createTextNode(afterText), startContainer);
                parent.removeChild(startContainer);
                createdMarks.push(mark);
                return createdMarks;
            }
            
            // For multi-node selection, collect all text nodes in range
            const textNodes = [];
            const walker = document.createTreeWalker(
                range.commonAncestorContainer,
                NodeFilter.SHOW_TEXT,
                null,
                false
            );
            
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
            
            // Highlight each text node
            textNodes.forEach((textNode, index) => {
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
                createdMarks.push(mark);
            });
            return createdMarks;
        }

        // Highlight only
        highlightOption.addEventListener('click', function() {
            if (selectionRange) {
                try {
                    highlightRange(selectionRange);
                    window.getSelection().removeAllRanges();
                } catch (err) {
                    console.log('Highlight error:', err);
                }
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
            if (selectionRange) {
                try {
                    const selectedText = selectionRange.toString();
                    const createdMarks = highlightRange(selectionRange);
                    
                    if (createdMarks.length > 0) {
                        const markId = Date.now().toString();
                        const firstMark = createdMarks[0];
                        
                        // Add attributes and click listeners to ALL created marks
                        createdMarks.forEach((mark) => {
                            mark.setAttribute('data-tooltip', '');
                            mark.setAttribute('data-note', '');
                            mark.dataset.markId = markId;
                            mark.dataset.headerText = selectedText;
                            
                            // Add click event to show note popup
                            mark.addEventListener('click', function(e) {
                                e.stopPropagation();
                                showNotePopup(mark);
                            });
                        });

                        // Also add entry to sidebar
                        const noteDiv = document.createElement('div');
                        noteDiv.classList.add('sidebar-note-item');
                        noteDiv.innerHTML = `
                            <div class="sidebar-header" style="margin-bottom: 3px; cursor: pointer;">${selectedText}</div>
                            <div class="sidebar-note-content" style="color: #666; white-space: pre-wrap;"></div>
                        `;
                        noteDiv.style.borderBottom = '1px solid #ccc';
                        noteDiv.style.padding = '8px';
                        noteDiv.dataset.markId = markId;
                        
                        sidebar.appendChild(noteDiv);
                        sidebar.style.right = '0px';

                        // Click sidebar item to open popup
                        noteDiv.addEventListener('click', () => {
                            showNotePopup(firstMark);
                        });

                        // Immediately show popup for new note
                        showNotePopup(firstMark);
                    }
                    
                    window.getSelection().removeAllRanges();
                } catch (err) {
                    console.log('Note highlight error:', err);
                }
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
                
                // Remove highlight and restore original text
                const parent = clickedMark.parentNode;
                while (clickedMark.firstChild) {
                    parent.insertBefore(clickedMark.firstChild, clickedMark);
                }
                parent.removeChild(clickedMark);
                
                clickedMark = null;
            }
            contextMenu.style.display = 'none';
        });

        // Clear all highlights and notes
        allClearOption.addEventListener('click', function() {
            document.querySelectorAll('mark').forEach(marked => {
                marked.replaceWith(document.createTextNode(marked.innerText));
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
                <div class="popup-header" contenteditable="true" style="font-weight: bold; cursor: text; padding: 8px; background: rgba(0,0,0,0.05); margin-bottom: 5px; border: 1px solid #ccc; outline: none;">${mark.dataset.headerText || mark.innerText}</div>
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
                mark.dataset.note = textarea.value;
                
                // Update sidebar note content
                const markId = mark.dataset.markId;
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
    {{-- Checkbox limit for Questions 8-10 (max 3 selections) --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('.q8-10-checkbox');
            const maxSelections = 3;
            
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    // Count checked checkboxes
                    const checkedCount = document.querySelectorAll('.q8-10-checkbox:checked').length;
                    
                    // If more than 3 are checked, uncheck this one
                    if (checkedCount > maxSelections) {
                        this.checked = false;
                        return;
                    }
                    
                    // Update hidden inputs with selected values
                    updateHiddenInputsQ8();
                });
            });
            
            function updateHiddenInputsQ8() {
                const checkedBoxes = document.querySelectorAll('.q8-10-checkbox:checked');
                const values = Array.from(checkedBoxes).map(cb => cb.value);
                
                // Clear all hidden inputs first
                document.getElementById('8').value = '';
                document.getElementById('9').value = '';
                document.getElementById('10').value = '';
                
                // Assign values to hidden inputs
                if (values.length > 0) document.getElementById('8').value = values[0];
                if (values.length > 1) document.getElementById('9').value = values[1];
                if (values.length > 2) document.getElementById('10').value = values[2];
                
                // Activate bottom question number based on checked count
                // 1 checked = 8 active, 2 checked = 9 active, 3 checked = 10 active
                if (typeof window.setActiveQuestionByNumber === 'function') {
                    if (values.length === 1) {
                        window.setActiveQuestionByNumber('8');
                    } else if (values.length === 2) {
                        window.setActiveQuestionByNumber('9');
                    } else if (values.length === 3) {
                        window.setActiveQuestionByNumber('10');
                    }
                }
            }
        });
    </script>
    
    {{-- Clickable Table Cells for Questions 11-15 --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const clickableCellsQ11 = document.querySelectorAll('.clickable-cell-q11');
            
            clickableCellsQ11.forEach(cell => {
                cell.addEventListener('click', function() {
                    const question = this.getAttribute('data-question');
                    const value = this.getAttribute('data-value');
                    const hiddenInput = document.getElementById(question);
                    
                    // Get all cells for this question
                    const rowCells = document.querySelectorAll(`.clickable-cell-q11[data-question="${question}"]`);
                    
                    // Check if this cell is already selected
                    const isSelected = this.textContent === '✓';
                    
                    if (isSelected) {
                        // Deselect - remove tick mark and clear hidden input
                        this.textContent = '';
                        this.style.backgroundColor = '';
                        this.style.color = '';
                        if (hiddenInput) {
                            hiddenInput.value = '';
                        }
                    } else {
                        // Clear all other cells in this row first
                        rowCells.forEach(c => {
                            c.textContent = '';
                            c.style.backgroundColor = '';
                            c.style.color = '';
                        });
                        
                        // Select this cell - add tick mark
                        this.textContent = '✓';
                        this.style.backgroundColor = '#d4edda';
                        this.style.color = '#28a745';
                        this.style.fontWeight = 'bold';
                        this.style.fontSize = '18px';
                        
                        // Update hidden input with selected value
                        if (hiddenInput) {
                            hiddenInput.value = value;
                        }
                        
                        // Activate bottom question number for Q11-15
                        if (typeof window.setActiveQuestionByNumber === 'function') {
                            window.setActiveQuestionByNumber(question);
                        }
                    }
                });
                
                // Add hover effect
                cell.addEventListener('mouseenter', function() {
                    if (this.textContent !== '✓') {
                        this.style.backgroundColor = '#f0f0f0';
                    }
                });
                
                cell.addEventListener('mouseleave', function() {
                    if (this.textContent !== '✓') {
                        this.style.backgroundColor = '';
                    }
                });
            });
        });
    </script>
    
    {{-- Clickable Table Cells for Questions 16-20 --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const clickableCellsQ16 = document.querySelectorAll('.clickable-cell-q16');
            
            clickableCellsQ16.forEach(cell => {
                cell.addEventListener('click', function() {
                    const question = this.getAttribute('data-question');
                    const value = this.getAttribute('data-value');
                    const hiddenInput = document.getElementById(question);
                    
                    // Get all cells for this question
                    const rowCells = document.querySelectorAll(`.clickable-cell-q16[data-question="${question}"]`);
                    
                    // Check if this cell is already selected
                    const isSelected = this.textContent === '✓';
                    
                    if (isSelected) {
                        // Deselect - remove tick mark and clear hidden input
                        this.textContent = '';
                        this.style.backgroundColor = '';
                        this.style.color = '';
                        if (hiddenInput) {
                            hiddenInput.value = '';
                        }
                    } else {
                        // Clear all other cells in this row first
                        rowCells.forEach(c => {
                            c.textContent = '';
                            c.style.backgroundColor = '';
                            c.style.color = '';
                        });
                        
                        // Select this cell - add tick mark
                        this.textContent = '✓';
                        this.style.backgroundColor = '#d4edda';
                        this.style.color = '#28a745';
                        this.style.fontWeight = 'bold';
                        this.style.fontSize = '18px';
                        
                        // Update hidden input with selected value
                        if (hiddenInput) {
                            hiddenInput.value = value;
                        }
                        
                        // Activate bottom question number for Q16-20
                        if (typeof window.setActiveQuestionByNumber === 'function') {
                            window.setActiveQuestionByNumber(question);
                        }
                    }
                });
                
                // Add hover effect
                cell.addEventListener('mouseenter', function() {
                    if (this.textContent !== '✓') {
                        this.style.backgroundColor = '#f0f0f0';
                    }
                });
                
                cell.addEventListener('mouseleave', function() {
                    if (this.textContent !== '✓') {
                        this.style.backgroundColor = '';
                    }
                });
            });
        });
    </script>
    
    {{-- Clickable Table Cells for Questions 21-23 --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const clickableCellsQ21 = document.querySelectorAll('.clickable-cell-q21');
            
            clickableCellsQ21.forEach(cell => {
                cell.addEventListener('click', function() {
                    const question = this.getAttribute('data-question');
                    const value = this.getAttribute('data-value');
                    const hiddenInput = document.getElementById(question);
                    
                    // Get all cells for this question
                    const rowCells = document.querySelectorAll(`.clickable-cell-q21[data-question="${question}"]`);
                    
                    // Check if this cell is already selected
                    const isSelected = this.textContent === '✓';
                    
                    if (isSelected) {
                        // Deselect - remove tick mark and clear hidden input
                        this.textContent = '';
                        this.style.backgroundColor = '';
                        this.style.color = '';
                        if (hiddenInput) {
                            hiddenInput.value = '';
                        }
                    } else {
                        // Clear all other cells in this row first
                        rowCells.forEach(c => {
                            c.textContent = '';
                            c.style.backgroundColor = '';
                            c.style.color = '';
                        });
                        
                        // Select this cell - add tick mark
                        this.textContent = '✓';
                        this.style.backgroundColor = '#d4edda';
                        this.style.color = '#28a745';
                        this.style.fontWeight = 'bold';
                        this.style.fontSize = '18px';
                        
                        // Update hidden input with selected value
                        if (hiddenInput) {
                            hiddenInput.value = value;
                        }
                        
                        // Activate bottom question number for Q21-23
                        if (typeof window.setActiveQuestionByNumber === 'function') {
                            window.setActiveQuestionByNumber(question);
                        }
                    }
                });
                
                // Add hover effect
                cell.addEventListener('mouseenter', function() {
                    if (this.textContent !== '✓') {
                        this.style.backgroundColor = '#f0f0f0';
                    }
                });
                
                cell.addEventListener('mouseleave', function() {
                    if (this.textContent !== '✓') {
                        this.style.backgroundColor = '';
                    }
                });
            });
        });
    </script>
    
    {{-- select maximum number checkbox  --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const maxSelection = 2;

            // Add all checkbox group names here
            const groups = ['q14_15[]'];

            groups.forEach(groupName => {
                const checkboxes = document.querySelectorAll(`input[name="${groupName}"]`);
                checkboxes.forEach(checkbox => {
                    checkbox.addEventListener('change', function() {
                        const checked = Array.from(checkboxes).filter(cb => cb.checked);
                        if (checked.length > maxSelection) {
                            this.checked = false;
                            alert(`⚠️ You can only select up to ${maxSelection} options.`);
                        }
                    });
                });
            });
        });
    </script>
   {{-- input auto sujection off  --}}
    <script>
                document.addEventListener('DOMContentLoaded', function() {
            // Get all input fields within the form
            const inputs = document.querySelectorAll('#testForm input');

            // Loop through each input and set autocomplete="off"
            inputs.forEach(function(input) {
                input.setAttribute('autocomplete', 'off');
            });
        });
    </script>
    
    {{-- Remove placeholder on focus for all inputs --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get all input fields with type="text"
            const allInputs = document.querySelectorAll('input[type="text"]');
            
            allInputs.forEach(input => {
                // Store original placeholder
                const originalPlaceholder = input.getAttribute('placeholder');
                
                // Clear placeholder on focus
                input.addEventListener('focus', function() {
                    this.setAttribute('placeholder', '');
                });
                
                // Restore placeholder on blur if input is empty
                input.addEventListener('blur', function() {
                    if (this.value === '' || this.value === null) {
                        this.setAttribute('placeholder', originalPlaceholder);
                    }
                });
            });
        });
    </script>
    
<script>
document.querySelectorAll('.tab').forEach(tab => {
    tab.addEventListener('click', function () {

        document.querySelectorAll('audio').forEach(a => {
            a.pause();
            a.currentTime = 0;
        });

        const tabId = this.dataset.tab;
        const activeTab = document.getElementById(tabId);
        if (!activeTab) return;

        const audio = activeTab.querySelector('audio');
        if (!audio) return;

        audio.load();   // ✅ only load
    });
});
</script>




</body>

</html>
