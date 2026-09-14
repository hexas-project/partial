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
            box-shadow: 0 0 0 2px rgba(0,0,0,0.08);
        }

        .inline-input:focus::placeholder {
            color: transparent;
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
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
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
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
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

        /* Drag and Drop Styles */
        .dnd-heading {
            padding: 8px 14px;
            margin: 6px 0;
            background: #fff;
            border: 1px solid #ddd;
            color: #333;
            cursor: grab;
            border-radius: 6px;
            font-size: 14px;
            user-select: none;
            width: fit-content;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .dnd-heading:active {
            cursor: grabbing;
        }

        .dnd-heading.dragging {
            opacity: 0.4;
        }

        .dnd-ghost-follow {
            position: fixed;
            padding: 8px 14px;
            background: #fff;
            border: 2px solid #888;
            border-radius: 6px;
            font-size: 14px;
            color: #333;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
            pointer-events: none;
            z-index: 99999;
            white-space: nowrap;
            width: fit-content;
        }

        .dnd-heading.used {
            opacity: 0.4;
            cursor: default;
            pointer-events: none;
        }

        .dnd-drop-input {
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 5px;
            width: 80px;
            text-align: center;
            cursor: pointer;
            background: #fff;
            transition: all 0.2s;
        }

        .dnd-drop-input:focus {
            outline: none;
        }

        .no-border-gap-table {
            border: none !important;
        }

        .no-border-gap-table td {
            border: none !important;
            padding: 4px 0 !important;
        }

        .note-taking-table {
            width: 70%;
            border-collapse: collapse;
            border: 1px solid #ced4da;
            margin-top: 20px;
            margin-left: 0;
            margin-right: auto;
        }

        .note-taking-table td {
            border: 1px solid #ced4da;
            padding: 12px 15px;
            vertical-align: middle;
        }

        .note-taking-table .label-cell {
            width: 40%;
            font-weight: bold;
            color: #333;
        }

        .note-taking-table .input-cell-content {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .question-circle {
            width: 32px;
            height: 32px;
            background-color: #31A5AC;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            flex-shrink: 0;
            font-size: 14px;
        }

        .boxed-input {
            border: 1.5px solid #ced4da;
            border-radius: 4px;
            background: #fff;
            width: 50%;
            outline: none;
            padding: 6px 12px;
            font-size: 15px;
            transition: border-color 0.2s;
        }

        .boxed-input:focus {
            border-color: #31A5AC;
            box-shadow: 0 0 0 2px rgba(49, 165, 172, 0.1);
        }

        .boxed-input:focus::placeholder {
            color: transparent;
        }

        .conference-title {
            color: #2c3e50;
            font-weight: 800;
            text-align: left;
            margin-top: 25px;
            margin-bottom: 10px;
            font-size: 1.5rem;
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
            box-shadow: -2px 0 5px rgba(0,0,0,0.05);
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
            $selected25_26 = array_values(array_filter([
                $answers[25] ?? null,
                $answers[26] ?? null,
            ], fn($v) => $v !== null && $v !== ''));

            $selected27_28 = array_values(array_filter([
                $answers[27] ?? null,
                $answers[28] ?? null,
            ], fn($v) => $v !== null && $v !== ''));

            $selected29_30 = array_values(array_filter([
                $answers[29] ?? null,
                $answers[30] ?? null,
            ], fn($v) => $v !== null && $v !== ''));
        @endphp

        <!-- Sidebar -->
        <div id="sidebar" class="sidebar">
            <div class="sidebar-header">
                <h5>Notes</h5>
                <span class="close-btn">&times;</span>
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
                                    <span class="material-icons-outlined" style="vertical-align: middle; margin-right: 5px;">schedule</span>
                                    <strong id="timer">30 minutes remaining</strong>
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item me-3">
                                <button id="finishButton" class="btn btn-outline-dark">Finish test</button>
                            </li>
                            <li class="nav-item">
                                <span id="noteToggle" class="material-icons-outlined" style="cursor: pointer;">note_alt</span>
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

            <div class="container-fluid px-5">
            <div class="tab-content active" id="part1" style="margin-bottom: 80px;">
                <input type="hidden" name="test_name" value="{{ $testName ?? 'listeningTwelve' }}">
                <input type="hidden" name="student_id" value="{{ auth()->id() ?? session('student_batch_id') }}">
                <input type="hidden" name="exam_student_id" id="examStudentIdField" value="">
                <input type="hidden" name="assignment_id" value="{{ $assignmentId ?? '' }}">

                <div class="question_part">
                    <h4>Part 1</h4>
                    <p>Questions 1–10</p>
                </div>

                <div class="mt-4">
                    <p class="text-muted" style="font-style: italic; margin-bottom: 5px;">Complete the notes below.</p>
                    <p class="text-muted" style="font-style: italic;">Write <strong><span style="color: #121212ff;">NO MORE THAN THREE WORDS AND/OR A NUMBER</span></strong> for each answer.</p>

                    <h2 class="conference-title">Architecture 21 conference</h2>

                    <table class="note-taking-table">
                        <tbody>
                            <tr>
                                <td class="label-cell">Conference dates:</td>
                                <td>
                                    <div class="input-cell-content">
                                        <input type="text" name="q1" class="boxed-input" value="{{ $answers[1] ?? '' }}" id="1" placeholder="1">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-cell">Conference venue:</td>
                                <td>
                                    <div class="input-cell-content">
                                        <input type="text" name="q2" class="boxed-input" value="{{ $answers[2] ?? '' }}" id="2" placeholder="2">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-cell">Reservations phone no.:</td>
                                <td>
                                    <div class="input-cell-content">
                                        <input type="text" name="q3" class="boxed-input" value="{{ $answers[3] ?? '' }}" id="3" placeholder="3">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-cell">Student rate per day:</td>
                                <td>
                                    <div class="input-cell-content">
                                        <input type="text" name="q4" class="boxed-input" value="{{ $answers[4] ?? '' }}" id="4" placeholder="4">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-cell">Contact person:</td>
                                <td>
                                    <div class="input-cell-content">
                                        <input type="text" name="q5" class="boxed-input" value="{{ $answers[5] ?? '' }}" id="5" placeholder="5">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-cell">Must act fast:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="label-cell">Closing date for talks:</td>
                                <td>
                                    <div class="input-cell-content">
                                        <input type="text" name="q6" class="boxed-input" value="{{ $answers[6] ?? '' }}" id="6" placeholder="6">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-cell">Summary should have:</td>
                                <td>
                                    <div class="input-cell-content">
                                        <input type="text" name="q7" class="boxed-input" value="{{ $answers[7] ?? '' }}" id="7" placeholder="7">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-cell">Maximum length:</td>
                                <td>
                                    <div class="input-cell-content">
                                        <input type="text" name="q8" class="boxed-input" value="{{ $answers[8] ?? '' }}" id="8" placeholder="8">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-cell">Also send:</td>
                                <td>
                                    <div class="input-cell-content">
                                        <div class="d-flex align-items-center gap-2 w-100">
                                            <input type="text" name="q9" class="boxed-input" value="{{ $answers[9] ?? '' }}" id="9" placeholder="9">
                                        </div>
                                    </div>
                                    <div class="mt-2 text-muted" style="font-size: 0.9rem;">Email address</div>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-cell"></td>
                                <td>
                                    <div class="input-cell-content">
                                        <div class="d-flex align-items-center gap-1 w-100">
                                            <input type="text" name="q10" class="boxed-input" value="{{ $answers[10] ?? '' }}" id="10" placeholder="10">
                                            <span style="white-space: nowrap;">@uniconfedu.au</span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-content" id="part2" style="margin-bottom: 80px;">
                <div class="question_part">
                    <h4>Part 2</h4>
                    <p>Questions 11–20</p>
                </div>

                <div class="mt-4">
                    <h4>Question 11</h4>
                    <p>Write <strong>NO MORE THAN THREE WORDS OR A NUMBER</strong> for the answer.</p>
                    <p class="mt-3">The house was built between <input type="text" name="q11" class="inline-input" value="{{ $answers[11] ?? '' }}" id="11" placeholder="11"></p>



                    <h4>Question 12</h4>
                    <p>Choose the correct answer<br>
                    <strong>It was originally constructed as a/an:</strong></p>
                    <div class="ms-3">
                        <label><input type="radio" name="q12" value="A" {{ ($answers[12] ?? '') == 'A' ? 'checked' : '' }} id="12"> family home</label><br>
                        <label><input type="radio" name="q12" value="B" {{ ($answers[12] ?? '') == 'B' ? 'checked' : '' }}> office</label><br>
                        <label><input type="radio" name="q12" value="C" {{ ($answers[12] ?? '') == 'C' ? 'checked' : '' }}> public house</label>
                    </div></br>



                    <h4>Questions 13-15</h4>
                    <p>Write <strong>NO MORE THAN THREE WORDS</strong> for each answer.</p>
                    <p class="mt-3">The house contains art from: <input type="text" name="q13" class="inline-input" value="{{ $answers[13] ?? '' }}" id="13" placeholder="13"></p>
                    <p>Until recently, the art gallery was: <input type="text" name="q14" class="inline-input" value="{{ $answers[14] ?? '' }}" id="14" placeholder="14"></p>
                    <p>Tomorrow's talk will be on: <input type="text" name="q15" class="inline-input" value="{{ $answers[15] ?? '' }}" id="15" placeholder="15"></p>



                    <h4>Questions 16-20</h4>
                    <p>Write <strong>NO MORE THAN THREE WORDS</strong> for each answer.</p>
                    <p class="mt-3">Breakfast is served in the cafeteria or: <input type="text" name="q16" class="inline-input" value="{{ $answers[16] ?? '' }}" id="16" placeholder="16"></p>
                    <p>You can choose between an English breakfast or: <input type="text" name="q17" class="inline-input" value="{{ $answers[17] ?? '' }}" id="17" placeholder="17"></p>
                    <p>A car park was built because of an increase in: <input type="text" name="q18" class="inline-input" value="{{ $answers[18] ?? '' }}" id="18" placeholder="18"></p>
                    <p>The garden contains many: <input type="text" name="q19" class="inline-input" value="{{ $answers[19] ?? '' }}" id="19" placeholder="19"></p>
                    <p>The animals at Apsley House are all: <input type="text" name="q20" class="inline-input" value="{{ $answers[20] ?? '' }}" id="20" placeholder="20"></p>
                </div>
            </div>

            <div class="tab-content" id="part3" style="margin-bottom: 80px;">
                <div class="question_part">
                    <h4>Part 3</h4>
                    <p>Questions 21–30</p>
                </div>

                <div class="mt-4">
                    <h4>Questions 21-25</h4>
                    <p>Choose the correct answer.</p>

                    <div class="mb-4">
                        <p class="mt-3"><strong>21 Which college does Chris suggest would be best?</strong></p>
                        <div class="ms-3">
                            <label><input type="radio" name="q21" value="A" {{ ($answers[21] ?? '') == 'A' ? 'checked' : '' }} id="21"> Leeds Conservatory of Contemporary Music</label><br>
                            <label><input type="radio" name="q21" value="B" {{ ($answers[21] ?? '') == 'B' ? 'checked' : '' }}> The Henry Music Institute</label><br>
                            <label><input type="radio" name="q21" value="C" {{ ($answers[21] ?? '') == 'C' ? 'checked' : '' }}> The Academy in London</label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <p class="mt-3"><strong>22 What entry requirements are common to all the colleges?</strong></p>
                        <div class="ms-3">
                            <label><input type="radio" name="q22" value="A" {{ ($answers[22] ?? '') == 'A' ? 'checked' : '' }} id="22"> an audition</label><br>
                            <label><input type="radio" name="q22" value="B" {{ ($answers[22] ?? '') == 'B' ? 'checked' : '' }}> an essay</label><br>
                            <label><input type="radio" name="q22" value="C" {{ ($answers[22] ?? '') == 'C' ? 'checked' : '' }}> an interview</label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <p class="mt-3"><strong>23 How much does the course at Leeds Conservatory of Contemporary Music cost?</strong></p>
                        <div class="ms-3">
                            <label><input type="radio" name="q23" value="A" {{ ($answers[23] ?? '') == 'A' ? 'checked' : '' }} id="23"> £6,000 a year</label><br>
                            <label><input type="radio" name="q23" value="B" {{ ($answers[23] ?? '') == 'B' ? 'checked' : '' }}> £7,000 a year</label><br>
                            <label><input type="radio" name="q23" value="C" {{ ($answers[23] ?? '') == 'C' ? 'checked' : '' }}> £8,000 a year</label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <p class="mt-3"><strong>24 What other expenses are payable to the colleges?</strong></p>
                        <div class="ms-3">
                            <label><input type="radio" name="q24" value="A" {{ ($answers[24] ?? '') == 'A' ? 'checked' : '' }} id="24"> application fee</label><br>
                            <label><input type="radio" name="q24" value="B" {{ ($answers[24] ?? '') == 'B' ? 'checked' : '' }}> insurance</label><br>
                            <label><input type="radio" name="q24" value="C" {{ ($answers[24] ?? '') == 'C' ? 'checked' : '' }}> train fare</label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <p class="mt-3"><strong>25 When is the deadline for Leeds Conservatory of Contemporary Music?</strong></p>
                        <div class="ms-3">
                            <label><input type="radio" name="q25" value="A" {{ ($answers[25] ?? '') == 'A' ? 'checked' : '' }} id="25"> January 9th</label><br>
                            <label><input type="radio" name="q25" value="B" {{ ($answers[25] ?? '') == 'B' ? 'checked' : '' }}> January 19th</label><br>
                            <label><input type="radio" name="q25" value="C" {{ ($answers[25] ?? '') == 'C' ? 'checked' : '' }}> January 30th</label>
                        </div>
                    </div>



                    <h4>Questions 26-30</h4>
                    <p><strong>Which facilities do the colleges have?</strong></p>
                    <p>Choose the correct answer and move it into the gap.</p>
                    <div class="d-flex justify-content-between align-items-start gap-4">
                        <div style="flex: 1;">
                            <p class="mt-3"><strong>Colleges</strong></p>
                            <table class="table no-border-gap-table" style="width: 100%;">
                                <tbody>
                                    <tr><td style="padding-right: 0px !important;">26. Northdown College</td><td><input type="text" class="dnd-drop-input" data-question="q26" placeholder="26" readonly value="{{ $answers[26] ?? '' }}" id="26"></td></tr>
                                    <tr><td style="padding-right: 0px !important;">27. The Academy in London</td><td><input type="text" class="dnd-drop-input" data-question="q27" placeholder="27" readonly value="{{ $answers[27] ?? '' }}" id="27"></td></tr>
                                    <tr><td style="padding-right: 0px !important;">28. Leeds Conservatory of Contemporary Music</td><td><input type="text" class="dnd-drop-input" data-question="q28" placeholder="28" readonly value="{{ $answers[28] ?? '' }}" id="28"></td></tr>
                                    <tr><td style="padding-right: 0px !important;">29. The Henry Music Institute</td><td><input type="text" class="dnd-drop-input" data-question="q29" placeholder="29" readonly value="{{ $answers[29] ?? '' }}" id="29"></td></tr>
                                    <tr><td style="padding-right: 0px !important;">30. The James Academy of Music</td><td><input type="text" class="dnd-drop-input" data-question="q30" placeholder="30" readonly value="{{ $answers[30] ?? '' }}" id="30"></td></tr>
                                </tbody>
                            </table>
                            <div style="display:none;">
                                <input type="text" name="q26" id="q26_hidden" value="{{ $answers[26] ?? '' }}">
                                <input type="text" name="q27" id="q27_hidden" value="{{ $answers[27] ?? '' }}">
                                <input type="text" name="q28" id="q28_hidden" value="{{ $answers[28] ?? '' }}">
                                <input type="text" name="q29" id="q29_hidden" value="{{ $answers[29] ?? '' }}">
                                <input type="text" name="q30" id="q30_hidden" value="{{ $answers[30] ?? '' }}">
                            </div>
                        </div>
                        <div style="flex: 1; padding: 20px; border-radius: 8px;">
                            
                            <p><strong>Facilities</strong></p>
                            <div id="learning-twelve-dnd-headings" class="d-flex flex-wrap gap-2">
                                <div class="dnd-heading" data-value="A" data-content="large gardens">large gardens</div>
                                <div class="dnd-heading" data-value="B" data-content="multiple sites">multiple sites</div>
                                <div class="dnd-heading" data-value="C" data-content="practice rooms">practice rooms</div>
                                <div class="dnd-heading" data-value="D" data-content="recording studio">recording studio</div>
                                <div class="dnd-heading" data-value="E" data-content="research facility">research facility</div>
                                <div class="dnd-heading" data-value="F" data-content="student canteen">student canteen</div>
                                <div class="dnd-heading" data-value="G" data-content="technology suite">technology suite</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-content" id="part4" style="margin-bottom: 80px;">
                <div class="question_part">
                    <h4>Part 4</h4>
                    <p>Questions 31–40</p>
                </div>

                <div class="mt-4">
                    <h4>Questions 31-35</h4>
                    <p>Complete the sentences below.</p>
                    <p>Write <strong>NO MORE THAN TWO WORDS AND/OR A NUMBER</strong> for each answer.</p>

                    <p class="mt-3 fw-bold">THE HEALTH BENEFITS OF ART AND MUSIC</p>

                    <p class="mt-3">According to the speaker, art and music can benefit patients' emotional, <input type="text" name="q31" class="inline-input" value="{{ $answers[31] ?? '' }}" id="31" placeholder="31"> and physical well-being.</p>
                    <p>Florence Nightingale first noted the improvements in the year <input type="text" name="q32" class="inline-input" value="{{ $answers[32] ?? '' }}" id="32" placeholder="32">.</p>
                    <p>The results of many studies did not prove a link between health and art as they were rarely <input type="text" name="q33" class="inline-input" style="min-width:80px;" value="{{ $answers[33] ?? '' }}" id="33" placeholder="33">.</p>
                    <p>The American study looked at the effects of architecture on patients' <input type="text" name="q34" class="inline-input" value="{{ $answers[34] ?? '' }}" id="34" placeholder="34">.</p>
                    <p>The patients who were in a ward with a <input type="text" name="q35" class="inline-input" value="{{ $answers[35] ?? '' }}" id="35" placeholder="35"> were not in hospital for as long and needed less medication.</p>



                    <h4>Questions 36-40</h4>
                    <p>Complete the table below. Write <strong>NO MORE THAN THREE WORDS</strong> for each answer.</p>
                    <p>Recent Research Projects</p>

                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th>Type of patient</th>
                                <th>Type of art/music</th>
                                <th>Effect on patients</th>
                                <th>Other improvements</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Unborn babies</td>
                                <td><input type="text" name="q36" class="inline-input" value="{{ $answers[36] ?? '' }}" id="36" placeholder="36" style="min-width:80px;"></td>
                                <td>heart rate increased</td>
                                <td>mother felt relaxed</td>
                            </tr>
                            <tr>
                                <td>Cancer patient</td>
                                <td><input type="text" name="q37" class="inline-input" value="{{ $answers[37] ?? '' }}" id="37" placeholder="37" style="min-width:80px;"></td>
                                <td><input type="text" name="q38" class="inline-input" value="{{ $answers[38] ?? '' }}" id="38" placeholder="38" style="min-width:80px;"></td>
                                <td>improvements in well-being</td>
                            </tr>
                            <tr>
                                <td>Hip replacement (elderly)</td>
                                <td><input type="text" name="q39" class="inline-input" value="{{ $answers[39] ?? '' }}" id="39" placeholder="39" style="min-width:80px;"></td>
                                <td>eased anxiety</td>
                                <td>staff <input type="text" name="q40" class="inline-input" value="{{ $answers[40] ?? '' }}" id="40" placeholder="40" style="min-width:80px;"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- <div class="fixed-bottom d-flex justify-content-end mb-5 px-5" style="z-index: 999;">
            <button id="prev-question" class="btn btn-dark me-2" style="font-size: 1.5rem;">&#8592;</button>
            <button id="next-question" class="btn btn-dark ms-2" style="font-size: 1.5rem;">&#8594;</button>
        </div> -->
        <div class="fixed-bottom d-flex justify-content-end mb-5 px-5" style="gap: 5px;">
            <button id="prev-question" type="button" class="btn btn-dark" style="font-size: 1.5rem;">
                <span class="material-icons-outlined">arrow_back</span>
            </button>
            <button id="next-question" type="button" class="btn btn-dark" style="font-size: 1.5rem;">
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
    <div class="modal fade" id="startModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="material-icons-outlined">headphones</span>
                    <h5 class="modal-title" id="modalTitle">Start Listening Test</h5>
                </div>
                <div class="modal-body">
                    <p class="instruction-text">Please enter your Student ID and click OK to begin the listening test.</p>
                    
                    <div class="student-id-card">
                        <label class="student-id-label">
                            <span class="material-icons-outlined" style="font-size: 20px;">person</span>
                            STUDENT ID
                        </label>
                        <input type="text" id="modal_student_id" class="student-id-input" placeholder="Enter your Student ID" value="">
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

        document.addEventListener('DOMContentLoaded', function() {
            const startModal = new bootstrap.Modal(document.getElementById('startModal'));
            const finishModal = new bootstrap.Modal(document.getElementById('finishModal'));
            const startButton = document.getElementById('startTestButton');
            const finishButton = document.getElementById('finishButton');
            const continueButton = document.getElementById('continueButton');

            startModal.show();

            // Timer functionality
            let timeRemaining = 0;
            let timerInterval;
            const specificAudio = new Audio('{{ asset("audio/112main.MP3") }}');
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
            startButton.addEventListener('click', function(e) {
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

                // Store Student ID in sessionStorage and hidden input
                sessionStorage.setItem('examStudentId', studentIdValue);
                document.getElementById('examStudentIdField').value = studentIdValue;

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
            document.getElementById('modal_student_id').addEventListener('input', function() {
                this.classList.remove('is-invalid');
                document.getElementById('student_id_error').style.display = 'none';
            });

            // Trigger start test on Enter key press
            document.getElementById('modal_student_id').addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    document.getElementById('startTestButton').click();
                }
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

        // Autosave with debounce (10 seconds delay)
        let autosaveDebounceTimer = null;
        const dirtyInputs = new Map();
        const testForm = document.getElementById('testForm');

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

        // Attach change listeners to all inputs
        document.querySelectorAll('input[type="radio"], input[type="text"], input[type="checkbox"]').forEach(input => {
            input.addEventListener('change', function() {
                markDirty(this);
            });
            if (input.type === 'text') {
                input.addEventListener('input', function() {
                    markDirty(this);
                });
            }
        });

        // Final flush on form submit
        if (testForm) {
            testForm.addEventListener('submit', function() {
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
                checkbox.addEventListener('change', function() {
                    const checked = optionList.querySelectorAll('input[type="checkbox"]:checked');
                    if (checked.length > maxSelections) {
                        this.checked = false;
                    }
                });
            });
        });

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
                    const questionNum = this.id || this.name.replace('q', '').replace('[]', '');
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
            if (noteToggle && sidebar && mainContent) {
                const closeBtn = sidebar.querySelector('.close-btn');

                noteToggle.addEventListener('click', () => {
                    sidebar.classList.add('open');
                    mainContent.classList.add('shifted');
                });

                if (closeBtn) {
                    closeBtn.addEventListener('click', (e) => {
                        e.preventDefault();
                        e.stopPropagation();
                        sidebar.classList.remove('open');
                        mainContent.classList.remove('shifted');
                    });
                }
            }
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

        // Context menu on right-click
        document.addEventListener('contextmenu', function(e) {
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
        document.addEventListener('click', function(e) {
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
            highlightOption.addEventListener('click', function() {
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
            notesOption.addEventListener('click', function() {
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
            clearOption.addEventListener('click', function() {
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
            allClearOption.addEventListener('click', function() {
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

    <script>
        // ===== Drag and Drop for Questions 26-30 =====
        (function() {
            var dndDraggedEl = null;
            var dndGhost = null;
            var dndSourceInput = null;

            // Remove native draggable from headings
            document.querySelectorAll('.dnd-heading').forEach(function(el) {
                el.setAttribute('draggable', 'false');
            });

            // Helper: measure text width for input
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
                var content = headingEl.getAttribute('data-content');
                var text = headingEl.textContent;
                var qName = dropInput.getAttribute('data-question');

                // If input already has a value, restore the old heading back to list
                var oldVal = dropInput.getAttribute('data-placed-value');
                if (oldVal) {
                    var oldH = document.querySelector('.dnd-heading[data-value="' + oldVal + '"]');
                    if (oldH) {
                        oldH.classList.remove('used');
                        oldH.style.display = '';
                    }
                }

                // Set value in the visible drop input
                dropInput.value = text;
                dropInput.setAttribute('data-placed-value', val);
                var tw = measureTextWidth(text, window.getComputedStyle(dropInput).font);
                dropInput.style.width = (tw + 30) + 'px';
                dropInput.style.border = 'none';
                dropInput.style.boxShadow = '0 2px 8px rgba(0,0,0,0.15)';

                // Hide heading from right side list
                headingEl.classList.add('used');
                headingEl.style.display = 'none';

                // Sync hidden input
                var hidden = document.getElementById(qName + '_hidden');
                if (hidden) {
                    hidden.value = content;
                    hidden.dispatchEvent(new Event('change'));
                }

                var qNum = String(qName || '').replace(/^q/i, '');
                var link = document.querySelector(`.question-link[data-question="${qNum}"]`);
                if (link) {
                    document.querySelectorAll('.question-link').forEach(l => l.classList.remove('active'));
                    link.classList.add('active');
                }
            }

            // Clear drop input on double-click
            document.querySelectorAll('.dnd-drop-input').forEach(function(dropInput) {
                dropInput.addEventListener('dblclick', function() {
                    var oldVal = dropInput.getAttribute('data-placed-value');
                    if (oldVal) {
                        var h = document.querySelector('.dnd-heading[data-value="' + oldVal + '"]');
                        if (h) {
                            h.classList.remove('used');
                            h.style.display = '';
                        }
                    }
                    dropInput.value = '';
                    dropInput.removeAttribute('data-placed-value');
                    dropInput.style.width = '80px';
                    dropInput.style.border = '1px solid #ccc';
                    dropInput.style.boxShadow = 'none';
                    var qName = dropInput.getAttribute('data-question');
                    var hidden = document.getElementById(qName + '_hidden');
                    if (hidden) {
                        hidden.value = '';
                        hidden.dispatchEvent(new Event('change'));
                    }
                });
            });

            // Start drag from list
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

            // Start drag from input
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
                    if (e.clientX >= rect.left && e.clientX <= rect.right && e.clientY >= rect.top && e.clientY <= rect.bottom) {
                        inp.style.borderColor = '#2980b9';
                        inp.style.background = '#ebf5fb';
                    } else {
                        inp.style.borderColor = '#ccc';
                        inp.style.background = '#fff';
                    }
                });
            });

            document.addEventListener('mouseup', function(e) {
                if (!dndDraggedEl || !dndGhost) return;

                if (dndGhost.parentNode) dndGhost.parentNode.removeChild(dndGhost);
                dndGhost = null;

                var droppedOnInput = false;
                document.querySelectorAll('.dnd-drop-input').forEach(function(inp) {
                    inp.style.borderColor = '#ccc';
                    inp.style.background = '#fff';
                    var rect = inp.getBoundingClientRect();
                    if (e.clientX >= rect.left && e.clientX <= rect.right && e.clientY >= rect.top && e.clientY <= rect.bottom) {
                        if (dndSourceInput && dndSourceInput !== inp) {
                            dndSourceInput.value = '';
                            dndSourceInput.removeAttribute('data-placed-value');
                            dndSourceInput.style.width = '80px';
                            dndSourceInput.style.border = '1px solid #ccc';
                            dndSourceInput.style.boxShadow = 'none';
                            var srcQ = dndSourceInput.getAttribute('data-question');
                            var srcHidden = document.getElementById(srcQ + '_hidden');
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
                        dndDraggedEl.style.display = '';
                        dndPlaceHeading(inp, dndDraggedEl);
                        droppedOnInput = true;
                    }
                });

                if (!droppedOnInput && dndSourceInput) {
                    dndDraggedEl.classList.remove('used');
                    dndDraggedEl.style.display = '';
                    dndSourceInput.value = '';
                    dndSourceInput.removeAttribute('data-placed-value');
                    dndSourceInput.style.width = '80px';
                    dndSourceInput.style.border = '1px solid #ccc';
                    dndSourceInput.style.boxShadow = 'none';
                    var srcQ = dndSourceInput.getAttribute('data-question');
                    var srcHidden = document.getElementById(srcQ + '_hidden');
                    if (srcHidden) {
                        srcHidden.value = '';
                        srcHidden.dispatchEvent(new Event('change'));
                    }
                }

                if (dndDraggedEl) dndDraggedEl.classList.remove('dragging');
                dndDraggedEl = null;
                dndSourceInput = null;
            });

            // Restore saved values on page load
            ['q26', 'q27', 'q28', 'q29', 'q30'].forEach(function(qName) {
                var hidden = document.getElementById(qName + '_hidden');
                if (!hidden || !hidden.value) return;
                var savedContent = hidden.value.trim();
                var heading = document.querySelector('.dnd-heading[data-content="' + savedContent + '"]');
                var dropInput = document.querySelector('.dnd-drop-input[data-question="' + qName + '"]');
                if (!heading || !dropInput) return;

                dndPlaceHeading(dropInput, heading);
            });
        })();
    </script>
</body>

</html>
