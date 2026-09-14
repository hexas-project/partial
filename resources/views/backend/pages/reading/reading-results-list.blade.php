@extends('index')

@section('content')
<div class="container mt-5">
    <h2>Submitted Reading Tests</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Test Name</th>
                <th>Exam Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($submittedTests as $test)
                <tr>
                    <td>{{ $test->student->name ?? 'Student ID: ' . $test->student_id }}</td>
                    <td>{{ $test->test_name }}</td>
                    <td>{{ $test->created_at ? $test->created_at->format('d M Y') : 'N/A' }} </td>
                    <td>
                        <a href="{{ route('reading.result.details', [$test->student_id, $test->test_name]) }}" class="btn btn-primary btn-sm">
                            View Result
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
