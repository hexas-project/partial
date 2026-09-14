@extends('index')

@section('content')
<style>
    .enrollment-container {
        max-width: 100%;
        margin: 0;
        padding: 0;
        min-height: 100vh;
        background: white;
    }
    
    .enrollment-card {
        background: white;
        border-radius: 8px;
        border: 2px solid #3498db;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        margin-bottom: 30px;
        overflow: hidden;
    }
    
    .card-header {
        background: #3498db;
        color: white;
        padding: 15px 30px;
        margin: 0;
        font-size: 16px;
        font-weight: 500;
    }
    
    .card-body {
        padding: 30px;
        background: #f8f9fa;
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
    
    .form-group {
        margin-bottom: 20px;
    }
    
    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: #333;
        font-size: 14px;
    }
    
    .form-control, .form-select {
        width: 100%;
        padding: 10px 15px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 14px;
    }
    
    .form-control:focus, .form-select:focus {
        outline: none;
        border-color: #007bff;
    }
    
    .btn-save {
        background-color: #28a745;
        color: white;
        padding: 12px 30px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 500;
    }
    
    .btn-save:hover {
        background-color: #218838;
    }
    
    .students-table {
        width: 100%;
        background: white;
        border-radius: 8px;
        overflow-x: auto;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    .students-table table {
        width: 100%;
        border-collapse: collapse;
    }
    
    .students-table th {
        background-color: #343a40;
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
    
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.5);
    }
    
    .modal-content {
        background-color: white;
        margin: 10% auto;
        padding: 30px;
        border-radius: 8px;
        width: 90%;
        max-width: 500px;
        text-align: center;
    }
    
    .modal-header {
        margin-bottom: 20px;
    }
    
    .modal-header h3 {
        color: #28a745;
        margin-bottom: 10px;
    }
    
    .credentials {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 4px;
        margin: 20px 0;
    }
    
    .credentials p {
        margin: 10px 0;
        font-size: 16px;
    }
    
    .credentials strong {
        color: #007bff;
    }
    
    .btn-close-modal {
        background-color: #007bff;
        color: white;
        padding: 10px 30px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        margin-top: 15px;
    }
    
    .btn-close-modal:hover {
        background-color: #0056b3;
    }
</style>

<div class="enrollment-container">
    <div class="page-header">
        <h2>Student Enrollment</h2>
    </div>
    
    <div class="enrollment-card">
        <div class="card-header">
            Personal Details
        </div>
        <div class="card-body">
        <form id="enrollmentForm">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Exam Name <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="exam_name" id="exam_name" required>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Mobile Number</label>
                        <input type="text" class="form-control" name="mobile" id="mobile">
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Type <span style="color: red;">*</span></label>
                        <select class="form-select" name="type" id="type" required>
                            <option value="">Select Type</option>
                            <option value="GT">GT (General Training)</option>
                            <option value="Academic">Academic</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-3">
                <button type="submit" class="btn-save">Save & Generate Credentials</button>
            </div>
        </form>
        </div>
    </div>
</div>

<div id="credentialsModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>✓ Batch Created Successfully!</h3>
        </div>
        
        <div class="credentials">
            <p><strong>Username:</strong> <span id="generatedUsername"></span></p>
            <p><strong>Password:</strong> <span id="generatedPassword"></span></p>
        </div>
        
        <p style="color: #666; font-size: 14px;">Please save these credentials. Students will use these to login and take exams.</p>
        
        <button class="btn-close-modal" onclick="closeModal()">Close</button>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#enrollmentForm').on('submit', function(e) {
        e.preventDefault();
        
        const formData = {
            _token: '{{ csrf_token() }}',
            exam_name: $('#exam_name').val(),
            mobile: $('#mobile').val(),
            email: $('#email').val(),
            type: $('#type').val()
        };
        
        $.ajax({
            url: '{{ route("batch.enrollment.store") }}',
            method: 'POST',
            data: formData,
            success: function(response) {
                if (response.success) {
                    $('#generatedUsername').text(response.username);
                    $('#generatedPassword').text(response.password);
                    $('#credentialsModal').show();
                    
                    $('#enrollmentForm')[0].reset();
                    
                    setTimeout(function() {
                        location.reload();
                    }, 3000);
                }
            },
            error: function(xhr) {
                let errorMsg = 'Error creating batch';
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    const errors = xhr.responseJSON.errors;
                    errorMsg = Object.values(errors).flat().join('\n');
                }
                alert(errorMsg);
            }
        });
    });
});

function closeModal() {
    $('#credentialsModal').hide();
    location.reload();
}

function deleteStudent(id) {
    if (!confirm('Are you sure you want to delete this student?')) {
        return;
    }
    
    $.ajax({
        url: `/batch-student/delete/${id}`,
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

function viewBatch(id) {
    window.location.href = `/batch/view/${id}`;
}

function deleteBatch(id) {
    if (!confirm('Are you sure you want to delete this batch?')) {
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
            alert('Error deleting batch');
        }
    });
}
</script>
@endsection
