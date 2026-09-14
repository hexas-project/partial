<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Writing</title>
    
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
            height: 85px;
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

        /* Darker backdrop for start modal */
        .modal-backdrop.show {
            opacity: 0.85;
            background-color: #000;
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
            content: "✍️";
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

            word-wrap: break-word;
            font-size: 16px;
        }

        .question_site {
            height: 70vh;
            overflow-y: auto;
            overflow-x: hidden;

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
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
        <div class="sidebar-header">
            <h5>Notes</h5>
            <span class="close-btn">&times;</span>
        </div>

    </div>
    <div id="main-content">
        <form action="{{ route('writing.submit') }}" method="POST" id="taskoneClassFour" spellcheck="false" autocomplete="off">
            @csrf
            <input type="hidden" name="student_id" value="{{ auth()->id() ?? session('student_batch_id') }}">
            <input type="hidden" name="test_name" value="class28_writing">
            <input type="hidden" name="exam_student_id" id="examStudentIdField" value="">
            <input type="hidden" name="redirect_to" value="student.dashboard">
            <input type="hidden" name="assignment_id" value="{{ $assignmentId ?? '' }}">

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
                                    <strong id="timer">60 minutes remaining</strong>
                                </a>
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
                        <h4>Task 1</h4>
                        <p> You should spend about 20 minutes on this task. Write at least 150 words.</p>
                    </div>
                    <div class="mt-4">


                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-md-6 scroll-box">
                                
                                
                                <p><strong>The graph below shows radio and television audiences throughout the day in 1992.</strong></p>
                                <p><strong>Summarize the information by selecting and reporting the main features, and make comparisons where relevant.</strong></p>
                                <p>Write at least <b>150 words.</b></p>
                                <img src="{{ asset('images/writing/3.jpg') }}" class="img-fluid" alt=""><br>

                                

                                <br>

                            </div>
                            <!-- Column 2 -->
                            <div class="col-md-6 question_site">

                               
                                <textarea id="taskOne" rows="22" spellcheck="false" name="tasks[testOne]" style="width:100%;padding:10px;"> {{ old('tasks.testOne', $savedTasks['testOne'] ?? '') }}</textarea>
                                <p id="wordCountOne">Word Count: 0</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- question part 2 -->
                <div class="tab-content " id="part2" style="margin-bottom: 80px;">
                    <div class="question_part">
                        <h4>Task 2</h4>
                        <p> You should spend about 40 minutes on this task. Write at least 250 words.</p>
                    </div>
                    <div class="mt-4">


                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-md-6 scroll-box">
                                
                                
                                
                                <p><strong>These days many people leave their country to work abroad and take their family with them.</strong></p>
                                <p>Do you think the advantages of this development outweigh its disadvantages?</p>
                                <p>You should write at least <b>250</b> words.</p>
                                
                                
                                
                              

                                <br>

                            </div>
                            <!-- Column 2 -->
                            
                              <div class="col-md-6 question_site">

                                <textarea id="taskTwo" rows="22" spellcheck="false" name="tasks[testTwo]" style="width:100%;padding:10px;">{{ old('tasks.testTwo', $savedTasks['testTwo'] ?? '') }}</textarea>
                                <p id="wordCountTwo">Word Count: 0</p>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- question part 3 -->
                <div class="tab-content " id="part3" style="margin-bottom: 80px;">
                    <div class="question_part">
                        <h4>Writing (Task 1)</h4>
                        <p> You should spend about 20 minutes on this task. Write at least 150 words.</p>
                    </div>
                    <div class="mt-4">


                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-md-6 scroll-box">
                                
                                <p class="mt-2"><strong>3.The chart below shows the amounts people spent on different consumer products in three European countries in 2015.</strong></p>
                                <img src="{{ asset('images/taskOne07.png') }}" class="img-fluid" alt=""><br>

                                <br>

                            </div>
                            <!-- Column 2 -->
                            <div class="col-md-6 question_site">

                               
                                <textarea id="taskThree" rows="22" spellcheck="false" name="tasks[testThree]" style="width:100%;padding:10px;">{{ old('tasks.testThree', $savedTasks['testThree'] ?? '') }}</textarea>
                                <p id="wordCountThree">Word Count: 0</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- question part 4 -->
                <div class="tab-content " id="part4" style="margin-bottom: 80px;">
                    <div class="question_part">
                       <h4>Writing (Task 1)</h4>
                        <p> You should spend about 20 minutes on this task. Write at least 150 words.</p>
                    </div>
                    <div class="mt-4">


                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-md-6 scroll-box">
                                
                                <p class="mt-2"><strong>4.The bar chart below shows shares of expenditures for five major categories in the United States, Canada, the Unite d Kingdom, and Japan in the year 2009.</strong></p>
                                <img src="{{ asset('images/taskOne08.png') }}" class="img-fluid" alt=""><br>

                                <br>

                            </div>
                            <!-- Column 2 -->
                            <div class="col-md-6 question_site">

                                
                                <textarea id="taskFour" rows="22" spellcheck="false" name="tasks[testFour]" style="width:100%;padding:10px;">{{ old('tasks.testFour', $savedTasks['testFour'] ?? '') }}</textarea>
                                <p id="wordCountFour">Word Count: 0</p>
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
                        <h5 class="modal-title" id="modalTitle">Start Writing Test</h5>
                    </div>
                    <div class="modal-body">
                        <p class="instruction-text">Please enter your Student ID and click OK to begin the writing test.</p>
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
        <div class="modal fade" id="finishModal" tabindex="-1" aria-labelledby="finishModalLabel"
            aria-hidden="true">
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
    </div>

    </div>
    </div>


    <div class="tabs fixed-bottom " style="background-color: white; margin:0px; margin-top: 100px;">
        <div class="tab active" data-tab="part1">
            <span class="tab-title">Task 1</span>
            <div class="question-links">
                <a href="#" class="question-link" data-question="1">1</a>
            </div>
            <span class="question-placeholder">1 of 1</span>
        </div>

        <div class="tab" data-tab="part2">
            <span class="tab-title">Task 2</span>
            <div class="question-links">
                <a href="#" class="question-link" data-question="2">2</a>
            </div>
            <span class="question-placeholder">2 of 2</span>
        </div>
        <!--<div class="tab active" data-tab="part3">-->
        <!--    <span class="tab-title">EX 2</span>-->
        <!--    <div class="question-links">-->
        <!--        <a href="#" class="question-link" data-question="2">2</a>-->
        <!--    </div>-->
        <!--    <span class="question-placeholder">0 of 1</span>-->
        <!--</div>-->
        <!--<div class="tab active" data-tab="part3">-->
        <!--    <span class="tab-title">EX 3</span>-->
        <!--    <div class="question-links">-->
        <!--        <a href="#" class="question-link" data-question="3">3</a>-->

        <!--    </div>-->
        <!--    <span class="question-placeholder">0 of 1</span>-->
        <!--</div>-->
        <!--<div class="tab active" data-tab="part4">-->
        <!--    <span class="tab-title">EX 4</span>-->
        <!--    <div class="question-links">-->
        <!--        <a href="#" class="question-link" data-question="4">4</a>-->

        <!--    </div>-->
        <!--    <span class="question-placeholder">0 of 1</span>-->
        <!--</div>-->

    </div>
    <!-- <div class="fixed-bottom d-flex justify-content-end mb-5 px-5">
        <button id="prev-question" class="btn btn-dark me-2" style="font-size: 1.5rem;">&#8592;</button>
        <button id="next-question" class="btn btn-dark ms-2" style="font-size: 1.5rem;">&#8594;</button>
    </div> -->
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

        // Arrow button navigation functionality
        const prevButton = document.getElementById('prev-question');
        const nextButton = document.getElementById('next-question');
        let currentTabIndex = 0;

        // Update button states
        function updateButtonStates() {
            prevButton.disabled = currentTabIndex === 0;
            nextButton.disabled = currentTabIndex === tabs.length - 1;
        }

        // Previous button click
        prevButton.addEventListener('click', function() {
            if (currentTabIndex > 0) {
                currentTabIndex--;
                tabs[currentTabIndex].click();
                updateButtonStates();
            }
        });

        // Next button click
        nextButton.addEventListener('click', function() {
            if (currentTabIndex < tabs.length - 1) {
                currentTabIndex++;
                tabs[currentTabIndex].click();
                updateButtonStates();
            }
        });

        // Update current tab index when tab is clicked
        tabs.forEach((tab, index) => {
            tab.addEventListener('click', function() {
                currentTabIndex = index;
                updateButtonStates();
            });
        });

        // Initial button state
        updateButtonStates();
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


    <!-- textarea word count  -->
    {{-- <script>
        function countWords(text) {
            return text
                .trim()
                .split(/\s+/)
                .filter(word => word.length > 0).length;
        }

        const textarea1 = document.getElementById('1');
        const textarea2 = document.getElementById('2');

        const wordCount1 = document.getElementById('wordCount1');
        const wordCount2 = document.getElementById('wordCount2');

        textarea1.addEventListener('input', function() {
            wordCount1.innerText = "Word Count: " + countWords(this.value);
        });

        textarea2.addEventListener('input', function() {
            wordCount2.innerText = "Word Count: " + countWords(this.value);
        });
    </script> --}}


    <!-- finish test and timer script  -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // const timerElement = document.getElementById('timer');
            const finishButton = document.getElementById('finishButton');
            const finishModal = new bootstrap.Modal(document.getElementById('finishModal'));
            const continueButton = document.getElementById('continueButton');
            const startTestButton = document.getElementById('startTestButton');
            let isSubmitting = false;
            let autoSaveIntervalId = null;
            
            // Declare startModal in proper scope
            const startModal = new bootstrap.Modal(document.getElementById('startModal'));

            // Ensure backdrop/body classes are cleaned up after start modal closes
            const startModalEl = document.getElementById('startModal');
            if (startModalEl) {
                startModalEl.addEventListener('hidden.bs.modal', function() {
                    document.querySelectorAll('.modal-backdrop').forEach(b => b.remove());
                    document.body.classList.remove('modal-open');
                    document.body.style.overflow = '';
                    document.body.style.paddingRight = '';
                });
            }

            const finishModalEl = document.getElementById('finishModal');
            if (finishModalEl) {
                finishModalEl.addEventListener('hidden.bs.modal', function() {
                    document.querySelectorAll('.modal-backdrop').forEach(b => b.remove());
                    document.body.classList.remove('modal-open');
                    document.body.style.overflow = '';
                    document.body.style.paddingRight = '';
                });
            }

            //  let timeLeft = 60 * 60; // 60 minutes in seconds
            //  let countdown;

            // Add Enter key listener to student ID input
            const studentIdInput = document.getElementById('studentIdInput');
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

            const handleStartTest = () => {
                const studentIdError = document.getElementById('studentIdError');
                const studentId = (studentIdInput ? studentIdInput.value : '').trim();

                const isValidStudentId = /^[a-zA-Z0-9]{8,}$/.test(studentId);
                if (!isValidStudentId) {
                    if (studentIdError) {
                        studentIdError.textContent = '⚠️ Student ID must be at least 8 characters';
                        studentIdError.style.display = 'block';
                    }
                    if (studentIdInput) studentIdInput.style.borderColor = 'red';
                    return;
                }

                sessionStorage.setItem('examStudentId', studentId);

                if (studentIdError) studentIdError.style.display = 'none';
                if (studentIdInput) studentIdInput.style.borderColor = '#ddd';

                requestFullscreen();
                startModal.hide();

                if (!autoSaveIntervalId) {
                    autoSaveIntervalId = setInterval(autoSaveWriting, 20000);
                }
            };

            if (studentIdInput) {
                studentIdInput.setAttribute('minlength', '8');
                studentIdInput.setAttribute('inputmode', 'text');
                studentIdInput.setAttribute('pattern', '[A-Za-z0-9]{8,}');
                studentIdInput.addEventListener('keydown', function(event) {
                    if (event.key === 'Enter') {
                        event.preventDefault();
                        startTestButton.click();
                    }
                });
            }

            startTestButton.addEventListener('click', handleStartTest);

            finishButton.addEventListener('click', () => {
                finishModal.show();
            });

            continueButton.addEventListener('click', () => {
                if (isSubmitting) return;
                isSubmitting = true;
                if (continueButton) continueButton.disabled = true;

                if (autoSaveIntervalId) {
                    clearInterval(autoSaveIntervalId);
                    autoSaveIntervalId = null;
                }
                localStorage.setItem('writingCompleted', 'true'); // optional
                const examStudentId = sessionStorage.getItem('examStudentId');
                if (examStudentId) {
                    const field = document.getElementById('examStudentIdField');
                    if (field) field.value = examStudentId;
                }
                document.getElementById('taskoneClassFour').submit();
            });

            // Show the startModal on page load
            startModal.show();
        });
    </script>

    <!-- Arrow button script -->
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



    {{-- auto save  --}}
    {{-- <script>
        function autoSaveWriting() {
            let formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('student_id', '{{ auth()->id() }}');
            formData.append('test_name', document.querySelector('[name="test_name"]').value);
            formData.append('task', document.getElementById('1').value);

            fetch('{{ route('writing.autosave') }}', {
                method: 'POST',
                body: formData
            }).then(res => res.json()).then(data => {
                console.log(data.status);
            });
        }
    </script> --}}

<script>
function autoSaveWriting() {
  const fd = new FormData();
  fd.append('_token', '{{ csrf_token() }}');
  fd.append('student_id', '{{ auth()->id() }}');
  fd.append('test_name', document.querySelector('[name="test_name"]').value);
  fd.append('assignment_id', document.querySelector('[name="assignment_id"]')?.value || '');

  fd.append('tasks[testOne]',   document.getElementById('taskOne').value || '');
  fd.append('tasks[testTwo]',   document.getElementById('taskTwo').value || '');
  fd.append('tasks[testThree]', document.getElementById('taskThree').value || '');
  fd.append('tasks[testFour]',  document.getElementById('taskFour').value || '');

  fetch('{{ route('writing.autosave') }}', { method: 'POST', body: fd })
    .then(r => r.json())
    .then(d => console.log('autosave:', d.status))
    .catch(console.error);
}
</script>

{{-- Timer and highlight/note system from readingClassOne --}}
@include('front_end.layout.commonScript');

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
    let lastSelectionRange = null;
    let activePopup = null;
    let clickedMark = null;

    function captureSelectionRange() {
        const sel = window.getSelection();
        if (sel && sel.rangeCount > 0 && sel.toString().trim() !== '') {
            lastSelectionRange = sel.getRangeAt(0).cloneRange();
        }
    }

    function getTextNodesInRange(range) {
        const nodes = [];
        const root = range.commonAncestorContainer.nodeType === Node.ELEMENT_NODE
            ? range.commonAncestorContainer
            : range.commonAncestorContainer.parentNode;

        if (!root) return nodes;

        const walker = document.createTreeWalker(root, NodeFilter.SHOW_TEXT, {
            acceptNode: function(node) {
                if (!node.nodeValue || !node.nodeValue.trim()) return NodeFilter.FILTER_REJECT;
                try {
                    return range.intersectsNode(node) ? NodeFilter.FILTER_ACCEPT : NodeFilter.FILTER_REJECT;
                } catch (e) {
                    return NodeFilter.FILTER_REJECT;
                }
            }
        });

        let current;
        while ((current = walker.nextNode())) {
            nodes.push(current);
        }
        return nodes;
    }

    function applyHighlightToRange(range) {
        const textNodes = getTextNodesInRange(range);
        const createdMarks = [];

        textNodes.forEach((textNode) => {
            const nodeRange = document.createRange();
            nodeRange.selectNodeContents(textNode);

            const startOffset = (textNode === range.startContainer) ? range.startOffset : 0;
            const endOffset = (textNode === range.endContainer) ? range.endOffset : textNode.nodeValue.length;

            if (endOffset <= startOffset) return;

            nodeRange.setStart(textNode, startOffset);
            nodeRange.setEnd(textNode, endOffset);

            const mark = document.createElement('mark');
            mark.style.backgroundColor = 'yellow';
            try {
                nodeRange.surroundContents(mark);
                createdMarks.push(mark);
            } catch (e) {
                try {
                    const frag = nodeRange.extractContents();
                    mark.appendChild(frag);
                    nodeRange.insertNode(mark);
                    createdMarks.push(mark);
                } catch (e2) {}
            }
        });

        return createdMarks;
    }

    document.addEventListener('mouseup', captureSelectionRange);
    document.addEventListener('keyup', captureSelectionRange);

    // Context menu event
    document.addEventListener('contextmenu', function(e) {
        if (e.target.tagName === 'MARK') {
            e.preventDefault();
            clickedMark = e.target;
            contextMenu.style.display = 'block';
            contextMenu.style.left = e.pageX + 'px';
            contextMenu.style.top = e.pageY + 'px';
            return;
        }

        const selection = window.getSelection();
        if (selection.toString().trim() !== '') {
            e.preventDefault();
            selectionRange = selection.getRangeAt(0).cloneRange();
            contextMenu.style.display = 'block';
            contextMenu.style.left = e.pageX + 'px';
            contextMenu.style.top = e.pageY + 'px';
        } else if (lastSelectionRange) {
            e.preventDefault();
            selectionRange = lastSelectionRange.cloneRange();
            contextMenu.style.display = 'block';
            contextMenu.style.left = e.pageX + 'px';
            contextMenu.style.top = e.pageY + 'px';
        }
    });

    // Hide context menu on click elsewhere
    document.addEventListener('click', function(e) {
        if (!contextMenu.contains(e.target)) {
            contextMenu.style.display = 'none';
        }
    });

    // Highlight option
    highlightOption.addEventListener('click', function() {
        if (clickedMark) {
            contextMenu.style.display = 'none';
            clickedMark = null;
            return;
        }

        if (selectionRange) {
            applyHighlightToRange(selectionRange);
            window.getSelection().removeAllRanges();
            contextMenu.style.display = 'none';
            selectionRange = null;
            lastSelectionRange = null;
        }
    });

    // Notes option
    notesOption.addEventListener('click', function() {
        let mark = clickedMark;
        
        if (!mark && selectionRange) {
            mark = document.createElement('mark');
            mark.style.backgroundColor = 'yellow';
            try {
                selectionRange.surroundContents(mark);
            } catch (e) {
                mark.appendChild(selectionRange.extractContents());
                selectionRange.insertNode(mark);
            }
            window.getSelection().removeAllRanges();

            // Add click event listener to make marked text clickable
            mark.addEventListener('click', function(e) {
                e.stopPropagation();
                showNotePopup(mark);
            });
        }

        if (mark) {
            showNotePopup(mark);
        }

        contextMenu.style.display = 'none';
        selectionRange = null;
        clickedMark = null;
    });

    // Clear option
    clearOption.addEventListener('click', function() {
        if (clickedMark) {
            const parent = clickedMark.parentNode;
            while (clickedMark.firstChild) {
                parent.insertBefore(clickedMark.firstChild, clickedMark);
            }
            parent.removeChild(clickedMark);
            
            // Remove from sidebar
            const noteId = clickedMark.dataset.noteId;
            if (noteId) {
                const sidebarNote = document.querySelector(`[data-note-id="${noteId}"]`);
                if (sidebarNote) {
                    sidebarNote.remove();
                }
            }
        }
        contextMenu.style.display = 'none';
        clickedMark = null;
    });

    // Clear all option
    allClearOption.addEventListener('click', function() {
        const marks = document.querySelectorAll('mark');
        marks.forEach(mark => {
            const parent = mark.parentNode;
            while (mark.firstChild) {
                parent.insertBefore(mark.firstChild, mark);
            }
            parent.removeChild(mark);
        });
        
        // Clear sidebar
        const sidebarNotes = document.getElementById('sidebarNotes');
        if (sidebarNotes) {
            sidebarNotes.innerHTML = '';
        }
        
        contextMenu.style.display = 'none';
    });

    function showNotePopup(mark) {
        if (activePopup) {
            activePopup.remove();
            document.removeEventListener('click', handleOutsideClick);
        }

        const notePopup = document.createElement('div');
        notePopup.classList.add('note-popup');
        notePopup.innerHTML = `
            <div class="drag-handle" style="background: linear-gradient(to bottom, #f0f0f0, #d0d0d0); padding: 8px; cursor: move; border-bottom: 2px solid #999; display: flex; justify-content: space-between; align-items: center; user-select: none;">
                <span style="font-size: 12px; color: #666;">Drag to move</span>
                <span class="close-note" style="cursor: pointer; font-size: 20px; font-weight: bold; color: #666;">&times;</span>
            </div>
            <div class="popup-header" contenteditable="true" style="font-weight: bold; cursor: text; padding: 8px; background: rgba(0,0,0,0.05); margin-bottom: 5px; border: 1px solid #ccc; outline: none;">${mark.innerText}</div>
            <textarea placeholder="Add your note here..." style="width:100%; border:1px solid #ccc; background-color:yellow; min-height: 60px; cursor: text; padding: 5px; resize: vertical;">${mark.dataset.note || ''}</textarea>
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
            mark.dataset.note = textarea.value;
            
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
                    if (sidebarText) {
                        sidebarText.textContent = popupHeader.innerText;
                    }
                }
            }
        });
        
        // Make popup draggable
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
        
        document.addEventListener('mouseup', () => {
            isDragging = false;
        });

        setTimeout(() => {
            document.addEventListener('click', handleOutsideClick);
        }, 0);
    }

    function handleOutsideClick(e) {
        if (activePopup && !activePopup.contains(e.target)) {
            activePopup.remove();
            activePopup = null;
            document.removeEventListener('click', handleOutsideClick);
        }
    }

</script>

{{-- text area word count  --}}

<script>
function countWords(text) {
  // split on whitespace, ignore empty
  return (text || '')
    .trim()
    .split(/\s+/)
    .filter(Boolean)
    .length;
}

function bindCounter(textareaId, counterId) {
  const ta = document.getElementById(textareaId);
  const pc = document.getElementById(counterId);
  if (!ta || !pc) return;

  const update = () => {
    pc.textContent = 'Word Count: ' + countWords(ta.value);
  };

  // update on input and paste
  ta.addEventListener('input', update);
  ta.addEventListener('paste', () => setTimeout(update, 0));

  // initial
  update();
}

document.addEventListener('DOMContentLoaded', () => {
  bindCounter('taskOne',   'wordCountOne');
  bindCounter('taskTwo',   'wordCountTwo');
  bindCounter('taskThree', 'wordCountThree');
  bindCounter('taskFour',  'wordCountFour');
});
</script>









</body>

</html>
