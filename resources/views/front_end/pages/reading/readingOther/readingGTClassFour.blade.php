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

        .sidebar {
            height: 85%;
            width: 0;
            position: fixed;
            top: 0;
            right: 0;
            background-color: #f1f1f1;
            overflow-x: hidden;
            transition: width 0.3s;
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

        .sidebar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ccc;
            padding: 5px 10px;
            margin-bottom: 10px;
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

        .sidebar-note-item {
            padding: 10px;
            border-bottom: 1px solid #eee;
        }

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
    </style>
</head>

<body>
    <form action="{{ route('reading.submit') }}" method="POST" id="testForm" spellcheck="false" autocomplete="off">
        @csrf

        {{-- hidden input --}}
        <input type="hidden" name="test_name" value="{{ $testName ?? 'class16_reading' }}">
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
                                    <span class="material-icons-outlined">schedule</span><strong id="timer">60 : 00
                                        minutes remaining</strong></a>
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
            <div id="customContextMenu" class="custom-context-menu" style="display: none;">
                <div id="highlightOption">🖍️ Highlight</div>
                <div id="notesOption">📝 Notes</div>
                <div id="clearOption">🗑️ Clear</div>
                <div id="allClear">📝 Clear all</div>
            </div>


            <!-- question part 1 -->
            <div class=" container-fluid px-5">
                <div class="tab-content active" id="part1" style="margin-bottom: 80px;">
                    <div class="question_part">
                        <h4>Part 1</h4>
                        <p>Write answers to questions in boxes 1-14 on your answer sheet.</p>
                    </div>
                    <div class="mt-4">


                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-md-6">
                                <div class="scroll-box" style="text-align:left;">
                                    <p>Read the text below and answer <strong>Questions 1-7</strong>.</p>
                                    <div class="border p-3 mb-4">
                                        <p class="text-center"><strong>Online roommate finder: Toronto</strong></p>
                                        <p>I have one room available in a large apartment located just off Queen and
                                            Bathurst in Toronto. The room is fully furnished with a double bed, desk,
                                            shelf and wardrobe.<br><br>

                                            About us: I’m Sasha! I’m Canadian, and I’ve been living in this apartment
                                            since I was a teenager. I’m 23 and work in a restaurant. These past two
                                            years, my best friend has been living here but as she’s now moving to Europe
                                            there is a room available as of October 1. The third room is occupied by
                                            Simon, who is from Australia. He works part-time in a music shop downtown
                                            and is a great drummer. We both like keeping the place neat and tidy – I
                                            actually enjoy cleaning in my spare time and sometimes we do it together as
                                            a roommate team (we make it fun!). I love watching movies, exploring,
                                            getting out of the city and into the outdoors, and listening to
                                            music.<br><br>

                                            The apartment itself is very large and comes equipped with unlimited wi-fi,
                                            a fully stocked kitchen, cable television, and Netflix. The bedroom is a
                                            long way from the living room, so it shouldn’t disturb you if people come
                                            round and besides, we are certainly very respectful. Oh! We also have two
                                            cats who are well-behaved but they might be a problem if you have allergies.
                                            If you have a pet, that’s no problem – these cats get along with other
                                            animals.<br><br>

                                            We love having people coming from other countries as it’s really fun having
                                            the opportunity to show them around the neighborhood (it’s a great
                                            neighborhood – lots of character and plenty to do). That

                                            said, we’re certainly interested in living with Canadians too! We’re very
                                            easy-going and open-minded and just hope that our new roommate will be the
                                            same.<br><br>
                                        </p>
                                    </div>

                                    <p><em>Read the text below and answer <strong>Questions 8-14</strong>.</em></p>
                                    <div class="border p-3">
                                        <p><strong>Smartphone fitness apps</strong></p>
                                        <p><strong>A Pacer</strong><br>
                                            Although they were previously split into ‘pro’ and ‘free’ versions, Pacer’s
                                            developer now generously includes all the features in one free app. That
                                            means you can spend no money, yet use your smartphone’s GPS capabilities to
                                            track your jogging routes, and examine details of your pace and calories
                                            burned.</p>

                                        <p><strong>B Beat2</strong><br>
                                            There are a wealth of running apps available, but Beat2 is a good one. This
                                            free app monitors your pace – or if you have a wrist or chest-based heart
                                            rate monitor, your beats per minute – and offers up its specially curated
                                            playlists to give you the perfect music for the pace you’re running at,
                                            adding a whole new dimension to your run. The best bit is when you explode
                                            into a sprint and the music pounds in your ears. Or if you fancy something
                                            different, the app also has In-App Purchases, including tales of past
                                            sporting heroes you can listen to while you run.</p>

                                        <p><strong>C Impel</strong><br>
                                            If you’re serious about the sport you do, then you should be serious about
                                            Impel. As smartphone fitness tools go it’s one of the best, allowing you to
                                            track your performance, set goals and see daily progress updates. If you’re
                                            ever not sure where to run or cycle you can find user-created routes on the
                                            app, or share your own. All of that comes free of charge, while a premium
                                            version adds even more tools.</p>

                                        <p><strong>D Fast Track</strong><br>
                                            There are plenty of GPS running apps for smartphones, but Fast Track is an
                                            excellent freebie. Although you naturally get more features if you pay for
                                            the ‘pro’ version, the free release gets you GPS tracking, a nicely designed
                                            map view, your training history, music, and cheering. Yes, you read the last
                                            of those right – you can have friends cheer you on as you huff and puff
                                            during a run. If you can afford the ‘pro’ version, you can add possible
                                            routes, voice coaches, smartwatch connectivity and more; but as a starting
                                            point, the free app gets you moving.</p>
                                    </div>

                                </div>
                            </div>
                            <!-- Column 2 -->
                            <div class="col-md-6 question_site">
                                <h3><strong>Questions 1-7</strong></h3>
                                <p>Choose <strong>TRUE</strong> if the statement agrees with the information given in
                                    the text, choose <strong>FALSE</strong> if the statement contradicts the
                                    information, or choose <strong>NOT GIVEN</strong> if there is no information on
                                    this.</p>

                                <div class="tfng-block" id="q1_7_tfng">
                                    <div class="tfng-item open">
                                        <div class="tfng-head">
                                            <div class="tfng-num">1</div>
                                            <div class="tfng-q">The room available has two beds.</div>
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
                                            <div class="tfng-q">The Australian in Sasha's apartment is a musician.</div>
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
                                            <div class="tfng-q">Sasha does all the cleaning in the apartment.</div>
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
                                            <div class="tfng-q">Sasha likes being in the open air.</div>
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
                                            <div class="tfng-q">The room available would be suitable for someone who
                                                likes to be quiet.</div>
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
                                            <div class="tfng-q">Sasha thinks her apartment is in the best part of
                                                Toronto.</div>
                                        </div>
                                        <div class="tfng-options">
                                            <label><input type="radio" name="q6" value="TRUE" {{ ($answers[6] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                            <label><input type="radio" name="q6" value="FALSE" {{ ($answers[6] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                            <label><input type="radio" name="q6" value="NOT GIVEN" {{ ($answers[6] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT
                                                    GIVEN</span></label>
                                        </div>
                                    </div>

                                    <div class="tfng-item">
                                        <div class="tfng-head">
                                            <div class="tfng-num">7</div>
                                            <div class="tfng-q">Sasha has never had a roommate from Canada.</div>
                                        </div>
                                        <div class="tfng-options">
                                            <label><input type="radio" name="q7" value="TRUE" {{ ($answers[7] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                            <label><input type="radio" name="q7" value="FALSE" {{ ($answers[7] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                            <label><input type="radio" name="q7" value="NOT GIVEN" {{ ($answers[7] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT
                                                    GIVEN</span></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Questions 8-14</strong></h3>
                                    <p>Look at the four reviews of Smartphone fitness apps, <strong>A-D</strong>.</p>
                                    <p>For which app are the following statements true?</p>
                                    <p>Write the correct letter, <strong>A-D</strong>, in boxes <strong>8-14</strong> on
                                        your answer sheet.</p>
                                    <p><strong>NB</strong> <em>You may use any letter more than once.</em></p>

                                    <div class="mt-4">
                                        <table class="table table-bordered matching-grid">
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
                                                @php
                                                    $q8_14 = [
                                                        8 => 'This app can be used for more than one sport.',
                                                        9 => 'You have to pay if you want this app to suggest where you can go.',
                                                        10 => 'This app has well-presented visuals.',
                                                        11 => 'You do not have to pay for any of the features on this app.',
                                                        12 => 'You can pay to download true stories on this app.',
                                                        13 => 'You can get ideas about where to go from other people on this app.',
                                                        14 => 'This app gives you details of the energy you have used.'
                                                    ];
                                                @endphp
                                                @foreach($q8_14 as $qNum => $desc)
                                                    <tr>
                                                        <td><strong id="question-{{ $qNum }}-number">{{ $qNum }}</strong>
                                                            {{ $desc }}</td>
                                                        <td class="tick-cell {{ ($answers[$qNum] ?? '') === 'A' ? 'selected' : '' }}"
                                                            data-row="{{ $qNum }}" data-value="A"><span
                                                                class="tick">✔</span></td>
                                                        <td class="tick-cell {{ ($answers[$qNum] ?? '') === 'B' ? 'selected' : '' }}"
                                                            data-row="{{ $qNum }}" data-value="B"><span
                                                                class="tick">✔</span></td>
                                                        <td class="tick-cell {{ ($answers[$qNum] ?? '') === 'C' ? 'selected' : '' }}"
                                                            data-row="{{ $qNum }}" data-value="C"><span
                                                                class="tick">✔</span></td>
                                                        <td class="tick-cell {{ ($answers[$qNum] ?? '') === 'D' ? 'selected' : '' }}"
                                                            data-row="{{ $qNum }}" data-value="D"><span
                                                                class="tick">✔</span></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        @for($i = 8; $i <= 14; $i++)
                                            <input type="hidden" name="q{{ $i }}" id="{{ $i }}"
                                                value="{{ $answers[$i] ?? '' }}">
                                        @endfor
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
                        <p>Write answers to questions in boxes 15-27 on your answer sheet.</p>
                    </div>
                    <div class="mt-4">

                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-md-6">
                                <div class="scroll-box" style="text-align:left;">
                                    <p>Read the text below and answer <strong>Questions 15-20</strong>.</p>
                                    <div class="border p-3 mb-4">
                                        <p class="text-center"><strong>Why you should delegate tasks to team
                                                members</strong></p>
                                        <p>Delegation helps you get more done, helps your team members progress through
                                            learning new things and spreads the load in the team.</p>
                                        <p>When you give someone a project task to do, make sure that they have all the
                                            information they require to actually get on and do it. That includes
                                            specifying the date it is due, writing a clear definition of the task,
                                            providing any resources they need to get it done or names of people you
                                            expect them to talk to. It also means informing them of any expectations you
                                            have, such as delivering it as a spreadsheet rather than a Word document.
                                        </p>
                                        <p>If you have concerns that someone doesn't have the skills to do a good job
                                            (or they tell you this outright), make sure that you offer some help. It
                                            might take longer this time but next time they will be able to do it without
                                            you, so it will save you time in the long run.</p>
                                        <p>Once you have given the task to someone, let them get on with it. Tell them
                                            how you expect to be kept informed, like through a report once a week. Then
                                            let them get on with it unless you feel things are not progressing as you
                                            would like.</p>
                                        <p>As a project manager, you have to retain some of the main project
                                            responsibilities for yourself. You shouldn't expect someone else on the
                                            project team to do your job. Equally, don't delegate tasks such as dull
                                            administrative ones, just because you don't want to do them. But remember
                                            that project management is a leadership position so you don't want your role
                                            to be seen as too basic.</p>
                                        <p>One way to free up your time to spend on the more strategic and leadership
                                            parts of project management is to delegate things that are regular, like
                                            noting whether weekly targets have been met. Could someone in your team take
                                            this on for you? This can be a useful way of up skilling your team members
                                            to complement any ongoing training and allowing them to gain confidence too.
                                        </p>
                                        <p>So in summary, be clear, supportive, and don't micromanage. Don't become the
                                            problem on your project that prevents progress just because you're afraid to
                                            leave people alone to get on with their jobs.</p>
                                    </div>

                                    <hr>

                                    <p>Read the text below and answer <strong>Questions 21-27</strong>.</p>
                                    <div class="border p-3">
                                        <p class="text-center"><strong>Choosing the right format for your CV</strong>
                                        </p>
                                        <p>A good CV should be clear, simple and easy to understand. Here are four of
                                            the most popular CV formats and advice on when to use them:</p>

                                        <p><strong>Chronological</strong><br>
                                            This is the traditional CV format and is extremely popular because it allows
                                            employers to see all the posts you have held in order. It provides
                                            flexibility because it works in almost all circumstances, the exception
                                            being if you have blocks of unemployment that are difficult to account for.
                                            This type of format is particularly useful when you have a solid and
                                            complete working history spanning five years or more.</p>

                                        <p><strong>Functional</strong><br>
                                            The functional CV is designed to describe your key skills rather than the
                                            jobs you have done. The functional CV format is typically used by people who
                                            have extensive gaps in their employment history, or have often changed jobs.
                                            It also suits those who want to go in a different direction work-wise and
                                            change industry. You might choose it if you want to highlight skills learned
                                            early in your career, points that might get missed if a chronological format
                                            is used. It is also appropriate if you have done little or no actual work,
                                            for example, if you are one of the current years graduates.</p>
                                        <p>Because this format is often used to cover a patchy employment history, some
                                            interviewers may view such CVs with suspicion, so be very careful should you
                                            choose it.</p>

                                        <p><strong>Achievement</strong><br>
                                            An alternative to the functional CV is to use an achievement-based resume
                                            highlighting key achievements in place of skills. This can help show your
                                            suitability for a role if you lack direct experience of it.</p>

                                        <p><strong>Non-traditional</strong><br>
                                            With the explosion of digital and creative industries over recent years, CV
                                            formats have become more and more imaginative. You can present information
                                            through graphics, which can be more visually engaging and turn out to be an
                                            unusual but winning option. This will definitely make you stand out from the
                                            crowd. It also demonstrates design skills and creativity in a way that a
                                            potential employer can see and feel. However, a highly creative CV format is
                                            only really appropriate for creative and artistic sectors, such as those
                                            involving promoting products, though it would also work for the media too.
                                        </p>
                                    </div>

                                </div>
                            </div>
                            <!-- Column 2 -->
                            <div class="col-md-6 question_site">
                                <h3><strong>Questions 15-20</strong></h3>
                                <p>Complete the sentences below.</p>
                                <p>Choose <strong>ONE WORD ONLY</strong> from the text for each answer.</p>
                                <p>Write your answers in boxes <strong>15-20</strong> on your answer sheet.</p>

                                <div class="mt-4">
                                    <div class="mb-3" style="line-height: 2;">
                                        <strong id="question-15-number">15.</strong> Ensure team members are aware of
                                        any <input type="text" name="q15"
                                            style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;"
                                            id="q15" placeholder="15" value="{{ $answers[15] ?? '' }}"> there are
                                        regarding how the work should be presented.
                                    </div>
                                    <div class="mb-3" style="line-height: 2;">
                                        <strong id="question-16-number">16.</strong> Make sure support is made available
                                        if any <input type="text" name="q16"
                                            style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;"
                                            id="q16" placeholder="16" value="{{ $answers[16] ?? '' }}"> exist as to the
                                        team member's ability to do the work.
                                    </div>
                                    <div class="mb-3" style="line-height: 2;">
                                        <strong id="question-17-number">17.</strong> Ask the team member to detail how
                                        the work is developing, for example by providing a regular <input type="text"
                                            name="q17"
                                            style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;"
                                            id="q17" placeholder="17" value="{{ $answers[17] ?? '' }}">.
                                    </div>
                                    <div class="mb-3" style="line-height: 2;">
                                        <strong id="question-18-number">18.</strong> Don't delegate administrative tasks
                                        simply because they are <input type="text" name="q18"
                                            style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;"
                                            id="q18" placeholder="18" value="{{ $answers[18] ?? '' }}">.
                                    </div>
                                    <div class="mb-3" style="line-height: 2;">
                                        <strong id="question-19-number">19.</strong> Managers can ask a team member to
                                        check on the achievement of <input type="text" name="q19"
                                            style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;"
                                            id="q19" placeholder="19" value="{{ $answers[19] ?? '' }}"> at fixed
                                        intervals.
                                    </div>
                                    <div class="mb-3" style="line-height: 2;">
                                        <strong id="question-20-number">20.</strong> If you <input type="text"
                                            name="q20"
                                            style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;"
                                            id="q20" placeholder="20" value="{{ $answers[20] ?? '' }}"> you risk
                                        delaying the whole project.
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Questions 21-27</strong></h3>
                                    <p>Complete the notes below.</p>
                                    <p>Choose <strong>ONE WORD ONLY</strong> from the text for each answer.</p>
                                    <p>Write your answers in boxes <strong>21-27</strong> on your answer sheet.</p>

                                    <div class="mt-4 border p-4" style="background-color: #f9f9f9;">
                                        <h5 class="text-center"><strong>CV formats</strong></h5>
                                        <p>There are several different formats including:</p>

                                        <p><strong>Chronological</strong></p>
                                        <ul>
                                            <li>very common</li>
                                            <li>gives <strong>21.</strong> <input type="text" name="q21"
                                                    style="border: 1px solid #ccc; padding: 2px 5px; width: 120px; text-align: left;"
                                                    id="q21" placeholder="21" value="{{ $answers[21] ?? '' }}"> in most
                                                cases</li>
                                            <li>perhaps inappropriate if there are periods where <strong>22.</strong>
                                                <input type="text" name="q22"
                                                    style="border: 1px solid #ccc; padding: 2px 5px; width: 120px; text-align: left;"
                                                    id="q22" placeholder="22" value="{{ $answers[22] ?? '' }}"> is not
                                                easy to explain
                                            </li>
                                        </ul>

                                        <p><strong>Functional</strong></p>
                                        <ul>
                                            <li>appropriate for people who intend to follow a new <strong>23.</strong>
                                                <input type="text" name="q23"
                                                    style="border: 1px solid #ccc; padding: 2px 5px; width: 120px; text-align: left;"
                                                    id="q23" placeholder="23" value="{{ $answers[23] ?? '' }}"> in their
                                                career
                                            </li>
                                            <li>suits recent graduates</li>
                                            <li>can create <strong>24.</strong> <input type="text" name="q24"
                                                    style="border: 1px solid #ccc; padding: 2px 5px; width: 120px; text-align: left;"
                                                    id="q24" placeholder="24" value="{{ $answers[24] ?? '' }}"> in
                                                recruiters, so is best used with caution</li>
                                        </ul>

                                        <p><strong>Achievement</strong></p>
                                        <ul>
                                            <li>focuses mainly on what the person has achieved</li>
                                            <li>may be advisable if the person has no <strong>25.</strong> <input
                                                    type="text" name="q25"
                                                    style="border: 1px solid #ccc; padding: 2px 5px; width: 120px; text-align: left;"
                                                    id="q25" placeholder="25" value="{{ $answers[25] ?? '' }}"> in the
                                                area</li>
                                        </ul>

                                        <p><strong>Non-traditional</strong></p>
                                        <ul>
                                            <li>enables use of attractive <strong>26.</strong> <input type="text"
                                                    name="q26"
                                                    style="border: 1px solid #ccc; padding: 2px 5px; width: 120px; text-align: left;"
                                                    id="q26" placeholder="26" value="{{ $answers[26] ?? '' }}"> to
                                                present data</li>
                                            <li>suits applications for jobs in marketing or <strong>27.</strong> <input
                                                    type="text" name="q27"
                                                    style="border: 1px solid #ccc; padding: 2px 5px; width: 120px; text-align: left;"
                                                    id="q27" placeholder="27" value="{{ $answers[27] ?? '' }}"></li>
                                        </ul>
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
                    <p>Read the text below and answers to the questions <strong>28-40</strong> on your answer sheet.</p>
                </div>
                <div class="mt-4">

                    <div class="row">
                        <!-- Column 1 -->
                        <div class="col-md-6">
                            <div class="scroll-box" style="text-align:left;">
                                <div class="border p-4">
                                    <p class="text-center"><strong>From Londinium to London</strong></p>
                                    <p><strong>A.</strong> The history of London spans a period of approximately 2,000
                                        years. On its way to becoming one of the present-day financial and cultural
                                        capitals of the world, momentous highs and lows have accompanied the town. By 43
                                        AD, an early point in its history, a time when Romans had invaded Britain, it
                                        had already been a target of several external invasions. The Roman settlers
                                        there at the time named the area <em>Londinium</em>, which is commonly believed
                                        to be the origin of the present-day name, <em>London</em>.</p>

                                    <p><strong>B.</strong> Researchers believe that before the Romans, no city existed
                                        where London is today. It was just a rural area with significant richness and
                                        attractiveness in terms of natural resources and location. They base this on the
                                        fact that only very scattered evidence of farming, burial and habitation have
                                        been uncovered in the area. Early <em>Roman London</em>, which is also referred
                                        to as The <em>First London</em>, was a very small area that existed for just 17
                                        years. Around 61 AD the Celtic-speaking Iceni tribe from Eastern Britain, who
                                        opposed the occupying forces of the Roman Empire, stormed the city and burnt it
                                        to the ground. By 100 AD it was rebuilt according to a development plan and was
                                        made the capital of the Roman province of Britannia. By the 2nd century AD,
                                        London had a population of approximately 60,000. In the 3rd century AD, however,
                                        due to internal troubles within the Roman Empire, the city was brought down
                                        again. By the 5th century AD, it had become an abandoned city.</p>

                                    <p><strong>C.</strong> During the next century, the area near London saw the
                                        settlement of a new race of people, the Anglo-Saxons. These people started to
                                        migrate about 1 kilometre upstream from the Roman London city. Their settlement
                                        was called <em>Lundenwic</em>, and had fishing and trading as its economic base.
                                        Disaster struck for the city in 850 AD when its defence was broken down by a
                                        major Viking<sup>1</sup> raid. However, the Viking occupation which had lasted
                                        for 20 years was overturned by Alfred the Great, the new King of England, who
                                        succeeded in establishing power via a peaceful agreement. He rebuilt the
                                        defensive wall for the city to protect his people. Gradually, as a result of
                                        contributions by the then ruling kings, London once again became an
                                        international trading centre and political powerhouse. However, in the late 10th
                                        century Vikings raided again and took control of the city and forced the ruling
                                        King Ethelred to flee. His army then made a counter attack and won. Thus,
                                        English control was once more established.</p>

                                    <p><strong>D.</strong> King Canute ruled London and the adjacent countryside until
                                        his death in 1042, when his son, Edward, took control and re-founded Westminster
                                        Abbey. By this time London had already become the largest city in the whole of
                                        England. In 1066 William the Conqueror became the King of England and built a
                                        castle in the southeast part to better keep a watchful eye on its inhabitants.
                                        The later kings expanded the castle, which is now known as the <em>Tower of
                                            London</em>. During 1097 William II built <em>Westminster Hall</em> adjacent
                                        to the <em>Westminster Abbey</em> as a key structure in the new Palace of
                                        Westminster, which was the main royal residence all through the Middle Ages.</p>
                                    <p>Primarily, because of the unique administration through the <em>Corporation of
                                            London</em>, which was the municipal governing body that later became the
                                        <em>City of London Corporation</em>, London became a centre of trade and
                                        commerce and was named the capital of England in the 12th century.
                                    </p>

                                    <p><strong>E.</strong> In 1588 the Spanish Armada sailed against England and was
                                        defeated. The defeat of the Spanish led to more political stability in England
                                        allowing London to prosper even more. Good times followed until tragedy struck
                                        during the middle and late 16th century through The <em>Great Fire of
                                            London</em>. Starting from a small bakery, the fire burnt to the ground, the
                                        homes of 70,000 of London’s 80,000 inhabitants. Rebuilding the city would take
                                        ten long years. The middle of the 17th century was also a matter of great
                                        misfortune for London due to an outbreak of the Great Plague, which caused the
                                        deaths of almost a fifth of the population.</p>

                                    <p><strong>F.</strong> The first quarter of the 18th century saw London become and
                                        remain the world's largest city. Major developments within this period included
                                        the building of a rail network and a city metro system; the systematic
                                        development of a workforce; a local government system and other large-scale
                                        building of infrastructure. After World War II, London became home to a large
                                        number of immigrants - especially those from other parts of the Commonwealth -
                                        making London one of the most culturally diverse cities in the whole of Europe.
                                        Despite occasional set-backs - like the <em>Brixton Riots</em> in the early
                                        1980s - the integration of new migrants into London was comparatively smoother
                                        than other regions around the United Kingdom.</p>

                                    <p><strong>G.</strong> From the 1980s onward, some successful economic reforms and
                                        revival programs were implemented in London that significantly contributed to
                                        re-establish it as a pre-eminent international centre. Today London is
                                        considered by many to be the most important and influential city in Europe with
                                        around 32% of all foreign exchange around the world occurring in the city on a
                                        daily basis. The British government continues to devote more resources to the
                                        development of London with the people of the city now preparing to hosting the
                                        2012 Summer Olympics.</p>

                                    <div class="border p-2 mt-3">
                                        <p><sup>1</sup><em>Ship-borne warriors originating from Scandinavia i.e.
                                                northern Europe.</em></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Column 2 -->
                        <div class="col-md-6 question_site">
                            <h3><strong>Questions 28 - 35</strong></h3>
                            <p>The passage has seven paragraphs <strong>A-G</strong>.</p>
                            <p>Which paragraph contains the following information?</p>
                            <p>Write the correct letter <strong>A-G</strong> in boxes <strong>28-35</strong> on your
                                answer sheet.</p>
                            <p><strong>NB</strong>. <em>You may use any letter more than once.</em></p>

                            <div class="mt-4">
                                <div class="mb-3">
                                    <strong id="question-28-number">28.</strong> an example of two groups of people
                                    making an agreement, not to war <input type="text" name="q28"
                                        style="border: 1px solid #ccc; padding: 2px 5px; width: 80px; text-align: left;"
                                        id="q28" placeholder="28" value="{{ $answers[28] ?? '' }}">
                                </div>
                                <div class="mb-3">
                                    <strong id="question-29-number">29.</strong> a big upcoming event for London <input
                                        type="text" name="q29"
                                        style="border: 1px solid #ccc; padding: 2px 5px; width: 80px; text-align: left;"
                                        id="q29" placeholder="29" value="{{ $answers[29] ?? '' }}">
                                </div>
                                <div class="mb-3">
                                    <strong id="question-30-number">30.</strong> London as a deserted city <input
                                        type="text" name="q30"
                                        style="border: 1px solid #ccc; padding: 2px 5px; width: 80px; text-align: left;"
                                        id="q30" placeholder="30" value="{{ $answers[30] ?? '' }}">
                                </div>
                                <div class="mb-3">
                                    <strong id="question-31-number">31.</strong> commonly believed to be the origination
                                    of the word ‘London’ <input type="text" name="q31"
                                        style="border: 1px solid #ccc; padding: 2px 5px; width: 80px; text-align: left;"
                                        id="q31" placeholder="31" value="{{ $answers[31] ?? '' }}">
                                </div>
                                <div class="mb-3">
                                    <strong id="question-32-number">32.</strong> London and a mass disease <input
                                        type="text" name="q32"
                                        style="border: 1px solid #ccc; padding: 2px 5px; width: 80px; text-align: left;"
                                        id="q32" placeholder="32" value="{{ $answers[32] ?? '' }}">
                                </div>
                                <div class="mb-3">
                                    <strong id="question-33-number">33.</strong> most of the city dwellers lost their
                                    dwelling place <input type="text" name="q33"
                                        style="border: 1px solid #ccc; padding: 2px 5px; width: 80px; text-align: left;"
                                        id="q33" placeholder="33" value="{{ $answers[33] ?? '' }}">
                                </div>
                                <div class="mb-3">
                                    <strong id="question-34-number">34.</strong> the main reason why London became the
                                    capital of England <input type="text" name="q34"
                                        style="border: 1px solid #ccc; padding: 2px 5px; width: 80px; text-align: left;"
                                        id="q34" placeholder="34" value="{{ $answers[34] ?? '' }}">
                                </div>
                                <div class="mb-3">
                                    <strong id="question-35-number">35.</strong> an example of a conclusion made by
                                    those who study history. <input type="text" name="q35"
                                        style="border: 1px solid #ccc; padding: 2px 5px; width: 80px; text-align: left;"
                                        id="q35" placeholder="35" value="{{ $answers[35] ?? '' }}">
                                </div>
                            </div>

                            <div class="mt-5">
                                <h3><strong>Questions 36-40</strong></h3>
                                <p>Choose <strong>TRUE</strong> if the statement agrees with the information given in the text, choose <strong>FALSE</strong> if the statement contradicts the information, or choose <strong>NOT GIVEN</strong> if there is no information on this.</p>

                                <div class="tfng-block" id="q36_40_tfng">
                                    <div class="tfng-item open">
                                        <div class="tfng-head">
                                            <div class="tfng-num">36</div>
                                            <div class="tfng-q">The Romans gave London its name.</div>
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
                                            <div class="tfng-q">A sudden attack on The First London totally destroyed
                                                it.</div>
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
                                            <div class="tfng-q">The area, once known as Early Roman London, now joins
                                                with modern-day London.</div>
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
                                            <div class="tfng-q">In order to control the people of London more
                                                effectively, William the Conqueror built a castle.</div>
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
                                            <div class="tfng-q">70,000 houses were burnt by the Great Fire of London.
                                            </div>
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
            // Prevent Enter from submitting in inputs
            testForm?.addEventListener('keydown', (e) => {
                if (e.key === 'Enter') {
                    const tag = e.target.tagName.toLowerCase();
                    if (tag === 'input' || tag === 'select') e.preventDefault();
                }
            });
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

                input.addEventListener('focus', function () {
                    if (this.placeholder) {
                        this.dataset.placeholder = this.placeholder;
                        this.placeholder = '';
                    }
                    let qNum = this.id || this.name.replace('q', '').replace('[]', '').replace('_radio', '');
                    if (qNum.startsWith('q')) qNum = qNum.substring(1);
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

                const startTestBtn = document.getElementById('startTestButton');
                const studentIdInput = document.getElementById('studentIdInput');

                const handleStart = () => {
                    const sId = studentIdInput?.value;
                    if (sId && sId.length >= 8) {
                        modal.hide();
                        document.documentElement.requestFullscreen?.().catch(() => { });
                    } else {
                        const err = document.getElementById('studentIdError');
                        if (err) err.style.display = 'block';
                    }
                };

                startTestBtn?.addEventListener('click', handleStart);

                studentIdInput?.addEventListener('keydown', (e) => {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        handleStart();
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
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');
        const contextMenu = document.getElementById('customContextMenu');
        const highlightOption = document.getElementById('highlightOption');
        const notesOption = document.getElementById('notesOption');
        const clearOption = document.getElementById('clearOption');
        const allClearOption = document.getElementById('allClear');

        // Sidebar logic
        document.getElementById('noteToggle').addEventListener('click', () => {
            sidebar.classList.toggle('open');
            mainContent.classList.toggle('shifted');
        });

        sidebar.querySelector('.close-btn').addEventListener('click', () => {
            sidebar.classList.remove('open');
            mainContent.classList.remove('shifted');
        });

        let selectionRange = null;
        let activePopup = null;
        let clickedMark = null;

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
                const rawRange = sel.getRangeAt(0).cloneRange();
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
                        newRange.setStart(startN, startO);
                        newRange.setEnd(endN, endO);
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

        document.addEventListener('click', e => {
            if (!contextMenu.contains(e.target)) {
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

            // Fast path for single text node (keeps logic simple and handles offsets perfectly)
            if (startContainer === endContainer && startContainer && startContainer.nodeType === Node.TEXT_NODE) {
                const selectedText = startContainer.textContent.substring(startOffset, endOffset);
                if (!selectedText.trim()) return marks;
                // Safeguard: Don't highlight directly inside layout nodes (like TR)
                if (['TABLE', 'THEAD', 'TBODY', 'TR'].includes(startContainer.parentNode?.tagName)) return marks;

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

            // Multi-node selection (e.g. across table cells)
            const textNodes = [];
            const ancestor = range.commonAncestorContainer;
            const treeWalker = document.createTreeWalker(
                ancestor.nodeType === Node.TEXT_NODE ? ancestor.parentNode : ancestor,
                NodeFilter.SHOW_TEXT,
                null,
                false
            );

            let node;
            while (node = treeWalker.nextNode()) {
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
                if (!selectedText.trim()) return; // Skip whitespace nodes between table cells

                // Skip if directly inside a layout element (safeguard for tables)
                const parent = textNode.parentNode;
                if (!parent || ['TABLE', 'THEAD', 'TBODY', 'TR'].includes(parent.tagName)) return;

                const mark = document.createElement('mark');
                mark.style.backgroundColor = 'yellow';
                if (typeof markInitializer === 'function') markInitializer(mark);
                mark.textContent = selectedText;

                const currentText = textNode.textContent;
                const beforeText = currentText.substring(0, start);
                const afterText = currentText.substring(end);

                if (afterText) parent.insertBefore(document.createTextNode(afterText), textNode.nextSibling);
                parent.insertBefore(mark, textNode.nextSibling);
                if (beforeText) {
                    textNode.textContent = beforeText;
                } else {
                    parent.removeChild(textNode);
                }
                marks.push(mark);
            });

            return marks;
        }

        highlightOption.addEventListener('click', () => {
            if (selectionRange) highlightRange(selectionRange);
            contextMenu.style.display = 'none';
            window.getSelection().removeAllRanges();
        });

        function showNotePopup(mark) {
            if (activePopup) activePopup.remove();
            const markId = mark.dataset.markId;
            const notePopup = document.createElement('div');
            notePopup.classList.add('note-popup');
            notePopup.innerHTML = `
                <div class="drag-handle" style="background: #ddd; padding: 8px; cursor: move; border-bottom: 1px solid #ccc; display: flex; justify-content: space-between; align-items: center; user-select: none;">
                    <span style="font-size: 10px; color: #666;"> Drag to move</span>
                    <span class="close-note" style="cursor: pointer; font-size: 20px; font-weight: bold; color: #666;">&times;</span>
                </div>
                <div class="popup-header" contenteditable="true" style="font-weight: normal; font-size: 14px; cursor: text; padding: 8px; margin-bottom: 5px; outline: none; word-wrap: break-word;">${mark.dataset.header || mark.innerText}</div>
                <div style="padding: 0 8px 8px 8px;">
                    <textarea placeholder="Add your note here..." style="width:100%; border: 1px solid #bbb; background-color: #fff; height: 100px; cursor: text; padding: 8px; font-size: 14px; resize: vertical; outline: none; border-radius: 4px;">${mark.dataset.note || ''}</textarea>
                </div>
            `;
            document.body.appendChild(notePopup);
            activePopup = notePopup;
            const rect = mark.getBoundingClientRect();
            notePopup.style.left = (rect.left + window.scrollX) + 'px';
            notePopup.style.top = (rect.bottom + window.scrollY + 5) + 'px';
            const textarea = notePopup.querySelector('textarea');
            const popupHeader = notePopup.querySelector('.popup-header');
            const updateMeta = () => {
                if (!markId) return;
                const related = document.querySelectorAll(`mark[data-mark-id="${CSS.escape(markId)}"]`);
                related.forEach(m => {
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
            textarea.addEventListener('input', updateMeta);
            popupHeader.addEventListener('input', updateMeta);
            notePopup.querySelector('.close-note').addEventListener('click', () => {
                notePopup.remove();
                activePopup = null;
            });
            let isDragging = false, offsetX, offsetY;
            const dragHandle = notePopup.querySelector('.drag-handle');
            dragHandle.addEventListener('mousedown', (e) => {
                if (e.target.classList.contains('close-note')) return;
                isDragging = true;
                offsetX = e.clientX - notePopup.offsetLeft;
                offsetY = e.clientY - notePopup.offsetTop;
                e.preventDefault();
            });
            document.addEventListener('mousemove', (e) => {
                if (!isDragging) return;
                notePopup.style.left = (e.clientX - offsetX) + 'px';
                notePopup.style.top = (e.clientY - offsetY) + 'px';
            });
            document.addEventListener('mouseup', () => isDragging = false);
            textarea.focus();
        }

        notesOption.addEventListener('click', () => {
            if (clickedMark) {
                showNotePopup(clickedMark);
                contextMenu.style.display = 'none';
                return;
            }
            if (selectionRange) {
                const markId = String(Date.now());
                const marks = highlightRange(selectionRange, (m) => {
                    m.setAttribute('data-tooltip', 'true');
                    m.dataset.markId = markId;
                });
                if (marks.length > 0) {
                    const fullHeader = marks.map(m => m.innerText).join(' ').replace(/\s+/g, ' ').trim();
                    marks.forEach(mk => {
                        mk.dataset.header = fullHeader;
                        mk.addEventListener('click', e => {
                            e.stopPropagation();
                            showNotePopup(mk);
                        });
                    });
                    const noteDiv = document.createElement('div');
                    noteDiv.classList.add('sidebar-note-item');
                    noteDiv.dataset.markId = markId;
                    noteDiv.innerHTML = `
                        <div class="sidebar-header" style="cursor: pointer; font-size: 14px; font-weight: normal; padding: 5px 0;">${fullHeader}</div>
                        <div class="sidebar-note-content" style="font-size: 12px; color: #666; white-space: pre-wrap;"></div>
                    `;
                    sidebar.appendChild(noteDiv);
                    noteDiv.addEventListener('click', () => showNotePopup(marks[0]));

                    // Small delay to ensure highlight DOM is ready before showing popup
                    setTimeout(() => {
                        showNotePopup(marks[0]);
                    }, 50);
                }
            }
            contextMenu.style.display = 'none';
            window.getSelection().removeAllRanges();
        });

        clearOption.addEventListener('click', () => {
            if (clickedMark) {
                const mid = clickedMark.dataset.markId;
                const toClear = mid ? document.querySelectorAll(`mark[data-mark-id="${CSS.escape(mid)}"]`) : [clickedMark];
                toClear.forEach(mk => {
                    const parent = mk.parentNode;
                    while (mk.firstChild) parent.insertBefore(mk.firstChild, mk);
                    mk.remove();
                });
                if (mid) document.querySelector(`.sidebar-note-item[data-mark-id="${mid}"]`)?.remove();
                if (activePopup) { activePopup.remove(); activePopup = null; }
            }
            contextMenu.style.display = 'none';
        });

        allClearOption.addEventListener('click', () => {
            document.querySelectorAll('mark').forEach(mk => {
                const parent = mk.parentNode;
                while (mk.firstChild) parent.insertBefore(mk.firstChild, mk);
                mk.remove();
            });
            document.querySelectorAll('.sidebar-note-item').forEach(i => i.remove());
            if (activePopup) { activePopup.remove(); activePopup = null; }
            sidebar.classList.remove('open');
            mainContent.classList.remove('shifted');
            contextMenu.style.display = 'none';
        });

        document.addEventListener('click', e => {
            if (activePopup && !activePopup.contains(e.target) && e.target.tagName !== 'MARK') {
                activePopup.remove();
                activePopup = null;
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
    </script>
</body>

</html>