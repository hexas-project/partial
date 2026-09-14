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

        .tab-title {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 5px;
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
            border: 2px solid gray;
            border-radius: 4px;
        }

        .question-link {
            text-decoration: none;
            color: gray;
        }

        .question-link.active {
            border: 2px solid gray;
            width: 25px;
            background-color: transparent !important;
            border-radius: 4px;
        }

        .question-link.answered {
            color: #333;
        }

        input[type="text"]:focus {
            outline: none;
            border: none;
            border-bottom: 1px dotted #000;
        }

        input[type="text"]:focus::placeholder {
            color: transparent;
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

        /* accordion styles */
        .accordion-button::after { display: none; }
        .accordion-item { border: none; margin-bottom: 6px; }
        .accordion-button,
        .accordion-button.collapsed { box-shadow: none; background-color: #dbeafe; color: #1e3a5f; border: 1px solid #93c5fd; border-radius: 6px; }
        .accordion-button:not(.collapsed) { border-bottom-left-radius: 0; border-bottom-right-radius: 0; }
        .accordion-button:focus { box-shadow: none; }
        .accordion-body { border: none !important; padding-top: 10px; }

        .modal-backdrop.show { opacity: 0.85; backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); }
        #startModal .modal-dialog { max-width: 450px; }
        #startModal .modal-content { border-radius: 12px; border: none; box-shadow: 0 10px 40px rgba(0,0,0,0.15); }
        #startModal .modal-header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border-radius: 12px 12px 0 0; padding: 18px 25px; border: none; }
        #startModal .modal-title { font-size: 20px; font-weight: 600; display: flex; align-items: center; gap: 10px; }
        #startModal .modal-title::before { content: "📖"; font-size: 24px; }
        #startModal .modal-body { padding: 25px; background: #f8f9fa; }
        #startModal .instruction-text { color: #555; font-size: 14px; line-height: 1.5; margin-bottom: 18px; text-align: center; }
        #startModal .form-group { background: white; padding: 16px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); }
        #startModal .form-label { font-weight: 600; color: #333; margin-bottom: 10px; display: flex; align-items: center; gap: 8px; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px; }
        #startModal .form-label::before { content: "👤"; font-size: 18px; }
        #startModal #studentIdInput { padding: 14px 16px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 16px; transition: all 0.3s; width: 100%; }
        #startModal #studentIdInput:focus { border-color: #667eea; box-shadow: 0 0 0 3px rgba(102,126,234,0.1); outline: none; }
        #startModal #studentIdError { color: #dc3545; font-size: 13px; margin-top: 8px; display: none; font-weight: 500; }
        #startModal .modal-footer { padding: 16px 25px; border: none; background: white; border-radius: 0 0 12px 12px; justify-content: center; }
        #startModal #startTestButton { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none; padding: 12px 40px; font-size: 15px; font-weight: 600; border-radius: 8px; transition: all 0.3s; box-shadow: 0 4px 15px rgba(102,126,234,0.3); text-transform: uppercase; letter-spacing: 1px; }
        #startModal #startTestButton:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(102,126,234,0.4); }

        /* Options List Style */
        .options-list-table {
            border-collapse: collapse;
            width: fit-content;
            margin-bottom: 20px;
        }
        .options-list-table td {
            border: 1px solid #dee2e6;
            padding: 4px 12px;
            font-size: 14px;
        }
        .options-list-table .opt-label {
            font-weight: bold;
            background-color: #f8f9fa;
            width: 40px;
            text-align: center;
        }

        /* Matching Grid styles */
        .matching-grid {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #dee2e6;
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
            width: 50px;
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
    </style>
</head>

<body>
    <form action="{{ route('reading.submit') }}" method="POST" id="testForm" spellcheck="false" autocomplete="off">
        @csrf
        <input type="hidden" name="test_name" value="{{ $testName ?? 'class08_reading' }}">
        <input type="hidden" name="student_id" value="{{ auth()->id() ?? session('student_batch_id') }}">
        <input type="hidden" name="exam_student_id" id="examStudentIdField" value="{{ session('exam_student_id', '') }}">
        <input type="hidden" name="assignment_id" value="{{ $assignmentId ?? '' }}">

        <!-- Sidebar -->
        <div id="sidebar" class="sidebar">
            <div class="sidebar-header" style="background: #f8f9fa; border-bottom: 1px solid #ddd; padding: 10px 15px; display: flex; justify-content: space-between; align-items: center;">
                <h5 style="margin: 0; font-weight: bold; font-size: 16px;">Notes & Highlights</h5>
                <span class="close-btn" style="cursor: pointer; font-size: 24px; line-height: 1; color: #666;">&times;</span>
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
                            <span id="noteToggle" class="material-icons-outlined" style="cursor: pointer;">note_alt</span>
                        </li>
                    </ul>
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
                <div id="allClear" style="padding: 5px; cursor: pointer;">🗑️ Clear all</div>
            </div>

            <div class="container-fluid px-5 mt-4">
                <!-- ===================== PART 1 ===================== -->
                <div class="tab-content active" id="part1" style="margin-bottom: 100px;">
                    <div class="question_part">
                        <h4 class="mb-2">Part 1</h4>
                        <p class="mb-0">Read the text below and answer questions 1-14</p>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="scroll-box">
                                <h4 class="text-center mb-4"><strong>How bacteria invented gene editing</strong></h4>
                                <p>This week the UK Human Fertilization and Embryology Authority Okayed a proposal to modify human embryos through gene editing. The research, which will be carried out at the Francis Crick Institute in London, should improve our understanding of human development. It will also undoubtedly attract controversy - particularly with claims that manipulating embryonic genomes is a first step towards designer babies. Those concerns shouldn't be ignored. After all, gene editing of the kind that will soon be undertaken at the Francis Crick Institute doesn't occur naturally in humans or other animals.</p>
                                <p>It is, however, a lot more common in nature than you might think, and it's been going on for a surprisingly long time - revelations that have challenged what biologists thought they knew about the way evolution works. We're talking here about one particular gene editing technique called CRISPR-Cas, or just CRISPR. It's relatively fast, cheap and easy to edit genes with CRISPR - factors that explain why the technique has exploded in popularity in the last few years. But CRISPR wasn't dreamed up from scratch in a laboratory. This gene editing tool actually evolved in single-celled microbes.</p>
                                <p>CRISPR went unnoticed by biologists for decades. It was only at the tail end of the 1980s that researchers studying Escherichia coli noticed that there were some odd repetitive sequences at the end of one of the bacterial genes. Later, these sequences would be named Clustered Regularly Interspaced Short Palindromic Repeats - CRISPRs. For several years the significance of these CRISPRs was a mystery, even when researchers noticed that they were always separated from one another by equally odd 'spacer' gene sequences.</p>
                                <p>Then, a little over a decade ago, scientists made an important discovery. Those 'spacer' sequences look odd because they aren't bacterial in origin. Many are actually snippets of DNA from viruses that are known to attack bacteria. In 2005, three research groups independently reached the same conclusion: CRISPR and its associated genetic sequences were acting as a bacterial immune system. In simple terms, this is how it works. A bacterial cell generates special proteins from genes associated with the CRISPR repeats (these are called CRISPR associated - Cas - proteins). If a virus invades the cell, these Cas proteins bind to the viral DNA and help cut out a chunk. Then, that chunk of viral DNA gets carried back to the bacterial cell's genome where it is inserted - becoming a spacer. From now on, the bacterial cell can use the spacer to recognize that particular virus and attack it more effectively.</p>
                                <p>These findings were a revelation. Geneticists quickly realized that the CRISPR system effectively involves microbes deliberately editing their own genomes - suggesting the system could form the basis of a brand new type of genetic engineering technology. They worked out the mechanics of the CRISPR system and got it working in their lab experiments. It was a breakthrough that paved the way for this week's announcement by the HFEA. Exactly who took the key steps to turn CRISPR into a useful genetic tool is, however, the subject of a huge controversy. Perhaps that's inevitable - credit for developing CRISPR gene editing will probably guarantee both scientific fame and financial wealth.</p>
                                <p>Beyond these very important practical applications, though, there's another CRISPR story. It's the account of how the discovery of CRISPR has influenced evolutionary biology. Sometimes overlooked is the fact that it wasn't just geneticists who were excited by CRISPR's discovery - so too were biologists. CRISPR was evidence of a completely unexpected parallel between the way humans and bacteria fight infections. We've known for a long time that part of our immune system "learns" about the pathogens it has seen before so it can adapt and fight infections better in future. Vertebrate animals were thought to be the only organisms with such a sophisticated adaptive immune system. In light of the discovery of CRISPR, it seemed some bacteria had their own version. In fact, it turned out that lots of bacteria have their own version. At the last count, the CRISPR adaptive immune system was estimated to be present in about 40% of bacteria. Among the other major group of single-celled microbes - the Archaea - CRISPR is even more common. It's seen in about 90% of them. If it's that common today, CRISPR must have a history stretching back over millions - possibly even billions - of years. "It's clearly been around for a while," says Darren Griffin at the University of Kent.</p>
                                <p>The animal adaptive immune system, then, isn't nearly as unique as we thought. And there's one feature of CRISPR that makes it arguably even better than our adaptive immune system: CRISPR is heritable. When we are infected by a pathogen, our adaptive immune system learns from the experience, making our next encounter with that pathogen less of an ordeal. This is why vaccination is so effective: it involves priming us with a weakened version of a pathogen to train our adaptive immune system. Your children, though, won't benefit from the wealth of experience locked away in your adaptive immune system. They have to experience an infection - or be vaccinated - first hand before they can learn to deal with a given pathogen.</p>
                                <p>CRISPR is different. When a microbe with CRISPR is attacked by a virus, the record of the encounter is hardwired into the microbe's DNA as a new spacer. This is then automatically passed on when the cell divides into daughter cells, which means those daughter cells know how to fight the virus even before they've seen it. We don't know for sure why the CRISPR adaptive immune system works in a way that seems, at least superficially, superior to ours. But perhaps our biological complexity is the problem, says Griffin. "In complex organisms any minor [genetic] changes cause profound effects on the organism," he says. Microbes might be sturdy enough to constantly edit their genomes during their lives and cope with the consequences - but animals probably aren't. The discovery of this heritable immune system was, however, a biologically astonishing one. It means that some microbes write their lifetime experiences of their environment into their genome and then pass the information to their offspring - and that is something that evolutionary biologists did not think happened.</p>
                                <p>Darwin's theory of evolution is based on the idea that natural selection acts on the naturally occurring random variation in a population. Some organisms are better adapted to the environment than others, and more likely to survive and reproduce, but this is largely because they just happened to be born that way. But before Darwin, other scientists had suggested different mechanisms through which evolution might work. One of the most famous ideas was proposed by a French scientist called Jean-Baptiste Lamarck. He thought organisms actually changed during their life, acquiring useful new adaptations non-randomly in response to their environmental experiences. They then passed on these changes to their offspring.</p>
                                <p>People often use giraffes to illustrate Lamarck's hypothesis. The idea is that even deep in prehistory, the giraffe's ancestor had a penchant for leaves at the top of trees. This early giraffe had a relatively short neck, but during its life it spent so much time stretching to reach leaves that its neck lengthened slightly. The crucial point, said Lamarck, was that this slightly longer neck was somehow inherited by the giraffe's offspring. These giraffes also stretched to reach high leaves during their lives, meaning their necks lengthened just a little bit more, and so on. Once Darwin's ideas gained traction, Lamarck's ideas became deeply unpopular. But the CRISPR immune system - in which specific lifetime experiences of the environment are passed on to the next generation - is one of a tiny handful of natural phenomena that arguably obeys Lamarckian principles.</p>
                                <p>"The realization that Lamarckian type of evolution does occur and is common enough, was as startling to biologists as it seems to a layperson," says Eugene Konini at the National Institutes of Health in Bethesda, Maryland, who explored the idea with his colleagues in 2009, and does so again in a paper due to be published later this year. This isn't to say that all of Lamarck's thoughts on evolution are back in vogue. "Lamarck had additional ideas that were important to him, such as the inherent drive to perfection that to him was a key feature of evolution," says Konini. No modern evolutionary biologist goes along with that idea. But the discovery of the CRISPR system still implies that evolution isn't purely the result of Darwinian random natural selection. It can sometimes involve elements of non-random Lamarckism too - a "continuum", as Konini puts it. In other words, the CRISPR story has had a profound scientific impact far beyond the doors of the genetic engineering lab. It truly was a transformative discovery.</p>
                            </div>
                        </div>

                        <div class="col-md-6 question_site">
                            <h5><strong>Questions 1-5</strong></h5>
                            <p class="small"><em>"Choose <strong>TRUE</strong> if the statement agrees with the information given in the text, choose <strong>FALSE</strong> if the statement contradicts the information, or choose<strong> NOT GIVEN</strong> if there is no information on this."</em></p>
                            

                            <div class="accordion mt-3" id="q1_5_accordion">
                                @php
                                    $q1_5 = [
                                        1 => 'The research carried out at the Francis Crick Institute in London is likely to be controversial.',
                                        2 => 'Gene editing, like the one in the upcoming research, can happen naturally in humans or other animals.',
                                        3 => 'CRISPR-Cas is a gene editing technique.',
                                        4 => 'CRISPR was noticed when the researchers saw some odd repetitive sequences at the ends of all bacterial genes.',
                                        5 => 'A group of American researchers made an important revelation about the CRISPR.',
                                    ];
                                @endphp
                                @foreach($q1_5 as $i => $qText)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="q{{$i}}_heading">
                                        <div class="accordion-button collapsed" role="button" tabindex="0" data-bs-toggle="collapse"
                                            data-bs-target="#q{{$i}}_collapse" aria-expanded="false" aria-controls="q{{$i}}_collapse">
                                            <strong id="question-{{$i}}-number" class="question-number">{{$i}}</strong>&nbsp;<span>{{$qText}}</span>
                                        </div>
                                    </h2>
                                    <div id="q{{$i}}_collapse" class="accordion-collapse collapse" aria-labelledby="q{{$i}}_heading"
                                        data-bs-parent="#q1_5_accordion">
                                        <div class="accordion-body">
                                            <div class="form-check"><input class="form-check-input mcq-sync" type="radio" name="q{{$i}}_radio" id="q{{$i}}_TRUE" value="TRUE" data-target="q{{$i}}" {{ ($answers['q'.$i] ?? '') == 'TRUE' ? 'checked' : '' }}><label class="form-check-label" for="q{{$i}}_TRUE">TRUE</label></div>
                                            <div class="form-check"><input class="form-check-input mcq-sync" type="radio" name="q{{$i}}_radio" id="q{{$i}}_FALSE" value="FALSE" data-target="q{{$i}}" {{ ($answers['q'.$i] ?? '') == 'FALSE' ? 'checked' : '' }}><label class="form-check-label" for="q{{$i}}_FALSE">FALSE</label></div>
                                            <div class="form-check"><input class="form-check-input mcq-sync" type="radio" name="q{{$i}}_radio" id="q{{$i}}_NG" value="NOT GIVEN" data-target="q{{$i}}" {{ ($answers['q'.$i] ?? '') == 'NOT GIVEN' ? 'checked' : '' }}><label class="form-check-label" for="q{{$i}}_NG">NOT GIVEN</label></div>
                                            <input type="text" name="q{{$i}}" id="q{{$i}}" style="display:none;" value="{{ $answers['q'.$i] ?? '' }}" />
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <hr>

                            <h5><strong>Questions 6-9</strong></h5>
                            <p class="small"><em>Choose the correct answers.</em></p>
                                       <div class="accordion mt-3" id="q6_9_accordion">
                                @php
                                    $q6_9 = [
                                        6 => [
                                            'text' => "'Spacer' sequences look odd because:",
                                            'options' => [
                                                'A' => 'they are a bacterial immune system',
                                                'B' => 'they are DNA from viruses',
                                                'C' => "they aren't bacterial in origin",
                                                'D' => 'all of the above'
                                            ]
                                        ],
                                        7 => [
                                            'text' => "The ones, who were excited about the CRISPR's discovery, were:",
                                            'options' => [
                                                'A' => 'biologists',
                                                'B' => 'geneticists',
                                                'C' => 'physicists',
                                                'D' => 'A and B'
                                            ]
                                        ],
                                        8 => [
                                            'text' => 'Word "learns" in the line 44, 6th paragraph means:',
                                            'options' => [
                                                'A' => 'determines',
                                                'B' => 'gains awareness',
                                                'C' => 'adapts',
                                                'D' => 'studies'
                                            ]
                                        ],
                                        9 => [
                                            'text' => 'What makes CRISPR better than even our adaptive immune system?',
                                            'options' => [
                                                'A' => 'a long history of existence',
                                                'B' => 'immortality',
                                                'C' => 'heritability',
                                                'D' => 'adaptiveness'
                                            ]
                                        ],
                                    ];
                                @endphp
                                @foreach($q6_9 as $i => $qData)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="q{{$i}}_heading">
                                        <div class="accordion-button collapsed" role="button" tabindex="0" data-bs-toggle="collapse"
                                            data-bs-target="#q{{$i}}_collapse" aria-expanded="false" aria-controls="q{{$i}}_collapse">
                                            <strong id="question-{{$i}}-number" class="question-number">{{$i}}</strong>&nbsp;<span>{{$qData['text']}}</span>
                                        </div>
                                    </h2>
                                    <div id="q{{$i}}_collapse" class="accordion-collapse collapse" aria-labelledby="q{{$i}}_heading"
                                        data-bs-parent="#q6_9_accordion">
                                        <div class="accordion-body">
                                            @foreach($qData['options'] as $val => $optText)
                                            <div class="form-check">
                                                <input class="form-check-input mcq-sync" type="radio" name="q{{$i}}_radio" id="q{{$i}}_{{$val}}" value="{{$val}}" data-target="q{{$i}}" {{ ($answers['q'.$i] ?? '') == $val ? 'checked' : '' }}>
                                                <label class="form-check-label" for="q{{$i}}_{{$val}}">{{ $optText }}</label>
                                            </div>
                                            @endforeach
                                            <input type="text" name="q{{$i}}" id="q{{$i}}" style="display:none;" value="{{ $answers['q'.$i] ?? '' }}" />
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <hr>

                            <h5><strong>Questions 10-14</strong></h5>
                            <p class="small"><em>Complete the sentences below. Write <strong>NO MORE THAN TWO WORDS</strong> from the passage for each answer.</em></p>
                            <div class="mb-3">
                                <p><strong id="question-10-number" class="question-number"></strong> Vaccination is so effective, because it involves <input type="text" name="q10" id="q10" placeholder="10" value="{{ $answers['q10'] ?? '' }}" style="width: 100px;"> with a weakened version of a pathogen .</p>
                                <p><strong id="question-11-number" class="question-number"></strong> CRISPR adaptive immune system works in a way that seems, at least superficially, superior to ours. But perhaps our <input type="text" name="q11" id="q11" placeholder="11" value="{{ $answers['q11'] ?? '' }}" style="width: 100px;"> is the problem, according to Griffin.</p>
                                <p><strong id="question-12-number" class="question-number"></strong> Some microbes write their experience into the genome and pass the information to their <input type="text" name="q12" id="q12" placeholder="12" value="{{ $answers['q12'] ?? '' }}" style="width: 100px;"></p>
                                <p><strong id="question-13-number" class="question-number"></strong> Before Darwin, one of the most famous idea was proposed by a <input type="text" name="q13" id="q13" placeholder="13" value="{{ $answers['q13'] ?? '' }}" style="width: 100px;"> scientist, Lamarck.</p>
                                <p><strong id="question-14-number" class="question-number"></strong> <input type="text" name="q14" id="q14" placeholder="14" value="{{ $answers['q14'] ?? '' }}" style="width: 100px;"> are often used to demonstrate Lamarck's hypothesis.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-content" id="part2" style="margin-bottom: 100px;">
                    <div class="question_part">
                        <h4 class="mb-2">Part 2</h4>
                        <p class="mb-0">Read the text below and answer questions 15-27</p>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="scroll-box">
                                <h4 class="text-center mb-4"><strong>Museum of Lost Objects: The Lion of al-Lat</strong></h4>
                                <p><strong>(A)</strong> Two thousand years ago a statue of a lion watched over a temple in the ancient Syrian city of Palmyra. More recently, after being excavated in the 1970s, it became an emblem of the city and a favorite with tourists. But it was one of the first things destroyed during military fighting's in the country. It's said that there are more than 300 words for lion in Arabic. That's a measure of the importance of the lion in the history of the Middle East. For Bedouin tribes, the lion represented the biggest danger in the wild - until the last one in the region died, some time in the 19th Century.</p>
                                <p><strong>(B)</strong> The animal was feared and admired and this must explain why a statue of a lion twice as high as a human being, weighing 15 tones, was fashioned by artists in ancient Palmyra. With spiraling, somewhat loopy eyes, and thick whiskers swept back angrily along its cheek bones, the lion was clearly a fighter, but it was also a lover. In between its legs, it held a horned antelope. The antelope stretched a delicate hoof over the lion's monstrous paws, and perhaps it was safe. The lion was a symbol of protection - it was both marking and protecting the entrance to the temple. But no-one could protect the lion when *IS arrived and wrecked it in May 2015. "It was a real shock, because you know, in a way, it was our lion," says Polish archaeologist Michal Gawlikowski, whose team unearthed it in 1977.</p>
                                <p><strong>(C)</strong> For well over 1,000 years, the statue had lain buried in the ruins of the ancient city, though parts had been used as foundations stones in other buildings. "You could hardly see what it was. I could see it was a sculpture and an old one for Palmyra, so we decided it was necessary to put it together immediately. It wasn't apparent from the beginning what this was - and then we found the head, and it became obvious."</p>
                                <p><strong>(D)</strong> Here are 30 of the approximately 300 Arabic words for "lion": Ghazhanfar, haidera, laith, malik al-ghaab (king of the jungle), qasha'am, asumsum, hatam, abu libdeh, Hama, zebras, Basel, jasaas, assad, shujaa, rihab, seba'a, mayyas, khunafis, aabas, aafras, abu firas, qaswarah, ward, raheeb, ghadi, abu hearth, dirham, hammam, usama, jaifer, qasqas... Most describe different moods of the lion. For example, hatam the destroyer, rehab the fearsome, ghazhanfar the warrior, abu libdeh the one with the fur, or the mane. As luck would have it, Michal had on his team that year the sculptor Josef Gauzy, who enthusiastically took on the job of restoring the lion. By 2005, though, the lion had become unbalanced and another restoration job - again led by a Polish team - rebuilt the statue to resemble as closely as possible what is thought to be the ancient design, with the lion appearing to leap out of the temple wall. After this it was placed in front of the Palmyra museum.</p>
                                <p><strong>(E)</strong> Across the left paw of the lion is a Palmyrene inscription: "May al-Lat bless whoever does not spill blood on this sanctuary." The goddess al-Lat was a pre-Islamic female deity popular throughout Arabia, the descendant of earlier Mesopotamian goddesses such as Ishtar Inanna. "Ishtar Inanna is goddess of warfare and also love and sex, particularly sex outside marriage," says Augusta McMahon, lecturer of archaeology at Cambridge University. Al-Lat shared most of these attributes, and like Ishtar Inanna she was associated with lions. "It's very interesting to find a lion and a female figure in such close association, and no male deities have the lion - so this is something which is unique to her," says McMahon.</p>
                                <p><strong>(F)</strong> The region's kings, however, were keen to be associated with lions, even if male deities weren't. Some of the earliest known representations of Mesopotamian leaders, from around 3,500 BC, depict them engaged in combat with the creatures. "They're not shown fighting or killing other people because that's almost demeaning," says Augusta McMahon. "They have to have a lion who is the not-quite-equal-but-near rival - because they're incredibly powerful and sort of unpredictable." This tradition continues right up to the medieval and early modern period, when Islamic miniatures would often show scenes of the hunt, of brave princes struggling with lions. The lion was both regal and untamable, the quintessence of strength and man's ultimate opponent. And today, fathers still love to name their sons and heirs after this fearsome predator - Osama for example.</p>
                                <p><strong>(G)</strong> The family of Syria's current ruling dynasty went even further. Al-Assad means "the lion" and different stories are told about how, a few generations ago, they adopted this name. One version says that Suleiman, great-grandfather of current president Basher al-Assad, had been given the name al-Whish, or "the wild beast", because of his exploits while waging war on the Ottomans. This had negative connotations, though - so Suleiman swapped al-Whish for al-Assad "the lion". In neighboring Iraq, Saddam Hussein even more directly channeled the rulers of times gone by. Some of his fanciful propaganda - often seen in newspapers or even city billboards - would show him posing as an Assyrian king, trampling on lions while shooting at American missiles with a bow and arrow.</p>
                                <p><strong>(H)</strong> But Saddam didn't have full control over his lion symbolism. One of the many words referring to lion in Arabic can connote "brazenness" and "audacity", and it was this lion-word that many Iraqis applied to him. "The lion has several names and one of them is seba'a," says the Iraqi archaeologist Lamia al-Gailani. "It was considered one the worst things in the culture of the Iraqis this word seba'a because it gives license to be corrupt. When Saddam did things, people said [they were] seba'a and what he did was so wrong, so illegal, but he was able to get away with it."</p>
                                <p><strong>(I)</strong> For most people who went to Palmyra, the Lion of al-Lat provided a key photo opportunity. For London-based Syrian sculptor Zahed Tajeddin, it also provided artistic inspiration. In the early 1990s Tajeddin held an exhibition in Germany where he produced miniature sculptures of his favorite archaeological monuments from Syria - including the lion - but by 2015 all had been sold. Fatefully, though, during the week in May 2015 when IS took Palmyra and destroyed the Lion of al-Lat, he found the moulds.</p>
                                <p><strong>(J)</strong> "And I thought, OK, that's a message," he says. "And so I reproduced three and put them next to each other and I painted them in white, red and black to represent the Syrian flag." The lion was often a symbol of vanity and masculine power. It was the badge of self-aggrandizing kings and presidents. But in Tajeddin's reproductions of the lion of al-Lat, the lion becomes something else - a protest against the devastation engulfing his country and its ancient heritage.</p>
                                <p>*IS - Islamic State (of Iraq and the Levant), a terrorist organization.</p>
                            </div>
                        </div>

                        <div class="col-md-6 question_site">
                            <h5><strong>Questions 15-16</strong></h5>
                            <p class="small"><em>Complete the sentences below. Write <strong>NO MORE THAN TWO WORDS</strong> from the passage for each answer.</em></p>
                            <div class="mb-3">
                                <p><strong id="question-15-number" class="question-number"></strong> Lamarck's ideas became deeply unpopular as soon as Darwin's ideas <input type="text" name="q15" id="q15" placeholder="15" value="{{ $answers['q15'] ?? '' }}" style="width: 100px;"></p>
                                <p><strong id="question-16-number" class="question-number"></strong> No <input type="text" name="q16" id="q16" placeholder="16" value="{{ $answers['q16'] ?? '' }}" style="width: 100px;"> biologist agrees with Lamarck's idea that inherent drive to perfection is the key feature of evolution.</p>
                            </div>

                            <hr>

                            <h5><strong>Questions 17-25</strong></h5>
                            <p class="small">Reading Passage 2 has ten paragraphs, A-J. Which section contains the following information?</p>
                            <p><strong>NB:</strong> You may use any letter more than once.</p>

                            <div class="mb-3">
                                <table class="matching-grid mt-3">
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
                                            <th class="choice-cell">I</th>
                                            <th class="choice-cell">J</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $q17_25 = [
                                                17 => "Goddess, associated with lions",
                                                18 => "One of the worst words",
                                                19 => "An emblem of the city",
                                                20 => "History of the family name",
                                                21 => "Art exhibition",
                                                22 => "The description of the lion statue",
                                                23 => "Symbolic meaning of the lion's reproduction by Tajeddin",
                                                24 => "Synonyms for word lion",
                                                25 => "Representations of leaders",
                                            ];
                                        @endphp
                                        @foreach($q17_25 as $i => $qText)
                                        <tr>
                                            <td><strong id="question-{{$i}}-number" class="question-number">{{$i}}</strong> {{ $qText }}</td>
                                            @foreach(['A','B','C','D','E','F','G','H','I','J'] as $val)
                                            <td class="choice-cell tick-cell" data-row="q{{$i}}" data-value="{{$val}}"><span class="tick">✓</span></td>
                                            @endforeach
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                @foreach($q17_25 as $i => $qText)
                                <input type="hidden" name="q{{$i}}" id="q{{$i}}" value="{{ $answers['q'.$i] ?? '' }}">
                                @endforeach
                            </div>

                            <hr>

                            <h5><strong>Questions 26-27</strong></h5>
                            <p class="small"><em>Complete the sentences below. Write <strong>NO MORE THAN TWO WORDS</strong> from the passage for each answer.</em></p>
                            <div class="mb-3">
                                <p><strong id="question-26-number" class="question-number"></strong> Most words for the lion describe different <input type="text" name="q26" id="q26" placeholder="26" value="{{ $answers['q26'] ?? '' }}" style="width: 150px;"> of the animal.</p>
                                <p><strong id="question-27-number" class="question-number"></strong> You could often see <input type="text" name="q27" id="q27" placeholder="27" value="{{ $answers['q27'] ?? '' }}" style="width: 150px;"> struggling with lions in Islamic miniatures.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-content" id="part3" style="margin-bottom: 100px;">
                    <div class="question_part">
                        <h4 class="mb-2">Part 3</h4>
                        <p class="mb-0">Read the text below and answer questions 28-40</p>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="scroll-box">
                                <h4 class="text-center mb-4"><strong>The Truth About ART</strong></h4>
                                <p>Modern art has had something of a bad press recently - or, to be more precise, it has always had a bad press in certain newspapers and amongst certain sectors of the public. In the public mind, it seems, art (that is, graphic art - pictures - and spatial art - sculpture) is divided into two broad categories. The first is 'classic' art, by which is meant representational painting, drawing and sculpture; the second is 'modern' art, also known as abstract or non-representational. British popular taste runs decidedly in favor of the former, if one believes a recent survey conducted by Charlie Moore, owner of the Loft Gallery and Workshops in Kent, and one of Britain's most influential artistic commentators. He found that the man (or woman) in the street has a distrust of cubism, abstracts, sculptures made of bricks and all types of so-called 'found' art, He likes Turner and Constable, the great representatives of British watercolor and oil painting respectively, or the French Impressionists, and his taste for statues is limited to the realistic figures of the great and good that litter the British landscape - Robin Hood in Nottingham and Oliver Cromwell outside the Houses of Parliament. This everyman does not believe in primary colors, abstraction and geometry in nature - the most common comment is that such-and-such a painting is "something a child could have done".</p>
                                <p>Lewis Williams, director of the Beaconsfield Galleries in Hampshire, which specializes in modern painting, agrees. "Look around you at what art is available every day," he says. "Our great museums and galleries specialize in work which is designed to appeal to the lowest common denominator. It may be representational, it may be 'realistic' in one sense, but a lot of it wouldn't make it into the great European galleries. Britain has had maybe two or three major world painters in the last 1000 years, so we make up the space with a lot of second-rate material."</p>
                                <p>Williams believes that our ignorance of what modern art is has been caused by this lack of exposure to truly great art. He compares the experience of the average British city-dweller with that of a citizen of Italy, France or Spain. "Of course, we don't appreciate any kind of art in the same way because of the paucity of good art in Britain. We don't have galleries of the quality of those in Madrid, Paris, Versailles, Florence, New York or even some places in Russia. We distrust good art - by which I mean both modern and traditional artistic forms - because we don't have enough of it to learn about it. In other countries, people are surrounded by it from birth. Indeed they take it as a birthright, and are proud of it. The British tend to be suspicious of it. It's not valued here."</p>
                                <p>Not everyone agrees. Emily Cope, who runs the Osborne Art House, believes that while the British do not have the same history of artistic experience as many European countries, their senses are as finely attuned to art as anyone else's.</p>
                                <p>"Look at what sells - in the great art auction houses, in greetings cards, in posters. Look at what's going on in local amateur art classes up and down the country. Of course, the British are not the same as other countries, but that's true of all nationalities. The French artistic experience and outlook is not the same as the Italian. In Britain, we have artistic influences from all over the world. There's the Irish, Welsh, and Scottish influences, as well as Caribbean, African and European. We also have strong links with the Far East, in particular the Indian subcontinent. All these influences come to bear in creating a British artistic outlook. There's this tendency to say that British people only want garish pictures of clowns crying or ships sailing into battle, and that anything new or different is misunderstood. That's not my experience at all. The British public is poorly educated in art, but that's not the same as being uninterested in it."</p>
                                <p>Cope points to Britain's long tradition of visionary artists such as William Blake, the London engraver and poet who died in 1827. Artists like Blake tended to be one-offs rather than members of a school, and their work is diverse and often word-based so it is difficult to export.</p>
                                <p>Perhaps, as ever, the truth is somewhere in between these two opinions. It is true that visits to traditional galleries like the National and the National Portrait Gallery outnumber attendance at more modern shows, but this is the case in every country except Spain, perhaps because of the influence of the two most famous non-traditional Spanish painters of the 20th century, Picasso and Dali. However, what is also true is that Britain has produced a long line of individual artists with unique, almost unclassifiable styles such as Blake, Samuel Palmer and Henry Moore.</p>
                            </div>
                        </div>

                        <div class="col-md-6 question_site">
                            <h5><strong>Question 28</strong></h5>
                            <p class="small"><em>Complete the sentence below. Write <strong>NO MORE THAN TWO WORDS</strong> from the passage for the answer.</em></p>
                            <div class="mb-3">
                                <p><strong id="question-28-number" class="question-number"></strong> The Lion of al-Lat provided an <input type="text" name="q28" id="q28" placeholder="28" value="{{ $answers['q28'] ?? '' }}" style="width: 150px;"> for sculptor Zahed Tajeddin.</p>
                            </div>
                            
                            <hr>

                            <h5><strong>Questions 29-37</strong></h5>
                            <p class="small">Classify the following statements as referring to</p>
                            
                            <table class="options-list-table">
                                <tbody>
                                    <tr><td class="opt-label">A</td><td>Charlie Moore</td></tr>
                                    <tr><td class="opt-label">B</td><td>Lewis Williams</td></tr>
                                    <tr><td class="opt-label">C</td><td>Emily Cope</td></tr>
                                </tbody>
                            </table>

                            <p class="small">Match each statement with the correct person,<strong> A, B, or C.</strong></p>
                            <div class="mb-3">
                                <table class="matching-grid">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>A</th>
                                            <th>B</th>
                                            <th>C</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $q29_37 = [
                                                29 => "British people don't appreciate art because they don't see enough art around them all the time.",
                                                30 => "British museums aim to appeal to popular tastes in art.",
                                                31 => "The average Englishman likes the works of Turner and Constable.",
                                                32 => "Britain, like every other country, has its own view of what art is.",
                                                33 => "In Britain, interest in art is mainly limited to traditional forms such as representational painting.",
                                                34 => "British art has always been affected by other cultures.",
                                                35 => "Galleries in other countries are of better quality that those in Britain.",
                                                36 => "People are not raised to appreciate art.",
                                                37 => "The British have a limited knowledge of art.",
                                            ];
                                        @endphp
                                        @foreach($q29_37 as $i => $qText)
                                        <tr>
                                            <td><strong>{{$i}}</strong> {{ $qText }}</td>
                                            <td class="choice-cell tick-cell" data-row="q{{$i}}" data-value="A"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="q{{$i}}" data-value="B"><span class="tick">✓</span></td>
                                            <td class="choice-cell tick-cell" data-row="q{{$i}}" data-value="C"><span class="tick">✓</span></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                @foreach($q29_37 as $i => $qText)
                                <input type="hidden" name="q{{$i}}" id="q{{$i}}" value="{{ $answers['q'.$i] ?? '' }}">
                                @endforeach
                            </div>

                            <hr>

                            <h5><strong>Questions 38-40</strong></h5>
                            <p class="small">Choose the correct answers.</p>
                            <div class="accordion mt-3" id="q38_40_accordion">
                                @php
                                    $q38_40 = [
                                        38 => [
                                            'text' => 'Many British artists',
                                            'options' => [
                                                'A' => 'are engravers or poets',
                                                'B' => 'are great but liked only in Britain',
                                                'C' => 'do not belong to a school or general trend',
                                                'D' => 'are influenced by Picasso and Dali'
                                            ]
                                        ],
                                        39 => [
                                            'text' => "Classic' art can be described as",
                                            'options' => [
                                                'A' => 'Sentimental, realistic paintings with geometric shapes',
                                                'B' => 'Realistic paintings with primary colors',
                                                'C' => 'Abstract modern paintings and sculptures',
                                                'D' => 'Realistic, representational pictures and sculptures'
                                            ]
                                        ],
                                        40 => [
                                            'text' => 'In Spain, people probably enjoy modern art because',
                                            'options' => [
                                                'A' => 'their artists have a classifiable style',
                                                'B' => 'the most renowned modern artists are Spanish',
                                                'C' => 'they attend many modern exhibitions',
                                                'D' => 'they have different opinions on art'
                                            ]
                                        ],
                                    ];
                                @endphp
                                        @foreach($q38_40 as $i => $qData)
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="q{{$i}}_heading">
                                                <div class="accordion-button collapsed" role="button" tabindex="0" data-bs-toggle="collapse"
                                                    data-bs-target="#q{{$i}}_collapse" aria-expanded="false" aria-controls="q{{$i}}_collapse">
                                                    <strong id="question-{{$i}}-number" class="question-number">{{$i}}</strong>&nbsp;<span>{{$qData['text']}}</span>
                                                </div>
                                            </h2>
                                    <div id="q{{$i}}_collapse" class="accordion-collapse collapse" aria-labelledby="q{{$i}}_heading"
                                        data-bs-parent="#q38_40_accordion">
                                        <div class="accordion-body">
                                            @foreach($qData['options'] as $val => $optText)
                                            <div class="form-check">
                                                <input class="form-check-input mcq-sync" type="radio" name="q{{$i}}_radio" id="q{{$i}}_{{$val}}" value="{{$val}}" data-target="q{{$i}}" {{ ($answers['q'.$i] ?? '') == $val ? 'checked' : '' }}>
                                                <label class="form-check-label" for="q{{$i}}_{{$val}}">{{ $optText }}</label>
                                            </div>
                                            @endforeach
                                            <input type="text" name="q{{$i}}" id="q{{$i}}" style="display:none;" value="{{ $answers['q'.$i] ?? '' }}" />
                                        </div>
                                    </div>
                                </div>
                                @endforeach
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

            <div class="fixed-bottom px-5" style="background-color: white; margin:0px; margin-top: 100px;">
                <div class="container-fluid d-flex justify-content-between align-items-center">
                    <div class="tabs mb-0" style="gap: 15px; width: 100%;">
                        <div class="tab active" data-tab="part1">
                            <span class="tab-title">Part 1</span>
                            <div class="question-links">
                                @for ($i = 1; $i <= 14; $i++)
                                <a href="#" class="question-link" data-question="q{{ $i }}">{{ $i }}</a>
                                @endfor
                            </div>
                            <span class="question-placeholder">1 of 14</span>
                        </div>
                        <div class="tab" data-tab="part2">
                            <span class="tab-title">Part 2</span>
                            <div class="question-links">
                                @for ($i = 15; $i <= 27; $i++)
                                <a href="#" class="question-link" data-question="q{{ $i }}">{{ $i }}</a>
                                @endfor
                            </div>
                            <span class="question-placeholder">15 of 27</span>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script>
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
            const label = document.getElementById(num) || document.querySelector(`input[name="${num}"]`);
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

        function setActiveQuestion(index) {
            currentIndex = index;
            const qNum = allLinks[index].getAttribute('data-question');

            allLinks.forEach(link => link.classList.remove('active'));
            allLinks[index].classList.add('active');

            // Do not highlight content question number, just nav panel
            document.querySelectorAll('.question-number').forEach(num => num.classList.remove('active'));

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

        // Track manual input area interactions to update navigation active state
        document.querySelectorAll('input, .mcq-sync, .tick-cell').forEach(el => {
            const updateActive = function() {
                let questionNum = this.id || this.name || this.getAttribute('data-row') || this.getAttribute('data-target');
                if (questionNum) {
                    const pureNum = questionNum.replace('q', '');
                    const linkIndex = allLinks.findIndex(link => link.getAttribute('data-question') === 'q' + pureNum);
                    if (linkIndex !== -1) {
                        currentIndex = linkIndex;
                        allLinks.forEach(link => link.classList.remove('active'));
                        allLinks[linkIndex].classList.add('active');

                        document.querySelectorAll('.question-number').forEach(num => num.classList.remove('active'));
                    }
                }
            };
            el.addEventListener('focus', updateActive);
            el.addEventListener('click', updateActive);
        });

        // Accordion → nav panel sync (Q1-5, Q6-9, Q38-40)
        document.querySelectorAll('#q1_5_accordion .accordion-button, #q6_9_accordion .accordion-button, #q38_40_accordion .accordion-button').forEach(button => {
            button.addEventListener('click', function() {
                const target = this.getAttribute('data-bs-target');
                if (!target) return;
                const qNum = target.replace('#', '').replace('_collapse', '');
                const pureNum = qNum.replace('q', '');
                
                const linkIndex = allLinks.findIndex(link => link.getAttribute('data-question') === 'q' + pureNum);
                if (linkIndex !== -1) {
                    currentIndex = linkIndex;
                    allLinks.forEach(link => link.classList.remove('active'));
                    allLinks[linkIndex].classList.add('active');
                    
                    // Do not highlight the question number inside the accordion header,
                    // just update the bottom nav panel.
                    document.querySelectorAll('.question-number').forEach(num => num.classList.remove('active'));
                }

                // Auto scroll into view (removed for Q1-5 and Q6-9)
                if (this.closest('#q38_40_accordion')) {
                    setTimeout(() => {
                        this.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }, 350);
                }
            });
        });

        // Sync radio buttons with hidden text inputs (mcq-sync)
        document.querySelectorAll('.mcq-sync').forEach(function(radio) {
            radio.addEventListener('change', function() {
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

        const inputs = document.querySelectorAll('input[type="text"], input[type="radio"]');
        inputs.forEach(input => {
            input.addEventListener('change', updateQuestionCount);
            if (input.type === 'text') input.addEventListener('input', updateQuestionCount);
        });

        function updateQuestionCount() {
            tabs.forEach(tab => {
                const tabName = tab.getAttribute('data-tab');
                const questionLinks = tab.querySelectorAll('.question-link');
                const placeholder = tab.querySelector('.question-placeholder');

                let answeredCount = 0;
                questionLinks.forEach(link => {
                    const qNum = link.getAttribute('data-question');
                    const inputField = document.getElementById(qNum) || document.querySelector(`input[name="${qNum}"]:checked`) || document.querySelector(`input[name="${qNum}"][type="hidden"]`);
                    if (inputField && inputField.value.trim() !== '') {
                        answeredCount++;
                        link.classList.add('answered');
                    } else {
                        link.classList.remove('answered');
                    }
                });

                if (tabName === 'part1') placeholder.textContent = `1 of 14`;
                else if (tabName === 'part2') placeholder.textContent = `15 of 27`;
                else if (tabName === 'part3') placeholder.textContent = `28 of 40`;
            });
        }

        updateQuestionCount();

        // Modal and Timer handlers
        document.addEventListener('DOMContentLoaded', function() {
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
                if(timerElement) {
                    timerElement.textContent = `${String(minutes).padStart(2, '0')} : ${String(seconds).padStart(2, '0')} minutes remaining`;
                }
                if (timeRemaining <= 0) {
                    clearInterval(timerInterval);
                    if(timerElement) timerElement.textContent = "Time's up!";
                    alert("⏰ Time's up! Auto-submitting your test...");
                    if(testForm) testForm.submit();
                }
                timeRemaining--;
            }

            // Show start modal on page load
            startModal.show();

            // Start test: validate student ID, start timer when OK clicked
            if(startButton) {
                startButton.addEventListener('click', function() {
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
                    studentIdInputEl.addEventListener('keydown', function(event) {
                        if (event.key === 'Enter') {
                            event.preventDefault();
                            startButton.click();
                        }
                    });
                }
            }

            if(finishButton) {
                finishButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    finishModal.show();
                });
            }

            let isSubmitting = false;
            if(continueButton) {
                continueButton.addEventListener('click', function() {
                    if (isSubmitting) return;
                    isSubmitting = true;
                    continueButton.disabled = true;
                    continueButton.textContent = 'Submitting...';
                    if(testForm) testForm.submit();
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

        // Matching Grid logic
        function clearRowSelection(rowId) {
            document.querySelectorAll(`.tick-cell[data-row="${rowId}"]`).forEach(function(cell) {
                cell.classList.remove('selected');
            });
        }

        function setRowValue(rowId, value) {
            const input = document.getElementById(rowId);
            if (input) {
                input.value = value;
                input.dispatchEvent(new Event('input', { bubbles: true }));
                input.dispatchEvent(new Event('change', { bubbles: true }));
            }

            clearRowSelection(rowId);
            const cell = document.querySelector(`.tick-cell[data-row="${rowId}"][data-value="${value}"]`);
            if (cell) cell.classList.add('selected');

            const qId = rowId;
            const linkIndex = allLinks.findIndex(link => link.getAttribute('data-question') === qId);
            if (linkIndex !== -1) {
                currentIndex = linkIndex;
                allLinks.forEach(link => link.classList.remove('active'));
                allLinks[linkIndex].classList.add('active');
            }
        }

        function clearRowValue(rowId) {
            const input = document.getElementById(rowId);
            if (input) {
                input.value = '';
                input.dispatchEvent(new Event('input', { bubbles: true }));
                input.dispatchEvent(new Event('change', { bubbles: true }));
            }
            clearRowSelection(rowId);
        }

        document.querySelectorAll('.tick-cell').forEach(function(cell) {
            cell.addEventListener('click', function() {
                const rowId = cell.getAttribute('data-row');
                const val = cell.getAttribute('data-value');
                if (!rowId || !val) return;

                if (cell.classList.contains('selected')) {
                    clearRowValue(rowId);
                    return;
                }

                setRowValue(rowId, val);
            });
        });

        // Initialize matching grid on load
        window.addEventListener('load', () => {
            document.querySelectorAll('.matching-grid tbody tr').forEach((tr) => {
                const tickCell = tr.querySelector('.tick-cell');
                if (!tickCell) return;
                const rowId = tickCell.getAttribute('data-row');
                if (!rowId) return;
                const input = document.getElementById(rowId);
                if (!input) return;
                const val = (input.value || '').toUpperCase().trim();
                if (!val) return;
                setRowValue(rowId, val);
            });
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
        document.addEventListener('mouseup', function(e) {
            if (e.button !== 0) return;
            const sel = window.getSelection();
            if (sel && sel.toString().trim() !== '' && sel.rangeCount > 0) {
                pendingSelectionRange = sel.getRangeAt(0).cloneRange();
            } else {
                pendingSelectionRange = null;
            }
        });

        // Context menu on right-click
        document.addEventListener('contextmenu', function(e) {
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

        document.addEventListener('click', function(e) {
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

        highlightOption.addEventListener('click', function() {
            if (selectionRange) {
                highlightRange(selectionRange);
                window.getSelection().removeAllRanges();
            }
            selectionRange = null; pendingSelectionRange = null;
            contextMenu.style.display = 'none';
        });

        notesOption.addEventListener('click', function() {
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

        clearOption.addEventListener('click', function() {
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

        allClearOption.addEventListener('click', function() {
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

    <!-- Start Test Modal -->
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
