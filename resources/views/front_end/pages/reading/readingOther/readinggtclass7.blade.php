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
                                user-select: none;
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

                            .dnd-drop-input {
                                padding: 5px;
                                width: 100px;
                                margin-bottom: 5px;
                                border: 1px solid #ccc;
                                border-radius: 4px;
                                font-size: 14px;
                                cursor: pointer;
                                display: inline-block;
                                text-align: center;
                                background: #fff;
                            }
                            .dnd-drop-input:focus {
                                outline: none;
                                border-color: #2980b9;
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
                                width: 200px;
                                box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.2);
                            }

                            .note-popup .close-note {
                                position: absolute;
                                top: 2px;
                                right: 5px;
                                cursor: pointer;
                                font-weight: bold;
                                color: #666;
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

                            ul.options {
                                line-height: 5px;
                            }

                            .mark,
                            mark {
                                padding: 0px !important;

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

                            /* Matching Grid Styling */
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
                        </style>
                    </head>

                    <body>
                        <form action="{{ route('reading.submit') }}" method="POST" id="testForm" spellcheck="false" autocomplete="off">
                            @csrf

                            {{-- hidden input  --}}
                            <input type="hidden" name="test_name" value="{{ $testName ?? 'class22_reading' }}">
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
                                                    <button class="btn btn-outline-dark" id="finishButton" type="button">Finish test</button>
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
                                                        <p class="text-center"><strong>Section 1: Questions 1-14</strong></p>
                                                        <strong><p>Read the text below and answer Questions 1-6.</p></strong>
                                                        <div style="border: 1px solid #ccc; padding: 15px; background: #fff;">
                                                            <h5 class="text-center"><strong>Helping pupils to choose optional subjects when they’re aged 14-15: what some pupils say</strong></h5>
                                                            
                                                            <p><strong>A. Krishnan</strong><br>
                                                            I’m studying Spanish, because it’s important to learn foreign languages – and I’m very pleased when I can watch a video in class and understand it. Mr Peckham really pushes us, and offers us extra assignments, to help us improve. That’s good for me, because otherwise I’d be quite lazy.</p>

                                                            <p><strong>B. Lucy</strong><br>
                                                            History is my favourite subject, and it’s fascinating to see how what we learn about the past is relevant to what’s going on in the world now. It’s made me understand much more about politics, for instance. My plan is to study history at university, and maybe go into the diplomatic service, so I can apply a knowledge of history.</p>

                                                            <p><strong>C. Mark</strong><br>
                                                            Thursdays are my favourite days, because that’s when we have computing. It’s the high spot of the week for me – I love learning how to program. I began when I was about eight, so when I started doing it at school, I didn’t think I’d have any problem with it, but I was quite wrong! When I leave school, I’m going into my family retail business, so sadly I can’t see myself becoming a programmer.</p>

                                                            <p><strong>D. Violeta</strong><br>
                                                            My parents both work in leisure and tourism, and they’ve always talked about their work a lot at home. I find it fascinating. I’m studying it at school, and the teacher is very knowledgeable, though I think we spend too much time listening to her: I’d like to meet more people working in the sector, and learn from their experience.</p>

                                                            <p><strong>E. Walid</strong><br>
                                                            I’ve always been keen on art, so I chose it as an optional subject, though I was afraid the lessons might be a bit dull. I needn’t have worried, though – our teacher gets us to do lots of fun things, so there’s no risk of getting bored. At the end of the year the class puts on an exhibition for the school, and I’m looking forward to showing some of my work to other people.</p>
                                                        </div>

                                                        <hr>

                                                       <strong> <p>Read the text below and answer Questions 7-14.</p></strong>
                                                        <div style="border: 1px solid #ccc; padding: 15px; background: #fff;">
                                                            <h5 class="text-center"><strong>It’s almost time for the next Ripton Festival!</strong></h5>
                                                            <p>As usual, the festival will be held in the last weekend of June, this year on Saturday to Monday, 27-29 June. Ever since last year’s festival, the committee has been hard at work to make this year’s the best ever! The theme is Ripton through the ages. Scenes will be acted out showing how the town has developed since it was first established. But there’s also plenty that’s up-to-date, from the latest music to local crafts.</p>

                                                            <p>The Craft Fair is a regular part of the festival. Come and meet professional artists, designers and craftsmen and women, who will display their jewellery, paintings, ceramics, and much more. They’ll also take orders, so if you want one of them to make something especially for you, just ask! You’ll get it within a month of the festival ending.</p>

                                                            <p>The Saturday barbecue will start at 2 pm and continue until 10 pm, with a bouncy castle for kids. The barbecue will be held in Palmer’s Field, or in the town hall if there’s rain. Book your tickets now, as they always sell out very quickly! Entry for under 16s is free all day; adults can come for free until 6 pm and pay £5 after that. There’ll be live music throughout, with local amateur bands in the afternoon and professional musicians in the evening.</p>

                                                            <p>On Sunday we’re delighted to introduce an afternoon of boat races, arranged by the Ripton Rowing Club. The spectator area by the bridge has plenty of room to stand and cheer the boats home, in addition to a number of benches. The winners of the races will be presented with trophies by the mayor of Ripton.</p>

                                                            <p>All money raised by the festival will go to support the sports clubs in Ripton.</p>
                                                        </div>
                                                    </div>


                                                </div>
                                                <!-- Column 2 -->
                                                <div class="col-md-6 question_site">
                                           <h3><strong>Questions 1-6</strong></h3>
                                 <p>Look at the five comments about lessons, <strong>A–E</strong>, in the passage.</p>
                                 <p>For which comments are the following statements true? Match each statement with the correct comment <strong>(A-E)</strong>.<br>
                                 <strong>NB:</strong>You may use any letter more than once.</p>
                                                              @php
                                      $q1_6 = [
                                          1 => 'This pupil is interested in the subject despite the way it is taught.',
                                          2 => 'This pupil is hoping to have a career that makes use of the subject.',
                                          3 => 'This pupil finds the subject harder than they expected.',
                                          4 => 'This pupil finds the lessons very entertaining.',
                                          5 => 'This pupil appreciates the benefit of doing challenging work.',
                                          6 => 'This pupil has realised the connection between two things.'
                                      ];
                                  @endphp

                                  <div class="matching-grid mt-4">
                                      <table class="table table-bordered text-center">
                                          <thead>
                                              <tr>
                                                  <th>Statements</th>
                                                  @foreach(['A', 'B', 'C', 'D', 'E'] as $char)
                                                      <th class="choice-cell">{{ $char }}</th>
                                                  @endforeach
                                              </tr>
                                          </thead>
                                          <tbody>
                                              @foreach($q1_6 as $qNum => $qContent)
                                                  <tr>
                                                      <td class="text-start"><strong>{{ $qNum }}</strong>.
                                                          {{ $qContent }}
                                                      </td>
                                                      @foreach(['A', 'B', 'C', 'D', 'E'] as $char)
                                                          <td class="choice-cell tick-cell" data-row="{{ $qNum }}"
                                                              data-value="{{ $char }}">
                                                              <span class="tick">✓</span>
                                                          </td>
                                                      @endforeach
                                                  </tr>
                                              @endforeach
                                          </tbody>
                                      </table>
                                  </div>

                                  <!-- Hidden Inputs for saving -->
                                  <div style="display:none;">
                                      @foreach(range(1, 6) as $qNum)
                                          <input type="text" name="q{{ $qNum }}" id="q{{ $qNum }}"
                                              value="{{ $answers[$qNum] ?? '' }}">
                                      @endforeach
                                  </div>

                                 <div class="mt-5">
                                     <h3><strong>Questions 7-14</strong></h3>
                                     <p>Choose <strong>TRUE</strong> if the statement agrees with the information given in the text, choose <strong>FALSE</strong> if the statement contradicts the information, or choose <strong>NOT GIVEN</strong> if there is no information on this.</p>  

                                     <div class="tfng-block" id="q7_14_tfng">
                                         @foreach([
                                             7 => 'The festival is held every year.',
                                             8 => 'This year’s festival focuses on the town’s history.',
                                             9 => 'Goods displayed in the craft fair are unlike ones found in shops.',
                                             10 => 'The barbecue will be cancelled if it rains.',
                                             11 => 'Adults can attend the barbecue at any time without charge.',
                                             12 => 'Amateur musicians will perform during the whole of the barbecue.',
                                             13 => 'Seating is available for watching the boat races.',
                                             14 => 'People attending the festival will be asked to donate some money.'
                                         ] as $qNum => $qText)
                                         <div class="tfng-item">
                                             <div class="tfng-head">
                                                 <div class="tfng-num">{{ $qNum }}</div>
                                                 <div class="tfng-q">{{ $qText }}</div>
                                             </div>
                                             <div class="tfng-options">
                                                 <label><input type="radio" class="tfng-sync" name="q{{ $qNum }}_radio" value="TRUE" data-target="q{{ $qNum }}"> <span>TRUE</span></label>
                                                 <label><input type="radio" class="tfng-sync" name="q{{ $qNum }}_radio" value="FALSE" data-target="q{{ $qNum }}"> <span>FALSE</span></label>
                                                 <label><input type="radio" class="tfng-sync" name="q{{ $qNum }}_radio" value="NOT GIVEN" data-target="q{{ $qNum }}"> <span>NOT GIVEN</span></label>
                                                 <input type="text" name="q{{ $qNum }}" id="q{{ $qNum }}" style="display:none;">
                                             </div>
                                         </div>
                                         @endforeach
                                     </div>
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
                                    <h4 class="text-center"><strong>Reducing injuries on the farm</strong></h4>
                                    <p>Farms tend to be full of activity. There are always jobs to be done and some tasks require physical manual work. While it is good for people to be active, there are risk factors associated with this, and efforts need to be made to reduce them.</p>
                                    <p>The first risk relates to the carrying of an excessive load or weight. This places undue demands on the spine and can cause permanent damage. Examples of tasks that involve this risk are moving 50-kilogramme fertiliser bags from one site to another or carrying heavy buckets of animal feed around fields. According to the UK Health and Safety Executive, activities such as these ‘should be avoided at all times’. Their documentation states that other methods should be considered, such as breaking down the load into smaller containers prior to movement or transporting the materials using a tractor or other vehicle. The risk posed by excessive force is made worse if the person lifting is also bending over as this increases pressure on the discs in the back.</p>
                                    <p>If a load is bulky or hard to grasp, such as a lively or agitated animal, it will be more difficult to hold while lifting and carrying. The holder may adopt an awkward posture, which is tiring and increases the risk of injury. Sometimes a load has to be held away from the body because there is a large obstacle in the area and the person lifting needs to be able to see where their feet are going. This results in increased stress on the back; holding a load at arm’s length imposes about five times the stress of a close-to-the-body position. In such cases, handling aids should be purchased that can take the weight off the load and minimise the potential for injury.</p>
                                    <p>Another risk that relates to awkward posture is repetitive bending when carrying out a task. An example might be repairing a gate that has collapsed onto the ground. This type of activity increases the stress on the lower back because the back muscles have to support the weight of the upper body. The farmer should think about whether the job can be performed on a workbench, reducing the need for prolonged awkward posture.</p>
                                    
                                    <hr>
                                    
                                    <h4 class="text-center"><strong>Good customer service in retail</strong></h4>
                                    <p>Without customers, your retail business would not exist. It stands to reason, therefore, that how you treat your customers has a direct impact on your profit margins.</p>
                                    <p>Some customers just want to browse and not be bothered by sales staff. Try to be sensitive to how much help a customer wants; be proactive in offering help without being annoying. Suggest a product that naturally accompanies what the customer is considering or point out products for which there are special offers, but don’t pressure a customer into buying an item they don’t want.</p>
                                    <p>Build up a comprehensive knowledge of all the products in your shop, including the pros and cons of products that are alike but that have been produced under a range of brand names. If you have run out of a particular item, make sure you know when the next orders are coming in. Negativity can put customers off instantly. If a customer asks a question to which the answer is ‘no’, do not just leave it at that – follow it with a positive, for example: ‘we’re expecting more of that product on Tuesday’.</p>
                                    <p>Meanwhile, if you see a product in the wrong place on a shelf, don’t ignore it – put it back where it belongs. This attention to presentation keeps the shop tidy, giving the right impression to your customers. Likewise, if you notice a fault with a product, remove it and replace it with another.</p>
                                    <p>When necessary, be discreet. For example, if the customer’s credit card is declined at the till, keep your voice down and enquire about an alternative payment method quietly so that the customer doesn’t feel humiliated. If they experience uncomfortable emotions in your shop, it’s unlikely that they’ll come back.</p>
                                    <p>Finally, good manners are probably the most important aspect of dealing with customers. Treat each person with respect at all times, even when you are faced with rudeness. Being discourteous yourself will only add more fuel to the fire.</p>
                                    <p>Build a reputation for polite, helpful staff and you’ll find that customers not only keep giving you their custom, but also tell their friends about you.</p>
                                </div>
                            </div>
                            <!-- Column 2 -->
                            <div class="col-md-6 question_site">
                                <h3><strong>Questions 15-20</strong></h3>
                                <p>Complete the notes below.</p>
                                <p>Choose <strong>ONE WORD ONLY</strong> from the text for each answer.<br>
                                </p>

                                <div style="border: 1px solid #ccc; padding: 15px; background: #fff;">
                                    <h5 class="text-center"><strong>Risks and how to avoid them</strong></h5>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Risk factor</th>
                                                <th>Examples of farm activities</th>
                                                <th>Risk reduction measures to consider</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td rowspan="2">Heavy loads</td>
                                                <td>Lifting sacks of <input type="text" name="q15" style="border: 1px solid #ccc; padding: 2px 5px; width: 100px;" id="q15" placeholder="15" value="{{ $answers[15] ?? '' }}"></td>
                                                <td>Divide into containers that weigh less.</td>
                                            </tr>
                                            <tr>
                                                <td>Carrying food for animals</td>
                                                <td>Use a vehicle such as a tractor</td>
                                            </tr>
                                            <tr>
                                                <td rowspan="2">Awkward posture</td>
                                                <td>Lifting a restless <input type="text" name="q16" style="border: 1px solid #ccc; padding: 2px 5px; width: 100px;" id="q16" placeholder="16" value="{{ $answers[16] ?? '' }}"></td>
                                                <td rowspan="2">Buy particular <input type="text" name="q18" style="border: 1px solid #ccc; padding: 2px 5px; width: 100px;" id="q18" placeholder="18" value="{{ $answers[18] ?? '' }}"> to help with support</td>
                                            </tr>
                                            <tr>
                                                <td>Moving something around a big <input type="text" name="q17" style="border: 1px solid #ccc; padding: 2px 5px; width: 100px;" id="q17" placeholder="17" value="{{ $answers[17] ?? '' }}"></td>
                                            </tr>
                                            <tr>
                                                <td>A lot of <input type="text" name="q19" style="border: 1px solid #ccc; padding: 2px 5px; width: 100px;" id="q19" placeholder="19" value="{{ $answers[19] ?? '' }}"> while working</td>
                                                <td>Fixing a fallen <input type="text" name="q20" style="border: 1px solid #ccc; padding: 2px 5px; width: 100px;" id="q20" placeholder="20" value="{{ $answers[20] ?? '' }}"></td>
                                                <td>Use a workbench instead</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Questions 21-27</strong></h3>
                                    <p>Complete the sentences below.<br>
                                    Choose <strong>NO MORE THAN TWO WORDS</strong> from the text for each answer.<br></p>
                                    <p> A <input type="text" name="q21" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="q21" placeholder="21" value="{{ $answers[21] ?? '' }}"> approach to selling is fine as long as you do not irritate the customer.</p>
                                    <p> Recommend additional products and <input type="text" name="q22" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="q22" placeholder="22" value="{{ $answers[22] ?? '' }}"> without being too forceful.</p>
                                    <p> Know how to compare similar products which have different <input type="text" name="q23" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="q23" placeholder="23" value="{{ $answers[23] ?? '' }}">.</p>
                                    <p> Avoid <input type="text" name="q24" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="q24" placeholder="24" value="{{ $answers[24] ?? '' }}"> by always saying more than ‘no’.</p>
                                    <p> Keep an eye on the <input type="text" name="q25" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="q25" placeholder="25" value="{{ $answers[25] ?? '' }}"> of goods on the shelves.</p>
                                    <p> If a customer has problems paying with their <input type="text" name="q26" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="q26" placeholder="26" value="{{ $answers[26] ?? '' }}"> handle the problem with care.</p>
                                    <p> Any <input type="text" name="q27" style="border: 1px solid #ccc; padding: 2px 5px; width: 150px; text-align: left;" id="q27" placeholder="27" value="{{ $answers[27] ?? '' }}"> from a customer should not affect how you treat them.</p>
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
                                    <h4 class="text-center"><strong>KAURI GUM - a piece of New Zealand's history</strong></h4>
                                    <p><strong>A</strong> The kauri tree is a massive forest tree native to New Zealand. Kauri once formed vast forests over much of the north of the country. Whereas now it is the wood of the kauri which is an important natural resource, in the past it was the tree's sap (the thick liquid which flows inside a tree) which, when hardened into gum, played an important role in New Zealand's early history.<br> <br>After running from rips or tears in the bark of trees, the sap hardens to form the lumps of gum which eventually fall to the ground and are buried under layers of forest litter. The bark often splits where branches fork from the trunk, and gum accumulates there also.</p>
                                    <p><strong>B</strong> The early European settlers in New Zealand collected and sold the gum. Gum fresh from the tree was soft and of low value but most of the gum which was harvested had been buried for thousands of years. This gum came in a bewildering variety of colours, degree of transparency and hardness, depending on the length and location of burial, as well as the health of the original tree and the area of the bleeding. Highest quality gum was hard and bright and was usually found at shallow depth on the hills. Lowest quality gum was soft, black or chalky and sugary and was usually found buried in swamps, where it had been in contact with water for a long time. Long periods in the sun or bush fires could transform dull, cloudy lumps into higher quality transparent gum. <br><br>Virtually all kauri gum was found in the regions of New Zealand where kauri forests grow today - from the middle of the North Island northwards. In Maori and early European times up until 1850, most gum collected was simply picked up from the ground, but, after that, the majority was recovered by digging.</p>
                                    <p><strong>C</strong> The original inhabitants of New Zealand, the Maori, had experimented with kauri gum well before Europeans arrived at the beginning of the nineteenth century. They called it kapia, and found it of considerable use. <br><br>Fresh gum from trees was prized for its chewing quality, as was buried gum when softened in water and mixed with the juice of a local plant. A piece of gum was often passed around from mouth to mouth when people gathered together until it was all gone, or when they tired of chewing, it was laid aside for future use. <br><br>Kauri gum burns readily and was used by Maori people to light fires. Sometimes it was bound in grass, ignited and used as a torch by night fishermen to attract fish.</p>
                                    <p><strong>D</strong> The first kauri gum to be exported from New Zealand was part of a cargo taken back to Australia and England by two early expeditions in 1814 and 1815. By the 1860s, kauri gum's reputation was well established in the overseas markets and European immigrants were joining the Maoris in collecting gum on the hills of northern New Zealand. As the surface gum became more scarce, spades were used to dig up the buried 'treasure'. The increasing number of diggers resulted in rapid growth of the kauri gum exports from 1,000 tons in 1860 to a maximum of over 10,000 tons in 1900. <br><br>For fifty years from about 1870 to 1920, the kauri gum industry was a major source of income for settlers in northern New Zealand. As these would-be farmers struggled to break in the land, many turned to gum-digging to earn enough money to support their families and pay for improvements to their farms until better times arrived. By the 1890s, there were 20,000 people engaged in gum-digging. Although many of these, such as farmers, women and children, were only part-time diggers, nearly 7,000 were full-timers. During times of economic difficulty, gum-digging was the only job available where the unemployed from many walks of life could earn a living, if they were prepared to work.</p>
                                    <p><strong>E</strong> The first major commercial use of kauri gum was in the manufacture of high-grade furniture varnish, a kind of clear paint used to treat wood. The best and purest gum that was exported prior to 1910 was used in this way. Kauri gum was used in 70% of the oil varnishes being manufactured in England in the 1890s. It was favoured ahead of other gums because it was easier to process at lower temperatures. The cooler the process could be kept the better, as it meant a paler varnish could be produced.<br><br> About 1910, kauri gum was found to be a very suitable ingredient in the production of some kinds of floor coverings such as linoleum. In this way, a use was found for the vast quantities of poorer quality and less pure gum, that had up till then been discarded as waste. Kauri gum's importance in the manufacture of varnish and linoleum was displaced by synthetic alternatives in the 1930s.</p>
                                    <p><strong>F</strong> Fossil kauri gum is rather soft and can be carved easily with a knife or polished with fine sandpaper. In the time of Queen Victoria of England (1837-1901), some pieces were made into fashionable amber beads that women wore around their necks. The occasional lump that contained preserved insects was prized for use in necklaces and bracelets. Many of the gum-diggers enjoyed the occasional spell of carving and produced a wide variety of small sculptured pieces. Many of these carvings can be seen today in local museums.<br><br> Over the years, kauri gum has also been used in a number of minor products, such as an ingredient in marine glue and candles. In the last decades, it has had a very limited use in the manufacture of extremely high-grade varnish for violins, but the gum of the magnificent kauri tree remains an important part of New Zealand's history.</p>
                                </div>
                            </div>
                            <!-- Column 2 -->
                            <div class="col-md-6 question_site">
                                <h3><strong>Questions 28-33</strong></h3>
                                <p>The text has six sections <strong>A-F</strong>.</p>
                                <p>Which section contains the following information?<br></p>

                                  @php
                                      $q28_33 = [
                                          28 => 'an example of a domestic product made of high-quality gum',
                                          29 => 'factors affecting gum quality',
                                          30 => 'how kauri gum is formed',
                                          31 => 'how gum was gathered',
                                          32 => 'the main industrial uses of the gum',
                                          33 => 'recent uses of kauri gum'
                                      ];
                                  @endphp

                                  <div class="matching-grid mt-4">
                                      <table class="table table-bordered text-center">
                                          <thead>
                                              <tr>
                                                  <th>Statements</th>
                                                  @foreach(['A', 'B', 'C', 'D', 'E', 'F'] as $char)
                                                      <th class="choice-cell">{{ $char }}</th>
                                                  @endforeach
                                              </tr>
                                          </thead>
                                          <tbody>
                                              @foreach($q28_33 as $qNum => $qContent)
                                                  <tr>
                                                      <td class="text-start"><strong>{{ $qNum }}</strong>.
                                                          {{ $qContent }}
                                                      </td>
                                                      @foreach(['A', 'B', 'C', 'D', 'E', 'F'] as $char)
                                                          <td class="choice-cell tick-cell" data-row="{{ $qNum }}"
                                                              data-value="{{ $char }}">
                                                              <span class="tick">✓</span>
                                                          </td>
                                                      @endforeach
                                                  </tr>
                                              @endforeach
                                          </tbody>
                                      </table>
                                  </div>

                                  <!-- Hidden Inputs for saving -->
                                  <div style="display:none;">
                                      @foreach(range(28, 33) as $qNum)
                                          <input type="text" name="q{{ $qNum }}" id="q{{ $qNum }}"
                                              value="{{ $answers[$qNum] ?? '' }}">
                                      @endforeach
                                  </div>

                                <div class="mt-5">
                                    <h3><strong>Questions 34-39</strong></h3>
                                    <p>Look at the following events (Questions <strong>34-39</strong>) in the history of kauri gum in New Zealand  and the list of time periods below.</p>
                                    <p>Choose the correct time periods for each event and move it into the gap.</p>

                                    <div id="q34_39_normal" style="display: flex; flex-wrap: wrap; gap: 15px;">
                                        <p style="margin: 0;"> Kauri gum was first used in New Zealand. <input type="text" class="dnd-drop-input" data-question="q34" placeholder="34" readonly value="{{ $answers[34] ?? '' }}"></p>
                                        <input type="text" name="q34" style="display:none;" id="q34" value="{{ $answers[34] ?? '' }}">

                                        <p style="margin: 0;"> The amount of kauri gum sent overseas peaked. <input type="text" class="dnd-drop-input" data-question="q35" placeholder="35" readonly value="{{ $answers[35] ?? '' }}"></p>
                                        <input type="text" name="q35" style="display:none;" id="q35" value="{{ $answers[35] ?? '' }}">

                                        <p style="margin: 0;"> The collection of kauri gum supplemented farmers' incomes. <input type="text" class="dnd-drop-input" data-question="q36" placeholder="36" readonly value="{{ $answers[36] ?? '' }}"></p>
                                        <input type="text" name="q36" style="display:none;" id="q36" value="{{ $answers[36] ?? '' }}">

                                        <p style="margin: 0;"> Kauri gum was made into jewellery. <input type="text" class="dnd-drop-input" data-question="q37" placeholder="37" readonly value="{{ $answers[37] ?? '' }}"></p>
                                        <input type="text" name="q37" style="display:none;" id="q37" value="{{ $answers[37] ?? '' }}">

                                        <p style="margin: 0;"> Kauri gum was used in the production of string instruments. <input type="text" class="dnd-drop-input" data-question="q38" placeholder="38" readonly value="{{ $answers[38] ?? '' }}"></p>
                                        <input type="text" name="q38" style="display:none;" id="q38" value="{{ $answers[38] ?? '' }}">

                                        <p style="margin: 0;"> Most of the kauri gum was found underground. <input type="text" class="dnd-drop-input" data-question="q39" placeholder="39" readonly value="{{ $answers[39] ?? '' }}"></p>
                                        <input type="text" name="q39" style="display:none;" id="q39" value="{{ $answers[39] ?? '' }}">
                                    </div>

                                    <div style="border: 1px solid #ccc; padding: 10px; background: #f9f9f9; margin-top: 10px;">
                                        <h6><strong>List of Time Periods</strong></h6>
                                        <div id="dnd-time-periods-list" style="display: flex; flex-wrap: wrap; gap: 10px;">
                                            <div class="dnd-heading" draggable="true" data-value="A" data-content="A"> before the 1800s</div>
                                            <div class="dnd-heading" draggable="true" data-value="B" data-content="B"> in 1900</div>
                                            <div class="dnd-heading" draggable="true" data-value="C" data-content="C"> in 1910</div>
                                            <div class="dnd-heading" draggable="true" data-value="D" data-content="D"> between the late 1800s and the early 1900s</div>
                                            <div class="dnd-heading" draggable="true" data-value="E" data-content="E"> between the 1830s and 1900</div>
                                            <div class="dnd-heading" draggable="true" data-value="F" data-content="F"> in 1814 and 1815</div>
                                            <div class="dnd-heading" draggable="true" data-value="G" data-content="G"> after 1850</div>
                                            <div class="dnd-heading" draggable="true" data-value="H" data-content="H"> in the 1930s</div>
                                            <div class="dnd-heading" draggable="true" data-value="I" data-content="I"> in recent times</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <h3><strong>Question 40</strong></h3>
                                    <p>Choose the correct answer.</p>

                                    <div class="mcq-block" id="q40_mcq">
                                        <div class="mcq-item">
                                            <div class="mcq-head">
                                                <div class="mcq-num">40</div>
                                                <div class="mcq-q">What was most likely to reduce the quality of kauri gum?</div>
                                            </div>
                                            <div class="mcq-options">
                                                <label><input type="radio" class="mcq-sync" name="q40_radio" value="A" data-target="q40"> <span> how long it was buried</span></label>
                                                <label><input type="radio" class="mcq-sync" name="q40_radio" value="B" data-target="q40"> <span> exposure to water</span></label>
                                                <label><input type="radio" class="mcq-sync" name="q40_radio" value="C" data-target="q40"> <span> how deep it was buried</span></label>
                                                <label><input type="radio" class="mcq-sync" name="q40_radio" value="D" data-target="q40"> <span> exposure to heat</span></label>
                                                <input type="text" name="q40" id="q40" style="display:none;">
                                            </div>
                                        </div>
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
                                const sidebar = document.getElementById('sidebar');
                                const mainContent = document.getElementById('main-content');
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
                                    
                                    testForm.addEventListener('keydown', (e) => { 
                                        if (e.key === 'Enter') {
                                            const tag = e.target.tagName;
                                            if (tag === 'INPUT' || tag === 'TEXTAREA') {
                                                e.preventDefault();
                                                return false;
                                            }
                                        }
                                    });
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

                                function setActiveQuestion(index) {
                                    if (index < 0 || index >= allLinks.length) return;
                                    currentIndex = index;
                                    const qNum = allLinks[index].getAttribute('data-question');

                                    // Update links
                                    allLinks.forEach(link => link.classList.remove('active'));
                                    allLinks[index].classList.add('active');
                                    
                                    document.querySelectorAll('.mcq-num, .tfng-num, .question-number').forEach(num => num.classList.remove('active'));
                                    const headerNum = document.getElementById(`question-${qNum}-number`) || 
                                                    document.querySelector(`.mcq-num[data-q="${qNum}"]`) || 
                                                    document.querySelector(`.tfng-num[data-q="${qNum}"]`);
                                    
                                    if (headerNum) headerNum.classList.add('active');

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
                                        if (qNum) {
                                            const qIdx = allLinks.findIndex(l => l.getAttribute('data-question') === String(qNum));
                                            if (qIdx !== -1) {
                                                currentIndex = qIdx;
                                                allLinks.forEach(link => link.classList.remove('active'));
                                                allLinks[currentIndex].classList.add('active');
                                            }
                                        }
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

                                // --- SIDEBAR TOGGLE ---
                                const noteToggle = document.getElementById('noteToggle');
                                const closeBtn = sidebar.querySelector('.close-btn');

                                if (noteToggle) {
                                    noteToggle.addEventListener('click', () => {
                                        sidebar.classList.add('open');
                                        mainContent.classList.add('shifted');
                                    });
                                }

                                if (closeBtn) {
                                    closeBtn.addEventListener('click', () => {
                                        sidebar.classList.remove('open');
                                        mainContent.classList.remove('shifted');
                                    });
                                }

                                // --- SAVED ANSWERS INITIALIZATION ---
                                const savedAnswers = @json($answers ?? []);
                                Object.keys(savedAnswers || {}).forEach(function(qNum) {
                                    const value = savedAnswers[qNum];
                                    if (value === null || value === undefined) return;
                                    const strVal = String(value);
                                    if (strVal.trim() === '') return;

                                    const hidden = document.querySelector('input[name="q' + String(qNum) + '"]');
                                    if (hidden && (hidden.value || '') === '') {
                                        hidden.value = strVal;
                                    }
                                });

                                // Initialize matching grids from hidden inputs (Q1-6, Q28-33)
                                [1,2,3,4,5,6,28,29,30,31,32,33].forEach(function(qNum) {
                                    const hidden = document.querySelector(`input[name="q${qNum}"]`);
                                    if (!hidden) return;
                                    const val = (hidden.value || '').toUpperCase().trim();
                                    if (!val) return;
                                    
                                    const cells = document.querySelectorAll(`.tick-cell[data-row="${qNum}"]`);
                                    cells.forEach(cell => cell.classList.remove('selected'));
                                    const selectedCell = document.querySelector(`.tick-cell[data-row="${qNum}"][data-value="${val}"]`);
                                    if (selectedCell) selectedCell.classList.add('selected');
                                });

                                // Add event listeners for radio button sync (Q7-14 tfng, Q15-27 tfng, Q40 mcq)
                                document.querySelectorAll('.tfng-sync, .mcq-sync').forEach(function(radio) {
                                    radio.addEventListener('change', function() {
                                        const target = radio.getAttribute('data-target');
                                        if (!target) return;
                                        const hidden = document.querySelector(`input[name="${target}"]`);
                                        if (hidden) hidden.value = radio.value;
                                    });
                                });

                                // Initialize radio buttons from hidden inputs (Q7-27, Q40)
                                const radioQuestions = [7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,40];
                                radioQuestions.forEach(function(qNum) {
                                    const hidden = document.querySelector(`input[name="q${qNum}"]`);
                                    if (!hidden) return;
                                    const val = (hidden.value || '').trim();
                                    if (!val) return;
                                    const radio = document.querySelector(`input[name="q${qNum}_radio"][value="${val}"]`);
                                    if (radio) radio.checked = true;
                                });

                                // grid click function for Questions 1-6
                                function setGridAnswer(row, value) {
                                    const cells = document.querySelectorAll(`.tick-cell[data-row="${row}"]`);
                                    cells.forEach(cell => cell.classList.remove('selected'));
                                    const selectedCell = document.querySelector(`.tick-cell[data-row="${row}"][data-value="${value}"]`);
                                    if (selectedCell) selectedCell.classList.add('selected');
                                    const hiddenInput = document.getElementById(`q${row}`);
                                    if (hiddenInput) {
                                        hiddenInput.value = value;
                                        hiddenInput.dispatchEvent(new Event('change'));
                                    }

                                    // Update active state in question navigation panel
                                    const qIdx = allLinks.findIndex(l => l.getAttribute('data-question') === String(row));
                                    if (qIdx !== -1) {
                                        currentIndex = qIdx;
                                        allLinks.forEach(link => link.classList.remove('active'));
                                        allLinks[currentIndex].classList.add('active');
                                    }
                                }

                                document.addEventListener('click', function(e) {
                                    const cell = e.target.closest('.tick-cell');
                                    if (cell) {
                                        const row = cell.getAttribute('data-row');
                                        if ((row >= 1 && row <= 6) || (row >= 28 && row <= 33)) {
                                            const value = cell.getAttribute('data-value');
                                            setGridAnswer(row, value);
                                        }
                                    }
                                });

                                // --- DRAG AND DROP (Questions 34-39) ---
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
                                    var text = headingEl.textContent;
                                    var qName = dropInput.getAttribute('data-question');

                                    var oldVal = dropInput.getAttribute('data-placed-value');
                                    if (oldVal) {
                                        var oldH = document.querySelector(`.dnd-heading[data-value="${oldVal}"]`);
                                        if (oldH) {
                                            oldH.classList.remove('used');
                                            oldH.style.display = '';
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

                                    var hidden = document.querySelector(`input[name="${qName}"]`);
                                    if (hidden) {
                                        hidden.value = content;
                                        hidden.dispatchEvent(new Event('change'));
                                    }

                                    // Auto-scroll removed as requested
                                    /*
                                    const qNum = qName.replace('q', '');
                                    const qIdx = allLinks.findIndex(l => l.getAttribute('data-question') === String(qNum));
                                    if (qIdx !== -1) {
                                        setActiveQuestion(qIdx);
                                    }
                                    */
                                }

                                document.querySelectorAll('.dnd-drop-input').forEach(dropInput => {
                                    dropInput.addEventListener('dblclick', function() {
                                        var oldVal = this.getAttribute('data-placed-value');
                                        if (oldVal) {
                                            var h = document.querySelector(`.dnd-heading[data-value="${oldVal}"]`);
                                            if (h) {
                                                h.classList.remove('used');
                                                h.style.display = '';
                                            }
                                        }
                                        this.value = '';
                                        this.removeAttribute('data-placed-value');
                                        this.style.width = '100px';
                                        this.style.border = '1px solid #ccc';
                                        this.style.boxShadow = 'none';
                                        var qName = this.getAttribute('data-question');
                                        var hidden = document.querySelector(`input[name="${qName}"]`);
                                        if (hidden) {
                                            hidden.value = '';
                                            hidden.dispatchEvent(new Event('change'));
                                        }
                                    });
                                });

                                document.querySelectorAll('.dnd-heading').forEach(el => {
                                    el.addEventListener('mousedown', function(e) {
                                        if (this.classList.contains('used')) return;
                                        e.preventDefault();
                                        dndDraggedEl = this;
                                        dndSourceInput = null;
                                        this.classList.add('dragging');

                                        dndGhost = document.createElement('div');
                                        dndGhost.className = 'dnd-ghost-follow';
                                        dndGhost.textContent = this.textContent;
                                        dndGhost.style.left = e.clientX + 'px';
                                        dndGhost.style.top = e.clientY - 15 + 'px';
                                        document.body.appendChild(dndGhost);
                                    });
                                });

                                document.querySelectorAll('.dnd-drop-input').forEach(inp => {
                                    inp.addEventListener('mousedown', function(e) {
                                        var placedVal = this.getAttribute('data-placed-value');
                                        if (!placedVal) return;
                                        e.preventDefault();

                                        var heading = document.querySelector(`.dnd-heading[data-value="${placedVal}"]`);
                                        if (!heading) return;

                                        dndDraggedEl = heading;
                                        dndSourceInput = this;

                                        dndGhost = document.createElement('div');
                                        dndGhost.className = 'dnd-ghost-follow';
                                        dndGhost.textContent = heading.textContent;
                                        dndGhost.style.left = e.clientX + 'px';
                                        dndGhost.style.top = e.clientY - 15 + 'px';
                                        document.body.appendChild(dndGhost);
                                    });
                                });

                                document.addEventListener('mousemove', e => {
                                    if (!dndGhost) return;
                                    dndGhost.style.left = e.clientX + 'px';
                                    dndGhost.style.top = e.clientY - 15 + 'px';

                                    document.querySelectorAll('.dnd-drop-input').forEach(inp => {
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

                                document.addEventListener('mouseup', e => {
                                    if (!dndDraggedEl || !dndGhost) return;

                                    if (dndGhost.parentNode) dndGhost.parentNode.removeChild(dndGhost);
                                    dndGhost = null;

                                    var droppedOnInput = false;
                                    document.querySelectorAll('.dnd-drop-input').forEach(inp => {
                                        inp.style.borderColor = '#ccc';
                                        inp.style.background = '#fff';
                                        var rect = inp.getBoundingClientRect();
                                        if (e.clientX >= rect.left && e.clientX <= rect.right && e.clientY >= rect.top && e.clientY <= rect.bottom) {
                                            if (dndSourceInput && dndSourceInput !== inp) {
                                                dndSourceInput.value = '';
                                                dndSourceInput.removeAttribute('data-placed-value');
                                                dndSourceInput.style.width = '100px';
                                                dndSourceInput.style.border = '1px solid #ccc';
                                                dndSourceInput.style.boxShadow = 'none';
                                                var srcQ = dndSourceInput.getAttribute('data-question');
                                                var srcHidden = document.querySelector(`input[name="${srcQ}"]`);
                                                if (srcHidden) {
                                                    srcHidden.value = '';
                                                    srcHidden.dispatchEvent(new Event('change'));
                                                }
                                            } else if (dndSourceInput && dndSourceInput === inp) {
                                                dndDraggedEl.classList.remove('dragging');
                                                dndDraggedEl = null;
                                                dndSourceInput = null;
                                                return;
                                            }
                                            dndDraggedEl.classList.remove('used');
                                            dndDraggedEl.style.display = '';
                                            dndPlaceHeading(inp, dndDraggedEl);
                                            droppedOnInput = true;
                                        }
                                    });

                                    if (!droppedOnInput && dndSourceInput) {
                                        dndDraggedEl.classList.remove('used');
                                        dndDraggedEl.style.display = '';
                                        dndSourceInput.value = '';
                                        dndSourceInput.removeAttribute('data-placed-value');
                                        dndSourceInput.style.width = '100px';
                                        dndSourceInput.style.border = '1px solid #ccc';
                                        dndSourceInput.style.boxShadow = 'none';
                                        var srcQ = dndSourceInput.getAttribute('data-question');
                                        var srcHidden = document.querySelector(`input[name="${srcQ}"]`);
                                        if (srcHidden) {
                                            srcHidden.value = '';
                                            srcHidden.dispatchEvent(new Event('change'));
                                        }
                                    }

                                    if (dndDraggedEl) dndDraggedEl.classList.remove('dragging');
                                    dndDraggedEl = null;
                                    dndSourceInput = null;
                                });

                                // Restore saved DND values
                                ['q34', 'q35', 'q36', 'q37', 'q38', 'q39'].forEach(qName => {
                                    var hidden = document.querySelector(`input[name="${qName}"]`);
                                    if (!hidden || !hidden.value) return;
                                    var savedVal = hidden.value.trim();
                                    var heading = document.querySelector(`.dnd-heading[data-content="${savedVal}"]`);
                                    var dropInput = document.querySelector(`.dnd-drop-input[data-question="${qName}"]`);
                                    if (heading && dropInput) {
                                        var text = heading.textContent;
                                        heading.classList.add('used');
                                        heading.style.display = 'none';
                                        dropInput.value = text;
                                        dropInput.setAttribute('data-placed-value', heading.getAttribute('data-value'));
                                        var tw = measureTextWidth(text, window.getComputedStyle(dropInput).font);
                                        dropInput.style.width = (tw + 30) + 'px';
                                        dropInput.style.border = 'none';
                                        dropInput.style.boxShadow = '0 2px 8px rgba(0,0,0,0.15)';
                                    }
                                });

                                // Initial question setup
                                setActiveQuestion(0);
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
        let activePopup = null; // track the active popup

        let clickedMark = null; // Track which mark was right-clicked

        function getTableCell(node) {
            let parent = node && node.nodeType === Node.TEXT_NODE ? node.parentNode : node;
            while (parent) {
                if (parent.tagName === 'TD' || parent.tagName === 'TH') {
                    return parent;
                }
                parent = parent.parentNode;
            }
            return null;
        }

        function highlightRange(range) {
            if (!range || range.collapsed) return [];

            const commonAncestor = range.commonAncestorContainer;
            const root = commonAncestor.nodeType === Node.TEXT_NODE ? commonAncestor.parentNode : commonAncestor;

            const walker = document.createTreeWalker(
                root,
                NodeFilter.SHOW_TEXT,
                {
                    acceptNode: function(node) {
                        return range.intersectsNode(node) ? NodeFilter.FILTER_ACCEPT : NodeFilter.FILTER_REJECT;
                    }
                }
            );

            const textNodes = [];
            while (walker.nextNode()) {
                textNodes.push(walker.currentNode);
            }

            const marks = [];
            textNodes.forEach(node => {
                const start = (node === range.startContainer) ? range.startOffset : 0;
                const end = (node === range.endContainer) ? range.endOffset : node.length;

                if (start >= end) return;

                const textToHighlight = node.textContent.substring(start, end);
                if (!textToHighlight.trim()) return;

                // Split the text node
                const highlightRange = document.createRange();
                highlightRange.setStart(node, start);
                highlightRange.setEnd(node, end);

                const mark = document.createElement('mark');
                mark.style.backgroundColor = 'yellow';
                
                try {
                    highlightRange.surroundContents(mark);
                    marks.push(mark);
                } catch (e) {
                    // surroundContents can fail if the range splits non-text nodes
                    // Fallback to manual insertion if needed
                    const content = highlightRange.extractContents();
                    mark.appendChild(content);
                    highlightRange.insertNode(mark);
                    marks.push(mark);
                }
            });

            return marks;
        }
        
        // Show custom context menu on text selection
        document.addEventListener('contextmenu', function(e) {
            // Check if right-clicking on already highlighted text (mark element)
            if (e.target.tagName === 'MARK') {
                e.preventDefault();
                clickedMark = e.target; // Store the clicked mark
                contextMenu.style.display = 'block';
                contextMenu.style.left = e.pageX + 'px';
                contextMenu.style.top = e.pageY + 'px';
                return;
            }
            
            clickedMark = null; // Reset if not clicking on mark
            const selection = window.getSelection();
            if (selection.rangeCount > 0 && selection.toString().trim() !== '') {
                e.preventDefault();
                selectionRange = selection.getRangeAt(0).cloneRange();
                contextMenu.style.display = 'block';
                contextMenu.style.left = e.pageX + 'px';
                contextMenu.style.top = e.pageY + 'px';
            } else {
                contextMenu.style.display = 'none';
            }
        });

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
                let marks = [];
                const selectedGroupText = (selectionRange.toString ? selectionRange.toString() : '').trim();
                try {
                    marks = highlightRange(selectionRange);
                    window.getSelection().removeAllRanges();
                } catch (err) {
                    console.log('Highlight error:', err);
                }
                if (!marks.length) {
                    contextMenu.style.display = 'none';
                    return;
                }

                const markId = Date.now();
                const groupText = selectedGroupText || marks.map(m => m.innerText).join(' ');
                marks.forEach((mark) => {
                    mark.setAttribute('data-tooltip', '');
                    mark.setAttribute('data-note', '');
                    mark.dataset.fullText = groupText;
                    mark.dataset.markId = markId;

                    mark.addEventListener('click', function(e) {
                        e.stopPropagation();
                        showNotePopup(mark);
                    });
                });

                // Also add entry to sidebar
                const sidebar = document.getElementById('sidebar');
                const noteDiv = document.createElement('div');
                noteDiv.classList.add('sidebar-note-item');
                noteDiv.innerHTML = `
                    <div class="sidebar-header" style="margin-bottom: 3px; cursor: pointer;">${groupText}</div>
                    <div class="sidebar-note-content" style="color: #666; white-space: pre-wrap;"></div>
                `;
                noteDiv.style.borderBottom = '1px solid #ccc';
                noteDiv.style.padding = '8px';
                
                // Store reference to mark element
                noteDiv.dataset.markId = markId;
                
                sidebar.appendChild(noteDiv);

                // Click sidebar item to open popup
                noteDiv.addEventListener('click', () => {
                    showNotePopup(marks[0]);
                });

                // Immediately show popup for new note
                showNotePopup(marks[0]);
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
                }
                
                // Remove highlight and restore original text
                const parent = clickedMark.parentNode;
                while (clickedMark.firstChild) {
                    parent.insertBefore(clickedMark.firstChild, clickedMark);
                }
                parent.removeChild(clickedMark);
                
                clickedMark = null;
            }
            contextMenu.style.display = 'none';
        });

        // Clear all highlights and notes
        allClearOption.addEventListener('click', function() {
            document.querySelectorAll('mark').forEach(marked => {
                marked.replaceWith(document.createTextNode(marked.innerText));
            });
            const notePopup = document.querySelector('.note-popup');
            if (notePopup) notePopup.remove();
            activePopup = null;

            const sidebar = document.getElementById('sidebar');
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

            sidebar.classList.remove('open');
            document.getElementById('main-content').classList.remove('shifted');
            contextMenu.style.display = 'none';
        });

        // Close context menu on outside click
        document.addEventListener('click', function(e) {
            if (!contextMenu.contains(e.target)) {
                contextMenu.style.display = 'none';
            }
        });

        // Function to show note popup for a mark element
        function showNotePopup(mark) {
            if (activePopup) {
                activePopup.remove();
                document.removeEventListener('click', handleOutsideClick);
            }

            const notePopup = document.createElement('div');
            notePopup.classList.add('note-popup');
            const popupTitle = (mark.dataset.fullText || mark.innerText || '').trim();
            notePopup.innerHTML = `
        <div class="drag-handle" style="background: linear-gradient(to bottom, #f0f0f0, #d0d0d0); padding: 8px; cursor: move; border-bottom: 2px solid #999; display: flex; justify-content: space-between; align-items: center; user-select: none;">
            <span style="font-size: 12px; color: #666;"> Drag to move</span>
            <span class="close-note" style="cursor: pointer; font-size: 20px; font-weight: bold; color: #666;">&times;</span>
        </div>
        <div class="popup-header" contenteditable="true" style="font-weight: bold; cursor: text; padding: 8px; background: rgba(0,0,0,0.05); margin-bottom: 5px; border: 1px solid #ccc; outline: none;">${popupTitle}</div>
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
            let isDragging = false,
                offsetX, offsetY;
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
    </body>
</html>
