<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Result - {{ $examName }}</title>
    
    <script src="{{ asset('js/disable-find.js') . '?v=20260831b' }}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }
        
        .result-container {
            max-width: 900px;
            margin: 50px auto;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        
        .tabs-container {
            display: flex;
            border-bottom: 2px solid #e0e0e0;
            background: #f8f9fa;
            padding: 0 30px;
        }
        
        .tab-button {
            padding: 15px 30px;
            background: none;
            border: none;
            border-bottom: 3px solid transparent;
            cursor: pointer;
            font-size: 15px;
            font-weight: 500;
            color: #666;
            transition: all 0.3s;
            margin-bottom: -2px;
        }
        
        .tab-button:hover {
            color: #4a90e2;
        }
        
        .tab-button.active {
            color: #4a90e2;
            border-bottom-color: #4a90e2;
        }
        
        .tab-content {
            display: none;
        }
        
        .tab-content.active {
            display: block;
        }
        
        .header-bar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            height: 60px;
        }
        
        .student-info {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 30px;
            background: #e9ecef;
        }
        
        .student-info-left {
            display: flex;
            align-items: center;
        }
        
        .student-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 40px;
            font-weight: bold;
            margin-right: 30px;
            border: 4px solid white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
        }
        
        .student-details h2 {
            margin: 0;
            font-size: 28px;
            color: #333;
        }
        
        .band-score-right {
            background: white;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        
        .question-grid-container {
            position: relative;
            margin-bottom: 30px;
        }
        
        .question-grid {
            display: flex;
            gap: 10px;
            overflow-x: auto;
            overflow-y: hidden;
            padding: 10px 0;
            scroll-behavior: smooth;
        }
        
        .question-grid::-webkit-scrollbar {
            height: 8px;
        }
        
        .question-grid::-webkit-scrollbar-track {
            background: #e0e0e0;
            border-radius: 10px;
        }
        
        .question-grid::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }
        
        .question-grid::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
        
        .question-circle {
            width: 45px;
            height: 45px;
            min-width: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s;
            border: 2px solid transparent;
        }
        
        .question-circle:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        
        .question-circle.correct {
            background: #4caf50;
            color: white;
            border-color: #388e3c;
        }
        
        .question-circle.wrong {
            background: #f44336;
            color: white;
            border-color: #d32f2f;
        }
        
        .question-circle.unattempted {
            background: #e0e0e0;
            color: #666;
            border-color: #bdbdbd;
        }
        
        .question-circle.active {
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.3);
            transform: scale(1.15);
        }
        
        .btn-nav {
            padding: 10px 20px;
            background: #4a90e2;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .btn-nav:hover {
            background: #357abd;
            transform: translateY(-2px);
        }
        
        .btn-nav:disabled {
            background: #ccc;
            cursor: not-allowed;
            transform: none;
        }
        
        .results-table {
            margin: 30px;
        }
        
        .results-table table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .results-table th {
            background: #3b82c8;
            color: white;
            padding: 12px 15px;
            text-align: center;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 12px;
            border-right: 1px solid rgba(255,255,255,0.2);
        }
        
        .results-table th:last-child {
            border-right: none;
        }
        
        .results-table td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .results-table td:first-child {
            text-align: left;
            padding-left: 20px;
        }
        
        .results-table tbody tr {
            background: #f5f5f5;
        }
        
        .results-table tbody tr:nth-child(even) {
            background: white;
        }
        
        .results-table tbody tr:hover {
            background: #e8f4f8;
        }
        
        .score-cell {
            font-weight: bold;
            font-size: 14px;
        }
        
        .total-row {
            background: #d0d0d0 !important;
            font-weight: bold;
        }
        
        .total-row td {
            border-bottom: none;
            font-weight: 600;
        }
        
        .band-score {
            font-size: 24px;
            font-weight: bold;
            color: #4a90e2;
        }
    </style>
</head>
<body>
    <div class="result-container">
        <div class="header-bar"></div>
        
        <div class="student-info">
            <div class="student-info-left">
                <a href="{{ route('student.dashboard') }}" style="text-decoration: none;">
                    <div class="student-avatar">
                        <img src="{{asset('images/new logo.png')}}" alt="Logo" style="width: 100%; height: 100%; object-fit: contain; border-radius: 50%;">
                    </div>
                </a>
                <div class="student-details">
                    @if(isset($examStudentId) && $examStudentId)
                        <h2>{{ $examStudentId }}</h2>
                    @else
                        <h2>Student</h2>
                    @endif
                </div>
            </div>
            @if(isset($bandScore))
            <div class="band-score-right">
                <p class="band-score">Band Score: {{ $bandScore }}</p>
            </div>
            @endif
        </div>
        
        <div class="tabs-container">
            <button class="tab-button active" onclick="switchTab('brief')">Brief</button>
            <button class="tab-button" onclick="switchTab('question')">Question-Wise</button>
        </div>
        
        <div id="brief-tab" class="tab-content active">
            <div class="results-table">
            <table>
                <thead>
                    <tr>
                        <th>PART</th>
                        <th>Number of Questions</th>
                        <th>Attempted</th>
                        <th>Correct</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($questionTypes as $type)
                    <tr>
                        <td style="text-align: left; padding-left: 20px;">{{ $type['name'] }}</td>
                        <td>{{ $type['total'] }}</td>
                        <td>{{ $type['attempted'] }}</td>
                        <td>{{ $type['correct'] }}</td>
                        <td class="score-cell">{{ $type['correct'] }}/{{ $type['total'] }}</td>
                    </tr>
                    @endforeach
                    
                    <tr class="total-row">
                        <td style="text-align: left; padding-left: 20px;">TOTAL</td>
                        <td>{{ $totalQuestions }}</td>
                        <td>{{ $totalAttempted }}</td>
                        <td>{{ $totalCorrect }}</td>
                        <td class="score-cell">{{ $totalCorrect }}/{{ $totalQuestions }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>
        
        <div id="question-tab" class="tab-content">
            <div style="padding: 30px;">
                <h4 style="color: #333; margin-bottom: 20px;">Check answers for all 40 questions</h4>
                
                <div class="question-grid-container">
                    <div class="question-grid">
                        @foreach($questionDetails as $question)
                        <div class="question-circle {{ $question['status'] }}" 
                             onclick="showQuestionDetail({{ $question['number'] }})"
                             data-question="{{ $question['number'] }}"
                             style="cursor: pointer;">
                            {{ $question['number'] }}
                        </div>
                        @endforeach
                    </div>
                </div>
                
                <div id="question-detail-container" style="display: none; margin-top: 30px; padding: 20px; border: 2px solid #ddd; border-radius: 8px; background: #f9f9f9;">
                    <h5 id="question-title" style="color: #333; margin-bottom: 15px;">Question 1</h5>
                    
                    <div style="margin-bottom: 15px;">
                        <strong style="color: #666;">Your Answer:</strong>
                        <p id="student-answer" style="margin: 5px 0; padding: 10px; background: white; border-radius: 5px;"></p>
                    </div>
                    
                    <div style="margin-bottom: 15px;">
                        <strong style="color: #666;">Correct Answer:</strong>
                        <p id="correct-answer" style="margin: 5px 0; padding: 10px; background: #e8f5e9; border-radius: 5px; color: #2e7d32;"></p>
                    </div>
                    
                    <div style="text-align: center; margin-top: 20px;">
                        <button onclick="previousQuestion()" class="btn-nav" style="margin-right: 10px;">← Previous Question</button>
                        <button onclick="nextQuestion()" class="btn-nav">Next Question →</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        const questionData = @json($questionDetails);
        let currentQuestionIndex = 0;
        
        document.addEventListener('DOMContentLoaded', function() {
            const questionTab = document.getElementById('question-tab');
            if (questionTab && questionTab.classList.contains('active')) {
                showQuestionDetail(1);
            }
        });
        
        function switchTab(tabName) {
            const tabContents = document.querySelectorAll('.tab-content');
            tabContents.forEach(content => {
                content.classList.remove('active');
            });
            
            const tabButtons = document.querySelectorAll('.tab-button');
            tabButtons.forEach(button => {
                button.classList.remove('active');
            });
            
            const selectedTab = document.getElementById(tabName + '-tab');
            if (selectedTab) {
                selectedTab.classList.add('active');
            }
            
            event.target.classList.add('active');
            
            if (tabName === 'question') {
                showQuestionDetail(1);
            }
        }
        
        function showQuestionDetail(questionNumber) {
            currentQuestionIndex = questionNumber - 1;
            const question = questionData[currentQuestionIndex];
            
            document.getElementById('question-title').textContent = 'Question ' + question.number;
            const studentAnswer = question.student_answer || 'Not Attempted';
            document.getElementById('student-answer').textContent = studentAnswer;
            
            if (studentAnswer === 'Not Attempted' || studentAnswer === '') {
                document.getElementById('correct-answer').textContent = '---';
                document.getElementById('correct-answer').parentElement.style.display = 'none';
            } else {
                document.getElementById('correct-answer').textContent = question.correct_answer || 'N/A';
                document.getElementById('correct-answer').parentElement.style.display = 'block';
            }
            
            document.getElementById('question-detail-container').style.display = 'block';
            
            document.querySelectorAll('.question-circle').forEach(circle => {
                circle.classList.remove('active');
            });
            
            const currentCircle = document.querySelector(`.question-circle[data-question="${questionNumber}"]`);
            if (currentCircle) {
                currentCircle.classList.add('active');
                currentCircle.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }
        }
        
        function previousQuestion() {
            if (currentQuestionIndex > 0) {
                showQuestionDetail(currentQuestionIndex);
            }
        }
        
        function nextQuestion() {
            if (currentQuestionIndex < 39) {
                showQuestionDetail(currentQuestionIndex + 2);
            }
        }
        
        setTimeout(function() {
            window.location.href = "{{ route('student.dashboard') }}";
        }, 120000);
    </script>
</body>
</html>
