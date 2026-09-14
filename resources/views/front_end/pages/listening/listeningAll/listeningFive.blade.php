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
            font-weight: bold;
        }

        .question-link.answered {
            color: gray;
            font-weight: bold;
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

        .text-highlight,
        .mark,
        mark {
            padding: 0px !important;
            background-color: yellow;
            cursor: pointer;
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
            z-index: 10;
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
            z-index: 10;
        }

        mark[data-tooltip]:hover::after {
            opacity: 1;
        }

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
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
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
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
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
    </style>
</head>

<body>
    <form action="{{ route('test.submit') }}" method="POST" id="testForm" spellcheck="false" autocomplete="off">
        @csrf

        @php
            // Extract answers for checkbox questions from existing $answers variable
            // (Don't overwrite $answers as it's already passed from controller)
            
            // Extract answers for Questions 11-12
            $selected11_12 = [];
            if (isset($answers[11])) $selected11_12[] = $answers[11];
            if (isset($answers[12])) $selected11_12[] = $answers[12];
            
            // Extract answers for Questions 13-14
            $selected13_14 = [];
            if (isset($answers[13])) $selected13_14[] = $answers[13];
            if (isset($answers[14])) $selected13_14[] = $answers[14];
            
            // Extract answers for Questions 15-16
            $selected15_16 = [];
            if (isset($answers[15])) $selected15_16[] = $answers[15];
            if (isset($answers[16])) $selected15_16[] = $answers[16];
            
            // Extract answers for Questions 27-28
            $selected27_28 = [];
            if (isset($answers[27])) $selected27_28[] = $answers[27];
            if (isset($answers[28])) $selected27_28[] = $answers[28];
            
            // Extract answers for Questions 29-30
            $selected29_30 = [];
            if (isset($answers[29])) $selected29_30[] = $answers[29];
            if (isset($answers[30])) $selected29_30[] = $answers[30];
        @endphp

        {{-- Checkbox selections are now handled in the controller --}}

        <nav class="navbar navbar-expand-lg" style="background-color: #e9bec2;">
            <div class="container-fluid px-5">
                <div class="collapse navbar-collapse show" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">
                                <span class="material-icons-outlined"
                                    style="vertical-align: middle; margin-right: 5px;">schedule</span>
                                <strong id="timer">30 minutes left</strong>
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
            <div
                style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #ddd; padding: 15px; background: #fff;">
                <h4 style="margin: 0; font-size: 1.25rem; font-weight: normal; color: #333;">Notes</h4>
                <button id="closeSidebar" type="button"
                    style="background: none; border: none; font-size: 24px; cursor: pointer; color: #666; padding: 0; line-height: 1;">&times;</button>
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

        <div id="main-content">
            <div class="container-fluid px-5">
                <div class="tab-content active" id="part1" style="margin-bottom: 80px;">
                    <input type="hidden" name="test_name" value="{{ $testName ?? 'listeningFive' }}">
                    <input type="hidden" name="student_id" value="{{ auth()->id() ?? session('student_batch_id') }}">
                    <input type="hidden" name="exam_student_id" id="examStudentIdField" value="">
                    <input type="hidden" name="assignment_id" value="{{ $assignmentId ?? '' }}">

                    <div class="question_part">
                        <h4>Part 1</h4>
                        <p>Questions 1–10</p>
                    </div>

                    <div class="mt-4 q6-10-area">
                        <div class="d-flex  align-items-center gap-3 ">

                            <h4>Questions 1–10 </h4>
                            <!-- <audio controls
                                src="{{ asset('audio/106.MP3') }}"></audio> -->
                        </div><br>
                        <p>Complete the form. Write<strong> ONE WORD ONLY</strong> in each gap.</p>
                        <h5 class="mt-3"><strong>Enquiry about joining youth council</strong></h5>
                        <p>Currently staying in a <input type="text" name="q1" placeholder="1" class="inline-input"
                                value="{{ $answers[1] ?? '' }}" id="1"> during the week</p>
                        <p>Postal address: 2 17 <input type="text" name="q2" placeholder="2" class="inline-input"
                                value="{{ $answers[2] ?? '' }}" id="2"> Street, Stamford, Lines</p>
                        <p>Postcode: <input type="text" name="q3" placeholder="3" class="inline-input"
                                value="{{ $answers[3] ?? '' }}" id="3"></p>
                        <p>Occupation: student and part-time job as a <input type="text" name="q4" placeholder="4"
                                class="inline-input" value="{{ $answers[4] ?? '' }}" id="4"></p>
                        <p>Studying <input type="text" name="q5" placeholder="5" class="inline-input"
                                value="{{ $answers[5] ?? '' }}" id="5"> (Major subject) and history (minor subject)</p>
                        <p>Hobbies: does a lot of <input type="text" name="q6" placeholder="6" class="inline-input"
                                value="{{ $answers[6] ?? '' }}" id="6">, and is interested in the <input type="text"
                                name="q7" placeholder="7" class="inline-input" value="{{ $answers[7] ?? '' }}" id="7">
                        </p>
                        <p>On Youth Council, wants to work with young people who are <input type="text" name="q8"
                                placeholder="8" class="inline-input" value="{{ $answers[8] ?? '' }}" id="8"></p>
                        <p>Will come to talk to the Elections Officer next Monday at <input type="text" name="q9"
                                placeholder="9" class="inline-input" value="{{ $answers[9] ?? '' }}" id="9"> pm</p>
                        <p>Mobile number: <input type="text" name="q10" placeholder="10" class="inline-input"
                                value="{{ $answers[10] ?? '' }}" id="10"></p>
                    </div>
                </div>

                <!-- question part 2 -->
                <div class="tab-content" id="part2" style="margin-bottom: 80px;">
                    <div class="question_part">
                        <h4>Part 2</h4>
                        <p>Questions 11–20</p>
                    </div>

                    <div class="mt-4">
                        <h4>New staff at theatre</h4>

                        <h5 class="mt-3" id="11"><strong>Questions 11 and 12</strong></h5>
                        <p>Choose <strong>TWO</strong> correct answers. Which <strong>TWO</strong> changes have been
                            made so far during the refurbishment of the theatre?</p>
                        <ul class="options" data-range="11-12">
                            <li><label for="q11-12_a"><input type="checkbox" id="q11-12_a" name="q11-12[]" value="A" {{ in_array('A', $selected11_12, true) ? 'checked' : '' }}>
                                    Some rooms now have a different use.</label></li>
                            <li><label for="q11-12_b"><input type="checkbox" id="q11-12_b" name="q11-12[]" value="B" {{ in_array('B', $selected11_12, true) ? 'checked' : '' }}> A
                                    different type of seating has been installed.</label></li>
                            <li><label for="q11-12_c"><input type="checkbox" id="q11-12_c" name="q11-12[]" value="C" {{ in_array('C', $selected11_12, true) ? 'checked' : '' }}> An
                                    elevator has been installed.</label></li>
                            <li><label for="q11-12_d"><input type="checkbox" id="q11-12_d" name="q11-12[]" value="D" {{ in_array('D', $selected11_12, true) ? 'checked' : '' }}>
                                    The outside of the building has been repaired.</label></li>
                            <li><label for="q11-12_e"><input type="checkbox" id="q11-12_e" name="q11-12[]" value="E" {{ in_array('E', $selected11_12, true) ? 'checked' : '' }}>
                                    Extra seats have been added.</label></li>
                        </ul>

                        <h5 class="mt-4" id="13"><strong>Questions 13 and 14</strong></h5>
                        <p>Choose <strong>TWO</strong> correct answers. Which <strong>TWO</strong> facilities does the
                            theatre currently offer to the public?</p>
                        <ul class="options" data-range="13-14">
                            <li><label for="q13-14_a"><input type="checkbox" id="q13-14_a" name="q13-14[]" value="A" {{ in_array('A', $selected13_14, true) ? 'checked' : '' }}>
                                    rooms for hire</label></li>
                            <li><label for="q13-14_b"><input type="checkbox" id="q13-14_b" name="q13-14[]" value="B" {{ in_array('B', $selected13_14, true) ? 'checked' : '' }}>
                                    backstage tours</label></li>
                            <li><label for="q13-14_c"><input type="checkbox" id="q13-14_c" name="q13-14[]" value="C" {{ in_array('C', $selected13_14, true) ? 'checked' : '' }}>
                                    hire of costumes</label></li>
                            <li><label for="q13-14_d"><input type="checkbox" id="q13-14_d" name="q13-14[]" value="D" {{ in_array('D', $selected13_14, true) ? 'checked' : '' }}> a
                                    bookshop</label></li>
                            <li><label for="q13-14_e"><input type="checkbox" id="q13-14_e" name="q13-14[]" value="E" {{ in_array('E', $selected13_14, true) ? 'checked' : '' }}> a
                                    cafe</label></li>
                        </ul>

                        <h5 class="mt-4" id="15"><strong>Questions 15 and 16</strong></h5>
                        <p>Choose <strong>TWO</strong> correct answers. Which <strong>TWO</strong> workshops does the
                            theatre currently offer?</p>
                        <ul class="options" data-range="15-16">
                            <li><label for="q15-16_a"><input type="checkbox" id="q15-16_a" name="q15-16[]" value="A" {{ in_array('A', $selected15_16, true) ? 'checked' : '' }}>
                                    sound</label></li>
                            <li><label for="q15-16_b"><input type="checkbox" id="q15-16_b" name="q15-16[]" value="B" {{ in_array('B', $selected15_16, true) ? 'checked' : '' }}>
                                    acting</label></li>
                            <li><label for="q15-16_c"><input type="checkbox" id="q15-16_c" name="q15-16[]" value="C" {{ in_array('C', $selected15_16, true) ? 'checked' : '' }}>
                                    making puppets</label></li>
                            <li><label for="q15-16_d"><input type="checkbox" id="q15-16_d" name="q15-16[]" value="D" {{ in_array('D', $selected15_16, true) ? 'checked' : '' }}>
                                    make-up</label></li>
                            <li><label for="q15-16_e"><input type="checkbox" id="q15-16_e" name="q15-16[]" value="E" {{ in_array('E', $selected15_16, true) ? 'checked' : '' }}>
                                    lighting</label></li>
                        </ul>

                        <hr class="my-4">

                        <h4>Questions 17–20</h4>
                        <p>The map has eight labels (<strong>A–H</strong>). Choose the correct label for each building.
                        </p>
                        <h4>Ground floor plan of theatre</h4>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <table class="table table-bordered matching-table"
                                    style="background: white; width: 100%;">
                                    <thead>
                                        <tr style="background: #e8f4f8;">
                                            <th style="width: 50px; text-align: center;">#</th>
                                            <th style="width: 130px;">Building</th>
                                            @foreach(range('A', 'H') as $letter)
                                                <th style="width: 40px; text-align: center;">{{ $letter }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $buildings = [
                                                17 => 'box office',
                                                18 => 'theatre manager\'s office',
                                                19 => 'lighting box',
                                                20 => 'artistic director\'s office'
                                            ];
                                        @endphp
                                        @foreach($buildings as $qNum => $building)
                                            <tr>
                                                <td style="text-align: center; font-weight: bold;">{{ $qNum }}</td>
                                                <td>{{ $building }}</td>
                                                @foreach(range('A', 'H') as $letter)
                                                    <td class="clickable-cell" data-question="{{ $qNum }}"
                                                        data-value="{{ $letter }}"
                                                        style="text-align: center; cursor: pointer; user-select: none; font-size: 20px; height: 50px; vertical-align: middle;">
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <!-- Hidden inputs to store selected values -->
                                @foreach(range(17, 20) as $qNum)
                                    <input type="hidden" name="q{{ $qNum }}" id="q{{ $qNum }}_hidden" value="">
                                @endforeach
                            </div>
                            <div class="col-md-6">
                                <div style="text-align: center;">
                                    <img src="{{ asset('images/listening/1111.jpg') }}" class="img-fluid"
                                        alt="Ground floor plan of theatre"
                                        style="width: 100%; border: 2px solid #000; border-radius: 8px;">
                                </div>
                            </div>
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
                        <h4>Questions 21–26</h4>
                        <p>Choose the correct answer.</p>
                        <p><strong>Rocky Bay field trip</strong></p>

                        <div class="mb-4">
                            <p><strong>21</strong> What do the students agree should be included in their aims?</p>
                            <div class="ms-3">
                                <label><input type="radio" name="q21" value="A" id="21"> factors affecting where
                                    organisms live</label><br>
                                <label><input type="radio" name="q21" value="B"> the need to preserve endangered
                                    species</label><br>
                                <label><input type="radio" name="q21" value="C"> techniques for classifying different
                                    organisms</label>
                            </div>
                        </div>

                        <div class="mb-4">
                            <p class="mt-3"><strong>22</strong> What equipment did they forget to take on the Field
                                Trip?</p>
                            <div class="ms-3">
                                <label><input type="radio" name="q22" value="A" id="22"> string</label><br>
                                <label><input type="radio" name="q22" value="B"> a compass</label><br>
                                <label><input type="radio" name="q22" value="C"> a ruler</label>
                            </div>
                        </div>

                        <div class="mb-4">
                            <p class="mt-3"><strong>23</strong> In Helen's procedure section, Colin suggests a change in
                            </p>
                            <div class="ms-3">
                                <label><input type="radio" name="q23" value="A" id="23"> the order in which information
                                    is given.</label><br>
                                <label><input type="radio" name="q23" value="B"> the way the information is divided
                                    up.</label><br>
                                <label><input type="radio" name="q23" value="C"> the amount of information
                                    provided.</label>
                            </div>
                        </div>

                        <div class="mb-4">
                            <p class="mt-3"><strong>24</strong> What do they say about the method they used to measure
                                wave speed?</p>
                            <div class="ms-3">
                                <label><input type="radio" name="q24" value="A" id="24"> It provided accurate
                                    results.</label><br>
                                <label><input type="radio" name="q24" value="B"> It was simple to carry out.</label><br>
                                <label><input type="radio" name="q24" value="C"> It required special equipment.</label>
                            </div>
                        </div>

                        <div class="mb-4">
                            <p class="mt-3"><strong>25</strong> What mistake did Helen make when first drawing the map?
                            </p>
                            <div class="ms-3">
                                <label><input type="radio" name="q25" value="A" id="25"> She chose the wrong
                                    scale.</label><br>
                                <label><input type="radio" name="q25" value="B"> She stood in the wrong
                                    place.</label><br>
                                <label><input type="radio" name="q25" value="C"> She did it at the wrong time.</label>
                            </div>
                        </div>

                        <div class="mb-4">
                            <p class="mt-3"><strong>26</strong> What do they decide to do next with their map?</p>
                            <div class="ms-3">
                                <label><input type="radio" name="q26" value="A" id="26"> scan it onto a
                                    computer</label><br>
                                <label><input type="radio" name="q26" value="B"> check it using photographs</label><br>
                                <label><input type="radio" name="q26" value="C"> add information from the
                                    internet</label>
                            </div>
                        </div>

                        <hr class="my-4">

                        <h4 id="27">Questions 27 and 28</h4>
                        <p>Choose <strong>TWO</strong> correct answers. Which <strong>TWO</strong> problems affecting
                            organisms in the splash zone are mentioned?</p>
                        <ul class="options" data-range="27-28">
                            <li><label for="q27-28_a"><input type="checkbox" id="q27-28_a" name="q27-28[]" value="A" {{ in_array('A', $selected27_28, true) ? 'checked' : '' }}>
                                    lack of water</label></li>
                            <li><label for="q27-28_b"><input type="checkbox" id="q27-28_b" name="q27-28[]" value="B" {{ in_array('B', $selected27_28, true) ? 'checked' : '' }}>
                                    strong winds</label></li>
                            <li><label for="q27-28_c"><input type="checkbox" id="q27-28_c" name="q27-28[]" value="C" {{ in_array('C', $selected27_28, true) ? 'checked' : '' }}>
                                    lack of food</label></li>
                            <li><label for="q27-28_d"><input type="checkbox" id="q27-28_d" name="q27-28[]" value="D" {{ in_array('D', $selected27_28, true) ? 'checked' : '' }}>
                                    high temperatures</label></li>
                            <li><label for="q27-28_e"><input type="checkbox" id="q27-28_e" name="q27-28[]" value="E" {{ in_array('E', $selected27_28, true) ? 'checked' : '' }}>
                                    large waves</label></li>
                        </ul>

                        <h4 class="mt-4" id="29">Questions 29 and 30</h4>
                        <p>Choose <strong>TWO</strong> correct answers. Which <strong>TWO</strong> reasons for possible
                            error will they include in their report?</p>
                        <ul class="options" data-range="29-30">
                            <li><label for="q29-30_a"><input type="checkbox" id="q29-30_a" name="q29-30[]" value="A" {{ in_array('A', $selected29_30, true) ? 'checked' : '' }}>
                                    inaccurate records of the habitat of organisms</label></li>
                            <li><label for="q29-30_b"><input type="checkbox" id="q29-30_b" name="q29-30[]" value="B" {{ in_array('B', $selected29_30, true) ? 'checked' : '' }}>
                                    influence on behaviour of organisms by observer</label></li>
                            <li><label for="q29-30_c"><input type="checkbox" id="q29-30_c" name="q29-30[]" value="C" {{ in_array('C', $selected29_30, true) ? 'checked' : '' }}>
                                    incorrect identification of some organisms</label></li>
                            <li><label for="q29-30_d"><input type="checkbox" id="q29-30_d" name="q29-30[]" value="D" {{ in_array('D', $selected29_30, true) ? 'checked' : '' }}>
                                    making generalizations from a small sample</label></li>
                            <li><label for="q29-30_e"><input type="checkbox" id="q29-30_e" name="q29-30[]" value="E" {{ in_array('E', $selected29_30, true) ? 'checked' : '' }}>
                                    missing some organisms when counting</label></li>
                        </ul>
                    </div>
                </div>

                <!-- question part 4 -->
                <div class="tab-content" id="part4" style="margin-bottom: 80px;">
                    <div class="question_part">
                        <h4>Part 4</h4>
                        <p>Questions 31–40</p>
                    </div>

                    <div class="mt-4">
                        <h4>Question 31–40</h4>
                        <p>Complete the notes. Write <strong>ONE WORD AND/OR A NUMBER</strong> in each gap.</p>

                        <h5 class="mt-3"><strong>DESIGNING A PUBLIC BUILDING: THE TAYLOR CONCERT HALL</strong></h5>

                        <p class="mt-3"><strong>Introduction</strong></p>
                        <p>The designer of a public building may need to consider the building’s</p>
                        <p>function</p>
                        <p>physical and <input type="text" name="q31" placeholder="31" class="inline-input"
                                value="{{ $answers[31] ?? '' }}" id="31"> context</p>
                        <p>symbolic meaning</p>

                        <p class="mt-3"><strong>Location and concept of the Concert Hall</strong></p>
                        <p>On the site of a disused <input type="text" name="q32" placeholder="32" class="inline-input"
                                value="{{ $answers[32] ?? '' }}" id="32"></p>
                        <p>Beside a <input type="text" name="q33" placeholder="33" class="inline-input"
                                value="{{ $answers[33] ?? '' }}" id="33"></p>
                        <p>The design is based on the concept of a mystery</p>

                        <p class="mt-3"><strong>Building design</strong></p>
                        <p>It’s approached by a <input type="text" name="q34" placeholder="34" class="inline-input"
                                value="{{ $answers[34] ?? '' }}" id="34"> for pedestrians</p>
                        <p>The building is the shape of a <input type="text" name="q35" placeholder="35"
                                class="inline-input" value="{{ $answers[35] ?? '' }}" id="35"></p>
                        <p>One exterior wall acts as a large <input type="text" name="q36" placeholder="36"
                                class="inline-input" value="{{ $answers[36] ?? '' }}" id="36"></p>

                        <p class="mt-3"><strong>In the auditorium:</strong></p>
                        <p>the floor is built on huge pads made of <input type="text" name="q37" placeholder="37"
                                class="inline-input" value="{{ $answers[37] ?? '' }}" id="37"></p>
                        <p>the walls are made of local wood and are <input type="text" name="q38" placeholder="38"
                                class="inline-input" value="{{ $answers[38] ?? '' }}" id="38"> in shape</p>
                        <p>ceiling panels and <input type="text" name="q39" placeholder="39" class="inline-input"
                                value="{{ $answers[39] ?? '' }}" id="39"> on walls allow adjustment of acoustics</p>

                        <p class="mt-3"><strong>Evaluation</strong></p>
                        <p>Some critics say the <input type="text" name="q40" placeholder="40" class="inline-input"
                                value="{{ $answers[40] ?? '' }}" id="40"> style of the building is inappropriate</p>
                    </div>
                </div>
            </div>
    </form>

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
                        <input type="text" id="student_id_input" class="student-id-input"
                            placeholder="Enter your Student ID">
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

    <!-- <div class="fixed-bottom d-flex justify-content-end mb-5 px-5" style="z-index: 999;">
            <button id="prev-question" class="btn btn-dark me-2" style="font-size: 1.5rem;">&#8592;</button>
            <button id="next-question" class="btn btn-dark ms-2" style="font-size: 1.5rem;">&#8594;</button>
        </div> -->
    <div class="fixed-bottom d-flex justify-content-end mb-5 px-5"
        style="gap: 5px; z-index: 2050; pointer-events: none;">
        <button id="prev-question" type="button" class="btn btn-dark" style="font-size: 1.5rem; pointer-events: auto;">
            <span class="material-icons-outlined">arrow_back</span>
        </button>
        <button id="next-question" type="button" class="btn btn-dark" style="font-size: 1.5rem; pointer-events: auto;">
            <span class="material-icons-outlined">arrow_forward</span>
        </button>
    </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script>
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
            const specificAudio = new Audio('{{ asset("audio/106.MP3") }}');
            specificAudio.preload = 'metadata';
            window._hxAudio = specificAudio;
            specificAudio.addEventListener('loadedmetadata', function () {
                if (timeRemaining === 0) timeRemaining = Math.ceil(specificAudio.duration);
                //if (timeRemaining === 0) timeRemaining = 60;
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
            startButton.addEventListener('click', function (e) {
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

                // Close modal manually since we might have intercepted the event
                const modalInstance = bootstrap.Modal.getInstance(document.getElementById('startModal'));
                modalInstance.hide();

                // Enter fullscreen mode
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
               // if (timeRemaining === 0) timeRemaining = 60;  // 1 min test

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

            // Add Enter key listener to student ID input
            const studentIdInput = document.getElementById('student_id_input');
            if (studentIdInput) {
                studentIdInput.addEventListener('keypress', function(event) {
                    if (event.key === 'Enter') {
                        event.preventDefault();
                        startButton.click();
                    }
                });
            }

            finishButton.addEventListener('click', function (e) {
                e.preventDefault();
                finishModal.show();
            });

            // Prevent double submission
            let isSubmitting = false;

            // Prevent Enter key from submitting the form across all inputs
            document.getElementById('testForm').addEventListener('keypress', function (e) {
                if (e.key === 'Enter') {
                    // If focusing on student ID, trigger the start button
                    if (e.target.id === 'student_id_input') {
                        e.preventDefault();
                        startButton.click();
                        return;
                    }

                    // Otherwise just block it
                    e.preventDefault();
                    return false;
                }
            });

            continueButton.addEventListener('click', function () {
                if (isSubmitting) {
                    return; // Prevent double submission
                }
                isSubmitting = true;
                
                const form = document.getElementById('testForm');
                
                // Remove existing hidden order inputs
                form.querySelectorAll('.checkbox-order-input').forEach(input => input.remove());
                
                // Add hidden inputs to maintain checkbox order
                checkboxOrder.forEach((orderedValues, groupName) => {
                    if (orderedValues.length > 0 && (groupName === 'q11-12[]' || groupName === 'q13-14[]' || groupName === 'q15-16[]' || groupName === 'q27-28[]' || groupName === 'q29-30[]')) {
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

        // Highlight and Notes Functionality
        let selectionRange = null;
        let selectedText = '';
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

        function getTableCell(node) {
            let parent = node && node.nodeType === Node.TEXT_NODE ? node.parentNode : node;
            while (parent) {
                if (parent.tagName === 'TD' || parent.tagName === 'TH') {
                    return parent;
                }
                parent = parent.parentNode;
            }
            return null;
        }

        function highlightRange(range, markInit) {
            const marks = [];
            const startContainer = range.startContainer;
            const endContainer = range.endContainer;
            const startOffset = range.startOffset;
            const endOffset = range.endOffset;

            function ensureSpacesBetweenAdjacentMarks(markList) {
                for (let i = 0; i < markList.length - 1; i++) {
                    const a = markList[i];
                    const b = markList[i + 1];
                    if (!a || !b) continue;
                    if (!a.parentNode || a.parentNode !== b.parentNode) continue;

                    const between = a.nextSibling;
                    if (between === b) {
                        a.parentNode.insertBefore(document.createTextNode('\u00A0'), b);
                        continue;
                    }

                    if (between && between.nodeType === Node.TEXT_NODE && between.nextSibling === b) {
                        if (!between.textContent || /^\s+$/.test(between.textContent)) {
                            between.textContent = '\u00A0';
                        }
                    }
                }
            }

            function ensureVisibleSpaceAroundMarks(markList) {
                markList.forEach((mark) => {
                    if (!mark || !mark.parentNode) return;

                    const prev = mark.previousSibling;
                    if (prev && prev.nodeType === Node.TEXT_NODE) {
                        prev.textContent = prev.textContent.replace(/\s+$/g, '\u00A0');
                    } else if (prev && prev.nodeType === Node.ELEMENT_NODE && prev.tagName !== 'MARK') {
                        mark.parentNode.insertBefore(document.createTextNode('\u00A0'), mark);
                    }

                    const next = mark.nextSibling;
                    if (next && next.nodeType === Node.TEXT_NODE) {
                        next.textContent = next.textContent.replace(/^\s+/g, '\u00A0');
                    }
                });
            }

            function ensureWordBoundarySpaces(markList) {
                const isAlphaNum = (ch) => /[A-Za-z0-9]/.test(ch || '');
                const lastChar = (str) => (str && str.length ? str[str.length - 1] : '');
                const firstChar = (str) => (str && str.length ? str[0] : '');

                markList.forEach((mark) => {
                    if (!mark || !mark.parentNode) return;

                    const prev = mark.previousSibling;
                    const next = mark.nextSibling;

                    if (prev && prev.nodeType === Node.TEXT_NODE) {
                        const prevText = prev.textContent || '';
                        if (prevText !== '' && !/\s$/.test(prevText)) {
                            if (isAlphaNum(lastChar(prevText)) && isAlphaNum(firstChar(mark.textContent || ''))) {
                                prev.textContent = prevText + '\u00A0';
                            }
                        }
                    } else if (prev && prev.nodeType === Node.ELEMENT_NODE && prev.tagName === 'MARK') {
                        const prevText = prev.textContent || '';
                        if (isAlphaNum(lastChar(prevText)) && isAlphaNum(firstChar(mark.textContent || ''))) {
                            mark.parentNode.insertBefore(document.createTextNode('\u00A0'), mark);
                        }
                    }

                    if (next && next.nodeType === Node.TEXT_NODE) {
                        const nextText = next.textContent || '';
                        if (nextText !== '' && !/^\s/.test(nextText)) {
                            if (isAlphaNum(lastChar(mark.textContent || '')) && isAlphaNum(firstChar(nextText))) {
                                next.textContent = '\u00A0' + nextText;
                            }
                        }
                    } else if (next && next.nodeType === Node.ELEMENT_NODE && next.tagName === 'MARK') {
                        const nextText = next.textContent || '';
                        if (isAlphaNum(lastChar(mark.textContent || '')) && isAlphaNum(firstChar(nextText))) {
                            mark.parentNode.insertBefore(document.createTextNode('\u00A0'), next);
                        }
                    }
                });
            }

            function splitEdgeWhitespace(text) {
                const match = (text || '').match(/^(\s*)([\s\S]*?)(\s*)$/);
                return {
                    leading: (match && match[1]) ? match[1] : '',
                    core: (match && match[2]) ? match[2] : '',
                    trailing: (match && match[3]) ? match[3] : ''
                };
            }

            const startCell = getTableCell(startContainer);
            const endCell = getTableCell(endContainer);

            if (startCell && endCell && startCell !== endCell) {
                if (startContainer && startContainer.nodeType === Node.TEXT_NODE) {
                    const selectedText = startContainer.textContent.substring(startOffset);
                    if (selectedText.trim()) {
                        const parts = splitEdgeWhitespace(selectedText);
                        const mark = document.createElement('mark');
                        mark.style.backgroundColor = 'yellow';
                        if (markInit) markInit(mark);
                        mark.textContent = parts.core;

                        const beforeText = startContainer.textContent.substring(0, startOffset);
                        const parent = startContainer.parentNode;
                        if (beforeText) parent.insertBefore(document.createTextNode(beforeText), startContainer);
                        if (parts.leading) parent.insertBefore(document.createTextNode(parts.leading), startContainer);
                        parent.insertBefore(mark, startContainer);
                        if (parts.trailing) parent.insertBefore(document.createTextNode(parts.trailing), startContainer);
                        parent.removeChild(startContainer);
                        marks.push(mark);
                    }
                }
                return marks;
            }

            if (startContainer === endContainer && startContainer && startContainer.nodeType === Node.TEXT_NODE) {
                const selectedText = startContainer.textContent.substring(startOffset, endOffset);
                if (!selectedText.trim()) return marks;

                const parts = splitEdgeWhitespace(selectedText);

                const mark = document.createElement('mark');
                mark.style.backgroundColor = 'yellow';
                if (markInit) markInit(mark);
                mark.textContent = parts.core;

                const beforeText = startContainer.textContent.substring(0, startOffset);
                const afterText = startContainer.textContent.substring(endOffset);

                const parent = startContainer.parentNode;
                if (beforeText) parent.insertBefore(document.createTextNode(beforeText), startContainer);
                if (parts.leading) parent.insertBefore(document.createTextNode(parts.leading), startContainer);
                parent.insertBefore(mark, startContainer);
                if (parts.trailing) parent.insertBefore(document.createTextNode(parts.trailing), startContainer);
                if (afterText) parent.insertBefore(document.createTextNode(afterText), startContainer);
                parent.removeChild(startContainer);
                marks.push(mark);
                return marks;
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

                const parts = splitEdgeWhitespace(selectedText);

                const mark = document.createElement('mark');
                mark.style.backgroundColor = 'yellow';
                if (markInit) markInit(mark);
                mark.textContent = parts.core;

                const beforeText = textNode.textContent.substring(0, start);
                const afterText = textNode.textContent.substring(end);

                const parent = textNode.parentNode;
                if (beforeText) parent.insertBefore(document.createTextNode(beforeText), textNode);
                if (parts.leading) parent.insertBefore(document.createTextNode(parts.leading), textNode);
                parent.insertBefore(mark, textNode);
                if (parts.trailing) parent.insertBefore(document.createTextNode(parts.trailing), textNode);
                if (afterText) parent.insertBefore(document.createTextNode(afterText), textNode);
                parent.removeChild(textNode);
                marks.push(mark);
            });

            ensureSpacesBetweenAdjacentMarks(marks);
            ensureVisibleSpaceAroundMarks(marks);
            ensureWordBoundarySpaces(marks);
            return marks;
        }

        // Function to open sidebar
        function openSidebar() {
            sidebar.classList.add('open');
            const mainContent = document.getElementById('main-content');
            if (mainContent) mainContent.classList.add('shifted');
        }

        // Function to close sidebar
        function closeSidebarFunc() {
            sidebar.classList.remove('open');
            const mainContent = document.getElementById('main-content');
            if (mainContent) mainContent.classList.remove('shifted');
        }

        // Sidebar toggle functionality
        document.getElementById('noteToggle').addEventListener('click', function () {
            if (sidebar.classList.contains('open')) {
                closeSidebarFunc();
            } else {
                openSidebar();
            }
        });

        document.getElementById('closeSidebar').addEventListener('click', closeSidebarFunc);

        // Highlight only
        highlightOption.addEventListener('click', function () {
            if (selectionRange) {
                const createdMarks = highlightRange(selectionRange);
                const markId = Date.now();
                createdMarks.forEach(m => m.dataset.markId = markId);
            }
            contextMenu.style.display = 'none';
            window.getSelection().removeAllRanges();
        });

        // Add note with popup
        notesOption.addEventListener('click', function () {
            if (clickedMark) {
                showNotePopup(clickedMark);
                contextMenu.style.display = 'none';
                return;
            }

            if (selectionRange) {
                const fullSelectedText = selectedText;
                const createdMarks = highlightRange(selectionRange);
                if (createdMarks.length > 0) {
                    const markId = Date.now();
                    createdMarks.forEach(m => {
                        m.dataset.markId = markId;
                        m.dataset.fullText = fullSelectedText; // Store full selection text
                        m.setAttribute('data-tooltip', '');
                        m.setAttribute('data-note', '');
                        m.addEventListener('click', function (e) {
                            e.stopPropagation();
                            showNotePopup(m);
                        });
                    });

                    const noteDiv = document.createElement('div');
                    noteDiv.classList.add('sidebar-note-item');
                    noteDiv.dataset.markId = markId;
                    noteDiv.style.borderBottom = '1px solid #ddd';
                    noteDiv.style.padding = '12px 10px';
                    noteDiv.style.marginBottom = '2px';
                    noteDiv.style.cursor = 'pointer';
                    noteDiv.style.backgroundColor = '#fff';

                    noteDiv.innerHTML = `
                        <div class="note-item-title" style="margin-bottom: 2px; font-weight: normal; font-size: 0.95rem; color: #333; line-height: 1.4;">${fullSelectedText}</div>
                        <div class="sidebar-note-content" style="color: #666; font-size: 0.85rem; white-space: pre-wrap;"></div>
                    `;

                    const container = document.getElementById('notes-container');
                    if (container) {
                        container.appendChild(noteDiv);
                    } else {
                        sidebar.appendChild(noteDiv);
                    }

                    noteDiv.addEventListener('click', (e) => {
                        e.stopPropagation();
                        showNotePopup(createdMarks[0]);
                    });
                    showNotePopup(createdMarks[0]);
                }
            }
            contextMenu.style.display = 'none';
            window.getSelection().removeAllRanges();
        });

        // Function to get full text content for a group of marks
        function getTextContentForMarkGroup(markId) {
            const marks = document.querySelectorAll(`mark[data-mark-id="${markId}"]`);
            if (marks.length > 0 && marks[0].dataset.fullText) {
                return marks[0].dataset.fullText;
            }
            return Array.from(marks).map(m => m.innerText).join(' ');
        }

        // Clear single highlight
        clearOption.addEventListener('click', function () {
            if (clickedMark) {
                const markId = clickedMark.dataset.markId;
                if (markId) {
                    document.querySelectorAll(`mark[data-mark-id="${markId}"]`).forEach(m => {
                        const parent = m.parentNode;
                        while (m.firstChild) parent.insertBefore(m.firstChild, m);
                        parent.removeChild(m);
                    });
                    const sidebarItem = document.querySelector(`.sidebar-note-item[data-mark-id="${markId}"]`);
                    if (sidebarItem) sidebarItem.remove();
                }
                clickedMark = null;
            }
            contextMenu.style.display = 'none';
        });

        allClearOption.addEventListener('click', function () {
            document.querySelectorAll('mark').forEach(marked => {
                const parent = marked.parentNode;
                while (marked.firstChild) parent.insertBefore(marked.firstChild, marked);
                parent.removeChild(marked);
            });
            const notePopup = document.querySelector('.note-popup');
            if (notePopup) notePopup.remove();
            activePopup = null;

            const container = document.getElementById('notes-container');
            if (container) container.innerHTML = '';

            closeSidebarFunc();
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
            notePopup.style.width = '250px';
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
            if (activePopup && !activePopup.contains(e.target) && e.target.tagName !== 'MARK' && !e.target.classList?.contains('text-highlight')) {
                activePopup.remove();
                activePopup = null;
                document.removeEventListener('click', handleOutsideClick);
            }
        }



        // Clickable Table Cells for Map Questions (17-20)
        document.addEventListener('DOMContentLoaded', function () {
            const clickableCells = document.querySelectorAll('.clickable-cell');

            clickableCells.forEach(cell => {
                cell.addEventListener('click', function () {
                    const qNum = this.getAttribute('data-question');
                    const value = this.getAttribute('data-value');
                    const hiddenInput = document.getElementById(`q${qNum}_hidden`);

                    // Get all cells for this question
                    const rowCells = document.querySelectorAll(`.clickable-cell[data-question="${qNum}"]`);

                    // Check if this cell is already selected
                    const isSelected = this.textContent.trim() === '✓';

                    let finalValue = '';
                    if (isSelected) {
                        // Deselect
                        this.textContent = '';
                        this.style.backgroundColor = '';
                        finalValue = '';
                    } else {
                        // Clear all other cells in this row
                        rowCells.forEach(c => {
                            c.textContent = '';
                            c.style.backgroundColor = '';
                        });

                        // Select this cell
                        this.textContent = '✓';
                        this.style.backgroundColor = '#d4edda'; // Light green
                        finalValue = value;
                    }

                    // Update hidden input
                    if (hiddenInput) {
                        hiddenInput.value = finalValue;
                    }

                    // Autosave the selection
                    const formData = new FormData();
                    formData.append('student_id', '{{ auth()->id() ?? session("student_batch_id") }}');
                    formData.append('test_name', document.querySelector('input[name="test_name"]').value);
                    formData.append('question_number', qNum);
                    formData.append('answer', finalValue);

                    fetch('{{ route('test.autosave') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: formData
                    }).then(response => {
                        if (!response.ok) throw new Error('Network response was not ok');
                        console.log(`Autosaved Table Q${qNum}: ${finalValue}`);
                    }).catch(err => console.error('Autosave failed', err));

                    // Update navigation highlighting if applicable
                    if (typeof setActiveQuestionByNumber === 'function') {
                        setActiveQuestionByNumber(qNum);
                    }
                });

                // Hover effects
                cell.addEventListener('mouseenter', function () {
                    if (this.textContent.trim() !== '✓') {
                        this.style.backgroundColor = '#f8f9fa';
                    }
                });

                cell.addEventListener('mouseleave', function () {
                    if (this.textContent.trim() !== '✓') {
                        this.style.backgroundColor = '';
                    }
                });
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
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                body: formData
            }).then(response => {
                if (!response.ok) throw new Error('Network response was not ok');
                console.log(`✓ Autosaved: ${input.name}`);
            }).catch(err => console.error('âŒ Autosave failed', err));
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
            }, 10000); // 10 seconds
        }

        // Attach change listeners to all inputs
        document.querySelectorAll('input[type="radio"], input[type="text"], input[type="checkbox"]').forEach(input => {
            // Checkbox limit logic
            if (input.type === 'checkbox') {
                input.addEventListener('change', function() {
                    const groupName = this.name;
                    const checkedCheckboxes = document.querySelectorAll(`input[name="${groupName}"]:checked`);
                    
                    // Restriction: maximum 2 selections
                    if (checkedCheckboxes.length > 2) {
                        this.checked = false;
                        return;
                    }
                    markDirty(this);
                });
            } else {
                input.addEventListener('change', () => markDirty(input));
                if (input.type === 'text') {
                    input.addEventListener('input', () => markDirty(input));
                }
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
    </script>

    <!-- Arrow button script -->
    <script>
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
                    if (tab.getAttribute('data-tab') === partContent.id) {
                        tab.classList.add('active');
                    } else {
                        tab.classList.remove('active');
                    }
                });
            }

            function scrollAndFocus(num) {
                const label = document.getElementById(num);
                if (label) label.scrollIntoView({ behavior: 'smooth', block: 'center' });

                const inputField = document.getElementById(num);
                if (inputField && inputField.tagName === 'INPUT') {
                    setTimeout(() => inputField.focus(), 400);
                }
            }

            function setActiveQuestion(index) {
                if (index < 0 || index >= allLinks.length) return;
                currentIndex = index;
                const qNum = allLinks[index].getAttribute('data-question');

                allLinks.forEach(link => link.classList.remove('active'));
                allLinks[index].classList.add('active');

                activateTabForQuestion(qNum);
                scrollAndFocus(qNum);
            }

            // Expose globally
            window.setActiveQuestionByNumber = function (num) {
                const index = allLinks.findIndex(link => link.getAttribute('data-question') == num);
                if (index !== -1) {
                    setActiveQuestion(index);
                }
            };

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

            const ranges = [
                { start: 11, end: 12, name: 'q11-12[]' },
                { start: 13, end: 14, name: 'q13-14[]' },
                { start: 15, end: 16, name: 'q15-16[]' },
                { start: 17, end: 20, isTable: true },
                { start: 27, end: 28, name: 'q27-28[]' },
                { start: 29, end: 30, name: 'q29-30[]' }
            ];

            function updateAnsweredState() {
                allLinks.forEach(link => {
                    const qNumStr = link.getAttribute('data-question');
                    const qNum = parseInt(qNumStr);
                    let isAnswered = false;

                    // Check if qNum is part of any specific range
                    const range = ranges.find(r => qNum >= r.start && qNum <= r.end);
                    if (range && !range.isTable) {
                        const inputs = document.querySelectorAll(`input[name="${range.name}"]`);
                        const checkedCount = Array.from(inputs).filter(i => i.checked).length;
                        if (qNum === range.start && checkedCount >= 1) isAnswered = true;
                        else if (qNum > range.start && qNum <= range.end) {
                            // Question X is answered if checkedCount is high enough
                            // e.g., for 11-12, 12 is answered if count >= 2
                            const indexInRange = qNum - range.start;
                            if (checkedCount > indexInRange) isAnswered = true;
                        }
                    } else {
                        // Single questions or table questions
                        const inputs = document.querySelectorAll(`input[name="q${qNumStr}"], input[name="q${qNumStr}[]"], #q${qNumStr}_hidden`);
                        inputs.forEach(input => {
                            if (input.type === 'checkbox' || input.type === 'radio') {
                                if (input.checked) isAnswered = true;
                            } else if (input.value.trim() !== '') {
                                isAnswered = true;
                            }
                        });
                    }

                    if (isAnswered) {
                        link.classList.add('answered');
                    } else {
                        link.classList.remove('answered');
                    }
                });
            }

            // Track manual input field clicks to update currentIndex and UI
            document.querySelectorAll('input[type="text"], input[type="checkbox"], input[type="radio"]').forEach(input => {
                const updateUI = function () {
                    let qName = this.name || "";
                    let questionNum = qName.replace('q', '').replace('[]', '').split('-')[0];

                    // Special logic for ranges in checkbox groups
                    if (this.type === 'checkbox' && (qName.includes('-') || qName.match(/q(11|13|15|27|29)/))) {
                        const checkedCount = document.querySelectorAll(`input[name="${this.name}"]:checked`).length;
                        const rangeStr = qName.replace('q', '').replace('[]', '');
                        if (rangeStr.includes('-')) {
                            const [start, end] = rangeStr.split('-').map(Number);
                            questionNum = (checkedCount > 1) ? end.toString() : start.toString();
                        }
                    }

                    // Fallback to ID if name doesn't yield a number
                    if (!questionNum || isNaN(questionNum)) {
                        const idMatch = this.id.match(/\d+/);
                        if (idMatch) questionNum = idMatch[0];
                    }

                    const linkIndex = allLinks.findIndex(link => link.getAttribute('data-question') === questionNum);
                    if (linkIndex !== -1) {
                        currentIndex = linkIndex;
                        allLinks.forEach(link => link.classList.remove('active'));
                        allLinks[linkIndex].classList.add('active');

                        // Ensure the correct tab is active for this question
                        activateTabForQuestion(questionNum);
                    }
                    updateAnsweredState();
                };

                input.addEventListener('focus', updateUI);
                input.addEventListener('click', updateUI);
                input.addEventListener('change', updateAnsweredState);
            });

            // For the map table
            document.addEventListener('click', function (e) {
                if (e.target.classList.contains('clickable-cell')) {
                    updateAnsweredState();
                }
            });

            setActiveQuestion(0);
            updateAnsweredState();
        })();
    </script>

    <!-- Tab switching functionality -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Add click event listeners to all tabs
            document.querySelectorAll('.tab').forEach(tab => {
                tab.addEventListener('click', function () {
                    const targetTabId = this.getAttribute('data-tab');

                    // Remove active class from all tabs and tab contents
                    document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
                    document.querySelectorAll('.tab-content').forEach(tc => tc.classList.remove('active'));

                    // Add active class to clicked tab and corresponding content
                    this.classList.add('active');
                    document.getElementById(targetTabId).classList.add('active');
                });
            });
        });
    </script>

    <!-- Placeholder behavior script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('input[type="text"]').forEach(input => {
                const originalPlaceholder = input.placeholder;

                input.addEventListener('focus', function () {
                    this.placeholder = '';
                });

                input.addEventListener('blur', function () {
                    if (this.value === '') {
                        this.placeholder = originalPlaceholder;
                    }
                });
            });
        });

        // Load saved answers for radio and checkbox inputs
        window.addEventListener('load', function() {
            setTimeout(function() {
                const savedAnswers = @json($answers ?? []);
                console.log('ðŸ“ Loading saved answers:', savedAnswers);
                
                Object.keys(savedAnswers || {}).forEach(qNum => {
                    const answer = savedAnswers[qNum];
                    if (!answer) return;
                    
                    console.log(`Loading Q${qNum}: ${answer}`);
                    
                    // Handle radio buttons (q21, q22, etc.)
                    const radioInputs = document.querySelectorAll(`input[type="radio"][name="q${qNum}"]`);
                    if (radioInputs.length > 0) {
                        radioInputs.forEach(radio => {
                            if (radio.value === String(answer)) {
                                radio.checked = true;
                                console.log(`✓ Radio Q${qNum} = ${answer}`);
                            }
                        });
                    }
                    
                    // Handle checkboxes with hyphenated names (q11-12[], q13-14[], q15-16[], etc.)
                    const checkboxInputs = document.querySelectorAll(`input[type="checkbox"][name="q${qNum}[]"]`);
                    if (checkboxInputs.length > 0) {
                        const selectedValues = String(answer).split(',').map(v => v.trim());
                        console.log(`Checkbox Q${qNum} selector: input[type="checkbox"][name="q${qNum}[]"]`);
                        console.log(`Checkbox Q${qNum} found:`, checkboxInputs.length, 'values:', selectedValues);
                        checkboxInputs.forEach(checkbox => {
                            if (selectedValues.includes(checkbox.value)) {
                                checkbox.checked = true;
                                console.log(`✓ Checkbox Q${qNum} = ${checkbox.value} checked`);
                            }
                        });
                    }
                    
                    // Handle table questions with hidden inputs (q17, q18, q19, q20)
                    const hiddenInput = document.getElementById(`q${qNum}_hidden`);
                    if (hiddenInput) {
                        hiddenInput.value = answer;
                        
                        // Find and mark the corresponding table cell
                        const cell = document.querySelector(`.clickable-cell[data-question="${qNum}"][data-value="${answer}"]`);
                        if (cell) {
                            // Clear any previous selection for this question
                            document.querySelectorAll(`.clickable-cell[data-question="${qNum}"]`).forEach(c => {
                                c.textContent = '';
                                c.style.backgroundColor = '';
                            });
                            
                            // Mark the selected cell
                            cell.textContent = '✓';
                            cell.style.backgroundColor = '#d4edda';
                            console.log(`✓ Table Q${qNum} = ${answer}`);
                        }
                    }
                });
            }, 500);
        });
    </script>
    </div>
</body>

</html>