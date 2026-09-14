<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partial</title>
    
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

        input[type="text"] {
            border: 1px solid #ccc !important;
            background: white !important;
            outline: none !important;
            box-shadow: none !important;
            padding: 5px !important;
            border-radius: 3px !important;
            border-radius: 0 !important;
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
                                    <strong id="timer">30 : 00 minutes left</strong>
                                </a>
                            </li>
                            <li class="nav-item">
                                <span class="material-icons-outlined">headset_mic</span>
                                <audio id="testAudio" src="{{ asset($audioSrc ?? 'audio/Test-10.mp3') }}"
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
            <!-- AUTO POPUP FOR TEXT SELECTION (cdielts.org style) -->
            <div id="selectionPopup" style="position: absolute; background: rgba(255,255,255,0.25); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); border: 1px solid rgba(255,255,255,0.4); border-radius: 12px; padding: 6px 10px; z-index: 9999; display: none; gap: 8px; align-items: center; box-shadow: 0 2px 12px rgba(0,0,0,0.12);">
                <button type="button" id="highlightBtn" style="display: inline-flex; align-items: center; gap: 5px; padding: 5px 13px; border-radius: 20px; border: none; font-size: 12px; font-weight: 600; background: linear-gradient(135deg,#f7c948,#f0a500); color: #fff; cursor: pointer; letter-spacing: 0.3px; box-shadow: 0 2px 6px rgba(240,165,0,0.35);">
                    âœ️ Highlight
                </button>
                <button type="button" id="noteBtn" style="display: inline-flex; align-items: center; gap: 5px; padding: 5px 13px; border-radius: 20px; border: none; font-size: 12px; font-weight: 600; background: linear-gradient(135deg,#4f8ef7,#1a5fd4); color: #fff; cursor: pointer; letter-spacing: 0.3px; box-shadow: 0 2px 6px rgba(79,142,247,0.35);">
                    ðŸ“ Note
                </button>
                <button type="button" id="clearBtn" style="display: none; align-items: center; gap: 5px; padding: 5px 13px; border-radius: 20px; border: none; font-size: 12px; font-weight: 600; background: linear-gradient(135deg,#f76b6b,#d42020); color: #fff; cursor: pointer; letter-spacing: 0.3px; box-shadow: 0 2px 6px rgba(212,32,32,0.35);">
                    🗑️ Clear
                </button>
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

            <!-- SIDEBAR TOGGLE BUTTON-->
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
                    <input type="hidden" name="test_name" value="{{ $testName ?? 'listeningOne' }}">
                    <input type="hidden" name="student_id" value="{{ auth()->id() ?? session('student_batch_id') }}">
                    <input type="hidden" name="exam_student_id" id="examStudentIdField" value="">
                    <input type="hidden" name="assignment_id" value="{{ $assignmentId ?? '' }}">
                    <div class="question_part">
                        <h4>Part 1</h4>
                        <p>Questions 1-10</p>
                    </div>
                    
                    <!-- Questions 1-4: University Clubs Table -->
                    <div class="mt-4">
                        <!--<h4>Questions 1-4</h4>-->
                        <div class="d-flex  align-items-center gap-3 ">

                            <h4>Questions 1-4</h4>
                           <!-- <audio controls
                                src="{{ asset('audio/101audio.MP3') }}"></audio>  -->
                        </div><br>
                        <p><em>Complete the table below.</em></p>
                        <p>Write <strong>NO MORE THAN THREE WORDS AND/OR A NUMBER</strong> for each answer.</p>
                        
                        <table class="table table-bordered mt-3" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>University Clubs</th>
                                    <th>Monday</th>
                                    <th>Tuesday</th>
                                    <th>Wednesday</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Name of club</td>
                                    <td><em>film</em></td>
                                    <td><em>climbing</em></td>
                                    <td><em>chess</em></td>
                                </tr>
                                <tr>
                                    <td>Extra activities</td>
                                    <td><em>discussions</em></td>
                                    <td><input type="text" name="q1" placeholder="1" style="padding:0px 5px;" id="1"></td>
                                    <td><input type="text" name="q2" placeholder="2" style="padding:0px 5px;" id="2"></td>
                                </tr>
                                <tr>
                                    <td>Current number of members</td>
                                    <td><input type="text" name="q3" placeholder="3" style="padding:0px 5px;" id="3"></td>
                                    <td>40</td>
                                    <td>55</td>
                                </tr>
                                <tr>
                                    <td>Contact</td>
                                    <td><em>Events organizer</em></td>
                                    <td><input type="text" name="q4" placeholder="4" style="padding:0px 5px;" id="4"></td>
                                    <td><em>Maths tutor</em></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Questions 5-10: Climbing Club Details -->
                    <div class="mt-4">
                        <h4>Questions 5-10</h4>
                        <p><em>Complete the notes below.</em></p>
                        <p>Write <strong>NO MORE THAN THREE WORDS</strong> for each answer.</p>
                        
                        <h5 class="mt-3"><strong>Details of climbing club:</strong></h5>
                        <p>meets <input type="text" name="q5" placeholder="5" style="padding:0px 5px; width: 150px;" id="5"></p>
                        <p>excursion to France in the <input type="text" name="q6" placeholder="6" style="padding:0px 5px; width: 150px;" id="6"></p>
                        <p>subscriptions paid <input type="text" name="q7" placeholder="7" style="padding:0px 5px; width: 150px;" id="7"></p>
                        
                        <h5 class="mt-4"><strong>Benefits:</strong></h5>
                        <p>discounts on <input type="text" name="q8" placeholder="8" style="padding:0px 5px; width: 150px;" id="8"></p>
                        <p>annual <input type="text" name="q9" placeholder="9" style="padding:0px 5px; width: 150px;" id="9"></p>
                        <p>free entrance to climbing <input type="text" name="q10" placeholder="10" style="padding:0px 5px; width: 150px;" id="10"> in Cardiff.</p>
                    </div>
                </div>
                <!-- question part 2 -->
                <div class="tab-content" id="part2" style="margin-bottom: 80px;">
                    <div class="question_part">
                        <h4>Part 2</h4>
                        <p>Questions 11-20</p>
                    </div>

                    <!-- Questions 11-15: Halls of Residence -->
                    <div class="mt-4">
                        <h4>Questions 11-15</h4>
                        <p>Which features are available at the following halls of residence?</p>
                        <p>Choose the correct answer and move it into the gap.</p>
                        
                        <div class="row mt-3">
                            <div class="col-md-5">
                                <h5 style="font-weight: bold; margin-bottom: 20px;">List of Features</h5>
                                <div style="background: white; padding: 0;">
                                    <div style="margin-bottom: 10px;">
                                        <span class="draggable-feature" draggable="true" data-value="cleaning included" 
                                              style="display: inline-block; padding: 8px 16px; background: #f5f5f5; border-radius: 4px; cursor: move; user-select: none; box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.08);">
                                            A. cleaning included
                                        </span>
                                    </div>
                                    <div style="margin-bottom: 10px;">
                                        <span class="draggable-feature" draggable="true" data-value="all meals included" 
                                              style="display: inline-block; padding: 8px 16px; background: #f5f5f5; border-radius: 4px; cursor: move; user-select: none; box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.08);">
                                            B. all meals included
                                        </span>
                                    </div>
                                    <div style="margin-bottom: 10px;">
                                        <span class="draggable-feature" draggable="true" data-value="private showers" 
                                              style="display: inline-block; padding: 8px 16px; background: #f5f5f5; border-radius: 4px; cursor: move; user-select: none; box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.08);">
                                            C. private showers
                                        </span>
                                    </div>
                                    <div style="margin-bottom: 10px;">
                                        <span class="draggable-feature" draggable="true" data-value="modern building" 
                                              style="display: inline-block; padding: 8px 16px; background: #f5f5f5; border-radius: 4px; cursor: move; user-select: none; box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.08);">
                                            D. modern building
                                        </span>
                                    </div>
                                    <div style="margin-bottom: 10px;">
                                        <span class="draggable-feature" draggable="true" data-value="parking spaces" 
                                              style="display: inline-block; padding: 8px 16px; background: #f5f5f5; border-radius: 4px; cursor: move; user-select: none; box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.08);">
                                            E. parking spaces
                                        </span>
                                    </div>
                                    <div style="margin-bottom: 10px;">
                                        <span class="draggable-feature" draggable="true" data-value="single sex" 
                                              style="display: inline-block; padding: 8px 16px; background: #f5f5f5; border-radius: 4px; cursor: move; user-select: none; box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.08);">
                                            F. single sex
                                        </span>
                                    </div>
                                    <div style="margin-bottom: 0;">
                                        <span class="draggable-feature" draggable="true" data-value="sports facilities" 
                                              style="display: inline-block; padding: 8px 16px; background: #f5f5f5; border-radius: 4px; cursor: move; user-select: none; box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.08);">
                                            G. sports facilities
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <h5 style="font-weight: bold; margin-bottom: 20px;">Halls of Residence</h5>
                                <div style="background: white; padding: 0;">
                                    <div style="display: flex; align-items: center; margin-bottom: 15px;">
                                        <input type="text" name="q11" placeholder="11" class="drop-zone-q11" 
                                               style="padding: 8px 12px; width: 200px; margin: 0 10px; border: 1px solid #ccc; border-radius: 4px;" 
                                               id="11" readonly>
                                        <span>Brown Hall</span>
                                    </div>
                                    <div style="display: flex; align-items: center; margin-bottom: 15px;">
                                        <input type="text" name="q12" placeholder="12" class="drop-zone-q11" 
                                               style="padding: 8px 12px; width: 200px; margin: 0 10px; border: 1px solid #ccc; border-radius: 4px;" 
                                               id="12" readonly>
                                        <span>Blake Residence</span>
                                    </div>
                                    <div style="display: flex; align-items: center; margin-bottom: 15px;">
                                        <input type="text" name="q13" placeholder="13" class="drop-zone-q11" 
                                               style="padding: 8px 12px; width: 200px; margin: 0 10px; border: 1px solid #ccc; border-radius: 4px;" 
                                               id="13" readonly>
                                        <span>Queens Building</span>
                                    </div>
                                    <div style="display: flex; align-items: center; margin-bottom: 15px;">
                                        <input type="text" name="q14" placeholder="14" class="drop-zone-q11" 
                                               style="padding: 8px 12px; width: 200px; margin: 0 10px; border: 1px solid #ccc; border-radius: 4px;" 
                                               id="14" readonly>
                                        <span>Parkway Flats</span>
                                    </div>
                                    <div style="display: flex; align-items: center; margin-bottom: 0;">
                                        <input type="text" name="q15" placeholder="15" class="drop-zone-q11" 
                                               style="padding: 8px 12px; width: 200px; margin: 0 10px; border: 1px solid #ccc; border-radius: 4px;" 
                                               id="15" readonly>
                                        <span>Temple Rise</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Questions 16-20: Map Labeling -->
                    <div class="mt-4">
                        <h4>Questions 16-20</h4>
                        <p><em>Label the map below.</em></p>
                        <p>The map has seven labels <strong>(A - G)</strong>. Choose the correct label for each building.</p>
                        
                        <div class="row mt-3">
                            <div class="col-md-5">
                                <!-- Table with clickable cells -->
                                <table class="table table-bordered" style="background: white;">
                                    <thead>
                                        <tr style="background: #e8f4f8;">
                                            <th style="width: 40px; text-align: center;">#</th>
                                            <th style="width: 180px;">Location</th>
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
                                            <td>Brown Hall</td>
                                            <td class="clickable-cell" data-question="16" data-value="A" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                            <td class="clickable-cell" data-question="16" data-value="B" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                            <td class="clickable-cell" data-question="16" data-value="C" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                            <td class="clickable-cell" data-question="16" data-value="D" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                            <td class="clickable-cell" data-question="16" data-value="E" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                            <td class="clickable-cell" data-question="16" data-value="F" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                            <td class="clickable-cell" data-question="16" data-value="G" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center; font-weight: bold;">17</td>
                                            <td>Blake Residence</td>
                                            <td class="clickable-cell" data-question="17" data-value="A" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                            <td class="clickable-cell" data-question="17" data-value="B" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                            <td class="clickable-cell" data-question="17" data-value="C" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                            <td class="clickable-cell" data-question="17" data-value="D" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                            <td class="clickable-cell" data-question="17" data-value="E" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                            <td class="clickable-cell" data-question="17" data-value="F" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                            <td class="clickable-cell" data-question="17" data-value="G" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center; font-weight: bold;">18</td>
                                            <td>Queens Building</td>
                                            <td class="clickable-cell" data-question="18" data-value="A" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                            <td class="clickable-cell" data-question="18" data-value="B" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                            <td class="clickable-cell" data-question="18" data-value="C" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                            <td class="clickable-cell" data-question="18" data-value="D" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                            <td class="clickable-cell" data-question="18" data-value="E" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                            <td class="clickable-cell" data-question="18" data-value="F" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                            <td class="clickable-cell" data-question="18" data-value="G" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center; font-weight: bold;">19</td>
                                            <td>Parkway Flats</td>
                                            <td class="clickable-cell" data-question="19" data-value="A" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                            <td class="clickable-cell" data-question="19" data-value="B" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                            <td class="clickable-cell" data-question="19" data-value="C" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                            <td class="clickable-cell" data-question="19" data-value="D" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                            <td class="clickable-cell" data-question="19" data-value="E" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                            <td class="clickable-cell" data-question="19" data-value="F" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                            <td class="clickable-cell" data-question="19" data-value="G" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center; font-weight: bold;">20</td>
                                            <td>Temple Rise</td>
                                            <td class="clickable-cell" data-question="20" data-value="A" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                            <td class="clickable-cell" data-question="20" data-value="B" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                            <td class="clickable-cell" data-question="20" data-value="C" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                            <td class="clickable-cell" data-question="20" data-value="D" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                            <td class="clickable-cell" data-question="20" data-value="E" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                            <td class="clickable-cell" data-question="20" data-value="F" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                            <td class="clickable-cell" data-question="20" data-value="G" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
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
                            <div class="col-md-7" style="padding-left: 40px;">
                                <!-- Map Image -->
                                <img src="{{ asset('images/listening/MAP-01.png') }}" alt="Campus Map" style="max-width: 80%; width: 80%; height: auto; max-height: 400px; border: 1px solid #ccc; margin-top:-113px;">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- question part 3 -->
                <div class="tab-content" id="part3" style="margin-bottom: 80px;">
                    <div class="question_part">
                        <h4>Part 3</h4>
                        <p>Questions 21-30</p>
                    </div>

                    <!-- Questions 21-24: Sentence Completion -->
                    <div class="mt-4">
                        <h4>Questions 21-24</h4>
                        <p><em>Complete the sentences below.</em></p>
                        <p>Write <strong>NO MORE THAN THREE WORDS OR A NUMBER</strong> for each answer.</p>
                        
                        <p class="mt-3">Jenna and Marco must complete their project by <input type="text" name="q21" placeholder="21" style="padding:0px 5px; width: 180px;" id="21"></p>
                        <p>The project will be a study of the increase in <input type="text" name="q22" placeholder="22" style="padding:0px 5px; width: 180px;" id="22"></p>
                        <p>The project will be assessed by <input type="text" name="q23" placeholder="23" style="padding:0px 5px; width: 180px;" id="23"></p>
                        <p>Jenna and Marco agree they need a for the project. <input type="text" name="q24" placeholder="24" style="padding:0px 5px; width: 180px;" id="24"></p>
                    </div>

                    <!-- Questions 25-27: Multiple Choice with Checkboxes -->
                    <div class="mt-4">
                        <h4>Questions 25-27</h4>
                        <p>Choose <strong>THREE</strong> answer.</p>
                        <p>What <strong>THREE</strong> things do Marco and Jenna have to do now for the project?</p>
                        
                        <div class="mt-3" style="background: white; padding: 15px; border-radius: 5px;">
                            <div style="margin-bottom: 10px;">
                                <label style="display: flex; align-items: center; cursor: pointer;">
                                    <input type="checkbox" class="q25-27-checkbox" value="A" style="margin-right: 10px; width: 18px; height: 18px; cursor: pointer;">
                                    <span>interview some people</span>
                                </label>
                            </div>
                            <div style="margin-bottom: 10px;">
                                <label style="display: flex; align-items: center; cursor: pointer;">
                                    <input type="checkbox" class="q25-27-checkbox" value="B" style="margin-right: 10px; width: 18px; height: 18px; cursor: pointer;">
                                    <span>handout questionnaires</span>
                                </label>
                            </div>
                            <div style="margin-bottom: 10px;">
                                <label style="display: flex; align-items: center; cursor: pointer;">
                                    <input type="checkbox" class="q25-27-checkbox" value="C" style="margin-right: 10px; width: 18px; height: 18px; cursor: pointer;">
                                    <span>choose their subjects</span>
                                </label>
                            </div>
                            <div style="margin-bottom: 10px;">
                                <label style="display: flex; align-items: center; cursor: pointer;">
                                    <input type="checkbox" class="q25-27-checkbox" value="D" style="margin-right: 10px; width: 18px; height: 18px; cursor: pointer;">
                                    <span>take photographs</span>
                                </label>
                            </div>
                            <div style="margin-bottom: 10px;">
                                <label style="display: flex; align-items: center; cursor: pointer;">
                                    <input type="checkbox" class="q25-27-checkbox" value="E" style="margin-right: 10px; width: 18px; height: 18px; cursor: pointer;">
                                    <span>use statistical software</span>
                                </label>
                            </div>
                            <div style="margin-bottom: 10px;">
                                <label style="display: flex; align-items: center; cursor: pointer;">
                                    <input type="checkbox" class="q25-27-checkbox" value="F" style="margin-right: 10px; width: 18px; height: 18px; cursor: pointer;">
                                    <span>do some work in the library</span>
                                </label>
                            </div>
                            <div style="margin-bottom: 0;">
                                <label style="display: flex; align-items: center; cursor: pointer;">
                                    <input type="checkbox" class="q25-27-checkbox" value="G" style="margin-right: 10px; width: 18px; height: 18px; cursor: pointer;">
                                    <span>contact some local companies</span>
                                </label>
                            </div>
                        </div>
                        
                        <!-- Hidden inputs to store selected values -->
                        <input type="hidden" name="q25" id="25">
                        <input type="hidden" name="q26" id="26">
                        <input type="hidden" name="q27" id="27">
                    </div>

                    <!-- Questions 28-30: Multiple Choice -->
                    <div class="mt-4">
                        <h4>Questions 28-30</h4>
                        <p>Choose the correct answer.</p>
                        
                        <div class="mt-3">
                            <p><strong>28. Why did Jenna and Marco agree to work together?</strong></p>
                            <ul class="options">
                                <li><input type="radio" name="q28" value="A" id="28a"> <label for="28a">because they both wanted to work with someone</label></li>
                                <li><input type="radio" name="q28" value="B" id="28b"> <label for="28b">because they each have different skills</label></li>
                                <li><input type="radio" name="q28" value="C" id="28c"> <label for="28c">because they have worked together before</label></li>
                            </ul>
                        </div>
                        
                        <div class="mt-3">
                            <p><strong>29. Why does Marco suggest that he writes the analysis?</strong></p>
                            <ul class="options">
                                <li><input type="radio" name="q29" value="A" id="29a"> <label for="29a">He needs more practice with this kind of writing.</label></li>
                                <li><input type="radio" name="q29" value="B" id="29b"> <label for="29b">He is better at English than Jenna.</label></li>
                                <li><input type="radio" name="q29" value="C" id="29c"> <label for="29c">He has more experience of this than Jenna.</label></li>
                            </ul>
                        </div>
                        
                        <div class="mt-3">
                            <p><strong>30. Why does Jenna offer to do the presentation?</strong></p>
                            <ul class="options">
                                <li><input type="radio" name="q30" value="A" id="30a"> <label for="30a">Her tutor wants her to do the presentation.</label></li>
                                <li><input type="radio" name="q30" value="B" id="30b"> <label for="30b">Marco is very nervous about giving presentations.</label></li>
                                <li><input type="radio" name="q30" value="C" id="30c"> <label for="30c">She wants to divide the work on the project fairly.</label></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- question part 4 -->
                <div class="tab-content " id="part4" style="margin-bottom: 80px;">
                    <div class="question_part">
                        <h4>Part 4</h4>
                        <p>Questions 31-40</p>
                    </div>

                    <!-- Questions 31-35: News Sources Matching -->
                    <div class="mt-4">
                        <h4>Questions 31-35</h4>
                        <p><em>Of which US news source is each of the following statements true?</em></p>
                        <p>Choose the correct letter <strong>A, B</strong> or <strong>C</strong> for each statement.</p>
                        
                        <div class="mt-3">
                            <h5><strong>News Sources</strong></h5>
                            <p><strong>A.</strong> television</p>
                            <p><strong>B.</strong> internet</p>
                            <p><strong>C.</strong> the press</p>
                        </div>
                        
                        <div class="mt-3">
                            <!-- Table with clickable cells for Questions 31-35 -->
                            <table class="table table-bordered" style="background: white; width: 50%;">
                                <thead>
                                    <tr style="background: #e8f4f8;">
                                        <th style="width: 40px; text-align: center;">#</th>
                                        <th style="width: 400px;">Statement</th>
                                        <th style="width: 50px; text-align: center;">A</th>
                                        <th style="width: 50px; text-align: center;">B</th>
                                        <th style="width: 50px; text-align: center;">C</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="text-align: center; font-weight: bold;">31</td>
                                        <td>It is more popular at the weekend than during the week.</td>
                                        <td class="clickable-cell-q31" data-question="31" data-value="A" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        <td class="clickable-cell-q31" data-question="31" data-value="B" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        <td class="clickable-cell-q31" data-question="31" data-value="C" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center; font-weight: bold;">32</td>
                                        <td>It has affected the popularity of local radio.</td>
                                        <td class="clickable-cell-q31" data-question="32" data-value="A" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        <td class="clickable-cell-q31" data-question="32" data-value="B" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        <td class="clickable-cell-q31" data-question="32" data-value="C" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center; font-weight: bold;">33</td>
                                        <td>It has recently been able to expand internationally.</td>
                                        <td class="clickable-cell-q31" data-question="33" data-value="A" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        <td class="clickable-cell-q31" data-question="33" data-value="B" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        <td class="clickable-cell-q31" data-question="33" data-value="C" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center; font-weight: bold;">34</td>
                                        <td>It is offering more varied reporting than previously.</td>
                                        <td class="clickable-cell-q31" data-question="34" data-value="A" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        <td class="clickable-cell-q31" data-question="34" data-value="B" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        <td class="clickable-cell-q31" data-question="34" data-value="C" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center; font-weight: bold;">35</td>
                                        <td>It has suffered from government intervention.</td>
                                        <td class="clickable-cell-q31" data-question="35" data-value="A" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        <td class="clickable-cell-q31" data-question="35" data-value="B" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                        <td class="clickable-cell-q31" data-question="35" data-value="C" style="text-align: center; cursor: pointer; user-select: none; height: 40px; line-height: 24px; vertical-align: middle;"></td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <!-- Hidden inputs to store selected values -->
                            <input type="hidden" name="q31" id="31">
                            <input type="hidden" name="q32" id="32">
                            <input type="hidden" name="q33" id="33">
                            <input type="hidden" name="q34" id="34">
                            <input type="hidden" name="q35" id="35">
                        </div>
                    </div>

                    <!-- Questions 36-40: Summary Completion -->
                    <div class="mt-4">
                        <h4>Questions 36-40</h4>
                        <p><em>Complete the summary below.</em></p>
                        <p>Write <strong>NO MORE THAN TWO WORDS</strong> for each answer.</p>
                        
                        <div class="mt-3" style="border: 1px solid #ccc; padding: 20px; background: #f9f9f9;">
                            <h5 style="text-align: center;"><strong>Advertising and Newspapers</strong></h5>
                            <p class="mt-3">In the USA, newspapers are being increasingly inventive about the way they attract advertisers and their <input type="text" name="q36" placeholder="36" style="padding:0px 5px; width: 150px;" id="36"> now exceeds that of other industries. Advertising has increased because of a good relationship with the <input type="text" name="q37" placeholder="37" style="padding:0px 5px; width: 150px;" id="37"> sector.</p>
                            <p>In addition, newspapers now run more adverts which include <input type="text" name="q38" placeholder="38" style="padding:0px 5px; width: 150px;" id="38">. These have been found to raise readership of the papers and create more sales for the <input type="text" name="q39" placeholder="39" style="padding:0px 5px; width: 150px;" id="39">. There are also an increasing number of more expensive <input type="text" name="q40" placeholder="40" style="padding:0px 5px; width: 150px;" id="40"> adverts.</p>
                        </div>
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
            // Clear all input fields on page load to prevent browser cache
            document.querySelectorAll('input[type="text"]').forEach(input => {
                if (input.id !== 'studentIdInput' && !input.name.includes('test_name') && !input.name.includes('student_id') && !input.name.includes('_token')) {
                    input.value = '';
                }
            });
            document.querySelectorAll('input[type="checkbox"]').forEach(input => {
                input.checked = false;
            });
            document.querySelectorAll('input[type="radio"]').forEach(input => {
                input.checked = false;
            });
            document.querySelectorAll('.clickable-cell, .clickable-cell-q31').forEach(cell => {
                cell.textContent = '';
            });
            document.querySelectorAll('input[type="hidden"]').forEach(input => {
                if (input.id && !isNaN(input.id)) {
                    input.value = '';
                }
            });
            
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
            const specificAudio = new Audio('{{ asset("audio/101audio.MP3") }}');
            specificAudio.preload = 'metadata';
            window._hxAudio = specificAudio;
            specificAudio.addEventListener('loadedmetadata', function () {
                if (timeRemaining === 0) timeRemaining = Math.ceil(specificAudio.duration); 
                //if (timeRemaining === 0) timeRemaining = 60;  // 1 min test/////////////////////////////////////////////////////
            }, { once: true });

            function updateTimer() {
                const minutes = Math.floor(timeRemaining / 60);
                const seconds = timeRemaining % 60;
                document.getElementById('timer').textContent = `${minutes} : ${seconds.toString().padStart(2, '0')} minutes`;

                if (timeRemaining <= 0) {
                    clearInterval(timerInterval);
                    document.getElementById('testForm').submit();
                }
                timeRemaining--;
            }

            // Show start modal on page load
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
                
                // Fallback if metadata not yet loaded
                if (timeRemaining === 0) timeRemaining = Math.ceil(specificAudio.duration) || 30 * 60;
                //if (timeRemaining === 0) timeRemaining = 60;  // 1 min test\\\\\\\\\\\\\\\\\\\\\\\\\

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
                
                // Get Student ID from sessionStorage and populate hidden field
                const examStudentId = sessionStorage.getItem('examStudentId');
                if (examStudentId) {
                    document.getElementById('examStudentIdField').value = examStudentId;
                }
                
                // Clear all input fields after form data is collected but before redirect
                setTimeout(function() {
                    // Clear text inputs
                    document.querySelectorAll('input[type="text"]').forEach(input => {
                        input.value = '';
                    });
                    // Clear checkboxes
                    document.querySelectorAll('input[type="checkbox"]').forEach(input => {
                        input.checked = false;
                    });
                    // Clear radio buttons
                    document.querySelectorAll('input[type="radio"]').forEach(input => {
                        input.checked = false;
                    });
                    // Clear clickable table cells (tick marks)
                    document.querySelectorAll('.clickable-cell, .clickable-cell-q31').forEach(cell => {
                        cell.textContent = '';
                    });
                }, 100);
                
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

            window.setActiveQuestionByNumber = function(qNum) {
                const qStr = String(qNum);
                const linkIndex = allLinks.findIndex(link => link.getAttribute('data-question') === qStr);
                if (linkIndex !== -1) {
                    currentIndex = linkIndex;
                }
                highlightLinkAndNumber(qStr);
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
        // Signal disable-find.js to skip its note/highlight handlers — this page owns them
        window.__pageNoteHandlers = true;
        // Highlight and Notes Functionality (cdielts.org style)
        let selectionRange = null;
        let clickedMark = null;
        let activePopup = null;

        const selectionPopup = document.getElementById('selectionPopup');
        const highlightBtn = document.getElementById('highlightBtn');
        const noteBtn = document.getElementById('noteBtn');
        const clearBtn = document.getElementById('clearBtn');
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

        // Show popup when text is selected
        document.addEventListener('mouseup', function(e) {
            setTimeout(() => {
                const selection = window.getSelection();
                const selectedText = selection.toString().trim();

                if (selectedText !== '' && selection.rangeCount > 0) {
                    selectionRange = selection.getRangeAt(0).cloneRange();

                    const range = selection.getRangeAt(0);
                    const container = range.commonAncestorContainer;

                    // Check if selected text is already highlighted
                    let isHighlighted = false;
                    let hasNote = false;
                    let selectedMark = null;

                    let checkNode = container.nodeType === Node.TEXT_NODE ? container.parentNode : container;
                    if (checkNode && checkNode.tagName === 'MARK') {
                        isHighlighted = true;
                        selectedMark = checkNode;
                        if (checkNode.dataset.note) hasNote = true;
                    } else {
                        const marks = [];
                        if (container.querySelectorAll) marks.push(...container.querySelectorAll('mark'));
                        let parent = checkNode;
                        while (parent && parent !== document.body) {
                            if (parent.tagName === 'MARK') { marks.push(parent); break; }
                            parent = parent.parentNode;
                        }
                        if (marks.length > 0) {
                            isHighlighted = true;
                            selectedMark = marks[0];
                            hasNote = marks.some(m => m.dataset.note && m.dataset.note.trim() !== '');
                        }
                    }

                    // Smart button display
                    if (isHighlighted && hasNote) {
                        highlightBtn.style.display = 'inline-flex';
                        noteBtn.style.display = 'none';
                        clearBtn.style.display = 'inline-flex';
                        clickedMark = selectedMark;
                    } else if (isHighlighted && !hasNote) {
                        highlightBtn.style.display = 'none';
                        noteBtn.style.display = 'inline-flex';
                        clearBtn.style.display = 'inline-flex';
                        clickedMark = selectedMark;
                    } else {
                        highlightBtn.style.display = 'inline-flex';
                        noteBtn.style.display = 'inline-flex';
                        clearBtn.style.display = 'none';
                        clickedMark = null;
                    }

                    const rect = range.getBoundingClientRect();
                    selectionPopup.style.left = (rect.left + rect.width / 2 - 150) + 'px';
                    selectionPopup.style.top = (rect.top + window.scrollY - 50) + 'px';
                    const popupWidth = selectionPopup.offsetWidth || 310;
                    const rawLeft = rect.left + window.scrollX + rect.width / 2 - popupWidth / 2;
                    const clampedLeft = Math.max(8, Math.min(rawLeft, window.innerWidth + window.scrollX - popupWidth - 8));
                    selectionPopup.style.left = clampedLeft + 'px';
                    selectionPopup.style.top = (rect.top + window.scrollY - 50) + 'px';
                    selectionPopup.style.display = 'flex';
                } else {
                    selectionPopup.style.display = 'none';
                }
            }, 10);
        });

        // Hide selection popup on click elsewhere
        document.addEventListener('click', function(e) {
            if (!selectionPopup.contains(e.target)) {
                if (!e.target.closest('mark')) {
                    selectionPopup.style.display = 'none';
                }
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
            // Get all text nodes within the range
            const startContainer = range.startContainer;
            const endContainer = range.endContainer;
            const startOffset = range.startOffset;
            const endOffset = range.endOffset;
            
            // Check if selection crosses table cell boundaries
            const startCell = getTableCell(startContainer);
            const endCell = getTableCell(endContainer);
            
            // If selection is inside table and crosses cell boundaries, only highlight within the start cell
            if (startCell && endCell && startCell !== endCell) {
                // Only highlight text in the starting cell
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
                    // Skip nodes that are in different table cells if we started in a table
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

        // Highlight Button Click
        highlightBtn.addEventListener('click', function() {
            if (selectionRange) {
                try {
                    const createdMarks = highlightRange(selectionRange);
                    if (createdMarks.length > 0) {
                        const markId = Date.now().toString();
                        createdMarks.forEach(mark => { mark.dataset.markId = markId; });
                    }
                    window.getSelection().removeAllRanges();
                    selectionPopup.style.display = 'none';
                } catch (err) {
                    console.log('Highlight error:', err);
                }
            }
        });

        // Clear Button Click (from selection popup)
        clearBtn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();

            const markIdsToRemove = new Set();

            // Collect markIds from selectionRange
            if (selectionRange) {
                const container = selectionRange.commonAncestorContainer;
                const marksInSelection = [];
                let checkNode = container.nodeType === Node.TEXT_NODE ? container.parentNode : container;
                if (checkNode && checkNode.tagName === 'MARK') marksInSelection.push(checkNode);
                if (container.querySelectorAll) {
                    container.querySelectorAll('mark').forEach(m => { if (!marksInSelection.includes(m)) marksInSelection.push(m); });
                }
                let parent = checkNode;
                while (parent && parent !== document.body) {
                    if (parent.tagName === 'MARK' && !marksInSelection.includes(parent)) marksInSelection.push(parent);
                    parent = parent.parentNode;
                }
                marksInSelection.forEach(m => { if (m.dataset.markId) markIdsToRemove.add(m.dataset.markId); });
            }

            // Also check live selection
            const sel = window.getSelection();
            if (sel.rangeCount > 0) {
                const range = sel.getRangeAt(0);
                const container = range.commonAncestorContainer;
                const marksInSelection = [];
                let checkNode = container.nodeType === Node.TEXT_NODE ? container.parentNode : container;
                if (checkNode && checkNode.tagName === 'MARK') marksInSelection.push(checkNode);
                if (container.querySelectorAll) {
                    container.querySelectorAll('mark').forEach(m => { if (!marksInSelection.includes(m)) marksInSelection.push(m); });
                }
                let parent = checkNode;
                while (parent && parent !== document.body) {
                    if (parent.tagName === 'MARK' && !marksInSelection.includes(parent)) marksInSelection.push(parent);
                    parent = parent.parentNode;
                }
                marksInSelection.forEach(m => { if (m.dataset.markId) markIdsToRemove.add(m.dataset.markId); });
            }

            // Fallback to clickedMark
            if (markIdsToRemove.size === 0 && clickedMark && clickedMark.dataset.markId) {
                markIdsToRemove.add(clickedMark.dataset.markId);
            }

            // Remove all marks with these IDs
            markIdsToRemove.forEach(markId => {
                document.querySelectorAll(`mark[data-mark-id="${markId}"]`).forEach(mark => {
                    const parent = mark.parentNode;
                    if (parent) {
                        while (mark.firstChild) parent.insertBefore(mark.firstChild, mark);
                        parent.removeChild(mark);
                    }
                });
                const sidebarItem = document.querySelector(`.sidebar-note-item[data-mark-id="${markId}"]`);
                if (sidebarItem) sidebarItem.remove();
            });

            clickedMark = null;
            selectionRange = null;
            selectionPopup.style.display = 'none';
            window.getSelection().removeAllRanges();
        });

        // Note Button Click
        noteBtn.addEventListener('click', function() {
            if (selectionRange) {
                try {
                    const selectedText = selectionRange.toString();
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
                        noteDiv.innerHTML = `
                            <div class="sidebar-header" style="margin-bottom: 3px; cursor: pointer;">${selectedText}</div>
                            <div class="sidebar-note-content" style="color: #666; white-space: pre-wrap;"></div>
                        `;
                        noteDiv.style.borderBottom = '1px solid #ccc';
                        noteDiv.style.padding = '8px';
                        noteDiv.dataset.markId = markId;
                
                        sidebar.appendChild(noteDiv);
                        sidebar.style.right = '0px';

                        noteDiv.addEventListener('click', () => {
                            showNotePopup(firstMark);
                        });

                        showNotePopup(firstMark);
                    }
                    
                    window.getSelection().removeAllRanges();
                    selectionPopup.style.display = 'none';
                } catch (err) {
                    console.log('Note error:', err);
                }
            }
        });

        // Add note with popup (old handler - can be removed if not needed)
        if (document.getElementById('notesOption')) {
            document.getElementById('notesOption').addEventListener('click', function() {
            // If right-clicked on already highlighted text, just open its popup
            if (clickedMark) {
                showNotePopup(clickedMark);
                contextMenu.style.display = 'none';
                return;
            }
            
            // Otherwise, create new highlight with note
            if (selectionRange) {
                try {
                    // Get selected text before modifying DOM
                    const selectedText = selectionRange.toString();
                    
                    // Use the helper function to highlight
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
            });
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
            inputs.forEach(input => {
                input.setAttribute('autocomplete', 'off');
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const savedAnswers = @json($answers ?? []);

            Object.keys(savedAnswers || {}).forEach(function(qNum) {
                const value = savedAnswers[qNum];
                if (value === null || value === undefined) return;

                const name = 'q' + qNum;
                const radios = document.querySelectorAll('input[type="radio"][name="' + name + '"]');
                if (radios && radios.length) {
                    radios.forEach(function(r) {
                        if (String(r.value).toLowerCase() === String(value).toLowerCase()) {
                            r.checked = true;
                        }
                    });
                    return;
                }

                const input = document.querySelector('input[name="' + name + '"]');
                if (input) input.value = value;
            });
        });
    </script>

    {{-- Drag and Drop for Questions 11-15 with swap functionality --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const draggableFeatures = document.querySelectorAll('.draggable-feature');
            const dropZones = document.querySelectorAll('.drop-zone-q11');
            let draggedElement = null;
            let draggedFromInput = false;
            
            // Function to calculate input width based on text content
            function calculateInputWidth(text) {
                // Create temporary span to measure text width
                const span = document.createElement('span');
                span.style.visibility = 'hidden';
                span.style.position = 'absolute';
                span.style.whiteSpace = 'nowrap';
                span.style.padding = '8px 16px';
                span.style.fontSize = window.getComputedStyle(document.querySelector('.drop-zone-q11')).fontSize;
                span.textContent = text;
                document.body.appendChild(span);
                const width = span.offsetWidth;
                document.body.removeChild(span);
                return width + 10; // Add small buffer
            }
            
            // Function to update input style based on whether it has a value
            function updateInputStyle(input) {
                if (input.value && input.value.trim() !== '') {
                    // Calculate dynamic width based on content
                    const dynamicWidth = calculateInputWidth(input.value);
                    // Has value - apply shadow, remove border, dynamic width
                    input.setAttribute('style', `padding: 8px 16px; width: ${dynamicWidth}px; margin: 0 10px; border-radius: 4px; border: none !important; box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.08) !important; background: #e8e8e8 !important;`);
                } else {
                    // Empty - restore border, remove shadow
                    input.setAttribute('style', 'padding: 8px 12px; width: 200px; margin: 0 10px; border: 1px solid #ccc; border-radius: 4px; box-shadow: none; background: white;');
                }
            }
            
            // Add drag events to draggable features
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
            
            // Add drop events to input fields
            dropZones.forEach(zone => {
                // Make inputs draggable to drag back to list
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
                    
                    // If there's already a value in this input, return it to the list
                    if (this.value && this.value.trim() !== '') {
                        const oldValue = this.value;
                        // Find and show the feature with this value
                        draggableFeatures.forEach(feature => {
                            if (feature.getAttribute('data-value') === oldValue) {
                                feature.style.display = 'inline-block';
                            }
                        });
                    }
                    
                    // Set new value
                    this.value = value;
                    
                    // Hide the dragged feature from list (if not from input)
                    if (!fromInput && draggedElement) {
                        draggedElement.style.display = 'none';
                    }
                    
                    // If dragged from input, clear that input and restore its border
                    if (fromInput && draggedElement && draggedElement !== this) {
                        draggedElement.value = '';
                        updateInputStyle(draggedElement);
                    }
                    
                    // Apply shadow style immediately
                    updateInputStyle(this);

                    if (typeof window.setActiveQuestionByNumber === 'function') {
                        window.setActiveQuestionByNumber(this.id);
                    }
                    
                    // Brief green flash for feedback
                    this.style.backgroundColor = '#e8f5e9';
                    setTimeout(() => {
                        updateInputStyle(this);
                    }, 300);
                });
            });
            
            // Allow dropping back to the list area
            const listContainer = document.querySelector('.col-md-5');
            if (listContainer) {
                listContainer.addEventListener('dragover', function(e) {
                    const fromInput = e.dataTransfer.types.includes('from-input');
                    if (fromInput) {
                        e.preventDefault();
                        e.dataTransfer.dropEffect = 'move';
                    }
                });
                
                listContainer.addEventListener('drop', function(e) {
                    const fromInput = e.dataTransfer.getData('from-input');
                    if (fromInput && draggedElement) {
                        e.preventDefault();
                        const value = e.dataTransfer.getData('text/plain');
                        
                        // Show the feature back in list
                        draggableFeatures.forEach(feature => {
                            if (feature.getAttribute('data-value') === value) {
                                feature.style.display = 'inline-block';
                            }
                        });
                        
                        // Clear the input and restore border style
                        if (draggedElement.tagName === 'INPUT') {
                            draggedElement.value = '';
                            updateInputStyle(draggedElement);
                        }
                    }
                });
            }
            
            // Initialize all input styles on page load
            dropZones.forEach(zone => {
                updateInputStyle(zone);
            });
        });
    </script>

    {{-- Clickable Table Cells for Questions 16-20 --}}
    <script>
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
                    }

                    if (typeof window.setActiveQuestionByNumber === 'function') {
                        window.setActiveQuestionByNumber(question);
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

    {{-- Clickable Table Cells for Questions 31-35 --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const clickableCellsQ31 = document.querySelectorAll('.clickable-cell-q31');
            
            clickableCellsQ31.forEach(cell => {
                cell.addEventListener('click', function() {
                    const question = this.getAttribute('data-question');
                    const value = this.getAttribute('data-value');
                    const hiddenInput = document.getElementById(question);
                    
                    // Get all cells for this question
                    const rowCells = document.querySelectorAll(`.clickable-cell-q31[data-question="${question}"]`);
                    
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
                        
                        // Activate bottom question number for Q31-35
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

    {{-- Checkbox limit for Questions 25-27 (max 3 selections) --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('.q25-27-checkbox');
            const maxSelections = 3;
            
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    // Count checked checkboxes
                    const checkedCount = document.querySelectorAll('.q25-27-checkbox:checked').length;
                    
                    // If more than 3 are checked, uncheck this one
                    if (checkedCount > maxSelections) {
                        this.checked = false;
                        return;
                    }
                    
                    // Update hidden inputs with selected values
                    updateHiddenInputs();
                });
            });
            
            function updateHiddenInputs() {
                const checkedBoxes = document.querySelectorAll('.q25-27-checkbox:checked');
                const values = Array.from(checkedBoxes).map(cb => cb.value);
                
                // Clear all hidden inputs first
                document.getElementById('25').value = '';
                document.getElementById('26').value = '';
                document.getElementById('27').value = '';
                
                // Set values to hidden inputs (q25, q26, q27)
                if (values.length > 0) document.getElementById('25').value = values[0] || '';
                if (values.length > 1) document.getElementById('26').value = values[1] || '';
                if (values.length > 2) document.getElementById('27').value = values[2] || '';
                
                // Activate bottom question number based on checked count
                // 1 checked = 25 active, 2 checked = 26 active, 3 checked = 27 active
                if (typeof window.setActiveQuestionByNumber === 'function') {
                    if (values.length === 1) {
                        window.setActiveQuestionByNumber('25');
                    } else if (values.length === 2) {
                        window.setActiveQuestionByNumber('26');
                    } else if (values.length === 3) {
                        window.setActiveQuestionByNumber('27');
                    }
                }
            }
        });
    </script>

    {{-- Radio button click for Questions 28-30 to activate bottom numbers --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Q28 radio buttons
            document.querySelectorAll('input[name="q28"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    if (typeof window.setActiveQuestionByNumber === 'function') {
                        window.setActiveQuestionByNumber('28');
                    }
                });
            });
            
            // Q29 radio buttons
            document.querySelectorAll('input[name="q29"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    if (typeof window.setActiveQuestionByNumber === 'function') {
                        window.setActiveQuestionByNumber('29');
                    }
                });
            });
            
            // Q30 radio buttons
            document.querySelectorAll('input[name="q30"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    if (typeof window.setActiveQuestionByNumber === 'function') {
                        window.setActiveQuestionByNumber('30');
                    }
                });
            });
        });
    </script>

</body>

</html>
