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
                                user-select: text;
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
                                width: 30px;
                                height: 30px;
                                display: inline-flex;
                                align-items: center;
                                justify-content: center;
                            }

                            .question-link.active {
                                border: 2px solid gray;
                            
                            }

                            .tab .question-links {
                                display: none;
                                flex-wrap: wrap;
                                gap: 8px;
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
                                width: 280px;
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
                                border-radius: 4px;
                                padding: 5px;
                                z-index: 2100;
                                box-shadow: 0 4px 8px rgba(0,0,0,0.2);
                            }

                            .custom-context-menu div {
                                padding: 8px 12px;
                                cursor: pointer;
                                font-size: 14px;
                                border-radius: 3px;
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
                                display: inline;
                                padding: 0 !important;
                                line-height: inherit;
                                white-space: inherit;
                                -webkit-box-decoration-break: clone;
                                box-decoration-break: clone;
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
                                user-select: text;
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

                            /* TFNG Accordion Styles */
                            .tfng-block {
                                margin-top: 10px;
                            }

                            .tfng-item {
                                margin: 12px 0;
                            }

                            .tfng-head {
                                display: flex;
                                align-items: center;
                                gap: 10px;
                                border: 1px solid #d6d6d6;
                                padding: 10px 12px;
                                cursor: pointer;
                                background: #dbeafe;
                                border-radius: 10px;
                                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
                            }

                            .tfng-num {
                                width: 28px;
                                height: 28px;
                                background: #dbeafe;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                font-weight: 700;
                                flex: 0 0 auto;
                            }

                            .tfng-q {
                                font-weight: 600;
                            }

                            .tfng-options {
                                max-height: 0;
                                overflow: hidden;
                                opacity: 0;
                                padding: 0 12px;
                                transition: max-height 0.25s ease, opacity 0.25s ease, padding 0.25s ease;
                            }

                            .tfng-item.open .tfng-options {
                                max-height: 220px;
                                opacity: 1;
                                padding: 10px 12px;
                            }

                            .tfng-options label {
                                display: flex;
                                gap: 10px;
                                align-items: flex-start;
                                margin: 10px 0;
                                cursor: pointer;
                            }

                            .tfng-options input[type="radio"] {
                                margin-top: 3px;
                            }

                            .question-number.active, .dd-gap.active, .tfng-num.active, .question-link.active, .mcq-num.active {
                                border: 2px solid #5a5a5a;
                                padding: 1px 5px;
                                color: #5a5a5a !important;
                                font-weight: bold;
                            }

                            .mcq-block {
                                margin-top: 10px;
                            }

                            .mcq-item {
                                margin: 12px 0;
                            }

                            .mcq-head {
                                display: flex;
                                align-items: center;
                                gap: 10px;
                                border: 1px solid #d6d6d6;
                                padding: 10px 12px;
                                cursor: pointer;
                                background: #dbeafe;
                                border-radius: 10px;
                                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
                            }

                            .mcq-num {
                                width: 28px;
                                height: 28px;
                                background: #dbeafe;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                font-weight: 700;
                                flex: 0 0 auto;
                            }

                            .mcq-q {
                                font-weight: 600;
                            }

                            .mcq-options {
                                max-height: 0;
                                overflow: hidden;
                                opacity: 0;
                                padding: 0 12px;
                                transition: max-height 0.25s ease, opacity 0.25s ease, padding 0.25s ease;
                            }

                            .mcq-item.open .mcq-options {
                                max-height: 500px;
                                opacity: 1;
                                padding: 10px 12px;
                            }

                            .mcq-options label {
                                display: flex;
                                gap: 10px;
                                align-items: flex-start;
                                margin: 10px 0;
                                cursor: pointer;
                            }

                            .mcq-options input[type="radio"] {
                                margin-top: 3px;
                            }

                            #startModal #startTestButton {
                                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                                border: none;
                                padding: 12px 40px;
                                border-radius: 25px;
                                font-size: 14px;
                                font-weight: 600;
                                text-transform: uppercase;
                                transition: all 0.3s;
                                box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
                                letter-spacing: 1px;
                            }
                        </style>
                    </head>

                    <body>
                        <form action="{{ route('reading.submit') }}" method="POST" id="testForm" spellcheck="false" autocomplete="off">
                            @csrf

                            {{-- hidden input  --}}
                            <input type="hidden" name="test_name" value="{{ $testName ?? 'class13_reading' }}">
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
                                <div id="customContextMenu" class="custom-context-menu" style="display: none;">
                                    <div id="highlightOption">🖍️ Highlight</div>
                                    <div id="notesOption">📝 Notes</div>
                                    <div id="clearOption">🗑️ Clear</div>
                                    <div id="allClear">📝 Clear all</div>
                                </div>
                                <!-- question part 1 -->
                                <div class=" container-fluid px-5">
                                    <div class="tab-content active" id="part1" style="margin-bottom: 80px;">
                                        <div class="question_part">
                                            <h4>Part 1</h4>
                                            <p>Read the text below and answers to the questions <strong>1-14</strong> on your answer sheet.</p>
                                        </div>
                                        <div class="mt-4">


                                            <div class="row">
                                                <!-- Column 1 -->
                                                <div class="col-md-6">


                                                    <div class="scroll-box" style="text-align:left;">
                                                        <h3 class="text-center"><strong>GT Reading: "Bicycling for Recycling" & "Movie Mania – Upcoming Films"</strong></h3>
                                                        <h4><strong>Bicycling for Recycling</strong></h4>
                                                        <p>Dear Environmentally-Conscious Friend,</p>
                                                        <p>After the remarkable achievements of last year, we have again organised a Bicycle Rally to promote the recycling of resources and usage of recycled goods for the protection of our environment. Unlike last year, this year, the rally will start in Werribee and will cover a slightly shorter 45-kilometre route. The reduction in distance is due to the new area being quite hilly!</p>

                                                        <p>This year we have set ourselves the goal of raising £50,000 for our worthy cause. To help us do this, we have invited sponsorship from 20 large, commercial companies. If you would like to suggest a sponsor that we might not have considered, please contact us – there is no minimum donation amount. The funds raised will be used to launch our Recycled Resources, Recycled Goods countrywide awareness program in the coming months. We have also contacted numerous social organisations who will help us to best utilise the funds raised.</p>

                                                        <p>We will provide all support to participants including arranging bicycles for those who do not have one, all safety measures throughout the route, food, drinks and transportation to and from Werribee - Western, Northern and Southern suburbs will be covered. Here are the particulars:</p>

                                                        <p>
                                                            <strong>DATE:</strong> 16 June 2007<br>
                                                            <strong>START TIME:</strong> 8 AM<br>
                                                            <strong>START POINT:</strong> Werribee<br>
                                                            <strong>FINISH:</strong> Beacon Park<br>
                                                            <strong>COST:</strong> £12
                                                        </p>

                                                        <p>Channel 2 has agreed to be our media partner and will telecast the entire rally. Don’t miss your chance to be on national TV!</p>

                                                        <p>You are also invited to attend a post-rally press conference at the National Press Auditorium. Contact G. Jaisin on 0425 652 254 for more details.</p>

                                                        <h5><strong>Bicycling for Recycling: RALLY DETAILS</strong></h5>

                                                        <p><strong>Enquiry and Assistance:</strong></p>
                                                        <ul>
                                                            <li>General enquiries are welcome any time.</li>
                                                            <li>Sponsorship enquiries – at least 7 days prior to the rally.</li>
                                                            <li>Any special needs, call during business hours – 021 254 256 231.</li>
                                                        </ul>

                                                        <p><strong>Safety measures:</strong></p>
                                                        <p>The route has five designated checkpoints – Werribee, Mentone, Parade Ground, William Port and Beacon Park. The first half of the route from Werribee to the Parade Ground passes through Bush Park and continues along the Eastern Coast. This section is quite isolated so we will establish emergency stops and drink booths with greater frequency. Each booth staff member will be issued with communication equipment to report any emergency situation from all remote areas. All emergency assistance, including paramedics, will be on standby.</p>

                                                        <p><strong>Accessories:</strong></p>
                                                        <p>Considering the unpredictable weather during this season you should be prepared for all conditions. This means being prepared for all climatic possibilities! All participants are advised to do a complete check of their bike brakes and gears prior to the start of the rally. Our bike mechanics will be on hand at the starting point 2 hours prior to the start of the rally. This service is free for all participants.</p>

                                                        <p><strong>Photo session:</strong></p>
                                                        <p>The finishing line at the north gate of Beacon Park will have a stage with a backdrop containing our Recycled Resources, Recycled Goods slogan. All the participants, upon finishing, will receive a bouquet and individual placard – both highlighting our recycling message. There will be a photo session involving all the participants. Photos will be forwarded to the local newspapers with a press release.</p>
                                                        <p>This year we have decided to put a Support Book at the finishing point. We encourage you to sign the book and express your views on our rally theme or any other feedback you may care to provide. We are planning to forward all comments to the respective government policymakers as well as to the Ministry of Environment.</p>
                                                        <p>Thanks in advance for your support and see you on the big day!</p>
                                                        <p>G. Jaisin<br>
                                                        President, Rally Committee</p>
                                                        <hr>
                                                        <h4><strong>Movie Mania – Upcoming Films</strong></h4>
                                                        <p><strong>A. Friends (June 1st)</strong><br>
                                                        A group of friends go on a vacation together. They book a hotel and, upon arrival, discover that due to a misunderstanding, their booking got cancelled. In a new and strange city, they determine to spend the whole night on the street. They meet some peculiar people and observe unusual behaviours not seen during the daytime. A lot of laughs throughout!</p>

                                                        <p><strong>B. Four Feet (June 7th)</strong><br>
                                                        An animation-based fantasy film where animals take control of a city. Excellent special effects, hilarious scenarios and even some commentary about the environment! The animal's adventures put human beings into some difficult situations. In the home or office, in markets and on the streets, the animals make the rules - although a friendly understanding between animal and man enables both to co-exist...eventually!</p>

                                                        <p><strong>C. House Story (June 14th)</strong><br>
                                                        A rich family buys a large country-house and discovers the existence of pre-historic residents! With pre-history meeting modern history, the clever plot intrigues from start to finish. People from the past keep visiting the everyday environment of the family in the house. The suspense in this supernatural thriller comes to a climax in a most interesting way.</p>

                                                        <p><strong>D. Runner (June 21st)</strong><br>
                                                        Peter Goode has made a commitment to literally run around the world. The final leg of his journey involves running from New Mexico to Kansas, USA. Apparent mysteries stop him from time to time, but Peter's will proves there is a way and we learn that not every life is filled with fun. Experience Peter's struggles and the lengths to which one man will go to keep his word.</p>

                                                        <p><strong>E. Silver Ring (June 28th)</strong><br>
                                                        A true romantic story of a young couple who aspire to wealth in order to lead a happy life. Dedicated to Allison Walsh and based on her bestselling novel, this film shows that money and happiness are not necessarily linked. Abstract love and affection on one side and material need and want on another – which side must this young couple take?</p>

                                                        <p><strong>F. The Creatures (July 5th)</strong><br>
                                                        This is a documentary film sponsored by The Zoological Society. The film focuses on Global Warming and its effects on wild animals. Full of interesting facts and some expert interviews. Shot in the deep forests of the world. Incredible wild animal action adds real excitement to the film. Real-life footage in digital surround sound.</p>

                                                        <p><strong>G. The Trigger (July 12th)</strong><br>
                                                        Having learned of the disappearance of two children, a retired detective undertakes a mission to locate them. They are eventually found by the detective, living in a small town in Italy. Although missing, the kids believe that they are still very much in their normal living environment. These American kids know Italy lane by lane and can speak the local dialect fluently. Nobody ever taught them the language. From beginning to end, unexplained occurrences keep the viewer guessing to the end.</p>
                                                    </div>


                                                </div>
                                                <!-- Column 2 -->
                                                 <div class="col-md-6 question_site">
                                <h3><strong>Questions 1-7</strong></h3>
                                <p>Choose <strong>TRUE</strong> if the statement agrees with the information given in the text, choose <strong>FALSE</strong> if the statement contradicts the information, or choose <strong>NOT GIVEN</strong> if there is no information on this.</p>

                                <div class="tfng-block" id="q1_7_tfng">
                                    <div class="tfng-item open">
                                        <div class="tfng-head">
                                            <div class="tfng-num" data-q="1">1</div>
                                            <div class="tfng-q">Last year's bike rally was a great success.</div>
                                        </div>
                                        <div class="tfng-options">
                                            <label><input type="radio" name="q1" value="TRUE" {{ ($answers[1] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                            <label><input type="radio" name="q1" value="FALSE" {{ ($answers[1] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                            <label><input type="radio" name="q1" value="NOT GIVEN" {{ ($answers[1] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT GIVEN</span></label>
                                        </div>
                                    </div>

                                    <div class="tfng-item">
                                        <div class="tfng-head">
                                            <div class="tfng-num" data-q="2">2</div>
                                            <div class="tfng-q">Compared to last year's route, this year's is longer.</div>
                                        </div>
                                        <div class="tfng-options">
                                            <label><input type="radio" name="q2" value="TRUE" {{ ($answers[2] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                            <label><input type="radio" name="q2" value="FALSE" {{ ($answers[2] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                            <label><input type="radio" name="q2" value="NOT GIVEN" {{ ($answers[2] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT GIVEN</span></label>
                                        </div>
                                    </div>

                                    <div class="tfng-item">
                                        <div class="tfng-head">
                                            <div class="tfng-num" data-q="3">3</div>
                                            <div class="tfng-q">Larger donations are expected from commercial companies.</div>
                                        </div>
                                        <div class="tfng-options">
                                            <label><input type="radio" name="q3" value="TRUE" {{ ($answers[3] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                            <label><input type="radio" name="q3" value="FALSE" {{ ($answers[3] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                            <label><input type="radio" name="q3" value="NOT GIVEN" {{ ($answers[3] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT GIVEN</span></label>
                                        </div>
                                    </div>

                                    <div class="tfng-item">
                                        <div class="tfng-head">
                                            <div class="tfng-num" data-q="4">4</div>
                                            <div class="tfng-q">Individual sponsors can donate any amount.</div>
                                        </div>
                                        <div class="tfng-options">
                                            <label><input type="radio" name="q4" value="TRUE" {{ ($answers[4] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                            <label><input type="radio" name="q4" value="FALSE" {{ ($answers[4] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                            <label><input type="radio" name="q4" value="NOT GIVEN" {{ ($answers[4] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT GIVEN</span></label>
                                        </div>
                                    </div>

                                    <div class="tfng-item">
                                        <div class="tfng-head">
                                            <div class="tfng-num" data-q="5">5</div>
                                            <div class="tfng-q">Participants are invited to attend a press conference before the date of the rally.</div>
                                        </div>
                                        <div class="tfng-options">
                                            <label><input type="radio" name="q5" value="TRUE" {{ ($answers[5] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                            <label><input type="radio" name="q5" value="FALSE" {{ ($answers[5] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                            <label><input type="radio" name="q5" value="NOT GIVEN" {{ ($answers[5] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT GIVEN</span></label>
                                        </div>
                                    </div>

                                    <div class="tfng-item">
                                        <div class="tfng-head">
                                            <div class="tfng-num" data-q="6">6</div>
                                            <div class="tfng-q">Emergency support will NOT be available in isolated areas.</div>
                                        </div>
                                        <div class="tfng-options">
                                            <label><input type="radio" name="q6" value="TRUE" {{ ($answers[6] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                            <label><input type="radio" name="q6" value="FALSE" {{ ($answers[6] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                            <label><input type="radio" name="q6" value="NOT GIVEN" {{ ($answers[6] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT GIVEN</span></label>
                                        </div>
                                    </div>

                                    <div class="tfng-item">
                                        <div class="tfng-head">
                                            <div class="tfng-num" data-q="7">7</div>
                                            <div class="tfng-q">Some government officials will be present at the end-point of the rally.</div>
                                        </div>
                                        <div class="tfng-options">
                                            <label><input type="radio" name="q7" value="TRUE" {{ ($answers[7] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                            <label><input type="radio" name="q7" value="FALSE" {{ ($answers[7] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                            <label><input type="radio" name="q7" value="NOT GIVEN" {{ ($answers[7] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT GIVEN</span></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Questions 8-14</strong></h3>
                                    <p>Look at the seven film descriptions A-G in paragraph <strong>“Movie Mania – Upcoming Films”</strong> and answer questions <strong>8-14</strong>.</p>
                                    <p>For which film(s) are the following statements true?<br>Choose the correct letter<strong> A-G</strong> for each statement.<br>
                                    <strong>NB</strong> <em>You may use any letter more than once.</em></p>

                                    <div id="q8_14_normal" class="matching-grid mt-4">
                                        <table class="table table-bordered text-center">
                                            <thead>
                                                <tr>
                                                    <th>Questions</th>
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
                                                @foreach([
                                                    8 => 'This film is based on a book.',
                                                    9 => 'These TWO films are all about mysteries.',
                                                    10 => 'This film is based on imaginary animal behaviour.',
                                                    11 => 'This film demonstrates the importance of keeping a promise.',
                                                    12 => 'This film focuses on environmental issues.',
                                                    13 => 'The need to choose is a focus of this film.',
                                                    14 => 'These TWO films will best entertain a fun-loving audience.'
                                                ] as $qNum => $qContent)
                                                <tr>
                                                    <td class="text-start"><strong>{{ $qNum }}</strong>. {{ $qContent }}</td>
                                                    @foreach(['A','B','C','D','E','F','G'] as $val)
                                                    <td class="choice-cell tick-cell" data-row="{{ $qNum }}" data-value="{{ $val }}">
                                                        <span class="tick">✓</span>
                                                    </td>
                                                    @endforeach
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    @foreach(range(8, 14) as $qNum)
                                    <input type="hidden" name="q{{ $qNum }}" id="q{{ $qNum }}" value="{{ $answers[$qNum] ?? '' }}">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- question section 2 -->
                <div class="tab-content" id="part2" style="margin-bottom: 80px; display: none;">
                    <div class="question_part">
                        <h4>Part 2</h4>
                        <p>Read the text below and answers to the questions <strong>15-27</strong> on your answer sheet.</p>
                    </div>
                    <div class="mt-4">
                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-md-6">
                                <div class="scroll-box" style="text-align:left;">
                                    <h4><strong>NURSE ASSISTANTS IN NEW ZEALAND</strong></h4>
                                    <p><strong>Introduction:</strong><br>
                                    Working as a Nurse Assistant in New Zealand provides a number of unique opportunities in an interesting work environment. Nurse Assistants work with registered nurses and nursing practitioners to promote health, prevent disease and to manage public health needs. Nurse Assistants do not make independent assessments. They assist in delivering nursing care in community, residential and hospital settings. Over the last three years, there has been an increase in the demand for Nurse Assistants in child and aged care and public health. Qualified men and women are encouraged to consider this career opportunity.</p>

                                    <p><strong>Certificate in Nursing Assistance:</strong><br>
                                    To graduate with a Certificate in Nursing Assistance, students must complete a 12-month Nursing Council of New Zealand-approved education program and pass the examination. Successful course completion requires attendance at 75% of all class lectures, participation in a minimum of 200 clinical hours and for all written reports to be completed satisfactorily. Applicants should be mature and healthy, both mentally and physically and their previous academic record must demonstrate the ability to manage a study environment. They should also have a keen interest in working with people and be at least 20 years of age. If English is not the first, or native, language an approved English language test score must be presented along with the usual character references required for all applicants.</p>

                                    <p><strong>Additional Information:</strong><br>
                                    Certified Nurse Assistants are often the principal caregivers in nursing homes, assisting with the activities of daily living. This may include, but is not limited to, helping people in and out of bed, assisting with eating, bathing and dressing, as well as administering medications when requested to do so. As the relationship develops between the residents and their caregivers, Nurse Assistants often find that providing emotional support becomes another important aspect of their occupation.<br>
                                    Because hospitals and nursing homes must provide 24-hour care, Nurse Assistants employed in these institutions can often be required to work evenings, nights, weekends, holidays and must be available for shift work. The workload can be very demanding and there is often some lifting of patients involved in the daily work routine. If employed in hospitals or in community care, there can also, on occasion, be exposure to some infectious diseases.<br>
                                    Pay scales vary according to the area and the type of work involved. Additional information, pertaining to careers as a Nurse Assistant, can be obtained from the nearest, relevant educational institution.</p>
                                    
                                    <hr>
                                    
                                    <h4><strong>WORK SAFETY AT MONOTON ELECTRONICS</strong></h4>
                                    <p>Fire can occur anywhere and at any time. An outbreak of fire in a large industrial building is very dangerous to everyone working in the area. There could also be the added risk of being exposed to hazardous spills and gas leaks, which significantly increases the risk of injury in a smoke-filled environment. United States Fire Regulations requires employers to conduct regular fire drills to familiarise employees with what to do should a fire break out. The development of an effective fire drill procedure involves both planning and practice. Studies have proven that people who plan and rehearse how they will get out of the building in a crisis are better prepared than those who do not have an exit strategy.</p>

                                    <p><strong>Planning:</strong><br>
                                    The first step employers at Monoton Electronics undertake, in conjunction with their employees, is to develop an evacuation plan. The objective of the plan is to provide a set of procedures in the event of an emergency which requires the workforce to leave the building. Once the plan is completed, it is posted in a prominent area along with maps of the building which clearly show all entry/exit points. Other information in the evacuation plan would include the location of the smoke alarms and fire extinguishers, where the assembly site is located, who has been appointed to account for the evacuated workers, visitors and customers as they arrive at this area and who will supervise the shutdown of critical operations. All employees are encouraged to familiarise themselves with this information. Employers should also ensure that workers know where the emergency exits are and how to use fire extinguishers.</p>

                                    <p><strong>Practice:</strong><br>
                                    Practising the evacuation of a hazardous area in a fast and orderly manner can be the key to surviving a fire emergency and regular fire drills are a way of accomplishing this. It is recommended that every member of staff is involved in the exercise. If this is not possible, at least half the personnel in each department should be present. During the fire drill, the supervisors should note in the incidents register inappropriate activity such as delays in the collection of personal items, difficulties experienced by those with disabilities. If any doorways or fire escapes are obstructed this must also be noted. The fire drill is usually timed and after it is over, procedures are evaluated to see if there need to be any improvements made to the evacuation plan. Practice makes perfect, so it is important to repeat fire drills at least a couple of times a year - vigilance could save lives. All staff are encouraged to contact the Warden Attendant if they have any queries regarding evacuation procedures and general fire safety issues.</p>
                                </div>
                            </div>
                            <!-- Column 2 -->
                            <div class="col-md-6 question_site">
                                <h3><strong>Questions 15-20</strong></h3>
                                <p>Complete the sentences below.<br>
                                Choose <strong>NO MORE THAN TWO WORDS</strong> from the text for each answer.<br></p>

                                <p> Only registered nurses and nursing practitioners make <input type="text" name="q15" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="q15" placeholder="15" value="{{ $answers[15] ?? '' }}">.</p>
                                <p> To work as a Nurse Assistant, individuals must be <input type="text" name="q16" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="q16" placeholder="16" value="{{ $answers[16] ?? '' }}">.</p>
                                <p> To be accepted into the course <input type="text" name="q17" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="q17" placeholder="17" value="{{ $answers[17] ?? '' }}"> must be provided by every applicant.</p>
                                <p> After working with patients for some time <input type="text" name="q18" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="q18" placeholder="18" value="{{ $answers[18] ?? '' }}"> often becomes a significant work task.</p>
                                <p> Shift work may be required because hospitals have to offer <input type="text" name="q19" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="q19" placeholder="19" value="{{ $answers[19] ?? '' }}">.</p>
                                <p> Interested individuals should contact an appropriate local <input type="text" name="q20" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="q20" placeholder="20" value="{{ $answers[20] ?? '' }}"> for further details.</p>

                                <div class="mt-5">
                                    <h3><strong>Questions 21-27</strong></h3>
                                    <p>Complete the sentences below.<br>
                                    Choose <strong>NO MORE THAN TWO WORDS</strong> from the text for each answer.<br>
                                    </p>

                                    <p> <input type="text" name="q21" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="q21" placeholder="21" value="{{ $answers[21] ?? '' }}"> help staff to prepare for a fire.</p>
                                    <p> Planning and going over a fire escape procedure helps staff to be <input type="text" name="q22" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="q22" placeholder="22" value="{{ $answers[22] ?? '' }}">.</p>
                                    <p> Establishing a process in case of emergency is the aim of the <input type="text" name="q23" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="q23" placeholder="23" value="{{ $answers[23] ?? '' }}">.</p>
                                    <p> Once outside, staff meet at an <input type="text" name="q24" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="q24" placeholder="24" value="{{ $answers[24] ?? '' }}">.</p>
                                    <p> Staff must know how to operate <input type="text" name="q25" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="q25" placeholder="25" value="{{ $answers[25] ?? '' }}">.</p>
                                    <p> Blocked doorways or fire escapes must be recorded in the <input type="text" name="q26" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="q26" placeholder="26" value="{{ $answers[26] ?? '' }}">.</p>
                                    <p> Questions about safety procedures should be directed to the <input type="text" name="q27" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="q27" placeholder="27" value="{{ $answers[27] ?? '' }}">.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- question part 3 -->
                <div class="tab-content" id="part3" style="margin-bottom: 80px; display: none;">
                    <div class="question_part">
                        <h4>Part 3</h4>
                        <p>Read the text below and answers to the questions <strong>28-40</strong> on your answer sheet.</p>
                    </div>
                    <div class="mt-4">
                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-md-6">
                                <div class="scroll-box" style="text-align:left;">
                                    <h4><strong>From Londinium to London</strong></h4>
                                    <p><strong>A.</strong> The history of London spans a period of approximately 2,000 years. On its way to becoming one of the present-day financial and cultural capitals of the world, momentous highs and lows have accompanied the town. By 43 AD, an early point in its history, a time when Romans had invaded Britain, it had already been a target of several external invasions. The Roman settlers there at the time named the area <em>Londinium</em>, which is commonly believed to be the origin of the present-day name, <em>London</em>.</p>

                                    <p><strong>B.</strong> Researchers believe that before the Romans, no city existed where London is today. It was just a rural area with significant richness and attractiveness in terms of natural resources and location. They base this on the fact that only very scattered evidence of farming, burial and habitation have been uncovered in the area. Early Roman London, which is also referred to as <em>The First London</em>, was a very small area that existed for just 17 years. Around 61 AD the Celtic-speaking Iceni tribe from Eastern Britain, who opposed the occupying forces of the Roman Empire, stormed the city and burnt it to the ground. By 100 AD it was rebuilt according to a development plan and was made the capital of the Roman province of Britannia. By the 2nd century AD, London had a population of approximately 60,000. In the 3rd century AD, however, due to internal troubles within the Roman Empire, the city was brought down again. By the 5th century AD, it had become an abandoned city.</p>

                                    <p><strong>C.</strong> During the next century, the area near London saw the settlement of a new race of people, the Anglo-Saxons. These people started to migrate about 1 kilometre upstream from the Roman London city. Their settlement was called <em>Lundenwic</em>, and had fishing and trading as its economic base. Disaster struck for the city in 850 AD when its defence was broken down by a Viking<sup>1</sup> raid. However, the Viking occupation which had lasted for 20 years was overturned by Alfred the Great, the new King of England, who succeeded in establishing power via a peaceful agreement. He rebuilt the defensive wall for the city to protect his people. Gradually, as a result of contributions by the then ruling kings, London once again became an international trading centre and political powerhouse. However, in the late 10th century Vikings raided again and took control of the city and forced the ruling King Ethelred to flee. His army then made a counter attack and won. Thus, English control was once more established.</p>

                                    <p><strong>D.</strong> King Canute ruled London and the adjacent countryside until his death in 1042, when his son, Edward, took control and re-founded Westminster Abbey. By this time London had already become the largest city in the whole of England. In 1066 William the Conqueror became the King of England and built a castle in the southeast part to better keep a watchful eye on its inhabitants. The later kings expanded the castle, which is now known as the <em>Tower of London</em>. During 1097 William II built <em>Westminster Hall</em> adjacent to the <em>Westminster Abbey</em> as a key structure in the new Palace of Westminster, which was the main royal residence all through the Middle Ages. Primarily, because of the unique administration through the <em>Corporation of London</em>, which was the municipal governing body that later became the <em>City of London Corporation</em>, London became a centre of trade and commerce and was named the capital of England in the 12th century.</p>

                                    <p><strong>E.</strong> In 1588 the Spanish Armada sailed against England and was defeated. The defeat of the Spanish led to more political stability in England allowing London to prosper even more. Good times followed until tragedy struck during the middle and late 16th century through <em>The Great Fire of London</em>. Starting from a small bakery, the fire burnt to the ground, the homes of 70,000 of London’s 80,000 inhabitants. Rebuilding the city would take ten long years. The middle of the 17th century was also a matter of great misfortune for London due to an outbreak of the Great Plague, which caused the deaths of almost a fifth of the population.</p>

                                    <p><strong>F.</strong> The first quarter of the 18th century saw London become and remain the world's largest city. Major developments within this period included the building of a rail network and a city metro system; the systematic development of a workforce; a local government system and other large-scale building of infrastructure. After World War II, London became home to a large number of immigrants - especially those from other parts of the Commonwealth - making London one of the most culturally diverse cities in the whole of Europe. Despite occasional set-backs - like the <em>Brixton Riots</em> in the early 1980s - the integration of new migrants into London was comparatively smoother than other regions around the United Kingdom.</p>

                                    <p><strong>G.</strong> From the 1980s onward, some successful economic reforms and revival programs were implemented in London that significantly contributed to re-establish it as a pre-eminent international centre. Today London is considered by many to be the most important and influential city in Europe with around 32% of all foreign exchange around the world occurring in the city on a daily basis. The British government continues to devote more resources to the development of London with the people of the city now preparing to hosting the 2012 Summer Olympics.</p>
                                    
                                    <p><small><sup>1</sup>Ship-borne warriors originating from Scandinavia i.e. northern Europe.</small></p>
                                </div>
                            </div>
                            <!-- Column 2 -->
                            <div class="col-md-6 question_site">
                                <h3><strong>Questions 28-35</strong></h3>
                                <p>Reading Passage 2 has seven paragraphs (A-G). Which paragraph contains the following information?<br>
                                <strong>NB</strong> <em>You may use any letter more than once.</em></p>

                                <div id="q28_35_normal" class="matching-grid mt-4">
                                    <table class="table table-bordered text-center">
                                        <thead>
                                            <tr>
                                                <th>Questions</th>
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
                                            @foreach([
                                                28 => 'an example of two groups of people making an agreement, not to war',
                                                29 => 'a big upcoming event for London',
                                                30 => 'London as a deserted city',
                                                31 => 'commonly believed to be the origination of the word ‘London’',
                                                32 => 'London and a mass disease',
                                                33 => 'most of the city dwellers lost their dwelling place',
                                                34 => 'the main reason why London became the capital of England',
                                                35 => 'an example of a conclusion made by those who study history.'
                                            ] as $qNum => $qContent)
                                            <tr>
                                                <td class="text-start"><strong>{{ $qNum }}</strong>. {{ $qContent }}</td>
                                                @foreach(['A','B','C','D','E','F','G'] as $val)
                                                <td class="choice-cell tick-cell" data-row="{{ $qNum }}" data-value="{{ $val }}">
                                                    <span class="tick">✓</span>
                                                </td>
                                                @endforeach
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @foreach(range(28, 35) as $qNum)
                                <input type="hidden" name="q{{ $qNum }}" id="q{{ $qNum }}" value="{{ $answers[$qNum] ?? '' }}">
                                @endforeach

                                <div class="mt-5">
                                    <h3><strong>Questions 36-40</strong></h3>
                                    <p>Choose <strong>TRUE</strong> if the statement agrees with the information given in the text, choose <strong>FALSE</strong> if the statement contradicts the information, or choose <strong>NOT GIVEN</strong> if there is no information on this.</p>

                                    <div class="tfng-block" id="q36_40_tfng">
                                        @foreach([
                                            36 => 'The Romans gave London its name.',
                                            37 => 'A sudden attack on The First London totally destroyed it.',
                                            38 => 'The area, once known as Early Roman London, now joins with modern-day London.',
                                            39 => 'In order to control the people of London more effectively, William the Conqueror built a castle.',
                                            40 => '70,000 houses were burnt by the Great Fire of London.'
                                        ] as $qNum => $qText)
                                        <div class="tfng-item">
                                            <div class="tfng-head">
                                                <div class="tfng-num" data-q="{{ $qNum }}">{{ $qNum }}</div>
                                                <div class="tfng-q">{{ $qText }}</div>
                                            </div>
                                            <div class="tfng-options">
                                                <label><input type="radio" name="q{{ $qNum }}" value="TRUE" {{ ($answers[$qNum] ?? '') === 'TRUE' ? 'checked' : '' }}> <span>TRUE</span></label>
                                                <label><input type="radio" name="q{{ $qNum }}" value="FALSE" {{ ($answers[$qNum] ?? '') === 'FALSE' ? 'checked' : '' }}> <span>FALSE</span></label>
                                                <label><input type="radio" name="q{{ $qNum }}" value="NOT GIVEN" {{ ($answers[$qNum] ?? '') === 'NOT GIVEN' ? 'checked' : '' }}> <span>NOT GIVEN</span></label>
                                            </div>
                                        </div>
                                        @endforeach
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
                                    <a href="#" class="question-link" data-question="13">13</a>
                                    <a href="#" class="question-link" data-question="14">14</a>

                                </div>
                                <span class="question-placeholder">1 of 14</span>
                            </div>
                            <div class="tab" data-tab="part2">
                                <span class="tab-title">Part 2</span>
                                <div class="question-links">
                                    <a href="#" class="question-link" data-question="15">15</a>
                                    <a href="#" class="question-link" data-question="16">16</a>
                                    <a href="#" class="question-link" data-question="17">17</a>
                                    <a href="#" class="question-link" data-question="18">18</a>
                                    <a href="#" class="question-link" data-question="19">19</a>
                                    <a href="#" class="question-link" data-question="20">20</a>
                                    <a href="#" class="question-link" data-question="21">21</a>
                                    <a href="#" class="question-link" data-question="22">22</a>
                                    <a href="#" class="question-link" data-question="23">23</a>
                                    <a href="#" class="question-link" data-question="24">24</a>
                                    <a href="#" class="question-link" data-question="25">25</a>
                                    <a href="#" class="question-link" data-question="26">26</a>
                                    <a href="#" class="question-link" data-question="27">27</a>
                                </div>
                                <span class="question-placeholder">15 of 27</span>
                            </div>
                            <div class="tab" data-tab="part3">
                                <span class="tab-title">Part 3</span>
                                <div class="question-links">
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


                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
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






                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

                        @include('front_end.layout.commonScript')

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const testForm = document.getElementById('testForm');
                                
                                // Prevent Enter from submitting the form in input fields
                                testForm?.addEventListener('keydown', (e) => {
                                    if (e.key === 'Enter') {
                                        const tag = e.target.tagName.toLowerCase();
                                        if (tag === 'input' || tag === 'select') e.preventDefault();
                                    }
                                });
                                
                                const sidebar = document.getElementById('sidebar');
                                const mainContent = document.getElementById('main-content');
                                const contextMenu = document.getElementById('customContextMenu');
                                const allLinks = Array.from(document.querySelectorAll('.question-link'));
                                let currentIndex = 0;

                                // --- AUTOSAVE ---
                                const dirtyInputs = new Map();
                                let autosaveDebounceTimer = null;

                                function autosaveInput(input) {
                                    if (!input.name) return;
                                    const formData = new FormData();
                                    formData.append('student_id', document.querySelector('input[name="student_id"]').value);
                                    formData.append('test_name', document.querySelector('input[name="test_name"]').value);
                                    const assignmentIdField = document.querySelector('input[name="assignment_id"]');
                                    if (assignmentIdField && assignmentIdField.value) {
                                        formData.append('assignment_id', assignmentIdField.value);
                                    }

                                    if (input.type === 'checkbox') {
                                        const groupName = input.name;
                                        const selectedValues = Array.from(document.querySelectorAll(`input[name="${groupName}"]:checked`))
                                            .map(cb => cb.value);
                                        formData.append('question_number', groupName.replace('q', '').replace('[]', ''));
                                        formData.append('answer', selectedValues.join(','));
                                    } else {
                                        formData.append('question_number', input.name.replace('q', ''));
                                        formData.append('answer', input.value);
                                    }

                                    fetch('{{ route('reading.autosave') }}', {
                                        method: 'POST',
                                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                                        body: formData
                                    }).catch(err => console.error('❌ Autosave failed', err));
                                }

                                function markDirty(input) {
                                    if (!input || !input.name) return;
                                    dirtyInputs.set(input.name, input);
                                    if (autosaveDebounceTimer) clearTimeout(autosaveDebounceTimer);
                                    autosaveDebounceTimer = setTimeout(() => {
                                        dirtyInputs.forEach(inp => autosaveInput(inp));
                                        dirtyInputs.clear();
                                    }, 10000);
                                }

                                // --- TICK SYNC LOGIC ---
                                function clearRowSelection(rowNumber) {
                                    document.querySelectorAll(`.tick-cell[data-row="${rowNumber}"]`).forEach(cell => cell.classList.remove('selected'));
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
                                }

                                function clearRowValue(rowNumber) {
                                    const hidden = document.querySelector(`input[name="q${rowNumber}"]`);
                                    if (hidden) {
                                        hidden.value = '';
                                        hidden.dispatchEvent(new Event('change'));
                                    }
                                    clearRowSelection(rowNumber);
                                }

                                document.querySelectorAll('.tick-cell').forEach(cell => {
                                    cell.addEventListener('click', () => {
                                        const row = cell.getAttribute('data-row');
                                        const val = cell.getAttribute('data-value');
                                        if (!row || !val) return;
                                        
                                        syncActiveQuestion(row);

                                        if (cell.classList.contains('selected')) {
                                            clearRowValue(row);
                                        } else {
                                            setRowValue(row, val);
                                        }
                                    });
                                });

                                document.querySelectorAll('input').forEach(input => {
                                    input.addEventListener('change', () => markDirty(input));
                                    if (input.type === 'text') input.addEventListener('input', () => markDirty(input));
                                });

                                if (testForm) {
                                    testForm.addEventListener('submit', () => {
                                        if (autosaveDebounceTimer) clearTimeout(autosaveDebounceTimer);
                                        dirtyInputs.forEach(inp => autosaveInput(inp));
                                        dirtyInputs.clear();
                                    }, true);
                                    testForm.addEventListener('keypress', (e) => { if (e.key === 'Enter') e.preventDefault(); });
                                }

                                // --- NAVIGATION & TABS ---
                                function scrollToVisibleTop(target) {
                                    if (!target) return;
                                    const scrollBox = target.closest('.scroll-box') || target.closest('.question_site');
                                    const topOffset = 20;
                                    if (scrollBox) {
                                        const tRect = target.getBoundingClientRect();
                                        const cRect = scrollBox.getBoundingClientRect();
                                        const nextTop = Math.max(0, scrollBox.scrollTop + (tRect.top - cRect.top) - topOffset);
                                        scrollBox.scrollTo({ top: nextTop, behavior: 'smooth' });
                                    } else {
                                        target.style.scrollMarginTop = '120px';
                                        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                                    }
                                }

                                function setActiveQuestion(index, skipScroll = false) {
                                    if (index < 0 || index >= allLinks.length) return;
                                    currentIndex = index;
                                    const qNum = allLinks[index].getAttribute('data-question');

                                    // Update bottom links
                                    allLinks.forEach(link => link.classList.remove('active'));
                                    allLinks[index].classList.add('active');

                                    // Tab logic
                                    const targetEl = document.getElementById(`q${qNum}`) || document.getElementsByName(`q${qNum}`)[0] || document.querySelector(`input[name="q${qNum}"]`);
                                    if (targetEl) {
                                        const partContent = targetEl.closest('.tab-content');
                                        if (partContent) {
                                            document.querySelectorAll('.tab-content').forEach(tc => {
                                                tc.classList.remove('active', 'show');
                                                tc.style.display = 'none';
                                            });
                                            partContent.classList.add('active', 'show');
                                            partContent.style.display = 'block';

                                            document.querySelectorAll('.tab').forEach(tab => {
                                                const isActive = tab.getAttribute('data-tab') === partContent.id;
                                                tab.classList.toggle('active', isActive);
                                                const links = tab.querySelector('.question-links');
                                                const placeholder = tab.querySelector('.question-placeholder');
                                                if (links) links.style.display = isActive ? 'flex' : 'none';
                                                if (placeholder) placeholder.style.display = isActive ? 'none' : 'block';
                                            });
                                        }
                                    }

                                    // Scroll & Focus
                                    if (!skipScroll) {
                                        const scrollTarget = document.getElementById(`q${qNum}_heading`) || targetEl;
                                        if (scrollTarget) {
                                            scrollToVisibleTop(scrollTarget);
                                            const item = scrollTarget.closest('.mcq-item, .tfng-item');
                                            if (item && !item.classList.contains('open')) {
                                                const head = item.querySelector('.mcq-head, .tfng-head');
                                                if (head) head.click();
                                            }
                                        }
                                        if (targetEl && targetEl.tagName === 'INPUT' && targetEl.type === 'text') {
                                            setTimeout(() => targetEl.focus(), 400);
                                        }
                                    }
                                }

                                function syncActiveQuestion(qNum) {
                                    if (!qNum) return;
                                    const qIdx = allLinks.findIndex(l => l.getAttribute('data-question') === String(qNum));
                                    if (qIdx !== -1) {
                                        setActiveQuestion(qIdx, true);
                                    }
                                }

                                allLinks.forEach((link, idx) => link.addEventListener('click', e => { e.preventDefault(); setActiveQuestion(idx); }));
                                document.getElementById('prev-question').addEventListener('click', () => { if (currentIndex > 0) setActiveQuestion(currentIndex - 1); });
                                document.getElementById('next-question').addEventListener('click', () => { if (currentIndex < allLinks.length - 1) setActiveQuestion(currentIndex + 1); });

                                // Update currentIndex when user manually interacts with questions
                                document.querySelectorAll('input').forEach(input => {
                                    input.addEventListener('focus', function() {
                                        if (this.placeholder) {
                                            this.dataset.placeholder = this.placeholder;
                                            this.placeholder = '';
                                        }
                                        const qNum = (this.id && this.id.replace('q','')) || (this.name && this.name.replace('q', '').replace('[]', ''));
                                        if (qNum) syncActiveQuestion(qNum);
                                    });

                                    input.addEventListener('blur', function() {
                                        if (this.dataset.placeholder) {
                                            this.placeholder = this.dataset.placeholder;
                                        }
                                    });
                                });

                                // Tab clicking logic (to switch parts directly)
                                document.querySelectorAll('.tab').forEach(tab => {
                                    tab.addEventListener('click', function(e) {
                                        if (e.target.closest('.question-link')) return;
                                        const firstLink = tab.querySelector('.question-link');
                                        if (firstLink) firstLink.click();
                                    });
                                });

                                // --- START MODAL & FULLSCREEN ---
                                const startTestBtn = document.getElementById('startTestButton');
                                const studentIdInput = document.getElementById('studentIdInput');
                                if (startTestBtn && studentIdInput) {
                                    startTestBtn.addEventListener('click', (e) => {
                                        const id = studentIdInput.value.trim();
                                        if (id.length < 8) {
                                            e.stopImmediatePropagation();
                                            const err = document.getElementById('studentIdError');
                                            if (err) err.style.display = 'block';
                                            return;
                                        }
                                        const examField = document.getElementById('examStudentIdField');
                                        if (examField) examField.value = id;
                                        document.documentElement.requestFullscreen?.().catch(() => {});
                                        const startModal = document.getElementById('startModal');
                                        if (startModal) {
                                            const modalInstance = bootstrap.Modal.getInstance(startModal);
                                            if (modalInstance) modalInstance.hide();
                                        }
                                    }, true);
                                    
                                    studentIdInput.addEventListener('keydown', (e) => {
                                        if (e.key === 'Enter') {
                                            e.preventDefault();
                                            startTestBtn.click();
                                        }
                                    });
                                }

                                // --- ACCORDIONS ---
                                function initAccordions(selector, headSelector, itemSelector, optionsSelector) {
                                    document.querySelectorAll(headSelector).forEach(head => {
                                        head.addEventListener('click', () => {
                                            const item = head.closest(itemSelector);
                                            if (!item) return;
                                            
                                            // Sync Panel on Click
                                            const qNumEl = item.querySelector('.tfng-num, .mcq-num');
                                            if (qNumEl) {
                                                const qNum = qNumEl.getAttribute('data-q') || qNumEl.innerText.trim();
                                                syncActiveQuestion(qNum);
                                            }

                                            const isOpen = item.classList.contains('open');
                                            document.querySelectorAll(itemSelector).forEach(it => {
                                                if (it.closest(selector) === item.closest(selector)) it.classList.remove('open');
                                            });
                                            if (!isOpen) {
                                                item.classList.add('open');
                                                setTimeout(() => {
                                                    const opt = item.querySelector(optionsSelector);
                                                    const container = item.closest('.question_site');
                                                    if (opt && container) {
                                                        const rect = opt.getBoundingClientRect();
                                                        const cRect = container.getBoundingClientRect();
                                                        if (rect.bottom > cRect.bottom) {
                                                            container.scrollBy({ top: rect.bottom - cRect.bottom + 20, behavior: 'smooth' });
                                                        }
                                                    }
                                                }, 300);
                                            }
                                        });
                                    });
                                }
                                initAccordions('.mcq-block', '.mcq-head', '.mcq-item', '.mcq-options');
                                initAccordions('.tfng-block', '.tfng-head', '.tfng-item', '.tfng-options');

                                // --- HIGHLIGHTING & NOTES ---
                                let selectionRange = null;
                                let activePopup = null;
                                let clickedMark = null;

                                function getTableCell(node) {
                                    let parent = node && node.nodeType === Node.TEXT_NODE ? node.parentNode : node;
                                    while (parent) {
                                        if (parent.tagName === 'TD' || parent.tagName === 'TH') return parent;
                                        parent = parent.parentNode;
                                    }
                                    return null;
                                }

                                function highlightRange(range, markInitializer) {
                                    const marks = [];
                                    if (!range) return marks;

                                    const startContainer = range.startContainer;
                                    const endContainer = range.endContainer;
                                    const startOffset = range.startOffset;
                                    const endOffset = range.endOffset;

                                    // Optimistic path for single text node (standard selection)
                                    if (startContainer === endContainer && startContainer && startContainer.nodeType === Node.TEXT_NODE) {
                                        const selectedText = startContainer.textContent.substring(startOffset, endOffset);
                                        if (!selectedText.trim()) return marks;
                                        // Safeguard: Don't highlight directly inside layout nodes (like TR)
                                        if (['TABLE','THEAD','TBODY','TR'].includes(startContainer.parentNode?.tagName)) return marks;

                                        const mark = document.createElement('mark');
                                        mark.style.backgroundColor = 'yellow';
                                        if (typeof markInitializer === 'function') markInitializer(mark);
                                        mark.textContent = selectedText;
                                        const beforeText = startContainer.textContent.substring(0, startOffset);
                                        const afterText = startContainer.textContent.substring(endOffset);
                                        const parent = startContainer.parentNode;
                                        if (beforeText) parent.insertBefore(document.createTextNode(beforeText), startContainer);
                                        parent.insertBefore(mark, startContainer);
                                        if (afterText) parent.insertBefore(document.createTextNode(afterText), startContainer);
                                        parent.removeChild(startContainer);
                                        marks.push(mark);
                                        return marks;
                                    }

                                    // Robust path for multi-node/cross-cell selection
                                    const textNodes = [];
                                    const ancestor = range.commonAncestorContainer;
                                    const walker = document.createTreeWalker(
                                        ancestor.nodeType === Node.TEXT_NODE ? ancestor.parentNode : ancestor,
                                        NodeFilter.SHOW_TEXT,
                                        null,
                                        false
                                    );

                                    let node;
                                    while (node = walker.nextNode()) {
                                        if (range.intersectsNode(node)) {
                                            textNodes.push(node);
                                        }
                                    }

                                    textNodes.forEach((textNode) => {
                                        let start = 0;
                                        let end = textNode.textContent.length;
                                        if (textNode === startContainer) start = startOffset;
                                        if (textNode === endContainer) end = endOffset;
                                        if (start >= end) return;
                                        const selectedText = textNode.textContent.substring(start, end);
                                        if (!selectedText.trim()) return;
                                        // Safeguard: Don't highlight directly inside layout nodes (like TR)
                                        if (['TABLE','THEAD','TBODY','TR'].includes(textNode.parentNode?.tagName)) return;

                                        const mark = document.createElement('mark');
                                        mark.style.backgroundColor = 'yellow';
                                        if (typeof markInitializer === 'function') markInitializer(mark);
                                        mark.textContent = selectedText;
                                        const beforeText = textNode.textContent.substring(0, start);
                                        const afterText = textNode.textContent.substring(end);
                                        const parent = textNode.parentNode;
                                        if (beforeText) parent.insertBefore(document.createTextNode(beforeText), textNode);
                                        parent.insertBefore(mark, textNode);
                                        if (afterText) parent.insertBefore(document.createTextNode(afterText), textNode);
                                        parent.removeChild(textNode);
                                        marks.push(mark);
                                    });

                                    return marks;
                                }

                                document.addEventListener('contextmenu', e => {
                                    if (e.target.tagName === 'MARK') {
                                        e.preventDefault();
                                        clickedMark = e.target;
                                        selectionRange = null;
                                        contextMenu.style.display = 'block';
                                        contextMenu.style.left = e.pageX + 'px';
                                        contextMenu.style.top = e.pageY + 'px';
                                        return;
                                    }
                                    clickedMark = null;
                                    const sel = window.getSelection();
                                    if (sel.rangeCount > 0 && sel.toString().trim()) {
                                        e.preventDefault();
                                        // Clone range and shrink to actual selected text to fix double/triple-click expanding selection
                                        const rawRange = sel.getRangeAt(0).cloneRange();
                                        const selectedStr = sel.toString();
                                        // Only keep range if containers are text nodes (avoids element-node offset issues)
                                        if (rawRange.startContainer.nodeType === Node.TEXT_NODE && rawRange.endContainer.nodeType === Node.TEXT_NODE) {
                                            selectionRange = rawRange;
                                        } else {
                                            // Shrink range to text content by creating a new range
                                            const newRange = document.createRange();
                                            const ancestor = rawRange.commonAncestorContainer;
                                            const treeWalker = document.createTreeWalker(ancestor.nodeType === Node.TEXT_NODE ? ancestor.parentNode : ancestor, NodeFilter.SHOW_TEXT, null, false);
                                            let firstNode = null, lastNode = null, charCount = 0;
                                            let startNodeFound = false;
                                            let startOff = 0, endOff = 0;
                                            let tn;
                                            while (tn = treeWalker.nextNode()) {
                                                if (!rawRange.intersectsNode(tn)) continue;
                                                if (!firstNode) {
                                                    firstNode = tn;
                                                    // find where selection starts within this text node
                                                    startOff = tn.textContent.indexOf(selectedStr.substring(0, Math.min(20, selectedStr.length)));
                                                    startOff = startOff < 0 ? 0 : startOff;
                                                }
                                                lastNode = tn;
                                            }
                                            if (firstNode && lastNode) {
                                                newRange.setStart(firstNode, startOff);
                                                newRange.setEnd(lastNode, lastNode.textContent.length);
                                                selectionRange = newRange;
                                            } else {
                                                selectionRange = rawRange;
                                            }
                                        }
                                        contextMenu.style.display = 'block';
                                        contextMenu.style.left = e.pageX + 'px';
                                        contextMenu.style.top = e.pageY + 'px';
                                    } else {
                                        contextMenu.style.display = 'none';
                                    }
                                });

                                document.addEventListener('click', e => { 
                                    if (contextMenu && !contextMenu.contains(e.target)) contextMenu.style.display = 'none'; 
                                });

                                document.getElementById('highlightOption').addEventListener('click', () => {
                                    if (selectionRange) highlightRange(selectionRange);
                                    selectionRange = null;
                                    clickedMark = null;
                                    contextMenu.style.display = 'none';
                                });

                                function showNotePopup(mark) {
                                    if (activePopup) {
                                        activePopup.remove();
                                        document.removeEventListener('click', handleOutsideClick);
                                    }
                                    const markId = mark.dataset.markId;
                                    const popup = document.createElement('div');
                                    popup.className = 'note-popup';
                                    popup.innerHTML = `
                                        <div class="drag-handle" style="background: #ddd; padding: 8px; cursor: move; border-bottom: 1px solid #ccc; display: flex; justify-content: space-between; align-items: center; user-select: text;">
                                            <span style="font-size: 10px; color: #666;"> Drag to move</span>
                                            <span class="close-note" style="cursor: pointer; font-size: 20px; font-weight: bold; color: #666;">&times;</span>
                                        </div>
                                        <div class="popup-header" contenteditable="true" style="font-weight: normal; cursor: text; padding: 8px; margin-bottom: 5px; outline: none; word-wrap: break-word;">${mark.dataset.header || mark.innerText}</div>
                                        <div style="padding: 0 8px 8px 8px;">
                                            <textarea placeholder="Add your note here..." style="width:100%; border: 2px solid black; background-color:yellow; height: 80px; cursor: text; padding: 5px; resize: vertical; outline: none; border-radius: 4px;">${mark.dataset.note || ''}</textarea>
                                        </div>
                                    `;
                                    document.body.appendChild(popup);
                                    activePopup = popup;
                                    const r = mark.getBoundingClientRect();
                                    popup.style.left = (r.left + window.scrollX) + 'px';
                                    popup.style.top = (r.bottom + window.scrollY + 5) + 'px';

                                    const textarea = popup.querySelector('textarea');
                                    const header = popup.querySelector('.popup-header');
                                    
                                    const update = () => {
                                        if (!markId) return;
                                        const allRelatedMarks = document.querySelectorAll(`mark[data-mark-id="${CSS.escape(markId)}"]`);
                                        allRelatedMarks.forEach(m => {
                                            m.dataset.note = textarea.value;
                                            m.dataset.header = header.innerText;
                                        });
                                        const sideItem = document.querySelector(`.sidebar-note-item[data-mark-id="${markId}"]`);
                                        if (sideItem) {
                                            const content = sideItem.querySelector('.sidebar-note-content');
                                            if (content) content.textContent = textarea.value;
                                            const sideHeader = sideItem.querySelector('.sidebar-header');
                                            if (sideHeader) sideHeader.innerText = header.innerText;
                                        }
                                    };
                                    textarea.addEventListener('input', update);
                                    header.addEventListener('input', update);
                                    popup.querySelector('.close-note').addEventListener('click', () => {
                                        popup.remove();
                                        activePopup = null;
                                        document.removeEventListener('click', handleOutsideClick);
                                    });

                                    setTimeout(() => {
                                        textarea.focus();
                                        const length = textarea.value.length;
                                        textarea.setSelectionRange(length, length);
                                    }, 100);

                                    // Draggable
                                    let dragging = false, ox, oy;
                                    const dragHandle = popup.querySelector('.drag-handle');
                                    dragHandle.addEventListener('mousedown', e => {
                                        if (!e.target.classList.contains('close-note')) {
                                            dragging = true;
                                            ox = e.clientX - popup.offsetLeft;
                                            oy = e.clientY - popup.offsetTop;
                                            e.preventDefault();
                                        }
                                    });
                                    document.addEventListener('mousemove', e => {
                                        if (dragging) { popup.style.left = (e.clientX - ox) + 'px'; popup.style.top = (e.clientY - oy) + 'px'; }
                                    });
                                    document.addEventListener('mouseup', () => dragging = false);

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

                                document.getElementById('notesOption').addEventListener('click', () => {
                                    if (clickedMark) {
                                        showNotePopup(clickedMark);
                                        clickedMark = null;
                                    } else if (selectionRange) {
                                        const mid = String(Date.now());
                                        const marks = highlightRange(selectionRange, m => {
                                            m.setAttribute('data-tooltip', '');
                                            m.setAttribute('data-note', '');
                                            m.dataset.markId = mid;
                                        });
                                        if (marks.length) {
                                            const combinedText = marks.map(m => m.innerText).join(' ').replace(/\s+/g, ' ').trim();
                                            const truncatedText = combinedText; // show full text
                                            marks.forEach(m => {
                                                m.dataset.header = truncatedText;
                                                m.addEventListener('click', e => { e.stopPropagation(); showNotePopup(m); });
                                            });
                                            const item = document.createElement('div');
                                            item.className = 'sidebar-note-item';
                                            item.dataset.markId = mid;
                                            item.innerHTML = `<div class="sidebar-header" style="cursor:pointer; font-weight:normal; font-size:14px; padding:5px 0;">${truncatedText}</div><div class="sidebar-note-content" style="font-size:13px; color:#666; white-space:pre-wrap;"></div>`;
                                            item.style.padding = '10px'; item.style.borderBottom = '1px solid #eee';
                                            sidebar.appendChild(item);
                                            item.addEventListener('click', () => showNotePopup(marks[0]));
                                            showNotePopup(marks[0]);
                                        }
                                        selectionRange = null;
                                    }
                                    clickedMark = null;
                                    contextMenu.style.display = 'none';
                                });

                                document.getElementById('clearOption').addEventListener('click', () => {
                                    if (clickedMark) {
                                        const mid = clickedMark.dataset.markId;
                                        if (mid) {
                                            const sideItem = document.querySelector(`.sidebar-note-item[data-mark-id="${mid}"]`);
                                            if (sideItem) sideItem.remove();
                                        }
                                        const marks = mid ? document.querySelectorAll(`mark[data-mark-id="${mid}"]`) : [clickedMark];
                                        marks.forEach(m => m.replaceWith(document.createTextNode(m.innerText)));
                                    }
                                    contextMenu.style.display = 'none';
                                });

                                document.getElementById('allClear').addEventListener('click', () => {
                                    document.querySelectorAll('mark').forEach(m => m.replaceWith(document.createTextNode(m.innerText)));
                                    const headerHTML = `<div class="sidebar-header"><h5>Notes</h5><span class="close-btn">&times;</span></div>`;
                                    sidebar.innerHTML = headerHTML;
                                    sidebar.querySelector('.close-btn').addEventListener('click', () => {
                                        sidebar.classList.remove('open');
                                        document.getElementById('main-content').classList.remove('shifted');
                                    });
                                    if (activePopup) activePopup.remove();
                                    // Auto-close the sidebar panel
                                    sidebar.classList.remove('open');
                                    mainContent.classList.remove('shifted');
                                    contextMenu.style.display = 'none';
                                });

                                document.getElementById('noteToggle').addEventListener('click', () => {
                                    sidebar.classList.toggle('open');
                                    mainContent.classList.toggle('shifted');
                                });
                                sidebar.querySelector('.close-btn').addEventListener('click', () => {
                                    sidebar.classList.remove('open');
                                    mainContent.classList.remove('shifted');
                                });

                                // --- SAVED ANSWERS INITIALIZATION ---
                                const saved = @json($answers ?? []);
                                Object.keys(saved).forEach(qNum => {
                                    const val = saved[qNum];
                                    if (val === null || val === undefined) return;
                                    const strVal = String(val);
                                    if (strVal.trim() === '') return;

                                    const inputs = document.querySelectorAll(`input[name="q${qNum}"], input[name="q${qNum}[]"]`);
                                    inputs.forEach(inp => {
                                        if (inp.type === 'radio') inp.checked = (inp.value === strVal);
                                        else if (inp.type === 'checkbox') inp.checked = strVal.split(',').includes(inp.value);
                                        else if (inp.tagName === 'INPUT') {
                                            inp.value = strVal;
                                            // Update Tick UI for Matching Grid
                                            const tickCells = document.querySelectorAll(`.tick-cell[data-row="${qNum}"]`);
                                            if (tickCells.length > 0) {
                                                clearRowSelection(qNum);
                                                const cell = document.querySelector(`.tick-cell[data-row="${qNum}"][data-value="${strVal.trim().toUpperCase()}"]`);
                                                if (cell) cell.classList.add('selected');
                                            }
                                        }
                                    });
                                });

                                // Initial question setup
                                setActiveQuestion(0);
                            });
                        </script>
                    </body>
                    </html>

