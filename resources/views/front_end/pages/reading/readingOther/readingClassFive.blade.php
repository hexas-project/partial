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
            gap: 15px;
            align-items: center;
            overflow-x: auto;
            white-space: nowrap;
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

        .tab.active .tab-title {
            color: #5a5a5a;
        }

        .tab-placeholder {
            font-size: 13px;
            color: #5a5a5aff;
            margin-left: 10px;
        }

        .tab-content {
            display: none !important;
        }

        .tab-content.active {
            display: block !important;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }


        .question-number.active, .dd-gap.active, .question-link.active {
            border: 2px solid #5a5a5a;
            padding: 1px 5px;
            color: #5a5a5a !important;
            font-weight: bold;
        }

        .tfng-num.active {
            color: #5a5a5a !important;
            font-weight: bold;
        }

        .question-link {
            text-decoration: none;
            color: #5a5a5aff;
            font-weight: 500;
        }

        .question-link.answered {
            color: #5a5a5a !important;
            font-weight: bold;
        }

        /* Remove border from input fields when focused */
        /* input[type="text"]:focus {
            outline: none;
            border: none;
            border-bottom: 1px dotted #000;
        } */

        .question_site input[type="text"]:focus {
            /* border-bottom: 1px dotted #000; */
            outline: none;
        }

        .tab .question-links {
            display: none;
            flex-wrap: nowrap;
            gap: 15px;
            /* margin-left: 15px; */
            align-items: center;
        }

        .tab .question-placeholder {
            display: block;
            font-size: 13px;
            color: #5a5a5aff;
            margin-left: 15px;
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

        .mark,
        mark {
            padding: 0px !important;

        }

        .modal-backdrop {
            opacity: 1 !important;
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            background-color: rgba(0, 0, 0, 0.92) !important;
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

        /* Hide placeholder on focus for all inputs */
        input:focus::placeholder {
            color: transparent;
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

        .ques {
            font-weight: bold;
        }

        ul.options {
            line-height: 5px;
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

        .dd-wordbank {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 12px;
        }

        .dd-word {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            background: #f8f9fa;
            border: 1px solid #e0e0e0;
            border-radius: 4px;
            cursor: grab;
            user-select: none;
            min-height: 30px;
            height: auto;
            box-sizing: border-box;
            white-space: nowrap;
            color: #000;
            font-weight: 600;
            box-shadow: 0 2px 5px rgba(0,0,0,0.08);
            transition: all 0.2s ease;
        }

        .dd-word:hover {
            box-shadow: 0 4px 10px rgba(0,0,0,0.12);
            transform: translateY(-2px);
            background: #fff;
        }

        .dd-word:active {
            cursor: grabbing;
        }

        .dd-gap {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 150px;
            min-height: 35px;
            height: auto;
            padding: 2px;
            border: 1px solid #ccc;
            background: transparent;
            border-radius: 4px;
            vertical-align: middle;
            margin: 4px 6px;
            box-sizing: border-box;
            white-space: nowrap;
        }

        .dd-gap .dd-word {
            box-shadow: none !important;
            border: none !important;
            background: transparent !important;
            padding: 0 5px;
        }

        .dd-gap .dd-word:hover {
            box-shadow: none !important;
            transform: none !important;
        }

        .dd-gap.is-over {
            outline: 2px dashed #2f80ed;
            outline-offset: 2px;
        }

        .dd-placeholder {
            opacity: 0.8;
            font-weight: bold;
            color: #000;
        }

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
        .dnd-heading:active { cursor: grabbing; }
        .dnd-heading.dragging { opacity: 0.4; }
        .dnd-heading.used { opacity: 0.4; cursor: default; pointer-events: none; display: none; }
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
            border: 1px solid #d6d6d6;
            padding: 10px 12px;
            cursor: pointer;
            background: #dbeafe;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }

        .tfng-num {
            width: 28px;
            height: 28px;
            background: #dbeafe;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            flex: 0 0 auto;
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
            margin: 10px 0;
            cursor: pointer;
        }

        .tfng-options input[type="radio"] {
            margin-top: 3px;
        }
    </style>
</head>

<body>
    <form action="{{ route('reading.submit') }}" method="POST" id="testForm" spellcheck="false" autocomplete="off">
        @csrf

        {{-- hidden input  --}}
        <input type="hidden" name="test_name" value="{{ $testName ?? 'class05_reading' }}">
        <input type="hidden" name="student_id" value="{{ auth()->id() ?? session('student_batch_id') }}">
        <input type="hidden" name="exam_student_id" id="examStudentIdField" value="{{ session('exam_student_id', '') }}">
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
                                    <span class="material-icons-outlined">schedule</span>
                                    <strong id="timer">60 : 00 minutes remaining</strong></a>
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
            <!-- CUSTOM CONTEXT MENU - Commented out to use disable-find.js popup instead -->
            <!--
            <div id="customContextMenu"
                style="
                position: absolute;
                background: white;
                border: 1px solid #ccc;
                border-radius: 4px;
                padding: 2px;
                z-index: 9999;
                display: none;
                box-shadow: 0 4px 12px rgba(0,0,0,0.15);
                min-width: 120px;">
                <div id="highlightOption" class="menu-item" style="padding: 8px 12px; cursor: pointer; border-radius: 3px;">🖍️ Highlight</div>
                <div id="notesOption" class="menu-item" style="padding: 8px 12px; cursor: pointer; border-radius: 3px;">📝 Notes</div>
                <div id="clearOption" class="menu-item" style="padding: 8px 12px; cursor: pointer; border-radius: 3px;">🗑️ Clear</div>
                <div id="allClear" class="menu-item" style="padding: 8px 12px; cursor: pointer; border-radius: 3px;">📝 Clear all</div>
            </div>

            <style>
                .menu-item:hover {
                    background-color: #f0f0f0;
                }
            </style>
            -->
            <!-- question part 1 -->
            <div class="container-fluid px-5">
                <div class="tab-content active" id="part1" style="margin-bottom: 80px;">
                    <div class="question_part">
                        <h4>Part 1</h4>
                        <p>Read the text below and answer questions 1-30
                        </p>
                    </div>
                    <div class="mt-4">


                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-md-6">


                                <div class="scroll-box" style="text-align:left;">
                                    
                                    <h4><strong>The students' problem</strong></h4>

                                    <div class="mb-2"><input type="text" class="dnd-drop-input" data-question="q1" placeholder="1" readonly style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;"><input type="text" name="q1" style="display:none;" id="q1" value="{{ $answers[1] ?? '' }}"></div>
                                    <p>The college and university accommodation crisis in Ireland has become 'so chronic' that students are being forced to sleep rough, share a bed with strangers – or give up on studying altogether.</p>

                                    <div class="mb-2"><input type="text" class="dnd-drop-input" data-question="q2" placeholder="2" readonly style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;"><input type="text" name="q2" style="display:none;" id="q2" value="{{ $answers[2] ?? '' }}"></div>
                                    <p>The deputy president of the Union of Students in Ireland, Kevin Donoghue, said the problem has become particularly acute in Dublin. He told the Irish Mirror: "Students are so desperate, they're not just paying through the nose to share rooms – they're paying to share a bed with complete strangers. It reached crisis point last year and it's only getting worse. "We've heard of students sleeping rough; on sofas, floors and in their cars and I have to stress there's no student in the country that hasn't been touched by this crisis. "Commutes – which would once have been considered ridiculous – are now normal, whether that's by bus, train or car and those who drive often end up sleeping in their car if they've an early start the next morning.</p>

                                    <div class="mb-2"><input type="text" class="dnd-drop-input" data-question="q3" placeholder="3" readonly style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;"><input type="text" name="q3" style="display:none;" id="q3" value="{{ $answers[3] ?? '' }}"></div>
                                    <p>Worry is increasing over the problems facing Ireland's 200,000 students as the number increases over the next 15 years. With 165,000 full-time students in Ireland – and that figure expected to increase to around 200,000 within the next 15 years –fears remain that there aren't enough properties to accommodate current numbers.</p>

                                    <div class="mb-2"><input type="text" class="dnd-drop-input" data-question="q4" placeholder="4" readonly style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;"><input type="text" name="q4" style="display:none;" id="q4" value="{{ $answers[4] ?? '' }}"></div>
                                    <p>Mr. Donoghue added: "The lack of places to live is actually forcing school-leavers out of college altogether. Either they don't go in the first place or end up having to drop out because they can't get a room and commuting is just too expensive, stressful and difficult."</p>

                                    <div class="mb-2"><input type="text" class="dnd-drop-input" data-question="q5" placeholder="5" readonly style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;"><input type="text" name="q5" style="display:none;" id="q5" value="{{ $answers[5] ?? '' }}"></div>
                                    <p>Claims have emerged from the country that some students have been forced to sleep in cars, or out on the streets, because of the enormous increases to rent in the capital. Those who have been lucky enough to find a place to live have had to do so 'blind' by paying for accommodation, months in advance, they haven't even seen just so they will have a roof over their head over the coming year.</p>

                                    <div class="mb-2"><input type="text" class="dnd-drop-input" data-question="q6" placeholder="6" readonly style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;"><input type="text" name="q6" style="display:none;" id="q6" value="{{ $answers[6] ?? '' }}"></div>
                                    <p>According to the Irish Independent, it's the 'Google effect' which is to blame. As Google and other blue-chip companies open offices in and around Dublin's docklands area, which are 'on the doorstep of the city', international professionals have been flocking to the area which will boast 2,600 more apartments, on 50 acres of undeveloped land, over the next three to 10 years.</p>

                                    <div class="mb-2"><input type="text" class="dnd-drop-input" data-question="q7" placeholder="7" readonly style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;"><input type="text" name="q7" style="display:none;" id="q7" value="{{ $answers[7] ?? '' }}"></div>
                                    <p>Rent in the area soared by 15 per cent last year and a two-bedroom apartment overlooking the Grand Canal costs €2,100 (£1,500) per month to rent. Another two-bedroom apartment at Hanover Dock costs €2,350 (almost £1,700) with a three-bedroom penthouse – measuring some 136 square meters – sits at €4,500 (£3,200) per month in rent.</p>

                                    <div class="mb-2"><input type="text" class="dnd-drop-input" data-question="q8" placeholder="8" readonly style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;"><input type="text" name="q8" style="display:none;" id="q8" value="{{ $answers[8] ?? '' }}"></div>
                                    <p>Ireland's Higher Education Authority admitted this was the first time they had seen circumstances 'so extreme' and the Fianna Fáil party leader, Michael Martin, urged on the Government to intervene. He said: "It is very worrying that all of the progress in opening up access to higher education in the last decade – particularly for the working poor – is being derailed because of an entirely foreseeable accommodation crisis.</p>

                                </div>


                            </div>
                            <!-- Column 2 -->
                            <div class="col-md-6 question_site">
                                <h3><strong>Questions 1-8</strong></h3>
                                <p>Reading Passage 1 has eight sections. Choose the correct heading for each section and move it into the gap.</p>
                                
                                <p><strong>Heading Options:</strong></p>

                                <div id="dnd-headings-list">
                                    <div class="dnd-heading" draggable="true" data-value="A" data-content="Cons of the commuting">Cons of the commuting</div>
                                    <div class="dnd-heading" draggable="true" data-value="B" data-content="Thing that students have to go through">Thing that students have to go through</div>
                                    <div class="dnd-heading" draggable="true" data-value="C" data-content="Commutes have become common in Ireland nowaday">Commutes have become common in Ireland nowaday</div>
                                    <div class="dnd-heading" draggable="true" data-value="D" data-content="Danger of the overflow">Danger of the overflow</div>
                                    <div class="dnd-heading" draggable="true" data-value="E" data-content="Cause of the problems">Cause of the problems</div>
                                    <div class="dnd-heading" draggable="true" data-value="F" data-content="Pricing data">Pricing data</div>
                                    <div class="dnd-heading" draggable="true" data-value="G" data-content="Regression">Regression</div>
                                    <div class="dnd-heading" draggable="true" data-value="H" data-content="Eyeless choice">Eyeless choice</div>
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Questions 9-14</strong></h3>
                                    <p>Choose <strong>TRUE</strong> if the statement agrees with the information given in the text, choose <strong>FALSE</strong> if the statement contradicts the information, or choose <strong>NOT GIVEN</strong> if there is no information on this.</p>

                                    <div class="tfng-block" id="q9_14_tfng">
                                        <div class="tfng-item open">
                                            <div class="tfng-head">
                                                <div class="tfng-num">9</div>
                                                <div class="tfng-q">The accommodation problem in Ireland is especially bad in Dublin.</div>
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
                                                <div class="tfng-q">Commutes are considered ridiculous.</div>
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
                                                <div class="tfng-q">The number of students in Ireland is not likely to increase in the future.</div>
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
                                                <div class="tfng-q">Due to the opening of the new offices around Dublin, the number of local restaurants will go up significantly over the next 3 to 10 years.</div>
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
                                                <div class="tfng-q">The rent price went up by 15% this year.</div>
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
                                                <div class="tfng-q">Michael Martin stated that crisis could have been omitted if the government reacted properly.</div>
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
                <div class="tab-content" id="part2" style="margin-bottom: 80px;">
                    <div class="question_part">
                        <h4>Part 2</h4>
                        <p>Read the text below and answer questions 15-30
                        </p>
                    </div>
                    <div class="mt-4">

                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-md-6">
                                <div class="scroll-box" style="text-align:left;">
                                    
                                    <h4><strong>The science of sleep</strong></h4>
                                    <p>
We spend a third of our lives doing it. Napoleon, Florence Nightingale and Margaret Thatcher got by on four hours a night. Thomas Edison claimed it was waste of time.<br><br>

So why do we sleep? This is a question that has baffled scientists for centuries and the answer is, no one is really sure. Some believe that sleep gives the body a chance to recuperate from the day's activities but in reality, the amount of energy saved by sleeping for even eight hours is miniscule - about 50 k Cal, the same amount of energy in a piece of toast.<br><br>

With continued lack of sufficient sleep, the part of the brain that controls language, memory, planning and sense of time is severely affected, practically shutting down. In fact, 17 hours of sustained wakefulness leads to a decrease in performance equivalent to a blood alcohol level of 0.05% (two glasses of wine). This is the legal drink driving limit in the UK.<br><br>

Research also shows that sleep-deprived individuals often have difficulty in responding to rapidly changing situations and making rational judgments. In real life situations, the consequences are grave and lack of sleep is said to have been be a contributing factor to a number of international disasters such as <i>Exxon Valdez</i>, Chernobyl, Three Mile Island and the <i>Challenger</i> shuttle explosion.<br><br>

Sleep deprivation not only has a major impact on cognitive functioning but also on emotional and physical health. Disorders such as sleep apnoea result in excessive daytime sleepiness and have been linked to stress and high blood pressure. Research has also suggested that sleep loss may increase the risk of obesity because chemicals and hormones that play a key role in controlling appetite and weight gain are released during sleep.<br><br>

What happens when we sleep?<br><br>

What happens every time we get a bit of shut eye? Sleep occurs in a recurring cycle of 90 to 110 minutes and is divided into two categories: non-REM (which is further split into four stages) and REM sleep.<br>
Non-REM sleep<br><br>

<strong>Stage one: Light Sleep</strong><br>
During the first stage of sleep, we're half awake and half asleep. Our muscle activity slows down and slight twitching may occur. This is a period of light sleep, meaning we can be awakened easily at this stage.<br><br>

<strong>Stage two: True Sleep</strong><br>
Within ten minutes of light sleep, we enter stage two, which lasts around 20 minutes. The breathing pattern and heart rate start to slow down. This period accounts for the largest part of human sleep.<br><br>

<strong>Stages three and four: Deep Sleep</strong><br>
During stage three, the brain begins to produce delta waves, a type of wave that is large (high amplitude) and slow (low frequency). Breathing and heart rate are at their lowest levels.<br>
Stage four is characterized by rhythmic breathing and limited muscle activity. If we are awakened during deep sleep we do not adjust immediately and often feel groggy and disoriented for several minutes after waking up. Some children experience bed-wetting, night terrors, or sleepwalking during this stage.<br><br>

<strong>REM sleep</strong><br>
The first rapid eye movement (REM) period usually begins about 70 to 90 minutes after we fall asleep. We have around three to five REM episodes a night.<br>
Although we are not conscious, the brain is very active - often more so than when we are awake. This is the period when most dreams occur. Our eyes dart around (hence the name), our breathing rate and blood pressure rise. However, our bodies are effectively paralysed, said to be nature's way of preventing us from acting out our dreams.<br>
After REM sleep, the whole cycle begins again.<br>
How much sleep is required?<br><br>

There is no set amount of time that everyone needs to sleep, since it varies from person to person. Results from the sleep profiler indicate that people like to sleep anywhere between 5 and 11 hours, with the average being 7.75 hours.<br>
Jim Horne from Loughborough University's Sleep Research Centre has a simple answer though: "The amount of sleep we require is what we need not to be sleepy in the daytime."<br>
Even animals require varied amounts of sleep:
                                    </p>

                                    <table border="1" style="width:100%; margin:20px 0;">
                                        <tr>
                                            <th>Species</th>
                                            <th>Average total sleep time per day</th>
                                        </tr>
                                        <tr>
                                            <td>Python</td>
                                            <td>18 hrs</td>
                                        </tr>
                                        <tr>
                                            <td>Tiger</td>
                                            <td>15.8 hrs</td>
                                        </tr>
                                        <tr>
                                            <td>Cat</td>
                                            <td>12.1 hrs</td>
                                        </tr>
                                        <tr>
                                            <td>Chimpanzee</td>
                                            <td>9.7 hrs</td>
                                        </tr>
                                        <tr>
                                            <td>Sheep</td>
                                            <td>3.8 hrs</td>
                                        </tr>
                                        <tr>
                                            <td>African elephant</td>
                                            <td>3.3 hrs</td>
                                        </tr>
                                        <tr>
                                            <td>Giraffe</td>
                                            <td>1.9 hr</td>
                                        </tr>
                                    </table>

                                    <p>
The current world record for the longest period without sleep is 11 days, set by Randy Gardner in 1965. Four days into the research, he started hallucinating. This was followed by a delusion where he thought he was a famous footballer. Surprisingly, Randy was actually functioning quite well at the end of his research and he could still beat the scientist at pinball.
                                    </p>

                                </div>
                            </div>
                            <!-- Column 2 -->
                            <div class="col-md-6 question_site">
                                <h3><strong>Questions 15-22</strong></h3>
                                <p>Choose <strong>TRUE</strong> if the statement agrees with the information given in the text, choose <strong>FALSE</strong> if the statement contradicts the information, or choose <strong>NOT GIVEN</strong> if there is no information on this.</p>

                                <div class="tfng-block" id="q15_22_tfng">
                                    <div class="tfng-item">
                                        <div class="tfng-head">
                                            <div class="tfng-num">15</div>
                                            <div class="tfng-q">Thomas Edison slept 4 hours a night.</div>
                                        </div>
                                        <div class="tfng-options">
                                            <label><input type="radio" name="q15" value="TRUE" {{ ($answers[15] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                            <label><input type="radio" name="q15" value="FALSE" {{ ($answers[15] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                            <label><input type="radio" name="q15" value="NOT GIVEN" {{ ($answers[15] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT GIVEN</span></label>
                                        </div>
                                    </div>

                                    <div class="tfng-item">
                                        <div class="tfng-head">
                                            <div class="tfng-num">16</div>
                                            <div class="tfng-q">Scientists don't have a certain answer for why we have to sleep.</div>
                                        </div>
                                        <div class="tfng-options">
                                            <label><input type="radio" name="q16" value="TRUE" {{ ($answers[16] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                            <label><input type="radio" name="q16" value="FALSE" {{ ($answers[16] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                            <label><input type="radio" name="q16" value="NOT GIVEN" {{ ($answers[16] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT GIVEN</span></label>
                                        </div>
                                    </div>

                                    <div class="tfng-item">
                                        <div class="tfng-head">
                                            <div class="tfng-num">17</div>
                                            <div class="tfng-q">Lack of sleep might lead to various problems.</div>
                                        </div>
                                        <div class="tfng-options">
                                            <label><input type="radio" name="q17" value="TRUE" {{ ($answers[17] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                            <label><input type="radio" name="q17" value="FALSE" {{ ($answers[17] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                            <label><input type="radio" name="q17" value="NOT GIVEN" {{ ($answers[17] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT GIVEN</span></label>
                                        </div>
                                    </div>

                                    <div class="tfng-item">
                                        <div class="tfng-head">
                                            <div class="tfng-num">18</div>
                                            <div class="tfng-q">Sleep-deprivation may be the cause of anorexia.</div>
                                        </div>
                                        <div class="tfng-options">
                                            <label><input type="radio" name="q18" value="TRUE" {{ ($answers[18] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                            <label><input type="radio" name="q18" value="FALSE" {{ ($answers[18] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                            <label><input type="radio" name="q18" value="NOT GIVEN" {{ ($answers[18] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT GIVEN</span></label>
                                        </div>
                                    </div>

                                    <div class="tfng-item">
                                        <div class="tfng-head">
                                            <div class="tfng-num">19</div>
                                            <div class="tfng-q">There are four stages of the REM sleep.</div>
                                        </div>
                                        <div class="tfng-options">
                                            <label><input type="radio" name="q19" value="TRUE" {{ ($answers[19] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                            <label><input type="radio" name="q19" value="FALSE" {{ ($answers[19] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                            <label><input type="radio" name="q19" value="NOT GIVEN" {{ ($answers[19] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT GIVEN</span></label>
                                        </div>
                                    </div>

                                    <div class="tfng-item">
                                        <div class="tfng-head">
                                            <div class="tfng-num">20</div>
                                            <div class="tfng-q">According to Jim Horne, we need to sleep as much as it takes to not be sleepy during the day.</div>
                                        </div>
                                        <div class="tfng-options">
                                            <label><input type="radio" name="q20" value="TRUE" {{ ($answers[20] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                            <label><input type="radio" name="q20" value="FALSE" {{ ($answers[20] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                            <label><input type="radio" name="q20" value="NOT GIVEN" {{ ($answers[20] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT GIVEN</span></label>
                                        </div>
                                    </div>

                                    <div class="tfng-item">
                                        <div class="tfng-head">
                                            <div class="tfng-num">21</div>
                                            <div class="tfng-q">Giraffes require less sleep than dogs.</div>
                                        </div>
                                        <div class="tfng-options">
                                            <label><input type="radio" name="q21" value="TRUE" {{ ($answers[21] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                            <label><input type="radio" name="q21" value="FALSE" {{ ($answers[21] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                            <label><input type="radio" name="q21" value="NOT GIVEN" {{ ($answers[21] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT GIVEN</span></label>
                                        </div>
                                    </div>

                                    <div class="tfng-item">
                                        <div class="tfng-head">
                                            <div class="tfng-num">22</div>
                                            <div class="tfng-q">After four sleepless days, Randy had a delusion about him being a football celebrity.</div>
                                        </div>
                                        <div class="tfng-options">
                                            <label><input type="radio" name="q22" value="TRUE" {{ ($answers[22] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                            <label><input type="radio" name="q22" value="FALSE" {{ ($answers[22] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                            <label><input type="radio" name="q22" value="NOT GIVEN" {{ ($answers[22] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT GIVEN</span></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Questions 23-27</strong></h3>
                                    <p><strong>Choose the correct answer.</strong></p>

                                    <div class="tfng-block" id="q23_27_mcq">
                                        <div class="tfng-item">
                                            <div class="tfng-head">
                                                <div class="tfng-num">23</div>
                                                <div class="tfng-q">During the Light Sleep stage:</div>
                                            </div>
                                            <div class="tfng-options">
                                                <label><input type="radio" name="q23" value="A" {{ ($answers[23] ?? '') === 'A' ? 'checked' : '' }}> <span>Muscle activity increases</span></label>
                                                <label><input type="radio" name="q23" value="B" {{ ($answers[23] ?? '') === 'B' ? 'checked' : '' }}> <span>Jiggling might occur</span></label>
                                                <label><input type="radio" name="q23" value="C" {{ ($answers[23] ?? '') === 'C' ? 'checked' : '' }}> <span>It is not easy to be woken up</span></label>
                                                <label><input type="radio" name="q23" value="D" {{ ($answers[23] ?? '') === 'D' ? 'checked' : '' }}> <span>After waking up, one may experience slight disorientation</span></label>
                                            </div>
                                        </div>

                                        <div class="tfng-item">
                                            <div class="tfng-head">
                                                <div class="tfng-num">24</div>
                                                <div class="tfng-q">Heart rate is at the lowest level during:</div>
                                            </div>
                                            <div class="tfng-options">
                                                <label><input type="radio" name="q24" value="A" {{ ($answers[24] ?? '') === 'A' ? 'checked' : '' }}> <span>Light Sleep stage</span></label>
                                                <label><input type="radio" name="q24" value="B" {{ ($answers[24] ?? '') === 'B' ? 'checked' : '' }}> <span>Rem Sleep</span></label>
                                                <label><input type="radio" name="q24" value="C" {{ ($answers[24] ?? '') === 'C' ? 'checked' : '' }}> <span>True Sleep stage</span></label>
                                                <label><input type="radio" name="q24" value="D" {{ ($answers[24] ?? '') === 'D' ? 'checked' : '' }}> <span>Third Sleep stage</span></label>
                                            </div>
                                        </div>

                                        <div class="tfng-item">
                                            <div class="tfng-head">
                                                <div class="tfng-num">25</div>
                                                <div class="tfng-q">The brain activity is really high:</div>
                                            </div>
                                            <div class="tfng-options">
                                                <label><input type="radio" name="q25" value="A" {{ ($answers[25] ?? '') === 'A' ? 'checked' : '' }}> <span>During REM sleep</span></label>
                                                <label><input type="radio" name="q25" value="B" {{ ($answers[25] ?? '') === 'B' ? 'checked' : '' }}> <span>During the stage of True Sleep</span></label>
                                                <label><input type="radio" name="q25" value="C" {{ ($answers[25] ?? '') === 'C' ? 'checked' : '' }}> <span>When we are awake</span></label>
                                                <label><input type="radio" name="q25" value="D" {{ ($answers[25] ?? '') === 'D' ? 'checked' : '' }}> <span>During the Deep sleep stage</span></label>
                                            </div>
                                        </div>

                                        <div class="tfng-item">
                                            <div class="tfng-head">
                                                <div class="tfng-num">26</div>
                                                <div class="tfng-q">Humans require at least:</div>
                                            </div>
                                            <div class="tfng-options">
                                                <label><input type="radio" name="q26" value="A" {{ ($answers[26] ?? '') === 'A' ? 'checked' : '' }}> <span>7.75 hours of sleep</span></label>
                                                <label><input type="radio" name="q26" value="B" {{ ($answers[26] ?? '') === 'B' ? 'checked' : '' }}> <span>5 hours of sleep</span></label>
                                                <label><input type="radio" name="q26" value="C" {{ ($answers[26] ?? '') === 'C' ? 'checked' : '' }}> <span>8 hours</span></label>
                                                <label><input type="radio" name="q26" value="D" {{ ($answers[26] ?? '') === 'D' ? 'checked' : '' }}> <span>There is no set amount of time</span></label>
                                            </div>
                                        </div>

                                        <div class="tfng-item">
                                            <div class="tfng-head">
                                                <div class="tfng-num">27</div>
                                                <div class="tfng-q">Pythons need:</div>
                                            </div>
                                            <div class="tfng-options">
                                                <label><input type="radio" name="q27" value="A" {{ ($answers[27] ?? '') === 'A' ? 'checked' : '' }}> <span>Less sleep than tigers</span></label>
                                                <label><input type="radio" name="q27" value="B" {{ ($answers[27] ?? '') === 'B' ? 'checked' : '' }}> <span>Twice as much sleep as cats</span></label>
                                                <label><input type="radio" name="q27" value="C" {{ ($answers[27] ?? '') === 'C' ? 'checked' : '' }}> <span>Almost ten times more sleep than giraffes</span></label>
                                                <label><input type="radio" name="q27" value="D" {{ ($answers[27] ?? '') === 'D' ? 'checked' : '' }}> <span>More sleep than any other animal in the world</span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Questions 28-30</strong></h3>
                                    <p>Complete the sentences below. Write <strong>NO MORE THAN THREE WORDS OR A NUMBER</strong> from the text in each gap.</p>

                                    <p>If we continually lack sleep, the specific part of our brain that controls language, is <input type="text" name="q28" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="28" placeholder="28" value="{{ $answers[28] ?? '' }}"></p>
                                    <p>True Sleep lasts approximately <input type="text" name="q29" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="29" placeholder="29" value="{{ $answers[29] ?? '' }}"></p>
                                    <p>Although during REM sleep our breathing rate and blood pressure rise, our bodies <input type="text" name="q30" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="30" placeholder="30" value="{{ $answers[30] ?? '' }}"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- question part 3 -->
                <div class="tab-content" id="part3" style="margin-bottom: 80px;">
                    <div class="question_part">
                        <h4>Part 3</h4>
                        <p>Read the text below and answer questions 31-40
                        </p>
                    </div>
                    <div class="mt-4">

                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-md-6">
                                <div class="scroll-box" style="text-align:left;">
                                    
                                    <p>
A new study finds that half of human cultures don't practice romantic lip-on-lip kissing. Animals don't tend to bother either. So how did it evolve?<br><br>

When you think about it, kissing is strange and a bit icky. You share saliva with someone, sometimes for a prolonged period of time. One kiss could pass on 80 million bacteria, not all of them good.<br><br>

Yet everyone surely remembers their first kiss, in all its embarrassing or delightful detail, and kissing continues to play a big role in new romances.<br><br>

At least, it does in some societies. People in western societies may assume that romantic kissing is a universal human behavior, but a new analysis suggests that less than half of all cultures actually do it. Kissing is also extremely rare in the animal kingdom.<br><br>

So what's really going on behind this odd behavior? If it is useful, why don't all animals do it – and all humans too? It turns out that the very fact that most animals don't kiss helps explain why some do.<br><br>

According to a new study of kissing preferences, which looked at 168 cultures from around the world, only 46% of cultures kiss in the romantic sense.<br><br>

Previous estimates had put the figure at 90%. The new study excluded parents kissing their children, and focused solely on romantic lip-on-lip action between couples.<br><br>

Many hunter-gatherer groups showed no evidence of kissing or desire to do so. Some even considered it revolting. The Mehinaku tribe in Brazil reportedly said it was "gross". Given that hunter-gatherer groups are the closest modern humans get to living our ancestral lifestyle, our ancestors may not have been kissing either.<br><br>

The study overturns the belief that romantic kissing is a near-universal human behaviour, says lead author William Jankowiak of the University of Nevada in Las Vegas. Instead it seems to be a product of western societies, passed on from one generation to the next, he says. There is some historical evidence to back that up.<br><br>

Kissing as we do it today seems to be a fairly recent invention, says Rafael Wlodarski of the University of Oxford in the UK. He has trawled through records to find evidence of how kissing has changed. The oldest evidence of a kissing-type behavior comes from Hindu Vedic Sanskrit texts from over 3,500 years ago. Kissing was described as inhaling each other's soul.<br><br>

In contrast, Egyptian hieroglyphics picture people close to each other rather than pressing their lips together.<br><br>

So what is going on? Is kissing something we do naturally, but that some cultures have suppressed? Or is it something modern humans have invented?<br><br>

We might find some insight from animals.<br><br>

Our closest relatives, chimpanzees and booboos, do kiss. Primatologist Frans de Waal of Emory University in Atlanta, Georgia, has seen many instances of chimps kissing and hugging after conflict.<br><br>

For chimpanzees, kissing is a form of reconciliation. It is more common among males than females. In other words, it is not a romantic behavior.<br><br>

Their cousins the booboos kiss more often, and they often use tongues while doing so. That's perhaps not surprising, because booboos are highly sexual beings.<br><br>

When two humans meet, we might shake hands. Booboos have sex: the so-called booboo handshake. They also use sex for many other kinds of bonding. So their kisses are not particularly romantic, either.<br><br>

These two apes are exceptions. As far as we know, other animals do not kiss at all. They may nuzzle or touch their faces together, but even those that have lips don't share saliva or purse and smack their lips together. They don't need to.<br><br>

Take wild boars. Males produce a pungent smell that females find extremely attractive. The key chemical is a pheromone called androstenone that triggers the females' desire to mate.<br><br>

From a female's point of view this is a good thing, because males with the most androstenone are also the most fertile. Her sense of smell is so acute she doesn't need to get close enough to kiss the male.<br><br>

The same is true of many other mammals. For example, female hamsters emit a pheromone that gets males very excited. Mice follow similar chemical traces to help them find partners that are genetically different, minimising the risk of accidental incest.<br><br>

Animals often release these pheromones in their urine. "Their urine is much more pungent," says Wlodarski. "If there's urine present in the environment they can assess compatibility through that."<br><br>

It's not just mammals that have a great sense of smell. A male black widow spider can smell pheromones produced by a female that tell him if she has recently eaten. To minimise the risk of being eaten, he will only mate with her if she is not hungry.<br><br>

The point is, animals do not need to get close to each other to smell out a good potential mate.<br><br>

On the other hand, humans have an atrocious sense of smell, so we benefit from getting close. Smell isn't the only cue we use to assess each other's fitness, but studies have shown that it plays an important role in mate choice.<br><br>

A study published in 1995 showed that women, just like mice, prefer the smell of men who are genetically different from them. This makes sense, as mating with someone with different genes is likely to produce healthy offspring. Kissing is a great way to get close enough to sniff out your partner's genes.<br><br>

In 2013, Wlodarski examined kissing preferences in detail. He asked several hundred people what was most important when kissing someone. How they smelled featured highly, and the importance of smell increased when women were most fertile.<br><br>

It turns out that men also make a version of the pheromone that female boars find attractive. It is present in male sweat, and when women are exposed to it their arousal levels increase slightly.<br><br>

Pheromones are a big part of how mammals close a mate, says Wlodarski. We've inherited all of our biology from mammals, we've just added extra things through evolutionary time.<br><br>

On that view, kissing is just a culturally acceptable way to get close enough to another person to detect their pheromones.<br><br>

In some cultures, this sniffing behaviour turned into physical lip contact. It's hard to pinpoint when this happened, but both serve the same purpose, says Wlodarski.<br><br>

So if you want to find a perfect match, you could forego kissing and start smelling people instead. You'll find just as good a partner, and you won't get half as many germs. Be prepared for some funny looks, though.
                                    </p>

                                </div>
                            </div>
                            <!-- Column 2 -->
                            <div class="col-md-6 question_site">
                                <h3><strong>Questions 31-35</strong></h3>
                                <p>Choose <strong>TRUE</strong> if the statement agrees with the information given in the text, choose <strong>FALSE</strong> if the statement contradicts the information, or choose <strong>NOT GIVEN</strong> if there is no information on this.</p>

                                <div class="tfng-block" id="q31_35_tfng">
                                    <div class="tfng-item">
                                        <div class="tfng-head">
                                            <div class="tfng-num">31</div>
                                            <div class="tfng-q">Both Easter and Wester societies presume that kissing is essential for any part of the world.</div>
                                        </div>
                                        <div class="tfng-options">
                                            <label><input type="radio" name="q31" value="TRUE" {{ ($answers[31] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                            <label><input type="radio" name="q31" value="FALSE" {{ ($answers[31] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                            <label><input type="radio" name="q31" value="NOT GIVEN" {{ ($answers[31] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT GIVEN</span></label>
                                        </div>
                                    </div>

                                    <div class="tfng-item">
                                        <div class="tfng-head">
                                            <div class="tfng-num">32</div>
                                            <div class="tfng-q">Our ancestors were not likely to kiss.</div>
                                        </div>
                                        <div class="tfng-options">
                                            <label><input type="radio" name="q32" value="TRUE" {{ ($answers[32] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                            <label><input type="radio" name="q32" value="FALSE" {{ ($answers[32] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                            <label><input type="radio" name="q32" value="NOT GIVEN" {{ ($answers[32] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT GIVEN</span></label>
                                        </div>
                                    </div>

                                    <div class="tfng-item">
                                        <div class="tfng-head">
                                            <div class="tfng-num">33</div>
                                            <div class="tfng-q">Chimpanzees and bonbons kiss not for the romance.</div>
                                        </div>
                                        <div class="tfng-options">
                                            <label><input type="radio" name="q33" value="TRUE" {{ ($answers[33] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                            <label><input type="radio" name="q33" value="FALSE" {{ ($answers[33] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                            <label><input type="radio" name="q33" value="NOT GIVEN" {{ ($answers[33] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT GIVEN</span></label>
                                        </div>
                                    </div>

                                    <div class="tfng-item">
                                        <div class="tfng-head">
                                            <div class="tfng-num">34</div>
                                            <div class="tfng-q">There are other animal, rather than apes, that kiss.</div>
                                            </div>
                                            <div class="tfng-options">
                                                <label><input type="radio" name="q34" value="TRUE" {{ ($answers[34] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                                <label><input type="radio" name="q34" value="FALSE" {{ ($answers[34] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                                <label><input type="radio" name="q34" value="NOT GIVEN" {{ ($answers[34] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT GIVEN</span></label>
                                            </div>
                                        </div>

                                    <div class="tfng-item">
                                        <div class="tfng-head">
                                            <div class="tfng-num">35</div>
                                            <div class="tfng-q">Scent might be important in choosing your partner.</div>
                                        </div>
                                        <div class="tfng-options">
                                            <label><input type="radio" name="q35" value="TRUE" {{ ($answers[35] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                            <label><input type="radio" name="q35" value="FALSE" {{ ($answers[35] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                            <label><input type="radio" name="q35" value="NOT GIVEN" {{ ($answers[35] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT GIVEN</span></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Questions 36-39</strong></h3>
                                    <p>Complete the sentences below. Write <strong>NO MORE THAN TWO WORDS</strong> from the text in each gap.</p>

                                    <p>According to the Mehinaku tribe, kissing is <input type="text" name="q36" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="36" placeholder="36" value="{{ $answers[36] ?? '' }}"></p>
                                    <p>Human tradition is to <input type="text" name="q37" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="37" placeholder="37" value="{{ $answers[37] ?? '' }}"> when they meet.</p>
                                    <p>A male black widow will only mate with the female if only she is <input type="text" name="q38" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="38" placeholder="38" value="{{ $answers[38] ?? '' }}"></p>
                                    <p>Humans benefit from getting close due to the fact that we have an <input type="text" name="q39" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="39" placeholder="39" value="{{ $answers[39] ?? '' }}"> of smell.</p>
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Question 40</strong></h3>
                                    <p><strong>Choose the correct answer.</strong></p>

                                    <div class="tfng-block" id="q40_mcq">
                                        <div class="tfng-item">
                                            <div class="tfng-head">
                                                <div class="tfng-num">40</div>
                                                <div class="tfng-q">Passage 3 can be described as:</div>
                                            </div>
                                            <div class="tfng-options">
                                                <label><input type="radio" name="q40" value="A" {{ ($answers[40] ?? '') === 'A' ? 'checked' : '' }}> <span>Strictly scientific text</span></label>
                                                <label><input type="radio" name="q40" value="B" {{ ($answers[40] ?? '') === 'B' ? 'checked' : '' }}> <span>Historical article</span></label>
                                                <label><input type="radio" name="q40" value="C" {{ ($answers[40] ?? '') === 'C' ? 'checked' : '' }}> <span>Article from a magazine</span></label>
                                                <label><input type="radio" name="q40" value="D" {{ ($answers[40] ?? '') === 'D' ? 'checked' : '' }}> <span>Dystopian sketch</span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
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
                <a href="#" class="question-link" data-question="11">11</a>
                <a href="#" class="question-link" data-question="12">12</a>
                <a href="#" class="question-link" data-question="13">13</a>
                <a href="#" class="question-link" data-question="14">14</a>
            </div>
            <span class="question-placeholder">14 of 26</span>
        </div>
        <div class="tab" data-tab="part2">
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
                <a href="#" class="question-link" data-question="29">29</a>
                <a href="#" class="question-link" data-question="30">30</a>
            </div>
            <span class="question-placeholder">27 of 40</span>
        </div>
        <div class="tab" data-tab="part3">
            <span class="tab-title">Part 3</span>
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
            <span class="question-placeholder">27 of 40</span>
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

    </form>
    <!--Alart Modal exam start-->
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

                tabContents.forEach(content => {
                    content.classList.remove('active');
                });

                // Add active to clicked tab
                tab.classList.add('active');
                tab.querySelector('.question-links').style.display = 'flex';
                tab.querySelector('.question-placeholder').style.display = 'none';

                // Show corresponding content
                const targetTab = tab.getAttribute('data-tab');
                const targetContent = document.getElementById(targetTab);
                if (targetContent) {
                    targetContent.classList.add('active');
                    // Scroll to top of the page to show the active tab content
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                }
            });
        });

        // Initial setup: show all question links
        // Initial setup: show only active question links
        window.addEventListener('DOMContentLoaded', () => {
            tabs.forEach(tab => {
                const qLinks = tab.querySelector('.question-links');
                const qPlaceholder = tab.querySelector('.question-placeholder');
                if (tab.classList.contains('active')) {
                    qLinks.style.display = 'flex';
                    qPlaceholder.style.display = 'none';
                } else {
                    qLinks.style.display = 'none';
                    qPlaceholder.style.display = 'block';
                }
            });
            
            if (allLinks.length > 0 && !document.querySelector('.question-link.active')) {
                setActiveQuestion(0);
            }
        });

        // Question link click handlers and arrow navigation
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
                    qLinks.style.display = 'flex';
                    qPlaceholder.style.display = 'none';
                } else {
                    tab.classList.remove('active');
                    qLinks.style.display = 'none';
                    qPlaceholder.style.display = 'block';
                }
            });
        }

        function setActiveQuestion(index) {
            currentIndex = index;
            const qNum = allLinks[index].getAttribute('data-question');
            
            // Remove active class from all links
            allLinks.forEach(link => link.classList.remove('active'));
            allLinks[index].classList.add('active');
            
            activateTabForQuestion(qNum);
            
            const inputField = document.getElementById(qNum);
            if (inputField) {
                inputField.scrollIntoView({ behavior: 'smooth', block: 'center' });
                setTimeout(() => inputField.focus(), 400);
            }
        }

        allLinks.forEach((link, index) => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                setActiveQuestion(index);
            });
        });

        // Arrow button handlers
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
                    allLinks.forEach(link => link.classList.remove('active'));
                    allLinks[linkIndex].classList.add('active');
                }
            });
        });

        // Track answered questions
        const inputs = document.querySelectorAll('input[type="text"], input[type="radio"], input[type="checkbox"]');
        inputs.forEach(input => {
            input.addEventListener('input', updateQuestionCount);
            if (input.type === 'radio' || input.type === 'checkbox') {
                input.addEventListener('change', updateQuestionCount);
            }
        });

        function updateQuestionCount() {
            tabs.forEach(tab => {
                const tabName = tab.getAttribute('data-tab');
                const questionLinks = tab.querySelectorAll('.question-link');
                const placeholder = tab.querySelector('.question-placeholder');
                
                questionLinks.forEach(link => {
                    const qNum = link.getAttribute('data-question');
                    const input = document.getElementById(qNum) || document.querySelector(`input[name="q${qNum}"]`);
                    
                    let isAnswered = false;
                    if (input) {
                        if (input.type === 'radio' || input.type === 'checkbox') {
                            const group = document.querySelectorAll(`input[name="${input.name}"]`);
                            isAnswered = Array.from(group).some(i => i.checked);
                        } else {
                            isAnswered = input.value.trim() !== '';
                        }
                    }

                    if (isAnswered) {
                        link.classList.add('answered');
                    } else {
                        link.classList.remove('answered');
                    }
                });

                // Keep the labels consistent with the user's design
                if (tabName === 'part2') {
                    placeholder.textContent = `14 of 26`;
                } else if (tabName === 'part3') {
                    placeholder.textContent = `27 of 40`;
                }
            });
        }

        // Initial count
        updateQuestionCount();

        // Modal handlers
        let startModalInstance;
        
        const studentIdInput = document.getElementById('studentIdInput');
        const startTestBtn = document.getElementById('startTestButton');
        const startModalEl = document.getElementById('startModal');

        // Ensure backdrop/body classes are cleaned up after start modal closes
        if (startModalEl) {
            startModalEl.addEventListener('hidden.bs.modal', function() {
                document.querySelectorAll('.modal-backdrop').forEach(b => b.remove());
                document.body.classList.remove('modal-open');
                document.body.style.overflow = '';
                document.body.style.paddingRight = '';
            });
        }

        // Validation function
        const validateStudentId = (id) => {
            if (!id || id.trim().length < 8) {
                return false;
            }
            return true;
        };

        // Fullscreen function
        const requestFullscreen = () => {
            const elem = document.documentElement;
            if (document.fullscreenElement) return;
            if (elem.requestFullscreen) {
                elem.requestFullscreen().catch(() => {});
            } else if (elem.webkitRequestFullscreen) {
                elem.webkitRequestFullscreen();
            } else if (elem.msRequestFullscreen) {
                elem.msRequestFullscreen();
            }
        };

        // Intercept start button click for student ID validation
        if (startTestBtn && studentIdInput) {
            startTestBtn.addEventListener('click', function(e) {
                const studentIdError = document.getElementById('studentIdError');
                const studentId = studentIdInput.value.trim();
                const isValid = validateStudentId(studentId);

                if (!isValid) {
                    e.stopImmediatePropagation();
                    if (studentIdError) {
                        studentIdError.textContent = '⚠️ Student ID must be at least 8 characters';
                        studentIdError.style.display = 'block';
                    }
                    studentIdInput.style.borderColor = 'red';
                    return;
                }

                // Valid — save student ID, clear error, fullscreen, close modal
                sessionStorage.setItem('examStudentId', studentId);
                const examIdField = document.getElementById('examStudentIdField');
                if (examIdField) examIdField.value = studentId;
                if (studentIdError) studentIdError.style.display = 'none';
                studentIdInput.style.borderColor = '#ddd';
                requestFullscreen();

                document.getElementById('testForm').style.display = 'block';
                const modalInstance = bootstrap.Modal.getInstance(startModalEl);
                if (modalInstance) modalInstance.hide();
            }, true);

            // Clear error on input
            studentIdInput.addEventListener('input', function() {
                const studentIdError = document.getElementById('studentIdError');
                if (studentIdError) studentIdError.style.display = 'none';
                studentIdInput.style.borderColor = '#e0e0e0';
            });

            // Handle Enter key press in Student ID input
            studentIdInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    startTestBtn.click();
                }
            });
        }

        document.getElementById('continueButton').addEventListener('click', () => {
            document.getElementById('testForm').submit();
        });

        // Show the startModal on page load
        window.addEventListener('DOMContentLoaded', () => {
            startModalInstance = new bootstrap.Modal(document.getElementById('startModal'));
            startModalInstance.show();
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Ensure exam_student_id is submitted for evaluation list
            const examIdField = document.getElementById('examStudentIdField');
            const storedExamId = sessionStorage.getItem('examStudentId') || '';
            if (examIdField && storedExamId) {
                examIdField.value = storedExamId;
            }

            const startBtn = document.getElementById('startTestButton');
            if (startBtn && examIdField) {
                startBtn.addEventListener('click', function() {
                    const v = sessionStorage.getItem('examStudentId') || '';
                    if (v) examIdField.value = v;
                });
            }
        });

        // ===== Drag and Drop for Questions 1-8 =====
        document.addEventListener('DOMContentLoaded', function() {
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
                var content = headingEl.getAttribute('data-content');
                var text = headingEl.textContent;
                var qName = dropInput.getAttribute('data-question');

                var oldVal = dropInput.getAttribute('data-placed-value');
                if (oldVal) {
                    var oldH = document.querySelector('.dnd-heading[data-value="' + oldVal + '"]');
                    if (oldH) {
                        oldH.classList.remove('used');
                        oldH.style.display = '';
                    }
                }

                dropInput.value = text;
                dropInput.setAttribute('data-placed-value', val);
                var tw = measureTextWidth(text, window.getComputedStyle(dropInput).font);
                dropInput.style.width = (tw + 30) + 'px';
                dropInput.style.border = 'none';
                dropInput.style.boxShadow = '0 2px 8px rgba(0,0,0,0.15)';

                headingEl.classList.add('used');
                headingEl.style.display = 'none';

                var hidden = document.querySelector('input[name="' + qName + '"]');
                if (hidden) {
                    hidden.value = content;
                    hidden.dispatchEvent(new Event('change'));
                }
                updateQuestionCount();
            }

            document.querySelectorAll('.dnd-drop-input').forEach(function(dropInput) {
                dropInput.addEventListener('dblclick', function() {
                    var oldVal = dropInput.getAttribute('data-placed-value');
                    if (oldVal) {
                        var h = document.querySelector('.dnd-heading[data-value="' + oldVal + '"]');
                        if (h) { h.classList.remove('used'); h.style.display = ''; }
                    }
                    dropInput.value = '';
                    dropInput.removeAttribute('data-placed-value');
                    dropInput.style.width = '200px';
                    dropInput.style.border = '1px solid #ccc';
                    dropInput.style.boxShadow = 'none';
                    var qName = dropInput.getAttribute('data-question');
                    var hidden = document.querySelector('input[name="' + qName + '"]');
                    if (hidden) { hidden.value = ''; hidden.dispatchEvent(new Event('change')); }
                    updateQuestionCount();
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
                    if (e.clientX >= rect.left && e.clientX <= rect.right && e.clientY >= rect.top && e.clientY <= rect.bottom) {
                        inp.style.borderColor = '#2980b9';
                        inp.style.background = '#ebf5fb';
                    } else {
                        inp.style.borderColor = inp.getAttribute('data-placed-value') ? 'transparent' : '#ccc';
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
                    inp.style.borderColor = inp.getAttribute('data-placed-value') ? 'transparent' : '#ccc';
                    inp.style.background = '#fff';
                    var rect = inp.getBoundingClientRect();
                    if (e.clientX >= rect.left && e.clientX <= rect.right && e.clientY >= rect.top && e.clientY <= rect.bottom) {
                        if (dndSourceInput && dndSourceInput !== inp) {
                            dndSourceInput.value = '';
                            dndSourceInput.removeAttribute('data-placed-value');
                            dndSourceInput.style.width = '200px';
                            dndSourceInput.style.border = '1px solid #ccc';
                            dndSourceInput.style.boxShadow = 'none';
                            var srcQ = dndSourceInput.getAttribute('data-question');
                            var srcHidden = document.querySelector('input[name="' + srcQ + '"]');
                            if (srcHidden) { srcHidden.value = ''; srcHidden.dispatchEvent(new Event('change')); }
                        } else if (dndSourceInput && dndSourceInput === inp) {
                            dndDraggedEl.classList.remove('dragging');
                            dndDraggedEl = null; dndSourceInput = null;
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
                    dndSourceInput.style.width = '200px';
                    dndSourceInput.style.border = '1px solid #ccc';
                    dndSourceInput.style.boxShadow = 'none';
                    var srcQ = dndSourceInput.getAttribute('data-question');
                    var srcHidden = document.querySelector('input[name="' + srcQ + '"]');
                    if (srcHidden) { srcHidden.value = ''; srcHidden.dispatchEvent(new Event('change')); }
                    updateQuestionCount();
                }

                if (dndDraggedEl) dndDraggedEl.classList.remove('dragging');
                dndDraggedEl = null;
                dndSourceInput = null;
            });

            // Restore saved answers on page load
            ['q1','q2','q3','q4','q5','q6','q7','q8'].forEach(function(qName) {
                var hidden = document.querySelector('input[name="' + qName + '"]');
                if (!hidden || !hidden.value) return;
                var savedContent = hidden.value.trim();
                var heading = document.querySelector('.dnd-heading[data-content="' + savedContent + '"]');
                var dropInput = document.querySelector('.dnd-drop-input[data-question="' + qName + '"]');
                if (!heading || !dropInput) return;

                var val = heading.getAttribute('data-value');
                var text = heading.textContent;
                heading.classList.add('used');
                heading.style.display = 'none';
                dropInput.value = text;
                dropInput.setAttribute('data-placed-value', val);
                var tw = measureTextWidth(text, window.getComputedStyle(dropInput).font);
                dropInput.style.width = (tw + 30) + 'px';
                dropInput.style.border = 'none';
                dropInput.style.boxShadow = '0 2px 8px rgba(0,0,0,0.15)';
            });
            updateQuestionCount();
        });
    </script>
    
    {{-- alart and timer script and finished test script  added in frontend layout  CommonScript --}}

    @include('front_end.layout.commonScript');

    <!-- tfng accordion toggle -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function initTfngAccordion(containerId) {
                const container = document.getElementById(containerId);
                if (!container) return;
                const items = container.querySelectorAll('.tfng-item');
                const heads = container.querySelectorAll('.tfng-head');

                if (items.length > 0 && !container.querySelector('.tfng-item.open')) {
                    items[0].classList.add('open');
                }

                heads.forEach((head) => {
                    head.addEventListener('click', () => {
                        const item = head.closest('.tfng-item');
                        if (!item) return;
                        const isOpen = item.classList.contains('open');
                        items.forEach((it) => it.classList.remove('open'));
                        if (!isOpen) {
                            item.classList.add('open');
                            setTimeout(() => {
                                const options = item.querySelector('.tfng-options');
                                const questionSite = item.closest('.question_site');
                                if (!options || !questionSite) return;
                                const cRect = questionSite.getBoundingClientRect();
                                const oRect = options.getBoundingClientRect();
                                const overflow = oRect.bottom - cRect.bottom;
                                if (overflow > 0) {
                                    questionSite.scrollTo({ top: questionSite.scrollTop + overflow + 20, behavior: 'smooth' });
                                }
                            }, 270);
                        }
                    });
                });
            }

            initTfngAccordion('q9_14_tfng');
            initTfngAccordion('q15_22_tfng');
            initTfngAccordion('q23_27_mcq');
            initTfngAccordion('q31_35_tfng');
            initTfngAccordion('q40_mcq');
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

    <!-- highlight and note script - Commented out to use disable-find.js instead -->
    <!--
    <script>
        const contextMenu = document.getElementById('customContextMenu');
        const highlightOption = document.getElementById('highlightOption');
        const notesOption = document.getElementById('notesOption');
        const clearOption = document.getElementById('clearOption');
        const allClearOption = document.getElementById('allClear');
        let selectionRange = null;
        let activePopup = null; // track the active popup

        let clickedMark = null; // Track which mark was right-clicked

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

        function highlightRange(range) {
            const marks = [];
            const startContainer = range.startContainer;
            const endContainer = range.endContainer;
            const startOffset = range.startOffset;
            const endOffset = range.endOffset;

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

            return marks;
        }
        
        // Show custom context menu on text selection
        document.addEventListener('contextmenu', function(e) {
            // Check if right-clicking on already highlighted text (mark element)
            if (e.target.tagName === 'MARK') {
                e.preventDefault();
                clickedMark = e.target; // Store the clicked mark
                contextMenu.style.display = 'block';
                contextMenu.style.left = e.pageX + 'px';
                contextMenu.style.top = e.pageY + 'px';
                return;
            }
            
            clickedMark = null; // Reset if not clicking on mark
            const selection = window.getSelection();
            if (selection.rangeCount > 0 && selection.toString().trim() !== '') {
                e.preventDefault();
                selectionRange = selection.getRangeAt(0).cloneRange();
                contextMenu.style.display = 'block';
                contextMenu.style.left = e.pageX + 'px';
                contextMenu.style.top = e.pageY + 'px';
            } else {
                contextMenu.style.display = 'none';
            }
        });

        // Highlight only
        highlightOption.addEventListener('click', function() {
            if (selectionRange) {
                try {
                    highlightRange(selectionRange);
                    window.getSelection().removeAllRanges();
                } catch (err) {
                    console.log('Highlight error:', err);
                }
            }
            contextMenu.style.display = 'none';
        });

        // Add note with popup
        notesOption.addEventListener('click', function() {
            // If right-clicked on already highlighted text, just open its popup
            if (clickedMark) {
                showNotePopup(clickedMark);
                contextMenu.style.display = 'none';
                return;
            }
            
            // Otherwise, create new highlight with note
            if (selectionRange) {
                let marks = [];
                const selectedGroupText = (selectionRange.toString ? selectionRange.toString() : '').trim();
                try {
                    marks = highlightRange(selectionRange);
                    window.getSelection().removeAllRanges();
                } catch (err) {
                    console.log('Highlight error:', err);
                }
                if (!marks.length) {
                    contextMenu.style.display = 'none';
                    return;
                }

                const markId = String(Date.now());
                marks.forEach((mark) => {
                    mark.setAttribute('data-tooltip', '');
                    mark.setAttribute('data-note', '');
                    mark.dataset.markId = markId;
                    mark.addEventListener('click', function(e) {
                        e.stopPropagation();
                        showNotePopup(mark);
                    });
                });

                const firstMark = marks[0];
                if (firstMark) {
                    const sidebar = document.getElementById('sidebar');
                    const noteDiv = document.createElement('div');
                    noteDiv.classList.add('sidebar-note-item');
                    noteDiv.innerHTML = `
                        <div class="sidebar-header" style="margin-bottom: 3px; cursor: pointer;">${selectedGroupText || firstMark.textContent}</div>
                        <div class="sidebar-note-content" style="color: #666; white-space: pre-wrap;"></div>
                    `;
                    noteDiv.style.borderBottom = '1px solid #ccc';
                    noteDiv.style.padding = '8px';
                    noteDiv.dataset.markId = markId;
                    sidebar.appendChild(noteDiv);

                    noteDiv.addEventListener('click', () => {
                        showNotePopup(firstMark);
                    });

                    showNotePopup(firstMark);
                }
            }
            contextMenu.style.display = 'none';
        });

        // Clear single highlight - only works when right-clicking on highlighted text
        clearOption.addEventListener('click', function() {
            if (clickedMark) {
                const markId = clickedMark.dataset.markId;
                
                // Remove from sidebar
                if (markId) {
                    const sidebarItem = document.querySelector(`.sidebar-note-item[data-mark-id="${markId}"]`);
                    if (sidebarItem) {
                        sidebarItem.remove();
                    }
                }
                
                // Remove highlight and restore original text
                const parent = clickedMark.parentNode;
                while (clickedMark.firstChild) {
                    parent.insertBefore(clickedMark.firstChild, clickedMark);
                }
                parent.removeChild(clickedMark);
                
                clickedMark = null;
            }
            contextMenu.style.display = 'none';
        });

        // Clear all highlights and notes
        allClearOption.addEventListener('click', function() {
            document.querySelectorAll('mark').forEach(marked => {
                marked.replaceWith(document.createTextNode(marked.innerText));
            });
            const notePopup = document.querySelector('.note-popup');
            if (notePopup) notePopup.remove();
            activePopup = null;

            const sidebar = document.getElementById('sidebar');
            sidebar.innerHTML = `
        <div class="sidebar-header">
            <h5>Notes</h5>
            <span class="close-btn">&times;</span>
        </div>
        `;
            sidebar.querySelector('.close-btn').addEventListener('click', () => {
                sidebar.classList.remove('open');
                document.getElementById('main-content').classList.remove('shifted');
            });

            sidebar.classList.remove('open');
            document.getElementById('main-content').classList.remove('shifted');
            contextMenu.style.display = 'none';
        });

        // Close context menu on outside click
        document.addEventListener('click', function(e) {
            if (!contextMenu.contains(e.target)) {
                contextMenu.style.display = 'none';
            }
        });

        // Function to show note popup for a mark element
        function showNotePopup(mark) {
            if (activePopup) {
                activePopup.remove();
                document.removeEventListener('click', handleOutsideClick);
            }

            const markId = mark.dataset.markId;
            let popupTitle = mark.innerText;
            let existingNote = mark.dataset.note || '';

            if (markId) {
                const allMarks = Array.from(document.querySelectorAll(`mark[data-mark-id="${markId}"]`));
                if (allMarks.length) {
                    popupTitle = allMarks.map(m => m.innerText).join('');
                    existingNote = allMarks.find(m => (m.dataset.note || '').trim() !== '')?.dataset.note || existingNote;
                }
            }

            const notePopup = document.createElement('div');
            notePopup.classList.add('note-popup');
            notePopup.innerHTML = `
        <div class="drag-handle" style="background: linear-gradient(to bottom, #f0f0f0, #d0d0d0); padding: 8px; cursor: move; border-bottom: 2px solid #999; display: flex; justify-content: space-between; align-items: center; user-select: none;">
            <span style="font-size: 12px; color: #666;"> Drag to move</span>
            <span class="close-note" style="cursor: pointer; font-size: 20px; font-weight: bold; color: #666;">&times;</span>
        </div>
        <div class="popup-header" contenteditable="true" style="font-weight: bold; cursor: text; padding: 8px; background: rgba(0,0,0,0.05); margin-bottom: 5px; border: 1px solid #ccc; outline: none;">${popupTitle}</div>
        <textarea placeholder="Add your note here..." style="width:100%; border:1px solid #ccc; background-color:yellow; min-height: 60px; cursor: text; padding: 5px; resize: vertical;">${existingNote}</textarea>
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
                const noteValue = textarea.value;

                if (markId) {
                    document.querySelectorAll(`mark[data-mark-id="${markId}"]`).forEach((m) => {
                        m.dataset.note = noteValue;
                    });
                } else {
                    mark.dataset.note = noteValue;
                }
                
                // Update sidebar note content
                if (markId) {
                    const sidebarItem = document.querySelector(`.sidebar-note-item[data-mark-id="${markId}"]`);
                    if (sidebarItem) {
                        const sidebarNoteContent = sidebarItem.querySelector('.sidebar-note-content');
                        if (sidebarNoteContent) {
                            sidebarNoteContent.textContent = noteValue;
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
            let isDragging = false,
                offsetX, offsetY;
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('#testForm input');
            inputs.forEach(function(input) {
                input.setAttribute('autocomplete', 'off');
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const testForm = document.getElementById('testForm');

            const dirtyInputs = new Map();
            let autosaveDebounceTimer = null;

            function autosaveInput(input) {
                const formData = new FormData();
                formData.append('student_id', document.querySelector('input[name="student_id"]').value);
                formData.append('test_name', document.querySelector('input[name="test_name"]').value);

                const assignmentIdField = document.querySelector('input[name="assignment_id"]');
                if (assignmentIdField && assignmentIdField.value) {
                    formData.append('assignment_id', assignmentIdField.value);
                }

                if (input.type === 'checkbox') {
                    const groupName = input.name;
                    const selectedValues = Array.from(document.querySelectorAll(
                            `input[name="${groupName}"]:checked`))
                        .map(cb => cb.value);
                    formData.append('question_number', groupName.replace('q', '').replace('[]', ''));
                    formData.append('answer', selectedValues.join(','));
                } else {
                    formData.append('question_number', input.name.replace('q', ''));
                    formData.append('answer', input.value);
                }

                fetch('{{ route('reading.autosave') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: formData
                    })
                    .then(response => {
                        if (!response.ok) throw new Error('Network response was not ok');
                        console.log(`✅ Autosaved: ${input.name}`);
                    })
                    .catch(err => console.error('❌ Autosave failed', err));
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
                }, true);
            }

            // Mark as dirty (do not send request immediately)
            document.querySelectorAll('input[type="radio"], input[type="checkbox"]').forEach(input => {
                input.addEventListener('change', function() {
                    markDirty(this);
                });
            });

            document.querySelectorAll('input[type="text"]').forEach(input => {
                input.addEventListener('input', function() {
                    markDirty(this);
                });
                input.addEventListener('change', function() {
                    markDirty(this);
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const wordBank = document.getElementById('q1_8_wordbank');
            const gaps = document.querySelectorAll('.dd-gap[data-q]');

            const DEFAULT_GAP_MIN_WIDTH_PX = 150;

            function resetGapWidth(gapEl) {
                if (!gapEl) return;
                gapEl.style.width = '';
                gapEl.style.minWidth = DEFAULT_GAP_MIN_WIDTH_PX + 'px';
            }

            function setGapWidthToWord(gapEl, wordEl) {
                if (!gapEl || !wordEl) return;
                // Allow the gap to shrink/grow to its content
                gapEl.style.width = 'auto';
                gapEl.style.minWidth = '0px';
                
                // Get the actual width needed
                const w = wordEl.offsetWidth || 0;
                if (w > 0) {
                    // Apply the width to ensure the gap wraps tightly
                    gapEl.style.width = (w + 4) + 'px'; 
                    gapEl.style.minWidth = (w + 4) + 'px';
                }
            }

            function setGapAnswer(gapEl, wordEl) {
                const q = gapEl.getAttribute('data-q');
                if (!q) return;

                const hidden = document.getElementById(String(q));
                if (hidden && wordEl) {
                    hidden.value = wordEl.getAttribute('data-word') || (wordEl.textContent || '').trim();
                    hidden.dispatchEvent(new Event('change'));
                }
            }

            function hydrateGapFromHidden(gapEl) {
                if (!gapEl || !wordBank) return;
                const q = gapEl.getAttribute('data-q');
                if (!q) return;
                const hidden = document.getElementById(String(q));
                const answer = hidden ? (hidden.value || '').trim() : '';
                if (!answer) return;

                const allWords = Array.from(wordBank.querySelectorAll('.dd-word'));
                const wordEl = allWords.find((w) => ((w.getAttribute('data-word') || '').trim() === answer));
                if (!wordEl) return;

                gapEl.innerHTML = '';
                gapEl.appendChild(wordEl);
                requestAnimationFrame(() => setGapWidthToWord(gapEl, wordEl));
            }

            gaps.forEach((gapEl) => hydrateGapFromHidden(gapEl));

            function clearGap(gapEl) {
                if (!gapEl) return;
                const q = gapEl.getAttribute('data-q');
                const hidden = q ? document.getElementById(String(q)) : null;

                const existingWord = gapEl.querySelector('.dd-word');
                if (existingWord && wordBank) {
                    wordBank.appendChild(existingWord);
                }

                resetGapWidth(gapEl);

                gapEl.innerHTML = '';
                if (q) {
                    const ph = document.createElement('span');
                    ph.className = 'dd-placeholder';
                    ph.textContent = q;
                    gapEl.appendChild(ph);
                }

                if (hidden) {
                    hidden.value = '';
                    hidden.dispatchEvent(new Event('change'));
                }
            }

            function setEmptyPlaceholder(gapEl) {
                const q = gapEl.getAttribute('data-q');
                gapEl.innerHTML = '';
                resetGapWidth(gapEl);
                if (!q) return;
                const ph = document.createElement('span');
                ph.className = 'dd-placeholder';
                ph.textContent = q;
                gapEl.appendChild(ph);
            }

            function clearHiddenForGap(gapEl) {
                const q = gapEl.getAttribute('data-q');
                if (!q) return;
                const hidden = document.getElementById(String(q));
                if (!hidden) return;
                hidden.value = '';
                hidden.dispatchEvent(new Event('change'));
            }

            document.addEventListener('dragstart', (e) => {
                const wordEl = e.target.closest('.dd-word');
                if (!wordEl) return;

                const fromGap = wordEl.closest('.dd-gap[data-q]');
                e.dataTransfer.setData('text/plain', wordEl.getAttribute('data-letter') || '');
                e.dataTransfer.setData('source-q', fromGap ? (fromGap.getAttribute('data-q') || '') : '');
                wordEl.classList.add('is-dragging');
            });

            document.addEventListener('dragend', (e) => {
                const wordEl = e.target.closest('.dd-word');
                if (!wordEl) return;
                wordEl.classList.remove('is-dragging');
            });

            gaps.forEach((gap) => {
                gap.addEventListener('click', () => {
                    clearGap(gap);
                });

                gap.addEventListener('dragover', (e) => {
                    e.preventDefault();
                    gap.classList.add('is-over');
                });

                gap.addEventListener('dragleave', () => {
                    gap.classList.remove('is-over');
                });

                gap.addEventListener('drop', (e) => {
                    e.preventDefault();
                    gap.classList.remove('is-over');

                    const dragging = document.querySelector('.dd-word.is-dragging');
                    if (!dragging) return;

                    const sourceQ = e.dataTransfer.getData('source-q') || '';
                    if (sourceQ) {
                        const sourceGap = document.querySelector(`.dd-gap[data-q="${CSS.escape(sourceQ)}"]`);
                        if (sourceGap && sourceGap !== gap) {
                            setEmptyPlaceholder(sourceGap);
                            clearHiddenForGap(sourceGap);
                        }
                    }

                    const currentWord = gap.querySelector('.dd-word');
                    if (currentWord && wordBank) {
                        wordBank.appendChild(currentWord);
                    }

                    gap.innerHTML = '';
                    gap.appendChild(dragging);
                    setGapAnswer(gap, dragging);
                    requestAnimationFrame(() => setGapWidthToWord(gap, dragging));
                });
            });

            if (wordBank) {
                wordBank.addEventListener('dragover', (e) => {
                    e.preventDefault();
                });

                wordBank.addEventListener('drop', (e) => {
                    e.preventDefault();
                    const dragging = document.querySelector('.dd-word.is-dragging');
                    if (!dragging) return;

                    const sourceQ = e.dataTransfer.getData('source-q') || '';
                    if (sourceQ) {
                        const sourceGap = document.querySelector(`.dd-gap[data-q="${CSS.escape(sourceQ)}"]`);
                        if (sourceGap) {
                            setEmptyPlaceholder(sourceGap);
                            clearHiddenForGap(sourceGap);
                        }
                    }

                    wordBank.appendChild(dragging);
                });
            }

            // Init TFNG Accodions
            function initTfngAccordion(containerId) {
                const container = document.getElementById(containerId);
                if (!container) return;
                const items = container.querySelectorAll('.tfng-item');
                const heads = container.querySelectorAll('.tfng-head');

                // Open first item by default
                if (items.length > 0) {
                    items[0].classList.add('open');
                }

                heads.forEach((head) => {
                    head.addEventListener('click', () => {
                        const item = head.closest('.tfng-item');
                        if (!item) return;
                        const isOpen = item.classList.contains('open');
                        items.forEach((it) => it.classList.remove('open'));
                        if (!isOpen) {
                            item.classList.add('open');
                            
                            // Highlight in footer
                            const qNum = head.querySelector('.tfng-num')?.textContent?.trim();
                            if (qNum) {
                                const linkIndex = allLinks.findIndex(l => l.getAttribute('data-question') === qNum);
                                if (linkIndex !== -1) {
                                    allLinks.forEach(l => l.classList.remove('active'));
                                    allLinks[linkIndex].classList.add('active');
                                    currentIndex = linkIndex;
                                }
                            }

                            // Add scroll logic
                            setTimeout(() => {
                                const options = item.querySelector('.tfng-options');
                                const scrollContainer = item.closest('.question_site');
                                if (!options || !scrollContainer) return;

                                const cRect = scrollContainer.getBoundingClientRect();
                                const oRect = options.getBoundingClientRect();
                                const overflow = oRect.bottom - cRect.bottom;
                                if (overflow > 0) {
                                    scrollContainer.scrollTo({
                                        top: scrollContainer.scrollTop + overflow + 20,
                                        behavior: 'smooth'
                                    });
                                }
                            }, 270);
                        }
                    });
                });
            }
            initTfngAccordion('q9_14_tfng');
            initTfngAccordion('q15_22_tfng');
            initTfngAccordion('q31_35_tfng');
            initTfngAccordion('q23_27_mcq');
            initTfngAccordion('q40_mcq');

            // Answered State Logic
            function updateAnsweredLinkState(qNum) {
                const link = document.querySelector(`.question-link[data-question="${qNum}"]`);
                if (!link) return;
                
                let isAnswered = false;
                const inputs = document.querySelectorAll(`input[name="q${qNum}"], input[name="q${qNum}[]"]`);
                inputs.forEach(input => {
                    if ((input.type === 'radio' || input.type === 'checkbox') && input.checked) isAnswered = true;
                    else if ((input.type === 'text' || input.type === 'hidden') && input.value.trim() !== '') isAnswered = true;
                });

                if (isAnswered) link.classList.add('answered');
                else link.classList.remove('answered');
            }

            // Monitor all inputs for changes
            document.querySelectorAll('input').forEach(input => {
                const handleUpdate = () => {
                    const match = input.name ? input.name.match(/^q(\d+)$/) : null;
                    if (match && match[1]) {
                        const qNum = match[1];
                        updateAnsweredLinkState(qNum);
                        
                        // Move active highlight exclusively
                        const linkIndex = allLinks.findIndex(l => l.getAttribute('data-question') === qNum);
                        if (linkIndex !== -1) {
                            allLinks.forEach(l => l.classList.remove('active'));
                            allLinks[linkIndex].classList.add('active');
                            currentIndex = linkIndex;
                            
                            // Switch tab if needed
                            activateTabForQuestion(qNum);
                            
                            // Highlight the gap/number in passage
                            document.querySelectorAll('.dd-gap, .question-number, .tfng-num').forEach(el => el.classList.remove('active'));
                            let passageEl = document.querySelector(`.dd-gap[data-q="${qNum}"], #question-${qNum}-number, #q${qNum}_tfng_num`);
                            
                            // Fallback for TFNG/MCQ if ID is missing
                            if (!passageEl) {
                                document.querySelectorAll('.tfng-num').forEach(el => {
                                    if (el.textContent.trim() === qNum) passageEl = el;
                                });
                            }
                            
                            if (passageEl) passageEl.classList.add('active');
                        }
                    }
                };

                input.addEventListener('change', handleUpdate);
                if (input.type === 'text') {
                    input.addEventListener('input', handleUpdate);
                }
            });

            // Initial check for all questions
            for (let i = 1; i <= 40; i++) {
                updateAnsweredLinkState(i);
            }

        });
    </script>
    <script>
        document.addEventListener('mouseup', function(e) {
            const menu = document.getElementById('customContextMenu');
            const selection = window.getSelection();
            
            if (selection.toString().trim().length > 0) {
                const range = selection.getRangeAt(0);
                const rect = range.getBoundingClientRect();
                
                // Show menu slightly above selection
                menu.style.display = 'block';
                menu.style.left = `${rect.left + window.scrollX + (rect.width/2) - (menu.offsetWidth/2)}px`;
                menu.style.top = `${rect.top + window.scrollY - menu.offsetHeight - 10}px`;
            } else {
                if (!menu.contains(e.target)) {
                    menu.style.display = 'none';
                }
            }
        });

        // Prevent losing selection when clicking menu items
        document.getElementById('customContextMenu').addEventListener('mousedown', function(e) {
            e.preventDefault();
        });

        document.getElementById('highlightOption').addEventListener('click', function(e) {
            e.preventDefault();
            const selection = window.getSelection();
            if (!selection.rangeCount || selection.toString().trim() === "") return;

            const range = selection.getRangeAt(0);
            
            // Modern surgical highlighting that works across multiple nodes
            const highlightRange = (range) => {
                const span = document.createElement('span');
                span.className = 'highlight';
                
                try {
                    range.surroundContents(span);
                } catch (e) {
                    // If surroundContents fails (cross-node), we handle nodes individually
                    const contents = range.extractContents();
                    span.appendChild(contents);
                    range.insertNode(span);
                }
            };

            highlightRange(range);
            
            window.getSelection().removeAllRanges();
            document.getElementById('customContextMenu').style.display = 'none';
        });

        // Sidebar logic
        const sidebar = document.getElementById('sidebar');
        const noteToggle = document.getElementById('noteToggle');
        const closeBtn = document.querySelector('.close-btn');

        if (noteToggle) {
            noteToggle.addEventListener('click', () => {
                sidebar.classList.toggle('open');
            });
        }

        if (closeBtn) {
            closeBtn.addEventListener('click', () => {
                sidebar.classList.remove('open');
            });
        }

        document.getElementById('clearOption').addEventListener('click', function() {
            const selection = window.getSelection();
            if (selection.anchorNode) {
                let node = selection.anchorNode;
                if (node.nodeType === 3) node = node.parentNode;
                
                // Keep looking up until we find a highlight span or reach the body
                while (node && node !== document.body) {
                    if (node.classList.contains('highlight')) {
                        // Un-wrap the content
                        const parent = node.parentNode;
                        while (node.firstChild) {
                            parent.insertBefore(node.firstChild, node);
                        }
                        parent.removeChild(node);
                        break;
                    }
                    node = node.parentNode;
                }
            }
            document.getElementById('customContextMenu').style.display = 'none';
        });

        document.getElementById('allClear').addEventListener('click', function() {
            document.querySelectorAll('.highlight').forEach(hl => {
                hl.replaceWith(...hl.childNodes);
            });
            document.getElementById('customContextMenu').style.display = 'none';
        });
    </script>
    -->
</body>
</html>
