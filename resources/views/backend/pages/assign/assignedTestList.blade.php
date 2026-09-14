@extends('index')

@section('content')
<style>
    .assigned-test-container {
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
        padding: 20px 30px;
        border-bottom: 1px solid #e0e0e0;
    }
    
    .page-header h2 {
        margin: 0;
        color: #333;
        font-size: 24px;
    }
    
    .back-btn {
        padding: 10px 20px;
        background: #6c757d;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
        text-decoration: none;
        display: inline-block;
    }
    
    .back-btn:hover {
        background: #5a6268;
        color: white;
    }
    
    .content-section {
        padding: 30px;
    }
    
    .assigned-table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        border-radius: 8px;
        overflow: hidden;
    }
    
    .assigned-table thead {
        background: #34495e;
        color: white;
    }
    
    .assigned-table th {
        padding: 15px;
        text-align: left;
        font-weight: 500;
    }
    
    .assigned-table td {
        padding: 15px;
        border-bottom: 1px solid #e0e0e0;
    }
    
    .assigned-table tbody tr:hover {
        background: #f8f9fa;
    }
    
    .no-results {
        text-align: center;
        padding: 50px;
        color: #999;
        font-style: italic;
    }
    
    .badge {
        padding: 5px 12px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
    }
    
    .badge-warning {
        background: #fff3cd;
        color: #856404;
    }
    
    .badge-success {
        background: #d4edda;
        color: #155724;
    }
    
    .badge-danger {
        background: #f8d7da;
        color: #721c24;
    }
    
    .pagination-wrapper {
        margin-top: 30px;
        display: flex;
        justify-content: center;
    }
    
    .edit-btn {
        padding: 6px 15px;
        background: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 13px;
    }
    
    .edit-btn:hover {
        background: #0056b3;
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
        width: 500px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        position: relative;
        overflow: visible;
    }
    
    .flatpickr-calendar {
        z-index: 10001 !important;
    }
    
    .flatpickr-time {
        display: none !important;
    }
    
    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }
    
    .modal-header h3 {
        margin: 0;
        color: #333;
    }
    
    .close-btn {
        font-size: 28px;
        font-weight: bold;
        color: #aaa;
        cursor: pointer;
        background: none;
        border: none;
    }
    
    .close-btn:hover {
        color: #000;
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: #555;
    }
    
    .form-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 14px;
    }
    
    .modal-footer {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 25px;
    }
    
    .btn-cancel {
        padding: 10px 20px;
        background: #6c757d;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    
    .btn-cancel:hover {
        background: #5a6268;
    }
    
    .btn-save {
        padding: 10px 20px;
        background: #28a745;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    
    .btn-save:hover {
        background: #218838;
    }
</style>

<div class="assigned-test-container">
    <div class="page-header">
        <h2>Assigned Test List</h2>
        <a href="{{ route('assign.test.page') }}" class="back-btn">Back to Assign Test</a>
    </div>
    
    <div class="content-section">
        @if(session('success'))
            <div class="alert alert-success" style="padding: 15px; background: #d4edda; color: #155724; border-radius: 5px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <!-- Filter Section -->
        <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 20px;">
            <form method="GET" action="{{ route('assigned.test.list') }}" style="display: flex; gap: 15px; align-items: flex-end; flex-wrap: wrap;">
                <div style="flex: 1; min-width: 200px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: 500; color: #555;">Exam Name</label>
                    <input type="text" name="exam_name" value="{{ request('exam_name') }}" placeholder="Search by exam name..." style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px;">
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
                    <label style="display: block; margin-bottom: 8px; font-weight: 500; color: #555;">Start Date</label>
                    <input type="date" name="start_date" value="{{ request('start_date') }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px;">
                </div>
                <div style="display: flex; gap: 10px;">
                    <button type="submit" style="padding: 10px 25px; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 14px; font-weight: 500;">Filter</button>
                    <a href="{{ route('assigned.test.list') }}" style="padding: 10px 25px; background: #6c757d; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 14px; font-weight: 500; text-decoration: none; display: inline-block;">Reset</a>
                </div>
            </form>
        </div>

        <table class="assigned-table">
            <thead>
                <tr>
                    <th>Sr. No.</th>
                    <th>Type</th>
                    <th>Exam Name</th>
                    <th>Test Name</th>
                    <th>Start Date</th>
                    <th>Closing Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($assignments as $index => $assignment)
                    <tr>
                        <td>{{ $assignments->firstItem() + $index }}</td>
                        <td>{{ $assignment->batch ? $assignment->batch->type : 'N/A' }}</td>
                        <td>{{ $assignment->exam_name }}</td>
                        <td>{{ $assignment->test_name }}</td>
                        <td>{{ \Carbon\Carbon::parse($assignment->start_date)->format('M d, Y h:i A') }}</td>
                        <td>{{ \Carbon\Carbon::parse($assignment->closing_date)->format('M d, Y h:i A') }}</td>
                        <td>
                            @php
                                $now = \Carbon\Carbon::now('Asia/Dhaka');
                                $startDate = \Carbon\Carbon::parse($assignment->start_date, 'Asia/Dhaka');
                                $closingDate = \Carbon\Carbon::parse($assignment->closing_date, 'Asia/Dhaka');
                                
                                if ($now->lessThan($startDate)) {
                                    $statusClass = 'badge-warning';
                                    $statusText = 'Pending';
                                } elseif ($now->greaterThanOrEqualTo($startDate) && $now->lessThanOrEqualTo($closingDate)) {
                                    $statusClass = 'badge-success';
                                    $statusText = 'Active';
                                } else {
                                    $statusClass = 'badge-danger';
                                    $statusText = 'Expired';
                                }
                            @endphp
                            <span class="badge {{ $statusClass }}">{{ $statusText }}</span>
                        </td>
                        <td>
                            <button class="edit-btn" onclick="openEditModal({{ $assignment->id }}, '{{ $assignment->start_date }}', '{{ $assignment->closing_date }}')">Edit</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="no-results">No assigned tests yet</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        @if($assignments->hasPages())
            <div class="pagination-wrapper" style="margin-top: 30px; display: flex; justify-content: center;">
                {{ $assignments->links() }}
            </div>
        @endif
    </div>
</div>

<!-- Edit Modal -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Edit Test Dates</h3>
            <button class="close-btn" onclick="closeEditModal()">&times;</button>
        </div>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" id="assignmentId" name="assignment_id">
            
            <div class="form-group">
                <label>Start Date</label>
                <input type="text" id="editStartDate" name="start_date" required readonly>
            </div>
            
            <div class="form-group">
                <label>Closing Date</label>
                <input type="text" id="editClosingDate" name="closing_date" required readonly>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn-cancel" onclick="closeEditModal()">Cancel</button>
                <button type="submit" class="btn-save">Save Changes</button>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<script>
let startDatePicker, closingDatePicker;

function openEditModal(assignmentId, startDate, closingDate) {
    document.getElementById('editModal').style.display = 'block';
    document.getElementById('assignmentId').value = assignmentId;
    
    // Format dates for display
    const formattedStartDate = startDate.replace(' ', 'T').substring(0, 16);
    const formattedClosingDate = closingDate.replace(' ', 'T').substring(0, 16);
    
    // Initialize flatpickr for start date
    if (startDatePicker) startDatePicker.destroy();
    startDatePicker = flatpickr('#editStartDate', {
        enableTime: true,
        dateFormat: "Y-m-d h:i K",
        defaultDate: startDate,
        time_24hr: false,
        minuteIncrement: 15,
        static: false,
        position: "below",
        onReady: function(selectedDates, dateStr, instance) {
            addTimeList(instance, '#editStartDate');
            // Position calendar near input
            positionCalendar(instance, '#editStartDate');
        },
        onOpen: function(selectedDates, dateStr, instance) {
            addTimeList(instance, '#editStartDate');
            // Position calendar near input
            positionCalendar(instance, '#editStartDate');
        }
    });
    
    // Initialize flatpickr for closing date
    if (closingDatePicker) closingDatePicker.destroy();
    closingDatePicker = flatpickr('#editClosingDate', {
        enableTime: true,
        dateFormat: "Y-m-d h:i K",
        defaultDate: closingDate,
        time_24hr: false,
        minuteIncrement: 15,
        static: false,
        position: "below",
        onReady: function(selectedDates, dateStr, instance) {
            addTimeList(instance, '#editClosingDate');
            // Position calendar near input
            positionCalendar(instance, '#editClosingDate');
        },
        onOpen: function(selectedDates, dateStr, instance) {
            addTimeList(instance, '#editClosingDate');
            // Position calendar near input
            positionCalendar(instance, '#editClosingDate');
        }
    });
}

function addTimeList(instance, inputSelector) {
    if (instance.calendarContainer.querySelector('.time-list-container')) return;
    
    const timeList = document.createElement('div');
    timeList.className = 'time-list-container';
    timeList.style.cssText = 'position: absolute; right: -71px; top: 0; width: 70px; max-height: 310px; overflow-y: auto; border: 1px solid #e6e6e6; border-radius: 5px; background: white; box-shadow: 0 2px 8px rgba(0,0,0,0.1); z-index: 100000;';
    
    const times = generateTimeList();
    times.forEach(time => {
        const item = document.createElement('div');
        item.className = 'time-list-item';
        item.style.cssText = 'padding: 12px 12px; cursor: pointer; text-align: center; font-size: 14px; border-bottom: 1px solid #f0f0f0; line-height: 1.5;';
        item.textContent = time;
        item.onclick = function() {
            timeList.querySelectorAll('.time-list-item').forEach(i => {
                i.style.backgroundColor = '';
                i.style.color = '';
            });
            item.style.backgroundColor = '#007bff';
            item.style.color = 'white';
            
            const selectedDate = instance.selectedDates[0] || new Date();
            const [timeStr, ampm] = time.split(' ');
            const [hours, minutes] = timeStr.split(':');
            let hour = parseInt(hours);
            if (ampm === 'PM' && hour !== 12) hour += 12;
            if (ampm === 'AM' && hour === 12) hour = 0;
            
            selectedDate.setHours(hour, parseInt(minutes));
            instance.setDate(selectedDate);
        };
        timeList.appendChild(item);
    });
    
    instance.calendarContainer.style.position = 'relative';
    instance.calendarContainer.appendChild(timeList);
}

function generateTimeList() {
    const times = [];
    for (let h = 0; h < 24; h++) {
        for (let m = 0; m < 60; m += 15) {
            const hour12 = h === 0 ? 12 : (h > 12 ? h - 12 : h);
            const ampm = h < 12 ? 'AM' : 'PM';
            const timeStr = `${String(hour12).padStart(2, '0')}:${String(m).padStart(2, '0')} ${ampm}`;
            times.push(timeStr);
        }
    }
    return times;
}

function positionCalendar(instance, inputSelector) {
    const input = document.querySelector(inputSelector);
    const calendar = instance.calendarContainer;
    
    if (input && calendar) {
        const inputRect = input.getBoundingClientRect();
        const modalContent = document.querySelector('.modal-content');
        const modalRect = modalContent.getBoundingClientRect();
        
        // Position calendar below the input, relative to modal
        calendar.style.position = 'absolute';
        calendar.style.top = (inputRect.bottom - modalRect.top + 5) + 'px';
        calendar.style.left = (inputRect.left - modalRect.left) + 'px';
        calendar.style.zIndex = '10001';
    }
}

function closeEditModal() {
    document.getElementById('editModal').style.display = 'none';
    if (startDatePicker) startDatePicker.destroy();
    if (closingDatePicker) closingDatePicker.destroy();
}

// Close modal when clicking outside
window.onclick = function(event) {
    const modal = document.getElementById('editModal');
    if (event.target == modal) {
        closeEditModal();
    }
}

// Convert 12-hour format to 24-hour format for database
function convertTo24Hour(dateTimeStr) {
    // Format: "2026-01-29 07:15 PM"
    const parts = dateTimeStr.split(' ');
    if (parts.length !== 3) return dateTimeStr; // Already in 24-hour format
    
    const datePart = parts[0];
    const timePart = parts[1];
    const ampm = parts[2];
    
    const [hours, minutes] = timePart.split(':');
    let hour = parseInt(hours);
    
    if (ampm === 'PM' && hour !== 12) {
        hour += 12;
    } else if (ampm === 'AM' && hour === 12) {
        hour = 0;
    }
    
    return `${datePart} ${String(hour).padStart(2, '0')}:${minutes}:00`;
}

// Handle form submission
document.getElementById('editForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const assignmentId = document.getElementById('assignmentId').value;
    const startDate = document.getElementById('editStartDate').value;
    const closingDate = document.getElementById('editClosingDate').value;
    
    console.log('Original dates:', { startDate, closingDate });
    
    // Convert to 24-hour format for database
    const startDate24 = convertTo24Hour(startDate);
    const closingDate24 = convertTo24Hour(closingDate);
    
    console.log('Converted dates:', { startDate24, closingDate24 });
    
    fetch(`/update-assignment-dates/${assignmentId}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content || '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            start_date: startDate24,
            closing_date: closingDate24
        })
    })
    .then(response => {
        console.log('Response status:', response.status);
        return response.json();
    })
    .then(data => {
        console.log('Response data:', data);
        if (data.success) {
            location.reload();
        } else {
            alert('Error updating dates: ' + (data.message || 'Unknown error'));
        }
    })
    .catch(error => {
        console.error('Fetch error:', error);
        alert('Error updating dates. Please try again. Check console for details.');
    });
});
</script>
@endsection
