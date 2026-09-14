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
            padding: 4px 8px;
            border-radius: 4px;
            transition: all 0.3s ease;
            display: inline-block;
            min-width: 25px;
            text-align: center;
        }

        .question-link.active {
            /* background-color: #007bff !important; */
            color: gray !important;
            font-weight: bold;
            border: 2px solid gray;
        }
        
        .question-link:hover {
            background-color: #e9ecef;
        }

        /* .inline-input {
            border: 1px solid Gray;
            border-radius: 6px;
            outline: none;
            background: white;
            padding: 8px 12px;
            margin: 0 4px;
            width: 150px;
            text-align: left;
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

        .map-container {
            border: 2px solid #000;
            padding: 20px;
            margin: 20px 0;
            position: relative;
            background-color: #f9f9f9;
        }

        .map-box {
            border: 2px solid #000;
            padding: 20px;
            text-align: center;
            font-weight: bold;
            position: absolute;
            background-color: white;
        }

        .map-oval {
            border: 2px solid #000;
            padding: 20px 60px;
            text-align: center;
            font-weight: bold;
            position: absolute;
            background-color: white;
            border-radius: 50%;
        }

        .text-highlight {
            background-color: yellow !important;
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

        mark {
            background-color: yellow !important;
            color: inherit !important;
            display: inline !important;
            padding: 0 !important;
            margin: 0 !important;
            vertical-align: baseline !important;
        }

        .text-highlight {
            background-color: yellow !important;
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

        mark {
            background-color: yellow !important;
            color: inherit !important;
            display: inline !important;
            padding: 0 !important;
            margin: 0 !important;
            vertical-align: baseline !important;
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
            border: 1px solid #d6d6d6;
            padding: 10px 15px;
            cursor: pointer;
            background: #dbeafe;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            position: relative;
            z-index: 2;
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
            padding: 0 15px;
            background: transparent;
            border: none;
            transition: all 0.3s ease;
            position: relative;
            z-index: 1;
        }

        .mcq-item.open .mcq-options {
            max-height: 500px;
            opacity: 1;
            padding: 0 15px 15px;
            margin-bottom: 10px;
        }

        .mcq-options label {
            display: flex;
            gap: 10px;
            align-items: flex-start;
            margin: 5px 0;
            padding: 8px 10px;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.2s;
        }

        .mcq-options label:hover {
            background-color: #f0f7ff;
        }

        .mcq-options input[type="radio"] {
            margin-top: 4px;
        }

        /* Darker backdrop for start modal */
        .modal-backdrop.show {
            opacity: 0.8 !important;
            background-color: #222 !important;
        }
        
        #startModal .modal-dialog {
            max-width: 460px;
        }
        
        #startModal .modal-content {
            border-radius: 14px;
            border: none;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            font-family: inherit;
            overflow: hidden;
        }
        
        #startModal .modal-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 12px 12px 0 0;
            padding: 22px 28px;
            border: none;
            display: flex;
            align-items: center;
        }
        
        #startModal .modal-title {
            font-size: 22px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 12px;
            color: white;
            margin: 0;
        }
        
        #startModal .modal-body {
            padding: 28px 28px 15px;
            background: #ffffff;
        }
        
        #startModal .instruction-text {
            color: #666;
            font-size: 14px;
            line-height: 1.5;
            margin-bottom: 24px;
            text-align: center;
        }
        
        #startModal .form-group {
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            border: 1px solid #f1f1f1;
            text-align: left;
        }
        
        #startModal .form-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        #startModal #student_id_input {
            padding: 12px 16px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
            transition: all 0.3s;
            width: 100%;
        }
        
        #startModal #student_id_input:focus {
            border-color: #764ba2;
            box-shadow: 0 0 0 3px rgba(118, 75, 162, 0.15);
            outline: none;
        }

        #startModal #student_id_input::placeholder {
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
            padding: 15px 28px 28px;
            border: none;
            background: white;
            justify-content: center;
        }
        
        #startModal #startTestButton {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 12px 45px;
            font-size: 15px;
            font-weight: 600;
            border-radius: 6px;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: white;
            box-shadow: 0 4px 15px rgba(118, 75, 162, 0.25);
        }
        
        #startModal #startTestButton:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(118, 75, 162, 0.4);
            color: white;
        }
    </style>
</head>

<body>
    <form action="{{ route('test.submit') }}" method="POST" id="testForm" spellcheck="false" autocomplete="off">
        @csrf

        @php
            $selected23_24 = array_values(array_filter([
                $answers[23] ?? null,
                $answers[24] ?? null,
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
            <button id="closeSidebar" style="
                position: absolute;
                top: 10px;
                right: 10px;
                background: none;
                border: none;
                font-size: 20px;
                cursor: pointer;
            ">&times;</button>
            <div id="notes-container" style="margin-top: 40px;"></div>
        </div>

        <!-- SIDEBAR TOGGLE BUTTON -->
        <button id="toggleSidebar" style="
            position: fixed;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            background: #fdfdfdff;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            z-index: 999;
        "></button>

        <div class="container-fluid px-5" style="margin-top: 70px;">
            <div class="tab-content active" id="part1" style="margin-bottom: 80px;">
                <input type="hidden" name="test_name" value="{{ $testName ?? 'listeningEight' }}">
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
                        <!-- <audio controls src="{{ asset('audio/108.MP3') }}"></audio> -->
                    </div><br>
                    <p><em>Complete the Table below.</em></p>
                    <p>Write <strong>NO MORE THAN TWO WORDS/AND OR A NUMBER</strong> in each gap.</p>

                    <h5 class="mt-3"><strong>Your Best Furniture</strong></h5>
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ITEM</th>
                                    <th>REQUIRED</th>
                                    <th>PRICE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Bed</td>
                                    <td><input type="text" name="q1" placeholder="1" class="inline-input" value="{{ $answers[1] ?? '' }}" id="1"> size</td>
                                    <td>£189</td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="q2" placeholder="2" class="inline-input" value="{{ $answers[2] ?? '' }}" id="2"></td>
                                    <td>White colour</td>
                                    <td>£69</td>
                                </tr>
                                <tr>
                                    <td>Dinner table</td>
                                    <td>Round with <input type="text" name="q3" placeholder="3" class="inline-input" value="{{ $answers[3] ?? '' }}" id="3"></td>
                                    <td><input type="text" name="q4" placeholder="4" class="inline-input" value="{{ $answers[4] ?? '' }}" id="4"></td>
                                </tr>
                                <tr>
                                    <td>Wardrobe</td>
                                    <td><input type="text" name="q5" placeholder="5" class="inline-input" value="{{ $answers[5] ?? '' }}" id="5"></td>
                                    <td>£399</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <hr class="my-4">

                    <h5 class="mt-3"><strong>Questions 6-10</strong></h5>
                    <p><em>Complete the notes below.</em></p>
                    <p>Write <strong>NO MORE THAN TWO WORDS/AND OR A NUMBER</strong> in each gap.</p>

                    <h5 class="mt-3"><strong>Customer's Details</strong></h5>
                    <p>Name: Daniel Kahn</p>
                    <p>Address: Hill House</p>
                    <p><input type="text" name="q6" placeholder="6" class="inline-input" value="{{ $answers[6] ?? '' }}" id="6"> 16th</p>
                    <p>Contact number: 4478 0135</p>
                    <p>Delivery time: 1:00 p.m. – 2:00 p.m. on next <input type="text" name="q7" placeholder="7" class="inline-input" value="{{ $answers[7] ?? '' }}" id="7"></p>
                    <p>Total cost: £760</p>
                    <p>Payment: <input type="text" name="q8" placeholder="8" class="inline-input" value="{{ $answers[8] ?? '' }}" id="8"></p>
                    <p>Delivery Fee: Free</p>
                    <p>Delivery transport: <input type="text" name="q9" placeholder="9" class="inline-input" value="{{ $answers[9] ?? '' }}" id="9"></p>
                    <p>Reference number: <input type="text" name="q10" placeholder="10" class="inline-input" value="{{ $answers[10] ?? '' }}" id="10"></p>
                </div>
            </div>

            <div class="tab-content" id="part2" style="margin-bottom: 80px;">
                <div class="question_part">
                    <h4>Part 2</h4>
                    <p>Questions 11–20</p>
                </div>

                <div class="mt-4">
                    <h4>Questions 11–15</h4>
                    <p><em>Complete the notes below.</em></p>
                    <p>Write <strong>NO MORE THAN TWO WORDS/AND OR A NUMBER</strong> in each gap.</p>

                    <h5 class="mt-3"><strong>TULIP HOT SPRING GARDEN RESORT</strong></h5>
                    <p>Location: <input type="text" name="q11" placeholder="11" class="inline-input" value="{{ $answers[11] ?? '' }}" id="11"> close to Peak Mountains</p>
                    <p>Hot spring was exploited <input type="text" name="q12" placeholder="12" class="inline-input" value="{{ $answers[12] ?? '' }}" id="12"> meters under the ground,</p>
                    <p>Temperature of Tulip hot spring is <input type="text" name="q13" placeholder="13" class="inline-input" value="{{ $answers[13] ?? '' }}" id="13"></p>
                    <p>Notice for tourists:</p>
                    <p>Adjust water temperature before bathing.</p>
                    <p>Do not bath immediately after drink</p>
                    <p>Do not take your <input type="text" name="q14" placeholder="14" class="inline-input" value="{{ $answers[14] ?? '' }}" id="14"> when bathing.</p>
                    <p>There are:</p>
                    <p>56 different water sports.</p>
                    <p>21 different <input type="text" name="q15" placeholder="15" class="inline-input" value="{{ $answers[15] ?? '' }}" id="15"></p>

                    <hr class="my-4">

                    <h4>Questions 16–20</h4>
                    <p>Complete the map below. Write <strong>NO MORE THAN THREE WORDS</strong> for each answer.</p>

                    <div style="position: relative; height: 400px; border: 2px solid #000; background-color: #f9f9f9; width: 50%;">
                        <div style="position: absolute; top: 20px; left: 20px; width: 150px; height: 120px; border: 2px solid #000; background: white; display: flex; flex-direction: column; align-items: center; justify-content: center; font-weight: bold;">
                            <span>18</span>
                            <input type="text" name="q18" class="inline-input mt-2" placeholder="18" style="width: 80%; height: 30px;" value="{{ $answers[18] ?? '' }}" id="18">
                        </div>
                        <div style="position: absolute; top: 20px; left: 200px; width: 180px; height: 80px; border: 2px solid #000; background: white; display: flex; flex-direction: column; align-items: center; justify-content: center; font-weight: bold;">
                            <span>19</span>
                            <input type="text" name="q19" class="inline-input mt-2" placeholder="19" style="width: 80%; height: 30px;" value="{{ $answers[19] ?? '' }}" id="19">
                        </div>
                        <div style="position: absolute; top: 20px; right: 20px; width: 150px; height: 80px; border: 2px solid #000; background: white; display: flex; align-items: center; justify-content: center; font-weight: bold;">
                            Tulip<br>Garden
                        </div>
                        <div style="position: absolute; top: 150px; left: 20px; width: 100px; height: 180px; border: 2px solid #000; background: white; display: flex; flex-direction: column; align-items: center; justify-content: center; font-weight: bold;">
                            <span>16</span>
                            <input type="text" name="q16" class="inline-input mt-2" placeholder="16" style="width: 85%; height: 30px;" value="{{ $answers[16] ?? '' }}" id="16">
                        </div>
                        <div style="position: absolute; top: 180px; left: 150px; width: 230px; height: 100px; border: 2px solid #000; background: white; display: flex; flex-direction: column; align-items: center; justify-content: center; font-weight: bold; border-radius: 50%;">
                            <span>17</span>
                            <input type="text" name="q17" class="inline-input mt-2" placeholder="17" style="width: 60%; height: 30px;" value="{{ $answers[17] ?? '' }}" id="17">
                        </div>
                        <div style="position: absolute; top: 150px; right: 20px; width: 150px; height: 120px; border: 2px solid #000; background: white; display: flex; flex-direction: column; align-items: center; justify-content: center; font-weight: bold;">
                            <span>20</span>
                            <input type="text" name="q20" class="inline-input mt-2" placeholder="20" style="width: 80%; height: 30px;" value="{{ $answers[20] ?? '' }}" id="20">
                        </div>
                        <div style="position: absolute; bottom: 30px; left: 150px; width: 230px; height: 60px; border: 2px solid #000; background: white; display: flex; align-items: center; justify-content: center; font-weight: bold;">
                            Main Hall
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
                    <h4>Questions 21 and 22</h4>
                    <p>Choose the correct answer.</p>

                    <div class="mt-3">
                        <p><strong>21. The conversation may take place in a</strong></p>
                        <ul class="options">
                            <li><input type="radio" name="q21" value="A" {{ ($answers[21] ?? '') == 'A' ? 'checked' : '' }} id="21a"> <label for="21a">university.</label></li>
                            <li><input type="radio" name="q21" value="B" {{ ($answers[21] ?? '') == 'B' ? 'checked' : '' }} id="21b"> <label for="21b">bookstore.</label></li>
                            <li><input type="radio" name="q21" value="C" {{ ($answers[21] ?? '') == 'C' ? 'checked' : '' }} id="21c"> <label for="21c">canteen.</label></li>
                        </ul>
                    </div>

                    <div class="mt-3">
                        <p><strong>22. The topic of the first lecture is</strong></p>
                        <ul class="options">
                            <li><input type="radio" name="q22" value="A" {{ ($answers[22] ?? '') == 'A' ? 'checked' : '' }} id="22a"> <label for="22a">local snack.</label></li>
                            <li><input type="radio" name="q22" value="B" {{ ($answers[22] ?? '') == 'B' ? 'checked' : '' }} id="22b"> <label for="22b">study strategies.</label></li>
                            <li><input type="radio" name="q22" value="C" {{ ($answers[22] ?? '') == 'C' ? 'checked' : '' }} id="22c"> <label for="22c">social life.</label></li>
                        </ul>
                    </div>

                    <hr class="my-4">

                    <h4>Questions 23 and 24</h4>
                    <p>Choose <strong>TWO</strong> correct answers.</p>
                    <p>Which <strong>TWO</strong> main factors are important for students' successful study?</p>

                    <ul class="options mt-3" data-range="23-24" style="list-style: none; padding-left: 0;">
                        <li><label for="q23-24_a" style="display: flex; gap: 10px; align-items: center; margin-bottom: 12px; cursor: pointer; font-weight: normal;">
                            <input type="checkbox" id="q23-24_a" name="q23-24[]" value="A" {{ in_array('A', $selected23_24, true) ? 'checked' : '' }} style="width: 16px; height: 16px; margin-right: 5px;"> 
                            <span>using time effectively</span>
                        </label></li>
                        <li><label for="q23-24_b" style="display: flex; gap: 10px; align-items: center; margin-bottom: 12px; cursor: pointer; font-weight: normal;">
                            <input type="checkbox" id="q23-24_b" name="q23-24[]" value="B" {{ in_array('B', $selected23_24, true) ? 'checked' : '' }} style="width: 16px; height: 16px; margin-right: 5px;"> 
                            <span>doing researching</span>
                        </label></li>
                        <li><label for="q23-24_c" style="display: flex; gap: 10px; align-items: center; margin-bottom: 12px; cursor: pointer; font-weight: normal;">
                            <input type="checkbox" id="q23-24_c" name="q23-24[]" value="C" {{ in_array('C', $selected23_24, true) ? 'checked' : '' }} style="width: 16px; height: 16px; margin-right: 5px;"> 
                            <span>taking more lectures</span>
                        </label></li>
                        <li><label for="q23-24_d" style="display: flex; gap: 10px; align-items: center; margin-bottom: 12px; cursor: pointer; font-weight: normal;">
                            <input type="checkbox" id="q23-24_d" name="q23-24[]" value="D" {{ in_array('D', $selected23_24, true) ? 'checked' : '' }} style="width: 16px; height: 16px; margin-right: 5px;"> 
                            <span>working independently</span>
                        </label></li>
                        <li><label for="q23-24_e" style="display: flex; gap: 10px; align-items: center; margin-bottom: 12px; cursor: pointer; font-weight: normal;">
                            <input type="checkbox" id="q23-24_e" name="q23-24[]" value="E" {{ in_array('E', $selected23_24, true) ? 'checked' : '' }} style="width: 16px; height: 16px; margin-right: 5px;"> 
                            <span>coping well with stress</span>
                        </label></li>
                    </ul>

                    <hr class="my-4">

                    <h4>Questions 25–30</h4>
                    <p><em>Complete the table below.</em></p>
                    <p>Write <strong>NO MORE THAN THREE WORDS FOR</strong> each answer.</p>

                    <div class="table-responsive mt-3">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td rowspan="5" style="vertical-align: middle;">Listening to lecture</td>
                                    <td><input type="text" name="q25" placeholder="25" class="inline-input" value="{{ $answers[25] ?? '' }}" id="25"> lecture</td>
                                </tr>
                                <tr>
                                    <td>Prepare for lecture ahead</td>
                                </tr>
                                <tr>
                                    <td>check notes after lecture</td>
                                </tr>
                                <tr>
                                    <td>PowerPoint</td>
                                </tr>
                                <tr>
                                    <td>Group work</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <input type="text" name="q26" placeholder="26" class="inline-input" value="{{ $answers[26] ?? '' }}" id="26">.
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            need a <span style="padding-left: 2px;"> <input type="text" name="q27" placeholder="27" style="padding-left: 2px;" class="inline-input" value="{{ $answers[27] ?? '' }}" id="27"></span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: middle;">Reading online materials</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            approach: <input type="text" name="q28" placeholder="28" class="inline-input" value="{{ $answers[28] ?? '' }}" id="28">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td rowspan="2" style="vertical-align: middle;">Writing essay</td>
                                    <td>method of analyzing</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            a good <input type="text" name="q29" placeholder="29" class="inline-input" value="{{ $answers[29] ?? '' }}" id="29">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            do <input type="text" name="q30" placeholder="30" class="inline-input" value="{{ $answers[30] ?? '' }}" id="30"> before handing in
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
                    <p>Write <strong>NO MORE THAN THREE WORDS AND/OR A NUMBER</strong> in each gap.</p>

                    <p class="mt-3">The Antarctic Polar View project maps Antarctic sea Ice by using <input type="text" name="q31" placeholder="31" class="inline-input" value="{{ $answers[31] ?? '' }}" id="31">.</p>
                    <p>Problems to navigate through the water:</p>
                    <p>the safety of the ship</p>
                    <p><input type="text" name="q32" placeholder="32" class="inline-input" value="{{ $answers[32] ?? '' }}" id="32"> the efficiency of the ship</p>

                    <p class="mt-3"><strong>NIVSAT Satellite:</strong></p>
                    <p>Collect data</p>
                    <p>Identify difference between open water and <input type="text" name="q33" placeholder="33" class="inline-input" value="{{ $answers[33] ?? '' }}" id="33"></p>
                    <p>Scientists can see surface of sea clearly by using <input type="text" name="q34" placeholder="34" class="inline-input" value="{{ $answers[34] ?? '' }}" id="34"></p>
                    <p>Helicopter:</p>
                    <p>Advantage: can map the sea in the air</p>

                    <p class="mt-3">Disadvantages: much more <input type="text" name="q35" placeholder="35" class="inline-input" value="{{ $answers[35] ?? '' }}" id="35"></p>
                    <p><input type="text" name="q36" placeholder="36" class="inline-input" value="{{ $answers[36] ?? '' }}" id="36"></p>

                    <p class="mt-3">The color of the map is <input type="text" name="q37" placeholder="37" class="inline-input" value="{{ $answers[37] ?? '' }}" id="37"></p>
                    <p>Problem of sending pictures in Antarctic ship: <input type="text" name="q38" placeholder="38" class="inline-input" value="{{ $answers[38] ?? '' }}" id="38"></p>
                    <p>Measure to the problem: com press images into <input type="text" name="q39" placeholder="39" class="inline-input" value="{{ $answers[39] ?? '' }}" id="39"> format</p>
                    <p>The equipment scientists need for mapping is a <input type="text" name="q40" placeholder="40" class="inline-input" value="{{ $answers[40] ?? '' }}" id="40"> on ship</p>
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
                    <h5 class="modal-title" id="modalTitle">
                        <span class="material-icons-outlined" style="font-size: 28px;">headphones</span>
                        Start Listening Test
                    </h5>
                </div>
                <div class="modal-body">
                    <p class="instruction-text">Please enter your Student ID and click OK to begin the listening test.</p>
                    <div class="form-group">
                        <label for="student_id_input" class="form-label">
                            <span class="material-icons-outlined" style="font-size: 20px; color: #555;">person</span>
                            STUDENT ID
                        </label>
                        <input type="text" id="student_id_input" placeholder="Enter your Student ID">
                        <small id="studentIdError">⚠️ Student ID must be between 8-12 characters</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="startTestButton" type="button">START TEST</button>
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
            const specificAudio = new Audio('{{ asset("audio/108.MP3") }}');
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
                
                const isValidStudentId = studentId.length >= 8 && studentId.length <= 12;
                
                if (!isValidStudentId) {
                    // Prevent closing modal
                    e.preventDefault();
                    e.stopPropagation();
                    
                    studentIdError.textContent = '⚠️ Student ID must be between 8-12 characters';
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
                    if (orderedValues.length > 0 && groupName === 'q23-24[]') {
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
            if (!range) return; // Skip if no data-range attribute
            
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
            const allInputs = document.querySelectorAll('input[type="text"], input[type="checkbox"], input[type="radio"]');
            console.log('Total inputs found:', allInputs.length);
            
            allInputs.forEach((input, idx) => {
                // Function to handle activation
                const activateQuestionLink = function(e) {
                    let questionNum = this.id || this.name.replace('q', '').replace('[]', '');
                    
                    // Special handling for multi-choice Questions 23-24
                    if (this.name === 'q23-24[]') {
                        const checkedCount = document.querySelectorAll('input[name="q23-24[]"]:checked').length;
                        questionNum = checkedCount <= 1 ? '23' : '24';
                    }

                    console.log('Input clicked/focused - Question:', questionNum, 'Input ID:', this.id, 'Input Name:', this.name);
                    
                    const linkIndex = allLinks.findIndex(link => link.getAttribute('data-question') === questionNum);
                    console.log('Link index found:', linkIndex);
                    
                    if (linkIndex !== -1) {
                        currentIndex = linkIndex;
                        
                        // Remove active from all links
                        allLinks.forEach(link => {
                            link.classList.remove('active');
                            link.style.backgroundColor = '';
                            link.style.color = '';
                        });
                        
                        // Add active to current link
                        allLinks[linkIndex].classList.add('active');
                        allLinks[linkIndex].style.backgroundColor = '#ffffffff';
                        allLinks[linkIndex].style.color = 'black';
                        
                        activateTabForQuestion(questionNum);
                        console.log('Successfully activated link at index:', linkIndex);
                    } else {
                        console.log('No link found for question:', questionNum);
                    }
                };

                // Add multiple event listeners
                input.addEventListener('focus', activateQuestionLink);
                input.addEventListener('click', activateQuestionLink);
                input.addEventListener('mousedown', activateQuestionLink);

                // For checkboxes, update on change as well to catch the "2nd selection" logic
                if (input.name === 'q23-24[]') {
                    input.addEventListener('change', function() {
                        const checkedCount = document.querySelectorAll('input[name="q23-24[]"]:checked').length;
                        const targetQ = checkedCount <= 1 ? '23' : '24';
                        const linkIndex = allLinks.findIndex(link => link.getAttribute('data-question') === targetQ);
                        if (linkIndex !== -1) {
                            setActiveQuestion(linkIndex);
                        }
                    });
                }
            });

            setActiveQuestion(0);
        })();
    </script>

    <!-- sidebar js code  -->

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

        // Navbar note icon — opens sidebar
        const noteToggle = document.getElementById('noteToggle');
        if (noteToggle) {
            noteToggle.addEventListener('click', function(e) {
                e.preventDefault();
                sidebar.style.right = '0px';
            });
        }

        // Close (×) button — only closes sidebar, no page navigation
        if (closeSidebarBtn) {
            closeSidebarBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                sidebar.style.right = '-300px';
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
    </script>
    
    <!-- Placeholder behavior script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('input[type="text"]').forEach(input => {
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

            // MCQ Accordion Logic
            document.querySelectorAll('.mcq-head').forEach(head => {
                head.addEventListener('click', function() {
                    const item = this.parentElement;
                    item.classList.toggle('open');
                });
            });
            
            // Auto open logic
            let anyChecked = false;
            document.querySelectorAll('.mcq-item').forEach(item => {
                const radios = item.querySelectorAll('input[type="radio"]');
                const isChecked = Array.from(radios).some(radio => radio.checked);
                if (isChecked) {
                    item.classList.add('open');
                    anyChecked = true;
                }
            });

            // If no items have checked radios, open the first one by default
            if (!anyChecked) {
                const firstMcq = document.querySelector('.mcq-item');
                if (firstMcq) {
                    firstMcq.classList.add('open');
                }
            }
        });
    </script>
</body>

</html>
