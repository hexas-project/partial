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

        /* Remove border from input fields when focused */
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
            line-height: inherit;
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

        /* accordion styles for Part 2 & 3 */
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

        #finishButton:hover {
            color: white !important;
            border-color: black !important;
        }
        input[type="text"]:focus::placeholder {
            color: transparent;
        }

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
        #startModal #startTestButton { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none; padding: 12px 40px; font-size: 15px; font-weight: 600; border-radius: 8px; transition: all 0.3s; box-shadow: 0 4px 15px rgba(102,126,234,0.3); text-transform: uppercase; letter-spacing: 1px; color: white; }
        #startModal #startTestButton:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(102,126,234,0.4); opacity: 0.9; }

        #prev-question, #next-question {
            z-index: 2050 !important;
            pointer-events: auto !important;
        }
    </style>

</head>

<body>
    <form action="{{ route('reading.submit') }}" method="POST" id="testForm" spellcheck="false" autocomplete="off">
        @csrf

        {{-- hidden input  --}}
        <input type="hidden" name="test_name" value="class12_reading">
        <input type="hidden" name="student_id" value="{{ auth()->id() ?? session('student_batch_id') }}">
        <input type="hidden" name="exam_student_id" id="examStudentIdField"
            value="{{ session('exam_student_id', '') }}">
        <!-- Sidebar -->
        <div id="sidebar" class="sidebar">
            <div class="sidebar-header"
                style="background: #f8f9fa; border-bottom: 1px solid #ddd; padding: 10px 15px; display: flex; justify-content: space-between; align-items: center;">
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
                                <span id="noteToggle" class="material-icons-outlined" style="cursor: pointer;">note_alt</span>
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
                <div id="allClear" style="padding: 5px; cursor: pointer;">🗑️ Clear all</div>
            </div>

            <!-- ===================== READING TEST ===================== -->
            <div class="container-fluid px-5">
                <!-- ===================== PART 1 ===================== -->
                <div class="tab-content active" id="part1" style="margin-bottom: 80px;">
                    <div class="question_part">
                        <h4 class="mb-2">Part 1</h4>
                        <p class="mb-0">Read the text below and answer questions 1-12</p>
                    </div>

                    <div class="mt-4">
                        <div class="row">
                            <!-- Column 1: Passage -->
                            <div class="col-md-6">
                                <div class="scroll-box" style="text-align:left;">
                                    <h4><strong>Scientists Are Mapping the World's Largest Volcano</strong></h4>

                                    <p><strong>(A)</strong> After 36 days of battling sharks that kept biting their equipment, scientists have returned from the remote Pacific Ocean with a new way of looking at the world’s largest - and possibly most mysterious - volcano, Tamu Massif.</p>
                                    <p><strong>(B)</strong> The team has begun making 3-D maps that offer the clearest look yet at the underwater mountain, which covers an area the size of New Mexico. In the coming months, the maps will be refined and the data analyzed, with the ultimate goal of figuring out how the mountain was formed.</p>
                                    <p><strong>(C)</strong> It’s possible that the western edge of Tamu Massif is actually a separate mountain that formed at a different time, says William Sager, a geologist at the University of Houston who led the expedition. That would explain some differences between the western part of the mountain and the main body.</p>
                                    <p><strong>(D)</strong> The team also found that the massif (as such a massive mountain is known) is highly pockmarked with craters and cliffs. Magnetic analysis provides some insight into the mountain’s genesis, suggesting that part of it formed through steady releases of lava along the intersection of three mid-ocean ridges, while part of it is harder to explain. A working theory is that a large plume of hot mantle rock may have contributed additional heat and material, a fairly novel idea.</p>
                                    <p><strong>(E)</strong> Tamu Massif lies about 1,000 miles (1,600 kilometers) east of Japan. It is a rounded dome, or shield volcano, measuring 280 by 400 miles (450 by 650 kilometers). Its top lies more than a mile (about 2,000 meters) below the ocean surface and is 50 times larger than the biggest active volcano on Earth, Hawaii’s Mauna Loa. Sager published a paper in 2013 that said the main rise of Tamu Massif is most likely a single volcano, instead of a complex of multiple volcanoes that smashed together. But he couldn't explain how something so big formed.</p>
                                    <p><strong>(F)</strong> The team used sonar and magnetometers (which measure magnetic fields) to map more than a million square kilometers of the ocean floor in great detail. Sager and students teamed up with Masao Nakanishi of Japan’s Chiba University, with Sager receiving funding support from the National Geographic Society and the Schmidt Ocean Institute.</p>
                                    <p><strong>(G)</strong> Since sharks are attracted to magnetic fields, the toothy fish “were all over our magnetometer, and it got pretty chomped up,” says Sager. When the team replaced the device with a spare, that unit was nearly ripped off by more sharks. The magnetic field research suggests the mountain formed relatively quickly, sometime around 145 million years ago. Part of the volcano sports magnetic "stripes," or bands with different magnetic properties, suggesting that lava flowed out evenly from the mid-ocean ridges over time and changed in polarity each time Earth's magnetic field reversed direction. The central part of the peak is more jumbled, so it may have formed more quickly or through a different process.</p>
                                    <p><strong>(H)</strong> Sager isn't sure what caused the magnetic anomalies yet, but suspects more complex forces were at work than simply eruptions from the ridges. It's possible a deep plume of hot rock from the mantle also contributed to the volcano's formation, he says. Sager hopes the analysis will also help explain about a dozen other similar features on the ocean floor, as well as add to the overall understanding of plate tectonics.</p>
                                </div>
                            </div>

                            <!-- Column 2: Questions -->
                            <div class="col-md-6 question_site">

                                <!-- Q1-8 Paragraph Matching -->
                                <h3><strong>Questions 1 - 8</strong></h3>
                                <p><em>Reading Passage 1 has 8 paragraphs (A–H). Which paragraph contains the following information?</em></p>
                                <p><strong>NB:</strong> You may use any letter more than once.</p>

                                <div class="mt-3">
                                    <table class="matching-grid">
                                        <thead>
                                            <tr>
                                                <th style="width: auto;"></th>
                                                @foreach (range('A', 'H') as $char)
                                                    <th class="choice-cell">{{ $char }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $questions_1_8 = [
                                                    1 => "Possible explanation of the differences between parts of the mountain",
                                                    2 => "Size data",
                                                    3 => "A new way of looking",
                                                    4 => "Problem with sharks",
                                                    5 => "Uncertainty of the anomalies",
                                                    6 => "Equipment which measures magnetic fields",
                                                    7 => "The start of making maps",
                                                    8 => "A working theory"
                                                ];
                                            @endphp
                                            @foreach ($questions_1_8 as $num => $text)
                                                <tr id="qrow_{{ $num }}">
                                                    <td><strong>{{ $num }}</strong> {{ $text }}</td>
                                                    @foreach (range('A', 'H') as $char)
                                                        <td class="choice-cell tick-cell" data-row="{{ $num }}" data-value="{{ $char }}">
                                                            <span class="tick">✓</span>
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @foreach (range(1, 8) as $num)
                                        <input type="hidden" name="q{{ $num }}" value="{{ $answers['q' . $num] ?? '' }}">
                                    @endforeach
                                </div>

                                <!-- Q9-12 Sentence Completion -->
                                <div class="mt-5">
                                    <h3><strong>Questions 9 - 12</strong></h3>
                                    <p><em>Complete the sentences using <strong>NO MORE THAN TWO WORDS</strong> from the passage.</em></p>
                                   

                                    <div class="mt-3">
                                        <div class="mb-2"> A large plume of 
                                            <input type="text" name="q9" id="9" placeholder="9" style="width: 200px;"> rock may have contributed additional heat and material.
                                        </div>
                                        <div class="mb-2"> Tamu Massif is a 
                                            <input type="text" name="q10" id="10" placeholder="10" style="width: 200px;"> or shield volcano.
                                        </div>
                                        <div class="mb-2"> Replacing the device with a 
                                            <input type="text" name="q11" id="11" placeholder="11" style="width: 200px;"> didn't help, as that unit was nearly ripped off by more sharks.
                                        </div>
                                        <div class="mb-2"> Sager believes that the magnetic anomalies were caused by something more than 
                                            <input type="text" name="q12" id="12" placeholder="12" style="width: 200px;"> from the ridges.
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- ===================== PART 2 ===================== -->
                <div class="tab-content" id="part2" style="margin-bottom: 80px;">
                    <div class="question_part">
                        <h4 class="mb-2">Part 2</h4>
                        <p class="mb-0">Read the text below and answer questions 13-28</p>
                    </div>

                    <div class="mt-4">
                        <div class="row">
                            <!-- Column 1: Passage -->
                            <div class="col-md-6">
                                <div class="scroll-box" style="text-align:left;">
                                    <h4><strong>We know the city where HIV first emerged</strong></h4>
                                    <p>
                                        It is easy to see why AIDS seemed so mysterious and frightening when US medics first encountered it 35 years ago. The condition robbed young, healthy people of their strong immune system, leaving them weak and vulnerable. And it seemed to come out of nowhere.
                                        <br /><br />
                                        Today we know much more how and why HIV – the virus that leads to AIDS – has become a global pandemic. Unsurprisingly, sex workers unwittingly played a part. But no less important were the roles of trade, the collapse of colonialism, and 20th Century sociopolitical reform
                                        <br /><br />
                                        HIV did not really appear out of nowhere, of course. It probably began as a virus affecting monkeys and apes in west central Africa.
                                        <br /><br />
                                        From there it jumped species into humans on several occasions, perhaps because people ate infected bushmeat. Some people carry a version of HIV closely related to that seen in sooty mangabey monkeys, for instance. But HIV that came from monkeys has not become a global problem.
                                        <br /><br />
                                        We are more closely related to apes, like gorillas and chimpanzees, than we are to monkeys. But even when HIV has passed into human populations from these apes, it has not necessarily turned into a widespread health issue.
                                        <br /><br />
                                        HIV originating from apes typically belongs to a type of virus called HIV-1. One is called HIV-1 group O, and human cases are largely confined to west Africa.
                                        <br /><br />
                                        In fact, only one form of HIV has spread far and wide after jumping to humans. This version, which probably originated from chimpanzees, is called HIV-1 group M (for "major"). More than 90% of HIV infections belong to group M. Which raises an obvious question: what's so special about HIV-1 group M? A study published in 2014 suggests a surprising answer: there might be nothing particularly special about group M.?
                                        <br /><br />
                                        It is not especially infectious, as you might expect. Instead, it seems that this form of HIV simply took advantage of events. "Ecological rather than evolutionary factors drove its rapid spread," says Nuno Faria at the University of Oxford in the UK.
                                        <br /><br />
                                        Faria and his colleagues built a family tree of HIV, by looking at a diverse array of HIV genomes collected from about 800 infected people from central Africa.
                                        <br /><br />
                                        Genomes pick up new mutations at a fairly steady rate, so by comparing two genome sequences and counting the differences they could work out when the two last shared a common ancestor. This technique is widely used, for example to establish that our common ancestor with chimpanzees lived at least 7 million years ago.
                                        <br /><br />
                                        "RNA viruses such as HIV evolve approximately 1 million times faster than human DNA," says Faria. This means the HIV "molecular clock" ticks very fast indeed.
                                        <br /><br />
                                        It ticks so fast, Faria and his colleagues found that the HIV genomes all shared a common ancestor that existed no more than 100 years ago. The HIV-1 group M pandemic probably first began in the 1920s.
                                        <br /><br />
                                        Then the team went further. Because they knew where each of the HIV samples had been collected, they could place the origin of the pandemic in a specific city: Kinshasa, now the capital of the Democratic Republic of Congo.
                                        <br /><br />
                                        At this point, the researchers changed tack. They turned to historical records to work out why HIV infections in an African city in the 1920s could ultimately spark a pandemic.
                                        <br /><br />
                                        A likely sequence of events quickly became obvious. In the 1920s, DR Congo was a Belgian colony and Kinshasa – then known as Leopoldville – had just been made the capital. The city became a very attractive destination for young working men seeking their fortunes, and for sex workers only too willing to help them spend their earnings. The virus spread quickly through the population.
                                        <br /><br />
                                        It did not remain confined to the city. The researchers discovered that the capital of the Belgian Congo was, in the 1920s, one of the best connected cities in Africa. Taking full advantage of an extensive rail network used by hundreds of thousands of people each year, the virus spread to cities 900 miles (1500km) away in just 20 years.
                                        <br /><br />
                                        Everything was in place for an explosion in infection rates in the 1960s. The beginning of that decade brought another change.
                                        <br /><br />
                                        Belgian Congo gained its independence, and became an attractive source of employment to French speakers elsewhere in the world, including Haiti. When these young Haitians returned home a few years later they took a particular form of HIV-1 group M, called "subtype B", to the western side of the Atlantic.
                                        <br /><br />
                                        It arrived in the US in the 1970s, just as sexual liberation and homophobic attitudes were leading to concentrations of gay men in cosmopolitan cities like New York and San Francisco. Once more, HIV took advantage of the sociopolitical situation to spread quickly through the US and Europe.
                                        <br /><br />
                                        "There is no reason to believe that other subtypes would not have spread as quickly as subtype B, given similar ecological circumstances," says Faria.
                                        <br /><br />
                                        The story of the spread of HIV is not over yet.
                                        <br /><br />
                                        For instance, in 2015 there was an outbreak in the US state of Indiana, associated with drug injecting.
                                        <br /><br />
                                        The US Centers for Disease Control and Prevention has been analyzing the HIV genome sequences and data about location and time of infection, says Yonatan Grad at the Harvard School of Public Health in Boston, Massachusetts. "These data help to understand the extent of the outbreak, and will further help to understand when public health interventions have worked.
                                        <br /><br />
                                        "This approach can work for other pathogens. In 2014, Grad and his colleague Marc Lipsitch published an investigation into the spread of drug-resistant gonorrhoea across the US.
                                        <br /><br />
                                        "Because we had representative sequences from individuals in different cities at different times and with different sexual orientations, we could show the spread was from the west of the country to the east," says Lipsitch.
                                        <br /><br />
                                        What's more, they could confirm that the drug-resistant form of gonorrhoea appeared to have circulated predominantly in men who have sex with men. That could prompt increased screening in these at-risk populations, in an effort to reduce further spread.
                                        <br /><br />
                                        In other words, there is real power to studying pathogens like HIV and gonorrhoea through the prism of human society.
                                    </p>
                                </div>
                            </div>

                            <!-- Column 2: Questions -->
                            <div class="col-md-6 question_site">

                                <!-- Q13-20 TRUE/FALSE/NOT GIVEN -->
                                <h3><strong>Questions 13 - 20</strong></h3>
                                                               <p class="small"><em>Choose <strong>TRUE</strong> if the statement agrees with the information given in the text, choose <strong>FALSE</strong> if the statement contradicts the information, or choose <strong>NOT GIVEN</strong> if there is no information on this.</em></p>

                                <div class="accordion mt-3" id="q13_20_accordion">
                                    @for ($i = 13; $i <= 20; $i++)
                                    @php
                                        $qText = match($i) {
                                            13 => "AIDS were first encountered 35 years ago.",
                                            14 => "The most important role in developing AIDS as a pandemic was played by sex workers.",
                                            15 => "It is believed that HIV appeared out of nowhere.",
                                            16 => "Humans are not closely related to monkey.",
                                            17 => "HIV-1 group O originated in 1920s.",
                                            18 => "HIV-1 group M has something special.",
                                            19 => "Human DNA evolves approximately 1 million times slower than HIV.",
                                            20 => "Scientists believe that HIV already existed in 1920s.",
                                        };
                                    @endphp
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="q{{$i}}_heading">
                                            <div class="accordion-button collapsed" role="button" tabindex="0" data-bs-toggle="collapse"
                                                data-bs-target="#q{{$i}}_collapse" aria-expanded="false" aria-controls="q{{$i}}_collapse">
                                                <strong>{{$i}}</strong>&nbsp;<span>{{$qText}}</span>
                                            </div>
                                        </h2>
                                        <div id="q{{$i}}_collapse" class="accordion-collapse collapse" aria-labelledby="q{{$i}}_heading"
                                            data-bs-parent="#q13_20_accordion">
                                            <div class="accordion-body">
                                                <div class="form-check"><input class="form-check-input mcq-sync" type="radio" name="q{{$i}}_radio" id="q{{$i}}_TRUE" value="TRUE" data-target="q{{$i}}" {{ ($answers['q'.$i] ?? '') == 'TRUE' ? 'checked' : '' }}><label class="form-check-label" for="q{{$i}}_TRUE">TRUE</label></div>
                                                <div class="form-check"><input class="form-check-input mcq-sync" type="radio" name="q{{$i}}_radio" id="q{{$i}}_FALSE" value="FALSE" data-target="q{{$i}}" {{ ($answers['q'.$i] ?? '') == 'FALSE' ? 'checked' : '' }}><label class="form-check-label" for="q{{$i}}_FALSE">FALSE</label></div>
                                                <div class="form-check"><input class="form-check-input mcq-sync" type="radio" name="q{{$i}}_radio" id="q{{$i}}_NG" value="NOT GIVEN" data-target="q{{$i}}" {{ ($answers['q'.$i] ?? '') == 'NOT GIVEN' ? 'checked' : '' }}><label class="form-check-label" for="q{{$i}}_NG">NOT GIVEN</label></div>
                                                <input type="text" name="q{{$i}}" id="{{$i}}" style="display:none;" value="{{ $answers['q'.$i] ?? '' }}" />
                                            </div>
                                        </div>
                                    </div>
                                    @endfor
                                </div>

                                <!-- Q21-28 Sentence Completion -->
                                <div class="mt-5">
                                    <h3><strong>Questions 21 - 28</strong></h3>
                                    <p><em>Complete the sentences below.</em></p>
                                    <p><em>Write <strong>NO MORE THAN TWO WORDS</strong> from the passage for each answer.</em></p>
                                    

                                    <div class="mt-3">
                                        <div class="mb-2"> Scientists can place the origin of <input type="text" name="q21" id="21" placeholder="21" style="width: 200px;"> in a specific city.</div>
                                        <div class="mb-2"> Kinshasa was a very <input type="text" name="q22" id="22" placeholder="22" style="width: 200px;"> for young working men and many others willing to spend their money.</div>
                                        <div class="mb-2"> In just 20 years virus managed to <input type="text" name="q23" id="23" placeholder="23" style="width: 200px;"> to cities 900 miles away.</div>
                                        <div class="mb-2"> Belgian Congo became an attractive source of employment to French speakers when it gained <input type="text" name="q24" id="24" placeholder="24" style="width: 200px;">.</div>
                                        <div class="mb-2"> HIV has spread quickly through the US and Europe because of the <input type="text" name="q25" id="25" placeholder="25" style="width: 200px;">.</div>
                                        <div class="mb-2"> It is said that outbreak in Indiana was associated with <input type="text" name="q26" id="26" placeholder="26" style="width: 200px;">.</div>
                                        <div class="mb-2"> The same approach as for HIV can work for <input type="text" name="q27" id="27" placeholder="27" style="width: 200px;">.</div>
                                        <div class="mb-2"><strong>28</strong> The form of gonorrhoea that is drug-resistant appeared to have <input type="text" name="q28" id="28" placeholder="28" style="width: 200px;"> in men who have sex with men.</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- ===================== PART 3 ===================== -->
                <div class="tab-content" id="part3" style="margin-bottom: 80px;">
                    <div class="question_part">
                        <h4 class="mb-2">Part 3</h4>
                        <p class="mb-0">Read the text below and answer questions 29-40</p>
                    </div>

                    <div class="mt-4">
                        <div class="row">
                            <!-- Column 1: Passage -->
                            <div class="col-md-6">
                                <div class="scroll-box" style="text-align:left;">
                                    <h4><strong>Penguins' anti-ice trick revealed</strong></h4>

                                    <p>
                                        Scientists studying penguins' feathers have revealed how the birds stay ice free when hopping in and out of below zero waters in the Antarctic. A combination of nano-sized pores and an extra water repelling preening oil the birds secrete is thought to give Antarctic penguins' feathers super hydrophobic properties. Researchers in the US made the discovery using Scanning Electron Microscopy (SEM) to study penguin feathers in extreme detail. Antarctic penguins live in one of Earth's most extreme environments, facing temperatures that drop to -40C, winds with speeds of 40 meters per second and water that stays around -2.2C. But even in these sub-zero conditions, the birds manage to prevent ice from coating their feathers.
                                        <br /><br />
                                        “They are an amazing species, living in extreme conditions, and great swimmers. Basically they are living engineering marvels,” says research team member Dr Pirouz Kavehpour, professor of Mechanical and Aerospace Engineering at the University of California, Los Angeles (UCLA). Birds’ feathers are known to have hydrophobic, or non-wetting, properties. But scientists from UCLA, University of Massachusetts Amherst and SeaWorld, wanted to know what makes Antarctic penguins’ feathers extra ice repelling.
                                        <br /><br />
                                        “What we learn here is how penguins combine oil and nano-structures on the feathers to produce this effect to perfection,” explains Kavehpour. By analysing feathers from different penguin species, the researchers discovered Antarctic species the gentoo penguin (Pygoscelis papua) was more super hydrophobic compared with a species found in warmer climes – the Magellanic penguin (Spheniscus magellanicus) – whose breeding sites include Argentinian desert.
                                        <br /><br />
                                        Gentoo penguins’ feathers contained tiny pores which trapped air, making the surface hydrophobic. And they were smothered with a special preening oil, produced by a gland near the base of the tail, with which the birds cover themselves. Together, these properties mean that in the wild, droplets of water on Antarctic penguins’ super hydrophobic feathers bead up on the surface like spheres – formations that, according to the team, could provide geometry that delays ice formation, since heat cannot easily flow out of the water if the droplet only has minimal contact with the surface of the feather.
                                        <br /><br />
                                        “The shape of the droplet on the surface dictates the delay in freezing,” explains Kavehpour. The water droplets roll off the penguin’s feathers before they have time to freeze, the researchers propose. Penguins living in the Antarctic are highly evolved to cope with harsh conditions: their short outer feathers overlap to make a thick protective layer over fluffier feathers which keep them warm. Under their skin, a thick layer of fat keeps them insulated. The flightless birds spend a lot of time in the sea and are extremely agile and graceful swimmers, appearing much more awkward on land.
                                        <br /><br />
                                        Kavehpour was inspired to study Antarctic penguins’ feathers after watching the birds in a nature documentary: “I saw these birds moving in and out of water, splashing everywhere. Yet there is no single drop of frozen ice sticking to them,” he tells BBC Earth. His team now hopes its work could aid design of better man-made surfaces which minimise frost formation.
                                        <br /><br />
                                        “I would love to see biomimicking of these surfaces for important applications, for example, de-icing of aircrafts,” says Kavehpour. Currently, airlines spend a lot of time and money using chemical de-icers on aeroplanes, as ice can alter the vehicles’ aerodynamic properties and can even cause them to crash.
                                    </p>
                                </div>
                            </div>

                            <!-- Column 2: Questions -->
                            <div class="col-md-6 question_site">

                                <!-- Q29-33 Multiple Choice -->
                                <h3><strong>Questions 29 - 33</strong></h3>
                                <p><em>Choose the correct answer</em></p>
                                

                                <div class="accordion mt-3" id="q29_33_accordion">
                                    @php
                                        $q29_33 = [
                                            29 => [
                                                'text' => 'Penguins stay ice free due to:',
                                                'options' => [
                                                    'A' => 'A combination of nano-sized pores',
                                                    'B' => 'An extra water repelling preening oil',
                                                    'C' => 'A combination of nano-sized pores and an extra water repelling preening oil',
                                                    'D' => 'A combination of various factors'
                                                ]
                                            ],
                                            30 => [
                                                'text' => 'Antarctic penguins experience extreme weather conditions, including:',
                                                'options' => [
                                                    'A' => 'Low temperature, that can drop to -40',
                                                    'B' => 'Severe wind, up to 40 meters per second',
                                                    'C' => 'Below zero water temperature',
                                                    'D' => 'All of the above'
                                                ]
                                            ],
                                            31 => [
                                                'text' => 'In line 5 words engineering marvels mean:',
                                                'options' => [
                                                    'A' => 'That penguins are very intelligent',
                                                    'B' => 'That penguins are good swimmers',
                                                    'C' => 'That penguins are well prepared to living in severe conditions',
                                                    'D' => 'Both B and C'
                                                ]
                                            ],
                                            32 => [
                                                'text' => 'Penguis feather has everything, EXCEPT:',
                                                'options' => [
                                                    'A' => 'Hydrophobic properties',
                                                    'B' => 'Extra ice repelling',
                                                    'C' => 'Soft structures',
                                                    'D' => 'Oil structures'
                                                ]
                                            ],
                                            33 => [
                                                'text' => 'The gentoo penguin:',
                                                'options' => [
                                                    'A' => 'Is less superhydrophobic compared to the Magellanic penguin',
                                                    'B' => 'Has feathers that contain tiny pores',
                                                    'C' => 'Can\'t swim',
                                                    'D' => 'Lives in Argentinian desert'
                                                ]
                                            ]
                                        ];
                                    @endphp
                                    @foreach($q29_33 as $i => $qData)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="q{{$i}}_heading">
                                            <div class="accordion-button collapsed" role="button" tabindex="0" data-bs-toggle="collapse"
                                                data-bs-target="#q{{$i}}_collapse" aria-expanded="false" aria-controls="q{{$i}}_collapse">
                                                <strong>{{$i}}.</strong>&nbsp;<span>{{$qData['text']}}</span>
                                            </div>
                                        </h2>
                                        <div id="q{{$i}}_collapse" class="accordion-collapse collapse" aria-labelledby="q{{$i}}_heading"
                                            data-bs-parent="#q29_33_accordion">
                                            <div class="accordion-body">
                                                @foreach($qData['options'] as $val => $optText)
                                                <div class="form-check">
                                                    <input class="form-check-input mcq-sync" type="radio" name="q{{$i}}_radio" id="q{{$i}}_{{$val}}" value="{{$val}}" data-target="q{{$i}}" {{ ($answers['q'.$i] ?? '') == $val ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="q{{$i}}_{{$val}}">{{ $optText }}</label>
                                                </div>
                                                @endforeach
                                                <input type="text" name="q{{$i}}" id="{{$i}}" style="display:none;" value="{{ $answers['q'.$i] ?? '' }}" />
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                                <!-- Q34-40 Sentence Completion -->
                                <div class="mt-5">
                                    <h3><strong>Questions 34 - 40</strong></h3>
                                    <p><em>Complete the sentences below.</em></p>
                                    <p><em>Write <strong>ONLY ONE WORD</strong> from the passage for each answer.</em></p>
                                    

                                    <div class="mt-3">
                                        <div class="mb-2"> Formations like <input type="text" name="q34" id="34" placeholder="34" style="width: 200px;"> could provide geometry that delays ice formation.</div>
                                        <div class="mb-2"> The delay in freezing is dictated by the <input type="text" name="q35" id="35" placeholder="35" style="width: 200px;"> of the droplet.</div>
                                        <div class="mb-2"> Penguins in Antarctic are highly evolved to be able to cope with <input type="text" name="q36" id="36" placeholder="36" style="width: 200px;"> conditions.</div>
                                        <div class="mb-2"> Penguins are insulated by a <input type="text" name="q37" id="37" placeholder="37" style="width: 200px;"> layer of fat.</div>
                                        <div class="mb-2"> On the land, penguins appear much more <input type="text" name="q38" id="38" placeholder="38" style="width: 200px;"> than in the sea.</div>
                                        <div class="mb-2"> The inspiration came to Kavehpour after watching a <input type="text" name="q39" id="39" placeholder="39" style="width: 200px;"> about penguins.</div>
                                        <div class="mb-2"> Kavehpour would like to see <input type="text" name="q40" id="40" placeholder="40" style="width: 200px;"> surfaces which minimise frost formation.</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ===================== END READING TEST ===================== -->

        </div>

    </form>
    <!-- Start Test Modal -->
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

    <!-- Navigation Tabs -->
    <div class="tabs fixed-bottom" style="background-color: white; margin:0px; margin-top: 100px;">
        <div class="tab active" data-tab="part1">
            <span class="tab-title">Part 1</span>
            <div class="question-links">
                @for ($i = 1; $i <= 12; $i++)
                    <a href="#" class="question-link" data-question="{{$i}}">{{$i}}</a>
                @endfor
            </div>
            <span class="question-placeholder">1 of 12</span>
        </div>
        <div class="tab" data-tab="part2">
            <span class="tab-title">Part 2</span>
            <div class="question-links">
                @for ($i = 13; $i <= 28; $i++)
                    <a href="#" class="question-link" data-question="{{$i}}">{{$i}}</a>
                @endfor
            </div>
            <span class="question-placeholder">13 of 28</span>
        </div>
        <div class="tab" data-tab="part3">
            <span class="tab-title">Part 3</span>
            <div class="question-links">
                @for ($i = 29; $i <= 40; $i++)
                    <a href="#" class="question-link" data-question="{{$i}}">{{$i}}</a>
                @endfor
            </div>
            <span class="question-placeholder">29 of 40</span>
        </div>
    </div>

    <!-- Navigation Arrows -->
    <div class="fixed-bottom d-flex justify-content-end mb-5 px-5" style="gap: 5px;">
        <button id="prev-question" type="button" class="btn btn-dark" style="font-size: 1.5rem;">
            <span class="material-icons-outlined">arrow_back</span>
        </button>
        <button id="next-question" type="button" class="btn btn-dark" style="font-size: 1.5rem;">
            <span class="material-icons-outlined">arrow_forward</span>
        </button>
    </div>

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
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                }
            });
        });

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

        const allLinks = Array.from(document.querySelectorAll('.question-link'));
        let currentIndex = 0;

        function setActiveQuestionLink(qNum) {
            if (!qNum) return;
            const qStr = String(qNum);
            allLinks.forEach(l => l.classList.remove('active'));
            const link = allLinks.find(l => l.getAttribute('data-question') === qStr);
            if (link) link.classList.add('active');
        }

        function activateTabForQuestion(num) {
            const label = document.getElementById(num);
            if (!label) return;

            const partContent = label.closest('.tab-content');
            if (!partContent) return;

            // Switch Part
            if (!partContent.classList.contains('active')) {
                document.querySelectorAll('.tab-content').forEach(tc => tc.classList.remove('active'));
                partContent.classList.add('active');

                const targetTabId = partContent.id;
                document.querySelectorAll('.tab').forEach(tab => {
                    const qLinks = tab.querySelector('.question-links');
                    const qPlaceholder = tab.querySelector('.question-placeholder');
                    if (tab.getAttribute('data-tab') === targetTabId) {
                        tab.classList.add('active');
                        qLinks.style.display = 'flex';
                        qPlaceholder.style.display = 'none';
                    } else {
                        tab.classList.remove('active');
                        qLinks.style.display = 'none';
                        qPlaceholder.style.display = 'block';
                    }
                });
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }

            // Highlight Active Link
            setActiveQuestionLink(num);

            // Expand Accordion if nested
            const collapseEl = label.closest('.accordion-collapse');
            if (collapseEl) {
                const bsCollapse = bootstrap.Collapse.getOrCreateInstance(collapseEl);
                bsCollapse.show();
            }

            // Scroll in question_site
            const questionSite = partContent.querySelector('.question_site');
            if (questionSite) {
                setTimeout(() => {
                    let targetToScroll = label;
                    
                    // Special case for matching grid row
                    const gridRow = document.getElementById('qrow_' + num);
                    if (gridRow) {
                        targetToScroll = gridRow;
                    } else {
                        const accordionItem = label.closest('.accordion-item');
                        if (accordionItem) targetToScroll = accordionItem;
                        else {
                            const parentDiv = label.closest('.mb-2, .mb-3, div');
                            if (parentDiv) targetToScroll = parentDiv;
                        }
                    }

                    const targetOffset = targetToScroll.offsetTop;
                    questionSite.scrollTo({
                        top: targetOffset - 10,
                        behavior: 'smooth'
                    });
                }, 300);
            }
        }

        allLinks.forEach((link, idx) => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                currentIndex = idx;
                const qNum = link.getAttribute('data-question');
                activateTabForQuestion(qNum);
                const targetEl = document.getElementById(qNum);
                if (targetEl) targetEl.focus();
            });
        });

        document.getElementById('next-question').addEventListener('click', () => {
            if (currentIndex < allLinks.length - 1) {
                currentIndex++;
                allLinks[currentIndex].click();
            }
        });

        document.getElementById('prev-question').addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
                allLinks[currentIndex].click();
            }
        });

        // Accordion → nav panel sync (Q13-20)
        document.querySelectorAll('#q13_20_accordion .accordion-button').forEach(button => {
            button.addEventListener('click', function() {
                const target = this.getAttribute('data-bs-target');
                if (!target) return;
                const qNum = target.replace('#q', '').replace('_collapse', '');
                const linkIndex = allLinks.findIndex(link => link.getAttribute('data-question') === qNum);
                if (linkIndex !== -1) {
                    currentIndex = linkIndex;
                    allLinks.forEach(link => link.classList.remove('active'));
                    allLinks[linkIndex].classList.add('active');
                }
            });
        });

        // Accordion → nav panel sync (Q29-33)
        document.querySelectorAll('#q29_33_accordion .accordion-button').forEach(button => {
            button.addEventListener('click', function() {
                const target = this.getAttribute('data-bs-target');
                if (!target) return;
                const qNum = target.replace('#q', '').replace('_collapse', '');
                const linkIndex = allLinks.findIndex(link => link.getAttribute('data-question') === qNum);
                if (linkIndex !== -1) {
                    currentIndex = linkIndex;
                    allLinks.forEach(link => link.classList.remove('active'));
                    allLinks[linkIndex].classList.add('active');
                }
            });
        });
    </script>

    <!-- Timer and Modal JS -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
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
            }

            // Enter key on student ID input triggers START TEST button
            const studentIdInputEl = document.getElementById('studentIdInput');
            if (studentIdInputEl && startButton) {
                studentIdInputEl.addEventListener('keydown', function(event) {
                    if (event.key === 'Enter') {
                        event.preventDefault();
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
    </script>

    <!-- sidebar js code  -->
    <script>
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
            
            if (target && target.tagName === 'MARK') {
                clickedMark = target;
            }

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
            selectionRange = null;
            pendingSelectionRange = null;
            contextMenu.style.display = 'none';
        });

        // Add note with popup
        notesOption.addEventListener('click', function() {
            const sidebarNotesContainer = document.getElementById('sidebar-notes-container');
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');
            
            if (clickedMark) {
                showNotePopup(clickedMark, clickedMark.dataset.selectedText || clickedMark.innerText);
                contextMenu.style.display = 'none';
                return;
            }
            
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
                            firstMark.scrollIntoView({ behavior: 'smooth', block: 'center' });
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

        // Clear single highlight
        clearOption.addEventListener('click', function() {
            if (clickedMark) {
                const markId = clickedMark.dataset.markId;
                if (markId) {
                    const sidebarItem = document.querySelector(`.sidebar-note-item[data-mark-id="${markId}"]`);
                    if (sidebarItem) sidebarItem.remove();
                    
                    document.querySelectorAll(`mark[data-mark-id="${markId}"]`).forEach(mk => {
                        mk.replaceWith(document.createTextNode(mk.innerText));
                    });
                } else {
                    clickedMark.replaceWith(document.createTextNode(clickedMark.innerText));
                }
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

        // Clear all
        allClearOption.addEventListener('click', function() {
            document.querySelectorAll('mark').forEach(marked => {
                marked.replaceWith(document.createTextNode(marked.innerText));
            });
            document.body.normalize();
            pendingSelectionRange = null;
            selectionRange = null;
            clickedMark = null;

            const notePopup = document.querySelector('.note-popup');
            if (notePopup) notePopup.remove();
            activePopup = null;

            const sidebarNotesContainer = document.getElementById('sidebar-notes-container');
            if (sidebarNotesContainer) sidebarNotesContainer.innerHTML = '';

            // Close the Notes & Highlights sidebar
            const sidebarEl = document.getElementById('sidebar');
            const mainContentEl = document.getElementById('main-content');
            if (sidebarEl) sidebarEl.classList.remove('open');
            if (mainContentEl) mainContentEl.classList.remove('shifted');

            contextMenu.style.display = 'none';
        });

        // showNotePopup
        function showNotePopup(mark, displayText) {
            if (activePopup) {
                activePopup.remove();
                document.removeEventListener('click', handleOutsideClick);
            }
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

            notePopup.querySelector('.close-note').addEventListener('click', () => {
                notePopup.remove();
                activePopup = null;
                document.removeEventListener('click', handleOutsideClick);
            });

            const textarea = notePopup.querySelector('textarea');
            function updateNote() {
                const markId = mark.dataset.markId;
                if (markId) {
                    document.querySelectorAll(`mark[data-mark-id="${markId}"]`).forEach(mk => {
                        mk.dataset.note = textarea.value;
                    });
                    const sidebarItem = document.querySelector(`.sidebar-note-item[data-mark-id="${markId}"]`);
                    if (sidebarItem) {
                        const sidebarNoteContent = sidebarItem.querySelector('.sidebar-note-content');
                        if (sidebarNoteContent) sidebarNoteContent.textContent = textarea.value;
                    }
                } else {
                    mark.dataset.note = textarea.value;
                }
            }
            textarea.addEventListener('input', updateNote);
            textarea.addEventListener('blur', updateNote);
            
            setTimeout(() => {
                textarea.focus();
                const length = textarea.value.length;
                textarea.setSelectionRange(length, length);
                textarea.scrollTop = textarea.scrollHeight;
            }, 100);

            const popupHeader = notePopup.querySelector('.popup-header');
            popupHeader.addEventListener('input', () => {
                const markId = mark.dataset.markId;
                if (markId) {
                    const sidebarItem = document.querySelector(`.sidebar-note-item[data-mark-id="${markId}"]`);
                    if (sidebarItem) {
                        const sidebarText = sidebarItem.querySelector('div');
                        if (sidebarText) sidebarText.textContent = popupHeader.innerText;
                    }
                }
            });
            
            let isDragging = false, offsetX, offsetY;
            const dragHandle = notePopup.querySelector('.drag-handle');
            dragHandle.addEventListener('mousedown', (e) => {
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
            document.addEventListener('mouseup', () => { isDragging = false; });
            setTimeout(() => { document.addEventListener('click', handleOutsideClick); }, 0);
        }

        function handleOutsideClick(e) {
            if (activePopup && !activePopup.contains(e.target) && e.target.tagName !== 'MARK') {
                activePopup.remove();
                activePopup = null;
                document.removeEventListener('click', handleOutsideClick);
            }
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('#testForm input');
            inputs.forEach(function(input) {
                input.setAttribute('autocomplete', 'off');
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const examIdField = document.getElementById('examStudentIdField');
            const storedExamId = sessionStorage.getItem('examStudentId') || '';
            if (examIdField && storedExamId) {
                examIdField.value = storedExamId;
            }

            const startBtn = document.getElementById('startTestButton');
            if (startBtn && examIdField) {
                startBtn.addEventListener('click', function() {
                    const sid = document.getElementById('modalStudentId') ? document.getElementById('modalStudentId').value.trim() : '';
                    if (sid) sessionStorage.setItem('examStudentId', sid);
                    const v = sessionStorage.getItem('examStudentId') || '';
                    if (v) examIdField.value = v;
                });
            }

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
                testForm.addEventListener('submit', function() {
                    if (autosaveDebounceTimer) {clearTimeout(autosaveDebounceTimer); autosaveDebounceTimer = null;}
                    flushDirtyInputs();
                }, true);
            }

            document.querySelectorAll('input[type="radio"], input[type="checkbox"]').forEach(input => {
                input.addEventListener('change', function() { markDirty(this); });
            });
            document.querySelectorAll('input[type="text"]').forEach(input => {
                input.addEventListener('input', function() { markDirty(this); });
                input.addEventListener('change', function() { markDirty(this); });
            });

            // Highlight Active Link on focus/input for text fields
            document.querySelectorAll('input[type="text"]').forEach(input => {
                input.addEventListener('focus', function() {
                    const qNum = this.name.replace('q', '');
                    if (qNum) setActiveQuestionLink(qNum);
                });
                input.addEventListener('input', function() {
                    const qNum = this.name.replace('q', '');
                    if (qNum) setActiveQuestionLink(qNum);
                });
            });

            const savedAnswers = @json($answers ?? []);
            Object.keys(savedAnswers || {}).forEach(function(qNum) {
                const value = savedAnswers[qNum];
                if (value === null || value === undefined) return;
                const strVal = String(value);
                if (strVal.trim() === '') return;
                const name = 'q' + qNum;

                document.querySelectorAll(`input[name="${name}"]`).forEach(inp => {
                    if (inp.type === 'text' || inp.type === 'hidden') inp.value = strVal;
                });
                document.querySelectorAll(`input[name="${name}_radio"][value="${CSS.escape(strVal)}"], input[name="${name}"][value="${CSS.escape(strVal)}"]`).forEach(r => r.checked = true);
            });

            document.querySelectorAll('.mcq-sync').forEach(function(radio) {
                radio.addEventListener('change', function() {
                    const target = radio.getAttribute('data-target');
                    if (!target) return;
                    const hidden = document.querySelector(`input[name="${target}"]`);
                    if (hidden) { hidden.value = radio.value; hidden.dispatchEvent(new Event('change')); }
                    
                    // Highlight Active Link in footer
                    const qNum = target.replace('q', '');
                    setActiveQuestionLink(qNum);
                });
            });

            // Matching Grid logic
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
                
                // Highlight Active Link in footer
                setActiveQuestionLink(rowNumber);
            }

            document.querySelectorAll('.tick-cell').forEach(function(cell) {
                cell.addEventListener('click', function() {
                    const row = cell.getAttribute('data-row');
                    const val = cell.getAttribute('data-value');
                    if (!row || !val) return;
                    if (cell.classList.contains('selected')) {
                        const hidden = document.querySelector(`input[name="q${row}"]`);
                        if (hidden) { hidden.value = ''; hidden.dispatchEvent(new Event('change')); }
                        clearRowSelection(row);
                        return;
                    }
                    setRowValue(row, val);
                });
            });

            // Init Tick Grid for Q1-8
            @foreach(range(1, 8) as $i)
                (function() {
                    const hidden = document.querySelector('input[name="q{{$i}}"]');
                    if (hidden && hidden.value) {
                        const val = hidden.value.toUpperCase().trim();
                        const cell = document.querySelector('.tick-cell[data-row="{{$i}}"][data-value="' + val + '"]');
                        if (cell) cell.classList.add('selected');
                    }
                })();
            @endforeach
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
