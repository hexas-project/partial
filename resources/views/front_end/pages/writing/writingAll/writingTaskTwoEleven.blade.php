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
        /* Image popup modal styles */
        #taskImageModal .modal-content {
            background: rgba(0, 0, 0, 0.85);
            border: none;
            border-radius: 0;
            box-shadow: none;
        }
        #taskImageModal .modal-body {
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #taskImageModal .modal-header {
            border: none;
            background: transparent;
            position: absolute;
            top: 0;
            right: 0;
            z-index: 1060;
            color: white;
        }
        #taskImageModal .btn-close {
            filter: invert(1);
            opacity: 1;
        }
        .task-image {
            cursor: pointer;
            transition: transform 0.2s;
        }
        /* .task-image:hover {
            transform: scale(1.02);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        } */

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
            <input type="hidden" name="test_name" value="class36_writing">
            <input type="hidden" name="exam_student_id" id="examStudentIdField" value="">
            <input type="hidden" name="redirect_to" value="student.dashboard">
            <input type="hidden" name="assignment_id" value="{{ $assignmentId ?? '' }}">

            <nav class="navbar navbar-expand-lg" style="background-color: #e9bec2;">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#"><strong id="timer">60
                                        minutes
                                        remaining</strong></a>
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
                <div id="allClear" style="padding: 5px; cursor: pointer;">🗑️ Clear all</div>
            </div>

            <div class="container-fluid px-5">
                <!-- Task 1 -->
                <div class="tab-content active" id="part1" style="margin-bottom: 80px;">
                    <div class="question_part">
                        <h4>Task 1</h4>
                        <p>You should spend about 20 minutes on this task.</p>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="scroll-box">
                                <p><strong>The graph and table below give information about water use worldwide and water consumption in two different countries.<br><br>Summarize the information by selecting and reporting the main features, and make comparisons where relevant.</strong></p>
                                <p>You should write at least 150 words.</p>
                                <div class="my-3 text-center">
                                    <img src="{{ asset('images/writing/writing11.png') }}" alt="Task One" class="img-fluid w-100 task-image" style="max-width: 1000px; height: auto; margin: 0 auto;">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 question_site">
                            <textarea id="taskOne" rows="22" name="tasks[testOne]" style="width:100%;padding:10px;">{{ $savedTasks['testOne'] ?? '' }}</textarea>
                            <p id="wordCountOne">Word Count: 0</p>
                        </div>
                    </div>
                </div>

                <!-- Task 2 -->
                <div class="tab-content" id="part2" style="margin-bottom: 80px;">
                    <div class="question_part">
                        <h4>Task 2</h4>
                        <p>You should spend about 40 minutes on this task.</p>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="scroll-box">
                                <p><strong>Some people suggest that a country should try to produce all the food for its population and import a little food as possible.<br><br>To what extent do you agree or disagree?</strong></p>
                                <p>You should write at least 250 words.</p>
                            </div>
                        </div>
                        <div class="col-md-6 question_site">
                            <textarea id="taskTwo" rows="22" name="tasks[testTwo]" style="width:100%;padding:10px;">{{ $savedTasks['testTwo'] ?? '' }}</textarea>
                            <p id="wordCountTwo">Word Count: 0</p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!--Alart Modal exam start-->
        <div class="modal fade" id="startModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="border-radius: 12px; overflow: hidden; border: none; box-shadow: 0 15px 35px rgba(0,0,0,0.2);">
                    <div class="modal-header" style="background: linear-gradient(to right, #6a5af9, #9146f9); color: white; padding: 15px 25px; border: none; display: flex; align-items: center; gap: 12px; border-radius: 0;">
                        <span class="material-icons-outlined" style="font-size: 28px; margin-bottom: 0px;">edit_note</span>
                        <h5 class="modal-title" id="modalTitle" style="font-size: 20px; font-weight: 500; margin: 0px; letter-spacing: 0.5px;">Start Writting Test</h5>
                    </div>
                    <div class="modal-body" style="padding: 30px 25px 20px; background-color: #fff; text-align: center;">
                        <p style="color: #777; margin-bottom: 25px; font-size: 14px; line-height: 1.4; padding: 0 10px;">click START TEST to begin the writting test.</p>
                        
                        <div style="background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 15px rgba(0,0,0,0.08); text-align: left; border: 1px solid #f0f0f0;">
                            <label style="display: flex; align-items: center; gap: 10px; font-weight: 600; color: #4a148c; margin-bottom: 12px; font-size: 13px; text-transform: uppercase;">
                                <span class="material-icons-outlined" style="font-size: 20px;">person</span>
                                STUDENT ID
                            </label>
                            <input type="text" id="modal_student_id" class="form-control" placeholder="Enter your Student ID" value="" style="width: 100%; padding: 10px 12px; border: 1px solid #ddd; border-radius: 4px; outline: none; font-size: 15px; color: #333;">
                            <div id="student_id_error" class="error-message" style="color: #d32f2f; font-size: 12px; margin-top: 8px; display: none; align-items: center; gap: 5px; font-weight: 500;">
                                <span class="material-icons-outlined" style="font-size: 16px;">warning</span>
                                Student ID must be at least 8 characters
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="padding: 20px 25px 30px; border: none; justify-content: center; background-color: #f9f9fb;">
                        <button id="startTestButton" type="button" class="btn btn-primary" style="background: linear-gradient(to right, #6a5af9, #835cf9); border: none; padding: 10px 45px; border-radius: 8px; font-weight: 500; font-size: 15px; color: white; text-transform: uppercase; box-shadow: 0 4px 12px rgba(106, 90, 249, 0.3); transition: all 0.2s;">START TEST</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Image Popup Modal -->
        <div class="modal fade" id="taskImageModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- <img src="" id="modalTaskImage" class="img-fluid" alt="Task Image Large"> -->
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


    <div class="tabs fixed-bottom " style="background-color: white; margin:0px; margin-top: 100px;">
        <div class="tab active" data-tab="part1">
            <span class="tab-title">Task 1</span>
            <div class="question-links">
                <a href="#" class="question-link" data-question="1">1</a>
            </div>
            <span class="question-placeholder">1 of 1</span>
        </div>

        <div class="tab active" data-tab="part2">
         <span class="tab-title">Task 2</span>
            <div class="question-links">
                <a href="#" class="question-link" data-question="2">2</a>
            </div>
            <span class="question-placeholder">2 of 2</span>
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
        </div>

    </div>
<div class="fixed-bottom d-flex justify-content-end mb-5 px-5" style="gap: 5px; z-index: 2050; pointer-events: none;">
            <button id="prev-question" type="button" class="btn btn-dark" style="font-size: 1.5rem; pointer-events: auto;">
                <span class="material-icons-outlined">arrow_back</span>
            </button>
            <button id="next-question" type="button" class="btn btn-dark" style="font-size: 1.5rem; pointer-events: auto;">
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
            const timerElement = document.getElementById('timer');
            const finishButton = document.getElementById('finishButton');
            const finishModal = new bootstrap.Modal(document.getElementById('finishModal'));
            const continueButton = document.getElementById('continueButton');
            const startTestButton = document.getElementById('startTestButton');
            let isSubmitting = false;
            let autoSaveIntervalId = null;

            let timeLeft = 60 * 60; // 60 minutes in seconds
            let countdown;

            // Trigger start test on Enter key press
            document.getElementById('modal_student_id').addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    startTestButton.click();
                }
            });

            // Start timer only after clicking OK on startModal
            startTestButton.addEventListener('click', () => {
                const modalStudentId = document.getElementById('modal_student_id');
                const errorMsg = document.getElementById('student_id_error');
                const examStudentIdField = document.getElementById('examStudentIdField');
                
                // Validation
                const studentId = modalStudentId.value.trim();
                const isValidStudentId = /^[a-zA-Z0-9]{8,}$/.test(studentId);
                
                if (!isValidStudentId) {
                    modalStudentId.style.borderColor = 'red';
                    errorMsg.style.display = 'flex';
                    return;
                }

                // If valid
                sessionStorage.setItem('examStudentId', studentId);
                if (examStudentIdField) {
                    examStudentIdField.value = studentId;
                }
                
                // Close modal
                const startModalEl = document.getElementById('startModal');
                const startModal = bootstrap.Modal.getInstance(startModalEl);
                startModal.hide();

                // Fullscreen
                const elem = document.documentElement;
                if (elem.requestFullscreen) {
                    elem.requestFullscreen().catch(err => console.log(err));
                }

                countdown = setInterval(() => {
                    const mins = Math.floor(timeLeft / 60);
                    const secs = timeLeft % 60;
                    timerElement.textContent =
                        `${mins} : ${secs < 10 ? '0' : ''}${secs} minutes remaining`;
                    timeLeft--;

                    if (timeLeft < 0) {
                        clearInterval(countdown);
                        timerElement.textContent = "Time's up!";
                        alert("Time's up! Your test has ended.");
                        document.getElementById('taskoneClassFour').submit();
                    }
                }, 1000);

                // Start auto save interval (every 20 seconds)
                if (!autoSaveIntervalId) {
                    autoSaveIntervalId = setInterval(autoSaveWriting, 20000);
                }
            });

            // Image Popup Logic
            const taskImages = document.querySelectorAll('.task-image');
            const taskImageModal = new bootstrap.Modal(document.getElementById('taskImageModal'));
            const modalImage = document.getElementById('modalTaskImage');

            taskImages.forEach(img => {
                img.addEventListener('click', () => {
                    modalImage.src = img.src;
                    taskImageModal.show();
                });
            });

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
                document.getElementById('taskoneClassFour').submit();
            });

            // Show the startModal on page load
            const startModal = new bootstrap.Modal(document.getElementById('startModal'));
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

        // Context menu on right-click
        document.addEventListener('contextmenu', function(e) {
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
            
            if (selection.toString().trim() !== '' || clickedMark) {
                e.preventDefault();
                selectionRange = clickedMark ? null : (selection.rangeCount > 0 ? selection.getRangeAt(0).cloneRange() : null);
                contextMenu.style.left = e.pageX + 'px';
                contextMenu.style.top = e.pageY + 'px';
                contextMenu.style.display = 'block';
            } else {
                contextMenu.style.display = 'none';
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

        // Helper function to highlight text nodes in a range
        function highlightRange(range) {
            const createdMarks = [];
            const startContainer = range.startContainer;
            const endContainer = range.endContainer;
            const startOffset = range.startOffset;
            const endOffset = range.endOffset;
            
            // Check if selection crosses table cell boundaries
            const startCell = getTableCell(startContainer);
            const endCell = getTableCell(endContainer);
            
            // If selection is inside table and crosses cell boundaries, only highlight within the start cell
            if (startCell && endCell && startCell !== endCell) {
                if (startContainer.nodeType === Node.TEXT_NODE) {
                    const mark = document.createElement('mark');
                    mark.style.backgroundColor = 'yellow';
                    const selectedText = startContainer.textContent.substring(startOffset);
                    if (selectedText.trim()) {
                        mark.textContent = selectedText;
                        
                        const beforeText = startContainer.textContent.substring(0, startOffset);
                        const parent = startContainer.parentNode;
                        if (beforeText) parent.insertBefore(document.createTextNode(beforeText), startContainer);
                        parent.insertBefore(mark, startContainer);
                        parent.removeChild(startContainer);
                        createdMarks.push(mark);
                    }
                }
                return createdMarks;
            }
            
            // If start and end are in the same text node
            if (startContainer === endContainer && startContainer.nodeType === Node.TEXT_NODE) {
                const mark = document.createElement('mark');
                mark.style.backgroundColor = 'yellow';
                const selectedText = startContainer.textContent.substring(startOffset, endOffset);
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
            
            // For multi-node selection, collect all text nodes in range
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
            
            // Highlight each text node
            textNodes.forEach((textNode, index) => {
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
                try {
                    const selectedText = selectionRange.toString();
                    
                    const createdMarks = highlightRange(selectionRange);
                    
                    if (createdMarks && createdMarks.length > 0) {
                        const markId = Date.now().toString();
                        const firstMark = createdMarks[0];
                        
                        // Add attributes and click listeners to ALL created marks
                        createdMarks.forEach((mark) => {
                            mark.setAttribute('data-tooltip', '');
                            mark.setAttribute('data-note', '');
                            mark.dataset.markId = markId;
                            mark.dataset.headerText = selectedText;
                            
                            // Add click event to show note popup
                            mark.addEventListener('click', function(e) {
                                e.stopPropagation();
                                showNotePopup(mark);
                            });
                        });

                        const noteDiv = document.createElement('div');
                        noteDiv.classList.add('sidebar-note-item');
                        noteDiv.innerHTML = `
                            <div class="sidebar-header" style="margin-bottom: 3px; cursor: pointer; padding: 0;">${selectedText}</div>
                            <div class="sidebar-note-content" style="color: #666; white-space: pre-wrap;"></div>
                        `;
                        noteDiv.style.borderBottom = '1px solid #ccc';
                        noteDiv.style.padding = '8px';
                        noteDiv.dataset.markId = markId;
                        
                        sidebar.appendChild(noteDiv);
                        // sidebar.classList.add('open');
                        // document.getElementById('main-content').classList.add('shifted');

                        noteDiv.addEventListener('click', () => {
                            showNotePopup(firstMark);
                        });

                        // showNotePopup(firstMark);
                    }
                    
                    window.getSelection().removeAllRanges();
                } catch (err) {
                    console.log('Note highlight error:', err);
                }
            }
            contextMenu.style.display = 'none';
        });

        // Clear single highlight - only works when right-clicking on highlighted text
        if (clearOption) {
           clearOption.addEventListener('click', function() {
            if (clickedMark) {
                const markId = clickedMark.dataset.markId;
                
                // Remove from sidebar
                if (markId) {
                    const sidebarItem = document.querySelector(`.sidebar-note-item[data-mark-id="${markId}"]`);
                    if (sidebarItem) {
                        sidebarItem.remove();
                    }
                    
                    // Remove ALL marks with this markId
                    const allAssociatedMarks = document.querySelectorAll(`mark[data-mark-id="${markId}"]`);
                    allAssociatedMarks.forEach(linkedMark => {
                        const parent = linkedMark.parentNode;
                        while (linkedMark.firstChild) {
                            parent.insertBefore(linkedMark.firstChild, linkedMark);
                        }
                        parent.removeChild(linkedMark);
                    });
                } else {
                    // Fallback for single mark without markId
                    const parent = clickedMark.parentNode;
                    while (clickedMark.firstChild) {
                        parent.insertBefore(clickedMark.firstChild, clickedMark);
                    }
                    parent.removeChild(clickedMark);
                }
                
                clickedMark = null;
            }
            contextMenu.style.display = 'none';
           });
        }

        // Clear all highlights and notes
        allClearOption.addEventListener('click', function() {
            document.querySelectorAll('mark').forEach(marked => {
                marked.replaceWith(document.createTextNode(marked.innerText));
            });
            const notePopup = document.querySelector('.note-popup');
            if (notePopup) notePopup.remove();
            activePopup = null;

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
            
            // Auto close the notes area after clearing all
            setTimeout(() => {
                sidebar.classList.remove('open');
                
                // Also handle main content shift
                const mainContent = document.getElementById('main-content');
                if (mainContent) {
                    mainContent.classList.remove('shifted');
                }
            }, 100);
            
            contextMenu.style.display = 'none';
        });

        // Function to show note popup for a mark element
        function showNotePopup(mark) {
            if (activePopup) {
                activePopup.remove();
                document.removeEventListener('click', handleOutsideClick);
            }

            const notePopup = document.createElement('div');
            notePopup.classList.add('note-popup');
            notePopup.style.position = 'absolute';
            notePopup.style.background = 'yellow';
            notePopup.style.padding = '10px';
            notePopup.style.border = '1px solid #ccc';
            notePopup.style.cursor = 'move';
            notePopup.style.zIndex = '2000';
            notePopup.style.width = '200px';
            notePopup.style.boxShadow = '2px 2px 8px rgba(0, 0, 0, 0.2)';
            
            notePopup.innerHTML = `
                <div class="drag-handle" style="background: linear-gradient(to bottom, #f0f0f0, #d0d0d0); padding: 8px; cursor: move; border-bottom: 2px solid #999; display: flex; justify-content: space-between; align-items: center; user-select: none;">
                    <span style="font-size: 12px; color: #666;">Drag to move</span>
                    <span class="close-note" style="cursor: pointer; font-size: 20px; font-weight: bold; color: #666;">&times;</span>
                </div>
                <div class="popup-header" contenteditable="true" style="font-weight: bold; cursor: text; padding: 8px; background: rgba(0,0,0,0.05); margin-bottom: 5px; border: 1px solid #ccc; outline: none;">${mark.dataset.headerText || mark.innerText}</div>
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
                    // Update all associated marks
                    document.querySelectorAll(`mark[data-mark-id="${markId}"]`).forEach(m => {
                        m.dataset.note = textarea.value;
                    });
                    
                    // Update sidebar note content
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
                    const newHeader = popupHeader.innerText;
                    // Update all associated marks
                    document.querySelectorAll(`mark[data-mark-id="${markId}"]`).forEach(m => {
                        m.dataset.headerText = newHeader;
                    });
                    
                    const sidebarItem = document.querySelector(`.sidebar-note-item[data-mark-id="${markId}"]`);
                    if (sidebarItem) {
                        const sidebarText = sidebarItem.querySelector('.sidebar-header');
                        if (sidebarText) {
                            sidebarText.textContent = newHeader;
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
  
  const examStudentId = sessionStorage.getItem('examStudentId') || document.getElementById('examStudentIdField')?.value || '';
  if (examStudentId) {
    fd.append('exam_student_id', examStudentId);
  }

  fd.append('tasks[testOne]',   document.getElementById('taskOne').value || '');
  fd.append('tasks[testTwo]',   document.getElementById('taskTwo').value || '');
  fd.append('tasks[testThree]', document.getElementById('taskThree')?.value || '');
  fd.append('tasks[testFour]',  document.getElementById('taskFour')?.value || '');

  fetch('{{ route('writing.autosave') }}', { method: 'POST', body: fd })
    .then(r => r.json())
    .then(d => console.log('autosave:', d.status))
    .catch(console.error);
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
