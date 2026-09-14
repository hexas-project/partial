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
            user-select: none;
        }

        .matching-grid .tick {
            visibility: hidden;
            opacity: 0;
            font-size: 18px;
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
            user-select: none;
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
            outline: 2px dashed #2f80ed;
            outline-offset: 2px;
        }

        .dd-placeholder {
            opacity: 0.65;
        }
    </style>
</head>

<body>
    <form action="{{ route('reading.submit') }}" method="POST" id="testForm"  spellcheck="false" autocomplete="off">
        @csrf

        @php
            $answers = $answers ?? [];
        @endphp

        {{-- hidden input  --}}
        <input type="hidden" name="test_name" value="class19_reading">
        <input type="hidden" name="student_id" value="{{ auth()->id() ?? session('student_batch_id') }}">
        <input type="hidden" name="exam_student_id" id="examStudentIdField" value="{{ session('exam_student_id', '') }}">
        <input type="hidden" name="assignment_id" value="{{ is_numeric(request()->query('assignment_id')) ? (int) request()->query('assignment_id') : '' }}">
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
                        <p>Read the text below and answer questions 1-13
                        </p>
                    </div>
                    <div class="mt-4">


                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-md-6">


                                <div class="scroll-box" style="text-align:left;">
                                    
                                    <h4><strong>IMPLEMENTING THE CYCLE OF SUCCESS: A CASE STUDY</strong></h4>

                                    <p>Within Australia, Australian Hotels Inc (AHI) operates nine hotels and employs over 2000 permanent full-time staff, 300 permanent part-time employees and 100 casual staff. One of its latest ventures, the Sydney Airport hotel (SAH), opened in March 1995. The hotel is the closest to Sydney Airport and is designed to provide the best available accommodation, food and beverage and meeting facilities in Sydney's southern suburbs. Similar to many international hotel chains, however, AHI has experienced difficulties in Australia in providing long-term profits for hotel owners, as a result of the country's high labour-cost structure. In order to develop an economically viable hotel organisation model, AHI decided to implement some new policies and practices at SAH.<br><br>

                                    The first of the initiatives was an organisational structure with only three levels of management - compared to the traditional seven. Partly as a result of this change, there are 25 per cent fewer management positions, enabling a significant saving. This change also has other implications. Communication, both up and down the organisation, has greatly improved. Decision-making has been forced down in many cases to front-line employees. As a result, guest requests are usually met without reference to a supervisor, improving both customer and employee satisfaction.<br><br>

                                    The hotel also recognised that it would need a different approach to selecting employees who would fit in with its new policies. In its advertisements, the hotel stated a preference for people with some 'service' experience in order to minimise traditional work practices. Over 7000 applicants filled in application forms for the 120 jobs initially offered at SAH. The balance of the positions at the hotel (30 management and 40 shift leader positions) were predominantly filled by transfers from other AHI properties.<br><br>

                                    A series of tests and interviews were conducted with potential employees, which eventually left 280 applicants competing for the 120 advertised positions. After the final interview, potential recruits were divided into three categories. Category A was for applicants exhibiting strong leadership qualities, Category C was for applicants perceived to be followers, and Category B was for applicants with both leader and follower qualities. Department heads and shift leaders then composed prospective teams using a combination of people from all three categories. Once suitable teams were formed, offers of employment were made to team members.<br><br>

                                    Another major initiative by SAH was to adopt a totally multi-skilled workforce. Although there may be some limitations with highly technical jobs such as cooking or maintenance, wherever possible, employees at SAH are able to work in a wide variety of positions. A multi-skilled workforce provides far greater management flexibility during peak and quiet times to transfer employees to needed positions. For example, when office staff are away on holidays during quiet periods of the year, employees in either food or beverage or housekeeping departments can temporarily .<br><br>

                                    The most crucial way, however, of improving the labour cost structure at SAH was to find better, more productive ways of providing customer service. SAH management concluded this would first require a process of 'benchmarking'. The prime objective of the benchmarking process was to compare a range of service delivery processes across a range of criteria using teams made up of employees from different departments within the hotel which competed with each other. This process resulted in performance measures that greatly enhanced SAH's ability to improve productivity and quality.<br><br>

                                    The front office team discovered through this project that a high proportion of AHI Club member reservations were incomplete. As a result, the service provided to these guests was below the standard promised to them as part of their membership agreement. Reducing the number of incomplete reservations greatly improved guest perceptions of service.<br><br>

                                    In addition, a program modeled on an earlier project called 'Take Charge' was implemented. Essentially, Take Charge provides an effective feedback loop from both customers and employees. Customer comments, both positive and negative, are recorded by staff. These are collated regularly to identify opportunities for improvement. Just as importantly, employees are requested to note down their own suggestions for improvement. (AHI has set an expectation that employees will submit at least three suggestions for every one they receive from a customer.)<br><br>

                                    Employee feedback is reviewed daily and suggestions are implemented within 48 hours, if possible, or a valid reason is given for non-implementation. If suggestions require analysis or data collection, the Take Charge Team has 30 days in which to address the issue and come up with recommendations.<br><br>

                                    Although quantitative evidence of AHI's initiatives at SAH are limited at present, anecdotal evidence clearly suggests that these practices are working. Indeed AHI is progressively rolling out these initiatives in other hotels in Australia, whilst numerous overseas visitors have come to see how the program works.<br><br>

                                    <em>[ This article has been adapted and condensed from the article by R. Carter (1996), 'Implementing the cycle of success: A case study of the Sheraton Pacific Division', Asia Pacific Journal of Human Resources, 34(3): 111-23. Names and other details have been changed and report findings may have been given a different emphasis from the original. We are grateful to the author and Asia Pacific Journal of Human Resources for allowing us to use the material in this way.]</em>
                                    </p>

                            
                               



                                </div>


                            </div>
                            <!-- Column 2 -->
                            <div class="col-md-6 question_site">
                                <h3><strong>Questions 1-5</strong></h3>
                                <p>Choose the correct answer.</p>

                                <div class="mcq-block">
                                    <div class="mcq-item open">
                                        <div class="mcq-head">
                                            <div class="mcq-num">1</div>
                                            <div class="mcq-q">The high costs of running AHI's hotels are related to their ......</div>
                                        </div>
                                        <div class="mcq-options">
                                            <label><input type="radio" name="q1" value="A" {{ ($answers[1] ?? '') === 'A' ? 'checked' : '' }}> <span> management.</span></label>
                                            <label><input type="radio" name="q1" value="B" {{ ($answers[1] ?? '') === 'B' ? 'checked' : '' }}> <span> size.</span></label>
                                            <label><input type="radio" name="q1" value="C" {{ ($answers[1] ?? '') === 'C' ? 'checked' : '' }}> <span> staff.</span></label>
                                            <label><input type="radio" name="q1" value="D" {{ ($answers[1] ?? '') === 'D' ? 'checked' : '' }}> <span> policies.</span></label>
                                        </div>
                                    </div>

                                    <div class="mcq-item">
                                        <div class="mcq-head">
                                            <div class="mcq-num">2</div>
                                            <div class="mcq-q">SAH's new organisational structure requires ......</div>
                                        </div>
                                        <div class="mcq-options">
                                            <label><input type="radio" name="q2" value="A" {{ ($answers[2] ?? '') === 'A' ? 'checked' : '' }}> <span> 75% of the old management positions.</span></label>
                                            <label><input type="radio" name="q2" value="B" {{ ($answers[2] ?? '') === 'B' ? 'checked' : '' }}> <span> 25% of the old management positions.</span></label>
                                            <label><input type="radio" name="q2" value="C" {{ ($answers[2] ?? '') === 'C' ? 'checked' : '' }}> <span> 25% more management positions.</span></label>
                                            <label><input type="radio" name="q2" value="D" {{ ($answers[2] ?? '') === 'D' ? 'checked' : '' }}> <span> 5% fewer management positions.</span></label>
                                        </div>
                                    </div>

                                    <div class="mcq-item">
                                        <div class="mcq-head">
                                            <div class="mcq-num">3</div>
                                            <div class="mcq-q">The SAH's approach to organisational structure required changing practices in ......</div>
                                        </div>
                                        <div class="mcq-options">
                                            <label><input type="radio" name="q3" value="A" {{ ($answers[3] ?? '') === 'A' ? 'checked' : '' }}> <span> industrial relations.</span></label>
                                            <label><input type="radio" name="q3" value="B" {{ ($answers[3] ?? '') === 'B' ? 'checked' : '' }}> <span> firing staff.</span></label>
                                            <label><input type="radio" name="q3" value="C" {{ ($answers[3] ?? '') === 'C' ? 'checked' : '' }}> <span> hiring staff.</span></label>
                                            <label><input type="radio" name="q3" value="D" {{ ($answers[3] ?? '') === 'D' ? 'checked' : '' }}> <span> marketing.</span></label>
                                        </div>
                                    </div>

                                    <div class="mcq-item">
                                        <div class="mcq-head">
                                            <div class="mcq-num">4</div>
                                            <div class="mcq-q">The total number of jobs advertised at the SAH was ........</div>
                                        </div>
                                        <div class="mcq-options">
                                            <label><input type="radio" name="q4" value="A" {{ ($answers[4] ?? '') === 'A' ? 'checked' : '' }}> <span> 70.</span></label>
                                            <label><input type="radio" name="q4" value="B" {{ ($answers[4] ?? '') === 'B' ? 'checked' : '' }}> <span> 120.</span></label>
                                            <label><input type="radio" name="q4" value="C" {{ ($answers[4] ?? '') === 'C' ? 'checked' : '' }}> <span> 170.</span></label>
                                            <label><input type="radio" name="q4" value="D" {{ ($answers[4] ?? '') === 'D' ? 'checked' : '' }}> <span> 280.</span></label>
                                        </div>
                                    </div>

                                    <div class="mcq-item">
                                        <div class="mcq-head">
                                            <div class="mcq-num">5</div>
                                            <div class="mcq-q">Categories A, B and C were used to select........</div>
                                        </div>
                                        <div class="mcq-options">
                                            <label><input type="radio" name="q5" value="A" {{ ($answers[5] ?? '') === 'A' ? 'checked' : '' }}> <span> front office staff.</span></label>
                                            <label><input type="radio" name="q5" value="B" {{ ($answers[5] ?? '') === 'B' ? 'checked' : '' }}> <span> new teams.</span></label>
                                            <label><input type="radio" name="q5" value="C" {{ ($answers[5] ?? '') === 'C' ? 'checked' : '' }}> <span> department heads.</span></label>
                                            <label><input type="radio" name="q5" value="D" {{ ($answers[5] ?? '') === 'D' ? 'checked' : '' }}> <span> new managers.</span></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Questions 6-13</strong></h3>
                                    <p>Complete the summary. Write <strong>NO MORE THAN TWO WORDS</strong> from the text in each gap.</p>

                                    <p class="mt-3"><strong>WHAT THEY DID AT SAH</strong></p>

                                    <p>Teams of employees were selected from different hotel departments to participate in a  <input type="text" name="q6" placeholder="6" style="padding:2px 5px; width:120px;" id="6" value="{{ $answers[6] ?? '' }}"> exercise. The information collected was used to compare  <input type="text" name="q7" placeholder="7" style="padding:2px 5px; width:120px;" id="7" value="{{ $answers[7] ?? '' }}"> processes which, in turn, led to the development of  <input type="text" name="q8" placeholder="8" style="padding:2px 5px; width:120px;" id="8" value="{{ $answers[8] ?? '' }}"> that would be used to increase the hotel's capacity to improve <input type="text" name="q9" placeholder="9" style="padding:2px 5px; width:120px;" id="9" value="{{ $answers[9] ?? '' }}"> as well as quality. Also, an older program known as  <input type="text" name="q10" placeholder="10" style="padding:2px 5px; width:120px;" id="10" value="{{ $answers[10] ?? '' }}"> was introduced at SAH. In this program,  <input type="text" name="q11" placeholder="11" style="padding:2px 5px; width:120px;" id="11" value="{{ $answers[11] ?? '' }}"> is sought from customers and staff. Wherever possible  <input type="text" name="q12" placeholder="12" style="padding:2px 5px; width:120px;" id="12" value="{{ $answers[12] ?? '' }}"> suggestions are implemented within 48 hours. Other suggestions are investigated for their feasibility for a period of up to <input type="text" name="q13" placeholder="13" style="padding:2px 5px; width:120px;" id="13" value="{{ $answers[13] ?? '' }}"></p>
                                </div>
                               
                                
                               
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- question part 2 -->
                <div class="tab-content " id="part2" style="margin-bottom: 80px;">
                    <div class="question_part">
                        <h4>Part 2</h4>
                        <p>Read the text below and answer questions 14-26
                        </p>
                    </div>
                    <div class="mt-4">

                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-md-6">
                                    <div class="scroll-box" style="text-align:left;">

                                <h4><strong>DELIVERING THE GOODS</strong></h4>
                                <p><strong>The vast expansion in international trade owes much to a revolution in the business of moving freight</strong><br><br>

                                <strong>A</strong> International trade is growing at a startling pace. While the global economy has been expanding at a bit over 3% a year, the volume of trade has been rising at a compound annual rate of about twice that. Foreign products, from meat to machinery, play a more important role in almost every economy in the world, and foreign markets now tempt businesses that never thought to venture beyond their nation's borders.<br><br>

                                <strong>B</strong> What lies behind this explosion in international commerce? The general worldwide decline in trade barriers, such as customs duties and import quotas, is surely one explanation. The economic opening of countries that have traditionally been minor players is another. But one force behind the import-export boom has passed all but unnoticed: the rapidly falling cost of getting goods to market. Theoretically, in the world of trade, shipping costs do not matter. Goods, once they have been made, are assumed to move instantly and at no cost from place to place. The real world, however, is full of frictions. Cheap labour may make Chinese clothing competitive in America, but if delays in shipment tie up working capital and cause winter coats to arrive in spring, trade may lose its advantages.<br><br>

                                <strong>C</strong> At the turn of the 20th century, agriculture and manufacturing were the two most important sectors almost everywhere, accounting for about 70% of total output in Germany, Italy and France, and 40-50% in America, Britain and Japan. International commerce was therefore dominated by raw materials, such as wheat, wood and iron ore, or processed commodities, such as meat and steel. But these sorts of products are heavy and bulky and the cost of transporting them relatively high.<br><br>

                                <strong>D</strong> Countries still trade disproportionately with their geographic neighbours. Over time, however, world output has shifted into goods whose worth is unrelated to their weight and size. Today, it is finished manufactured products that dominate the flow of trade, and, thanks to technological advances such as lightweight components, manufactured goods themselves have tended to become lighter and less bulky. As a result, less transportation is required for every dollar's worth of imports or exports.<br><br>

                                <strong>E</strong> To see how this influences trade, consider the business of making disk drives for computers. Most of the world's disk-drive manufacturing is concentrated in South-east Asia. This is possible only because disk drives, while valuable, are small and light and so cost little to ship. Computer software is exported from Singapore rather than purchasing them on the domestic market. Distance therefore poses no manufacturers in Japan or Texas will not face hugely bigger freight bills if they import drives from Singapore rather than purchasing them on the domestic market. Distance therefore poses no obstacle to the globalisation of the disk-drive industry.<br><br>

                                <strong>F</strong> This is even more true of the fast-growing information industries. Films and compact discs cost little to transport, even by aeroplane. Computer software can be 'exported' without ever loading it onto a ship, simply by transmitting it over telephone lines from one country to another, so freight rates and cargo-handling schedules become insignificant factors in deciding where to make the product. Businesses can base their operations on other considerations, such as the availability of lab space, while worrying less about the cost of delivering their output.<br><br>

                                <strong>G</strong> In many countries deregulation has helped to drive the process along. But, behind the scenes, a series of technological innovations known broadly as containerisation and inter-modal transportation has led to swift productivity improvements in cargo-handling. Forty years ago, the process of exporting or importing involved a great many stages of handling, which risked portions of the shipment being damaged or stolen along the way. The invention of the container crane made it possible to load and unload containers without capsizing the ship and the adoption of standard container sizes allowed almost any box to be transported on any ship. By 1967, dual-purpose ships, carrying loose cargo in the hold* and containers on the deck, were giving way to all-container vessels that moved thousands of boxes at a time.<br><br>

                                <strong>H</strong> The shipping container transformed ocean shipping into a highly efficient, intensely competitive business. But getting the cargo to and from the dock was a different story. National governments, by and large, kept a much firmer hand on truck and railroad tariffs than on charges for ocean freight. This started changing, however, in the mid-1970s, when America began to deregulate its transportation industry. First airlines, then road hauliers and railways, were freed from restrictions on what they could carry, where they could haul it and what price they could charge. Between 1985 and 1996, for example, America's freight railways dramatically reduced their employment, trackage, and their fleets of locomotives - while increasing the amount of cargo they hauled. Europe's railways have also shown marked, albeit smaller, productivity improvements.<br><br>

                                <strong>I</strong> In America the period of huge productivity gains in transportation may be almost over, but in most countries the process still has far to go. State ownership of railways and airlines, regulation of freight rates and toleration of anti-competitive practices, such as cargo-handling monopolies, all keep the cost of shipping unnecessarily high and deter international trade. Bringing these barriers down would help the world's economies grow even closer.</p>
                            </div>
                            </div>
                            <!-- Column 2 -->
                            <div class="col-md-6 question_site">
                                <h3><strong>Questions 14-17</strong></h3>
                                <p>Reading Passage 2 has six paragraphs, A-I. Whch paragraph contains the following information? Choose the correct letter A-I for each information.</p>
                                <p>N:B: You may use any letter more than once.</p>

                                <table class="matching-grid" id="q14_17_grid">
                                    <thead>
                                        <tr>
                                            <th style="width: auto;"></th>
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
                                        <tr>
                                            <td><strong>14</strong> a suggestion for improving trade in the future</td>
                                            <td class="choice-cell tick-cell" data-row="14" data-value="A"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="14" data-value="B"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="14" data-value="C"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="14" data-value="D"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="14" data-value="E"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="14" data-value="F"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="14" data-value="G"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="14" data-value="H"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="14" data-value="I"><span class="tick">✓</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>15</strong> the effects of the introduction of electronic delivery</td>
                                            <td class="choice-cell tick-cell" data-row="15" data-value="A"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="15" data-value="B"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="15" data-value="C"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="15" data-value="D"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="15" data-value="E"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="15" data-value="F"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="15" data-value="G"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="15" data-value="H"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="15" data-value="I"><span class="tick">✓</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>16</strong> the similar cost involved in transporting a product from abroad or from a local supplier</td>
                                            <td class="choice-cell tick-cell" data-row="16" data-value="A"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="16" data-value="B"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="16" data-value="C"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="16" data-value="D"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="16" data-value="E"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="16" data-value="F"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="16" data-value="G"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="16" data-value="H"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="16" data-value="I"><span class="tick">✓</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>17</strong> the weakening relationship between the value of goods and the cost of their delivery</td>
                                            <td class="choice-cell tick-cell" data-row="17" data-value="A"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="17" data-value="B"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="17" data-value="C"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="17" data-value="D"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="17" data-value="E"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="17" data-value="F"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="17" data-value="G"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="17" data-value="H"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="17" data-value="I"><span class="tick">✓</span></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div style="display:none;">
                                    <input type="text" name="q14" placeholder="14" id="14" value="{{ $answers[14] ?? '' }}">
                                    <input type="text" name="q15" placeholder="15" id="15" value="{{ $answers[15] ?? '' }}">
                                    <input type="text" name="q16" placeholder="16" id="16" value="{{ $answers[16] ?? '' }}">
                                    <input type="text" name="q17" placeholder="17" id="17" value="{{ $answers[17] ?? '' }}">
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Questions 18-22</strong></h3>
                                    <p>Choose TRUE if the statement agrees with the information given in the text, choose FALSE if the statement contradicts the information, or choose NOT GIVEN if there is no information on this.</p>

                                    <div class="tfng-block" id="q18_22_tfng">
                                        <div class="tfng-item open">
                                            <div class="tfng-head">
                                                <div class="tfng-num">18</div>
                                                <div class="tfng-q">International trade is increasing at a greater rate than the world economy.</div>
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
                                                <div class="tfng-q">Cheap labour guarantees effective trade conditions.</div>
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
                                                <div class="tfng-q">Japan imports more meat and steel than France.</div>
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
                                                <div class="tfng-q">Most countries continue to prefer to trade with nearby nations.</div>
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
                                                <div class="tfng-q">Small computer components are manufactured in Germany.</div>
                                            </div>
                                            <div class="tfng-options">
                                                <label><input type="radio" name="q22" value="TRUE" {{ ($answers[22] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                                <label><input type="radio" name="q22" value="FALSE" {{ ($answers[22] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                                <label><input type="radio" name="q22" value="NOT GIVEN" {{ ($answers[22] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT GIVEN</span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Questions 23-26</strong></h3>
                                    <p>Complete the summary using the list of words. Choose the correct word and move it into the gap.</p>

                                    <p class="mt-3"><strong>THE TRANSPORT REVOLUTION</strong></p>

                                    <p>Modern cargo-handling methods have had a significant effect on 
                                        <span class="dd-gap" data-q="23"><span class="dd-placeholder">23</span></span>
                                        <input type="hidden" name="q23" id="23" value="{{ $answers[23] ?? '' }}">
                                        as the business of moving freight around the world becomes increasingly streamlined.
                                    </p>

                                    <p>Manufacturers of computers, for example, are able to import 
                                        <span class="dd-gap" data-q="24"><span class="dd-placeholder">24</span></span>
                                        <input type="hidden" name="q24" id="24" value="{{ $answers[24] ?? '' }}">
                                        from overseas, rather than having to rely on a local supplier. The introduction of 
                                        <span class="dd-gap" data-q="25"><span class="dd-placeholder">25</span></span>
                                        <input type="hidden" name="q25" id="25" value="{{ $answers[25] ?? '' }}">
                                        has also helped reduce transport costs because freight companies are less likely to charge for 
                                        <span class="dd-gap" data-q="26"><span class="dd-placeholder">26</span></span>
                                        <input type="hidden" name="q26" id="26" value="{{ $answers[26] ?? '' }}">
                                       .
                                    </p>

                                    <div class="dd-wordbank" id="q23_26_wordbank">
                                        <span class="dd-word" draggable="true" data-letter="A" data-word="tariffs"><span>tariffs</span></span>
                                        <span class="dd-word" draggable="true" data-letter="B" data-word="components"><span>components</span></span>
                                        <span class="dd-word" draggable="true" data-letter="C" data-word="container ships"><span>container ships</span></span>
                                        <span class="dd-word" draggable="true" data-letter="D" data-word="output"><span>output</span></span>
                                        <span class="dd-word" draggable="true" data-letter="E" data-word="employees"><span>employees</span></span>
                                        <span class="dd-word" draggable="true" data-letter="F" data-word="insurance costs"><span>insurance costs</span></span>
                                        <span class="dd-word" draggable="true" data-letter="G" data-word="trade"><span>trade</span></span>
                                        <span class="dd-word" draggable="true" data-letter="H" data-word="freight"><span>freight</span></span>
                                        <span class="dd-word" draggable="true" data-letter="I" data-word="fares"><span>fares</span></span>
                                        <span class="dd-word" draggable="true" data-letter="J" data-word="software"><span>software</span></span>
                                        <span class="dd-word" draggable="true" data-letter="K" data-word="international standards"><span>international standards</span></span>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- question part 3 -->
                <div class="tab-content " id="part3" style="margin-bottom: 80px;">
                    <div class="question_part">
                        <h4>Part 3</h4>
                        <p>Read the text below and answer questions 27-40
                        </p>
                    </div>
            <div class="mt-4">

                <div class="row">
                    <!-- Column 1 -->
                    <div class="col-md-6">
                        <div class="scroll-box" style="text-align:left;">
                             
                                <h4><strong>The effects of light on plant and animal species</strong></h4>
                                <p>Light is important to organisms for two different reasons. Firstly it is used as a cue for the timing of daily and seasonal rhythms in both plane and animals, and secondly it is used to assist growth in plants.<br><br>

Breeding in most organisms occurs during a part. of the year only, and so a reliable cue is needed to trigger breeding behaviour. Day length is an excellent cue, because it provides a perfectly predictable pattern of change within the year. In the temperate zone in spring, temperatures fluctuate greatly from day to day, but day length increases steadily by a predictable amount. The seasonal change of day length on physiological responses is called photoperiodism, and the amount of experimental evidence for this phenomenon is considerable. For example, some species of birds' breeding can be induced even in midwinter simply by increasing day length artificially (Wolfson 1964). Other examples of photoperiodism occur in plants. A short-day plant flowers when the day is less than a certain critical length. A long-day plant flowers after a certain critical day length is exceeded. In both cases the critical day length differs from species to species. Plane which flower after a period of vegetative growth, regardless of photoperiod, are known as day-neutral plants.<br><br>

Breeding seasons in animals such as birds have evolved to occupy the part of the year in which offspring have the greatest chances of survival. Before the breeding season begins, food reserves must be built up to support the energy cost of reproduction, and to provide for young birds both when they are in the nest and after fledging. Thus many temperate-zone birds use the increasing day lengths in spring as a cue to begin the nesting cycle, because this is a point when adequate food resources will be assured.<br><br>

The adaptive significance of photoperiodism in plane is also clear. Short-day plane that flower in spring in the temperate zone are adapted to maximising seedling growth during the growing season. Long-day plants are adapted for situations that require fertilization by insects, or a long period of seed ripening. Short-day plane that flower in the autumn in the temperate zone are able to build up food reserves over the growing season and over winter as seeds. Day-neutral plane have an evolutionary advantage when the connection between the favourable period for reproduction and day length is much less certain. For example, desert annuals germinate, flower and seed whenever suitable rainfall occurs, regardless of the day length.<br><br>

The breeding season of some plants can be delayed to extraordinary lengths. Bamboos are perennial grasses that remain in a vegetative state for many years and then suddenly flower, fruit and die (Evans 1976). Every bamboo of the species Chusquea abietifolia on the island of Jamaica flowered, set seed and died during 1884. The next generation of bamboo flowered and died between 1916 and 1918, which suggests a vegetative cycle of about 31 years. The climatic trigger for this flowering cycle is not-yet known, but the adaptive significance is clear. The simultaneous production of masses of bamboo seeds (in some cases as many as 12 to 15 centimetres deep on the ground) is more than all the seed-eating animals can cope with at the time, so that some seeds escape being eaten and grow up to form the next generation (Evans 1976).<br><br>

The second reason light is important to organisms is that it is essential for photosynthesis. This is the process by which plants use energy from the sun to convert carbon from soil or water into organic material for growth. The rate of photosynthesis in a plant can be measured by calculating the rate of its uptake of carbon. There is a wide range of photosynthetic responses of plants to variations in light intensity. Some plants reach maximal photosynthesis at one-quarter full sunlight, and others, like sugarcane, never reach a maximum, but continue to increase photosynthesis rate as light intensity rises.<br><br>

Plants in general can be divided into two groups: shade-tolerant species and shade-intolerant species. This classification is commonly used in forestry and horticulture. Shade-tolerant plane have lower photosynthetic rates and hence have lower growth rates than those of shade-intolerant species. Plant species become adapted to living in a certain kind of habitat, and in the process evolve a series of characteristics that prevent them from occupying other habitats. Grime ( 1966) suggests that light may be one of the major components directing these adaptations. For example, eastern hemlock seedlings are shade-tolerant. They can survive in the forest understory under very low light levels because they have a low photosynthetic rate.</p>
                        </div>
                        
                    </div>
                    <div class="col-md-6 question_site">
                                <h3><strong>Questions 27-33</strong></h3>
                                <p>Choose TRUE if the statement agrees with the information given in the text, choose FALSE if the statement contradicts the information, or choose NOT GIVEN if there is no information on this.</p>

                                <div class="tfng-block" id="q27_33_tfng">
                                    <div class="tfng-item open">
                                        <div class="tfng-head">
                                            <div class="tfng-num">27</div>
                                            <div class="tfng-q">There is plenty of scientific evidence to support photoperiodism.</div>
                                        </div>
                                        <div class="tfng-options">
                                            <label><input type="radio" name="q27" value="TRUE" {{ ($answers[27] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                            <label><input type="radio" name="q27" value="FALSE" {{ ($answers[27] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                            <label><input type="radio" name="q27" value="NOT GIVEN" {{ ($answers[27] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT GIVEN</span></label>
                                        </div>
                                    </div>

                                    <div class="tfng-item">
                                        <div class="tfng-head">
                                            <div class="tfng-num">28</div>
                                            <div class="tfng-q">Some types of bird can be encouraged to breed out of season.</div>
                                        </div>
                                        <div class="tfng-options">
                                            <label><input type="radio" name="q28" value="TRUE" {{ ($answers[28] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                            <label><input type="radio" name="q28" value="FALSE" {{ ($answers[28] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                            <label><input type="radio" name="q28" value="NOT GIVEN" {{ ($answers[28] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT GIVEN</span></label>
                                        </div>
                                    </div>

                                    <div class="tfng-item">
                                        <div class="tfng-head">
                                            <div class="tfng-num">29</div>
                                            <div class="tfng-q">Photoperiodic is restricted to certain geographic areas.</div>
                                        </div>
                                        <div class="tfng-options">
                                            <label><input type="radio" name="q29" value="TRUE" {{ ($answers[29] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                            <label><input type="radio" name="q29" value="FALSE" {{ ($answers[29] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                            <label><input type="radio" name="q29" value="NOT GIVEN" {{ ($answers[29] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT GIVEN</span></label>
                                        </div>
                                    </div>

                                    <div class="tfng-item">
                                        <div class="tfng-head">
                                            <div class="tfng-num">30</div>
                                            <div class="tfng-q">Desert annuals are examples of long-day plants.</div>
                                        </div>
                                        <div class="tfng-options">
                                            <label><input type="radio" name="q30" value="TRUE" {{ ($answers[30] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                            <label><input type="radio" name="q30" value="FALSE" {{ ($answers[30] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                            <label><input type="radio" name="q30" value="NOT GIVEN" {{ ($answers[30] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT GIVEN</span></label>
                                        </div>
                                    </div>

                                    <div class="tfng-item">
                                        <div class="tfng-head">
                                            <div class="tfng-num">31</div>
                                            <div class="tfng-q">Bamboos flower several times during their life cycle.</div>
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
                                            <div class="tfng-q">Scientists have yet to determine the cue for Chusquea abietifolia's seasonal rhythm.</div>
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
                                            <div class="tfng-q">Eastern hemlock is a fast-growing plant.</div>
                                        </div>
                                        <div class="tfng-options">
                                            <label><input type="radio" name="q33" value="TRUE" {{ ($answers[33] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                            <label><input type="radio" name="q33" value="FALSE" {{ ($answers[33] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                            <label><input type="radio" name="q33" value="NOT GIVEN" {{ ($answers[33] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT GIVEN</span></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Questions 34-40</strong></h3>
                                    <p>Complete the sentences. Write <strong>NO MORE THAN THREE WORDS</strong> from the passage for each answer.</p>

                                    <p class="mt-3"> Day length is a useful cue for breeding in areas where <input type="text" name="q34" placeholder="34" style="padding:2px 5px; width:150px;" id="34" value="{{ $answers[34] ?? '' }}"> are unpredictable.</p>

                                    <p> Plants which do not respond to light levels are referred to as <input type="text" name="q35" placeholder="35" style="padding:2px 5px; width:150px;" id="35" value="{{ $answers[35] ?? '' }}"></p>

                                    <p> Birds in temperate climates associate longer days with nesting and the availability of <input type="text" name="q36" placeholder="36" style="padding:2px 5px; width:150px;" id="36" value="{{ $answers[36] ?? '' }}"></p>

                                    <p> Plants that flower when days are long often depend on <input type="text" name="q37" placeholder="37" style="padding:2px 5px; width:150px;" id="37" value="{{ $answers[37] ?? '' }}"> to help them reproduce.</p>

                                    <p> Desert annuals respond to <input type="text" name="q38" placeholder="38" style="padding:2px 5px; width:150px;" id="38" value="{{ $answers[38] ?? '' }}"> as a signal for reproduction.</p>

                                    <p> There is no limit to the photosynthetic rate in plants such as <input type="text" name="q39" placeholder="39" style="padding:2px 5px; width:150px;" id="39" value="{{ $answers[39] ?? '' }}"> .</p>

                                    <p> Tolerance to shade is one criterion for the <input type="text" name="q40" placeholder="40" style="padding:2px 5px; width:150px;" id="40" value="{{ $answers[40] ?? '' }}"> of plants in forestry and horticulture.</p>
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
            </div>
            <span class="question-placeholder">14 of 26</span>
        </div>
        <div class="tab " data-tab="part3">
            <span class="tab-title">Part 3</span>
            <div class="question-links">
                <a href="#" class="question-link" data-question="27">27</a>
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

    {{-- alart and timer script and finished test script  added in frontend layout  CommonScript --}}

    @include('front_end.layout.commonScript');

    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
                startModalEl.addEventListener('hidden.bs.modal', function() {
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
                }, true);

                // Enter key triggers start button
                studentIdInput.addEventListener('keydown', function(event) {
                    if (event.key === 'Enter') {
                        event.preventDefault();
                        startTestBtn.click();
                    }
                });
            }

            if (testForm) {
                testForm.addEventListener('keydown', function(event) {
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
                }).catch(() => {});
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
                input.addEventListener('change', function() {
                    markDirty(this);
                });
            });

            if (testForm) {
                testForm.addEventListener('submit', function(e) {
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
                    setTimeout(() => inputField.focus(), 400); // wait till scroll completes
                }
            }

            function setActiveQuestion(index) {
                currentIndex = index;
                const qNum = allLinks[index].getAttribute('data-question');

                highlightLinkAndNumber(qNum);
                activateTabForQuestion(qNum);
                scrollAndFocus(qNum);
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
        const contextMenu = document.getElementById('customContextMenu');
        const highlightOption = document.getElementById('highlightOption');
        const notesOption = document.getElementById('notesOption');
        const clearOption = document.getElementById('clearOption');
        const allClearOption = document.getElementById('allClear');
        let selectionRange = null;
        let activePopup = null; // track the active popup

        let clickedMark = null; // Track which mark was right-clicked
        
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

            const startCell = getTableCell(startContainer);
            const endCell = getTableCell(endContainer);

            if (startCell && endCell && startCell !== endCell) {
                if (startContainer && startContainer.nodeType === Node.TEXT_NODE) {
                    const selectedText = startContainer.textContent.substring(startOffset);
                    if (selectedText.trim()) {
                        const mark = document.createElement('mark');
                        mark.style.backgroundColor = 'yellow';
                        if (typeof markInitializer === 'function') markInitializer(mark);
                        mark.textContent = selectedText;

                        const beforeText = startContainer.textContent.substring(0, startOffset);
                        const parent = startContainer.parentNode;
                        if (beforeText) parent.insertBefore(document.createTextNode(beforeText), startContainer);
                        parent.insertBefore(mark, startContainer);
                        parent.removeChild(startContainer);
                        marks.push(mark);
                    }
                }
                return marks;
            }

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
        highlightOption.addEventListener('click', function() {
            if (selectionRange) {
                highlightRange(selectionRange);
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
                const markId = String(Date.now());
                const marks = highlightRange(selectionRange, (m) => {
                    m.setAttribute('data-tooltip', '');
                    m.setAttribute('data-note', '');
                    m.dataset.markId = markId;
                });

                const mark = marks[0];
                if (!mark) {
                    contextMenu.style.display = 'none';
                    return;
                }

                // Add click event to show note popup
                marks.forEach((mk) => {
                    mk.addEventListener('click', function(e) {
                        e.stopPropagation();
                        showNotePopup(mk);
                    });
                });

                // Also add entry to sidebar
                const sidebar = document.getElementById('sidebar');
                const noteDiv = document.createElement('div');
                noteDiv.classList.add('sidebar-note-item');
                noteDiv.innerHTML = `
                    <div class="sidebar-header" style="margin-bottom: 3px; cursor: pointer;">${mark.innerText}</div>
                    <div class="sidebar-note-content" style="color: #666; white-space: pre-wrap;"></div>
                `;
                noteDiv.style.borderBottom = '1px solid #ccc';
                noteDiv.style.padding = '8px';
                
                // Store reference to mark element
                noteDiv.dataset.markId = markId;
                
                sidebar.appendChild(noteDiv);

                // Click sidebar item to open popup
                noteDiv.addEventListener('click', () => {
                    showNotePopup(mark);
                });

                // Immediately show popup for new note
                showNotePopup(mark);
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

            const notePopup = document.createElement('div');
            notePopup.classList.add('note-popup');
            notePopup.innerHTML = `
        <div class="drag-handle" style="background: linear-gradient(to bottom, #f0f0f0, #d0d0d0); padding: 8px; cursor: move; border-bottom: 2px solid #999; display: flex; justify-content: space-between; align-items: center; user-select: none;">
            <span style="font-size: 12px; color: #666;"> Drag to move</span>
            <span class="close-note" style="cursor: pointer; font-size: 20px; font-weight: bold; color: #666;">&times;</span>
        </div>
        <div class="popup-header" contenteditable="true" style="font-weight: bold; cursor: text; padding: 8px; background: rgba(0,0,0,0.05); margin-bottom: 5px; border: 1px solid #ccc; outline: none;">${mark.innerText}</div>
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
       {{-- input auto sujection off  --}}
    <script>
                document.addEventListener('DOMContentLoaded', function() {
            // Get all input fields within the form
            const inputs = document.querySelectorAll('#testForm input');

            // Loop through each input and set autocomplete="off"
            inputs.forEach(function(input) {
                input.setAttribute('autocomplete', 'off');
            });

            const textInputs = document.querySelectorAll('#testForm input[type="text"]');
            textInputs.forEach((input) => {
                input.addEventListener('focus', () => {
                    if (typeof input.dataset.originalPlaceholder === 'undefined') {
                        input.dataset.originalPlaceholder = input.getAttribute('placeholder') || '';
                    }
                    input.setAttribute('placeholder', '');
                });

                input.addEventListener('blur', () => {
                    if ((input.value || '').trim() !== '') return;
                    if (typeof input.dataset.originalPlaceholder !== 'undefined') {
                        input.setAttribute('placeholder', input.dataset.originalPlaceholder);
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

            function clearRowSelection(rowNumber) {
                document.querySelectorAll(`.tick-cell[data-row="${rowNumber}"]`).forEach(function(cell) {
                    cell.classList.remove('selected');
                });
            }

            function setMatchingAnswer(qNum, value) {
                const hiddenText = document.getElementById(String(qNum));
                if (hiddenText) {
                    hiddenText.value = value;
                    hiddenText.dispatchEvent(new Event('change'));
                }

                clearRowSelection(qNum);
                const cell = document.querySelector(`.tick-cell[data-row="${qNum}"][data-value="${CSS.escape(value)}"]`);
                if (cell) cell.classList.add('selected');
            }

            [14, 15, 16, 17].forEach((qNum) => {
                const hidden = document.getElementById(String(qNum));
                const val = hidden ? (hidden.value || '').trim() : '';
                if (val) setMatchingAnswer(qNum, val);
            });

            function setBottomActiveQuestionLink(qNum) {
                const allLinks = Array.from(document.querySelectorAll('.question-link'));
                allLinks.forEach((l) => l.classList.remove('active'));
                const target = allLinks.find((l) => l.getAttribute('data-question') === String(qNum));
                if (target) target.classList.add('active');
            }

            document.querySelectorAll('#q14_17_grid .tick-cell').forEach(function(cell) {
                cell.addEventListener('click', function() {
                    const row = parseInt(cell.getAttribute('data-row'), 10);
                    const val = cell.getAttribute('data-value');
                    if (!row || !val) return;
                    setMatchingAnswer(row, val);
                    setBottomActiveQuestionLink(row);
                });
            });

            document.querySelectorAll('#q14_17_grid tbody tr').forEach(function(rowEl) {
                rowEl.addEventListener('click', function(e) {
                    if (e.target && e.target.closest && e.target.closest('.tick-cell')) return;
                    const firstStrong = rowEl.querySelector('td strong');
                    const qNum = firstStrong ? parseInt(firstStrong.textContent, 10) : NaN;
                    if (!qNum) return;
                    setBottomActiveQuestionLink(qNum);
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

            initTfngAccordion('q18_22_tfng');
            initTfngAccordion('q27_33_tfng');

            const wordBank = document.getElementById('q23_26_wordbank');
            const gaps = document.querySelectorAll('.dd-gap[data-q]');

            const DEFAULT_GAP_MIN_WIDTH_PX = 160;

            function resetGapWidth(gapEl) {
                if (!gapEl) return;
                gapEl.style.width = '';
                gapEl.style.minWidth = DEFAULT_GAP_MIN_WIDTH_PX + 'px';
            }

            function setGapWidthToWord(gapEl, wordEl) {
                if (!gapEl || !wordEl) return;
                const w = wordEl.offsetWidth || 0;
                if (w <= 0) return;
                gapEl.style.width = w + 'px';
                gapEl.style.minWidth = w + 'px';
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
                    const qNum = gap.getAttribute('data-q');
                    if (qNum) setBottomActiveQuestionLink(qNum);
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
        });
    </script>


</body>

</html>
