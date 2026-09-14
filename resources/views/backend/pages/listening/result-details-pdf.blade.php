<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Listening Result PDF</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        .header { text-align: center; margin-bottom: 20px; }
        .header h1 { color: #e74c3c; font-size: 24px; margin: 0; }
        .stats-row { width: 100%; margin-bottom: 15px; }
        .stats-left { float: left; width: 50%; }
        .stats-right { float: right; width: 50%; text-align: right; }
        .clearfix { clear: both; }
        .band-score { color: #f39c12; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: center; }
        th { background-color: #f0f0f0; }
    </style>
</head>
<body>
    <div class="header">
        <h1>HEXA'S ZINDABAZAR</h1>
    </div>
    
    <div class="stats-row">
        <div class="stats-left">
            <p style="font-size: 18px; font-weight: bold; margin: 0 0 5px 0;">Student ID: {{ $customStudentId }}</p>
            <p style="margin: 0;"><strong>Total Correct:</strong> {{ $correctCount }}</p>
        </div>
        <div class="stats-right">
            <p style="margin: 0 0 5px 0;"><strong>Total Wrong:</strong> {{ $wrongCount }}</p>
            <p class="band-score" style="margin: 0;"><strong>Band Score:</strong> {{ $bandScore }}</p>
        </div>
        <div class="clearfix"></div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Q#</th>
                <th>Your Answer</th>
                <th>Correct Answer</th>
                <th>Result</th>
            </tr>
        </thead>
        <tbody>
            @foreach($resultDetails as $detail)
                <tr>
                    <td>{{ $detail['question_number'] }}</td>
                    <td>{{ $detail['student_answer'] }}</td>
                    <td>{{ $detail['correct_answer'] }}</td>
                    <td>
                        @if($detail['is_correct'])
                            ✔
                        @else
                            ✘
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
