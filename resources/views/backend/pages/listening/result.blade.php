@extends('index')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Listening Result</h5>
        </div>

        <div class="card-body">
            <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 20px;">
                <form method="GET" action="{{ route('listening.results.band') }}" style="display: flex; gap: 15px; align-items: flex-end; flex-wrap: wrap;">
                    <div style="flex: 1; min-width: 200px;">
                        <label style="display: block; margin-bottom: 8px; font-weight: 500; color: #555;">Date</label>
                        <input type="date" name="date" value="{{ $selectedDate ?? request('date') }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px;">
                    </div>

                    <div style="flex: 1; min-width: 200px;">
                        <label style="display: block; margin-bottom: 8px; font-weight: 500; color: #555;">Student ID</label>
                        <input type="text" name="student_id" value="{{ request('student_id') }}" placeholder="Search by student ID..." style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px;">
                    </div>

                    <div style="display: flex; gap: 10px;">
                        <button type="submit" class="btn btn-primary" style="padding: 10px 20px; font-size: 14px;">Filter</button>
                        <a href="{{ route('listening.results.band') }}" class="btn btn-secondary" style="padding: 10px 20px; font-size: 14px;">Reset</a>
                    </div>
                </form>
            </div>

            @forelse($groupedResults as $startDateTime => $rows)
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div style="font-weight: 600;">
                            {{ $startDateTime === 'N/A' ? 'Start Time: N/A' : 'Start Time: ' . \Carbon\Carbon::parse($startDateTime)->format('M d, Y h:i A') }}
                        </div>
                        <div class="d-flex align-items-center" style="gap: 10px;">
                            <div class="text-muted">
                                Total: {{ $rows->count() }}
                            </div>
                            <a href="{{ route('export.listening.band.pdf', ['start' => $startDateTime, 'date' => $selectedDate ?? request('date'), 'student_id' => request('student_id')]) }}" class="btn btn-sm btn-success">PDF</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead style="background: #f8f9fa;">
                                    <tr>
                                        <th style="font-size: 12px; font-weight: 600; color: #666; text-transform: uppercase;">S.NO.</th>
                                        <th style="font-size: 12px; font-weight: 600; color: #666; text-transform: uppercase;">Student ID</th>
                                        <th style="font-size: 12px; font-weight: 600; color: #666; text-transform: uppercase;">Band Score</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rows as $row)
                                        <tr>
                                            <td style="font-size: 14px;">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td style="font-size: 14px; color: #333; font-weight: 600;">
                                                {{ $row->custom_student_id ?? '-' }}
                                            </td>
                                            <td style="font-size: 14px; color: #666;">
                                                {{ $row->band_score ?? 'N/A' }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center text-muted py-4">No listening results found.</div>
            @endforelse
        </div>
    </div>
</div>
@endsection
