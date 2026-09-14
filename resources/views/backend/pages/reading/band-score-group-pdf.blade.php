<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reading Band Score PDF</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 11px; }
        .header { text-align: center; margin-bottom: 10px; }
        .header h1 { color: #e74c3c; font-size: 20px; margin: 0; }
        .meta { margin-top: 5px; font-size: 11px; color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 4px 6px; text-align: center; font-size: 11px; }
        th { background-color: #f0f0f0; }
    </style>
</head>
<body>
    <div class="header">
        <h1>HEXA'S ZINDABAZAR</h1>
        <div class="meta"><strong>Date:</strong> {{ $selectedDate }}</div>
        <div class="meta"><strong>Start Time:</strong> {{ $displayStartTime }}</div>
    </div>

    <table>
        <thead>
            <tr>
                <th>S.NO.</th>
                <th>Student ID</th>
                <th>Band Score</th>
            </tr>
        </thead>
        <tbody>
            @forelse($rows as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->custom_student_id ?? '-' }}</td>
                    <td>{{ $row->band_score ?? 'N/A' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No results found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
