@extends('index')

@section('content')
<div class="container mt-5">
    <h2>Submitted Writing Tests</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Test Name</th>
                <th>Exam Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($submittedTests as $test)
                <tr>
                    <td>{{ $test->custom_student_id ?? $test->student_id }}</td>
                    <td>{{ $test->formatted_test_name ?? $test->test_name }}</td>
                    <td>{{ $test->created_at ? $test->created_at->format('M d, Y h:i A') : 'N/A' }} </td>
                    <td>
                        <a href="{{ route('writing.result.details', [$test->student_id, $test->test_name, $test->id]) }}" class="btn btn-primary btn-sm">
                            View Result
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="container mt-4">
                {{ $submittedTests->links('pagination::bootstrap-5') }}
            </div>
</div>
@endsection
