<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Writing Test - Unified</title>
    
    <script src="{{ asset('js/disable-find.js') . '?v=20260831b' }}"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
    <style>
        .nav-item { display: flex; align-items: center; justify-content: center; }
        .nav-link { display: flex; align-items: center; }
        .navbar-nav.ml-auto { margin-left: auto; display: flex; align-items: center; }
        .material-icons-outlined { margin-right: 8px; }
        .question_part { border: 1px solid gray; margin-top: 15px; padding: 10px; border-radius: 5px; background-color: #F7F7F7; height: 85px; }
        .options { list-style-type: none; padding-left: 0; }
        .options li { display: flex; align-items: center; margin: 10px 0; padding: 5px; }
        .options li:hover { cursor: pointer; }
        .options input[type="radio"] { margin-right: 10px; }
        .question { margin-bottom: 15px; }
        .row { margin-top: 20px; }
        .tabs { display: flex; margin-bottom: 20px; justify-content: space-between; }
        .tab { display: flex; gap: 15px; padding: 10px 20px; cursor: pointer; font-weight: bold; text-align: center; align-items: center; border-bottom: none; margin-right: 5px; border-radius: 4px 4px 0 0; transition: background-color 0.3s; }
        .tab:hover { background-color: #e0e0e0; }
        .tab.active { background-color: #007bff; color: white; }
        .tab-content { display: none; }
        .tab-content.active { display: block; }
        .question-links { display: none; gap: 10px; }
        .question-link { padding: 5px 10px; background-color: #f8f9fa; border: 1px solid #dee2e6; border-radius: 3px; text-decoration: none; color: #495057; font-size: 14px; }
        .question-link:hover { background-color: #e9ecef; text-decoration: none; color: #495057; }
        .question-link.active { background-color: #007bff; color: white; }
        .question-placeholder { font-size: 14px; color: #6c757d; }
        .question-number { display: inline-block; width: 30px; height: 30px; line-height: 30px; text-align: center; border: 2px solid #ccc; border-radius: 50%; margin-right: 10px; font-weight: bold; }
        .question-number.active { background-color: #007bff; color: white; border-color: #007bff; }
        .sidebar { position: fixed; top: 0; right: -400px; width: 400px; height: 100vh; background: white; box-shadow: -2px 0 10px rgba(0,0,0,0.1); transition: right 0.3s ease; z-index: 1050; padding: 20px; overflow-y: auto; }
        .sidebar.open { right: 0; }
        .sidebar-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 10px; }
        .close-btn { font-size: 24px; cursor: pointer; color: #666; }
        .close-btn:hover { color: #000; }
        .main-content { transition: margin-right 0.3s ease; }
        .main-content.shifted { margin-right: 400px; }
        .note-popup { position: absolute; width: 300px; background: white; border: 2px solid #999; border-radius: 5px; box-shadow: 0 4px 8px rgba(0,0,0,0.2); z-index: 1000; }
        .custom-context-menu { display: none; position: absolute; background: white; border: 1px solid #ccc; border-radius: 5px; box-shadow: 0 2px 10px rgba(0,0,0,0.2); z-index: 1000; min-width: 120px; }
        .context-menu-item { padding: 8px 12px; cursor: pointer; display: flex; align-items: center; }
        .context-menu-item:hover { background-color: #f0f0f0; }
        .context-menu-item i { margin-right: 8px; font-size: 16px; }
    </style>
</head>
<body>
    <!-- Start Modal -->
    <div class="modal fade" id="startModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Writing Test</h5>
                </div>
                <div class="modal-body">
                    <p>You are about to start the Writing Test. Click OK to begin.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="startTestButton">OK</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Finish Modal -->
    <div class="modal fade" id="finishModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Finish Test</h5>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to finish the test?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="continueButton">Continue</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Context Menu -->
    <div id="customContextMenu" class="custom-context-menu">
        <div class="context-menu-item" id="highlightOption">
            <i class="material-icons-outlined" style="color: #ffc107;">highlight</i>
            Highlight
        </div>
        <div class="context-menu-item" id="notesOption">
            <i class="material-icons-outlined" style="color: #17a2b8;">note_add</i>
            Notes
        </div>
        <div class="context-menu-item" id="clearOption">
            <i class="material-icons-outlined" style="color: #dc3545;">clear</i>
            Clear
        </div>
        <div class="context-menu-item" id="allClear">
            <i class="material-icons-outlined" style="color: #6c757d;">clear_all</i>
            Clear all
        </div>
    </div>

    <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
        <div class="sidebar-header">
            <h5>Notes</h5>
            <span class="close-btn">&times;</span>
        </div>
    </div>

    <!-- Main Content -->
    <div id="main-content" class="main-content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light px-5">
            <a class="navbar-brand" href="#">Writing Test</a>
            <div class="navbar-nav ml-auto">
                <div class="nav-item">
                    <span class="nav-link">
                        <span class="material-icons-outlined">schedule</span>
                        <span id="timer">60 : 00 minutes remaining</span>
                    </span>
                </div>
                <div class="nav-item">
                    <button class="btn btn-outline-primary" id="noteToggle">
                        <span class="material-icons-outlined">note</span>
                        Notes
                    </button>
                </div>
                <div class="nav-item">
                    <button class="btn btn-danger" id="finishButton">Finish</button>
                </div>
            </div>
        </nav>

        <!-- Navigation Tabs -->
        <div class="container-fluid mt-4">
            <div class="tabs">
                <div class="tab active" data-tab="task1">
                    <span class="tab-title">Task 1</span>
                    <div class="question-links">
                        <a href="#" class="question-link" data-question="task1">1</a>
                    </div>
                    <span class="question-placeholder">0 of 1</span>
                </div>
                <div class="tab" data-tab="task2">
                    <span class="tab-title">Task 2</span>
                    <div class="question-links">
                        <a href="#" class="question-link" data-question="task2">2</a>
                    </div>
                    <span class="question-placeholder">0 of 1</span>
                </div>
                <div class="tab" data-tab="task3">
                    <span class="tab-title">Task 3</span>
                    <div class="question-links">
                        <a href="#" class="question-link" data-question="task3">3</a>
                    </div>
                    <span class="question-placeholder">0 of 1</span>
                </div>
                <div class="tab" data-tab="task4">
                    <span class="tab-title">Task 4</span>
                    <div class="question-links">
                        <a href="#" class="question-link" data-question="task4">4</a>
                    </div>
                    <span class="question-placeholder">0 of 1</span>
                </div>
                <div class="tab" data-tab="task5">
                    <span class="tab-title">Task 5</span>
                    <div class="question-links">
                        <a href="#" class="question-link" data-question="task5">5</a>
                    </div>
                    <span class="question-placeholder">0 of 1</span>
                </div>
            </div>
        </div>

        <!-- Task Content Sections -->
        <div class="container-fluid">
            <!-- Task 1 Content -->
            <div id="task1" class="tab-content active">
                <div class="row">
                    <div class="col-md-12">
                        <div class="question_part">
                            <h5>Task 1</h5>
                            <p>You should spend about 20 minutes on this task.</p>
                            <p>The chart below shows the literacy rates by region and by gender for the year 2000-2004. Write a report for a university lecturer describing the information shown below.</p>
                            <p>You should write at least 150 words.</p>
                        </div>
                        <div class="mt-3">
                            <textarea id="taskOne" class="form-control" rows="15" placeholder="Write your response here..."></textarea>
                            <div class="mt-2">
                                <small class="text-muted" id="wordCountTask1">Word Count: 0</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Task 2 Content -->
            <div id="task2" class="tab-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="question_part">
                            <h5>Task 2</h5>
                            <p>You should spend about 40 minutes on this task.</p>
                            <p>Write about the following topic:</p>
                            <p><strong>Some people believe that unpaid community service should be a compulsory part of high school programmes (for example working for a charity, improving the neighbourhood or teaching sports to younger children).</strong></p>
                            <p><strong>To what extent do you agree or disagree?</strong></p>
                            <p>Give reasons for your answer and include any relevant examples from your own knowledge or experience.</p>
                            <p>You should write at least 250 words.</p>
                        </div>
                        <div class="mt-3">
                            <textarea id="taskTwo" class="form-control" rows="15" placeholder="Write your response here..."></textarea>
                            <div class="mt-2">
                                <small class="text-muted" id="wordCountTask2">Word Count: 0</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Task 3 Content -->
            <div id="task3" class="tab-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="question_part">
                            <h5>Task 3</h5>
                            <p>You should spend about 20 minutes on this task.</p>
                            <p>The graph below shows the consumption of fish and some different kinds of meat in a European country between 1979 and 2004.</p>
                            <p>Summarise the information by selecting and reporting the main features, and make comparisons where relevant.</p>
                            <p>You should write at least 150 words.</p>
                        </div>
                        <div class="mt-3">
                            <textarea id="taskThree" class="form-control" rows="15" placeholder="Write your response here..."></textarea>
                            <div class="mt-2">
                                <small class="text-muted" id="wordCountTask3">Word Count: 0</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Task 4 Content -->
            <div id="task4" class="tab-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="question_part">
                            <h5>Task 4</h5>
                            <p>You should spend about 40 minutes on this task.</p>
                            <p>Write about the following topic:</p>
                            <p><strong>In some countries, young people are encouraged to work or travel for a year between finishing high school and starting university studies.</strong></p>
                            <p><strong>Discuss the advantages and disadvantages of this trend.</strong></p>
                            <p>Give reasons for your answer and include any relevant examples from your own knowledge or experience.</p>
                            <p>You should write at least 250 words.</p>
                        </div>
                        <div class="mt-3">
                            <textarea id="taskFour" class="form-control" rows="15" placeholder="Write your response here..."></textarea>
                            <div class="mt-2">
                                <small class="text-muted" id="wordCountTask4">Word Count: 0</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Task 5 Content -->
            <div id="task5" class="tab-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="question_part">
                            <h5>Task 5</h5>
                            <p>You should spend about 40 minutes on this task.</p>
                            <p>Write about the following topic:</p>
                            <p><strong>Some people think that parents should teach children how to be good members of society. Others, however, believe that school is the place to learn this.</strong></p>
                            <p><strong>Discuss both these views and give your own opinion.</strong></p>
                            <p>Give reasons for your answer and include any relevant examples from your own knowledge or experience.</p>
                            <p>You should write at least 250 words.</p>
                        </div>
                        <div class="mt-3">
                            <textarea id="taskFive" class="form-control" rows="15" placeholder="Write your response here..."></textarea>
                            <div class="mt-2">
                                <small class="text-muted" id="wordCountTask5">Word Count: 0</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Tab Navigation Script -->
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

        // Initial setup: show only task1 question links
        window.addEventListener('DOMContentLoaded', () => {
            tabs.forEach(tab => {
                const qLinks = tab.querySelector('.question-links');
                const qPlaceholder = tab.querySelector('.question-placeholder');
                if (tab.getAttribute('data-tab') === 'task1') {
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

    <!-- Question Link Navigation Script -->
    <script>
        document.querySelectorAll('.question-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const taskId = this.getAttribute('data-question');

                // Remove existing active styles
                document.querySelectorAll('.question-link').forEach(l => l.classList.remove('active'));

                // Add active style to clicked link
                this.classList.add('active');

                // Focus on the corresponding textarea
                const textarea = document.getElementById(taskId === 'task1' ? 'taskOne' : 
                                                      taskId === 'task2' ? 'taskTwo' : 
                                                      taskId === 'task3' ? 'taskThree' : 
                                                      taskId === 'task4' ? 'taskFour' : 'taskFive');
                if (textarea) {
                    textarea.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                    textarea.focus();
                }
            });
        });
    </script>

    <!-- Timer and Modal Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const finishButton = document.getElementById('finishButton');
            const finishModal = new bootstrap.Modal(document.getElementById('finishModal'));
            const continueButton = document.getElementById('continueButton');
            const startTestButton = document.getElementById('startTestButton');
            
            // Declare startModal in proper scope
            const startModal = new bootstrap.Modal(document.getElementById('startModal'));

            // Start timer and close modal when OK is clicked
            startTestButton.addEventListener('click', () => {
                // Hide modal and clean up backdrop
                startModal.hide();
                
                // More aggressive backdrop cleanup
                setTimeout(() => {
                    // Remove all modal backdrops
                    const backdrops = document.querySelectorAll('.modal-backdrop');
                    backdrops.forEach(backdrop => backdrop.remove());
                    
                    // Remove modal-open class and reset body styles
                    document.body.classList.remove('modal-open');
                    document.body.style.overflow = '';
                    document.body.style.paddingRight = '';
                    document.body.style.marginRight = '';
                    
                    // Remove any remaining modal classes
                    document.body.classList.remove('modal-backdrop');
                    
                    // Force hide the modal element
                    const modalElement = document.getElementById('startModal');
                    if (modalElement) {
                        modalElement.style.display = 'none';
                        modalElement.classList.remove('show');
                        modalElement.setAttribute('aria-hidden', 'true');
                    }
                }, 50);
                
                // Additional cleanup after longer delay
                setTimeout(() => {
                    // Final cleanup sweep
                    const remainingBackdrops = document.querySelectorAll('.modal-backdrop, .fade');
                    remainingBackdrops.forEach(el => {
                        if (el.classList.contains('modal-backdrop')) {
                            el.remove();
                        }
                    });
                    
                    // Ensure body is completely reset
                    document.body.style.cssText = '';
                    document.body.className = document.body.className.replace(/modal-[^\s]*/g, '');
                }, 200);
            });

            finishButton.addEventListener('click', () => {
                finishModal.show();
            });

            continueButton.addEventListener('click', () => {
                localStorage.setItem('writingCompleted', 'true');
                window.location.href = "{{ url('/index') }}";
            });

            // Show the startModal on page load
            startModal.show();
        });
    </script>

    <!-- Sidebar Script -->
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

    <!-- Word Count Script -->
    <script>
        function countWords(text) {
            return text
                .trim()
                .split(/\s+/)
                .filter(word => word.length > 0).length;
        }

        // Add word count listeners for all textareas
        const textareas = [
            { id: 'taskOne', countId: 'wordCountTask1' },
            { id: 'taskTwo', countId: 'wordCountTask2' },
            { id: 'taskThree', countId: 'wordCountTask3' },
            { id: 'taskFour', countId: 'wordCountTask4' },
            { id: 'taskFive', countId: 'wordCountTask5' }
        ];

        textareas.forEach(({ id, countId }) => {
            const textarea = document.getElementById(id);
            const wordCount = document.getElementById(countId);
            
            if (textarea && wordCount) {
                textarea.addEventListener('input', function() {
                    wordCount.innerText = "Word Count: " + countWords(this.value);
                });
            }
        });
    </script>

    <!-- Highlight and Note System Script -->
    <script>
        const contextMenu = document.getElementById('customContextMenu');
        const highlightOption = document.getElementById('highlightOption');
        const notesOption = document.getElementById('notesOption');
        const clearOption = document.getElementById('clearOption');
        const allClearOption = document.getElementById('allClear');
        let selectionRange = null;
        let activePopup = null;
        let clickedMark = null;

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
                selectionRange = selection.getRangeAt(0);
                contextMenu.style.display = 'block';
                contextMenu.style.left = e.pageX + 'px';
                contextMenu.style.top = e.pageY + 'px';
            }
        });

        // Highlight only
        highlightOption.addEventListener('click', function() {
            if (selectionRange) {
                const mark = document.createElement('mark');
                mark.style.backgroundColor = 'yellow';
                mark.appendChild(selectionRange.extractContents());
                selectionRange.insertNode(mark);
            }
            contextMenu.style.display = 'none';
        });

        // Add note with popup
        notesOption.addEventListener('click', function() {
            if (clickedMark) {
                showNotePopup(clickedMark);
                contextMenu.style.display = 'none';
                return;
            }
            
            if (selectionRange) {
                const mark = document.createElement('mark');
                mark.style.backgroundColor = 'yellow';
                mark.setAttribute('data-tooltip', '');
                mark.setAttribute('data-note', '');
                mark.appendChild(selectionRange.extractContents());
                selectionRange.insertNode(mark);

                mark.addEventListener('click', function(e) {
                    e.stopPropagation();
                    showNotePopup(mark);
                });

                const sidebar = document.getElementById('sidebar');
                const noteDiv = document.createElement('div');
                noteDiv.classList.add('sidebar-note-item');
                noteDiv.innerHTML = `
                    <div class="sidebar-header" style="margin-bottom: 3px; cursor: pointer;">${mark.innerText}</div>
                    <div class="sidebar-note-content" style="color: #666; white-space: pre-wrap;"></div>
                `;
                noteDiv.style.borderBottom = '1px solid #ccc';
                noteDiv.style.padding = '8px';
                
                noteDiv.dataset.markId = Date.now();
                mark.dataset.markId = noteDiv.dataset.markId;
                
                sidebar.appendChild(noteDiv);

                noteDiv.addEventListener('click', () => {
                    showNotePopup(mark);
                });

                showNotePopup(mark);
            }
            contextMenu.style.display = 'none';
        });

        // Clear single highlight
        clearOption.addEventListener('click', function() {
            if (clickedMark) {
                const markId = clickedMark.dataset.markId;
                
                if (markId) {
                    const sidebarItem = document.querySelector(`.sidebar-note-item[data-mark-id="${markId}"]`);
                    if (sidebarItem) {
                        sidebarItem.remove();
                    }
                }
                
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

        // Function to show note popup
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
            if (activePopup && !activePopup.contains(e.target) && e.target.tagName !== 'MARK') {
                activePopup.remove();
                activePopup = null;
                document.removeEventListener('click', handleOutsideClick);
            }
        }
    </script>

    <!-- Auto Save Script -->
    <script>
        function autoSaveWriting() {
            const fd = new FormData();
            fd.append('_token', '{{ csrf_token() }}');
            fd.append('student_id', '{{ auth()->id() }}');
            fd.append('test_name', 'Writing Test Unified');

            fd.append('tasks[taskOne]', document.getElementById('taskOne').value || '');
            fd.append('tasks[taskTwo]', document.getElementById('taskTwo').value || '');
            fd.append('tasks[taskThree]', document.getElementById('taskThree').value || '');
            fd.append('tasks[taskFour]', document.getElementById('taskFour').value || '');
            fd.append('tasks[taskFive]', document.getElementById('taskFive').value || '');

            fetch('{{ route('writing.autosave') }}', { method: 'POST', body: fd })
                .then(r => r.json())
                .then(d => console.log('autosave:', d.status))
                .catch(console.error);
        }

        // Auto save every 30 seconds
        setInterval(autoSaveWriting, 30000);
    </script>

    {{-- Timer and highlight/note system from readingClassOne --}}
    @include('front_end.layout.commonScript')
</body>
</html>
