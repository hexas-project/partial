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

        .tab.active {
            color: green;
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
            height: 70vh;
            overflow-y: auto;
            overflow-x: hidden;
            word-wrap: break-word;
            font-size: 16px;
            padding-right: 15px;
        }

        .question_site {
            height: 70vh;
            overflow-y: auto;
            overflow-x: hidden;
            padding-left: 15px;
        }

        .highlight {
            background-color: yellow;
        }

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

        .mark,
        mark {
            padding: 0px !important;
        }

        .question_site input[type="text"] {
            border: 1px solid #d1d1d1;
            border-radius: 4px;
            padding: 2px 8px;
            outline: none;
            background: #fff;
        }

        #finishButton:hover {
            color: white !important;
            border-color: black !important;
        }

        /* accordion styles for Q1-5 */
        .accordion-button::after {
            display: none;
        }

        .accordion-item {
            border: none;
            margin-bottom: 6px;
        }

        .accordion-button,
        .accordion-button.collapsed {
            box-shadow: none;
            background-color: #dbeafe;
            color: #1e3a5f;
            border: 1px solid #93c5fd;
            border-radius: 6px;
        }

        .accordion-button:not(.collapsed) {
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }

        .accordion-button:focus {
            box-shadow: none;
        }

        .accordion-body {
            border: none !important;
            padding-top: 10px;
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
            padding: 25px;
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
            color: white;
        }

        #startModal #startTestButton:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
            opacity: 0.9;
        }

        .matching-grid {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 14px;
        }

        .matching-grid th, .matching-grid td {
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

        .matching-grid td.choice-cell {
            text-align: center;
            cursor: pointer;
            width: 45px;
            position: relative;
            user-select: none;
        }

        .matching-grid td.choice-cell:hover {
            background-color: rgba(207, 226, 255, 0.4);
        }

        .matching-grid td.choice-cell.selected {
            background-color: transparent; 
        }

        .tick {
            visibility: hidden;
            opacity: 0;
            color: #2e7d32;
            font-weight: bold;
            font-size: 20px;
            line-height: 1;
            transition: opacity 0.1s ease;
        }

        .matching-grid td.choice-cell.selected .tick {
            visibility: visible;
            opacity: 1;
        }
    </style>
</head>

<body>
    <form action="{{ route('reading.submit') }}" method="POST" id="testForm" spellcheck="false" autocomplete="off">
        @csrf
        <input type="hidden" name="test_name" value="{{ $testName ?? 'class09_reading' }}">
        <input type="hidden" name="student_id" value="{{ auth()->id() ?? session('student_batch_id') }}">
        <input type="hidden" name="exam_student_id" id="examStudentIdField"
            value="{{ session('exam_student_id', '') }}">
        <input type="hidden" name="assignment_id" value="{{ $assignmentId ?? '' }}">

        <!-- Sidebar -->
        <div id="sidebar" class="sidebar">
            <div class="sidebar-header"
                style="background: #f8f9fa; border-bottom: 1px solid #ddd; padding: 10px 15px; display: flex; justify-content: space-between; align-items: center;">
                <h5 style="margin: 0; font-weight: bold; font-size: 16px;">Notes & Highlights</h5>
                <span class="close-btn"
                    style="cursor: pointer; font-size: 24px; line-height: 1; color: #666;">&times;</span>
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
                            <span id="noteToggle" class="material-icons-outlined"
                                style="cursor: pointer;">note_alt</span>
                        </li>
                    </ul>
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
                <div id="allClear" style="padding: 5px; cursor: pointer;">🗑️ Clear all</div>
            </div>

            <div class="container-fluid px-5 mt-4">
                <!-- ===================== PART 1 ===================== -->
                <div class="tab-content active" id="part1" style="margin-bottom: 100px;">
                    <div class="question_part">
                        <h4 class="mb-2">Part 1</h4>
                        <p class="mb-0">Read the text below and answer questions 1-12</p>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="scroll-box">
                                <h4 class="text-center mb-4"><strong>The potential to sniff out disease</strong></h4>
                                <p>The fact diseases have a smell comes as no surprise - but finding someone or
                                    something that can detect them at an early stage could held huge potential for
                                    medicine.</p>
                                <p>Breath, bodily odours and urine are all amazingly revealing about general health.
                                    Even the humble cold can give off an odour, thanks to the thick bacteria-ridden
                                    mucus that ends up in the back of the throat. The signs are not apparent to everyone
                                    – but some super-smellers are very sensitive to the odours. Joy Milne, for example,
                                    noticed her husband's smell had changed shortly before he was diagnosed with
                                    Parkinson's disease.</p>
                                <p>Humans can detect nearly 10,000 different smells. Formed by chemicals in the air,
                                    they are absorbed by little hairs, made of extremely sensitive nerve fibres, hanging
                                    from the nose's olfactory receptors. And the human sense of smell is 10,000 times
                                    more sensitive than the sense of taste. But dogs, as the old joke might have had it,
                                    smell even better.</p>
                                <p>Their ability to detect four times as many odours as humans makes them a potential
                                    early warning system for a range of diseases. Research suggesting dogs could sniff
                                    out cancers, for example, was first published about 10 years ago. And there have
                                    been many tales of dogs repeatedly sniffing an area of their owner's body, only for
                                    it to turn out to be hiding a tumour.</p>
                                <p>What they are smelling are the “volatile molecules” given off by cells when they
                                    become cancerous. Some studies suggest dogs can be 93% accurate. Others suggest they
                                    can detect very small tumours before clinical tests can. And yet more studies have
                                    produced mixed results. Does cancer smell?</p>
                                <p>At Milton Keynes University Hospital, a small team has recently begun to collect
                                    human urine samples to test dogs' ability to detect the smell of prostate cancer.
                                    The patients had symptoms such as difficulty urinating or a change in flow, which
                                    could turn out to be prostate, bladder or liver cancer.</p>
                                <p>Rowena Fletcher, head of research and development at the hospital, says the role of
                                    the dogs – which have been trained by Medical Detection Dogs – is to pick out
                                    samples that smell of cancer. Further down the line, a clinical test will show if
                                    the dogs' diagnosis is correct. She says the potential for using dogs in this way is
                                    far-reaching – even if it is not practical to have a dog in every surgery. “We hope
                                    one day that there could be an electronic machine on every GP's desk which could
                                    test a urine sample for disease by smelling it,” she says. “But first we need to
                                    pick up the pattern of what the dogs are smelling.”</p>
                                <p>And that's the key. Dogs can't tell us what their noses are detecting, but scientists
                                    believe that different cancers could produce different smells, although some might
                                    also be very similar. Electronic noses (alt-tests to understand what those
                                    highly-trained dogs are smelling) could then inform the development of ‘electronic
                                    noses’ to detect the same molecules. These might then give rise to better diagnostic
                                    tests in the future. The potential for using smell to test for a wide range of
                                    diseases is huge, Ms Fletcher says. Bacteria, cancers and chronic diseases could all
                                    have their own odour – which may be imperceptible to only the most sensitive humans,
                                    but obvious to dogs. It may be possible in the future to use disease odours as the
                                    basis for a national screening programme or to test everybody at risk of a certain
                                    cancer in a particular age group.</p>
                                <p>However, there are fewer than 20 dogs in the UK trained to detect cancer at present.
                                    Training more will take more funding and time. On the positive side, all dogs are
                                    eligible to be trained provided they are keen on searching and hunting. Whatever
                                    their breed or size, it's our four-legged friends' astounding sense of smell which
                                    could unlock a whole new way of detecting human diseases.</p>
                            </div>
                        </div>

                        <div class="col-md-6 question_site">
                            <h5><strong>Questions 1-5</strong></h5>
                            <p class="small"><em>"Choose <strong>TRUE</strong> if the statement agrees with the
                                    information given in the text, choose <strong>FALSE</strong> if the statement
                                    contradicts the information, or choose<strong> NOT GIVEN</strong> if there is no
                                    information on this."</em></p>


                            <div class="accordion mt-3" id="q1_5_accordion">
                                @for ($i = 1; $i <= 5; $i++)
                                    @php
                                        $qText = match ($i) {
                                            1 => "You can have a specific smell even due to a simple cold.",
                                            2 => "Human sense of taste is 10,000 less sensitive than human sense of smell.",
                                            3 => "Dogs and cats can sniff out different diseases.",
                                            4 => "Doctors believe that different cancers might have the same specific smell.",
                                            5 => "There are more than 20 dogs in the UK trained to detect cancer.",
                                        };
                                    @endphp
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="q{{$i}}_heading">
                                            <div class="accordion-button collapsed" role="button" tabindex="0"
                                                data-bs-toggle="collapse" data-bs-target="#q{{$i}}_collapse"
                                                aria-expanded="false" aria-controls="q{{$i}}_collapse">
                                                <strong>{{$i}}</strong>&nbsp;<span>{{$qText}}</span>
                                            </div>
                                        </h2>
                                        <div id="q{{$i}}_collapse" class="accordion-collapse collapse"
                                            aria-labelledby="q{{$i}}_heading" data-bs-parent="#q1_5_accordion">
                                            <div class="accordion-body">
                                                <div class="form-check"><input class="form-check-input mcq-sync"
                                                        type="radio" name="q{{$i}}_radio" id="q{{$i}}_TRUE" value="TRUE"
                                                        data-target="q{{$i}}" {{ ($answers['q' . $i] ?? '') == 'TRUE' ? 'checked' : '' }}><label class="form-check-label"
                                                        for="q{{$i}}_TRUE">TRUE</label></div>
                                                <div class="form-check"><input class="form-check-input mcq-sync"
                                                        type="radio" name="q{{$i}}_radio" id="q{{$i}}_FALSE" value="FALSE"
                                                        data-target="q{{$i}}" {{ ($answers['q' . $i] ?? '') == 'FALSE' ? 'checked' : '' }}><label class="form-check-label"
                                                        for="q{{$i}}_FALSE">FALSE</label></div>
                                                <div class="form-check"><input class="form-check-input mcq-sync"
                                                        type="radio" name="q{{$i}}_radio" id="q{{$i}}_NG" value="NOT GIVEN"
                                                        data-target="q{{$i}}" {{ ($answers['q' . $i] ?? '') == 'NOT GIVEN' ? 'checked' : '' }}><label class="form-check-label"
                                                        for="q{{$i}}_NG">NOT GIVEN</label></div>
                                                <input type="text" name="q{{$i}}" id="q{{$i}}" style="display:none;"
                                                    value="{{ $answers['q' . $i] ?? '' }}" />
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>

                            <hr>

                            <h5><strong>Questions 6-9</strong></h5>
                            <p class="small"><em>Choose the correct answer.</em></p>
                            <div class="accordion mt-3" id="q6_9_accordion">
                                @php
                                    $q6_9 = [
                                        6 => [
                                            'text' => 'All the studies suggest that dogs',
                                            'options' => [
                                                'A' => 'Can be 93% accurate',
                                                'B' => 'Can detect very small tumours',
                                                'C' => "Can't detect tumours at all",
                                                'D' => 'Different studies have shown different results'
                                            ]
                                        ],
                                        7 => [
                                            'text' => 'What scientists give dogs to detect cancer?',
                                            'options' => [
                                                'A' => 'Urine samples',
                                                'B' => 'Bacteria',
                                                'C' => 'Different odours',
                                                'D' => 'Nothing'
                                            ]
                                        ],
                                        8 => [
                                            'text' => "What's an electronic nose?",
                                            'options' => [
                                                'A' => 'A specific tool for dogs',
                                                'B' => 'A gadget to diagnose diseases',
                                                'C' => 'A recovery tool for ill patients',
                                                'D' => 'An artificial nose'
                                            ]
                                        ],
                                        9 => [
                                            'text' => 'The main objective of this passage is to:',
                                            'options' => [
                                                'A' => 'Bring awareness to the cancer problem',
                                                'B' => 'Show us how good dogs are at detecting cancer',
                                                'C' => 'Show us how important it can be to be able to diagnose a disease by an odour',
                                                'D' => 'Tell us about new technologies'
                                            ]
                                        ],
                                    ];
                                @endphp
                                @foreach($q6_9 as $i => $qData)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="q{{$i}}_heading">
                                            <div class="accordion-button collapsed" role="button" tabindex="0"
                                                data-bs-toggle="collapse" data-bs-target="#q{{$i}}_collapse"
                                                aria-expanded="false" aria-controls="q{{$i}}_collapse">
                                                <strong>{{$i}}</strong>&nbsp;<span>{{$qData['text']}}</span>
                                            </div>
                                        </h2>
                                        <div id="q{{$i}}_collapse" class="accordion-collapse collapse"
                                            aria-labelledby="q{{$i}}_heading" data-bs-parent="#q6_9_accordion">
                                            <div class="accordion-body">
                                                @foreach($qData['options'] as $val => $optText)
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio"
                                                            name="q{{$i}}_radio" id="q{{$i}}_{{$val}}" value="{{$val}}"
                                                            data-target="q{{$i}}" {{ ($answers['q' . $i] ?? '') == $val ? 'checked' : '' }}>
                                                        <label class="form-check-label"
                                                            for="q{{$i}}_{{$val}}">{{ $optText }}</label>
                                                    </div>
                                                @endforeach
                                                <input type="text" name="q{{$i}}" id="q{{$i}}" style="display:none;"
                                                    value="{{ $answers['q' . $i] ?? '' }}" />
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <hr>

                            <h5><strong>Questions 10-12</strong></h5>
                            <p class="small"><em>Complete the sentences below.Write <strong>NO MORE THAN TWO WORDS</strong> from the passage for each answer.</em></p>
                            <div class="mb-3">
                                <p> Scientists hope that one day an <input type="text" name="q10"
                                        id="q10" value="{{ $answers['q10'] ?? '' }}" placeholder="10" style="width: 150px;"> will be on
                                    every desk.</p>
                                <p> Electronic nose would help to detect the <input type="text"
                                        name="q11" id="q11" value="{{ $answers['q11'] ?? '' }}" placeholder="11" style="width: 150px;">.
                                </p>
                                <p> Dogs can <input type="text" name="q12" id="q12"
                                        value="{{ $answers['q12'] ?? '' }}" placeholder="12" style="width: 150px;"> a new way of
                                    diagnosing diseases.</p>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="tab-content" id="part2" style="margin-bottom: 100px;">
                    <div class="question_part">
                        <h4 class="mb-2">Part 2</h4>
                        <p class="mb-0">Read the text below and answer questions 13-27</p>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="scroll-box">
                                <h4 class="text-center mb-2"><strong>Trash Talk</strong></h4>
                                <h6 class="text-center mb-4"><strong>Sorting through a mountain of pottery to track the
                                        Roman oil trade</strong></h6>
                                <p><strong>(A)</strong> In the middle of Rome's trendiest neighborhood, surrounded by
                                    sushi restaurants and nightclubs with names like Rodeo Steakhouse and Love Story,
                                    sits the ancient world's biggest garbage dump a 150-foot-tall mountain of discarded
                                    Roman amphoras, the shipping drums of the ancient world. It takes about 20 minutes
                                    to walk around Monte Testaccio, from the Latin testa and Italian cocci, both meaning
                                    "potsherd." But despite its Size almost a mile in circumference it's easy to walk by
                                    and not really notice unless you are headed for some excellent pizza at
                                    Velavevodetto, a restaurant literally stuck into the mountain's side. Most local
                                    residents don't know what's underneath the grass, dust, and scattering of trees.
                                    Monte Testaccio looks like a big hill, and in Rome people are accustomed to hills.
                                </p>
                                <p><strong>(B)</strong> Although a garbage dump may lack the attraction of the Forum or
                                    Colosseum, I have come to Rome to meet the team excavating Monte Testaccio and to
                                    learn how scholars are using its evidence to understand the ancient Roman economy.
                                    As the modern global economy depends on light sweet crude, so too the ancient Romans
                                    depended on oil—olive oil. And for more than 250 years, from at least the first
                                    century A.D., an enormous number of amphoras filled with olive oil came by ship from
                                    the Roman provinces into the city itself, where they were unloaded, emptied, and
                                    then taken to Monte Testaccio and thrown away. In the absence of written records or
                                    literature on the subject, studying these amphoras is the best way to answer some of
                                    the most vexing questions concerning the Roman economy. How did it operate? How much
                                    control did the emperor exert over it? Which sectors were supported by the state and
                                    which operated in a free market environment or in the private sector?</p>
                                <p><strong>(C)</strong> Monte Testaccio stands near the Tiber River in what was ancient
                                    Rome's commercial district. Many types of imported foodstuffs, including oil, were
                                    brought into the city and then stored for later distribution in the large warehouses
                                    that lined the river. So, professor, just how many amphoras are there?" I ask José
                                    Remesal of the University of Barcelona, co-director of the Monte Testaccio
                                    excavations. It's the same question that must occur to everyone who visits the site
                                    when they realize that the crunching sounds their footfalls make are not from
                                    walking on fallen leaves, but on pieces of amphoras. (Don't worry, even the small
                                    pieces are very sturdy.) Remesal replies in his deep baritone, "Something like 25
                                    million complete ones. Of course, it's difficult to be exact," he adds with a
                                    typical Mediterranean shrug. I, for one, find it hard to believe that the whole
                                    mountain is made of amphoras without any soil or rubble. Seeing the incredulous look
                                    on my face as I peer down into a 10-foot-deep trench, Remesal says, "Yes, it's
                                    really only amphoras." I can't imagine another site in the world where
                                    archaeologists find so much about a ton of pottery every day. On most Mediterranean
                                    excavations, pottery washing is an activity reserved for blisteringly hot afternoons
                                    when digging is impossible. Here, it is the only activity for most of Remesal's
                                    team, an international group of specialists and students from Spain and the United
                                    States. During each year's two-week field season, they wash and sort thousands of
                                    amphoras handles, bodies, shoulders, necks, and tops, counting and cataloguing, and
                                    always looking for stamped names, painted names, and numbers that tell each
                                    amphora's story.</p>
                                <p><strong>(D)</strong> Although scholars worked at Monte Testaccio beginning in the
                                    late 19th century, it's only within the past 30 years that they have embraced the
                                    role amphoras can play in understanding the nature of the Roman imperial economy.
                                    According to Remesal, the main challenge archaeologists and economic historians face
                                    is the lack of “serial documentation,” that is, documents for consecutive years that
                                    reflect a true chronology. This is what makes Monte Testaccio a unique record of
                                    Roman commerce and provides a vast amount of datable evidence in a clear and
                                    unambiguous sequence. “There's no other place where you can study economic history,
                                    food production and distribution, and how the state controlled the transport of a
                                    product,” Remesal says. “It's really remarkable.”</p>
                            </div>
                        </div>

                        <div class="col-md-6 question_site">
                            <h5><strong>Questions 13-16</strong></h5>
                            <p class="small"><em>Reading Passage 2 has four paragraphs <strong>A-D.</strong>  Which section contains the following information?</em></p>
                            <p><strong>NB:</strong> You may use any letter more than once.</p>
                            <div class="mb-3">
                                <table class="matching-grid">
                                    <thead>
                                        <tr>
                                            <th style="width: auto;"></th>
                                            <th class="choice-cell">A</th>
                                            <th class="choice-cell">B</th>
                                            <th class="choice-cell">C</th>
                                            <th class="choice-cell">D</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $info13_16 = [
                                                13 => "Questions about the Roman economy",
                                                14 => "A unique feature",
                                                15 => "Description of the dump",
                                                16 => "Dialogue with a professor"
                                            ];
                                        @endphp
                                        @foreach($info13_16 as $qNum => $txt)
                                        <tr>
                                            <td><strong>{{ $qNum }}</strong> {{ $txt }}</td>
                                            @foreach(['A','B','C','D'] as $val)
                                            <td class="choice-cell tick-cell" data-row="{{ $qNum }}" data-value="{{ $val }}"><span class="tick">✓</span></td>
                                            @endforeach
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div style="display:none;">
                                    <input type="text" name="q13" id="q13" value="{{ $answers['q13'] ?? '' }}">
                                    <input type="text" name="q14" id="q14" value="{{ $answers['q14'] ?? '' }}">
                                    <input type="text" name="q15" id="q15" value="{{ $answers['q15'] ?? '' }}">
                                    <input type="text" name="q16" id="q16" value="{{ $answers['q16'] ?? '' }}">
                                </div>
                            </div>


                            <hr>

                            <h5><strong>Questions 17-21</strong></h5>
                            <p class="small"><em>Choose <strong>TRUE</strong> if the statement agrees with the
                                    information given in the text, choose <strong>FALSE</strong> if the statement
                                    contradicts the information, or choose <strong>NOT GIVEN</strong> if there is no
                                    information on this.</em></p>


                            <div class="accordion mt-3" id="q17_21_accordion">
                                @for ($i = 17; $i <= 21; $i++)
                                    @php
                                        $qText = match ($i) {
                                            17 => "World's biggest garbage dump is surrounded by restaurants and nightclubs.",
                                            18 => "The garbage dump is as popular as the Colosseum in Rome.",
                                            19 => "Ancient Roman economy depended on oil.",
                                            20 => "There is no information on how many amphoras are there.",
                                            21 => "Remesal says that Monte Testaccio is a great place to study economics.",
                                        };
                                    @endphp
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="q{{$i}}_heading">
                                            <div class="accordion-button collapsed" role="button" tabindex="0"
                                                data-bs-toggle="collapse" data-bs-target="#q{{$i}}_collapse"
                                                aria-expanded="false" aria-controls="q{{$i}}_collapse">
                                                <strong>{{$i}}</strong>&nbsp;<span>{{$qText}}</span>
                                            </div>
                                        </h2>
                                        <div id="q{{$i}}_collapse" class="accordion-collapse collapse"
                                            aria-labelledby="q{{$i}}_heading" data-bs-parent="#q17_21_accordion">
                                            <div class="accordion-body">
                                                <div class="form-check"><input class="form-check-input mcq-sync"
                                                        type="radio" name="q{{$i}}_radio" id="q{{$i}}_TRUE" value="TRUE"
                                                        data-target="q{{$i}}" {{ ($answers['q' . $i] ?? '') == 'TRUE' ? 'checked' : '' }}><label class="form-check-label"
                                                        for="q{{$i}}_TRUE">TRUE</label></div>
                                                <div class="form-check"><input class="form-check-input mcq-sync"
                                                        type="radio" name="q{{$i}}_radio" id="q{{$i}}_FALSE" value="FALSE"
                                                        data-target="q{{$i}}" {{ ($answers['q' . $i] ?? '') == 'FALSE' ? 'checked' : '' }}><label class="form-check-label"
                                                        for="q{{$i}}_FALSE">FALSE</label></div>
                                                <div class="form-check"><input class="form-check-input mcq-sync"
                                                        type="radio" name="q{{$i}}_radio" id="q{{$i}}_NG" value="NOT GIVEN"
                                                        data-target="q{{$i}}" {{ ($answers['q' . $i] ?? '') == 'NOT GIVEN' ? 'checked' : '' }}><label class="form-check-label"
                                                        for="q{{$i}}_NG">NOT GIVEN</label></div>
                                                <input type="text" name="q{{$i}}" id="q{{$i}}" style="display:none;"
                                                    value="{{ $answers['q' . $i] ?? '' }}" />
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>

                            <hr>

                            <h5><strong>Questions 22-26</strong></h5>
                            <p class="small"><em>Complete the sentences. Write <strong>NO MORE THAN THREE WORDS ONLY</strong> from the text in each gap.</em></p>
                            <div class="mb-3">
                                <p> It is unknown for <input type="text" name="q22" id="q22"
                                        value="{{ $answers['q22'] ?? '' }}" placeholder="22" style="width: 150px;"> what's underneath the
                                    grass, dust, and scattering of trees.</p>
                                <p> Monte Testaccio stands near the ancient Rome's <input
                                        type="text" name="q23" id="q23" value="{{ $answers['q23'] ?? '' }}" placeholder="23"
                                        style="width: 150px;">.</p>
                                <p> Remesal doesn't believe that the whole mountain is made of
                                    <input type="text" name="q24" id="q24" value="{{ $answers['q24'] ?? '' }}" placeholder="24"
                                        style="width: 150px;"> without any soil or rubble.</p>
                                <p> Remesal's team washes and sorts thousands of amphoras each
                                    year's two-week <input type="text" name="q25" id="q25"
                                        value="{{ $answers['q25'] ?? '' }}" placeholder="25" style="width: 150px;">.</p>
                                <p> <input type="text" name="q26" id="q26"
                                        value="{{ $answers['q26'] ?? '' }}" placeholder="26" style="width: 150px;"> started working at
                                    Monte Testaccio in the late 19th century.</p>
                            </div>

                            <hr>

                            <h5><strong>Question 27</strong></h5>
                            <p class="small"><em>Complete the sentences. Write <strong>NO MORE THAN THREE WORDS ONLY</strong> from the text in each gap.</em></p>
                            <div class="mb-3">
                                <p> One of the greatest mysteries in science is the nature of the
                                    <input type="text" name="q27" id="q27" value="{{ $answers['q27'] ?? '' }}" placeholder="27"
                                        style="width: 150px;">.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ===================== PART 3 ===================== -->
                <div class="tab-content" id="part3" style="margin-bottom: 100px;">
                    <div class="question_part">
                        <h4 class="mb-2">Part 3</h4>
                        <p class="mb-0">Read the text below and answer questions 28-40</p>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="scroll-box">
                                <h4 class="text-center mb-4"><strong>Mysterious Dark Matter May Not Always Have Been
                                        Dark</strong></h4>
                                <p>Dark matter particles may have interacted extensively with normal matter long ago,
                                    when the universe was very hot, a new study suggests. The nature of dark matter is
                                    currently one of the greatest mysteries in science. The invisible substance — which
                                    is detectable via its gravitational influence on "normal" matter - is thought to
                                    make up five-sixths of all matter in the universe.</p>
                                <p>Astronomers began suspecting the existence of dark matter when they noticed the
                                    cosmos seemed to possess more mass than stars could account for. For example, stars
                                    circle the center of the Milky Way so fast that they should overcome the
                                    gravitational pull of the galaxy's core and zoom into the intergalactic void. Most
                                    scientists think dark matter provides the gravity that helps hold these stars back.
                                    Astronomers know more about what dark matter is not than what it actually is.</p>
                                <p>Scientists have mostly ruled out all known ordinary materials as candidates for dark
                                    matter. The consensus so far is that this missing mass is made up of new species of
                                    particles that interact only very weakly with ordinary matter. One potential clue
                                    about the nature of dark matter has to do with the fact that it's five times more
                                    abundant than normal matter, researchers said.</p>
                                <p>"This may seem a lot, and it is, but if dark and ordinary matter were generated in a
                                    completely independent way, then this number is puzzling," said study co-author
                                    Pavlos Vranas, a particle physicist at Lawrence Livermore National Laboratory in
                                    Livermore, California. "Instead of five, it could have been a million or a billion.
                                    Why five?" The researchers suggest a possible solution to this puzzle: Dark matter
                                    particles once interacted often with normal matter, even though they barely do so
                                    now. "This may have happened in the early universe, when the temperature was very
                                    high — so high that both ordinary and dark matter were 'melted' in a plasma state
                                    made up of their ingredients".</p>
                                <p>The protons and neutrons making up atomic nuclei are themselves each made up of a
                                    trio of particles known as quarks. The researchers suggest dark matter is also made
                                    of a composite "stealth" particle, which is composed of a quartet of component
                                    particles and is difficult to detect (like a stealth airplane). The scientists'
                                    supercomputer simulations suggest these composite particles may have masses ranging
                                    up to more than 200 billion electron volts, which is about 213 times a proton's
                                    mass. Quarks each possess fractional electrical charges of positive or negative
                                    one-third or two-thirds. In protons, these add up to a positive charge, while in
                                    neutrons, the result is a neutral charge. Quarks are confined within protons and
                                    neutrons by the so-called "strong interaction."</p>
                                <p>The researchers suggest that the component particles making up stealth dark matter
                                    particles each have a fractional charge of positive or negative one-half, held
                                    together by a "dark form" of the strong interaction. Stealth dark matter particles
                                    themselves would only have a neutral charge, leading them to interact very weakly at
                                    best with ordinary matter, light, electric fields and magnetic fields. The
                                    researchers suggest that at the extremely high temperatures seen in the newborn
                                    universe, the electrically charged components of stealth dark matter particles could
                                    have interacted with ordinary matter. However, once the universe cooled, a new,
                                    powerful and as yet unknown force might have bound these component particles
                                    together tightly to form electrically neutral composites. Stealth dark matter
                                    particles should be stable — not decaying over eons, if at all, much like protons.
                                    However, the researchers suggest the components making up stealth dark matter
                                    particles can form different unstable composites that decay shortly after their
                                    creation. "For example, one could have composite particles made out of just two
                                    component particles," Vranas said.</p>
                                <p>These unstable particles might have masses of about 100 billion electron-volts or
                                    more, and could be created by particle accelerators such as the Large Hadron
                                    Collider (LHC) beneath the France-Switzerland border. They could also have an
                                    electric charge and be visible to particle detectors, Vranas said. Experiments at
                                    the LHC, or sensors designed to spot rare instances of dark matter colliding with
                                    ordinary matter, "may soon find evidence of, or rule out, this new stealth dark
                                    matter theory," Vranas said in a statement. If stealth dark matter exists, future
                                    research can investigate whether there are any effects it might have on the cosmos.
                                    "Are there any signals in the sky that telescopes may find?" Vranas said. "In order
                                    to answer these questions, our calculations will require larger supercomputing
                                    resources. Fortunately, supercomputing development is progressing fast towards
                                    higher computational speeds." The scientists, the Lattice Strong Dynamics
                                    Collaboration, will detail their findings in an upcoming issue of the journal
                                    Physical Review Letters.</p>
                            </div>
                        </div>

                        <div class="col-md-6 question_site">
                            <h5><strong>Questions 28-34</strong></h5>
                            <p class="small"><em>Complete the sentences. Write <strong>NO MORE THAN TWO WORDS ONLY</strong> from the text in each gap.</em></p>
                            <div class="mb-3">
                                <p> All known material have been mostly <input type="text"
                                        name="q28" id="q28" value="{{ $answers['q28'] ?? '' }}" placeholder="28" style="width: 150px;">
                                    as candidates for dark matter.</p>
                                <p> Dark matter is a lot more <input type="text" name="q29" id="q29"
                                        value="{{ $answers['q29'] ?? '' }}" placeholder="29" style="width: 150px;"> than normal matter.
                                </p>
                                <p> Due to high temperature, both ordinary and dark matter were
                                    'melted' in a <input type="text" name="q30" id="q30"
                                        value="{{ $answers['q30'] ?? '' }}" placeholder="30" style="width: 150px;">.</p>
                                <p> It is confirmed that quarks are within protons and neutrons by
                                    <input type="text" name="q31" id="q31" value="{{ $answers['q31'] ?? '' }}"
                                        placeholder="31" style="width: 150px;">.</p>
                                <p> It is suggested that stealth dark matter particle would only
                                    have a <input type="text" name="q32" id="q32" value="{{ $answers['q32'] ?? '' }}"
                                        placeholder="32" style="width: 150px;">.</p>
                                <p> Experiments at the LHC may soon find <input type="text"
                                        name="q33" id="q33" value="{{ $answers['q33'] ?? '' }}" placeholder="33" style="width: 150px;">
                                    of the new stealth dark matter theory.</p>
                                <p> To answer questions we require <input type="text" name="q34"
                                        id="q34" value="{{ $answers['q34'] ?? '' }}" placeholder="34" style="width: 150px;"> resources.
                                </p>
                            </div>

                            <hr>

                            <h5><strong>Questions 35-39</strong></h5>
                            <p class="small"><em>Choose <strong>TRUE</strong> if the statement agrees with the
                                    information given in the text, choose <strong>FALSE</strong> if the statement
                                    contradicts the information, or choose <strong>NOT GIVEN</strong> if there is no
                                    information on this.</em></p>
                            <div class="accordion mt-3" id="q35_39_accordion">
                                @for ($i = 35; $i <= 39; $i++)
                                    @php
                                        $qText = match ($i) {
                                            35 => "The nature of dark matter is a mystery.",
                                            36 => "It is likely that dark matter consists of ordinary materials.",
                                            37 => "Quarks have neither positive nor negative charge.",
                                            38 => "Protons are not stable.",
                                            39 => "Dark matter has a serious impact on the cosmos.",
                                        };
                                    @endphp
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="q{{$i}}_heading">
                                            <div class="accordion-button collapsed" role="button" tabindex="0"
                                                data-bs-toggle="collapse" data-bs-target="#q{{$i}}_collapse"
                                                aria-expanded="false" aria-controls="q{{$i}}_collapse">
                                                <strong>{{$i}}</strong>&nbsp;<span>{{$qText}}</span>
                                            </div>
                                        </h2>
                                        <div id="q{{$i}}_collapse" class="accordion-collapse collapse"
                                            aria-labelledby="q{{$i}}_heading" data-bs-parent="#q35_39_accordion">
                                            <div class="accordion-body">
                                                <div class="form-check"><input class="form-check-input mcq-sync"
                                                        type="radio" name="q{{$i}}_radio" id="q{{$i}}_TRUE" value="TRUE"
                                                        data-target="q{{$i}}" {{ ($answers['q' . $i] ?? '') == 'TRUE' ? 'checked' : '' }}><label class="form-check-label"
                                                        for="q{{$i}}_TRUE">TRUE</label></div>
                                                <div class="form-check"><input class="form-check-input mcq-sync"
                                                        type="radio" name="q{{$i}}_radio" id="q{{$i}}_FALSE" value="FALSE"
                                                        data-target="q{{$i}}" {{ ($answers['q' . $i] ?? '') == 'FALSE' ? 'checked' : '' }}><label class="form-check-label"
                                                        for="q{{$i}}_FALSE">FALSE</label></div>
                                                <div class="form-check"><input class="form-check-input mcq-sync"
                                                        type="radio" name="q{{$i}}_radio" id="q{{$i}}_NG" value="NOT GIVEN"
                                                        data-target="q{{$i}}" {{ ($answers['q' . $i] ?? '') == 'NOT GIVEN' ? 'checked' : '' }}><label class="form-check-label"
                                                        for="q{{$i}}_NG">NOT GIVEN</label></div>
                                                <input type="text" name="q{{$i}}" id="q{{$i}}" style="display:none;"
                                                    value="{{ $answers['q' . $i] ?? '' }}" />
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>

                            <hr>

                            <h5><strong>Question 40</strong></h5>
                            <p class="small"><em>Choose the correct answer</em>
                            </p>
                            <div class="accordion mt-3" id="q40_accordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="q40_heading">
                                        <div class="accordion-button collapsed" role="button" tabindex="0"
                                            data-bs-toggle="collapse" data-bs-target="#q40_collapse"
                                            aria-expanded="false" aria-controls="q40_collapse">
                                            <strong>40</strong>&nbsp;<span>Passage 3 is:</span>
                                        </div>
                                    </h2>
                                    <div id="q40_collapse" class="accordion-collapse collapse"
                                        aria-labelledby="q40_heading" data-bs-parent="#q40_accordion">
                                        <div class="accordion-body">
                                            <div class="form-check"><input class="form-check-input mcq-sync"
                                                    type="radio" name="q40_radio" id="q40_A" value="A" data-target="q40"
                                                    {{ ($answers['q40'] ?? '') == 'A' ? 'checked' : '' }}><label
                                                    class="form-check-label" for="q40_A">a scientific article</label>
                                            </div>
                                            <div class="form-check"><input class="form-check-input mcq-sync"
                                                    type="radio" name="q40_radio" id="q40_B" value="B" data-target="q40"
                                                    {{ ($answers['q40'] ?? '') == 'B' ? 'checked' : '' }}><label
                                                    class="form-check-label" for="q40_B">a sci-fi article</label></div>
                                            <div class="form-check"><input class="form-check-input mcq-sync"
                                                    type="radio" name="q40_radio" id="q40_C" value="C" data-target="q40"
                                                    {{ ($answers['q40'] ?? '') == 'C' ? 'checked' : '' }}><label
                                                    class="form-check-label" for="q40_C">a short sketch</label></div>
                                            <div class="form-check"><input class="form-check-input mcq-sync"
                                                    type="radio" name="q40_radio" id="q40_D" value="D" data-target="q40"
                                                    {{ ($answers['q40'] ?? '') == 'D' ? 'checked' : '' }}><label
                                                    class="form-check-label" for="q40_D">an article from a
                                                    magazine</label></div>
                                            <input type="text" name="q40" id="q40" style="display:none;"
                                                value="{{ $answers['q40'] ?? '' }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Navigation -->
            <div class="fixed-bottom d-flex justify-content-end mb-5 px-5" style="gap: 5px;">
                <button id="prev-question" type="button" class="btn btn-dark" style="font-size: 1.5rem;">
                    <span class="material-icons-outlined">arrow_back</span>
                </button>
                <button id="next-question" type="button" class="btn btn-dark" style="font-size: 1.5rem;">
                    <span class="material-icons-outlined">arrow_forward</span>
                </button>
            </div>

            <div class="fixed-bottom px-5"
                style="bottom: 10px; background: #fff; padding-top: 5px;">
                <div class="container-fluid d-flex justify-content-between align-items-center">
                    <div class="tabs mb-0" style="gap: 15px; width: 100%;">
                        <div class="tab active" data-tab="part1">
                            <span class="tab-title">Part 1</span>
                            <div class="question-links">
                                @for ($i = 1; $i <= 12; $i++)
                                    <a href="#" class="question-link" data-question="q{{ $i }}">{{ $i }}</a>
                                @endfor
                            </div>
                            <span class="question-placeholder">1 of 12</span>
                        </div>
                        <div class="tab" data-tab="part2">
                            <span class="tab-title">Part 2</span>
                            <div class="question-links">
                                @for ($i = 13; $i <= 27; $i++)
                                    <a href="#" class="question-link" data-question="q{{ $i }}">{{ $i }}</a>
                                @endfor
                            </div>
                            <span class="question-placeholder">13 of 27</span>
                        </div>
                        <div class="tab" data-tab="part3">
                            <span class="tab-title">Part 3</span>
                            <div class="question-links">
                                @for ($i = 28; $i <= 40; $i++)
                                    <a href="#" class="question-link" data-question="q{{ $i }}">{{ $i }}</a>
                                @endfor
                            </div>
                            <span class="question-placeholder">28 of 40</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Start Test Modal -->
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
                    <h5 class="modal-title" id="finishModalLabel">Are you sure you want to complete the test?</h5>
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
        // Tab switching logic
        const tabs = document.querySelectorAll('.tab');
        const tabContents = document.querySelectorAll('.tab-content');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                tabs.forEach(t => {
                    t.classList.remove('active');
                    t.querySelector('.question-links').style.display = 'none';
                    t.querySelector('.question-placeholder').style.display = 'block';
                });

                tabContents.forEach(content => {
                    content.classList.remove('active');
                });

                tab.classList.add('active');
                tab.querySelector('.question-links').style.display = 'flex';
                tab.querySelector('.question-placeholder').style.display = 'none';

                const targetTab = tab.getAttribute('data-tab');
                const targetContent = document.getElementById(targetTab);
                if (targetContent) {
                    targetContent.classList.add('active');
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                }
            });
        });

        const allLinks = Array.from(document.querySelectorAll('.question-link'));
        let currentIndex = 0;

        function activateTabForQuestion(num) {
            const inputField = document.getElementById(num) || document.querySelector(`input[name="${num}"]`);
            if (!inputField) return;

            const partContent = inputField.closest('.tab-content');
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

            allLinks.forEach(link => link.classList.remove('active'));
            allLinks[index].classList.add('active');

            activateTabForQuestion(qNum);

            const inputField = document.getElementById(qNum) || document.querySelector(`input[name="${qNum}"]`);
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

        document.getElementById('prev-question').addEventListener('click', () => {
            if (currentIndex > 0) setActiveQuestion(currentIndex - 1);
        });

        document.getElementById('next-question').addEventListener('click', () => {
            if (currentIndex < allLinks.length - 1) setActiveQuestion(currentIndex + 1);
        });

        document.querySelectorAll('input[type="text"], input[type="radio"]').forEach(input => {
            input.addEventListener('focus', function () {
                const questionNum = this.id || this.name;
                const linkIndex = allLinks.findIndex(link => link.getAttribute('data-question') === questionNum);
                if (linkIndex !== -1) {
                    currentIndex = linkIndex;
                    allLinks.forEach(link => link.classList.remove('active'));
                    allLinks[linkIndex].classList.add('active');
                }
            });
        });

        // When an accordion button (Q1-5, Q6-9) is clicked, activate the matching question number in the nav panel
        document.querySelectorAll('#q1_5_accordion .accordion-button, #q6_9_accordion .accordion-button').forEach(button => {
            button.addEventListener('click', function () {
                const target = this.getAttribute('data-bs-target');
                if (!target) return;
                const qNum = target.replace('#', '').replace('_collapse', '');
                const linkIndex = allLinks.findIndex(link => link.getAttribute('data-question') === qNum);
                if (linkIndex !== -1) {
                    currentIndex = linkIndex;
                    allLinks.forEach(link => link.classList.remove('active'));
                    allLinks[linkIndex].classList.add('active');
                }
            });
        });

        // When an accordion button (Q17-21) is clicked, activate the matching question number in the nav panel
        document.querySelectorAll('#q17_21_accordion .accordion-button').forEach(button => {
            button.addEventListener('click', function () {
                const target = this.getAttribute('data-bs-target');
                if (!target) return;
                const qNum = target.replace('#', '').replace('_collapse', '');
                const linkIndex = allLinks.findIndex(link => link.getAttribute('data-question') === qNum);
                if (linkIndex !== -1) {
                    currentIndex = linkIndex;
                    allLinks.forEach(link => link.classList.remove('active'));
                    allLinks[linkIndex].classList.add('active');
                }
            });
        });

        // When an accordion button (Q35-39, Q40) is clicked, activate the matching question number in the nav panel
        document.querySelectorAll('#q35_39_accordion .accordion-button, #q40_accordion .accordion-button').forEach(button => {
            button.addEventListener('click', function () {
                const target = this.getAttribute('data-bs-target');
                if (!target) return;
                const qNum = target.replace('#', '').replace('_collapse', '');
                const linkIndex = allLinks.findIndex(link => link.getAttribute('data-question') === qNum);
                if (linkIndex !== -1) {
                    currentIndex = linkIndex;
                    allLinks.forEach(link => link.classList.remove('active'));
                    allLinks[linkIndex].classList.add('active');
                }

                // Auto-scroll on click (removed for Q35-39)
                if (this.closest('#q40_accordion')) {
                    setTimeout(() => {
                        this.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }, 350);
                }
            });
        });

        // Hide placeholder on focus and restore on blur
        document.querySelectorAll('input[type="text"]').forEach(input => {
            const originalPlaceholder = input.placeholder;
            input.addEventListener('focus', function() {
                this.placeholder = '';
            });
            input.addEventListener('blur', function() {
                this.placeholder = originalPlaceholder;
            });
        });

        function setRowValue(row, val) {
            const input = document.getElementById('q' + row);
            if (input) {
                input.value = val;
                input.dispatchEvent(new Event('input', { bubbles: true }));
                input.dispatchEvent(new Event('change', { bubbles: true }));
            }
            // Update UI
            document.querySelectorAll(`.tick-cell[data-row="${row}"]`).forEach(c => c.classList.remove('selected'));
            const cell = document.querySelector(`.tick-cell[data-row="${row}"][data-value="${val}"]`);
            if (cell) cell.classList.add('selected');
        }

        function clearRowValue(row) {
            const input = document.getElementById('q' + row);
            if (input) {
                input.value = '';
                input.dispatchEvent(new Event('input', { bubbles: true }));
                input.dispatchEvent(new Event('change', { bubbles: true }));
            }
            document.querySelectorAll(`.tick-cell[data-row="${row}"]`).forEach(c => c.classList.remove('selected'));
        }

        document.querySelectorAll('.tick-cell').forEach(function (cell) {
            cell.addEventListener('click', function (e) {
                e.stopPropagation(); // Prevent duplicate trigger from row listener
                const row = cell.getAttribute('data-row');
                const val = cell.getAttribute('data-value');
                if (!row || !val) return;

                // Activate question navigation link when clicking a cell
                const qKey = 'q' + row;
                const linkIndex = allLinks.findIndex(link => link.getAttribute('data-question') === qKey);
                if (linkIndex !== -1) {
                    currentIndex = linkIndex;
                    allLinks.forEach(link => link.classList.remove('active'));
                    allLinks[linkIndex].classList.add('active');
                }

                if (cell.classList.contains('selected')) {
                    clearRowValue(row);
                    return;
                }
                setRowValue(row, val);
            });
        });

        // Initialize ticks from hidden inputs on page load
        window.addEventListener('load', () => {
            [13, 14, 15, 16].forEach(function (i) {
                const hidden = document.getElementById('q' + i);
                if (hidden && hidden.value) {
                    const val = hidden.value.toUpperCase().trim();
                    const cell = document.querySelector(`.tick-cell[data-row="${i}"][data-value="${val}"]`);
                    if (cell) cell.classList.add('selected');
                }
            });
        });

        // Sync radio buttons with hidden text inputs for Q1-5
        document.querySelectorAll('.mcq-sync').forEach(function (radio) {
            radio.addEventListener('change', function () {
                const target = radio.getAttribute('data-target');
                if (!target) return;
                const hidden = document.getElementById(target);
                if (hidden) {
                    hidden.value = radio.value;
                    hidden.dispatchEvent(new Event('input', { bubbles: true }));
                    hidden.dispatchEvent(new Event('change', { bubbles: true }));
                }
            });
        });

        function updateQuestionCount() {
            tabs.forEach(tab => {
                const tabName = tab.getAttribute('data-tab');
                const questionLinks = tab.querySelectorAll('.question-link');
                const placeholder = tab.querySelector('.question-placeholder');

                let answeredCount = 0;
                questionLinks.forEach(link => {
                    const qNum = link.getAttribute('data-question');
                    const inputFields = document.getElementsByName(qNum);
                    if (inputFields.length > 0) {
                        if (inputFields[0].type === 'radio') {
                            const isChecked = Array.from(inputFields).some(rb => rb.checked);
                            if (isChecked) answeredCount++;
                        } else {
                            if (inputFields[0].value.trim() !== '') answeredCount++;
                        }
                    }
                });

                // No longer overwriting placeholder text to match readingClassTwelve style
            });
        }

        document.querySelectorAll('input[type="text"], input[type="radio"]').forEach(input => {
            input.addEventListener('change', updateQuestionCount);
            if (input.type === 'text') input.addEventListener('input', updateQuestionCount);
        });

        updateQuestionCount();

        // Timer and Modal Logic
        // Modal and Timer handlers
        document.addEventListener('DOMContentLoaded', function () {
            const startModalEl = document.getElementById('startModal');
            const startModal = new bootstrap.Modal(startModalEl, { backdrop: 'static', keyboard: false });
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
                if (timerElement) {
                    timerElement.textContent = `${String(minutes).padStart(2, '0')} : ${String(seconds).padStart(2, '0')} minutes remaining`;
                }
                if (timeRemaining <= 0) {
                    clearInterval(timerInterval);
                    if (timerElement) timerElement.textContent = "Time's up!";
                    alert("⏰ Time's up! Auto-submitting your test...");
                    if (testForm) testForm.submit();
                }
                timeRemaining--;
            }

            // Show start modal on page load
            startModal.show();

            // Start test: validate student ID, start timer when OK clicked
            if (startButton) {
                startButton.addEventListener('click', function () {
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
                        return;
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

                const studentIdInputEl = document.getElementById('studentIdInput');
                if (studentIdInputEl) {
                    studentIdInputEl.addEventListener('keydown', function (event) {
                        if (event.key === 'Enter') {
                            event.preventDefault();
                            startButton.click();
                        }
                    });
                }
            }

            if (finishButton) {
                finishButton.addEventListener('click', function (e) {
                    e.preventDefault();
                    finishModal.show();
                });
            }

            let isSubmitting = false;
            if (continueButton) {
                continueButton.addEventListener('click', function () {
                    if (isSubmitting) return;
                    isSubmitting = true;
                    continueButton.disabled = true;
                    continueButton.textContent = 'Submitting...';
                    if (testForm) testForm.submit();
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

        // Capture selection before it collapses
        let pendingSelectionRange = null;
        document.addEventListener('mouseup', function (e) {
            if (e.button !== 0) return;
            const sel = window.getSelection();
            if (sel && sel.toString().trim() !== '' && sel.rangeCount > 0) {
                pendingSelectionRange = sel.getRangeAt(0).cloneRange();
            } else {
                pendingSelectionRange = null;
            }
        });

        // Context menu on right-click
        document.addEventListener('contextmenu', function (e) {
            e.preventDefault();
            const selection = window.getSelection();
            clickedMark = null;

            let target = e.target;
            while (target && target.tagName !== 'MARK' && target.parentNode) {
                target = target.parentNode;
                if (target.tagName === 'MARK') break;
            }
            if (target && target.tagName === 'MARK') clickedMark = target;

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

        document.addEventListener('click', function (e) {
            if (!contextMenu.contains(e.target)) contextMenu.style.display = 'none';
        });

        // Robust dual-strategy highlight function
        function highlightRange(range) {
            const createdMarks = [];
            const { startContainer, endContainer, startOffset, endOffset } = range;

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

            let root = range.commonAncestorContainer;
            if (root.nodeType === Node.TEXT_NODE) root = root.parentNode;
            const textNodes = [];

            try {
                const walker = document.createTreeWalker(root, NodeFilter.SHOW_TEXT, null, false);
                let node;
                while (node = walker.nextNode()) {
                    if (range.intersectsNode(node)) textNodes.push(node);
                }
            } catch (err) {
                const walker = document.createTreeWalker(root, NodeFilter.SHOW_TEXT, null, false);
                let node, inRange = false;
                while (node = walker.nextNode()) {
                    if (node === startContainer) inRange = true;
                    if (inRange) textNodes.push(node);
                    if (node === endContainer) break;
                }
            }

            textNodes.forEach((textNode) => {
                let start = 0, end = textNode.textContent.length;
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

        highlightOption.addEventListener('click', function () {
            if (selectionRange) {
                highlightRange(selectionRange);
                window.getSelection().removeAllRanges();
            }
            selectionRange = null; pendingSelectionRange = null;
            contextMenu.style.display = 'none';
        });

        notesOption.addEventListener('click', function () {
            const sidebarNotesContainer = document.getElementById('sidebar-notes-container');
            if (clickedMark) {
                showNotePopup(clickedMark, clickedMark.dataset.selectedText || clickedMark.innerText);
                contextMenu.style.display = 'none'; return;
            }
            if (selectionRange) {
                const selectedText = selectionRange.toString();
                const newMarks = highlightRange(selectionRange);
                if (newMarks.length > 0) {
                    const markId = 'mark-' + Date.now();
                    const firstMark = newMarks[0];
                    newMarks.forEach(mk => {
                        mk.setAttribute('data-note', '');
                        mk.dataset.selectedText = selectedText;
                        mk.dataset.markId = markId;
                        mk.addEventListener('click', (e) => { e.stopPropagation(); showNotePopup(mk, mk.dataset.selectedText || mk.innerText); });
                    });
                    const noteDiv = document.createElement('div');
                    noteDiv.classList.add('sidebar-note-item');
                    noteDiv.dataset.markId = markId;
                    noteDiv.innerHTML = `
                        <div class="sidebar-header-item" style="margin-bottom: 3px; cursor: pointer; font-size: 13px;">${selectedText}</div>
                        <div class="sidebar-note-content" style="color: #666; white-space: pre-wrap; font-size: 12px;"></div>
                    `;
                    noteDiv.style.borderBottom = '1px solid #ccc';
                    noteDiv.style.padding = '8px';

                    if (sidebarNotesContainer) sidebarNotesContainer.appendChild(noteDiv);
                    noteDiv.addEventListener('click', () => {
                        firstMark.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        setTimeout(() => showNotePopup(firstMark, firstMark.dataset.selectedText || firstMark.innerText), 300);
                    });
                    showNotePopup(firstMark, selectedText);
                }
                window.getSelection().removeAllRanges();
            }
            contextMenu.style.display = 'none';
        });

        clearOption.addEventListener('click', function () {
            if (clickedMark) {
                const markId = clickedMark.dataset.markId;
                if (markId) {
                    const sidebarItem = document.querySelector(`.sidebar-note-item[data-mark-id="${markId}"]`);
                    if (sidebarItem) sidebarItem.remove();
                    document.querySelectorAll(`mark[data-mark-id="${markId}"]`).forEach(mk => mk.replaceWith(document.createTextNode(mk.innerText)));
                } else { clickedMark.replaceWith(document.createTextNode(clickedMark.innerText)); }
                document.body.normalize();
                if (activePopup) { activePopup.remove(); activePopup = null; }
                clickedMark = null;
            }
            selectionRange = null; pendingSelectionRange = null;
            contextMenu.style.display = 'none';
        });

        allClearOption.addEventListener('click', function () {
            document.querySelectorAll('mark').forEach(m => m.replaceWith(document.createTextNode(m.innerText)));
            document.body.normalize();
            document.getElementById('sidebar-notes-container').innerHTML = '';
            if (activePopup) { activePopup.remove(); activePopup = null; }
            // Close the Notes & Highlights sidebar
            const sidebarEl = document.getElementById('sidebar');
            const mainContentEl = document.getElementById('main-content');
            if (sidebarEl) sidebarEl.classList.remove('open');
            if (mainContentEl) mainContentEl.classList.remove('shifted');
            contextMenu.style.display = 'none';
        });

        function showNotePopup(mark, displayText) {
            if (activePopup) { activePopup.remove(); document.removeEventListener('click', handleOutsideClick); }
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
            const rect = mark.getBoundingClientRect();
            notePopup.style.left = rect.left + window.scrollX + 'px';
            notePopup.style.top = rect.bottom + window.scrollY + 5 + 'px';
            notePopup.querySelector('.close-note').addEventListener('click', () => { notePopup.remove(); activePopup = null; document.removeEventListener('click', handleOutsideClick); });
            const textarea = notePopup.querySelector('textarea');
            const updateNote = () => {
                const markId = mark.dataset.markId;
                if (markId) {
                    document.querySelectorAll(`mark[data-mark-id="${markId}"]`).forEach(mk => { mk.dataset.note = textarea.value; });
                    const si = document.querySelector(`.sidebar-note-item[data-mark-id="${markId}"]`);
                    if (si) { const snc = si.querySelector('.sidebar-note-content'); if (snc) snc.textContent = textarea.value; }
                } else { mark.dataset.note = textarea.value; }
            };
            textarea.addEventListener('input', updateNote);
            textarea.addEventListener('blur', updateNote);
            setTimeout(() => { textarea.focus(); const l = textarea.value.length; textarea.setSelectionRange(l, l); textarea.scrollTop = textarea.scrollHeight; }, 100);

            let isDragging = false, offsetX, offsetY;
            notePopup.querySelector('.drag-handle').addEventListener('mousedown', (e) => {
                if (!e.target.classList.contains('close-note')) { isDragging = true; offsetX = e.clientX + notePopup.offsetLeft; offsetY = e.clientY - notePopup.offsetTop; e.preventDefault(); }
            });
            document.addEventListener('mousemove', (e) => { if (isDragging) { notePopup.style.left = (e.clientX - offsetX) + 'px'; notePopup.style.top = (e.clientY - offsetY) + 'px'; } });
            document.addEventListener('mouseup', () => { isDragging = false; });
            setTimeout(() => document.addEventListener('click', handleOutsideClick), 0);
        }

        function handleOutsideClick(e) {
            if (activePopup && !activePopup.contains(e.target) && e.target.tagName !== 'MARK') {
                activePopup.remove(); activePopup = null; document.removeEventListener('click', handleOutsideClick);
            }
        }
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