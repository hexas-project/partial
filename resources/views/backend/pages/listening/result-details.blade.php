@extends('index')

@section('content')
<style>
    .result-wrapper {
        background: #f5f7fa;
        padding: 30px 0;
        min-height: 100vh;
    }
    
    .result-header-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 15px;
        padding: 50px 30px;
        margin-bottom: 25px;
        box-shadow: 0 4px 20px rgba(102, 126, 234, 0.3);
        text-align: center;
        color: white;
    }
    
    .result-title {
        font-size: 42px;
        font-weight: 700;
        color: white;
        margin-bottom: 20px;
        text-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }
    
    .student-info-row {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 15px;
    }
    
    .info-item {
        display: flex;
        align-items: center;
        gap: 8px;
        background: rgba(255, 255, 255, 0.2);
        padding: 12px 25px;
        border-radius: 50px;
        backdrop-filter: blur(10px);
    }
    
    .info-label {
        font-weight: 600;
        color: rgba(255, 255, 255, 0.9);
        font-size: 14px;
    }
    
    .info-value {
        color: white;
        font-size: 16px;
        font-weight: 600;
    }
    
    .stats-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 20px;
        margin-bottom: 25px;
    }
    
    .stat-box {
        background: white;
        border-radius: 10px;
        padding: 25px;
        text-align: center;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        border-top: 3px solid #ddd;
    }
    
    .stat-box.total {
        border-top-color: #3498db;
    }
    
    .stat-box.correct {
        border-top-color: #27ae60;
    }
    
    .stat-box.wrong {
        border-top-color: #e74c3c;
    }
    
    .stat-box.band {
        border-top-color: #f39c12;
    }
    
    .stat-number {
        font-size: 36px;
        font-weight: 700;
        margin-bottom: 5px;
    }
    
    .stat-box.total .stat-number {
        color: #3498db;
    }
    
    .stat-box.correct .stat-number {
        color: #27ae60;
    }
    
    .stat-box.wrong .stat-number {
        color: #e74c3c;
    }
    
    .stat-box.band .stat-number {
        color: #f39c12;
    }
    
    .stat-label {
        font-size: 13px;
        color: #7f8c8d;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .action-bar {
        background: white;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 25px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .btn-pdf {
        background: #27ae60;
        color: white;
        padding: 12px 30px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s;
        border: none;
    }
    
    .btn-pdf:hover {
        background: #229954;
        color: white;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(39, 174, 96, 0.3);
    }
    
    .results-card {
        background: white;
        border-radius: 10px;
        padding: 0;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        overflow: hidden;
    }
    
    .table-header {
        background: #34495e;
        color: white;
        padding: 20px 25px;
        font-weight: 600;
        font-size: 16px;
    }
    
    .results-table {
        width: 100%;
        margin: 0;
    }
    
    .results-table thead {
        background: #ecf0f1;
    }
    
    .results-table thead th {
        padding: 15px 20px;
        font-weight: 600;
        color: #2c3e50;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border: none;
    }
    
    .results-table tbody td {
        padding: 15px 20px;
        color: #34495e;
        border-bottom: 1px solid #ecf0f1;
        vertical-align: middle;
    }
    
    .results-table tbody tr:last-child td {
        border-bottom: none;
    }
    
    .results-table tbody tr:hover {
        background: #f8f9fa;
    }
    
    .q-number {
        font-weight: 600;
        color: #3498db;
        font-size: 15px;
    }
    
    .answer-text {
        font-family: 'Courier New', monospace;
        background: #f8f9fa;
        padding: 5px 10px;
        border-radius: 4px;
        display: inline-block;
    }
    
    .result-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        border-radius: 6px;
        font-weight: 600;
        font-size: 16px;
    }
    
    .result-badge.correct {
        background: #d4edda;
        color: #27ae60;
    }
    
    .result-badge.wrong {
        background: #f8d7da;
        color: #e74c3c;
    }
</style>

<div class="result-wrapper">
    <div class="container">
        <!-- Header Card -->
        <div class="result-header-card">
            <div class="result-title">
                {{ !empty($examName) ? $examName : ($student ? ($student->name ?? 'Student ID: ' . $student->id) : 'Student') }}
            </div>
            <div class="student-info-row">
                <div class="info-item">
                    <span class="info-label">Student ID:</span>
                    <span class="info-value">{{ !empty($customStudentId) ? $customStudentId : 'N/A' }}</span>
                </div>
            </div>
        </div>
        
        <!-- Stats Row -->
        <div class="stats-row">
            <div class="stat-box total">
                <div class="stat-number">{{ $correctCount + $wrongCount }}</div>
                <div class="stat-label">Total Questions</div>
            </div>
            <div class="stat-box correct">
                <div class="stat-number">{{ $correctCount }}</div>
                <div class="stat-label">Correct Answers</div>
            </div>
            <div class="stat-box wrong">
                <div class="stat-number">{{ $wrongCount }}</div>
                <div class="stat-label">Wrong Answers</div>
            </div>
            <div class="stat-box band">
                <div class="stat-number">{{ $bandScore }}</div>
                <div class="stat-label">Band Score</div>
            </div>
        </div>
        
        <!-- Action Bar -->
        @if($student)
        <div class="action-bar">
            <div>
                <strong>Export Options</strong>
                <p style="margin: 5px 0 0 0; color: #7f8c8d; font-size: 13px;">Download the result as PDF</p>
            </div>
            <a href="{{ route('export.result.pdf', [$testName, $attemptId]) }}" class="btn-pdf">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                    <polyline points="7 10 12 15 17 10"></polyline>
                    <line x1="12" y1="15" x2="12" y2="3"></line>
                </svg>
                Download PDF
            </a>
        </div>
        @endif
        
        <!-- Results Table Card -->
        <div class="results-card">
            <div class="table-header">
                Detailed Results
            </div>
            <table class="results-table">
                <thead>
                    <tr>
                        <th style="width: 80px;">Question</th>
                        <th>Your Answer</th>
                        <th>Correct Answer</th>
                        <th style="width: 100px; text-align: center;">Result</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($resultDetails as $detail)
                    <tr>
                        <td><span class="q-number">Q{{ $detail['question_number'] }}</span></td>
                        <td><span class="answer-text">{{ $detail['student_answer'] ?: '-' }}</span></td>
                        <td><span class="answer-text">{{ $detail['correct_answer'] }}</span></td>
                        <td style="text-align: center;">
                            @if($detail['is_correct'])
                                <span class="result-badge correct">✓</span>
                            @else
                                <span class="result-badge wrong">✗</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
