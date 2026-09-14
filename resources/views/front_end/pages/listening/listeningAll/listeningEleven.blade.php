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

        .inline-input {
            border: 1.5px solid #aaa;
            border-radius: 4px;
            outline: none;
            background: #fff;
            padding: 2px 8px;
            margin: 0 4px;
            min-width: 140px;
            height: 28px;
        }

        .inline-input:focus {
            border-color: #555;
            outline: none;
            box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.08);
        }

        .inline-input:focus::placeholder {
            color: transparent;
        }

        /* Listening Form Styles */
        .listening-form-container {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 2.2;
            color: #333;
            max-width: 900px;
            padding: 20px;
        }

        .listening-form-row {
            display: flex;
            align-items: flex-end;
            margin-bottom: 8px;
            flex-wrap: wrap;
        }

        .listening-form-row span {
            white-space: pre;
        }

        .listening-form-container .inline-input {
            border: 1.5px solid #aaa;
            border-radius: 4px;
            background: #fff;
            min-width: 150px;
            height: 32px;
            padding: 0 10px;
            margin: 0 4px;
            font-weight: 500;
        }

        .listening-form-container .inline-input:focus {
            border-color: #616add;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(97, 106, 221, 0.1);
        }

        .q-bold {
            font-weight: bold;
            font-size: 1.1em;
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

        .map-container {
            position: relative;
            width: 50%;
            margin: 20px auto;
            border: 2px solid #000;
            padding: 20px;
            background-color: #f9f9f9;
        }

        .map-label {
            position: absolute;
            font-weight: bold;
            font-size: 14px;
            background: white;
            padding: 2px 5px;
            border: 1px solid #000;
        }

        /* Custom Modal Styles Refined */
        #startModal .modal-content {
            border-radius: 12px;
            overflow: hidden;
            border: none;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            max-width: 450px;
            margin: auto;
        }

        #startModal .modal-header {
            background: linear-gradient(to right, #616add, #764b96);
            color: white;
            padding: 15px 25px;
            border: none;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: flex-start;
            gap: 12px;
            border-radius: 0;
        }

        #startModal .modal-header .material-icons-outlined {
            font-size: 28px;
            margin-bottom: 0;
        }

        #startModal .modal-title {
            font-size: 20px;
            font-weight: 500;
            margin: 0;
            letter-spacing: 0.5px;
        }

        #startModal .modal-body {
            padding: 30px 25px 20px;
            background-color: #fff;
            text-align: center;
        }

        #startModal .instruction-text {
            color: #777;
            margin-bottom: 25px;
            font-size: 14px;
            line-height: 1.4;
            padding: 0 10px;
        }

        #startModal .student-id-card {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
            margin-bottom: 0;
            text-align: left;
            border: 1px solid #f0f0f0;
        }

        #startModal .student-id-label {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 600;
            color: #432168;
            margin-bottom: 12px;
            font-size: 13px;
            text-transform: uppercase;
        }

        #startModal .student-id-input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            outline: none;
            font-size: 15px;
            color: #333;
        }

        #startModal .student-id-input::placeholder {
            color: #bbb;
        }

        #startModal .modal-footer {
            padding: 20px 25px 30px;
            border: none;
            justify-content: center;
            background-color: #f9f9fb;
        }

        #startTestButton {
            background: linear-gradient(to right, #616add, #764b96);
            border: none;
            padding: 10px 45px;
            border-radius: 8px;
            font-weight: 500;
            font-size: 15px;
            color: white;
            text-transform: uppercase;
            box-shadow: 0 4px 12px rgba(97, 106, 221, 0.3);
            transition: all 0.2s;
        }

        #startTestButton:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 15px rgba(97, 106, 221, 0.4);
        }

        /* Validation Styles */
        #startModal .student-id-input.is-invalid {
            border-color: #dc3545 !important;
            box-shadow: 0 0 0 4px rgba(220, 53, 69, 0.1) !important;
        }

        #startModal .error-message {
            color: #d32f2f;
            font-size: 12px;
            margin-top: 8px;
            display: none;
            align-items: center;
            gap: 5px;
            font-weight: 500;
        }

        /* sidebar css  */
        .sidebar {
            height: 100%;
            width: 0;
            position: fixed;
            top: 0;
            right: 0;
            background-color: #f8f9fa;
            overflow-x: hidden;
            transition: width 0.3s ease;
            z-index: 1050;
            border-left: 1px solid #dee2e6;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.05);
        }

        .sidebar.open {
            width: 300px;
        }

        .sidebar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #dee2e6;
            background: #fff;
        }

        .sidebar-header h5 {
            margin: 0;
            color: #333;
            font-weight: 600;
        }

        .close-btn {
            cursor: pointer;
            font-size: 24px;
            line-height: 1;
            color: #666;
            transition: color 0.2s;
        }

        .close-btn:hover {
            color: #000;
        }

        #main-content {
            transition: margin-right 0.3s ease;
            width: 100%;
        }

        #main-content.shifted {
            margin-right: 300px;
        }

        .sidebar-note-item {
            padding: 12px 15px;
            border-bottom: 1px solid #eee;
            background: #fff;
            transition: background 0.2s;
        }

        .sidebar-note-item:hover {
            background: #f0f7ff;
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
    </style>
</head>

<body>
    <form action="{{ route('test.submit') }}" method="POST" id="testForm" spellcheck="false" autocomplete="off">
        @csrf

        @php
            // Extract answers for checkbox questions from individual question numbers
            // (Answers are saved separately as $answers[25], $answers[26], etc.)

            // Extract answers for Questions 25-26
            $selected25_26 = [];
            if (isset($answers[25]))
                $selected25_26[] = $answers[25];
            if (isset($answers[26]))
                $selected25_26[] = $answers[26];

            // Extract answers for Questions 27-28
            $selected27_28 = [];
            if (isset($answers[27]))
                $selected27_28[] = $answers[27];
            if (isset($answers[28]))
                $selected27_28[] = $answers[28];

            // Extract answers for Questions 29-30
            $selected29_30 = [];
            if (isset($answers[29]))
                $selected29_30[] = $answers[29];
            if (isset($answers[30]))
                $selected29_30[] = $answers[30];
        @endphp

        <!-- Sidebar -->
        <div id="sidebar" class="sidebar">
            <div class="sidebar-header">
                <h5>Notes</h5>
                <span class="close-btn" id="closeSidebar">&times;</span>
            </div>
            <div id="sidebar-notes-list" style="overflow-y: auto; height: calc(100% - 60px);">
                <!-- Notes will appear here -->
            </div>
        </div>

        <div id="main-content">
            <nav class="navbar navbar-expand-lg" style="background-color: #e9bec2;">
                <div class="container-fluid px-5">
                    <div class="collapse navbar-collapse show" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">
                                    <span class="material-icons-outlined"
                                        style="vertical-align: middle; margin-right: 5px;">schedule</span>
                                    <strong id="timer">30 minutes remaining</strong>
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item me-3">
                                <button id="finishButton" class="btn btn-outline-dark">Finish test</button>
                            </li>
                            <li class="nav-item">
                                <span id="noteToggle" class="material-icons-outlined"
                                    style="cursor: pointer;">note_alt</span>
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

            <div class="container-fluid px-5">
                <div class="tab-content active" id="part1" style="margin-bottom: 80px;">
                    <input type="hidden" name="test_name" value="{{ $testName ?? 'listeningEleven' }}">
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
                            <!-- <audio controls src="{{ asset('audio/111.MP3') }}"></audio> -->
                        </div><br>
                        <p>Complete the form below, using <strong>NO MORE THAN THREE WORDS AND/OR A
                                NUMBER</strong> for each answer.</p>

                        <div class="listening-form-container mt-3">
                            <div class="listening-form-row">
                                <span>Area of interest: city centre</span>
                            </div>

                            <div class="listening-form-row">
                                <span>Rents: from <strong class="q-bold"></strong> </span>
                                <input type="text" name="q1" class="inline-input" value="{{ $answers[1] ?? '' }}" id="1"
                                    placeholder="1">
                                <span> £ to £1000 per month</span>
                            </div>

                            <div class="listening-form-row">
                                <span>Number of bedrooms required: <strong class="q-bold"></strong> </span>
                                <input type="text" name="q2" class="inline-input" value="{{ $answers[2] ?? '' }}" id="2"
                                    placeholder="2">
                            </div>

                            <div class="listening-form-row mt-2">
                                <span>Apartment 1: North Street</span>
                            </div>

                            <div class="listening-form-row">
                                <span>Rent: <strong class="q-bold"></strong> </span>
                                <input type="text" name="q3" class="inline-input" value="{{ $answers[3] ?? '' }}" id="3"
                                    placeholder="3">
                                <span> £ per month</span>
                            </div>

                            <div class="listening-form-row">
                                <span>Including <strong class="q-bold"></strong> </span>
                                <input type="text" name="q4" class="inline-input" value="{{ $answers[4] ?? '' }}" id="4"
                                    placeholder="4">
                            </div>

                            <div class="listening-form-row mt-2">
                                <span>Apartment 2: <strong class="q-bold"></strong> </span>
                                <input type="text" name="q5" class="inline-input" value="{{ $answers[5] ?? '' }}" id="5"
                                    placeholder="5">
                                <span> Road</span>
                            </div>

                            <div class="listening-form-row">
                                <span>Rent: £625 per month</span>
                            </div>

                            <div class="listening-form-row mt-2">
                                <span>Viewing arrangements: meet <strong class="q-bold"></strong> </span>
                                <input type="text" name="q6" class="inline-input" value="{{ $answers[6] ?? '' }}" id="6"
                                    placeholder="6">
                                <span> at</span>
                            </div>

                            <div class="listening-form-row" style="padding-left: 40px;">
                                <span>Place: <strong class="q-bold"></strong> </span>
                                <input type="text" name="q7" class="inline-input" value="{{ $answers[7] ?? '' }}" id="7"
                                    placeholder="7">
                            </div>

                            <div class="listening-form-row" style="padding-left: 40px;">
                                <span>Time: <strong class="q-bold"></strong> </span>
                                <input type="text" name="q8" class="inline-input" value="{{ $answers[8] ?? '' }}" id="8"
                                    placeholder="8">
                                <span> pm</span>
                            </div>

                            <div class="listening-form-row mt-2">
                                <span>Also required: reference letter from <strong class="q-bold"></strong> </span>
                                <input type="text" name="q9" class="inline-input" value="{{ $answers[9] ?? '' }}" id="9"
                                    placeholder="9">
                            </div>

                            <div class="listening-form-row">
                                <span>One month's rent deposit</span>
                            </div>

                            <div class="listening-form-row">
                                <strong class="q-bold"></strong>
                                <input type="text" name="q10" class="inline-input" value="{{ $answers[10] ?? '' }}"
                                    id="10" placeholder="10">
                                <span> £ contract fee</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-content" id="part2" style="margin-bottom: 80px;">
                    <div class="question_part">
                        <h4>Part 2</h4>
                        <p>Questions 11–20</p>
                    </div>

                    <div class="mt-4">
                        <h4>Questions 11–20</h4>
                        <p>Complete the information below<br>Write <strong>NO MORE THAN THREE WORDS OR A NUMBER</strong>
                            for each answer.</p>

                        <table class="table table-bordered mt-3">
                            <tbody>
                                <tr>
                                    <td>3<sup>rd</sup> Floor: <input type="text" name="q11" class="inline-input"
                                            value="{{ $answers[11] ?? '' }}" id="11" placeholder="11"></td>
                                </tr>
                                <tr>
                                    <td>2<sup>nd</sup> floor: cinema</td>
                                </tr>
                                <tr>
                                    <td>1<sup>st</sup> floor: <input type="text" name="q12" class="inline-input"
                                            value="{{ $answers[12] ?? '' }}" id="12" placeholder="12"></td>
                                </tr>
                                <tr>
                                    <td>Ground floor: small shops and <input type="text" name="q13" class="inline-input"
                                            value="{{ $answers[13] ?? '' }}" id="13" placeholder="13"></td>
                                </tr>
                                <tr>
                                    <td>Basement: car park</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="mt-4">
                            <p>The beach will be <input type="text" name="q14" class="inline-input"
                                    value="{{ $answers[14] ?? '' }}" id="14" placeholder="14"></p>
                            <p>This will attract <input type="text" name="q15" class="inline-input"
                                    value="{{ $answers[15] ?? '' }}" id="15" placeholder="15"></p>
                            <p>The plans will be on display from Monday, 5<sup>th</sup> March until <input type="text"
                                    name="q16" class="inline-input" value="{{ $answers[16] ?? '' }}" id="16"
                                    placeholder="16">, 6<sup>th</sup> <input type="text" name="q17" class="inline-input"
                                    value="{{ $answers[17] ?? '' }}" id="17" placeholder="17"></p>
                            <p>Suggestions can be placed in the <input type="text" name="q18" class="inline-input"
                                    value="{{ $answers[18] ?? '' }}" id="18" placeholder="18"></p>
                            <p>The next meeting will be on April <input type="text" name="q19" class="inline-input"
                                    value="{{ $answers[19] ?? '' }}" id="19" placeholder="19">th.</p>
                            <p>It will start at <input type="text" name="q20" class="inline-input"
                                    value="{{ $answers[20] ?? '' }}" id="20" placeholder="20">pm.</p>
                        </div>
                    </div>
                </div>

                <div class="tab-content" id="part3" style="margin-bottom: 80px;">
                    <div class="question_part">
                        <h4>Part 3</h4>
                        <p>Questions 21–30</p>
                    </div>

                    <div class="mt-4">
                        <h4>Questions 21–24</h4>
                        
                        <p>Choose the correct answer.Advice on writing a dissertation</p>

                        <div class="mb-4">
                            <p class="mt-3"><strong>21 What does Howard say about the experience of writing his
                                    dissertation?</strong></p>
                            <div class="ms-3">
                                <label><input type="radio" name="q21" value="A" {{ ($answers[21] ?? '') == 'A' ? 'checked' : '' }} id="21"> It was difficult in unexpected ways.</label><br>
                                <label><input type="radio" name="q21" value="B" {{ ($answers[21] ?? '') == 'B' ? 'checked' : '' }}> It was more enjoyable than he'd anticipated.</label><br>
                                <label><input type="radio" name="q21" value="C" {{ ($answers[21] ?? '') == 'C' ? 'checked' : '' }}> It helped him understand previous course work.</label>
                            </div>
                        </div>

                        <div class="mb-4">
                            <p class="mt-3"><strong>22 What is Joanne most worried about?</strong></p>
                            <div class="ms-3">
                                <label><input type="radio" name="q22" value="A" {{ ($answers[22] ?? '') == 'A' ? 'checked' : '' }} id="22"> Finding enough material.</label><br>
                                <label><input type="radio" name="q22" value="B" {{ ($answers[22] ?? '') == 'B' ? 'checked' : '' }}> Missing deadlines.</label><br>
                                <label><input type="radio" name="q22" value="C" {{ ($answers[22] ?? '') == 'C' ? 'checked' : '' }}> Writing too much.</label>
                            </div>
                        </div>

                        <div class="mb-4">
                            <p class="mt-3"><strong>23 What does Howard say was his main worry a year
                                    previously?</strong></p>
                            <div class="ms-3">
                                <label><input type="radio" name="q23" value="A" {{ ($answers[23] ?? '') == 'A' ? 'checked' : '' }} id="23"> Forgetting what he'd read about.</label><br>
                                <label><input type="radio" name="q23" value="B" {{ ($answers[23] ?? '') == 'B' ? 'checked' : '' }}> Not understanding what he'd read.</label><br>
                                <label><input type="radio" name="q23" value="C" {{ ($answers[23] ?? '') == 'C' ? 'checked' : '' }}> Taking such a long time to read each book.</label>
                            </div>
                        </div>

                        <div class="mb-4">
                            <p class="mt-3"><strong>24 What motivated Howard to start writing his dissertation?</strong>
                            </p>
                            <div class="ms-3">
                                <label><input type="radio" name="q24" value="A" {{ ($answers[24] ?? '') == 'A' ? 'checked' : '' }} id="24"> Talking to his tutor about his problems.</label><br>
                                <label><input type="radio" name="q24" value="B" {{ ($answers[24] ?? '') == 'B' ? 'checked' : '' }}> Seeing an inspirational TV show.</label><br>
                                <label><input type="radio" name="q24" value="C" {{ ($answers[24] ?? '') == 'C' ? 'checked' : '' }}> Reading a controversial journal article.</label>
                            </div>
                        </div>



                        <h4 id="25">Questions 25–26</h4>
                        <p>Choose <strong>TWO</strong> correct answers.</p>
                        <p>What <strong>TWO</strong> things does Howard advise Joanne to do in the first month of
                            tutorials?</p>

                        <ul class="options" data-range="25-26" id="26">
                            <li><label for="q25-26_a"><input type="checkbox" id="q25-26_a" name="q25-26[]" value="A" {{ in_array('A', $selected25_26, true) ? 'checked' : '' }}> See her tutor every
                                    week.</label></li>
                            <li><label for="q25-26_b"><input type="checkbox" id="q25-26_b" name="q25-26[]" value="B" {{ in_array('B', $selected25_26, true) ? 'checked' : '' }}> Review all the module
                                    booklists.</label></li>
                            <li><label for="q25-26_c"><input type="checkbox" id="q25-26_c" name="q25-26[]" value="C" {{ in_array('C', $selected25_26, true) ? 'checked' : '' }}> Buy all the key
                                    books.</label></li>
                            <li><label for="q25-26_d"><input type="checkbox" id="q25-26_d" name="q25-26[]" value="D" {{ in_array('D', $selected25_26, true) ? 'checked' : '' }}> Write full references
                                    for everything she reads.</label></li>
                            <li><label for="q25-26_e"><input type="checkbox" id="q25-26_e" name="q25-26[]" value="E" {{ in_array('E', $selected25_26, true) ? 'checked' : '' }}> Write a draft of the
                                    first chapter.</label></li>
                        </ul>



                        <h4 id="27">Questions 27–28</h4>
                        <p>Choose <strong>TWO</strong> correct answers.</p>
                        <p>What <strong>TWO</strong> things does Howard say about library provision?</p>

                        <ul class="options" data-range="27-28" id="28">
                            <li><label for="q27-28_a"><input type="checkbox" id="q27-28_a" name="q27-28[]" value="A" {{ in_array('A', $selected27_28, true) ? 'checked' : '' }}> Staff are particularly
                                    helpful to undergraduates.</label></li>
                            <li><label for="q27-28_b"><input type="checkbox" id="q27-28_b" name="q27-28[]" value="B" {{ in_array('B', $selected27_28, true) ? 'checked' : '' }}> Inter-library loans are
                                    very reliable.</label></li>
                            <li><label for="q27-28_c"><input type="checkbox" id="q27-28_c" name="q27-28[]" value="C" {{ in_array('C', $selected27_28, true) ? 'checked' : '' }}> Students can borrow
                                    extra books when writing a dissertation.</label></li>
                            <li><label for="q27-28_d"><input type="checkbox" id="q27-28_d" name="q27-28[]" value="D" {{ in_array('D', $selected27_28, true) ? 'checked' : '' }}> Staff recommend
                                    relevant old dissertations.</label></li>
                            <li><label for="q27-28_e"><input type="checkbox" id="q27-28_e" name="q27-28[]" value="E" {{ in_array('E', $selected27_28, true) ? 'checked' : '' }}> It's difficult to
                                    access electronic resources.</label></li>
                        </ul>



                        <h4 id="29">Questions 29–30</h4>
                        <p>Choose <strong>TWO</strong> correct answers.</p>
                        <p>What <strong>TWO</strong> things does Joanne agree to discuss with her tutor?</p>

                        <ul class="options" data-range="29-30" id="30">
                            <li><label for="q29-30_a"><input type="checkbox" id="q29-30_a" name="q29-30[]" value="A" {{ in_array('A', $selected29_30, true) ? 'checked' : '' }}> The best ways to
                                    collaborate with other students.</label></li>
                            <li><label for="q29-30_b"><input type="checkbox" id="q29-30_b" name="q29-30[]" value="B" {{ in_array('B', $selected29_30, true) ? 'checked' : '' }}> Who to get help from
                                    during college vacations.</label></li>
                            <li><label for="q29-30_c"><input type="checkbox" id="q29-30_c" name="q29-30[]" value="C" {{ in_array('C', $selected29_30, true) ? 'checked' : '' }}> The best way to present
                                    the research.</label></li>
                            <li><label for="q29-30_d"><input type="checkbox" id="q29-30_d" name="q29-30[]" value="D" {{ in_array('D', $selected29_30, true) ? 'checked' : '' }}> Whether she can use web
                                    sources.</label></li>
                            <li><label for="q29-30_e"><input type="checkbox" id="q29-30_e" name="q29-30[]" value="E" {{ in_array('E', $selected29_30, true) ? 'checked' : '' }}> How to manage her study
                                    time.</label></li>
                        </ul>
                    </div>
                </div>

                <div class="tab-content" id="part4" style="margin-bottom: 80px;">
                    <div class="question_part">
                        <h4>Part 4</h4>
                        <p>Questions 31–40</p>
                    </div>

                    <div class="mt-4">
                        <h4>Questions 31–32</h4>
                        <p>Choose the correct answer.</p>

                        <div class="mb-4">
                            <p class="mt-3"><strong>31. The main problem is</strong></p>
                            <div class="ms-3">
                                <label><input type="radio" name="q31" value="A" {{ ($answers[31] ?? '') == 'A' ? 'checked' : '' }} id="31"> cats in towns</label><br>
                                <label><input type="radio" name="q31" value="B" {{ ($answers[31] ?? '') == 'B' ? 'checked' : '' }}> the poor condition of feral cats</label><br>
                                <label><input type="radio" name="q31" value="C" {{ ($answers[31] ?? '') == 'C' ? 'checked' : '' }}> public awareness</label>
                            </div>
                        </div>

                        <div class="mb-4">
                            <p class="mt-3"><strong>32 Emergency veterinary treatment is provided by</strong></p>
                            <div class="ms-3">
                                <label><input type="radio" name="q32" value="A" {{ ($answers[32] ?? '') == 'A' ? 'checked' : '' }} id="32"> the government</label><br>
                                <label><input type="radio" name="q32" value="B" {{ ($answers[32] ?? '') == 'B' ? 'checked' : '' }}> a small number of people</label><br>
                                <label><input type="radio" name="q32" value="C" {{ ($answers[32] ?? '') == 'C' ? 'checked' : '' }}> nobody</label>
                            </div>
                        </div>



                        <h4>Questions 33–39</h4>
                        <p>Complete the sentence below using <strong>NO MORE THAN THREE WORDS</strong> for each answer.
                        </p>
                        <p class="mt-3">Sterilization is usually performed only on <input type="text" name="q33"
                                class="inline-input" value="{{ $answers[33] ?? '' }}" id="33" placeholder="33"></p>
                        <p class="mt-3">Sterilization is carried out in <input type="text" name="q34"
                                class="inline-input" value="{{ $answers[34] ?? '' }}" id="34" placeholder="34"></p>
                        <p class="mt-3">Cats remain there for <input type="text" name="q35" class="inline-input"
                                value="{{ $answers[35] ?? '' }}" id="35" placeholder="35"></p>
                        <p class="mt-3">To show that animal has been sterilized, one <input type="text" name="q36"
                                class="inline-input" value="{{ $answers[36] ?? '' }}" id="36" placeholder="36"></p>

                        <p class="mt-4"><strong>Ways the publicizing the issue</strong></p>
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr>
                                    <th>Method</th>
                                    <th>Message</th>
                                    <th>When</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Poster campaign</td>
                                    <td>A kitten is not <br><input type="text" name="q37" class="inline-input"
                                            value="{{ $answers[37] ?? '' }}" id="37" placeholder="37"></td>
                                    <td>Now</td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="q38" class="inline-input"
                                            value="{{ $answers[38] ?? '' }}" id="38" placeholder="38"></td>
                                    <td>Families may get bored with the responsibility of owing a pet</td>
                                    <td>Perhaps before next Christmas</td>
                                </tr>
                                <tr>
                                    <td>Newspaper advertisements</td>
                                    <td>Abandoned animals cause problems for other people</td>
                                    <td><input type="text" name="q39" class="inline-input"
                                            value="{{ $answers[39] ?? '' }}" id="39" placeholder="39"></td>
                                </tr>
                            </tbody>
                        </table>



                        <h4>Questions 40</h4>
                        <p>Choose the correct answer.</p>

                        <div class="mb-4">
                            <p class="mt-3"><strong>40 A wider problem of feral cats is that they can</strong></p>
                            <div class="ms-3">
                                <label><input type="radio" name="q40" value="A" {{ ($answers[40] ?? '') == 'A' ? 'checked' : '' }} id="40"> injure children</label><br>
                                <label><input type="radio" name="q40" value="B" {{ ($answers[40] ?? '') == 'B' ? 'checked' : '' }}> damage human health</label><br>
                                <label><input type="radio" name="q40" value="C" {{ ($answers[40] ?? '') == 'C' ? 'checked' : '' }}> become infested with parasites</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="fixed-bottom d-flex justify-content-end mb-5 px-5" style="z-index: 999;">
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
        </div>
    </form>


    <!-- Start Modal -->
    <div class="modal fade" id="startModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true"
        data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="material-icons-outlined">headphones</span>
                    <h5 class="modal-title" id="modalTitle">Start Listening Test</h5>
                </div>
                <div class="modal-body">
                    <p class="instruction-text">Please enter your Student ID and click OK to begin the listening test.
                    </p>

                    <div class="student-id-card">
                        <label class="student-id-label">
                            <span class="material-icons-outlined" style="font-size: 20px;">person</span>
                            STUDENT ID
                        </label>
                        <input type="text" id="modal_student_id" class="student-id-input"
                            placeholder="Enter your Student ID" value="">
                        <div id="student_id_error" class="error-message">
                            <span class="material-icons-outlined" style="font-size: 16px;">warning</span>
                            Student ID must be at least 8 characters
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="startTestButton" type="button" class="btn btn-primary">START TEST</button>
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
                tabs.forEach(t => {
                    t.classList.remove('active');
                    const qLinks = t.querySelector('.question-links');
                    const qPlaceholder = t.querySelector('.question-placeholder');
                    if (qLinks) qLinks.style.display = 'none';
                    if (qPlaceholder) qPlaceholder.style.display = 'block';
                });

                tabContents.forEach(content => content.classList.remove('active'));

                tab.classList.add('active');
                const tabId = tab.getAttribute('data-tab');
                document.getElementById(tabId).classList.add('active');

                const qLinks = tab.querySelector('.question-links');
                const qPlaceholder = tab.querySelector('.question-placeholder');
                if (qLinks && qPlaceholder) {
                    qLinks.style.display = 'flex';
                    qPlaceholder.style.display = 'none';
                }
            });
        });

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
            link.addEventListener('click', function (e) {
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

        document.addEventListener('DOMContentLoaded', function () {
            const startModal = new bootstrap.Modal(document.getElementById('startModal'));
            const finishModal = new bootstrap.Modal(document.getElementById('finishModal'));
            const startButton = document.getElementById('startTestButton');
            const finishButton = document.getElementById('finishButton');
            const continueButton = document.getElementById('continueButton');

            startModal.show();

            // Timer functionality
            let timeRemaining = 0;
            let timerInterval;
            const specificAudio = new Audio('{{ asset("audio/111main.MP3") }}');
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

            // Start test: play audio and start timer when OK button is clicked
            startButton.addEventListener('click', function (e) {
                const studentIdInput = document.getElementById('modal_student_id');
                const errorMsg = document.getElementById('student_id_error');
                const studentIdValue = studentIdInput.value.trim();

                // Validation: at least 8 characters
                if (studentIdValue.length < 8) {
                    e.preventDefault();
                    e.stopPropagation();
                    studentIdInput.classList.add('is-invalid');
                    errorMsg.style.display = 'flex';
                    return false;
                }

                // If valid, hide error
                studentIdInput.classList.remove('is-invalid');
                errorMsg.style.display = 'none';

                // Update exam_student_id in the form (NOT student_id)
                const examStudentIdInput = document.getElementById('examStudentIdField');
                if (examStudentIdInput) {
                    examStudentIdInput.value = studentIdValue;
                }
                // বাকি listening পেজের মতোই sessionStorage এও রাখা হয় — resume আর
                // highlight/note এর key এখান থেকেই Student ID নেয়
                try { sessionStorage.setItem('examStudentId', studentIdValue); } catch (e) {}

                // Hide modal manually since we might have prevented default
                const modalInstance = bootstrap.Modal.getInstance(document.getElementById('startModal'));
                modalInstance.hide();

                // Fullscreen
                const elem = document.documentElement;
                if (elem.requestFullscreen) {
                    elem.requestFullscreen().catch(err => console.log(err));
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

            // Clear validation on input
            document.getElementById('modal_student_id').addEventListener('input', function () {
                this.classList.remove('is-invalid');
                document.getElementById('student_id_error').style.display = 'none';
            });

            // Trigger start test on Enter key press
            document.getElementById('modal_student_id').addEventListener('keypress', function (e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    document.getElementById('startTestButton').click();
                }
            });

            finishButton.addEventListener('click', function (e) {
                e.preventDefault();
                finishModal.show();
            });

            // Prevent double submission
            let isSubmitting = false;

            continueButton.addEventListener('click', function () {
                if (isSubmitting) {
                    return; // Prevent double submission
                }
                isSubmitting = true;

                // Fix student_id if it's not numeric
                const studentIdInput = document.querySelector('input[name="student_id"]');
                if (studentIdInput) {
                    const studentIdValue = studentIdInput.value;
                    if (!studentIdValue || isNaN(studentIdValue)) {
                        // If student_id is not numeric, use authenticated user ID or 1
                        studentIdInput.value = '{{ auth()->id() ?? 1 }}';
                    }
                }

                const form = document.getElementById('testForm');

                // Remove existing hidden order inputs
                form.querySelectorAll('.checkbox-order-input').forEach(input => input.remove());

                // Add hidden inputs to maintain checkbox order
                checkboxOrder.forEach((orderedValues, groupName) => {
                    if (orderedValues.length > 0 && (groupName === 'q25-26[]' || groupName === 'q27-28[]' || groupName === 'q29-30[]')) {
                        // Disable original checkboxes for this group
                        document.querySelectorAll(`input[name="${groupName}"]`).forEach(cb => {
                            cb.disabled = true;
                        });

                        // Add hidden inputs in correct order
                        orderedValues.forEach(value => {
                            const hiddenInput = document.createElement('input');
                            hiddenInput.type = 'hidden';
                            hiddenInput.name = groupName;
                            hiddenInput.value = value;
                            hiddenInput.className = 'checkbox-order-input';
                            form.appendChild(hiddenInput);
                        });
                    }
                });

                // Disable the button to prevent multiple clicks
                continueButton.disabled = true;
                continueButton.textContent = 'Submitting...';

                document.getElementById('testForm').submit();
            });
        });

        // Autosave with debounce (10 seconds delay)
        let autosaveDebounceTimer = null;
        const dirtyInputs = new Map();
        const testForm = document.getElementById('testForm');

        // Track checkbox selection order
        const checkboxOrder = new Map();

        // Initialize order from already checked checkboxes (from saved data)
        document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
            if (checkbox.checked) {
                const groupName = checkbox.name;
                if (!checkboxOrder.has(groupName)) {
                    checkboxOrder.set(groupName, []);
                }
                checkboxOrder.get(groupName).push(checkbox.value);
            }
        });

        // Add click listeners to all checkboxes to track order
        document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                const groupName = this.name;
                if (!groupName) return;

                if (!checkboxOrder.has(groupName)) {
                    checkboxOrder.set(groupName, []);
                }

                const order = checkboxOrder.get(groupName);
                const value = this.value;

                if (this.checked) {
                    // Add to order if not already present
                    if (!order.includes(value)) {
                        order.push(value);
                    }
                } else {
                    // Remove from order
                    const index = order.indexOf(value);
                    if (index > -1) {
                        order.splice(index, 1);
                    }
                }
            });
        });

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
                // Use tracked click order instead of DOM order
                const selectedValues = checkboxOrder.get(groupName) || [];
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

        // Attach change listeners to all inputs
        document.querySelectorAll('input[type="radio"], input[type="text"], input[type="checkbox"]').forEach(input => {
            input.addEventListener('change', function () {
                markDirty(this);
            });
            if (input.type === 'text') {
                input.addEventListener('input', function () {
                    markDirty(this);
                });
            }
        });

        // Final flush on form submit
        if (testForm) {
            testForm.addEventListener('submit', function () {
                if (autosaveDebounceTimer) {
                    clearTimeout(autosaveDebounceTimer);
                    autosaveDebounceTimer = null;
                }
                flushDirtyInputs();
            }, true);
        }

        document.querySelectorAll('.options').forEach(optionList => {
            const range = optionList.getAttribute('data-range');
            const [start, end] = range.split('-').map(Number);
            const maxSelections = end - start + 1;

            optionList.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
                checkbox.addEventListener('change', function () {
                    const checked = optionList.querySelectorAll('input[type="checkbox"]:checked');
                    if (checked.length > maxSelections) {
                        this.checked = false;
                    }
                });
            });
        });

        (function () {
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
                const handleActivation = function () {
                    let questionNum = input.id || input.name.replace('q', '').replace('[]', '');

                    if (input.name && input.name.includes('-')) {
                        const rangeParts = input.name.replace('q', '').replace('[]', '').split('-');
                        const startNum = parseInt(rangeParts[0]);
                        const endNum = parseInt(rangeParts[1]);

                        // Count checked boxes in this range group
                        const groupCheckboxes = document.querySelectorAll(`input[name="${input.name}"]`);
                        const checkedCount = Array.from(groupCheckboxes).filter(cb => cb.checked).length;

                        // Target question: if 2 are checked, show the second number. Otherwise show the first.
                        const targetQ = (checkedCount >= 2) ? endNum : startNum;

                        allLinks.forEach(link => {
                            const q = link.getAttribute('data-question');
                            if (q === String(targetQ)) {
                                link.classList.add('active');
                            } else {
                                link.classList.remove('active');
                            }
                        });

                        // Update currentIndex for nav buttons
                        const linkIndex = allLinks.findIndex(link => link.getAttribute('data-question') === String(targetQ));
                        if (linkIndex !== -1) currentIndex = linkIndex;

                        return;
                    }

                    const linkIndex = allLinks.findIndex(link => link.getAttribute('data-question') === questionNum);
                    if (linkIndex !== -1) {
                        currentIndex = linkIndex;
                        allLinks.forEach(link => link.classList.remove('active'));
                        allLinks[linkIndex].classList.add('active');
                    }
                };

                input.addEventListener('focus', handleActivation);
                if (input.type === 'checkbox' || input.type === 'radio') {
                    input.addEventListener('click', handleActivation);
                }
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
                noteToggle.addEventListener('click', () => {
                    sidebar.classList.toggle('open');
                    mainContent.classList.toggle('shifted');
                });
            }

            if (closeBtn && sidebar && mainContent) {
                closeBtn.addEventListener('click', () => {
                    sidebar.classList.remove('open');
                    mainContent.classList.remove('shifted');
                });
            }
        });
    </script>

    <!-- highlight and note script  -->
    <script>
        let selectionRange = null;
        let clickedMark = null;
        let activePopup = null;

        const contextMenu = document.getElementById('customContextMenu');
        const highlightOption = document.getElementById('highlightOption');
        const notesOption = document.getElementById('notesOption');
        const clearOption = document.getElementById('clearOption');
        const allClearOption = document.getElementById('allClear');
        const sidebar = document.getElementById('sidebar');
        const sidebarNotesList = document.getElementById('sidebar-notes-list');

        // Context menu on right-click
        document.addEventListener('contextmenu', function (e) {
            const selection = window.getSelection();
            clickedMark = null;

            let target = e.target;
            while (target && target.tagName !== 'MARK' && target.parentNode) {
                target = target.parentNode;
                if (target.tagName === 'MARK') break;
            }

            if (target && target.tagName === 'MARK') {
                clickedMark = target;
            }

            if (selection.toString().trim() !== '' || clickedMark) {
                e.preventDefault();
                selectionRange = clickedMark ? null : (selection.rangeCount > 0 ? selection.getRangeAt(0).cloneRange() : null);
                contextMenu.style.left = e.pageX + 'px';
                contextMenu.style.top = e.pageY + 'px';
                contextMenu.style.display = 'block';
            }
        });

        // Hide context menu on click elsewhere
        document.addEventListener('click', function (e) {
            if (contextMenu && !contextMenu.contains(e.target)) {
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

            const startCell = getTableCell(startContainer);
            const endCell = getTableCell(endContainer);

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

            const walker = document.createTreeWalker(
                range.commonAncestorContainer,
                NodeFilter.SHOW_TEXT,
                null,
                false
            );

            const textNodes = [];
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
                createdMarks.push(mark);
            });
            return createdMarks;
        }

        if (highlightOption) {
            highlightOption.addEventListener('click', function () {
                if (selectionRange) {
                    try {
                        highlightRange(selectionRange);
                        window.getSelection().removeAllRanges();
                    } catch (err) { console.log(err); }
                }
                contextMenu.style.display = 'none';
            });
        }

        if (notesOption) {
            notesOption.addEventListener('click', function () {
                if (clickedMark) {
                    showNotePopup(clickedMark);
                    contextMenu.style.display = 'none';
                    return;
                }
                if (selectionRange) {
                    try {
                        const selectedText = selectionRange.toString();
                        const createdMarks = highlightRange(selectionRange);
                        if (createdMarks.length > 0) {
                            const markId = Date.now().toString();
                            const firstMark = createdMarks[0];
                            createdMarks.forEach((mark) => {
                                mark.setAttribute('data-note', '');
                                mark.dataset.markId = markId;
                                mark.dataset.headerText = selectedText;
                                mark.addEventListener('click', (e) => {
                                    e.stopPropagation();
                                    showNotePopup(mark);
                                });
                            });

                            const noteDiv = document.createElement('div');
                            noteDiv.classList.add('sidebar-note-item');
                            noteDiv.dataset.markId = markId;
                            noteDiv.innerHTML = `
                                <div style="font-weight: 600; margin-bottom: 3px; cursor: pointer;">${selectedText}</div>
                                <div class="sidebar-note-content" style="color: #666; font-size: 13px; white-space: pre-wrap;"></div>
                            `;
                            const list = document.getElementById('sidebar-notes-list');
                            if (list) list.appendChild(noteDiv);
                            noteDiv.addEventListener('click', () => showNotePopup(firstMark));

                            showNotePopup(firstMark);
                        }
                        window.getSelection().removeAllRanges();
                    } catch (err) { console.log(err); }
                }
                contextMenu.style.display = 'none';
            });
        }

        if (clearOption) {
            clearOption.addEventListener('click', function () {
                if (clickedMark) {
                    const markId = clickedMark.dataset.markId;
                    if (markId) {
                        const item = document.querySelector(`.sidebar-note-item[data-mark-id="${markId}"]`);
                        if (item) item.remove();
                    }
                    const parent = clickedMark.parentNode;
                    while (clickedMark.firstChild) parent.insertBefore(clickedMark.firstChild, clickedMark);
                    parent.removeChild(clickedMark);
                    clickedMark = null;
                }
                contextMenu.style.display = 'none';
            });
        }

        if (allClearOption) {
            allClearOption.addEventListener('click', function () {
                document.querySelectorAll('mark').forEach(m => m.replaceWith(document.createTextNode(m.innerText)));
                if (activePopup) activePopup.remove();
                activePopup = null;
                const list = document.getElementById('sidebar-notes-list');
                if (list) list.innerHTML = '';

                // Close sidebar automatically
                const sidebar = document.getElementById('sidebar');
                const mainContent = document.getElementById('main-content');
                if (sidebar) sidebar.classList.remove('open');
                if (mainContent) mainContent.classList.remove('shifted');

                contextMenu.style.display = 'none';
            });
        }

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
                <textarea placeholder="Add your note here..." style="width:100%; border:1px solid #ccc; background-color:yellow; min-height: 60px; cursor: text; padding: 5px; resize: vertical; outline: none;">${mark.dataset.note || ''}</textarea>
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

            // Focus textarea and position cursor at end
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

            // Make popup draggable
            let isDragging = false, offsetX, offsetY;
            const dragHandle = notePopup.querySelector('.drag-handle');

            dragHandle.addEventListener('mousedown', (e) => {
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