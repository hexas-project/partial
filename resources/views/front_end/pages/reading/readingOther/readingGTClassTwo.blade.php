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
        body {
            overflow-x: hidden !important;
        }

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
            flex-wrap: wrap;
            margin-bottom: 20px;
            justify-content: space-between;
            overflow-x: hidden;
        }

        .tab {
            display: flex;
            flex-wrap: wrap;
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
            border: 2px solid gray !important;
            background-color: #f8f9fa;
            font-weight: bold;
            z-index: 1;
        }

        /* .question-link.answered {
            background-color: #ffffffff;
            color: gray !important;
            border: 2px solid gray;
        }

        .question-link.active.answered {
            border: 2px solid gray !important;
            background-color: #ffffffff;
            color: gray !important;
        } */

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
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
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

        .modal-backdrop.show {
            opacity: 0.85;
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
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            transition: all 0.3s;
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
            border: 1px solid #d6d6d6;
            padding: 10px 12px;
            cursor: pointer;
            background: #dbeafe;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
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
            padding: 10px 12px;
        }

        .mcq-options label {
            display: flex;
            gap: 10px;
            align-items: flex-start;
            margin: 10px 0;
            cursor: pointer;
        }

        .mcq-options label span {
            border: none;
        }

        .mcq-options input[type="radio"] {
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
            user-select: text;
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
            background: #f2f2f2;
            border: 1px solid #cfcfcf;
            border-radius: 4px;
            cursor: grab;
            user-select: text;
            height: 30px;
            box-sizing: border-box;
            white-space: nowrap;
        }

        .dd-word:active {
            cursor: grabbing;
        }

        .dd-gap {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 160px;
            height: 30px;
            padding: 0;
            border: 1px solid #2b2b2b;
            background: transparent;
            border-radius: 2px;
            vertical-align: middle;
            margin: 0 6px;
            box-sizing: border-box;
            white-space: nowrap;
        }

        .dd-gap.is-over {
            outline: 2px dashed #2b2b2b;
            outline-offset: 2px;
        }

        .dd-placeholder {
            opacity: 0.65;
        }

        /* Drag and Drop Styling for Questions 28-35 */
        #dnd-headings-list {
            display: flex;
            flex-direction: column;
            gap: 5px;
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
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 8px 16px;
            width: 100px;
            font-size: 14px;
            min-height: 42px;
            cursor: pointer;
            text-align: left;
            display: block;
            margin-bottom: 20px;
            color: #475569;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
        }


        .dnd-drop-input:focus {
            outline: none;
            border-color: black;
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
    <form action="{{ route('reading.submit') }}" method="POST" id="testForm" spellcheck="false" autocomplete="off">
        @csrf

        @php
            $answers = $answers ?? [];
        @endphp

        {{-- hidden input --}}
        <input type="hidden" name="test_name" value="{{ $testName ?? 'class14_reading' }}">
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
                <div id="highlightOption" style="padding: 5px; cursor: pointer;">🖍️ Highlight</div>
                <div id="notesOption" style="padding: 5px; cursor: pointer;">📝 Notes</div>
                <div id="clearOption" style="padding: 5px; cursor: pointer;">🗑️ Clear</div>
                <div id="allClear" style="padding: 5px; cursor: pointer;">📝 Clear all</div>
            </div>
            <!-- question part 1 -->
            <div class="container-fluid px-5">
                <div class="tab-content active" id="part1" style="margin-bottom: 80px;">
                    <div class="question_part">
                        <h4>Part 1</h4>
                        <p>Read the text below and answer questions 1-14
                        </p>
                    </div>
                    <div class="mt-4">


                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-md-6">


                                <div class="scroll-box" style="text-align:left;">

                                    <h4 class="mt-0"><strong>Sustainable School Travel Strategy</strong></h4>

                                    <p>Over the last 20 years, the number of children being driven to school in England
                                        has doubled. National data suggests that one in five cars on the road at 8.50 am
                                        is engaged in the school run. Children are subject to up to 3.9 times more
                                        pollution in a car that is standing in traffic than when walking or cycling to
                                        school. Reducing cars around schools makes them safer places, and walking and
                                        cycling are better for health and the environment. It has been noted by teachers
                                        that children engaging in active travel arrive at school more alert and ready to
                                        learn.</p>

                                    <p>The County Council has a strong commitment to supporting and promoting
                                        sustainable school travel. We collect data annually about how pupils get to
                                        school, and our report on the Sustainable School Travel Strategy sets out in
                                        detail what we have achieved so far and what we intend to do in the future.
                                        Different parts of the County Council are working together to address the
                                        actions identified in the strategy, and we are proud that we have been able to
                                        reduce the number of cars on the daily school run by an average of 1% in each of
                                        the last three years, which is equivalent to taking approximately 175 cars off
                                        the road annually, despite an increase in pupil numbers.</p>

                                    <p>All schools have a School Travel Plan, which sets out how the school and the
                                        Council can collaborate to help reduce travel to school by car and encourage the
                                        use of public transport. Contact your school to find out what they are doing as
                                        part of their School Travel Plan to help you get your child to school in a
                                        sustainable, safe way.</p>

                                    <hr>

                                    <h4 style="text-align:center;"><strong>Flu: the facts</strong></h4>

                                    <p><strong>A</strong> Flu (influenza) is an acute viral respiratory infection. It
                                        spreads easily from person to person: at home, at school, at work, at the
                                        supermarket or on the train.</p>

                                    <p><strong>B</strong> It gets passed on when someone who already has flu coughs or
                                        sneezes and is transmitted through the air by droplets, or it can be spread by
                                        hands infected by the virus.</p>

                                    <p><strong>C</strong> Symptoms can include fever, chills, headache, muscle pain,
                                        extreme fatigue, a dry cough, sore throat and stuffy nose. Most people will
                                        recover within a week but flu can cause severe illness or even death in people
                                        at high risk. It is estimated that 18,500-24,800 deaths in England and Wales are
                                        attributable to influenza infections annually.</p>

                                    <p><strong>D</strong> Vaccination is the most effective way to prevent infection.
                                        Although anyone can catch flu, certain people are at greater risk from the
                                        implications of flu, as their bodies may not be able to fight the virus. If you
                                        are over 65 years old, or suffer from asthma, diabetes, or certain other
                                        conditions, you are considered at greater risk from flu and the implications can
                                        be serious. If you fall into one of these 'at-risk' groups, are pregnant or a
                                        carer, you are eligible for a free flu vaccination.</p>

                                    <p><strong>E</strong> If you are not eligible for a free flu vaccination, you can
                                        still protect yourself and those around you from flu by getting a flu
                                        vaccination at a local pharmacy.</p>

                                    <p><strong>F</strong> About seven to ten days after vaccination, your body makes
                                        antibodies that help to protect you against any similar viruses that may infect
                                        you. This protection lasts about a year.</p>



                                    <p><strong>G</strong> A flu vaccination contains inactivated, killed virus strains
                                        so it can't give you the flu. However, a flu vaccination can take up to two
                                        weeks to begin working, so it is possible to catch flu in this period.</p>

                                    <p><strong>H</strong> A flu vaccination is designed to protect you against the most
                                        common and potent strains of flu circulating so there is a small chance you
                                        could catch a strain of flu not contained in the flu vaccine.</p>

                                    <p><strong>I</strong> The influenza virus is constantly changing and vaccines are
                                        developed to predicted strains each year so it is important to get vaccinated
                                        against the latest strains.</p>

                                    <p>Speak to your GP or nurse today to book your flu vaccination.</p>






                                </div>


                            </div>
                            <!-- Column 2 -->
                            <div class="col-md-6 question_site">
                                <h4 class="mt-0"><strong>Questions 1-6</strong></h4>
                                <p>Choose <strong>TRUE</strong> if the statement agrees with the information given in
                                    the text, choose <strong>FALSE</strong> if the statement contradicts the
                                    information, or choose <strong>NOT GIVEN</strong> if there is no information on
                                    this.</p>

                                <div class="tfng-block" id="q1_6_tfng">
                                    <div class="tfng-item open">
                                        <div class="tfng-head">
                                            <div class="tfng-num" id="1">1</div>
                                            <div class="tfng-q">More children are injured when walking or cycling to
                                                school than when travelling by car.</div>
                                        </div>
                                        <div class="tfng-options">
                                            <label><input type="radio" name="q1" value="TRUE" {{ ($answers[1] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                            <label><input type="radio" name="q1" value="FALSE" {{ ($answers[1] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                            <label><input type="radio" name="q1" value="NOT GIVEN" {{ ($answers[1] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT
                                                    GIVEN</span></label>
                                        </div>
                                    </div>

                                    <div class="tfng-item">
                                        <div class="tfng-head">
                                            <div class="tfng-num">2</div>
                                            <div class="tfng-q">Children who are driven to school are more ready to
                                                learn than those who walk or cycle.</div>
                                        </div>
                                        <div class="tfng-options">
                                            <label><input type="radio" name="q2" value="TRUE" {{ ($answers[2] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                            <label><input type="radio" name="q2" value="FALSE" {{ ($answers[2] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                            <label><input type="radio" name="q2" value="NOT GIVEN" {{ ($answers[2] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT
                                                    GIVEN</span></label>
                                        </div>
                                    </div>

                                    <div class="tfng-item">
                                        <div class="tfng-head">
                                            <div class="tfng-num">3</div>
                                            <div class="tfng-q">Every year the Council gathers information about travel
                                                to schools.</div>
                                        </div>
                                        <div class="tfng-options">
                                            <label><input type="radio" name="q3" value="TRUE" {{ ($answers[3] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                            <label><input type="radio" name="q3" value="FALSE" {{ ($answers[3] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                            <label><input type="radio" name="q3" value="NOT GIVEN" {{ ($answers[3] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT
                                                    GIVEN</span></label>
                                        </div>
                                    </div>

                                    <div class="tfng-item">
                                        <div class="tfng-head">
                                            <div class="tfng-num">4</div>
                                            <div class="tfng-q">The Council is disappointed with the small reduction in
                                                the number of cars taking children to school.</div>
                                        </div>
                                        <div class="tfng-options">
                                            <label><input type="radio" name="q4" value="TRUE" {{ ($answers[4] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                            <label><input type="radio" name="q4" value="FALSE" {{ ($answers[4] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                            <label><input type="radio" name="q4" value="NOT GIVEN" {{ ($answers[4] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT
                                                    GIVEN</span></label>
                                        </div>
                                    </div>

                                    <div class="tfng-item">
                                        <div class="tfng-head">
                                            <div class="tfng-num">5</div>
                                            <div class="tfng-q">The number of children in schools has risen in recent
                                                years.</div>
                                        </div>
                                        <div class="tfng-options">
                                            <label><input type="radio" name="q5" value="TRUE" {{ ($answers[5] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                            <label><input type="radio" name="q5" value="FALSE" {{ ($answers[5] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                            <label><input type="radio" name="q5" value="NOT GIVEN" {{ ($answers[5] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT
                                                    GIVEN</span></label>
                                        </div>
                                    </div>
                                    <div class="tfng-item">
                                        <div class="tfng-head">
                                            <div class="tfng-num">6</div>
                                            <div class="tfng-q">Parents can get help with paying for their children to
                                                travel to school by public transport.</div>
                                        </div>
                                        <div class="tfng-options">
                                            <label><input type="radio" name="q6" value="TRUE" {{ ($answers[6] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                            <label><input type="radio" name="q6" value="FALSE" {{ ($answers[6] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                            <label><input type="radio" name="q6" value="NOT GIVEN" {{ ($answers[6] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT
                                                    GIVEN</span></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Questions 7-14</strong></h3>
                                    <p>The text has nine sections, <strong>A-I</strong>. Which sections contain the
                                        following information? </p>
                                    <p><strong>NB</strong> You may use any answer more than once.</p>

                                    <div id="q7_14_normal" class="matching-grid mt-4">
                                        <table class="table table-bordered text-center">
                                            <thead>
                                                <tr>
                                                    <th>Questions</th>
                                                    <th class="choice-cell">A</th>
                                                    <th class="choice-cell">B</th>
                                                    <th class="choice-cell">C</th>
                                                    <th class="choice-cell">D</th>
                                                    <th class="choice-cell">E</th>
                                                    <th class="choice-cell">F</th>
                                                    <th class="choice-cell">G</th>
                                                    <th class="choice-cell">H</th>
                                                    <th class="choice-cell">I</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach([
                                                    7 => 'Examples of people who are likely to be particularly badly affected by flu',
                                                    8 => 'How to get a vaccination if you choose to pay for it',
                                                    9 => 'Why new vaccines become available',
                                                    10 => 'How long a vaccine remains effective',
                                                    11 => 'Reference to the possibility of catching a different type of flu from the ones in the vaccine',
                                                    12 => 'Categories of people who do not have to pay for vaccination',
                                                    13 => 'Information about what a vaccine consists of',
                                                    14 => 'Signs that you might have flu'
                                                ] as $qNum => $qContent)
                                                <tr>
                                                    <td class="text-start"><strong>{{ $qNum }}</strong>. {{ $qContent }}</td>
                                                    @foreach(['A','B','C','D','E','F','G','H','I'] as $val)
                                                    <td class="choice-cell tick-cell" data-row="{{ $qNum }}" data-value="{{ $val }}">
                                                        <span class="tick">✓</span>
                                                    </td>
                                                    @endforeach
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    @foreach(range(7, 14) as $qNum)
                                    <input type="hidden" name="q{{ $qNum }}" id="{{ $qNum }}" value="{{ $answers[$qNum] ?? '' }}">
                                    @endforeach
                                </div>




                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- question part 2 -->
            <div class="container-fluid px-5">
                <div class="tab-content" id="part2" style="margin-bottom: 80px;">
                    <div class="question_part">
                        <h4>Part 2</h4>
                        <p>Read the text below and answer questions 15-27
                        </p>
                    </div>
                    <div class="mt-4">

                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-md-6">
                                <div class="scroll-box" style="text-align:left;">

                                    <h4 class="mt-0"><strong>Tips for giving an effective business presentation</strong>
                                    </h4>

                                    <p><strong>Preparation:</strong></p>
                                    <p>Get someone else to evaluate your performance and highlight your best skills. For
                                        example, go through your presentation in front of a colleague or relative. Think
                                        about who your audience is and what you want them to get out of the
                                        presentation. Think about content and style.</p>
                                    <p>Go into the presentation room and try out any moves you may have to make, e.g.
                                        getting up from your chair and moving to the podium. Errors in the first 20
                                        seconds can be very disorientating.</p>
                                    <p>Familiarize yourself with the electronic equipment before the presentation and
                                        also have a backup plan in mind, should there be an unexpected problem like a
                                        power cut.</p>

                                    <p><strong>Dealing with presentation nervousness:</strong></p>
                                    <p>A certain amount of nervousness is vital for a good presentation. The added
                                        adrenaline will keep your faculties sharp and give your presentation skills
                                        extra force. This can, however, result in tension in the upper chest.
                                        Concentrate on your breathing. Slow it right down and this will relax you.
                                        Strangely, having something to pick up and put down tends to help you do this.
                                    </p>
                                    <p>It may seem an odd idea, but we seem to feel calmer when we engage in what's
                                        referred to as a displacement activity, like clicking a pen or fiddling with
                                        jewellery. A limited amount of this will not be too obvious and can make you
                                        feel more secure at the start.</p>

                                    <p><strong>Interacting with your audience:</strong></p>
                                    <p>Think of your presentation as a conversation with your audience. They may not
                                        actually say anything, but make them feel consulted, questioned, challenged,
                                        then they will stay awake and attentive.</p>
                                    <p>Engage with your present audience, not the one you have prepared for. Keep
                                        looking for reactions to your ideas and respond to them. If your audience
                                        doesn't appear to be following you, find another way to get your ideas across.
                                        If you don't interact, you might as well send a video recording of your
                                        presentation instead!</p>

                                    <p><strong>Structuring effective presentations:</strong></p>
                                    <p>Effective presentations are full of examples. These help your listeners to see
                                        more clearly what you mean. It's quicker and more colorful. Stick to the point
                                        using three or four main ideas. For any subsidiary information that you cannot
                                        present in 20 minutes, try another medium, such as handouts.</p>
                                    <p>End as if your presentation has gone well. Do this even if you feel you've
                                        presented badly. And anyway a good finish will get you some applause — and you
                                        deserve it!</p>

                                    <hr class="my-5">

                                    <h4><strong>How to get a job in journalism</strong></h4>
                                    <p>You can get a good qualification in journalism, but what employers actually want
                                        is practical, rather than theoretical, knowledge. There’s no substitute for
                                        creating real stories that have to be handed in by strict deadlines. So write
                                        for your school magazine, then maybe try your hand at editing. Once you’ve done
                                        that for a while, start requesting internships in newspapers in the area. These
                                        are generally short-term and unpaid, but they’re definitely worthwhile, since,
                                        instead of providing you with money, they’ll teach you the skills that every
                                        twenty-first-century journalist has to have, like laying out articles, creating
                                        web pages, taking good digital pictures and so on.</p>
                                    <p>Most reporters keep a copy of every story they’ve had published, from secondary
                                        school onwards. They’re called cuttings, and you need them to get a job — indeed
                                        a few impressive ones can be the deciding factor in whether you’re appointed or
                                        not. So start creating a portfolio now that will show off your developing
                                        talent.</p>
                                    <p>It seems obvious — research is an important part of an effective job hunt. But
                                        it’s surprising how many would-be journalists do little or none. If you’re
                                        thorough, it can help you decide whether the job you’re thinking about applying
                                        for is right for you. And nothing impresses an editor more than an applicant who
                                        knows a lot about the paper.</p>
                                    <p>There are two more elements to an application — your covering letter and
                                        curriculum vitae. However, your CV is the thing that will attract an editor’s
                                        attention first, so get it right. The key words are brevity, (no more than one
                                        page) accuracy (absolutely no spelling or typing errors) and clarity (it should
                                        be easy to follow).</p>
                                    <p>In journalism, good writing skills are essential, so it’s critical that the style
                                        of your letter is appropriate. And, make sure it conveys your love of journalism
                                        and your eagerness to do the work.</p>
                                </div>
                            </div>
                            <!-- Column 2 -->
                            <div class="col-md-6 question_site">
                                <h4 class="mt-0"><strong>Questions 15-22</strong></h4>
                                <p>Complete the sentences below.</p>
                                <p>Choose <strong>NO MORE THAN TWO WORDS</strong> from the text for each answer.</p>

                                <div class="mt-4">
                                    <p> Practicing your presentation on a
                                        <input type="text" name="q15" id="15" placeholder="15"
                                            style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;"
                                            value="{{ $answers[15] ?? '' }}">
                                        or a family member is helpful.
                                    </p>

                                    <p> Be prepared for a problem such as a
                                        <input type="text" name="q16" id="16" placeholder="16"
                                            style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;"
                                            value="{{ $answers[16] ?? '' }}">
                                        .
                                    </p>

                                    <p> One way to overcome pre-presentation nerves is to make your
                                        <input type="text" name="q17" id="17" placeholder="17"
                                            style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;"
                                            value="{{ $answers[17] ?? '' }}">
                                        less rapid.
                                    </p>

                                    <p> It is acceptable to do something called a
                                        <input type="text" name="q18" id="18" placeholder="18"
                                            style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;"
                                            value="{{ $answers[18] ?? '' }}">
                                        at the start of the presentation to reassure you.
                                    </p>

                                    <p> Your presentation should be like a
                                        <input type="text" name="q19" id="19" placeholder="19"
                                            style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;"
                                            value="{{ $answers[19] ?? '' }}">
                                        with the people who have come to hear you.
                                    </p>

                                    <p> Check constantly for
                                        <input type="text" name="q20" id="20" placeholder="20"
                                            style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;"
                                            value="{{ $answers[20] ?? '' }}">
                                        to the points you are making.
                                    </p>

                                    <p> Make sure you use plenty of
                                        <input type="text" name="q21" id="21" placeholder="21"
                                            style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;"
                                            value="{{ $answers[21] ?? '' }}">
                                        to communicate your message effectively.
                                    </p>

                                    <p> To keep the presentation short, use things like
                                        <input type="text" name="q22" id="22" placeholder="22"
                                            style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;"
                                            value="{{ $answers[22] ?? '' }}">
                                        to provide extra details.
                                    <div class="mt-5">
                                        <h3><strong>Questions 23–27</strong></h3>
                                        <p><em>Look at the following descriptions and the list of terms in the box
                                                below.</em></p>
                                        <p><em>Choose the correct term <strong>A-E</strong> for each description.</em>
                                        </p>

                                        <div class="mt-3">
                                            <table class="table table-bordered mt-3" style="width: 280px;">
                                                <tbody>
                                                    <tr>
                                                        <th colspan="2" style="background:#f7f7f7;">Types of Dismissal
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th style="width: 48px;">A</th>
                                                        <td>Fair dismissal</td>
                                                    </tr>
                                                    <tr>
                                                        <th>B</th>
                                                        <td>Summary dismissal</td>
                                                    </tr>
                                                    <tr>
                                                        <th>C</th>
                                                        <td>Unfair dismissal</td>
                                                    </tr>
                                                    <tr>
                                                        <th>D</th>
                                                        <td>Wrongful dismissal</td>
                                                    </tr>
                                                    <tr>
                                                        <th>E</th>
                                                        <td>Constructive dismissal</td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <table class="matching-grid">
                                                <thead>
                                                    <tr>
                                                        <th style="width: auto;"></th>
                                                        <th class="choice-cell">A</th>
                                                        <th class="choice-cell">B</th>
                                                        <th class="choice-cell">C</th>
                                                        <th class="choice-cell">D</th>
                                                        <th class="choice-cell">E</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><strong>23</strong> An employee is asked to leave work
                                                            straight away because he has done something really bad.</td>
                                                        <td class="choice-cell tick-cell" data-row="23" data-value="A">
                                                            <span class="tick">✓</span>
                                                        </td>
                                                        <td class="choice-cell tick-cell" data-row="23" data-value="B">
                                                            <span class="tick">✓</span>
                                                        </td>
                                                        <td class="choice-cell tick-cell" data-row="23" data-value="C">
                                                            <span class="tick">✓</span>
                                                        </td>
                                                        <td class="choice-cell tick-cell" data-row="23" data-value="D">
                                                            <span class="tick">✓</span>
                                                        </td>
                                                        <td class="choice-cell tick-cell" data-row="23" data-value="E">
                                                            <span class="tick">✓</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>24</strong> An employee is pressured to leave his
                                                            job unless he accepts conditions that are very different
                                                            from those agreed to in the beginning.</td>
                                                        <td class="choice-cell tick-cell" data-row="24" data-value="A">
                                                            <span class="tick">✓</span>
                                                        </td>
                                                        <td class="choice-cell tick-cell" data-row="24" data-value="B">
                                                            <span class="tick">✓</span>
                                                        </td>
                                                        <td class="choice-cell tick-cell" data-row="24" data-value="C">
                                                            <span class="tick">✓</span>
                                                        </td>
                                                        <td class="choice-cell tick-cell" data-row="24" data-value="D">
                                                            <span class="tick">✓</span>
                                                        </td>
                                                        <td class="choice-cell tick-cell" data-row="24" data-value="E">
                                                            <span class="tick">✓</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>25</strong> An employer gets rid of an employee
                                                            without keeping to conditions in the contract.</td>
                                                        <td class="choice-cell tick-cell" data-row="25" data-value="A">
                                                            <span class="tick">✓</span>
                                                        </td>
                                                        <td class="choice-cell tick-cell" data-row="25" data-value="B">
                                                            <span class="tick">✓</span>
                                                        </td>
                                                        <td class="choice-cell tick-cell" data-row="25" data-value="C">
                                                            <span class="tick">✓</span>
                                                        </td>
                                                        <td class="choice-cell tick-cell" data-row="25" data-value="D">
                                                            <span class="tick">✓</span>
                                                        </td>
                                                        <td class="choice-cell tick-cell" data-row="25" data-value="E">
                                                            <span class="tick">✓</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>26</strong> The reason for an employee's dismissal
                                                            is not considered good enough.</td>
                                                        <td class="choice-cell tick-cell" data-row="26" data-value="A">
                                                            <span class="tick">✓</span>
                                                        </td>
                                                        <td class="choice-cell tick-cell" data-row="26" data-value="B">
                                                            <span class="tick">✓</span>
                                                        </td>
                                                        <td class="choice-cell tick-cell" data-row="26" data-value="C">
                                                            <span class="tick">✓</span>
                                                        </td>
                                                        <td class="choice-cell tick-cell" data-row="26" data-value="D">
                                                            <span class="tick">✓</span>
                                                        </td>
                                                        <td class="choice-cell tick-cell" data-row="26" data-value="E">
                                                            <span class="tick">✓</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>27</strong> The reasons for an employee's dismissal
                                                            are acceptable by law and the terms of the employment
                                                            contract.</td>
                                                        <td class="choice-cell tick-cell" data-row="27" data-value="A">
                                                            <span class="tick">✓</span>
                                                        </td>
                                                        <td class="choice-cell tick-cell" data-row="27" data-value="B">
                                                            <span class="tick">✓</span>
                                                        </td>
                                                        <td class="choice-cell tick-cell" data-row="27" data-value="C">
                                                            <span class="tick">✓</span>
                                                        </td>
                                                        <td class="choice-cell tick-cell" data-row="27" data-value="D">
                                                            <span class="tick">✓</span>
                                                        </td>
                                                        <td class="choice-cell tick-cell" data-row="27" data-value="E">
                                                            <span class="tick">✓</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            {{-- Hidden inputs to store answers --}}
                                            <div style="display:none;">
                                                <input type="text" name="q23" id="23" placeholder="23"
                                                    value="{{ $answers[23] ?? '' }}">
                                                <input type="text" name="q24" id="24" placeholder="24"
                                                    value="{{ $answers[24] ?? '' }}">
                                                <input type="text" name="q25" id="25" placeholder="25"
                                                    value="{{ $answers[25] ?? '' }}">
                                                <input type="text" name="q26" id="26" placeholder="26"
                                                    value="{{ $answers[26] ?? '' }}">
                                                <input type="text" name="q27" id="27" placeholder="27"
                                                    value="{{ $answers[27] ?? '' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- question part 3 -->
            <div class="container-fluid px-5">
                <div class="tab-content" id="part3" style="margin-bottom: 80px;">
                    <div class="question_part">
                        <h4>Part 3</h4>
                        <p>Read the text below and answer Questions 28-40</p>
                    </div>
                    <div class="mt-4">
                        <div class="row">
                            <!-- Column 1: Reading Passage -->
                            <div class="col-md-6">
                                <div class="scroll-box" style="text-align:left;">
                                    <h4 class="mt-0"><strong>What is it like to run a large supermarket?</strong></h4>
                                    <p>Jill Insley finds out.</p>

                                    <input type="text" class="dnd-drop-input" data-question="q28" data-paragraph="A"
                                        placeholder="28" readonly=""
                                        style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;"
                                        autocomplete="off" data-original-placeholder="28">
                                    You can't beat really good service. I've been shopping in the Thamesmead branch of
                                    supermarket chain Morrisons, in south-east London, and I’ve experienced at first
                                    hand, the store’s latest maxim for improving the shopping experience — help, offer,
                                    thank. This involves identifying customers who might need help, greeting them,
                                    asking what they need, providing it, thanking them and leaving them in peace. If
                                    they don’t look like they want help, they’ll be left alone. But if they’re standing
                                    looking lost and perplexed, a member of staff will approach them. Staff are expected
                                    to be friendly to everyone. My checkout assistant has certainly said something to
                                    amuse the woman in front of me, she’s smiling as she leaves. Adrian Perriss, manager
                                    of the branch, has discussed the approach with each of his 387 staff. He says it’s
                                    about recognising that someone needs help, not being a nuisance to them. When he’s
                                    in another store, he’s irritated by someone saying, ‘Can I help you?’ when he’s only
                                    just walked in to have a quick look at the products.</p>

                                    <input type="text" class="dnd-drop-input" data-question="q29" data-paragraph="B"
                                        placeholder="29" readonly=""
                                        style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;"
                                        autocomplete="off" data-original-placeholder="29">
                                    <p><br>
                                        How anyone can be friendly and enthusiastic when they start work at 6 am is a
                                        mystery to me, but Perriss and his staff manage it. The store opens at 7 am,
                                        Monday to Saturday, meaning that some staff, including Perriss, have to be here
                                        at 6 am to make sure it’s clean, safe and stocked up for the morning rush.
                                        Sometimes he walks in at 6 am and thinks they’re never going to be ready on time
                                        — but they always are. There’s so much going on overnight — 20 people working on
                                        unloading three enormous trailers full of groceries.</p>

                                    <input type="text" class="dnd-drop-input" data-question="q30" data-paragraph="C"
                                        placeholder="30" readonly=""
                                        style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;"
                                        autocomplete="off" data-original-placeholder="30">
                                    <p><br>
                                        Perriss has worked in supermarkets since 1982, when he became a trolley boy on a
                                        weekly salary of £76. ‘It was less money than my previous job, but I loved it.
                                        It was different and diverse. I was doing trolleys, portering, bread, cakes,
                                        dairy and general maintenance.’ After a period in the produce department looking
                                        after the fruit and vegetables, he became a store manager, reaching the top job
                                        in 1998.</p>

                                    <input type="text" class="dnd-drop-input" data-question="q31" data-paragraph="D"
                                        placeholder="31" readonly=""
                                        style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;"
                                        autocomplete="off" data-original-placeholder="31">
                                    <p><br>
                                        Perriss’ first stop as a store manager was at a store which was closed soon
                                        afterwards, though he was not to blame. Despite the disappointing start, his
                                        career went from strength to strength and he was put in charge of launching new
                                        stores and heading up a ‘concept’ store, where the then new ideas of preparing
                                        and cooking pizzas in store, having a proper florist and fruit and vegetable
                                        ‘markets’ were trialled. All Morrisons’ managers from the whole country spent
                                        three days there to see the new concept. ‘That was hard work,’ he says, ‘long
                                        days, seven days a week, for about a year.’</p>

                                    <input type="text" class="dnd-drop-input" data-question="q32" data-paragraph="E"
                                        placeholder="32" readonly=""
                                        style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;"
                                        autocomplete="off" data-original-placeholder="32">
                                    <p><br>
                                        This morning, Perriss is checking the layout of the store. He examines the
                                        baking potato shelf and rejects three, one that has split virtually in half and
                                        two that are beginning to go green. He also takes out a packet of bacon that has
                                        been damaged. ‘You have to be careful with everything,’ he says.</p>

                                    <input type="text" class="dnd-drop-input" data-question="q33" data-paragraph="F"
                                        placeholder="33" readonly=""
                                        style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;"
                                        autocomplete="off" data-original-placeholder="33">
                                    <p><br>
                                        Despite eagle-eyed Perriss pulling out fruit and vegetables that most of us
                                        would buy without a second thought, the wastage each week is tiny: produce worth
                                        £4,200 is marked down for a quick sale, and only £400-worth is scrapped. This,
                                        he explains, is down to Morrisons’ method of ordering, still done manually
                                        rather than by computer. Department heads know exactly how much they’ve sold
                                        that day and how much they’re likely to sell the next, based on sales records
                                        and allowing for influences such as the weather.</p>

                                    <input type="text" class="dnd-drop-input" data-question="q34" data-paragraph="G"
                                        placeholder="34" readonly=""
                                        style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;"
                                        autocomplete="off" data-original-placeholder="34">
                                    <p><br>
                                        Perriss works hard to keep his staff motivated and happy. He is keen to hear
                                        what staff think. He recently held a ‘talent’ day, inviting employees interested
                                        in moving to a new job within the store to come and talk to him about why they
                                        thought they should be promoted, and discuss how to go about it. Twenty-three
                                        people were interviewed and Perriss says that most of them ‘will be better
                                        members of staff because they can see I’m trying to help them.’</p>

                                    <input type="text" class="dnd-drop-input" data-question="q35" data-paragraph="H"
                                        placeholder="35" readonly=""
                                        style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;"
                                        autocomplete="off" data-original-placeholder="35">
                                    <p><br>
                                        His favourite department is fish, which has a four-metre-long counter run by
                                        Debbie and Angela, who are busy having a discussion about how to cook a
                                        particular fish with a customer. But it is one of just 20 or so departments
                                        around the store and Perriss admits the pressure of making sure he knows what’s
                                        happening on them all can be intense. ‘You have to do so much and there could be
                                        something wrong with every single one, every day,’ he says. ‘You’ve got to
                                        minimise those things and shrink them into perspective. You’ve got to love the
                                        job.’ And Perriss certainly does.</p>
                                </div>
                            </div>

                            <!-- Column 2: Questions -->
                            <div class="col-md-6 question_site">
                                <h4 class="mt-0"><strong>Questions 28-35</strong></h4>
                                <p>The text has eight sections. Choose the correct heading for each section and move it into the gap.</p>

                                <div class="mb-4">
                                    <h5 class="mb-3" style="color: #1e293b; font-weight: 700;">List of Headings</h5>
                                    <div id="dnd-headings-list">
                                        <div class="dnd-heading" data-value="i"
                                            data-content="Why Perriss chose a career in supermarkets">Why Perriss chose
                                            a career in supermarkets</div>
                                        <div class="dnd-heading" data-value="ii"
                                            data-content="Preparing for customers to arrive">Preparing for customers to
                                            arrive</div>
                                        <div class="dnd-heading" data-value="iii"
                                            data-content="Helping staff to develop">Helping staff to develop</div>
                                        <div class="dnd-heading" data-value="iv"
                                            data-content="Demonstrating a different way of organizing a store">
                                            Demonstrating a different way of organizing a store</div>
                                        <div class="dnd-heading" data-value="v"
                                            data-content="The benefit of accurate forecasting">The benefit of accurate
                                            forecasting</div>
                                        <div class="dnd-heading" data-value="vi"
                                            data-content="Keeping everything running as smoothly as possible">Keeping
                                            everything running as smoothly as possible</div>
                                        <div class="dnd-heading" data-value="vii"
                                            data-content="Making sure the items on sale are good enough">Making sure the
                                            items on sale are good enough</div>
                                        <div class="dnd-heading" data-value="viii"
                                            data-content="Noticing when customers need assistance">Noticing when
                                            customers need assistance</div>
                                        <div class="dnd-heading" data-value="ix"
                                            data-content="How do staff feel about Perriss?">How do staff feel about
                                            Perriss?</div>
                                        <div class="dnd-heading" data-value="x" data-content="Perriss’s early career">
                                            Perriss’s early career</div>
                                    </div>
                                </div>

                                <!-- Hidden Inputs for saving -->
                                <div style="display:none;">
                                    <input type="text" name="q28" id="28" value="{{ $answers[28] ?? '' }}">
                                    <input type="text" name="q29" id="29" value="{{ $answers[29] ?? '' }}">
                                    <input type="text" name="q30" id="30" value="{{ $answers[30] ?? '' }}">
                                    <input type="text" name="q31" id="31" value="{{ $answers[31] ?? '' }}">
                                    <input type="text" name="q32" id="32" value="{{ $answers[32] ?? '' }}">
                                    <input type="text" name="q33" id="33" value="{{ $answers[33] ?? '' }}">
                                    <input type="text" name="q34" id="34" value="{{ $answers[34] ?? '' }}">
                                    <input type="text" name="q35" id="35" value="{{ $answers[35] ?? '' }}">
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Questions 36-40</strong></h3>
                                    <p>Choose <strong>TRUE</strong> if the statement agrees with the information given
                                        in the text, choose <strong>FALSE</strong> if the statement contradicts the
                                        information, or choose <strong>NOT GIVEN</strong> if there is no information on
                                        this.</p>

                                    <div class="tfng-block" id="q36_40_tfng">
                                        <div class="tfng-item open">
                                            <div class="tfng-head">
                                                <div class="tfng-num">36</div>
                                                <div class="tfng-q">Perriss encourages staff to offer help to all
                                                    customers.</div>
                                            </div>
                                            <div class="tfng-options">
                                                <label><input type="radio" name="q36" value="TRUE" {{ ($answers[36] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                                <label><input type="radio" name="q36" value="FALSE" {{ ($answers[36] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                                <label><input type="radio" name="q36" value="NOT GIVEN" {{ ($answers[36] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT
                                                        GIVEN</span></label>
                                            </div>
                                        </div>
                                        <div class="tfng-item">
                                            <div class="tfng-head">
                                                <div class="tfng-num">37</div>
                                                <div class="tfng-q">Perriss is sometimes worried that customers will
                                                    arrive before the store is ready for them.</div>
                                            </div>
                                            <div class="tfng-options">
                                                <label><input type="radio" name="q37" value="TRUE" {{ ($answers[37] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                                <label><input type="radio" name="q37" value="FALSE" {{ ($answers[37] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                                <label><input type="radio" name="q37" value="NOT GIVEN" {{ ($answers[37] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT
                                                        GIVEN</span></label>
                                            </div>
                                        </div>
                                        <div class="tfng-item">
                                            <div class="tfng-head">
                                                <div class="tfng-num">38</div>
                                                <div class="tfng-q">When Perriss first became a store manager, he knew
                                                    the store was going to close.</div>
                                            </div>
                                            <div class="tfng-options">
                                                <label><input type="radio" name="q38" value="TRUE" {{ ($answers[38] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                                <label><input type="radio" name="q38" value="FALSE" {{ ($answers[38] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                                <label><input type="radio" name="q38" value="NOT GIVEN" {{ ($answers[38] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT
                                                        GIVEN</span></label>
                                            </div>
                                        </div>
                                        <div class="tfng-item">
                                            <div class="tfng-head">
                                                <div class="tfng-num">39</div>
                                                <div class="tfng-q">On average, produce worth £4,200 is thrown away
                                                    every week.</div>
                                            </div>
                                            <div class="tfng-options">
                                                <label><input type="radio" name="q39" value="TRUE" {{ ($answers[39] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                                <label><input type="radio" name="q39" value="FALSE" {{ ($answers[39] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                                <label><input type="radio" name="q39" value="NOT GIVEN" {{ ($answers[39] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT
                                                        GIVEN</span></label>
                                            </div>
                                        </div>
                                        <div class="tfng-item">
                                            <div class="tfng-head">
                                                <div class="tfng-num">40</div>
                                                <div class="tfng-q">Perriss was surprised how many staff asked about
                                                    promotion on the 'talent' day.</div>
                                            </div>
                                            <div class="tfng-options">
                                                <label><input type="radio" name="q40" value="TRUE" {{ ($answers[40] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                                <label><input type="radio" name="q40" value="FALSE" {{ ($answers[40] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                                <label><input type="radio" name="q40" value="NOT GIVEN" {{ ($answers[40] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT
                                                        GIVEN</span></label>
                                            </div>
                                        </div>
                                    </div>
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
    <div class="modal fade" id="startModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true"
        data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Start Reading Test</h5>
                </div>
                <div class="modal-body">
                    <p class="instruction-text">Please enter your Student ID and click OK to begin the reading test.</p>
                    <div class="form-group">
                        <label for="studentIdInput" class="form-label">Student ID</label>
                        <input type="text" class="form-control" id="studentIdInput" placeholder="Enter your Student ID"
                            required>
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
            <span class="tab-title">Part 1 </span>
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
            </div>
            <span class="question-placeholder">15 of 27</span>
        </div>
        <div class="tab " data-tab="part3">
            <span class="tab-title">Part 3</span>
            <div class="question-links">
                <a href="#" class="question-link" data-question="28">28</a>
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
            <span class="question-placeholder">28 of 40</span>
        </div>

    </div>
    <div class="fixed-bottom d-flex justify-content-end mb-5 px-2" style="gap: 5px;">
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
            link.addEventListener('click', function (e) {
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
            link.addEventListener('click', function (event) {
                event.preventDefault();

                // Remove "active" class from all links
                questionLinks.forEach(l => l.classList.remove('active'));

                // Add "active" class to clicked link
                this.classList.add('active');
            });
        });
    </script>

    {{-- alart and timer script and finished test script added in frontend layout CommonScript --}}

    @include('front_end.layout.commonScript');

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const testForm = document.getElementById('testForm');

            // Ensure exam_student_id is submitted for evaluation list
            const examIdField = document.getElementById('examStudentIdField');
            const storedExamId = sessionStorage.getItem('examStudentId') || '';
            if (examIdField && storedExamId) {
                examIdField.value = storedExamId;
            }

            const studentIdInput = document.getElementById('studentIdInput');
            const startTestBtn = document.getElementById('startTestButton');
            const startModalEl = document.getElementById('startModal');

            // Ensure backdrop/body classes are cleaned up after start modal closes
            if (startModalEl) {
                startModalEl.addEventListener('hidden.bs.modal', function () {
                    document.querySelectorAll('.modal-backdrop').forEach(b => b.remove());
                    document.body.classList.remove('modal-open');
                    document.body.style.overflow = '';
                    document.body.style.paddingRight = '';
                });
            }

            const requestFullscreen = () => {
                const elem = document.documentElement;
                if (document.fullscreenElement) return;
                if (elem.requestFullscreen) {
                    elem.requestFullscreen().catch(() => { });
                } else if (elem.webkitRequestFullscreen) {
                    elem.webkitRequestFullscreen();
                } else if (elem.msRequestFullscreen) {
                    elem.msRequestFullscreen();
                }
            };

            // Intercept start button click for student ID validation
            if (startTestBtn && studentIdInput) {
                startTestBtn.addEventListener('click', function (e) {
                    const studentIdError = document.getElementById('studentIdError');
                    const studentId = studentIdInput.value.trim();
                    const isValid = /^[a-zA-Z0-9]{8,}$/.test(studentId);

                    if (!isValid) {
                        e.preventDefault();
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
                    if (examIdField) examIdField.value = studentId;
                    if (studentIdError) studentIdError.style.display = 'none';
                    studentIdInput.style.borderColor = '#ddd';
                    requestFullscreen();

                    if (startModalEl && window.bootstrap && bootstrap.Modal) {
                        const modalInstance = bootstrap.Modal.getOrCreateInstance(startModalEl);
                        if (modalInstance) modalInstance.hide();
                    }

                    // Reset to Part 1 explicitly after modal closes to ensure correct initial state
                    if (window.setActiveQuestion) {
                        setTimeout(() => {
                            window.setActiveQuestion(0);
                        }, 500);
                    }
                }, true);

                // Enter key triggers start button
                studentIdInput.addEventListener('keydown', function (event) {
                    if (event.key === 'Enter') {
                        event.preventDefault();
                        startTestBtn.click();
                    }
                });
            }

            if (testForm) {
                testForm.addEventListener('keydown', function (event) {
                    if (event.key !== 'Enter') return;
                    const target = event.target;
                    if (!target) return;
                    if (target.id === 'studentIdInput') return;

                    const tag = (target.tagName || '').toLowerCase();
                    const type = (target.getAttribute && target.getAttribute('type') || '').toLowerCase();

                    if (tag === 'textarea') return;
                    if (tag === 'button') return;
                    if (tag === 'input' && (type === 'submit' || type === 'button')) return;

                    event.preventDefault();
                }, true);
            }

            // Autosave (debounced like listeningFourOne)
            const dirtyInputs = new Map();
            let autosaveTimer = null;
            const autosaveDelayMs = 10000;

            function postAutosave(questionNumber, answer) {
                const formData = new FormData();
                formData.append('student_id', document.querySelector('input[name="student_id"]').value);
                formData.append('test_name', document.querySelector('input[name="test_name"]').value);
                const assignmentIdField = document.querySelector('input[name="assignment_id"]');
                if (assignmentIdField && (assignmentIdField.value || '').trim() !== '') {
                    formData.append('assignment_id', assignmentIdField.value);
                }
                formData.append('question_number', questionNumber);
                formData.append('answer', answer);

                return fetch('{{ route('reading.autosave') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                }).catch(() => { });
            }

            function autosaveFromInput(input) {
                if (!input) return Promise.resolve();

                if (input.type === 'checkbox') {
                    const groupName = input.name;
                    const selectedValues = Array.from(document.querySelectorAll(`input[name="${groupName}"]:checked`))
                        .map(cb => cb.value);
                    const questionNumber = groupName.replace('q', '').replace('[]', '');
                    return postAutosave(questionNumber, selectedValues.join(','));
                }

                if (input.type === 'radio') {
                    const name = input.name;
                    const checked = document.querySelector(`input[type="radio"][name="${name}"]:checked`);
                    const questionNumber = name.replace('q', '');
                    return postAutosave(questionNumber, checked ? checked.value : '');
                }

                const questionNumber = (input.name || '').replace('q', '');
                return postAutosave(questionNumber, input.value);
            }

            function flushDirtyAutosaves() {
                if (dirtyInputs.size === 0) return Promise.resolve();

                const inputs = Array.from(dirtyInputs.values());
                dirtyInputs.clear();

                let chain = Promise.resolve();
                inputs.forEach((inp) => {
                    chain = chain.then(() => autosaveFromInput(inp));
                });
                return chain;
            }

            function scheduleAutosaveFlush() {
                if (autosaveTimer) clearTimeout(autosaveTimer);
                autosaveTimer = setTimeout(() => {
                    flushDirtyAutosaves();
                }, autosaveDelayMs);
            }

            function markDirty(input) {
                if (!input) return;
                const key = input.name || input.id;
                if (!key) return;
                dirtyInputs.set(key, input);
                scheduleAutosaveFlush();
            }

            document.querySelectorAll('input[type="radio"], input[type="text"], input[type="checkbox"]').forEach(input => {
                input.addEventListener('change', function () {
                    markDirty(this);
                });
            });

            if (testForm) {
                testForm.addEventListener('submit', function (e) {
                    if (autosaveTimer) {
                        clearTimeout(autosaveTimer);
                        autosaveTimer = null;
                    }

                    e.preventDefault();
                    flushDirtyAutosaves().finally(() => {
                        testForm.submit();
                    });
                });
            }
        });
    </script>




    <!-- arrow button script  -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const allLinks = Array.from(document.querySelectorAll('.question-link'));
            let currentIndex = 0;

            function highlightLinkAndNumber(qNum) {
                // Remove existing active styles
                allLinks.forEach(link => link.classList.remove('active'));
                document.querySelectorAll('.question-number').forEach(num => num.classList.remove('active'));

                // Activate the current question-link
                const currentLink = allLinks.find(l => l.getAttribute('data-question') === String(qNum));
                if (currentLink) currentLink.classList.add('active');

                // Highlight number box
                const numberBox = document.getElementById(`question-${qNum}-number`);
                if (numberBox) numberBox.classList.add('active');
            }
            window.highlightLinkAndNumber = highlightLinkAndNumber;

            function activateTabForQuestion(num) {
                const qNumStr = String(num);
                // Try to find a label or input with this ID/Num to find the parent tab-content
                let targetEl = document.getElementById(qNumStr) || document.querySelector(`[data-question="q${qNumStr}"]`);
                if (!targetEl) return;

                const partContent = targetEl.closest('.tab-content');
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
            window.activateTabForQuestion = activateTabForQuestion;

            function setActiveQuestionByNum(qNum) {
                const linkIndex = allLinks.findIndex(link => link.getAttribute('data-question') === String(qNum));
                if (linkIndex !== -1) {
                    currentIndex = linkIndex;
                    highlightLinkAndNumber(qNum);
                    activateTabForQuestion(qNum);
                }
            }
            window.setActiveQuestionByNum = setActiveQuestionByNum;

            function scrollAndFocus(num) {
                const label = document.getElementById(num);
                if (label) label.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });

                const inputField = document.getElementById(num);
                if (inputField && inputField.tagName === 'INPUT') {
                    setTimeout(() => inputField.focus(), 400); // wait till scroll completes
                }
            }

            function setActiveQuestion(index) {
                if (!allLinks[index]) return;
                currentIndex = index;
                const qNum = allLinks[index].getAttribute('data-question');

                highlightLinkAndNumber(qNum);
                activateTabForQuestion(qNum);
                scrollAndFocus(qNum);
            }
            window.setActiveQuestion = setActiveQuestion;

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
            document.querySelectorAll('input[type="text"], input[type="checkbox"], input[type="radio"], .dnd-drop-input').forEach(input => {
                const handleInteraction = function () {
                    const questionNum = this.id ||
                        (this.name ? this.name.replace('q', '').replace('[]', '') : '') ||
                        (this.getAttribute('data-question') ? this.getAttribute('data-question').replace('q', '') : '');

                    if (!questionNum) return;

                    const linkIndex = allLinks.findIndex(link => link.getAttribute('data-question') === String(questionNum));
                    if (linkIndex !== -1) {
                        currentIndex = linkIndex;
                        highlightLinkAndNumber(questionNum);
                        activateTabForQuestion(questionNum);
                    }
                };

                input.addEventListener('focus', handleInteraction);
                input.addEventListener('click', handleInteraction);
            });

            // For TFNG and MCQ heads
            document.querySelectorAll('.tfng-head, .mcq-head').forEach(head => {
                head.addEventListener('click', function () {
                    const numEl = this.querySelector('.tfng-num, .mcq-num');
                    if (numEl) {
                        const qNum = numEl.textContent.trim();
                        const linkIndex = allLinks.findIndex(link => link.getAttribute('data-question') === String(qNum));
                        if (linkIndex !== -1) {
                            currentIndex = linkIndex;
                            highlightLinkAndNumber(qNum);
                            activateTabForQuestion(qNum);
                        }
                    }
                });
            });

            // For matching grid rows
            document.querySelectorAll('.matching-grid tbody tr').forEach(row => {
                row.addEventListener('click', function () {
                    const numEl = this.querySelector('strong');
                    if (numEl) {
                        const qNum = numEl.textContent.trim();
                        if (window.setActiveQuestionByNum) window.setActiveQuestionByNum(qNum);
                    }
                });
            });

            // Initial setup - Use a delay to ensure it overrides any other state
            setTimeout(() => {
                if (typeof setActiveQuestion === 'function') {
                    setActiveQuestion(0);
                }
            }, 100);
        });
    </script>





    <!-- highlight and note script  -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');
        const contextMenu = document.getElementById('customContextMenu');
        const highlightOption = document.getElementById('highlightOption');
        const notesOption = document.getElementById('notesOption');
        document.getElementById('noteToggle').addEventListener('click', () => {
            sidebar.classList.toggle('open');
            mainContent.classList.toggle('shifted');
        });

        sidebar.querySelector('.close-btn').addEventListener('click', () => {
            sidebar.classList.remove('open');
            mainContent.classList.remove('shifted');
        });
        const clearOption = document.getElementById('clearOption');
        const allClearOption = document.getElementById('allClear');
        let selectionRange = null;
        let activePopup = null; // track the active popup

        let clickedMark = null; // Track which mark was right-clicked

        // Show custom context menu on text selection
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
                const selectedStr = sel.toString();
                // Only keep range if containers are text nodes (avoids element-node offset issues)
                if (rawRange.startContainer.nodeType === Node.TEXT_NODE && rawRange.endContainer.nodeType === Node.TEXT_NODE) {
                    selectionRange = rawRange;
                } else {
                    // Shrink range to text content by creating a new range
                    const newRange = document.createRange();
                    const ancestor = rawRange.commonAncestorContainer;
                    const treeWalker = document.createTreeWalker(ancestor.nodeType === Node.TEXT_NODE ? ancestor.parentNode : ancestor, NodeFilter.SHOW_TEXT, null, false);
                    let firstNode = null, lastNode = null, charCount = 0;
                    let startNodeFound = false;
                    let startOff = 0, endOff = 0;
                    let tn;
                    while (tn = treeWalker.nextNode()) {
                        if (!rawRange.intersectsNode(tn)) continue;
                        if (!firstNode) {
                            firstNode = tn;
                            // find where selection starts within this text node
                            startOff = tn.textContent.indexOf(selectedStr.substring(0, Math.min(20, selectedStr.length)));
                            startOff = startOff < 0 ? 0 : startOff;
                        }
                        lastNode = tn;
                    }
                    if (firstNode && lastNode) {
                        newRange.setStart(firstNode, startOff);
                        newRange.setEnd(lastNode, lastNode.textContent.length);
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

        function highlightRange(range, markInitializer) {
            const marks = [];
            if (!range) return marks;

            const startContainer = range.startContainer;
            const endContainer = range.endContainer;
            const startOffset = range.startOffset;
            const endOffset = range.endOffset;

            // Optimistic path for single text node (standard selection)
            if (startContainer === endContainer && startContainer && startContainer.nodeType === Node.TEXT_NODE) {
                const selectedText = startContainer.textContent.substring(startOffset, endOffset);
                if (!selectedText.trim()) return marks;
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

            // Robust path for multi-node/cross-cell selection
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
                if (['TABLE', 'THEAD', 'TBODY', 'TR'].includes(textNode.parentNode?.tagName)) return;

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

        // Highlight only
        highlightOption.addEventListener('click', function () {
            if (selectionRange) {
                highlightRange(selectionRange);
            }
            selectionRange = null;
            clickedMark = null;
            contextMenu.style.display = 'none';
        });

        // Add note with popup
        notesOption.addEventListener('click', function () {
            if (clickedMark) {
                showNotePopup(clickedMark);
                contextMenu.style.display = 'none';
                return;
            }

            if (selectionRange) {
                const markId = String(Date.now());
                const marks = highlightRange(selectionRange, (m) => {
                    m.setAttribute('data-tooltip', '');
                    m.setAttribute('data-note', '');
                    m.dataset.markId = markId;
                });

                if (marks.length > 0) {
                    // Use full text for the header (no truncation as requested)
                    const fullHeader = marks.map(m => m.innerText).join(' ').replace(/\s+/g, ' ').trim();

                    marks.forEach((mk) => {
                        mk.dataset.header = fullHeader;
                        mk.addEventListener('click', function (e) {
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

        // Clear single highlight - only works when right-clicking on highlighted text
        clearOption.addEventListener('click', function () {
            if (clickedMark) {
                const markId = clickedMark.dataset.markId;

                // Remove from sidebar
                if (markId) {
                    const sidebarItem = document.querySelector(`.sidebar-note-item[data-mark-id="${markId}"]`);
                    if (sidebarItem) {
                        sidebarItem.remove();
                    }
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

        // Clear all highlights and notes
        allClearOption.addEventListener('click', () => {
            document.querySelectorAll('mark').forEach(m => m.replaceWith(document.createTextNode(m.innerText)));
            const headerHTML = `<div class="sidebar-header"><h5>Notes</h5><span class="close-btn">&times;</span></div>`;
            sidebar.innerHTML = headerHTML;
            sidebar.querySelector('.close-btn').addEventListener('click', () => {
                sidebar.classList.remove('open');
                mainContent.classList.remove('shifted');
            });
            if (activePopup) activePopup.remove();
            // Auto-close the sidebar panel
            sidebar.classList.remove('open');
            mainContent.classList.remove('shifted');
            contextMenu.style.display = 'none';
        });

        // Close context menu on outside click
        document.addEventListener('click', function (e) {
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
            const notePopup = document.createElement('div');
            notePopup.classList.add('note-popup');
            notePopup.innerHTML = `
                <div class="drag-handle" style="background: #ddd; padding: 8px; cursor: move; border-bottom: 1px solid #ccc; display: flex; justify-content: space-between; align-items: center; user-select: text;">
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
    </script>
    {{-- input auto sujection off --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get all input fields within the form
            const inputs = document.querySelectorAll('#testForm input');

            // Loop through each input and set autocomplete="off"
            inputs.forEach(function (input) {
                input.setAttribute('autocomplete', 'off');
            });

            const allLinks = Array.from(document.querySelectorAll('.question-link'));
            const textInputs = document.querySelectorAll('#testForm input[type="text"]');

            textInputs.forEach((input) => {
                input.addEventListener('focus', function () {
                    // Placeholder logic
                    if (this.placeholder && typeof this.dataset.placeholder === 'undefined') {
                        this.dataset.placeholder = this.placeholder;
                        this.placeholder = '';
                    } else if (this.placeholder) {
                        this.placeholder = '';
                    }

                    // Navigation logic
                    const qNum = (this.id && this.id.replace('q', '')) || (this.name && this.name.replace('q', '').replace('[]', ''));
                    if (qNum) {
                        const qIdx = allLinks.findIndex(l => l.getAttribute('data-question') === String(qNum));
                        if (qIdx !== -1) {
                            allLinks.forEach(link => link.classList.remove('active'));
                            allLinks[qIdx].classList.add('active');

                            // Also highlight number box if exists
                            const numberBox = document.getElementById(`question-${qNum}-number`);
                            if (numberBox) {
                                document.querySelectorAll('.question-number').forEach(num => num.classList.remove('active'));
                                numberBox.classList.add('active');
                            }
                        }
                    }
                });

                input.addEventListener('blur', function () {
                    if ((this.value || '').trim() === '' && this.dataset.placeholder) {
                        this.placeholder = this.dataset.placeholder;
                    }
                });
            });

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


            function initTfngAccordion(containerId) {
                const container = document.getElementById(containerId);
                if (!container) return;
                const items = container.querySelectorAll('.tfng-item');
                const heads = container.querySelectorAll('.tfng-head');

                heads.forEach((head) => {
                    head.addEventListener('click', () => {
                        const item = head.closest('.tfng-item');
                        if (!item) return;
                        const isOpen = item.classList.contains('open');
                        items.forEach((it) => it.classList.remove('open'));
                        if (!isOpen) item.classList.add('open');
                    });
                });
            }

            initTfngAccordion('q1_6_tfng');
            initTfngAccordion('q36_40_tfng');

            function setBottomActiveQuestionLink(qNum) {
                if (window.setActiveQuestionByNum) {
                    window.setActiveQuestionByNum(String(qNum));
                }
            }

            function updateAnsweredState(qNum) {
                const link = document.querySelector(`.question-link[data-question="${qNum}"]`);
                if (!link) return;

                let isAnswered = false;
                const inputs = document.querySelectorAll(`input[name="q${qNum}"], input[name="q${qNum}[]"], .dnd-drop-input[data-question="q${qNum}"]`);
                inputs.forEach(input => {
                    if (input.classList.contains('dnd-drop-input')) {
                        if (input.getAttribute('data-placed-value')) isAnswered = true;
                    } else if ((input.type === 'radio' || input.type === 'checkbox') && input.checked) {
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

            // --- Matching Grid (tick-cell) Logic ---
            function clearRowSelection(rowNumber) {
                document.querySelectorAll(`.tick-cell[data-row="${rowNumber}"]`).forEach(function (cell) {
                    cell.classList.remove('selected');
                });
            }

            function setRowValue(rowNumber, value) {
                const hidden = document.getElementById(String(rowNumber));
                if (hidden) {
                    hidden.value = value;
                    hidden.dispatchEvent(new Event('change'));
                }

                clearRowSelection(rowNumber);
                const cells = document.querySelectorAll(`.tick-cell[data-row="${rowNumber}"]`);
                const cell = Array.from(cells).find(c => (c.getAttribute('data-value') || '').toLowerCase() === (value || '').toLowerCase());
                if (cell) cell.classList.add('selected');

                // Mark bottom question number active
                setBottomActiveQuestionLink(rowNumber);
                updateAnsweredState(rowNumber);
            }

            function clearRowValue(rowNumber) {
                const hidden = document.getElementById(String(rowNumber));
                if (hidden) {
                    hidden.value = '';
                    hidden.dispatchEvent(new Event('change'));
                }
                clearRowSelection(rowNumber);
                updateAnsweredState(rowNumber);
            }

            document.querySelectorAll('.tick-cell').forEach(function (cell) {
                cell.addEventListener('click', function () {
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

            // Listen for changes on all inputs to update answered state
            document.querySelectorAll('input').forEach(input => {
                input.addEventListener('change', () => {
                    const qMatch = input.name ? input.name.match(/^q(\d+)/) : null;
                    if (qMatch) updateAnsweredState(qMatch[1]);
                });
                if (input.type === 'text') {
                    input.addEventListener('input', () => {
                        const qMatch = input.name ? input.name.match(/^q(\d+)/) : null;
                        if (qMatch) updateAnsweredState(qMatch[1]);
                    });
                }
            });

            // Initial scan for all questions
            for (let i = 1; i <= 40; i++) {
                updateAnsweredState(i);
            }

            // Load saved answers for tick-cells
            [7, 8, 9, 10, 11, 12, 13, 14, 23, 24, 25, 26, 27].forEach(function (i) {
                const hidden = document.getElementById(String(i));
                if (!hidden) return;
                const val = (hidden.value || '').trim();
                setRowValue(i, val);
            });

            // --- Drag and Drop Logic for Questions 28-35 ---
            var dndDraggedEl = null;
            var dndGhost = null;
            var dndSourceInput = null;

            // Remove native draggable from headings
            document.querySelectorAll('.dnd-heading').forEach(function (el) {
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
                var qName = dropInput.getAttribute('data-question');

                // If input already has a value, restore the old heading back to list
                var oldVal = dropInput.getAttribute('data-placed-value');
                if (oldVal) {
                    var oldH = document.querySelector('.dnd-heading[data-value="' + oldVal + '"]');
                    if (oldH) {
                        oldH.classList.remove('used');
                    }
                }

                // Set value in the visible drop input
                dropInput.value = headingEl.textContent.trim();
                dropInput.setAttribute('data-placed-value', val);
                dropInput.style.borderColor = 'black';
                dropInput.style.background = '#fff';

                // Dynamic width calculation
                var font = window.getComputedStyle(dropInput).font;
                var textWidth = measureTextWidth(dropInput.value, font);
                dropInput.style.width = (textWidth + 30) + 'px'; // add some padding

                dropInput.style.boxShadow = '0 4px 6px -1px rgba(0, 0, 0, 0.1)';

                // Hide heading from right side list
                headingEl.classList.add('used');

                // Sync hidden input
                var qNum = String(qName || '').replace(/^q/i, '');
                var hidden = document.getElementById(qNum);
                if (hidden) {
                    hidden.value = val; // Store i, ii, etc.
                    hidden.dispatchEvent(new Event('change'));
                    updateAnsweredState(qNum);
                    setBottomActiveQuestionLink(qNum);
                }
            }

            // Clear drop input on double-click — return heading to right side list
            document.querySelectorAll('.dnd-drop-input').forEach(function (dropInput) {
                dropInput.addEventListener('dblclick', function () {
                    var oldVal = dropInput.getAttribute('data-placed-value');
                    if (oldVal) {
                        var h = document.querySelector('.dnd-heading[data-value="' + oldVal + '"]');
                        if (h) {
                            h.classList.remove('used');
                        }
                    }
                    dropInput.value = '';
                    dropInput.removeAttribute('data-placed-value');
                    dropInput.style.border = '1px solid #e2e8f0';
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

            // Start drag from right side heading list
            document.querySelectorAll('.dnd-heading').forEach(function (el) {
                el.addEventListener('mousedown', function (e) {
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
            document.querySelectorAll('.dnd-drop-input').forEach(function (inp) {
                inp.addEventListener('mousedown', function (e) {
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

            document.addEventListener('mousemove', function (e) {
                if (!dndGhost) return;
                dndGhost.style.left = e.clientX + 'px';
                dndGhost.style.top = e.clientY - 15 + 'px';

                // Highlight drop inputs on hover (Resetting to neutral or keeping black if placed)
                document.querySelectorAll('.dnd-drop-input').forEach(function (inp) {
                    var rect = inp.getBoundingClientRect();
                    var isOver = (e.clientX >= rect.left && e.clientX <= rect.right && e.clientY >= rect.top && e.clientY <= rect.bottom);

                    if (inp.getAttribute('data-placed-value')) {
                        inp.style.borderColor = 'black';
                    } else if (isOver) {
                        inp.style.borderColor = '#e2e8f0'; // No black on hover
                    } else {
                        inp.style.borderColor = '#e2e8f0';

                    }
                });
            });

            document.addEventListener('mouseup', function (e) {
                if (!dndDraggedEl || !dndGhost) return;

                // Remove ghost
                if (dndGhost.parentNode) dndGhost.parentNode.removeChild(dndGhost);
                dndGhost = null;

                // Check if dropped on a drop input
                var droppedOnInput = false;
                document.querySelectorAll('.dnd-drop-input').forEach(function (inp) {
                    var rect = inp.getBoundingClientRect();
                    if (e.clientX >= rect.left && e.clientX <= rect.right && e.clientY >= rect.top && e.clientY <= rect.bottom) {
                        // If dragging from another input, clear that input first
                        if (dndSourceInput && dndSourceInput !== inp) {
                            dndSourceInput.value = '';
                            dndSourceInput.removeAttribute('data-placed-value');
                            dndSourceInput.style.border = '1px solid #e2e8f0';
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
                            // Dropped back on same input
                            dndDraggedEl.classList.remove('dragging');
                            dndDraggedEl = null;
                            dndSourceInput = null;
                            return;
                        }
                        // Make heading visible again before placing
                        dndDraggedEl.classList.remove('used');
                        dndPlaceHeading(inp, dndDraggedEl);
                        droppedOnInput = true;
                    }
                });

                // If dragged from input but NOT dropped on any input → return to list
                if (!droppedOnInput && dndSourceInput) {
                    dndDraggedEl.classList.remove('used');
                    dndSourceInput.value = '';
                    dndSourceInput.removeAttribute('data-placed-value');
                    dndSourceInput.style.border = '1px solid #e2e8f0';
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

            // Restore saved values for DND
            [28, 29, 30, 31, 32, 33, 34, 35].forEach(function (qNum) {
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
        });
    </script>


</body>

</html>