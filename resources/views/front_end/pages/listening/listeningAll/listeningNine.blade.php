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
            color: gray;
        }

        .question-link.answered {
            color: gray !important;
            font-weight: bold;
        }

        .inline-input {
            border: 1px solid gray;
            border-radius: 4px;
            outline: none;
            padding: 5px 10px;
            margin: 2px 0;
            width: 150px;
            font-size: 14px;
            background-color: white;
        }

        table .inline-input {
            width: 130px;
        }

        .inline-input:focus {
            border-color: gray;
            /* box-shadow: 0 0 0 0.2rem rgba(0, 128, 0, 0.1); */
        }

        th {
            white-space: nowrap;
            background-color: #f8f9fa !important;
            vertical-align: middle !important;
            text-align: left;
            padding: 12px !important;
            border-bottom: 2px solid #dee2e6 !important;
        }

        td {
            vertical-align: top !important;
            padding: 12px !important;
        }

        .table-responsive {
            margin-top: 20px;
            border-radius: 8px;
            overflow-x: auto;
            border: 1px solid #dee2e6;
            background-color: white;
        }

        .table {
            margin-bottom: 0;
            width: 100%;
            min-width: 1000px;
            table-layout: auto;
        }

        th, td {
            border: 1px solid #dee2e6 !important;
        }

        /* Fixed Column Widths for stability */
        th:nth-child(1), td:nth-child(1) { width: 20%; min-width: 180px; }
        th:nth-child(2), td:nth-child(2) { width: 20%; min-width: 200px; }
        th:nth-child(3), td:nth-child(3) { width: 20%; min-width: 200px; }
        th:nth-child(4), td:nth-child(4) { width: 15%; min-width: 150px; }
        th:nth-child(5), td:nth-child(5) { width: 25%; min-width: 220px; }
        .text-highlight, mark {
            background-color: yellow !important;
            color: inherit !important;
            display: inline !important;
            padding: 0 !important;
            margin: 0 !important;
            vertical-align: baseline !important;
            border-radius: 0 !important;
        }

        .sidebar-note-item {
            cursor: pointer;
            transition: background-color 0.2s;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .sidebar-note-item:hover {
            background-color: #f0f0f0;
        }

        .note-popup textarea:focus {
            outline: none;
            border-color: #999;
        }

        #sidebar.open {
            right: 0 !important;
        }

        #main-content {
            transition: margin-right 0.3s ease;
        }

        #main-content.shifted {
            margin-right: 300px;
        }

        @media (max-width: 768px) {
            #main-content.shifted {
                margin-right: 0;
            }
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


        .options input[type="checkbox"] {
            margin-right: 10px;
        }

        /* Drag and Drop Styling from listeningSeven */
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
            box-shadow: none;
        }
        .dnd-heading:active { cursor: grabbing; }
        .dnd-heading.dragging { opacity: 0.4; }
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
            padding: 8px 12px;
            width: 200px;
            border: 1px solid Gray;
            border-radius: 6px;
            font-size: 14px;
            cursor: pointer;
            background-color: #f8f9fa;
        }

        .mcq-block {
            margin-top: 20px;
        }

        .mcq-item {
            margin-bottom: 25px;
        }

        .mcq-head {
            display: flex;
            gap: 10px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .mcq-num {
            min-width: 25px;
        }

        .mcq-options {
            padding-left: 35px;
        }

        .mcq-options label {
            display: block;
            margin-bottom: 8px;
            cursor: pointer;
            font-weight: normal;
        }

        .mcq-options input[type="radio"] {
            margin-right: 10px;
        }

        /* Drag and Drop Styling */
        .drag-drop-area {
            display: flex;
            gap: 80px;
            margin-top: 20px;
            flex-wrap: wrap;
            justify-content: flex-start;
        }

        .drag-left {
            min-width: 300px;
        }

        .drag-right {
            min-width: 250px;
        }

        .drag-q-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            gap: 15px;
        }

        .drag-q-text {
            font-weight: 500;
        }

        .drop-target {
            min-width: 150px;
            height: 35px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            background-color: #fff;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            padding: 0 10px;
            cursor: pointer;
            transition: border-color 0.2s;
        }

        .drop-target:hover {
            border-color: gray;
        }

        .drop-target.active-box {
            border-color: gray;
            outline: 0;
            /* box-shadow: 0 0 0 0.2rem rgba(0, 128, 0, 0.25); */
        }

        .drop-target.hover {
            background-color: #f0f8ff;
            border-color: gray;
        }

        .drop-target:empty:not(.active-box)::before {
            content: attr(data-placeholder);
            color: #ccc;
            pointer-events: none;
        }

        .drag-option {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            padding: 8px 15px;
            margin-bottom: 10px;
            cursor: grab;
            user-select: none;
            text-align: center;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            transition: transform 0.1s, box-shadow 0.1s;
        }

        .drag-option:active {
            cursor: grabbing;
        }

        .drag-option.dragging {
            opacity: 0.5;
            transform: scale(0.95);
        }

        .drag-option:hover {
            background-color: #e9ecef;
        }

        .drag-right h5 {
            text-align: center;
            margin-bottom: 15px;
            font-size: 1.1rem;
            color: #333;
        }

        /* Darker backdrop for start modal */
        .modal-backdrop.show {
            opacity: 0.85 !important;
            background-color: #000 !important;
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
            color: white;
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
            text-align: left;
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
        
        #startModal .student-id-input {
            padding: 14px 16px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s;
            width: 100%;
        }
        
        #startModal .student-id-input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            outline: none;
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
        
        #startModal .start-btn-premium {
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
            color: white;
        }
        
        #startModal .start-btn-premium:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
            color: white;
        }
    </style>
</head>

<body>
    <form action="{{ route('test.submit') }}" method="POST" id="testForm" spellcheck="false" autocomplete="off">
        @csrf

        @php
            $selected15_16 = array_values(array_filter([
                $answers[15] ?? null,
                $answers[16] ?? null,
            ], fn($v) => $v !== null && $v !== ''));

            $selected17_18 = array_values(array_filter([
                $answers[17] ?? null,
                $answers[18] ?? null,
            ], fn($v) => $v !== null && $v !== ''));

            $selected19_20 = array_values(array_filter([
                $answers[19] ?? null,
                $answers[20] ?? null,
            ], fn($v) => $v !== null && $v !== ''));

            $selected27_30 = [
                27 => $answers[27] ?? '',
                28 => $answers[28] ?? '',
                29 => $answers[29] ?? '',
                30 => $answers[30] ?? '',
            ];
        @endphp

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
            padding: 0;
        ">
            <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #ddd; padding: 15px; background: #fff;">
                <h4 style="margin: 0; font-size: 1.25rem; font-weight: normal; color: #333;">Notes</h4>
                <button id="closeSidebar" type="button" style="background: none; border: none; font-size: 24px; cursor: pointer; color: #666; padding: 0; line-height: 1;">&times;</button>
            </div>
            <div id="notes-container" style="padding: 10px;"></div>
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

        <div class="container-fluid px-5" style="margin-top: 70px;">
            <div class="tab-content active" id="part1" style="margin-bottom: 80px;">
                <input type="hidden" name="test_name" value="{{ $testName ?? 'listeningNine' }}">
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
                        <!-- <audio controls src="{{ asset('audio/109.MP3') }}"></audio> -->
                    </div><br>
                    <p><em>Complete the table below.</em></p>
                    <p>Write <strong>ONE WORD AND/OR A NUMBER</strong> for each answer.</p>

                    <h5 class="mt-3"><strong>HOLIDAY RENTALS</strong></h5>
                    <p>Dates: 10th-22nd July</p>

                    <div class="table-responsive mt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name of Property</th>
                                    <th>Location</th>
                                    <th>Features</th>
                                    <th>Disadvantage(s)</th>
                                    <th>Booking details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" name="q1" class="inline-input" value="{{ $answers[1] ?? '' }}" id="1" placeholder="1"></td>
                                    <td>
                                        • rural<br>
                                        • surrounded<br>
                                        by <input type="text" name="q2" class="inline-input" value="{{ $answers[2] ?? '' }}" id="2" placeholder="2">
                                    </td>
                                    <td>
                                        • apartment<br>
                                        • two bedrooms<br>
                                        • open plan
                                    </td>
                                    <td>
                                        distance<br>
                                        from <input type="text" name="q3" class="inline-input" value="{{ $answers[3] ?? '' }}" id="3" placeholder="3">
                                    </td>
                                    <td>www.<input type="text" name="q4" class="inline-input" value="{{ $answers[4] ?? '' }}" id="4" placeholder="4">.com)</td>
                                </tr>
                                <tr>
                                    <td>Kingfisher</td>
                                    <td>
                                        • rural<br>
                                        • next to<br>
                                        the <input type="text" name="q5" class="inline-input" value="{{ $answers[5] ?? '' }}" id="5" placeholder="5"><br>
                                        • nice views
                                    </td>
                                    <td>
                                        • house<br>
                                        • three bedrooms<br>
                                        • <input type="text" name="q6" class="inline-input" value="{{ $answers[6] ?? '' }}" id="6" placeholder="6"> room<br>
                                        • living room<br>
                                        • kitchen
                                    </td>
                                    <td>expensive?</td>
                                    <td>Phone the owner (01752669218)</td>
                                </tr>
                                <tr>
                                    <td>Sunnybanks</td>
                                    <td>
                                        • in a village<br>
                                        • next to<br>
                                        the <input type="text" name="q7" class="inline-input" value="{{ $answers[7] ?? '' }}" id="7" placeholder="7">
                                    </td>
                                    <td>
                                        • house<br>
                                        • has<br>
                                        private <input type="text" name="q8" class="inline-input" value="{{ $answers[8] ?? '' }}" id="8" placeholder="8">
                                    </td>
                                    <td>no <input type="text" name="q9" class="inline-input" value="{{ $answers[9] ?? '' }}" id="9" placeholder="9"></td>
                                    <td>Contact the <input type="text" name="q10" class="inline-input" value="{{ $answers[10] ?? '' }}" id="10" placeholder="10"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="tab-content" id="part2" style="margin-bottom: 80px;">
                <div class="question_part">
                    <h4>Part 2</h4>
                    <p>Questions 11–20</p>
                </div>

                <div class="mt-4">
                    <h4>Questions 11–14</h4>
                    <p>Choose the correct answer.</p>

                    <div class="mb-4">
                        <p class="mt-3"><strong>11 According to the speaker, why is it a good time for D-I-Y painting?</strong></p>
                        <div class="ms-3">
                            <label><input type="radio" name="q11" value="A" {{ ($answers[11] ?? '') == 'A' ? 'checked' : '' }} id="11"> There are better products available now.</label><br>
                            <label><input type="radio" name="q11" value="B" {{ ($answers[11] ?? '') == 'B' ? 'checked' : '' }}> Materials cost less than they used to.</label><br>
                            <label><input type="radio" name="q11" value="C" {{ ($answers[11] ?? '') == 'C' ? 'checked' : '' }}> People have more free time than before.</label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <p class="mt-3"><strong>12 What happened in 2009 in the UK?</strong></p>
                        <div class="ms-3">
                            <label><input type="radio" name="q12" value="A" {{ ($answers[12] ?? '') == 'A' ? 'checked' : '' }} id="12"> A record volume of paint was sold.</label><br>
                            <label><input type="radio" name="q12" value="B" {{ ($answers[12] ?? '') == 'B' ? 'checked' : '' }}> A large amount of paint was wasted.</label><br>
                            <label><input type="radio" name="q12" value="C" {{ ($answers[12] ?? '') == 'C' ? 'checked' : '' }}> There was a major project to repaint public buildings.</label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <p class="mt-3"><strong>13 What does the speaker say about paint quantity?</strong></p>
                        <div class="ms-3">
                            <label><input type="radio" name="q13" value="A" {{ ($answers[13] ?? '') == 'A' ? 'checked' : '' }} id="13"> It's necessary to have exact room measurements.</label><br>
                            <label><input type="radio" name="q13" value="B" {{ ($answers[13] ?? '') == 'B' ? 'checked' : '' }}> It's better to overestimate than to underestimate.</label><br>
                            <label><input type="radio" name="q13" value="C" {{ ($answers[13] ?? '') == 'C' ? 'checked' : '' }}> An automatic calculator can be downloaded from the Internet.</label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <p class="mt-3"><strong>14 What does Community RePaint do?</strong></p>
                        <div class="ms-3">
                            <label><input type="radio" name="q14" value="A" {{ ($answers[14] ?? '') == 'A' ? 'checked' : '' }} id="14"> It paints people's houses without payment.</label><br>
                            <label><input type="radio" name="q14" value="B" {{ ($answers[14] ?? '') == 'B' ? 'checked' : '' }}> It collects unwanted paint and gives it away.</label><br>
                            <label><input type="radio" name="q14" value="C" {{ ($answers[14] ?? '') == 'C' ? 'checked' : '' }}> It sells unused paint and donates the money to charity.</label>
                        </div>
                    </div>

                    <hr class="my-4">

                    <h4 id="15">Questions 15–16</h4>
                    <p>Choose <strong>TWO</strong> answers </p>
                    <p>What TWO pieces of advice does the speaker give about paint?</p>

                    <div class="ms-3 mb-4">
                        <ul class="options" data-range="15-16">
                            @php
                                $options15_16 = [
                                    'A' => "Don't buy expensive paint.",
                                    'B' => "Test the colour before buying a lot.",
                                    'C' => "Choose a light colour.",
                                    'D' => "Use water-based paint.",
                                    'E' => "Buy enough paint for more than one application."
                                ];
                            @endphp
                            @foreach($options15_16 as $val => $text)
                                <li>
                                    <label>
                                        <input type="checkbox" name="q15-16[]" value="{{ $val }}" 
                                            {{ in_array($val, array_filter([$answers[15] ?? null, $answers[16] ?? null]), true) ? 'checked' : '' }}> 
                                        {{ $text }}
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <hr class="my-4">

                    <h4 id="17">Questions 17–18</h4>
                
                    <p>Choose <strong>TWO</strong> answers.</p>
                    <p>What TWO pieces of advice does the speaker give about preparation?</p>

                    <div class="ms-3 mb-4">
                        <ul class="options" data-range="17-18">
                            @php
                                $options17_18 = [
                                    'A' => "Replace any loose plaster.",
                                    'B' => "Don't spend too long preparing surfaces.",
                                    'C' => "Use decorators' soap to remove grease from walls.",
                                    'D' => "Wash dirty walls with warm water.",
                                    'E' => "Paint over cracks and small holes."
                                ];
                            @endphp
                            @foreach($options17_18 as $val => $text)
                                <li>
                                    <label>
                                        <input type="checkbox" name="q17-18[]" value="{{ $val }}" 
                                            {{ in_array($val, array_filter([$answers[17] ?? null, $answers[18] ?? null]), true) ? 'checked' : '' }}> 
                                        {{ $text }}
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <hr class="my-4">

                    <h4 id="19">Questions 19–20</h4>
                    <p>Choose <strong>TWO</strong> answers, 
                    <p>What TWO pieces of advice does the speaker give about painting?</p>

                    <div class="ms-3 mb-4">
                        <ul class="options" data-range="19-20">
                            @php
                                $options19_20 = [
                                    'A' => "Put a heater in the room.",
                                    'B' => "Wash brushes in cold water.",
                                    'C' => "Use a roller with a short pile.",
                                    'D' => "Apply paint directly from the tin.",
                                    'E' => "Open doors and windows."
                                ];
                            @endphp
                            @foreach($options19_20 as $val => $text)
                                <li>
                                    <label>
                                        <input type="checkbox" name="q19-20[]" value="{{ $val }}" 
                                            {{ in_array($val, array_filter([$answers[19] ?? null, $answers[20] ?? null]), true) ? 'checked' : '' }}> 
                                        {{ $text }}
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tab-content" id="part3" style="margin-bottom: 80px;">
                <div class="question_part">
                    <h4>Part 3</h4>
                    <p>Questions 21–30</p>
                </div>

                <div class="mt-4">
                    <h4>Questions 21–26</h4>
                    <p>Choose the correct answer.</p>

                    <div class="mcq-block">
                        <div class="mcq-item">
                            <div class="mcq-head">
                                <div class="mcq-num">21</div>
                                <div class="mcq-q">Why is Matthew considering a student work placement?</div>
                            </div>
                            <div class="mcq-options">
                                <label><input type="radio" name="q21" value="A" {{ ($answers[21] ?? '') == 'A' ? 'checked' : '' }} id="21"> He was informed about an interesting vacancy.</label>
                                <label><input type="radio" name="q21" value="B" {{ ($answers[21] ?? '') == 'B' ? 'checked' : '' }}> He needs some extra income.</label>
                                <label><input type="radio" name="q21" value="C" {{ ($answers[21] ?? '') == 'C' ? 'checked' : '' }}> He wants to try out a career option.</label>
                            </div>
                        </div>

                        <div class="mcq-item">
                            <div class="mcq-head">
                                <div class="mcq-num">22</div>
                                <div class="mcq-q">Which part of the application process did Linda find most interesting?</div>
                            </div>
                            <div class="mcq-options">
                                <label><input type="radio" name="q22" value="A" {{ ($answers[22] ?? '') == 'A' ? 'checked' : '' }} id="22"> The psychometric test.</label>
                                <label><input type="radio" name="q22" value="B" {{ ($answers[22] ?? '') == 'B' ? 'checked' : '' }}> The group activity.</label>
                                <label><input type="radio" name="q22" value="C" {{ ($answers[22] ?? '') == 'C' ? 'checked' : '' }}> The individual task.</label>
                            </div>
                        </div>

                        <div class="mcq-item">
                            <div class="mcq-head">
                                <div class="mcq-num">23</div>
                                <div class="mcq-q">During her work placement, Linda helped find ways to</div>
                            </div>
                            <div class="mcq-options">
                                <label><input type="radio" name="q23" value="A" {{ ($answers[23] ?? '') == 'A' ? 'checked' : '' }} id="23"> speed up car assembly.</label>
                                <label><input type="radio" name="q23" value="B" {{ ($answers[23] ?? '') == 'B' ? 'checked' : '' }}> process waste materials.</label>
                                <label><input type="radio" name="q23" value="C" {{ ($answers[23] ?? '') == 'C' ? 'checked' : '' }}> calculate the cost of design faults.</label>
                            </div>
                        </div>

                        <div class="mcq-item">
                            <div class="mcq-head">
                                <div class="mcq-num">24</div>
                                <div class="mcq-q">Why did Linda find her work placement tiring?</div>
                            </div>
                            <div class="mcq-options">
                                <label><input type="radio" name="q24" value="A" {{ ($answers[24] ?? '') == 'A' ? 'checked' : '' }} id="24"> She wasn't used to full-time work.</label>
                                <label><input type="radio" name="q24" value="B" {{ ($answers[24] ?? '') == 'B' ? 'checked' : '' }}> The working hours were very long.</label>
                                <label><input type="radio" name="q24" value="C" {{ ($answers[24] ?? '') == 'C' ? 'checked' : '' }}> She felt she had to prove her worth.</label>
                            </div>
                        </div>

                        <div class="mcq-item">
                            <div class="mcq-head">
                                <div class="mcq-num">25</div>
                                <div class="mcq-q">What did Linda's employers give her formal feedback on?</div>
                            </div>
                            <div class="mcq-options">
                                <label><input type="radio" name="q25" value="A" {{ ($answers[25] ?? '') == 'A' ? 'checked' : '' }} id="25"> engineering ability</label>
                                <label><input type="radio" name="q25" value="B" {{ ($answers[25] ?? '') == 'B' ? 'checked' : '' }}> organisational skills</label>
                                <label><input type="radio" name="q25" value="C" {{ ($answers[25] ?? '') == 'C' ? 'checked' : '' }}> team working</label>
                            </div>
                        </div>

                        <div class="mcq-item">
                            <div class="mcq-head">
                                <div class="mcq-num">26</div>
                                <div class="mcq-q">What was the main benefit of Linda's work placement?</div>
                            </div>
                            <div class="mcq-options">
                                <label><input type="radio" name="q26" value="A" {{ ($answers[26] ?? '') == 'A' ? 'checked' : '' }} id="26"> Improved academic skills.</label>
                                <label><input type="radio" name="q26" value="B" {{ ($answers[26] ?? '') == 'B' ? 'checked' : '' }}> An offer of work.</label>
                                <label><input type="radio" name="q26" value="C" {{ ($answers[26] ?? '') == 'C' ? 'checked' : '' }}> The opportunity to use new software.</label>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <h4>Questions 27–30</h4>
                    <p>What does Linda think about the books on Mathew's reading list? Choose the correct answer and move it into the gap.</p>

                    <div class="row">
                        <!-- Column 1 -->
                        <div class="col-md-6 question_site">
                            <h5 class="mb-3"><strong>Books</strong></h5>
                            
                            <p style="display:flex; align-items:center; gap:10px; margin-bottom:15px;">
                                 The Science of Materials 
                                <input type="text" class="dnd-drop-input" id="27" data-question="q27" placeholder="27" readonly style="padding:5px; width:200px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer;">
                            </p>
                            <p style="display:flex; align-items:center; gap:10px; margin-bottom:15px;">
                                 Materials Engineering 
                                <input type="text" class="dnd-drop-input" id="28" data-question="q28" placeholder="28" readonly style="padding:5px; width:200px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer;">
                            </p>
                            <p style="display:flex; align-items:center; gap:10px; margin-bottom:15px;">
                                 Engineering Basics 
                                <input type="text" class="dnd-drop-input" id="29" data-question="q29" placeholder="29" readonly style="padding:5px; width:200px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer;">
                            </p>
                            <p style="display:flex; align-items:center; gap:10px; margin-bottom:15px;">
                                 Evolution of Materials 
                                <input type="text" class="dnd-drop-input" id="30" data-question="q30" placeholder="30" readonly style="padding:5px; width:200px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer;">
                            </p>

                            <div style="display:none;">
                                <input type="text" name="q27" id="hidden_q27" value="{{ $answers[27] ?? '' }}">
                                <input type="text" name="q28" id="hidden_q28" value="{{ $answers[28] ?? '' }}">
                                <input type="text" name="q29" id="hidden_q29" value="{{ $answers[29] ?? '' }}">
                                <input type="text" name="q30" id="hidden_q30" value="{{ $answers[30] ?? '' }}">
                            </div>
                        </div>
                        <!-- Column 2 -->
                        <div class="col-md-6 question_site" style="min-height: 380px;">
                            <h5 class="mb-3"><strong>Opinions</strong></h5>
                            <div id="dnd-headings-list" class="d-flex flex-column">
                                <div class="dnd-heading" draggable="true" data-value="helpful illustrations" data-content="helpful illustrations">helpful illustrations</div>
                                <div class="dnd-heading" draggable="true" data-value="easy to understand" data-content="easy to understand">easy to understand</div>
                                <div class="dnd-heading" draggable="true" data-value="up-to-date" data-content="up-to-date">up-to-date</div>
                                <div class="dnd-heading" draggable="true" data-value="comprehensive" data-content="comprehensive">comprehensive</div>
                                <div class="dnd-heading" draggable="true" data-value="specialised" data-content="specialised">specialised</div>
                                <div class="dnd-heading" draggable="true" data-value="useful case studies" data-content="useful case studies">useful case studies</div>
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
                    <h4>Questions 31–40</h4>
                    <p><em>Complete the notes below.</em></p>
                    <p>Write <strong>NO MORE THAN TWO WORDS</strong> for each answer.</p>

                    <h5 class="mt-3"><strong>Researching the origin of medieval manuscripts</strong></h5>
                    
                    <p class="mt-3"><strong>Background</strong></p>
                    <ul>
                        <li>Medieval manuscripts - handwritten books produced between the fifth and fifteenth centuries</li>
                        <li>Origin of many manuscripts unknown until 2009: scientists started using DNA testing</li>
                    </ul>

                    <p class="mt-3"><strong>Animal hides - two types</strong></p>
                    <p><strong>Parchment</strong></p>
                    <p>Sheep skin: white in colour and <input type="text" name="q31" class="inline-input" value="{{ $answers[31] ?? '' }}" id="31" placeholder="31"></p>
                    <p>Greasy - writing can't be erased so often used for <input type="text" name="q32" class="inline-input" value="{{ $answers[32] ?? '' }}" id="32" placeholder="32"></p>
                    <p><strong>Vellum</strong></p>
                    <p>Calf skin: most popular for prestigious work because you can get <input type="text" name="q33" class="inline-input" value="{{ $answers[33] ?? '' }}" id="33" placeholder="33"> lettering.</p>

                    <p class="mt-3"><strong>Preparation of hides</strong></p>
                    <ul>
                        <li>Treated in barrels of lime - where this was not available, skins were <input type="text" name="q34" class="inline-input" value="{{ $answers[34] ?? '' }}" id="34" placeholder="34"> (removed hair -> more flexible)</li>
                        <li>Stretched tight on a frame</li>
                        <li>Scraped to create same <input type="text" name="q35" class="inline-input" value="{{ $answers[35] ?? '' }}" id="35" placeholder="35"></li>
                        <li>Vellum was <input type="text" name="q36" class="inline-input" value="{{ $answers[36] ?? '' }}" id="36" placeholder="36"></li>
                    </ul>

                    <p class="mt-3"><strong>Genetic testing - finding origins</strong></p>
                    <p>Previously - analysed handwriting and <input type="text" name="q37" class="inline-input" value="{{ $answers[37] ?? '' }}" id="37" placeholder="37"> used by the writer</p>
                    <p>Now - using genetic data from 'known manuscripts' to create a <input type="text" name="q38" class="inline-input" value="{{ $answers[38] ?? '' }}" id="38" placeholder="38"></p>

                    <p class="mt-3"><strong>Uses of New Data</strong></p>
                    <p>Gives information on individual books</p>
                    <p>Shows the <input type="text" name="q39" class="inline-input" value="{{ $answers[39] ?? '' }}" id="39" placeholder="39"> of the book industry</p>
                    <p>Helps define <input type="text" name="q40" class="inline-input" value="{{ $answers[40] ?? '' }}" id="40" placeholder="40"> in medieval period</p>
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
                        <label for="student_id_input" class="form-label">Student ID</label>
                        <input type="text" id="student_id_input" class="student-id-input" placeholder="Enter your Student ID">
                        <small id="studentIdError">⚠️ Student ID must be at least 8 characters</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="startTestButton" type="button" class="btn start-btn-premium">START TEST</button>
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
            const specificAudio = new Audio('{{ asset("audio/109.MP3") }}');
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

            // Focus Student ID input when modal shows
            document.getElementById('startModal').addEventListener('shown.bs.modal', function () {
                document.getElementById('student_id_input').focus();
            });

            // Start test: play audio and start timer when START TEST button is clicked
            startButton.addEventListener('click', function(e) {
                // Get and validate Student ID
                const studentIdInput = document.getElementById('student_id_input');
                const studentIdError = document.getElementById('studentIdError');
                const studentId = studentIdInput.value.trim();
                
                const isValidStudentId = /^[a-zA-Z0-9]{8,}$/.test(studentId);
                
                if (!isValidStudentId) {
                    // Prevent closing modal
                    e.preventDefault();
                    e.stopPropagation();
                    
                    studentIdError.textContent = '⚠️ Student ID must be at least 8 characters';
                    studentIdError.style.display = 'block';
                    studentIdInput.style.borderColor = '#dc3545';
                    return;
                }

                // If valid, Proceed
                console.log('Student ID entered:', studentId);
                
                // Store Student ID in sessionStorage and hidden input
                sessionStorage.setItem('examStudentId', studentId);
                document.getElementById('examStudentIdField').value = studentId;
                
                // Hide error
                studentIdError.style.display = 'none';
                studentIdInput.style.borderColor = '#e0e0e0';
                
                // Close modal manually
                const modalInstance = bootstrap.Modal.getInstance(document.getElementById('startModal'));
                if (modalInstance) modalInstance.hide();

                // Request fullscreen mode
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

            // Handle Enter key in student ID input
            document.getElementById('student_id_input').addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    startButton.click();
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
                
                const form = document.getElementById('testForm');
                
                // Remove existing hidden order inputs
                form.querySelectorAll('.checkbox-order-input').forEach(input => input.remove());
                
                // Add hidden inputs to maintain checkbox order
                checkboxOrder.forEach((orderedValues, groupName) => {
                    if (orderedValues.length > 0 && (groupName === 'q15-16[]' || groupName === 'q17-18[]' || groupName === 'q19-20[]')) {
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

        function updateAnsweredStatus() {
            document.querySelectorAll('.question-link').forEach(link => {
                const qNum = link.getAttribute('data-question');
                let isAnswered = false;
                
                // Check common inputs
                const input = document.getElementById(qNum) || document.querySelector(`input[name="q${qNum}"]`);
                if (input) {
                    if (input.type === 'checkbox' || input.type === 'radio') {
                        isAnswered = document.querySelector(`input[name="${input.name}"]:checked`) !== null;
                    } else {
                        isAnswered = input.value.trim() !== '';
                    }
                }
                
                // Check hidden inputs for DND/Checkbox groups
                if (!isAnswered) {
                    const hidden = document.getElementById(`q${qNum}`) || document.getElementById(`hidden_q${qNum}`);
                    if (hidden && hidden.value.trim() !== '') isAnswered = true;
                    
                    // Precise group check to avoid incorrect matches (e.g., q1 matching q10)
                    const inputs = Array.from(document.querySelectorAll('input[type="checkbox"], input[type="radio"]'));
                    const inGroup = inputs.filter(i => {
                        const name = i.name.replace('q', '').replace('[]', '');
                        return name.split('-').includes(qNum);
                    });
                    if (inGroup.some(i => i.checked)) isAnswered = true;
                }

                if (isAnswered) {
                    link.classList.add('answered');
                } else {
                    link.classList.remove('answered');
                }
            });
        }

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
            checkbox.addEventListener('change', function() {
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
            autosaveDebounceTimer = setTimeout(function() {
                flushDirtyInputs();
            }, 10000);
        }

        // Attach change listeners to all inputs
        document.querySelectorAll('input[type="radio"], input[type="text"], input[type="checkbox"]').forEach(input => {
            input.addEventListener('change', function() {
                updateAnsweredStatus();
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

        // Placeholder behavior: clear on focus, restore on blur if empty
        document.querySelectorAll('input[type="text"]').forEach(input => {
            const originalPlaceholder = input.placeholder;
            input.addEventListener('focus', function() {
                input.placeholder = '';
            });
            input.addEventListener('blur', function() {
                input.placeholder = originalPlaceholder;
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

                // Update active-box for DND
                document.querySelectorAll('.drop-target').forEach(dt => dt.classList.remove('active-box'));
                const dropTarget = document.querySelector(`.drop-target[data-q="${qNum}"]`);
                if (dropTarget) {
                    dropTarget.classList.add('active-box');
                }

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
            document.querySelectorAll('input[type="text"], input[type="checkbox"], input[type="radio"], .dnd-drop-input').forEach(input => {
                input.addEventListener('focus', function() {
                    let questionNum = this.getAttribute('data-question')?.replace('q', '') || this.id || this.name?.replace('q', '').replace('[]', '');
                    
                    if (this.type === 'checkbox' && this.name?.includes('[]')) {
                        const optionList = this.closest('.options');
                        if (optionList) {
                            const range = optionList.getAttribute('data-range');
                            if (range) {
                                const [start, end] = range.split('-').map(Number);
                                const checkedCount = optionList.querySelectorAll('input[type="checkbox"]:checked').length;
                                const shift = this.checked ? Math.max(0, checkedCount - 1) : Math.min(checkedCount, end - start);
                                questionNum = String(start + Math.min(shift, end - start));
                            }
                        }
                    }

                    const linkIndex = allLinks.findIndex(link => link.getAttribute('data-question') === questionNum);
                    if (linkIndex !== -1) {
                        currentIndex = linkIndex;
                        allLinks.forEach(link => link.classList.remove('active'));
                        allLinks[linkIndex].classList.add('active');
                        activateTabForQuestion(questionNum);
                    }
                });

                if (this.type === 'checkbox' && this.name?.includes('[]')) {
                    this.addEventListener('change', function() {
                        const optionList = this.closest('.options');
                        if (optionList) {
                            const range = optionList.getAttribute('data-range');
                            if (range) {
                                const [start, end] = range.split('-').map(Number);
                                const checkedCount = optionList.querySelectorAll('input[type="checkbox"]:checked').length;
                                const targetQ = String(start + Math.min(Math.max(0, checkedCount - 1), end - start));
                                const linkIndex = allLinks.findIndex(link => link.getAttribute('data-question') === targetQ);
                                if (linkIndex !== -1) {
                                    currentIndex = linkIndex;
                                    allLinks.forEach(link => link.classList.remove('active'));
                                    allLinks[linkIndex].classList.add('active');
                                    activateTabForQuestion(targetQ);
                                }
                            }
                        }
                    });
                }
            });

            // Drag and Drop JavaScript for New DND format (from listeningSeven)
            let draggedValue = null;
            let draggedContent = null;

            document.querySelectorAll('.dnd-heading').forEach(heading => {
                heading.addEventListener('dragstart', function(e) {
                    draggedValue = this.getAttribute('data-value');
                    draggedContent = this.innerText;
                    this.classList.add('dragging');
                });

                heading.addEventListener('dragend', function() {
                    this.classList.remove('dragging');
                });
            });

            document.querySelectorAll('.dnd-drop-input').forEach(input => {
                input.addEventListener('dragover', function(e) {
                    e.preventDefault();
                });

                input.addEventListener('drop', function(e) {
                    e.preventDefault();
                    if (draggedValue) {
                        this.value = draggedContent;
                        const questionNum = this.getAttribute('data-question') || this.id;
                        const hiddenInput = document.getElementById(`hidden_q${questionNum}`);
                        if (hiddenInput) {
                            hiddenInput.value = draggedValue;
                            const event = new Event('change', { bubbles: true });
                            hiddenInput.dispatchEvent(event);
                        }

                        // Focus the question in nav
                        const qNum = questionNum.replace('q', '');
                        const linkIndex = allLinks.findIndex(link => link.getAttribute('data-question') === qNum);
                        if (linkIndex !== -1) {
                            currentIndex = linkIndex;
                            allLinks.forEach(link => link.classList.remove('active'));
                            allLinks[linkIndex].classList.add('active');
                            activateTabForQuestion(qNum);
                        }
                    }
                });

                // Clear on click
                input.addEventListener('click', function() {
                    if (this.value !== '') {
                        this.value = '';
                        const questionNum = this.getAttribute('data-question') || this.id;
                        const hiddenInput = document.getElementById(`hidden_q${questionNum}`);
                        if (hiddenInput) {
                            hiddenInput.value = '';
                            const event = new Event('change', { bubbles: true });
                            hiddenInput.dispatchEvent(event);
                        }
                    }
                });
            });

            // Mouse-based Drag and Drop for Q27-30 (from listeningSeven)
            var dndDraggedEl = null;
            var dndGhost = null;
            var dndSourceInput = null;

            // Remove native draggable from headings
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
                var content = headingEl.getAttribute('data-content');
                var text = headingEl.textContent;
                var qName = dropInput.getAttribute('data-question');

                // If input already has a value, restore the old heading back to list
                var oldVal = dropInput.getAttribute('data-placed-value');
                if (oldVal) {
                    var oldH = document.querySelector('.dnd-heading[data-value="' + oldVal + '"]');
                    if (oldH) {
                        oldH.classList.remove('used');
                        oldH.style.visibility = 'visible';
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
                headingEl.style.visibility = 'hidden';

                // Sync hidden input
                var hidden = document.querySelector('input[name="' + qName + '"]');
                if (hidden) {
                    hidden.value = content;
                    hidden.dispatchEvent(new Event('change'));
                }
                
                dropInput.focus();
                dropInput.dispatchEvent(new Event('focus'));
            }

            // Clear drop input on double-click
            document.querySelectorAll('.dnd-drop-input').forEach(function(dropInput) {
                dropInput.addEventListener('dblclick', function() {
                    var oldVal = dropInput.getAttribute('data-placed-value');
                    if (oldVal) {
                        var h = document.querySelector('.dnd-heading[data-value="' + oldVal + '"]');
                        if (h) {
                            h.classList.remove('used');
                            h.style.visibility = 'visible';
                        }
                    }
                    dropInput.value = '';
                    dropInput.removeAttribute('data-placed-value');
                    dropInput.style.width = '200px';
                    dropInput.style.border = '1px solid #ccc';
                    dropInput.style.boxShadow = 'none';
                    var qName = dropInput.getAttribute('data-question');
                    var hidden = document.querySelector('input[name="' + qName + '"]');
                    if (hidden) {
                        hidden.value = '';
                        hidden.dispatchEvent(new Event('change'));
                    }
                    
                    dropInput.focus();
                    dropInput.dispatchEvent(new Event('focus'));
                });
            });

            // Start drag from right side heading list
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

            // Start drag from a filled drop input
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
                e.preventDefault();
                dndGhost.style.left = e.clientX + 'px';
                dndGhost.style.top = e.clientY - 15 + 'px';

                // Highlight drop inputs on hover
                document.querySelectorAll('.dnd-drop-input').forEach(function(inp) {
                    var rect = inp.getBoundingClientRect();
                    if (e.clientX >= rect.left && e.clientX <= rect.right && e.clientY >= rect.top && e.clientY <= rect.bottom) {
                        inp.style.borderColor = '#2980b9';
                        inp.style.background = '#ebf5fb';
                    } else {
                        inp.style.borderColor = '#ccc';
                        inp.style.background = 'transparent';
                    }
                });
            });

            document.addEventListener('mouseup', function(e) {
                if (!dndGhost || !dndDraggedEl) return;

                // Find if mouse is over a drop input
                var droppedOnInput = null;
                document.querySelectorAll('.dnd-drop-input').forEach(function(inp) {
                    var rect = inp.getBoundingClientRect();
                    if (e.clientX >= rect.left && e.clientX <= rect.right && e.clientY >= rect.top && e.clientY <= rect.bottom) {
                        droppedOnInput = inp;
                    }
                    inp.style.borderColor = '#ccc';
                    inp.style.background = 'transparent';
                });

                if (droppedOnInput) {
                    // Dropped onto an input
                    if (dndSourceInput && dndSourceInput !== droppedOnInput) {
                        // Dragging from one input to another
                        dndSourceInput.value = '';
                        dndSourceInput.removeAttribute('data-placed-value');
                        dndSourceInput.style.width = '200px';
                        dndSourceInput.style.border = '1px solid #ccc';
                        dndSourceInput.style.boxShadow = 'none';
                        var qNameOld = dndSourceInput.getAttribute('data-question');
                        var hiddenOld = document.querySelector('input[name="' + qNameOld + '"]');
                        if (hiddenOld) {
                            hiddenOld.value = '';
                            hiddenOld.dispatchEvent(new Event('change'));
                        }
                    }
                    dndPlaceHeading(droppedOnInput, dndDraggedEl);
                } else {
                    // Dropped outside
                    if (dndSourceInput) {
                        // Return to list
                        var placedVal = dndSourceInput.getAttribute('data-placed-value');
                        if (placedVal) {
                            var h = document.querySelector('.dnd-heading[data-value="' + placedVal + '"]');
                            if (h) {
                                h.classList.remove('used');
                                h.style.visibility = 'visible';
                            }
                        }
                        dndSourceInput.value = '';
                        dndSourceInput.removeAttribute('data-placed-value');
                        dndSourceInput.style.width = '200px';
                        dndSourceInput.style.border = '1px solid #ccc';
                        dndSourceInput.style.boxShadow = 'none';
                        var qNameOld = dndSourceInput.getAttribute('data-question');
                        var hiddenOld = document.querySelector('input[name="' + qNameOld + '"]');
                        if (hiddenOld) {
                            hiddenOld.value = '';
                            hiddenOld.dispatchEvent(new Event('change'));
                        }
                        
                        dndSourceInput.focus();
                        dndSourceInput.dispatchEvent(new Event('focus'));
                    }
                }

                document.body.removeChild(dndGhost);
                dndGhost = null;
                dndDraggedEl.classList.remove('dragging');
                dndDraggedEl = null;
                dndSourceInput = null;
            });

            // Pre-fill logic for previously saved answers on page load
            ['27', '28', '29', '30'].forEach(function(q) {
                var hidden = document.querySelector('input[name="q' + q + '"]');
                if (!hidden) return;
                var val = (hidden.value || '').trim();
                if (!val) return;
                
                var heading = document.querySelector('.dnd-heading[data-content="' + val + '"]');
                var dropInput = document.querySelector('.dnd-drop-input[data-question="q' + q + '"]');
                
                if (heading && dropInput) {
                    dndPlaceHeading(dropInput, heading);
                } else if (dropInput && val) {
                    dropInput.value = val;
                }
            });

            setActiveQuestion(0);
        })();
    </script>

    <!-- sidebar js code  -->
    <script>
        // Global-ish scope for sidebar functions so other scripts can access them
        let openSidebar, closeSidebarFunc;

        document.addEventListener('DOMContentLoaded', () => {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');
            const noteToggle = document.getElementById('noteToggle');
            const closeSidebar = document.getElementById('closeSidebar');

            openSidebar = function() {
                sidebar.classList.add('open');
                if (mainContent) mainContent.classList.add('shifted');
            }

            closeSidebarFunc = function() {
                sidebar.classList.remove('open');
                if (mainContent) mainContent.classList.remove('shifted');
            }

            if (noteToggle) {
                noteToggle.addEventListener('click', () => {
                    if (sidebar && sidebar.classList.contains('open')) {
                        closeSidebarFunc();
                    } else if (openSidebar) {
                        openSidebar();
                    }
                });
            }

            if (closeSidebar) {
                closeSidebar.addEventListener('click', closeSidebarFunc);
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
        const toggleSidebar = document.getElementById('toggleSidebar');

        // Ensure toggleSidebar button also works with the same logic
        if (toggleSidebar) {
            toggleSidebar.addEventListener('click', function() {
                if (sidebar.classList.contains('open')) {
                    closeSidebarFunc();
                } else {
                    openSidebar();
                }
            });
        }

         // Helper function for non-destructive highlighting
        function highlightRange(range) {
            if (!range) return [];
            
            const createdMarks = [];
            const fragment = range.cloneContents();
            const selectedText = range.toString();
            
            if (!selectedText.trim()) return [];
            
            // Get all text nodes in the range
            const startNode = range.startContainer;
            const endNode = range.endContainer;
            
            // Simple case: selection within a single text node
            if (startNode === endNode && startNode.nodeType === Node.TEXT_NODE) {
                const parent = startNode.parentNode;
                
                // Skip if already highlighted
                if (parent.classList && parent.classList.contains('text-highlight')) {
                    return [];
                }
                
                const fullText = startNode.textContent;
                const start = range.startOffset;
                const end = range.endOffset;
                
                const beforeText = fullText.substring(0, start);
                const highlightText = fullText.substring(start, end);
                const afterText = fullText.substring(end);
                
                const highlight = document.createElement('span');
                highlight.className = 'text-highlight';
                highlight.textContent = highlightText;
                
                // Replace the text node with the three parts
                const beforeNode = beforeText ? document.createTextNode(beforeText) : null;
                const afterNode = afterText ? document.createTextNode(afterText) : null;
                
                if (beforeNode) parent.insertBefore(beforeNode, startNode);
                parent.insertBefore(highlight, startNode);
                if (afterNode) parent.insertBefore(afterNode, startNode);
                parent.removeChild(startNode);
                
                createdMarks.push(highlight);
                return createdMarks;
            }
            
            // Complex case: selection spans multiple nodes
            const walker = document.createTreeWalker(
                range.commonAncestorContainer,
                NodeFilter.SHOW_TEXT,
                {
                    acceptNode: function(node) {
                        if (!node.textContent.trim()) return NodeFilter.FILTER_REJECT;
                        const parent = node.parentNode;
                        if (['TABLE', 'THEAD', 'TBODY', 'TR'].includes(parent?.tagName)) {
                            return NodeFilter.FILTER_REJECT;
                        }
                        if (parent?.classList?.contains('text-highlight')) {
                            return NodeFilter.FILTER_REJECT;
                        }
                        return range.intersectsNode(node) ? NodeFilter.FILTER_ACCEPT : NodeFilter.FILTER_REJECT;
                    }
                }
            );

            const nodes = [];
            while (walker.nextNode()) {
                nodes.push(walker.currentNode);
            }

            nodes.forEach(node => {
                const parent = node.parentNode;
                if (!parent) return;
                
                const isStart = (node === range.startContainer);
                const isEnd = (node === range.endContainer);
                
                const start = isStart ? range.startOffset : 0;
                const end = isEnd ? range.endOffset : node.textContent.length;
                
                if (start >= end) return;
                
                const fullText = node.textContent;
                const beforeText = fullText.substring(0, start);
                const highlightText = fullText.substring(start, end);
                const afterText = fullText.substring(end);
                
                const highlight = document.createElement('span');
                highlight.className = 'text-highlight';
                highlight.textContent = highlightText;
                
                if (beforeText) parent.insertBefore(document.createTextNode(beforeText), node);
                parent.insertBefore(highlight, node);
                if (afterText) parent.insertBefore(document.createTextNode(afterText), node);
                parent.removeChild(node);
                
                createdMarks.push(highlight);
            });
            
            return createdMarks;
        }

        // Context menu on right-click
        document.addEventListener('contextmenu', function(e) {
            const selection = window.getSelection();
            clickedMark = null;
            
            let target = e.target;
            while (target && !target.classList?.contains('text-highlight') && target.parentNode) {
                target = target.parentNode;
                if (target.classList?.contains('text-highlight')) break;
            }
            
            if (target && target.classList?.contains('text-highlight')) {
                clickedMark = target;
            }
            
            if (selection.toString().trim() !== '' || clickedMark) {
                e.preventDefault();
                selectedText = selection.toString().trim();
                selectionRange = clickedMark ? null : (selection.rangeCount > 0 ? selection.getRangeAt(0).cloneRange() : null);
                contextMenu.style.left = e.pageX + 'px';
                contextMenu.style.top = e.pageY + 'px';
                contextMenu.style.display = 'block';
            } else {
                contextMenu.style.display = 'none';
            }
        });

        // Hide context menu on click elsewhere
        document.addEventListener('click', function(e) {
            if (!contextMenu.contains(e.target)) {
                contextMenu.style.display = 'none';
            }
        });

        // Highlight only
        highlightOption.addEventListener('click', function() {
            if (selectionRange) {
                const createdMarks = highlightRange(selectionRange);
                const markId = Date.now();
                createdMarks.forEach(m => m.dataset.markId = markId);
                window.getSelection().removeAllRanges();
            }
            contextMenu.style.display = 'none';
        });

        // Add note with popup
        notesOption.addEventListener('click', function() {
            if (clickedMark) {
                showNotePopup(clickedMark);
                contextMenu.style.display = 'none';
                return;
            }
            
            if (selectionRange) {
                const createdMarks = highlightRange(selectionRange);
                if (createdMarks.length > 0) {
                    const markId = Date.now();
                    createdMarks.forEach(m => {
                        m.dataset.markId = markId;
                    });

                    // Use captured selectedText or fallback to reconstructing from marks
                    const fullSelectedText = selectedText || window.getSelection().toString().trim() || createdMarks.map(m => m.innerText).join(' ');
                    
                    createdMarks.forEach(m => {
                        m.dataset.fullText = fullSelectedText;
                        m.setAttribute('data-note', '');
                        m.addEventListener('click', function(e) {
                            e.stopPropagation();
                            showNotePopup(m);
                        });
                    });

                    const noteDiv = document.createElement('div');
                    noteDiv.classList.add('sidebar-note-item');
                    noteDiv.dataset.markId = markId;
                    noteDiv.style.borderBottom = '1px solid #ddd';
                    noteDiv.style.padding = '12px 10px';
                    noteDiv.style.cursor = 'pointer';
                    noteDiv.style.backgroundColor = '#fff';
                    
                    noteDiv.innerHTML = `
                        <div style="margin-bottom: 2px; font-weight: normal; font-size: 0.95rem; color: #333; line-height: 1.4;">${fullSelectedText}</div>
                        <div class="sidebar-note-content" style="color: #666; font-size: 0.85rem; white-space: pre-wrap;"></div>
                    `;
                    
                    const notesContainer = document.getElementById('notes-container') || sidebar;
                    notesContainer.appendChild(noteDiv);
                    noteDiv.addEventListener('click', () => showNotePopup(createdMarks[0]));
                    
                    showNotePopup(createdMarks[0]);
                }
                window.getSelection().removeAllRanges();
            }
            contextMenu.style.display = 'none';
        });

        // Clear single highlight
        clearOption.addEventListener('click', function() {
            if (clickedMark) {
                const markId = clickedMark.dataset.markId;
                if (markId) {
                    document.querySelectorAll(`.sidebar-note-item[data-mark-id="${markId}"]`).forEach(el => el.remove());
                    document.querySelectorAll(`.text-highlight[data-mark-id="${markId}"]`).forEach(el => {
                        el.replaceWith(document.createTextNode(el.innerText));
                    });
                } else {
                    clickedMark.replaceWith(document.createTextNode(clickedMark.innerText));
                }
                clickedMark = null;
            }
            contextMenu.style.display = 'none';
        });

        // Clear all highlights and notes
        allClearOption.addEventListener('click', function() {
            document.querySelectorAll('.text-highlight').forEach(el => {
                el.replaceWith(document.createTextNode(el.innerText));
            });
            document.querySelectorAll('.sidebar-note-item').forEach(el => el.remove());
            if (activePopup) activePopup.remove();
            activePopup = null;
            contextMenu.style.display = 'none';
        });

        function getTextContentForMarkGroup(markId) {
            const marks = document.querySelectorAll(`.text-highlight[data-mark-id="${markId}"]`);
            if (marks.length > 0 && marks[0].dataset.fullText) {
                return marks[0].dataset.fullText;
            }
            return Array.from(marks).map(m => m.innerText).join(' ');
        }

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
            const fullText = getTextContentForMarkGroup(mark.dataset.markId);
            
            notePopup.innerHTML = `
                <div class="drag-handle" style="background: linear-gradient(to bottom, #f0f0f0, #d0d0d0); padding: 8px; cursor: move; border-bottom: 2px solid #999; display: flex; justify-content: space-between; align-items: center; user-select: none;">
                    <span style="font-size: 12px; color: #666;">Drag to move</span>
                    <span class="close-note" style="cursor: pointer; font-size: 20px; font-weight: bold; color: #666;">&times;</span>
                </div>
                <div class="popup-header" style="font-weight: bold; padding: 8px; background: rgba(0,0,0,0.05); margin-bottom: 5px; border: 1px solid #ccc;">${fullText}</div>
                <textarea placeholder="Add your note here..." style="width:100%; border:1px solid #ccc; background-color:yellow; min-height: 80px; cursor: text; padding: 5px; resize: vertical;">${mark.dataset.note || ''}</textarea>
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
            if (activePopup && !activePopup.contains(e.target)) {
                // Don't close if we clicked another highlight
                let target = e.target;
                let isHighlight = false;
                while (target && target !== document.body) {
                    if (target.classList?.contains('text-highlight')) {
                        isHighlight = true;
                        break;
                    }
                    target = target.parentNode;
                }
                
                if (!isHighlight) {
                    activePopup.remove();
                    activePopup = null;
                    document.removeEventListener('click', handleOutsideClick);
                }
            }
        }
    </script>
</body>

</html>
