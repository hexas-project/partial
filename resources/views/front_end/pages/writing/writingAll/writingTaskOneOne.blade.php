<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
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
            min-width: 150px;
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
            padding: 2px 6px;
            border-radius: 3px;
        }

        .nav-arrows {
            display: flex;
            gap: 5px;
            margin-bottom: 2px;
        }

        .nav-arrows button {
            background-color: #43474b;
            color: white;
            border: none;
            width: 45px;
            height: 38px;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .nav-arrows button:hover:not(:disabled) {
            background-color: #23272b;
        }

        .nav-arrows button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
            color: #888;
        }

        .right-nav-group {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-right: 20px;
            margin-bottom: 5px;
        }
        
        .task-info-below {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 11px;
            color: #666;
            margin-top: 2px;
        }

        .tab .question-links {
            display: none;
            flex-wrap: nowrap;
            gap: 5px;
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
            height: 75vh;
            overflow-y: auto;
            overflow-x: hidden;

            word-wrap: break-word;
            font-size: 16px;
        }

        .question_site {
            height: 75vh;
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

        .text-highlight {
            background-color: yellow !important;
            color: inherit !important;
            padding: 0;
            margin: 0;
            display: inline !important;
            vertical-align: baseline;
            line-height: inherit;
            border-radius: 0;
            -webkit-box-decoration-break: clone;
            box-decoration-break: clone;
            word-break: normal !important;
            overflow-wrap: normal !important;
            white-space: inherit;
            cursor: pointer;
        }

        .text-highlight[data-note]:not([data-note=""])::after {
            content: '';
            display: inline-block;
            width: 8px;
            height: 8px;
            background: orange;
            border: 1px solid #333;
            border-radius: 2px;
            vertical-align: super;
            margin-left: 2px;
        }

        /* Darker backdrop for start modal */
        .modal-backdrop.show {
            opacity: 0.85 !important;
            background-color: #000 !important;
        }
        
        #startModal .modal-dialog {
            max-width: 450px;
        }
        
        #startModal .modal-content {
            border-radius: 12px;
            border: none;
            box-shadow: 0 10px 40px rgba(0,0,0,0.15);
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
            color: white;
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
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            text-align: left;
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
        
        #startModal .student-id-input {
            padding: 14px 16px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s;
            width: 100%;
        }
        
        #startModal .student-id-input:focus {
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
        
        #startModal .start-btn-premium {
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
        
        #startModal .start-btn-premium:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
            color: white;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
        <div class="sidebar-header">
            <div style="font-weight: normal; font-size: 1.25rem;">Notes</div>
            <span class="close-btn" id="closeSidebar">&times;</span>
        </div>
        <div id="notes-container" style="padding: 10px;"></div>
    </div>
    <div id="main-content">
        <form action="{{ route('writing.submit') }}" method="POST" id="taskoneClassThree" spellcheck="false" autocomplete="off">
            @csrf
            <input type="hidden" name="student_id" value="{{ auth()->id() ?? session('student_batch_id') }}">
            <input type="hidden" name="test_name" value="class1_writing">
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
                z-index: 2000;
                display: none;
                box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
                <div id="highlightOption" style="padding: 8px 12px; cursor: pointer;">🖍️ Highlight</div>
                <div id="notesOption" style="padding: 8px 12px; cursor: pointer;">📝 Notes</div>
                <div id="clearOption" style="padding: 8px 12px; cursor: pointer;">🧹 Clear</div>
                <div id="allClear" style="padding: 8px 12px; cursor: pointer;">🗑️ Clear all</div>
            </div>
            <!-- question part 1 -->
            <div class=" container-fluid px-5">
                <div class="tab-content active" id="part1" style="margin-bottom: 30px;">
                    <div class="question_part">
                        <h4>Task 1</h4>
                        <p>You should spend about 20 minutes on this task. Write at least 150 words.</p>
                    </div>
                    <div class="mt-4">


                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-md-6 scroll-box">
                                
                                <p><strong>You are visiting another town next month for a short break. Write a letter to the tourist information centre. In your letter</strong></p>
                                
                                <ul>
                                    <li>Tell them how long you are staying</li>
                                    <li>Ask for some suggestions for what to do</li>
                                    <li>Find out if there are any local events happening at the time</li>
                                </ul>
                                
                                <p>You do NOT need to write any addresses.</p>
                                
                                <p>Write at least 150 words.</p>
                                
                                <br>

                            </div>
                            <!-- Column 2 -->
                            <div class="col-md-6 question_site">

                               
                                <textarea id="taskOne" rows="18" spellcheck="false" name="tasks[testOne]" style="width:100%;padding:10px;"> {{ old('tasks.testOne', $savedTasks['testOne'] ?? '') }}</textarea>
                                <p id="wordCountOne">Word Count: 0</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- question part 2 -->
                <div class="tab-content" id="part2" style="margin-bottom: 30px;">
                    <div class="question_part">
                        <h4> Task 2</h4>
                        <p>You should spend about 40 minutes on this task. Write at least 250 words.</p>
                    </div>
                    <div class="mt-4">
                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-md-6 scroll-box">
                                <p><strong>Write about the following topic:</strong></p>
                                
                                <p><strong>In many countries, schoolchildren are required to wear school uniforms.</strong></p>
                                
                                <p><strong>Do you think this should be enforced in all schools?</strong></p>
                                
                                <p><strong>Give reasons for your answer and include any relevant examples from your own knowledge or experience.</strong></p>
                                
                                <p>Write at least 250 words.</p>

                                <br>

                            </div>
                            <!-- Column 2 -->
                            <div class="col-md-6 question_site">
                                <textarea id="taskTwo" rows="18" spellcheck="false" name="tasks[testTwo]" style="width:100%;padding:10px;">{{ old('tasks.testTwo', $savedTasks['testTwo'] ?? '') }}</textarea>
                                <p id="wordCountTwo">Word Count: 0</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- question part 3 -->
                <div class="tab-content " id="part3" style="margin-bottom: 30px;">
                    <div class="question_part">
                        <h4> Task 1</h4>
                        <p>You should spend about 20 minutes on this task. Write at least 150 words.</p>
                    </div>
                    <div class="mt-4">


                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-md-6 scroll-box">
                                
                                <p class="mt-2"><strong>3.The graph below shows the alcohol-related deaths in 7
                                        different countries and the average beer consumption in 2005.</strong></p>
                                <img src="{{ asset('images/taskOne03.png') }}" class="img-fluid" alt=""><br>

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
                <div class="tab-content " id="part4" style="margin-bottom: 30px;">
                    <div class="question_part">
                        <h4>Task 1</h4>
                        <p>You should spend about 20 minutes on this task. Write at least 150 words.</p>
                    </div>
                    <div class="mt-4">


                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-md-6 scroll-box">
                                
                                <p class="mt-2"><strong>4.The table below shows the consumer durables owned in
                                        Britain from 1972 to 1983.</strong></p>
                                <img src="{{ asset('images/taskOne04.png') }}" class="img-fluid" alt=""><br>

                                <br>

                            </div>
                            <!-- Column 2 -->
                            <div class="col-md-6 question_site">

                                
                                <textarea id="taskFour" rows="30" spellcheck="false" name="tasks[testFour]" style="width:100%;padding:10px;">{{ old('tasks.testFour', $savedTasks['testFour'] ?? '') }}</textarea>
                                <p id="wordCountFour">Word Count: 0</p>
                            </div>
                        </div>
                    </div>
                </div>

        </form>
        <!--Alart Modal exam start-->
        <div class="modal fade" id="startModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="startModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="startModalLabel">Start Writing Test</h5>
                    </div>
                    <div class="modal-body">
                        <div class="instruction-text">
                            Please enter your Student ID and click OK to begin the writing test.
                        </div>
                        <div class="form-group">
                            <label for="studentIdInput" class="form-label">STUDENT ID</label>
                            <input type="text" id="studentIdInput" class="student-id-input" placeholder="Enter your Student ID" autocomplete="off">
                            <div id="studentIdError">Please enter a valid Student ID to continue</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn start-btn-premium" id="startTestButton">START TEST</button>
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


    <div class="tabs fixed-bottom " style="background-color: white; margin:0px;">
        <div class="tab active" data-tab="part1">
            <span class="tab-title">Task 1</span>
            <span class="question-placeholder">1 of 1</span>
        </div> 

        <div class="right-nav-group">
            <div class="nav-arrows">
                <button id="prev-question" type="button">
                    <span class="material-icons-outlined">arrow_back</span>
                </button>
                <button id="next-question" type="button">
                    <span class="material-icons-outlined">arrow_forward</span>
                </button>
            </div>
            <div class="tab" data-tab="part2">
                <span class="tab-title">Task 2</span>
                <span class="question-placeholder">2 of 2</span>
            </div>
        </div>
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const tabs = document.querySelectorAll('.tab');
        const tabContents = document.querySelectorAll('.tab-content');

        tabs.forEach((tab, index) => {
            tab.addEventListener('click', () => {
                // Remove active from all tabs and content
                tabs.forEach(t => {
                    t.classList.remove('active');
                    const qLinks = t.querySelector('.question-links');
                    const qPlaceholder = t.querySelector('.question-placeholder');
                    if (qLinks) qLinks.style.display = 'none';
                    if (qPlaceholder) qPlaceholder.style.display = 'block';
                });

                tabContents.forEach(content => content.classList.remove('active'));

                // Activate current tab and content
                tab.classList.add('active');
                const tabId = tab.getAttribute('data-tab');
                const targetContent = document.getElementById(tabId);
                if (targetContent) targetContent.classList.add('active');

                // Show question-links, hide placeholder
                const qLinks = tab.querySelector('.question-links');
                const qPlaceholder = tab.querySelector('.question-placeholder');
                if (qLinks) {
                    qLinks.style.display = 'flex';
                    if (qPlaceholder) qPlaceholder.style.display = 'none';
                }

                currentTabIndex = index;
                updateButtonStates();
            });
        });

        // Initial setup
        window.addEventListener('DOMContentLoaded', () => {
            tabs.forEach((tab, index) => {
                const qLinks = tab.querySelector('.question-links');
                const qPlaceholder = tab.querySelector('.question-placeholder');
                if (tab.classList.contains('active') || tab.getAttribute('data-tab') === 'part1') {
                    tab.classList.add('active');
                    if (qLinks) {
                        qLinks.style.display = 'flex';
                        if (qPlaceholder) qPlaceholder.style.display = 'none';
                    }
                    currentTabIndex = index;
                } else {
                    if (qLinks) qLinks.style.display = 'none';
                    if (qPlaceholder) qPlaceholder.style.display = 'block';
                }
            });
            updateButtonStates();
        });

        // Arrow button navigation functionality
        const prevButton = document.getElementById('prev-question');
        const nextButton = document.getElementById('next-question');
        let currentTabIndex = 0;

        // Update button states
        function updateButtonStates() {
            if (prevButton && nextButton) {
                prevButton.disabled = currentTabIndex === 0;
                nextButton.disabled = currentTabIndex === tabs.length - 1;
            }
        }

        // Previous button click
        prevButton.addEventListener('click', function() {
            if (currentTabIndex > 0) {
                tabs[currentTabIndex - 1].click();
            }
        });

        // Next button click
        nextButton.addEventListener('click', function() {
            if (currentTabIndex < tabs.length - 1) {
                tabs[currentTabIndex + 1].click();
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


    <!-- textarea word count  -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function wordCountHelper(text) {
                return text
                    .trim()
                    .split(/\s+/)
                    .filter(word => word.length > 0).length;
            }

            const textareas = [
                { id: 'taskOne', displayId: 'wordCountOne' },
                { id: 'taskTwo', displayId: 'wordCountTwo' },
                { id: 'taskThree', displayId: 'wordCountThree' },
                { id: 'taskFour', displayId: 'wordCountFour' }
            ];

            textareas.forEach(item => {
                const textarea = document.getElementById(item.id);
                const display = document.getElementById(item.displayId);
                
                if (textarea && display) {
                    // Initialize count on load
                    display.innerText = "Word Count: " + wordCountHelper(textarea.value);
                    
                    // Update count on input
                    textarea.addEventListener('input', function() {
                        display.innerText = "Word Count: " + wordCountHelper(this.value);
                    });
                }
            });
        });
    </script>


    <!-- finish test and timer script  -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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

                // Set hidden field immediately so it's always populated before submit
                const examField = document.getElementById('examStudentIdField');
                if (examField) examField.value = studentId;

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
                localStorage.setItem('writingCompleted', 'true');
                const examStudentId = sessionStorage.getItem('examStudentId');
                if (examStudentId) {
                    const field = document.getElementById('examStudentIdField');
                    if (field) field.value = examStudentId;
                }
                document.getElementById('taskoneClassThree').submit();
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


    <!-- highlight and note script  -->
    <script>
        (function() {
            let selectionRange = null;
            let selectedText = '';
            let clickedMark = null;
            let activePopup = null;

            const contextMenu = document.getElementById('customContextMenu');
            const highlightOption = document.getElementById('highlightOption');
            const notesOption = document.getElementById('notesOption');
            const clearOption = document.getElementById('clearOption');
            const allClearOption = document.getElementById('allClear');
            const sidebar = document.getElementById('sidebar');
            const closeSidebarBtn = document.getElementById('closeSidebar');
            const noteToggle = document.getElementById('noteToggle');
            const mainContent = document.getElementById('main-content');
            const notesContainer = document.getElementById('notes-container');

            // Sidebar toggle
            if (noteToggle) {
                noteToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('open');
                    mainContent.classList.toggle('shifted');
                });
            }

            if (closeSidebarBtn) {
                closeSidebarBtn.addEventListener('click', function() {
                    sidebar.classList.remove('open');
                    mainContent.classList.remove('shifted');
                });
            }

            // Helper function for non-destructive highlighting
            function highlightRange(range) {
                const createdMarks = [];
                const walker = document.createTreeWalker(
                    range.commonAncestorContainer,
                    NodeFilter.SHOW_TEXT,
                    {
                        acceptNode: function(node) {
                            if (!node.textContent.trim()) return NodeFilter.FILTER_REJECT;
                            const parent = node.parentNode;
                            if (['TABLE', 'THEAD', 'TBODY', 'TR', 'TEXTAREA', 'INPUT'].includes(parent.tagName)) {
                                return NodeFilter.FILTER_REJECT;
                            }
                            return range.intersectsNode(node) ? NodeFilter.FILTER_ACCEPT : NodeFilter.FILTER_REJECT;
                        }
                    }
                );

                const nodes = [];
                while (walker.nextNode()) nodes.push(walker.currentNode);

                nodes.forEach(node => {
                    const start = (node === range.startContainer) ? range.startOffset : 0;
                    const end = (node === range.endContainer) ? range.endOffset : node.textContent.length;
                    
                    if (start < end) {
                        const highlight = document.createElement('span');
                        highlight.className = 'text-highlight';
                        
                        try {
                            const partToHighlight = node.splitText(start);
                            partToHighlight.splitText(end - start);
                            
                            const clone = partToHighlight.cloneNode(true);
                            highlight.appendChild(clone);
                            partToHighlight.parentNode.replaceChild(highlight, partToHighlight);
                            createdMarks.push(highlight);
                        } catch (e) {
                            console.error('Highlight failed for node:', node, e);
                        }
                    }
                });
                return createdMarks;
            }

            // Context menu on right-click
            document.addEventListener('contextmenu', function(e) {
                const selection = window.getSelection();
                clickedMark = null;
                
                let target = e.target;
                while (target && !target.classList?.contains('text-highlight') && target.parentNode) {
                    target = target.parentNode;
                    if (target.classList?.contains('text-highlight')) break;
                }
                
                if (target && target.classList?.contains('text-highlight')) {
                    clickedMark = target;
                }
                
                if (selection.toString().trim() !== '' || clickedMark) {
                    e.preventDefault();
                    selectedText = selection.toString().trim();
                    selectionRange = clickedMark ? null : (selection.rangeCount > 0 ? selection.getRangeAt(0).cloneRange() : null);
                    contextMenu.style.left = e.pageX + 'px';
                    contextMenu.style.top = e.pageY + 'px';
                    contextMenu.style.display = 'block';
                } else {
                    contextMenu.style.display = 'none';
                }
            });

            document.addEventListener('click', function(e) {
                if (!contextMenu.contains(e.target)) {
                    contextMenu.style.display = 'none';
                }
            });

            highlightOption.addEventListener('click', function() {
                if (selectionRange) {
                    const createdMarks = highlightRange(selectionRange);
                    const markId = Date.now();
                    const fullSelectedText = selectedText || createdMarks.map(m => m.innerText).join('');
                    createdMarks.forEach(m => {
                        m.dataset.markId = markId;
                        m.dataset.fullText = fullSelectedText;
                    });
                }
                contextMenu.style.display = 'none';
                window.getSelection().removeAllRanges();
            });

            notesOption.addEventListener('click', function() {
                if (clickedMark) {
                    showNotePopup(clickedMark);
                    contextMenu.style.display = 'none';
                    return;
                }
                
                if (selectionRange) {
                    const createdMarks = highlightRange(selectionRange);
                    if (createdMarks.length > 0) {
                        const markId = Date.now();
                        const fullSelectedText = selectedText || createdMarks.map(m => m.innerText).join(' ');
                        
                        createdMarks.forEach(m => {
                            m.dataset.markId = markId;
                            m.dataset.fullText = fullSelectedText;
                            m.setAttribute('data-note', '');
                            m.addEventListener('click', function(e) {
                                e.stopPropagation();
                                showNotePopup(m);
                            });
                        });

                        const noteDiv = document.createElement('div');
                        noteDiv.className = 'sidebar-note-item';
                        noteDiv.dataset.markId = markId;
                        noteDiv.style.borderBottom = '1px solid #ccc';
                        noteDiv.style.padding = '10px';
                        noteDiv.style.cursor = 'pointer';
                        noteDiv.style.backgroundColor = '#fff';
                        noteDiv.innerHTML = `
                            <div style="font-weight: normal; margin-bottom: 5px;">${fullSelectedText}</div>
                            <div class="sidebar-note-content" style="font-size: 14px; color: #333;"></div>
                        `;
                        
                        notesContainer.appendChild(noteDiv);
                        noteDiv.addEventListener('click', () => {
                            const firstMark = document.querySelector(`.text-highlight[data-mark-id="${markId}"]`);
                            if (firstMark) {
                                firstMark.scrollIntoView({ behavior: 'smooth', block: 'center' });
                                showNotePopup(firstMark);
                            }
                        });
                        
                        showNotePopup(createdMarks[0]);
                    }
                }
                contextMenu.style.display = 'none';
                window.getSelection().removeAllRanges();
            });

            clearOption.addEventListener('click', function() {
                if (clickedMark) {
                    const markId = clickedMark.dataset.markId;
                    if (markId) {
                        document.querySelectorAll(`.text-highlight[data-mark-id="${markId}"]`).forEach(m => {
                            const parent = m.parentNode;
                            while (m.firstChild) parent.insertBefore(m.firstChild, m);
                            parent.removeChild(m);
                        });
                        const sidebarItem = document.querySelector(`.sidebar-note-item[data-mark-id="${markId}"]`);
                        if (sidebarItem) sidebarItem.remove();
                    }
                }
                contextMenu.style.display = 'none';
            });

            allClearOption.addEventListener('click', function() {
                document.querySelectorAll('.text-highlight').forEach(marked => {
                    const parent = marked.parentNode;
                    while (marked.firstChild) parent.insertBefore(marked.firstChild, marked);
                    parent.removeChild(marked);
                });
                if (activePopup) activePopup.remove();
                activePopup = null;
                notesContainer.innerHTML = '';
                contextMenu.style.display = 'none';
            });

            function getTextContentForMarkGroup(markId) {
                const marks = document.querySelectorAll(`.text-highlight[data-mark-id="${markId}"]`);
                if (marks.length > 0 && marks[0].dataset.fullText) {
                    return marks[0].dataset.fullText;
                }
                return Array.from(marks).map(m => m.innerText).join('');
            }

            function countWords(text) {
                return text
                    .trim()
                    .split(/\s+/)
                    .filter(word => word.length > 0).length;
            }

            function showNotePopup(mark) {
                if (activePopup) {
                    activePopup.remove();
                    document.removeEventListener('click', handleOutsideClick);
                }

                const markId = mark.dataset.markId;
                const fullText = getTextContentForMarkGroup(markId);
                const currentNote = mark.getAttribute('data-note') || '';
                
                const notePopup = document.createElement('div');
                notePopup.className = 'note-popup';
                notePopup.style.position = 'absolute';
                notePopup.style.background = 'yellow';
                notePopup.style.padding = '10px';
                notePopup.style.border = '1px solid #ccc';
                notePopup.style.zIndex = '2100';
                notePopup.style.width = '250px';
                notePopup.style.boxShadow = '2px 2px 8px rgba(0, 0, 0, 0.2)';
                
                notePopup.innerHTML = `
                    <div class="drag-handle" style="background: linear-gradient(to bottom, #f0f0f0, #d0d0d0); padding: 8px; cursor: move; border-bottom: 2px solid #999; display: flex; justify-content: space-between; align-items: center; user-select: none;">
                        <span style="font-size: 12px; color: #666;">Drag to move</span>
                        <span class="close-note" style="cursor: pointer; font-size: 20px; font-weight: bold; color: #666;">&times;</span>
                    </div>
                    <div style="font-weight: normal; padding: 5px; background: rgba(0,0,0,0.05); margin-bottom: 5px; border: 1px solid #ccc;">${fullText}</div>
                    <textarea placeholder="Add your note here..." style="width:100%; border:1px solid #ccc; background-color:yellow; min-height: 80px; padding: 5px; cursor: text; resize: vertical;">${currentNote}</textarea>
                    <div class="note-word-count" style="font-size: 12px; margin-top: 5px; text-align: left; color: #333;">Word Count: ${countWords(currentNote)}</div>
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
                const wordCountDisplay = notePopup.querySelector('.note-word-count');

                textarea.addEventListener('input', () => {
                    const val = textarea.value;
                    const wCount = countWords(val);
                    wordCountDisplay.innerText = "Word Count: " + wCount;

                    document.querySelectorAll(`.text-highlight[data-mark-id="${markId}"]`).forEach(m => {
                        m.setAttribute('data-note', val);
                    });
                    const sidebarItem = document.querySelector(`.sidebar-note-item[data-mark-id="${markId}"]`);
                    if (sidebarItem) {
                        sidebarItem.querySelector('.sidebar-note-content').innerText = val;
                    }
                });

                // Draggable
                let isDragging = false, offsetX, offsetY;
                notePopup.querySelector('.drag-handle').addEventListener('mousedown', (e) => {
                    if (e.target.classList.contains('close-note')) return;
                    isDragging = true;
                    offsetX = e.clientX - notePopup.offsetLeft;
                    offsetY = e.clientY - notePopup.offsetTop;
                    e.preventDefault();
                });
                document.addEventListener('mousemove', (e) => {
                    if (isDragging) {
                        notePopup.style.left = (e.clientX - offsetX) + 'px';
                        notePopup.style.top = (e.clientY - offsetY) + 'px';
                    }
                });
                document.addEventListener('mouseup', () => isDragging = false);

                setTimeout(() => {
                    textarea.focus();
                    const length = textarea.value.length;
                    textarea.setSelectionRange(length, length);
                    textarea.scrollTop = textarea.scrollHeight;
                }, 100);

                setTimeout(() => {
                    document.addEventListener('click', handleOutsideClick);
                }, 0);
            }

            function handleOutsideClick(e) {
                if (activePopup && !activePopup.contains(e.target) && !e.target.classList?.contains('text-highlight')) {
                    activePopup.remove();
                    activePopup = null;
                    document.removeEventListener('click', handleOutsideClick);
                }
            }
        })();
    </script>

<script>
function autoSaveWriting() {
  const fd = new FormData();
  fd.append('_token', '{{ csrf_token() }}');
  fd.append('student_id', '{{ auth()->id() }}');
  fd.append('test_name', document.querySelector('[name="test_name"]').value);
  fd.append('assignment_id', document.querySelector('[name="assignment_id"]')?.value || '');

  const examStudentId = sessionStorage.getItem('examStudentId') || document.getElementById('examStudentIdField')?.value || '';
  if (examStudentId) {
    fd.append('exam_student_id', examStudentId);
  }

  fd.append('tasks[testOne]',   document.getElementById('taskOne')?.value || '');
  fd.append('tasks[testTwo]',   document.getElementById('taskTwo')?.value || '');
  fd.append('tasks[testThree]', document.getElementById('taskThree')?.value || '');
  fd.append('tasks[testFour]',  document.getElementById('taskFour')?.value || '');

  fetch('{{ route('writing.autosave') }}', { method: 'POST', body: fd })
    .then(r => r.json())
    .then(d => console.log('autosave:', d.status))
    .catch(console.error);
}
</script>

{{-- Timer and auto-submit functionality --}}
@include('front_end.layout.timerScript')

</body>

</html>
