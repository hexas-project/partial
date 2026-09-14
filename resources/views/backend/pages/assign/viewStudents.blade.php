@extends('index')

@section('content')
<style>
    .students-container {
        max-width: 100%;
        margin: 0;
        padding: 0;
        min-height: 100vh;
        background: white;
    }
    
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }
    
    .page-header h2 {
        margin: 0;
        color: #333;
        font-size: 24px;
    }
    
    .students-table {
        width: 100%;
        background: white;
        border-radius: 8px;
        border: 2px solid #3498db;
        overflow: hidden;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    .table-header {
        background: #3498db;
        color: white;
        padding: 15px 20px;
        margin: 0;
        font-size: 16px;
        font-weight: 500;
    }
    
    .table-body {
        padding: 20px;
        background: #f8f9fa;
        overflow-x: auto;
    }
    
    .students-table table {
        width: 100%;
        border-collapse: collapse;
    }
    
    .students-table th {
        background-color: #3498db;
        color: white;
        padding: 12px 15px;
        text-align: left;
        font-weight: 500;
        font-size: 14px;
    }
    
    .students-table td {
        padding: 12px 15px;
        border-bottom: 1px solid #dee2e6;
        font-size: 14px;
    }
    
    .students-table tr:hover {
        background-color: #f8f9fa;
    }
    
    .btn-delete {
        background-color: #dc3545;
        color: white;
        padding: 6px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 13px;
    }
    
    .btn-delete:hover {
        background-color: #c82333;
    }
</style>

<div class="students-container">
    <div class="page-header">
        <h2>Student List</h2>
    </div>

    <form method="GET" action="{{ route('view.students.page') }}" class="mb-3">
        <div class="row g-2 align-items-end">
            <div class="col-md-4">
                <label class="form-label mb-1">Exam Name</label>
                <input type="text" name="exam_name" value="{{ request('exam_name') }}" class="form-control" placeholder="Search exam name">
            </div>
            <div class="col-md-3">
                <label class="form-label mb-1">Type</label>
                <select name="type" class="form-select">
                    <option value="">All</option>
                    @foreach(($types ?? collect()) as $type)
                        <option value="{{ $type }}" @selected(request('type') == $type)>{{ $type }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="{{ route('view.students.page') }}" class="btn btn-outline-secondary">Reset</a>
            </div>
        </div>
    </form>
    
    <div class="students-table">
        <div class="table-body">
        <table>
            <thead>
                <tr>
                    <th>S No.</th>
                    <th>Exam Name</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($batchList as $index => $batch)
                    <tr>
                        <td>{{ ($batchList->currentPage() - 1) * $batchList->perPage() + $index + 1 }}</td>
                        <td>{{ $batch->exam_name }}</td>
                        <td>{{ $batch->email }}</td>
                        <td>{{ $batch->type }}</td>
                        <td>
                            <button class="btn btn-primary btn-sm" onclick="viewBatch({{ $batch->id }})" style="margin-right: 5px;">View</button>
                            <button class="btn-delete" onclick="deleteBatch({{ $batch->id }})">Delete</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No students created yet</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        </div>
    </div>
    
    <div class="mt-4">
        {{ $batchList->withQueryString()->links() }}
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function viewBatch(id) {
    window.location.href = `/batch/view/${id}`;
}

function deleteBatch(id) {
    if (!confirm('Are you sure you want to delete this student?')) {
        return;
    }
    
    $.ajax({
        url: `/batch/delete/${id}`,
        method: 'DELETE',
        data: {
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            if (response.success) {
                alert(response.message);
                location.reload();
            }
        },
        error: function() {
            alert('Error deleting student');
        }
    });
}
</script>
@endsection
