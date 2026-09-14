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

        /* Drag and Drop Styling */
        #dnd-headings-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .dnd-heading {
            padding: 8px 14px;
            background: #fff;
            border: 1px solid #ddd;
            color: #2b2b2b;
            cursor: grab;
            border-radius: 4px;
            font-size: 14px;
            user-select: none;
            width: fit-content;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .dnd-heading:hover {
            border-color: #2b2b2b;
        }

        .dnd-heading.dragging {
            opacity: 0.5;
        }

        .dnd-heading.used {
            display: none;
        }

        .dnd-drop-input {
            background: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 5px 12px;
            width: 200px;
            font-size: 14px;
            min-height: 38px;
            cursor: pointer;
            text-align: left;
            display: block;
            margin-bottom: 8px;
            color: #475569;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
            vertical-align: middle;
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
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            font-size: 14px;
            opacity: 0.98;
            color: #2b2b2b;
            font-weight: 500;
        }

        /* Matching Grid Styling */
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
            width: 56px;
        }

        .matching-grid .tick-cell {
            cursor: pointer;
            user-select: text;
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
    </style>
</head>

<body>
    <form action="{{ route('reading.submit') }}" method="POST" id="testForm" spellcheck="false" autocomplete="off">
        @csrf

        {{-- hidden input --}}
        <input type="hidden" name="test_name" value="{{ $testName ?? 'class21_reading' }}">
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
                                    <span class="material-icons-outlined">schedule</span><strong id="timer">60 : 00
                                        minutes remaining</strong></a>
                            </li>

                        </ul>
                        <!-- Aligning the Finish button and note icon to the right -->
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item me-3">
                                <button class="btn btn-outline-dark" id="finishButton" type="button">Finish
                                    test</button>
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
            <div class=" container-fluid px-5">
                <div class="tab-content active" id="part1" style="margin-bottom: 80px;">
                    <div class="question_part">
                        <h4>Part 1</h4>
                        <p><strong>Read the text below and answers to the questions 1-13 on your answer sheet.</strong>
                        </p>
                    </div>
                    <div class="mt-4">


                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-md-6">
                                <div class="scroll-box" style="text-align:left;">
                                    <h4 class="text-center"><strong>Camberwell College Swimming Pools</strong></h4>
                                    <p>Camberwell College has one 50m (Olympic sized) pool with a constant depth of 2m
                                        throughout, and one 25m pool with a 1m shallow end and a 4m deep end. Both pools
                                        may be used by the general public at certain times.</p>

                                    <p><strong>50m Pool</strong><br>
                                        The pool is often used for classes, but the general public may use two lanes for
                                        lane swimming at the following times.</p>

                                    <table class="table table-borderless table-sm">
                                        <tr>
                                            <td>Monday:</td>
                                            <td>0630 - 1130 and 1900 - 2100</td>
                                        </tr>
                                        <tr>
                                            <td>Tuesday:</td>
                                            <td>0630 - 1130 and 1800 - 2100</td>
                                        </tr>
                                        <tr>
                                            <td>Wednesday:</td>
                                            <td>0630 - 1330 and 1730 - 2130</td>
                                        </tr>
                                        <tr>
                                            <td>Thursday:</td>
                                            <td>0630 - 1330</td>
                                        </tr>
                                        <tr>
                                            <td>Friday:</td>
                                            <td>0630 - 1330</td>
                                        </tr>
                                        <tr>
                                            <td>Weekends:</td>
                                            <td>0900 - 1700</td>
                                        </tr>
                                    </table>

                                    <p>Children under the age of 14 must be accompanied by an adult.</p>
                                    <p>Please note that during College holidays, these times will vary. Contact the
                                        swimming pool on 04837 393560 for up-to-date information.</p>

                                    <p><strong>25m Pool</strong><br>
                                        The 25 metre pool is available for recreational (non-lane) swimming from
                                        0700-0900 and 1230-1330 on weekdays, and 1000 – 1600 on Saturdays.</p>

                                    <p>Children aged 12 and under must be accompanied.</p>
                                    <p>We regret that the 25m pool will be closed for refurbishment between 21st July
                                        and 18th August. The men’s changing rooms will be closed for the week beginning
                                        18th August, and the women’s changing rooms will be closed the following week.
                                        Alternative changing facilities will be made available. We apologise for any
                                        disruption this may cause.</p>

                                    <br>
                                    <hr><br>

                                    <h4 class="text-center"><strong>Camberwell College Swimming Classes</strong></h4>
                                    <p>It’s an essential life skill, it can make you fit and it provides fun for all the
                                        family. Camberwell College’s offers swimming classes whatever for your needs,
                                        whether you want to swim competitively, you are trying to stay healthy or you
                                        want to learn.</p>
                                    <p>We offer separate classes for adults and children, following the National Plan
                                        for Teaching Swimming (NPTS). We will guide you from your first splash and help
                                        you develop your confidence in the water.</p>

                                    <p><strong>Swim-A-Long</strong><br>
                                        This class is suitable for parents with children aged up to the age of 5 years.
                                        This class allows very young children to gain confidence in the water, by way of
                                        songs and music.</p>

                                    <p><strong>Tadpole to Frog Classes</strong><br>
                                        This series of classes is suitable for children aged 5 upwards. There are six
                                        levels in the series. The first level is suitable for non-swimmers and teaches
                                        basic techniques and safety, using aids and floats. By the time students reach
                                        the sixth level, they will be able to swim independently and will be eligible to
                                        join the Swim Star classes.</p>

                                    <p><strong>Swim Star</strong><br>
                                        An opportunity for able swimmers to earn the Bronze, Silver and Gold swimming
                                        awards. These classes teach children the ability to swim for prolonged periods
                                        of time, and teach skills such as diving, turning and different strokes.
                                        Children who successfully complete the Swim Star programme will be invited to
                                        join the Youth Squad and learn competitive swimming techniques.</p>

                                    <p><strong>Swim School</strong><br>
                                        The swim school offers classes for adults. There are three levels, beginner,
                                        intermediate and advanced. The beginner’s class is suitable for people who are
                                        new to swimming; the intermediate level is designed for swimmers who want to
                                        brush up on their swimming style, and the advanced level offers in-depth advice
                                        on stamina, breathing and technique.</p>

                                    <p><strong>Aqua Health</strong><br>
                                        We offer a range of levels of fitness classes for able swimmers who wish to keep
                                        fit, socialise and have fun with music. Aqua-Light offers gentle exercise and is
                                        suitable for the elderly. Aqua-Pump is a high energy class which builds your
                                        strength and tones your body.</p>
                                </div>
                            </div>
                            <!-- Column 2 -->
                            <div class="col-md-6 question_site">
                                <h3><strong>Questions 1-5</strong></h3>
                                <p>Choose <strong>TRUE</strong> if the statement agrees with the information given in the text, choose <strong>FALSE</strong> if the statement contradicts the information, or choose <strong>NOT GIVEN</strong> if there is no information on this.</p>

                                <div class="tfng-block" id="q1_5_tfng">
                                    @php
                                        $q1_5 = [
                                            1 => 'The general public can only use the 50m pool for lane swimming.',
                                            2 => 'The general public cannot use the 50m pool on Sundays.',
                                            3 => 'Men will be able to use the 25m pool on the 18th August.',
                                            4 => 'The whole of the 25m pool is available to the public during recreational swimming hours.',
                                            5 => 'The 50m pool is open during college holidays.'
                                        ];
                                    @endphp
                                    @foreach($q1_5 as $qNum => $qContent)
                                        <div class="tfng-item {{ $loop->first ? 'open' : '' }}">
                                            <div class="tfng-head">
                                                <div class="tfng-num">{{ $qNum }}</div>
                                                <div class="tfng-q">{{ $qContent }}</div>
                                            </div>
                                            <div class="tfng-options">
                                                <label><input type="radio" name="q{{ $qNum }}" value="TRUE" {{ ($answers[$qNum] ?? '') === 'TRUE' ? 'checked' : '' }}>
                                                    <span>TRUE</span></label>
                                                <label><input type="radio" name="q{{ $qNum }}" value="FALSE" {{ ($answers[$qNum] ?? '') === 'FALSE' ? 'checked' : '' }}>
                                                    <span>FALSE</span></label>
                                                <label><input type="radio" name="q{{ $qNum }}" value="NOT GIVEN" {{ ($answers[$qNum] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT
                                                        GIVEN</span></label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Questions 6-13</strong></h3>
                                    <p>The below list has 10 options for interested swimmers. Select a suitable swimming
                                        class for the people mentioned in questions <strong>6-13</strong> below and
                                        move into the gap
                                    </p>

                                    <div class="mb-4">
                                        <h5 class="mb-3" style="color: #1e293b; font-weight: 700;">Options</h5>
                                        <div id="dnd-headings-list">
                                            <div class="dnd-heading" data-value="i" data-content="Aqua-Pump">Aqua-Pump</div>
                                            <div class="dnd-heading" data-value="ii" data-content="Aqua-Light">Aqua-Light</div>
                                            <div class="dnd-heading" data-value="iii"
                                                data-content="Advanced Swim School">Advanced Swim School</div>
                                            <div class="dnd-heading" data-value="iv"
                                                data-content="Intermediate Swim School">Intermediate Swim School
                                            </div>
                                            <div class="dnd-heading" data-value="v" data-content="Beginner Swim School">
                                                Beginner Swim School</div>
                                            <div class="dnd-heading" data-value="vi" data-content="Youth Squad">Youth Squad</div>
                                            <div class="dnd-heading" data-value="vii" data-content="Swim Star">Swim Star</div>
                                            <div class="dnd-heading" data-value="viii" data-content="Tadpole to Frog">
                                                Tadpole to Frog</div>
                                            <div class="dnd-heading" data-value="ix" data-content="Swim-A-Long">Swim-A-Long</div>
                                            <div class="dnd-heading" data-value="x" data-content="No classes available">
                                                No classes available</div>
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        @php
                                            $q6_13 = [
                                                6 => 'A 5-year-old who is unable to swim.',
                                                7 => 'A mother who wants to introduce her baby to the water.',
                                                8 => 'A middle-aged person who can swim quite well but wants to improve his techniques.',
                                                9 => 'A teenager who is interested in swimming in competitions.',
                                                10 => 'An old man who wants to keep fit and meet people.',
                                                11 => 'A child who wants to be able to swim longer distances.',
                                                12 => 'A strong adult swimmer who wishes to learn complex skills.',
                                                13 => 'A woman who wants to learn to swim by using music.'
                                            ];
                                        @endphp
                                        @foreach($q6_13 as $qNum => $qContent)
                                            <div class="mb-3"
                                                style="display: flex; align-items: center; gap: 10px; flex-wrap: wrap;">
                                                <div>
                                                    <strong id="question-{{ $qNum }}-number" style="display: none;">{{ $qNum }}.</strong>
                                                    {{ $qContent }}
                                                </div>
                                                <input type="text" class="dnd-drop-input" data-question="q{{ $qNum }}"
                                                    placeholder="" readonly autocomplete="off"
                                                    data-original-placeholder=""
                                                    style="display: inline-block; margin-bottom: 0; width: 140px;">
                                            </div>
                                        @endforeach

                                        <!-- Hidden Inputs for saving -->
                                        <div style="display:none;">
                                            @foreach(range(6, 13) as $qNum)
                                                <input type="text" name="q{{ $qNum }}" id="{{ $qNum }}"
                                                    value="{{ $answers[$qNum] ?? '' }}">
                                            @endforeach
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
                        <p>Read the text below and answer questions 14-27</p>
                    </div>
                    <div class="mt-4">

                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-md-6">
                                <div class="scroll-box" style="text-align:left;">
                                    <h4 class="text-center"><strong>Gateway Academy Pre-Sessional Courses</strong></h4>
                                    <p>Our pre-sessional courses are ideal for students who have a conditional place at
                                        a British university, but who need to achieve a certain level of English in
                                        order to be accepted. The course aims to provide students with the English
                                        language and study skills that they need in order to be successful at university
                                        or another academic establishment. It is important to note that completion of
                                        the course does not guarantee students entrance into a university. It is
                                        necessary for students to show during the course that they have understood the
                                        information and skills that they have been taught, and can incorporate it into
                                        their work.</p>

                                    <p>Pre-sessional students at Gateway Academy will benefit from:</p>
                                    <ul>
                                        <li>Small class sizes (no more than 10 students per class)</li>
                                        <li>Twenty-three hours of tuition per week</li>
                                        <li>Individual support and tutorials</li>
                                        <li>Regular guest lecturers</li>
                                        <li>The use of the Academy’s study and recreational facilities, including the
                                            Language Library, the computer suite, and the academy’s sports facilities.
                                        </li>
                                        <li>A varied social programme including evening entertainments and weekend
                                            excursions to popular tourist attractions and cities such as Stonehenge,
                                            Oxford and Stratford-on-Avon.</li>
                                    </ul>

                                    <p>The course offers a holistic approach to learning and covers reading, writing,
                                        speaking and listening skills. During the course, students will receive
                                        instruction on important techniques such as summary-writing, analysing essay
                                        titles, organising writing, note-taking in lectures, giving seminars and making
                                        presentations. Students will gain experience in working both individually and in
                                        groups. As part of the course, all students will work towards a 5000-word
                                        project in their own field of study. Students will receive guidance from their
                                        tutors on how best to conduct research and write it up effectively. Students
                                        will also work towards a presentation on the same subject.</p>

                                    <p>There is no final examination. Students are assessed continuously, taking into
                                        account their attendance, successful completion of assignments and participation
                                        in class. Students will be given a full report on their progress at the end of
                                        the course. Students need to be aware that the course involves a great deal of
                                        coursework, which will require students to manage their time effectively.</p>

                                    <p>Gateway Academy offers three pre-sessional courses. A five-week course beginning
                                        in August is available for advanced level students; a ten-week course beginning
                                        in July is available for upper-intermediate students. Intermediate level
                                        students should take our twenty-week course beginning in May. Intermediate level
                                        students get a two-week break in July.</p>

                                    <br>
                                    <hr><br>
                                    <p>Look at the information below and then answer questions <strong>22-27</strong>
                                        below.</p>
                                    <p>If you are currently studying for an undergraduate or post-graduate degree, you
                                        may wish to take one of our in-sessional courses, which run during the academic
                                        year. You may take up to three hours of classes per semester. Please choose your
                                        courses from the list below, complete an application form and hand it in at the
                                        Gateway Office.</p>

                                    <p><strong>Course Outlines:</strong></p>
                                    <p>
                                        <input type="text" class="dnd-drop-input" data-question="q22" placeholder="22"
                                            readonly autocomplete="off" data-original-placeholder="22">
                                        <strong id="question-22-number"></strong> 
                                        Particularly useful for science students, but of interest to all, this course is
                                        an introduction to statistics. It shows how numbers can be manipulated to
                                        suggest different results, and how public opinion can be altered by clever
                                        statistical methods. It will provide an introduction into useful statistical
                                        methods, but is unsuitable for students who requiring advanced statistical
                                        skills for a thesis or dissertation.
                                    </p>
                                    <p>
                                        <input type="text" class="dnd-drop-input" data-question="q23" placeholder="23"
                                            readonly autocomplete="off" data-original-placeholder="23">
                                        <strong id="question-23-number"></strong> 
                                        This course teaches advanced mathematical and statistical skills and is suitable
                                        for students working on projects which involve a great deal of quantitative
                                        data. The course outlines how to gather data, how to draw conclusions from it,
                                        and how best to present it diagrammatically.
                                    </p>
                                    <p>
                                        <input type="text" class="dnd-drop-input" data-question="q24" placeholder="24"
                                            readonly autocomplete="off" data-original-placeholder="24">
                                        <strong id="question-24-number"></strong> 
                                        This course concentrates on the skills needed to write academic essays. Students
                                        will learn how to develop essay titles, structure essays correctly, avoid
                                        plagiarism and reference their work. There will also be the opportunity to work
                                        on other elements of writing, including grammar and punctuation. The course is
                                        most suitable for non-native speakers and native speakers at the undergraduate
                                        level.
                                    </p>
                                    <p>
                                        <input type="text" class="dnd-drop-input" data-question="q25" placeholder="25"
                                            readonly autocomplete="off" data-original-placeholder="25">
                                        <strong id="question-25-number"></strong> 
                                        A course especially designed for PhD students working on a long-term project. As
                                        well as looking at conventions of PhD theses and improving research and study
                                        skills, the course also serves as a social group where PhD students, who often
                                        work alone, can share their experiences and offer each other encouragement and
                                        advice.
                                    </p>
                                    <p>
                                        <input type="text" class="dnd-drop-input" data-question="q26" placeholder="26"
                                            readonly autocomplete="off" data-original-placeholder="26">
                                        <strong id="question-26-number"></strong> 
                                        A course to iron out those typical mistakes in English essay writing. Common
                                        grammar mistakes, spelling errors and that dreaded apostrophe will be covered in
                                        detail. The course is designed for native speakers who lack confidence in
                                        writing, particularly those who have been away from academic environments for
                                        some time.
                                    </p>
                                    <p>
                                        <input type="text" class="dnd-drop-input" data-question="q27" placeholder="27"
                                            readonly autocomplete="off" data-original-placeholder="27">
                                        <strong id="question-27-number"></strong> 
                                        This course is suitable for non-native students at the undergraduate or
                                        post-graduate level who wish to focus on grammar and language. Students will
                                        look at which tenses are used in which situations, look at passive structures
                                        and relative clauses. Suitable ‘chunks’ of language for academic situations will
                                        also be presented. Students will also have the chance to focus on individual
                                        grammar needs. Unsuitable for native speakers of English.
                                    </p>
                                </div>
                            </div>
                            <!-- Column 2 -->
                            <div class="col-md-6 question_site">
                                <h3><strong>Questions 14-21</strong></h3>
                                <p>Complete the sentences below.</p>
                                <p>Choose <strong>NO MORE THAN THREE WORDS</strong> from the text for each answer.</p>

                                <div class="mt-4">
                                    @php
                                        $q14_21 = [
                                            14 => 'The Pre-Sessional course is suitable for students whose place at a British university is ................',
                                            15 => 'During the course, students need to show that they can understand and ................ new skills.',
                                            16 => 'Students will be able to use many of the Academy\'s ................ while they are studying.',
                                            17 => 'Students will have the opportunity to visit ................ on Saturdays and Sundays.',
                                            18 => 'Students will work both alone and ................',
                                            19 => 'Students will have to research and write up a ................ related to their subject area.',
                                            20 => 'In order to successfully complete their assignments, students will have to ................ well.',
                                            21 => '................ students should start their course in July.'
                                        ];
                                    @endphp
                                    @foreach($q14_21 as $qNum => $qContent)
                                        <div class="mb-3" style="line-height: 2;">
                                            <strong id="question-{{ $qNum }}-number" style="display: none;">{{ $qNum }}.</strong>
                                            {!! str_replace('................', '<input type="text" name="q' . $qNum . '" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="q' . $qNum . '" placeholder="" value="' . ($answers[$qNum] ?? '') . '">', $qContent) !!}
                                        </div>
                                    @endforeach
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Questions 22-27</strong></h3>
                                    <p>The list contains total 9 course titles.</p>
                                    <p>Choose the correct title for the courses and move it into the gap</p>
                                    

                                    <div class="mb-4">
                                        <h5 class="mb-3" style="color: #1e293b; font-weight: 700;">Course Titles</h5>
                                        <div id="dnd-headings-list-2" class="dnd-headings-pool">
                                            <div class="dnd-heading" data-value="i"
                                                data-content="Statistics for Life and Study"> Statistics for Life and
                                                Study</div>
                                            <div class="dnd-heading" data-value="ii"
                                                data-content="Writing for Masters Students"> Writing for Masters
                                                Students</div>
                                            <div class="dnd-heading" data-value="iii"
                                                data-content="Tips for Extended Research"> Tips for Extended
                                                Research</div>
                                            <div class="dnd-heading" data-value="iv"
                                                data-content="Statistics for science and research"> Statistics for
                                                science and research</div>
                                            <div class="dnd-heading" data-value="v"
                                                data-content="Advanced Grammar for International Students"> Advanced
                                                Grammar for International Students</div>
                                            <div class="dnd-heading" data-value="vi"
                                                data-content="Essays – From Planning to Production"> Essays – From
                                                Planning to Production</div>
                                            <div class="dnd-heading" data-value="vii"
                                                data-content="Use Vocabulary Correctly"> Use Vocabulary Correctly
                                            </div>
                                            <div class="dnd-heading" data-value="viii"
                                                data-content="Common Errors in English Writing"> Common Errors in
                                                English Writing</div>
                                            <div class="dnd-heading" data-value="ix"
                                                data-content="Improve your Referencing Techniques"> Improve your
                                                Referencing Techniques</div>
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <!-- Hidden Inputs for saving -->
                                        <div style="display:none;">
                                            @foreach(range(22, 27) as $qNum)
                                                <input type="text" name="q{{ $qNum }}" id="{{ $qNum }}"
                                                    value="{{ $answers[$qNum] ?? '' }}">
                                            @endforeach
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
                            <p>Read the text below and answer questions 28-40</p>
                        </div>
                        <div class="mt-4">

                            <div class="row">
                                <!-- Column 1 -->
                                <div class="col-md-6">
                                    <div class="scroll-box" style="text-align:left;">
                                        <h4 class="text-center"><strong>The Shock of the Truth</strong></h4>
                                        <p><strong>A.</strong> Throughout history, there have been instances in which
                                            people have been unwilling to accept new theories, despite startling
                                            evidences. This was certainly the case when Copernicus published his theory
                                            – that the earth was not the centre of the universe.</p>
                                        <p><strong>B.</strong> Until the early 16th century, western thinkers believed
                                            the theory put forward by Ptolemy, an Egyptian living in Alexandria in about
                                            150 A.D. His theory, which was formulated by gathering and organizing the
                                            thoughts of the earlier thinkers, proposed that the universe was a closed
                                            space bounded by a spherical envelope beyond which there was nothing. The
                                            earth, according to Ptolemy, was a fixed and immobile mass, located at the
                                            centre of the universe. The sun and the stars revolved around it.</p>
                                        <p><strong>C.</strong> The theory appealed to human nature. Someone making
                                            casual observations as they looked into the sky might come to a similar
                                            conclusion. It also fed the human ego. Humans could believe that they were
                                            at the centre of God’s universe, and the sun and stars were created for
                                            their benefit.</p>
                                        <p><strong>D.</strong> Ptolemy’s theory, was of course, incorrect, but at the
                                            time nobody contested it. European astronomers were more inclined to save
                                            face. Instead of proposing new ideas, they attempted to patch up and refine
                                            Ptolemy’s flawed model. Students were taught using a book called The Sphere
                                            which had been written two hundred years previously. In short, astronomy
                                            failed to advance.</p>
                                        <p><strong>E.</strong> In 1530, however, Mikolaj Kopernik, more commonly known
                                            as Copernicus, made an assertion which shook the world. He proposed that the
                                            earth turned on its axis once per day, and travelled around the sun once per
                                            year. Even when he made his discovery, he was reluctant to make it public,
                                            knowing how much his shocking revelations would disturb the church. However,
                                            George Rheticus, a German mathematics professor who had become Copernicus’s
                                            student, convinced Copernicus to publish his ideas, even though Copernicus,
                                            a perfectionist, was never satisfied that his observations were complete.
                                        </p>
                                        <p><strong>F.</strong> Copernicus’s ideas went against all the political and
                                            religious beliefs of the time. Humans, it was believed, were made in God’s
                                            image, and were superior to all creatures. The natural world had been
                                            created for humans to exploit. Copernicus’s theories contradicted the ideas
                                            of all the powerful churchmen of the time. Even the famous playwright
                                            William Shakespeare feared the new theory, pronouncing that it would destroy
                                            social order and bring chaos to the world. However, Copernicus never had to
                                            suffer at the hands of those who disagreed with his theories. He died just
                                            after the work was published in 1543.</p>
                                        <p><strong>G.</strong> However, the scientists who followed in Copernicus’s
                                            footsteps bore the brunt of the church’s anger. Two other Italian scientists
                                            of the time, Galileo and Bruno, agreed wholeheartedly with the Copernican
                                            theory. Bruno even dared to say that space was endless and contained many
                                            other suns, each with its own planets. For this, Bruno was sentenced to
                                            death by burning in 1600. Galileo, famous for his construction of the
                                            telescope, was forced to deny his belief in the Copernican theories. He
                                            escaped capital punishment, but was imprisoned for the rest of his life.</p>
                                        <p><strong>H.</strong> In time, however, Copernicus’s work became more accepted.
                                            Subsequent scientists and mathematicians such as Brahe, Kepler and Newton
                                            took Copernicus’s work as a starting point and used it to glean further
                                            truths about the laws of celestial mechanics.</p>
                                        <p><strong>I.</strong> The most important aspect of Copernicus’ work is that it
                                            forever changed the place of man in the cosmos. With Copernicus’ work, the
                                            man could no longer take that premier position which the theologians had
                                            immodestly assigned him. This was the first, but certainly not the last time
                                            in which man would have to accept his position as a mere part of the
                                            universe, not at the centre of it.</p>
                                    </div>
                                </div>
                                <!-- Column 2 -->
                                <div class="col-md-6 question_site">
                                    <h3><strong>Questions 28–34</strong></h3>
                                    <p>The text has nine paragraphs, <strong>A-I</strong>.</p>
                                    <p>Which paragraph contains the following information?</p>

                                    <div class="mt-4">
                                        @php
                                            $q28_34 = [
                                                28 => 'The public’s reaction to the new theory',
                                                29 => 'An ancient belief about the position of the earth',
                                                30 => 'Copernicus’s legacy to the future of science',
                                                31 => 'How academics built on Copernican ideas',
                                                32 => 'An idea which is attractive to humans',
                                                33 => 'Out-dated teaching and defective research',
                                                34 => 'Scientists suffer for their beliefs'
                                            ];
                                        @endphp
                                        <div class="matching-grid mt-4">
                                            <table class="table table-bordered text-center">
                                                <thead>
                                                    <tr>
                                                        <th>Questions</th>
                                                        @foreach(['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I'] as $char)
                                                            <th class="choice-cell">{{ $char }}</th>
                                                        @endforeach
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($q28_34 as $qNum => $qContent)
                                                        <tr>
                                                            <td class="text-start"><strong>{{ $qNum }}</strong>.
                                                                {{ $qContent }}
                                                            </td>
                                                            @foreach(['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I'] as $char)
                                                                <td class="choice-cell tick-cell"
                                                                    data-row="{{ $qNum }}" data-value="{{ $char }}">
                                                                    <span class="tick">✓</span>
                                                                </td>
                                                            @endforeach
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- Hidden Inputs for saving -->
                                        <div style="display:none;">
                                            @foreach(range(28, 34) as $qNum)
                                                <input type="text" name="q{{ $qNum }}" id="{{ $qNum }}"
                                                    value="{{ $answers[$qNum] ?? '' }}">
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="mt-5">
                                        <h3><strong>Questions 35–40</strong></h3>
                                        <p>Look at the following statements and the list of people
                                            <strong>(A-I)</strong> below.</p>
                                        <p>Match each statement with the correct person <strong>(A-I)</strong>.</p>
                                        <p><strong>NB</strong> <em>You may use any letter more than once.</em></p>

                                        <div class="mt-4 p-3 border" style="background-color: #fcfcfc;">
                                            <h5><strong>List of People</strong></h5>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <ul class="list-unstyled mb-0">
                                                        <li><strong>A.</strong> Ptolemy</li>
                                                        <li><strong>B.</strong> George Rheticus</li>
                                                        <li><strong>C.</strong> Kepler</li>
                                                        <li><strong>D.</strong> Newton</li>
                                                        <li><strong>E.</strong> Bruno</li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-6">
                                                    <ul class="list-unstyled mb-0">
                                                        <li><strong>F.</strong> Galileo</li>
                                                        <li><strong>G.</strong> Copernicus</li>
                                                        <li><strong>H.</strong> Mikolaj Kopernik</li>
                                                        <li><strong>I.</strong> William Shakespeare</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            @php
                                                $q35_40 = [
                                                    35 => 'He, among others, used Copernicus’s theories to advance scientific knowledge.',
                                                    36 => 'He proposed an inaccurate theory based on the work of early philosophers.',
                                                    37 => 'His attitude to the new theory was similar to that of the Church.',
                                                    38 => 'He was killed because of his belief in the new theory.',
                                                    39 => 'He was responsible for Copernicus’s ideas being made public.',
                                                    40 => 'He had to go to jail because he believed in the new theory.'
                                                ];
                                            @endphp
                                            <div class="matching-grid mt-4">
                                                <table class="table table-bordered text-center">
                                                    <thead>
                                                        <tr>
                                                            <th>Statements</th>
                                                            @foreach(['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I'] as $char)
                                                                <th class="choice-cell">{{ $char }}</th>
                                                            @endforeach
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($q35_40 as $qNum => $qContent)
                                                            <tr>
                                                                <td class="text-start"><strong>{{ $qNum }}</strong>.
                                                                    {{ $qContent }}
                                                                </td>
                                                                @foreach(['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I'] as $char)
                                                                    <td class="choice-cell tick-cell"
                                                                        data-row="{{ $qNum }}"
                                                                        data-value="{{ $char }}">
                                                                        <span class="tick">✓</span>
                                                                    </td>
                                                                @endforeach
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                            <!-- Hidden Inputs for saving -->
                                            <div style="display:none;">
                                                @foreach(range(35, 40) as $qNum)
                                                    <input type="text" name="q{{ $qNum }}" id="{{ $qNum }}"
                                                        value="{{ $answers[$qNum] ?? '' }}">
                                                @endforeach
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
            </div>
            <span class="question-placeholder">1 of 13</span>
        </div>
        <div class="tab " data-tab="part2">
            <span class="tab-title">Part 2</span>
            <div class="question-links">
                <a href="#" class="question-link" data-question="14">14</a>
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
            <span class="question-placeholder">14 of 27</span>
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
        document.addEventListener('DOMContentLoaded', function () {
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
                    scrollToVisibleTop(scrollTarget);
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
            if (testForm) {
                testForm.addEventListener('keydown', function (e) {
                    if (e.key === 'Enter') {
                        const target = e.target;
                        if (target.tagName === 'INPUT' || target.tagName === 'TEXTAREA') {
                            e.preventDefault();
                            return false;
                        }
                    }
                });
            }
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
                    formData.append('question_number', (input.name || '').replace('q', ''));
                    formData.append('answer', input.value || '');
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

                input.addEventListener('focus', function () {
                    if (this.placeholder) {
                        this.dataset.placeholder = this.placeholder;
                        this.placeholder = '';
                    }
                    let qNum = this.getAttribute('data-question') || this.id || (this.name ? this.name.replace('q', '').replace('[]', '').replace('_radio', '') : '');
                    if (qNum && qNum.startsWith('q')) qNum = qNum.substring(1);
                    const idx = allLinks.findIndex(l => l.getAttribute('data-question') === qNum);
                    if (idx !== -1) {
                        currentIndex = idx;
                        highlightLinkAndNumber(qNum);
                    }
                });

                input.addEventListener('blur', function () {
                    if (this.dataset.placeholder) {
                        this.placeholder = this.dataset.placeholder;
                    }
                });
            });

            // --- MCQ/TFNG Sync ---
            document.querySelectorAll('.mcq-sync').forEach(radio => {
                radio.addEventListener('change', function () {
                    let targetId = this.getAttribute('data-target');
                    if (targetId && targetId.startsWith('q')) targetId = targetId.substring(1);
                    const targetInput = document.getElementById(targetId);
                    if (targetInput) {
                        targetInput.value = this.value || '';
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
                    if (!isOpen) item.classList.add('open');

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

            // --- Drag and Drop Logic for Questions 6-13 ---
            var dndDraggedEl = null;
            var dndGhost = null;
            var dndSourceInput = null;

            document.querySelectorAll('.dnd-heading').forEach(function (el) {
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
                var qName = dropInput.getAttribute('data-question');

                var oldVal = dropInput.getAttribute('data-placed-value');
                if (oldVal) {
                    var oldH = document.querySelector('.dnd-heading[data-value="' + oldVal + '"]');
                    if (oldH) oldH.classList.remove('used');
                }

                dropInput.value = headingEl.textContent.trim().replace(/\s+/g, ' ');
                dropInput.setAttribute('data-placed-value', val);
                dropInput.style.borderColor = 'black';

                var font = window.getComputedStyle(dropInput).font;
                var textWidth = measureTextWidth(dropInput.value, font);
                dropInput.style.width = (textWidth + 30) + 'px';
                dropInput.style.boxShadow = '0 4px 6px -1px rgba(0, 0, 0, 0.1)';

                headingEl.classList.add('used');

                var qNum = String(qName || '').replace(/^q/i, '');
                var hidden = document.getElementById(qNum);
                if (hidden) {
                    hidden.value = val;
                    hidden.dispatchEvent(new Event('change'));
                    highlightLinkAndNumber(qNum);
                }
            }

            document.querySelectorAll('.dnd-drop-input').forEach(function (dropInput) {
                dropInput.addEventListener('dblclick', function () {
                    var oldVal = dropInput.getAttribute('data-placed-value');
                    if (oldVal) {
                        var h = document.querySelector('.dnd-heading[data-value="' + oldVal + '"]');
                        if (h) h.classList.remove('used');
                    }
                    dropInput.value = '';
                    dropInput.removeAttribute('data-placed-value');
                    dropInput.style.border = '1px solid #e2e8f0';
                    dropInput.style.width = '150px';
                    dropInput.style.boxShadow = 'none';

                    var qName = dropInput.getAttribute('data-question');
                    var qNum = String(qName || '').replace(/^q/i, '');
                    var hidden = document.getElementById(qNum);
                    if (hidden) {
                        hidden.value = '';
                        hidden.dispatchEvent(new Event('change'));
                    }
                });
            });

            document.querySelectorAll('.dnd-heading').forEach(function (el) {
                el.addEventListener('mousedown', function (e) {
                    if (el.classList.contains('used')) return;
                    e.preventDefault();
                    dndDraggedEl = el;
                    dndSourceInput = null;
                    el.classList.add('dragging');

                    dndGhost = document.createElement('div');
                    dndGhost.className = 'dnd-ghost-follow';
                    dndGhost.textContent = el.textContent.trim().replace(/\s+/g, ' ');
                    dndGhost.style.left = e.clientX + 'px';
                    dndGhost.style.top = e.clientY - 15 + 'px';
                    document.body.appendChild(dndGhost);
                });
            });

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
                    dndGhost.textContent = heading.textContent.trim().replace(/\s+/g, ' ');
                    dndGhost.style.left = e.clientX + 'px';
                    dndGhost.style.top = e.clientY - 15 + 'px';
                    document.body.appendChild(dndGhost);
                });
            });

            document.addEventListener('mousemove', function (e) {
                if (!dndGhost) return;
                dndGhost.style.left = e.clientX + 'px';
                dndGhost.style.top = e.clientY - 15 + 'px';

                document.querySelectorAll('.dnd-drop-input').forEach(function (inp) {
                    var rect = inp.getBoundingClientRect();
                    var isOver = (e.clientX >= rect.left && e.clientX <= rect.right && e.clientY >= rect.top && e.clientY <= rect.bottom);
                    inp.style.borderColor = (inp.getAttribute('data-placed-value') || isOver) ? 'black' : '#e2e8f0';
                });
            });

            document.addEventListener('mouseup', function (e) {
                if (!dndDraggedEl || !dndGhost) return;
                if (dndGhost.parentNode) dndGhost.parentNode.removeChild(dndGhost);
                dndGhost = null;

                var droppedOnInput = false;
                document.querySelectorAll('.dnd-drop-input').forEach(function (inp) {
                    var rect = inp.getBoundingClientRect();
                    if (e.clientX >= rect.left && e.clientX <= rect.right && e.clientY >= rect.top && e.clientY <= rect.bottom) {
                        if (dndSourceInput && dndSourceInput !== inp) {
                            dndSourceInput.value = '';
                            dndSourceInput.removeAttribute('data-placed-value');
                            dndSourceInput.style.border = '1px solid #e2e8f0';
                            dndSourceInput.style.width = '150px';
                            dndSourceInput.style.boxShadow = 'none';

                            var srcQ = dndSourceInput.getAttribute('data-question');
                            var srcNum = String(srcQ || '').replace(/^q/i, '');
                            var srcHidden = document.getElementById(srcNum);
                            if (srcHidden) {
                                srcHidden.value = '';
                                srcHidden.dispatchEvent(new Event('change'));
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
                    dndSourceInput.style.width = '150px';
                    dndSourceInput.style.boxShadow = 'none';

                    var srcQ = dndSourceInput.getAttribute('data-question');
                    var srcNum = String(srcQ || '').replace(/^q/i, '');
                    var srcHidden = document.getElementById(srcNum);
                    if (srcHidden) {
                        srcHidden.value = '';
                        srcHidden.dispatchEvent(new Event('change'));
                    }
                }

                if (dndDraggedEl) dndDraggedEl.classList.remove('dragging');
                dndDraggedEl = null;
                dndSourceInput = null;
            });

            // Restore saved values for DND questions 6-13
            [6, 7, 8, 9, 10, 11, 12, 13].forEach(function (qNum) {
                var hidden = document.getElementById(String(qNum));
                if (hidden && hidden.value) {
                    var dropInput = document.querySelector('.dnd-drop-input[data-question="q' + qNum + '"]');
                    if (dropInput) {
                        var pool1 = document.getElementById('dnd-headings-list');
                        var heading = pool1 ? pool1.querySelector('.dnd-heading[data-value="' + hidden.value + '"]') : null;
                        if (heading) dndPlaceHeading(dropInput, heading);
                    }
                }
            });

            // Restore saved values for DND questions 22-27
            [22, 23, 24, 25, 26, 27].forEach(function (qNum) {
                var hidden = document.getElementById(String(qNum));
                if (hidden && hidden.value) {
                    var dropInput = document.querySelector('.dnd-drop-input[data-question="q' + qNum + '"]');
                    if (dropInput) {
                        var pool2 = document.getElementById('dnd-headings-list-2');
                        var heading = pool2 ? pool2.querySelector('.dnd-heading[data-value="' + hidden.value + '"]') : null;
                        if (heading) dndPlaceHeading(dropInput, heading);
                    }
                }
            });

            // Restore for 28-34 Grid
            [28, 29, 30, 31, 32, 33, 34].forEach(function (qNum) {
                var hidden = document.getElementById(String(qNum));
                if (hidden && hidden.value) {
                    setGridAnswer(qNum, hidden.value);
                }
            });

            // Restore for 35-40 Grid
            [35, 36, 37, 38, 39, 40].forEach(function (qNum) {
                var hidden = document.getElementById(String(qNum));
                if (hidden && hidden.value) {
                    setGridAnswer(qNum, hidden.value);
                }
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

                const sIdInput = document.getElementById('studentIdInput');
                sIdInput?.addEventListener('keydown', (e) => {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        document.getElementById('startTestButton')?.click();
                    }
                });

                document.getElementById('startTestButton')?.addEventListener('click', () => {
                    const sId = sIdInput?.value;
                    if (sId && sId.length >= 8) {
                        modal.hide();
                        document.documentElement.requestFullscreen?.().catch(() => { });
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

        document.addEventListener('contextmenu', function (e) {
            if (e.target.tagName === 'MARK') {
                e.preventDefault();
                clickedMark = e.target;
                selectionRange = null; // Clear selection when interacting with existing mark
                contextMenu.style.display = 'block';
                contextMenu.style.left = e.pageX + 'px';
                contextMenu.style.top = e.pageY + 'px';
                return;
            }

            clickedMark = null;
            const sel = window.getSelection();
            if (sel.rangeCount > 0 && sel.toString().trim() !== '') {
                e.preventDefault();
                const rawRange = sel.getRangeAt(0).cloneRange();

                // Range Normalization: Ensures selection starts and ends at text nodes
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
                        const startN = (rawRange.startContainer.nodeType === Node.TEXT_NODE) ? rawRange.startContainer : firstNode;
                        const startO = (rawRange.startContainer.nodeType === Node.TEXT_NODE) ? rawRange.startOffset : 0;
                        const endN = (rawRange.endContainer.nodeType === Node.TEXT_NODE) ? rawRange.endContainer : lastNode;
                        const endO = (rawRange.endContainer.nodeType === Node.TEXT_NODE) ? rawRange.endOffset : lastNode.textContent.length;

                        try {
                            newRange.setStart(startN, startO);
                            newRange.setEnd(endN, endO);
                            selectionRange = newRange;
                        } catch (err) {
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

            // Single text node selection
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

            // Multi-node selection
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

        highlightOption.addEventListener('click', function () {
            if (selectionRange) {
                highlightRange(selectionRange);
                selectionRange = null;
                clickedMark = null;
            }
            contextMenu.style.display = 'none';
        });

        notesOption.addEventListener('click', function () {
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
                        mk.addEventListener('click', function (e) {
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

        clearOption.addEventListener('click', function () {
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

        allClearOption.addEventListener('click', function () {
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

        document.addEventListener('click', function (e) {
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