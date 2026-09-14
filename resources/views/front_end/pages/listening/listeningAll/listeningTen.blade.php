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
            border: 1px solid #ccc;
            border-radius: 0;
            outline: none;
            background: white;
            padding: 5px;
            margin: 0 4px;
            width: 150px;
        }

        .inline-input:focus {
            border: 1px solid #ccc;
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

        .map-label {
            position: absolute;
            font-weight: bold;
            font-size: 14px;
            background: white;
            padding: 2px 5px;
            border: 1px solid #000;
        }

        .text-highlight {
            background-color: #ffff00 !important;
            color: inherit !important;
            padding: 0;
            margin: 0;
            display: inline !important;
            vertical-align: baseline;
            line-height: inherit;
            border-radius: 0;
            -webkit-box-decoration-break: clone;
            box-decoration-break: clone;
            word-break: normal !important;
            overflow-wrap: normal !important;
            white-space: inherit;
            cursor: pointer;
        }

        .matching-table th, .matching-table td {
            vertical-align: middle;
        }
        
        .building-col {
            min-width: 220px;
            white-space: normal;
            font-size: 18px;
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
        
        .modal-backdrop.show {
            opacity: 0.85 !important;
            background-color: #000 !important;
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
            padding: 10px;
        ">
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
                <input type="hidden" name="test_name" value="{{ $testName ?? 'listeningTen' }}">
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
                    </div>
                    <p><em>You will hear a woman talking on the telephone to a man about a car he is selling (autos & vehicles).</em></p>
                    <p>Complete the notes below.</p>
                    <p>Write <strong>NO MORE THAN ONE WORD OR A NUMBER</strong> in each gap.</p>

                    <div class="border p-4 mt-3">
                        <h5 class="text-center"><strong>Car for sale (Mini)</strong></h5>
                        
                        <p class="mt-3">Color: <input type="text" name="q1" placeholder="1" class="inline-input" value="{{ $answers[1] ?? '' }}" id="1"></p>
                        
                        <p>Mileage: <input type="text" name="q2" placeholder="2" class="inline-input" value="{{ $answers[2] ?? '' }}" id="2"></p>
                        
                        <p>Previous owner was a <input type="text" name="q3" placeholder="3" class="inline-input" value="{{ $answers[3] ?? '' }}" id="3"></p>
                        
                        <p>Current owner has used car mainly for <input type="text" name="q4" placeholder="4" class="inline-input" value="{{ $answers[4] ?? '' }}" id="4"></p>
                        
                        <p><strong>Price:</strong> may accept offers from <input type="text" name="q5" placeholder="5" class="inline-input" value="{{ $answers[5] ?? '' }}" id="5"></p>
                        
                        <p>(Note: <input type="text" name="q6" placeholder="6" class="inline-input" value="{{ $answers[6] ?? '' }}" id="6"> not due for 5 months)</p>
                        
                        <p><strong>Condition:</strong> good (recently serviced)</p>
                        <p>Will need a new <input type="text" name="q7" placeholder="7" class="inline-input" value="{{ $answers[7] ?? '' }}" id="7"> soon</p>
                        
                        <p>Minor problem with a <input type="text" name="q8" placeholder="8" class="inline-input" value="{{ $answers[8] ?? '' }}" id="8"></p>
                        
                        <p><strong>Viewing</strong></p>
                        <p>Agreed to view the car on <input type="text" name="q9" placeholder="9" class="inline-input" value="{{ $answers[9] ?? '' }}" id="9">.</p>
                        
                        <p><strong>Address:</strong> 238, <input type="text" name="q10" placeholder="10" class="inline-input" value="{{ $answers[10] ?? '' }}" id="10"> Road.</p>
                    </div>
                </div>
            </div>

            <div class="tab-content" id="part2" style="margin-bottom: 80px;">
                <div class="question_part">
                    <h4>Part 2</h4>
                    <p>Questions 11–20</p>
                </div>

                <div class="mt-4">
                    <h4>Questions 11– 14</h4>
                    <p>You will hear a part of a podcast for visitors to the popular holiday region called the Treloar Valley.</p>
                    <p>Choose the correct answer.</p>

                    <div class="mb-4">
                        <p class="mt-3"><strong>11 The Treloar Valley passenger ferry</strong></p>
                        <div class="ms-3">
                            <label><input type="radio" name="q11" value="A" {{ ($answers[11] ?? '') == 'A' ? 'checked' : '' }} id="11"> usually starts services in April.</label><br>
                            <label><input type="radio" name="q11" value="B" {{ ($answers[11] ?? '') == 'B' ? 'checked' : '' }}> departs at the same time each day.</label><br>
                            <label><input type="radio" name="q11" value="C" {{ ($answers[11] ?? '') == 'C' ? 'checked' : '' }}> is the main means of transport for local villagers.</label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <p class="mt-3"><strong>12 What does the speaker say about the river cruise?</strong></p>
                        <div class="ms-3">
                            <label><input type="radio" name="q12" value="A" {{ ($answers[12] ?? '') == 'A' ? 'checked' : '' }} id="12"> It can be combined with a train journey.</label><br>
                            <label><input type="radio" name="q12" value="B" {{ ($answers[12] ?? '') == 'B' ? 'checked' : '' }}> It's unsuitable for people who have walking difficulties.</label><br>
                            <label><input type="radio" name="q12" value="C" {{ ($answers[12] ?? '') == 'C' ? 'checked' : '' }}> The return journey takes up to four hours.</label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <p class="mt-3"><strong>13 What information is given about train services in the area?</strong></p>
                        <div class="ms-3">
                            <label><input type="radio" name="q13" value="A" {{ ($answers[13] ?? '') == 'A' ? 'checked' : '' }} id="13"> Trains run non-stop between Calton and Plymouth.</label><br>
                            <label><input type="radio" name="q13" value="B" {{ ($answers[13] ?? '') == 'B' ? 'checked' : '' }}> One section of the rail track is raised.</label><br>
                            <label><input type="radio" name="q13" value="C" {{ ($answers[13] ?? '') == 'C' ? 'checked' : '' }}> Bookings can be made by telephone or the Internet.</label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <p class="mt-3"><strong>14 The 'Rover' bus ticket</strong></p>
                        <div class="ms-3">
                            <label><input type="radio" name="q14" value="A" {{ ($answers[14] ?? '') == 'A' ? 'checked' : '' }} id="14"> can be used for up to five journeys a day.</label><br>
                            <label><input type="radio" name="q14" value="B" {{ ($answers[14] ?? '') == 'B' ? 'checked' : '' }}> is valid for weekend travel only.</label><br>
                            <label><input type="radio" name="q14" value="C" {{ ($answers[14] ?? '') == 'C' ? 'checked' : '' }}> has recently gone down in price.</label>
                        </div>
                    </div>

                    <hr class="my-4">

                    <h4>Questions 15–20</h4>
                    <p><strong>Label the map below</strong></p>
                    <p>The map has eight labels (A-H). Choose the correct label for each building.</p>

                    <div class="row mt-4">
                        <div class="col-md-7 border-end">
                            <table class="table table-bordered matching-table" style="background: white; width: 80%;">
                                <thead>
                                    <tr style="background: #e8f4f8;">
                                        <th style="width: 50px; text-align: center; font-size: 18px;">#</th>
                                        <th style="width: 80px;" class="building-col">Building</th>
                                        @foreach(range('A', 'H') as $letter)
                                            <th style="width: 45px; text-align: center; font-size: 18px;">{{ $letter }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $buildings = [
                                            15 => 'Bus stop',
                                            16 => 'Car park',
                                            17 => 'Museum',
                                            18 => 'Mill',
                                            19 => 'Potter\'s studio',
                                            20 => 'Cafe'
                                        ];
                                    @endphp
                                    @foreach($buildings as $qNum => $building)
                                        <tr>
                                            <td style="text-align: center; font-weight: bold;">{{ $qNum }}</td>
                                            <td>{{ $building }}</td>
                                            @foreach(range('A', 'H') as $letter)
                                                <td class="clickable-cell" data-question="{{ $qNum }}" data-value="{{ $letter }}" style="text-align: center; cursor: pointer; user-select: none; height: 50px; line-height: 25px; vertical-align: middle; font-size: 16px;">
                                                    {{ ($answers[$qNum] ?? '') == $letter ? '✓' : '' }}
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-5">
                            <div style="text-align: center;">
                                <img src="{{ asset('images/listening/fff.png') }}" alt="CALTON Map" style="width: 100%; border: 2px solid #000; border-radius: 8px;">
                            </div>
                        </div>
                    </div>

                    <!-- Hidden inputs to store selected values -->
                    @foreach(range(15, 20) as $qNum)
                        <input type="hidden" name="q{{ $qNum }}" id="{{ $qNum }}" value="{{ $answers[$qNum] ?? '' }}">
                    @endforeach
                </div>
            </div>

            <div class="tab-content" id="part3" style="margin-bottom: 80px;">
                <div class="question_part">
                    <h4>Part 3</h4>
                    <p>Questions 21–30</p>
                </div>

                <div class="mt-4">
                    <h4>Questions 21–24</h4>
                    <p>You will hear Geography students. An older student, called Howard, is giving advice to a younger student, called Joanne, on writing her dissertation.</p>
                    <p>Choose the correct answer.</p>
                    <p><strong>Advice on writing a dissertation</strong></p>

                    <div class="mb-4">
                        <p class="mt-3"><strong>21 What does Howard say about the experience of writing his dissertation?</strong></p>
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
                        <p class="mt-3"><strong>23 What does Howard say was his main worry a year previously?</strong></p>
                        <div class="ms-3">
                            <label><input type="radio" name="q23" value="A" {{ ($answers[23] ?? '') == 'A' ? 'checked' : '' }} id="23"> Forgetting what he'd read about.</label><br>
                            <label><input type="radio" name="q23" value="B" {{ ($answers[23] ?? '') == 'B' ? 'checked' : '' }}> Not understanding what he'd read.</label><br>
                            <label><input type="radio" name="q23" value="C" {{ ($answers[23] ?? '') == 'C' ? 'checked' : '' }}> Taking such a long time to read each book.</label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <p class="mt-3"><strong>24 What motivated Howard to start writing his dissertation?</strong></p>
                        <div class="ms-3">
                            <label><input type="radio" name="q24" value="A" {{ ($answers[24] ?? '') == 'A' ? 'checked' : '' }} id="24"> Talking to his tutor about his problems.</label><br>
                            <label><input type="radio" name="q24" value="B" {{ ($answers[24] ?? '') == 'B' ? 'checked' : '' }}> Seeing an inspirational TV show.</label><br>
                            <label><input type="radio" name="q24" value="C" {{ ($answers[24] ?? '') == 'C' ? 'checked' : '' }}> Reading a controversial journal article.</label>
                        </div>
                    </div>

                    <hr class="my-4">

                    <h4>Questions 25–26</h4>
                    <p>Choose <strong>TWO</strong> correct answers.</p>
                    <p>What <strong>TWO</strong> things does Howard advise Joanne to do in the first month of tutorials?</p>

                    <div id="q25-26-container">
                        <label style="display: block; margin: 10px 0;">
                            <input type="checkbox" class="q25-26-checkbox" value="A" {{ ($answers[25] ?? '') == 'A' || ($answers[26] ?? '') == 'A' ? 'checked' : '' }}> See her tutor every week.
                        </label>
                        <label style="display: block; margin: 10px 0;">
                            <input type="checkbox" class="q25-26-checkbox" value="B" {{ ($answers[25] ?? '') == 'B' || ($answers[26] ?? '') == 'B' ? 'checked' : '' }}> Review all the module booklists.
                        </label>
                        <label style="display: block; margin: 10px 0;">
                            <input type="checkbox" class="q25-26-checkbox" value="C" {{ ($answers[25] ?? '') == 'C' || ($answers[26] ?? '') == 'C' ? 'checked' : '' }}> Buy all the key books.
                        </label>
                        <label style="display: block; margin: 10px 0;">
                            <input type="checkbox" class="q25-26-checkbox" value="D" {{ ($answers[25] ?? '') == 'D' || ($answers[26] ?? '') == 'D' ? 'checked' : '' }}> Write full references for everything she reads.
                        </label>
                        <label style="display: block; margin: 10px 0;">
                            <input type="checkbox" class="q25-26-checkbox" value="E" {{ ($answers[25] ?? '') == 'E' || ($answers[26] ?? '') == 'E' ? 'checked' : '' }}> Write a draft of the first chapter.
                        </label>
                        <input type="hidden" name="q25" id="q25" value="{{ $answers[25] ?? '' }}">
                        <input type="hidden" name="q26" id="q26" value="{{ $answers[26] ?? '' }}">
                    </div>

                    <hr class="my-4">

                    <h4>Questions 27–28</h4>
                    <p>Choose <strong>TWO</strong> correct answers.</p>
                    <p>What <strong>TWO</strong> things does Howard say about library provision?</p>

                    <div id="q27-28-container">
                        <label style="display: block; margin: 10px 0;">
                            <input type="checkbox" class="q27-28-checkbox" value="A" {{ ($answers[27] ?? '') == 'A' || ($answers[28] ?? '') == 'A' ? 'checked' : '' }}> Staff are particularly helpful to undergraduates.
                        </label>
                        <label style="display: block; margin: 10px 0;">
                            <input type="checkbox" class="q27-28-checkbox" value="B" {{ ($answers[27] ?? '') == 'B' || ($answers[28] ?? '') == 'B' ? 'checked' : '' }}> Inter-library loans are very reliable.
                        </label>
                        <label style="display: block; margin: 10px 0;">
                            <input type="checkbox" class="q27-28-checkbox" value="C" {{ ($answers[27] ?? '') == 'C' || ($answers[28] ?? '') == 'C' ? 'checked' : '' }}> Students can borrow extra books when writing a dissertation.
                        </label>
                        <label style="display: block; margin: 10px 0;">
                            <input type="checkbox" class="q27-28-checkbox" value="D" {{ ($answers[27] ?? '') == 'D' || ($answers[28] ?? '') == 'D' ? 'checked' : '' }}> Staff recommend relevant old dissertations.
                        </label>
                        <label style="display: block; margin: 10px 0;">
                            <input type="checkbox" class="q27-28-checkbox" value="E" {{ ($answers[27] ?? '') == 'E' || ($answers[28] ?? '') == 'E' ? 'checked' : '' }}> It's difficult to access electronic resources.
                        </label>
                        <input type="hidden" name="q27" id="q27" value="{{ $answers[27] ?? '' }}">
                        <input type="hidden" name="q28" id="q28" value="{{ $answers[28] ?? '' }}">
                    </div>

                    <hr class="my-4">

                    <h4>Questions 29–30</h4>
                    <p>Choose <strong>TWO</strong> correct answers.</p>
                    <p>What <strong>TWO</strong> things does Joanne agree to discuss with her tutor?</p>

                    <div id="q29-30-container">
                        <label style="display: block; margin: 10px 0;">
                            <input type="checkbox" class="q29-30-checkbox" value="A" {{ ($answers[29] ?? '') == 'A' || ($answers[30] ?? '') == 'A' ? 'checked' : '' }}> The best ways to collaborate with other students.
                        </label>
                        <label style="display: block; margin: 10px 0;">
                            <input type="checkbox" class="q29-30-checkbox" value="B" {{ ($answers[29] ?? '') == 'B' || ($answers[30] ?? '') == 'B' ? 'checked' : '' }}> Who to get help from during college vacations.
                        </label>
                        <label style="display: block; margin: 10px 0;">
                            <input type="checkbox" class="q29-30-checkbox" value="C" {{ ($answers[29] ?? '') == 'C' || ($answers[30] ?? '') == 'C' ? 'checked' : '' }}> The best way to present the research.
                        </label>
                        <label style="display: block; margin: 10px 0;">
                            <input type="checkbox" class="q29-30-checkbox" value="D" {{ ($answers[29] ?? '') == 'D' || ($answers[30] ?? '') == 'D' ? 'checked' : '' }}> Whether she can use web sources.
                        </label>
                        <label style="display: block; margin: 10px 0;">
                            <input type="checkbox" class="q29-30-checkbox" value="E" {{ ($answers[29] ?? '') == 'E' || ($answers[30] ?? '') == 'E' ? 'checked' : '' }}> How to manage her study time.
                        </label>
                        <input type="hidden" name="q29" id="q29" value="{{ $answers[29] ?? '' }}">
                        <input type="hidden" name="q30" id="q30" value="{{ $answers[30] ?? '' }}">
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
                    <p><em>You will hear a psychology undergraduate describing the research she is currently doing on expertise in creative writing.</em></p>
                    <p>The flow-chart has ten gaps. Choose the correct answer and move it into the gap.</p>

                    <div class="row mt-3">
                        
                        <div class="col-md-7 text-center" >
                            <h5 style="font-weight: bold; margin-bottom: 20px;">Expertise in creative writing</h5>
                            <div style="background: white; padding: 0;">
                                <p style="margin-bottom: 8px;">Background - researcher had previously studied <input type="text" name="q31" placeholder="31" class="drop-zone-q31" value="{{ $answers[31] ?? '' }}" id="31" readonly style="padding: 8px 12px; width: 150px; margin: 0 5px; border: 1px solid #ccc; border-radius: 4px;"></p>
                                <p style="text-align: center; margin: 5px 0; color: #007bff; font-size: 18px;">↓</p>

                                <p style="margin-bottom: 8px;">Had initial idea for research - inspired by a book (the <input type="text" name="q32" placeholder="32" class="drop-zone-q31" value="{{ $answers[32] ?? '' }}" id="32" readonly style="padding: 8px 12px; width: 150px; margin: 0 5px; border: 1px solid #ccc; border-radius: 4px;"> of a famous novelist).</p>
                                <p style="text-align: center; margin: 5px 0; color: #007bff; font-size: 18px;">↓</p>

                                <p style="margin-bottom: 8px;">Posed initial question - why do some people become experts whilst others don't?</p>
                                <p style="text-align: center; margin: 5px 0; color: #007bff; font-size: 18px;">↓</p>

                                <p style="margin-bottom: 8px;">Read expertise research in different fields.<br>
                                Avoided studies conducted in a <input type="text" name="q33" placeholder="33" class="drop-zone-q31" value="{{ $answers[33] ?? '' }}" id="33" readonly style="padding: 8px 12px; width: 150px; margin: 0 5px; border: 1px solid #ccc; border-radius: 4px;"> because too controlled.</p>
                                <p style="text-align: center; margin: 5px 0; color: #007bff; font-size: 18px;">↓</p>

                                <p style="margin-bottom: 8px;">Most helpful studies-research into <input type="text" name="q34" placeholder="34" class="drop-zone-q31" value="{{ $answers[34] ?? '' }}" id="34" readonly style="padding: 8px 12px; width: 150px; margin: 0 5px; border: 1px solid #ccc; border-radius: 4px;"> e.g. waiting tables.<br>
                                Found participants: four true <input type="text" name="q35" placeholder="35" class="drop-zone-q31" value="{{ $answers[35] ?? '' }}" id="35" readonly style="padding: 8px 12px; width: 150px; margin: 0 5px; border: 1px solid #ccc; border-radius: 4px;"> in creative writing (easy to find) and four with extensive experience.</p>
                                <p style="text-align: center; margin: 5px 0; color: #007bff; font-size: 18px;">↓</p>

                                <p style="margin-bottom: 8px;">Using "think aloud" techniques, gathered <input type="text" name="q36" placeholder="36" class="drop-zone-q31" value="{{ $answers[36] ?? '' }}" id="36" readonly style="padding: 8px 12px; width: 150px; margin: 0 5px; border: 1px solid #ccc; border-radius: 4px;"> data from inexperienced writer.<br>
                                (During session - assistant made <input type="text" name="q37" placeholder="37" class="drop-zone-q31" value="{{ $answers[37] ?? '' }}" id="37" readonly style="padding: 8px 12px; width: 150px; margin: 0 5px; border: 1px solid #ccc; border-radius: 4px;"> recordings).<br>
                                Gathered data from experienced writers.</p>
                                <p style="text-align: center; margin: 5px 0; color: #007bff; font-size: 18px;">↓</p>

                                <p style="margin-bottom: 8px;">Compared two data sets and generated a <input type="text" name="q38" placeholder="38" class="drop-zone-q31" value="{{ $answers[38] ?? '' }}" id="38" readonly style="padding: 8px 12px; width: 150px; margin: 0 5px; border: 1px solid #ccc; border-radius: 4px;"> for analysis</p>
                                <p style="text-align: center; margin: 5px 0; color: #007bff; font-size: 18px;">↓</p>

                                <p style="margin-bottom: 0;">(Identified five major stages in writing will be refined later).<br>
                                Got an expert <input type="text" name="q39" placeholder="39" class="drop-zone-q31" value="{{ $answers[39] ?? '' }}" id="39" readonly style="padding: 8px 12px; width: 150px; margin: 0 5px; border: 1px solid #ccc; border-radius: 4px;"> to evaluate the quality of the different products.<br>
                                Identified the most effective <input type="text" name="q40" placeholder="40" class="drop-zone-q31" value="{{ $answers[40] ?? '' }}" id="40" readonly style="padding: 8px 12px; width: 150px; margin: 0 5px; border: 1px solid #ccc; border-radius: 4px;"> of stages in producing text.</p>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <h5 style="font-weight: bold; margin-bottom: 20px;">List of Options</h5>
                            <div style="background: white; padding: 0;">
                                <div style="margin-bottom: 10px;">
                                    <span class="draggable-q31" draggable="true" data-value="editor" 
                                          style="display: inline-block; padding: 8px 16px; background: #f5f5f5; border-radius: 4px; cursor: move; user-select: none; box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.08);">
                                        editor
                                    </span>
                                </div>
                                <div style="margin-bottom: 10px;">
                                    <span class="draggable-q31" draggable="true" data-value="autobiography" 
                                          style="display: inline-block; padding: 8px 16px; background: #f5f5f5; border-radius: 4px; cursor: move; user-select: none; box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.08);">
                                        autobiography
                                    </span>
                                </div>
                                
                                <div style="margin-bottom: 10px;">
                                    <span class="draggable-q31" draggable="true" data-value="video" 
                                          style="display: inline-block; padding: 8px 16px; background: #f5f5f5; border-radius: 4px; cursor: move; user-select: none; box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.08);">
                                        video
                                    </span>
                                </div>
                                <div style="margin-bottom: 10px;">
                                    <span class="draggable-q31" draggable="true" data-value="English literature" 
                                          style="display: inline-block; padding: 8px 16px; background: #f5f5f5; border-radius: 4px; cursor: move; user-select: none; box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.08);">
                                        english literature
                                    </span>
                                </div>
                                <div style="margin-bottom: 10px;">
                                    <span class="draggable-q31" draggable="true" data-value="novices" 
                                          style="display: inline-block; padding: 8px 16px; background: #f5f5f5; border-radius: 4px; cursor: move; user-select: none; box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.08);">
                                        novices
                                    </span>
                                </div>
                                <div style="margin-bottom: 10px;">
                                    <span class="draggable-q31" draggable="true" data-value="experimental" 
                                          style="display: inline-block; padding: 8px 16px; background: #f5f5f5; border-radius: 4px; cursor: move; user-select: none; box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.08);">
                                        experimental
                                    </span>
                                </div>
                                
                                <div style="margin-bottom: 10px;">
                                    <span class="draggable-q31" draggable="true" data-value="framework" 
                                          style="display: inline-block; padding: 8px 16px; background: #f5f5f5; border-radius: 4px; cursor: move; user-select: none; box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.08);">
                                        framework
                                    </span>
                                </div>
                                <div style="margin-bottom: 10px;">
                                    <span class="draggable-q31" draggable="true" data-value="practical skills" 
                                          style="display: inline-block; padding: 8px 16px; background: #f5f5f5; border-radius: 4px; cursor: move; user-select: none; box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.08);">
                                        practical skills
                                    </span>
                                </div>
                                <div style="margin-bottom: 10px;">
                                    <span class="draggable-q31" draggable="true" data-value="sequence" 
                                          style="display: inline-block; padding: 8px 16px; background: #f5f5f5; border-radius: 4px; cursor: move; user-select: none; box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.08);">
                                        sequence
                                    </span>
                                </div>
                                <div style="margin-bottom: 10px;">
                                    <span class="draggable-q31" draggable="true" data-value="laboratory" 
                                          style="display: inline-block; padding: 8px 16px; background: #f5f5f5; border-radius: 4px; cursor: move; user-select: none; box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.08);">
                                        laboratory
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
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
                        <input type="text" 
                               class="form-control" 
                               id="studentIdInput" 
                               placeholder="Enter your Student ID" 
                               minlength="8"
                               inputmode="text"
                               pattern="[A-Za-z0-9]{8,}"
                               autocomplete="off"
                               form="nonexistent"
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
            const specificAudio = new Audio('{{ asset("audio/110.MP3") }}');
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

            // Allow Enter key to trigger Start Test button
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
                
                // Store Student ID in sessionStorage
                sessionStorage.setItem('examStudentId', studentId);
                
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
                
                // Get Student ID from sessionStorage and populate hidden field
                const examStudentId = sessionStorage.getItem('examStudentId');
                if (examStudentId) {
                    document.getElementById('examStudentIdField').value = examStudentId;
                }
                
                document.getElementById('testForm').submit();
            });
        });

        // Autosave on input change (radio, text, checkbox) with 10-second debouncing

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

        const testForm = document.getElementById('testForm');
        if (testForm) {
            testForm.addEventListener('submit', function() {
                if (autosaveDebounceTimer) {
                    clearTimeout(autosaveDebounceTimer);
                    autosaveDebounceTimer = null;
                }
                flushDirtyInputs();
            });
        }

        document.querySelectorAll('input[type="text"], input[type="checkbox"], input[type="radio"]').forEach(input => {
            input.addEventListener('change', function() {
                markDirty(this);
            });
        });

        document.querySelectorAll('.options').forEach(optionList => {
            const range = optionList.getAttribute('data-range');
            const [start, end] = range.split('-').map(Number);
            const maxSelections = end - start + 1;
            const questionNumbers = [];
            for (let i = start; i <= end; i++) {
                questionNumbers.push(i);
            }

            optionList.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const checked = optionList.querySelectorAll('input[type="checkbox"]:checked');
                    if (checked.length > maxSelections) {
                        this.checked = false;
                    } else {
                        // Activate bottom question numbers based on selection count
                        const checkedCount = checked.length;
                        
                        // Remove active from all question numbers in this range
                        questionNumbers.forEach(qNum => {
                            const link = document.querySelector(`.question-link[data-question="${qNum}"]`);
                            if (link) link.classList.remove('active');
                        });
                        
                        // Activate the appropriate question number based on how many are selected
                        if (checkedCount > 0 && checkedCount <= questionNumbers.length) {
                            const activeQuestionNum = questionNumbers[checkedCount - 1];
                            const activeLink = document.querySelector(`.question-link[data-question="${activeQuestionNum}"]`);
                            if (activeLink) activeLink.classList.add('active');
                            
                            // Update currentIndex for arrow navigation
                            if (typeof window.setActiveQuestionByNumber === 'function') {
                                window.setActiveQuestionByNumber(activeQuestionNum);
                            }
                        }
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

            window.setActiveQuestionByNumber = function(qNum) {
                const qStr = String(qNum);
                const linkIndex = allLinks.findIndex(link => link.getAttribute('data-question') === qStr);
                if (linkIndex !== -1) {
                    currentIndex = linkIndex;
                    allLinks.forEach(link => link.classList.remove('active'));
                    allLinks[linkIndex].classList.add('active');
                }
            }

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

                    // Hide placeholder on focus
                    if (this.placeholder) {
                        this.dataset.placeholder = this.placeholder;
                        this.placeholder = '';
                    }
                });

                input.addEventListener('blur', function() {
                    // Restore placeholder on blur if input is empty
                    if (this.dataset.placeholder && this.value === '') {
                        this.placeholder = this.dataset.placeholder;
                    }
                });
            });

            setActiveQuestion(0);
        })();
    </script>



    <!-- highlight and note script  -->
    <script>
        // Highlight and Notes Functionality
        let selectionRange = null;
        let clickedMark = null;
        let activePopup = null;
        let currentSelectedText = "";

        const contextMenu = document.getElementById('customContextMenu');
        const highlightOption = document.getElementById('highlightOption');
        const notesOption = document.getElementById('notesOption');
        const clearOption = document.getElementById('clearOption');
        const allClearOption = document.getElementById('allClear');
        const sidebar = document.getElementById('sidebar');
        const toggleSidebar = document.getElementById('noteToggle');
        const closeSidebar = document.getElementById('closeSidebar');

        // Sidebar toggle functionality
        toggleSidebar.addEventListener('click', function() {
            if (sidebar.style.right === '0px') {
                sidebar.style.right = '-300px';
            } else {
                sidebar.style.right = '0px';
            }
        });

        const sidebarCloseHandler = function(e) {
            e.preventDefault();
            e.stopPropagation();
            sidebar.style.right = '-300px';
        };

        closeSidebar.addEventListener('click', sidebarCloseHandler);

        // Context menu on right-click
        document.addEventListener('contextmenu', function(e) {
            e.preventDefault();
            
            const selection = window.getSelection();
            clickedMark = null;
            currentSelectedText = selection.toString();
            
            // Check if clicked on highlighted text (mark element) or inside one
            let target = e.target;
            while (target && !target.classList?.contains('text-highlight') && target.parentNode) {
                target = target.parentNode;
                if (target.classList?.contains('text-highlight')) break;
            }
            
            if (target && target.classList?.contains('text-highlight')) {
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
            
            if (startContainer === endContainer && startContainer.nodeType === Node.TEXT_NODE) {
                const mark = document.createElement('span');
                mark.className = 'text-highlight';
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
            
            const textNodes = [];
            const walker = document.createTreeWalker(range.commonAncestorContainer, NodeFilter.SHOW_TEXT, null, false);
            let node;
            let inRange = false;

            // Check if startContainer is a text node. If not, finding it might fail.
            if (startContainer.nodeType !== Node.TEXT_NODE) {
                // If it's an element, the actual start is likely one of its children
                inRange = true; // Fallback to grab everything in the walker
            }

            while (node = walker.nextNode()) {
                if (node === startContainer || (startContainer.contains && startContainer.contains(node))) inRange = true;
                if (inRange) {
                    textNodes.push(node);
                }
                if (node === endContainer || (endContainer.contains && endContainer.contains(node))) break;
            }
            
            textNodes.forEach((textNode) => {
                let start = 0;
                let end = textNode.textContent.length;
                if (textNode === startContainer) start = startOffset;
                if (textNode === endContainer) end = endOffset;
                if (start >= end) return;
                
                const selectedText = textNode.textContent.substring(start, end);
                if (!selectedText.trim()) return;
                const mark = document.createElement('span');
                mark.className = 'text-highlight';
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

        document.addEventListener('click', function(e) {
            if (!contextMenu.contains(e.target)) {
                contextMenu.style.display = 'none';
            }
        });

        // Highlight only
        highlightOption.addEventListener('click', function() {
            if (selectionRange) {
                try {
                    const selectedText = currentSelectedText;
                    const createdMarks = highlightRange(selectionRange);
                    if (createdMarks.length > 0) {
                        const markId = Date.now().toString();
                        createdMarks.forEach((mark) => {
                            mark.dataset.markId = markId;
                            mark.dataset.headerText = selectedText;
                        });
                    }
                    window.getSelection().removeAllRanges();
                } catch (err) { console.log('Highlight error:', err); }
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
                try {
                    // Get selected text using the captured text from contextmenu event to capture across elements
                    const selectedText = currentSelectedText;
                    const createdMarks = highlightRange(selectionRange);
                    if (createdMarks.length > 0) {
                        const markId = Date.now().toString();
                        const firstMark = createdMarks[0];
                        createdMarks.forEach((mark) => {
                            mark.setAttribute('data-tooltip', '');
                            mark.setAttribute('data-note', '');
                            mark.dataset.markId = markId;
                            mark.dataset.headerText = selectedText;
                            mark.addEventListener('click', function(e) {
                                e.stopPropagation();
                                showNotePopup(mark);
                            });
                        });
                        const noteDiv = document.createElement('div');
                        noteDiv.classList.add('sidebar-note-item');
                        noteDiv.dataset.markId = markId;
                        noteDiv.innerHTML = `<div class="sidebar-header" style="margin-bottom: 3px; cursor: pointer;">${selectedText}</div><div class="sidebar-note-content" style="color: #666; white-space: pre-wrap;"></div>`;
                        noteDiv.style.borderBottom = '1px solid #ccc';
                        noteDiv.style.padding = '8px';
                        sidebar.appendChild(noteDiv);
                        noteDiv.addEventListener('click', () => showNotePopup(firstMark));
                        setTimeout(() => showNotePopup(firstMark), 50);
                    }
                    window.getSelection().removeAllRanges();
                } catch (err) { console.log('Note highlight error:', err); }
            }
            contextMenu.style.display = 'none';
        });

        clearOption.addEventListener('click', function() {
            if (clickedMark) {
                const markId = clickedMark.dataset.markId;
                
                if (markId) {
                    // Remove from sidebar
                    const sidebarItem = document.querySelector(`.sidebar-note-item[data-mark-id="${markId}"]`);
                    if (sidebarItem) {
                        sidebarItem.remove();
                    }

                    // Remove all highlight spans that share this markId
                    const linkedMarks = document.querySelectorAll(`.text-highlight[data-mark-id="${markId}"]`);
                    linkedMarks.forEach(m => {
                        const parent = m.parentNode;
                        while (m.firstChild) {
                            parent.insertBefore(m.firstChild, m);
                        }
                        parent.removeChild(m);
                    });
                } else {
                    // Fallback for single highlights without markId
                    const parent = clickedMark.parentNode;
                    while (clickedMark.firstChild) {
                        parent.insertBefore(clickedMark.firstChild, clickedMark);
                    }
                    parent.removeChild(clickedMark);
                }
                
                clickedMark = null;
            }
            contextMenu.style.display = 'none';
        });

        // Clear all highlights and notes
        allClearOption.addEventListener('click', function() {
            document.querySelectorAll('.text-highlight').forEach(marked => {
                marked.replaceWith(document.createTextNode(marked.innerText || marked.textContent));
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
            });
            
            // Auto close the notes area after clearing all
            setTimeout(() => {
                sidebar.style.right = '-300px';
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
                <div class="popup-header" contenteditable="true" style="font-weight: bold; cursor: text; padding: 8px; background: rgba(0,0,0,0.05); margin-bottom: 5px; border: 1px solid #ccc; outline: none; white-space: pre-wrap;">${mark.dataset.headerText || mark.innerText}</div>
                <textarea placeholder="Add your note here..." style="width:100%; border:1px solid #ccc; background-color:yellow; min-height: 60px; cursor: text; padding: 5px; resize: vertical;">${mark.dataset.note || ''}</textarea>
            `;
            document.body.appendChild(notePopup);
            activePopup = notePopup;

            // Position popup near mark
            const rect = mark.getBoundingClientRect();
            notePopup.style.left = rect.left + window.scrollX + 'px';
            notePopup.style.top = rect.bottom + window.scrollY + 5 + 'px';

            // Close button
            notePopup.querySelector('.close-note').addEventListener('click', (e) => {
                e.stopPropagation();
                e.preventDefault();
                notePopup.remove();
                activePopup = null;
                document.removeEventListener('click', handleOutsideClick);
            });

            // Save note text on input (real-time)
            const textarea = notePopup.querySelector('textarea');
            
            function updateNote() {
                const noteVal = textarea.value;
                const markId = mark.dataset.markId;
                
                if (markId) {
                    // Update dataset.note on ALL linked marks
                    const linkedMarks = document.querySelectorAll(`.text-highlight[data-mark-id="${markId}"]`);
                    linkedMarks.forEach(m => {
                        m.dataset.note = noteVal;
                    });
                    
                    // Update sidebar note content
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
            if (activePopup && !activePopup.contains(e.target) && !e.target.classList?.contains('text-highlight')) {
                activePopup.remove();
                activePopup = null;
                document.removeEventListener('click', handleOutsideClick);
            }
        }

        // Clickable Table Cells for Questions 15-20
        document.addEventListener('DOMContentLoaded', function() {
            const clickableCells = document.querySelectorAll('.clickable-cell');
            
            clickableCells.forEach(cell => {
                cell.addEventListener('click', function() {
                    const question = this.getAttribute('data-question');
                    const value = this.getAttribute('data-value');
                    const hiddenInput = document.getElementById(question);
                    
                    // Get all cells for this question
                    const rowCells = document.querySelectorAll(`.clickable-cell[data-question="${question}"]`);
                    
                    // Check if this cell is already selected
                    const isSelected = this.textContent.trim() === '✓';
                    
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
                    }

                    if (typeof window.setActiveQuestionByNumber === 'function') {
                        window.setActiveQuestionByNumber(question);
                    }
                });
                
                // Add hover effect
                cell.addEventListener('mouseenter', function() {
                    if (this.textContent.trim() !== '✓') {
                        this.style.backgroundColor = '#f0f0f0';
                    }
                });
                
                cell.addEventListener('mouseleave', function() {
                    if (this.textContent.trim() !== '✓') {
                        this.style.backgroundColor = '';
                    }
                });
            });
        });
    </script>

    {{-- Drag and Drop for Questions 31-40 with swap functionality --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const draggableFeatures = document.querySelectorAll('.draggable-q31');
            const dropZones = document.querySelectorAll('.drop-zone-q31');
            let draggedElement = null;
            let draggedFromInput = false;
            
            const originalParents = new Map();
            draggableFeatures.forEach(feature => {
                originalParents.set(feature.getAttribute('data-value'), feature.parentElement);
            });
            
            function calculateInputWidth(text) {
                const span = document.createElement('span');
                span.style.visibility = 'hidden';
                span.style.position = 'absolute';
                span.style.whiteSpace = 'nowrap';
                span.style.padding = '8px 16px';
                span.style.fontSize = window.getComputedStyle(document.querySelector('.drop-zone-q31')).fontSize;
                span.textContent = text;
                document.body.appendChild(span);
                const width = span.offsetWidth;
                document.body.removeChild(span);
                return width + 10;
            }
            
            function updateInputStyle(input) {
                if (input.value && input.value.trim() !== '') {
                    const dynamicWidth = calculateInputWidth(input.value);
                    input.setAttribute('style', `padding: 8px 16px; width: ${dynamicWidth}px; margin: 0 5px; border-radius: 4px; border: none !important; box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.08) !important; background: #e8e8e8 !important;`);
                } else {
                    input.setAttribute('style', 'padding: 8px 12px; width: 150px; margin: 0 5px; border: 1px solid #ccc; border-radius: 4px; box-shadow: none; background: white;');
                }
            }
            
            function returnToOriginalPosition(value) {
                draggableFeatures.forEach(feature => {
                    if (feature.getAttribute('data-value') === value) {
                        const originalParent = originalParents.get(value);
                        if (originalParent && feature.parentElement !== originalParent) {
                            originalParent.appendChild(feature);
                        }
                        feature.style.display = 'inline-block';
                    }
                });
            }
            
            draggableFeatures.forEach(feature => {
                feature.addEventListener('dragstart', function(e) {
                    draggedElement = this;
                    draggedFromInput = false;
                    e.dataTransfer.setData('text/plain', this.getAttribute('data-value'));
                    e.dataTransfer.setData('element-id', this.getAttribute('data-value'));
                    this.style.opacity = '0.4';
                });
                
                feature.addEventListener('dragend', function(e) {
                    this.style.opacity = '1';
                });
            });
            
            dropZones.forEach(zone => {
                zone.setAttribute('draggable', 'true');
                
                zone.addEventListener('dragstart', function(e) {
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
                
                zone.addEventListener('dragend', function(e) {
                    this.style.opacity = '1';
                });
                
                zone.addEventListener('dragover', function(e) {
                    e.preventDefault();
                    e.dataTransfer.dropEffect = 'move';
                    this.style.backgroundColor = '#e3f2fd';
                    this.style.borderColor = '#2196F3';
                });
                
                zone.addEventListener('dragleave', function(e) {
                    this.style.backgroundColor = '';
                    this.style.borderColor = '#ccc';
                });
                
                zone.addEventListener('drop', function(e) {
                    e.preventDefault();
                    const value = e.dataTransfer.getData('text/plain');
                    const fromInput = e.dataTransfer.getData('from-input');
                    
                    if (this.value && this.value.trim() !== '') {
                        const oldValue = this.value;
                        returnToOriginalPosition(oldValue);
                    }
                    
                    this.value = value;
                    
                    if (!fromInput && draggedElement) {
                        draggedElement.style.display = 'none';
                    }
                    
                    if (fromInput && draggedElement && draggedElement !== this) {
                        draggedElement.value = '';
                        updateInputStyle(draggedElement);
                    }
                    
                    updateInputStyle(this);

                    if (typeof window.setActiveQuestionByNumber === 'function') {
                        window.setActiveQuestionByNumber(this.id);
                    }
                    
                    this.style.backgroundColor = '#e8f5e9';
                    setTimeout(() => {
                        updateInputStyle(this);
                    }, 300);
                });
            });
            
            const listContainers = document.querySelectorAll('.col-md-5');
            listContainers.forEach(listContainer => {
                listContainer.addEventListener('dragover', function(e) {
                    e.preventDefault();
                    e.dataTransfer.dropEffect = 'move';
                });
                
                listContainer.addEventListener('drop', function(e) {
                    const fromInput = e.dataTransfer.getData('from-input');
                    if (fromInput && draggedElement) {
                        e.preventDefault();
                        const value = e.dataTransfer.getData('text/plain');
                        
                        returnToOriginalPosition(value);
                        
                        if (draggedElement.tagName === 'INPUT') {
                            draggedElement.value = '';
                            updateInputStyle(draggedElement);
                        }
                    }
                });
            });
            
            dropZones.forEach(zone => {
                updateInputStyle(zone);
            });
        });
    </script>

    {{-- Questions 25-30 sequential checkbox script --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Questions 25-26
            const container25_26 = document.getElementById('q25-26-container');
            const checkboxes25_26 = container25_26 ? Array.from(container25_26.querySelectorAll('.q25-26-checkbox')) : [];
            const q25Hidden = document.getElementById('q25');
            const q26Hidden = document.getElementById('q26');

            if (checkboxes25_26.length && q25Hidden && q26Hidden) {
                function syncHidden25_26() {
                    const selected = checkboxes25_26.filter(cb => cb.checked).map(cb => cb.value);
                    q25Hidden.value = selected[0] || '';
                    q26Hidden.value = selected[1] || '';

                    q25Hidden.dispatchEvent(new Event('change'));
                    q26Hidden.dispatchEvent(new Event('change'));

                    // Activate question number based on selection count
                    const targetQuestion = selected.length === 1 ? '25' : (selected.length === 2 ? '26' : null);
                    if (targetQuestion) {
                        document.querySelectorAll('.question-link').forEach(l => l.classList.remove('active'));
                        const targetLink = document.querySelector(`.question-link[data-question="${targetQuestion}"]`);
                        if (targetLink) targetLink.classList.add('active');
                    }
                }

                checkboxes25_26.forEach(cb => {
                    cb.addEventListener('change', function() {
                        const checkedCount = checkboxes25_26.filter(cb => cb.checked).length;
                        if (checkedCount > 2) {
                            this.checked = false;
                            return;
                        }
                        syncHidden25_26();
                    });
                });
            }

            // Questions 27-28
            const container27_28 = document.getElementById('q27-28-container');
            const checkboxes27_28 = container27_28 ? Array.from(container27_28.querySelectorAll('.q27-28-checkbox')) : [];
            const q27Hidden = document.getElementById('q27');
            const q28Hidden = document.getElementById('q28');

            if (checkboxes27_28.length && q27Hidden && q28Hidden) {
                function syncHidden27_28() {
                    const selected = checkboxes27_28.filter(cb => cb.checked).map(cb => cb.value);
                    q27Hidden.value = selected[0] || '';
                    q28Hidden.value = selected[1] || '';

                    q27Hidden.dispatchEvent(new Event('change'));
                    q28Hidden.dispatchEvent(new Event('change'));

                    // Activate question number based on selection count
                    const targetQuestion = selected.length === 1 ? '27' : (selected.length === 2 ? '28' : null);
                    if (targetQuestion) {
                        document.querySelectorAll('.question-link').forEach(l => l.classList.remove('active'));
                        const targetLink = document.querySelector(`.question-link[data-question="${targetQuestion}"]`);
                        if (targetLink) targetLink.classList.add('active');
                    }
                }

                checkboxes27_28.forEach(cb => {
                    cb.addEventListener('change', function() {
                        const checkedCount = checkboxes27_28.filter(cb => cb.checked).length;
                        if (checkedCount > 2) {
                            this.checked = false;
                            return;
                        }
                        syncHidden27_28();
                    });
                });
            }

            // Questions 29-30
            const container29_30 = document.getElementById('q29-30-container');
            const checkboxes29_30 = container29_30 ? Array.from(container29_30.querySelectorAll('.q29-30-checkbox')) : [];
            const q29Hidden = document.getElementById('q29');
            const q30Hidden = document.getElementById('q30');

            if (checkboxes29_30.length && q29Hidden && q30Hidden) {
                function syncHidden29_30() {
                    const selected = checkboxes29_30.filter(cb => cb.checked).map(cb => cb.value);
                    q29Hidden.value = selected[0] || '';
                    q30Hidden.value = selected[1] || '';

                    q29Hidden.dispatchEvent(new Event('change'));
                    q30Hidden.dispatchEvent(new Event('change'));

                    // Activate question number based on selection count
                    const targetQuestion = selected.length === 1 ? '29' : (selected.length === 2 ? '30' : null);
                    if (targetQuestion) {
                        document.querySelectorAll('.question-link').forEach(l => l.classList.remove('active'));
                        const targetLink = document.querySelector(`.question-link[data-question="${targetQuestion}"]`);
                        if (targetLink) targetLink.classList.add('active');
                    }
                }

                checkboxes29_30.forEach(cb => {
                    cb.addEventListener('change', function() {
                        const checkedCount = checkboxes29_30.filter(cb => cb.checked).length;
                        if (checkedCount > 2) {
                            this.checked = false;
                            return;
                        }
                        syncHidden29_30();
                    });
                });
            }
        });
    </script>
</body>

</html>
