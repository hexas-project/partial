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
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
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
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
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
            background-color: #000;
        }

        .modal-backdrop.show {
            opacity: 0.85;
        }

        /* Drag and Drop Styling */
        .draggable-feature {
            display: inline-block;
            padding: 8px 16px;
            background: #f5f5f5;
            border-radius: 4px;
            cursor: move;
            user-select: none;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.08);
            transition: all 0.2s ease;
            border: 1px solid #ddd;
            margin-bottom: 5px;
        }

        .draggable-feature:hover {
            background: #eeeeee;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
        }

        .drop-zone-q24 {
            padding: 8px 12px;
            width: 200px;
            margin: 0 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background: white;
            transition: all 0.3s ease;
        }

        .drop-zone-q24.drag-over {
            background-color: #e3f2fd;
            border-color: #2196F3;
            box-shadow: 0 0 0 2px rgba(33, 150, 243, 0.2);
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
                                    <span class="material-icons-outlined">schedule</span>
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
            <div id="customContextMenu" style="
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
                    {{-- hidden input --}}
                    <input type="hidden" name="test_name" value="{{ $testName ?? 'listeningThree' }}">
                    <input type="hidden" name="student_id" value="{{ auth()->id() ?? session('student_batch_id') }}">
                    <input type="hidden" name="exam_student_id" id="examStudentIdField" value="">
                    <input type="hidden" name="assignment_id" value="{{ $assignmentId ?? '' }}">
                    <div class="question_part">
                        <h4>Part 1</h4>
                        <p>Questions 1–10</p>
                    </div>

                    <div class="mt-4">
                        <!--<h4>Questions 1–6</h4>-->
                        <div class="d-flex  align-items-center gap-3 ">

                            <h4>Questions 1–6</h4>
                            <!-- <audio controls
                                src="{{ asset('audio/103partial.mp3') }}"></audio> -->
                        </div><br>
                        <p><em>Complete the form below.</em></p>
                        <p>Write <strong>NO MORE THAN THREE WORDS OR A NUMBER</strong> for each answer.</p>

                        <h5 class="mt-3"><strong>CUSTOMER ORDER FORM</strong></h5>
                        <p style="margin-bottom: 
                        0px;"><strong> Example:</p></br></strong>
                        <p>ORDER PLACED BY:  John Carter </p>

                        <p>ACCOUNT NUMBER <input type="text" name="q1" placeholder="1" class="inline-input"
                                value="{{ $answers[1] ?? '' }}" id="1"></p>
                        <p>COMPANY NAME <input type="text" name="q2" placeholder="2" class="inline-input"
                                value="{{ $answers[2] ?? '' }}" id="2"></p>

                        <p class="mt-3"><strong>Envelopes</strong></p>
                        <p>Size: A4 normal</p>
                        <p>Colour <input type="text" name="q3" placeholder="3" class="inline-input"
                                value="{{ $answers[3] ?? '' }}" id="3"></p>
                        <p>Quantity <input type="text" name="q4" placeholder="4" class="inline-input"
                                value="{{ $answers[4] ?? '' }}" id="4"></p>

                        <p class="mt-3"><strong>Photocopy paper</strong></p>
                        <p>Colour <input type="text" name="q5" placeholder="5" class="inline-input"
                                value="{{ $answers[5] ?? '' }}" id="5"></p>
                        <p>Quantity <input type="text" name="q6" placeholder="6" class="inline-input"
                                value="{{ $answers[6] ?? '' }}" id="6"></p>

                        <hr class="my-4">

                        <h4>Questions 7–9</h4>
                        <p>List <strong>THREE</strong> additional things that the man requests.</p>
                        <p>Write <strong>NO MORE THAN THREE WORDS</strong> for each answer.</p>
                        <p><input type="text" name="q7" placeholder="7" class="inline-input"
                                value="{{ $answers[7] ?? '' }}" id="7"></p>
                        <p><input type="text" name="q8" placeholder="8" class="inline-input"
                                value="{{ $answers[8] ?? '' }}" id="8"></p>
                        <p><input type="text" name="q9" placeholder="9" class="inline-input"
                                value="{{ $answers[9] ?? '' }}" id="9"></p>

                        <hr class="my-4">

                        <h4>Question 10</h4>
                        <p><em>Complete the notes.</em></p>
                        <p>Write <strong>NO MORE THAN THREE WORDS</strong> for your answer.</p>
                        <p>Special instructions: Deliver goods <input type="text" name="q10" placeholder="10"
                                class="inline-input" value="{{ $answers[10] ?? '' }}" id="10"></p>
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
                        <p><em>Complete the notes below.</em></p>
                        <p>Write <strong>NO MORE THAN THREE WORDS</strong> for each answer.</p>

                        <h5 class="mt-3"><strong>Artist’s Exhibition</strong></h5>
                        <p><strong>General details:</strong></p>
                        <p>Place: <input type="text" name="q11" placeholder="11" class="inline-input"
                                value="{{ $answers[11] ?? '' }}" id="11"> &nbsp; No. 1 <input type="text" name="q12"
                                placeholder="12" class="inline-input" value="{{ $answers[12] ?? '' }}" id="12"></p>
                        <p>Dates: 6th October – <input type="text" name="q13" placeholder="13" class="inline-input"
                                value="{{ $answers[13] ?? '' }}" id="13"></p>
                        <p><strong>Display details:</strong></p>
                        <div class="mt-2">
                            <p>jewellery</p>
                            <p>furniture</p>
                            <p>ceramics</p>
                            <p><input type="text" name="q14" placeholder="14" class="inline-input"
                                    value="{{ $answers[14] ?? '' }}" id="14"></p>
                            <p>Sculpture</p>
                        </div>

                        <div class="mt-3">
                            <p>Expect to see: crockery in the shape of <input type="text" name="q15" placeholder="15"
                                    class="inline-input" value="{{ $answers[15] ?? '' }}" id="15"></p>
                            <p>silver jewellery, e.g. large rings containing <input type="text" name="q16"
                                    placeholder="16" class="inline-input" value="{{ $answers[16] ?? '' }}" id="16"></p>
                            <p>a shoe sculpture made out of <input type="text" name="q17" placeholder="17"
                                    class="inline-input" value="{{ $answers[17] ?? '' }}" id="17"></p>
                            <p>Go to demonstrations called: <input type="text" name="q18" placeholder="18"
                                    class="inline-input" value="{{ $answers[18] ?? '' }}" id="18"></p>
                        </div>

                        <h5 class="mt-4"><strong>Artist’s Conservatory</strong></h5>
                        <p><strong>Courses include:</strong></p>
                        <div class="mt-2">
                            <p>Chinese brush painting</p>
                            <p><input type="text" name="q19" placeholder="19" class="inline-input"
                                    value="{{ $answers[19] ?? '' }}" id="19"></p>
                            <p>silk painting</p>
                        </div>

                        <p class="mt-3"><strong>Fees include:</strong></p>
                        <div class="mt-2">
                            <p>Studio use</p>
                            <p>Access to the shop</p>
                            <p>Supply of <input type="text" name="q20" placeholder="20" class="inline-input"
                                    value="{{ $answers[20] ?? '' }}" id="20"></p>
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
                        <p><em>Complete the sentences below.</em></p>
                        <p>Write <strong>NO MORE THAN THREE WORDS</strong> for each answer.</p>

                        <p>According to Alison Sharp, bear ancestors date back <input type="text" name="q21"
                                placeholder="21" class="inline-input" value="{{ $answers[21] ?? '' }}" id="21"> years.
                        </p>
                        <p>Scientists think bears were originally in the same family as <input type="text" name="q22"
                                placeholder="22" class="inline-input" value="{{ $answers[22] ?? '' }}" id="22"></p>
                        <p>The Cave Bear was not dangerous because it <input type="text" name="q23" placeholder="23"
                                class="inline-input" value="{{ $answers[23] ?? '' }}" id="23"></p>

                        <hr class="my-4">

                        <h4>Questions 24–28</h4>
                        <p>Which bear species matches the following descriptions?</p>
                        <p>Choose the correct answer and move it into the gap.</p>

                        <div class="row mt-3">
                            <div class="col-md-7">
                                <div style="background: white; padding: 0;">
                                    <div style="display: flex; align-items: center; margin-bottom: 5px;">
                                        <span>24. Which is the most recent species?</span>
                                        <input type="text" name="q24" placeholder="24" class="drop-zone-q24"
                                            value="{{ $answers[24] ?? '' }}" id="24" readonly>
                                    </div>
                                    <div style="display: flex; align-items: center; margin-bottom: 5px;">
                                        <span>25. Which is the largest looking bear?</span>
                                        <input type="text" name="q25" placeholder="25" class="drop-zone-q24"
                                            value="{{ $answers[25] ?? '' }}" id="25" readonly>
                                    </div>
                                    <div style="display: flex; align-items: center; margin-bottom: 5px;">
                                        <span>26. Which is the smallest bear?</span>
                                        <input type="text" name="q26" placeholder="26" class="drop-zone-q24"
                                            value="{{ $answers[26] ?? '' }}" id="26" readonly>
                                    </div>
                                    <div style="display: flex; align-items: center; margin-bottom: 5px;">
                                        <span>27. Which bear eats plants?</span>
                                        <input type="text" name="q27" placeholder="27" class="drop-zone-q24"
                                            value="{{ $answers[27] ?? '' }}" id="27" readonly>
                                    </div>
                                    <div style="display: flex; align-items: center; margin-bottom: 0;">
                                        <span>28. Which bear eats insects?</span>
                                        <input type="text" name="q28" placeholder="28" class="drop-zone-q24"
                                            value="{{ $answers[28] ?? '' }}" id="28" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <h5 style="font-weight: bold; margin-bottom: 20px;">Bear Species</h5>
                                <div style="background: white; padding: 0;">
                                    @php
                                        $bears = [
                                            'A' => 'Brown Bear',
                                            'B' => 'Giant Panda',
                                            'C' => 'Polar Bear',
                                            'D' => 'Sloth Bear',
                                            'E' => 'Sun Bear'
                                        ];
                                    @endphp
                                    @foreach($bears as $letter => $bear)
                                        <div style="margin-bottom: 10px;">
                                            <span class="draggable-feature" draggable="true" data-value="{{ $bear }}">
                                                {{ $letter }}. {{ $bear }}
                                            </span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <h4>Questions 29–30</h4>
                        <p>Choose <strong>TWO</strong> Correct answers.</p>
                        <p>29 & 30 Which <strong>TWO</strong> things are mentioned to help bears survive?</p>
                        @php
                            $selected29_30 = [];
                            if (!empty($assignmentId)) {
                                $selected29_30 = array_values(array_filter([
                                    $answers[29] ?? null,
                                    $answers[30] ?? null,
                                ], fn($v) => $v !== null && $v !== ''));
                            }
                        @endphp
                        <div class="mt-2" id="q29-30-checkboxes">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="q29_30[]" value="A" id="q29_30_A"
                                    {{ in_array('A', $selected29_30, true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="q29_30_A"> breeding bears in captivity</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="q29_30[]" value="B" id="q29_30_B"
                                    {{ in_array('B', $selected29_30, true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="q29_30_B"> encouraging a more humane
                                    attitude</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="q29_30[]" value="C" id="q29_30_C"
                                    {{ in_array('C', $selected29_30, true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="q29_30_C"> keeping bears in national parks</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="q29_30[]" value="D" id="q29_30_D"
                                    {{ in_array('D', $selected29_30, true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="q29_30_D"> enforcing international laws</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="q29_30[]" value="E" id="q29_30_E"
                                    {{ in_array('E', $selected29_30, true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="q29_30_E"> buying the speaker’s book</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="q29_30[]" value="F" id="q29_30_F"
                                    {{ in_array('F', $selected29_30, true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="q29_30_F"> writing to the United Nation</label>
                            </div>
                        </div>

                        <input type="hidden" name="q29" value="{{ $selected29_30[0] ?? '' }}" id="q29_hidden">
                        <input type="hidden" name="q30" value="{{ $selected29_30[1] ?? '' }}" id="q30_hidden">
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
                        <p><em>Choose the correct answer.</em></p>

                        <div class="mt-3">
                            <p><strong>31</strong> The speaker compares a solar eclipse today to a</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q31" id="q31_A" value="A" {{ ($answers[31] ?? '') === 'A' ? 'checked' : '' }}>
                                <label class="form-check-label" for="q31_A"> religious experience.</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q31" id="q31_B" value="B" {{ ($answers[31] ?? '') === 'B' ? 'checked' : '' }}>
                                <label class="form-check-label" for="q31_B"> scientific event.</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q31" id="q31_C" value="C" {{ ($answers[31] ?? '') === 'C' ? 'checked' : '' }}>
                                <label class="form-check-label" for="q31_C"> popular spectacle.</label>
                            </div>

                            <p class="mt-3"><strong>32</strong> The speaker says that the dark spot of an eclipse is</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q32" id="q32_A" value="A" {{ ($answers[32] ?? '') === 'A' ? 'checked' : '' }}>
                                <label class="form-check-label" for="q32_A"> simple to predict.</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q32" id="q32_B" value="B" {{ ($answers[32] ?? '') === 'B' ? 'checked' : '' }}>
                                <label class="form-check-label" for="q32_B"> easy to explain.</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q32" id="q32_C" value="C" {{ ($answers[32] ?? '') === 'C' ? 'checked' : '' }}>
                                <label class="form-check-label" for="q32_C"> randomly occurring.</label>
                            </div>

                            <p class="mt-3"><strong>33</strong> Concerning an eclipse, the ancient Chinese were</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q33" id="q33_A" value="A" {{ ($answers[33] ?? '') === 'A' ? 'checked' : '' }}>
                                <label class="form-check-label" for="q33_A"> fascinated.</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q33" id="q33_B" value="B" {{ ($answers[33] ?? '') === 'B' ? 'checked' : '' }}>
                                <label class="form-check-label" for="q33_B"> rational.</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q33" id="q33_C" value="C" {{ ($answers[33] ?? '') === 'C' ? 'checked' : '' }}>
                                <label class="form-check-label" for="q33_C"> terrified.</label>
                            </div>

                            <p class="mt-3"><strong>34</strong> For the speaker, the most impressive aspect of an
                                eclipse is the</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q34" id="q34_A" value="A" {{ ($answers[34] ?? '') === 'A' ? 'checked' : '' }}>
                                <label class="form-check-label" for="q34_A"> exceptional beauty of the sky.</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q34" id="q34_B" value="B" {{ ($answers[34] ?? '') === 'B' ? 'checked' : '' }}>
                                <label class="form-check-label" for="q34_B"> chance for scientific study.</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q34" id="q34_C" value="C" {{ ($answers[34] ?? '') === 'C' ? 'checked' : '' }}>
                                <label class="form-check-label" for="q34_C"> effect of the moon on the sun.</label>
                            </div>

                            <p class="mt-3"><strong>35</strong> Eclipses occur rarely because of the size of the</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q35" id="q35_A" value="A" {{ ($answers[35] ?? '') === 'A' ? 'checked' : '' }}>
                                <label class="form-check-label" for="q35_A"> moon.</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q35" id="q35_B" value="B" {{ ($answers[35] ?? '') === 'B' ? 'checked' : '' }}>
                                <label class="form-check-label" for="q35_B"> sun.</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q35" id="q35_C" value="C" {{ ($answers[35] ?? '') === 'C' ? 'checked' : '' }}>
                                <label class="form-check-label" for="q35_C"> earth.</label>
                            </div>

                            <p class="mt-3"><strong>36</strong> In predicting eclipses, the Babylonians were restricted
                                by their</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q36" id="q36_A" value="A" {{ ($answers[36] ?? '') === 'A' ? 'checked' : '' }}>
                                <label class="form-check-label" for="q36_A"> religious attitudes.</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q36" id="q36_B" value="B" {{ ($answers[36] ?? '') === 'B' ? 'checked' : '' }}>
                                <label class="form-check-label" for="q36_B"> inaccurate observations.</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q36" id="q36_C" value="C" {{ ($answers[36] ?? '') === 'C' ? 'checked' : '' }}>
                                <label class="form-check-label" for="q36_C"> limited ability to calculate.</label>
                            </div>
                        </div>

                        <hr class="my-4">

                        <h4>Questions 37–40</h4>
                        <p><em>Complete the table below.</em></p>
                        <p>Write <strong>NO MORE THAN THREE WORDS</strong> for each answer.</p>

                        <table class="table table-bordered mt-3" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Date of eclipse</th>
                                    <th>Scientists</th>
                                    <th>Observation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1715</td>
                                    <td>Halley</td>
                                    <td><input type="text" name="q37" placeholder="37" class="inline-input"
                                            value="{{ $answers[37] ?? '' }}" id="37"> who accurately predicted an
                                        eclipse</td>
                                </tr>
                                <tr>
                                    <td>1868</td>
                                    <td>Janssen and Lockyer</td>
                                    <td>discovered <input type="text" name="q38" placeholder="38" class="inline-input"
                                            value="{{ $answers[38] ?? '' }}" id="38"></td>
                                </tr>
                                <tr>
                                    <td>1878</td>
                                    <td>Watson</td>
                                    <td>believed he had found <input type="text" name="q39" placeholder="39"
                                            class="inline-input" value="{{ $answers[39] ?? '' }}" id="39"></td>
                                </tr>
                                <tr>
                                    <td>1919</td>
                                    <td>Einstein</td>
                                    <td>realised astronomers had misunderstood <input type="text" name="q40"
                                            placeholder="40" class="inline-input" value="{{ $answers[40] ?? '' }}"
                                            id="40"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
    </form>
    <!--Alart Modal exam start-->
    <div class="modal fade" id="startModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true"
        data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Start Listening Test</h5>
                </div>
                <div class="modal-body">
                    <p class="instruction-text">Please enter your Student ID and click OK to begin the listening test.
                    </p>
                    <div class="form-group">
                        <label for="studentIdInput" class="form-label">Student ID</label>
                        <input type="text" class="form-control" id="studentIdInput" placeholder="Enter your Student ID"
                            minlength="8" inputmode="text" pattern="[A-Za-z0-9]{8,}" required>
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
        <div class="fixed-bottom d-flex justify-content-end mb-5 px-5"
            style="gap: 5px; z-index: 2050; pointer-events: none;">
            <button id="prev-question" type="button" class="btn btn-dark"
                style="font-size: 1.5rem; pointer-events: auto;">
                <span class="material-icons-outlined">arrow_back</span>
            </button>
            <button id="next-question" type="button" class="btn btn-dark"
                style="font-size: 1.5rem; pointer-events: auto;">
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
            link.addEventListener('click', function (e) {
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
            link.addEventListener('click', function (event) {
                event.preventDefault();

                // Remove "active" class from all links
                questionLinks.forEach(l => l.classList.remove('active'));

                // Add "active" class to clicked link
                this.classList.add('active');
            });
        });
    </script>
    {{-- alart and timer script and finished test script --}}

    <script>
        document.addEventListener('DOMContentLoaded', function () {
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
            const specificAudio = new Audio('{{ asset("audio/103partial.mp3") }}');
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
                studentIdInput.addEventListener('keypress', function (event) {
                    if (event.key === 'Enter') {
                        event.preventDefault();
                        startButton.click();
                    }
                });
            }

            // Start test: play audio and start timer when OK button is clicked
            startButton.addEventListener('click', function () {
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
            finishButton.addEventListener('click', function (e) {
                e.preventDefault();
                finishModal.show();
            });

            // Prevent double submission
            let isSubmitting = false;

            // When user clicks "Continue" → submit form
            continueButton.addEventListener('click', function () {
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
                autosaveDebounceTimer = setTimeout(function () {
                    flushDirtyInputs();
                }, 10000);
            }

            if (testForm) {
                // Prevent Enter key from submitting the form
                testForm.addEventListener('keypress', function (e) {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        return false;
                    }
                });

                testForm.addEventListener('submit', function () {
                    if (autosaveDebounceTimer) {
                        clearTimeout(autosaveDebounceTimer);
                        autosaveDebounceTimer = null;
                    }
                    flushDirtyInputs();
                });
            }

            document.querySelectorAll('input[type="radio"], input[type="text"], input[type="checkbox"]').forEach(
                input => {
                    input.addEventListener('change', function () {
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
                input.addEventListener('focus', function () {
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
        toggleSidebar.addEventListener('click', function () {
            if (sidebar.style.right === '0px') {
                sidebar.style.right = '-300px';
            } else {
                sidebar.style.right = '0px';
            }
        });

        closeSidebar.addEventListener('click', function () {
            sidebar.style.right = '-300px';
        });

        // Context menu on right-click
        document.addEventListener('contextmenu', function (e) {
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
        document.addEventListener('click', function (e) {
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
        highlightOption.addEventListener('click', function () {
            const rangeToUse = selectionRange || (lastSelectionRange ? lastSelectionRange.cloneRange() : null);
            if (rangeToUse) {
                highlightRange(rangeToUse);
            }
            contextMenu.style.display = 'none';
        });

        // Add note with popup
        notesOption.addEventListener('click', function () {
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
                    mark.addEventListener('click', function (e) {
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
        clearOption.addEventListener('click', function () {
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
        allClearOption.addEventListener('click', function () {
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

            document.getElementById('closeSidebar').addEventListener('click', function (e) {
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
    {{-- select maximum number checkbox --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const maxSelection = 2;

            // Add all checkbox group names here
            const groups = ['q14_15[]', 'q29_30[]'];

            groups.forEach(groupName => {
                const checkboxes = document.querySelectorAll(`input[name="${groupName}"]`);
                checkboxes.forEach(checkbox => {
                    checkbox.addEventListener('change', function () {
                        const checked = Array.from(checkboxes).filter(cb => cb.checked);
                        if (checked.length > maxSelection) {
                            this.checked = false;
                        }
                    });
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const container = document.getElementById('q29-30-checkboxes');
            const checkboxes = container ? Array.from(container.querySelectorAll('input[type="checkbox"][name="q29_30[]"]')) : [];
            const q29Hidden = document.getElementById('q29_hidden');
            const q30Hidden = document.getElementById('q30_hidden');

            if (!checkboxes.length || !q29Hidden || !q30Hidden) return;

            function syncHidden() {
                const selected = checkboxes.filter(cb => cb.checked).map(cb => cb.value);
                q29Hidden.value = selected[0] || '';
                q30Hidden.value = selected[1] || '';

                q29Hidden.dispatchEvent(new Event('change'));
                q30Hidden.dispatchEvent(new Event('change'));

                const targetQuestion = selected.length === 1 ? '29' : (selected.length === 2 ? '30' : null);
                if (targetQuestion) {
                    document.querySelectorAll('.question-link').forEach(l => l.classList.remove('active'));
                    const targetLink = document.querySelector(`.question-link[data-question="${targetQuestion}"]`);
                    if (targetLink) targetLink.classList.add('active');
                }
            }

            // Initial sync from pre-checked state
            // Sync only after user interaction
            checkboxes.forEach(cb => cb.addEventListener('change', syncHidden));
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const questionLinks = Array.from(document.querySelectorAll('.question-link'));
            ['31', '32', '33', '34', '35', '36'].forEach(qNum => {
                document.querySelectorAll(`input[type="radio"][name="q${qNum}"]`).forEach(radio => {
                    radio.addEventListener('change', () => {
                        questionLinks.forEach(l => l.classList.remove('active'));
                        const targetLink = document.querySelector(`.question-link[data-question="${qNum}"]`);
                        if (targetLink) targetLink.classList.add('active');
                    });
                });
            });
        });
    </script>

    {{-- input auto sujection off --}}
    <script>
        document.querySelectorAll('input[type="text"]').forEach(input => {
            input.setAttribute('autocomplete', 'off');
        });
        document.addEventListener('DOMContentLoaded', function () {
            // Get all input fields within the form
            const inputs = document.querySelectorAll('#testForm input');

            // Loop through each input and set autocomplete="off"
            inputs.forEach(function (input) {
                input.setAttribute('autocomplete', 'off');
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('#testForm input.inline-input[type="text"]').forEach(function (input) {
                input.addEventListener('focus', function () {
                    if (this.dataset.originalPlaceholder === undefined) {
                        this.dataset.originalPlaceholder = this.getAttribute('placeholder') || '';
                    }
                    this.setAttribute('placeholder', '');
                });

                input.addEventListener('blur', function () {
                    const val = (this.value || '').trim();
                    if (val === '') {
                        const original = this.dataset.originalPlaceholder || '';
                        this.setAttribute('placeholder', original);
                    }
                });
            });
        });
    </script>


    {{-- Drag and Drop for Questions 24-28 --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const draggableFeatures = document.querySelectorAll('.draggable-feature');
            const dropZones = document.querySelectorAll('.drop-zone-q24');
            let draggedElement = null;
            let draggedFromInput = false;

            function calculateInputWidth(text) {
                const span = document.createElement('span');
                span.style.visibility = 'hidden';
                span.style.position = 'absolute';
                span.style.whiteSpace = 'nowrap';
                span.style.padding = '8px 16px';
                span.style.fontSize = window.getComputedStyle(document.querySelector('.drop-zone-q24')).fontSize;
                span.textContent = text;
                document.body.appendChild(span);
                const width = span.offsetWidth;
                document.body.removeChild(span);
                return Math.max(200, width + 10);
            }

            function updateInputStyle(input) {
                if (input.value && input.value.trim() !== '') {
                    const dynamicWidth = calculateInputWidth(input.value);
                    input.setAttribute('style', `padding: 8px 16px; width: ${dynamicWidth}px; margin: 0 10px; border-radius: 4px; border: none !important; box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.08) !important; background: #e8e8e8 !important;`);
                } else {
                    input.setAttribute('style', 'padding: 8px 12px; width: 200px; margin: 0 10px; border: 1px solid #ccc; border-radius: 4px; box-shadow: none; background: white;');
                }
            }

            draggableFeatures.forEach(feature => {
                feature.addEventListener('dragstart', function (e) {
                    draggedElement = this;
                    draggedFromInput = false;
                    e.dataTransfer.setData('text/plain', this.getAttribute('data-value'));
                    this.style.opacity = '0.4';
                });
                feature.addEventListener('dragend', function () {
                    this.style.opacity = '1';
                });
            });

            dropZones.forEach(zone => {
                zone.setAttribute('draggable', 'true');
                zone.addEventListener('dblclick', function () {
                    if (this.value && this.value.trim() !== '') {
                        const oldValue = this.value;
                        draggableFeatures.forEach(f => {
                            if (f.getAttribute('data-value') === oldValue) f.style.display = 'inline-block';
                        });
                        this.value = '';
                        this.dispatchEvent(new Event('change'));
                        updateInputStyle(this);
                    }
                });
                zone.addEventListener('dragstart', function (e) {
                    if (this.value) {
                        draggedFromInput = true;
                        draggedElement = this;
                        e.dataTransfer.setData('text/plain', this.value);
                        e.dataTransfer.setData('from-input', 'true');
                        this.style.opacity = '0.4';
                    } else {
                        e.preventDefault();
                    }
                });
                zone.addEventListener('dragend', function () {
                    this.style.opacity = '1';
                });
                zone.addEventListener('dragover', function (e) {
                    e.preventDefault();
                    this.style.backgroundColor = '#e3f2fd';
                    this.style.borderColor = '#2196F3';
                });
                zone.addEventListener('dragleave', function () {
                    this.style.backgroundColor = '';
                    this.style.borderColor = '#ccc';
                });
                zone.addEventListener('drop', function (e) {
                    e.preventDefault();
                    this.style.backgroundColor = '';
                    this.style.borderColor = '#ccc';
                    const value = e.dataTransfer.getData('text/plain');
                    const fromInput = e.dataTransfer.getData('from-input');

                    if (this.value && this.value.trim() !== '') {
                        const oldValue = this.value;
                        draggableFeatures.forEach(f => {
                            if (f.getAttribute('data-value') === oldValue) f.style.display = 'inline-block';
                        });
                    }

                    this.value = value;
                    this.dispatchEvent(new Event('change'));
                    if (!fromInput && draggedElement) draggedElement.style.display = 'none';
                    if (fromInput && draggedElement && draggedElement !== this) {
                        draggedElement.value = '';
                        draggedElement.dispatchEvent(new Event('change'));
                        updateInputStyle(draggedElement);
                    }
                    updateInputStyle(this);

                    const qNum = this.id;
                    const targetLink = document.querySelector(`.question-link[data-question="${qNum}"]`);
                    if (targetLink) {
                        document.querySelectorAll('.question-link').forEach(l => l.classList.remove('active'));
                        targetLink.classList.add('active');
                    }

                    this.style.backgroundColor = '#e8f5e9';
                    setTimeout(() => { updateInputStyle(this); }, 300);
                });
            });

            const listContainer = document.querySelector('.col-md-5');
            if (listContainer) {
                listContainer.addEventListener('dragover', e => {
                    if (e.dataTransfer.types.includes('from-input')) {
                        e.preventDefault();
                        e.dataTransfer.dropEffect = 'move';
                    }
                });
                listContainer.addEventListener('drop', e => {
                    const fromInput = e.dataTransfer.getData('from-input');
                    if (fromInput && draggedElement) {
                        e.preventDefault();
                        const value = e.dataTransfer.getData('text/plain');
                        draggableFeatures.forEach(f => {
                            if (f.getAttribute('data-value') === value) f.style.display = 'inline-block';
                        });
                        if (draggedElement.tagName === 'INPUT') {
                            draggedElement.value = '';
                            draggedElement.dispatchEvent(new Event('change'));
                            updateInputStyle(draggedElement);
                        }
                    }
                });
            }

            dropZones.forEach(zone => {
                updateInputStyle(zone);
                // Hide feature from list if it's already in an input
                if (zone.value && zone.value.trim() !== '') {
                    draggableFeatures.forEach(f => {
                        if (f.getAttribute('data-value') === zone.value) {
                            f.style.display = 'none';
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>