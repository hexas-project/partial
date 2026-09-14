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

        }

        .question-link.answered {
            color: inherit;
            background: transparent;
            border-radius: 0;
            padding: 0;
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
    </style>
</head>

<body>
    <form action="{{ route('reading.submit') }}" method="POST" id="testForm"  spellcheck="false" autocomplete="off">
        @csrf

        {{-- hidden input  --}}
        <input type="hidden" name="test_name" value="class20_reading">
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
                        <p>Read the text below and answer questions 1-13
                        </p>
                    </div>
                    <div class="mt-4">


                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-md-6">


                                <div class="scroll-box" style="text-align:left;">
                                    
                                    
                                    <h4><strong>How Mobile Telephony Turned into a Health Scare</strong></h4>

                                    <p>The technology which enabled mobile phones was previously used in the kind of two- way radio which could be found in taxis and emergency vehicles. Although this was a great development, it was not really considered mobile telephony because it could not be used to dial into existing phone networks. It was known as simplex technology, operating on the same principles as a walkie-talkie, which required that a user press a button, meaning that only one person at a time could talk. Simplex meant that there was only one communication frequency in use at any one time.<br><br>

The first mobile phones to connect to telephone networks were often installed in cars before the hand-held version came on the market and the revolution in mobile technology began. The first generation of mobile phones (called 1G) were large, heavy and analogue and it was not until the invention of the second generation (2G) in the 1990s that digital networks could be used. The digital element enabled faster signalling. At the same time, developments in battery design and energy-saving electronics allowed the phones themselves to become smaller and therefore more truly mobile. The second generation allowed for text messaging too, and this began with the first person-to-person text message in Finland in 1993, although a machine-generated text message had been successfully sent two years earlier.<br><br>

None of this would have been possible without the development of duplex technology to replace the relatively primitive simplex technology of the first phase of mobile communication. In duplex technology, there are two frequencies available simultaneously. These two frequencies can be obtained by the principle of Frequency Division Duplex (FDD). To send two signals wirelessly, it is necessary to create a paired spectrum, where one band carries the uplink (from phone to antenna) and the other carries the downlink (from antenna to phone).Time Division Duplex (TDD) can achieve the same thing, but instead of splitting the frequency, the uplink and downlink are switched very rapidly giving the impression that one frequency is used.<br><br>

For mobile telephony to work to its fullest potential, it needs to have a network through which it can relay signals.This network depends on base stations which send and receive the signals. The base stations tend to be simple constructions, or masts, on top of which are mounted the antennas. With the rapid increase in demand for mobile services, the infrastructure of antennas in the United Kingdom is now huge.<br><br>

Many thousands of reports have appeared claiming that the signals relayed by these antennas are harmful to human health. The claims focus on the fact that the antennas are transmitting radio waves in microwave form. In some ways, public demand is responsible for the increase in the alleged threat to health. Until quite recently, voice and text messages were transmitted using 2G technology. A 2G mast send a low-frequency microwave signal approximately 35 kilometres.Third generation (3G) technology allows users to wirelessly download information from the internet and is extremely popular. The difference is that 3G technology uses a higher frequency to carry the signals, allowing masts to emit more radiation. This problem Is intensified by the need to have masts in closer proximity to each other and to the handsets themselves. Whatever danger there was in 2G signals is greatly multiplied by the fact that the 3G masts are physically much closer to people.<br><br>

Government authorities have so far refused to accept that there is a danger to public health, and tests carried out by governments and telecommunications companies have been restricted to testing to see if heat is being produced from these microwaves. According to many, however, the problem is not heat, but electromagnetic waves which are found near the masts.<br><br>

It is believed that some people, though not all, have a condition known as electro- sensitivity or electro-hypersensitivity (EHS), meaning that the electromagnetism makes them ill in some way.The actual health threat from these pulsed microwave signals is an area which greatly needs more research. It has been claimed that the signals affect all living organisms, including plants, at a cellular level and cause symptoms in people ranging from tiredness and headaches to cancer.<br><br>

Of particular concern is the effect that increased electromagnetic fields may have on children and the fear is that the negative effects on their health may not manifest themselves until they have had many years of continued exposure to high levels. Tests carried out on animals living close to this form of radiation are particulary useful because scientists can rule out the psychological effect that humans might be exhibiting due to their fear of possible contamination.<br><br>

Of course, the danger of exposure exists when using a mobile phone but since we do this for limited periods, between which it is believed bodies can recover, it is not considered as serious as the effect of living or working near a mast (sometimes mounted on the very building we occupy) which is transmitting electromagnetic waves 24 hours a day.

                                    

                                   
                                   


                                </div>


                            </div>
                            <!-- Column 2 -->
                            <div class="col-md-6 question_site">
                                <h3><strong>Questions 1-6</strong></h3>
                                <p>Answer the questions below. Write<strong> NO MORE THAN THREE WORDS</strong> from the text in each gap.</p>

                                <p class="mt-3"> What were early two-way radios unable to use?</p>
                                <p><input type="text" name="q1" placeholder="1" style="padding:5px; width:200px;" id="1"></p>

                                <p> What did you have to do in order to talk on a radio using simplex technology?</p>
                                <p><input type="text" name="q2" placeholder="2" style="padding:5px; width:200px;" id="2"></p>

                                <p> Where were early mobile phones generally used?</p>
                                <p><input type="text" name="q3" placeholder="3" style="padding:5px; width:200px;" id="3"></p>

                                <p> What development introduced digital technology into mobile telephony?</p>
                                <p><input type="text" name="q4" placeholder="4" style="padding:5px; width:200px;" id="4"></p>

                                <p> Apart from the area of electronics, in which area did developments help make phones more mobile?</p>
                                <p><input type="text" name="q5" placeholder="5" style="padding:5px; width:200px;" id="5"></p>

                                <p> What type of text message was the first one ever sent?</p>
                                <p><input type="text" name="q6" placeholder="6" style="padding:5px; width:200px;" id="6"></p>


                                <div class="mt-5">
                                    <h3><strong>Questions 7-10</strong></h3>
                                    <p>Complete the diagram.</p>
                                    <p>Choose <strong>NO MORE THAN TWO WORDS</strong> from the passage for each answer.</p>

                                    <p class="mt-3"><strong>Frequency Division Duplex (FDD): two signals seat  <input type="text" name="q7" placeholder="7" style="padding:2px 5px; width:150px;" id="7"></strong></p>

                                    <div style="position: relative; margin-top: 20px;">
                                        <img src="{{ asset('images/1111.png') }}" alt="FDD Diagram" style="width: 100%; max-width: 659px;">
                                        
                                        <div style="position: absolute; top: 5px; left: 80px;">
                                            <p style="margin: 0; font-size: 14px;">Two bands together, known as a</p>
                                            <p style="margin: 0;"> <input type="text" name="q8" placeholder="8" style="padding:2px 5px; width:180px;" id="8"></p>
                                        </div>

                                        <div style="position: absolute; top: 125px; left: 165px;">
                                            <p style="margin: 0;"> <input type="text" name="q9" placeholder="9" style="padding:2px 5px; width:140px; margin-left: -48px;" id="9"></p>
                                        </div>

                                        <div style="position: absolute; top: 250px; left: 165px;">
                                            <p style="margin: 0;"> <input type="text" name="q10" placeholder="10" style="padding:2px 5px; width:140px; margin: -10px 27px;" id="10"></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Questions 11-13</strong></h3>
                                    <p><strong>Choose the correct answer.</strong></p>

                                    <div class="mcq-block" id="q11_13_mcq">
                                        <div class="mcq-item open">
                                            <div class="mcq-head">
                                                <div class="mcq-num">11</div>
                                                <div class="mcq-q">3G technology is believed to be more of a threat to health because</div>
                                            </div>
                                            <div class="mcq-options">
                                                <label><input type="radio" name="q11" value="A"> <span>the signals are transmitted over much greater distances than before.</span></label>
                                                <label><input type="radio" name="q11" value="B"> <span>the masts are closer together and emit higher frequencies.</span></label>
                                                <label><input type="radio" name="q11" value="C"> <span>the signals are carrying both voice and text messages.</span></label>
                                                <label><input type="radio" name="q11" value="D"> <span>the modem handsets needed emit more radiation.</span></label>
                                            </div>
                                        </div>

                                        <div class="mcq-item">
                                            <div class="mcq-head">
                                                <div class="mcq-num">12</div>
                                                <div class="mcq-q">Why might the testing of animals give us more reliable results?</div>
                                            </div>
                                            <div class="mcq-options">
                                                <label><input type="radio" name="q12" value="A"> <span>because most of them live closer to the masts</span></label>
                                                <label><input type="radio" name="q12" value="B"> <span>because they are continually exposed to higher levels of radiation</span></label>
                                                <label><input type="radio" name="q12" value="C"> <span>because they are not affected at a cellular level</span></label>
                                                <label><input type="radio" name="q12" value="D"> <span>because they are not afraid of the effects of radiation</span></label>
                                            </div>
                                        </div>

                                        <div class="mcq-item">
                                            <div class="mcq-head">
                                                <div class="mcq-num">13</div>
                                                <div class="mcq-q">What is believed to limit the danger from mobile phones?</div>
                                            </div>
                                            <div class="mcq-options">
                                                <label><input type="radio" name="q13" value="A"> <span>not using them continuously</span></label>
                                                <label><input type="radio" name="q13" value="B"> <span>turning them off when not in use</span></label>
                                                <label><input type="radio" name="q13" value="C"> <span>mounting a mast on the building where you live or work</span></label>
                                                <label><input type="radio" name="q13" value="D"> <span>keeping healthy and getting enough sleep</span></label>
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
                        <p>Read the text below and answer questions 14-26
                        </p>
                    </div>
                    <div class="mt-4">

                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-md-6">
                                <div class="scroll-box" style="text-align:left;">
                                     
                                    <h4><strong>Some Facts and Theories about Flu</strong></h4>
                                    <p>The flu, more properly known as influenza, takes its name from the fact that it is so easily transmitted from person to person (influenza is the Italian word for'influence'). Usually, contamination occurs through direct contact with secretions from an infected person. Its spread is also possible from airborne particles, such as those that occur when someone coughs or sneezes. However, it should be made clear that the risk is not great from simply being in the same room as an infected person, since the flu virus, unlike other respiratory viruses, does not dissolve in the air. In catching the flu, the virus multiplies in infected cells and the cells burst, spreading the virus to other cells nearby.<br><br>

The spread continues for up to 72 hours, the exact length of time depending on the body's immune system response and the strength of the particular strain of flu. The range of human responses to the flu virus has been of interest to scientists for many years. This is because the effect can vary from no infection to a rapid and deadly spread of the virus to many people. One area of study that has received particular attention is the immune system response of the individual. Where a person's immune system is healthy, the virus is attacked as it enters the body, usually in the respiratory tract. This lessens the severity of the illness. In contrast, people with compromised immune systems, such as the very young, where it is not fully developed, or in the old and the sick, where it is not working efficiently, often suffer the worst effects.<br><br>

One of the body's responses to flu is the creation of antibodies which recognise and destroy that particular strain of flu. What fascinates most people in the field is that the human body seems capable of storing these antibodies over a whole lifetime in case of future attack from the same or similar strains of flu. It was while researching these antibodies that scientists turned their attention back to the possibility of a flu pandemic in the world. The actual number of deaths is disputed, but the outbreak in 1918 killed between 20 and 50 million people. It is also estimated that one fifth of the population of the work world may have been infected.<br><br>

Through tests done on some of the survivors of the 1918 outbreak, it was discovered that, 90 years later, they still possessed the antibodies to that strain of flu, and some of them were actually still producing the antibodies. Work is now focused on why these people survived in the first place, with one group that has actually been exposed to an earlier, similar strain, therefore developing immunity to the 1918 strain. It is hoped that, in the near future, we might be able to isolate the antibodies and vaccinate people against further outbreaks.<br><br>

Yet vaccination against the flu is an imprecise measure. At best, the vaccine protects us from the variations of flu that doctors expect that year. If their predictions are wrong in any particular year, being vaccinated will not prevent us from becoming infected. This is further complicated by the fact that there are two types of flu, known as influenza A and influenza B. Influenza B causes less concern as its effects are usually less serious. Influenza A, however, has the power to change its genetic make-up. Although these genetic changes are rare, they create entirely new strains of flu against which the human body has no protection. It has been suggested that this is what had happened immediately prior to the 1918 outbreak, with research indicating that a genetic shift had taken place in China.<br><br>

In 2005, another genetic shift in an influenza A virus was recorded, giving rise to the H5N1 strain, otherwise known as avian flu, or bird flu. Typical of such new strains, we have no way of fighting it and many people who are infected with it die. Perhaps more worrying is that it is a strain only previously found in birds which changed its genetic make-up in a way that allowed it to be transmitted to humans. Most of the fear surrounding this virus is that it will change again, developing the ability to pass from human to human. If that change does happen, scientists and doctors can reasonably expect a death rate comparable to that which occurred in 1918 and, given that we can now travel more quickly and more easily between countries, infecting many more people than was previously possible, it could be several times worse.
                                    </p>

                                </div>
                            </div>
                            <!-- Column 2 -->
                            <div class="col-md-6 question_site">
                                <h3><strong>Questions 14-20</strong></h3>
                                <p><em>Choose<strong> TRUE </strong>if the statement agrees with the information given in the text, choose <strong>FALSE</strong> if the statement contradicts the information, or choose <strong>NOT GIVEN</strong> if there is no information on this.</em></p>

                                <div class="tfng-block" id="q14_20_tfng">
                                    <div class="tfng-item open">
                                        <div class="tfng-head">
                                            <div class="tfng-num">14</div>
                                            <div class="tfng-q">The only way to catch flu is if someone coughs or sneezes near you.</div>
                                        </div>
                                        <div class="tfng-options">
                                            <label><input type="radio" name="q14" value="TRUE"> <span>TRUE</span></label>
                                            <label><input type="radio" name="q14" value="FALSE"> <span>FALSE</span></label>
                                            <label><input type="radio" name="q14" value="NOT GIVEN"> <span>NOT GIVEN</span></label>
                                        </div>
                                    </div>

                                    <div class="tfng-item">
                                        <div class="tfng-head">
                                            <div class="tfng-num">15</div>
                                            <div class="tfng-q">You become aware of the symptoms of flu within 4-6 hours of infection.</div>
                                        </div>
                                        <div class="tfng-options">
                                            <label><input type="radio" name="q15" value="TRUE"> <span>TRUE</span></label>
                                            <label><input type="radio" name="q15" value="FALSE"> <span>FALSE</span></label>
                                            <label><input type="radio" name="q15" value="NOT GIVEN"> <span>NOT GIVEN</span></label>
                                        </div>
                                    </div>

                                    <div class="tfng-item">
                                        <div class="tfng-head">
                                            <div class="tfng-num">16</div>
                                            <div class="tfng-q">The effect of a flu infection can depend on how strong the strain is.</div>
                                        </div>
                                        <div class="tfng-options">
                                            <label><input type="radio" name="q16" value="TRUE"> <span>TRUE</span></label>
                                            <label><input type="radio" name="q16" value="FALSE"> <span>FALSE</span></label>
                                            <label><input type="radio" name="q16" value="NOT GIVEN"> <span>NOT GIVEN</span></label>
                                        </div>
                                    </div>

                                    <div class="tfng-item">
                                        <div class="tfng-head">
                                            <div class="tfng-num">17</div>
                                            <div class="tfng-q">Those who are more likely to suffer badly with the flu include very young or very old people.</div>
                                        </div>
                                        <div class="tfng-options">
                                            <label><input type="radio" name="q17" value="TRUE"> <span>TRUE</span></label>
                                            <label><input type="radio" name="q17" value="FALSE"> <span>FALSE</span></label>
                                            <label><input type="radio" name="q17" value="NOT GIVEN"> <span>NOT GIVEN</span></label>
                                        </div>
                                    </div>

                                    <div class="tfng-item">
                                        <div class="tfng-head">
                                            <div class="tfng-num">18</div>
                                            <div class="tfng-q">Although antibodies last a lifetime, scientists have found they get weaker with age.</div>
                                        </div>
                                        <div class="tfng-options">
                                            <label><input type="radio" name="q18" value="TRUE"> <span>TRUE</span></label>
                                            <label><input type="radio" name="q18" value="FALSE"> <span>FALSE</span></label>
                                            <label><input type="radio" name="q18" value="NOT GIVEN"> <span>NOT GIVEN</span></label>
                                        </div>
                                    </div>

                                    <div class="tfng-item">
                                        <div class="tfng-head">
                                            <div class="tfng-num">19</div>
                                            <div class="tfng-q">Scientific evidence proves the 1918 outbreak originated in China.</div>
                                        </div>
                                        <div class="tfng-options">
                                            <label><input type="radio" name="q19" value="TRUE"> <span>TRUE</span></label>
                                            <label><input type="radio" name="q19" value="FALSE"> <span>FALSE</span></label>
                                            <label><input type="radio" name="q19" value="NOT GIVEN"> <span>NOT GIVEN</span></label>
                                        </div>
                                    </div>

                                    <div class="tfng-item">
                                        <div class="tfng-head">
                                            <div class="tfng-num">20</div>
                                            <div class="tfng-q">Another change in the genetic make-up of the H5N1 strain could kill more people than the 1918 epidemic.</div>
                                        </div>
                                        <div class="tfng-options">
                                            <label><input type="radio" name="q20" value="TRUE"> <span>TRUE</span></label>
                                            <label><input type="radio" name="q20" value="FALSE"> <span>FALSE</span></label>
                                            <label><input type="radio" name="q20" value="NOT GIVEN"> <span>NOT GIVEN</span></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Questions 21-24</strong></h3>
                                    <p>Look at the following statements (Questions 21-24).</p>
                                    <p>Classify each statement as being a result of:</p>
                                    <p>
                                       <strong> A</strong> something known by scientists to be true<br>
                                        <strong>B</strong> something believed by scientists to be true<br>
                                        <strong>C</strong> something known by scientists to be false
                                    </p>
                                    <p>Choose the correct letter, <strong>A, B or C</strong>, for 21-24.</p>

                                    <table class="matching-grid" id="q21_24_grid">
                                        <thead>
                                            <tr>
                                                <th style="width: 400px;"></th>
                                                <th class="choice-cell">A</th>
                                                <th class="choice-cell">B</th>
                                                <th class="choice-cell">C</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><strong>21</strong> Sharing a room with a flu sufferer presents a very high risk to your health.</td>
                                                <td class="choice-cell tick-cell" data-row="21" data-value="A"><span class="tick">✓</span></td>
                                                <td class="choice-cell tick-cell" data-row="21" data-value="B"><span class="tick">✓</span></td>
                                                <td class="choice-cell tick-cell" data-row="21" data-value="C"><span class="tick">✓</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>22</strong> One fifth of the people in the world caught the flu in 1918.</td>
                                                <td class="choice-cell tick-cell" data-row="22" data-value="A"><span class="tick">✓</span></td>
                                                <td class="choice-cell tick-cell" data-row="22" data-value="B"><span class="tick">✓</span></td>
                                                <td class="choice-cell tick-cell" data-row="22" data-value="C"><span class="tick">✓</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>23</strong> Influenza A viruses do not change their genetic make-up frequently.</td>
                                                <td class="choice-cell tick-cell" data-row="23" data-value="A"><span class="tick">✓</span></td>
                                                <td class="choice-cell tick-cell" data-row="23" data-value="B"><span class="tick">✓</span></td>
                                                <td class="choice-cell tick-cell" data-row="23" data-value="C"><span class="tick">✓</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>24</strong> The H5N1 strain evolved in or before 2005.</td>
                                                <td class="choice-cell tick-cell" data-row="24" data-value="A"><span class="tick">✓</span></td>
                                                <td class="choice-cell tick-cell" data-row="24" data-value="B"><span class="tick">✓</span></td>
                                                <td class="choice-cell tick-cell" data-row="24" data-value="C"><span class="tick">✓</span></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div style="display:none;">
                                        <input type="text" name="q21" placeholder="21" id="21" value="{{ $answers[21] ?? '' }}">
                                        <input type="text" name="q22" placeholder="22" id="22" value="{{ $answers[22] ?? '' }}">
                                        <input type="text" name="q23" placeholder="23" id="23" value="{{ $answers[23] ?? '' }}">
                                        <input type="text" name="q24" placeholder="24" id="24" value="{{ $answers[24] ?? '' }}">
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Questions 25 and 26</strong></h3>
                                    <p>Write <strong>NO MORE THAN THREE WORDS</strong> from the text in each gap.</p>

                                    <p class="mt-3"><strong>25</strong> In which part of the body do antibodies normally attack the flu virus?</p>
                                    <p><input type="text" name="q25" placeholder="25" style="padding:5px; width:200px;" id="25"></p>

                                    <p><strong>26</strong> What kind of transmission of the H5N1 strain are people afraid might become reality?</p>
                                    <p><input type="text" name="q26" placeholder="26" style="padding:5px; width:200px;" id="26"></p>
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
                        <p>Read the text below and answer questions 27-40
                        </p>
                    </div>
                    <div class="mt-4">

                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-md-6">
                                <div class="scroll-box" style="text-align:left;">
                                    
                                    <h4><strong>Changes in International Commerce</strong></h4>
                                    <h4><strong>How ethics and fair trade can make a difference</strong></h4>

                                    <p>The purpose of international commerce is to buy things from and sell things to people in other countries. Hundreds, and indeed thousands, of years ago, this actually worked quite well. People who travelled to foreign lands would buy items for trade. Agricultural countries would, for example, trade olive oil or wine for weapons or other worked items. All that needed to be negotiated was a 'fair price'for the items. (How many axes is a barrel of oil worth, for example?) Currency did not enter into the first deals but, even when it did, few problems existed to complicate matters barring disagreements over the value of goods.<br><br>

Today, fixing a fair price remains at the centre of international commerce. When we look at the deal from the point of view of the seller, market research must determine the price at which the goods will be sold. This may vary considerably by country and people are often surprised to see exactly the same item for sale at two or three times the price it sells for in another country.Taxation and local government controls are sometimes behind this, but so it comes down to the fact that people in poor countries simply cannot afford to pay the same amount of money as those in rich countries. These are the things a seller has to bear in mind when preparing a price list for goods in each country.<br><br>

In most cases, the purpose of setting a suitable price is to sell the maximum number of units. Usually, this is the way to guarantee the biggest profit. One exception is in the selling of luxury or specialist goods. These are often goods where there is little or no competition in the area of production, forcing the prices to be competitive too. The producers have to sell a large number of items to make a profit because their profit margin is small. But not everyone wants to be a mass-market producer, or a machine for sticking labels onto bottles.This enables the producer to charge a price much higher than the cost of making the item, increasing the profit margin. But at the heart of it all, whether they sell many items for a small profit, ora few items for a large profit the prime motivation for the producer is to make as much profit as possible.<br><br>

At least, that was the case until relatively recently when, to the great surprise of many, companies started trading without profit as their main objective. Ethical trade began as an attempt to cause as little damage as possible to the production of raw materials and manufactured goods in poor countries.This movement put pressure on the industry to see to it that working conditions and human rights were not damaged by the need for poorer people to produce goods. In short, it drew to the world's attention the fact that many poor people were being exploited by big businesses in their drive to make more profit.<br><br>

There have been many examples throughout the developing world where local producers were forced by economic pressure to supply cash crops such as tea, coffee and cotton to major industries. These people are frequently in a position to fix their prices, often forced by market conditions to sell for a price too low to support the producers and their community. Worse still, while the agricultural land is given over to cash crops, it robs the local people of the ability to grow their own food. In time, through over-production, the land becomes spent and infertile, leading to poverty, starvation, and sometimes the destruction of the whole community.<br><br>

Fair trade policies differ from ethical trade policies in that they take the process a stage further. Where ethical policies are designed to keep the damage to a minimum, fair trade organisations actually work to improve conditions among producers and their communities. Fairtrade organizations view sustainability as a key aim. This involves implementing policies where producers are given a fair price for the goods they sell, so that they and their communities can learn to operate.<br><br>

Although many big businesses are cynical about an operation that does not regard profit as a main driving force, the paradox is that it will help them too. With sustainability as their main aim, fair trade organizations only help poorer producers obtain a reasonable standard of living, but they also help guarantee a constant supply of raw materials. This form of sustainability benefits everyone, whether their motive is making a profit or improving the lives of the world's poorer people.
                                    </p>

                                </div>
                            </div>
                            <!-- Column 2 -->
                            <div class="col-md-6 question_site">
                                <h3><strong>Questions 27-31</strong></h3>
                                <p>Look at the following statements (Questions 27-31).</p>
                                <p>Classify each statement as being a result of:</p>
                                <p>
                                    <strong>A</strong> fair trade policies<br>
                                    <strong>B</strong> ethical trade policies<br>
                                    <strong>C</strong> a country being poor
                                </p>
                                <p>Choose the correct letter, <strong>A, B or C</strong>, for 27-31.</p>

                                <table class="matching-grid" id="q27_31_grid">
                                    <thead>
                                        <tr>
                                            <th style="width: 400px;"></th>
                                            <th class="choice-cell">A</th>
                                            <th class="choice-cell">B</th>
                                            <th class="choice-cell">C</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>27</strong> Manufactured goods are obtainable at a lower price than elsewhere.</td>
                                            <td class="choice-cell tick-cell" data-row="27" data-value="A"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="27" data-value="B"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="27" data-value="C"><span class="tick">✓</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>28</strong> Harm to producers of raw materials is minimized.</td>
                                            <td class="choice-cell tick-cell" data-row="28" data-value="A"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="28" data-value="B"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="28" data-value="C"><span class="tick">✓</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>29</strong> Human rights are respected.</td>
                                            <td class="choice-cell tick-cell" data-row="29" data-value="A"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="29" data-value="B"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="29" data-value="C"><span class="tick">✓</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>30</strong> Land is not used to produce food for the local population.</td>
                                            <td class="choice-cell tick-cell" data-row="30" data-value="A"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="30" data-value="B"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="30" data-value="C"><span class="tick">✓</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>31</strong> The local community has more chance of survival.</td>
                                            <td class="choice-cell tick-cell" data-row="31" data-value="A"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="31" data-value="B"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="31" data-value="C"><span class="tick">✓</span></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div style="display:none;">
                                    <input type="text" name="q27" placeholder="27" id="27" value="{{ $answers[27] ?? '' }}">
                                    <input type="text" name="q28" placeholder="28" id="28" value="{{ $answers[28] ?? '' }}">
                                    <input type="text" name="q29" placeholder="29" id="29" value="{{ $answers[29] ?? '' }}">
                                    <input type="text" name="q30" placeholder="30" id="30" value="{{ $answers[30] ?? '' }}">
                                    <input type="text" name="q31" placeholder="31" id="31" value="{{ $answers[31] ?? '' }}">
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Questions 32-36</strong></h3>
                                    <p>Complete the flow chart below. Use <strong>NO MORE THAN THREE WORDS</strong> from the passage for each answer.</p>

                                    <p class="mt-3">Companies carry out  <input type="text" name="q32" placeholder="32" style="padding:2px 5px; width:150px;" id="32"> to decide the price that their goods are sold at in each country. The prices of the same goods can vary in different countries because of  <input type="text" name="q33" placeholder="33" style="padding:2px 5px; width:150px;" id="33"> or taxes. The  <input type="text" name="q34" placeholder="34" style="padding:2px 5px; width:150px;" id="34"> is finalized, depending on how much customers in a particular market can afford. To ensure a profit, manufacturers aim to sell the  <input type="text" name="q35" placeholder="35" style="padding:2px 5px; width:150px;" id="35"> of a particular item. Manufacturers can have a higher profit margin on luxury or specialist goods which often have a  <input type="text" name="q36" placeholder="36" style="padding:2px 5px; width:150px;" id="36"></p>
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Questions 37-40</strong></h3>
                                    <p><strong>Choose the correct answer.</strong></p>

                                    <div class="mcq-block">
                                        <div class="mcq-item open">
                                            <div class="mcq-head">
                                                <div class="mcq-num">37</div>
                                                <div class="mcq-q">According to the writer, what might early traders have disagreed about?</div>
                                            </div>
                                            <div class="mcq-options">
                                                <label><input type="radio" name="q37" value="A" {{ ($answers[37] ?? '') === 'A' ? 'checked' : '' }}> <span>the comparative values of the goods</span></label>
                                                <label><input type="radio" name="q37" value="B" {{ ($answers[37] ?? '') === 'B' ? 'checked' : '' }}> <span>which currency to use for their deal</span></label>
                                                <label><input type="radio" name="q37" value="C" {{ ($answers[37] ?? '') === 'C' ? 'checked' : '' }}> <span>which items they wanted as exchange</span></label>
                                                <label><input type="radio" name="q37" value="D" {{ ($answers[37] ?? '') === 'D' ? 'checked' : '' }}> <span>the quality of the goods being traded</span></label>
                                            </div>
                                        </div>

                                        <div class="mcq-item">
                                            <div class="mcq-head">
                                                <div class="mcq-num">38</div>
                                                <div class="mcq-q">What is the main consequence of a product being in demand?</div>
                                            </div>
                                            <div class="mcq-options">
                                                <label><input type="radio" name="q38" value="A" {{ ($answers[38] ?? '') === 'A' ? 'checked' : '' }}> <span>higher prices</span></label>
                                                <label><input type="radio" name="q38" value="B" {{ ($answers[38] ?? '') === 'B' ? 'checked' : '' }}> <span>smaller profit margins</span></label>
                                                <label><input type="radio" name="q38" value="C" {{ ($answers[38] ?? '') === 'C' ? 'checked' : '' }}> <span>fewer items being produced</span></label>
                                                <label><input type="radio" name="q38" value="D" {{ ($answers[38] ?? '') === 'D' ? 'checked' : '' }}> <span>less market competition</span></label>
                                            </div>
                                        </div>

                                        <div class="mcq-item">
                                            <div class="mcq-head">
                                                <div class="mcq-num">39</div>
                                                <div class="mcq-q">How might an agricultural community be destroyed?</div>
                                            </div>
                                            <div class="mcq-options">
                                                <label><input type="radio" name="q39" value="A" {{ ($answers[39] ?? '') === 'A' ? 'checked' : '' }}> <span>because companies in richer countries steal from them</span></label>
                                                <label><input type="radio" name="q39" value="B" {{ ($answers[39] ?? '') === 'B' ? 'checked' : '' }}> <span>because they ask too high a price for their produce</span></label>
                                                <label><input type="radio" name="q39" value="C" {{ ($answers[39] ?? '') === 'C' ? 'checked' : '' }}> <span>because they over-use the land in order to grow cash crops</span></label>
                                                <label><input type="radio" name="q39" value="D" {{ ($answers[39] ?? '') === 'D' ? 'checked' : '' }}> <span>because the crops take much too long to grow</span></label>
                                            </div>
                                        </div>

                                        <div class="mcq-item">
                                            <div class="mcq-head">
                                                <div class="mcq-num">40</div>
                                                <div class="mcq-q">The word paradox in the final paragraph refers to the fact that</div>
                                            </div>
                                            <div class="mcq-options">
                                                <label><input type="radio" name="q40" value="A" {{ ($answers[40] ?? '') === 'A' ? 'checked' : '' }}> <span>poorer people will become richer than the people who run big businesses.</span></label>
                                                <label><input type="radio" name="q40" value="B" {{ ($answers[40] ?? '') === 'B' ? 'checked' : '' }}> <span>by being cynical, the big businesses have helped produce a result they do not want.</span></label>
                                                <label><input type="radio" name="q40" value="C" {{ ($answers[40] ?? '') === 'C' ? 'checked' : '' }}> <span>the suppliers of raw materials will sell them to big businesses for a huge profit.</span></label>
                                                <label><input type="radio" name="q40" value="D" {{ ($answers[40] ?? '') === 'D' ? 'checked' : '' }}> <span>big businesses will gain from these policies although they don't support them.</span></label>
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

            try {
                window.__readingAnswers = window.__readingAnswers || @json($answers ?? []);
            } catch (e) {
                window.__readingAnswers = window.__readingAnswers || {};
            }

            const hydrateFromAnswers = () => {
                const answers = window.__readingAnswers || {};
                Object.keys(answers).forEach((k) => {
                    const qNum = String(k);
                    const val = (answers[k] ?? '');
                    const value = (val === null || typeof val === 'undefined') ? '' : String(val);

                    // Text/hidden inputs
                    document.querySelectorAll(`input[type="text"][name="q${qNum}"], input[type="hidden"][name="q${qNum}"]`).forEach((inp) => {
                        if ((inp.value || '') === '') inp.value = value;
                    });

                    // Radio
                    if (value !== '') {
                        const radio = document.querySelector(`input[type="radio"][name="q${qNum}"][value="${CSS.escape(value)}"]`);
                        if (radio) radio.checked = true;
                    }

                    // Checkbox (comma-separated)
                    if (value !== '') {
                        const parts = value.split(',').map(v => v.trim()).filter(Boolean);
                        if (parts.length) {
                            document.querySelectorAll(`input[type="checkbox"][name="q${qNum}[]"]`).forEach((cb) => {
                                cb.checked = parts.includes(String(cb.value));
                            });
                        }
                    }
                });

                // Fire change so matching-grid scripts can pick updated hidden values
                document.querySelectorAll('input[type="hidden"][name^="q"], input[type="text"][name^="q"]').forEach((inp) => {
                    inp.dispatchEvent(new Event('change'));
                });
            };

            hydrateFromAnswers();

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
                        setTimeout(() => {
                            const options = item.querySelector('.mcq-options');
                            const container = item.closest('.question_site');
                            if (!options || !container) return;
                            const cRect = container.getBoundingClientRect();
                            const oRect = options.getBoundingClientRect();
                            const overflow = oRect.bottom - cRect.bottom;
                            if (overflow > 0) {
                                container.scrollTo({ top: container.scrollTop + overflow + 20, behavior: 'smooth' });
                            }
                        }, 270);
                    }
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

            initTfngAccordion('q14_20_tfng');

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

                updateAnsweredLinkState(qNum);

                setActiveQuestionLink(qNum);

                clearRowSelection(qNum);
                const cell = document.querySelector(`.tick-cell[data-row="${qNum}"][data-value="${value}"]`);
                if (cell) cell.classList.add('selected');
            }

            function setActiveQuestionLink(qNum) {
                const questionLinks = document.querySelectorAll('.question-link');
                questionLinks.forEach((l) => l.classList.remove('active'));

                const link = document.querySelector(`.question-link[data-question="${qNum}"]`);
                if (link) link.classList.add('active');
            }

            function updateAnsweredLinkState(qNum) {
                const link = document.querySelector(`.question-link[data-question="${qNum}"]`);
                const hidden = document.getElementById(String(qNum));
                const val = hidden ? (hidden.value || '').trim() : '';
                if (!link) return;
                if (val) link.classList.add('answered');
                else link.classList.remove('answered');
            }

            [21, 22, 23, 24, 27, 28, 29, 30, 31].forEach((qNum) => {
                const hidden = document.getElementById(String(qNum));
                const val = hidden ? (hidden.value || '').trim() : '';
                if (val) setMatchingAnswer(qNum, val);
                else updateAnsweredLinkState(qNum);
            });

            document.querySelectorAll('#q21_24_grid .tick-cell').forEach(function(cell) {
                cell.addEventListener('click', function() {
                    const row = parseInt(cell.getAttribute('data-row'), 10);
                    const val = cell.getAttribute('data-value');
                    if (!row || !val) return;
                    setMatchingAnswer(row, val);
                });
            });

            document.querySelectorAll('#q27_31_grid .tick-cell').forEach(function(cell) {
                cell.addEventListener('click', function() {
                    const row = parseInt(cell.getAttribute('data-row'), 10);
                    const val = cell.getAttribute('data-value');
                    if (!row || !val) return;
                    setMatchingAnswer(row, val);
                });
            });

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
                return /^q\d+(\[\])?$/.test(name);
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
                        __hexasSubmittingTest = true;
                        nativeSubmit.call(testForm);
                    });
                }, true);
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
            document.addEventListener('mouseup', () => isDragging = false);

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
        });
    </script>


</body>

</html>
