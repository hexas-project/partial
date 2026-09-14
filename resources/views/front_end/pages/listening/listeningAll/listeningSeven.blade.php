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
      
        /* .inline-input {
            border: 1px solid Gray;
            border-radius: 6px;
            outline: none;
            background: white;
            padding: 8px 12px;
            margin: 0 4px;
            width: 150px;
        } */
        .inline-input:focus {
            /* border-bottom: 1px dotted #000; */
            outline: none;
            box-shadow: none;
        }

        /* .inline-input:focus, .form-control:focus {
            border-color: Gray;
            outline: none;
            box-shadow: none !important;
        } */

        /* Drag and Drop Styling */
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

        .text-highlight {
            background-color: yellow;
            cursor: pointer;
            padding: 0;
            margin: 0;
            display: inline;
        }

        mark {
            background-color: yellow !important;
            color: inherit !important;
            display: inline !important;
            padding: 0 !important;
            margin: 0 !important;
            vertical-align: baseline !important;
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

        /* MCQ Accordion Styling from readingClassTwo */
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
            border: 1px solid #d6d6d6;
            padding: 10px 12px;
            cursor: pointer;
            background: #dbeafe;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            width: fit-content;
        }

        .mcq-num {
            width: 28px;
            height: 28px;
            background: #dbeafe;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            flex: 0 0 auto;
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
            padding: 0 12px 10px;
        }

        .mcq-options label {
            display: flex;
            gap: 10px;
            align-items: flex-start;
            margin: 5px 0;
            cursor: pointer;
        }

        .mcq-options input[type="radio"] {
            margin-top: 3px;
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
            $selected16_20 = array_values(array_filter([
                $answers[16] ?? null,
                $answers[17] ?? null,
                $answers[18] ?? null,
                $answers[19] ?? null,
                $answers[20] ?? null,
            ], fn($v) => $v !== null && $v !== ''));

            $selected21_25 = array_values(array_filter([
                $answers[21] ?? null,
                $answers[22] ?? null,
                $answers[23] ?? null,
                $answers[24] ?? null,
                $answers[25] ?? null,
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

        <div id="main-content">
        <div class="container-fluid px-5">
            <div class="tab-content active" id="part1" style="margin-bottom: 80px;">
                <input type="hidden" name="test_name" value="{{ $testName ?? 'listeningSeven' }}">
                <input type="hidden" name="student_id" value="{{ auth()->id() ?? session('student_batch_id') }}">
                <input type="hidden" name="exam_student_id" id="examStudentIdField" value="">
                <input type="hidden" name="assignment_id" value="{{ $assignmentId ?? '' }}">

                <div class="question_part">
                    <h4>Part 1</h4>
                    <p>Questions 1–10</p>
                </div>

                <div class="mt-4">
                    <div class="d-flex align-items-center gap-3">
                        <h4>Questions 1–5</h4>
                        <!-- <audio controls src="{{ asset('audio/107.MP3') }}"></audio> -->
                    </div><br>
                    <p>Complete the form. Write <strong>NO MORE THAN THREE WORDS AND/OR A NUMBER</strong> in each gap.</p>

                    <h5 class="mt-3"><strong>SOCIOLOGY RESEARCH PROJECT SURVEY</strong></h5>
                    <p>Age: <input type="text" name="q1" placeholder="1" class="inline-input" value="{{ $answers[1] ?? '' }}" id="1"></p>
                    <p>Postcode: <input type="text" name="q2" placeholder="2" class="inline-input" value="{{ $answers[2] ?? '' }}" id="2"></p>
                    <p>COMPUTER FACILITIES ALREADY USED</p>
                    <p>Where? <input type="text" name="q3" placeholder="3" class="inline-input" value="{{ $answers[3] ?? '' }}" id="3"></p>
                    <p>SPORTS FACILITIES ALREADY USED</p>
                    <p>Where? <input type="text" name="q4" placeholder="4" class="inline-input" value="{{ $answers[4] ?? '' }}" id="4"></p>
                    <p>EDUCATION FACILITIES ALREADY USED</p>
                    <p>Where? <input type="text" name="q5" placeholder="5" class="inline-input" value="{{ $answers[5] ?? '' }}" id="5"></p>

                    <hr class="my-4">

                    <h5 class="mt-3"><strong>Questions 6-10</strong></h5>
                    <p>Complete the form. Write <strong>NO MORE THAN THREE WORDS AND/OR A NUMBER</strong> in each gap.</p>

                    <h5 class="mt-3"><strong>IMPROVEMENTS FOR THE COMMUNITY CENTRE</strong></h5>
                    <p>New sports: <input type="text" name="q6" placeholder="6" class="inline-input" value="{{ $answers[6] ?? '' }}" id="6"></p>
                    <p>and <input type="text" name="q7" placeholder="7" class="inline-input" value="{{ $answers[7] ?? '' }}" id="7"></p>
                    <p>Classes organized only for:</p>
                    <p>Education classes: (already filled above)</p>
                    <p><input type="text" name="q8" placeholder="8" class="inline-input" value="{{ $answers[8] ?? '' }}" id="8"> and</p>
                    <p>Willing to pay about: <input type="text" name="q9" placeholder="9" class="inline-input" value="{{ $answers[9] ?? '' }}" id="9"> for new classes.</p>
                    <p>Possible frequency of visits, if improvements made?</p>
                    <p><input type="text" name="q10" placeholder="10" class="inline-input" value="{{ $answers[10] ?? '' }}" id="10"> a week</p>
                </div>
            </div>

            <div class="tab-content" id="part2" style="margin-bottom: 80px;">
                <div class="question_part">
                    <h4>Part 2</h4>
                    <p>Questions 11–20</p>
                </div>

                <div class="mt-4">
                    <h4>Questions 11–15</h4>
                    <p>Choose the correct answer.</p>

                    <p class="mt-3" id="11"><strong>11. The park which makes up Hampstead Heath is</strong></p>
                    <p>
                        <label class="d-flex align-items-center gap-2">
                            <input type="radio" name="q11" value="A" {{ ($answers[11] ?? '') == 'A' ? 'checked' : '' }}>
                            very large.
                        </label>
                    </p>
                    <p>
                        <label class="d-flex align-items-center gap-2">
                            <input type="radio" name="q11" value="B" {{ ($answers[11] ?? '') == 'B' ? 'checked' : '' }}>
                            fairly large.
                        </label>
                    </p>
                    <p>
                        <label class="d-flex align-items-center gap-2">
                            <input type="radio" name="q11" value="C" {{ ($answers[11] ?? '') == 'C' ? 'checked' : '' }}>
                            fairly small.
                        </label>
                    </p>

                    <p class="mt-3" id="12"><strong>12. According the Speaker, Hampstead underground station is</strong></p>
                    <p>
                        <label class="d-flex align-items-center gap-2">
                            <input type="radio" name="q12" value="A" {{ ($answers[12] ?? '') == 'A' ? 'checked' : '' }}>
                            the shallowest in the system.
                        </label>
                    </p>
                    <p>
                        <label class="d-flex align-items-center gap-2">
                            <input type="radio" name="q12" value="B" {{ ($answers[12] ?? '') == 'B' ? 'checked' : '' }}>
                            the deepest in the system.
                        </label>
                    </p>
                    <p>
                        <label class="d-flex align-items-center gap-2">
                            <input type="radio" name="q12" value="C" {{ ($answers[12] ?? '') == 'C' ? 'checked' : '' }}>
                            the oldest in London.
                        </label>
                    </p>

                    <p class="mt-3" id="13"><strong>13. The speaker suggests that after their walk people might want to</strong></p>
                    <p>
                        <label class="d-flex align-items-center gap-2">
                            <input type="radio" name="q13" value="A" {{ ($answers[13] ?? '') == 'A' ? 'checked' : '' }}>
                            have a meal in the famous restaurants.
                        </label>
                    </p>
                    <p>
                        <label class="d-flex align-items-center gap-2">
                            <input type="radio" name="q13" value="B" {{ ($answers[13] ?? '') == 'B' ? 'checked' : '' }}>
                            avoid Hampstead village as it is very busy.
                        </label>
                    </p>
                    <p>
                        <label class="d-flex align-items-center gap-2">
                            <input type="radio" name="q13" value="C" {{ ($answers[13] ?? '') == 'C' ? 'checked' : '' }}>
                            visit Hampstead village to look at the shops.
                        </label>
                    </p>

                    <p class="mt-3" id="14"><strong>14. The houses in the Vale of the Heath are built</strong></p>
                    <p>
                        <label class="d-flex align-items-center gap-2">
                            <input type="radio" name="q14" value="A" {{ ($answers[14] ?? '') == 'A' ? 'checked' : '' }}>
                            on the edge of the heath.
                        </label>
                    </p>
                    <p>
                        <label class="d-flex align-items-center gap-2">
                            <input type="radio" name="q14" value="B" {{ ($answers[14] ?? '') == 'B' ? 'checked' : '' }}>
                            on the heath itself.
                        </label>
                    </p>
                    <p>
                        <label class="d-flex align-items-center gap-2">
                            <input type="radio" name="q14" value="C" {{ ($answers[14] ?? '') == 'C' ? 'checked' : '' }}>
                            opposite the heath.
                        </label>
                    </p>

                    <p class="mt-3" id="15"><strong>15. The speaker advises walkers to remove their headphones to</strong></p>
                    <p>
                        <label class="d-flex align-items-center gap-2">
                            <input type="radio" name="q15" value="A" {{ ($answers[15] ?? '') == 'A' ? 'checked' : '' }}>
                            hear the silence away from the traffic.
                        </label>
                    </p>
                    <p>
                        <label class="d-flex align-items-center gap-2">
                            <input type="radio" name="q15" value="B" {{ ($answers[15] ?? '') == 'B' ? 'checked' : '' }}>
                            ensure they are not being followed.
                        </label>
                    </p>
                    <p>
                        <label class="d-flex align-items-center gap-2">
                            <input type="radio" name="q15" value="C" {{ ($answers[15] ?? '') == 'C' ? 'checked' : '' }}>
                            listen to the noises in the park.
                        </label>
                    </p>

                    <hr class="my-4">

                    <h4>Questions 16–20</h4>
                    <p>Which activity can be done at each of the following locations on the health? Choose the correct answer and move it into the gap.</p>

                    <div class="row">
                        <!-- Column 1 -->
                        <div class="col-md-6 question_site">
                            <h5 class="mb-3"><strong>Locations on the Heath</strong></h5>
                            
                            <p style="display:flex; align-items:center; gap:10px; margin-bottom:15px;">
                                 Kenwood House 
                                <input type="text" class="dnd-drop-input" id="16" data-question="q16" placeholder="16" readonly style="padding:5px; width:200px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer;">
                            </p>
                            <p style="display:flex; align-items:center; gap:10px; margin-bottom:15px;">
                                 grassy slopes 
                                <input type="text" class="dnd-drop-input" id="17" data-question="q17" placeholder="17" readonly style="padding:5px; width:200px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer;">
                            </p>
                            <p style="display:flex; align-items:center; gap:10px; margin-bottom:15px;">
                                 open-air stage 
                                <input type="text" class="dnd-drop-input" id="18" data-question="q18" placeholder="18" readonly style="padding:5px; width:200px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer;">
                            </p>
                            <p style="display:flex; align-items:center; gap:10px; margin-bottom:15px;">
                                 ponds 
                                <input type="text" class="dnd-drop-input" id="19" data-question="q19" placeholder="19" readonly style="padding:5px; width:200px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer;">
                            </p>
                            <p style="display:flex; align-items:center; gap:10px; margin-bottom:15px;">
                                 Parliament Hill 
                                <input type="text" class="dnd-drop-input" id="20" data-question="q20" placeholder="20" readonly style="padding:5px; width:200px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer;">
                            </p>

                            <div style="display:none;">
                                <input type="text" name="q16" id="hidden_q16" value="{{ $answers[16] ?? '' }}">
                                <input type="text" name="q17" id="hidden_q17" value="{{ $answers[17] ?? '' }}">
                                <input type="text" name="q18" id="hidden_q18" value="{{ $answers[18] ?? '' }}">
                                <input type="text" name="q19" id="hidden_q19" value="{{ $answers[19] ?? '' }}">
                                <input type="text" name="q20" id="hidden_q20" value="{{ $answers[20] ?? '' }}">
                            </div>
                        </div>
                        <!-- Column 2 -->
                        <div class="col-md-6 question_site" style="min-height: 380px;">
                            <h5 class="mb-3"><strong>Activities</strong></h5>
                            <div id="dnd-headings-list" class="d-flex flex-column">
                                <div class="dnd-heading" draggable="true" data-value="have picnics" data-content="have picnics">have picnics</div>
                                <div class="dnd-heading" draggable="true" data-value="go fishing" data-content="go fishing">go fishing</div>
                                <div class="dnd-heading" draggable="true" data-value="view London" data-content="view London">view London</div>
                                <div class="dnd-heading" draggable="true" data-value="have a swim" data-content="have a swim">have a swim</div>
                                <div class="dnd-heading" draggable="true" data-value="attend concerts" data-content="attend concerts">attend concerts</div>
                                <div class="dnd-heading" draggable="true" data-value="watch plays" data-content="watch plays">watch plays</div>
                                <div class="dnd-heading" draggable="true" data-value="have snacks" data-content="have snacks">have snacks</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-content" id="part3" style="margin-bottom: 80px;">
                <div class="question_part">
                    <h4>Part 3</h4>
                    <p>Questions 21–30</p>
                </div>

                <div class="mt-4">
                    <h4>Questions 21–25</h4>
                    <p>How do the speakers describe the green urban planning options? Choose the correct answer and move it into the gap.</p>

                    <div class="py-4 mb-4">
                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-md-6">
                                <h5 class="mb-4"><strong>Planning Options</strong></h5>
                                
                                <div class="d-flex flex-column gap-3">
                                    <p style="display:flex; align-items:center; gap:15px; margin-bottom:0;">
                                        <span style="font-weight: bold; min-width: 25px;"></span> 
                                        <span style="min-width: 150px;">green belt</span> 
                                        <input type="text" class="dnd-drop-input" id="21" data-question="q21" placeholder="21" readonly style="padding:8px 12px; width:200px; border:1px solid Gray ; border-radius:6px; font-size:14px; cursor:pointer; background-color: #f8f9fa;">
                                    </p>
                                    <p style="display:flex; align-items:center; gap:15px; margin-bottom:0;">
                                        <span style="font-weight: bold; min-width: 25px;"></span> 
                                        <span style="min-width: 150px;">decentralization</span> 
                                        <input type="text" class="dnd-drop-input" id="22" data-question="q22" placeholder="22" readonly style="padding:8px 12px; width:200px; border:1px solid Gray ; border-radius:6px; font-size:14px; cursor:pointer; background-color: #f8f9fa;">
                                    </p>
                                    <p style="display:flex; align-items:center; gap:15px; margin-bottom:0;">
                                        <span style="font-weight: bold; min-width: 25px;"></span> 
                                        <span style="min-width: 150px;">newtowns</span> 
                                        <input type="text" class="dnd-drop-input" id="23" data-question="q23" placeholder="23" readonly style="padding:8px 12px; width:200px; border:1px solid Gray ; border-radius:6px; font-size:14px; cursor:pointer; background-color: #f8f9fa;">
                                    </p>
                                    <p style="display:flex; align-items:center; gap:15px; margin-bottom:0;">
                                        <span style="font-weight: bold; min-width: 25px;"></span> 
                                        <span style="min-width: 150px;">brownfield sites</span> 
                                        <input type="text" class="dnd-drop-input" id="24" data-question="q24" placeholder="24" readonly style="padding:8px 12px; width:200px; border:1px solid Gray ; border-radius:6px; font-size:14px; cursor:pointer; background-color: #f8f9fa;">
                                    </p>
                                    <p style="display:flex; align-items:center; gap:15px; margin-bottom:0;">
                                        <span style="font-weight: bold; min-width: 25px;">              </span> 
                                        <span style="min-width: 150px;">pedestrianized zones</span> 
                                        <input type="text" class="dnd-drop-input" id="25" data-question="q25" placeholder="25" readonly style="padding:8px 12px; width:200px; border:1px solid Gray ; border-radius:6px; font-size:14px; cursor:pointer; background-color: #f8f9fa;">
                                    </p>
                                </div>

                                <div style="display:none;">
                                    <input type="text" name="q21" id="hidden_q21" value="{{ $answers[21] ?? '' }}">
                                    <input type="text" name="q22" id="hidden_q22" value="{{ $answers[22] ?? '' }}">
                                    <input type="text" name="q23" id="hidden_q23" value="{{ $answers[23] ?? '' }}">
                                    <input type="text" name="q24" id="hidden_q24" value="{{ $answers[24] ?? '' }}">
                                    <input type="text" name="q25" id="hidden_q25" value="{{ $answers[25] ?? '' }}">
                                </div>
                            </div>
                            <!-- Column 2 -->
                            <div class="col-md-6" style="min-height: 380px; border-left: 2px solid #ddd; padding-left: 30px;">
                                <h5 class="mb-4"><strong>Descriptions</strong></h5>
                                <div id="dnd-headings-list-2" class="d-flex flex-column gap-2 mt-2">
                                    <div class="dnd-heading" draggable="true" data-value="dangerous" data-content="dangerous" style="background:#fff; border:1px solid #ddd; padding:10px 15px; border-radius:8px; box-shadow:0 2px 5px rgba(0,0,0,0.05); width:fit-content; cursor:grab;">dangerous</div>
                                    <div class="dnd-heading" draggable="true" data-value="too expensive" data-content="too expensive" style="background:#fff; border:1px solid #ddd; padding:10px 15px; border-radius:8px; box-shadow:0 2px 5px rgba(0,0,0,0.05); width:fit-content; cursor:grab;">too expensive</div>
                                    <div class="dnd-heading" draggable="true" data-value="too many objections" data-content="too many objections" style="background:#fff; border:1px solid #ddd; padding:10px 15px; border-radius:8px; box-shadow:0 2px 5px rgba(0,0,0,0.05); width:fit-content; cursor:grab;">too many objections</div>
                                    <div class="dnd-heading" draggable="true" data-value="disruptive" data-content="disruptive" style="background:#fff; border:1px solid #ddd; padding:10px 15px; border-radius:8px; box-shadow:0 2px 5px rgba(0,0,0,0.05); width:fit-content; cursor:grab;">disruptive</div>
                                    <div class="dnd-heading" draggable="true" data-value="unpractical" data-content="unpractical" style="background:#fff; border:1px solid #ddd; padding:10px 15px; border-radius:8px; box-shadow:0 2px 5px rgba(0,0,0,0.05); width:fit-content; cursor:grab;">unpractical</div>
                                    <div class="dnd-heading" draggable="true" data-value="unsuccessful" data-content="unsuccessful" style="background:#fff; border:1px solid #ddd; padding:10px 15px; border-radius:8px; box-shadow:0 2px 5px rgba(0,0,0,0.05); width:fit-content; cursor:grab;">unsuccessful</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <h4>Questions 26–28</h4>
                    <p>Choose the correct answer.</p>

                    <p class="mt-3" id="26"><strong>26. Which area is jack having the most problems with?</strong></p>
                    <p>
                        <label class="d-flex align-items-center gap-2">
                            <input type="radio" name="q26" value="A" {{ ($answers[26] ?? '') == 'A' ? 'checked' : '' }}>
                            Understanding the statistics.
                        </label>
                    </p>
                    <p>
                        <label class="d-flex align-items-center gap-2">
                            <input type="radio" name="q26" value="B" {{ ($answers[26] ?? '') == 'B' ? 'checked' : '' }}>
                            The lack of material.
                        </label>
                    </p>
                    <p>
                        <label class="d-flex align-items-center gap-2">
                            <input type="radio" name="q26" value="C" {{ ($answers[26] ?? '') == 'C' ? 'checked' : '' }}>
                            The selection of statistics.
                        </label>
                    </p>

                    <p class="mt-3" id="27"><strong>27. What has been central to Curitiba's success?</strong></p>
                    <p>
                        <label class="d-flex align-items-center gap-2">
                            <input type="radio" name="q27" value="A" {{ ($answers[27] ?? '') == 'A' ? 'checked' : '' }}>
                            Central government intervention.
                        </label>
                    </p>
                    <p>
                        <label class="d-flex align-items-center gap-2">
                            <input type="radio" name="q27" value="B" {{ ($answers[27] ?? '') == 'B' ? 'checked' : '' }}>
                            Working together with residents.
                        </label>
                    </p>
                    <p>
                        <label class="d-flex align-items-center gap-2">
                            <input type="radio" name="q27" value="C" {{ ($answers[27] ?? '') == 'C' ? 'checked' : '' }}>
                            Giving responsibility to strategists.
                        </label>
                    </p>

                    <p class="mt-3" id="28"><strong>28. Why does the transport system work so well?</strong></p>
                    <p>
                        <label class="d-flex align-items-center gap-2">
                            <input type="radio" name="q28" value="A" {{ ($answers[28] ?? '') == 'A' ? 'checked' : '' }}>
                            There are cheap fares for the poor and elderly.
                        </label>
                    </p>
                    <p>
                        <label class="d-flex align-items-center gap-2">
                            <input type="radio" name="q28" value="B" {{ ($answers[28] ?? '') == 'B' ? 'checked' : '' }}>
                            Bicycles can use the bus lanes.
                        </label>
                    </p>
                    <p>
                        <label class="d-flex align-items-center gap-2">
                            <input type="radio" name="q28" value="C" {{ ($answers[28] ?? '') == 'C' ? 'checked' : '' }}>
                            There is a low car ownership.
                        </label>
                    </p>

                    <hr class="my-4">

                    <h4>Questions 29 and 30</h4>
                    <p>Choose <strong>TWO</strong> correct answers. Which does the tutor suggest are the TWO areas Jack needs to focus on?</p>

                    <ul class="options mt-3" data-range="29-30" style="list-style: none; padding-left: 0;">
                        <li><label style="display: flex; gap: 10px; align-items: center; margin-bottom: 12px; cursor: pointer; font-weight: normal;">
                            <input type="checkbox" name="q29-30[]" value="A" {{ in_array('A', $selected29_30, true) ? 'checked' : '' }} style="width: 16px; height: 16px; margin-right: 5px;"> 
                            <span>the amount of parkland</span>
                        </label></li>
                        <li><label style="display: flex; gap: 10px; align-items: center; margin-bottom: 12px; cursor: pointer; font-weight: normal;">
                            <input type="checkbox" name="q29-30[]" value="B" {{ in_array('B', $selected29_30, true) ? 'checked' : '' }} style="width: 16px; height: 16px; margin-right: 5px;"> 
                            <span>the employment strategy</span>
                        </label></li>
                        <li><label style="display: flex; gap: 10px; align-items: center; margin-bottom: 12px; cursor: pointer; font-weight: normal;">
                            <input type="checkbox" name="q29-30[]" value="C" {{ in_array('C', $selected29_30, true) ? 'checked' : '' }} style="width: 16px; height: 16px; margin-right: 5px;"> 
                            <span>the pedestrianized zones</span>
                        </label></li>
                        <li><label style="display: flex; gap: 10px; align-items: center; margin-bottom: 12px; cursor: pointer; font-weight: normal;">
                            <input type="checkbox" name="q29-30[]" value="D" {{ in_array('D', $selected29_30, true) ? 'checked' : '' }} style="width: 16px; height: 16px; margin-right: 5px;"> 
                            <span>the recycling scheme</span>
                        </label></li>
                        <li><label style="display: flex; gap: 10px; align-items: center; margin-bottom: 12px; cursor: pointer; font-weight: normal;">
                            <input type="checkbox" name="q29-30[]" value="E" {{ in_array('E', $selected29_30, true) ? 'checked' : '' }} style="width: 16px; height: 16px; margin-right: 5px;"> 
                            <span>the suburban areas</span>
                        </label></li>
                    </ul>
                </div>
            </div>

            <div class="tab-content" id="part4" style="margin-bottom: 80px;">
                <div class="question_part">
                    <h4>Part 4</h4>
                    <p>Questions 31–40</p>
                </div>

                <div class="mt-4">
                    <h4>Questions 31–40</h4>
                    <p>Complete the notes below. Write <strong>NO MORE THAN TWO WORDS</strong> in each gap.</p>

                    <div class="py-4">
                        <h5 class="mt-3"><strong>ECONOMICS COURSE GUIDELINES</strong></h5>
                        <p class="mt-3"><strong>During lectures</strong></p>
                        <p>Students:</p>
                        <p>will receive information about economics and the <input type="text" name="q31" placeholder="31" class="form-control d-inline-block" style="width: 150px; border: 1px solid Gray;" value="{{ $answers[31] ?? '' }}" id="31"> to concentrate on</p>
                        <p>will be provided with information about the subject will be provided with a framework for further study</p>
                        <p>will have an opportunity to be taught by a <input type="text" name="q32" placeholder="32" class="form-control d-inline-block" style="width: 150px; border: 1px solid Gray;" value="{{ $answers[32] ?? '' }}" id="32"> in the field</p>
                        <p>will take part in the learning culture in <input type="text" name="q33" placeholder="33" class="form-control d-inline-block" style="width: 150px; border: 1px solid Gray;" value="{{ $answers[33] ?? '' }}" id="33"></p>
                        
                        <p class="mt-4"><strong>Common problems students deal with techniques used in lectures</strong></p>
                        <p>may not develop <input type="text" name="q34" placeholder="34" class="form-control d-inline-block" style="width: 150px; border: 1px solid Gray;" value="{{ $answers[34] ?? '' }}" id="34">; no immediate questions</p>
                        <p>never get time to improve <input type="text" name="q35" placeholder="35" class="form-control d-inline-block" style="width: 150px; border: 1px solid Gray;" value="{{ $answers[35] ?? '' }}" id="35"> more than lectures</p>
                        
                        <p class="mt-4"><strong>How to avoid problems and make learning easier</strong></p>
                        <p>leave time to read <input type="text" name="q36" placeholder="36" class="form-control d-inline-block" style="width: 150px; border: 1px solid Gray;" value="{{ $answers[36] ?? '' }}" id="36"> on the booklist</p>
                        <p>test yourself with quizzes</p>
                        <p>if you have had a <input type="text" name="q37" placeholder="37" class="form-control d-inline-block" style="width: 150px; border: 1px solid Gray;" value="{{ $answers[37] ?? '' }}" id="37">, revise what you previously learned</p>
                        <p>use the web to do more <input type="text" name="q38" placeholder="38" class="form-control d-inline-block" style="width: 150px; border: 1px solid Gray;" value="{{ $answers[38] ?? '' }}" id="38"></p>
                        <p>check the sources of information on the web are <input type="text" name="q39" placeholder="39" class="form-control d-inline-block" style="width: 150px; border: 1px solid Gray;" value="{{ $answers[39] ?? '' }}" id="39">.</p>
                        <p><input type="text" name="q40" placeholder="40" class="form-control d-inline-block" style="width: 150px; border: 1px solid Gray;" value="{{ $answers[40] ?? '' }}" id="40"> with your classmates</p>
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

        // Removed redundant tab logic as it's now handled by setActiveQuestion

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

            // Timer functionality with resume support
            const TOTAL_TIME = 30 * 60; // 30 minutes in seconds

            // RESUME: এই পেজের নিজস্ব 'listeningSeven_progress' key টা তুলে দেওয়া হয়েছে।
            // ওটা path/assignment/student কিছুই আলাদা করত না — পুরো PC তে একটাই ছিল, আর
            // ২৪ ঘণ্টা টিকত। ফলে আগের student বাকি সময় রেখে গেলে পরদিন ওই PC তে অন্য
            // student ওই বাকি সময় (এমনকি ফুরিয়ে যাওয়া সময়) পেয়ে যেত এবং সাথে সাথেই
            // auto-submit হয়ে যেত। resume এখন বাকি ১১টা listening পেজের মতোই
            // disable-find.js এর hx_resume_* সামলায় — ওটা Student ID ধরে আলাদা।
            let timeRemaining = TOTAL_TIME;
            let timerInterval;
            let audioElement = new Audio('{{ asset("audio/107.MP3") }}');
            audioElement.preload = 'metadata';
            window._hxAudio = audioElement;
            audioElement.addEventListener('loadedmetadata', function () {
                timeRemaining = Math.ceil(audioElement.duration);
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
                if (timeRemaining === TOTAL_TIME) timeRemaining = Math.ceil(audioElement.duration) || TOTAL_TIME;
                timerInterval = setInterval(updateTimer, 1000);

                // Play the specific audio file
                (function () {
                    var _closingOk = !window._hxClosingTime || Date.now() < window._hxClosingTime;
                    var _aid = window._hxAssignmentId ? ('_' + window._hxAssignmentId) : '';
                    // key টা disable-find.js বানায় (Student ID সহ) — নিজে বানালে ওর সাথে মিলত না
                    var _key = window._hxResumeKey || ('hx_resume_' + window.location.pathname + _aid);
                    var _s = null;
                    try { _s = JSON.parse(localStorage.getItem(_key)); } catch (e) {}
                    var _target = (_s && _s.audioTime > 0 && _s.remainingSeconds > 5 && _closingOk)
                        ? _s.audioTime : 0;
                    if (_target > 0) {
                        // ---- AUDIO RESUME: saved position à¦ direct jump (fast-forward ছাড়া) ----
                        // Range-support থাকলে (production) পà§রথম seek-ই সফল হয়। php artisan serve
                        // à¦র মতো server à¦ seek fail করে ০-তে ফিরে যায় — তখন muted রেখে অপেকà§ষা,
                        // target অংশ buffer à¦ à¦লে buffer থেকে seek। currentTime set করার পরপরই
                        // নতà§ন value দেখায় (seek pending), তাই সফলতা যাচাই হয় !seeking দিয়ে।
                        audioElement.muted = true;
                        window.__hxSeekPending = true;
                        var _bufferedCovers = function (el, t) {
                            try {
                                for (var i = 0; i < el.buffered.length; i++) {
                                    if (el.buffered.start(i) <= t && t <= el.buffered.end(i)) return true;
                                }
                            } catch (e) {}
                            return false;
                        };
                        var _trySeek = function () { try { audioElement.currentTime = _target; } catch (e) {} };
                        if (audioElement.readyState >= 1) _trySeek();
                        else audioElement.addEventListener('loadedmetadata', _trySeek, { once: true });
                        var _seekTries = 0;
                        var _seekIv = setInterval(function () {
                            // আসল সফলতা: কোনো seek pending নেই à¦বং position টিকে আছে
                            if (!audioElement.seeking && audioElement.currentTime >= _target - 1.5) {
                                window.__hxSeekPending = false;
                                audioElement.muted = false;
                                clearInterval(_seekIv);
                                return;
                            }
                            // আগের seek বà§যরà§থ (০-তে ফিরে গেছে) — target অংশ buffer à¦ à¦লে আবার চেষà§টা
                            if (!audioElement.seeking && _bufferedCovers(audioElement, _target)) _trySeek();
                            if (++_seekTries > 60) {   // ~১৫ সেকেনà§ডেও না হলে হাল ছেড়ে unmute
                                window.__hxSeekPending = false;
                                audioElement.muted = false;
                                clearInterval(_seekIv);
                            }
                        }, 250);
                    }
                })();

                // progress সেভ করা এখন disable-find.js করে (প্রতি ৫ সেকেন্ডে + পেজ বন্ধের সময়),
                // তাই এখানে আলাদা করে কিছু করার নেই

                audioElement.play().catch(error => {
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
                    if (orderedValues.length > 0 && groupName === 'q29-30[]') {
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
                
                // submit এ resume state clear করা disable-find.js নিজেই করে (form.submit patch)

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

                // If it's an MCQ in an accordion, open it
                const mcqItem = document.getElementById(qNum);
                if (mcqItem && mcqItem.classList.contains('mcq-item')) {
                    document.querySelectorAll('.mcq-item').forEach(it => it.classList.remove('open'));
                    mcqItem.classList.add('open');
                }
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
                    
                    // Special handling for multi-choice Questions 29-30
                    if (this.name === 'q29-30[]') {
                        const checkedCount = document.querySelectorAll('input[name="q29-30[]"]:checked').length;
                        questionNum = checkedCount <= 1 ? '29' : '30';
                    }

                    const linkIndex = allLinks.findIndex(link => link.getAttribute('data-question') === questionNum);
                    if (linkIndex !== -1) {
                        currentIndex = linkIndex;
                        allLinks.forEach(link => link.classList.remove('active'));
                        allLinks[linkIndex].classList.add('active');
                        activateTabForQuestion(questionNum);
                    }
                });

                // For checkboxes, update on change as well to catch the "2nd selection" logic
                if (input.name === 'q29-30[]') {
                    input.addEventListener('change', function() {
                        const checkedCount = document.querySelectorAll('input[name="q29-30[]"]:checked').length;
                        const targetQ = checkedCount <= 1 ? '29' : '30';
                        const linkIndex = allLinks.findIndex(link => link.getAttribute('data-question') === targetQ);
                        if (linkIndex !== -1) {
                            setActiveQuestion(linkIndex);
                        }
                    });
                }
            });

            // Sync Tabs with Question Selection
            document.querySelectorAll('.tab').forEach(tab => {
                tab.addEventListener('click', () => {
                    const tabId = tab.getAttribute('data-tab');
                    const firstLinkInTab = document.querySelector(`.tab-content#${tabId} .question-link`) || 
                                           document.querySelector(`.tab[data-tab="${tabId}"] .question-link`);
                    
                    // Find the index of the first question in this tab
                    const targetQ = tabId === 'part1' ? '1' : (tabId === 'part2' ? '11' : (tabId === 'part3' ? '21' : '31'));
                    const linkIndex = allLinks.findIndex(link => link.getAttribute('data-question') === targetQ);
                    
                    if (linkIndex !== -1) {
                        setActiveQuestion(linkIndex);
                    }
                });
            });

            setActiveQuestion(0);
        })();
    </script>
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
        const closeSidebarBtn = document.getElementById('closeSidebar');

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
            }
            contextMenu.style.display = 'none';
            window.getSelection().removeAllRanges();
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
            }
            contextMenu.style.display = 'none';
            selectedText = '';
            window.getSelection().removeAllRanges();
        });

        // Clear single highlight
        clearOption.addEventListener('click', function() {
            if (clickedMark) {
                const markId = clickedMark.dataset.markId;
                if (markId) {
                    document.querySelectorAll(`.text-highlight[data-mark-id="${markId}"]`).forEach(m => {
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

        // Clear all highlights and notes
        allClearOption.addEventListener('click', function() {
            document.querySelectorAll('.text-highlight').forEach(marked => {
                const parent = marked.parentNode;
                while (marked.firstChild) parent.insertBefore(marked.firstChild, marked);
                parent.removeChild(marked);
            });
            const notePopup = document.querySelector('.note-popup');
            if (notePopup) notePopup.remove();
            activePopup = null;
            
            const existingItems = document.querySelectorAll('.sidebar-note-item');
            existingItems.forEach(item => item.remove());
            
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

        // Placeholder toggle logic
        document.querySelectorAll('input[type="text"]:not(.drop-box)').forEach(input => {
            const originalPlaceholder = input.placeholder;
            
            input.addEventListener('focus', function() {
                this.placeholder = '';
            });
            
            input.addEventListener('blur', function() {
                if (this.value === '') {
                    this.placeholder = originalPlaceholder;
                }
            });
        });

        // Drag and Drop Logic for Q16-20 (from reading class)
        var dndDraggedEl = null;
        var dndGhost = null;
        var dndSourceInput = null; // track which input we're dragging FROM

        // Remove native draggable from headings
        document.querySelectorAll('.dnd-heading').forEach(function(el) {
            el.setAttribute('draggable', 'false');
        });

        // Helper: measure text width for input
        // Initialize MCQ accordion
        document.addEventListener('DOMContentLoaded', () => {
            const mcqItems = document.querySelectorAll('.mcq-block .mcq-item');
            const mcqHeads = document.querySelectorAll('.mcq-block .mcq-head');

            mcqHeads.forEach((head) => {
                head.addEventListener('click', () => {
                    const item = head.closest('.mcq-item');
                    if (!item) return;
                    const isOpen = item.classList.contains('open');
                    mcqItems.forEach((it) => it.classList.remove('open'));
                    if (!isOpen) item.classList.add('open');
                });
            });
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

            // Sync hidden input - save full content (no serial number)
            var hidden = document.querySelector('input[name="' + qName + '"]');
            if (hidden) {
                hidden.value = content;
                hidden.dispatchEvent(new Event('change'));
            }
            
            // Focus on input so bottom navigation tab updates perfectly
            dropInput.focus();
            dropInput.dispatchEvent(new Event('focus'));
        }

        // Clear drop input on double-click — return heading to right side list
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

        // Start drag from a filled drop input (to move or return)
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
            e.preventDefault(); // Stop text selection while dragging
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
                    // Dragging from one input to another -> swap or clear old
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
        ['16', '17', '18', '19', '20', '21', '22', '23', '24', '25'].forEach(function(q) {
            var hidden = document.querySelector('input[name="q' + q + '"]');
            if (!hidden) return;
            var val = (hidden.value || '').trim();
            if (!val) return;
            
            var heading = document.querySelector('.dnd-heading[data-content="' + val + '"]');
            var dropInput = document.querySelector('.dnd-drop-input[data-question="q' + q + '"]');
            
            if (heading && dropInput) {
                dndPlaceHeading(dropInput, heading);
            } else if (dropInput && val) {
                // Just put the string if no matching heading
                dropInput.value = val;
            }
        });
    </script>
</body>

</html>
