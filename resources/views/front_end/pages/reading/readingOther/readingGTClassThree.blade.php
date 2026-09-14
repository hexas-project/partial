<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reading</title>
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
            height: auto;
            font-weight: bold;
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
            color: gray;
        }

        .tab.active .tab-title {
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
            padding: 5px;
        }


        .question-number.active {
            padding: 2px 4px;
            border: 3px solid green;

        }

        .question-link {
            text-decoration: none;
            color: gray;
            width: 30px;
            height: 30px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .question-link.active {
            border: 2px solid gray;
        }

        .tab .question-links {
            display: none;
            flex-wrap: wrap;
            gap: 8px;
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

        .scroll-box {
            height: 70vh;
            overflow-y: auto;
            overflow-x: hidden;
            /* white-space: pre-line; */
            word-wrap: break-word;
            font-size: 16px;
        }

        .question_site {
            height: 70vh;
            overflow-y: auto;
            overflow-x: hidden;

        }

        .highlight {
            background-color: yellow;
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
        .sidebar-note-item {
            padding: 10px;
            border-bottom: 1px solid #eee;
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
            width: 280px;
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
            border-radius: 4px;
            padding: 5px;
            z-index: 2100;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .custom-context-menu div {
            padding: 8px 12px;
            cursor: pointer;
            font-size: 14px;
            border-radius: 3px;
        }

        .custom-context-menu div:hover {
            background: #eee;
        }

        #startModal {
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
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
            padding: 20px 25px;
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
            content: "📖";
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
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        #startModal .form-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
            text-transform: uppercase;
            font-size: 12px;
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
            font-size: 14px;
            width: 100%;
        }

        #startModal #studentIdInput:focus {
            border-color: black;
            box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.1);
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
            border-radius: 25px;
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
            letter-spacing: 1px;
        }

        #startModal #startTestButton:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }

        #startModal #startTestButton:active {
            transform: translateY(0);
        }

        .ques {
            font-weight: bold;
        }

        ul.options {
            line-height: 5px;
        }

        .mark,
        mark {
            display: inline;
            padding: 0 !important;
            line-height: inherit;
            white-space: inherit;
            -webkit-box-decoration-break: clone;
            box-decoration-break: clone;
        }

        mark[data-tooltip] {
            position: relative;
            cursor: pointer;
        }

        .inline-input {
            border: none;
            border-bottom: 1px dotted #000;
            outline: none;
            background: #fff;
            padding: 4px 12px;
            width: 120px;
            transition: all 0.2s ease;
        }

        .inline-input:focus {
            border-color: #dee2e6;
            box-shadow: none !important;
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

        /* .question_site input[type="text"] {
            border: none;
            border-bottom: 1px dotted #000;
            outline: none;
            background: transparent;
        } */
        .question_site input[type="text"]:focus {
            border-color: black !important;
            outline: none;
        }

        .mcq-block {
            margin-top: 10px;
        }

        .mcq-item {
            margin: 12px 0;
        }

        .mcq-head {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border: 1px solid #d9d9d9;
            border-radius: 8px;
            background: #dbeafe;
            cursor: pointer;
        }

        .mcq-num {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .mcq-q {
            font-weight: 600;
        }

        .mcq-options {
            max-height: 0;
            overflow: hidden;
            opacity: 0;
            padding: 0 12px;
            transition: max-height 0.25s ease, opacity 0.25s ease, padding 0.25s ease;
        }

        .mcq-item.open .mcq-options {
            max-height: 500px;
            opacity: 1;
            padding: 10px 12px;
        }

        .mcq-options label {
            display: flex;
            gap: 10px;
            align-items: flex-start;
            margin: 8px 0;
            cursor: pointer;
        }

        .mcq-options label span {
            border: none;
        }

        .mcq-options input[type="radio"] {
            margin-top: 3px;
        }

        .tfng-block {
            margin-top: 10px;
        }

        .tfng-item {
            margin: 12px 0;
        }

        .tfng-head {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border: 1px solid #d9d9d9;
            border-radius: 8px;
            background: #dbeafe;
            cursor: pointer;
        }

        .tfng-num {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .tfng-q {
            font-weight: 600;
        }

        .tfng-options {
            max-height: 0;
            overflow: hidden;
            opacity: 0;
            padding: 0 12px;
            transition: max-height 0.25s ease, opacity 0.25s ease, padding 0.25s ease;
        }

        .tfng-item.open .tfng-options {
            max-height: 220px;
            opacity: 1;
            padding: 10px 12px;
        }

        .tfng-options label {
            display: flex;
            gap: 10px;
            align-items: flex-start;
            margin: 8px 0;
            cursor: pointer;
        }

        .tfng-options input[type="radio"] {
            margin-top: 3px;
        }

        .matching-grid {
            border-collapse: collapse;
            width: 100%;
            margin-top: 12px;
        }

        .matching-grid th,
        .matching-grid td {
            border: 1px solid #4a4a4a;
            padding: 10px;
            vertical-align: middle;
        }

        .matching-grid thead th {
            background: #cfe2ff;
            text-align: center;
            font-weight: bold;
        }

        .matching-grid tbody tr:nth-child(even) {
            background: #e7f1ff;
        }

        .matching-grid .choice-cell {
            text-align: center;
            width: 44px;
        }

        .matching-grid .tick-cell {
            cursor: pointer;
            user-select: none;
        }

        .matching-grid .tick {
            visibility: hidden;
            opacity: 0;
            font-size: 18px;
            color: #0b5ed7;
            transition: opacity 0.1s ease;
        }

        .matching-grid .tick-cell.selected .tick {
            visibility: visible;
            opacity: 1;
        }
        .dnd-heading {
            padding: 8px 14px;
            margin: 6px 0;
            background: #fff;
            border: 1px solid #ddd;
            color: #2b2b2b;
            cursor: grab;
            border-radius: 4px;
            font-size: 14px;
            user-select: text;
            width: fit-content;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .dnd-heading:hover {
            border-color: #2b2b2b;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .dnd-heading.dragging {
            opacity: 0.5;
        }

        .dnd-heading.used {
            display: none;
        }

        .dnd-drop-input {
            background: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 5px 15px;
            width: 280px;
            font-size: 14px;
            min-height: 40px;
            cursor: pointer;
            text-align: left;
            display: block;
            margin-bottom: 5px;
            color: #475569;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
        }

        .dnd-drop-input:focus {
            outline: none;
            border-color: black;
        }

        .matching-grid {
            border-collapse: collapse;
            width: 100%;
            margin-top: 12px;
        }

        .matching-grid th,
        .matching-grid td {
            border: 1px solid #4a4a4a;
            padding: 10px;
            vertical-align: middle;
        }

        .matching-grid thead th {
            background: #cfe2ff;
            text-align: center;
            font-weight: bold;
        }

        .matching-grid tbody tr:nth-child(even) {
            background: #e7f1ff;
        }

        .matching-grid .choice-cell {
            text-align: center;
            width: 44px;
        }

        .matching-grid .tick-cell {
            cursor: pointer;
            user-select: none;
        }

        .matching-grid .tick-cell.selected {
            background-color: #d1e7dd !important;
        }

        .matching-grid .tick {
            visibility: hidden;
            opacity: 0;
            font-size: 20px;
            color: green;
            font-weight: bold;
            transition: opacity 0.1s ease;
        }

        .matching-grid .tick-cell.selected .tick {
            visibility: visible;
            opacity: 1;
        }

        .dnd-ghost-follow {
            position: fixed;
            pointer-events: none;
            z-index: 9999;
            background: #fff;
            border: 1px solid #2b2b2b;
            padding: 10px 18px;
            border-radius: 12px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            font-size: 14px;
            opacity: 0.98;
            color: #2b2b2b;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <form action="{{ route('reading.submit') }}" method="POST" id="testForm"  spellcheck="false" autocomplete="off">
        @csrf

        {{-- hidden input  --}}
        <input type="hidden" name="test_name" value="{{ $testName ?? 'class15_reading' }}">
        <input type="hidden" name="student_id" value="{{ auth()->id() ?? session('student_batch_id') }}">
        <input type="hidden" name="exam_student_id" id="examStudentIdField" value="">
        <input type="hidden" name="assignment_id" value="{{ $assignmentId ?? '' }}">
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
                                    <span class="material-icons-outlined">schedule</span><strong id="timer">60 : 00 minutes remaining</strong></a>
                            </li>

                        </ul>
                        <!-- Aligning the Finish button and note icon to the right -->
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item me-3">
                                <button class="btn btn-outline-dark" id="finishButton">Finish test</button>
                            </li>
                            <li class="nav-item">
                                <span id="noteToggle" class="material-icons-outlined">note_alt</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- CUSTOM CONTEXT MENU -->
            <div id="customContextMenu" class="custom-context-menu" style="display: none;">
                <div id="highlightOption">🖍️ Highlight</div>
                <div id="notesOption">📝 Notes</div>
                <div id="clearOption">🗑️ Clear</div>
                <div id="allClear">📝 Clear all</div>
            </div>


            <!-- question part 1 -->
            <div class=" container-fluid px-5">
                <div class="tab-content active" id="part1" style="margin-bottom: 80px;">
                    <div class="question_part">
                        <h4>Part 1</h4>
                        <p><strong>Read the text below and answers to the questions 1-14 on your answer sheet.</strong></p>
                    </div>
                    <div class="mt-4">


                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-md-6">
                                <div class="scroll-box" style="text-align:left;">
                                    <p><strong>PROCEDURE FOR EVACUATION</strong><br>
                                    <strong>1.</strong> Warning of an emergency evacuation will be marked by a number of short bell rings. (In the event of a power failure, this may be a hand-held bell or siren.)<br>
                                    <strong>2.</strong> All class work will cease immediately.<br>
                                    <strong>3.</strong> Students will leave their bags, books and other possessions where they are.<br>
                                    <strong>4.</strong> Teachers will take the class rolls.<br>
                                    <strong>5.</strong> Classes will vacate the premises using the nearest staircase. If these stairs are inaccessible, use the nearest alternative staircase. Do not use the lifts. Do not run.<br>
                                    <strong>6.</strong> Each class, under the teacher’s supervision, will move in a brisk, orderly fashion to the paved quadrangle area adjacent to the car park.<br>
                                    <strong>7.</strong> All support staff will do the same.<br>
                                    <strong>8.</strong> The Marshalling Supervisor, Ms Randall, will be wearing a red cap and she will be waiting there with the master timetable and staff list in her possession.<br>
                                    <strong>9.</strong> Students assemble in the quad with their teacher at the time of evacuation. The teacher will do a head count and check the roll.<br>
                                    <strong>10.</strong> Each teacher sends a student to the Supervisor to report whether all students have been accounted for. After checking, students will sit down (in the event of rain or wet pavement they may remain standing).<br>
                                    <strong>11.</strong> The Supervisor will inform the Office when all staff and students have been accounted for.<br>
                                    <strong>12.</strong> All students, teaching staff and support personnel remain in the evacuation area until the All Clear signal is given.<br>
                                    <strong>13.</strong> The All Clear will be a long bell ring or three blasts on the siren.<br>
                                    <strong>14.</strong> Students will return to class in an orderly manner under teacher guidance.<br>
                                    <strong>15.</strong> In the event of an emergency occurring during lunch or breaks, students are to assemble in their home-room groups in the quad and await their home-room teacher.</p>

                                    <br><br>
                                    <hr>
                                    <br>

                                    <p><strong>Read the text below and answer Questions 9-14.</strong></p>
                                    <p><strong>Community Education<br>SHORT COURSES: BUSINESS</strong></p>

                                    <p><strong>Business Basics</strong><br>
                                    Gain foundation knowledge for employment in an accounts position with bookkeeping and business basics through to intermediate level; suitable for anyone requiring knowledge from the ground up.<br>
                                    Code B/ED011<br>
                                    16th or 24th April 9am–4pm<br>
                                    Cost <strong>$420</strong></p>

                                    <p><strong>Bookkeeping</strong><br>
                                    This course will provide students with a comprehensive understanding of bookkeeping and a great deal of hands-on experience.<br>
                                    Code B/ED020<br>
                                    19th April 9am–2.30pm (one session only so advance bookings essential)<br>
                                    Cost <strong>$250</strong></p>

                                    <p><strong>New Enterprise Module</strong><br>
                                    Understand company structures, tax rates, deductions, employer obligations, profit and loss statements, GST and budgeting for tax.<br>
                                    Code B/ED030<br>
                                    15th or 27th May 6pm–9pm<br>
                                    Cost <strong>$105</strong></p>

                                    <p><strong>Social Networking – the Latest Marketing Tool</strong><br>
                                    This broad overview gives you the opportunity to analyse what web technologies are available and how they can benefit your organisation.<br>
                                    Code B/ED033<br>
                                    1st or 8th or 15th June 6pm–9pm<br>
                                    Cost <strong>$95</strong></p>

                                    <p><strong>Communication</strong><br>
                                    Take the fear out of talking to large gatherings of people. Gain the public-speaking experience that will empower you with better communication skills and confidence.<br>
                                    Code B/ED401<br>
                                    12th or 13th or 14th July 6pm–9pm<br>
                                    Cost <strong>$90</strong></p>

                                </div>
                            </div>
                            <!-- Column 2 -->
                            <div class="col-md-6 question_site">
                                <h3><strong>Questions 1-8</strong></h3>
                                <p>Complete the sentences below.</p>
                                <p>Choose <strong>NO MORE THAN THREE WORDS</strong> from the text for each answer.</p>
                                

                                <div class="mt-3">
                                    <div class="mb-3">
                                        <strong id="question-1-number"></strong> In an emergency, a teacher will either phone the office or <input type="text" name="q1" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="q1" placeholder="1" value="{{ $answers[1] ?? '' }}"> .
                                    </div>
                                    <div class="mb-3">
                                        <strong id="question-2-number"></strong> The signal for evacuation will normally be several <input type="text" name="q2" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="q2" placeholder="2" value="{{ $answers[2] ?? '' }}"> .
                                    </div>
                                    <div class="mb-3">
                                        <strong id="question-3-number"></strong> If possible, students should leave the building by the <input type="text" name="q3" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="q3" placeholder="3" value="{{ $answers[3] ?? '' }}"> .
                                    </div>
                                    <div class="mb-3">
                                        <strong id="question-4-number"></strong> They then walk quickly to the <input type="text" name="q4" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="q4" placeholder="4" value="{{ $answers[4] ?? '' }}"> .
                                    </div>
                                    <div class="mb-3">
                                        <strong id="question-5-number"></strong> <input type="text" name="q5" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="q5" placeholder="5" value="{{ $answers[5] ?? '' }}"> will join the teachers and students in the quad.
                                    </div>
                                    <div class="mb-3">
                                        <strong id="question-6-number"></strong> Each class teacher will count up his or her students and mark <input type="text" name="q6" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="q6" placeholder="6" value="{{ $answers[6] ?? '' }}"> .
                                    </div>
                                    <div class="mb-3">
                                        <strong id="question-7-number"></strong> After the <input type="text" name="q7" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="q7" placeholder="7" value="{{ $answers[7] ?? '' }}"> , everyone may return to class.
                                    </div>
                                    <div class="mb-3">
                                        <strong id="question-8-number"></strong> If there is an emergency at lunchtime, students gather in the quad in <input type="text" name="q8" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="q8" placeholder="8" value="{{ $answers[8] ?? '' }}"> and wait for their teacher.
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Questions 9-14</strong></h3>
                                    <p>Choose <strong>TRUE</strong> if the statement agrees with the information given in the text, choose <strong>FALSE</strong> if the statement contradicts the information, or choose <strong>NOT GIVEN</strong> if there is no information on this.</p>

                                    <div class="tfng-block" id="q9_14_tfng">
                                        <div class="tfng-item open">
                                            <div class="tfng-head">
                                                <div class="tfng-num">9</div>
                                                <div class="tfng-q">Business Basics is appropriate for beginners.</div>
                                            </div>
                                            <div class="tfng-options">
                                                <label><input type="radio" name="q9" value="TRUE" {{ ($answers[9] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                                <label><input type="radio" name="q9" value="FALSE" {{ ($answers[9] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                                <label><input type="radio" name="q9" value="NOT GIVEN" {{ ($answers[9] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT GIVEN</span></label>
                                            </div>
                                        </div>

                                        <div class="tfng-item">
                                            <div class="tfng-head">
                                                <div class="tfng-num">10</div>
                                                <div class="tfng-q">Bookkeeping has no practical component.</div>
                                            </div>
                                            <div class="tfng-options">
                                                <label><input type="radio" name="q10" value="TRUE" {{ ($answers[10] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                                <label><input type="radio" name="q10" value="FALSE" {{ ($answers[10] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                                <label><input type="radio" name="q10" value="NOT GIVEN" {{ ($answers[10] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT GIVEN</span></label>
                                            </div>
                                        </div>

                                        <div class="tfng-item">
                                            <div class="tfng-head">
                                                <div class="tfng-num">11</div>
                                                <div class="tfng-q">Bookkeeping is intended for advanced students only.</div>
                                            </div>
                                            <div class="tfng-options">
                                                <label><input type="radio" name="q11" value="TRUE" {{ ($answers[11] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                                <label><input type="radio" name="q11" value="FALSE" {{ ($answers[11] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                                <label><input type="radio" name="q11" value="NOT GIVEN" {{ ($answers[11] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT GIVEN</span></label>
                                            </div>
                                        </div>

                                        <div class="tfng-item">
                                            <div class="tfng-head">
                                                <div class="tfng-num">12</div>
                                                <div class="tfng-q">The New Enterprise Module can help your business become more profitable.</div>
                                            </div>
                                            <div class="tfng-options">
                                                <label><input type="radio" name="q12" value="TRUE" {{ ($answers[12] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                                <label><input type="radio" name="q12" value="FALSE" {{ ($answers[12] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                                <label><input type="radio" name="q12" value="NOT GIVEN" {{ ($answers[12] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT GIVEN</span></label>
                                            </div>
                                        </div>

                                        <div class="tfng-item">
                                            <div class="tfng-head">
                                                <div class="tfng-num">13</div>
                                                <div class="tfng-q">Social Networking focuses on a specific website to help your business succeed.</div>
                                            </div>
                                            <div class="tfng-options">
                                                <label><input type="radio" name="q13" value="TRUE" {{ ($answers[13] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                                <label><input type="radio" name="q13" value="FALSE" {{ ($answers[13] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                                <label><input type="radio" name="q13" value="NOT GIVEN" {{ ($answers[13] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT GIVEN</span></label>
                                            </div>
                                        </div>

                                        <div class="tfng-item">
                                            <div class="tfng-head">
                                                <div class="tfng-num">14</div>
                                                <div class="tfng-q">The Communication class involves speaking in front of an audience.</div>
                                            </div>
                                            <div class="tfng-options">
                                                <label><input type="radio" name="q14" value="TRUE" {{ ($answers[14] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                                <label><input type="radio" name="q14" value="FALSE" {{ ($answers[14] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                                <label><input type="radio" name="q14" value="NOT GIVEN" {{ ($answers[14] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT GIVEN</span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- question part 2 -->
                <div class="tab-content " id="part2" style="margin-bottom: 80px;">
                    <div class="question_part">
                        <h4>Part 2</h4>
                        <p>Read the text below and answer questions 15-28
                        </p>
                    </div>
                    <div class="mt-4">

                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-md-6">
                                <div class="scroll-box" style="text-align:left;">
                                    <h4><strong>BENEFICIAL WORK PRACTICES FOR THE KEYBOARD OPERATOR</strong></h4>
                                    
                                    <input type="text" class="dnd-drop-input" data-question="q15" data-paragraph="A" placeholder="15" readonly="" style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;" autocomplete="off" data-original-placeholder="15" value="{{ $answers[15] ?? '' }}">
                                    <p>Sensible work practices are an important factor in the prevention of muscular fatigue; discomfort or pain in the arms, neck, hands or back; or eye strain which can be associated with constant or regular work at a keyboard and visual display unit (VDU).</p>

                                    <input type="text" class="dnd-drop-input" data-question="q16" data-paragraph="B" placeholder="16" readonly="" style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;" autocomplete="off" data-original-placeholder="16" value="{{ $answers[16] ?? '' }}">
                                    <p>It is vital that the employer pays attention to the physical setting such as workplace design, the office environment, and placement of monitors as well as the organisation of the work and individual work habits. Operators must be able to recognise work-related health problems and be given the opportunity to participate in the management of these. Operators should take note of and follow the preventive measures outlined below.</p>

                                    <input type="text" class="dnd-drop-input" data-question="q17" data-paragraph="C" placeholder="17" readonly="" style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;" autocomplete="off" data-original-placeholder="17" value="{{ $answers[17] ?? '' }}">
                                    <p>The typist must be comfortably accommodated in a chair that is adjustable for height with a backrest that is also easily adjustable both for angle and height. The backrest and sitting ledge (with a curved edge) should preferably be cloth-covered to avoid excessive perspiration.</p>

                                    <input type="text" class="dnd-drop-input" data-question="q18" data-paragraph="D" placeholder="18" readonly="" style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;" autocomplete="off" data-original-placeholder="18" value="{{ $answers[18] ?? '' }}">
                                    <p>When the keyboard operator is working from a paper file or manuscript, it should be at the same distance from the eyes as the screen. The most convenient position can be found by using some sort of holder. Individual arrangements will vary according to whether the operator spends more time looking at the VDU or the paper – whichever the eyes are focused on for the majority of time should be put directly in front of the operator.</p>

                                    <input type="text" class="dnd-drop-input" data-question="q19" data-paragraph="E" placeholder="19" readonly="" style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;" autocomplete="off" data-original-placeholder="19" value="{{ $answers[19] ?? '' }}">
                                    <p>While keying, it is advisable to have frequent but short pauses of around thirty to sixty seconds to proofread. When doing this, relax your hands. After you have been keying for sixty minutes, you should have a ten-minute change of activity. During this spell, it is important that you do not remain seated but stand up or walk around. This period could be profitably used to do filing or collect and deliver documents.</p>

                                    <input type="text" class="dnd-drop-input" data-question="q20" data-paragraph="F" placeholder="20" readonly="" style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;" autocomplete="off" data-original-placeholder="20" value="{{ $answers[20] ?? '' }}">
                                    <p>Generally, the best position for a VDU is at right angles to the window. If this is not possible then glare from the window can be controlled by blinds, curtains or movable screens. Keep the face of the VDU vertical to avoid glare from overhead lighting.</p>
                                    
                                    <input type="text" class="dnd-drop-input" data-question="q21" data-paragraph="G" placeholder="21" readonly="" style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;" autocomplete="off" data-original-placeholder="21" value="{{ $answers[21] ?? '' }}">
                                    <p> Unsatisfactory work practices or working conditions may result in aches or pain. Symptoms should be reported to your supervisor early on so that the cause of the trouble can be corrected and the operator should seek medical attention.</p>

                                    <br><br><hr><br>

                                    <p>Look at the information about <strong>"Workplace dismissals"</strong>. Then answer the <strong>questions 22-28</strong> below.</p>
                                    <h4><strong>Workplace Dismissals</strong></h4>

                                    <h5><strong>Before the dismissal</strong></h5>
                                    <p>If an employer wants to dismiss an employee, there is a process to be followed. Instances of minor misconduct and poor performance must first be addressed through some preliminary steps.</p>

                                    <p>Firstly, you should be given an improvement note. This will explain the problem, outline any necessary changes and offer some assistance in correcting the situation. Then, if your employer does not think your performance has improved, you may be given a written warning. The last step is called a final written warning which will inform you that you will be dismissed unless there are improvements in performance. If there is no improvement, your employer can begin the dismissal procedure.</p>

                                    <p>The dismissal procedure begins with a letter from the employer setting out the charges made against the employee. The employee will be invited to a meeting to discuss these accusations. If the employee denies the charges, he is given the opportunity to appear at a formal appeal hearing in front of a different manager. After this, a decision is made as to whether the employee will be let go or not.</p>

                                    <h5><strong>Dismissals</strong></h5>
                                    <p>Of the various types of dismissal, a fair dismissal is the best kind if an employer wants an employee out of the workplace. A fair dismissal is legally and contractually strong and it means all the necessary procedures have been correctly followed. In cases where an employee's misconduct has been very serious, however, an employer may not have to follow all of these procedures. If the employer can prove that the employee's behaviour was illegal, dangerous or severely wrong, the employee can be dismissed immediately: a procedure known as summary dismissal.</p>

                                    <p>Sometimes a dismissal is not considered to have taken place fairly. One of these types is wrongful dismissal and involves a breach of contract by the employer. This could involve dismissing an employee without notice or without following proper disciplinary and dismissal procedures. Another type, unfair dismissal, is when an employee is sacked without good cause.</p>

                                    <p>There is another kind of dismissal, known as constructive dismissal, which is slightly peculiar because the employee is not actually openly dismissed by the employer. In this case, the employee is forced into resigning by an employer who tries to make significant changes to the original contract. This could mean an employee might have to work night shifts after originally signing on for day work, or he could be made to work in dangerous conditions.</p>

                                </div>
                            </div>
                            <!-- Column 2 -->
                            <div class="col-md-6 question_site">
                                <h3><strong>Questions 15-21</strong></h3>
                                <p>The text on the next page has seven sections.</p>
                                <p>Choose the correct heading for each section and move it into the gap.</p>

                                <div class="mb-4">
                                    <h5><strong>List of Headings</strong></h5>
                                    <div class="dnd-heading" data-value="i" data-content="How can reflection problems be avoided?">How can reflection problems be avoided?</div>
                                    <div class="dnd-heading" data-value="ii" data-content="How long should I work without a break?">How long should I work without a break?</div>
                                    <div class="dnd-heading" data-value="iii" data-content="What if I experience any problems?">What if I experience any problems?</div>
                                    <div class="dnd-heading" data-value="iv" data-content="When is the best time to do filing chores?">When is the best time to do filing chores?</div>
                                    <div class="dnd-heading" data-value="v" data-content="What makes a good seat?">What makes a good seat?</div>
                                    <div class="dnd-heading" data-value="vi" data-content="What are the common health problems?">What are the common health problems?</div>
                                    <div class="dnd-heading" data-value="vii" data-content="What is the best kind of lighting to have?">What is the best kind of lighting to have?</div>
                                    <div class="dnd-heading" data-value="viii" data-content="What are the roles of management and workers?">What are the roles of management and workers?</div>
                                    <div class="dnd-heading" data-value="ix" data-content="Why does a VDU create eye fatigue?">Why does a VDU create eye fatigue?</div>
                                    <div class="dnd-heading" data-value="x" data-content="Where should I place the documents?">Where should I place the documents?</div>
                                </div>

                                <div class="mb-4">
                                    <div style="display:none;">
                                        <input type="hidden" name="q15" id="15" value="{{ $answers[15] ?? '' }}">
                                        <input type="hidden" name="q16" id="16" value="{{ $answers[16] ?? '' }}">
                                        <input type="hidden" name="q17" id="17" value="{{ $answers[17] ?? '' }}">
                                        <input type="hidden" name="q18" id="18" value="{{ $answers[18] ?? '' }}">
                                        <input type="hidden" name="q19" id="19" value="{{ $answers[19] ?? '' }}">
                                        <input type="hidden" name="q20" id="20" value="{{ $answers[20] ?? '' }}">
                                        <input type="hidden" name="q21" id="21" value="{{ $answers[21] ?? '' }}">
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Questions 22 and 23</strong></h3>
                                    <p>Complete the sentences below.</p>
                                    <p>Choose <strong>NO MORE THAN THREE WORDS</strong> from the text for each answer.</p>
                                   

                                    <div class="mt-4">
                                        <div class="mb-3" style="line-height: 2;">
                                            <strong id="question-22-number"></strong> If an employee receives a <input type="text" name="q22" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="q22" placeholder="22" value="{{ $answers[22] ?? '' }}"> , this means he will lose his job if his work does not get better.
                                        </div>
                                        <div class="mb-3" style="line-height: 2;">
                                            <strong id="question-23-number"></strong> If an employee does not accept the reasons for his dismissal, a <input type="text" name="q23" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="q23" placeholder="23" value="{{ $answers[23] ?? '' }}"> can be arranged.
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Questions 24–28</strong></h3>
                                    <p>Look at the following descriptions and the list of terms in the box below.</p>
                                    <p>Choose the correct term <strong>A-E</strong> for each description.</p>
                                   

                                    <div class="mt-4 p-3 border mb-4" style="background-color: #fcfcfc;">
                                        <ul class="list-unstyled mb-0" style="line-height: 1.8;">
                                            <li><strong>A.</strong> Fair dismissal</li>
                                            <li><strong>B.</strong> Summary dismissal</li>
                                            <li><strong>C.</strong> Unfair dismissal</li>
                                            <li><strong>D.</strong> Wrongful dismissal</li>
                                            <li><strong>E.</strong> Constructive dismissal</li>
                                        </ul>
                                    </div>

                                    <div class="mt-4 matching-grid">
                                        <table class="table table-bordered text-center">
                                            <thead>
                                                <tr>
                                                    <th>Questions</th>
                                                    <th class="choice-cell">A</th>
                                                    <th class="choice-cell">B</th>
                                                    <th class="choice-cell">C</th>
                                                    <th class="choice-cell">D</th>
                                                    <th class="choice-cell">E</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach([
                                                    24 => 'An employee is asked to leave work straight away because he has done something really bad.',
                                                    25 => 'An employee is pressured to leave his job unless he accepts conditions that are very different from those agreed to in the beginning.',
                                                    26 => 'An employer gets rid of an employee without keeping to conditions in the contract.',
                                                    27 => 'The reason for an employee\'s dismissal is not considered good enough.',
                                                    28 => 'The reasons for an employee\'s dismissal are acceptable by law and the terms of the employment contract.'
                                                ] as $qNum => $qContent)
                                                <tr>
                                                    <td class="text-start"><strong>{{ $qNum }}</strong>. {{ $qContent }}</td>
                                                    @foreach(['A','B','C','D','E'] as $val)
                                                    <td class="choice-cell tick-cell" data-row="{{ $qNum }}" data-value="{{ $val }}">
                                                        <span class="tick">✓</span>
                                                    </td>
                                                    @endforeach
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    @foreach(range(24, 28) as $qNum)
                                    <input type="hidden" name="q{{ $qNum }}" id="{{ $qNum }}" value="{{ $answers[$qNum] ?? '' }}">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <!-- question part 3 -->
            <div class=" container-fluid px-5">
                <div class="tab-content " id="part3" style="margin-bottom: 80px;">
                    <div class="question_part">
                        <h4>Part 3</h4>
                        <p>Read the text below and answer questions 29-40
                        </p>
                    </div>
                    <div class="mt-4">

                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-md-6">
                                <div class="scroll-box" style="text-align:left;">
                                    <h4><strong>Employment in Japan</strong></h4>

                                    <input type="text" class="dnd-drop-input" data-question="q29" data-paragraph="A" placeholder="29" readonly="" style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;" autocomplete="off" data-original-placeholder="29" value="{{ $answers[29] ?? '' }}">
                                    <p> Every autumn, when recruitment of new graduates and school leavers begins, major cities in Japan are flooded with students hunting for a job. Wearing suits for the first time, they run from one interview to another. The season is crucial for many students, as their whole lives may be determined during this period.</p>

                                    <input type="text" class="dnd-drop-input" data-question="q30" data-paragraph="B" placeholder="30" readonly="" style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;" autocomplete="off" data-original-placeholder="30" value="{{ $answers[30] ?? '' }}">
                                    <p> In Japan, lifetime employment is commonly practised by large companies. While people working in small companies and those working for sub-contractors do not, in general, enjoy the advantages conferred by the large companies, there is a general expectation that employees will, in fact, remain more or less permanently in the same job.</p>

                                    <input type="text" class="dnd-drop-input" data-question="q31" data-paragraph="C" placeholder="31" readonly="" style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;" autocomplete="off" data-original-placeholder="31" value="{{ $answers[31] ?? '' }}">
                                    <p> Unlike in many Western countries where companies employ people whose skills can be effective immediately, Japanese companies select applicants with potential who can be trained to become suitable employees. For this reason, recruiting employees is an important exercise for companies, as they invest a lot of time and money in training new staff. This is basically true both for factory workers and for professionals. Professionals who have studied subjects which are of immediate use in the workplace, such as industrial engineers, are very often placed in factories and transferred from one section to another. By gaining experience in several different areas and by working in close contact with workers, the engineers are believed, in the long run, to become more effective members of the company. Workers too feel more involved by working with professionals and by being allowed to voice their opinions. Loyalty is believed to be cultivated in this type of egalitarian working environment.</p>

                                    <input type="text" class="dnd-drop-input" data-question="q32" data-paragraph="D" placeholder="32" readonly="" style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;" autocomplete="off" data-original-placeholder="32" value="{{ $answers[32] ?? '' }}">
                                    <p> Because of this system of training employees to be all-rounders, mobility between companies is low. Wages are set according to educational background or initial field of employment, ordinary graduates being employed in administration, engineers in engineering and design departments and so on. Both promotions and wage increases tend to be tied to seniority, though some differences may arise later on as a result of ability and business performance. Wages are paid monthly, and the net sum, after the deduction of tax, is usually paid directly into a bank account. As well as salary, a bonus is usually paid twice a year. This is a custom that dates back to the time when employers gave special allowances so that employees could properly celebrate bon, a Buddhist festival held in mid-July in Tokyo, but on other dates in other regions. The festival is held to appease the souls of ancestors. The second bonus is distributed at New Year. Recently, bonuses have also been offered as a way of allowing workers a share in the profits that their hard work has gained.</p>

                                    <input type="text" class="dnd-drop-input" data-question="q33" data-paragraph="E" placeholder="33" readonly="" style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;" autocomplete="off" data-original-placeholder="33" value="{{ $answers[33] ?? '' }}">
                                    <p> Many female graduates complain that they are not given equal training and equal opportunity in comparison to male graduates. Japanese companies generally believe that female employees will eventually leave to get married and have children. It is also true that, as well as the still-existing belief among women themselves that nothing should stand in the way of child-rearing, the extended hours of work often do not allow women to continue their careers after marriage.</p>

                                    <input type="text" class="dnd-drop-input" data-question="q34" data-paragraph="F" placeholder="34" readonly="" style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;" autocomplete="off" data-original-placeholder="34" value="{{ $answers[34] ?? '' }}">
                                    <p> Disappointed career-minded female graduates often opt to work for foreign firms. Since most male graduates prefer to join Japanese firms with their guaranteed security, foreign firms are often keen to employ female graduates as their potential tends to be greater than that of male applicants.</p>

                                    <input type="text" class="dnd-drop-input" data-question="q35" data-paragraph="G" placeholder="35" readonly="" style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;" autocomplete="off" data-original-placeholder="35" value="{{ $answers[35] ?? '' }}">
                                    <p> Some men, however, do leave their companies in spite of future prospects, one reason being to take over the family business. The eldest sons in families that own family companies or businesses such as stores are normally expected to take over the business when their parents retire. It is therefore quite common to see a businessman, on succeeding to his parents' business, completely change his professional direction by becoming, for example, a shopkeeper.</p>

                                    <input type="text" class="dnd-drop-input" data-question="q36" data-paragraph="H" placeholder="36" readonly="" style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;" autocomplete="off" data-original-placeholder="36" value="{{ $answers[36] ?? '' }}">
                                    <p> On the job, working relationships tend to be very close because of the long hours of work and years of service in common. Social life, in fact, is frequently based on the workplace. Restaurants and nomi-ya, "pubs", are always crowded at night with people enjoying an evening out with their colleagues. Many companies organise trips and sports days for their employees. Senior staff often play the role of mentor. This may mean becoming involved in the lives of junior staff in such things as marriage and the children's education.</p>

                                    <input type="text" class="dnd-drop-input" data-question="q37" data-paragraph="I" placeholder="37" readonly="" style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;" autocomplete="off" data-original-placeholder="37" value="{{ $answers[37] ?? '' }}">
                                    <p> The average age of retirement is between 55 and 60. For most Westerners, retirement may be an eagerly awaited time to undertake such things as travel and hobbies. Many Japanese, however, simply cannot get used to the freedom of retirement and they look for ways of constructively using their time. Many look for new jobs, feeling that if they do not work they will be abandoned by society. This has recently led to the development in some municipalities of municipal job centres which advertise casual work such as cleaning and lawn mowing. Given that Japan is facing the problem of an increasingly ageing society, such activities may be vital in the future.</p>

                                </div>
                            </div>
                            <!-- Column 2 -->
                            <div class="col-md-6 question_site">
                                <h3><strong>Questions 29-37</strong></h3>
                                <p>The Reading Passage has nine section.</p>
                                <p>Choose the correct heading for each section and move it into the gap.</p>

                                <div class="mb-4">
                                    <h5><strong>List of Phrases</strong></h5>
                                    <div class="dnd-heading" data-value="i" data-content="how new employees are used in a company">how new employees are used in a company</div>
                                    <div class="dnd-heading" data-value="ii" data-content="women and Japanese companies">women and Japanese companies</div>
                                    <div class="dnd-heading" data-value="iii" data-content="why men sometimes resign from Japanese companies">why men sometimes resign from Japanese companies</div>
                                    <div class="dnd-heading" data-value="iv" data-content="permanency in employment in Japan">permanency in employment in Japan</div>
                                    <div class="dnd-heading" data-value="v" data-content="recruiting season: who, when and where">recruiting season: who, when and where</div>
                                    <div class="dnd-heading" data-value="vi" data-content="the social aspect of work">the social aspect of work</div>
                                    <div class="dnd-heading" data-value="vii" data-content="the salary structure">the salary structure</div>
                                    <div class="dnd-heading" data-value="viii" data-content="the recruitment strategy of foreign firms">the recruitment strategy of foreign firms</div>
                                    <div class="dnd-heading" data-value="ix" data-content="Japanese people after retirement">Japanese people after retirement</div>
                                </div>

                                <div class="mt-4">
                                    <div style="display:none;">
                                        <input type="hidden" name="q29" id="29" value="{{ $answers[29] ?? '' }}">
                                        <input type="hidden" name="q30" id="30" value="{{ $answers[30] ?? '' }}">
                                        <input type="hidden" name="q31" id="31" value="{{ $answers[31] ?? '' }}">
                                        <input type="hidden" name="q32" id="32" value="{{ $answers[32] ?? '' }}">
                                        <input type="hidden" name="q33" id="33" value="{{ $answers[33] ?? '' }}">
                                        <input type="hidden" name="q34" id="34" value="{{ $answers[34] ?? '' }}">
                                        <input type="hidden" name="q35" id="35" value="{{ $answers[35] ?? '' }}">
                                        <input type="hidden" name="q36" id="36" value="{{ $answers[36] ?? '' }}">
                                        <input type="hidden" name="q37" id="37" value="{{ $answers[37] ?? '' }}">
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Questions 38-40</strong></h3>
                                    <p>Complete the sentences below with words taken from the reading passage.</p>
                                    <p>Use <strong>NO MORE THAN THREE WORDS</strong> for each answer.</p>

                                    <div class="mt-4">
                                        <div class="mb-3" style="line-height: 2;">
                                            <strong id="question-38-number"></strong> Japanese employers believe that moving professionals within companies and listening to workers' views leads to <input type="text" name="q38" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="q38" placeholder="38" value="{{ $answers[38] ?? '' }}">
                                        </div>
                                        <div class="mb-3" style="line-height: 2;">
                                            <strong id="question-39-number"></strong> Employees receive their wages monthly and a bonus <input type="text" name="q39" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="q39" placeholder="39" value="{{ $answers[39] ?? '' }}">
                                        </div>
                                        <div class="mb-3" style="line-height: 2;">
                                            <strong id="question-40-number"></strong> Japanese workers often form close personal relationships and older staff may even become a <input type="text" name="q40" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="q40" placeholder="40" value="{{ $answers[40] ?? '' }}"> to junior staff.
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

    </form>
    <!--Start Modal-->
    <div class="modal fade" id="startModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Start Reading Test</h5>
                </div>
                <div class="modal-body">
                    <p class="instruction-text">Please enter your Student ID and click OK to begin the reading test.</p>
                    <div class="form-group">
                        <label for="studentIdInput" class="form-label">Student ID</label>
                        <input type="text" class="form-control" id="studentIdInput" placeholder="Enter your Student ID" required>
                        <small id="studentIdError">⚠️ Student ID must be at least 8 characters</small>
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
                <a href="#" class="question-link" data-question="11">11</a>
                <a href="#" class="question-link" data-question="12">12</a>
                <a href="#" class="question-link" data-question="13">13</a>
                <a href="#" class="question-link" data-question="14">14</a>
            </div>
            <span class="question-placeholder">1 of 14</span>
        </div>
        <div class="tab " data-tab="part2">
            <span class="tab-title">Part 2</span>
            <div class="question-links">
                <a href="#" class="question-link" data-question="15">15</a>
                <a href="#" class="question-link" data-question="16">16</a>
                <a href="#" class="question-link" data-question="17">17</a>
                <a href="#" class="question-link" data-question="18">18</a>
                <a href="#" class="question-link" data-question="19">19</a>
                <a href="#" class="question-link" data-question="20">20</a>
                <a href="#" class="question-link" data-question="21">21</a>
                <a href="#" class="question-link" data-question="22">22</a>
                <a href="#" class="question-link" data-question="23">23</a>
                <a href="#" class="question-link" data-question="24">24</a>
                <a href="#" class="question-link" data-question="25">25</a>
                <a href="#" class="question-link" data-question="26">26</a>
                <a href="#" class="question-link" data-question="27">27</a>
                <a href="#" class="question-link" data-question="28">28</a>
            </div>
            <span class="question-placeholder">15 of 28</span>
        </div>
        <div class="tab " data-tab="part3">
            <span class="tab-title">Part 3</span>
            <div class="question-links">
                <a href="#" class="question-link" data-question="29">29</a>
                <a href="#" class="question-link" data-question="30">30</a>
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
            <span class="question-placeholder">29 of 40</span>
        </div>

    </div>
    <div class="fixed-bottom d-flex justify-content-end mb-5 px-5" style="gap: 5px;">
        <!-- Left Arrow -->
        <button id="prev-question" type="button" class="btn btn-dark" style="font-size: 1.5rem;">
            <span class="material-icons-outlined">arrow_back</span>
        </button>
        <!-- Right Arrow -->
        <button id="next-question" type="button" class="btn btn-dark" style="font-size: 1.5rem;">
            <span class="material-icons-outlined">arrow_forward</span>
        </button>
    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // --- UI Elements ---
            const tabs = document.querySelectorAll('.tab');
            const tabContents = document.querySelectorAll('.tab-content');
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');
            const noteToggle = document.getElementById('noteToggle');
            const closeBtn = sidebar?.querySelector('.close-btn');

            // --- Tab Navigation ---
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
                    const activeContent = document.getElementById(tabId);
                    if (activeContent) activeContent.classList.add('active');

                    const qLinks = tab.querySelector('.question-links');
                    const qPlaceholder = tab.querySelector('.question-placeholder');
                    if (qLinks) qLinks.style.display = 'flex';
                    if (qPlaceholder) qPlaceholder.style.display = 'none';
                });
            });

            // --- Sidebar Toggle ---
            if (noteToggle && sidebar && mainContent) {
                noteToggle.addEventListener('click', () => {
                    sidebar.classList.add('open');
                    mainContent.classList.add('shifted');
                });
            }

            if (closeBtn && sidebar && mainContent) {
                closeBtn.addEventListener('click', () => {
                    sidebar.classList.remove('open');
                    mainContent.classList.remove('shifted');
                });
            }

            // --- Question Tracking & Scrolling ---
            const allLinks = Array.from(document.querySelectorAll('.question-link'));
            let currentIndex = 0;

            function getScrollContainer(el) {
                if (!el) return null;
                const scrollBox = el.closest('.scroll-box');
                if (scrollBox) return scrollBox;
                let node = el.parentElement;
                while (node) {
                    const style = window.getComputedStyle(node);
                    if ((style.overflowY === 'auto' || style.overflowY === 'scroll') && node.scrollHeight > node.clientHeight) {
                        return node;
                    }
                    node = node.parentElement;
                }
                return null;
            }

            function scrollToVisibleTop(target) {
                if (!target) return;
                const container = getScrollContainer(target);
                const secondCol = target.closest('.question_site');
                const scrollBox = target.closest('.scroll-box');
                
                const targetContainer = scrollBox || secondCol;
                const topOffset = 20;

                if (targetContainer) {
                    const tRect = target.getBoundingClientRect();
                    const cRect = targetContainer.getBoundingClientRect();
                    const delta = (tRect.top - cRect.top);
                    targetContainer.scrollTo({ top: Math.max(0, targetContainer.scrollTop + delta - topOffset), behavior: 'smooth' });
                } else {
                    target.style.scrollMarginTop = '120px';
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }

            function highlightLinkAndNumber(qNum) {
                allLinks.forEach(link => link.classList.toggle('active', link.getAttribute('data-question') === qNum));
                document.querySelectorAll('[id^="question-"][id$="-number"]').forEach(num => num.classList.remove('active'));
                const numberBox = document.getElementById(`question-${qNum}-number`);
                if (numberBox) numberBox.classList.add('active');
            }

            function activateTabForQuestion(qNum) {
                const target = document.getElementById(`question-${qNum}-number`) || document.getElementById(qNum) || document.getElementById(`q${qNum}_heading`);
                const partContent = target?.closest('.tab-content');
                if (!partContent) return;

                tabContents.forEach(tc => tc.classList.toggle('active', tc === partContent));
                tabs.forEach(tab => {
                    const isActive = tab.getAttribute('data-tab') === partContent.id;
                    tab.classList.toggle('active', isActive);
                    const qLinks = tab.querySelector('.question-links');
                    const qPlaceholder = tab.querySelector('.question-placeholder');
                    if (qLinks) qLinks.style.display = isActive ? 'flex' : 'none';
                    if (qPlaceholder) qPlaceholder.style.display = isActive ? 'none' : 'block';
                });
            }

            function setActiveQuestion(index) {
                if (index < 0 || index >= allLinks.length) return;
                currentIndex = index;
                const qNum = allLinks[index].getAttribute('data-question');

                highlightLinkAndNumber(qNum);
                activateTabForQuestion(qNum);

                const scrollTarget = document.getElementById(`question-${qNum}-number`) || document.getElementById(qNum);
                if (scrollTarget) {
                    scrollToVisibleTop(scrollTarget);
                    // Open accordion or tfng-item if needed
                    const accordionBtn = scrollTarget.closest('.accordion-button');
                    if (accordionBtn && accordionBtn.classList.contains('collapsed')) {
                        accordionBtn.click();
                    }
                    const tfngHead = scrollTarget.closest('.tfng-head');
                    if (tfngHead) {
                        const item = tfngHead.closest('.tfng-item');
                        if (item && !item.classList.contains('open')) {
                            const block = item.closest('.tfng-block');
                            block?.querySelectorAll('.tfng-item').forEach(it => it.classList.remove('open'));
                            item.classList.add('open');
                        }
                    }
                    const mcqHead = scrollTarget.closest('.mcq-head');
                    if (mcqHead) {
                        const item = mcqHead.closest('.mcq-item');
                        if (item && !item.classList.contains('open')) {
                            const block = item.closest('.mcq-block');
                            block?.querySelectorAll('.mcq-item').forEach(it => it.classList.remove('open'));
                            item.classList.add('open');
                        }
                    }
                }

                const inputField = document.getElementById(qNum);
                if (inputField && inputField.tagName === 'INPUT' && inputField.type === 'text' && inputField.style.display !== 'none') {
                    setTimeout(() => inputField.focus(), 400);
                }
            }

            allLinks.forEach((link, idx) => {
                link.addEventListener('click', e => { e.preventDefault(); setActiveQuestion(idx); });
            });

            document.getElementById('prev-question')?.addEventListener('click', () => setActiveQuestion(currentIndex - 1));
            document.getElementById('next-question')?.addEventListener('click', () => setActiveQuestion(currentIndex + 1));

            // --- Autosave Logic ---
            const testForm = document.getElementById('testForm');
            // Prevent Enter from submitting the form in input fields
            testForm?.addEventListener('keydown', (e) => {
                if (e.key === 'Enter') {
                    const tag = e.target.tagName.toLowerCase();
                    if (tag === 'input' || tag === 'select') e.preventDefault();
                }
            });
            const dirtyInputs = new Map();
            let autosaveDebounceTimer = null;

            function autosaveInput(input) {
                const formData = new FormData();
                formData.append('student_id', document.querySelector('input[name="student_id"]')?.value || '');
                formData.append('test_name', document.querySelector('input[name="test_name"]')?.value || '');
                const assignmentIdField = document.querySelector('input[name="assignment_id"]');
                if (assignmentIdField?.value) formData.append('assignment_id', assignmentIdField.value);

                if (input.type === 'checkbox') {
                    const groupName = input.name;
                    const selectedValues = Array.from(document.querySelectorAll(`input[name="${groupName}"]:checked`)).map(cb => cb.value);
                    formData.append('question_number', groupName.replace('q', '').replace('[]', ''));
                    formData.append('answer', selectedValues.join(','));
                } else if (input.type === 'radio') {
                    const groupName = input.name;
                    const checked = document.querySelector(`input[name="${groupName}"]:checked`);
                    formData.append('question_number', groupName.replace('q', ''));
                    formData.append('answer', checked ? checked.value : '');
                } else {
                    formData.append('question_number', input.name.replace('q', ''));
                    formData.append('answer', input.value);
                }

                fetch('{{ route('reading.autosave') }}', {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    body: formData
                }).then(res => res.ok && console.log(`✅ Autosaved: ${input.name}`))
                  .catch(err => console.error('❌ Autosave failed', err));
            }

            function flushDirtyInputs() {
                dirtyInputs.forEach(input => autosaveInput(input));
                dirtyInputs.clear();
            }

            function markDirty(input) {
                if (!input.name) return;
                dirtyInputs.set(input.name, input);
                if (autosaveDebounceTimer) clearTimeout(autosaveDebounceTimer);
                autosaveDebounceTimer = setTimeout(flushDirtyInputs, 5000);
            }

            document.querySelectorAll('input').forEach(input => {
                input.addEventListener('change', () => markDirty(input));
                if (input.type === 'text') input.addEventListener('input', () => markDirty(input));
                
                input.addEventListener('focus', function() {
                    if (this.placeholder) {
                        this.dataset.placeholder = this.placeholder;
                        this.placeholder = '';
                    }
                    let qNum = this.id || this.name.replace('q', '').replace('[]', '').replace('_radio','');
                    if (qNum.startsWith('q')) qNum = qNum.substring(1);
                    const idx = allLinks.findIndex(l => l.getAttribute('data-question') === qNum);
                    if (idx !== -1) {
                        currentIndex = idx;
                        highlightLinkAndNumber(qNum);
                    }
                });

                input.addEventListener('blur', function() {
                    if (this.dataset.placeholder) {
                        this.placeholder = this.dataset.placeholder;
                    }
                });
            });

            // --- MCQ/TFNG Sync ---
            document.querySelectorAll('.mcq-sync').forEach(radio => {
                radio.addEventListener('change', function() {
                    let targetId = this.getAttribute('data-target');
                    if (targetId.startsWith('q')) targetId = targetId.substring(1); 
                    const targetInput = document.getElementById(targetId);
                    if (targetInput) {
                        targetInput.value = this.value;
                        markDirty(targetInput);
                    }
                });
            });

            // --- Grid Logic ---
            function setGridAnswer(qNum, value) {
                const hidden = document.getElementById(String(qNum));
                if (hidden) {
                    hidden.value = value;
                    markDirty(hidden);
                }
                const rowCells = document.querySelectorAll(`.tick-cell[data-row="${qNum}"]`);
                rowCells.forEach(c => c.classList.remove('selected'));
                const cell = document.querySelector(`.tick-cell[data-row="${qNum}"][data-value="${CSS.escape(value)}"]`);
                if (cell) cell.classList.add('selected');
            }

            document.querySelectorAll('.tick-cell').forEach(cell => {
                cell.addEventListener('click', () => {
                    const row = cell.getAttribute('data-row');
                    const val = cell.getAttribute('data-value');
                    setGridAnswer(row, val);
                    const idx = allLinks.findIndex(l => l.getAttribute('data-question') === row);
                    if (idx !== -1) {
                        currentIndex = idx;
                        highlightLinkAndNumber(row);
                    }
                });
            });

            // --- Accordion / Items Open ---
            document.querySelectorAll('.tfng-head, .mcq-head').forEach(head => {
                head.addEventListener('click', () => {
                    const item = head.closest('.tfng-item, .mcq-item');
                    if (!item) return;
                    const block = head.closest('.tfng-block, .mcq-block');
                    const isOpen = item.classList.contains('open');
                    block?.querySelectorAll('.tfng-item, .mcq-item').forEach(it => it.classList.remove('open'));
                    if (!isOpen) item.classList.add('open');
                    
                    const qNum = head.querySelector('.tfng-num, .mcq-num')?.textContent;
                    if (qNum) {
                        const idx = allLinks.findIndex(l => l.getAttribute('data-question') === qNum.trim());
                        if (idx !== -1) {
                            currentIndex = idx;
                            highlightLinkAndNumber(qNum.trim());
                        }
                    }
                });
            });

            // --- Timer Logic ---
            const timerEl = document.getElementById('timer');
            if (timerEl) {
                let timeLeft = 60 * 60;
                const updateTimer = () => {
                    const mins = Math.floor(timeLeft / 60);
                    const secs = timeLeft % 60;
                    timerEl.textContent = `${mins} : ${secs < 10 ? '0' : ''}${secs} minutes remaining`;
                    if (timeLeft > 0) timeLeft--;
                    else {
                        clearInterval(timerInterval);
                        testForm?.submit();
                    }
                };
                const timerInterval = setInterval(updateTimer, 1000);
                updateTimer();
            }



            function updateAnsweredState(qNum) {
                const link = document.querySelector(`.question-link[data-question="${qNum}"]`);
                if (!link) return;

                let isAnswered = false;
                const inputs = document.querySelectorAll(`input[name="q${qNum}"], input[name="q${qNum}[]"]`);
                inputs.forEach(input => {
                    if ((input.type === 'radio' || input.type === 'checkbox') && input.checked) {
                        isAnswered = true;
                    } else if ((input.type === 'text' || input.type === 'hidden') && input.value.trim() !== '') {
                        isAnswered = true;
                    }
                });

                if (isAnswered) {
                    link.classList.add('answered');
                } else {
                    link.classList.remove('answered');
                }
            }

            // --- Finish Test ---
            document.getElementById('finishButton')?.addEventListener('click', (e) => {
                e.preventDefault();
                const modal = new bootstrap.Modal(document.getElementById('finishModal'));
                modal.show();
            });

            document.getElementById('continueButton')?.addEventListener('click', () => {
                flushDirtyInputs();
                testForm?.submit();
            });

            // --- Start Modal ---
            const startModalEl = document.getElementById('startModal');
            if (startModalEl) {
                const modal = new bootstrap.Modal(startModalEl);
                modal.show();
                
                const startTestBtn = document.getElementById('startTestButton');
                const studentIdInput = document.getElementById('studentIdInput');
                
                const handleStart = () => {
                    const sId = studentIdInput?.value;
                    if (sId && sId.length >= 8) {
                        modal.hide();
                        document.documentElement.requestFullscreen?.().catch(() => {});
                    } else {
                        const err = document.getElementById('studentIdError');
                        if (err) err.style.display = 'block';
                    }
                };

                startTestBtn?.addEventListener('click', handleStart);

                studentIdInput?.addEventListener('keydown', (e) => {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        handleStart();
                    }
                });
            }

            // --- Populate Answers ---
            const initialAnswers = @json($answers ?? []);
            Object.keys(initialAnswers).forEach(qNum => {
                const val = initialAnswers[qNum];
                if (!val) return;
                
                const input = document.getElementById(qNum) || document.querySelector(`[name="q${qNum}"]`);
                if (input) {
                    if (input.type === 'text') input.value = val;
                    if (input.type === 'radio' && input.value === val) input.checked = true;
                    if (input.type === 'hidden') {
                        // Grid or sync radio
                        const cell = document.querySelector(`.tick-cell[data-row="${qNum}"][data-value="${CSS.escape(val)}"]`);
                        if (cell) cell.classList.add('selected');
                        
                        const syncRadio = document.querySelector(`.mcq-sync[data-target="${qNum}"][value="${CSS.escape(val)}"]`) || document.querySelector(`.mcq-sync[data-target="q${qNum}"][value="${CSS.escape(val)}"]`);
                        if (syncRadio) syncRadio.checked = true;
                    }
                }
                const radio = document.querySelector(`input[name="q${qNum}"][value="${CSS.escape(val)}"]`);
                if (radio) radio.checked = true;
            });

            // --- Drag and Drop Logic ---
            var dndDraggedEl = null;
            var dndGhost = null;
            var dndSourceInput = null;

            document.querySelectorAll('.dnd-heading').forEach(function(el) {
                el.setAttribute('draggable', 'false');
            });

            function measureTextWidth(text, font) {
                var span = document.createElement('span');
                span.style.cssText = 'position:absolute; top:-9999px; left:-9999px; white-space:nowrap; font:' + font + ';';
                span.textContent = text;
                document.body.appendChild(span);
                var w = span.offsetWidth;
                document.body.removeChild(span);
                return w;
            }

            function dndPlaceHeading(dropInput, headingEl) {
                var val = headingEl.getAttribute('data-value');
                var qName = dropInput.getAttribute('data-question');

                var oldVal = dropInput.getAttribute('data-placed-value');
                if (oldVal) {
                    var oldH = document.querySelector('.dnd-heading[data-value="' + oldVal + '"]');
                    if (oldH) oldH.classList.remove('used');
                }

                dropInput.value = headingEl.textContent.trim();
                dropInput.setAttribute('data-placed-value', val);
                dropInput.style.borderColor = 'black';
                dropInput.style.background = '#fff';
                
                var font = window.getComputedStyle(dropInput).font;
                var textWidth = measureTextWidth(dropInput.value, font);
                dropInput.style.width = (textWidth + 30) + 'px';
                dropInput.style.boxShadow = '0 4px 6px -1px rgba(0, 0, 0, 0.1)';

                headingEl.classList.add('used');

                var qNum = String(qName || '').replace(/^q/i, '');
                var hidden = document.getElementById(qNum);
                if (hidden) {
                    hidden.value = val;
                    hidden.dispatchEvent(new Event('change'));
                    updateAnsweredState(qNum);
                    highlightLinkAndNumber(qNum);
                }
            }

            document.querySelectorAll('.dnd-drop-input').forEach(function(dropInput) {
                dropInput.addEventListener('dblclick', function() {
                    var oldVal = dropInput.getAttribute('data-placed-value');
                    if (oldVal) {
                        var h = document.querySelector('.dnd-heading[data-value="' + oldVal + '"]');
                        if (h) h.classList.remove('used');
                    }
                    dropInput.value = '';
                    dropInput.removeAttribute('data-placed-value');
                    dropInput.style.border = '1px solid #ccc';
                    dropInput.style.background = '#fff';
                    dropInput.style.width = '200px';
                    dropInput.style.boxShadow = 'none';

                    var qName = dropInput.getAttribute('data-question');
                    var qNum = String(qName || '').replace(/^q/i, '');
                    var hidden = document.getElementById(qNum);
                    if (hidden) {
                        hidden.value = '';
                        hidden.dispatchEvent(new Event('change'));
                        updateAnsweredState(qNum);
                    }
                });
            });

            document.querySelectorAll('.dnd-heading').forEach(function(el) {
                el.addEventListener('mousedown', function(e) {
                    if (el.classList.contains('used')) return;
                    e.preventDefault();
                    dndDraggedEl = el;
                    dndSourceInput = null;
                    el.classList.add('dragging');

                    dndGhost = document.createElement('div');
                    dndGhost.className = 'dnd-ghost-follow';
                    dndGhost.textContent = el.textContent;
                    dndGhost.style.left = e.clientX + 'px';
                    dndGhost.style.top = e.clientY - 15 + 'px';
                    document.body.appendChild(dndGhost);
                });
            });

            document.querySelectorAll('.dnd-drop-input').forEach(function(inp) {
                inp.addEventListener('mousedown', function(e) {
                    var placedVal = inp.getAttribute('data-placed-value');
                    if (!placedVal) return;
                    e.preventDefault();
                    var heading = document.querySelector('.dnd-heading[data-value="' + placedVal + '"]');
                    if (!heading) return;
                    dndDraggedEl = heading;
                    dndSourceInput = inp;
                    dndGhost = document.createElement('div');
                    dndGhost.className = 'dnd-ghost-follow';
                    dndGhost.textContent = heading.textContent;
                    dndGhost.style.left = e.clientX + 'px';
                    dndGhost.style.top = e.clientY - 15 + 'px';
                    document.body.appendChild(dndGhost);
                });
            });

            document.addEventListener('mousemove', function(e) {
                if (!dndGhost) return;
                dndGhost.style.left = e.clientX + 'px';
                dndGhost.style.top = e.clientY - 15 + 'px';

                document.querySelectorAll('.dnd-drop-input').forEach(function(inp) {
                    var rect = inp.getBoundingClientRect();
                    var isOver = (e.clientX >= rect.left && e.clientX <= rect.right && e.clientY >= rect.top && e.clientY <= rect.bottom);
                    if (inp.getAttribute('data-placed-value')) {
                         inp.style.borderColor = 'black';
                    } else {
                        inp.style.borderColor = '#ccc';
                    }
                });
            });

            document.addEventListener('mouseup', function(e) {
                if (!dndDraggedEl || !dndGhost) return;
                if (dndGhost.parentNode) dndGhost.parentNode.removeChild(dndGhost);
                dndGhost = null;

                var droppedOnInput = false;
                document.querySelectorAll('.dnd-drop-input').forEach(function(inp) {
                    var rect = inp.getBoundingClientRect();
                    if (e.clientX >= rect.left && e.clientX <= rect.right && e.clientY >= rect.top && e.clientY <= rect.bottom) {
                        if (dndSourceInput && dndSourceInput !== inp) {
                            dndSourceInput.value = '';
                            dndSourceInput.removeAttribute('data-placed-value');
                            dndSourceInput.style.border = '1px solid #ccc';
                            dndSourceInput.style.background = '#fff';
                            dndSourceInput.style.width = '200px';
                            dndSourceInput.style.boxShadow = 'none';
                            var srcQ = dndSourceInput.getAttribute('data-question');
                            var srcNum = String(srcQ || '').replace(/^q/i, '');
                            var srcHidden = document.getElementById(srcNum);
                            if (srcHidden) {
                                srcHidden.value = '';
                                srcHidden.dispatchEvent(new Event('change'));
                            }
                        } else if (dndSourceInput && dndSourceInput === inp) {
                            dndDraggedEl.classList.remove('dragging');
                            dndDraggedEl = null;
                            dndSourceInput = null;
                            return;
                        }
                        dndDraggedEl.classList.remove('used');
                        dndPlaceHeading(inp, dndDraggedEl);
                        droppedOnInput = true;
                    }
                });

                if (!droppedOnInput && dndSourceInput) {
                    dndDraggedEl.classList.remove('used');
                    dndSourceInput.value = '';
                    dndSourceInput.removeAttribute('data-placed-value');
                    dndSourceInput.style.border = '1px solid #ccc';
                    dndSourceInput.style.background = '#fff';
                    dndSourceInput.style.width = '200px';
                    dndSourceInput.style.boxShadow = 'none';
                    var srcQ = dndSourceInput.getAttribute('data-question');
                    var srcNum = String(srcQ || '').replace(/^q/i, '');
                    var srcHidden = document.getElementById(srcNum);
                    if (srcHidden) {
                        srcHidden.value = '';
                        srcHidden.dispatchEvent(new Event('change'));
                        updateAnsweredState(srcNum);
                    }
                }

                if (dndDraggedEl) dndDraggedEl.classList.remove('dragging');
                dndDraggedEl = null;
                dndSourceInput = null;
            });

            // Restore saved values for DND (15-21 and 29-37)
            [15, 16, 17, 18, 19, 20, 21, 29, 30, 31, 32, 33, 34, 35, 36, 37].forEach(function(qNum) {
                var hidden = document.getElementById(String(qNum));
                if (!hidden || !hidden.value) return;
                var savedVal = hidden.value.trim();
                var heading = document.querySelector('.dnd-heading[data-value="' + savedVal + '"]');
                var dropInput = document.querySelector('.dnd-drop-input[data-question="q' + qNum + '"]');
                if (heading && dropInput) {
                    heading.classList.add('used');
                    dropInput.value = heading.textContent.trim();
                    dropInput.setAttribute('data-placed-value', savedVal);
                    dropInput.style.borderColor = 'black';
                    dropInput.style.background = '#fff';
                    var font = window.getComputedStyle(dropInput).font;
                    var textWidth = measureTextWidth(dropInput.value, font);
                    dropInput.style.width = (textWidth + 30) + 'px';
                    updateAnsweredState(qNum);
                }
            });

            for (let i = 1; i <= 40; i++) {
                updateAnsweredState(i);
            }

            setActiveQuestion(0);
        });
    </script>

    <!-- highlight and note script  -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');
        const contextMenu = document.getElementById('customContextMenu');
        const highlightOption = document.getElementById('highlightOption');
        const notesOption = document.getElementById('notesOption');
        const clearOption = document.getElementById('clearOption');
        const allClearOption = document.getElementById('allClear');

        // Sidebar logic
        document.getElementById('noteToggle').addEventListener('click', () => {
            sidebar.classList.toggle('open');
            mainContent.classList.toggle('shifted');
        });
        
        sidebar.querySelector('.close-btn').addEventListener('click', () => {
            sidebar.classList.remove('open');
            mainContent.classList.remove('shifted');
        });

        let selectionRange = null;
        let activePopup = null; // track the active popup
        let clickedMark = null; // Track which mark was right-clicked

        // Global context menu listener
        document.addEventListener('contextmenu', e => {
            if (e.target.tagName === 'MARK') {
                e.preventDefault();
                clickedMark = e.target;
                selectionRange = null;
                contextMenu.style.display = 'block';
                contextMenu.style.left = e.pageX + 'px';
                contextMenu.style.top = e.pageY + 'px';
                return;
            }
            clickedMark = null;
            const sel = window.getSelection();
            if (sel.rangeCount > 0 && sel.toString().trim()) {
                e.preventDefault();
                // Clone range and shrink to actual selected text to fix double/triple-click expanding selection
                const rawRange = sel.getRangeAt(0).cloneRange();
                
                // Selection Normalization: Ensure range containers are text nodes
                // If the browser selection includes element boundaries (e.g. <div>text</div>),
                // we shrink it to the actual text content within.
                if (rawRange.startContainer.nodeType === Node.TEXT_NODE && rawRange.endContainer.nodeType === Node.TEXT_NODE) {
                    selectionRange = rawRange;
                } else {
                    const newRange = document.createRange();
                    const ancestor = rawRange.commonAncestorContainer;
                    const treeWalker = document.createTreeWalker(
                        ancestor.nodeType === Node.TEXT_NODE ? ancestor.parentNode : ancestor,
                        NodeFilter.SHOW_TEXT,
                        null,
                        false
                    );
                    
                    let firstNode = null, lastNode = null;
                    let tn;
                    while (tn = treeWalker.nextNode()) {
                        if (rawRange.intersectsNode(tn)) {
                            if (!firstNode) firstNode = tn;
                            lastNode = tn;
                        }
                    }
                    
                    if (firstNode && lastNode) {
                        const startN = (rawRange.startContainer.nodeType === Node.TEXT_NODE) ? rawRange.startContainer : firstNode;
                        const startO = (rawRange.startContainer.nodeType === Node.TEXT_NODE) ? rawRange.startOffset : 0;
                        const endN = (rawRange.endContainer.nodeType === Node.TEXT_NODE) ? rawRange.endContainer : lastNode;
                        const endO = (rawRange.endContainer.nodeType === Node.TEXT_NODE) ? rawRange.endOffset : lastNode.textContent.length;
                        
                        newRange.setStart(startN, startO);
                        newRange.setEnd(endN, endO);
                        selectionRange = newRange;
                    } else {
                        selectionRange = rawRange;
                    }
                }
                contextMenu.style.display = 'block';
                contextMenu.style.left = e.pageX + 'px';
                contextMenu.style.top = e.pageY + 'px';
            } else {
                contextMenu.style.display = 'none';
            }
        });

        // Core highlighting function - handles single and multi-node ranges
        function highlightRange(range, markInitializer) {
            const marks = [];
            if (!range) return marks;

            const startContainer = range.startContainer;
            const endContainer = range.endContainer;
            const startOffset = range.startOffset;
            const endOffset = range.endOffset;

            // Fast path for single text node selection
            if (startContainer === endContainer && startContainer && startContainer.nodeType === Node.TEXT_NODE) {
                if (startOffset === endOffset) return marks;
                const selectedText = startContainer.textContent.substring(startOffset, endOffset);
                if (!selectedText.trim()) return marks;
                // Safeguard: Don't highlight directly inside layout nodes (like TR)
                if (['TABLE','THEAD','TBODY','TR'].includes(startContainer.parentNode?.tagName)) return marks;

                const mark = document.createElement('mark');
                mark.style.backgroundColor = 'yellow';
                if (typeof markInitializer === 'function') markInitializer(mark);
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

            // Multi-node selection (e.g., across tables or paragraphs)
            const textNodes = [];
            const ancestor = range.commonAncestorContainer;
            const walker = document.createTreeWalker(
                ancestor.nodeType === Node.TEXT_NODE ? ancestor.parentNode : ancestor,
                NodeFilter.SHOW_TEXT,
                null,
                false
            );

            let node;
            while (node = walker.nextNode()) {
                if (range.intersectsNode(node)) {
                    textNodes.push(node);
                }
            }

            textNodes.forEach((textNode) => {
                let start = 0;
                let end = textNode.textContent.length;
                if (textNode === startContainer) start = startOffset;
                if (textNode === endContainer) end = endOffset;
                if (start >= end) return;

                const selectedText = textNode.textContent.substring(start, end);
                if (!selectedText.trim()) return;
                // Safeguard: Don't highlight directly inside layout nodes (like TR)
                if (['TABLE','THEAD','TBODY','TR'].includes(textNode.parentNode?.tagName)) return;

                const mark = document.createElement('mark');
                mark.style.backgroundColor = 'yellow';
                if (typeof markInitializer === 'function') markInitializer(mark);
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

        // Highlight option click handler
        highlightOption.addEventListener('click', () => {
            if (selectionRange) highlightRange(selectionRange);
            selectionRange = null;
            clickedMark = null;
            contextMenu.style.display = 'none';
        });

        // Notes option click handler
        notesOption.addEventListener('click', () => {
            if (clickedMark) {
                showNotePopup(clickedMark);
                clickedMark = null;
            } else if (selectionRange) {
                const markId = String(Date.now());
                const marks = highlightRange(selectionRange, m => {
                    m.setAttribute('data-tooltip', '');
                    m.setAttribute('data-note', '');
                    m.dataset.markId = markId;
                });
                if (marks.length) {
                    const fullHeader = marks.map(m => m.innerText).join(' ').replace(/\s+/g, ' ').trim();
                    marks.forEach((mk) => {
                        mk.dataset.header = fullHeader;
                        mk.addEventListener('click', function(e) {
                            e.stopPropagation();
                            showNotePopup(mk);
                        });
                    });

                    // Add entry to sidebar
                    const sidebar = document.getElementById('sidebar');
                    const noteDiv = document.createElement('div');
                    noteDiv.classList.add('sidebar-note-item');
                    noteDiv.dataset.markId = markId;
                    noteDiv.style.borderBottom = '1px solid #ccc';
                    noteDiv.style.padding = '10px';
                    noteDiv.innerHTML = `
                        <div class="sidebar-header" style="cursor: pointer; font-weight: normal; font-size: 14px; padding: 5px 0; word-wrap: break-word;">${fullHeader}</div>
                        <div class="sidebar-note-content" style="font-size: 13px; color: #666; white-space: pre-wrap;"></div>
                    `;
                    
                    sidebar.appendChild(noteDiv);

                    noteDiv.addEventListener('click', () => {
                        showNotePopup(marks[0]);
                    });

                    showNotePopup(marks[0]);
                }
            }
            selectionRange = null;
            clickedMark = null;
            contextMenu.style.display = 'none';
        });

        // Clear single highlight
        clearOption.addEventListener('click', function() {
            if (clickedMark) {
                const markId = clickedMark.dataset.markId;
                if (markId) {
                    const sidebarItem = document.querySelector(`.sidebar-note-item[data-mark-id="${markId}"]`);
                    if (sidebarItem) sidebarItem.remove();
                }

                const marksToClear = markId
                    ? Array.from(document.querySelectorAll(`mark[data-mark-id="${CSS.escape(markId)}"]`))
                    : [clickedMark];

                marksToClear.forEach((mk) => {
                    const parent = mk.parentNode;
                    if (!parent) return;
                    while (mk.firstChild) {
                        parent.insertBefore(mk.firstChild, mk);
                    }
                    parent.removeChild(mk);
                });
                
                clickedMark = null;
            }
            contextMenu.style.display = 'none';
        });

        // Clear all
        allClearOption.addEventListener('click', () => {
            document.querySelectorAll('mark').forEach(m => m.replaceWith(document.createTextNode(m.innerText)));
            const headerHTML = `<div class="sidebar-header"><h5>Notes</h5><span class="close-btn">&times;</span></div>`;
            sidebar.innerHTML = headerHTML;
            sidebar.querySelector('.close-btn').addEventListener('click', () => {
                sidebar.classList.remove('open');
                mainContent.classList.remove('shifted');
            });
            if (activePopup) activePopup.remove();
            sidebar.classList.remove('open');
            mainContent.classList.remove('shifted');
            contextMenu.style.display = 'none';
        });

        document.addEventListener('click', function(e) {
            if (!contextMenu.contains(e.target)) {
                contextMenu.style.display = 'none';
            }
        });

        function showNotePopup(mark) {
            if (activePopup) {
                activePopup.remove();
                document.removeEventListener('click', handleOutsideClick);
            }

            const markId = mark.dataset.markId;
            const notePopup = document.createElement('div');
            notePopup.classList.add('note-popup');
            notePopup.innerHTML = `
                <div class="drag-handle" style="background: #ddd; padding: 8px; cursor: move; border-bottom: 1px solid #ccc; display: flex; justify-content: space-between; align-items: center; user-select: none;">
                    <span style="font-size: 10px; color: #666;"> Drag to move</span>
                    <span class="close-note" style="cursor: pointer; font-size: 20px; font-weight: bold; color: #666;">&times;</span>
                </div>
                <div class="popup-header" contenteditable="true" style="font-weight: normal; cursor: text; padding: 8px; margin-bottom: 5px; outline: none; word-wrap: break-word;">${mark.dataset.header || mark.innerText}</div>
                <div style="padding: 0 8px 8px 8px;">
                    <textarea placeholder="Add your note here..." style="width:100%; border: 2px solid black; background-color:yellow; height: 80px; cursor: text; padding: 5px; resize: vertical; outline: none; border-radius: 4px;">${mark.dataset.note || ''}</textarea>
                </div>
            `;
            document.body.appendChild(notePopup);
            activePopup = notePopup;

            const rect = mark.getBoundingClientRect();
            notePopup.style.left = rect.left + window.scrollX + 'px';
            notePopup.style.top = rect.bottom + window.scrollY + 5 + 'px';

            const textarea = notePopup.querySelector('textarea');
            const popupHeader = notePopup.querySelector('.popup-header');

            const updateAll = () => {
                if (!markId) return;
                const relatedMarks = document.querySelectorAll(`mark[data-mark-id="${CSS.escape(markId)}"]`);
                relatedMarks.forEach(m => {
                    m.dataset.note = textarea.value;
                    m.dataset.header = popupHeader.innerText;
                });

                const sidebarItem = document.querySelector(`.sidebar-note-item[data-mark-id="${markId}"]`);
                if (sidebarItem) {
                    const sideHeader = sidebarItem.querySelector('.sidebar-header');
                    const sideContent = sidebarItem.querySelector('.sidebar-note-content');
                    if (sideHeader) sideHeader.innerText = popupHeader.innerText;
                    if (sideContent) sideContent.textContent = textarea.value;
                }
            };

            textarea.addEventListener('input', updateAll);
            popupHeader.addEventListener('input', updateAll);

            notePopup.querySelector('.close-note').addEventListener('click', () => {
                notePopup.remove();
                activePopup = null;
                document.removeEventListener('click', handleOutsideClick);
            });

            setTimeout(() => {
                textarea.focus();
                const length = textarea.value.length;
                textarea.setSelectionRange(length, length);
            }, 100);

            // Draggable logic
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
            document.addEventListener('mouseup', () => { isDragging = false; });

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

        // --- SAVED ANSWERS INITIALIZATION ---
        const saved = @json($answers ?? []);
        Object.keys(saved).forEach(qNum => {
            const val = saved[qNum];
            if (val === null || val === undefined) return;
            const strVal = String(val);
            if (strVal.trim() === '') return;

            const inputs = document.querySelectorAll(`input[name="q${qNum}"], input[name="q${qNum}[]"]`);
            inputs.forEach(inp => {
                if (inp.type === 'radio') inp.checked = (inp.value === strVal);
                else if (inp.type === 'checkbox') inp.checked = strVal.split(',').includes(inp.value);
                else if (inp.tagName === 'INPUT') {
                    inp.value = strVal;
                    // Update Tick UI for Matching Grid
                    const tickCells = document.querySelectorAll(`.tick-cell[data-row="${qNum}"]`);
                    if (tickCells.length > 0) {
                        clearRowSelection(qNum);
                        const cell = document.querySelector(`.tick-cell[data-row="${qNum}"][data-value="${strVal.trim().toUpperCase()}"]`);
                        if (cell) cell.classList.add('selected');
                    }
                }
            });
        });
    </script>"
</body>
</html>


