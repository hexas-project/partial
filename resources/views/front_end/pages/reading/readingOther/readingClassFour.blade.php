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

        /* Remove outline and prevent border color change when focused */
        input[type="text"]:focus {
            outline: none;
        }

        /* Hide placeholder when input is focused */
        input[type="text"]:focus::placeholder {
            opacity: 0;
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

        .mcq-options input[type="radio"] {
            margin-top: 4px;
            flex-shrink: 0;
        }

        .mcq-options span {
            flex: 1;
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
    </style>
</head>

<body>
    <form action="{{ route('reading.submit') }}" method="POST" id="testForm" spellcheck="false" autocomplete="off">
        @csrf

        @php
            $answers = $answers ?? [];
        @endphp

        {{-- hidden input  --}}
        <input type="hidden" name="test_name" value="class04_reading">
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
                                    
                                    
                                    <h4><strong>Creating Artificial Reefs</strong></h4>

                                    <p>In the coastal waters of the US, a nation's leftovers have been discarded. Derelict ships, concrete blocks, scrapped cars, army tanks, tyres filled with concrete and redundant planes litter the sea floor. However, scientists are now discovering that this is not waste disposal, but part of a coordinated, state-run program me. To recently arrived fish, plants and other sea organisms, these artificial reefs are an ideal home, offering food and shelter.<br><br>

Sea-dumping incites widespread condemnation. Little surprise when oceans are seen as 'convenient' dumping grounds for the rubbish we have created but would rather forget. However, scientific evidence suggests that if we dump the right things, sea life can actually be enhanced. And more recently, purpose-built structures of steel or concrete have been employed - some the size of small apartment blocks - principally to increase fish harvests. Strong currents, for example, the choice of design and materials for an artificial reef depends on where it is going to be placed. In areas of a solid concrete structure will be more appropriate than timber, which also depends on what species are to be attracted. It is pointless creating high-rise structures for fish that prefer flat or low-relief habitat. But the most important consideration is the purpose of the reef.<br><br>

In the US, where there is a national reef plan using cleaned up rigs and tanks, artificial reefs have mainly been used to attract fish for recreational fishing or sport-diving. But there are many other ways in which they can be used to manage the marine habitat. For as well as protecting existing habitat, providing purpose-built accommodation for commercial species (such as lobsters and octopi) and acting as sea defences, they can be efficient at protecting fish nurseries.<br><br>

Japan, for example, has created vast areas of artificial habitat - rather than isolated reefs - to increase its fish stocks. In fact, the cultural and historical importance of seafood in Japan is reflected by the fact that it is a world leader in reef technology; what's more, those who construct and deploy reefs have sole rights to the harvest. In Europe, artificial reefs have been mainly employed to protect habitat. Particularly so in the Mediterranean where reefs have been sunk as physical obstacles to stop illegal trawling, which is destroying sea grass beds and the marine life that depends on them. 'If you want to protect areas of the seabed, you need something that will stop trawlers dead in their tracks,' says Dr Antony Jensen of the Southampton Oceanography Centre.<br><br>

Italy boasts considerable artificial reef activity. It deployed its first scientifically planned reef using concrete forms in 1974 to enhance fisheries and stop trawling. And Spain has built nearly 50 reefs in its waters, mainly to discourage trawling and enhance the productivity of fisheries. Meanwhile, Britain established its first quarried rock artificial reef in 1984 off the Scottish coast, to assess its potential for attracting commercial species.<br><br>

But while the scientific study of these structures is a little over a quarter of a century old, artificial reefs made out of readily available materials such as bamboo and coconuts have been used by fishermen for centuries. And the benefits have been enormous. By placing reefs close to home, fishermen can save time and fuel. And if the reefs are carefully managed, these areas can become so fished. In the Philippines, for example, where artificial reef programmes have been instigated in response to declining fish populations, catches often exceed the maximum potential new production of the artificial reef because there is no proper management control.<br><br>

There is no doubt that artificial reefs have lots to offer. And while purpose-built structures are effective, the real challenge now is to develop environmentally safe ways of using recycled waste to increase marine diversity. This will require scientific research. For example, the leachates from one of the most commonly used reef materials, tyres, could potentially be harmful to the creatures and plants that they are supposed to attract. Yet few extensive studies have been undertaken into the long- term effects of disposing of tyres at sea. And at the moment, there is little consensus about what is environmentally acceptable to dump at sea, especially when it comes to oil and gas rigs. Clearly, the challenge is to develop environmentally acceptable ways of disposing of our rubbish while enhancing marine life too. What we must never be allowed to do is have an excuse for dumping anything we like at sea.<br><br>

                                    




                                </div>


                            </div>
                            <!-- Column 2 -->
                            <div class="col-md-6 question_site">
                                <h3><strong>Questions 1-3</strong></h3>
                                <p>Choose <strong>THREE </strong>correct answers 1-3  The list below gives some of the factors that must be taken into account when deciding how to construct an artificial reef. Which <strong>THREE</strong> of these factors are mentioned by the writer of the article?.</p>
                                
                                <p><input type="checkbox" name="q1[]" value="A" id="1a"> <label for="1a">The fishing activity in the area</label></p>
                                <p><input type="checkbox" name="q1[]" value="B" id="1b"> <label for="1b">The intended location of the reef</label></p>
                                <p><input type="checkbox" name="q1[]" value="C" id="1c"> <label for="1c">The existing reef structures</label></p>
                                <p><input type="checkbox" name="q1[]" value="D" id="1d"> <label for="1d">The type of marine life being targeted</label></p>
                                <p><input type="checkbox" name="q1[]" value="E" id="1e"> <label for="1e">The function of the reef</label></p>
                                <p><input type="checkbox" name="q1[]" value="F" id="1f"> <label for="1f">The cultural importance of the area</label></p>

                                <div class="mt-5">
                                    <h3><strong>Questions 4-8</strong></h3>
                                    <p>Complete the table. Write <strong>NO MORE THAN THREE WORDS</strong> from the text in each gap.</p>
                                    
                                    <table class="table table-bordered mt-3">
                                        <thead>
                                            <tr>
                                                <th>Area/Country</th>
                                                <th>Type of Reef</th>
                                                <th>Purpose</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>US</td>
                                                <td>Made using old <input type="text" name="q4" placeholder="4" style="padding:5px; width:120px;" id="4"></td>
                                                <td>To attract fish for leisure activities</td>
                                            </tr>
                                            <tr>
                                                <td>Japan</td>
                                                <td>Forms large area of artificial habitat</td>
                                                <td>to improve <input type="text" name="q5" placeholder="5" style="padding:5px; width:120px;" id="5"></td>
                                            </tr>
                                            <tr>
                                                <td>Europe</td>
                                                <td>lies deep down to form <input type="text" name="q6" placeholder="6" style="padding:5px; width:120px;" id="6"></td>
                                                <td>to act as a sea defence</td>
                                            </tr>
                                            <tr>
                                                <td>Italy</td>
                                                <td>Consists of pyramid shapes of <input type="text" name="q7" placeholder="7" style="padding:5px; width:120px;" id="7"></td>
                                                <td>to prevent trawling</td>
                                            </tr>
                                            <tr>
                                                <td>Britain</td>
                                                <td>made of rock</td>
                                                <td>to encourage <input type="text" name="q8" placeholder="8" style="padding:5px; width:120px;" id="8"> Fish species</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Questions 9-12</strong></h3>
                                    <p>Using <strong>NO MORE THAN THREE WORDS</strong>, complete the following sentences. Write your answers from the text in each gap.</p>
                                    
                                    <p class="mt-3">In <input type="text" name="q9" placeholder="9" style="padding:5px; width:150px;" id="9"> people who build reefs are legally entitled to all the fish they attract. Trawling inhibits the development of marine life because it damages the <input type="text" name="q10" placeholder="10" style="padding:5px; width:150px;" id="10">. In the past, both <input type="text" name="q11" placeholder="11" style="padding:5px; width:150px;" id="11"> were used to make reefs. To ensure that reefs are not over-fished, good <input type="text" name="q12" placeholder="12" style="padding:5px; width:150px;" id="12"> is required.</p>
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Question 13</strong></h3>
                                    <p><strong>Choose the correct answer.</strong></p>

                                    <div class="mcq-block" id="q13_mcq">
                                        <div class="mcq-item open">
                                            <div class="mcq-head">
                                                <div class="mcq-num">13</div>
                                                <div class="mcq-q">According to the writer, the next step in the creation of artificial reefs is</div>
                                            </div>
                                            <div class="mcq-options">
                                                <label><input type="radio" name="q13" value="A"> <span>to produce an international agreement.</span></label>
                                                <label><input type="radio" name="q13" value="B"> <span>to expand their use in the marine environment.</span></label>
                                                <label><input type="radio" name="q13" value="C"> <span>to examine their dangers to marine life.</span></label>
                                                <label><input type="radio" name="q13" value="D"> <span>to improve on purpose-built structures.</span></label>
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
                        <p>Read the text below and answer questions 14-27
                        </p>
                    </div>
                    <div class="mt-4">

                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-md-6">
                                <div class="scroll-box" style="text-align:left;">
                                    
                                    
                                    <h4><strong>The Motor Car</strong></h4>

                                    <p><strong>A.</strong> There are now over 700 million motor vehicles in the world - and the number is rising by more than 40 million each year. The average distance driven by car users is growing too - from 8 km a day per person in western Europe in 1965 to 25 km a day in 1995. This dependence on motor vehicles has given rise to major problems, including environmental pollution, depletion of oil resources, traffic congestion and safety.<br><br>

<strong>B</strong> .While emissions from new cars are far less harmful than they used to be, city streets and motorways are becoming more crowded than ever, often with older trucks, buses and taxis, which emit excessive levels of smoke and fumes. This concentration of vehicles makes air quality in urban areas unpleasant and sometimes dangerous to breathe. Even Moscow has joined the list of capitals afflicted by congestion and traffic fumes. In Mexico City, vehicle pollution is a major health hazard.<br><br>

<strong>C.</strong> Until a hundred years ago, most journeys were in the 20 km range, the distance conveniently accessible by horse. Heavy freight could only be delivered by water or rail. The invention of the motor vehicle brought personal mobility to the masses and made rapid freight delivery possible over a much wider area. Today about 90 per cent of inland freight in the United Kingdom is carried by road. Clearly the world cannot revert to the horse-drawn wagon. Can it avoid being locked into congested and polluting ways of transporting people and goods?<br><br>

<strong>D.</strong> In Europe most cities are still designed for the old modes of transport. Adaptation to the motor car has involved adding ring roads, one-way systems and parking lots. In the United States, more land is assigned to car use than to housing. Urban sprawl means that life without a car is next to impossible. Mass use of motor vehicles has also been blamed on the car such as alienation and aggressive human behaviour.<br><br>

<strong>E.</strong> A 1993 study by the European Federation for Transport and Environment found that car transport is seven times as costly as rail travel in terms of the external social costs it entails such as congestion, accidents, pollution, loss of cropland and natural habitats, depletion of oil resources, and so on. Yet cars easily surpass trains or buses as a flexible and convenient mode of personal transport. It is unrealistic to expect people to give up private cars in favour of mass transit.<br><br>

<strong>F</strong> .Technical solutions can reduce the pollution problem and increase the fuel efficiency of engines. But fuel consumption and exhaust emissions depend on which cars are preferred by customers and how they are driven. Many people buy larger cars than they need for daily purposes or waste fuel by driving aggressively. Besides, global car use is increasing at a faster rate than the improvement in emissions and fuel efficiency which technology is now making possible.<br><br>

<strong>G.</strong> One solution that has been put forward is the long-term solution of designing cities and neighbourhoods so that car journeys are not necessary - all essential services being located within walking distance or easily accessible by public transport. Not only would this save energy and cut carbon dioxide emissions, it would also enhance the quality of community life, putting the emphasis on people instead of cars. Local government is already bringing this about in some places. But few democratic communities are blessed with the vision - and the capital - to make such profound changes in modern lifestyles.<br><br>

<strong>H.</strong> A more likely scenario seems to be a combination of mass transit systems for travel into and around cities, with small 'low emission' cars for urban use and larger hybrid or lean burn cars for use elsewhere. Electronically tolled highways might be used to ensure that drivers pay charges geared to actual road use. Better integration of transport systems is also highly desirable - and made more feasible by modern computers. But these are solutions for countries which can afford them. In most developing countries, old cars and old technologies continue to predominate.

                                    </p><br><br>



                                </div>
                            </div>
                            <!-- Column 2 -->
                            <div class="col-md-6 question_site">
                                <h3><strong>Questions 14-19</strong></h3>
                                <p>Reading Passage 2 has eight paragraphs, <strong>A- H.</strong> Which section contains the following information?</p>
                                <p><strong>NB:</strong> You may use any letter more than once.</p>

                                <table class="matching-grid" id="q14_19_grid">
                                    <thead>
                                        <tr>
                                            <th style="width: 400px;"></th>
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
                                        <tr>
                                            <td><strong>14</strong> a comparison of past and present transportation methods</td>
                                            <td class="choice-cell tick-cell" data-row="14" data-value="A"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="14" data-value="B"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="14" data-value="C"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="14" data-value="D"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="14" data-value="E"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="14" data-value="F"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="14" data-value="G"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="14" data-value="H"><span class="tick">✓</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>15</strong> how driving habits contribute to road problems</td>
                                            <td class="choice-cell tick-cell" data-row="15" data-value="A"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="15" data-value="B"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="15" data-value="C"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="15" data-value="D"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="15" data-value="E"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="15" data-value="F"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="15" data-value="G"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="15" data-value="H"><span class="tick">✓</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>16</strong> the relative merits of cars and public transport</td>
                                            <td class="choice-cell tick-cell" data-row="16" data-value="A"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="16" data-value="B"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="16" data-value="C"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="16" data-value="D"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="16" data-value="E"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="16" data-value="F"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="16" data-value="G"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="16" data-value="H"><span class="tick">✓</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>17</strong> the writer's own prediction of future solutions</td>
                                            <td class="choice-cell tick-cell" data-row="17" data-value="A"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="17" data-value="B"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="17" data-value="C"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="17" data-value="D"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="17" data-value="E"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="17" data-value="F"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="17" data-value="G"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="17" data-value="H"><span class="tick">✓</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>18</strong> the increasing use of motor vehicles</td>
                                            <td class="choice-cell tick-cell" data-row="18" data-value="A"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="18" data-value="B"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="18" data-value="C"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="18" data-value="D"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="18" data-value="E"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="18" data-value="F"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="18" data-value="G"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="18" data-value="H"><span class="tick">✓</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>19</strong> the impact of the car on city development</td>
                                            <td class="choice-cell tick-cell" data-row="19" data-value="A"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="19" data-value="B"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="19" data-value="C"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="19" data-value="D"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="19" data-value="E"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="19" data-value="F"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="19" data-value="G"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="19" data-value="H"><span class="tick">✓</span></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div style="display:none;">
                                    <input type="text" name="q14" placeholder="14" id="14">
                                    <input type="text" name="q15" placeholder="15" id="15">
                                    <input type="text" name="q16" placeholder="16" id="16">
                                    <input type="text" name="q17" placeholder="17" id="17">
                                    <input type="text" name="q18" placeholder="18" id="18">
                                    <input type="text" name="q19" placeholder="19" id="19">
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Questions 20-26</strong></h3>
                                    <p><em>Choose <strong>TRUE</strong> if the statement agrees with the information given in the text, choose <strong>FALSE</strong> if the statement contradicts the information, or choose <strong>NOT GIVEN</strong> if there is no information on this.</em></p>

                                    <div class="tfng-block" id="q20_26_tfng">
                                        <div class="tfng-item open">
                                            <div class="tfng-head">
                                                <div class="tfng-num">20</div>
                                                <div class="tfng-q">Vehicle pollution is worse in European cities than anywhere else.</div>
                                            </div>
                                            <div class="tfng-options">
                                                <label><input type="radio" name="q20" value="TRUE"> <span>TRUE</span></label>
                                                <label><input type="radio" name="q20" value="FALSE"> <span>FALSE</span></label>
                                                <label><input type="radio" name="q20" value="NOT GIVEN"> <span>NOT GIVEN</span></label>
                                            </div>
                                        </div>

                                        <div class="tfng-item">
                                            <div class="tfng-head">
                                                <div class="tfng-num">21</div>
                                                <div class="tfng-q">Transport by horse would be a useful alternative to motor vehicles.</div>
                                            </div>
                                            <div class="tfng-options">
                                                <label><input type="radio" name="q21" value="TRUE"> <span>TRUE</span></label>
                                                <label><input type="radio" name="q21" value="FALSE"> <span>FALSE</span></label>
                                                <label><input type="radio" name="q21" value="NOT GIVEN"> <span>NOT GIVEN</span></label>
                                            </div>
                                        </div>

                                        <div class="tfng-item">
                                            <div class="tfng-head">
                                                <div class="tfng-num">22</div>
                                                <div class="tfng-q">Nowadays freight is not carried by water in the United Kingdom.</div>
                                            </div>
                                            <div class="tfng-options">
                                                <label><input type="radio" name="q22" value="TRUE"> <span>TRUE</span></label>
                                                <label><input type="radio" name="q22" value="FALSE"> <span>FALSE</span></label>
                                                <label><input type="radio" name="q22" value="NOT GIVEN"> <span>NOT GIVEN</span></label>
                                            </div>
                                        </div>

                                        <div class="tfng-item">
                                            <div class="tfng-head">
                                                <div class="tfng-num">23</div>
                                                <div class="tfng-q">Most European cities were not designed for motor vehicles.</div>
                                            </div>
                                            <div class="tfng-options">
                                                <label><input type="radio" name="q23" value="TRUE"> <span>TRUE</span></label>
                                                <label><input type="radio" name="q23" value="FALSE"> <span>FALSE</span></label>
                                                <label><input type="radio" name="q23" value="NOT GIVEN"> <span>NOT GIVEN</span></label>
                                            </div>
                                        </div>

                                        <div class="tfng-item">
                                            <div class="tfng-head">
                                                <div class="tfng-num">24</div>
                                                <div class="tfng-q">Technology alone cannot solve the problem of vehicle pollution.</div>
                                            </div>
                                            <div class="tfng-options">
                                                <label><input type="radio" name="q24" value="TRUE"> <span>TRUE</span></label>
                                                <label><input type="radio" name="q24" value="FALSE"> <span>FALSE</span></label>
                                                <label><input type="radio" name="q24" value="NOT GIVEN"> <span>NOT GIVEN</span></label>
                                            </div>
                                        </div>

                                        <div class="tfng-item">
                                            <div class="tfng-head">
                                                <div class="tfng-num">25</div>
                                                <div class="tfng-q">People's choice of car and attitude to driving is a factor in the pollution problem.</div>
                                            </div>
                                            <div class="tfng-options">
                                                <label><input type="radio" name="q25" value="TRUE"> <span>TRUE</span></label>
                                                <label><input type="radio" name="q25" value="FALSE"> <span>FALSE</span></label>
                                                <label><input type="radio" name="q25" value="NOT GIVEN"> <span>NOT GIVEN</span></label>
                                            </div>
                                        </div>

                                        <div class="tfng-item">
                                            <div class="tfng-head">
                                                <div class="tfng-num">26</div>
                                                <div class="tfng-q">Redesigning cities would be a short-term solution.</div>
                                            </div>
                                            <div class="tfng-options">
                                                <label><input type="radio" name="q26" value="TRUE"> <span>TRUE</span></label>
                                                <label><input type="radio" name="q26" value="FALSE"> <span>FALSE</span></label>
                                                <label><input type="radio" name="q26" value="NOT GIVEN"> <span>NOT GIVEN</span></label>
                                            </div>
                                        </div>
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
                        <p>Read the text below and answer questions 28-40
                        </p>
                    </div>
                    <div class="mt-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="scroll-box" style="text-align:left;">
                                    
                                    <h4><strong>Information Theory- the Big Data</strong></h4>
                                    <p>Information theory lies at the heart of everything - from DVD players and the genetic code of DNA to the physics of the universe at its most fundamental. It has been central to the development of the science of communication, which enables data to be sent electronically and has therefore had a major impact on our lives.<br><br>

<strong>A.</strong> In April 2002 an event took place which demonstrated one of the many applications of information theory. The space probe, Voyager I, launched in 1977, had sent back spectacular images of Jupiter and Saturn and then soared out of the Solar System on a one-way mission to the stars. After 25 years of exposure to the freezing temperatures of deep space, the probe was beginning to show its age. Sensors and circuits were on the brink of failing and NASA's scientists realized that they had to do something or lose contact with their probe forever. The solution was to get a message to Voyager I to instruct it to use spares to change the failing parts. With the probe 12 billion kilometers from Earth, this was not an easy task. By means of a radio dish belonging to NASA's Deep Space Network, the message was sent out into the depths of space. Even travelling at the speed of light, it took over 11 hours to reach its target, far beyond the orbit of Pluto. Yet, incredibly, the little probe managed to hear the faint call from its home planet, and successfully made the switchover.<br><br>

<strong>B.</strong> It was the longest-distance repair job in history, and a triumph for the NASA engineers. But it also highlighted the astonishing power of the techniques developed by American communications engineer Claude Shannon, who had died just a year earlier. Born in 1916 in Petoskey, Michigan, Shannon showed an early talent for maths and for building gadgets, and made breakthroughs in the foundations of computer technology when still a student. While at Bell laboratories, Shannon developed information theory, but shunned the resulting acclaim. In the 1940s, he singlehandedly created an entire science of communication which has since inveigled its way into a host of applications, from DVDs to satellite communication to bar codes - any area, in short, where data has to be conveyed rapidly yet accurately.<br><br>

<strong>C.</strong> This all seems light years away from the down to-earth uses Shannon originally had for his work, which began when he was a 22-year—old graduate engineering student at the prestigious Massachusetts Institute of Technology in 1939. He set out with an apparently simple aim: to pin down the precise meaning of the concept of 'information'. The most basic form of information, Shannon argued, is whether something is true or false - which can be captured in the binary unit, or 'bit', of the form 1 or 0. Having identified this fundamental unit, Shannon set about defining otherwise vague ideas about information and how to transmit it from place to place. In the process he discovered something surprising: it is always possible to guarantee information will get through random interference - 'noise' — intact.<br><br>

<strong>D.</strong> Noise usually means unwanted sounds which interfere with genuine information. information theory generalizes this idea via theorems that capture the effects of noise mathematically. In particular, Shannon showed that noise sets a limit on the rate at which information can pass along communication channels while remaining error-free. This rate depends on the relative strengths of the signal and noise travelling down the communication channel, and on its capacity (its 'bandwidth'). The resulting limit, given in units of bits per second, is the absolute maximum rate of error-free communication given signal strength and noise level. The trick, Shannon showed, is to find ways of packaging up - 'coding' - information to cope with the ravages of noise, while staying within the information carrying capacity 'bandwidth' - of the communication system being used.<br><br>

<strong>E.</strong> Over the years scientists have devised many such coding methods, and they have proved crucial in many technological feats. The Voyager spacecraft transmitted data using codes which added one extra bit for every single bit of information; the result was an error rate of just one bit in 10,000 - and stunningly clear pictures of the planets. Other codes have become part of everyday life - such as the Universal Product Code, or bar code, which uses a simple error-detecting system: the last digit in the sequence is a check digit, confirming the accuracy of the other digits. As recently as 1993, engineers made a major breakthrough by discovering so-called turbo codes - which come very close to Shannon's ultimate limit for the maximum rate that data can be transmitted reliably, and now play a key role in the mobile videophone revolution.<br><br>

<strong>F.</strong> Shannon also laid the foundations of more efficient ways of storing information, by stripping out superfluous ('redundant') bits from data which contributed little real information. As mobile phone text messages like 'I CN C U' show, it is often possible to leave out a lot of data without losing much meaning. As with error correction, however, there's a limit beyond which messages become too ambiguous. Shannon showed how to calculate this limit, opening the way to the design of compression methods that cram maximum information into the minimum space.</p>
                                </div>
                            </div>
                            <div class="col-md-6 question_site">
                                <h3><strong>Questions 27-32</strong></h3>
                                <p>Reading Passage 3 has six paragraphs, <strong>A - F.</strong> Which section contains the following information?</p>
                                <p><strong>NB:</strong> You may use any letter more than once.</p>

                                <table class="matching-grid" id="q27_32_grid">
                                    <thead>
                                        <tr>
                                            <th style="width: 400px;"></th>
                                            <th class="choice-cell">A</th>
                                            <th class="choice-cell">B</th>
                                            <th class="choice-cell">C</th>
                                            <th class="choice-cell">D</th>
                                            <th class="choice-cell">E</th>
                                            <th class="choice-cell">F</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>27</strong> an explanation of the factors affecting the transmission of information</td>
                                            <td class="choice-cell tick-cell" data-row="27" data-value="A"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="27" data-value="B"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="27" data-value="C"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="27" data-value="D"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="27" data-value="E"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="27" data-value="F"><span class="tick">✓</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>28</strong> an example of how unnecessary information can be omitted</td>
                                            <td class="choice-cell tick-cell" data-row="28" data-value="A"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="28" data-value="B"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="28" data-value="C"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="28" data-value="D"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="28" data-value="E"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="28" data-value="F"><span class="tick">✓</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>29</strong> a reference to Shannon's attitude to fame</td>
                                            <td class="choice-cell tick-cell" data-row="29" data-value="A"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="29" data-value="B"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="29" data-value="C"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="29" data-value="D"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="29" data-value="E"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="29" data-value="F"><span class="tick">✓</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>30</strong> details of a machine capable of interpreting incomplete information</td>
                                            <td class="choice-cell tick-cell" data-row="30" data-value="A"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="30" data-value="B"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="30" data-value="C"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="30" data-value="D"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="30" data-value="E"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="30" data-value="F"><span class="tick">✓</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>31</strong> a detailed account of an incident involving information theory</td>
                                            <td class="choice-cell tick-cell" data-row="31" data-value="A"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="31" data-value="B"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="31" data-value="C"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="31" data-value="D"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="31" data-value="E"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="31" data-value="F"><span class="tick">✓</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>32</strong> a reference to what Shannon initially intended to achieve in his research</td>
                                            <td class="choice-cell tick-cell" data-row="32" data-value="A"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="32" data-value="B"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="32" data-value="C"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="32" data-value="D"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="32" data-value="E"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="32" data-value="F"><span class="tick">✓</span></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div style="display:none;">
                                    <input type="text" name="q27" placeholder="27" id="27">
                                    <input type="text" name="q28" placeholder="28" id="28">
                                    <input type="text" name="q29" placeholder="29" id="29">
                                    <input type="text" name="q30" placeholder="30" id="30">
                                    <input type="text" name="q31" placeholder="31" id="31">
                                    <input type="text" name="q32" placeholder="32" id="32">
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Questions 33-37</strong></h3>
                                    <p>Complete the notes below. Write <strong>NO MORE THAN TWO WORDS</strong> from the passage in each gap.</p>

                                    <h4 class="mt-3"><strong>The Voyager I Space Probe</strong></h4>

                                    <p>The probe transmitted pictures of both  <input type="text" name="q33_1" placeholder="33" style="padding:5px; width:150px;" id="q33_1" value="{{ isset($answers[33]) ? explode(' & ', $answers[33])[0] ?? '' : '' }}"> and <input type="text" name="q33_2" placeholder="33" style="padding:5px; width:150px;" id="q33_2" value="{{ isset($answers[33]) ? explode(' & ', $answers[33])[1] ?? '' : '' }}"> , then left the  <input type="text" name="q34" placeholder="34" style="padding:5px; width:150px;" id="q34" value="{{ $answers[34] ?? '' }}">. The freezing temperatures were found to have a negative effect on parts of the space probe. Scientists feared that both the  <input type="text" name="q35_1" placeholder="35" style="padding:5px; width:150px;" id="q35_1" value="{{ isset($answers[35]) ? explode(' & ', $answers[35])[0] ?? '' : '' }}"> and <input type="text" name="q35_2" placeholder="35" style="padding:5px; width:150px;" id="q35_2" value="{{ isset($answers[35]) ? explode(' & ', $answers[35])[1] ?? '' : '' }}"> were about to stop working. The only hope was to tell the probe to replace them with  <input type="text" name="q36" placeholder="36" style="padding:5px; width:150px;" id="q36" value="{{ $answers[36] ?? '' }}"> - but distance made communication with the probe difficult. A  <input type="text" name="q37" placeholder="37" style="padding:5px; width:150px;" id="q37" value="{{ $answers[37] ?? '' }}"> was used to transmit the message at the speed of light.The message was picked up by the probe and the switchover took place.</p>
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Questions 38-40</strong></h3>
                                    <p><em>Choose <strong>TRUE</strong> if the statement agrees with the information given in the text, choose <strong>FALSE</strong> if the statement contradicts the information, or choose <strong>NOT GIVEN</strong> if there is no information on this.</em></p>

                                    <div class="tfng-block" id="q38_40_tfng">
                                        <div class="tfng-item open">
                                            <div class="tfng-head">
                                                <div class="tfng-num">38</div>
                                                <div class="tfng-q">The concept of describing something as true or false was the starting point for Shannon in his attempts to send messages over distances.</div>
                                            </div>
                                            <div class="tfng-options">
                                                <label><input type="radio" name="q38" value="TRUE"> <span>TRUE</span></label>
                                                <label><input type="radio" name="q38" value="FALSE"> <span>FALSE</span></label>
                                                <label><input type="radio" name="q38" value="NOT GIVEN"> <span>NOT GIVEN</span></label>
                                            </div>
                                        </div>

                                        <div class="tfng-item">
                                            <div class="tfng-head">
                                                <div class="tfng-num">39</div>
                                                <div class="tfng-q">The amount of information that can be sent in a given time period is determined with reference to the signal strength and noise level.</div>
                                            </div>
                                            <div class="tfng-options">
                                                <label><input type="radio" name="q39" value="TRUE"> <span>TRUE</span></label>
                                                <label><input type="radio" name="q39" value="FALSE"> <span>FALSE</span></label>
                                                <label><input type="radio" name="q39" value="NOT GIVEN"> <span>NOT GIVEN</span></label>
                                            </div>
                                        </div>

                                        <div class="tfng-item">
                                            <div class="tfng-head">
                                                <div class="tfng-num">40</div>
                                                <div class="tfng-q">Products have now been developed which can convey more information than Shannon had anticipated as possible.</div>
                                            </div>
                                            <div class="tfng-options">
                                                <label><input type="radio" name="q40" value="TRUE"> <span>TRUE</span></label>
                                                <label><input type="radio" name="q40" value="FALSE"> <span>FALSE</span></label>
                                                <label><input type="radio" name="q40" value="NOT GIVEN"> <span>NOT GIVEN</span></label>
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

            // Limit Questions 1-3 checkboxes to maximum 3 selections (no popup)
            const q1Checkboxes = document.querySelectorAll('input[name="q1[]"]');
            let lastActiveQuestionNum = 0;
            
            q1Checkboxes.forEach((checkbox, index) => {
                checkbox.addEventListener('change', function() {
                    const checkedCount = document.querySelectorAll('input[name="q1[]"]:checked').length;
                    if (checkedCount > 3) {
                        this.checked = false;
                        return;
                    }
                    
                    // Remove active from all question links 1-3
                    for (let i = 1; i <= 3; i++) {
                        const link = document.querySelector(`.question-link[data-question="${i}"]`);
                        if (link) link.classList.remove('active');
                    }
                    
                    if (this.checked) {
                        // Activate question number based on how many are checked
                        const checkedCheckboxes = Array.from(document.querySelectorAll('input[name="q1[]"]:checked'));
                        const questionNum = checkedCheckboxes.length; // 1, 2, or 3
                        const questionLink = document.querySelector(`.question-link[data-question="${questionNum}"]`);
                        if (questionLink) {
                            questionLink.classList.add('active');
                        }
                        lastActiveQuestionNum = questionNum;
                    } else {
                        // If unchecked, activate based on remaining checked count
                        const checkedCheckboxes = Array.from(document.querySelectorAll('input[name="q1[]"]:checked'));
                        if (checkedCheckboxes.length > 0) {
                            const questionNum = checkedCheckboxes.length;
                            const questionLink = document.querySelector(`.question-link[data-question="${questionNum}"]`);
                            if (questionLink) {
                                questionLink.classList.add('active');
                            }
                            lastActiveQuestionNum = questionNum;
                        } else {
                            lastActiveQuestionNum = 0;
                        }
                    }
                });
            });

            // MCQ toggle functionality
            const mcqItems = document.querySelectorAll('.mcq-block .mcq-item');
            const mcqHeads = document.querySelectorAll('.mcq-block .mcq-head');

            mcqHeads.forEach((head) => {
                head.addEventListener('click', () => {
                    const item = head.closest('.mcq-item');
                    if (!item) return;
                    const isOpen = item.classList.contains('open');
                    mcqItems.forEach((it) => it.classList.remove('open'));
                    if (!isOpen) {
                        item.classList.add('open');
                    }
                });
            });

            // Matching grid functionality for Questions 14-19
            function clearRowSelection(rowNumber) {
                document.querySelectorAll(`.tick-cell[data-row="${rowNumber}"]`).forEach(function(cell) {
                    cell.classList.remove('selected');
                });
            }

            function setMatchingAnswer(qNum, value) {
                const hiddenInput = document.getElementById(String(qNum));
                if (hiddenInput) {
                    hiddenInput.value = value;
                }

                clearRowSelection(qNum);
                const cell = document.querySelector(`.tick-cell[data-row="${qNum}"][data-value="${value}"]`);
                if (cell) cell.classList.add('selected');

                // Remove active from all question links first
                document.querySelectorAll('.question-link').forEach(link => {
                    link.classList.remove('active');
                });

                // Update active question link for only this question
                const questionLink = document.querySelector(`.question-link[data-question="${qNum}"]`);
                if (questionLink) {
                    questionLink.classList.add('active');
                }
            }

            document.querySelectorAll('#q14_19_grid .tick-cell').forEach(function(cell) {
                cell.addEventListener('click', function() {
                    const row = parseInt(cell.getAttribute('data-row'), 10);
                    const val = cell.getAttribute('data-value');
                    if (!row || !val) return;
                    setMatchingAnswer(row, val);
                });
            });

            document.querySelectorAll('#q27_32_grid .tick-cell').forEach(function(cell) {
                cell.addEventListener('click', function() {
                    const row = parseInt(cell.getAttribute('data-row'), 10);
                    const val = cell.getAttribute('data-value');
                    if (!row || !val) return;
                    setMatchingAnswer(row, val);
                });
            });

            // TFNG accordion functionality for Questions 20-26 and 38-40
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
                        if (!isOpen) {
                            item.classList.add('open');
                            // Auto-scroll if options overflow the container
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

            initTfngAccordion('q20_26_tfng');
            initTfngAccordion('q38_40_tfng');
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

            const dirtyInputs = new Map();
            let autosaveTimer = null;
            const autosaveDelayMs = 10000;

            function isQuestionInput(input) {
                if (!input) return false;
                const name = (input.name || '').trim();
                if (!name) return false;
                return /^q\d+(_\d+)?(\[\])?$/.test(name);
            }

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
                if (!isQuestionInput(input)) return Promise.resolve();

                if (input.type === 'checkbox') {
                    const groupName = input.name;
                    
                    // Special handling for Questions 1-3 (q1[])
                    if (groupName === 'q1[]') {
                        const selectedCheckboxes = Array.from(document.querySelectorAll(`input[name="${groupName}"]:checked`));
                        
                        // Save each selected checkbox as separate question numbers 1, 2, 3
                        let chain = Promise.resolve();
                        selectedCheckboxes.forEach((cb, index) => {
                            const questionNum = index + 1; // 1, 2, or 3
                            chain = chain.then(() => postAutosave(questionNum.toString(), cb.value));
                        });
                        
                        // Clear any remaining question numbers if less than 3 are selected
                        for (let i = selectedCheckboxes.length + 1; i <= 3; i++) {
                            chain = chain.then(() => postAutosave(i.toString(), ''));
                        }
                        
                        return chain;
                    }
                    
                    // For other checkboxes, use comma-separated values
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

                // For text inputs, preserve the full question number including _1, _2 suffixes
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
                if (!isQuestionInput(input)) return;
                const key = input.name || input.id;
                if (!key) return;
                dirtyInputs.set(key, input);
                scheduleAutosaveFlush();
            }

            document.querySelectorAll('input[type="radio"], input[type="text"], input[type="checkbox"], input[type="hidden"]').forEach(input => {
                input.addEventListener('change', function() {
                    markDirty(this);
                });
            });

            document.querySelectorAll('input[type="text"]').forEach(input => {
                input.addEventListener('input', function() {
                    markDirty(this);
                });
            });

            if (testForm) {
                const nativeSubmit = HTMLFormElement.prototype.submit;
                let __hexasSubmittingTest = false;

                // Prevent Enter key from submitting the form
                testForm.addEventListener('keypress', function(e) {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        return false;
                    }
                });

                testForm.addEventListener('submit', function(e) {
                    if (__hexasSubmittingTest) return;

                    if (autosaveTimer) {
                        clearTimeout(autosaveTimer);
                        autosaveTimer = null;
                    }

                    e.preventDefault();
                    flushDirtyAutosaves().finally(() => {
                        // Convert Questions 1-3 checkboxes to separate question inputs before submit
                        const q1Checkboxes = document.querySelectorAll('input[name="q1[]"]');
                        const selectedCheckboxes = Array.from(q1Checkboxes).filter(cb => cb.checked);
                        
                        // Disable all q1[] checkboxes so they don't submit as array
                        q1Checkboxes.forEach(cb => cb.disabled = true);
                        
                        // Create hidden inputs for questions 1, 2, 3 with selected values
                        selectedCheckboxes.forEach((cb, index) => {
                            const questionNum = index + 1; // 1, 2, or 3
                            const hiddenInput = document.createElement('input');
                            hiddenInput.type = 'hidden';
                            hiddenInput.name = `q${questionNum}`;
                            hiddenInput.value = cb.value;
                            testForm.appendChild(hiddenInput);
                        });
                        
                        // Disable multi-part question inputs (q33_1, q33_2, q35_1, q35_2)
                        // These are already saved via auto-save as combined answers
                        document.querySelectorAll('input[name="q33_1"], input[name="q33_2"], input[name="q35_1"], input[name="q35_2"]').forEach(input => {
                            input.disabled = true;
                        });
                        
                        __hexasSubmittingTest = true;
                        nativeSubmit.call(testForm);
                    });
                }, true);
            }

            // Load saved answers from database
            const savedAnswers = @json($answers ?? []);
            console.log('Query Info:', {
                student_id: '{{ auth()->id() ?? session("student_batch_id") }}',
                test_name: '{{ $testName ?? "class04_reading" }}',
                assignment_id: '{{ $assignmentId ?? "none" }}'
            });
            console.log('Saved answers from database:', savedAnswers);
            
            // Helper function to set active question link
            function setActiveQuestionLink(qNum) {
                if (!qNum) return;
                const qStr = String(qNum);
                document.querySelectorAll('.question-link').forEach(l => l.classList.remove('active'));
                const link = document.querySelector(`.question-link[data-question="${qStr}"]`);
                if (link) link.classList.add('active');
            }

            // Load saved answers into form
            Object.keys(savedAnswers || {}).forEach(function(qNum) {
                const value = savedAnswers[qNum];
                if (value === null || value === undefined) return;
                const strVal = String(value).trim();
                if (strVal === '') return;

                const qNumInt = parseInt(qNum, 10);

                // Handle checkboxes (Questions 1-3)
                if (qNumInt >= 1 && qNumInt <= 3) {
                    const values = strVal.split(',').map(v => v.trim().toUpperCase());
                    values.forEach(function(val) {
                        const checkbox = document.querySelector(`input[name="q${qNum}[]"][value="${val}"]`);
                        if (checkbox) {
                            checkbox.checked = true;
                        }
                    });
                    // Update active question number based on checked count
                    const checkedCount = document.querySelectorAll(`input[name="q${qNum}[]"]:checked`).length;
                    if (checkedCount > 0) {
                        setActiveQuestionLink(checkedCount);
                    }
                    return;
                }

                // Handle matching grid (Questions 14-19, 27-32) - MUST be checked before radio buttons
                if ((qNumInt >= 14 && qNumInt <= 19) || (qNumInt >= 27 && qNumInt <= 32)) {
                    const upperVal = strVal.toUpperCase();
                    console.log(`Restoring Q${qNumInt} = ${upperVal}`);
                    
                    // Set hidden input value
                    const hiddenInput = document.getElementById(String(qNumInt));
                    console.log(`Hidden input for Q${qNumInt}:`, hiddenInput);
                    if (hiddenInput) {
                        hiddenInput.value = upperVal;
                        console.log(`Set hidden input value to: ${upperVal}`);
                    }
                    
                    // Clear previous selection for this row
                    const rowCells = document.querySelectorAll(`.tick-cell[data-row="${qNumInt}"]`);
                    console.log(`Found ${rowCells.length} cells for row ${qNumInt}`);
                    rowCells.forEach(function(c) {
                        c.classList.remove('selected');
                    });
                    
                    // Add selected class to the correct cell
                    const cell = document.querySelector(`.tick-cell[data-row="${qNumInt}"][data-value="${upperVal}"]`);
                    console.log(`Target cell for Q${qNumInt} value ${upperVal}:`, cell);
                    if (cell) {
                        cell.classList.add('selected');
                        console.log(`Added 'selected' class to cell`);
                    } else {
                        console.warn(`Cell not found for Q${qNumInt} with value ${upperVal}`);
                    }
                    
                    // Activate question link
                    setActiveQuestionLink(qNumInt);
                    return;
                }

                // Handle radio buttons (Question 13, TFNG 20-26, 38-40)
                const radio = document.querySelector(`input[type="radio"][name="q${qNum}"][value="${strVal}"]`);
                if (radio) {
                    radio.checked = true;
                    setActiveQuestionLink(qNum);
                    return;
                }

                // Handle text inputs (all other questions)
                const textInput = document.querySelector(`input[name="q${qNum}"]`);
                if (textInput && textInput.type === 'text') {
                    textInput.value = strVal;
                    setActiveQuestionLink(qNum);
                }
            });
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

        // Highlight only
        highlightOption.addEventListener('click', function() {
            if (selectionRange) {
                const range = selectionRange;
                const walkerRoot = range.commonAncestorContainer.nodeType === Node.ELEMENT_NODE
                    ? range.commonAncestorContainer
                    : range.commonAncestorContainer.parentElement;

                const walker = document.createTreeWalker(
                    walkerRoot,
                    NodeFilter.SHOW_TEXT,
                    {
                        acceptNode: function(node) {
                            if (!node.nodeValue || !node.nodeValue.trim()) return NodeFilter.FILTER_REJECT;
                            try {
                                return range.intersectsNode(node) ? NodeFilter.FILTER_ACCEPT : NodeFilter.FILTER_REJECT;
                            } catch (e) {
                                return NodeFilter.FILTER_REJECT;
                            }
                        }
                    }
                );

                const textNodes = [];
                while (walker.nextNode()) textNodes.push(walker.currentNode);

                textNodes.forEach(function(textNode) {
                    let start = 0;
                    let end = textNode.nodeValue.length;

                    if (range.startContainer === textNode) start = range.startOffset;
                    if (range.endContainer === textNode) end = range.endOffset;

                    if (start >= end) return;

                    const original = textNode;
                    if (end < original.nodeValue.length) original.splitText(end);
                    let target = original;
                    if (start > 0) target = original.splitText(start);

                    const mark = document.createElement('mark');
                    mark.style.backgroundColor = 'yellow';
                    target.parentNode.insertBefore(mark, target);
                    mark.appendChild(target);
                });
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
                const range = selectionRange;
                const selectedText = (range.toString() || '').trim();
                const markId = String(Date.now());

                const walkerRoot = range.commonAncestorContainer.nodeType === Node.ELEMENT_NODE
                    ? range.commonAncestorContainer
                    : range.commonAncestorContainer.parentElement;

                const walker = document.createTreeWalker(
                    walkerRoot,
                    NodeFilter.SHOW_TEXT,
                    {
                        acceptNode: function(node) {
                            if (!node.nodeValue || !node.nodeValue.trim()) return NodeFilter.FILTER_REJECT;
                            try {
                                return range.intersectsNode(node) ? NodeFilter.FILTER_ACCEPT : NodeFilter.FILTER_REJECT;
                            } catch (e) {
                                return NodeFilter.FILTER_REJECT;
                            }
                        }
                    }
                );

                const textNodes = [];
                while (walker.nextNode()) textNodes.push(walker.currentNode);

                let firstMark = null;
                textNodes.forEach(function(textNode) {
                    let start = 0;
                    let end = textNode.nodeValue.length;

                    if (range.startContainer === textNode) start = range.startOffset;
                    if (range.endContainer === textNode) end = range.endOffset;

                    if (start >= end) return;

                    const original = textNode;
                    if (end < original.nodeValue.length) original.splitText(end);
                    let target = original;
                    if (start > 0) target = original.splitText(start);

                    const mark = document.createElement('mark');
                    mark.style.backgroundColor = 'yellow';
                    mark.setAttribute('data-tooltip', '');
                    mark.setAttribute('data-note', '');
                    mark.dataset.markId = markId;

                    mark.addEventListener('click', function(e) {
                        e.stopPropagation();
                        showNotePopup(mark);
                    });

                    target.parentNode.insertBefore(mark, target);
                    mark.appendChild(target);
                    if (!firstMark) firstMark = mark;
                });

                if (firstMark) {
                    const sidebar = document.getElementById('sidebar');
                    const noteDiv = document.createElement('div');
                    noteDiv.classList.add('sidebar-note-item');
                    noteDiv.innerHTML = `
                        <div class="sidebar-header" style="margin-bottom: 3px; cursor: pointer;">${selectedText || firstMark.innerText}</div>
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
       {{-- input auto sujection off  --}}
    <script>
                document.addEventListener('DOMContentLoaded', function() {
            // Get all input fields within the form
            const inputs = document.querySelectorAll('#testForm input');

            // Loop through each input and set autocomplete="off"
            inputs.forEach(function(input) {
                input.setAttribute('autocomplete', 'off');
            });
        });
    </script>


</body>

</html>
