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

        .question-link.answered {
            /* Removed gray background as requested */
        }

        /* Remove border from input fields when focused */
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
            max-height: 70vh;
            overflow-y: auto;
            overflow-x: hidden;
            /* white-space: pre-line; */
            word-wrap: break-word;
            font-size: 16px;
        }

        .question_site {
            max-height: 70vh;
            overflow-y: auto;
            overflow-x: hidden;
            position: relative;
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

        .sidebar-note-item {
            cursor: pointer;
            padding: 10px;
            border-bottom: 1px solid #ddd;
            transition: background 0.3s;
        }

        .sidebar-note-item:hover {
            background: #f1f1f1;
        }

        .sidebar-header-item {
            font-weight: normal;
            font-size: 14px;
            margin-bottom: 5px;
            color: #333;
        }

        .sidebar-note-content {
            font-size: 13px;
            color: #666;
            white-space: pre-wrap;
        }

        /* Popup note style */
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

        ul.options {
            line-height: 5px;
        }

        li {
            margin-top: 15px;
        }

        .ques {
            font-weight: bold;
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

        .question_site input[type="text"] {
            border: 1px solid #d1d1d1;
            border-radius: 4px;
            padding: 2px 8px;
            outline: none;
            background: #fff;
        }

        .question_site input[type="text"]:focus {
            outline: none;
        }

        #finishButton:hover {
            color: white !important;
            border-color: black !important;
        }

        .modal-backdrop.show {
            opacity: 0.85;
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }


        /* Diagram numbers overlay style */
        .diagram-container {
            position: relative;
            display: inline-block;
        }
        .diagram-number {
            position: absolute;
            background: green;
            color: white;
            width: 22px;
            height: 22px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: bold;
        }
        .num-1 { top: 45%; left: 75%; }
        .num-2 { top: 25%; left: 51%; }
        .num-3 { top: 35%; left: 45%; }

        /* accordion styles for Questions 9-14 */
        .accordion-item {
            border: 0 !important;
            margin-bottom: 12px;
            border-radius: 0;
            overflow: visible;
            box-shadow: none;
            background: transparent !important;
        }

        .accordion-button {
            border: 0;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.12) !important;
            background: #dbeafe !important;
            border-radius: 8px !important;
            color: #1e3a5f;
            font-weight: 700;
        }

        .accordion-button:focus {
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.12) !important;
        }

        .accordion-button::after {
            display: none;
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
        #startModal #startTestButton:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4); }

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
            width: 45px;
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
        <input type="hidden" name="test_name" value="class06_reading">
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
                                <h4 class="text-center mb-4"><strong>We French do love to demonstrate</strong></h4>
                                <p><strong>(A)</strong> Josiane Bertrand has a small family business - a neighbourhood charcuterie selling sausage, poached pigs' trotters, pate and jellied pig snouts. Her ham, she says, is the best in Paris and her queue of customers is long. Despite the ceaseless rain outside - among all its other woes, France is now flooding - it's a convivial crowd, waiting to be served, and the animated conversation is all about strikes.</p>
                                <p><strong>(B)</strong> If the opinion pages of Le Monde are to be believed, the charcuterie queue is a pretty accurate reflection of the mood of the country. Split, roughly half and half, between those for the Work Bill and those against. Philippe's 28. He's landed what most French would regard as a dream job. He's a functionaries working in local government. A fonctionnaire is an employee of the French state in almost any form of public administration and service. It's a job for life - with solid pay and conditions, fixed working hours, a good pension, generous holidays. So, why many young French people aspire to is not to change the world - explore, create, set up alone - but, with self-employment difficult and taxes punitive, they dream of becoming steadily employed bureaucrats.</p>
                                <p><strong>(C)</strong> Philippe knows he's lucky. And he's against any change. "I'm happy," he says. "I know exactly where I am and where I'll be in 40 years' time, with a good pension." Eleonore, who has four children, two of them dancing around the shop as they wait, is in her early 40s. As a secondary school teacher she has also got a job for life and generous state benefits. But, unlike Philippe, she's all for change. "It can't go on like this. For every person like me, there are 20 or more with no hope at all," she says.</p>
                                <p><strong>(D)</strong> A quarter of all French people under 25, many of them well-qualified, have no work. A large number of those are from immigrant families, making their chances of employment even slimmer. These are the kind of people who voted Francois Hollande into the presidency in 2012, with his pledge to end the country's employment troubles.</p>
                                <p><strong>(E)</strong> Now he's made a new promise, putting his own political career on the line - he's not running for re-election next spring unless he cuts unemployment. A bold move for a president with an approval rating of only 14% in a country riven by industrial disputes. Along with his prime minister, Manuel Valls, and Pierre Gattaz - known as the "boss of bosses", president of Medef, the largest federation of employers in France - Hollande stands against the combined power of the country's two biggest unions.</p>
                                <p><strong>(F)</strong> The proposed Work Bill runs to over 500 pages. It aims to simplify and liberalize the French Work Code which, at 3,889 pages, is a vast labyrinth beset with perils for employers. The unions won't even consider negotiations until the bill is removed from parliament. The president and his allies refuse to change a word of it. "It's a good law, good for France," says Hollande. The result? Total stalemate. An ongoing siege. Just after one o'clock on the glassed-in terrace of a popular restaurant on the Boulevard Montparnasse, and everything begins to go quiet. The traffic disappears from the street. Cordons of riot police move in, three columns deep, flanked by armoured vans. There's a whirr of helicopters overhead.</p>
                                <p><strong>(G)</strong> In the distance, a gathering roar and blare - the protesters. The noise becomes deafening. The riot police take up positions. Frederique, the waiter, temporarily locks the doors - and those having lunch find themselves exhibits in a kind of transparent, gastronomic showcase along with various grilled fish, bottles of wine and assorted desserts. Looking in from the outside, hundreds of protesters passing down the boulevard, some marching, others ambling, a few dancing to music booming from the accompanying floats. Looking out from the inside, the lunchers comment on the demonstrators, the demonstrators wave cheerfully at the lunchers. There's general resigned, amused talk amid the eating - "Here we go again," and "Where will this round end?" And self-deprecating comments such as, "We French do love to demonstrate..."</p>
                                <p><strong>(H)</strong> Then it all subsides, passes on, the noise, the marchers, the red balloons and pounding music, leaving a trailing wake of litter. Frederique unlocks the doors. The conversation leaves the political, returns to the personal. Similar reforms have already been implemented in Italy and Spain. Germany did so long ago - its unemployment, at 5%, is less than half that of France, which according to some commentators here now stands alone as the last bastion of 20th century-style socialism in Europe.</p>
                            </div>
                        </div>

                        <div class="col-md-6 question_site">
                            <h5><strong>Questions 1-8</strong></h5>
                            <p class="small"><em>Reading Passage 1 has eight paragraphs, <strong >A-H</strong>. Which section contains the following information?</em></p>
                           <p> <strong>NB:</strong> "You may use any letter more than once."</p>

                            <div class="mb-3">
                                <table class="matching-grid">
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $info = [
                                                1 => "A bold promise",
                                                2 => "Similar reforms in other countries",
                                                3 => "A refusal to change the law",
                                                4 => "Unemployment rate statistics",
                                                5 => "The dream of young French people",
                                                6 => "Different opinions",
                                                7 => "Best ham in all Paris",
                                                8 => "The demonstration itself"
                                            ];
                                        @endphp
                                        @foreach($info as $qNum => $txt)
                                        <tr>
                                            <td><strong>{{ $qNum }}</strong> {{ $txt }}</td>
                                            @foreach(['A','B','C','D','E','F','G','H'] as $val)
                                            <td class="choice-cell tick-cell" data-row="{{ $qNum }}" data-value="{{ $val }}"><span class="tick">✓</span></td>
                                            @endforeach
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div style="display:none;">
                                    @for($i=1; $i<=8; $i++)
                                    <input type="text" name="q{{$i}}" id="q{{$i}}">
                                    @endfor
                                </div>
                            </div>

                            <hr>

                            <h5><strong>Questions 9-14</strong></h5>
                            <p class="small"><em>Choose <strong>TRUE</strong> if the statement agrees with the information given in the text, choose <strong>FALSE</strong> if the statement contradicts the information, or choose <strong>NOT GIVEN</strong> if there is no information on this.</em></p>

                            <div class="accordion mt-3" id="q9_14_accordion">
                                @for ($i = 9; $i <= 14; $i++)
                                @php
                                    $qText = match($i) {
                                        9 => "Most french would say that Philippe has a very good job.",
                                        10 => "Eleonore and Philippe have same views on the situation.",
                                        11 => "25% of all people in France have no job.",
                                        12 => "Francois Hollande might not run for re-election next year.",
                                        13 => "The French Work Code is considered simpler than the proposed Work Bill.",
                                        14 => "The unemployment rate in Spain is less than in Italy.",
                                    };
                                @endphp
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="q{{$i}}_heading">
                                        <div class="accordion-button {{ $i == 9 ? '' : 'collapsed' }}" role="button" tabindex="0" data-bs-toggle="collapse"
                                            data-bs-target="#q{{$i}}_collapse" aria-expanded="{{ $i == 9 ? 'true' : 'false' }}" aria-controls="q{{$i}}_collapse">
                                            <strong>{{$i}}</strong>&nbsp;<span>{{$qText}}</span>
                                        </div>
                                    </h2>
                                    <div id="q{{$i}}_collapse" class="accordion-collapse collapse {{ $i == 9 ? 'show' : '' }}" aria-labelledby="q{{$i}}_heading"
                                        data-bs-parent="#q9_14_accordion">
                                        <div class="accordion-body">
                                            <div class="form-check"><input class="form-check-input mcq-sync" type="radio" name="q{{$i}}_radio" id="q{{$i}}_TRUE" value="TRUE" data-target="q{{$i}}"><label class="form-check-label" for="q{{$i}}_TRUE">TRUE</label></div>
                                            <div class="form-check"><input class="form-check-input mcq-sync" type="radio" name="q{{$i}}_radio" id="q{{$i}}_FALSE" value="FALSE" data-target="q{{$i}}"><label class="form-check-label" for="q{{$i}}_FALSE">FALSE</label></div>
                                            <div class="form-check"><input class="form-check-input mcq-sync" type="radio" name="q{{$i}}_radio" id="q{{$i}}_NG" value="NOT GIVEN" data-target="q{{$i}}"><label class="form-check-label" for="q{{$i}}_NG">NOT GIVEN</label></div>
                                            <input type="text" name="q{{$i}}" id="q{{$i}}" style="display:none;" />
                                        </div>
                                    </div>
                                </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ===================== PART 2 ===================== -->
                <div class="tab-content" id="part2" style="margin-bottom: 100px;">
                    <div class="question_part">
                        <h4 class="mb-2">Part 2</h4>
                        <p class="mb-0">Read the text below and answer questions 15-27</p>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="scroll-box">
                                <h4 class="text-center mb-4"><strong>How I was floored by a tick</strong></h4>
                                <p>When Allan Little began to feel ill, he knew almost immediately what it was - Lyme Disease. But getting a medical diagnosis, and treatment, took a lot longer. I'd been going for years to the same little town in New England and Lyme Disease is everywhere there. You can't walk more than a few hundred metres in the countryside without coming across a public health notice warning you not to get bitten by a deer tick.</p>
                                <p>So the intense headache, the aching joints, the burning joints, the ferocious fever and night sweats that hit me in a matter of hours, a few days after I'd got back to London, were all consistent with what I'd read about the condition. I went to a London GP, who wasn't convinced. She took a blood sample and advised me to go home, rest, and take paracetamol. The next day, the blood test came back. It was negative for Lyme. My condition grew worse. I could hardly stand up. I called another doctor, who came to my house. He was also sceptical. He took another blood test. This too came back negative. But he gave me a prescription for powerful painkillers which made me feel well enough to get on a train to Edinburgh, my home town.</p>
                                <p>Within three hours of arriving at Waverley Station I was an in-patient in the Infectious Diseases Department of the city's Western General Hospital: diagnosis, Acute Lyme Disease. By now I had found the tick bite and the distinctive livid red rash, about six inches in diameter. (To be fair to those London GPs, I hadn't noticed it when I'd consulted them.)</p>
                                <p>"It's attacked your liver," the Edinburgh Consultant said. "You have three distinct kinds of liver inflammation". I made a lame sick-bed joke: "You're sure that's not Lager-and-Lime Disease then?" She laughed politely and reassured me that that would look quite different. Why then had both blood tests come back negative? Dr Roger Evans of Raigmore Hospital in Inverness is one of the UK's leading Lyme Disease researchers. "In early Lyme Disease," he told me, "the test is not reliable because no antibodies have been produced. In the first few weeks of infection, you could test negative, but still have Lyme Disease."</p>
                                <p>This is a problem for GPs, especially in urban centres where Lyme Disease is unfamiliar. Lyme is not a viral infection. It's bacterial. GPs will not prescribe antibiotics if they think you're showing symptoms of a viral infection - and it does look and feel like a bad case of flu, or chronic fatigue syndrome, neither of which can, or should, be treated with antibiotics. "In the early weeks of infection, when the blood test is not reliable," says Evans, "the GP needs to assess the patient clinically, looking for other symptoms that identify Lyme Disease." In other words, symptoms that distinguish it from flu. If you have been bitten:</p>
                                <p><strong>Remove the tick as soon as possible</strong> - the safest way is to use a pair of fine-tipped tweezers, or a tick removal tool. Grasp the tick as close to the skin as possible, pull upwards slowly and firmly, as mouthparts left in the skin can cause a local infection. Once removed, apply antiseptic to the bite area, or wash with soap and water and keep an eye on it for several weeks for any changes. Contact your GP if you begin to feel unwell and remember to tell them you were bitten by a tick or have recently spent time outdoors.</p>
                                <p>Angela Howard fell ill with Lyme Disease in the 1990s. She had never heard of it. Her doctor, she says, told her to go home and see whether her symptoms persisted. It was only when a visiting American friend saw the distinctive rash - concentric red rings around the place where the tick bite had occurred that she realised she might have Lyme Disease. She says her doctor was still reluctant to diagnose Lyme. "Doctors say you can only get this abroad - that it comes from overseas. But I hadn't been abroad. I'd been picnicking in Wiltshire." She was not treated early and her symptoms have persisted for years.</p>
                                <p>There is an accumulation of anecdotal evidence that Lyme Disease often goes undiagnosed. One problem is that no-one knows how prevalent it now is. It is not a notifiable disease in the National Health Service - doctors are not required to inform a central database when they diagnose it. So there is no reliable evidence of how widespread it is, or where in the country you are most likely to get it. Roger Evans at Raigmore Hospital wants to remedy that. "We're using Scotland as a pilot study," he said. "We're trying to create maps of areas where there's a risk of tick exposure. We're using satellite data from the European Space Agency to create an app that will give information, but which will also be interactive, so that users can put in information about where they've been bitten and whether the Lyme Disease rash has appeared." Why has Lyme, which 30 years ago seemed largely limited to a small area of New England - Lyme is the town in Connecticut where it was first identified - now so prevalent across the continental USA and in Europe? One theory is climate change: that small gradations in climate can create new habitats for micro-organisms, or keep them alive and active for longer.</p>
                                <p>I was struck, at the time of my own treatment, that awareness was far greater in Scotland than in England and Wales. And awareness of the condition is vital to catching it early. For when you catch it early, treatment is easy and in most cases successful. It floors you though. It took me four or five months to get my strength and stamina back. It is a debilitating and dangerous illness and there is no doubt that it is getting more common. You can get it in the Scottish Highlands, in Devon and Cornwall, in Richmond Park in London and probably in your own back garden - anywhere where there are small furry animals on whose skins a deer tick can live. If you get it, you can get treatment. But take it from me: it really helps if you know what it is you've got.

</p>
                            </div>
                        </div>

                        <div class="col-md-6 question_site">
                            <h5><strong>Questions 15-22</strong></h5>
                                                       <p class="small"><em>Choose <strong>TRUE</strong> if the statement agrees with the information given in the text, choose <strong>FALSE</strong> if the statement contradicts the information, or choose <strong>NOT GIVEN</strong> if there is no information on this.</em></p>
                            <div class="accordion mt-3" id="q15_22_accordion">
                                @for ($i = 15; $i <= 22; $i++)
                                @php
                                    $qText = match($i) {
                                        15 => "Alan had no doubt about his illness from the beginning.",
                                        16 => "Both blood tests were negative for Lyme Disease.",
                                        17 => "Alan didn't become a Waverley Station patient for more than 3 hours.",
                                        18 => "Blood tests were inaccurate because they were taken unprofessionally.",
                                        19 => "Lyme Disease is very unfamiliar in the UK.",
                                        20 => "When bitten, you should remove the tick, preferably with a tool.",
                                        21 => "After you remove the tick and apply antiseptic, you should take paracetamol.",
                                        22 => "It is advised to contact a doctor, if you feel ill after removing the tick.",
                                    };
                                @endphp
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="q{{$i}}_heading">
                                        <div class="accordion-button {{ $i == 15 ? '' : 'collapsed' }}" role="button" tabindex="0" data-bs-toggle="collapse"
                                            data-bs-target="#q{{$i}}_collapse" aria-expanded="{{ $i == 15 ? 'true' : 'false' }}" aria-controls="q{{$i}}_collapse">
                                            <strong>{{$i}}</strong>&nbsp;<span>{{$qText}}</span>
                                        </div>
                                    </h2>
                                    <div id="q{{$i}}_collapse" class="accordion-collapse collapse {{ $i == 15 ? 'show' : '' }}" aria-labelledby="q{{$i}}_heading"
                                        data-bs-parent="#q15_22_accordion">
                                        <div class="accordion-body">
                                            <div class="form-check"><input class="form-check-input mcq-sync" type="radio" name="q{{$i}}_radio" id="q{{$i}}_TRUE" value="TRUE" data-target="q{{$i}}"><label class="form-check-label" for="q{{$i}}_TRUE">TRUE</label></div>
                                            <div class="form-check"><input class="form-check-input mcq-sync" type="radio" name="q{{$i}}_radio" id="q{{$i}}_FALSE" value="FALSE" data-target="q{{$i}}"><label class="form-check-label" for="q{{$i}}_FALSE">FALSE</label></div>
                                            <div class="form-check"><input class="form-check-input mcq-sync" type="radio" name="q{{$i}}_radio" id="q{{$i}}_NG" value="NOT GIVEN" data-target="q{{$i}}"><label class="form-check-label" for="q{{$i}}_NG">NOT GIVEN</label></div>
                                            <input type="text" name="q{{$i}}" id="q{{$i}}" style="display:none;" />
                                        </div>
                                    </div>
                                </div>
                                @endfor
                            </div>

                            <hr>

                            <h5><strong>Questions 23-27</strong></h5>
                            <p class="small"><em>Complete the sentences below. Use <strong>NO MORE THAN TWO WORDS</strong> from the passage.</em></p>
                            <div class="mt-3">
                                <p> Angela's friend recognized the Lyme Disease as soon as she saw the <input type="text" name="q23" id="q23" placeholder="23" style="width: 150px;"> rash.</p>
                                <p> One problem is, it's unknown how <input type="text" name="q24" id="q24" placeholder="24" style="width: 150px;"> Lyme Disease is nowadays.</p>
                                <p> Roger Evans says that they try to create maps of Scotland where there's a risk of <input type="text" name="q25" id="q25" placeholder="25" style="width: 150px;">.</p>
                                <p> The one possible reason for Lyme Disease to move all over the world is <input type="text" name="q26" id="q26" placeholder="26" style="width: 150px;">.</p>
                                <p> You can catch the disease even in your own back <input type="text" name="q27" id="q27" placeholder="27" style="width: 150px;">.</p>
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
                                <h4 class="text-center mb-4"><strong>Structure and function of cell membranes</strong></h4>
                                <p><strong>(A)</strong> Human body is made up of millions of cells - little building blocks of life. Each cell contains many functional subunits (organelles) that enable its proper functioning and is protected from the external environment by a cell membrane. While structure and function of organelles are extensively covered in various biology courses, the importance of study of cell membranes is often underrated. This article is dedicated to provide a short introduction into the basic functions and anatomy of a cell membrane.</p>
                                <p><strong>(B)</strong> Cell membranes protect and organize cells. Most importantly they serve as barriers, discriminating the cell's interior from the outer milieu. Because cells always exist in aqueous environment their membranes should be structured in such way so they do not solve in water. This function is ideally carried by special chemical molecules - phospholipids. These molecules are constructed from two parts: tails made up of 2 molecules of fat that 'avoid' water and heads that have an affinity for water. For this specific behaviour the phospholipid's tails are called hydrophobic ('hydro' means water and 'phobia' means fear) and heads are called hydrophilic ('philos' means love). When phospholipids are added to water, they self-assemble into double-layered structures, shielding their hydrophobic portions from water and exposing their hydrophilic portions to the environment. This phospholipid bilayer may resemble a sandwich, where phospholipid heads are bread rolls and tails are the sandwich filling.</p>
                                <p><strong>(C)</strong> In addition to lipids, membranes are loaded with proteins. They usually go through the lipid bilayer and are exposed to both aqueous environment and cell's interior. In fact, proteins account for roughly half the mass of most cellular membranes. They make the membrane semi-permeable, which means that some molecules can diffuse across the lipid bilayer but others cannot. Small hydrophobic molecules and gases like oxygen and carbon dioxide cross membranes rapidly. Small molecules, such as water and ethanol, can also pass through membranes, but they do so more slowly. On the other hand, cell membranes restrict diffusion of highly charged molecules, such as ions, and large molecules, such as sugars and amino acids. The passage of these molecules relies on specific transport proteins embedded in the membrane.</p>
                                <p><strong>(D)</strong> Membrane transport proteins are specific and selective for the molecules they move, and they often use energy to enhance passage. Also, these proteins transport some nutrients against the concentration gradient, which requires additional energy. The ability to maintain concentration gradients and sometimes move materials against them is vital to cell health and maintenance. Thanks to membrane barriers and transport proteins, the cell can accumulate nutrients in higher concentrations than exist in the environment and, conversely, dispose of waste products.</p>
                                <p><strong>(E)</strong> Other membrane-embedded proteins have communication-related jobs. Large molecules from the extracellular environment, such as hormones or immune mediators, bind to the receptor proteins on the cell membrane. Such binding causes a conformational change in the protein that transmits a signal to intracellular messenger molecules. Like transport proteins, receptor proteins are specific and selective for the molecules they bind.</p>
                                <p><strong>(F)</strong> Another important type of membrane's components are cholesterol molecules, which account for about 20 percent of the lipids in animal cell plasma membranes. However, cholesterol is not present in bacterial membranes or mitochondrial membranes. The cholesterol molecules are embedded in place of phospholipid molecules and help to regulate the stiffness of membranes. To function properly, the cell membrane should be in fluid state. Cholesterol reduces membrane fluidity at moderate temperatures by reducing the moving of phospholipids. But at low temperatures, it hinders solidification by disrupting the regular packing of phospholipids.</p>
                            </div>
                        </div>

                        <div class="col-md-6 question_site">
                            <h5><strong>Questions 28-30</strong></h5>
                            <p class="small"><em>Look at the diagram of the cell membrane. Write the correct name for each numbered part (28-30) using only ONE word from the passage.</em></p>

                            <div class="diagram-container">
                                <img src="{{ asset('images/w6.png') }}" alt="Cell Membrane"class="mb-3">
                                <!-- <div class="diagram-number num-1">1</div>
                                <div class="diagram-number num-2">2</div>
                                <div class="diagram-number num-3">3</div> -->
                            </div>
                            <div class="mb-3">
                                <p> <input type="text" name="q28" id="q28" placeholder="28" style="width: 200px;"></p>
                                <p> <input type="text" name="q29" id="q29" placeholder="29" style="width: 200px;"></p>
                                <p> <input type="text" name="q30" id="q30" placeholder="30" style="width: 200px;"></p>
                            </div>

                            <hr>

                            <h5><strong>Questions 31-35</strong></h5>
                            <p class="small"><em>Reading Passage 3 has eight paragraphs, A-F. Which section contains the following information?</em></p>
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
                                            <th class="choice-cell">E</th>
                                            <th class="choice-cell">F</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $info31 = [
                                                31 => "Specific proteins transport nutrients from the external environment against the concentration gradient.",
                                                32 => "The barrier function of cell membranes is supported by a bilayer of phospholipids.",
                                                33 => "The level of membrane fluidity is regulated by cholesterol molecules.",
                                                34 => "The importance of cell membranes is often underestimated.",
                                                35 => "Proteins make the membrane semi-permeable."
                                            ];
                                        @endphp
                                        @foreach($info31 as $qNum => $txt)
                                        <tr>
                                            <td><strong>{{ $qNum }}</strong> {{ $txt }}</td>
                                            @foreach(['A','B','C','D','E','F'] as $val)
                                            <td class="choice-cell tick-cell" data-row="{{ $qNum }}" data-value="{{ $val }}"><span class="tick">✓</span></td>
                                            @endforeach
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div style="display:none;">
                                    @for($i=31; $i<=35; $i++)
                                    <input type="text" name="q{{$i}}" id="q{{$i}}">
                                    @endfor
                                </div>
                            </div>

                            <hr>

                            <h5><strong>Questions 36-40</strong></h5>
                            <p class="small"><em>Complete the summary. Use <strong>NO MORE THAN ONE WORD</strong> from the passage.</em></p>
                            <p class="small">Cell membranes protect cells and organize their activities. The first main function - barrier function - is carried by phospholipids. These molecules don't solve in water and are ideal for cells that always exist in <input type="text" name="q36" id="q36" placeholder="36" style="width: 120px;"> environment. In addition to lipids, membranes are loaded with <input type="text" name="q37" id="q37" placeholder="37" style="width: 120px;"> that make the membrane <input type="text" name="q38" id="q38" placeholder="38" style="width: 120px;">, which means that some molecules can diffuse across the lipid bilayer but others cannot. One of the most important types are <input type="text" name="q39" id="q39" placeholder="39" style="width: 120px;"> proteins and receptor proteins. The last type are cholesterol molecules, which are embedded in place of <input type="text" name="q40" id="q40" placeholder="40" style="width: 120px;"> molecules.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Navigation -->
            <div class="tabs fixed-bottom" style="background-color: white; margin:0px; margin-top: 100px;">
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
    </form>

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

                tabContents.forEach(content => {
                    content.classList.remove('active');
                });

                // Add active to clicked tab
                tab.classList.add('active');
                tab.querySelector('.question-links').style.display = 'flex';
                tab.querySelector('.question-placeholder').style.display = 'none';

                // Show corresponding content
                const targetTab = tab.getAttribute('data-tab');
                const targetContent = document.getElementById(targetTab);
                if (targetContent) {
                    targetContent.classList.add('active');
                    // Scroll to top of the page to show the active tab content
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Initial setup: show only part1 question links
        window.addEventListener('DOMContentLoaded', () => {
            tabs.forEach(tab => {
                const qLinks = tab.querySelector('.question-links');
                const qPlaceholder = tab.querySelector('.question-placeholder');
                if (tab.getAttribute('data-tab') === 'part1') {
                    qLinks.style.display = 'flex';
                    qPlaceholder.style.display = 'none';
                } else {
                    qLinks.style.display = 'none';
                    qPlaceholder.style.display = 'block';
                }
            });
        });

        // Question link click handlers and arrow navigation
        const allLinks = Array.from(document.querySelectorAll('.question-link'));
        let currentIndex = 0;

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

        function setActiveQuestion(index) {
            currentIndex = index;
            const qNum = allLinks[index].getAttribute('data-question');

            // Remove active class from all links
            allLinks.forEach(link => link.classList.remove('active'));
            allLinks[index].classList.add('active');

            activateTabForQuestion(qNum);

            // Replicated logic from readingClassOne
            const questionTarget = document.getElementById(`q${qNum}_heading`) || document.getElementById(qNum);
            if (questionTarget) {
                const collapseEl = document.getElementById(`q${qNum}_collapse`);
                if (collapseEl && !collapseEl.classList.contains('show')) {
                    const bsCollapse = bootstrap.Collapse.getInstance(collapseEl) || new bootstrap.Collapse(collapseEl);
                    bsCollapse.show();
                    // Let the 'shown.bs.collapse' listener handle the scroll to ensure timing is right
                } else {
                    scrollToVisibleTop(questionTarget);
                }
            }
        }

        allLinks.forEach((link, index) => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                setActiveQuestion(index);
            });
        });

        // Arrow button handlers
        document.getElementById('prev-question').addEventListener('click', () => {
            if (currentIndex > 0) setActiveQuestion(currentIndex - 1);
        });

        document.getElementById('next-question').addEventListener('click', () => {
            if (currentIndex < allLinks.length - 1) setActiveQuestion(currentIndex + 1);
        });

        // Track manual input field clicks to update currentIndex
        document.querySelectorAll('input[type="text"]').forEach(input => {
            input.addEventListener('focus', function() {
                const questionNum = this.id;
                const linkIndex = allLinks.findIndex(link => link.getAttribute('data-question') ===
                    questionNum);
                if (linkIndex !== -1) {
                    currentIndex = linkIndex;
                    allLinks.forEach(link => link.classList.remove('active'));
                    allLinks[linkIndex].classList.add('active');
                }
            });
        });

        // When an accordion button (Q9-14 or Q15-22) is clicked, activate the matching question number in the nav panel
        document.querySelectorAll('#q9_14_accordion .accordion-button, #q15_22_accordion .accordion-button').forEach(button => {
            button.addEventListener('click', function() {
                // Extract question number from data-bs-target e.g. "#q9_collapse" → "q9"
                const target = this.getAttribute('data-bs-target'); // e.g. "#q9_collapse"
                if (!target) return;
                const qNum = target.replace('#', '').replace('_collapse', ''); // e.g. "q9"
                const linkIndex = allLinks.findIndex(link => link.getAttribute('data-question') === qNum);
                if (linkIndex !== -1) {
                    currentIndex = linkIndex;
                    allLinks.forEach(link => link.classList.remove('active'));
                    allLinks[linkIndex].classList.add('active');
                }
            });
        });

        // Track answered questions
        const inputs = document.querySelectorAll('input[type="text"], input[type="hidden"]');
        inputs.forEach(input => {
            input.addEventListener('input', updateQuestionCount);
            input.addEventListener('change', updateQuestionCount);
        });

        function updateQuestionCount() {
            tabs.forEach(tab => {
                const tabName = tab.getAttribute('data-tab');
                const questionLinks = tab.querySelectorAll('.question-link');
                const placeholder = tab.querySelector('.question-placeholder');

                let answeredCount = 0;
                questionLinks.forEach(link => {
                    const qNum = link.getAttribute('data-question');
                    const inputField = document.getElementById(qNum) || document.querySelector(`input[name="q${qNum}"]`);
                    if (inputField && inputField.value.trim() !== '') {
                        answeredCount++;
                        link.classList.add('answered');
                    } else {
                        link.classList.remove('answered');
                    }
                });

                // Set correct question ranges for each part
                if (tabName === 'part1') {
                    placeholder.textContent = `1 of 14`;
                } else if (tabName === 'part2') {
                    placeholder.textContent = `15 of 27`;
                } else if (tabName === 'part3') {
                    placeholder.textContent = `28 of 40`;
                }
            });
        }

        // Initial count
        updateQuestionCount();

        // Modal handlers
        document.addEventListener('DOMContentLoaded', function() {
            const startModal = new bootstrap.Modal(document.getElementById('startModal'));
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
                        return; // modal বন্ধ হবে না
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
                        elem.msFullscreen();
                    }

                    // Start the timer
                    timerInterval = setInterval(updateTimer, 1000);
                });
            }

            // Enter key on student ID input triggers start button
            const studentIdInputEl = document.getElementById('studentIdInput');
            if (studentIdInputEl && startButton) {
                studentIdInputEl.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        startButton.click();
                    }
                });
            }

            // Show finish modal when Finish Test button clicked
            if(finishButton) {
                finishButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    finishModal.show();
                });
            }

            // Prevent double submission
            let isSubmitting = false;
            if(continueButton) {
                continueButton.addEventListener('click', function() {
                    if (isSubmitting) return;
                    isSubmitting = true;
                    continueButton.disabled = true;
                    continueButton.textContent = 'Submitting...';
                    const examStudentId = sessionStorage.getItem('examStudentId');
                    if (examStudentId) {
                        const examField = document.getElementById('examStudentIdField');
                        if(examField) examField.value = examStudentId;
                    }
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

        // mouseup-এ selection capture করো — contextmenu-এর আগে
        // কিছু browser contextmenu event-এ selection collapse করে দেয়,
        // তাই আগেই cloneRange করে রাখা হচ্ছে
        let pendingSelectionRange = null;
        document.addEventListener('mouseup', function(e) {
            // শুধু LEFT mouse button (button=0) ধরো
            // Right-click (button=2) থেকে mouseup হলে pendingSelectionRange reset হবে না
            // কারণ: right-click এর mouseup, contextmenu এর আগে fire হয়
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
            
            // Check if clicked on highlighted text (mark element) or inside one
            let target = e.target;
            while (target && target.tagName !== 'MARK' && target.parentNode) {
                target = target.parentNode;
                if (target.tagName === 'MARK') break;
            }
            
            if (target && target.tagName === 'MARK') {
                clickedMark = target;
            }

            // selection text নেওয়ার চেষ্টা — প্রথমে current, না পেলে pendingSelectionRange
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

        // Hide context menu on click elsewhere
        document.addEventListener('click', function(e) {
            if (!contextMenu.contains(e.target)) {
                contextMenu.style.display = 'none';
            }
        });

        // Helper function to check if node is inside a table
        function isInsideTable(node) {
            let parent = node.parentNode;
            while (parent) {
                if (parent.tagName === 'TABLE' || parent.tagName === 'TD' || parent.tagName === 'TH' || parent.tagName === 'TR') {
                    return true;
                }
                parent = parent.parentNode;
            }
            return false;
        }
        
        // Helper function to get the table cell containing a node
        function getTableCell(node) {
            let parent = node.nodeType === Node.TEXT_NODE ? node.parentNode : node;
            while (parent) {
                if (parent.tagName === 'TD' || parent.tagName === 'TH') {
                    return parent;
                }
                parent = parent.parentNode;
            }
            return null;
        }

        // Helper function to highlight text nodes in a range — robust dual-strategy version
        function highlightRange(range) {
            const createdMarks = [];
            
            const startContainer = range.startContainer;
            const endContainer = range.endContainer;
            const startOffset = range.startOffset;
            const endOffset = range.endOffset;
            
            // Same text node — simple case
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
            
            // Multi-node / cross-table-cell selection
            let root = range.commonAncestorContainer;
            if (root.nodeType === Node.TEXT_NODE) root = root.parentNode;

            const textNodes = [];

            // Strategy 1: try intersectsNode()
            try {
                const walker = document.createTreeWalker(root, NodeFilter.SHOW_TEXT, null, false);
                let node;
                let foundAny = false;
                while (node = walker.nextNode()) {
                    const parentTag = node.parentNode && node.parentNode.tagName;
                    if (parentTag === 'SCRIPT' || parentTag === 'STYLE') continue;
                    if (range.intersectsNode(node)) {
                        textNodes.push(node);
                        foundAny = true;
                    }
                }
                // If intersectsNode didn't find anything non-whitespace, fall back
                if (!foundAny || !textNodes.some(n => n.textContent.trim() !== '')) {
                    textNodes.length = 0;
                    throw new Error('intersectsNode found nothing useful, fallback to inRange');
                }
            } catch (err) {
                // Strategy 2: inRange flag — reliable cross-cell table fallback
                try {
                    const walker = document.createTreeWalker(root, NodeFilter.SHOW_TEXT, null, false);
                    let node;
                    let inRange = false;
                    while (node = walker.nextNode()) {
                        const parentTag = node.parentNode && node.parentNode.tagName;
                        if (parentTag === 'SCRIPT' || parentTag === 'STYLE') continue;
                        if (node === startContainer) inRange = true;
                        if (inRange) textNodes.push(node);
                        if (node === endContainer) break;
                    }
                } catch (e2) { /* ignore */ }
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
            // হাইলাইটের পরে stale range reset করো
            selectionRange = null;
            pendingSelectionRange = null;
            contextMenu.style.display = 'none';
        });

        // Add note with popup
        notesOption.addEventListener('click', function() {
            const sidebarNotesContainer = document.getElementById('sidebar-notes-container');
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');
            
            // If right-clicked on already highlighted text, just open its popup
            if (clickedMark) {
                showNotePopup(clickedMark, clickedMark.dataset.selectedText || clickedMark.innerText);
                contextMenu.style.display = 'none';
                return;
            }
            
            // Otherwise, create new highlight with note
            if (selectionRange) {
                try {
                    const selectedText = selectionRange.toString();
                    const newMarks = highlightRange(selectionRange);
                    
                    if (newMarks.length > 0) {
                        const markId = 'mark-' + Date.now();
                        const firstMark = newMarks[0];
                        
                        newMarks.forEach(mk => {
                            mk.setAttribute('data-note', '');
                            mk.dataset.selectedText = selectedText;
                            mk.dataset.markId = markId;
                            
                            mk.addEventListener('click', function(e) {
                                e.stopPropagation();
                                showNotePopup(mk, mk.dataset.selectedText || mk.innerText);
                            });
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
                        
                        if (sidebarNotesContainer) {
                            sidebarNotesContainer.appendChild(noteDiv);
                        }

                        noteDiv.addEventListener('click', () => {
                            // Scroll to the first mark of this group
                            firstMark.scrollIntoView({ behavior: 'smooth', block: 'center' });
                            
                            // Then show the popup
                            setTimeout(() => {
                                showNotePopup(firstMark, firstMark.dataset.selectedText || firstMark.innerText);
                            }, 300);
                        });

                        showNotePopup(firstMark, selectedText);
                    }
                    
                    window.getSelection().removeAllRanges();
                } catch (err) {
                    console.log('Note highlight error:', err);
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
                    
                    // Remove all marks with this ID
                    document.querySelectorAll(`mark[data-mark-id="${markId}"]`).forEach(mk => {
                        mk.replaceWith(document.createTextNode(mk.innerText));
                    });
                } else {
                    // Just a highlight without ID
                    clickedMark.replaceWith(document.createTextNode(clickedMark.innerText));
                }

                // Fragmented text nodes merge করো যাতে পরের highlight কাজ করে
                document.body.normalize();
                
                const notePopup = document.querySelector('.note-popup');
                if (notePopup) notePopup.remove();
                activePopup = null;
                clickedMark = null;
            }
            pendingSelectionRange = null;
            selectionRange = null;
            contextMenu.style.display = 'none';
        });

        // Clear all highlights and notes
        allClearOption.addEventListener('click', function() {
            document.querySelectorAll('mark').forEach(marked => {
                marked.replaceWith(document.createTextNode(marked.innerText));
            });

            document.body.normalize();

            if (activePopup) {
                activePopup.remove();
                activePopup = null;
            }

            document.getElementById('sidebar-notes-container').innerHTML = '';

            const sidebarEl = document.getElementById('sidebar');
            const mainContentEl = document.getElementById('main-content');
            if (sidebarEl) sidebarEl.classList.remove('open');
            if (mainContentEl) mainContentEl.classList.remove('shifted');
            
            contextMenu.style.display = 'none';
        });
        // Function to show note popup for a mark element
        // displayText = user-এর selected text (full), যা popup header-এ দেখাবে
        function showNotePopup(mark, displayText) {
            if (activePopup) {
                activePopup.remove();
                document.removeEventListener('click', handleOutsideClick);
            }

            // displayText না থাকলে mark-এর innerText fallback
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
                const markId = mark.dataset.markId;
                
                // Update all marks in the group
                if (markId) {
                    document.querySelectorAll(`mark[data-mark-id="${markId}"]`).forEach(mk => {
                        mk.dataset.note = textarea.value;
                    });
                    
                    // Update sidebar note content
                    const sidebarItem = document.querySelector(`.sidebar-note-item[data-mark-id="${markId}"]`);
                    if (sidebarItem) {
                        const sidebarNoteContent = sidebarItem.querySelector('.sidebar-note-content');
                        if (sidebarNoteContent) {
                            sidebarNoteContent.textContent = textarea.value;
                        }
                    }
                } else {
                    mark.dataset.note = textarea.value;
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
            let isDragging = false, offsetX, offsetY;
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

        // sync radio buttons with hidden text input
        document.querySelectorAll('.mcq-sync').forEach(function(radio) {
            radio.addEventListener('change', function() {
                const target = radio.getAttribute('data-target');
                if (!target) return;
                const hidden = document.getElementById(target);
                if (hidden) {
                    hidden.value = radio.value;
                    // Trigger input event to update question count
                    hidden.dispatchEvent(new Event('input', { bubbles: true }));
                }
            });
        });

        // Tick Cell Logic for Questions 1-8
        function clearRowSelection(rowNumber) {
            document.querySelectorAll(`.tick-cell[data-row="${rowNumber}"]`).forEach(function(cell) {
                cell.classList.remove('selected');
            });
        }

        function setRowValue(rowNumber, value) {
            const hidden = document.querySelector(`input[name="q${rowNumber}"]`);
            if (hidden) {
                hidden.value = value;
                hidden.dispatchEvent(new Event('input', { bubbles: true }));
                hidden.dispatchEvent(new Event('change', { bubbles: true }));
            }
            clearRowSelection(rowNumber);
            const cell = document.querySelector(`.tick-cell[data-row="${rowNumber}"][data-value="${value}"]`);
            if (cell) cell.classList.add('selected');
        }

        function clearRowValue(rowNumber) {
            const hidden = document.querySelector(`input[name="q${rowNumber}"]`);
            if (hidden) {
                hidden.value = '';
                hidden.dispatchEvent(new Event('input', { bubbles: true }));
                hidden.dispatchEvent(new Event('change', { bubbles: true }));
            }
            clearRowSelection(rowNumber);
        }

        // Logic to activate question link when clicking a row in the matching grid
        document.querySelectorAll('.matching-grid tbody tr').forEach(function(tr) {
            tr.addEventListener('click', function() {
                const tickCell = tr.querySelector('.tick-cell');
                if (!tickCell) return;
                const row = tickCell.getAttribute('data-row');
                const qKey = 'q' + row;
                const linkIndex = allLinks.findIndex(link => link.getAttribute('data-question') === qKey);
                if (linkIndex !== -1) {
                    currentIndex = linkIndex;
                    allLinks.forEach(link => link.classList.remove('active'));
                    allLinks[linkIndex].classList.add('active');
                }
            });
        });

        document.querySelectorAll('.tick-cell').forEach(function(cell) {
            cell.addEventListener('click', function(e) {
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
        [1,2,3,4,5,6,7,8,31,32,33,34,35].forEach(function(i) {
            const hidden = document.querySelector(`input[name="q${i}"]`);
            if (hidden && hidden.value) {
                const val = hidden.value.toUpperCase().trim();
                const cell = document.querySelector(`.tick-cell[data-row="${i}"][data-value="${val}"]`);
                if (cell) cell.classList.add('selected');
            }
        });

        // Replicated from readingClassOne: Robust Scroll Container Detection
        function getScrollContainer(el) {
            if (!el) return null;
            const container = el.closest('.question_site') || el.closest('.scroll-box');
            if (container) return container;

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

        // Replicated from readingClassOne: Exact Scroll to Top logic
        function scrollToVisibleTop(target) {
            if (!target) return;
            const container = getScrollContainer(target);
            const topOffset = 20;

            if (container) {
                // Ensure enough room to scroll (using a smaller value or removing if requested)
                // container.style.paddingBottom = "600px";
                
                const tRect = target.getBoundingClientRect();
                const cRect = container.getBoundingClientRect();
                const delta = (tRect.top - cRect.top);
                const nextTop = container.scrollTop + delta - topOffset;
                
                container.scrollTo({
                    top: Math.max(0, nextTop),
                    behavior: 'smooth'
                });
            } else {
                target.style.scrollMarginTop = '140px';
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        }

        // Replicated from readingClassOne: Ensure the entire expanded block is visible
        function ensureExpandedVisible(collapseEl) {
            if (!collapseEl) return;
            const container = getScrollContainer(collapseEl);
            const padding = 50; 

            setTimeout(() => {
                if (container) {
                    // container.style.paddingBottom = "600px";
                    const cRect = container.getBoundingClientRect();
                    const elRect = collapseEl.getBoundingClientRect();
                    
                    // Logic from Class One: If any part of expanded area is below container's viewable bottom
                    const bottomOverflow = elRect.bottom - cRect.bottom;
                    if (bottomOverflow > 0) {
                        container.scrollTo({
                            top: container.scrollTop + bottomOverflow + padding,
                            behavior: 'smooth'
                        });
                    }
                } else {
                    const elRect = collapseEl.getBoundingClientRect();
                    const bottomOverflow = elRect.bottom - window.innerHeight;
                    if (bottomOverflow > 0) {
                        window.scrollBy({
                            top: bottomOverflow + padding,
                            behavior: 'smooth'
                        });
                    }
                }
            }, 400); 
        }

        // Apply global binding exactly as in Reading Class One
        document.querySelectorAll('.accordion-collapse').forEach((collapseEl) => {
            if (collapseEl.__hexasScrollBound) return;
            collapseEl.__hexasScrollBound = true;
            collapseEl.addEventListener('shown.bs.collapse', function() {
                // Skip autoscroll for Questions 15-22
                if (collapseEl.closest('#q15_22_accordion')) return;

                // Get header element for this collapse
                const headerId = collapseEl.getAttribute('aria-labelledby');
                const header = document.getElementById(headerId) || collapseEl.previousElementSibling;
                if (header) {
                    scrollToVisibleTop(header);
                }
                ensureExpandedVisible(collapseEl);
            });
        });
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
