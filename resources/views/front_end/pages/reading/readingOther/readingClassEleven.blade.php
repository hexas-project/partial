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

        input[type="text"]:focus::placeholder {
            color: transparent;
        }

        /* accordion styles */
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

        /* Drag and Drop Styles - Matching Class One */
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

        .dnd-heading:active {
            cursor: grabbing;
        }

        .dnd-heading.dragging {
            opacity: 0.4;
        }

        .dnd-heading.used {
            opacity: 0.4;
            cursor: default;
            pointer-events: none;
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

        #dnd-headings-list {
            padding: 20px 0;
            margin-bottom: 25px;
            min-height: 100px;
        }
    </style>
</head>

<body>
    <form action="{{ route('reading.submit') }}" method="POST" id="testForm" spellcheck="false" autocomplete="off">
        @csrf
        <input type="hidden" name="test_name" value="{{ $testName ?? 'class11_reading' }}">
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
            <div id="sidebar-notes-container" style="padding: 10px;"></div>
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
            <div id="customContextMenu"
                style="position: absolute; background: white; border: 1px solid #ccc; border-radius: 4px; padding: 5px; z-index: 999; display: none; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
                <div id="highlightOption" style="padding: 5px; cursor: pointer;">🖍️ Highlight</div>
                <div id="notesOption" style="padding: 5px; cursor: pointer;">📝 Notes</div>
                <div id="clearOption" style="padding: 5px; cursor: pointer;">🗑️ Clear</div>
                <div id="allClear" style="padding: 5px; cursor: pointer;">🗑️ Clear all</div>
            </div>

            <div class="container-fluid px-5 mt-4">
                <!-- PART 1 -->
                <div class="tab-content active" id="part1" style="margin-bottom: 100px;">
                    <div class="question_part">
                        <h4 class="mb-2">Part 1</h4>
                        <p class="mb-0">Read the text below and answer questions 1-13</p>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="scroll-box">
                                <h4 class="text-center mb-3"><strong>Aphantasia: A life without mental images</strong>
                                </h4>
                                <p>Close your eyes and imagine walking along a sandy beach and then gazing over the
                                    horizon as the Sun rises. How clear is the image that springs to mind?</p>
                                <p>Most people can readily conjure images inside their head - known as their mind's eye.
                                    But this year scientists have described a condition, aphantasia, in which some
                                    people are unable to visualise mental images. Niel Kenmuir, from Lancaster, has
                                    always had a blind mind's eye. He knew he was different even in childhood. "My
                                    stepfather, when I couldn't sleep, told me to count sheep, and he explained what he
                                    meant. I tried to do it and I couldn't," he says. "I couldn't see any sheep jumping
                                    over fences, there was nothing to count."</p>
                                <p>Our memories are often tied up in images, think back to a wedding or first day in
                                    school. As a result, Niel admits, some aspects of his memory are "terrible", but he
                                    is very good at remembering facts. And, like others with aphantasia, he struggles to
                                    recognise faces. Yet he does not see aphantasia as a disability, but simply a
                                    different way of experiencing life.</p>
                                <p><strong>Mind's eye blind</strong></p>
                                <p>Ironically, Niel now works in a bookshop, although he largely sticks to the
                                    non-fiction aisles. His condition begs the question of what is going on inside his
                                    picture-less mind. I asked him what happens when he tries to picture his fiancee.
                                    "This is the hardest thing to describe, what happens in my head when I think about
                                    things," he says. "When I think about my fiancee there is no image, but I am
                                    definitely thinking about her, I know today she has her hair up at the back, she's
                                    brunette. But I'm not describing an image I am looking at, I'm remembering features
                                    about her, that's the strangest thing and maybe that is a source of some regret."
                                </p>
                                <p>The response from his mates is a very sympathetic: "You're weird." But while Niel is
                                    very relaxed about his inability to picture things, it is often a cause of distress
                                    for others. One person who took part in a study into aphantasia said he had started
                                    to feel "isolated" and "alone" after discovering that other people could see images
                                    in their heads. Being unable to reminisce about his mother after her death led to
                                    him being "extremely distraught".</p>
                                <p><strong>The super-visualiser</strong></p>
                                <p>At the other end of the spectrum is children's book illustrator, Lauren Beard, whose
                                    work on the Fairytale Hairdresser series will be familiar to many six-year-olds. Her
                                    career relies on the vivid images that leap into her mind's eye when she reads text
                                    from her author. When I met her in her two-room studio in Manchester, she was
                                    working on a dramatic scene in her next book. The text describes a baby perilously
                                    climbing onto a chandelier. "Straightaway I can visualise this grand glass
                                    chandelier in some sort of French kind of ballroom, and the little baby just
                                    swinging off it and really heavy thick curtains," she says. "I think I have a strong
                                    imagination, so I can create the world and then keep adding to it so it gets sort of
                                    bigger and bigger in my mind and the characters too they sort of evolve. I couldn't
                                    really imagine what it's like to not imagine. I think it must be a bit of a shame
                                    really."</p>
                                <p>Not many people have mental imagery as vibrant as Lauren or as blank as Niel. They
                                    are the two extremes of visualisation. Adam Zeman, a professor of cognitive and
                                    behavioural neurology, wants to compare the lives and experiences of people with
                                    aphantasia and its polar-opposite hyperphantasia. His team, based at the University
                                    of Exeter, coined the term aphantasia this year in a study in the journal Cortex.
                                </p>
                                <p>Prof Zeman tells the BBC: "People who have contacted us say they are really delighted
                                    that this has been recognised and has been given a name, because they have been
                                    trying to explain to people for years that there is this oddity that they find hard
                                    to convey to others." How we imagine is clearly very subjective - one person's vivid
                                    scene could be another's grainy picture. But Prof Zeman is certain that aphantasia
                                    is real. People often report being able to dream in pictures, and there have been
                                    reported cases of people losing the ability to think in images after a brain injury.
                                </p>
                                <p>He is adamant that aphantasia is "not a disorder" and says it may affect up to one in
                                    50 people. But he adds: "I think it makes quite an important difference to their
                                    experience of life because many of us spend our lives with imagery hovering
                                    somewhere in the mind's eye which we inspect from time to time, it's a variability
                                    of human experience."</p>
                            </div>
                        </div>
                        <div class="col-md-6 question_site">
                            <h5><strong>Questions 1-8</strong></h5>
                            <p class="small"><em>Choose <strong>TRUE</strong> if the statement agrees with the
                                    information given in the text, choose <strong>FALSE</strong> if the statement
                                    contradicts the information, or choose <strong>NOT GIVEN</strong> if there is no
                                    information on this.</em></p>
                            <div class="accordion mt-3" id="q1_8_accordion">
                                @php
                                    $q1_8 = [
                                        1 => 'Aphantasia is a condition, which describes people, for whom it is hard to visualise mental images.',
                                        2 => 'Niel Kenmuir was unable to count sheep in his head.',
                                        3 => 'People with aphantasia struggle to remember personal traits and clothes of different people.',
                                        4 => 'Niel regrets that he cannot portray an image of his fiancee in his mind.',
                                        5 => 'Inability to picture things in someone\'s head is often a cause of distress for others.',
                                        6 => 'All people with aphantasia start to feel \'isolated\' or \'alone\' at some point of their lives.',
                                        7 => 'Lauren Beard\'s career depends on her imagination.',
                                        8 => 'The author met Lauren Beard when she was working on a comedy scene in her next book.',
                                    ];
                                @endphp
                                @foreach($q1_8 as $i => $qText)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="q{{$i}}_heading">
                                            <div class="accordion-button collapsed" role="button" tabindex="0"
                                                data-bs-toggle="collapse" data-bs-target="#q{{$i}}_collapse"
                                                aria-expanded="false" aria-controls="q{{$i}}_collapse">
                                                <strong>{{$i}}</strong>&nbsp;<span>{{$qText}}</span>
                                            </div>
                                        </h2>
                                        <div id="q{{$i}}_collapse" class="accordion-collapse collapse"
                                            aria-labelledby="q{{$i}}_heading" data-bs-parent="#q1_8_accordion">
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
                                @endforeach
                            </div>
                            <hr>
                            <h5><strong>Questions 9-13</strong></h5>
                            <p class="small"><em>Complete the sentences below.<br>Write <strong>NO MORE THAN TWO
                                        WORDS</strong> from the passage for each answer.</em></p>
                            <div class="mb-3">
                                <div> Only a small fraction of people have imagination as <input type="text"
                                        placeholder="9" name="q9" id="q9" value="{{ $answers['q9'] ?? '' }}"
                                        style="width: 150px;"> as Lauren does.</div>
                                <div> Hyperphantasia is <input type="text" placeholder="10" name="q10" id="q10"
                                        value="{{ $answers['q10'] ?? '' }}" style="width: 150px;">
                                    to aphantasia.</div>
                                <div> There are a lot of subjectivity in comparing people's
                                    imagination - somebody's vivid scene could be another person's <input type="text"
                                        placeholder="11" name="q11" id="q11" value="{{ $answers['q11'] ?? '' }}"
                                        style="width: 150px;">.</div>
                                <div> Prof Zeman is <input type="text" placeholder="12" name="q12" id="q12"
                                        value="{{ $answers['q12'] ?? '' }}" style="width: 150px;"> that
                                    aphantasia is not an illness.</div>
                                <div> Many people spend their lives with <input type="text" placeholder="13" name="q13"
                                        id="q13" value="{{ $answers['q13'] ?? '' }}" style="width: 150px;"> somewhere in
                                    the mind's eye.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- PART 2 -->
                <div class="tab-content" id="part2" style="margin-bottom: 100px;">
                    <div class="question_part">
                        <h4 class="mb-2">Part 2</h4>
                        <p class="mb-0">Read the text below and answer questions 14-26</p>
                    </div>

                    @php
                        $q14_pool = [
                            ['val' => 'i', 'text' => 'Jailbreak with creative thinking', 'content' => 'Jailbreak with creative thinking'],
                            ['val' => 'ii', 'text' => 'Five common traits among rule-breakers', 'content' => 'Five common traits among rule-breakers'],
                            ['val' => 'iii', 'text' => 'Comparison between criminals and traditional businessmen', 'content' => 'Comparison between criminals and traditional businessmen'],
                            ['val' => 'iv', 'text' => 'Can drug baron\'s escape teach legitimate corporations?', 'content' => 'Can drug baron\'s escape teach legitimate corporations?'],
                            ['val' => 'v', 'text' => 'Great entrepreneur', 'content' => 'Great entrepreneur'],
                            ['val' => 'vi', 'text' => 'How criminal groups deceive the law', 'content' => 'How criminal groups deceive the law'],
                            ['val' => 'vii', 'text' => 'The difference between legal and illegal organisations', 'content' => 'The difference between legal and illegal organisations'],
                            ['val' => 'viii', 'text' => 'Similarity between criminals and start-up founders', 'content' => 'Similarity between criminals and start-up founders'],
                        ];
                    @endphp

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="scroll-box">
                                <h4 class="text-center mb-3"><strong>Life lessons from villains, crooks and
                                        gangsters</strong></h4>
                                <input type="text" class="dnd-drop-input" data-question="q14" data-paragraph="A"
                                    placeholder="14" readonly
                                    style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;"
                                    value="{{ (collect($q14_pool ?? [])->firstWhere('content', $answers['q14'] ?? '')['text'] ?? '') }}">
                                <p>A notorious Mexican drug baron's audacious escape from prison in
                                    July doesn't, at first, appear to have much to teach corporate boards. But some in
                                    the business world suggest otherwise. Beyond the morally reprehensible side of
                                    criminals' work, some business gurus say organised crime syndicates, computer
                                    hackers, pirates and others operating outside the law could teach legitimate
                                    corporations a thing or two about how to hustle and respond to rapid change.</p>

                                <input type="text" class="dnd-drop-input" data-question="q15" data-paragraph="B"
                                    placeholder="15" readonly
                                    style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;"
                                    value="{{ (collect($q14_pool ?? [])->firstWhere('content', $answers['q15'] ?? '')['text'] ?? '') }}">
                                <p>Far from encouraging illegality, these gurus argue that - in the
                                    same way big corporations sometimes emulate start-ups - business leaders could learn
                                    from the underworld about flexibility, innovation and the ability to pivot quickly.
                                    "There is ruthlessness to criminal organisations that legacy corporations [with
                                    large, complex layers of management] don't have," said Marc Goodman, head of the
                                    Future Crimes Institute and global cyber-crime adviser. While traditional businesses
                                    focus on rules they have to follow, criminals look to circumvent them. "For
                                    criminals, the sky is the limit and that creates the opportunity to think much, much
                                    bigger."</p>

                                <input type="text" class="dnd-drop-input" data-question="q16" data-paragraph="C"
                                    placeholder="16" readonly
                                    style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;"
                                    value="{{ (collect($q14_pool ?? [])->firstWhere('content', $answers['q16'] ?? '')['text'] ?? '') }}">
                                <p>Joaquin Guzman, the head of the Mexican Sinaloa drug cartel, for
                                    instance, slipped out of his prison cell through a tiny hole in his shower that led
                                    to a mile-long tunnel fitted with lights and ventilation. Making a break for it
                                    required creative thinking, long-term planning and perseverance - essential skills
                                    similar to those needed to achieve success in any business.</p>

                                <input type="text" class="dnd-drop-input" data-question="q17" data-paragraph="D"
                                    placeholder="17" readonly
                                    style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;"
                                    value="{{ (collect($q14_pool ?? [])->firstWhere('content', $answers['q17'] ?? '')['text'] ?? '') }}">
                                <p>While Devin Liddell, who heads brand strategy for Seattle-based
                                    design consultancy, Teague, condemns the violence and other illegal activities, he
                                    became curious as to how criminal groups endure. Some cartels stay in business
                                    despite multiple efforts by law enforcement on both sides of the US border and
                                    millions of dollars from international agencies to shut them down. Liddell genuinely
                                    believes there's a lesson in longevity here. One strategy he underlined was how the
                                    bad guys respond to change. In order to bypass the border between Mexico and the US,
                                    for example, the Sinaloa cartel went to great lengths. It built a vast underground
                                    tunnel, hired family members as border agents and even used a catapult to circumvent
                                    a high-tech fence.</p>

                                <input type="text" class="dnd-drop-input" data-question="q18" data-paragraph="E"
                                    placeholder="18" readonly
                                    style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;"
                                    value="{{ (collect($q14_pool ?? [])->firstWhere('content', $answers['q18'] ?? '')['text'] ?? '') }}">
                                <p>By contrast, many legitimate businesses fail because they
                                    hesitate to adapt quickly to changing market winds. One high-profile example is
                                    movie and game rental company Blockbuster, which didn't keep up with the market and
                                    lost business to mail-order video rentals and streaming technologies. The brand has
                                    all but faded from view. Liddell argues the difference between the two groups is
                                    that criminal organisations often have improvisation encoded into their daily
                                    behavior, while larger companies think of innovation as a set process. "This is a
                                    leadership challenge," said Liddell. "How well companies innovate and organise is a
                                    reflection of leadership."</p>

                                <input type="text" class="dnd-drop-input" data-question="q19" data-paragraph="F"
                                    placeholder="19" readonly
                                    style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;"
                                    value="{{ (collect($q14_pool ?? [])->firstWhere('content', $answers['q19'] ?? '')['text'] ?? '') }}">
                                <p>Cash-strapped start-ups also use unorthodox strategies to
                                    problem solve and build their businesses up from scratch. This creativity and
                                    innovation is often born out of necessity, such as tight budgets. Both criminals and
                                    start-up founders "question authority, act outside the system and see new and clever
                                    ways of doing things," said Goodman. "Either they become Elon Musk or El Chapo."
                                    And, some entrepreneurs aren't even afraid to operate in legal grey areas in their
                                    effort to disrupt the marketplace. The co-founders of music streaming service
                                    Napster, for example, knowingly broke music copyright rules with their first online
                                    file sharing service, but their technology paved the way for legal innovation as
                                    regulators caught up.</p>

                                <input type="text" class="dnd-drop-input" data-question="q20" data-paragraph="G"
                                    placeholder="20" readonly
                                    style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;"
                                    value="{{ (collect($q14_pool ?? [])->firstWhere('content', $answers['q20'] ?? '')['text'] ?? '') }}">
                                <p>Goodman and others believe thinking hard about problem solving
                                    before worrying about restrictions could prevent established companies falling
                                    victim to rivals less constrained by tradition. In their book The Misfit Economy,
                                    Alexa Clay and Kyra Maya Phillips examine how individuals can apply that mindset to
                                    become more innovative and entrepreneurial within corporate structures. They studied
                                    not just violent criminals but Somali pirates, but others who break the rules in
                                    order to find creative solutions to their business problems, such as people living
                                    in the slums of Mumbai or computer hackers. They picked out five common traits among
                                    this group: the ability to hustle, pivot, provoke, hack and copycat.</p>

                                <input type="text" class="dnd-drop-input" data-question="q21" data-paragraph="H"
                                    placeholder="21" readonly
                                    style="padding:5px; width:200px; margin-bottom:5px; border:1px solid #ccc; border-radius:4px; font-size:14px; cursor:pointer; display:block;"
                                    value="{{ (collect($q14_pool ?? [])->firstWhere('content', $answers['q21'] ?? '')['text'] ?? '') }}">
                                <p>Clay gives a Saudi entrepreneur named Walid Abdul-Wahab as a
                                    prime example. Abdul-Wahab worked with Amish farmers to bring camel milk to American
                                    consumers even before US regulators approved it. Through perseverance, he eventually
                                    found a network of Amish camel milk farmers and started selling the product via
                                    social media. Now his company, Desert Farms, sells to giant mainstream retailers
                                    like Whole Foods Market. Those on the fringe don't always have the option of
                                    traditional, corporate jobs and that forces them to think more creatively about how
                                    to make a living, Clay said. They must develop grit and resilience in order to last
                                    outside the cushy confines of cubicle life. "In many cases scarcity is the mother of
                                    invention," Clay said.</p>
                            </div>
                        </div>

                        <div class="col-md-6 question_site">
                            <h3><strong>Questions 14-21</strong></h3>
                            <p><em>The text has eight sections, A-H.</em></p>
                            <p><em>Choose the correct heading for each section and move it into the gap.</em></p>

                            <div class="mt-3">
                                <p><strong>List of Headings</strong></p>
                                <div id="dnd-headings-list">
                                    @foreach($q14_pool as $heading)
                                        <div class="dnd-heading" draggable="true" data-value="{{ $heading['val'] }}"
                                            data-content="{{ $heading['content'] }}">
                                            {{ $heading['text'] }}
                                        </div>
                                    @endforeach
                                </div>
                                <div class="hidden-inputs">
                                    @for($i = 14; $i <= 21; $i++)
                                        <input type="text" name="q{{$i}}" id="q{{$i}}"
                                            value="{{ $answers['q' . $i] ?? '' }}" style="display:none;">
                                    @endfor
                                </div>
                            </div>
                            <hr>
                            <h5><strong>Questions 22-25</strong></h5>
                            <p class="small"><em>Complete the sentences below.<br>Write <strong>ONLY ONE WORD</strong>
                                    from the passage for each answer.</em></p>
                            <div class="mb-3">
                                <div> To escape from a prison, Joaquin Guzman had to use such traits
                                    as creative thinking, long-term planning and <input type="text" placeholder="22"
                                        name="q22" id="q22" value="{{ $answers['q22'] ?? '' }}" style="width: 150px;">.
                                </div>
                                <div> The Sinaloa cartel built a grand underground tunnel and even
                                    used a <input type="text" placeholder="23" name="q23" id="q23"
                                        value="{{ $answers['q23'] ?? '' }}" style="width: 150px;"> to avoid the fence.
                                </div>
                                <div> The main difference between two groups is that criminals,
                                    unlike large corporations, often have <input type="text" placeholder="24" name="q24"
                                        id="q24" value="{{ $answers['q24'] ?? '' }}" style="width: 150px;"> encoded into
                                    their daily life.</div>
                                <div> Due to being persuasive, Walid Abdul-Wahab found a <input type="text"
                                        placeholder="25" name="q25" id="q25" value="{{ $answers['q25'] ?? '' }}"
                                        style="width: 150px;"> of Amish camel milk
                                    farmers.</div>
                            </div>
                            <hr>
                            <h5><strong>Question 26</strong></h5>
                            <p class="small"><em>Choose the correct answer.</em></p>
                            <div class="accordion mt-3" id="q26_accordion">
                                @php
                                    $q_26 = [
                                        26 => [
                                            'text' => 'The main goal of this article is to:',
                                            'options' => [
                                                'A' => 'Show different ways of illegal activity',
                                                'B' => 'Give an overview of various criminals and their gangs',
                                                'C' => 'Draw a comparison between legal and illegal business, providing examples',
                                                'D' => 'Justify criminals with creative thinking'
                                            ]
                                        ]
                                    ];
                                @endphp
                                @foreach($q_26 as $i => $qData)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="q{{$i}}_heading">
                                            <div class="accordion-button collapsed" role="button" tabindex="0"
                                                data-bs-toggle="collapse" data-bs-target="#q{{$i}}_collapse"
                                                aria-expanded="false" aria-controls="q{{$i}}_collapse">
                                                <strong>{{$i}}.</strong>&nbsp;<span>{{$qData['text']}}</span>
                                            </div>
                                        </h2>
                                        <div id="q{{$i}}_collapse" class="accordion-collapse collapse"
                                            aria-labelledby="q{{$i}}_heading" data-bs-parent="#q26_accordion">
                                            <div class="accordion-body">
                                                @foreach($qData['options'] as $val => $optText)
                                                    <div class="form-check">
                                                        <input class="form-check-input mcq-sync" type="radio"
                                                            name="q{{$i}}_radio" id="q{{$i}}_{{$val}}" value="{{$val}}"
                                                            data-target="q{{$i}}" {{ ($answers['q' . $i] ?? '') == $val ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="q{{$i}}_{{$val}}">
                                                            {{ $optText }}</label>
                                                    </div>
                                                @endforeach
                                                <input type="text" name="q{{$i}}" id="q{{$i}}" style="display:none;"
                                                    value="{{ $answers['q' . $i] ?? '' }}" />
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- PART 3 -->
                <div class="tab-content" id="part3" style="margin-bottom: 100px;">
                    <div class="question_part">
                        <h4 class="mb-2">Part 3</h4>
                        <p class="mb-0">Read the text below and answer questions 27-40</p>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="scroll-box">
                                <h4 class="text-center mb-3"><strong>Britain needs strong TV industry</strong></h4>
                                <p>Comedy writer Armando Iannucci has called for an industry-wide defense of the BBC and
                                    British programme-makers. "The Thick of It" creator made his remarks in the annual
                                    Mac Taggart Lecture at the Edinburgh TV Festival.</p>
                                <p>"It's more important than ever that we have more strong, popular channels... that act
                                    as beacons, drawing audiences to the best content," he said. Speaking earlier,
                                    Culture Secretary John Whittingdale rejected suggestions that he wanted to dismantle
                                    the BBC.</p>
                                <p><strong>'Champion supporters'</strong></p>
                                <p>Iannucci co-wrote "I'm Alan Partridge", wrote the movie "In the Loop" and created and
                                    wrote the hit "HBO" and "Sky Atlantic show Veep". He delivered the 40th annual Mac
                                    Taggart Lecture, which has previously been given by Oscar winner Kevin Spacey,
                                    former BBC director general Greg Dyke, Jeremy Paxman and Rupert Murdoch. Iannucci
                                    said: "Faced with a global audience, British television needs its champion
                                    supporters."</p>
                                <p>He continued his praise for British programming by saying the global success of
                                    American TV shows had come about because they were emulating British television.
                                    "The best US shows are modelling themselves on what used to make British TV so
                                    world-beating," he said. "US prime-time schedules are now littered with those quirky
                                    formats from the UK - the "Who Do You Think You Are?''s and the variants on
                                    "Strictly Come Dancing" - as well as the single-camera non-audience sitcom, which we
                                    brought into the mainstream first. We have changed international viewing for the
                                    better."</p>
                                <p>With the renewal of the BBC's royal charter approaching, Iannucci also praised the
                                    corporation. He said: "If public service broadcasting - one of the best things we've
                                    ever done creatively as a country - if it was a car industry, our ministers would be
                                    out championing it overseas, trying to win contracts, boasting of the British jobs
                                    that would bring." In July, the government issued a green paper setting out issues
                                    that will be explored during negotiations over the future of the BBC, including the
                                    broadcaster's size, its funding and governance.</p>
                                <p>Primarily Mr Whittingdale wanted to appoint a panel of five people, but finally he
                                    invited two more people to advise on the charter renewal, namely former Channel 4
                                    boss Dawn Airey and journalism professor Stewart Purvis, a former editor-in-chief of
                                    ITN. Iannucci bemoaned the lack of "creatives" involved in the discussions. "When
                                    the media, communications and information industries make up nearly 8% our GDP,
                                    larger than the car and oil and gas industries put together, we need to be heard, as
                                    those industries are heard. But when I see the panel of experts who've been asked by
                                    the culture secretary to take a root and branch look at the BBC, I don't see anyone
                                    who is a part of that cast and crew list. I see executives, media owners, industry
                                    gurus, all talented people - but not a single person who's made a classic and
                                    enduring television show."</p>
                                <p><strong>'Don't be modest'</strong></p>
                                <p>Iannucci suggested one way of easing the strain on the license fee was "by pushing
                                    ourselves more commercially abroad". "Use the BBC's name, one of the most recognized
                                    brands in the world," he said. "And use the reputation of British television across
                                    all networks, to capitalize financially overseas. Be more aggressive in selling our
                                    shows, through advertising, through proper international subscription channels,
                                    freeing up BBC Worldwide to be fully commercial, whatever it takes."</p>
                                <p>"Frankly, don't be icky and modest about making money, let's monetize the bezeesus
                                    Mary and Joseph out of our programmes abroad so that money can come back, take some
                                    pressure off the licence fee at home and be invested in even more ambitious quality
                                    shows, that can only add to our value."</p>
                                <p>Mr Whittingdale, who was interviewed by ITV News' Alastair Stewart at the festival,
                                    said he wanted an open debate about whether the corporation should do everything it
                                    has done in the past. He said he had a slight sense that people who rushed to defend
                                    the BBC were "trying to have an argument that's never been started". "Whatever my
                                    view is, I don't determine what programmers the BBC should show," he added. "That's
                                    the job of the BBC." Mr Whittingdale said any speculation that the Conservative
                                    Party had always wanted to change the BBC due to issues such as its editorial line
                                    was "absolute nonsense".</p>
                            </div>
                        </div>

                        <div class="col-md-6 question_site">
                            <h5><strong>Questions 27-31</strong></h5>
                            <p class="small"><em>Choose <strong>TRUE</strong> if the statement agrees with the
                                    information given in the text, choose <strong>FALSE</strong> if the statement
                                    contradicts the information, or choose <strong>NOT GIVEN</strong> if there is no
                                    information on this.</em></p>
                            <div class="accordion mt-3" id="q27_31_accordion">
                                @php
                                    $q27_31 = [
                                        27 => 'Armando Iannucci expressed a need of having more popular channels.',
                                        28 => 'John Whittingdale wanted to dismantle the BBC.',
                                        29 => 'Lannucci delivered the 30th annual Mac Taggart Lecture.',
                                        30 => 'Lannucci believes that British television has contributed to the success of American TV-shows.',
                                        31 => 'There have been negotiations over the future of the BBC in July.',
                                    ];
                                @endphp
                                @foreach($q27_31 as $i => $qText)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="q{{$i}}_heading">
                                            <div class="accordion-button collapsed" role="button" tabindex="0"
                                                data-bs-toggle="collapse" data-bs-target="#q{{$i}}_collapse"
                                                aria-expanded="false" aria-controls="q{{$i}}_collapse">
                                                <strong>{{$i}}</strong>&nbsp;<span>{{$qText}}</span>
                                            </div>
                                        </h2>
                                        <div id="q{{$i}}_collapse" class="accordion-collapse collapse"
                                            aria-labelledby="q{{$i}}_heading" data-bs-parent="#q27_31_accordion">
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
                                @endforeach
                            </div>
                            <hr>
                            <h5><strong>Questions 32-35</strong></h5>
                            <p class="small"><em>Choose the correct answer.</em></p>
                            <div class="accordion mt-3" id="q32_35_accordion">
                                @php
                                    $q32_35 = [
                                        32 => [
                                            'text' => 'US prime-time schedules now include quirky formats from the UK because of:',
                                            'options' => [
                                                'A' => 'Quirky formats',
                                                'B' => 'British shows',
                                                'C' => 'Corporation',
                                                'D' => 'British programming'
                                            ]
                                        ],
                                        33 => [
                                            'text' => 'To advise on the charter renewal Mr Whittingdale appointed a panel of',
                                            'options' => [
                                                'A' => 'five people',
                                                'B' => 'two people',
                                                'C' => 'seven people',
                                                'D' => 'four people'
                                            ]
                                        ],
                                        34 => [
                                            'text' => 'Who of these people was NOT invited to the discussion concerning BBC renewal?',
                                            'options' => [
                                                'A' => 'Armando Iannucci',
                                                'B' => 'Dawn Airey',
                                                'C' => 'John Whittingdale',
                                                'D' => 'Stewart Purvis'
                                            ]
                                        ],
                                        35 => [
                                            'text' => 'There panel of experts lacks:',
                                            'options' => [
                                                'A' => 'media owners',
                                                'B' => 'people who make enduring TV-shows',
                                                'C' => 'gurus of Television industry',
                                                'D' => 'top executives'
                                            ]
                                        ]
                                    ];
                                @endphp
                                @foreach($q32_35 as $i => $qData)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="q{{$i}}_heading">
                                            <div class="accordion-button collapsed" role="button" tabindex="0"
                                                data-bs-toggle="collapse" data-bs-target="#q{{$i}}_collapse"
                                                aria-expanded="false" aria-controls="q{{$i}}_collapse">
                                                <strong>{{$i}}</strong>&nbsp;<span>{{$qData['text']}}</span>
                                            </div>
                                        </h2>
                                        <div id="q{{$i}}_collapse" class="accordion-collapse collapse"
                                            aria-labelledby="q{{$i}}_heading" data-bs-parent="#q32_35_accordion">
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
                            <h5><strong>Questions 36-40</strong></h5>
                            <p class="small"><em>Complete the summary below.<br>Write <strong>NO MORE THAN TWO
                                        WORDS</strong> from the passage for each answer.</em></p>
                            <div class="mb-3">
                                <p><strong>Easing the strain on the license fees</strong><br>
                                    Lannucci recommended increasing BBC's profit by pushing ourselves more
                                    <input type="text" placeholder="36" name="q36" id="q36"
                                        value="{{ $answers['q36'] ?? '' }}" style="width: 100px;">. He suggests being
                                    more aggressive in selling British shows, through advertising and proper
                                    international <input type="text" placeholder="37" name="q37"
                                        id="q37" value="{{ $answers['q37'] ?? '' }}" style="width: 100px;">. Also, he
                                    invokes producers to stop being <input type="text"
                                        placeholder="38" name="q38" id="q38" value="{{ $answers['q38'] ?? '' }}"
                                        style="width: 100px;"> and modest about making money and invest into even
                                     <input type="text" placeholder="39" name="q39" id="q39"
                                        value="{{ $answers['q39'] ?? '' }}" style="width: 100px;"> quality shows.
                                    However, Mr Whittingdale denied any  <input type="text" placeholder="40"
                                        name="q40" id="q40" value="{{ $answers['q40'] ?? '' }}" style="width: 100px;">
                                    that the Conservative Party had always wanted to change the BBC because of its
                                    editorial line.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Navigation -->
            <div class="fixed-bottom d-flex justify-content-end mb-5 px-5"
                style="gap: 5px; z-index: 2050 !important; pointer-events: none;">
                <button id="prev-question" type="button" class="btn btn-dark"
                    style="font-size: 1.5rem; pointer-events: auto; box-shadow: 0 4px 12px rgba(0,0,0,0.2);"><span
                        class="material-icons-outlined">arrow_back</span></button>
                <button id="next-question" type="button" class="btn btn-dark"
                    style="font-size: 1.5rem; pointer-events: auto; box-shadow: 0 4px 12px rgba(0,0,0,0.2);"><span
                        class="material-icons-outlined">arrow_forward</span></button>
            </div>
            <div class="fixed-bottom px-5" style="bottom: 10px; background: #fff; padding-top: 5px;">
                <div class="container-fluid d-flex justify-content-between align-items-center">
                    <div class="tabs mb-0" style="gap: 15px; width: 100%;">
                        <div class="tab active" data-tab="part1">
                            <span class="tab-title">Part 1</span>
                            <div class="question-links">
                                @for ($i = 1; $i <= 13; $i++)
                                    <a href="#" class="question-link" data-question="q{{$i}}">{{$i}}</a>
                                @endfor
                            </div>
                            <span class="question-placeholder">1 of 13</span>
                        </div>
                        <div class="tab" data-tab="part2">
                            <span class="tab-title">Part 2</span>
                            <div class="question-links">
                                @for ($i = 14; $i <= 26; $i++)
                                    <a href="#" class="question-link" data-question="q{{$i}}">{{$i}}</a>
                                @endfor
                            </div>
                            <span class="question-placeholder">14 of 26</span>
                        </div>
                        <div class="tab" data-tab="part3">
                            <span class="tab-title">Part 3</span>
                            <div class="question-links">
                                @for ($i = 27; $i <= 40; $i++)
                                    <a href="#" class="question-link" data-question="q{{$i}}">{{$i}}</a>
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
                // If the input is inside an accordion, expand it
                const accordionCollapse = inputField.closest('.accordion-collapse');
                if (accordionCollapse) {
                    const bsCollapse = bootstrap.Collapse.getOrCreateInstance(accordionCollapse);
                    bsCollapse.show();
                }

                // If Question 26 or any accordion-based MCQ, scroll to the header
                const scrollContainer = inputField.closest('.question_site');
                const scrollTarget = inputField.closest('.accordion-item') || inputField;

                if (scrollContainer && scrollTarget) {
                    const containerRect = scrollContainer.getBoundingClientRect();
                    const targetRect = scrollTarget.getBoundingClientRect();
                    const relativeTop = targetRect.top - containerRect.top + scrollContainer.scrollTop;

                    scrollContainer.scrollTo({
                        top: relativeTop - (containerRect.height / 2) + (targetRect.height / 2),
                        behavior: 'smooth'
                    });
                } else if (scrollTarget) {
                    scrollTarget.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                }
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

        // Accordion → nav panel sync (Q1-8)
        document.querySelectorAll('#q1_8_accordion .accordion-button').forEach(button => {
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

        // Accordion → nav panel sync (Q27-31)
        document.querySelectorAll('#q27_31_accordion .accordion-button').forEach(button => {
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

        // Accordion → nav panel sync (Q26)
        document.querySelectorAll('#q26_accordion .accordion-button').forEach(button => {
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

        // Accordion → nav panel sync (Q32-35)
        document.querySelectorAll('#q32_35_accordion .accordion-button').forEach(button => {
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

        // Sync radio buttons with hidden text inputs (mcq-sync)
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

        // ===== Drag and Drop Functionality - Questions 14-21 =====
        var dndDraggedEl = null;
        var dndGhost = null;
        var dndSourceInput = null;

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
            var text = headingEl.textContent.trim();
            var qName = dropInput.getAttribute('data-question');

            // If input already has a value, restore old heading
            var oldVal = dropInput.getAttribute('data-placed-value');
            if (oldVal) {
                var oldH = document.querySelector('.dnd-heading[data-value="' + oldVal + '"]');
                if (oldH) {
                    oldH.classList.remove('used');
                    oldH.style.display = 'block';
                }
            }

            dropInput.value = text;
            dropInput.setAttribute('data-placed-value', val);
            var tw = measureTextWidth(text, window.getComputedStyle(dropInput).font);
            dropInput.style.width = (tw + 30) + 'px';
            dropInput.style.border = 'none';
            dropInput.style.boxShadow = '0 2px 8px rgba(0,0,0,0.15)';

            headingEl.classList.add('used');
            headingEl.style.display = 'none';

            var hidden = document.getElementById(qName);
            if (hidden) {
                hidden.value = content;
                hidden.dispatchEvent(new Event('input', { bubbles: true }));
                hidden.dispatchEvent(new Event('change', { bubbles: true }));
            }

            var qNum = String(qName).replace(/^q/i, '');
            const linkIndex = allLinks.findIndex(link => link.getAttribute('data-question') === qName);
            if (linkIndex !== -1) {
                currentIndex = linkIndex;
                allLinks.forEach(link => link.classList.remove('active'));
                allLinks[linkIndex].classList.add('active');
            }
        }

        document.querySelectorAll('.dnd-heading').forEach(function (el) {
            el.setAttribute('draggable', 'false');
            el.addEventListener('mousedown', function (e) {
                if (el.classList.contains('used')) return;
                e.preventDefault();
                dndDraggedEl = el;
                dndSourceInput = null;
                el.classList.add('dragging');

                dndGhost = document.createElement('div');
                dndGhost.className = 'dnd-ghost-follow';
                dndGhost.textContent = el.textContent.trim();
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
                dndGhost.textContent = heading.textContent.trim();
                dndGhost.style.left = e.clientX + 'px';
                dndGhost.style.top = e.clientY - 15 + 'px';
                document.body.appendChild(dndGhost);
            });

            inp.addEventListener('dblclick', function () {
                var oldVal = inp.getAttribute('data-placed-value');
                if (oldVal) {
                    var h = document.querySelector('.dnd-heading[data-value="' + oldVal + '"]');
                    if (h) {
                        h.classList.remove('used');
                        h.style.display = 'block';
                    }
                }
                inp.value = '';
                inp.removeAttribute('data-placed-value');
                inp.style.width = '200px';
                inp.style.border = '1px solid #ccc';
                inp.style.boxShadow = 'none';
                var qName = inp.getAttribute('data-question');
                var hidden = document.getElementById(qName);
                if (hidden) {
                    hidden.value = '';
                    hidden.dispatchEvent(new Event('input', { bubbles: true }));
                    hidden.dispatchEvent(new Event('change', { bubbles: true }));
                }
            });
        });

        document.addEventListener('mousemove', function (e) {
            if (!dndGhost) return;
            dndGhost.style.left = e.clientX + 'px';
            dndGhost.style.top = e.clientY - 15 + 'px';

            document.querySelectorAll('.dnd-drop-input').forEach(function (inp) {
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

        document.addEventListener('mouseup', function (e) {
            if (!dndDraggedEl || !dndGhost) return;

            if (dndGhost.parentNode) dndGhost.parentNode.removeChild(dndGhost);
            dndGhost = null;

            var droppedOnInput = false;
            document.querySelectorAll('.dnd-drop-input').forEach(function (inp) {
                inp.style.borderColor = '#cbd5e0';
                inp.style.background = '#fff';
                var rect = inp.getBoundingClientRect();
                if (e.clientX >= rect.left && e.clientX <= rect.right && e.clientY >= rect.top && e.clientY <= rect.bottom) {
                    if (dndSourceInput && dndSourceInput !== inp) {
                        dndSourceInput.value = '';
                        dndSourceInput.removeAttribute('data-placed-value');
                        dndSourceInput.style.width = '200px';
                        var srcQ = dndSourceInput.getAttribute('data-question');
                        var srcHidden = document.getElementById(srcQ);
                        if (srcHidden) {
                            srcHidden.value = '';
                            srcHidden.dispatchEvent(new Event('change', { bubbles: true }));
                        }
                    } else if (dndSourceInput && dndSourceInput === inp) {
                        dndDraggedEl.classList.remove('dragging');
                        dndDraggedEl = null;
                        dndSourceInput = null;
                        return;
                    }
                    dndDraggedEl.classList.remove('used');
                    dndDraggedEl.style.display = 'block';
                    dndPlaceHeading(inp, dndDraggedEl);
                    droppedOnInput = true;
                }
            });

            if (!droppedOnInput && dndSourceInput) {
                dndDraggedEl.classList.remove('used');
                dndDraggedEl.style.display = 'block';
                dndSourceInput.value = '';
                dndSourceInput.removeAttribute('data-placed-value');
                dndSourceInput.style.width = '200px';
                var srcQ = dndSourceInput.getAttribute('data-question');
                var srcHidden = document.getElementById(srcQ);
                if (srcHidden) {
                    srcHidden.value = '';
                    srcHidden.dispatchEvent(new Event('change', { bubbles: true }));
                }
            }

            if (dndDraggedEl) dndDraggedEl.classList.remove('dragging');
            dndDraggedEl = null;
            dndSourceInput = null;
        });

        // Initial matching for saved values
        document.addEventListener('DOMContentLoaded', function () {
            for (let i = 14; i <= 21; i++) {
                const qName = 'q' + i;
                const hidden = document.getElementById(qName);
                if (hidden && hidden.value) {
                    const savedContent = hidden.value.trim();
                    const heading = document.querySelector('.dnd-heading[data-content="' + savedContent + '"]');
                    const dropInput = document.querySelector('.dnd-drop-input[data-question="' + qName + '"]');
                    if (heading && dropInput) {
                        dndPlaceHeading(dropInput, heading);
                    }
                }
            }
        });

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