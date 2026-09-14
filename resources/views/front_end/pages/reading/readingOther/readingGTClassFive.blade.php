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
            color: gray;
        }

        .tab.active .tab-title {
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
            border: 2px solid gray;
            border-radius: 4px;
        }

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

        #startModal {
            background: rgba(0, 0, 0, 0.5);
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
            padding: 20px 25px;
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
            margin-bottom: 20px;
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
            text-transform: uppercase;
            font-size: 12px;
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
            font-size: 14px;
            transition: all 0.3s ease;
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
            border-radius: 25px;
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
            transition: all 0.3s ease;
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

        .inline-input {
            border: none;
            border-bottom: 1px dotted #000;
            outline: none;
            background: #fff;
            padding: 4px 12px;
            width: 120px;
            transition: all 0.2s ease;
        }

        .inline-input:focus {
            border-color: #dee2e6;
            box-shadow: none !important;
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

        /* .question_site input[type="text"] {
            border: none;
            border-bottom: 1px dotted #000;
            outline: none;
            background: transparent;
        } */
        .question_site input[type="text"]:focus {
            /* border-bottom: 1px dotted #000; */
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
            padding: 10px 12px;
            border: 1px solid #d9d9d9;
            border-radius: 8px;
            background: #dbeafe;
            cursor: pointer;
        }

        .mcq-num {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
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
            margin: 8px 0;
            cursor: pointer;
        }

        .mcq-options label span {
            border: none;
        }

        .mcq-options input[type="radio"] {
            margin-top: 3px;
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
            padding: 10px 12px;
            border: 1px solid #d9d9d9;
            border-radius: 8px;
            background: #dbeafe;
            cursor: pointer;
        }

        .tfng-num {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
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
            margin: 8px 0;
            cursor: pointer;
        }

        .tfng-options input[type="radio"] {
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
            user-select: none;
        }

        .matching-grid .tick {
            visibility: hidden;
            opacity: 0;
            font-size: 18px;
            color: #0b5ed7;
            transition: opacity 0.1s ease;
        }

        .matching-grid .tick-cell.selected .tick {
            visibility: visible;
            opacity: 1;
        }

        /* --- Drag and Drop Styles --- */
        .dnd-ghost-follow {
            position: fixed;
            pointer-events: none;
            z-index: 10000;
            background: #fff;
            border: 2px solid #000;
            padding: 8px 12px;
            border-radius: 4px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            font-size: 14px;
            font-weight: 600;
            opacity: 0.9;
        }

        .dnd-heading {
            cursor: grab;
            padding: 10px;
            margin-bottom: 8px;
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            transition: all 0.2s;
            user-select: text; /* Allow precise selection for notes/highlights */
        }

        .dnd-heading:hover {
            border-color: #cbd5e1;
            background: #f8fafc;
        }

        .dnd-heading.dragging {
            opacity: 0.4;
        }

        .dnd-heading.used {
            display: none;
        }

        .dnd-drop-input {
            background: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 5px 15px;
            width: 200px;
            font-size: 14px;
            min-height: 40px;
            cursor: pointer;
            text-align: left;
            display: block;
            margin-bottom: 5px;
            color: #475569;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
        }

        .dnd-drop-input:focus {
            outline: none;
            border-color: black;
        }
    </style>
</head>

<body>
    <form action="{{ route('reading.submit') }}" method="POST" id="testForm"  spellcheck="false" autocomplete="off">
        @csrf

        {{-- hidden input  --}}
        <input type="hidden" name="test_name" value="{{ $testName ?? 'class17_reading' }}">
        <input type="hidden" name="student_id" value="{{ auth()->id() ?? session('student_batch_id') }}">
        <input type="hidden" name="exam_student_id" id="examStudentIdField" value="">
        <input type="hidden" name="assignment_id" value="{{ $assignmentId ?? '' }}">
        <!-- Sidebar -->
        <div id="sidebar" class="sidebar">
            <div class="sidebar-header">
                <h5>Notes</h5>
                <span class="close-btn">&times;</span>
            </div>
            <div id="sidebar-notes" style="padding: 15px;"></div>
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
                                    <span class="material-icons-outlined">schedule</span><strong id="timer">60 : 00 minutes remaining</strong></a>
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
                <div id="allClear" style="padding: 5px; cursor: pointer;">📝 Clear all</div>
            </div>


            <!-- question part 1 -->
            <div class=" container-fluid px-5">
                <div class="tab-content active" id="part1" style="margin-bottom: 80px;">
                    <div class="question_part">
                        <h4>Part 1</h4>
                        <p>You should spend about <strong>20</strong> minutes on Questions 1-14 which are based on the text below.</p>
                    </div>
                    <div class="mt-4">

                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-md-6">
                                <div class="scroll-box" style="text-align:left;">
                                    <p>Read the passage below and answer <strong>Questions 1-9</strong>.</p>
                                    <div class="border p-4 mb-4">
                                        <p class="text-center"><strong>The Earth</strong></p>
                                        <p><strong>A.</strong> The Earth is the third planet from the Sun and it is the only planet known to have life on it. The Earth formed around 4.5 billion years ago. It is one of four rocky planets on the inside of the Solar System. The other three are Mercury, Venus, and Mars.</p>

                                        <p><strong>B.</strong> The large mass of the Sun makes the Earth move around it, just as the mass of the Earth makes the Moon move around it. The Earth also turns round in space, so different parts face the Sun at different times. The Earth goes around the Sun once (one "year") for every 365¼ times it turns all the way around (one "day").</p>

                                        <p><strong>C.</strong> The Moon goes around the Earth about every 27⅓ days, and reflects light from the Sun. As the Earth goes round the Sun at the same time, the changing light of the Moon takes about 29½ days to go from dark to bright to dark again. That is where the idea of "month" came from. However, now most months have 30 or 31 days so they fit into one year.</p>

                                        <p><strong>D.</strong> The Earth is the only planet in our Solar System that has a large amount of liquid water. About 71% of the surface of the Earth is covered by oceans. Because of this, it is sometimes called the "Blue Planet".</p>

                                        <p><strong>E.</strong> Because of its water, the Earth is home to millions of species of plants and animals. The things that live on Earth have changed its surface greatly. For example, early cyanobacteria changed the air and gave it oxygen. The living part of the Earth's surface is called the "biosphere".</p>

                                        <p><strong>F.</strong> The Earth is part of the eight planets and many thousands of small bodies that move around the Sun as its Solar System. The Solar System is moving through the Orion Arm of the Milky Way Galaxy now, and will be for about the next 10,000 years.</p>

                                        <p><strong>G.</strong> The Earth is generally 150,000,000 kilometers or 93,000,000 miles away from the Sun (this distance is named an "Astronomical Unit"). The Earth moves along its way at an average speed of about 30 km or 19 mi a second. The Earth turns all the way around about 365¼ times in the time it takes for the Earth to go all the way around the Sun. To make up this extra bit of a day every year, an additional day is used every four years. This is named a "leap year".</p>

                                        <p><strong>H.</strong> The Moon goes around the Earth at an average distance of 400,000 kilometers (250,000 mi). It is locked to Earth so that it always has the same half facing the Earth; the other half is called the "dark side of the Moon". It takes about 27⅓ days for the Moon to go all the way around the Earth but, because the Earth is moving around the Sun at the same time, it takes about 29½ days for the Moon to go from dark to bright to dark again. This is where the word "month" came from, even though most months now have 30 or 31 days.</p>
                                    </div>

                                    <hr>

                                    <p>Read the passage below and answer <strong>Questions 10-14</strong>.</p>
                                    <div class="border p-4 mb-4">
                                        <p class="text-center"><strong>What to do in a fire?</strong></p>
                                        <p>Fire drills are a big part of being safe in school: They prepare you for what you need to do in case of a fire. But what if there was a fire where you live? <strong><em>Would you know what to do?</em></strong> Talking about fires can be scary because no one likes to think about people getting hurt or their things getting burned. But you can feel less worried if you are prepared.</p>
                                        <p>It's a good idea for families to talk about what they would do to escape a fire. Different families will have different strategies. Some kids live in one-story houses and other kids live in tall buildings. You'll want to talk about escape plans and escape routes, so let's start there.</p>
                                        <p><strong>Know Your Way Out</strong><br>
                                        An escape plan can help every member of a family get out of a burning house. The idea is to get outside <strong><em>quickly and safely</em></strong>. Smoke from a fire can make it hard to see where things are, so it's important to learn and remember the different ways out of your home. How many exits are there? How do you get to them from your room? It's a good idea to have your family draw a map of the escape plan.</p>
                                        <p>It's possible one way out could be blocked by fire or smoke, so you'll want to know where other ones are. And if you live in an apartment building, you'll want to know the best way to the stairwell or other emergency exits.</p>
                                        <p><strong>Safety Steps</strong><br>
                                        If you're in a room with the door closed when the fire breaks out, you need to take a few extra steps:</p>
                                        <ul>
                                            <li>Check to see if there's heat or smoke coming through the cracks around the door. (You're checking to see if there's fire on the other side.)</li>
                                            <li>If you see smoke coming under the door — <strong><em>don't open the door!</em></strong></li>
                                            <li>If you don't see smoke — touch the door. If the door is hot or very warm — <strong><em>don't open the door!</em></strong></li>
                                            <li>If you don't see smoke — and the door is not hot — then use your fingers to lightly touch the doorknob. <strong><em>If the doorknob is hot or very warm — don't open the door!</em></strong></li>
                                        </ul>
                                        <p>If the doorknob feels cool, and you can't see any smoke around the door, you can open the door very carefully and slowly. When you open the door, if you feel a burst of heat or smoke pours into the room, quickly shut the door and make sure it is really closed. If there's no smoke or heat when you open the door, <strong><em>go toward your escape route exit.</em></strong></p>
                                    </div>
                                </div>
                            </div>
                            <!-- Column 2 -->
                            <div class="col-md-6 question_site">
                                <h3><strong>Questions 1-6</strong></h3>
                                <p>Reading Passage <strong>"The Earth"</strong> has eight paragraphs <strong>A-H</strong>.</p>
                                <p>Which paragraph contains the following information?</p>

                                <div class="mt-4">
                                    <table class="table table-bordered matching-grid">
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
                                                <th class="choice-cell">H</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $q1_6 = [
                                                    1 => "Earth" . "'s natural satellite",
                                                    2 => "The distance between Earth and Sun",
                                                    3 => "General information about Earth",
                                                    4 => "Length of most months",
                                                    5 => "Another name for Earth",
                                                    6 => "The living part of the Earth" . "'s surface",
                                                ];
                                            @endphp
                                            @foreach($q1_6 as $qNum => $desc)
                                                <tr>
                                                    <td><strong id="question-{{ $qNum }}-number">{{ $qNum }}</strong> {{ $desc }}</td>
                                                    @foreach(['A','B','C','D','E','F','G','H'] as $letter)
                                                    <td class="tick-cell {{ ($answers[$qNum] ?? '') === $letter ? 'selected' : '' }}"
                                                        data-row="{{ $qNum }}" data-value="{{ $letter }}"><span class="tick">✔</span></td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    @for($i = 1; $i <= 6; $i++)
                                        <input type="hidden" name="q{{ $i }}" id="{{ $i }}" value="{{ $answers[$i] ?? '' }}">
                                    @endfor
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Questions 7-9</strong></h3>
                                    <p>Complete the sentences below.</p>
                                    <p>Choose <strong>NO MORE THAN THREE WORDS</strong> from the text for each answer.</p>
                                    <p>Write your answers in boxes <strong>7-9</strong> on your answer sheet.</p>

                                    <div class="mt-4">
                                        <div class="mb-3" style="line-height: 2;">
                                            <strong id="question-7-number">7.</strong> Apart from Earth, other rocky planets in our Solar Systems are Venus, Mars and <input type="text" name="q7" style="border: 1px solid #ccc; padding: 2px 5px; width: 180px; text-align: left;" id="q7" placeholder="7" value="{{ $answers[7] ?? '' }}">.
                                        </div>
                                        <div class="mb-3" style="line-height: 2;">
                                            <strong id="question-8-number">8.</strong> There are millions of <input type="text" name="q8" style="border: 1px solid #ccc; padding: 2px 5px; width: 180px; text-align: left;" id="q8" placeholder="8" value="{{ $answers[8] ?? '' }}"> of plants and animals that inhabit Earth.
                                        </div>
                                        <div class="mb-3" style="line-height: 2;">
                                            <strong id="question-9-number">9.</strong> The dark side of the Moon is the side, which <input type="text" name="q9" style="border: 1px solid #ccc; padding: 2px 5px; width: 180px; text-align: left;" id="q9" placeholder="9" value="{{ $answers[9] ?? '' }}"> faces Earth.
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Questions 10-14</strong></h3>
                                    <p>Choose <strong>TRUE</strong> if the statement agrees with the information given in the text, choose <strong>FALSE</strong> if the statement contradicts the information, or choose <strong>NOT GIVEN</strong> if there is no information on this.</p>

                                    <div class="tfng-block" id="q10_14_tfng">
                                        <div class="tfng-item open">
                                            <div class="tfng-head">
                                                <div class="tfng-num">10</div>
                                                <div class="tfng-q">It is important to have a strategy before escaping the fire.</div>
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
                                                <div class="tfng-q">You should mark different ways out of your home on the map.</div>
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
                                                <div class="tfng-q">If you're stuck in a room and see smoke coming from the other room, you should open the door and run to the exit.</div>
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
                                                <div class="tfng-q">A hot door means you shouldn't open it to escape.</div>
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
                                                <div class="tfng-q">If you open the door and everything seems fine, go straight to the exit.</div>
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
                <div class="tab-content " id="part2" style="margin-bottom: 80px;">
                    <div class="question_part">
                        <h4>Part 2</h4>
                        <p>You should spend about <strong>20</strong> minutes on Questions 15-27 which are based on the text below.</p>
                    </div>
                    <div class="mt-4">

                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-md-6">
                                <div class="scroll-box" style="text-align:left;">
                                    <p>Read the passage below and answer <strong>Questions 15-19</strong>.</p>
                                    <div class="border p-4 mb-4">
                                        <p><strong>Advice for Employees</strong><br>
                                        <strong>Safe computer use</strong></p>
                                        <p>Most people suffer no ill-effects from using VDUs (Visual Display Units) as they don't give out harmful levels of radiation and rarely cause any kind of skin complaint. If you do suffer ill-effects, it may be because of the way you're using the computer and this can be avoided by well-designed workstations. When working at a VDU, make sure you keep a good posture and that your eyes are level with the screen.</p>
                                        <p>Under health and safety regulations your employer should look at VDU workstations, and reduce any risks by supplying any equipment considered necessary (e.g. a wrist rest). They should also provide health and safety training. This also applies if you're working at home as an employee and using a VDU for a long period of time. There is no legal limit to how long you should work at a VDU, but under health and safety regulations you have the right to breaks from work using a VDU. This doesn't have to be a rest break, just a different type of work. Guidance from the Health and Safety Executive (HSE) suggests it's better to take frequent short breaks but if your job means spending long periods at a VDU, for example as in the case of data input, then longer breaks from your workstation should be introduced.</p>
                                        <p>If you're disabled, your employer's duty to make reasonable adjustments for you may mean that they will provide you with special computer equipment. You can also get advice and maybe help with paying for equipment from the local job centre.</p>
                                        <p>Studies haven't shown a link between VDU use and damage to eyesight, but if you feel that using a VDU screen is making your eyes tired, tell your employee safety representative. You have the right to a free eyesight test if you use a VDU a lot during work hours. If you're prescribed glasses your company must pay for them, provided they're required in your job.</p>
                                        <p>If you have any health problems you think may be caused by your VDU, contact your line manager. He/she has a duty to consult you on health and safety issues that affect you, and should welcome early reporting of any issue.</p>
                                    </div>

                                    <hr>

                                    <p>Read the text and answer <strong>Questions 20-27</strong>.</p>
                                    <div class="border p-4 mb-4">
                                        <p><strong>Job Opening</strong></p>
                                        <p><strong>1. The Vitamin Shoppe: 1,946 part-time openings.</strong><br>
                                        The Vitamin Shoppe is a New Jersey-based retailer of nutritional supplements. They also operate stores in Canada under the name "VitaPath". The company provides approximately 8,000 different SKU's of supplements through its retail stores and over 20,000 different SKU's of supplements through its online retail websites.</p>
                                        <p><strong>Employee Review:</strong> "Good growth opportunities and stores opening all over the US all year 'round. Company based out of NJ, so more progressive policies on employment and benefits. Good vacation, health, and dental benefits. Payment is above average. Good policies on customer service interaction as well. Focus on Customer service vs. pushing products."</p>
                                        
                                        <p><strong>2. Chipotle: 1,553 part-time openings.</strong><br>
                                        Chipotle is known for its use of organic meats throughout its more than 1,500 restaurants, which are located in 45 states. Since having been founded in 1993, the chain has since exploded and now counts some 37,000 employees. It is a pioneer in the "fast casual" dining movement.</p>
                                        <p><strong>Employee Review:</strong> "The people I work with are awesome and the food is good. It pays my bills and makes me laugh. The schedule is super flexible but it's a lot of work. If you're looking for something easy and laid back, keep looking."</p>

                                        <p><strong>3. Advantage Sales & Marketing: 1,742 part-time openings.</strong><br>
                                        Advantage Sales & Marketing provides outsourced sales, merchandising, and marketing services to consumer goods and food product manufacturers and suppliers. Owning more than 65 offices in the US and Canada, ASM does merchandising for 1,200 clients -- including Johnson & Johnson, Mars, Unilever, Energizer.</p>
                                        <p><strong>Employee Review:</strong> "Long lasting business, able to adapt to changes in the market. Well-thought-out schedule and flexible time off for both vacation and illness."</p>

                                        <p><strong>4. PSA Healthcare: 1,295 part-time openings.</strong><br>
                                        PSA Healthcare, also known as Pediatric Services of America, provides comprehensive home health services through a branch of office across the United States. The company is headquartered in Atlanta, Ga.</p>
                                        <p><strong>Employee Review:</strong> "I love working one-on-one with the pediatric patient and their families. You have the time needed to give a great compassionate care! Office staff and supervisors are very good with both employees and clients. There is a lot of flexibility with staffing. I never received grief for requesting a day off."</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Column 2 -->
                            <div class="col-md-6 question_site">
                                <h3><strong>Questions 15-19</strong></h3>
                                <p>Complete the sentences below.</p>
                                <p>Choose <strong>NO MORE THAN THREE WORDS</strong> from the text for each answer.</p>

                                <div class="mt-4">
                                    <div class="mb-3" style="line-height: 2;">
                                        <strong id="question-15-number">15.</strong> It is unusual to get a <input type="text" name="q15" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="q15" placeholder="15" value="{{ $answers[15] ?? '' }}"> as a result of using computers.
                                    </div>
                                    <div class="mb-3" style="line-height: 2;">
                                        <strong id="question-16-number">16.</strong> Employers may be required to provide you with items such as a <input type="text" name="q16" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="q16" placeholder="16" value="{{ $answers[16] ?? '' }}"> to use while at work.
                                    </div>
                                    <div class="mb-3" style="line-height: 2;">
                                        <strong id="question-17-number">17.</strong> If your job involves tasks such as <input type="text" name="q17" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="q17" placeholder="17" value="{{ $answers[17] ?? '' }}">, the advice from the HSE may not apply.
                                    </div>
                                    <div class="mb-3" style="line-height: 2;">
                                        <strong id="question-18-number">18.</strong> Financial assistance in the case of special requirements may be available from the <input type="text" name="q18" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="q18" placeholder="18" value="{{ $answers[18] ?? '' }}">.
                                    </div>
                                    <div class="mb-3" style="line-height: 2;">
                                        <strong id="question-19-number">19.</strong> Any concerns about the effect of using a VDU on your general well-being should be reported to <input type="text" name="q19" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="q19" placeholder="19" value="{{ $answers[19] ?? '' }}">.
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Questions 20-27</strong></h3>
                                    <p>Choose the correct letter, <strong>A, B, C</strong> or <strong>D</strong>.</p>
                                    

                                    <div class="mt-4">
                                        @php
                                            $mcqs = [
                                                20 => [
                                                    'q' => 'Which offer has the most part-time openings?',
                                                    'options' => [
                                                        'A' => 'Chipotle',
                                                        'B' => 'PSA Healthcare',
                                                        'C' => 'The Vitamin Shoppe',
                                                        'D' => 'Advantage Sales & Marketing'
                                                    ]
                                                ],
                                                21 => [
                                                    'q' => 'Which of these companies operate both in USA and Canada?',
                                                    'options' => [
                                                        'A' => 'The Vitamin Shoppe and Advantage Sales & Marketing',
                                                        'B' => 'PSA Healthcare and Advantage Sales & Marketing',
                                                        'C' => 'Chipotle and PSA Healthcare',
                                                        'D' => 'PSA Healthcare and The Vitamin Shoppe'
                                                    ]
                                                ],
                                                22 => [
                                                    'q' => 'Which company was founded in 1993?',
                                                    'options' => [
                                                        'A' => 'The Vitamin Shoppe',
                                                        'B' => 'Advantage Sales & Marketing',
                                                        'C' => 'PSA Healthcare',
                                                        'D' => 'Chipotle'
                                                    ]
                                                ],
                                                23 => [
                                                    'q' => 'The main office of which company is situated in Atlanta?',
                                                    'options' => [
                                                        'A' => 'The Vitamin Shoppe',
                                                        'B' => 'PSA Healthcare',
                                                        'C' => 'Chipotle',
                                                        'D' => 'Advantage Sales & Marketing'
                                                    ]
                                                ],
                                                24 => [
                                                    'q' => 'VitaPath is the other name of which company?',
                                                    'options' => [
                                                        'A' => 'PSA Healthcare',
                                                        'B' => 'Chipotle',
                                                        'C' => 'The Vitamin Shoppe',
                                                        'D' => 'Advantage Sales & Marketing'
                                                    ]
                                                ],
                                                25 => [
                                                    'q' => "Which review doesn't mention a comfortable timetable?",
                                                    'options' => [
                                                        'A' => 'Chipotle',
                                                        'B' => 'Advantage Sales & Marketing',
                                                        'C' => 'The Vitamin Shoppe',
                                                        'D' => 'PSA Healthcare'
                                                    ]
                                                ],
                                                26 => [
                                                    'q' => 'Which company is described as a long lasting business?',
                                                    'options' => [
                                                        'A' => 'PSA Healthcare',
                                                        'B' => 'Advantage Sales & Marketing',
                                                        'C' => 'Universal Protection Service',
                                                        'D' => 'Chipotle'
                                                    ]
                                                ],
                                                27 => [
                                                    'q' => 'Organic meat is used by what company?',
                                                    'options' => [
                                                        'A' => 'Chipotle',
                                                        'B' => 'The Vitamin Shoppe',
                                                        'C' => 'Advantage Sales & Marketing',
                                                        'D' => 'None of them'
                                                    ]
                                                ],
                                            ];
                                        @endphp

                                        <div class="mcq-block">
                                            @foreach($mcqs as $qNum => $data)
                                            <div class="mcq-item">
                                                <div class="mcq-head">
                                                    <div class="mcq-num">{{ $qNum }}</div>
                                                    <div class="mcq-q">{{ $data['q'] }}</div>
                                                </div>
                                                <div class="mcq-options">
                                                    @foreach($data['options'] as $val => $text)
                                                    <label>
                                                        <input type="radio" name="q{{ $qNum }}" value="{{ $val }}" {{ ($answers[$qNum] ?? '') === $val ? 'checked' : '' }}>
                                                        <span><strong>{{ $val }}</strong> &nbsp; {{ $text }}</span>
                                                    </label>
                                                    @endforeach
                                                </div>
                                            </div>
                                            @endforeach
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
            </div>
                <!-- question part 3 -->
            <div class=" container-fluid px-5">
                <div class="tab-content " id="part3" style="margin-bottom: 80px;">
                    <div class="question_part">
                        <h4>Part 3</h4>
                        <p>You should spend about <strong>20</strong> minutes on Questions 28-40 which are based on the text below.</p>
                    </div>
                    <div class="mt-4">

                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-md-6">
                                <div class="scroll-box" style="text-align:left;">
                                    <h4><strong>The end of the silver screen?</strong></h4>
                                    <p><em>Cinema technology has remained much the same for over a century, so when will it go digital? Kevin Hilton views the projections.</em></p>

                                    <input type="text" class="dnd-drop-input" data-question="q28" data-paragraph="A" placeholder="28" readonly="" style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;" autocomplete="off" data-original-placeholder="28" value="{{ $answers[28] ?? '' }}">
                                    <p><strong>A.</strong> Cinema is full of contradictions. It is high-tech and old-fashioned at the same time. Today's films are full of digital sound and computer-generated special effects. Yet they are still stored on celluloid film, the basis of which is more than 100 years old. They are also displayed with projectors and screens that seem to belong to our great-grandparents' generation.</p>

                                    <input type="text" class="dnd-drop-input" data-question="q29" data-paragraph="B" placeholder="29" readonly="" style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;" autocomplete="off" data-original-placeholder="29" value="{{ $answers[29] ?? '' }}">
                                    <p><strong>B.</strong> Now that we are in the second century of cinema, there are moves to bring the medium right up to date. This will involve revolutionising not just how films are made but also how they are distributed and presented. The aim is not only to produce and prepare films digitally but to be able to send them to movie theatres by digital, electronic means. High-resolution digital projectors would then show the film. Supporters say this will make considerable savings at all stages of this chain, particularly for distribution.</p>

                                    <input type="text" class="dnd-drop-input" data-question="q30" data-paragraph="C" placeholder="30" readonly="" style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;" autocomplete="off" data-original-placeholder="30" value="{{ $answers[30] ?? '' }}">
                                    <p><strong>C.</strong> With such a major technological revolution on the horizon, it seems strange that the industry is still not sure what to call itself. This may appear a minor point, but the choices, 'digital' cinema and 'electronic' cinema (e-cinema), suggest different approaches to, and aspects of, the business. Digital cinema refers to the physical capture of images; e-cinema covers the whole chain, from production through post-production (editing, addition of special effects and construction of soundtrack) to distribution and projection.</p>

                                    <input type="text" class="dnd-drop-input" data-question="q31" data-paragraph="D" placeholder="31" readonly="" style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;" autocomplete="off" data-original-placeholder="31" value="{{ $answers[31] ?? '' }}">
                                    <p><strong>D.</strong> And what about the effects of the new medium? The main selling point of digital cinema is the high resolution and sharpness of the final image. But those who support the old-fashioned approach to film point to the celluloid medium's quality of warmth. A recurring criticism of video is that it may be too good: uncomfortably real, rather like looking through an open window. In 1989, the director of the first full-length American digital high-definition movie admitted that the picture had a 'stark, strange reality to it'.</p>

                                    <input type="text" class="dnd-drop-input" data-question="q32" data-paragraph="E" placeholder="32" readonly="" style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;" autocomplete="off" data-original-placeholder="32" value="{{ $answers[32] ?? '' }}">
                                    <p><strong>E.</strong> Even the money-saving aspect of e-cinema is doubted. One expert says that existing cinemas will have to show the new material and not all of them will readily or rapidly furnish themselves with the right equipment. 'E-cinema is seen as a way of saving money because print costs a lot,' he says. Thus for that to work, cinemas have to be showing the films because cinemas are the engine that drives the film industry.'</p>

                                    <input type="text" class="dnd-drop-input" data-question="q33" data-paragraph="F" placeholder="33" readonly="" style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;" autocomplete="off" data-original-placeholder="33" value="{{ $answers[33] ?? '' }}">
                                    <p><strong>F.</strong> This view has prompted some pro-digital entrepreneurs to take a slightly different approach. HD Thames is looking at reinventing the existing cinema market, moving towards e-theatre, which would use digital video and projection to present plays, musicals and some sporting events to the public. This is not that different from the large-screen TV system that was set up in New York in 1930, and John Logie Baird's experiments with TV in the late 1920s and early 30s.</p>

                                </div>
                            </div>
                            <!-- Column 2 -->
                            <div class="col-md-6 question_site">
                                <h3><strong>Questions 28-33</strong></h3>
                                <p>The Reading Passage "The end of the silver screen?" has six paragraphs <strong>A–F</strong>.</p>
                                <p>Choose the correct heading for each paragraph from the list of headings below.</p>
                                

                                <div class="mb-4">
                                    <h5><strong>List of Headings</strong></h5>
                                    <div class="dnd-heading" data-value="i"> Indecision about a name</div>
                                    <div class="dnd-heading" data-value="ii"> Current problems with distribution</div>
                                    <div class="dnd-heading" data-value="iii"> Uncertainty about financial advantages</div>
                                    <div class="dnd-heading" data-value="iv"> The contrasts of cinema today</div>
                                    <div class="dnd-heading" data-value="v"> The history of cinema</div>
                                    <div class="dnd-heading" data-value="vi"> Integrating other events into cinema</div>
                                    <div class="dnd-heading" data-value="vii"> The plans for the future of films</div>
                                    <div class="dnd-heading" data-value="viii"> An unexpected advantage</div>
                                    <div class="dnd-heading" data-value="ix"> Too true to life?</div>
                                </div>

                                <div class="mb-4">
                                    <div style="display:none;">
                                        <input type="hidden" name="q28" id="28" value="{{ $answers[28] ?? '' }}">
                                        <input type="hidden" name="q29" id="29" value="{{ $answers[29] ?? '' }}">
                                        <input type="hidden" name="q30" id="30" value="{{ $answers[30] ?? '' }}">
                                        <input type="hidden" name="q31" id="31" value="{{ $answers[31] ?? '' }}">
                                        <input type="hidden" name="q32" id="32" value="{{ $answers[32] ?? '' }}">
                                        <input type="hidden" name="q33" id="33" value="{{ $answers[33] ?? '' }}">
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Questions 34-38</strong></h3>
                                    <p>Complete the summary below.</p>
                                    <p>Choose <strong>NO MORE THAN THREE WORDS</strong> for each answer.</p>
                                    

                                    <div class="mt-4 border p-3" style="line-height: 2;">
                                        There are big changes ahead for cinema if digital production takes place and the industry no longer uses 
                                        <strong id="question-34-number">34</strong> <input type="text" name="q34" style=" padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px;" id="q34" placeholder="34" value="{{ $answers[34] ?? '' }}"> 
                                        and gets rid of the old-fashioned 
                                        <strong id="question-35-number">35</strong> <input type="text" name="q35" style=" padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px;" id="q35" placeholder="35" value="{{ $answers[35] ?? '' }}"> 
                                        and used to show movies. The main advantage is likely to be that the final image will be clearer. However, some people argue that the digital picture will lack 
                                        <strong id="question-36-number">36</strong> <input type="text" name="q36" style=" padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px;" id="q36" placeholder="36" value="{{ $answers[36] ?? '' }}"> 
                                        In addition, digital production will only reduce costs if cinemas are willing to buy new 
                                        <strong id="question-37-number">37</strong> <input type="text" name="q37" style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px;" id="q37" placeholder="37" value="{{ $answers[37] ?? '' }}"> 
                                        As a result, experiments with what is called 
                                        <strong id="question-38-number">38</strong> '<input type="text" name="q38" style= "padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px;" id="q38" placeholder="38" value="{{ $answers[38] ?? '' }}">' may mark a change in the whole entertainment industry.
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Questions 39 and 40</strong></h3>
                                    <p>Choose the correct letter, <strong>A, B, C</strong> or <strong>D</strong>.</p>
                                    

                                    <div class="mt-4">
                                        <div class="mcq-block">
                                            <div class="mcq-item">
                                                <div class="mcq-head">
                                                    <div class="mcq-num">39</div>
                                                    <div class="mcq-q">What does e-cinema concept cover?</div>
                                                </div>
                                                <div class="mcq-options">
                                                    <label><input type="radio" name="q39" value="A" {{ ($answers[39] ?? '') === 'A' ? 'checked' : '' }}> <span><strong>A</strong> &nbsp; physical capture of images</span></label>
                                                    <label><input type="radio" name="q39" value="B" {{ ($answers[39] ?? '') === 'B' ? 'checked' : '' }}> <span><strong>B</strong> &nbsp; displaying cinemas with projectors</span></label>
                                                    <label><input type="radio" name="q39" value="C" {{ ($answers[39] ?? '') === 'C' ? 'checked' : '' }}> <span><strong>C</strong> &nbsp; from production to distribution and projection</span></label>
                                                    <label><input type="radio" name="q39" value="D" {{ ($answers[39] ?? '') === 'D' ? 'checked' : '' }}> <span><strong>D</strong> &nbsp; distributing cinemas electronically</span></label>
                                                </div>
                                            </div>

                                            <div class="mcq-item">
                                                <div class="mcq-head">
                                                    <div class="mcq-num">40</div>
                                                    <div class="mcq-q">the e-theatre concept would involve -</div>
                                                </div>
                                                <div class="mcq-options">
                                                    <label><input type="radio" name="q40" value="A" {{ ($answers[40] ?? '') === 'A' ? 'checked' : '' }}> <span><strong>A</strong> &nbsp; broadcasting live sporting events</span></label>
                                                    <label><input type="radio" name="q40" value="B" {{ ($answers[40] ?? '') === 'B' ? 'checked' : '' }}> <span><strong>B</strong> &nbsp; up to date theatrical performance</span></label>
                                                    <label><input type="radio" name="q40" value="C" {{ ($answers[40] ?? '') === 'C' ? 'checked' : '' }}> <span><strong>C</strong> &nbsp; digital capture of image</span></label>
                                                    <label><input type="radio" name="q40" value="D" {{ ($answers[40] ?? '') === 'D' ? 'checked' : '' }}> <span><strong>D</strong> &nbsp; the use digital video and projection</span></label>
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
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // --- UI Elements ---
            const tabs = document.querySelectorAll('.tab');
            const tabContents = document.querySelectorAll('.tab-content');
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');
            const noteToggle = document.getElementById('noteToggle');
            const closeBtn = sidebar?.querySelector('.close-btn');

            // --- Tab Navigation ---
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
                    const activeContent = document.getElementById(tabId);
                    if (activeContent) activeContent.classList.add('active');

                    const qLinks = tab.querySelector('.question-links');
                    const qPlaceholder = tab.querySelector('.question-placeholder');
                    if (qLinks) qLinks.style.display = 'flex';
                    if (qPlaceholder) qPlaceholder.style.display = 'none';
                });
            });

            // --- Sidebar Toggle ---
            if (noteToggle && sidebar && mainContent) {
                noteToggle.addEventListener('click', () => {
                    sidebar.classList.add('open');
                    mainContent.classList.add('shifted');
                });
            }

            if (closeBtn && sidebar && mainContent) {
                closeBtn.addEventListener('click', () => {
                    sidebar.classList.remove('open');
                    mainContent.classList.remove('shifted');
                });
            }

            // --- Question Tracking & Scrolling ---
            const allLinks = Array.from(document.querySelectorAll('.question-link'));
            let currentIndex = 0;

            function getScrollContainer(el) {
                if (!el) return null;
                const scrollBox = el.closest('.scroll-box');
                if (scrollBox) return scrollBox;
                let node = el.parentElement;
                while (node) {
                    const style = window.getComputedStyle(node);
                    if ((style.overflowY === 'auto' || style.overflowY === 'scroll') && node.scrollHeight > node.clientHeight) {
                        return node;
                    }
                    node = node.parentElement;
                }
                return null;
            }

            function scrollToVisibleTop(target) {
                if (!target) return;
                const container = getScrollContainer(target);
                const secondCol = target.closest('.question_site');
                const scrollBox = target.closest('.scroll-box');
                
                const targetContainer = scrollBox || secondCol;
                const topOffset = 20;

                if (targetContainer) {
                    const tRect = target.getBoundingClientRect();
                    const cRect = targetContainer.getBoundingClientRect();
                    const delta = (tRect.top - cRect.top);
                    targetContainer.scrollTo({ top: Math.max(0, targetContainer.scrollTop + delta - topOffset), behavior: 'smooth' });
                } else {
                    target.style.scrollMarginTop = '120px';
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }

            function highlightLinkAndNumber(qNum) {
                allLinks.forEach(link => link.classList.toggle('active', link.getAttribute('data-question') === qNum));
                document.querySelectorAll('[id^="question-"][id$="-number"]').forEach(num => num.classList.remove('active'));
                const numberBox = document.getElementById(`question-${qNum}-number`);
                if (numberBox) numberBox.classList.add('active');
            }

            function activateTabForQuestion(qNum) {
                const target = document.getElementById(`question-${qNum}-number`) || document.getElementById(qNum) || document.getElementById(`q${qNum}_heading`);
                const partContent = target?.closest('.tab-content');
                if (!partContent) return;

                tabContents.forEach(tc => tc.classList.toggle('active', tc === partContent));
                tabs.forEach(tab => {
                    const isActive = tab.getAttribute('data-tab') === partContent.id;
                    tab.classList.toggle('active', isActive);
                    const qLinks = tab.querySelector('.question-links');
                    const qPlaceholder = tab.querySelector('.question-placeholder');
                    if (qLinks) qLinks.style.display = isActive ? 'flex' : 'none';
                    if (qPlaceholder) qPlaceholder.style.display = isActive ? 'none' : 'block';
                });
            }

            function setActiveQuestion(index) {
                if (index < 0 || index >= allLinks.length) return;
                currentIndex = index;
                const qNum = allLinks[index].getAttribute('data-question');

                highlightLinkAndNumber(qNum);
                activateTabForQuestion(qNum);

                const scrollTarget = document.getElementById(`question-${qNum}-number`) || document.getElementById(qNum);
                if (scrollTarget) {
                    // Open accordion or tfng-item if needed
                    const accordionBtn = scrollTarget.closest('.accordion-button');
                    if (accordionBtn && accordionBtn.classList.contains('collapsed')) {
                        accordionBtn.click();
                    }
                    const tfngHead = scrollTarget.closest('.tfng-head');
                    if (tfngHead) {
                        const item = tfngHead.closest('.tfng-item');
                        if (item && !item.classList.contains('open')) {
                            const block = item.closest('.tfng-block');
                            block?.querySelectorAll('.tfng-item').forEach(it => it.classList.remove('open'));
                            item.classList.add('open');
                        }
                    }
                    const mcqHead = scrollTarget.closest('.mcq-head');
                    if (mcqHead) {
                        const item = mcqHead.closest('.mcq-item');
                        if (item && !item.classList.contains('open')) {
                            const block = item.closest('.mcq-block');
                            block?.querySelectorAll('.mcq-item').forEach(it => it.classList.remove('open'));
                            item.classList.add('open');
                        }
                    }
                    // Auto-scroll after potentially opening accordion
                    setTimeout(() => scrollToVisibleTop(scrollTarget), 300);
                }

                const inputField = document.getElementById(qNum);
                if (inputField && inputField.tagName === 'INPUT' && inputField.type === 'text' && inputField.style.display !== 'none') {
                    setTimeout(() => inputField.focus(), 400);
                }
            }

            allLinks.forEach((link, idx) => {
                link.addEventListener('click', e => { e.preventDefault(); setActiveQuestion(idx); });
            });

            document.getElementById('prev-question')?.addEventListener('click', () => setActiveQuestion(currentIndex - 1));
            document.getElementById('next-question')?.addEventListener('click', () => setActiveQuestion(currentIndex + 1));

            // --- Autosave Logic ---
            const testForm = document.getElementById('testForm');
            const dirtyInputs = new Map();
            let autosaveDebounceTimer = null;

            function autosaveInput(input) {
                const formData = new FormData();
                formData.append('student_id', document.querySelector('input[name="student_id"]')?.value || '');
                formData.append('test_name', document.querySelector('input[name="test_name"]')?.value || '');
                const assignmentIdField = document.querySelector('input[name="assignment_id"]');
                if (assignmentIdField?.value) formData.append('assignment_id', assignmentIdField.value);

                if (input.type === 'checkbox') {
                    const groupName = input.name;
                    const selectedValues = Array.from(document.querySelectorAll(`input[name="${groupName}"]:checked`)).map(cb => cb.value);
                    formData.append('question_number', groupName.replace('q', '').replace('[]', ''));
                    formData.append('answer', selectedValues.join(','));
                } else if (input.type === 'radio') {
                    const groupName = input.name;
                    const checked = document.querySelector(`input[name="${groupName}"]:checked`);
                    formData.append('question_number', groupName.replace('q', ''));
                    formData.append('answer', checked ? checked.value : '');
                } else {
                    formData.append('question_number', input.name.replace('q', ''));
                    formData.append('answer', input.value);
                }

                fetch('{{ route('reading.autosave') }}', {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    body: formData
                }).then(res => res.ok && console.log(`✅ Autosaved: ${input.name}`))
                  .catch(err => console.error('❌ Autosave failed', err));
            }

            function flushDirtyInputs() {
                dirtyInputs.forEach(input => autosaveInput(input));
                dirtyInputs.clear();
            }

            function markDirty(input) {
                if (!input.name) return;
                dirtyInputs.set(input.name, input);
                if (autosaveDebounceTimer) clearTimeout(autosaveDebounceTimer);
                autosaveDebounceTimer = setTimeout(flushDirtyInputs, 5000);
            }

            document.querySelectorAll('input').forEach(input => {
                input.addEventListener('change', () => markDirty(input));
                if (input.type === 'text') input.addEventListener('input', () => markDirty(input));
                
                input.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                    }
                });

                input.addEventListener('focus', function() {
                    if (this.placeholder) {
                        this.dataset.placeholder = this.placeholder;
                        this.placeholder = '';
                    }
                    let qNum = this.id || this.name.replace('q', '').replace('[]', '').replace('_radio','');
                    if (qNum.startsWith('q')) qNum = qNum.substring(1);
                    const idx = allLinks.findIndex(l => l.getAttribute('data-question') === qNum);
                    if (idx !== -1) {
                        currentIndex = idx;
                        highlightLinkAndNumber(qNum);
                    }
                });

                input.addEventListener('blur', function() {
                    if (this.dataset.placeholder) {
                        this.placeholder = this.dataset.placeholder;
                    }
                });
            });

            // --- MCQ/TFNG Sync ---
            document.querySelectorAll('.mcq-sync').forEach(radio => {
                radio.addEventListener('change', function() {
                    let targetId = this.getAttribute('data-target');
                    if (targetId.startsWith('q')) targetId = targetId.substring(1); 
                    const targetInput = document.getElementById(targetId);
                    if (targetInput) {
                        targetInput.value = this.value;
                        markDirty(targetInput);
                    }
                });
            });

            // --- Grid Logic ---
            function setGridAnswer(qNum, value) {
                const hidden = document.getElementById(String(qNum));
                if (hidden) {
                    hidden.value = value;
                    markDirty(hidden);
                }
                const rowCells = document.querySelectorAll(`.tick-cell[data-row="${qNum}"]`);
                rowCells.forEach(c => c.classList.remove('selected'));
                const cell = document.querySelector(`.tick-cell[data-row="${qNum}"][data-value="${CSS.escape(value)}"]`);
                if (cell) cell.classList.add('selected');
            }

            document.querySelectorAll('.tick-cell').forEach(cell => {
                cell.addEventListener('click', () => {
                    const row = cell.getAttribute('data-row');
                    const val = cell.getAttribute('data-value');
                    setGridAnswer(row, val);
                    const idx = allLinks.findIndex(l => l.getAttribute('data-question') === row);
                    if (idx !== -1) {
                        currentIndex = idx;
                        highlightLinkAndNumber(row);
                    }
                });
            });

            // --- Accordion / Items Open ---
            document.querySelectorAll('.tfng-head, .mcq-head').forEach(head => {
                head.addEventListener('click', () => {
                    const item = head.closest('.tfng-item, .mcq-item');
                    if (!item) return;
                    const block = head.closest('.tfng-block, .mcq-block');
                    const isOpen = item.classList.contains('open');
                    block?.querySelectorAll('.tfng-item, .mcq-item').forEach(it => it.classList.remove('open'));
                    if (!isOpen) {
                        item.classList.add('open');
                        // Auto-scroll to the opened item
                        setTimeout(() => {
                            scrollToVisibleTop(item);
                        }, 300);
                    }
                    
                    const qNum = head.querySelector('.tfng-num, .mcq-num')?.textContent;
                    if (qNum) {
                        const idx = allLinks.findIndex(l => l.getAttribute('data-question') === qNum.trim());
                        if (idx !== -1) {
                            currentIndex = idx;
                            highlightLinkAndNumber(qNum.trim());
                        }
                    }
                });
            });

            // --- Timer Logic ---
            const timerEl = document.getElementById('timer');
            if (timerEl) {
                let timeLeft = 60 * 60;
                const updateTimer = () => {
                    const mins = Math.floor(timeLeft / 60);
                    const secs = timeLeft % 60;
                    timerEl.textContent = `${mins} : ${secs < 10 ? '0' : ''}${secs} minutes remaining`;
                    if (timeLeft > 0) timeLeft--;
                    else {
                        clearInterval(timerInterval);
                        testForm?.submit();
                    }
                };
                const timerInterval = setInterval(updateTimer, 1000);
                updateTimer();
            }



            // --- Finish Test ---
            document.getElementById('finishButton')?.addEventListener('click', (e) => {
                e.preventDefault();
                const modal = new bootstrap.Modal(document.getElementById('finishModal'));
                modal.show();
            });

            document.getElementById('continueButton')?.addEventListener('click', () => {
                flushDirtyInputs();
                testForm?.submit();
            });

            // --- Start Modal ---
            const startModalEl = document.getElementById('startModal');
            if (startModalEl) {
                const modal = new bootstrap.Modal(startModalEl);
                modal.show();
                
                document.getElementById('startTestButton')?.addEventListener('click', () => {
                    const sId = document.getElementById('studentIdInput')?.value;
                    if (sId && sId.length >= 8) {
                        modal.hide();
                        document.documentElement.requestFullscreen?.().catch(() => {});
                    } else {
                        const err = document.getElementById('studentIdError');
                        if (err) err.style.display = 'block';
                    }
                });
            }

            // --- Populate Answers ---
            const initialAnswers = @json($answers ?? []);
            Object.keys(initialAnswers).forEach(qNum => {
                const val = initialAnswers[qNum];
                if (!val) return;
                
                const input = document.getElementById(qNum) || document.querySelector(`[name="q${qNum}"]`);
                if (input) {
                    if (input.type === 'text') input.value = val;
                    if (input.type === 'radio' && input.value === val) input.checked = true;
                    if (input.type === 'hidden') {
                        // Grid or sync radio
                        const cell = document.querySelector(`.tick-cell[data-row="${qNum}"][data-value="${CSS.escape(val)}"]`);
                        if (cell) cell.classList.add('selected');
                        
                        const syncRadio = document.querySelector(`.mcq-sync[data-target="${qNum}"][value="${CSS.escape(val)}"]`) || document.querySelector(`.mcq-sync[data-target="q${qNum}"][value="${CSS.escape(val)}"]`);
                        if (syncRadio) syncRadio.checked = true;
                    }
                }
                const radio = document.querySelector(`input[name="q${qNum}"][value="${CSS.escape(val)}"]`);
                if (radio) radio.checked = true;
            });

            // --- Drag and Drop Logic for Questions 28-33 ---
            let dndDraggedEl = null;
            let dndGhost = null;
            let dndSourceInput = null;

            // Remove native draggable from headings
            document.querySelectorAll('.dnd-heading').forEach(function(el) {
                el.setAttribute('draggable', 'false');
            });

            // Helper: measure text width for input
            function measureTextWidth(text, font) {
                const span = document.createElement('span');
                span.style.cssText = 'position:absolute; top:-9999px; left:-9999px; white-space:nowrap; font:' + font + ';';
                span.textContent = text;
                document.body.appendChild(span);
                const w = span.offsetWidth;
                document.body.removeChild(span);
                return w;
            }

            function dndPlaceHeading(dropInput, headingEl) {
                const val = headingEl.getAttribute('data-value');
                const qName = dropInput.getAttribute('data-question');
                const allInputs = document.querySelectorAll(`.dnd-drop-input[data-question="${qName}"]`);

                // If input already has a value, restore the old heading back to list
                const oldVal = dropInput.getAttribute('data-placed-value');
                if (oldVal) {
                    const oldH = document.querySelector('.dnd-heading[data-value="' + oldVal + '"]');
                    if (oldH) {
                        oldH.classList.remove('used');
                    }
                }

                // Set value in all related visible drop inputs
                allInputs.forEach(inp => {
                    inp.value = headingEl.textContent.trim();
                    inp.setAttribute('data-placed-value', val);
                    inp.style.borderColor = 'black';
                    inp.style.background = '#fff';
                    
                    // Dynamic width calculation
                    const font = window.getComputedStyle(inp).font;
                    const textWidth = measureTextWidth(inp.value, font);
                    inp.style.width = (textWidth + 30) + 'px'; 
                    inp.style.boxShadow = '0 4px 6px -1px rgba(0, 0, 0, 0.1)';
                });

                // Hide heading from list
                headingEl.classList.add('used');

                // Sync hidden input
                const qNum = String(qName || '').replace(/^q/i, '');
                const hidden = document.getElementById(qNum);
                if (hidden) {
                    hidden.value = val;
                    markDirty(hidden);
                }
            }

            // Clear drop input on double-click
            document.querySelectorAll('.dnd-drop-input').forEach(function(dropInput) {
                dropInput.addEventListener('dblclick', function() {
                    const oldVal = dropInput.getAttribute('data-placed-value');
                    const qName = dropInput.getAttribute('data-question');
                    const allInputs = document.querySelectorAll(`.dnd-drop-input[data-question="${qName}"]`);

                    if (oldVal) {
                        const h = document.querySelector('.dnd-heading[data-value="' + oldVal + '"]');
                        if (h) {
                            h.classList.remove('used');
                        }
                    }

                    allInputs.forEach(inp => {
                        inp.value = '';
                        inp.removeAttribute('data-placed-value');
                        inp.style.border = '1px solid #e2e8f0';
                        inp.style.background = '#fff';
                        inp.style.width = '100%';
                        inp.style.boxShadow = 'none';
                    });

                    const qNum = String(qName || '').replace(/^q/i, '');
                    const hidden = document.getElementById(qNum);
                    if (hidden) {
                        hidden.value = '';
                        markDirty(hidden);
                    }
                });
            });

            // Start drag from heading list
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
                    const placedVal = inp.getAttribute('data-placed-value');
                    if (!placedVal) return;
                    e.preventDefault();

                    const heading = document.querySelector('.dnd-heading[data-value="' + placedVal + '"]');
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
                    const rect = inp.getBoundingClientRect();
                    const isOver = (e.clientX >= rect.left && e.clientX <= rect.right && e.clientY >= rect.top && e.clientY <= rect.bottom);
                    
                    if (inp.getAttribute('data-placed-value')) {
                         inp.style.borderColor = 'black';
                    } else if (isOver) {
                         inp.style.borderColor = '#e2e8f0'; 
                    } else {
                        inp.style.borderColor = '#e2e8f0';
                    }
                });
            });

            document.addEventListener('mouseup', function(e) {
                if (!dndDraggedEl || !dndGhost) return;

                if (dndGhost.parentNode) dndGhost.parentNode.removeChild(dndGhost);
                dndGhost = null;

                let droppedOnInput = false;
                document.querySelectorAll('.dnd-drop-input').forEach(function(inp) {
                    const rect = inp.getBoundingClientRect();
                    if (e.clientX >= rect.left && e.clientX <= rect.right && e.clientY >= rect.top && e.clientY <= rect.bottom) {
                        if (dndSourceInput && dndSourceInput !== inp) {
                            dndSourceInput.value = '';
                            dndSourceInput.removeAttribute('data-placed-value');
                            dndSourceInput.style.border = '1px solid #e2e8f0';
                            dndSourceInput.style.background = '#fff';
                            dndSourceInput.style.width = '200px';
                            dndSourceInput.style.boxShadow = 'none';

                            const srcQ = dndSourceInput.getAttribute('data-question');
                            const srcNum = String(srcQ || '').replace(/^q/i, '');
                            const srcHidden = document.getElementById(srcNum);
                            if (srcHidden) {
                                srcHidden.value = '';
                                markDirty(srcHidden);
                            }
                        } else if (dndSourceInput && dndSourceInput === inp) {
                            dndDraggedEl.classList.remove('dragging');
                            dndDraggedEl = null;
                            dndSourceInput = null;
                            return;
                        }
                        dndDraggedEl.classList.remove('used');
                        dndPlaceHeading(inp, dndDraggedEl);
                        droppedOnInput = true;
                    }
                });

                if (!droppedOnInput && dndSourceInput) {
                    dndDraggedEl.classList.remove('used');
                    dndSourceInput.value = '';
                    dndSourceInput.removeAttribute('data-placed-value');
                    dndSourceInput.style.border = '1px solid #e2e8f0';
                    dndSourceInput.style.background = '#fff';
                    dndSourceInput.style.width = '200px';
                    dndSourceInput.style.boxShadow = 'none';

                    const srcQ = dndSourceInput.getAttribute('data-question');
                    const srcNum = String(srcQ || '').replace(/^q/i, '');
                    const srcHidden = document.getElementById(srcNum);
                    if (srcHidden) {
                        srcHidden.value = '';
                        markDirty(srcHidden);
                    }
                }

                if (dndDraggedEl) dndDraggedEl.classList.remove('dragging');
                dndDraggedEl = null;
                dndSourceInput = null;
            });

            // Restore DND values
            [28, 29, 30, 31, 32, 33].forEach(function(qNum) {
                const hidden = document.getElementById(String(qNum));
                if (!hidden || !hidden.value) return;
                const savedVal = hidden.value.trim();
                const heading = document.querySelector('.dnd-heading[data-value="' + savedVal + '"]');
                const allInputs = document.querySelectorAll(`.dnd-drop-input[data-question="q${qNum}"]`);
                if (heading && allInputs.length > 0) {
                    heading.classList.add('used');
                    allInputs.forEach(inp => {
                        inp.value = heading.textContent.trim();
                        inp.setAttribute('data-placed-value', savedVal);
                        inp.style.borderColor = 'black';
                        inp.style.background = '#fff';
                        
                        const font = window.getComputedStyle(inp).font;
                        const textWidth = measureTextWidth(inp.value, font);
                        inp.style.width = (textWidth + 30) + 'px';
                    });
                }
            });

            setActiveQuestion(0);
        });
    </script>

    <!-- highlight and note script  -->
    <script>
        const contextMenu = document.getElementById('customContextMenu');
        const highlightOption = document.getElementById('highlightOption');
        const notesOption = document.getElementById('notesOption');
        const clearOption = document.getElementById('clearOption');
        const allClearOption = document.getElementById('allClear');
        let selectionRange = null;
        let activePopup = null;

        let clickedMark = null;
        
        document.addEventListener('contextmenu', function(e) {
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
                const rawRange = sel.getRangeAt(0).cloneRange();
                
                // If containers are already text nodes, use them directly for maximum precision.
                if (rawRange.startContainer.nodeType === Node.TEXT_NODE && rawRange.endContainer.nodeType === Node.TEXT_NODE) {
                    selectionRange = rawRange;
                } else {
                    const newRange = document.createRange();
                    const ancestor = rawRange.commonAncestorContainer;
                    
                    const treeWalker = document.createTreeWalker(
                        ancestor.nodeType === Node.TEXT_NODE ? ancestor.parentNode : ancestor,
                        NodeFilter.SHOW_TEXT,
                        null,
                        false
                    );
                    
                    let firstNode = null, lastNode = null;
                    let tn;
                    while (tn = treeWalker.nextNode()) {
                        if (rawRange.intersectsNode(tn)) {
                            if (!firstNode) firstNode = tn;
                            lastNode = tn;
                        }
                    }
                    
                    if (firstNode && lastNode) {
                        // Crucially: only use 0/length if we are currently at an element boundary.
                        // If it happens that one side is a text node but the other isn't, handle naturally.
                        const startN = (rawRange.startContainer.nodeType === Node.TEXT_NODE) ? rawRange.startContainer : firstNode;
                        const startO = (rawRange.startContainer.nodeType === Node.TEXT_NODE) ? rawRange.startOffset : 0;
                        const endN = (rawRange.endContainer.nodeType === Node.TEXT_NODE) ? rawRange.endContainer : lastNode;
                        const endO = (rawRange.endContainer.nodeType === Node.TEXT_NODE) ? rawRange.endOffset : lastNode.textContent.length;
                        
                        try {
                            newRange.setStart(startN, startO);
                            newRange.setEnd(endN, endO);
                            selectionRange = newRange;
                        } catch (e) {
                            selectionRange = rawRange;
                        }
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


        function highlightRange(range, markInitializer) {
            const marks = [];
            if (!range) return marks;

            const startContainer = range.startContainer;
            const endContainer = range.endContainer;
            const startOffset = range.startOffset;
            const endOffset = range.endOffset;


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

            const textNodes = [];
            const walker = document.createTreeWalker(
                range.commonAncestorContainer,
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

        highlightOption.addEventListener('click', function() {
            if (selectionRange) {
                highlightRange(selectionRange);
                selectionRange = null;
                clickedMark = null;
            }
            contextMenu.style.display = 'none';
        });

        notesOption.addEventListener('click', function() {
            if (clickedMark) {
                showNotePopup(clickedMark);
                selectionRange = null;
                clickedMark = null;
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
                    const fullHeader = marks.map(m => m.innerText).join(' ').replace(/\s+/g, ' ').trim();
                    
                    marks.forEach((mk) => {
                        mk.dataset.header = fullHeader; 
                        mk.addEventListener('click', function(e) {
                            e.stopPropagation();
                            showNotePopup(mk);
                        });
                    });

                    const sidebar = document.getElementById('sidebar');
                    const noteDiv = document.createElement('div');
                    noteDiv.classList.add('sidebar-note-item');
                    noteDiv.dataset.markId = markId;
                    noteDiv.style.borderBottom = '1px solid #ccc';
                    noteDiv.style.padding = '10px';
                    noteDiv.innerHTML = `
                        <div class="sidebar-header" style="cursor: pointer; font-weight: normal; padding: 5px 0; word-wrap: break-word;">${fullHeader}</div>
                        <div class="sidebar-note-content" style="font-size: 12px; color: #666; white-space: pre-wrap;"></div>
                    `;
                    
                    sidebar.appendChild(noteDiv);

                    noteDiv.addEventListener('click', () => {
                        showNotePopup(marks[0]);
                    });

                    // Small delay to ensure highlight DOM is ready before showing popup
                    setTimeout(() => {
                        showNotePopup(marks[0]);
                    }, 50);
                }
            }
            contextMenu.style.display = 'none';
            selectionRange = null;
            clickedMark = null;
        });

        clearOption.addEventListener('click', function() {
            if (clickedMark) {
                const markId = clickedMark.dataset.markId;
                
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

        document.addEventListener('click', function(e) {
            if (!contextMenu.contains(e.target)) {
                contextMenu.style.display = 'none';
            }
        });

        function showNotePopup(mark) {
            if (activePopup) {
                activePopup.remove();
                document.removeEventListener('click', handleOutsideClick);
            }

            const markId = mark.dataset.markId;
            const notePopup = document.createElement('div');
            notePopup.classList.add('note-popup');
            notePopup.innerHTML = `
                <div class="drag-handle" style="background: #ddd; padding: 8px; cursor: move; border-bottom: 1px solid #ccc; display: flex; justify-content: space-between; align-items: center; user-select: none;">
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
    </script>
</body>
</html>
