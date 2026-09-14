<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reading</title>
    <script src="{{ asset('js/disable-find.js') . '?v=20260831b' }}"></script>
    <!-- Material Icons CSS -->
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
            color: green;
        }

        .tab-title {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 5px;
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


        .question-number {
            cursor: pointer;
        }

        .question-number.active {
            padding: 2px 4px;
            border: 2px solid gray;
            border-radius: 4px;
        }

        .question-link {
            text-decoration: none;
            color: gray;

        }

        .question-link.active {
            border: 2px solid gray;
            width: 25px;
            background-color: transparent !important;
            border-radius: 4px;
        }


        .question-link.answered {
            /* Removed gray background as requested */
            color: #333;
        }

        /* Remove border from input fields when focused */
        input[type="text"]:focus {
            outline: none;
            border: none;
            border-bottom: 1px dotted #000;
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

        .scroll-box {
            max-height: 70vh;
            overflow-y: auto;
            overflow-x: hidden;
            /* white-space: pre-line; */
            word-wrap: break-word;
            font-size: 16px;
        }

        .question_site {
            max-height: 70vh;
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

        #main-content {
            transition: margin-right 0.3s ease;
        }

        #main-content.shifted {
            margin-right: 300px;
        }

        .sidebar-note-item {
            cursor: pointer;
            padding: 10px;
            border-bottom: 1px solid #ddd;
            transition: background 0.3s;
        }

        .sidebar-note-item:hover {
            background: #f1f1f1;
        }

        .sidebar-header-item {
            font-weight: normal;
            font-size: 14px;
            margin-bottom: 5px;
            color: #333;
        }

        .sidebar-note-content {
            font-size: 13px;
            color: #666;
            white-space: pre-wrap;
        }

        /* Popup note style */
        .note-popup {
            position: absolute;
            background: yellow;
            padding: 10px;
            border: 1px solid #ccc;
            cursor: move;
            z-index: 2000;
            width: 260px;
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

        input:focus::placeholder {
            color: transparent;
        }

        .custom-context-menu {
            position: absolute;
            background: white;
            border: 1px solid #ccc;
            z-index: 2100;
        }

        .matching-grid {
            border-collapse: collapse;
            width: 100%;
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
            width: 50px;
        }

        .matching-grid .tick-cell {
            cursor: pointer;
            user-select: none;
        }

        .matching-grid .tick {
            visibility: hidden;
            opacity: 0;
            font-size: 20px;
            color: #2e7d32;
            font-weight: bold;
            line-height: 1;
            transition: opacity 0.1s ease;
        }

        .matching-grid .tick-cell.selected .tick {
            visibility: visible;
            opacity: 1;
        }

        /* accordion styles from Reading Class Six */
        .q14_17_accordion_custom .accordion-item,
        .q18_21_accordion_custom .accordion-item {
            border: 0 !important;
            margin-bottom: 12px;
            border-radius: 0;
            overflow: visible;
            box-shadow: none;
            background: transparent !important;
        }

        .q14_17_accordion_custom .accordion-button,
        .q18_21_accordion_custom .accordion-button {
            border: 0;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.12) !important;
            background: #dbeafe !important;
            border-radius: 8px !important;
            color: #1e3a5f;
            font-weight: 700;
        }

        .q14_17_accordion_custom .accordion-button:focus,
        .q18_21_accordion_custom .accordion-button:focus {
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.12) !important;
        }

        .q14_17_accordion_custom .accordion-button::after,
        .q18_21_accordion_custom .accordion-button::after {
            display: none;
        }

        .q14_17_accordion_custom .accordion-body,
        .q18_21_accordion_custom .accordion-body {
            border: none !important;
            padding-top: 10px;
        }

        .q14_17_accordion_custom .form-check-input:checked,
        .q14_17_accordion_custom .form-check-input:focus,
        .q18_21_accordion_custom .form-check-input:checked,
        .q18_21_accordion_custom .form-check-input:focus {
            background-color: transparent !important;
            border-color: #dee2e6 !important;
            box-shadow: none !important;
        }

        .q14_17_accordion_custom .form-check-input:checked,
        .q18_21_accordion_custom .form-check-input:checked {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='2' fill='%231e3a5f'/%3e%3c/svg%3e") !important;
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

        .question_site input[type="text"] {
            border: 1px solid #d1d1d1;
            border-radius: 4px;
            padding: 2px 8px;
            outline: none;
            background: #fff;
        }

        .question_site input[type="text"]:focus {
            outline: none;
        }

        #finishButton:hover {
            color: white !important;
            border-color: black !important;
        }

        /* Diagram numbers overlay style */
        .diagram-container {
            position: relative;
            display: inline-block;
        }
        .diagram-number {
            position: absolute;
            background: green;
            color: white;
            width: 22px;
            height: 22px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: bold;
        }
        .num-1 { top: 45%; left: 75%; }
        .num-2 { top: 25%; left: 51%; }
        .num-3 { top: 35%; left: 45%; }

        .modal-backdrop.show { opacity: 0.85; backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); }
        #startModal .modal-dialog { max-width: 450px; }
        #startModal .modal-content { border-radius: 12px; border: none; box-shadow: 0 10px 40px rgba(0,0,0,0.15); }
        #startModal .modal-header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border-radius: 12px 12px 0 0; padding: 18px 25px; border: none; }
        #startModal .modal-title { font-size: 20px; font-weight: 600; display: flex; align-items: center; gap: 10px; }
        #startModal .modal-title::before { content: "📖"; font-size: 24px; }
        #startModal .modal-body { padding: 25px; background: #f8f9fa; }
        #startModal .instruction-text { color: #555; font-size: 14px; line-height: 1.5; margin-bottom: 18px; text-align: center; }
        #startModal .form-group { background: white; padding: 16px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); }
        #startModal .form-label { font-weight: 600; color: #333; margin-bottom: 10px; display: flex; align-items: center; gap: 8px; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px; }
        #startModal .form-label::before { content: "👤"; font-size: 18px; }
        #startModal #studentIdInput { padding: 14px 16px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 16px; transition: all 0.3s; width: 100%; }
        #startModal #studentIdInput:focus { border-color: #667eea; box-shadow: 0 0 0 3px rgba(102,126,234,0.1); outline: none; }
        #startModal #studentIdError { color: #dc3545; font-size: 13px; margin-top: 8px; display: none; font-weight: 500; }
        #startModal .modal-footer { padding: 16px 25px; border: none; background: white; border-radius: 0 0 12px 12px; justify-content: center; }
        #startModal #startTestButton { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none; padding: 12px 40px; font-size: 15px; font-weight: 600; border-radius: 8px; transition: all 0.3s; box-shadow: 0 4px 15px rgba(102,126,234,0.3); text-transform: uppercase; letter-spacing: 1px; }
        #startModal #startTestButton:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(102,126,234,0.4); }

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
            padding: 5px;
            width: 200px;
            margin-bottom: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer !important;
            display: block;
        }
    </style>
</head>

<body>
    <form action="{{ route('reading.submit') }}" method="POST" id="testForm" spellcheck="false" autocomplete="off" >
        @csrf
        <input type="hidden" name="test_name" value="class07_reading">
        <input type="hidden" name="student_id" value="{{ auth()->id() ?? session('student_batch_id') }}">
        <input type="hidden" name="exam_student_id" id="examStudentIdField" value="{{ session('exam_student_id', '') }}">
        <input type="hidden" name="assignment_id" value="{{ $assignmentId ?? '' }}">

        <!-- Sidebar -->
        <div id="sidebar" class="sidebar">
            <div class="sidebar-header" style="background: #f8f9fa; border-bottom: 1px solid #ddd; padding: 10px 15px; display: flex; justify-content: space-between; align-items: center;">
                <h5 style="margin: 0; font-weight: bold; font-size: 16px;">Notes & Highlights</h5>
                <span class="close-btn" style="cursor: pointer; font-size: 24px; line-height: 1; color: #666;">&times;</span>
            </div>
            <div id="sidebar-notes-container" style="padding: 10px;">
                <!-- Notes will be appended here -->
            </div>
        </div>

        <div id="main-content">
            <nav class="navbar navbar-expand-lg" style="background-color: #e9bec2;">
                <div class="container-fluid px-5">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <span class="material-icons-outlined">schedule</span>
                                <strong id="timer">60 : 00 minutes remaining</strong>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item me-3">
                            <button class="btn btn-outline-dark" id="finishButton">Finish test</button>
                        </li>
                        <li class="nav-item">
                            <span id="noteToggle" class="material-icons-outlined" style="cursor: pointer;">note_alt</span>
                        </li>
                    </ul>
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
                <div id="highlightOption" style="padding: 5px; cursor: pointer;">🖍️ Highlight</div>
                <div id="notesOption" style="padding: 5px; cursor: pointer;">📝 Notes</div>
                <div id="clearOption" style="padding: 5px; cursor: pointer;">🗑️ Clear</div>
                <div id="allClear" style="padding: 5px; cursor: pointer;">🗑️ Clear all</div>
            </div>

            <div class="container-fluid px-5 mt-4">
                <!-- ===================== PART 1 ===================== -->
                <div class="tab-content active" id="part1" style="margin-bottom: 100px;">
                    <div class="question_part">
                        <h4 class="mb-2">Part 1</h4>
                        <p class="mb-0">Read the text below and answer questions 1-13</p>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="scroll-box">
                                <h4 class="text-center mb-4"><strong>Giving The Brain A Workout</strong></h4>
                                <p class="text-center"><em>Mental agility does not have to decline with age, as long as you keep exercising your mind, says Anna van Praagh.</em></p>
                                <p><strong>(A)</strong> Use your brain and it will grow – it really will. This is the message from neuropsychologist Ian Robertson, professor of psychology at Trinity College, Dublin and founding director of the university's Institute of Neuroscience. His book, Puzzler Brain Trainer 90-Day Workout, contains puzzles which he devised to stretch, sharpen and stimulate the brain. The puzzles, from 'memory jogs' to Sudoku to crosswords to number games are all-encompassing, and have been specially formulated to improve each and every part of the brain, from visual-spatial ability to perception, attention, memory, numerical agility, problem-solving and language.</p>
                                <p><strong>(B)</strong> Professor Robertson has been studying the brain for 57 years, in a career dedicated to changing and improving the way it works. During this time there has been a remarkable paradigm shift in the way scientists view the brain, he says. 'When I first started teaching and researching, a very pessimistic view prevailed that, from the age of three or four, we were continually losing brain cells and that the stocks couldn't be replenished. That has turned out to be factually wrong. Now that we know that the brain is "plastic" – it changes, adapts and is physically sharpened according to the experiences it has.'</p>
                                <p><strong>(C)</strong> Robertson likens our minds to trees in a park with branches spreading out, connecting and intertwining, with connections increasing in direct correlation to usage. He says that the "eureka" moment in his career – and the reason he devised his 'brain trainer' puzzles – was the realisation that the connections multiply with use and so it is possible to boost and improve our mental functions at any age. 'Now we know that it's not just children whose brains are "plastic",' he says. 'No matter how old we are, our brains are physically changed by what we do and what we think.'</p>
                                <p><strong>(D)</strong> Robertson illustrates his point by referring to Dr Eleanor McGuire's seminal 2000 study of the brains of London taxi drivers. That showed that their grey matter enlarges and adapts to help them build up a detailed mental map of the city. Brain scans revealed that the drivers had a much larger hippocampus (the part of the brain associated with navigation in birds and animals) compared with other people. Crucially, it grew larger the longer they spent doing their job. Similarly, there is strong statistical evidence that, by stretching the mind with games and puzzles, brainpower is increased. Conversely, if we do not stimulate our minds and keep the connections robust and intact, these connections will weaken and physically diminish. A more recent survey suggested that a 20-minute problem-solving session on the Nintendo DS game called 'Dr Kawashima's Brain Training' at the beginning of each day dramatically improved pupils' test results, class attendance and behaviour. Astonishingly, pupils who used the Nintendo trainer saw their test scores rise by 50 per cent more than those who did not.</p>
                                <p><strong>(E)</strong> Robertson's puzzles have been designed to have the same effect on the brain, the only difference being that, for his, you need only a pencil to get started. The idea is to shake the brain out of lazy habits and train it to start functioning at its optimum level. It is Robertson's belief that people who tackle the puzzles will see a dramatic improvement in their daily lives as the brain increases its ability across a broad spectrum. They should see an improvement in everything, from remembering people's names at parties to increased attention span, mental agility, creativity and energy.</p>
                                <p><strong>(F)</strong> 'Many of us are terrified of numbers,' he says, 'or under-confident with words. With practice, and by gently increasing the difficulty of the exercises, these puzzles will help people improve capacity across a whole range of mental domains.' The wonderful thing is that the puzzles take just five minutes, but are the mental equivalent of doing a jog or going to the gym. 'In the same way that physical exercise is good for you, so is keeping your brain stimulated,' Robertson says. 'Quite simply, those who keep themselves mentally challenged function significantly better mentally than those who do not.'</p>
                                <p><strong>(G)</strong> The puzzles are aimed at all ages. Robertson says that some old people are so stimulated that they hardly need to exercise their brains further, while some young people hardly use theirs at all and are therefore in dire need of a workout. He does concede, however, that whereas most young people are constantly forced to learn, there is a tendency in later life to retreat into a comfort zone where it is easier to avoid doing things that are mentally challenging. He compares this with becoming physically inactive, and warns of comparable repercussions. 'As the population ages, people are going to have to stay mentally active longer,' he counsels. 'We must learn to exercise our brains just as much as our bodies. People need to be aware that they have the most complex entity known to man between their ears,' he continues, 'and the key to allow it to grow and be healthy is simply to keep it stimulated.'</p>
                            </div>
                        </div>

                        <div class="col-md-6 question_site">
                            <h5><strong>Questions 1 and 2</strong></h5>
                            <p class="small"><em>Choose <strong>TWO</strong> correct answers.</em></p>
                            <div class="mb-3">
                                <ul class="options q1_2_options">
                                    <li><label style="cursor: pointer;"><input type="checkbox" class="q1_2_checkbox" value="A">  They will improve every mental skill.</label></li>
                                    <li><label style="cursor: pointer;"><input type="checkbox" class="q1_2_checkbox" value="B">  They are better than other kinds of mental exercise.</label></li>
                                    <li><label style="cursor: pointer;"><input type="checkbox" class="q1_2_checkbox" value="C">  They will have a major effect on people's mental abilities.</label></li>
                                    <li><label style="cursor: pointer;"><input type="checkbox" class="q1_2_checkbox" value="D">  They are more useful than physical exercise.</label></li>
                                    <li><label style="cursor: pointer;"><input type="checkbox" class="q1_2_checkbox" value="E">  They are certain to be more useful for older people than for the young.</label></li>
                                </ul>
                                <div class="mt-2 text-start" style="display: none;">
                                    <strong id="question-1-number" class="question-number">1</strong> <input type="hidden" name="q1" id="q1" value="{{ $answers['q1'] ?? '' }}">
                                    <strong id="question-2-number" class="question-number">2</strong> <input type="hidden" name="q2" id="q2" value="{{ $answers['q2'] ?? '' }}">
                                </div>
                            </div>

                            <hr>

                            <h5><strong>Questions 3-8</strong></h5>
                            <p class="small"><em>Complete the summary below. Choose <strong>NO MORE THAN THREE WORDS</strong> from the passage for each answer. Write your answers in boxes 3-8 below.</em></p>
                            <div class="mb-3">
                                <strong>Evidence supporting Robertson's theory</strong>
                                <p class="small mt-2">Research was carried out using <input type="text" name="q3" id="q3" value="{{ $answers['q3'] ?? '' }}" placeholder="3" style="width: 120px;"> in London as subjects. It showed that their brains change, enabling them to create a <input type="text" name="q4" id="q4" value="{{ $answers['q4'] ?? '' }}" placeholder="4" style="width: 120px;"> of London. Tests showed that their <input type="text" name="q5" id="q5" value="{{ $answers['q5'] ?? '' }}" placeholder="5" style="width: 150px;"> increased in size as they continued in their job. There is also evidence of a <input type="text" name="q6" id="q6" value="{{ $answers['q6'] ?? '' }}" placeholder="6" style="width: 120px;"> kind. People playing a certain game involving <input type="text" name="q7" id="q7" value="{{ $answers['q7'] ?? '' }}" placeholder="7" style="width: 120px;"> for a period of time every day achieved significantly better <input type="text" name="q8" id="q8" value="{{ $answers['q8'] ?? '' }}" placeholder="8" style="width: 120px;">.</p>
                            </div>

                            <hr>

                            <h5><strong>Questions 9-13</strong></h5>
                            <p class="small"><em>Reading Passage 1 has seven paragraphs, <strong>A-G</strong>. Which section contains the following information?</em></p>
                            <p><strong>NB:</strong> You may use any letter more than once.</p>
                            <div class="mb-3">
                                <table class="matching-grid mt-3">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th class="choice-cell">A</th>
                                            <th class="choice-cell">B</th>
                                            <th class="choice-cell">C</th>
                                            <th class="choice-cell">D</th>
                                            <th class="choice-cell">E</th>
                                            <th class="choice-cell">F</th>
                                            <th class="choice-cell">G</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ([
                                            9 => "An example of a situation in which people will benefit from doing the puzzles in the book.",
                                            10 => "A reason why some people don't exercise their minds.",
                                            11 => "A discovery that had an enormous effect on Robertson.",
                                            12 => "Examples of things that people commonly feel they are not very good at.",
                                            13 => "A reference to a change in beliefs about what happens to the brain over time."
                                        ] as $num => $text)
                                        <tr>
                                            <td><strong id="question-{{$num}}-number" class="question-number">{{$num}}</strong> {{ $text }}</td>
                                            @foreach (['A','B','C','D','E','F','G'] as $val)
                                            <td class="choice-cell tick-cell" data-row="{{$num}}" data-value="{{$val}}"><span class="tick">✓</span></td>
                                            @endforeach
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div style="display:none;">
                                    @for ($i = 9; $i <= 13; $i++)
                                    <input type="text" name="q{{$i}}" id="q{{$i}}" value="{{ $answers[$i] ?? '' }}">
                                    @endfor
                                </div>
                            </div>
                            

                        </div>
                    </div>
                </div>

                <!-- ===================== PART 2 ===================== -->
                <div class="tab-content" id="part2" style="margin-bottom: 100px;">
                    <div class="question_part">
                        <p class="mb-0">Read the text below and answer questions 14-26</p>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="scroll-box">
                                <h4 class="text-center mb-4"><strong>Biological Control of Pests</strong></h4>
                                <p>The continuous and reckless use of synthetic chemicals for the control of pests which pose a threat to agricultural crops and human health is proving to be counter-productive. Apart from engendering widespread ecological disorders, pesticides have contributed to the emergence of a new breed of chemical-resistant, highly lethal superbugs. According to a recent study by the Food and Agriculture Organisation (FAO), more than 300 species of agricultural pests have developed resistance to a wide range of potent chemicals. Not to be left behind are the disease-spreading pests, about 100 species of which have become immune to a variety of insecticides now in use. One glaring disadvantage of pesticides' application is that, while destroying harmful pests, they also wipe out many useful non-targeted organisms, which keep the growth of the pest population in check. This results in what agroecologists call the 'treadmill syndrome'.</p>
                                <p>Because of their tremendous breeding potential and genetic diversity, many pests are known to withstand synthetic chemicals and bear offspring with a built-in resistance to pesticides. The havoc that the 'treadmill syndrome' can bring about is well illustrated by what happened to cotton farmers in Central America. In the early 1940s, basking in the glory of chemicalbased intensive agriculture, the farmers avidly took to pesticides as a sure measure to boost crop yield. The insecticide was applied eight times a year in the mid-1940s, rising to 28 in a season in the mid-1950s, following the sudden proliferation of three new varieties of chemical-resistant pests. By the mid-1960s, the situation took an alarming turn with the outbreak of four more new pests, necessitating pesticide spraying to such an extent that 50% of the financial outlay on cotton production was accounted for by pesticides. In the early 1970s, the spraying frequently reached 70 times a season as the farmers were pushed to the wall by the invasion of genetically stronger insect species.</p>
                                <p>Most of the pesticides in the market today remain inadequately tested for properties that cause cancer and mutations as well as for other adverse effects on health, says a study by United States environmental agencies. The United States National Resource Defense Council has found that DDT was the most popular of a long list of dangerous chemicals in use. In the face of the escalating perils from indiscriminate applications of pesticides, a more effective and ecologically sound strategy of biological control, involving the selective use of natural enemies of the pest population, is fast gaining popularity — though, as yet, it is a new field with limited potential. The advantage of biological control in contrast to other methods is that it provides a relatively low-cost, perpetual control system with a minimum of detrimental side-effects. When handled by experts, bio-control is safe, non-polluting and self-dispersing. The Commonwealth Institute of Biological Control (CIBC) in Bangalore, with its global network of research laboratories and field stations, is one of the most active, non-commercial research agencies engaged in pest control by setting natural predators against parasites. CIBC also serves as a clearing-house for the export and import of biological agents for pest control world-wide.</p>
                                <p>CIBC successfully used a seed-feeding weevil, native to Mexico, to control the obnoxious parthenium weed, known to exert devious influence on agriculture and human health in both India and Australia. Similarly the Hyderabad-based Regional Research Laboratory (RRL), supported by CIBC, is now trying out an Argentinian weevil for the eradication of water hyacinth, another dangerous weed, which has become a nuisance in many parts of the world. According to Mrs Kaiser Jamil of RRL, 'The Argentinian weevil does not attack any other plant and a pair of adult bugs could destroy the weed in 4-5 days.' CIBC is also perfecting the technique for breeding parasites that prey on 'disapene scale' insects — notorious defoliants of fruit trees in the US and India. How effectively biological control can be pressed into service is proved by the following examples. In the late 1960s, when Sri Lanka's flourishing coconut groves were plagued by leaf-mining hispides, a larval parasite imported from Singapore brought the pest under control. A natural predator indigenous to India, Neodumetia sangawani, was found useful in controlling the Rhodes grass-scale insect that was devouring forage grass in many parts of the US. By using Neochetina bruci, a beetle native to Brazil, scientists at Kerala Agricultural University freed a 12-kilometrelong canal from the clutches of the weed Salvinia molesta, popularly called 'African Payal' in Kerala. About 30,000 hectares of rice fields in Kerala are infested by this weed.</p>
                            </div>
                        </div>

                        <div class="col-md-6 question_site">
                            <h5><strong>Questions 14-17</strong></h5>
                            <p class="small"><em>Choose the correct answer</em></p>

                            <div class="accordion q14_17_accordion_custom mt-3" id="q14_17_accordion">
                                @for ($i = 14; $i <= 17; $i++)
                                @php
                                    $qData = match($i) {
                                        14 => [
                                            'text' => 'The use of pesticides has contributed to:',
                                            'options' => [
                                                'A' => 'a change in the way ecologies are classified by agroecologists.',
                                                'B' => 'an imbalance in many ecologies around the world.',
                                                'C' => 'the prevention of ecological disasters in some parts of the world.',
                                                'D' => 'an increase in the range of ecologies which can be usefully farmed.'
                                            ]
                                        ],
                                        15 => [
                                            'text' => 'The Food and Agriculture Organisation has counted more than 300 agricultural pests which:',
                                            'options' => [
                                                'A' => 'are no longer responding to most pesticides in use.',
                                                'B' => 'can be easily controlled through the use of pesticides.',
                                                'C' => 'continue to spread disease in a wide range of crops.',
                                                'D' => 'may be used as part of bio-control\'s replacement of pesticides.'
                                            ]
                                        ],
                                        16 => [
                                            'text' => 'Cotton farmers in Central America began to use pesticides:',
                                            'options' => [
                                                'A' => 'because of an intensive government advertising campaign.',
                                                'B' => 'in response to the appearance of new varieties of pest.',
                                                'C' => 'as a result of changes in the seasons and the climate.',
                                                'D' => 'to ensure more cotton was harvested from each crop.'
                                            ]
                                        ],
                                        17 => [
                                            'text' => 'By the mid-1960s, cotton farmers in Central America found that pesticides:',
                                            'options' => [
                                                'A' => 'were wiping out 50% of the pests plaguing the crops.',
                                                'B' => 'were destroying 50% of the crops they were meant to protect.',
                                                'C' => 'were causing a 50% increase in the number of new pests reported.',
                                                'D' => 'were costing 50% of the total amount they spent on their crops.'
                                            ]
                                        ],
                                    };
                                @endphp
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="q{{$i}}_heading">
                                        <div class="accordion-button collapsed" role="button" tabindex="0" data-bs-toggle="collapse"
                                            data-bs-target="#q{{$i}}_collapse" aria-expanded="false" aria-controls="q{{$i}}_collapse">
                                            <strong id="question-{{$i}}-number" class="question-number">{{$i}}</strong>&nbsp;<span>{{$qData['text']}}</span>
                                        </div>
                                    </h2>
                                    <div id="q{{$i}}_collapse" class="accordion-collapse collapse" aria-labelledby="q{{$i}}_heading"
                                        data-bs-parent="#q14_17_accordion">
                                        <div class="accordion-body">
                                            @foreach ($qData['options'] as $val => $optText)
                                            <div class="form-check">
                                                <input class="form-check-input mcq-sync" type="radio" name="q{{$i}}_radio" id="q{{$i}}_{{$val}}" value="{{$val}}" data-target="q{{$i}}" {{ ($answers['q'.$i] ?? '') == $val ? 'checked' : '' }}>
                                                <label class="form-check-label" for="q{{$i}}_{{$val}}">{{$optText}}</label>
                                            </div>
                                            @endforeach
                                            <input type="hidden" name="q{{$i}}" id="q{{$i}}" value="{{ $answers['q'.$i] ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                @endfor
                            </div>

                            <hr>

                            <h5><strong>Questions 18-21</strong></h5>
                            <p class="small"><em>"Choose <strong>YES</strong> if the statement agrees with the information given in the text, choose <strong>NO</strong> if the statement contradicts the information, or choose<strong> NOT GIVEN</strong> if there is no information on this."</em></p>
                            <div class="accordion q18_21_accordion_custom mt-3" id="q18_21_accordion">

                                @for ($i = 18; $i <= 21; $i++)
                                @php
                                    $qText = match($i) {
                                        18 => "Disease-spreading pests respond more quickly to pesticides than agricultural pests do.",
                                        19 => "A number of pests are now born with an innate immunity to some pesticides.",
                                        20 => "Biological control entails using synthetic chemicals to try and change the genetic make-up of the pests' offspring.",
                                        21 => "Bio-control is free from danger under certain circumstances.",
                                    };
                                @endphp
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="q{{$i}}_heading">
                                        <div class="accordion-button collapsed" role="button" tabindex="0" data-bs-toggle="collapse"
                                            data-bs-target="#q{{$i}}_collapse" aria-expanded="false" aria-controls="q{{$i}}_collapse">
                                            <strong id="question-{{$i}}-number" class="question-number">{{$i}}</strong>&nbsp;<span>{{$qText}}</span>
                                        </div>
                                    </h2>
                                    <div id="q{{$i}}_collapse" class="accordion-collapse collapse" aria-labelledby="q{{$i}}_heading"
                                        data-bs-parent="#q18_21_accordion">
                                        <div class="accordion-body">
                                            <div class="form-check"><input class="form-check-input mcq-sync" type="radio" name="q{{$i}}_radio" id="q{{$i}}_YES" value="YES" data-target="q{{$i}}"><label class="form-check-label" for="q{{$i}}_YES">YES</label></div>
                                            <div class="form-check"><input class="form-check-input mcq-sync" type="radio" name="q{{$i}}_radio" id="q{{$i}}_NO" value="NO" data-target="q{{$i}}"><label class="form-check-label" for="q{{$i}}_NO">NO</label></div>
                                            <div class="form-check"><input class="form-check-input mcq-sync" type="radio" name="q{{$i}}_radio" id="q{{$i}}_NG" value="NOT GIVEN" data-target="q{{$i}}"><label class="form-check-label" for="q{{$i}}_NG">NOT GIVEN</label></div>
                                            <input type="text" name="q{{$i}}" id="q{{$i}}" style="display:none;" />
                                        </div>
                                    </div>
                                </div>
                                @endfor
                            </div>

                            <hr>

                            <h5><strong>Questions 22-26</strong></h5>
                            <p class="small"><em>Complete each sentence with the correct ending. Choose the correct ending and move it into the gap.</em></p>
                            <div class="mb-4">
                                <p class="mb-3">
                                    <strong id="question-22-number" class="question-number">22</strong> 
                                    Disapene scale insects feed on 
                                    <input type="text" class="dnd-drop-input d-inline-block" data-question="q22" placeholder="22" readonly style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer;">
                                </p>
                                <p class="mb-3">
                                    <strong id="question-23-number" class="question-number">23</strong> 
                                    Neodumetia sangawani ate 
                                    <input type="text" class="dnd-drop-input d-inline-block" data-question="q23" placeholder="23" readonly style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer;">
                                </p>
                                <p class="mb-3">
                                    <strong id="question-24-number" class="question-number">24</strong> 
                                    Leaf-mining hispides blighted 
                                    <input type="text" class="dnd-drop-input d-inline-block" data-question="q24" placeholder="24" readonly style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer;">
                                </p>
                                <p class="mb-3">
                                    <strong id="question-25-number" class="question-number">25</strong> 
                                    An Argentinian weevil may be successful in wiping out 
                                    <input type="text" class="dnd-drop-input d-inline-block" data-question="q25" placeholder="25" readonly style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer;">
                                </p>
                                <p class="mb-3">
                                    <strong id="question-26-number" class="question-number">26</strong> 
                                    Salvinia molesta plagues 
                                    <input type="text" class="dnd-drop-input d-inline-block" data-question="q26" placeholder="26" readonly style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer;">
                                </p>
                            </div>

                            <p class="mt-4"><strong>List of Endings</strong></p>
                            <div id="dnd-endings-list" class="d-flex flex-wrap gap-2 mb-4">
                                <div class="dnd-heading" draggable="true" data-value="forage grass" data-content="forage grass."> forage grass.</div>
                                <div class="dnd-heading" draggable="true" data-value="rice fields" data-content="rice fields.">rice fields.</div>
                                <div class="dnd-heading" draggable="true" data-value="coconut trees" data-content="coconut trees.">coconut trees.</div>
                                <div class="dnd-heading" draggable="true" data-value="fruit trees" data-content="fruit trees.">fruit trees.</div>
                                <div class="dnd-heading" draggable="true" data-value="water hyacinth" data-content="water hyacinth.">water hyacinth.</div>
                                <div class="dnd-heading" draggable="true" data-value="parthenium weed" data-content="parthenium weed.">parthenium weed.</div>
                                <div class="dnd-heading" draggable="true" data-value="Brazilian beetles" data-content="Brazilian beetles.">Brazilian beetles.</div>
                                <div class="dnd-heading" draggable="true" data-value="grass-scale insects" data-content="grass-scale insects.">grass-scale insects.</div>
                                <div class="dnd-heading" draggable="true" data-value="larval parasites" data-content="larval parasites.">larval parasites.</div>
                            </div>

                            <div style="display:none;">
                                <input type="text" name="q22" placeholder="22" id="q22" value="{{ $answers[22] ?? '' }}">
                                <input type="text" name="q23" placeholder="23" id="q23" value="{{ $answers[23] ?? '' }}">
                                <input type="text" name="q24" placeholder="24" id="q24" value="{{ $answers[24] ?? '' }}">
                                <input type="text" name="q25" placeholder="25" id="q25" value="{{ $answers[25] ?? '' }}">
                                <input type="text" name="q26" placeholder="26" id="q26" value="{{ $answers[26] ?? '' }}">
                            </div>
                                
                         </div>
                        </div>
                    </div>
                </div>


                <!-- ===================== PART 3 ===================== -->
                <div class="tab-content px-5" id="part3" style="margin-bottom: 100px;">
                    <div class="question_part">
                        <h4>Part 3</h4>
                        <p class="mb-0">Read the text below and answer questions 27-40</p>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="scroll-box">
                                <h4 class="text-center mb-4"><strong>TRY IT AND SEE</strong></h4>
                                <p class="text-center"><em>In the social sciences, it is often supposed that there can be no such thing as a controlled experiment. Think again.</em></p>
                                <p><strong>(A)</strong> In the scientific pecking order, social scientists are usually looked down on by their peers in the natural sciences. Natural scientists do experiments to test their theories or, if they cannot, they try to look for natural phenomena that can act in lieu of experiments. Social scientists, it is widely thought, do not subject their own hypotheses to any such rigorous treatment. Worse, they peddle their untested hypotheses to governments and try to get them turned into policies.</p>
                                <input type="text" class="dnd-drop-input" data-question="q27" data-paragraph="A" placeholder="27" readonly style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;">
                                <strong id="question-27-number" class="question-number" style="display:none;">27</strong>
                                <p><strong>(B)</strong> Governments require sellers of new medicines to demonstrate their safety and effectiveness. The accepted gold standard of evidence is a randomized control trial, in which a new drug is compared with the best existing therapy (or with a placebo, if no treatment is available). Patients are assigned to one arm or the other of such a study at random, ensuring that the only difference between the two groups is the new treatment. The best studies also ensure that neither patient nor physician knows which patient is allocated to which therapy. Drug trials must also include enough patients to make it unlikely that chance alone may determine the result.</p>
                                <input type="text" class="dnd-drop-input" data-question="q28" data-paragraph="B" placeholder="28" readonly style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;">
                                <strong id="question-28-number" class="question-number" style="display:none;">28</strong>
                                <p><strong>(C)</strong> But few education programmes or social initiatives are evaluated in carefully conducted studies prior to their introduction. A case in point is the 'whole-language' approach to reading, which swept much of the English-speaking world in the 1970s and 1980s. The whole-language theory holds that children learn to read best by absorbing contextual clues from texts, not by breaking individual words into their component parts and reassembling them (a method known as phonics). Unfortunately, the educational theorists who pushed the whole-language notion so successfully did not wait for evidence from controlled randomized trials before advancing their claims. Had they done so, they might have concluded, as did an analysis of 52 randomized studies carried out by the US National Reading Panel in 2000, that effective reading instruction requires phonics.</p>
                                <input type="text" class="dnd-drop-input" data-question="q29" data-paragraph="D" placeholder="29" readonly style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;">
                                <strong id="question-29-number" class="question-number" style="display:none;">29</strong>
                                <p><strong>(D)</strong> To avoid the widespread adoption of misguided ideas, the sensible thing is to experiment first and make policy later. This is the idea behind a trial of restorative justice which is taking place in the English courts. The experiment will include criminals who plead guilty to robbery. Those who agree to participate will be assigned randomly either to sentencing as normal or to participation in a conference in which the offender comes face-to-face with his victim and discusses how he may make emotional and material restitution. The purpose of the trial is to assess whether such restorative justice limits re-offending. If it does, it might be adopted more widely.</p>
                                <input type="text" class="dnd-drop-input" data-question="q30" data-paragraph="E" placeholder="30" readonly style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;">
                                <strong id="question-30-number" class="question-number" style="display:none;">30</strong>
                                <p><strong>(E)</strong> The idea of experimental evidence is not quite as new to the social sciences as sneering natural scientists might believe. In fact, randomised trials and systematic reviews of evidence were introduced into the social sciences long before they became common in medicine. An apparent example of random allocation is a study carried out in 1927 of how to persuade people to vote in elections. And randomised trials in social work were begun in the 1930s and 1940s. But enthusiasm later waned. This loss of interest can be attributed, at least in part, to the fact that early experiments produced little evidence of positive outcomes. Others suggest that much of the opposition to experimental evaluation stems from a common philosophical malaise among social scientists, who doubt the validity of the natural sciences, and therefore reject the potential of knowledge derived from controlled experiments. A more pragmatic factor limiting the growth of evidence-based education and social services may be limitations on the funds available for research.</p>
                                <input type="text" class="dnd-drop-input" data-question="q31" data-paragraph="F" placeholder="31" readonly style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;">
                                <strong id="question-31-number" class="question-number" style="display:none;">31</strong>
                                <p><strong>(F)</strong> Nevertheless, some 11,000 experimental studies are known in the social sciences (compared with over 250,000 in the medical literature). Randomised trials have been used to evaluate the effectiveness of driver-education programmes, job-training schemes, classroom size, psychological counselling for post-traumatic stress disorder and increased investment in public housing. And where they are carried out, they seem to have a healthy dampening effect on otherwise rosy interpretations of the observations.</p>
                                <input type="text" class="dnd-drop-input" data-question="q32" data-paragraph="G" placeholder="32" readonly style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;">
                                <strong id="question-32-number" class="question-number" style="display:none;">32</strong>
                                <p><strong>(G)</strong> The problem for policymakers is often not too few data, but what to make of multiple and conflicting studies. This is where a body called the Campbell Collaboration comes into its own. This independent non-profit organisation is designed to evaluate existing studies, in a process known as a systematic review. This means attempting to identify every relevant trial of a given question (including studies that have never been published), choosing the best ones using clearly defined criteria for quality, and combining the results in a statistically valid way. An equivalent body, the Cochrane Collaboration, has produced more than 1,004 such reviews in medical fields. The hope is that rigorous review standards will allow Campbell, like Cochrane, to become a trusted and authoritative source of information.</p>
                            </div>
                        </div>

                        <div class="col-md-6 question_site">
                            <h5><strong>Questions 27-32</strong></h5>
                            <p class="small"><em>Reading Passage 3 has seven paragraphs,<strong> A-G</strong>. Choose the correct heading for paragraphs <strong>B-G </strong>from the list of headings below. Move the correct heading into the gap.</em></p>
                            
                            <div class="mt-3">
                                <p><strong>List of Headings</strong></p>
                                <div id="dnd-headings-list">
                                    <div class="dnd-heading" draggable="true" data-value="Why some early social science methods lost popularity" data-content="Why some early social science methods lost popularity">  Why some early social science methods lost popularity</div>
                                    <div class="dnd-heading" draggable="true" data-value="The cost implications of research" data-content="The cost implications of research">  The cost implications of research</div>
                                    <div class="dnd-heading" draggable="true" data-value="Looking ahead to an unbiased assessment of research" data-content="Looking ahead to an unbiased assessment of research"> Looking ahead to an unbiased assessment of research</div>
                                    <div class="dnd-heading" draggable="true" data-value="A range of social issues that have been usefully studied" data-content="A range of social issues that have been usefully studied">  A range of social issues that have been usefully studied</div>
                                    <div class="dnd-heading" draggable="true" data-value="An example of a poor decision that was made too quickly" data-content="An example of a poor decision that was made too quickly">  An example of a poor decision that was made too quickly</div>
                                    <div class="dnd-heading" draggable="true" data-value="What happens when the figures are wrong" data-content="What happens when the figures are wrong">  What happens when the figures are wrong</div>
                                    <div class="dnd-heading" draggable="true" data-value="One area of research that is rigorously carried out" data-content="One area of research that is rigorously carried out">  One area of research that is rigorously carried out</div>
                                    <div class="dnd-heading" draggable="true" data-value="The changing nature of medical trials" data-content="The changing nature of medical trials">  The changing nature of medical trials</div>
                                    <div class="dnd-heading" draggable="true" data-value="An investigative study that may lead to a new system" data-content="An investigative study that may lead to a new system"> An investigative study that may lead to a new system</div>
                                    <div class="dnd-heading" draggable="true" data-value="Why some scientists' theories are considered second-rate" data-content="Why some scientists' theories are considered second-rate"> Why some scientists' theories are considered second-rate</div>
                                </div>

                                <p class="mt-4"><em>Example: Paragraph A - Answer: x</em></p>
                                <input type="text" name="q27" placeholder="27" style="display:none;" id="q27" value="{{ $answers[27] ?? '' }}">
                                <input type="text" name="q28" placeholder="28" style="display:none;" id="q28" value="{{ $answers[28] ?? '' }}">
                                <input type="text" name="q29" placeholder="29" style="display:none;" id="q29" value="{{ $answers[29] ?? '' }}">
                                <input type="text" name="q30" placeholder="30" style="display:none;" id="q30" value="{{ $answers[30] ?? '' }}">
                                <input type="text" name="q31" placeholder="31" style="display:none;" id="q31" value="{{ $answers[31] ?? '' }}">
                                <input type="text" name="q32" placeholder="32" style="display:none;" id="q32" value="{{ $answers[32] ?? '' }}">
                            </div>

                            <hr>

                            <h5><strong>Questions 33-36</strong></h5>
                            <p class="small"><em>Complete the summary below. Choose <strong>NO MORE THAN TWO WORDS</strong>  from the passage for each answer. Write your answers in boxes 33-36 on your answer sheet.</em></p>
                            <div class="mb-3">
                                <strong>Fighting Crime</strong>
                                <p class="small mt-2">Some criminals in England are agreeing to take part in a trial designed to help reduce their chances of <input type="text" name="q33" id="q33" placeholder="33" style="width: 120px;">. The idea is that while one group of randomly selected criminals undergoes the usual <input type="text" name="q34" id="q34" placeholder="34" style="width: 120px;">, the other group will discuss the possibility of making some repayment for the crime by meeting the <input type="text" name="q35" id="q35" placeholder="35" style="width: 120px;">. It is yet to be seen whether this system, known as <input type="text" name="q36" id="q36" placeholder="36" style="width: 120px;">, will work.</p>
                            </div>

                            <hr>

                            <h5><strong>Questions 37-40</strong></h5>
                            <p class="small"><em>Classify the following characteristics as relating to:</em></p>
                            
                            <table class="table table-bordered mb-4" style="max-width: 400px; font-size: 14px; background: #fdfdfd;">
                                <tbody>
                                    <tr><th style="width: 40px; text-align: center; background: #f0f0f0;">A</th><td>Social Science</td></tr>
                                    <tr><th style="text-align: center; background: #f0f0f0;">B</th><td>Medical Science</td></tr>
                                    <tr><th style="text-align: center; background: #f0f0f0;">C</th><td>Both Social Science and Medical Science</td></tr>
                                    <tr><th style="text-align: center; background: #f0f0f0;">D</th><td>Neither Social Science nor Medical Science</td></tr>
                                </tbody>
                            </table>

                            <div class="mb-3">
                                <table class="matching-grid mt-3">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th class="choice-cell">A</th>
                                            <th class="choice-cell">B</th>
                                            <th class="choice-cell">C</th>
                                            <th class="choice-cell">D</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong id="question-37-number" class="question-number">37</strong> a tendency for negative results in early trials</td>
                                            <td class="choice-cell tick-cell" data-row="37" data-value="A"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="37" data-value="B"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="37" data-value="C"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="37" data-value="D"><span class="tick">✓</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong id="question-38-number" class="question-number">38</strong> the desire to submit results for independent assessment</td>
                                            <td class="choice-cell tick-cell" data-row="38" data-value="A"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="38" data-value="B"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="38" data-value="C"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="38" data-value="D"><span class="tick">✓</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong id="question-39-number" class="question-number">39</strong> the prioritization of research areas to meet government needs</td>
                                            <td class="choice-cell tick-cell" data-row="39" data-value="A"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="39" data-value="B"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="39" data-value="C"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="39" data-value="D"><span class="tick">✓</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong id="question-40-number" class="question-number">40</strong> the widespread use of studies that investigate the quality of new products</td>
                                            <td class="choice-cell tick-cell" data-row="40" data-value="A"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="40" data-value="B"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="40" data-value="C"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="40" data-value="D"><span class="tick">✓</span></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div style="display:none;">
                                    <input type="text" name="q37" id="q37" placeholder="37" value="{{ $answers[37] ?? '' }}">
                                    <input type="text" name="q38" id="q38" placeholder="38" value="{{ $answers[38] ?? '' }}">
                                    <input type="text" name="q39" id="q39" placeholder="39" value="{{ $answers[39] ?? '' }}">
                                    <input type="text" name="q40" id="q40" placeholder="40" value="{{ $answers[40] ?? '' }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Navigation -->
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

            <div class="fixed-bottom px-5" style="background-color: white; margin:0px; margin-top: 100px;">
                <div class="container-fluid d-flex justify-content-between align-items-center">
                    <div class="tabs mb-0" style="gap: 15px; width: 100%;">
                        <div class="tab active" data-tab="part1">
                            <span class="tab-title">Part 1</span>
                            <div class="question-links">
                                @for ($i = 1; $i <= 13; $i++)
                                <a href="#" class="question-link" data-question="q{{ $i }}">{{ $i }}</a>
                                @endfor
                            </div>
                            <span class="question-placeholder">1 of 13</span>
                        </div>
                        <div class="tab" data-tab="part2">
                            <span class="tab-title">Part 2</span>
                            <div class="question-links">
                                @for ($i = 14; $i <= 26; $i++)
                                <a href="#" class="question-link" data-question="q{{ $i }}">{{ $i }}</a>
                                @endfor
                            </div>
                            <span class="question-placeholder">14 of 26</span>
                        </div>
                        <div class="tab" data-tab="part3">
                            <span class="tab-title">Part 3</span>
                            <div class="question-links">
                                @for ($i = 27; $i <= 40; $i++)
                                <a href="#" class="question-link" data-question="q{{ $i }}">{{ $i }}</a>
                                @endfor
                            </div>
                            <span class="question-placeholder">27 of 40</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Start Test Modal -->
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
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Initial setup: show only part1 question links
        window.addEventListener('DOMContentLoaded', () => {
            tabs.forEach(tab => {
                const qLinks = tab.querySelector('.question-links');
                const qPlaceholder = tab.querySelector('.question-placeholder');
                if (tab.getAttribute('data-tab') === 'part1') {
                    qLinks.style.display = 'flex';
                    qPlaceholder.style.display = 'none';
                } else {
                    qLinks.style.display = 'none';
                    qPlaceholder.style.display = 'block';
                }
            });
        });

        // Question link click handlers and arrow navigation
        const allLinks = Array.from(document.querySelectorAll('.question-link'));
        let currentIndex = 0;

        function setActiveQuestionLink(qNum, skipContentHighlight = false) {
            const qName = qNum.startsWith('q') ? qNum : 'q' + qNum;
            const linkIndex = allLinks.findIndex(link => link.getAttribute('data-question') === qName);
            if (linkIndex !== -1) {
                currentIndex = linkIndex;
                allLinks.forEach(link => link.classList.remove('active'));
                allLinks[linkIndex].classList.add('active');

                // Sync with content question number highlighting
                const pureNum = qNum.replace('q', '');
                document.querySelectorAll('.question-number').forEach(num => num.classList.remove('active'));
            }
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

        function setActiveQuestion(index) {
            currentIndex = index;
            const qNum = allLinks[index].getAttribute('data-question');

            // Remove active class from all links
            allLinks.forEach(link => link.classList.remove('active'));
            allLinks[index].classList.add('active');

            activateTabForQuestion(qNum);

            const inputField = document.getElementById(qNum);
            if (inputField) {
                inputField.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
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

        // Track manual input area interactions to update navigation active state
        document.querySelectorAll('input, .mcq-sync, .dnd-drop-input, .tick-cell, .question-number').forEach(el => {
            const updateActive = function() {
                let questionNum;
                if (this.classList.contains('question-number')) {
                    questionNum = 'q' + this.id.replace('question-', '').replace('-number', '');
                } else {
                    questionNum = this.getAttribute('data-target') || this.getAttribute('data-question') || this.id || this.name || (this.classList.contains('tick-cell') ? 'q'+this.getAttribute('data-row') : '');
                }
                
                if (questionNum) {
                    // Extract the base number (e.g., "14" from "q14", "q14_A", or "q14_radio")
                    let pureNum = questionNum.replace(/^q/, '').replace(/_.*$/, '');
                    if (pureNum) {
                        setActiveQuestionLink(pureNum);
                        
                        // If we clicked a question number specifically, focus the input or associated checkbox/radio
                        if (this.classList.contains('question-number')) {
                            const target = document.getElementById('q' + pureNum) || document.getElementById(pureNum) || document.querySelector(`input[name="q${pureNum}_radio"]`) || document.querySelector(`.q1_2_checkbox[data-target="q${pureNum}"]`);
                            if (target) target.focus();
                        }
                    }
                }
            };
            el.addEventListener('focus', updateActive);
            el.addEventListener('click', updateActive);
        });

        // Add row click activation for all matching grids
        document.querySelectorAll('.matching-grid tbody tr').forEach(function(tr) {
            tr.addEventListener('click', function() {
                const tickCell = tr.querySelector('.tick-cell');
                if (tickCell) {
                    const row = tickCell.getAttribute('data-row');
                    if (row) setActiveQuestionLink(row);
                }
            });
        });

        // Track answered questions
        const inputs = document.querySelectorAll('input[type="text"]');
        inputs.forEach(input => {
            input.addEventListener('input', updateQuestionCount);
        });

        function updateQuestionCount() {
            tabs.forEach(tab => {
                const tabName = tab.getAttribute('data-tab');
                const questionLinks = tab.querySelectorAll('.question-link');
                const placeholder = tab.querySelector('.question-placeholder');

                let answeredCount = 0;
                questionLinks.forEach(link => {
                    const qNum = link.getAttribute('data-question');
                    const inputField = document.getElementById(qNum) || document.querySelector(`input[name="${qNum}"]:checked`) || document.querySelector(`input[name="${qNum}"][type="hidden"]`);
                    if (inputField && inputField.value.trim() !== '') {
                        answeredCount++;
                        link.classList.add('answered');
                    } else {
                        link.classList.remove('answered');
                    }
                });

                // Set correct question ranges for each part
                if (tabName === 'part1') {
                    placeholder.textContent = `1 of 13`;
                } else if (tabName === 'part2') {
                    placeholder.textContent = `14 of 26`;
                } else if (tabName === 'part3') {
                    placeholder.textContent = `27 of 40`;
                }
            });
        }

        // Also listen for change events for MCQ/radios
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('change', updateQuestionCount);
            input.addEventListener('input', updateQuestionCount);
        });

        // When an accordion button (Q14-17, Q18-21) is clicked, activate the matching question number in the nav panel
        document.querySelectorAll('#q14_17_accordion .accordion-button, #q18_21_accordion .accordion-button').forEach(button => {
            button.addEventListener('click', function() {
                // Extract question number from data-bs-target e.g. "#q18_collapse" → "q18"
                const target = this.getAttribute('data-bs-target'); // e.g. "#q18_collapse"
                if (!target) return;
                const qNum = target.replace('#', '').replace('_collapse', ''); // e.g. "q18"
                setActiveQuestionLink(qNum, true);
            });
        });

        // Initial count
        updateQuestionCount();

        // Modal handlers
        document.addEventListener('DOMContentLoaded', function() {
            const startModal = new bootstrap.Modal(document.getElementById('startModal'));
            const finishModal = new bootstrap.Modal(document.getElementById('finishModal'));
            const startButton = document.getElementById('startTestButton');
            const finishButton = document.getElementById('finishButton');
            const continueButton = document.getElementById('continueButton');
            const timerElement = document.getElementById('timer');
            const testForm = document.getElementById('testForm');

            if (testForm) {
                testForm.addEventListener('keydown', function (e) {
                    if (e.key === 'Enter' && e.target.tagName === 'INPUT') {
                        e.preventDefault();
                    }
                });
            }

            // Timer functionality
            let timeRemaining = 60 * 60; // 60 minutes in seconds
            let timerInterval;

            function updateTimer() {
                const minutes = Math.floor(timeRemaining / 60);
                const seconds = timeRemaining % 60;
                if(timerElement) {
                    timerElement.textContent = `${String(minutes).padStart(2, '0')} : ${String(seconds).padStart(2, '0')} minutes remaining`;
                }
                if (timeRemaining <= 0) {
                    clearInterval(timerInterval);
                    if(timerElement) timerElement.textContent = "Time's up!";
                    alert("⏰ Time's up! Auto-submitting your test...");
                    if(testForm) testForm.submit();
                }
                timeRemaining--;
            }

            // Show start modal on page load
            startModal.show();

            // Start test: validate student ID, start timer when OK clicked
            if(startButton) {
                startButton.addEventListener('click', function() {
                    const studentIdInput = document.getElementById('studentIdInput');
                    const studentIdError = document.getElementById('studentIdError');
                    const studentIdVal = studentIdInput ? studentIdInput.value.trim() : '';
                    const isValid = /^[a-zA-Z0-9]{8,}$/.test(studentIdVal);

                    if (!isValid) {
                        if (studentIdError) {
                            studentIdError.textContent = '⚠️ Student ID must be at least 8 characters';
                            studentIdError.style.display = 'block';
                        }
                        if (studentIdInput) {
                            studentIdInput.style.borderColor = 'red';
                            studentIdInput.focus();
                        }
                        return; // modal বন্ধ হবে না
                    }
                    if (studentIdError) studentIdError.style.display = 'none';
                    if (studentIdInput) studentIdInput.style.borderColor = '#ddd';

                    // Save student ID
                    sessionStorage.setItem('examStudentId', studentIdVal);
                    const examStudentIdField = document.getElementById('examStudentIdField');
                    if (examStudentIdField) examStudentIdField.value = studentIdVal;

                    // Close modal
                    startModal.hide();

                    // Request fullscreen
                    const elem = document.documentElement;
                    if (elem.requestFullscreen) {
                        elem.requestFullscreen().catch(err => console.log(err));
                    } else if (elem.webkitRequestFullscreen) {
                        elem.webkitRequestFullscreen();
                    } else if (elem.msRequestFullscreen) {
                        elem.msRequestFullscreen();
                    }

                    // Start the timer
                    timerInterval = setInterval(updateTimer, 1000);
                });
            }

            // Enter key on student ID input triggers start button
            const studentIdInputEl = document.getElementById('studentIdInput');
            if (studentIdInputEl && startButton) {
                studentIdInputEl.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        startButton.click();
                    }
                });
            }

            // Show finish modal when Finish Test button clicked
            if(finishButton) {
                finishButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    finishModal.show();
                });
            }

            // Prevent double submission
            let isSubmitting = false;
            if(continueButton) {
                continueButton.addEventListener('click', function() {
                    if (isSubmitting) return;
                    isSubmitting = true;
                    continueButton.disabled = true;
                    continueButton.textContent = 'Submitting...';
                    const examStudentId = sessionStorage.getItem('examStudentId');
                    if (examStudentId) {
                        const examField = document.getElementById('examStudentIdField');
                        if(examField) examField.value = examStudentId;
                    }
                    if(testForm) testForm.submit();
                });
            }
        });

        // sidebar js code
        document.addEventListener('DOMContentLoaded', () => {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');
            const noteToggle = document.getElementById('noteToggle');
            if (sidebar && noteToggle) {
                const closeBtn = sidebar.querySelector('.close-btn');

                noteToggle.addEventListener('click', (e) => {
                    e.stopPropagation();
                    sidebar.classList.toggle('open');
                    if (mainContent) {
                        mainContent.classList.toggle('shifted');
                    }
                });

                if (closeBtn) {
                    closeBtn.addEventListener('click', () => {
                        sidebar.classList.remove('open');
                        if (mainContent) {
                            mainContent.classList.remove('shifted');
                        }
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

        // mouseup-এ selection capture করো — contextmenu-এর আগে
        // কিছু browser contextmenu event-এ selection collapse করে দেয়,
        // তাই আগেই cloneRange করে রাখা হচ্ছে
        let pendingSelectionRange = null;
        document.addEventListener('mouseup', function(e) {
            // শুধু LEFT mouse button (button=0) ধরো
            // Right-click (button=2) থেকে mouseup হলে pendingSelectionRange reset হবে না
            // কারণ: right-click এর mouseup, contextmenu এর আগে fire হয়
            if (e.button !== 0) return;
            const sel = window.getSelection();
            if (sel && sel.toString().trim() !== '' && sel.rangeCount > 0) {
                pendingSelectionRange = sel.getRangeAt(0).cloneRange();
            } else {
                pendingSelectionRange = null;
            }
        });

        // Context menu on right-click
        document.addEventListener('contextmenu', function(e) {
            e.preventDefault();
            
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

            // selection text নেওয়ার চেষ্টা — প্রথমে current, না পেলে pendingSelectionRange
            const currentText = selection ? selection.toString().trim() : '';
            const hasPending = pendingSelectionRange && !pendingSelectionRange.collapsed;
            
            if (currentText !== '' || hasPending || clickedMark) {
                if (clickedMark) {
                    selectionRange = null;
                } else if (currentText !== '' && selection.rangeCount > 0) {
                    selectionRange = selection.getRangeAt(0).cloneRange();
                } else if (hasPending) {
                    selectionRange = pendingSelectionRange;
                } else {
                    selectionRange = null;
                }
                contextMenu.style.left = e.pageX + 'px';
                contextMenu.style.top = e.pageY + 'px';
                contextMenu.style.display = 'block';
            }
        });

        // Hide context menu on click elsewhere
        document.addEventListener('click', function(e) {
            if (!contextMenu.contains(e.target)) {
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

        // Helper function to highlight text nodes in a range — robust dual-strategy version
        function highlightRange(range) {
            const createdMarks = [];
            
            const startContainer = range.startContainer;
            const endContainer = range.endContainer;
            const startOffset = range.startOffset;
            const endOffset = range.endOffset;
            
            // Same text node — simple case
            if (startContainer === endContainer && startContainer.nodeType === Node.TEXT_NODE) {
                const mark = document.createElement('mark');
                mark.style.backgroundColor = 'yellow';
                const selectedText = startContainer.textContent.substring(startOffset, endOffset);
                if (!selectedText.trim()) return createdMarks;

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
            
            // Multi-node / cross-table-cell selection
            let root = range.commonAncestorContainer;
            if (root.nodeType === Node.TEXT_NODE) root = root.parentNode;

            const textNodes = [];

            // Strategy 1: try intersectsNode()
            try {
                const walker = document.createTreeWalker(root, NodeFilter.SHOW_TEXT, null, false);
                let node;
                let foundAny = false;
                while (node = walker.nextNode()) {
                    const parentTag = node.parentNode && node.parentNode.tagName;
                    if (parentTag === 'SCRIPT' || parentTag === 'STYLE') continue;
                    if (range.intersectsNode(node)) {
                        textNodes.push(node);
                        foundAny = true;
                    }
                }
                // If intersectsNode didn't find anything non-whitespace, fall back
                if (!foundAny || !textNodes.some(n => n.textContent.trim() !== '')) {
                    textNodes.length = 0;
                    throw new Error('intersectsNode found nothing useful, fallback to inRange');
                }
            } catch (err) {
                // Strategy 2: inRange flag — reliable cross-cell table fallback
                try {
                    const walker = document.createTreeWalker(root, NodeFilter.SHOW_TEXT, null, false);
                    let node;
                    let inRange = false;
                    while (node = walker.nextNode()) {
                        const parentTag = node.parentNode && node.parentNode.tagName;
                        if (parentTag === 'SCRIPT' || parentTag === 'STYLE') continue;
                        if (node === startContainer) inRange = true;
                        if (inRange) textNodes.push(node);
                        if (node === endContainer) break;
                    }
                } catch (e2) { /* ignore */ }
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
            // হাইলাইটের পরে stale range reset করো
            selectionRange = null;
            pendingSelectionRange = null;
            contextMenu.style.display = 'none';
        });

        // Add note with popup
        notesOption.addEventListener('click', function() {
            const sidebarNotesContainer = document.getElementById('sidebar-notes-container');
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');
            
            // If right-clicked on already highlighted text, just open its popup
            if (clickedMark) {
                showNotePopup(clickedMark, clickedMark.dataset.selectedText || clickedMark.innerText);
                contextMenu.style.display = 'none';
                return;
            }
            
            // Otherwise, create new highlight with note
            if (selectionRange) {
                try {
                    const selectedText = selectionRange.toString();
                    const newMarks = highlightRange(selectionRange);
                    
                    if (newMarks.length > 0) {
                        const markId = 'mark-' + Date.now();
                        const firstMark = newMarks[0];
                        
                        newMarks.forEach(mk => {
                            mk.setAttribute('data-note', '');
                            mk.dataset.selectedText = selectedText;
                            mk.dataset.markId = markId;
                            
                            mk.addEventListener('click', function(e) {
                                e.stopPropagation();
                                showNotePopup(mk, mk.dataset.selectedText || mk.innerText);
                            });
                        });

                        const noteDiv = document.createElement('div');
                        noteDiv.classList.add('sidebar-note-item');
                        noteDiv.dataset.markId = markId;
                        noteDiv.innerHTML = `
                            <div class="sidebar-header-item" style="margin-bottom: 3px; cursor: pointer;">${selectedText}</div>
                            <div class="sidebar-note-content"></div>
                        `;
                        noteDiv.style.borderBottom = '1px solid #ccc';
                        noteDiv.style.padding = '8px';
                        
                        if (sidebarNotesContainer) {
                            sidebarNotesContainer.appendChild(noteDiv);
                        }

                        noteDiv.addEventListener('click', () => {
                            // Scroll to the first mark of this group
                            firstMark.scrollIntoView({ behavior: 'smooth', block: 'center' });
                            
                            // Then show the popup
                            setTimeout(() => {
                                showNotePopup(firstMark, firstMark.dataset.selectedText || firstMark.innerText);
                            }, 300);
                        });

                        showNotePopup(firstMark, selectedText);
                    }
                    
                    window.getSelection().removeAllRanges();
                } catch (err) {
                    console.log('Note highlight error:', err);
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
                    
                    // Remove all marks with this ID
                    document.querySelectorAll(`mark[data-mark-id="${markId}"]`).forEach(mk => {
                        mk.replaceWith(document.createTextNode(mk.innerText));
                    });
                } else {
                    // Just a highlight without ID
                    clickedMark.replaceWith(document.createTextNode(clickedMark.innerText));
                }

                // Fragmented text nodes merge করো যাতে পরের highlight কাজ করে
                document.body.normalize();
                
                const notePopup = document.querySelector('.note-popup');
                if (notePopup) notePopup.remove();
                activePopup = null;
                clickedMark = null;
            }
            pendingSelectionRange = null;
            selectionRange = null;
            contextMenu.style.display = 'none';
        });

        // Clear all highlights and notes
        allClearOption.addEventListener('click', function() {
            document.querySelectorAll('mark').forEach(marked => {
                marked.replaceWith(document.createTextNode(marked.innerText));
            });

            document.body.normalize();

            if (activePopup) {
                activePopup.remove();
                activePopup = null;
            }

            const sidebarNotesContainer = document.getElementById('sidebar-notes-container');
            const sidebarEl = document.getElementById('sidebar');
            const mainContentEl = document.getElementById('main-content');
            
            if (sidebarNotesContainer) {
                sidebarNotesContainer.innerHTML = '';
            }
            
            if (sidebarEl) sidebarEl.classList.remove('open');
            if (mainContentEl) mainContentEl.classList.remove('shifted');

            contextMenu.style.display = 'none';
        });

        // Function to show note popup for a mark element
        // displayText = user-এর selected text (full), যা popup header-এ দেখাবে
        function showNotePopup(mark, displayText) {
            if (activePopup) {
                activePopup.remove();
                document.removeEventListener('click', handleOutsideClick);
            }

            // displayText না থাকলে mark-এর innerText fallback
            const headerText = displayText || mark.dataset.selectedText || mark.innerText || '';

            const notePopup = document.createElement('div');
            notePopup.classList.add('note-popup');
            notePopup.style.position = 'absolute';
            notePopup.style.background = 'yellow';
            notePopup.style.padding = '10px';
            notePopup.style.border = '1px solid #ccc';
            notePopup.style.cursor = 'move';
            notePopup.style.zIndex = '2000';
            notePopup.style.width = '260px';
            notePopup.style.boxShadow = '2px 2px 8px rgba(0, 0, 0, 0.2)';
            
            notePopup.innerHTML = `
                <div class="drag-handle" style="background: linear-gradient(to bottom, #f0f0f0, #d0d0d0); padding: 8px; cursor: move; border-bottom: 2px solid #999; display: flex; justify-content: space-between; align-items: center; user-select: none;">
                    <span style="font-size: 12px; color: #666;">📝 Note</span>
                    <span class="close-note" style="cursor: pointer; font-size: 20px; font-weight: bold; color: #666;">&times;</span>
                </div>
                <div class="popup-header" style="font-weight: bold; padding: 8px 8px 4px 8px; background: rgba(255,220,0,0.4); font-size: 13px; color: #333; border-bottom: 1px solid #e0c000; word-break: break-word;">${headerText}</div>
                <textarea placeholder="Add your note here..." style="width:100%; border:1px solid #ccc; background-color:yellow; min-height: 70px; cursor: text; padding: 5px; resize: vertical; border-top: none;">${mark.dataset.note || ''}</textarea>
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
                const markId = mark.dataset.markId;
                
                // Update all marks in the group
                if (markId) {
                    document.querySelectorAll(`mark[data-mark-id="${markId}"]`).forEach(mk => {
                        mk.dataset.note = textarea.value;
                    });
                    
                    // Update sidebar note content
                    const sidebarItem = document.querySelector(`.sidebar-note-item[data-mark-id="${markId}"]`);
                    if (sidebarItem) {
                        const sidebarNoteContent = sidebarItem.querySelector('.sidebar-note-content');
                        if (sidebarNoteContent) {
                            sidebarNoteContent.textContent = textarea.value;
                        }
                    }
                } else {
                    mark.dataset.note = textarea.value;
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

        // Replicated from readingClassOne: Robust Scroll Container Detection
        function getScrollContainer(el) {
            if (!el) return null;
            const container = el.closest('.question_site') || el.closest('.scroll-box');
            if (container) return container;

            let node = el.parentElement;
            while (node) {
                const style = window.getComputedStyle(node);
                const overflowY = style.overflowY;
                if ((overflowY === 'auto' || overflowY === 'scroll') && node.scrollHeight > node.clientHeight) {
                    return node;
                }
                node = node.parentElement;
            }
            return null;
        }

        // Replicated from readingClassOne: Exact Scroll to Top logic
        function scrollToVisibleTop(target) {
            if (!target) return;
            const container = getScrollContainer(target);
            const topOffset = 20;

            if (container) {
                const tRect = target.getBoundingClientRect();
                const cRect = container.getBoundingClientRect();
                const delta = (tRect.top - cRect.top);
                const nextTop = container.scrollTop + delta - topOffset;
                
                container.scrollTo({
                    top: Math.max(0, nextTop),
                    behavior: 'smooth'
                });
            } else {
                target.style.scrollMarginTop = '140px';
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        }

        // Replicated from readingClassOne: Ensure the entire expanded block is visible
        function ensureExpandedVisible(collapseEl) {
            if (!collapseEl) return;
            const container = getScrollContainer(collapseEl);
            const padding = 50; 

            setTimeout(() => {
                if (container) {
                    const cRect = container.getBoundingClientRect();
                    const elRect = collapseEl.getBoundingClientRect();
                    
                    const bottomOverflow = elRect.bottom - cRect.bottom;
                    if (bottomOverflow > 0) {
                        container.scrollTo({
                            top: container.scrollTop + bottomOverflow + padding,
                            behavior: 'smooth'
                        });
                    }
                } else {
                    const elRect = collapseEl.getBoundingClientRect();
                    const bottomOverflow = elRect.bottom - window.innerHeight;
                    if (bottomOverflow > 0) {
                        window.scrollBy({
                            top: bottomOverflow + padding,
                            behavior: 'smooth'
                        });
                    }
                }
            }, 400); 
        }

        // Apply global binding exactly as in Reading Class One
        document.querySelectorAll('.accordion-collapse').forEach((collapseEl) => {
            if (collapseEl.closest('#q14_17_accordion, #q18_21_accordion')) return; // Skip autoscroll for Questions 14-21
            if (collapseEl.__hexasScrollBound) return;
            collapseEl.__hexasScrollBound = true;
            collapseEl.addEventListener('shown.bs.collapse', function() {
                const headerId = collapseEl.getAttribute('aria-labelledby');
                const header = document.getElementById(headerId) || collapseEl.previousElementSibling;
                if (header) {
                    scrollToVisibleTop(header);
                }
                ensureExpandedVisible(collapseEl);
            });
        });

    </script>

    <script>
        // sync radio buttons with hidden text input
        document.querySelectorAll('.mcq-sync').forEach(function(radio) {
            radio.addEventListener('change', function() {
                const target = radio.getAttribute('data-target');
                if (!target) return;
                const hidden = document.getElementById(target);
                if (hidden) {
                    hidden.value = radio.value;
                    // Trigger input event to update question count
                    hidden.dispatchEvent(new Event('input', { bubbles: true }));
                }
            });
        });


        // Initialize radio buttons from hidden input values on page load
        window.addEventListener('load', () => {
            document.querySelectorAll('.mcq-sync').forEach(radio => {
                const target = radio.getAttribute('data-target');
                if (!target) return;
                const hidden = document.getElementById(target);
                if (hidden && hidden.value === radio.value) {
                    radio.checked = true;
                }
            });
        });


        // Matching Grid logic for Questions 22-26
        function clearRowSelection(rowNumber) {
            document.querySelectorAll(`.tick-cell[data-row="${rowNumber}"]`).forEach(function(cell) {
                cell.classList.remove('selected');
            });
        }

        function setRowValue(rowNumber, value) {
            const input = document.getElementById('q' + rowNumber);
            if (input) {
                input.value = value;
                input.dispatchEvent(new Event('input', { bubbles: true }));
            }

            clearRowSelection(rowNumber);
            const cell = document.querySelector(`.tick-cell[data-row="${rowNumber}"][data-value="${value}"]`);
            if (cell) cell.classList.add('selected');

            setActiveQuestionLink(rowNumber, true);
        }

        function clearRowValue(rowNumber) {
            const input = document.getElementById('q' + rowNumber);
            if (input) {
                input.value = '';
                input.dispatchEvent(new Event('input', { bubbles: true }));
            }
            clearRowSelection(rowNumber);
        }

        document.querySelectorAll('.tick-cell').forEach(function(cell) {
            cell.addEventListener('click', function(e) {
                e.stopPropagation(); // Prevent duplicate trigger from row listener
                const row = cell.getAttribute('data-row');
                const val = cell.getAttribute('data-value');
                if (!row || !val) return;

                if (cell.classList.contains('selected')) {
                    clearRowValue(row);
                    return;
                }
                setRowValue(row, val);
            });
        });

        window.addEventListener('load', () => {
            [9, 10, 11, 12, 13, 37, 38, 39, 40].forEach(function(i) {
                const input = document.getElementById('q' + i) || document.getElementById(i);
                if (!input) return;
                const val = (input.value || '').toUpperCase().trim();
                if (!val) return;
                setRowValue(i, val);
            });
        });
    </script>

    <script>
        // Checkbox logic for Q1 and Q2
        document.querySelectorAll('.q1_2_checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const checkedOnes = document.querySelectorAll('.q1_2_checkbox:checked');
                
                // Limit to 2
                if (checkedOnes.length > 2) {
                    this.checked = false;
                    return;
                }

                // Sync with q1 and q2 inputs
                const q1 = document.getElementById('q1');
                const q2 = document.getElementById('q2');
                
                // Reset inputs
                if (q1) q1.value = '';
                if (q2) q2.value = '';

                // Fill inputs based on checked values
                checkedOnes.forEach((cb, index) => {
                    if (index === 0 && q1) {
                        q1.value = cb.value;
                        q1.dispatchEvent(new Event('input', { bubbles: true }));
                    } else if (index === 1 && q2) {
                        q2.value = cb.value;
                        q2.dispatchEvent(new Event('input', { bubbles: true }));
                    }
                });

                // Dynamically activate nav link based on selection count
                if (checkedOnes.length === 1) {
                    setActiveQuestionLink('1');
                } else if (checkedOnes.length === 2) {
                    setActiveQuestionLink('2');
                }
            });
        });

        // Initialize checkboxes if q1/q2 have values on load
        window.addEventListener('load', () => {
            const val1 = document.getElementById('q1')?.value.toUpperCase();
            const val2 = document.getElementById('q2')?.value.toUpperCase();
            
            document.querySelectorAll('.q1_2_checkbox').forEach(cb => {
                if (cb.value === val1 || cb.value === val2) {
                    cb.checked = true;
                }
            });
        });

        // ===== Drag and Drop for Questions 27-32 =====
        var dndDraggedEl = null;
        var dndGhost = null;

        // Helper: measure text width for input resize
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
            var qId = dropInput.getAttribute('data-question');
            var qNum = qId.replace('q','');

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

            // Hide heading from list
            headingEl.classList.add('used');
            headingEl.style.display = 'none';

            // Sync hidden input
            var hidden = document.getElementById(qId);
            if (hidden) {
                hidden.value = val; 
                hidden.dispatchEvent(new Event('input', { bubbles: true }));
            }
            setActiveQuestionLink(qNum);
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Remove native draggable from headings to use our mouse-follow logic
            document.querySelectorAll('.dnd-heading').forEach(function(el) {
                el.setAttribute('draggable', 'false');
            });

            var dndSourceInput = null;

            // Start drag from right side list
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

                // Clear on double-click
                inp.addEventListener('dblclick', function() {
                    var oldVal = inp.getAttribute('data-placed-value');
                    if (oldVal) {
                        var h = document.querySelector('.dnd-heading[data-value="' + oldVal + '"]');
                        if (h) {
                            h.classList.remove('used');
                            h.style.display = '';
                        }
                    }
                    inp.value = '';
                    inp.removeAttribute('data-placed-value');
                    inp.style.width = '200px';
                    inp.style.border = '1px solid #ccc';
                    inp.style.boxShadow = 'none';
                    var qId = inp.getAttribute('data-question');
                    var hidden = document.getElementById(qId);
                    if (hidden) {
                        hidden.value = '';
                        hidden.dispatchEvent(new Event('input', { bubbles: true }));
                    }
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
                            dndSourceInput.style.width = '200px';
                            dndSourceInput.style.border = '1px solid #ccc';
                            dndSourceInput.style.boxShadow = 'none';
                            var srcQ = dndSourceInput.getAttribute('data-question');
                            var srcHidden = document.getElementById(srcQ);
                            if (srcHidden) {
                                srcHidden.value = '';
                                srcHidden.dispatchEvent(new Event('input', { bubbles: true }));
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
                    dndSourceInput.style.width = '200px';
                    dndSourceInput.style.border = '1px solid #ccc';
                    dndSourceInput.style.boxShadow = 'none';
                    var srcQ = dndSourceInput.getAttribute('data-question');
                    var srcHidden = document.getElementById(srcQ);
                    if (srcHidden) {
                        srcHidden.value = '';
                        srcHidden.dispatchEvent(new Event('input', { bubbles: true }));
                    }
                }

                if (dndDraggedEl) dndDraggedEl.classList.remove('dragging');
                dndDraggedEl = null;
                dndSourceInput = null;
            });

            setTimeout(() => {
                [22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32].forEach(function(num) {
                    var hidden = document.getElementById('q' + num);
                    if (!hidden || !hidden.value) return;
                    var val = hidden.value.trim();
                    var heading = document.querySelector('.dnd-heading[data-value="' + val + '"]');
                    var dropInput = document.querySelector('.dnd-drop-input[data-question="q' + num + '"]');
                    if (heading && dropInput) {
                        dndPlaceHeading(dropInput, heading);
                    }
                });
            }, 500);
        });
    </script>

    <!-- Auto Save Script -->
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
                    const selectedValues = Array.from(document.querySelectorAll(`input[name="${groupName}"]:checked`)).map(cb => cb.value);
                    formData.append('question_number', groupName.replace('q', '').replace('[]', ''));
                    formData.append('answer', selectedValues.join(','));
                } else {
                    formData.append('question_number', input.name.replace('q', ''));
                    formData.append('answer', input.value);
                }
                fetch('{{ route('reading.autosave') }}', {method: 'POST', headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}, body: formData})
                    .then(response => {if (!response.ok) throw new Error('Network response was not ok'); console.log(`✅ Autosaved: ${input.name}`);})
                    .catch(err => console.error('❌ Autosave failed', err));
            }

            function markDirty(input) {
                if (!input || !input.name) return;
                dirtyInputs.set(input.name, input);
                scheduleAutosaveFlush();
            }

            function flushDirtyInputs() {
                if (!dirtyInputs.size) return;
                dirtyInputs.forEach((input) => {autosaveInput(input);});
                dirtyInputs.clear();
            }

            function scheduleAutosaveFlush() {
                if (autosaveDebounceTimer) {clearTimeout(autosaveDebounceTimer);}
                autosaveDebounceTimer = setTimeout(function() {flushDirtyInputs();}, 10000);
            }

            if (testForm) {
                testForm.addEventListener('keypress', function(e) {if (e.key === 'Enter') {e.preventDefault(); return false;}});
                testForm.addEventListener('submit', function() {if (autosaveDebounceTimer) {clearTimeout(autosaveDebounceTimer); autosaveDebounceTimer = null;} flushDirtyInputs();}, true);
            }

            document.querySelectorAll('input[type="radio"], input[type="checkbox"]').forEach(input => {input.addEventListener('change', function() {markDirty(this);});});
            document.querySelectorAll('input[type="text"]').forEach(input => {input.addEventListener('input', function() {markDirty(this);}); input.addEventListener('change', function() {markDirty(this);});});
        });
    </script>

    <!-- Load Previous Answers -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const savedAnswers = @json($answers ?? []);
            Object.keys(savedAnswers || {}).forEach(function(qNum) {
                const value = savedAnswers[qNum];
                if (value === null || value === undefined) return;
                const strVal = String(value);
                if (strVal.trim() === '') return;
                const name = 'q' + qNum;
                const text = document.querySelector('input[type="text"][name="' + name + '"]');
                if (text && (text.value || '') === '') {text.value = strVal;}
                const hiddenText = document.querySelector('input[type="text"][name="' + name + '"][style*="display:none"], input[type="text"][name="' + name + '"][style*="display: none"]');
                if (hiddenText && (hiddenText.value || '') === '') {hiddenText.value = strVal; hiddenText.dispatchEvent(new Event('change'));}
                const tickCells = document.querySelectorAll('.tick-cell[data-row="' + String(qNum) + '"]');
                if (tickCells && tickCells.length) {tickCells.forEach(cell => cell.classList.remove('selected')); const selectedCell = document.querySelector('.tick-cell[data-row="' + String(qNum) + '"][data-value="' + CSS.escape(strVal) + '"]'); if (selectedCell) {selectedCell.classList.add('selected');}}
                const directRadio = document.querySelector('input[type="radio"][name="' + name + '"][value="' + CSS.escape(strVal) + '"]');
                if (directRadio) {directRadio.checked = true;}
                const radio = document.querySelector('input[type="radio"][name="' + name + '_radio"][value="' + CSS.escape(strVal) + '"]');
                if (radio) {radio.checked = true;}
                const checkboxGroup = document.querySelectorAll('input[type="checkbox"][name="' + name + '[]"]');
                if (checkboxGroup && checkboxGroup.length) {const selected = strVal.split(',').map(v => v.trim()).filter(v => v !== ''); checkboxGroup.forEach(cb => {cb.checked = selected.includes(cb.value);});}
            });
        });
    </script>
</body>
</html>
