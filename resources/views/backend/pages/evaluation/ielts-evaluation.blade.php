@extends('index')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">IELTS Evaluation - Student Submissions</h5>
            <div class="text-muted">
                Showing {{ $submissions->firstItem() ?? 0 }} - {{ $submissions->lastItem() ?? 0 }} of {{ $submissions->total() }}
            </div>
        </div>
        
        <div class="card-body">
            <!-- Filter Section -->
            <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 20px;">
                <form method="GET" action="{{ route('evaluation.ielts') }}" style="display: flex; gap: 15px; align-items: flex-end; flex-wrap: wrap;">
                    <div style="flex: 1; min-width: 200px;">
                        <label style="display: block; margin-bottom: 8px; font-weight: 500; color: #555;">Student ID</label>
                        <input type="text" name="student_id" value="{{ request('student_id') }}" placeholder="Search by student ID..." style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px;">
                    </div>
                    <div style="flex: 1; min-width: 200px;">
                        <label style="display: block; margin-bottom: 8px; font-weight: 500; color: #555;">Category</label>
                        <select name="category" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px;">
                            <option value="">Select Category</option>
                            <option value="Listening" {{ request('category') == 'Listening' ? 'selected' : '' }}>Listening</option>
                            <option value="Academic Writing" {{ request('category') == 'Academic Writing' ? 'selected' : '' }}>Academic Writing</option>
                            <option value="Academic Reading" {{ request('category') == 'Academic Reading' ? 'selected' : '' }}>Academic Reading</option>
                            <option value="General Reading" {{ request('category') == 'General Reading' ? 'selected' : '' }}>General Reading</option>
                            <option value="General Writing" {{ request('category') == 'General Writing' ? 'selected' : '' }}>General Writing</option>
                        </select>
                    </div>
                    <div style="flex: 1; min-width: 200px;">
                        <label style="display: block; margin-bottom: 8px; font-weight: 500; color: #555;">Attempted Date</label>
                        <input type="date" name="attempted_date" value="{{ request('attempted_date') }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px;">
                    </div>
                    <div style="display: flex; gap: 10px;">
                        <button type="submit" style="padding: 10px 25px; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 14px; font-weight: 500;">Filter</button>
                        <a href="{{ route('evaluation.ielts') }}" style="padding: 10px 25px; background: #6c757d; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 14px; font-weight: 500; text-decoration: none; display: inline-block;">Reset</a>
                    </div>
                </form>
            </div>
            
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>S.No.</th>
                            <th>Student Name</th>
                            <th>Type</th>
                            <th>Attempted Date</th>
                            <th>Checked On</th>
                            <th>Test Name</th>
                            <th>Student ID</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($submissions as $index => $submission)
                        <tr>
                            <td>{{ (($submissions->currentPage() - 1) * $submissions->perPage()) + $loop->iteration }}</td>
                            <td>
                                <strong>{{ $submission->exam_name ?? 'N/A' }}</strong><br>
                            </td>
                            <td>{{ $submission->batch_type ?? '-' }}</td>
                            <td>{{ ($submission->attempted_at ?? $submission->created_at) ? ($submission->attempted_at ?? $submission->created_at)->format('M d, Y h:i A') : 'N/A' }}</td>
                            <td>
                                @if($submission->checked_at)
                                    {{ $submission->checked_at->format('M d, Y') }}
                                @else
                                    <span class="text-muted">N/A</span>
                                @endif
                            </td>
                            <td>{{ $submission->formatted_test_name ?? $submission->test_name }}</td>
                            <td>
                                <strong>{{ $submission->custom_student_id ?? 'N/A' }}</strong>
                            </td>
                            <td>
                                @if($submission->checked_at)
                                    <a href="{{ route('evaluation.view-score', ['studentId' => $submission->student_id, 'testName' => $submission->test_name, 'submissionId' => $submission->id]) }}" 
                                       class="btn btn-sm btn-info">View Score</a>
                                    <a href="{{ route('evaluation.view-report', ['studentId' => $submission->student_id, 'testName' => $submission->test_name, 'submissionId' => $submission->id]) }}" 
                                       class="btn btn-sm btn-secondary">View Report</a>
                                    @php
                                        $lowerTestName = strtolower((string) $submission->test_name);
                                        if (str_contains($lowerTestName, 'writing')) {
                                            $pdfUrl = route('export.writing.result.pdf', ['testName' => $submission->test_name, 'submissionId' => $submission->id]);
                                        } elseif (str_contains($lowerTestName, 'reading')) {
                                            $pdfUrl = route('export.reading.result.pdf', [$submission->test_name, $submission->id]);
                                        } else {
                                            $pdfUrl = route('export.result.pdf', [$submission->test_name, $submission->id]);
                                        }
                                    @endphp
                                    <a href="{{ $pdfUrl }}" class="btn btn-sm btn-success">PDF</a>
                                @else
                                    <a href="{{ route('evaluation.evaluate', ['testName' => $submission->test_name, 'submissionId' => $submission->id]) }}" 
                                       class="btn btn-sm btn-primary">Evaluate</a>
                                    @php
                                        $lowerTestName = strtolower((string) $submission->test_name);
                                        if (str_contains($lowerTestName, 'writing')) {
                                            $pdfUrl = route('export.writing.result.pdf', ['testName' => $submission->test_name, 'submissionId' => $submission->id]);
                                        } elseif (str_contains($lowerTestName, 'reading')) {
                                            $pdfUrl = route('export.reading.result.pdf', [$submission->test_name, $submission->id]);
                                        } else {
                                            $pdfUrl = route('export.result.pdf', [$submission->test_name, $submission->id]);
                                        }
                                    @endphp
                                    <a href="{{ $pdfUrl }}" class="btn btn-sm btn-success">PDF</a>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">
                                No student submissions found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <div class="mt-4">
                {{ $submissions->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
