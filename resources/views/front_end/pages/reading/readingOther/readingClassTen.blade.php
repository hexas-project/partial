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

        /* accordion styles for TRUE/FALSE/NOT GIVEN questions */
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
            text-align: center;
        }

        .matching-grid .tick-cell.selected .tick {
            visibility: visible;
            opacity: 1;
        }

        /* Drag and Drop Styles (Match Class One) */
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

        .dnd-drop-input {
            padding: 0 10px;
            height: 34px;
            width: 150px;
            border: 2px solid #cbd5e1;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 700;
            color: #1e293b;
            text-align: center;
            cursor: pointer;
            display: inline-block;
            background: #f8fafc;
            vertical-align: middle;
            transition: all 0.2s ease;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .dnd-drop-input:hover {
            border-color: #94a3b8;
            background: #fff;
        }

        .dnd-drop-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
    </style>
</head>

<body>
    <form action="{{ route('reading.submit') }}" method="POST" id="testForm" spellcheck="false" autocomplete="off">
        @csrf
        <input type="hidden" name="test_name" value="{{ $testName ?? 'class10_reading' }}">
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
                                <h4 class="text-center mb-3"><strong>Air Pollution</strong></h4>
                                <p><strong>A</strong> Air pollution is increasingly becoming the focus of government and
                                    citizen concern around the globe. From Mexico City and New York, via Singapore and
                                    Tokyo, new solutions to this old problem are being proposed, Mailed and implemented
                                    with ever increasing speed. It is feared that unless pollution reduction measures
                                    are able to keep pace with the continued pressures of urban growth, air quality in
                                    many of the world's major cities will deteriorate beyond reason.</p>
                                <p><strong>B</strong> Action is being taken along several fronts: through new
                                    legislation, improved enforcement and innovative technology. In Los Angeles, state
                                    regulations are forcing manufacturers to try to sell ever cleaner cars: their first
                                    of the cleanest, titled 'Zero Emission Vehicles', have to be available soon, since
                                    they are intended to make up 2 percent of sales in 1997. Local authorities in London
                                    are campaigning to be allowed to enforce anti-pollution laws themselves; at present
                                    only the police have the power to do so, but they tend to be busy elsewhere. In
                                    Singapore, renting out road space to users is the way of the future.</p>
                                <p><strong>C</strong> When Britain's Royal Automobile Club monitored the exhaust of
                                    60,000 vehicles, it found that 12 per cent of them produced more than half the total
                                    pollution. Older cars were the worst offenders, though a sizeable number of quite
                                    new cars were also identified as gross polluters, they were simply badly tuned.
                                    California has developed a scheme to get these gross polluters off the streets: they
                                    offer a flat $700 for any old, run-down vehicle driven in by its owner. The aim is
                                    to remove the heaviest-polluting, most decrepit vehicles from the roads.</p>
                                <p><strong>D</strong> As part of a European Union environmental programme, a London
                                    council is testing an infra-red spectrometer from the University of Denver in
                                    Colorado. It gauges the pollution from a passing vehicle - more useful than the
                                    annual stationary test that is the British standard today - by bouncing a beam
                                    through the exhaust and measuring what gets reflected. The council's next step may
                                    be to link the system to a computerised video camera able to read number plates
                                    automatically.</p>
                                <p><strong>E</strong> The effort to clean up cars may do little to cut pollution if
                                    nothing is done about the tendency to drive them more. Los Angeles has some of the
                                    world's cleanest cars - far better than those of Europe - but the total number of
                                    miles those cars drive continues to grow. One solution is car-pooling, an
                                    arrangement in which a number of people who share the same destination share the use
                                    of one car. However, the average number of people in a car on the freeway in Los
                                    Angeles, which is 1.8, has been falling steadily. Increasing it would be an
                                    effective way of reducing emissions as well as easing congestion. The trouble is,
                                    Los Angelenos seem to like being alone in their cars.</p>
                                <p><strong>F</strong> Singapore has for a while had a scheme that forces drivers to buy
                                    a badge if they wish to visit a certain part of the city. Electronic innovations
                                    make possible increasing sophistication: rates can vary according to road
                                    conditions, time of day and so on. Singapore is pioneering in this direction, with a
                                    city-wide network of transmitters to collect information and charge drivers as they
                                    pass certain points. Such road-pricing, however, can be controversial. When the
                                    local government in Cambridge, England, considered introducing Singaporean
                                    techniques, it faced vocal and ultimately successful opposition.</p>
                                <p><strong>PART 2</strong></p>
                                <p>The scope of the problem facing the world's cities is immense. In 1992, the United
                                    Nations Environmental Programme and the World Health Organisation (WHO) concluded
                                    that all of a sample of twenty megacities - places likely to have more than ten
                                    million inhabitants in the year 2000 - already exceeded the level the WHO deems
                                    healthy in at least one major pollutant. Two-thirds of them exceeded the guidelines
                                    for two, seven for three or more. Of the six pollutants monitored by the WHO -
                                    carbon dioxide, nitrogen dioxide, ozone, sulphur dioxide, lead and particulate
                                    matter - it is this last category that is attracting the most attention from health
                                    researchers.</p>
                                <p>PM10, a sub-category of particulate matter measuring ten-millionths of a meter
                                    across, has been implicated in thousands of deaths a year in Britain alone. Research
                                    being conducted in two counties of Southern California is reaching similarly
                                    disturbing conclusions concerning this little understood pollutant. A world-wide
                                    rise in allergies, particularly asthma, over the past four decades is now said to be
                                    linked with increased air pollution. The lungs and brains of children who grow up in
                                    polluted air offer further evidence of its destructive power the old and ill;
                                    however, are the most vulnerable to the acute effects of heavily polluted stagnant
                                    air. It can actually hasten death, as it did in December 1991 when a cloud of
                                    exhaust fumes lingered over the city of London for over a week. The United Nations
                                    has estimated that in the year 2000 there will be twenty-four mega-cities and a
                                    further eighty-five cities of more than three million people. The pressure on public
                                    officials, corporations and urban citizens to reverse established trends in air
                                    pollution is likely to grow in proportion with the growth of cities themselves.
                                    Progress is being made. The question, though, remains the same: "Will change happen
                                    quickly enough?"</p>
                            </div>
                        </div>
                        <div class="col-md-6 question_site">
                            <h5><strong>Questions 1-5</strong></h5>
                            <p class="small"><em>Look at the following solutions <strong>(Questions 1-5)</strong> and locations <strong>(A-E)</strong>. Choose the correct Location <strong>(A-E)</strong> for each solution.</em></p>
                            
                            <p><strong>NB:</strong> You may use any location more than once.</p>
                            <p class="small"><strong>Locations:</strong></p>
                            <div class="mb-2 small">
                                @php
                                    $locations_map = [
                                        'A' => 'Singapore', 'B' => 'Tokyo', 'C' => 'London',
                                        'D' => 'New York', 'E' => 'Mexico City', 'F' => 'Cambridge',
                                        'G' => 'Los Angeles'
                                    ];
                                @endphp
                                @foreach($locations_map as $letter => $city)
                                    <span class="me-3"><strong>{{ $letter }}.</strong> {{ $city }}</span>
                                @endforeach
                            </div>
                            <div class="mb-3">
                                <table class="matching-grid">
                                    <thead>
                                        <tr>
                                            <th style="width: auto;"></th>
                                            @foreach($locations_map as $letter => $city)
                                                <th class="choice-cell" title="{{ $city }}">{{ $letter }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $solutions = [
                                                1 => 'Manufacturers must sell cleaner cars.',
                                                2 => 'Authorities want to have power to enforce anti-pollution laws.',
                                                3 => 'Drivers will be charged according to the roads they use.',
                                                4 => 'Moving vehicles will be monitored for their exhaust emissions.',
                                                5 => 'Commuters are encouraged to share their vehicle with others.'
                                            ];
                                        @endphp
                                        @foreach($solutions as $i => $text)
                                            <tr>
                                                <td><strong>{{ $i }}</strong> {{ $text }}</td>
                                                @foreach(['A','B','C','D','E','F','G'] as $val)
                                                    <td class="choice-cell tick-cell" data-question="q{{ $i }}"
                                                        data-value="{{ $val }}">
                                                        <span class="tick">✓</span>
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div style="display:none;">
                                    @for($i=1; $i<=5; $i++)
                                        <input type="text" name="q{{ $i }}" id="q{{ $i }}"
                                            value="{{ $answers['q' . $i] ?? '' }}">
                                    @endfor
                                </div>
                            </div>
                            <hr>
                            <h5><strong>Questions 6-10</strong></h5>
                            <p class="small"><em>Choose <strong>YES</strong> if the statement agrees with the
                                    information given in the text, choose <strong>NO</strong> if the statement
                                    contradicts the information, or choose <strong>NOT GIVEN</strong> if there is no
                                    information on this.</em></p>
                            <div class="accordion mt-3" id="q6_10_accordion">
                                @php
                                    $q6_10 = [
                                        6 => 'According to British research, a mere twelve per cent of vehicles tested produced over fifty per cent of total pollution produced by the sample group.',
                                        7 => 'It is currently possible to measure the pollution coming from individual vehicles whilst they are moving.',
                                        8 => 'Residents of Los Angeles are now tending to reduce the yearly distances they travel by car.',
                                        9 => 'Car-pooling has steadily become more popular in Los Angeles in recent years.',
                                        10 => 'Charging drivers for entering certain parts of the city has been successfully done in Cambridge, England.',
                                    ];
                                @endphp
                                @foreach($q6_10 as $i => $qText)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="q{{$i}}_heading">
                                            <div class="accordion-button collapsed" role="button" tabindex="0"
                                                data-bs-toggle="collapse" data-bs-target="#q{{$i}}_collapse"
                                                aria-expanded="false" aria-controls="q{{$i}}_collapse">
                                                <strong>{{$i}}</strong>&nbsp;<span>{{$qText}}</span>
                                            </div>
                                        </h2>
                                        <div id="q{{$i}}_collapse" class="accordion-collapse collapse"
                                            aria-labelledby="q{{$i}}_heading" data-bs-parent="#q6_10_accordion">
                                            <div class="accordion-body">
                                                <div class="form-check"><input class="form-check-input mcq-sync"
                                                        type="radio" name="q{{$i}}_radio" id="q{{$i}}_YES" value="YES"
                                                        data-target="q{{$i}}" {{ ($answers['q' . $i] ?? '') == 'YES' ? 'checked' : '' }}><label class="form-check-label"
                                                        for="q{{$i}}_YES">YES</label></div>
                                                <div class="form-check"><input class="form-check-input mcq-sync"
                                                        type="radio" name="q{{$i}}_radio" id="q{{$i}}_NO" value="NO"
                                                        data-target="q{{$i}}" {{ ($answers['q' . $i] ?? '') == 'NO' ? 'checked' : '' }}><label class="form-check-label" for="q{{$i}}_NO">NO</label>
                                                </div>
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
                            <h5><strong>Questions 11-13</strong></h5>
                            <p class="small"><em>Choose the correct answer</em></p>
                            <div class="accordion mt-3" id="q11_13_accordion">
                                @php
                                    $q11_13 = [
                                        11 => [
                                            'text' => 'How many pollutants currently exceed WHO guidelines in all megacities studied?',
                                            'options' => ['A' => 'one', 'B' => 'two', 'C' => 'three', 'D' => 'seven']
                                        ],
                                        12 => [
                                            'text' => 'Which pollutant is currently the subject of urgent research?',
                                            'options' => ['A' => 'nitrogen dioxide', 'B' => 'ozone', 'C' => 'lead', 'D' => 'particulate matter']
                                        ],
                                        13 => [
                                            'text' => 'Which of the following groups of people are the most severely affected by intense air pollution?',
                                            'options' => ['A' => 'allergy sufferers', 'B' => 'children', 'C' => 'the old and ill', 'D' => 'asthma sufferers']
                                        ],
                                    ];
                                @endphp
                                @foreach($q11_13 as $i => $qData)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="q{{$i}}_heading">
                                            <div class="accordion-button collapsed" role="button" tabindex="0"
                                                data-bs-toggle="collapse" data-bs-target="#q{{$i}}_collapse"
                                                aria-expanded="false" aria-controls="q{{$i}}_collapse">
                                                <strong>{{$i}}</strong>&nbsp;<span>{{$qData['text']}}</span>
                                            </div>
                                        </h2>
                                        <div id="q{{$i}}_collapse" class="accordion-collapse collapse"
                                            aria-labelledby="q{{$i}}_heading" data-bs-parent="#q11_13_accordion">
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
                        </div>
                    </div>
                </div>
                <!-- ===================== PART 2 ===================== -->
                <div class="tab-content" id="part2" style="margin-bottom: 100px;">
                    <div class="question_part">
                        <h4 class="mb-2">Part 2</h4>
                        <p class="mb-0">Read the text below and answer questions 14-26</p>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="scroll-box">
                                <h4 class="text-center mb-3"><strong>Sticking power</strong></h4>
                                <p><strong>A</strong> If Kellar Autumn, an expert in Biomechanics at Clark College in
                                    Portland, Oregon, has his way, the first footprints on Mars won't be human. They'll
                                    belong to a gecko. Gecko feet have legendary sticking power - and the Clark College
                                    scientist would like to see the next generation of Martian robots walking on
                                    gecko-style feet. A gecko can whiz up the smoothest wall and hang from the ceiling
                                    by one foot, with no fear of falling.</p>
                                <p><strong>B</strong> Autumn is one of a long line of researchers who have puzzled over
                                    the gecko's gravity-defying footwork. Earlier this year, he and his colleagues
                                    discovered that the gecko's toes don't just stick, they bond to the surface beneath
                                    them. Engineers are already trying to copy the gecko's technique - but reptilian
                                    feet are not the only ones they are interested in.</p>
                                <p><strong>C</strong> Some of the most persistent 'hanging' creatures are insects. They
                                    can defy not just gravity, but gusts of wind, raindrops and a predator's attempt to
                                    prise them loose. Recent discoveries about how they achieve this could lead to the
                                    development of quick-release adhesives and miniature grippers, ideal for
                                    manipulating microscopic components or holding tiny bits of tissue together during
                                    surgery. "There are lots of ways to make two surfaces stick together, but there are
                                    very few which provide precise and reversible attachment," says Stas Gorb, a
                                    biologist in Tübingen, Germany, working on the problem.</p>
                                <p><strong>D</strong> Geckos and insects have both perfected ways of doing this, and
                                    engineers and scientists would dearly love to know how. Friction certainly plays a
                                    part in assisting horizontal movement, but when the animal is running up a slope,
                                    climbing vertically or travelling upside down, it needs a more powerful adhesive.
                                    Just what that adhesive is has been hotly debated for years. Some people suggested
                                    that insects had micro-suckers. Some reckoned they relied on electrostatic forces.
                                    Others thought that intermolecular forces between pad and leaf might provide a firm
                                    foothold.</p>
                                <p><strong>E</strong> Most of the evidence suggests that insects rely on 'wet adhesion',
                                    hanging on with the help of a thin film of fluid on the bottom of the pad. Insects
                                    often leave tiny trails of oily footprints. Some clearly secrete a fluid onto the
                                    'soles' of their feet. And they tend to lose their footing when they have their feet
                                    cleaned or dried.</p>
                                <p><strong>F</strong> This year, Walter Federle, an entomologist at the University of
                                    Würzburg, showed experimentally that an insect's sticking power depends on a thin
                                    film of liquid under its feet. He placed an ant on a polished turntable inside the
                                    rotor of a centrifuge, and switched it on. At low speeds, the ant carried on walking
                                    unperturbed. But as the scientist slowly increased the speed, the pulling forces
                                    grew stronger and the ant stopped dead, legs spread out and all six feet planted
                                    firmly on the ground. At higher speeds still, the ant's feet began to slide. This
                                    can only be explained by the presence of a liquid," says Federle. "If he had relied
                                    on some form of dry adhesive, his feet would pop abruptly off the surface once the
                                    pull got too strong."</p>
                                <p><strong>G</strong> But the liquid isn't the whole story. What engineers really find
                                    exciting about insect feet is the way they make almost perfect contact with the
                                    surface beneath. "Sticking to a perfectly smooth surface is no big deal," says Gorb.
                                    But in nature, even the smoothest-looking surfaces have microscopic lumps and bumps.
                                    For a footpad to make good contact, it must follow the contours of the landscape
                                    beneath it. Flies, beetles and earwigs have solved the problem with hairy footpads,
                                    with hairs that bend like the bristles of a toothbrush to accommodate the troughs
                                    below.</p>
                                <p><strong>H</strong> Gorb has tested dozens of species with this sort of pad to see
                                    which had the best stick. Flies resist a pull of three or four times their body
                                    weight - perfectly adequate for crossing the ceiling. But beetles can do better, and
                                    the champion is a small blue beetle with oversized yellow feet, found in the
                                    south-eastern parts of the US.</p>
                                <p><strong>I</strong> Tom Eisner, a chemical ecologist at Cornell University in New
                                    York, has been fascinated by this beetle for years. Almost 30 years ago, he
                                    suggested that the beetle clung on tight to avoid being picked off by predators -
                                    ants in particular. When Eisner measured the beetle's sticking power earlier this
                                    year, he found that it can withstand pulling forces of around 80 times its own
                                    weight for about two minutes and astonishing 200 times its own weight for shorter
                                    periods. "The ants give up because the beetle holds on longer than they can be
                                    bothered to attack it," he says</p>
                                <p><strong>J</strong> Whatever liquid insects rely on, the gecko seems able to manage
                                    without it. No one knows quite why the gecko needs so much sticking power. 'It seems
                                    overbuilt for the job,' says Autumn. But whatever the gecko's needs are, its skills
                                    are in demand by humans. Autumn and his colleagues in Oregon have already helped to
                                    create a robot that walks like a gecko. Mecho-Gecko, a robot built by iRobot of
                                    Massachusetts, walks like a lizard - rolling its toes down and peeling them up
                                    again. At the moment, though, it has to make do with balls of glue to give it stick.
                                    The next step is to try to reproduce the hairs on a gecko's toes and create a robot
                                    with the full set of gecko skills. Then we could build robots with feet that stick
                                    without glue, clean themselves and work just as well underwater as in the vacuum of
                                    space, or crawling over the dusty landscape of Mars.</p>
                            </div>
                        </div>

                        <div class="col-md-6 question_site">
                            <h5><strong>Questions 14-18</strong></h5>
                            <p class="small"><em>Look at the following statements <strong>  (Questions 14-18)</strong> and the list of scientists <strong>(A-D)</strong> below. Choose the correct scientist for each statement.</em></p>
                            <p><strong>NB:</strong> You may use any letter more than once.</p>
                            <table class="options-list-table mb-4">
                                <tr>
                                    <td class="opt-label">A</td>
                                    <td>Kellar Autumn</td>
                                </tr>
                                <tr>
                                    <td class="opt-label">B</td>
                                    <td>Stas Gorb</td>
                                </tr>
                                <tr>
                                    <td class="opt-label">C</td>
                                    <td>Walter Federle</td>
                                </tr>
                                <tr>
                                    <td class="opt-label">D</td>
                                    <td>Tom Eisner</td>
                                </tr>
                            </table>

                            <div class="mb-3">
                                <table class="matching-grid">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>A</th>
                                            <th>B</th>
                                            <th>C</th>
                                            <th>D</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $q14_18 = [
                                                14 => 'Some insects use their ability to stick to surfaces as a way of defending themselves.',
                                                15 => 'What makes sticky insect feet special is the fact that they can also detach themselves easily from a surface.',
                                                16 => 'Gecko feet seem to be stickier than they need to be.',
                                                17 => 'A robot with gecko-style feet would be ideal for exploring other planets.',
                                                18 => 'Evidence shows that in order to stick, insect feet have to be wet.',
                                            ];
                                        @endphp
                                        @foreach($q14_18 as $num => $text)
                                            <tr data-question="{{ $num }}">
                                                <td><strong>{{ $num }}</strong> {{ $text }}</td>
                                                @foreach(['A', 'B', 'C', 'D'] as $opt)
                                                    <td class="choice-cell tick-cell" data-row="q{{ $num }}"
                                                        data-value="{{ $opt }}">
                                                        <span class="tick">✓</span>
                                                    </td>
                                                @endforeach
                                                <input type="text" name="q{{ $num }}" id="q{{ $num }}" style="display:none;"
                                                    value="{{ $answers['q' . $num] ?? '' }}">
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                            <h5><strong>Questions 19-22</strong></h5>
                            <p class="small"><em>Reading Passage 2 has ten paragraphs, A-J. Which section contains the following information?</em></p>
                            <p><strong>NB:</strong> You may use any letter more than once.</p>
                            <div class="mb-3">
                                <table class="matching-grid">
                                    <thead>
                                        <tr>
                                            <th style="width: auto;"></th>
                                            @foreach(['A','B','C','D','E','F','G','H','I','J'] as $letter)
                                                <th class="choice-cell">{{ $letter }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $q19_22 = [
                                                19 => 'some of the practical things a gecko-style adhesive could be used for',
                                                20 => 'a description of a test involving an insect in motion',
                                                21 => 'three different theories scientists have had about how insect feet stick',
                                                22 => 'examples of remarkable gecko movements'
                                            ];
                                        @endphp
                                        @foreach($q19_22 as $i => $text)
                                            <tr>
                                                <td><strong>{{ $i }}</strong> {{ $text }}</td>
                                                @foreach(['A','B','C','D','E','F','G','H','I','J'] as $val)
                                                    <td class="choice-cell tick-cell" data-question="q{{ $i }}"
                                                        data-value="{{ $val }}">
                                                        <span class="tick">✓</span>
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div style="display:none;">
                                    @for($i=19; $i<=22; $i++)
                                        <input type="text" name="q{{ $i }}" id="q{{ $i }}"
                                            value="{{ $answers['q' . $i] ?? '' }}">
                                    @endfor
                                </div>
                            </div>
                            <hr>
                            <h5><strong>Questions 23-26</strong></h5>
                            <p class="small"><em>Complete each sentence with the correct ending. Choose the correct ending and move it into the gap.</em></p>

                            <div class="mb-4">
                                @php
                                    $q23_26 = [
                                        23 => 'Insect feet lose their sticking power when they',
                                        24 => 'If you put ants on a rapidly rotating object, their feet',
                                        25 => 'Beetles can stick to uneven surfaces because they',
                                        26 => 'The toes on robots like Mecho-Gecko',
                                    ];
                                @endphp
                                @foreach($q23_26 as $num => $text)
                                    <div class="mb-3 d-flex align-items-center flex-wrap gap-2">
                                        <strong>{{ $num }}</strong>
                                        <span>{{ $text }}</span>
                                        <input type="text" class="dnd-drop-input m-0" data-question="q{{ $num }}"
                                            placeholder="{{ $num }}" readonly style="width: 150px;">
                                        <input type="hidden" name="q{{ $num }}" id="q{{ $num }}"
                                            value="{{ $answers['q' . $num] ?? '' }}">
                                    </div>
                                @endforeach
                            </div>

                            <p class="small"><strong>Endings:</strong></p>
                            <div id="dnd-headings-list-23-26" class="mb-3 d-flex flex-column gap-2">
                                @php
                                    $options23_26 = [
                                        'A' => 'Stick to surfaces in and out of water.',
                                        'B' => 'curl up and down.',
                                        'C' => 'are washed and dried.',
                                        'D' => 'resist a pull of three times their body weight.',
                                        'E' => 'start to slip across the surface.',
                                        'F' => 'leave yellow footprints.',
                                        'G' => 'have hairy footpads.'
                                    ];
                                @endphp
                                @foreach($options23_26 as $letter => $val)
                                    <div class="dnd-heading m-0 w-100" draggable="false" data-value="{{ $letter }}"
                                        data-content="{{ $val }}">{{ $val }}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ===================== PART 3 ===================== -->
                <div class="tab-content" id="part3" style="margin-bottom: 100px;">
                    <div class="question_part">
                        <h4 class="mb-2">Part 3</h4>
                        <p class="mb-0">Read the text below and answer questions 27-40</p>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="scroll-box">
                                <h4 class="text-center mb-3"><strong>THE TRUTH ABOUT THE ENVIRONMENT</strong></h4>
                                <p>For many environmentalists, the world seems to be getting worse. They have developed
                                    a hit-list of our main fears: that natural resources are running out, that the
                                    population is ever growing, leaving less and less to eat, that species are becoming
                                    extinct in vast numbers, and that the planet's air and water are becoming ever more
                                    polluted.</p>
                                <p>But a quick look at the facts shows a different picture. First, energy and other
                                    natural resources have become more abundant, not less so, since the book 'The limits
                                    to Growth' was published in 1972 by a group of scientists. Second, more food is now
                                    produced per head of the world's population than at any time in history. Fewer
                                    people are starving. Third, although species are indeed becoming extinct, only about
                                    0.7% of them are expelled to disappear in the next 50 years, not 25-50%, as has so
                                    often been predicted. And finally, most forms of environmental pollution either
                                    appear to have been exaggerated, or are transient - associated with the early phases
                                    of industrialisation and therefore best cured not by restricting economic growth,
                                    but by accelerating it.</p>
                                <p>One form of pollution - the release of greenhouse gases that causes global warming -
                                    does appear to be a phenomenon that is going to extend well into our future, but its
                                    total impact is unlikely to pose a devastating problem. A bigger problem may well
                                    turn out to be an inappropriate response to it.</p>
                                <p>Yet opinion polls suggest that many people nurture the belief that environmental
                                    standards are declining and four factors seem to cause this disjunction between
                                    perception and reality. One is the lopsidedness built into scientific research.
                                    Scientific funding goes mainly to areas with many problems. That may be wise policy
                                    but it will also create an impression that many more potential problems exist than
                                    is the case.</p>
                                <p>Secondly, environmental groups need to be noticed by the mass media. They also need
                                    to keep the money rolling in. Understandably, perhaps, they sometimes overstate
                                    their arguments. In 1997, for example, the World Wide Fund for Nature issued a press
                                    release entitled: 'Two thirds of the world's forests lost forever'. The truth turns
                                    out to be nearer 20%.</p>
                                <p>Though these groups are run overwhelmingly by selfless folk, they nevertheless share
                                    many of the characteristics of other lobby groups. That would matter less if people
                                    applied the same degree of skepticism to environmental lobbying as they do to lobby
                                    groups in other fields. A trade organisation arguing for, say, weaker pollution
                                    control is instantly seen as self-interested. Yet a green organisation opposing such
                                    a weakening is seen as altruistic, even if an impartial view of the controls in
                                    question might suggest they are doing more harm than good.</p>
                                <p>A third source of confusion is the attitude of the media. People are dearly more
                                    curious about bad news than good. Newspapers and broadcasters are there to provide
                                    what the public wants: That, however, can lead to significant distortions of
                                    perception. An example was America's encounter with El Nino in 1997 and 1998. This
                                    climatic phenomenon was accused of wrecking tourism, causing allergies, melting the
                                    ski-slopes, and causing 22 deaths. However, according to an article in the Bulletin
                                    of the American Meteorological Society, the damage it did was estimated at US$4
                                    billion but the benefits amounted to some US$19 billion. These came from higher
                                    winter temperatures (which saved an estimated 850 lives, reduced heating costs and
                                    diminished spring floods caused by melt waters).</p>
                                <p>The fourth factor is poor individual perception. People worry that the endless rise
                                    in the amount of stuff everyone throws away will cause the world to run out of
                                    places to dispose of waste. Yet, even if America's trash output continues to rise as
                                    it has done in the past, and even if the American population doubles by 2100, all
                                    the rubbish America produces through the entire 21st century will still take up only
                                    one-12,000th of the area of the entire United States.</p>
                                <p>So what of global warming? As we know, carbon dioxide emissions are causing the
                                    planet to warm. The best estimates are that the temperatures will rise by 2-3°C in
                                    this century, causing considerable problems, at a total cost of US$5,000 billion.
                                </p>
                                <p>Despite the intuition that something drastic needs to be done about such a costly
                                    problem, economic analyses dearly show it will be far more expensive to cut carbon
                                    dioxide emissions radically than to pay the costs of adaptation to the increased
                                    temperatures. A model by one of the main authors of the United Nations Climate
                                    Change Panel shows how an expected temperature increase of 2.1 degrees in 2100 would
                                    only be diminished to an increase of 1.9 degrees. Or to put it another way, the
                                    temperature increase that the planet would have experienced in 2094 would be
                                    postponed to 2100.</p>
                                <p>So this does not prevent global warming, but merely buys the world six years. Yet the
                                    cost of reducing carbon dioxide emissions, for the United States alone, will be
                                    higher than the cost of solving the world's single, most pressing health problem:
                                    providing universal access to clean drinking water and sanitation. Such measures
                                    would avoid 2 million deaths every year, and prevent half a billion people from
                                    becoming seriously ill. It is crucial that we look at the facts if we want to make
                                    the best possible decisions for the future. It may be costly to be overly optimistic
                                    - but more costly still to be too pessimistic.</p>
                            </div>
                        </div>

                        <div class="col-md-6 question_site">
                            <h5><strong>Questions 27-32</strong></h5>
                            <p class="small"><em>Choose <strong>YES</strong> if the statement agrees with the
                                    information given in the text, choose <strong>NO</strong> if the statement
                                    contradicts the information, or choose <strong>NOT GIVEN</strong> if there is no
                                    information on this.</em></p>
                            <div class="accordion mt-3" id="q27_32_accordion">
                                @php
                                    $q27_32 = [
                                        27 => 'Environmentalists take a pessimistic view of the world for a number of reasons.',
                                        28 => 'Data on the Earth\'s natural resources has only been collected since 1972.',
                                        29 => 'The number of starving people in the world has increased in recent years.',
                                        30 => 'Extinct species are being replaced by new species.',
                                        31 => 'Some pollution problems have been correctly linked to industrialisation.',
                                        32 => 'It would be best to attempt to slow down economic growth.',
                                    ];
                                @endphp
                                @foreach($q27_32 as $i => $qText)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="q{{$i}}_heading">
                                            <div class="accordion-button collapsed" role="button" tabindex="0"
                                                data-bs-toggle="collapse" data-bs-target="#q{{$i}}_collapse"
                                                aria-expanded="false" aria-controls="q{{$i}}_collapse">
                                                <strong>{{$i}}</strong>&nbsp;<span>{{$qText}}</span>
                                            </div>
                                        </h2>
                                        <div id="q{{$i}}_collapse" class="accordion-collapse collapse"
                                            aria-labelledby="q{{$i}}_heading" data-bs-parent="#q27_32_accordion">
                                            <div class="accordion-body">
                                                <div class="form-check"><input class="form-check-input mcq-sync"
                                                        type="radio" name="q{{$i}}_radio" id="q{{$i}}_YES" value="YES"
                                                        data-target="q{{$i}}" {{ ($answers['q' . $i] ?? '') == 'YES' ? 'checked' : '' }}><label class="form-check-label"
                                                        for="q{{$i}}_YES">YES</label></div>
                                                <div class="form-check"><input class="form-check-input mcq-sync"
                                                        type="radio" name="q{{$i}}_radio" id="q{{$i}}_NO" value="NO"
                                                        data-target="q{{$i}}" {{ ($answers['q' . $i] ?? '') == 'NO' ? 'checked' : '' }}><label class="form-check-label" for="q{{$i}}_NO">NO</label>
                                                </div>
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
                            <h5><strong>Questions 33-37</strong></h5>
                            <p class="small"><em>Choose the correct answer.</em></p>
                            <div class="accordion mt-3" id="q33_37_accordion">
                                @php
                                    $q33_37 = [
                                        33 => [
                                            'text' => 'What aspect of scientific research does the writer express concern about in paragraph 4?',
                                            'options' => [
                                                'A' => 'the need to produce results',
                                                'B' => 'the lack of financial support',
                                                'C' => 'the selection of areas to research',
                                                'D' => 'the desire to solve every research problem'
                                            ]
                                        ],
                                        34 => [
                                            'text' => 'The writer quotes from the Worldwide Fund for Nature to illustrate how',
                                            'options' => [
                                                'A' => 'influential the mass media can be.',
                                                'B' => 'effective environmental groups can be.',
                                                'C' => 'the mass media can help groups raise funds.',
                                                'D' => 'environmental groups can exaggerate their claims.'
                                            ]
                                        ],
                                        35 => [
                                            'text' => 'What is the writer\'s main point about lobby groups in paragraph 6?',
                                            'options' => [
                                                'A' => 'Some are more active than others.',
                                                'B' => 'Some are better organised than others.',
                                                'C' => 'Some receive more criticism than others.',
                                                'D' => 'Some support more important issues than others.'
                                            ]
                                        ],
                                        36 => [
                                            'text' => 'The writer suggests that newspapers print items that are intended to',
                                            'options' => [
                                                'A' => 'educate readers.',
                                                'B' => 'meet their readers\' expectations.',
                                                'C' => 'encourage feedback from readers.',
                                                'D' => 'mislead readers.'
                                            ]
                                        ],
                                        37 => [
                                            'text' => 'What does the writer say about America\'s waste problem?',
                                            'options' => [
                                                'A' => 'It will increase in line with population growth.',
                                                'B' => 'It is not as important as we have been led to believe.',
                                                'C' => 'It has been reduced through public awareness of the issues.',
                                                'D' => 'It is only significant in certain areas of the country.'
                                            ]
                                        ],
                                    ];
                                @endphp
                                @foreach($q33_37 as $i => $qData)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="q{{$i}}_heading">
                                            <div class="accordion-button collapsed" role="button" tabindex="0"
                                                data-bs-toggle="collapse" data-bs-target="#q{{$i}}_collapse"
                                                aria-expanded="false" aria-controls="q{{$i}}_collapse">
                                                <strong>{{$i}}</strong>&nbsp;<span>{{$qData['text']}}</span>
                                            </div>
                                        </h2>
                                        <div id="q{{$i}}_collapse" class="accordion-collapse collapse"
                                            aria-labelledby="q{{$i}}_heading" data-bs-parent="#q33_37_accordion">
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
                            <h5><strong>Questions 38-40</strong></h5>
                            <p class="small"><em>Complete the summary using the list of words. Choose the correct word and move it into the gap.</em></p>

                            <div id="dnd-headings-list-part3" class="mb-3 d-flex flex-wrap gap-2">
                                @php
                                    $options38_40 = [
                                        'A' => 'unrealistic',
                                        'B' => 'agreed',
                                        'C' => 'expensive',
                                        'D' => 'right',
                                        'E' => 'long-term',
                                        'F' => 'usual',
                                        'G' => 'surprising',
                                        'H' => 'personal',
                                        'I' => 'urgent'
                                    ];
                                @endphp
                                @foreach($options38_40 as $letter => $word)
                                    <div class="dnd-heading m-0" draggable="false" data-value="{{ $word }}"
                                        data-content="{{ $word }}">{{ $word }}</div>
                                @endforeach
                            </div>

                            <p class="small"><strong>GLOBAL WARMING</strong></p>
                            <p class="small">
                                The writer admits that global warming is a
                                <span class="d-inline-block align-middle mx-1">
                                    <input type="text" class="dnd-drop-input m-0" data-question="q38" placeholder="38"
                                        readonly style="width: 120px;">
                                    <input type="hidden" name="q38" id="q38" value="{{ $answers['q38'] ?? '' }}">
                                </span>
                                challenge, but says that it will not have a catastrophic impact on our future, if we
                                deal with it in the
                                <span class="d-inline-block align-middle mx-1">
                                    <input type="text" class="dnd-drop-input m-0" data-question="q39" placeholder="39"
                                        readonly style="width: 120px;">
                                    <input type="hidden" name="q39" id="q39" value="{{ $answers['q39'] ?? '' }}">
                                </span>
                                way. If we try to reduce the levels of greenhouse gases, he believes that it would only
                                have a minimal impact on rising temperatures. He feels it would be better to spend money
                                on the more
                                <span class="d-inline-block align-middle mx-1">
                                    <input type="text" class="dnd-drop-input m-0" data-question="q40" placeholder="40"
                                        readonly style="width: 120px;">
                                    <input type="hidden" name="q40" id="q40" value="{{ $answers['q40'] ?? '' }}">
                                </span>
                                health problem of providing the world's population with clean drinking water.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Navigation -->
            <div class="fixed-bottom d-flex justify-content-end mb-5 px-5" style="gap: 5px;">
                <button id="prev-question" type="button" class="btn btn-dark" style="font-size: 1.5rem;"><span
                        class="material-icons-outlined">arrow_back</span></button>
                <button id="next-question" type="button" class="btn btn-dark" style="font-size: 1.5rem;"><span
                        class="material-icons-outlined">arrow_forward</span></button>
            </div>
            <div class="fixed-bottom px-5"
                style="bottom: 10px; background: #fff; padding-top: 5px;">
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

        // When an accordion button (Q6-10) is clicked, activate the matching question number in the nav panel
        document.querySelectorAll('#q6_10_accordion .accordion-button').forEach(button => {
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

        // When an accordion button (Q27-32) is clicked, activate the matching question number in the nav panel
        document.querySelectorAll('#q27_32_accordion .accordion-button').forEach(button => {
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

        // When an accordion button (Q11-13) is clicked, activate the matching question number in the nav panel
        document.querySelectorAll('#q11_13_accordion .accordion-button').forEach(button => {
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

                // Auto-scroll on click
                setTimeout(() => {
                    this.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }, 350);
            });
        });

        // When an accordion button (Q33-37) is clicked, activate the matching question number in the nav panel
        document.querySelectorAll('#q33_37_accordion .accordion-button').forEach(button => {
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

        // Matching Grid logic
        function clearRowSelection(rowId) {
            document.querySelectorAll(`.tick-cell[data-row="${rowId}"]`).forEach(function (cell) {
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

        document.querySelectorAll('.tick-cell').forEach(function (cell) {
            cell.addEventListener('click', function () {
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

        // When a grid row is clicked, activate the matching question number in the nav panel
        document.querySelectorAll('.matching-grid tbody tr').forEach(tr => {
            tr.addEventListener('click', function (e) {
                // If the click was on a tick-cell, setRowValue already handles the nav sync
                if (e.target.closest('.tick-cell')) return;

                const qNum = this.getAttribute('data-question');
                if (!qNum) return;
                const qId = 'q' + qNum;
                const linkIndex = allLinks.findIndex(link => link.getAttribute('data-question') === qId);
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

    <script>
        // Drag and Drop Logic for Part 3 (Questions 38-40)
        document.addEventListener('DOMContentLoaded', function () {
            var dndDraggedEl = null;
            var dndGhost = null;
            var dndSourceInput = null;

            // Remove native draggable from headings
            document.querySelectorAll('.dnd-heading').forEach(function (el) {
                el.setAttribute('draggable', 'false');
            });

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
                var text = headingEl.textContent;
                var qName = dropInput.getAttribute('data-question');

                // If input already has a value, restore the old heading back to list
                var oldVal = dropInput.getAttribute('data-placed-value');
                if (oldVal) {
                    var isPart3 = ['q38','q39','q40'].includes(qName);
                    var oldContainer = isPart3
                        ? document.getElementById('dnd-headings-list-part3')
                        : document.getElementById('dnd-headings-list-23-26');
                    var oldH = oldContainer
                        ? oldContainer.querySelector('.dnd-heading[data-value="' + oldVal + '"]')
                        : document.querySelector('.dnd-heading[data-value="' + oldVal + '"]');
                    if (oldH) {
                        oldH.classList.remove('used');
                        oldH.style.display = '';
                    }
                }

                // Set value in the visible drop input
                dropInput.value = text;
                dropInput.setAttribute('data-placed-value', val);
                dropInput.style.width = '120px';
                dropInput.style.border = 'none';
                dropInput.style.boxShadow = '0 2px 8px rgba(0,0,0,0.15)';

                // Hide heading from list
                headingEl.classList.add('used');
                headingEl.style.display = 'none';

                // Sync hidden input
                var hidden = document.getElementById(qName);
                if (hidden) {
                    hidden.value = val;
                    hidden.dispatchEvent(new Event('input', { bubbles: true }));
                    hidden.dispatchEvent(new Event('change', { bubbles: true }));
                }

                // Sync with nav panel
                if (typeof allLinks !== 'undefined' && typeof setActiveQuestion === 'function') {
                    const linkIndex = allLinks.findIndex(link => link.getAttribute('data-question') === qName);
                    if (linkIndex !== -1) {
                        currentIndex = linkIndex;
                        allLinks.forEach(link => link.classList.remove('active'));
                        allLinks[linkIndex].classList.add('active');
                    }
                }

                if (typeof updateQuestionCount === 'function') updateQuestionCount();
            }

            // Clear drop input on double-click
            document.querySelectorAll('.dnd-drop-input').forEach(function (dropInput) {
                dropInput.addEventListener('dblclick', function () {
                    var oldVal = dropInput.getAttribute('data-placed-value');
                    if (oldVal) {
                        var dblQName = dropInput.getAttribute('data-question');
                        var isPart3 = ['q38','q39','q40'].includes(dblQName);
                        var dblContainer = isPart3
                            ? document.getElementById('dnd-headings-list-part3')
                            : document.getElementById('dnd-headings-list-23-26');
                        var h = dblContainer
                            ? dblContainer.querySelector('.dnd-heading[data-value="' + oldVal + '"]')
                            : document.querySelector('.dnd-heading[data-value="' + oldVal + '"]');
                        if (h) {
                            h.classList.remove('used');
                            h.style.display = '';
                        }
                    }
                    dropInput.value = '';
                    dropInput.removeAttribute('data-placed-value');
                    dropInput.style.width = '120px';
                    dropInput.style.border = '1px solid #ccc';
                    dropInput.style.boxShadow = 'none';

                    var qName = dropInput.getAttribute('data-question');
                    var hidden = document.getElementById(qName);
                    if (hidden) {
                        hidden.value = '';
                        hidden.dispatchEvent(new Event('input', { bubbles: true }));
                        hidden.dispatchEvent(new Event('change', { bubbles: true }));
                    }
                    if (typeof updateQuestionCount === 'function') updateQuestionCount();
                });

                // Also sync navigation on click
                dropInput.addEventListener('click', function () {
                    const qName = this.getAttribute('data-question');
                    if (typeof allLinks !== 'undefined' && typeof setActiveQuestion === 'function') {
                        const linkIndex = allLinks.findIndex(link => link.getAttribute('data-question') === qName);
                        if (linkIndex !== -1) {
                            currentIndex = linkIndex;
                            allLinks.forEach(link => link.classList.remove('active'));
                            allLinks[linkIndex].classList.add('active');
                        }
                    }
                });
            });

            // Start drag from heading list
            document.querySelectorAll('.dnd-heading').forEach(function (el) {
                el.addEventListener('mousedown', function (e) {
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

            // Start drag from a filled drop input
            document.querySelectorAll('.dnd-drop-input').forEach(function (inp) {
                inp.addEventListener('mousedown', function (e) {
                    var placedVal = inp.getAttribute('data-placed-value');
                    if (!placedVal) return;
                    e.preventDefault();

                    var mdQName = inp.getAttribute('data-question');
                    var mdIsPart3 = ['q38','q39','q40'].includes(mdQName);
                    var mdContainer = mdIsPart3
                        ? document.getElementById('dnd-headings-list-part3')
                        : document.getElementById('dnd-headings-list-23-26');
                    var heading = mdContainer
                        ? mdContainer.querySelector('.dnd-heading[data-value="' + placedVal + '"]')
                        : document.querySelector('.dnd-heading[data-value="' + placedVal + '"]');
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
                var allInps = document.querySelectorAll('.dnd-drop-input');

                for (var i = 0; i < allInps.length; i++) {
                    var inp = allInps[i];
                    inp.style.borderColor = '#ccc';
                    inp.style.background = '#fff';

                    var rect = inp.getBoundingClientRect();
                    if (e.clientX >= rect.left && e.clientX <= rect.right && e.clientY >= rect.top && e.clientY <= rect.bottom) {
                        if (dndSourceInput && dndSourceInput !== inp) {
                            dndSourceInput.value = '';
                            dndSourceInput.removeAttribute('data-placed-value');
                            dndSourceInput.style.width = '120px';
                            dndSourceInput.style.border = '1px solid #ccc';
                            dndSourceInput.style.boxShadow = 'none';
                            var srcQ = dndSourceInput.getAttribute('data-question');
                            var srcHidden = document.getElementById(srcQ);
                            if (srcHidden) {
                                srcHidden.value = '';
                                srcHidden.dispatchEvent(new Event('change', { bubbles: true }));
                            }
                        }
                        // Make heading visible again before placing (dndPlaceHeading will hide it)
                        dndDraggedEl.classList.remove('used');
                        dndDraggedEl.style.display = '';
                        dndPlaceHeading(inp, dndDraggedEl);
                        droppedOnInput = true;
                        break; // CRITICAL: Stop once we find the target input
                    }
                }

                if (!droppedOnInput && dndSourceInput) {
                    dndDraggedEl.classList.remove('used');
                    dndDraggedEl.style.display = '';
                    dndSourceInput.value = '';
                    dndSourceInput.removeAttribute('data-placed-value');
                    dndSourceInput.style.width = '120px';
                    dndSourceInput.style.border = '1px solid #ccc';
                    dndSourceInput.style.boxShadow = 'none';
                    var qName = dndSourceInput.getAttribute('data-question');
                    var hidden = document.getElementById(qName);
                    if (hidden) {
                        hidden.value = '';
                        hidden.dispatchEvent(new Event('change', { bubbles: true }));
                    }
                    if (typeof updateQuestionCount === 'function') updateQuestionCount();
                }

                if (dndDraggedEl) dndDraggedEl.classList.remove('dragging');
                dndDraggedEl = null;
                dndSourceInput = null;
            });

            // Restore saved values for D&D questions
            ['q23', 'q24', 'q25', 'q26', 'q38', 'q39', 'q40'].forEach(function (qName) {
                var hidden = document.getElementById(qName);
                if (!hidden || !hidden.value) return;
                var val = hidden.value.trim();

                // For q38-40 the stored value is the word itself; for q23-26 it's a letter
                var container = ['q38','q39','q40'].includes(qName)
                    ? document.getElementById('dnd-headings-list-part3')
                    : document.getElementById('dnd-headings-list-23-26');
                var heading = container
                    ? container.querySelector('.dnd-heading[data-value="' + val + '"]')
                    : document.querySelector('.dnd-heading[data-value="' + val + '"]');
                var dropInput = document.querySelector('.dnd-drop-input[data-question="' + qName + '"]');

                if (!heading || !dropInput) return;

                var text = heading.textContent;
                heading.classList.add('used');
                heading.style.display = 'none';
                dropInput.value = text;
                dropInput.setAttribute('data-placed-value', val);

                dropInput.style.width = '120px';
                dropInput.style.border = 'none';
                dropInput.style.boxShadow = '0 2px 8px rgba(0,0,0,0.15)';
            });
        });

        // ---------------------------------------------------------
        // Matching Grid Logic for Part 1 (Questions 1-5)
        // ---------------------------------------------------------
        document.addEventListener('DOMContentLoaded', function () {
            function setRowValue(qName, val) {
                const hidden = document.getElementById(qName);
                if (hidden) {
                    hidden.value = val;
                    hidden.dispatchEvent(new Event('input', { bubbles: true }));
                    hidden.dispatchEvent(new Event('change', { bubbles: true }));
                }
                if (typeof updateQuestionCount === 'function') updateQuestionCount();
            }

            function clearRowValue(qName) {
                const hidden = document.getElementById(qName);
                if (hidden) {
                    hidden.value = '';
                    hidden.dispatchEvent(new Event('input', { bubbles: true }));
                    hidden.dispatchEvent(new Event('change', { bubbles: true }));
                }
                document.querySelectorAll(`.tick-cell[data-question="${qName}"]`).forEach(c => c.classList.remove('selected'));
                if (typeof updateQuestionCount === 'function') updateQuestionCount();
            }

            document.querySelectorAll('.tick-cell').forEach(cell => {
                cell.addEventListener('click', function () {
                    const qName = this.getAttribute('data-question');
                    const val = this.getAttribute('data-value');
                    
                    // Nav panel sync
                    if (typeof allLinks !== 'undefined') {
                        const linkIndex = allLinks.findIndex(link => link.getAttribute('data-question') === qName);
                        if (linkIndex !== -1) {
                            currentIndex = linkIndex;
                            allLinks.forEach(link => link.classList.remove('active'));
                            allLinks[linkIndex].classList.add('active');
                        }
                    }

                    if (this.classList.contains('selected')) {
                        clearRowValue(qName);
                        return;
                    }

                    document.querySelectorAll(`.tick-cell[data-question="${qName}"]`).forEach(c => c.classList.remove('selected'));
                    this.classList.add('selected');
                    setRowValue(qName, val);
                });
            });

            // Initialize ticks on load for all grid questions
            const gridQuestions = [...new Set([...document.querySelectorAll('.tick-cell')].map(c => c.getAttribute('data-question')))];
            gridQuestions.forEach(qName => {
                const hidden = document.getElementById(qName);
                if (hidden && hidden.value) {
                    const val = hidden.value.toUpperCase().trim();
                    const cell = document.querySelector(`.tick-cell[data-question="${qName}"][data-value="${val}"]`);
                    if (cell) cell.classList.add('selected');
                }
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