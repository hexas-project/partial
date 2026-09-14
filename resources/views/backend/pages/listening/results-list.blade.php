@extends('index')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Submitted Listening Tests</h5>
            <div class="text-muted">
                Showing {{ $submittedTests->firstItem() ?? 0 }} - {{ $submittedTests->lastItem() ?? 0 }} of {{ $submittedTests->total() }}
            </div>
        </div>

        <div class="card-body">
            <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 20px;">
                <form method="GET" action="{{ route('listening.results.list') }}" style="display: flex; gap: 15px; align-items: flex-end; flex-wrap: wrap;">
                    <div style="flex: 1; min-width: 200px;">
                        <label style="display: block; margin-bottom: 8px; font-weight: 500; color: #555;">Student ID</label>
                        <input type="text" name="student_id" value="{{ request('student_id') }}" placeholder="Search by student ID..." style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px;">
                    </div>

                    <div style="flex: 1; min-width: 200px;">
                        <label style="display: block; margin-bottom: 8px; font-weight: 500; color: #555;">Type</label>
                        <select name="type" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px;">
                            <option value="">All Types</option>
                            <option value="Academic" {{ request('type') == 'Academic' ? 'selected' : '' }}>Academic</option>
                            <option value="GT" {{ request('type') == 'GT' ? 'selected' : '' }}>GT</option>
                        </select>
                    </div>

                    <div style="flex: 1; min-width: 200px;">
                        <label style="display: block; margin-bottom: 8px; font-weight: 500; color: #555;">Attempted Date</label>
                        <input type="date" name="attempted_date" value="{{ request('attempted_date') }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px;">
                    </div>

                    <div style="display: flex; gap: 10px;">
                        <button type="submit" class="btn btn-primary" style="padding: 10px 20px; font-size: 14px;">Filter</button>
                        <a href="{{ route('listening.results.list') }}" class="btn btn-secondary" style="padding: 10px 20px; font-size: 14px;">Reset</a>
                    </div>
                </form>
            </div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead style="background: #f8f9fa;">
                        <tr>
                            <th style="font-size: 12px; font-weight: 600; color: #666; text-transform: uppercase;">S.NO.</th>
                            <th style="font-size: 12px; font-weight: 600; color: #666; text-transform: uppercase;">Student Name</th>
                            <th style="font-size: 12px; font-weight: 600; color: #666; text-transform: uppercase;">Type</th>
                            <th style="font-size: 12px; font-weight: 600; color: #666; text-transform: uppercase;">Attempted Date</th>
                            <th style="font-size: 12px; font-weight: 600; color: #666; text-transform: uppercase;">Test Name</th>
                            <th style="font-size: 12px; font-weight: 600; color: #666; text-transform: uppercase;">Student ID</th>
                            <th style="font-size: 12px; font-weight: 600; color: #666; text-transform: uppercase;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($submittedTests as $index => $submission)
                        <tr>
                            <td style="font-size: 14px;">
                                {{ ($submittedTests->currentPage() - 1) * $submittedTests->perPage() + $index + 1 }}
                            </td>
                            <td style="font-size: 14px;">
                                <div style="font-weight: 500; color: #333;">{{ $submission->exam_name ?? $submission->student->name ?? 'N/A' }}</div>
                            </td>
                            <td style="font-size: 14px; color: #666;">{{ $submission->batch_type ?? '-' }}</td>
                            <td style="font-size: 14px; color: #666;">
                                {{ $submission->created_at ? $submission->created_at->format('M d, Y') : 'N/A' }}
                            </td>
                            <td style="font-size: 14px; color: #666;">{{ $submission->formatted_test_name ?? $submission->test_name }}</td>
                            <td style="font-size: 14px; color: #666;">{{ $submission->custom_student_id ?? '-' }}</td>
                            <td>
                                <a href="{{ route('listening.result.details', ['studentId' => $submission->student_id, 'testName' => $submission->test_name, 'submissionId' => $submission->id]) }}" class="btn btn-sm btn-primary">View Result</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">No listening submissions found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $submittedTests->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
