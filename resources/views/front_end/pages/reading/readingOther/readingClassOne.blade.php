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
        }

        .question_part h4 {
            font-weight: bold;
        }

        .question_part p {
            font-weight: normal;
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
        .dnd-dropzone {
            min-height: 34px;
            border: 2px dashed #aaa;
            border-radius: 4px;
            padding: 5px 10px;
            margin-bottom: 8px;
            background: #f9f9f9;
            font-size: 14px;
            color: #333;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            min-width: 80px;
        }
        .dnd-dropzone.drag-over {
            border-color: #2980b9;
            background: #ebf5fb;
        }
        .dnd-dropzone .dnd-placed {
            background: #d4efdf;
            border: 1px solid #27ae60;
            padding: 4px 10px;
            border-radius: 4px;
            font-size: 13px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .dnd-dropzone .dnd-remove {
            cursor: pointer;
            font-weight: bold;
            color: #e74c3c;
            font-size: 16px;
            line-height: 1;
        }

        #q11_12_accordion .accordion-item {
            border: 0;
            margin-bottom: 12px;
            border-radius: 0;
            overflow: visible;
            box-shadow: none;
            background: transparent;
        }

        #q11_12_accordion .accordion-button {
            border: 0;
            box-shadow: none;
            background: #dbeafe;
            border-radius: 8px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.12);
        }

        #q11_12_accordion .accordion-button:focus {
            box-shadow: none;
        }

        #q11_12_accordion .accordion-button::after {
            display: none;
        }

        #q11_12_accordion .accordion-body {
            border-top: 0;
            background: transparent;
            padding-left: 0;
        }

        #q16_21_accordion .accordion-item {
            border: 0;
            margin-bottom: 12px;
            border-radius: 0;
            overflow: visible;
            box-shadow: none;
            background: transparent;
        }

        #q16_21_accordion .accordion-button {
            border: 0;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.12);
            background: #dbeafe;
            border-radius: 8px;
        }

        #q16_21_accordion .accordion-button:focus {
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.12);
        }

        #q16_21_accordion .accordion-button::after {
            display: none;
        }

        #q16_21_accordion .accordion-body {
            border-top: 0;
            background: transparent;
            padding-left: 0;
        }

        #q22_25_accordion .accordion-item {
            border: 0;
            margin-bottom: 12px;
            border-radius: 0;
            overflow: visible;
            box-shadow: none;
            background: transparent;
        }

        #q22_25_accordion .accordion-button {
            border: 0;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.12);
            background: #dbeafe;
            border-radius: 8px;
        }

        #q22_25_accordion .accordion-button:focus {
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.12);
        }

        #q22_25_accordion .accordion-button::after {
            display: none;
        }

        #q22_25_accordion .accordion-body {
            border-top: 0;
            background: transparent;
            padding-left: 0;
        }

        #q26_28_accordion .accordion-item {
            border: 0;
            margin-bottom: 12px;
            border-radius: 0;
            overflow: visible;
            box-shadow: none;
            background: transparent;
        }

        #q26_28_accordion .accordion-button {
            border: 0;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.12);
            background: #dbeafe;
            border-radius: 8px;
        }

        #q26_28_accordion .accordion-button:focus {
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.12);
        }

        #q26_28_accordion .accordion-button::after {
            display: none;
        }

        #q26_28_accordion .accordion-body {
            border-top: 0;
            background: transparent;
            padding-left: 0;
        }

        .question_site .accordion-button,
        .question_site .accordion-button * ,
        .question_site .accordion-body,
        .question_site .accordion-body * {
            -webkit-user-select: text;
            user-select: text;
        }

        .question_site .accordion-button,
        .question_site .accordion-button * {
            -webkit-user-select: text !important;
            user-select: text !important;
        }

        .question_site .accordion-button {
            cursor: text;
        }

        #q29_34_accordion .accordion-item {
            border: 0;
            margin-bottom: 12px;
            border-radius: 0;
            overflow: visible;
            box-shadow: none;
            background: transparent;
        }

        #q29_34_accordion .accordion-button {
            border: 0;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.12);
            background: #dbeafe;
            border-radius: 8px;
        }

        #q29_34_accordion .accordion-button:focus {
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.12);
        }

        #q29_34_accordion .accordion-button::after {
            display: none;
        }

        #q29_34_accordion .accordion-body {
            border-top: 0;
            background: transparent;
            padding-left: 0;
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

        /* Input field styling for reading questions */
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

        .question_site .accordion-button mark {
            display: inline;
            white-space: normal;
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
</head>

<body>
    <form action="{{ route('reading.submit') }}" method="POST" id="testForm" spellcheck="false" autocomplete="off">
        @csrf

        {{-- hidden input  --}}
        <input type="hidden" name="test_name" value="{{ $testName ?? 'class18_reading' }}">
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
                        <p><strong>Read the text below and answer questions 1-12</strong>
                        </p>
                    </div>
                    <div class="mt-4">


                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-md-6">


                                <div class="scroll-box" style="text-align:left;">
                                    
                                    <h4><strong>Right and left-handedness in humans</strong></h4>

                                    <p>Why do humans, virtually alone among all animal species, display a distinct left or right-handedness? Not even our closest relatives among the apes possess such decided lateral asymmetry, as psychologists call it. Yet about 90 per cent of every human population that has ever lived appears to have been right-handed. Professor Bryan Turner at Deakin University has studied the research literature on left-handedness and found that handedness goes with sidedness. So nine out of ten people are right-handed and eight are right-footed. He noted that this distinctive asymmetry in the human population is itself systematic. "Humans think in categories: black and white, up and down, left and right. It's a system of signs that enables us to categories phenomena that are essentially ambiguous.'<br><br>
                                    
                                    
                                    Research has shown that there is a genetic or inherited element to handedness. But while left-handedness tends to run in families, neither left nor right hander's will automatically produce off-spring with the same handedness; in fact about 6 per cent of children with two right-handed parents will be left-handed. However, among two left-handed parents, perhaps 40 per cent of the children will also be left-handed. With one right and one left-handed parent, 15 to 20 per cent of the offspring will be left handed. Even among identical twins who have exactly the same genes, one in six pairs will differ in their handedness.<br><br>

                                    What then makes people left-handed if it is not simply genetic? Other factors must be at work and researchers have turned to the brain for clues. In the 1860s the French surgeon and anthropologist, Dr Paul Broca, made the remarkable finding that patients who had lost their powers of speech as a result of a stroke (a blood clot in the brain) had paralysis of the right half of their body. He noted that since the left hemisphere of the brain controls the right half of the body, and vice versa, the brain damage must have been in the brain's left hemisphere. Psychologists now believe that among right-handed people, probably 95 per cent have their language centre in the left hemisphere, while 5 per cent have right sided language. Left-handers, however, do not show the reverse pattern but instead a majority also has their language in the left hemisphere. Some 30 per cent have right hemisphere language.<br><br>

                                    Dr Brinkman, a brain researcher at the Australian National University in Canberra, has suggested that evolution of speech went with right-handed preference. According to Brinkman, as the brain evolved, one side became specialized for fine control of movement (necessary for producing speech) and along with this evolution came right-hand preference. According to Brinkman, most left-handers have left hemisphere dominance but also some capacity in the right hemisphere. She has observed that if a left-handed person is brain-damaged in the left hemisphere, the recovery of speech is quite often better and this is explained by the fact that left-handers have a more bilateral speech function.<br><br>

                                    In her studies of macaque monkeys, Brinkman has noticed that primates (monkeys) seem to learn a hand preference from their mother in the first year of life but this could be one hand or 
the other. In humans, however, the specialization in (unction of the two hemispheres results in anatomical differences: areas that are involved with the production of speech are usually larger on the left side than on the right. Since monkeys have not acquired the art of speech, one would not expect to see such a variation but Brinkman claims to have discovered a trend in monkeys towards the asymmetry that is evident in the human brain.<br><br>

                                    Two American researchers, Geschwind and Galaburda, studied the brains of  human embryos and discovered that the left-right asymmetry exists before birth. But as the brain develops, a number of things can affect it. Every brain is initially female in its organization and it only becomes a male brain when the male fetus begins to secrete hormones. Geschwind and Galaburda knew that different parts of the brain mature at different rates; the right hemisphere develops first, then the left. Moreover, a girl's brain develops somewhat faster than that of a boy. So, if something happens to the brain's development during pregnancy, it is more likely to be affected in a male and the hemisphere more likely to be involved is the left. The brain may become less lateralized and this in turn could result in left-handedness and the development of certain superior skills that have their origins in the left hemisphere such as logic, rationality and abstraction. It should be no surprise then that among mathematicians and architects, left-handers tend to be more common and there are more left-handed males than females.<br><br>

                                    The results of this research may be some consolation to left-handers who have for centuries lived in a world designed to suit right-handed people. However, what is alarming, according to Mr. Charles Moore, a writer and journalist, is the way the word "right" reinforces its own virtue. Subliminally he says, language tells people to think that anything on the right can be trusted while anything on the left is dangerous or even sinister. We speak of left-handed compliments and according to Moore, "it is no coincidence that left-handed children, forced to use their right hand, often develop a stammer as they are robbed of their freedom of speech". However, as more research is undertaken on the causes of left-handedness, attitudes towards left-handed people are gradually changing for the better. Indeed when the champion tennis player Ivan Lendl was asked what the single thing was that he would choose in order to improve his game, he said he would like to become a lefthander.
                                    </p>



                                </div>


                            </div>
                            <!-- Column 2 -->
                            <div class="col-md-6 question_site">
                                <h3><strong>Questions 1-7</strong></h3>
                                <p><em>Use the information in the text to match the people (listed A-E) with the opinions (listed 1-7) below.</em></p>
                                <p><em>Choose the correct letter(A - E) for each opinion.</em></p>
                                <p><em>Some people match more than one opinion.</em></p>

                                <div class="mt-3">
                                    <table class="table table-bordered mt-3" style="width: 260px;">
                                        <tbody>
                                            <tr>
                                                <th colspan="2" style="background:#f7f7f7;">First invented or used by</th>
                                            </tr>
                                            <tr><th style="width: 48px;">A</th><td>Dr Broca</td></tr>
                                            <tr><th>B</th><td>Dr Brinkman</td></tr>
                                            <tr><th>C</th><td>Geschwind and Galaburda</td></tr>
                                            <tr><th>D</th><td>Charles Moore</td></tr>
                                            <tr><th>E</th><td>Professor Turner</td></tr>
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
                                                <td><strong>1</strong> Human beings started to show a preference for right-handedness when they first developed language.</td>
                                                <td class="choice-cell tick-cell" data-row="1" data-value="A"><span class="tick">✓</span></td>
                                                <td class="choice-cell tick-cell" data-row="1" data-value="B"><span class="tick">✓</span></td>
                                                <td class="choice-cell tick-cell" data-row="1" data-value="C"><span class="tick">✓</span></td>
                                                <td class="choice-cell tick-cell" data-row="1" data-value="D"><span class="tick">✓</span></td>
                                                <td class="choice-cell tick-cell" data-row="1" data-value="E"><span class="tick">✓</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>2</strong> Society is prejudiced against left-handed people.</td>
                                                <td class="choice-cell tick-cell" data-row="2" data-value="A"><span class="tick">✓</span></td>
                                                <td class="choice-cell tick-cell" data-row="2" data-value="B"><span class="tick">✓</span></td>
                                                <td class="choice-cell tick-cell" data-row="2" data-value="C"><span class="tick">✓</span></td>
                                                <td class="choice-cell tick-cell" data-row="2" data-value="D"><span class="tick">✓</span></td>
                                                <td class="choice-cell tick-cell" data-row="2" data-value="E"><span class="tick">✓</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>3</strong> Boys are more likely to be left-handed.</td>
                                                <td class="choice-cell tick-cell" data-row="3" data-value="A"><span class="tick">✓</span></td>
                                                <td class="choice-cell tick-cell" data-row="3" data-value="B"><span class="tick">✓</span></td>
                                                <td class="choice-cell tick-cell" data-row="3" data-value="C"><span class="tick">✓</span></td>
                                                <td class="choice-cell tick-cell" data-row="3" data-value="D"><span class="tick">✓</span></td>
                                                <td class="choice-cell tick-cell" data-row="3" data-value="E"><span class="tick">✓</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>4</strong> After a stroke, left-handed people recover their speech more quickly than righthanded people.</td>
                                                <td class="choice-cell tick-cell" data-row="4" data-value="A"><span class="tick">✓</span></td>
                                                <td class="choice-cell tick-cell" data-row="4" data-value="B"><span class="tick">✓</span></td>
                                                <td class="choice-cell tick-cell" data-row="4" data-value="C"><span class="tick">✓</span></td>
                                                <td class="choice-cell tick-cell" data-row="4" data-value="D"><span class="tick">✓</span></td>
                                                <td class="choice-cell tick-cell" data-row="4" data-value="E"><span class="tick">✓</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>5</strong> People who suffer strokes on the left side of the brain usually lose their power of speech.</td>
                                                <td class="choice-cell tick-cell" data-row="5" data-value="A"><span class="tick">✓</span></td>
                                                <td class="choice-cell tick-cell" data-row="5" data-value="B"><span class="tick">✓</span></td>
                                                <td class="choice-cell tick-cell" data-row="5" data-value="C"><span class="tick">✓</span></td>
                                                <td class="choice-cell tick-cell" data-row="5" data-value="D"><span class="tick">✓</span></td>
                                                <td class="choice-cell tick-cell" data-row="5" data-value="E"><span class="tick">✓</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>6</strong> The two sides of the brain develop different functions before birth.</td>
                                                <td class="choice-cell tick-cell" data-row="6" data-value="A"><span class="tick">✓</span></td>
                                                <td class="choice-cell tick-cell" data-row="6" data-value="B"><span class="tick">✓</span></td>
                                                <td class="choice-cell tick-cell" data-row="6" data-value="C"><span class="tick">✓</span></td>
                                                <td class="choice-cell tick-cell" data-row="6" data-value="D"><span class="tick">✓</span></td>
                                                <td class="choice-cell tick-cell" data-row="6" data-value="E"><span class="tick">✓</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>7</strong> Asymmetry is a common feature of the human body.</td>
                                                <td class="choice-cell tick-cell" data-row="7" data-value="A"><span class="tick">✓</span></td>
                                                <td class="choice-cell tick-cell" data-row="7" data-value="B"><span class="tick">✓</span></td>
                                                <td class="choice-cell tick-cell" data-row="7" data-value="C"><span class="tick">✓</span></td>
                                                <td class="choice-cell tick-cell" data-row="7" data-value="D"><span class="tick">✓</span></td>
                                                <td class="choice-cell tick-cell" data-row="7" data-value="E"><span class="tick">✓</span></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div style="display:none;">
                                        <input type="text" name="q1" placeholder="1" style="padding:5px; width:100px;" id="q1">
                                        <input type="text" name="q2" placeholder="2" style="padding:5px; width:100px;" id="q2">
                                        <input type="text" name="q3" placeholder="3" style="padding:5px; width:100px;" id="q3">
                                        <input type="text" name="q4" placeholder="4" style="padding:5px; width:100px;" id="q4">
                                        <input type="text" name="q5" placeholder="5" style="padding:5px; width:100px;" id="q5">
                                        <input type="text" name="q6" placeholder="6" style="padding:5px; width:100px;" id="q6">
                                        <input type="text" name="q7" placeholder="7" style="padding:5px; width:100px;" id="q7">
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Questions 8-10</strong></h3>
                                    <p><em>Write no more than <strong>THREE</strong> words and/or numbers.</em></p>
                                    
                                    <table class="table table-bordered mt-3">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Percentage of children left-handed</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>One parent left-handed<br>One parent right-handed</td>
                                                <td><input type="text" name="q8" placeholder="8" style="padding:5px; width:100px;" id="q8"></td>
                                            </tr>
                                            <tr>
                                                <td>Both parents left-handed</td>
                                                <td><input type="text" name="q9" placeholder="9" style="padding:5px; width:100px;" id="q9"></td>
                                            </tr>
                                            <tr>
                                                <td>Both parents right-handed</td>
                                                <td><input type="text" name="q10" placeholder="10" style="padding:5px; width:100px;" id="q10"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Questions 11-12</strong></h3>
                                    <p><em>Choose the correct answer.</em></p>

                                    <div class="accordion mt-3" id="q11_12_accordion">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="q11_heading">
                                                <div class="accordion-button" style="cursor: pointer;" role="button" tabindex="0" data-bs-toggle="collapse" data-bs-target="#q11_collapse" aria-expanded="true" aria-controls="q11_collapse">
                                                    <strong>11</strong>&nbsp;A study of monkeys has shown that
                                                </div>
                                            </h2>
                                            <div id="q11_collapse" class="accordion-collapse collapse show" aria-labelledby="q11_heading" data-bs-parent="#q11_12_accordion">
                                                <div class="accordion-body">
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q11_radio" id="q11_A" value="A" data-target="q11">
                                                        <label class="form-check-label" for="q11_A">monkeys are not usually right-handed.</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q11_radio" id="q11_B" value="B" data-target="q11">
                                                        <label class="form-check-label" for="q11_B">monkeys display a capacity for speech.</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q11_radio" id="q11_C" value="C" data-target="q11">
                                                        <label class="form-check-label" for="q11_C">monkey brains are smaller than human brains.</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q11_radio" id="q11_D" value="D" data-target="q11">
                                                        <label class="form-check-label" for="q11_D">monkey brains are asymmetric.</label>
                                                    </div>

                                                    <input type="text" name="q11" placeholder="11" style="padding:5px; width:100px; display:none;" id="q11">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="q12_heading">
                                                <div class="accordion-button collapsed"  style="cursor: pointer;" role="button" tabindex="0" data-bs-toggle="collapse" data-bs-target="#q12_collapse" aria-expanded="false" aria-controls="q12_collapse">
                                                    <strong>12</strong>&nbsp;According to the writer, left-handed people
                                                </div>
                                            </h2>
                                            <div id="q12_collapse" class="accordion-collapse collapse" aria-labelledby="q12_heading" data-bs-parent="#q11_12_accordion">
                                                <div class="accordion-body">
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q12_radio" id="q12_A" value="A" data-target="q12">
                                                        <label class="form-check-label" for="q12_A">will often develop a stammer.</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q12_radio" id="q12_B" value="B" data-target="q12">
                                                        <label class="form-check-label" for="q12_B">have undergone hardship for years.</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q12_radio" id="q12_C" value="C" data-target="q12">
                                                        <label class="form-check-label" for="q12_C">are untrustworthy.</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q12_radio" id="q12_D" value="D" data-target="q12">
                                                        <label class="form-check-label" for="q12_D">are good tennis players.</label>
                                                    </div>

                                                    <input type="text" name="q12" placeholder="12" style="padding:5px; width:100px; display:none;" id="q12">
                                                </div>
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
                        <p><strong>Read the text below and answer questions 13-25</strong>
                        </p>
                    </div>
                    <div class="mt-4">

                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-md-6">
                                <div class="scroll-box" style="text-align:left;">
                                    
                                    <h4><strong>SECRETS OF THE FORESTS</strong></h4>

                                    <input type="text" class="dnd-drop-input" data-question="q13" data-paragraph="A" placeholder="13" readonly style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;">
                                    <p><strong>A</strong> In 1942 Allan R Holmberg, a doctoral student in anthropology from Yale University, USA, ventured deep into the jungle of Bolivian Amazonia and searched out an isolated band of Siriono Indians. The Siriono, Holmberg later wrote, led a "strikingly backward" existence. Their villages were little more than clusters of thatched huts. Life itself was a perpetual and punishing search for food: some families grew manioc and other starchy crops in small garden plots cleared from the forest, while other members of the tribe scoured the country for small game and promising fish holes. When local resources became depleted, the tribe moved on. As for technology, Holmberg noted, the Siriono "may be classified among the most handicapped peoples of the world". Other than bows, arrows and crude digging sticks, the only tools the Siriono seemed to possess were "two machetes worn to the size of pocket-knives".</p>

                                    <input type="text" class="dnd-drop-input" data-question="q14" data-paragraph="B" placeholder="14" readonly style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;">
                                    <p><strong>B</strong> Although the lives of the Siriono have changed in the intervening decades, the image of them as Stone Age relics has endured. Indeed, in many respects the Siriono epitomize the popular conception of life in Amazonia. To casual observers, as well as to influential natural scientists and regional planners, the luxuriant forests of Amazonia seem ageless, unconquerable, a habitat totally hostile to human civilization. The apparent simplicity of Indian ways of life has been judged an evolutionary adaptation to forest ecology, living proof that Amazonia could not - and cannot - sustain a more complex society. Archaeological traces of far more elaborate cultures have been dismissed as the ruins of invaders from outside the region, abandoned to decay in the uncompromising tropical environment.</p>

                                    <p><strong>C</strong> The popular conception of Amazonia and its native residents would be enormously consequential if it were true. But the human history of Amazonia in the past 11,000 years betrays that view as myth. Evidence gathered in recent years from anthropology and archaeology indicates that the region has supported a series of indigenous cultures for eleven thousand years; an extensive network of complex societies - some with populations perhaps as large as 100,000 - thrived there for more than 1,000 years before the arrival of Europeans. (Indeed, some contemporary tribes, including the Siriono, still live among the earthworks of earlier cultures.) Far from being evolutionarily retarded, prehistoric Amazonian people developed technologies and cultures that were advanced for their time. If the lives of Indians today seem "primitive", the appearance is not the result of some environmental adaptation or ecological barrier; rather it is a comparatively recent adaptation to centuries of economic and political pressure. Investigators who argue otherwise have unwittingly projected the present onto the past.</p>

                                    <input type="text" class="dnd-drop-input" data-question="q15" data-paragraph="D" placeholder="15" readonly style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;">
                                    <p><strong>D</strong> The evidence for a revised view of Amazonia will take many people by surprise. Ecologists have assumed that tropical ecosystems were shaped entirely by natural forces and they have focused their research on habitats they believe have escaped human influence. But as the University of Florida ecologist, Peter Feinsinger, has noted, an approach that leaves people out 
of the equation is no longer tenable. The archaeological evidence shows that the natural history of Amazonia is to a surprising extent tied to the activities of its prehistoric inhabitants.</p>

                                    <strong>E</strong> The realization comes none too soon. In June 1992 political and environmental leaders from across the world met in Rio de Janeiro to discuss how developing countries can advance their economies without destroying their natural resources. The challenge is especially difficult in Amazonia. Because the tropical forest has been depicted as ecologically unfit for large-scale human occupation, some environmentalists have opposed development of any kind. Ironically, one major casualty of that extreme position has been the environment itself. While policy makers struggle to define and implement appropriate legislation, development of the most destructive kind has continued apace over vast areas.<br><br>

                                    <strong>F</strong> The other major casualty of the "naturalism" of environmental scientists has been the indigenous Amazonians, whose habits of hunting, fishing, and slash-and-burn cultivation often have been represented as harmful to the habitat. In the clash between environmentalists and developers, the Indians, whose presence is in fact crucial to the survival of the forest, have suffered the most. The new understanding of the pre-history of Amazonia, however, points toward a middle ground. Archaeology makes clear that with judicious management selected parts of the region could support more people than anyone thought before. The long-buried past, it seems, offers hope for the future.
                                    </p>
                                </div>
                            </div>
                            <!-- Column 2 -->
                            <div class="col-md-6 question_site">
                                <h3><strong>Questions 13-15</strong></h3>
                                <p><em>This text has six sections.</em></p>
                                <p><em>Choose the correct heading for <strong>A,B and D</strong> Sections and move it into the gap.</em></p>
                                
                                <div class="mt-3">
                                    <p><strong>List of Headings</strong></p>
                                    <div id="dnd-headings-list">
                                        <div class="dnd-heading" draggable="true" data-value="i" data-content="Amazonia as unable to sustain complex societies"> Amazonia as unable to sustain complex societies</div>
                                        <div class="dnd-heading" draggable="true" data-value="ii" data-content="The role of recent technology in ecological research in Amazonia"> The role of recent technology in ecological research in Amazonia</div>
                                        <div class="dnd-heading" draggable="true" data-value="iii" data-content="The hostility of the indigenous population to North American influences"> The hostility of the indigenous population to North American influences</div>
                                        <div class="dnd-heading" draggable="true" data-value="iv" data-content="Recent evidence"> Recent evidence</div>
                                        <div class="dnd-heading" draggable="true" data-value="v" data-content="Early research among the Indian Amazons"> Early research among the Indian Amazons</div>
                                        <div class="dnd-heading" draggable="true" data-value="vi" data-content="The influence of prehistoric inhabitants on Amazonian natural history"> The influence of prehistoric inhabitants on Amazonian natural history</div>
                                        <div class="dnd-heading" draggable="true" data-value="vii" data-content="The great difficulty of changing local attitudes and practices"> The great difficulty of changing local attitudes and practices</div>
                                    </div>

                                    <input type="text" name="q13" placeholder="13" style="display:none;" id="q13">
                                    <input type="text" name="q14" placeholder="14" style="display:none;" id="q14">
                                    <input type="text" name="q15" placeholder="15" style="display:none;" id="q15">
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Questions 16-21</strong></h3>
                                    <p><em>Choose <strong>YES</strong> if the statement agrees with the information given in the text, choose <strong>NO</strong> if the statement contradicts the information, or choose <strong>NOT GIVEN</strong> if there is no information on this.</em></p>
                                    

                                    <div class="accordion mt-3" id="q16_21_accordion">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="q16_heading">
                                                <div class="accordion-button" style="cursor: pointer;" role="button" tabindex="0" data-bs-toggle="collapse" data-bs-target="#q16_collapse" aria-expanded="true" aria-controls="q16_collapse">
                                                    <strong>16</strong>&nbsp;<span>The reason for the simplicity of the Indian way of life is that Amazonia has always been unable to support a complex society.</span>
                                                </div>
                                            </h2>
                                            <div id="q16_collapse" class="accordion-collapse collapse show" aria-labelledby="q16_heading" data-bs-parent="#q16_21_accordion">
                                                <div class="accordion-body">
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q16_radio" id="q16_YES" value="YES" data-target="q16">
                                                        <label class="form-check-label" for="q16_YES">YES</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q16_radio" id="q16_NO" value="NO" data-target="q16">
                                                        <label class="form-check-label" for="q16_NO">NO</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q16_radio" id="q16_NG" value="NOT GIVEN" data-target="q16">
                                                        <label class="form-check-label" for="q16_NG">NOT GIVEN</label>
                                                    </div>
                                                    <input type="text" name="q16" placeholder="16" style="padding:5px; width:100px; display:none;" id="q16">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="q17_heading">
                                                <div class="accordion-button collapsed" style="cursor: pointer;" role="button" tabindex="0" data-bs-toggle="collapse" data-bs-target="#q17_collapse" aria-expanded="false" aria-controls="q17_collapse">
                                                    <strong>17</strong>&nbsp;<span>There is a crucial popular misconception about the human history of Amazonia.</span>
                                                </div>
                                            </h2>
                                            <div id="q17_collapse" class="accordion-collapse collapse" aria-labelledby="q17_heading" data-bs-parent="#q16_21_accordion">
                                                <div class="accordion-body">
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q17_radio" id="q17_YES" value="YES" data-target="q17">
                                                        <label class="form-check-label" for="q17_YES">YES</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q17_radio" id="q17_NO" value="NO" data-target="q17">
                                                        <label class="form-check-label" for="q17_NO">NO</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q17_radio" id="q17_NG" value="NOT GIVEN" data-target="q17">
                                                        <label class="form-check-label" for="q17_NG">NOT GIVEN</label>
                                                    </div>
                                                    <input type="text" name="q17" placeholder="17" style="padding:5px; width:100px; display:none;" id="q17">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="q18_heading">
                                                <div class="accordion-button collapsed" style="cursor: pointer;" role="button" tabindex="0" data-bs-toggle="collapse" data-bs-target="#q18_collapse" aria-expanded="false" aria-controls="q18_collapse">
                                                    <strong>18</strong>&nbsp;<span>There are lessons to be learned from similar ecosystems in other parts of the world.</span>
                                                </div>
                                            </h2>
                                            <div id="q18_collapse" class="accordion-collapse collapse" aria-labelledby="q18_heading" data-bs-parent="#q16_21_accordion">
                                                <div class="accordion-body">
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q18_radio" id="q18_YES" value="YES" data-target="q18">
                                                        <label class="form-check-label" for="q18_YES">YES</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q18_radio" id="q18_NO" value="NO" data-target="q18">
                                                        <label class="form-check-label" for="q18_NO">NO</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q18_radio" id="q18_NG" value="NOT GIVEN" data-target="q18">
                                                        <label class="form-check-label" for="q18_NG">NOT GIVEN</label>
                                                    </div>
                                                    <input type="text" name="q18" placeholder="18" style="padding:5px; width:100px; display:none;" id="q18">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="q19_heading">
                                                <div class="accordion-button collapsed" style="cursor: pointer;" role="button" tabindex="0" data-bs-toggle="collapse" data-bs-target="#q19_collapse" aria-expanded="false" aria-controls="q19_collapse">
                                                    <strong>19</strong>&nbsp;<span>Most ecologists were aware that the areas of Amazonia they were working in had been shaped by human settlement.</span>
                                                </div>
                                            </h2>
                                            <div id="q19_collapse" class="accordion-collapse collapse" aria-labelledby="q19_heading" data-bs-parent="#q16_21_accordion">
                                                <div class="accordion-body">
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q19_radio" id="q19_YES" value="YES" data-target="q19">
                                                        <label class="form-check-label" for="q19_YES">YES</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q19_radio" id="q19_NO" value="NO" data-target="q19">
                                                        <label class="form-check-label" for="q19_NO">NO</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q19_radio" id="q19_NG" value="NOT GIVEN" data-target="q19">
                                                        <label class="form-check-label" for="q19_NG">NOT GIVEN</label>
                                                    </div>
                                                    <input type="text" name="q19" placeholder="19" style="padding:5px; width:100px; display:none;" id="q19">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="q20_heading">
                                                <div class="accordion-button collapsed" style="cursor: pointer;" role="button" tabindex="0" data-bs-toggle="collapse" data-bs-target="#q20_collapse" aria-expanded="false" aria-controls="q20_collapse">
                                                    <strong>20</strong>&nbsp;<span>The indigenous Amazonian Indians are necessary to the well-being of the forest.</span>
                                                </div>
                                            </h2>
                                            <div id="q20_collapse" class="accordion-collapse collapse" aria-labelledby="q20_heading" data-bs-parent="#q16_21_accordion">
                                                <div class="accordion-body">
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q20_radio" id="q20_YES" value="YES" data-target="q20">
                                                        <label class="form-check-label" for="q20_YES">YES</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q20_radio" id="q20_NO" value="NO" data-target="q20">
                                                        <label class="form-check-label" for="q20_NO">NO</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q20_radio" id="q20_NG" value="NOT GIVEN" data-target="q20">
                                                        <label class="form-check-label" for="q20_NG">NOT GIVEN</label>
                                                    </div>
                                                    <input type="text" name="q20" placeholder="20" style="padding:5px; width:100px; display:none;" id="q20">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="q21_heading">
                                                <div class="accordion-button collapsed" style="cursor: pointer;" role="button" tabindex="0" data-bs-toggle="collapse" data-bs-target="#q21_collapse" aria-expanded="false" aria-controls="q21_collapse">
                                                    <strong>21</strong>&nbsp;<span>It would be possible for certain parts of Amazonia to support a higher population.</span>
                                                </div>
                                            </h2>
                                            <div id="q21_collapse" class="accordion-collapse collapse" aria-labelledby="q21_heading" data-bs-parent="#q16_21_accordion">
                                                <div class="accordion-body">
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q21_radio" id="q21_YES" value="YES" data-target="q21">
                                                        <label class="form-check-label" for="q21_YES">YES</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q21_radio" id="q21_NO" value="NO" data-target="q21">
                                                        <label class="form-check-label" for="q21_NO">NO</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q21_radio" id="q21_NG" value="NOT GIVEN" data-target="q21">
                                                        <label class="form-check-label" for="q21_NG">NOT GIVEN</label>
                                                    </div>
                                                    <input type="text" name="q21" placeholder="21" style="padding:5px; width:100px; display:none;" id="q21">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Questions 22-25</strong></h3>
                                    <p><em>Choose the correct answer.</em></p>

                                    <div class="accordion mt-3" id="q22_25_accordion">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="q22_heading">
                                                <div class="accordion-button" style="cursor: pointer;" role="button" tabindex="0" data-bs-toggle="collapse" data-bs-target="#q22_collapse" aria-expanded="true" aria-controls="q22_collapse">
                                                    <strong>22</strong>&nbsp;In 1942 the US anthropology student concluded that the Siriono
                                                </div>
                                            </h2>
                                            <div id="q22_collapse" class="accordion-collapse collapse show" aria-labelledby="q22_heading" data-bs-parent="#q22_25_accordion">
                                                <div class="accordion-body">
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q22_radio" id="q22_A" value="A" data-target="q22">
                                                        <label class="form-check-label" for="q22_A">were unusually aggressive and cruel.</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q22_radio" id="q22_B" value="B" data-target="q22">
                                                        <label class="form-check-label" for="q22_B">had had their way of life destroyed by invaders.</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q22_radio" id="q22_C" value="C" data-target="q22">
                                                        <label class="form-check-label" for="q22_C">were an extremely primitive society.</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q22_radio" id="q22_D" value="D" data-target="q22">
                                                        <label class="form-check-label" for="q22_D">had only recently made permanent settlements.</label>
                                                    </div>
                                                    <input type="text" name="q22" placeholder="22" style="padding:5px; width:100px; display:none;" id="q22">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="q23_heading">
                                                <div class="accordion-button collapsed" style="cursor: pointer;" role="button" tabindex="0" data-bs-toggle="collapse" data-bs-target="#q23_collapse" aria-expanded="false" aria-controls="q23_collapse">
                                                    <strong>23</strong>&nbsp;The author believes recent discoveries of the remains of complex societies in Amazonia
                                                </div>
                                            </h2>
                                            <div id="q23_collapse" class="accordion-collapse collapse" aria-labelledby="q23_heading" data-bs-parent="#q22_25_accordion">
                                                <div class="accordion-body">
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q23_radio" id="q23_A" value="A" data-target="q23">
                                                        <label class="form-check-label" for="q23_A">are evidence of early indigenous communities.</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q23_radio" id="q23_B" value="B" data-target="q23">
                                                        <label class="form-check-label" for="q23_B">are the remains of settlements by invaders.</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q23_radio" id="q23_C" value="C" data-target="q23">
                                                        <label class="form-check-label" for="q23_C">are the ruins of communities established since the European invasions.</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q23_radio" id="q23_D" value="D" data-target="q23">
                                                        <label class="form-check-label" for="q23_D">show the region has only relatively recently been covered by forest.</label>
                                                    </div>
                                                    <input type="text" name="q23" placeholder="23" style="padding:5px; width:100px; display:none;" id="q23">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="q24_heading">
                                                <div class="accordion-button collapsed" style="cursor: pointer;" role="button" tabindex="0" data-bs-toggle="collapse" data-bs-target="#q24_collapse" aria-expanded="false" aria-controls="q24_collapse">
                                                    <strong>24</strong>&nbsp;The assumption that the tropical ecosystem of Amazonia has been created solely by natural forces
                                                </div>
                                            </h2>
                                            <div id="q24_collapse" class="accordion-collapse collapse" aria-labelledby="q24_heading" data-bs-parent="#q22_25_accordion">
                                                <div class="accordion-body">
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q24_radio" id="q24_A" value="A" data-target="q24">
                                                        <label class="form-check-label" for="q24_A">has often been questioned by ecologists in the past.</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q24_radio" id="q24_B" value="B" data-target="q24">
                                                        <label class="form-check-label" for="q24_B">has been shown to be incorrect by recent research.</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q24_radio" id="q24_C" value="C" data-target="q24">
                                                        <label class="form-check-label" for="q24_C">was made by Peter Feinsinger and other ecologists.</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q24_radio" id="q24_D" value="D" data-target="q24">
                                                        <label class="form-check-label" for="q24_D">has led to some fruitful discoveries.</label>
                                                    </div>
                                                    <input type="text" name="q24" placeholder="24" style="padding:5px; width:100px; display:none;" id="q24">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="q25_heading">
                                                <div class="accordion-button collapsed" style="cursor: pointer;" role="button" tabindex="0" data-bs-toggle="collapse" data-bs-target="#q25_collapse" aria-expanded="false" aria-controls="q25_collapse">
                                                    <strong>25</strong>&nbsp;The application of our new insights into the Amazonian past would
                                                </div>
                                            </h2>
                                            <div id="q25_collapse" class="accordion-collapse collapse" aria-labelledby="q25_heading" data-bs-parent="#q22_25_accordion">
                                                <div class="accordion-body">
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q25_radio" id="q25_A" value="A" data-target="q25">
                                                        <label class="form-check-label" for="q25_A">warn us against allowing any development at all.</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q25_radio" id="q25_B" value="B" data-target="q25">
                                                        <label class="form-check-label" for="q25_B">cause further suffering to the Indian communities.</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q25_radio" id="q25_C" value="C" data-target="q25">
                                                        <label class="form-check-label" for="q25_C">change present policies on development in the region.</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q25_radio" id="q25_D" value="D" data-target="q25">
                                                        <label class="form-check-label" for="q25_D">reduce the amount of hunting, fishing, and 'slash-and-burn'.</label>
                                                    </div>
                                                    <input type="text" name="q25" placeholder="25" style="padding:5px; width:100px; display:none;" id="q25">
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
                <div class="tab-content " id="part3" style="margin-bottom: 80px;">
                    <div class="question_part">
                        <h4>Part 3</h4>
                        <p><strong>Read the text below and answer questions 26-40</strong>
                        </p>
                    </div>
                    <div class="mt-4">
                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-md-6">
                                <div class="scroll-box" style="text-align:left;">
                                    
                                    <h4><strong>HIGHS & LOWS</strong></h4>

                                    <p>Hormone levels - and hence our moods –may be affected by the weather. Gloomy weather can cause depression, but sunshine appears to raise the spirits. In Britain, for example, the dull weather of winter drastically cuts down the amount of sunlight that is experienced which strongly affects some people. They become so depressed and lacking in energy that their work and social life are affected. This condition has been given the name SAD (Seasonal Affective Disorder). Sufferers can fight back by making the most of any sunlight in winter and by spending a few hours each day under special, full-spectrum lamps. These provide more ultraviolet and blue-green light than ordinary fluorescent and tungsten lights. Some Russian scientists claim that children learn better after being exposed to ultraviolet light. In warm countries, hours of work are often arranged so that workers can take a break, or even a siesta, during the hottest part of the day. Scientists are working to discover the links between the weather and human beings' moods and performance.<br><br>

                                    It is generally believed that tempers grow shorter in hot, muggy weather. There is no doubt that 'crimes against the person' rise in the summer, when the weather is hotter and fall in the winter when the weather is colder. Research in the United States has shown a relationship between temperature and street riots. The frequency of riots rises dramatically as the weather gets warmer, hitting a peak around 27-30°C. But is this effect really due to a mood change caused by the heat? Some scientists argue that trouble starts more often in hot weather merely because there are more people in the street when the weather is good.<br><br>

                                    Psychologists have also studied how being cold affects performance. Researchers compared divers working in icy cold water at 5°C with others in water at 20°C (about swimming pool temperature). The colder water made the divers worse at simple arithmetic and other mental tasks. But significantly, their performance was impaired as soon as they were put into the cold water – before their bodies had time to cool down. This suggests that the low temperature did not slow down mental functioning directly, but the feeling of cold distracted the divers from their tasks.<br><br>

                                    Psychologists have conducted studies showing that people become less skeptical and more optimistic when the weather is sunny However, this apparently does not just depend on the temperature. An American psychologist studied customers in a temperature-controlled restaurant. They gave bigger tips when the sun was shining and smaller tips when it wasn't, even though the temperature in the restaurant was the same.<br><br>

                                    A link between weather and mood is made believable by the evidence for a connection between behavior and the length of the daylight hours. This in turn might involve the level of a hormone called melatonin, produced in the pineal gland in the brain. The amount of melatonin falls with greater exposure to daylight. Research shows that melatonin plays an important part in the seasonal behavior of certain animals. For example, food consumption of stags increases during the winter, reaching a peak in February/ March. It falls again to a low point in May, then rises to a peak in September, 
before dropping to another minimum in November. These changes seem to be triggered by varying melatonin levels.<br><br>

                                    In the laboratory, hamsters put on more weight when the nights are getting shorter and their melatonin levels are falling. On the other hand, if they are given injections of melatonin, they will stop eating altogether. It seems that time cues provided by the changing lengths of day and night trigger changes in animals' behavior - changes that are needed to cope with the cycle of the seasons. People's moods too, have been shown to react to the length of the daylight hours. Skeptics might say that longer exposure to sunshine puts people in a better mood because they associate it with the happy feelings of holidays and freedom from responsibility. However, the belief that rain and murky weather make people more unhappy is borne out by a study in Belgium, which showed that a telephone counseling service gets more telephone calls from people with suicidal feelings when it rains.<br><br>

                                    When there is a thunderstorm brewing, some people complain of the air being 'heavy' and of feeling irritable, moody and on edge. They may be reacting to the fact that the air can become slightly positively charged when large thunderclouds are generating the intense electrical fields that cause lightning flashes. The positive charge increases the levels of serotonin (a chemical involved in sending signals in the nervous system). High levels of serotonin in certain areas of the nervous system make people more active and reactive and, possibly, more aggressive. When certain winds are blowing, such as the Mistral in southern France and the Fohn in southern Germany, mood can be affected - and the number of traffic accidents rises. It may be significant that the concentration of positively charged particles is greater than normal in these winds. In the United Kingdom, 400,000 ionizers are sold every year. These small machines raise the number of negative ions in the air in a room. Many people claim they feel better in negatively charged air.
                                    </p>
                                </div>
                            </div>
                            <!-- Column 2 -->
                            <div class="col-md-6 question_site">
                                <h3><strong>Questions 26-28</strong></h3>
                                <p><em>Choose the correct answer.</em></p>

                                <div class="accordion mt-3" id="q26_28_accordion">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="q26_heading">
                                            <div class="accordion-button" role="button" tabindex="0" data-bs-toggle="collapse" data-bs-target="#q26_collapse" aria-expanded="true" aria-controls="q26_collapse">
                                                <strong>26</strong>&nbsp;Why did the divers perform less well in colder conditions?
                                            </div>
                                        </h2>
                                        <div id="q26_collapse" class="accordion-collapse collapse show" aria-labelledby="q26_heading" data-bs-parent="#q26_28_accordion">
                                            <div class="accordion-body">
                                                <div class="form-check">
                                                    <input class="form-check-input mcq-sync" type="radio" name="q26_radio" id="q26_A" value="A" data-target="q26">
                                                    <label class="form-check-label" for="q26_A">They were less able to concentrate.</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input mcq-sync" type="radio" name="q26_radio" id="q26_B" value="B" data-target="q26">
                                                    <label class="form-check-label" for="q26_B">Their body temperature fell too quickly.</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input mcq-sync" type="radio" name="q26_radio" id="q26_C" value="C" data-target="q26">
                                                    <label class="form-check-label" for="q26_C">Their mental functions were immediately affected by the cold.</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input mcq-sync" type="radio" name="q26_radio" id="q26_D" value="D" data-target="q26">
                                                    <label class="form-check-label" for="q26_D">They were used to swimming pool conditions.</label>
                                                </div>
                                                <input type="text" name="q26" placeholder="26" style="padding:5px; width:100px; display:none;" id="q26">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="q27_heading">
                                            <div class="accordion-button collapsed" role="button" tabindex="0" data-bs-toggle="collapse" data-bs-target="#q27_collapse" aria-expanded="false" aria-controls="q27_collapse">
                                                <strong>27</strong>&nbsp;The number of daylight hours
                                            </div>
                                        </h2>
                                        <div id="q27_collapse" class="accordion-collapse collapse" aria-labelledby="q27_heading" data-bs-parent="#q26_28_accordion">
                                            <div class="accordion-body">
                                                <div class="form-check">
                                                    <input class="form-check-input mcq-sync" type="radio" name="q27_radio" id="q27_A" value="A" data-target="q27">
                                                    <label class="form-check-label" for="q27_A">affects the performance of workers in restaurants.</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input mcq-sync" type="radio" name="q27_radio" id="q27_B" value="B" data-target="q27">
                                                    <label class="form-check-label" for="q27_B">influences animal feeding habits.</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input mcq-sync" type="radio" name="q27_radio" id="q27_C" value="C" data-target="q27">
                                                    <label class="form-check-label" for="q27_C">makes animals like hamsters more active.</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input mcq-sync" type="radio" name="q27_radio" id="q27_D" value="D" data-target="q27">
                                                    <label class="form-check-label" for="q27_D">prepares humans for having greater leisure time.</label>
                                                </div>
                                                <input type="text" name="q27" placeholder="27" style="padding:5px; width:100px; display:none;" id="27">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="q28_heading">
                                            <div class="accordion-button collapsed" role="button" tabindex="0" data-bs-toggle="collapse" data-bs-target="#q28_collapse" aria-expanded="false" aria-controls="q28_collapse">
                                                <strong>28</strong>&nbsp;Human irritability may be influenced by
                                            </div>
                                        </h2>
                                        <div id="q28_collapse" class="accordion-collapse collapse" aria-labelledby="q28_heading" data-bs-parent="#q26_28_accordion">
                                            <div class="accordion-body">
                                                <div class="form-check">
                                                    <input class="form-check-input mcq-sync" type="radio" name="q28_radio" id="q28_A" value="A" data-target="q28">
                                                    <label class="form-check-label" for="q28_A">how nervous and aggressive people are.</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input mcq-sync" type="radio" name="q28_radio" id="q28_B" value="B" data-target="q28">
                                                    <label class="form-check-label" for="q28_B">reaction to certain weather phenomena.</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input mcq-sync" type="radio" name="q28_radio" id="q28_C" value="C" data-target="q28">
                                                    <label class="form-check-label" for="q28_C">the number of ions being generated by machines.</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input mcq-sync" type="radio" name="q28_radio" id="q28_D" value="D" data-target="q28">
                                                    <label class="form-check-label" for="q28_D">the attitude of people to thunderstorms.</label>
                                                </div>
                                                <input type="text" name="q28" placeholder="28" style="padding:5px; width:100px; display:none;" id="q28">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Questions 29-34</strong></h3>
                                    <p><em>Choose <strong>TRUE</strong> if the statement agrees with the information given in the text, choose <strong>FALSE</strong> if the statement contradicts the information, or choose <strong>NOT GIVEN</strong> if there is no information on this.</em></p>

                                    <div class="accordion mt-3" id="q29_34_accordion">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="q29_heading">
                                                <div class="accordion-button" role="button" tabindex="0" data-bs-toggle="collapse" data-bs-target="#q29_collapse" aria-expanded="true" aria-controls="q29_collapse">
                                                    <strong>29</strong>&nbsp;Seasonal Affective Disorder is disrupting children's education in Russia.
                                                </div>
                                            </h2>
                                            <div id="q29_collapse" class="accordion-collapse collapse show" aria-labelledby="q29_heading" data-bs-parent="#q29_34_accordion">
                                                <div class="accordion-body">
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q29_radio" id="q29_TRUE" value="TRUE" data-target="q29">
                                                        <label class="form-check-label" for="q29_TRUE">TRUE</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q29_radio" id="q29_FALSE" value="FALSE" data-target="q29">
                                                        <label class="form-check-label" for="q29_FALSE">FALSE</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q29_radio" id="q29_NG" value="NOT GIVEN" data-target="q29">
                                                        <label class="form-check-label" for="q29_NG">NOT GIVEN</label>
                                                    </div>
                                                    <input type="text" name="q29" placeholder="29" style="padding:5px; width:150px; display:none;" id="q29">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="q30_heading">
                                                <div class="accordion-button collapsed" role="button" tabindex="0" data-bs-toggle="collapse" data-bs-target="#q30_collapse" aria-expanded="false" aria-controls="q30_collapse">
                                                    <strong>30</strong>&nbsp;Serotonin is an essential cause of human aggression.
                                                </div>
                                            </h2>
                                            <div id="q30_collapse" class="accordion-collapse collapse" aria-labelledby="q30_heading" data-bs-parent="#q29_34_accordion">
                                                <div class="accordion-body">
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q30_radio" id="q30_TRUE" value="TRUE" data-target="q30">
                                                        <label class="form-check-label" for="q30_TRUE">TRUE</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q30_radio" id="q30_FALSE" value="FALSE" data-target="q30">
                                                        <label class="form-check-label" for="q30_FALSE">FALSE</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q30_radio" id="q30_NG" value="NOT GIVEN" data-target="q30">
                                                        <label class="form-check-label" for="q30_NG">NOT GIVEN</label>
                                                    </div>
                                                    <input type="text" name="q30" placeholder="30" style="padding:5px; width:150px; display:none;" id="30">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="q31_heading">
                                                <div class="accordion-button collapsed" role="button" tabindex="0" data-bs-toggle="collapse" data-bs-target="#q31_collapse" aria-expanded="false" aria-controls="q31_collapse">
                                                    <strong>31</strong>&nbsp;Scientific evidence links 'happy associations with weather' to human mood.
                                                </div>
                                            </h2>
                                            <div id="q31_collapse" class="accordion-collapse collapse" aria-labelledby="q31_heading" data-bs-parent="#q29_34_accordion">
                                                <div class="accordion-body">
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q31_radio" id="q31_TRUE" value="TRUE" data-target="q31">
                                                        <label class="form-check-label" for="q31_TRUE">TRUE</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q31_radio" id="q31_FALSE" value="FALSE" data-target="q31">
                                                        <label class="form-check-label" for="q31_FALSE">FALSE</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q31_radio" id="q31_NG" value="NOT GIVEN" data-target="q31">
                                                        <label class="form-check-label" for="q31_NG">NOT GIVEN</label>
                                                    </div>
                                                    <input type="text" name="q31" placeholder="31" style="padding:5px; width:150px; display:none;" id="q31">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="q32_heading">
                                                <div class="accordion-button collapsed" role="button" tabindex="0" data-bs-toggle="collapse" data-bs-target="#q32_collapse" aria-expanded="false" aria-controls="q32_collapse">
                                                    <strong>32</strong>&nbsp;A link between depression and the time of year has been established.
                                                </div>
                                            </h2>
                                            <div id="q32_collapse" class="accordion-collapse collapse" aria-labelledby="q32_heading" data-bs-parent="#q29_34_accordion">
                                                <div class="accordion-body">
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q32_radio" id="q32_TRUE" value="TRUE" data-target="q32">
                                                        <label class="form-check-label" for="q32_TRUE">TRUE</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q32_radio" id="q32_FALSE" value="FALSE" data-target="q32">
                                                        <label class="form-check-label" for="q32_FALSE">FALSE</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q32_radio" id="q32_NG" value="NOT GIVEN" data-target="q32">
                                                        <label class="form-check-label" for="q32_NG">NOT GIVEN</label>
                                                    </div>
                                                    <input type="text" name="q32" placeholder="32" style="padding:5px; width:150px; display:none;" id="32">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="q33_heading">
                                                <div class="accordion-button collapsed" role="button" tabindex="0" data-bs-toggle="collapse" data-bs-target="#q33_collapse" aria-expanded="false" aria-controls="q33_collapse">
                                                    <strong>33</strong>&nbsp;Melatonin levels increase at certain times of the year.
                                                </div>
                                            </h2>
                                            <div id="q33_collapse" class="accordion-collapse collapse" aria-labelledby="q33_heading" data-bs-parent="#q29_34_accordion">
                                                <div class="accordion-body">
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q33_radio" id="q33_TRUE" value="TRUE" data-target="q33">
                                                        <label class="form-check-label" for="q33_TRUE">TRUE</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q33_radio" id="q33_FALSE" value="FALSE" data-target="q33">
                                                        <label class="form-check-label" for="q33_FALSE">FALSE</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q33_radio" id="q33_NG" value="NOT GIVEN" data-target="q33">
                                                        <label class="form-check-label" for="q33_NG">NOT GIVEN</label>
                                                    </div>
                                                    <input type="text" name="q33" placeholder="33" style="padding:5px; width:150px; display:none;" id="33">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="q34_heading">
                                                <div class="accordion-button collapsed" role="button" tabindex="0" data-bs-toggle="collapse" data-bs-target="#q34_collapse" aria-expanded="false" aria-controls="q34_collapse">
                                                    <strong>34</strong>&nbsp;Positively charged ions can influence eating habits.
                                                </div>
                                            </h2>
                                            <div id="q34_collapse" class="accordion-collapse collapse" aria-labelledby="q34_heading" data-bs-parent="#q29_34_accordion">
                                                <div class="accordion-body">
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q34_radio" id="q34_TRUE" value="TRUE" data-target="q34">
                                                        <label class="form-check-label" for="q34_TRUE">TRUE</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q34_radio" id="q34_FALSE" value="FALSE" data-target="q34">
                                                        <label class="form-check-label" for="q34_FALSE">FALSE</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio" name="q34_radio" id="q34_NG" value="NOT GIVEN" data-target="q34">
                                                        <label class="form-check-label" for="q34_NG">NOT GIVEN</label>
                                                    </div>
                                                    <input type="text" name="q34" placeholder="34" style="padding:5px; width:150px; display:none;" id="q34">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Questions 35-37</strong></h3>
                                    <p><em>According to the text which THREE of the following conditions have been scientifically proved to have a psychological effect on humans?</em></p>
                                    <p><em>Choose correct answer from A-G.</em></p>

                                    <div class="mt-3">
                                        <table class="table table-bordered mt-3" style="width: 320px;">
                                            <tbody>
                                                <tr><th style="width: 48px;">A</th><td>lack of negative ions</td></tr>
                                                <tr><th>B</th><td>rainy weather</td></tr>
                                                <tr><th>C</th><td>food consumption</td></tr>
                                                <tr><th>D</th><td>high serotonin levels</td></tr>
                                                <tr><th>E</th><td>sunny weather</td></tr>
                                                <tr><th>F</th><td>freedom from worry</td></tr>
                                                <tr><th>G</th><td>lack of counselling facilities</td></tr>
                                            </tbody>
                                        </table>

                                        <table class="matching-grid">
                                            <thead>
                                                <tr>
                                                    <th style="width: 80px;"></th>
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
                                                <tr>
                                                    <td><strong>35</strong></td>
                                                    <td class="choice-cell tick-cell" data-row="35" data-value="A"><span class="tick">✓</span></td>
                                                    <td class="choice-cell tick-cell" data-row="35" data-value="B"><span class="tick">✓</span></td>
                                                    <td class="choice-cell tick-cell" data-row="35" data-value="C"><span class="tick">✓</span></td>
                                                    <td class="choice-cell tick-cell" data-row="35" data-value="D"><span class="tick">✓</span></td>
                                                    <td class="choice-cell tick-cell" data-row="35" data-value="E"><span class="tick">✓</span></td>
                                                    <td class="choice-cell tick-cell" data-row="35" data-value="F"><span class="tick">✓</span></td>
                                                    <td class="choice-cell tick-cell" data-row="35" data-value="G"><span class="tick">✓</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>36</strong></td>
                                                    <td class="choice-cell tick-cell" data-row="36" data-value="A"><span class="tick">✓</span></td>
                                                    <td class="choice-cell tick-cell" data-row="36" data-value="B"><span class="tick">✓</span></td>
                                                    <td class="choice-cell tick-cell" data-row="36" data-value="C"><span class="tick">✓</span></td>
                                                    <td class="choice-cell tick-cell" data-row="36" data-value="D"><span class="tick">✓</span></td>
                                                    <td class="choice-cell tick-cell" data-row="36" data-value="E"><span class="tick">✓</span></td>
                                                    <td class="choice-cell tick-cell" data-row="36" data-value="F"><span class="tick">✓</span></td>
                                                    <td class="choice-cell tick-cell" data-row="36" data-value="G"><span class="tick">✓</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>37</strong></td>
                                                    <td class="choice-cell tick-cell" data-row="37" data-value="A"><span class="tick">✓</span></td>
                                                    <td class="choice-cell tick-cell" data-row="37" data-value="B"><span class="tick">✓</span></td>
                                                    <td class="choice-cell tick-cell" data-row="37" data-value="C"><span class="tick">✓</span></td>
                                                    <td class="choice-cell tick-cell" data-row="37" data-value="D"><span class="tick">✓</span></td>
                                                    <td class="choice-cell tick-cell" data-row="37" data-value="E"><span class="tick">✓</span></td>
                                                    <td class="choice-cell tick-cell" data-row="37" data-value="F"><span class="tick">✓</span></td>
                                                    <td class="choice-cell tick-cell" data-row="37" data-value="G"><span class="tick">✓</span></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <div style="display:none;">
                                            <input type="text" name="q35" placeholder="35" style="padding:5px; width:100px;" id="q35">
                                            <input type="text" name="q36" placeholder="36" style="padding:5px; width:100px;" id="q36">
                                            <input type="text" name="q37" placeholder="37" style="padding:5px; width:100px;" id="q37">
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Questions 38-40</strong></h3>
                                    <p><em>Complete each of the following statements with the best ending from the box below.</em></p>

                                    <p class="mt-3"><strong>38</strong> It has been established that social tension increases significantly in the United States during</p>
                                    <input type="text" class="dnd-drop-input" data-question="q38" placeholder="38" readonly style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;">

                                    <p class="mt-3"><strong>39</strong> Research has shown that a hamster's bodyweight increases according to its exposure to</p>
                                    <input type="text" class="dnd-drop-input" data-question="q39" placeholder="39" readonly style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;">

                                    <p class="mt-3"><strong>40</strong> Animals cope with changing weather and food availability because they are influenced by</p>
                                    <input type="text" class="dnd-drop-input" data-question="q40" placeholder="40" readonly style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;">

                                    <div class="mt-3">
                                        <p><strong>List of Endings</strong></p>
                                        <div id="dnd-endings-list">
                                            <div class="dnd-heading" draggable="true" data-value="A" data-content="daylight">daylight</div>
                                            <div class="dnd-heading" draggable="true" data-value="B" data-content="hot weather">hot weather</div>
                                            <div class="dnd-heading" draggable="true" data-value="C" data-content="melatonin">melatonin</div>
                                            <div class="dnd-heading" draggable="true" data-value="D" data-content="moderate temperatures">moderate temperatures</div>
                                            <div class="dnd-heading" draggable="true" data-value="E" data-content="poor co-ordination">poor co-ordination</div>
                                            <div class="dnd-heading" draggable="true" data-value="F" data-content="time cues">time cues</div>
                                            <div class="dnd-heading" draggable="true" data-value="G" data-content="impaired performance">impaired performance</div>
                                        </div>

                                        <input type="text" name="q38" placeholder="38" style="display:none;" id="q38">
                                        <input type="text" name="q39" placeholder="39" style="display:none;" id="q39">
                                        <input type="text" name="q40" placeholder="40" style="display:none;" id="q40">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
            </div>
            <span class="question-placeholder">1 of 12</span>
        </div>
        <div class="tab " data-tab="part2">
            <span class="tab-title">Part 2</span>
            <div class="question-links">
                <a href="#" class="question-link" data-question="13">13</a>
                <a href="#" class="question-link" data-question="14">14</a>
                <a href="#" class="question-link" data-question="15">15</a>
                <a href="#" class="question-link" data-question="16" style="pointer-events: auto;">16</a>
                <a href="#" class="question-link" data-question="17" style="pointer-events: auto;">17</a>
                <a href="#" class="question-link" data-question="18" style="pointer-events: auto;">18</a>
                <a href="#" class="question-link" data-question="19" style="pointer-events: auto;">19</a>
                <a href="#" class="question-link" data-question="20" style="pointer-events: auto;">20</a>
                <a href="#" class="question-link" data-question="21" style="pointer-events: auto;">21</a>
                <a href="#" class="question-link" data-question="22" style="pointer-events: auto;">22</a>
                <a href="#" class="question-link" data-question="23" style="pointer-events: auto;">23</a>
                <a href="#" class="question-link" data-question="24" style="pointer-events: auto;">24</a>
                <a href="#" class="question-link" data-question="25" style="pointer-events: auto;">25</a>
            </div>
            <span class="question-placeholder">13 of 25</span>
        </div>
        <div class="tab " data-tab="part3">
            <span class="tab-title">Part 3</span>
            <div class="question-links">
                <a href="#" class="question-link" data-question="26">26</a>
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
            <span class="question-placeholder">26 of 40</span>
        </div>

    </div>
    <div class="fixed-bottom d-flex justify-content-end mb-5 px-5" style="gap: 5px; z-index: 2050; pointer-events: none;">
        <!-- Left Arrow -->
        <button id="prev-question" type="button" class="btn btn-dark" style="font-size: 1.5rem; pointer-events: auto;">
            <span class="material-icons-outlined">arrow_back</span>
        </button>
        <!-- Right Arrow -->
        <button id="next-question" type="button" class="btn btn-dark" style="font-size: 1.5rem; pointer-events: auto;">
            <span class="material-icons-outlined">arrow_forward</span>
        </button>
    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const getSelectedText = () => {
                const selection = window.getSelection ? window.getSelection() : null;
                return selection ? selection.toString().trim() : '';
            };

            let downX = 0;
            let downY = 0;
            let dragFromAccordionBtn = false;
            let didDrag = false;

            const DRAG_THRESHOLD_PX = 4;

            const isInAccordionBtn = (target) => {
                return target && target.closest ? target.closest('.question_site .accordion-button') : null;
            };

            document.addEventListener('mousedown', function(e) {
                const btn = isInAccordionBtn(e.target);
                if (!btn) return;

                dragFromAccordionBtn = true;
                didDrag = false;
                downX = e.clientX;
                downY = e.clientY;
            }, true);

            document.addEventListener('pointerdown', function(e) {
                const btn = isInAccordionBtn(e.target);
                if (!btn) return;

                dragFromAccordionBtn = true;
                didDrag = false;
                downX = e.clientX;
                downY = e.clientY;
            }, true);

            document.addEventListener('mousemove', function(e) {
                if (!dragFromAccordionBtn) return;
                const dx = Math.abs(e.clientX - downX);
                const dy = Math.abs(e.clientY - downY);
                if (dx > DRAG_THRESHOLD_PX || dy > DRAG_THRESHOLD_PX) {
                    didDrag = true;
                }
            }, true);

            document.addEventListener('pointermove', function(e) {
                if (!dragFromAccordionBtn) return;
                const dx = Math.abs(e.clientX - downX);
                const dy = Math.abs(e.clientY - downY);
                if (dx > DRAG_THRESHOLD_PX || dy > DRAG_THRESHOLD_PX) {
                    didDrag = true;
                }
            }, true);

            document.addEventListener('mouseup', function() {
                dragFromAccordionBtn = false;
            }, true);

            document.addEventListener('pointerup', function() {
                dragFromAccordionBtn = false;
            }, true);

            document.querySelectorAll('.question_site .accordion-button').forEach(function(btn) {
                btn.addEventListener('click', function(e) {
                    if (didDrag || getSelectedText()) {
                        didDrag = false;
                        e.preventDefault();
                        e.stopImmediatePropagation();
                        return false;
                    }
                }, true);
            });

            document.addEventListener('click', function(e) {
                const inAccordion = e.target.closest ? e.target.closest('.question_site .accordion-item') : null;
                if (!inAccordion) return;

                if (didDrag || getSelectedText()) {
                    didDrag = false;
                    e.preventDefault();
                    e.stopImmediatePropagation();
                }
            }, true);
        });
    </script>
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

                function getScrollContainer(el) {
                    if (!el) return null;
                    const scrollBox = el.closest('.scroll-box');
                    if (scrollBox) return scrollBox;

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

                function scrollToVisibleTop(target) {
                    if (!target) return;
                    const container = getScrollContainer(target);
                    const topOffset = 20;

                    if (container) {
                        const tRect = target.getBoundingClientRect();
                        const cRect = container.getBoundingClientRect();
                        const delta = (tRect.top - cRect.top);
                        const nextTop = Math.max(0, container.scrollTop + delta - topOffset);
                        container.scrollTo({
                            top: nextTop,
                            behavior: 'smooth'
                        });
                        return;
                    }

                    target.style.scrollMarginTop = '120px';
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start',
                        inline: 'nearest'
                    });
                }

                function ensureExpandedVisible(collapseEl) {
                    if (!collapseEl) return;
                    const container = getScrollContainer(collapseEl);
                    const padding = 20;

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
                        return;
                    }

                    const elRect = collapseEl.getBoundingClientRect();
                    const bottomOverflow = elRect.bottom - window.innerHeight;
                    if (bottomOverflow > 0) {
                        window.scrollBy({
                            top: bottomOverflow + padding,
                            behavior: 'smooth'
                        });
                    }
                }

                function ensureExpandedVisible(collapseEl) {
                    if (!collapseEl) return;
                    const container = getScrollContainer(collapseEl);
                    const padding = 20;

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
                        return;
                    }

                    const elRect = collapseEl.getBoundingClientRect();
                    const bottomOverflow = elRect.bottom - window.innerHeight;
                    if (bottomOverflow > 0) {
                        window.scrollBy({
                            top: bottomOverflow + padding,
                            behavior: 'smooth'
                        });
                    }
                }

                // Remove existing active styles
                document.querySelectorAll('.question-number').forEach(num => num.classList.remove(
                'active'));

                // If question has a number span (1-6), add active style
                const numberBox = document.getElementById(`question-${qNum}-number`);
                if (numberBox) {
                    numberBox.classList.add('active');

                    // Scroll to label (1–6)
                    const questionLabel = document.getElementById(`q${qNum}_heading`) || document.getElementById(qNum);
                    if (questionLabel) {
                        scrollToVisibleTop(questionLabel);

                        const collapseEl = document.getElementById(`q${qNum}_collapse`);
                        if (collapseEl && !collapseEl.__hexasScrollBound) {
                            collapseEl.__hexasScrollBound = true;
                            collapseEl.addEventListener('shown.bs.collapse', function() {
                                const header = document.getElementById(`q${qNum}_heading`) || document.getElementById(qNum);
                                scrollToVisibleTop(header);
                                ensureExpandedVisible(collapseEl);
                            });
                        }
                    }
                }

                // If it's an input field (7–10), focus it
                const inputField = document.getElementById(qNum);
                if (inputField && inputField.tagName === 'INPUT') {
                    const scrollTarget = document.getElementById(`q${qNum}_heading`) || inputField;
                    scrollToVisibleTop(scrollTarget);
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
                        e.stopImmediatePropagation(); // prevent commonScript timer from starting
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

                    const modalInstance = bootstrap.Modal.getInstance(startModalEl);
                    if (modalInstance) modalInstance.hide();
                }, true); // use capture phase to run BEFORE commonScript handler

                // Enter key triggers start button
                studentIdInput.addEventListener('keydown', function(event) {
                    if (event.key === 'Enter') {
                        event.preventDefault();
                        startTestBtn.click();
                    }
                });
            }
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




    <!-- arrow button script  -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            function getScrollContainer(el) {
                if (!el) return null;
                const scrollBox = el.closest('.scroll-box');
                if (scrollBox) return scrollBox;

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

            function ensureExpandedVisible(collapseEl) {
                if (!collapseEl) return;
                const container = getScrollContainer(collapseEl);
                const padding = 20;

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
                    return;
                }

                const elRect = collapseEl.getBoundingClientRect();
                const bottomOverflow = elRect.bottom - window.innerHeight;
                if (bottomOverflow > 0) {
                    window.scrollBy({
                        top: bottomOverflow + padding,
                        behavior: 'smooth'
                    });
                }
            }

            document.querySelectorAll('.accordion-collapse').forEach((collapseEl) => {
                if (collapseEl.__hexasGlobalScrollBound) return;
                collapseEl.__hexasGlobalScrollBound = true;
                collapseEl.addEventListener('shown.bs.collapse', function() {
                    ensureExpandedVisible(collapseEl);
                });
            });

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
                function getScrollContainer(el) {
                    if (!el) return null;
                    const scrollBox = el.closest('.scroll-box');
                    if (scrollBox) return scrollBox;

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

                function scrollToVisibleTop(target) {
                    if (!target) return;
                    const container = getScrollContainer(target);
                    const topOffset = 20;

                    if (container) {
                        const tRect = target.getBoundingClientRect();
                        const cRect = container.getBoundingClientRect();
                        const delta = (tRect.top - cRect.top);
                        const nextTop = Math.max(0, container.scrollTop + delta - topOffset);
                        container.scrollTo({
                            top: nextTop,
                            behavior: 'smooth'
                        });
                        return;
                    }

                    target.style.scrollMarginTop = '120px';
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start',
                        inline: 'nearest'
                    });
                }

                const scrollTarget = document.getElementById(`q${num}_heading`) || document.getElementById(num);
                if (scrollTarget) {
                    scrollToVisibleTop(scrollTarget);
                    const collapseEl = document.getElementById(`q${num}_collapse`);
                    if (collapseEl && !collapseEl.__hexasScrollBound) {
                        collapseEl.__hexasScrollBound = true;
                        collapseEl.addEventListener('shown.bs.collapse', function() {
                            const header = document.getElementById(`q${num}_heading`) || document.getElementById(num);
                            scrollToVisibleTop(header);
                            ensureExpandedVisible(collapseEl);
                        });
                    }
                }

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

            function ensureSpacesBetweenAdjacentMarks(markList) {
                for (let i = 0; i < markList.length - 1; i++) {
                    const a = markList[i];
                    const b = markList[i + 1];
                    if (!a || !b) continue;
                    if (!a.parentNode || a.parentNode !== b.parentNode) continue;

                    const between = a.nextSibling;
                    if (between === b) {
                        a.parentNode.insertBefore(document.createTextNode('\u00A0'), b);
                        continue;
                    }

                    if (between && between.nodeType === Node.TEXT_NODE && between.nextSibling === b) {
                        if (!between.textContent || /^\s+$/.test(between.textContent)) {
                            between.textContent = '\u00A0';
                        }
                    }
                }
            }

            function ensureVisibleSpaceAroundMarks(markList) {
                markList.forEach((mark) => {
                    if (!mark || !mark.parentNode) return;

                    const prev = mark.previousSibling;
                    if (prev && prev.nodeType === Node.TEXT_NODE) {
                        // Convert trailing whitespace to NBSP so it doesn't collapse at element boundary
                        prev.textContent = prev.textContent.replace(/\s+$/g, '\u00A0');
                    } else if (prev && prev.nodeType === Node.ELEMENT_NODE && prev.tagName !== 'MARK') {
                        // If there is no whitespace node at all, insert NBSP to guarantee separation
                        mark.parentNode.insertBefore(document.createTextNode('\u00A0'), mark);
                    }

                    const next = mark.nextSibling;
                    if (next && next.nodeType === Node.TEXT_NODE) {
                        // Convert leading whitespace to NBSP so it doesn't collapse at element boundary
                        next.textContent = next.textContent.replace(/^\s+/g, '\u00A0');
                    }
                });
            }

            function ensureWordBoundarySpaces(markList) {
                const isAlphaNum = (ch) => /[A-Za-z0-9]/.test(ch || '');
                const lastChar = (str) => (str && str.length ? str[str.length - 1] : '');
                const firstChar = (str) => (str && str.length ? str[0] : '');

                markList.forEach((mark) => {
                    if (!mark || !mark.parentNode) return;

                    const prev = mark.previousSibling;
                    const next = mark.nextSibling;

                    // Ensure separation before mark
                    if (prev && prev.nodeType === Node.TEXT_NODE) {
                        const prevText = prev.textContent || '';
                        if (prevText !== '' && !/\s$/.test(prevText)) {
                            if (isAlphaNum(lastChar(prevText)) && isAlphaNum(firstChar(mark.textContent || ''))) {
                                prev.textContent = prevText + '\u00A0';
                            }
                        }
                    } else if (prev && prev.nodeType === Node.ELEMENT_NODE && prev.tagName === 'MARK') {
                        const prevText = prev.textContent || '';
                        if (isAlphaNum(lastChar(prevText)) && isAlphaNum(firstChar(mark.textContent || ''))) {
                            mark.parentNode.insertBefore(document.createTextNode('\u00A0'), mark);
                        }
                    }

                    // Ensure separation after mark
                    if (next && next.nodeType === Node.TEXT_NODE) {
                        const nextText = next.textContent || '';
                        if (nextText !== '' && !/^\s/.test(nextText)) {
                            if (isAlphaNum(lastChar(mark.textContent || '')) && isAlphaNum(firstChar(nextText))) {
                                next.textContent = '\u00A0' + nextText;
                            }
                        }
                    } else if (next && next.nodeType === Node.ELEMENT_NODE && next.tagName === 'MARK') {
                        const nextText = next.textContent || '';
                        if (isAlphaNum(lastChar(mark.textContent || '')) && isAlphaNum(firstChar(nextText))) {
                            mark.parentNode.insertBefore(document.createTextNode('\u00A0'), next);
                        }
                    }
                });
            }

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

            ensureSpacesBetweenAdjacentMarks(marks);
            ensureVisibleSpaceAroundMarks(marks);
            ensureWordBoundarySpaces(marks);
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

                const markId = Date.now();
                const groupText = selectedGroupText || marks.map(m => m.innerText).join(' ');
                marks.forEach((mark) => {
                    mark.setAttribute('data-tooltip', '');
                    mark.setAttribute('data-note', '');
                    mark.dataset.fullText = groupText;
                    mark.dataset.markId = markId;

                    mark.addEventListener('click', function(e) {
                        e.stopPropagation();
                        showNotePopup(mark);
                    });
                });

                // Also add entry to sidebar
                const sidebar = document.getElementById('sidebar');
                const noteDiv = document.createElement('div');
                noteDiv.classList.add('sidebar-note-item');
                noteDiv.innerHTML = `
                    <div class="sidebar-header" style="margin-bottom: 3px; cursor: pointer;">${groupText}</div>
                    <div class="sidebar-note-content" style="color: #666; white-space: pre-wrap;"></div>
                `;
                noteDiv.style.borderBottom = '1px solid #ccc';
                noteDiv.style.padding = '8px';
                
                // Store reference to mark element
                noteDiv.dataset.markId = markId;
                
                sidebar.appendChild(noteDiv);

                // Click sidebar item to open popup
                noteDiv.addEventListener('click', () => {
                    showNotePopup(marks[0]);
                });

                // Immediately show popup for new note
                showNotePopup(marks[0]);
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

            const notePopup = document.createElement('div');
            notePopup.classList.add('note-popup');
            const popupTitle = (mark.dataset.fullText || mark.innerText || '').trim();
            notePopup.innerHTML = `
        <div class="drag-handle" style="background: linear-gradient(to bottom, #f0f0f0, #d0d0d0); padding: 8px; cursor: move; border-bottom: 2px solid #999; display: flex; justify-content: space-between; align-items: center; user-select: none;">
            <span style="font-size: 12px; color: #666;"> Drag to move</span>
            <span class="close-note" style="cursor: pointer; font-size: 20px; font-weight: bold; color: #666;">&times;</span>
        </div>
        <div class="popup-header" contenteditable="true" style="font-weight: bold; cursor: text; padding: 8px; background: rgba(0,0,0,0.05); margin-bottom: 5px; border: 1px solid #ccc; outline: none;">${popupTitle}</div>
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

                document.querySelectorAll('#testForm input[placeholder]').forEach(function(input) {
                input.setAttribute('data-original-placeholder', input.getAttribute('placeholder') || '');
                input.addEventListener('focus', function() {
                    input.setAttribute('placeholder', '');
                });
                input.addEventListener('blur', function() {
                    if (!input.value) {
                        input.setAttribute('placeholder', input.getAttribute('data-original-placeholder') || '');
                    }
                });
            });

            const savedAnswers = @json($answers ?? []);
            Object.keys(savedAnswers || {}).forEach(function(qNum) {
                const value = savedAnswers[qNum];
                if (value === null || value === undefined) return;
                const strVal = String(value);
                if (strVal.trim() === '') return;

                const hidden = document.querySelector('input[name="q' + String(qNum) + '"]');
                if (hidden && (hidden.value || '') === '') {
                    hidden.value = strVal;
                }
            });

            function setActiveQuestionLink(qNum) {
                if (!qNum) return;
                const qStr = String(qNum);
                document.querySelectorAll('.question-link').forEach(l => l.classList.remove('active'));
                const link = document.querySelector(`.question-link[data-question="${qStr}"]`);
                if (link) link.classList.add('active');
            }

            function clearRowSelection(rowNumber) {
                document.querySelectorAll(`.tick-cell[data-row="${rowNumber}"]`).forEach(function(cell) {
                    cell.classList.remove('selected');
                });
            }

            function setRowValue(rowNumber, value) {
                const hidden = document.querySelector(`input[name="q${rowNumber}"]`);
                if (hidden) {
                    hidden.value = value;
                    hidden.dispatchEvent(new Event('change'));
                }

                clearRowSelection(rowNumber);
                const cell = document.querySelector(`.tick-cell[data-row="${rowNumber}"][data-value="${value}"]`);
                if (cell) cell.classList.add('selected');

                // Mark bottom question number active (Q1-7)
                if ((Number(rowNumber) >= 1 && Number(rowNumber) <= 7) || (Number(rowNumber) >= 35 && Number(rowNumber) <= 37)) {
                    setActiveQuestionLink(rowNumber);
                }
            }

            function clearRowValue(rowNumber) {
                const hidden = document.querySelector(`input[name="q${rowNumber}"]`);
                if (hidden) {
                    hidden.value = '';
                    hidden.dispatchEvent(new Event('change'));
                }
                clearRowSelection(rowNumber);
            }

            document.querySelectorAll('.tick-cell').forEach(function(cell) {
                cell.addEventListener('click', function() {
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

            [1,2,3,4,5,6,7,35,36,37].forEach(function(i) {
                const hidden = document.querySelector(`input[name="q${i}"]`);
                if (!hidden) return;
                const val = (hidden.value || '').toUpperCase().trim();
                if (!val) return;

                setRowValue(i, val);
            });

            document.querySelectorAll('.mcq-sync').forEach(function(radio) {
                radio.addEventListener('change', function() {
                    const target = radio.getAttribute('data-target');
                    if (!target) return;
                    const hidden = document.querySelector(`input[name="${target}"]`);
                    if (hidden) hidden.value = radio.value;

                    const qNum = String(target).replace(/^q/i, '');
                    if (
                        qNum === '11'
                        || qNum === '12'
                        || (Number(qNum) >= 16 && Number(qNum) <= 25)
                        || (Number(qNum) >= 26 && Number(qNum) <= 34)
                    ) {
                        setActiveQuestionLink(qNum);
                    }
                });
            });

            ['q11', 'q12', 'q16', 'q17', 'q18', 'q19', 'q20', 'q21', 'q22', 'q23', 'q24', 'q25', 'q26', 'q27', 'q28', 'q29', 'q30', 'q31', 'q32', 'q33', 'q34'].forEach(function(q) {
                const hidden = document.querySelector(`input[name="${q}"]`);
                if (!hidden) return;
                const val = (hidden.value || '').trim();
                if (!val) return;
                const radio = document.querySelector(`input[name="${q}_radio"][value="${val}"]`);
                if (radio) {
                    radio.checked = true;
                    const qNum = String(q).replace(/^q/i, '');
                    if (
                        qNum === '11'
                        || qNum === '12'
                        || (Number(qNum) >= 16 && Number(qNum) <= 25)
                        || (Number(qNum) >= 26 && Number(qNum) <= 34)
                    ) {
                        setActiveQuestionLink(qNum);
                    }
                }
            });

            // ===== Drag and Drop for Questions 13-15 =====
            var dndDraggedEl = null;

            // Remove native draggable from headings
            document.querySelectorAll('.dnd-heading').forEach(function(el) {
                el.setAttribute('draggable', 'false');
            });

            var dndGhost = null;

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
                var content = headingEl.getAttribute('data-content');
                var text = headingEl.textContent;
                var qName = dropInput.getAttribute('data-question');

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

                // Hide heading from right side list
                headingEl.classList.add('used');
                headingEl.style.display = 'none';

                // Sync hidden input - save full content (no serial number)
                var hidden = document.querySelector('input[name="' + qName + '"]');
                if (hidden) {
                    hidden.value = content;
                    hidden.dispatchEvent(new Event('change'));
                }

                var qNum = String(qName || '').replace(/^q/i, '');
                if ((Number(qNum) >= 13 && Number(qNum) <= 15) || (Number(qNum) >= 38 && Number(qNum) <= 40)) {
                    setActiveQuestionLink(qNum);
                }
            }

            // Clear drop input on double-click — return heading to right side list
            document.querySelectorAll('.dnd-drop-input').forEach(function(dropInput) {
                dropInput.addEventListener('dblclick', function() {
                    var oldVal = dropInput.getAttribute('data-placed-value');
                    if (oldVal) {
                        var h = document.querySelector('.dnd-heading[data-value="' + oldVal + '"]');
                        if (h) {
                            h.classList.remove('used');
                            h.style.display = '';
                        }
                    }
                    dropInput.value = '';
                    dropInput.removeAttribute('data-placed-value');
                    dropInput.style.width = '200px';
                    dropInput.style.border = '1px solid #ccc';
                    dropInput.style.boxShadow = 'none';
                    var qName = dropInput.getAttribute('data-question');
                    var hidden = document.querySelector('input[name="' + qName + '"]');
                    if (hidden) {
                        hidden.value = '';
                        hidden.dispatchEvent(new Event('change'));
                    }
                });
            });

            var dndSourceInput = null; // track which input we're dragging FROM

            // Start drag from right side heading list
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

            // Start drag from a filled drop input (to move or return)
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

                // Highlight drop inputs on hover
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

                // Remove ghost
                if (dndGhost.parentNode) dndGhost.parentNode.removeChild(dndGhost);
                dndGhost = null;

                // Check if dropped on a drop input
                var droppedOnInput = false;
                document.querySelectorAll('.dnd-drop-input').forEach(function(inp) {
                    inp.style.borderColor = '#ccc';
                    inp.style.background = '#fff';
                    var rect = inp.getBoundingClientRect();
                    if (e.clientX >= rect.left && e.clientX <= rect.right && e.clientY >= rect.top && e.clientY <= rect.bottom) {
                        // If dragging from another input, clear that input first
                        if (dndSourceInput && dndSourceInput !== inp) {
                            dndSourceInput.value = '';
                            dndSourceInput.removeAttribute('data-placed-value');
                            dndSourceInput.style.width = '200px';
                            dndSourceInput.style.border = '1px solid #ccc';
                            dndSourceInput.style.boxShadow = 'none';
                            var srcQ = dndSourceInput.getAttribute('data-question');
                            var srcHidden = document.querySelector('input[name="' + srcQ + '"]');
                            if (srcHidden) {
                                srcHidden.value = '';
                                srcHidden.dispatchEvent(new Event('change'));
                            }
                        } else if (dndSourceInput && dndSourceInput === inp) {
                            // Dropped back on same input — do nothing
                            dndDraggedEl.classList.remove('dragging');
                            dndDraggedEl = null;
                            dndSourceInput = null;
                            return;
                        }
                        // Make heading visible again before placing (dndPlaceHeading will hide it)
                        dndDraggedEl.classList.remove('used');
                        dndDraggedEl.style.display = '';
                        dndPlaceHeading(inp, dndDraggedEl);
                        droppedOnInput = true;
                    }
                });

                // If dragged from input but NOT dropped on any input → return to right side list
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
                    if (srcHidden) {
                        srcHidden.value = '';
                        srcHidden.dispatchEvent(new Event('change'));
                    }
                }

                if (dndDraggedEl) dndDraggedEl.classList.remove('dragging');
                dndDraggedEl = null;
                dndSourceInput = null;
            });

            // Restore saved values on page load
            ['q13', 'q14', 'q15', 'q38', 'q39', 'q40'].forEach(function(qName) {
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

                var qNum = String(qName || '').replace(/^q/i, '');
                if ((Number(qNum) >= 13 && Number(qNum) <= 15) || (Number(qNum) >= 38 && Number(qNum) <= 40)) {
                    setActiveQuestionLink(qNum);
                }
            });
        });
    </script>

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
                if (text && (text.value || '') === '') {
                    text.value = strVal;
                }

                const hiddenText = document.querySelector('input[type="text"][name="' + name + '"][style*="display:none"], input[type="text"][name="' + name + '"][style*="display: none"]');
                if (hiddenText && (hiddenText.value || '') === '') {
                    hiddenText.value = strVal;
                    hiddenText.dispatchEvent(new Event('change'));
                }

                const tickCells = document.querySelectorAll('.tick-cell[data-row="' + String(qNum) + '"]');
                if (tickCells && tickCells.length) {
                    tickCells.forEach(cell => cell.classList.remove('selected'));
                    const selectedCell = document.querySelector('.tick-cell[data-row="' + String(qNum) + '"][data-value="' + CSS.escape(strVal) + '"]');
                    if (selectedCell) {
                        selectedCell.classList.add('selected');
                    }
                }

                const directRadio = document.querySelector('input[type="radio"][name="' + name + '"][value="' + CSS.escape(strVal) + '"]');
                if (directRadio) {
                    directRadio.checked = true;
                }

                const radio = document.querySelector('input[type="radio"][name="' + name + '_radio"][value="' + CSS.escape(strVal) + '"]');
                if (radio) {
                    radio.checked = true;
                }

                const checkboxGroup = document.querySelectorAll('input[type="checkbox"][name="' + name + '[]"]');
                if (checkboxGroup && checkboxGroup.length) {
                    const selected = strVal.split(',').map(v => v.trim()).filter(v => v !== '');
                    checkboxGroup.forEach(cb => {
                        cb.checked = selected.includes(cb.value);
                    });
                }
            });
        });
    </script>


</body>

</html>
