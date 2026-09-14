@extends('index')

@section('content')
<!-- Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<style>
    /* Custom time list on right side */
    .flatpickr-calendar {
        z-index: 99999 !important;
        position: absolute !important;
    }
    
    .flatpickr-calendar.open {
        display: block !important;
    }
    
    .flatpickr-calendar.hasTime .flatpickr-time {
        display: none !important;
    }
    
    .time-list-container {
        position: absolute;
        right: -71px;
        top: 0;
        width: 70px;
        max-height: 310px;
        overflow-y: auto;
        border: 1px solid #e6e6e6;
        border-radius: 5px;
        background: white;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        z-index: 100000;
    }
    
    .form-field {
        position: relative;
    }
    
    .time-list-item {
        padding: 12px 12px;
        cursor: pointer;
        text-align: center;
        font-size: 14px;
        border-bottom: 1px solid #f0f0f0;
        line-height: 1.5;
    }
    
    .time-list-item:hover {
        background-color: #f0f7ff;
    }
    
    .time-list-item.selected {
        background-color: #007bff;
        color: white;
    }
    
    .assign-final-container {
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
    
    .view-assigned-btn {
        padding: 10px 20px;
        background: #28a745;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
        text-decoration: none;
        display: inline-block;
    }
    
    .view-assigned-btn:hover {
        background: #218838;
        color: white;
    }
    
    .assignment-section {
        padding: 30px;
    }
    
    .test-assignment-wrapper {
        background: white;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 30px;
        margin-bottom: 30px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }
    
    .test-details-card {
        background: transparent;
        padding: 0;
        margin-bottom: 30px;
    }
    
    .test-details-row {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        align-items: end;
    }
    
    .form-field {
        display: flex;
        flex-direction: column;
    }
    
    .form-field label {
        font-weight: 500;
        color: #555;
        margin-bottom: 8px;
        font-size: 14px;
    }
    
    .form-field input,
    .form-field select {
        padding: 10px 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 14px;
    }
    
    .form-field input:focus,
    .form-field select:focus {
        outline: none;
        border-color: #3498db;
    }
    
    .exams-table-card {
        background: transparent;
        overflow: hidden;
        margin-bottom: 20px;
    }
    
    .assignment-table {
        width: 100%;
        border-collapse: collapse;
        background: white;
    }
    
    .assignment-table thead {
        background: #34495e;
        color: white;
    }
    
    .assignment-table th {
        padding: 15px;
        text-align: left;
        font-weight: 500;
    }
    
    .assignment-table td {
        padding: 15px;
        border-bottom: 1px solid #e0e0e0;
    }
    
    .assignment-table tbody tr:hover {
        background: #f8f9fa;
    }
    
    .date-input {
        padding: 8px 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 14px;
        width: 100%;
        max-width: 200px;
    }
    
    .date-input:focus {
        outline: none;
        border-color: #3498db;
    }
    
    .save-btn {
        padding: 12px 40px;
        background: #3498db;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 15px;
        font-weight: 500;
        margin-top: 20px;
    }
    
    .save-btn:hover {
        background: #2980b9;
    }
    
    .no-data {
        text-align: center;
        padding: 50px;
        color: #999;
        font-style: italic;
    }
    
    .time-slot-row {
        margin-bottom: 15px;
        padding-bottom: 15px;
        border-bottom: 1px solid #e0e0e0;
    }
    
    .time-slot-row:last-child {
        border-bottom: none;
    }
    
    .time-slot-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }
    
    .add-time-slot-btn,
    .remove-time-slot-btn {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        border: none;
        cursor: pointer;
        font-size: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s;
    }
    
    .add-time-slot-btn {
        background: #28a745;
        color: white;
    }
    
    .add-time-slot-btn:hover {
        background: #218838;
        transform: scale(1.1);
    }
    
    .remove-time-slot-btn {
        background: #dc3545;
        color: white;
    }
    
    .remove-time-slot-btn:hover {
        background: #c82333;
        transform: scale(1.1);
    }
</style>

<div class="assign-final-container">
    <div class="page-header">
        <h2>Assign Test(s)</h2>
        <div style="display: flex; gap: 10px;">
            <a href="javascript:history.back()" class="back-btn">Back</a>
            <a href="{{ route('assigned.test.list') }}" class="view-assigned-btn">View Assigned Test</a>
        </div>
    </div>
    
    <div class="assignment-section">
        <form action="{{ route('save.test.assignments') }}" method="POST" id="assignmentForm">
            @csrf
            
            @if(count($assignments) > 0)
                @php
                    // Group assignments by test
                    $groupedAssignments = [];
                    foreach($assignments as $assignment) {
                        $testId = $assignment['test_id'];
                        if (!isset($groupedAssignments[$testId])) {
                            $groupedAssignments[$testId] = [
                                'test_name' => $assignment['test_name'],
                                'test_id' => $testId,
                                'exams' => []
                            ];
                        }
                        $groupedAssignments[$testId]['exams'][] = $assignment;
                    }
                @endphp
                
                @foreach($groupedAssignments as $testId => $testGroup)
                <!-- Wrapper: Contains both cards and save button -->
                <div class="test-assignment-wrapper">
                    <!-- Top Section: Test Details -->
                    <div class="test-details-card">
                        <div class="time-slots-container" id="timeSlotsContainer{{ $testId }}">
                            <!-- First Time Slot -->
                            <div class="time-slot-row">
                                <div class="time-slot-header">
                                    <h4 style="margin: 0; color: #555;">Time Slot 1</h4>
                                    <button type="button" class="add-time-slot-btn" onclick="addTimeSlot({{ $testId }})">+</button>
                                </div>
                                <div class="test-details-row" style="grid-template-columns: repeat(3, 1fr);">
                                    <div class="form-field">
                                        <label>Test Name</label>
                                        <input type="text" value="{{ $testGroup['test_name'] }}" readonly style="background: #f8f9fa;">
                                        <input type="hidden" name="tests[{{ $testId }}][test_id]" value="{{ $testId }}">
                                        <input type="hidden" name="tests[{{ $testId }}][test_name]" value="{{ $testGroup['test_name'] }}">
                                    </div>
                                    
                                    <div class="form-field">
                                        <label>Start Date</label>
                                        <input type="datetime-local" 
                                               name="tests[{{ $testId }}][time_slots][0][start_date]" 
                                               placeholder="Select start date"
                                               required>
                                    </div>
                                    
                                    <div class="form-field">
                                        <label>Closing Date</label>
                                        <input type="datetime-local" 
                                               name="tests[{{ $testId }}][time_slots][0][closing_date]" 
                                               placeholder="Select closing date"
                                               required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Bottom Section: Exam Names Table -->
                    <div class="exams-table-card">
                        <div style="display: flex; justify-content: flex-end; margin-bottom: 10px;">
                            <button type="submit" class="save-btn">Save</button>
                        </div>
                        <table class="assignment-table">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Exam Name</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($testGroup['exams'] as $index => $exam)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        {{ $exam['exam_name'] }}
                                        <input type="hidden" name="tests[{{ $testId }}][exams][{{ $index }}][exam_name]" value="{{ $exam['exam_name'] }}">
                                    </td>
                                    <td>
                                        {{ $exam['username'] }}
                                        <input type="hidden" name="tests[{{ $testId }}][exams][{{ $index }}][username]" value="{{ $exam['username'] }}">
                                    </td>
                                    <td>
                                        {{ $exam['password'] }}
                                        <input type="hidden" name="tests[{{ $testId }}][exams][{{ $index }}][password]" value="{{ $exam['password'] }}">
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endforeach
            @else
                <div class="test-details-card">
                    <p class="no-data">No assignments to display</p>
                </div>
            @endif
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
let timeSlotCounters = {};

function addTimeSlot(testId) {
    if (!timeSlotCounters[testId]) {
        timeSlotCounters[testId] = 1;
    }
    
    timeSlotCounters[testId]++;
    const slotNumber = timeSlotCounters[testId];
    const container = document.getElementById('timeSlotsContainer' + testId);
    const testName = container.querySelector('input[type="text"]').value;
    
    const newSlot = `
        <div class="time-slot-row">
            <div class="time-slot-header">
                <h4 style="margin: 0; color: #555;">Time Slot ${slotNumber}</h4>
                <button type="button" class="remove-time-slot-btn" onclick="removeTimeSlot(this)">−</button>
            </div>
            <div class="test-details-row" style="grid-template-columns: repeat(3, 1fr);">
                <div class="form-field">
                    <label>Test Name</label>
                    <input type="text" value="${testName}" readonly style="background: #f8f9fa;">
                </div>
                
                <div class="form-field">
                    <label>Start Date</label>
                    <input type="text" 
                           name="tests[${testId}][time_slots][${slotNumber - 1}][start_date]" 
                           placeholder="Select date and time"
                           required>
                </div>
                
                <div class="form-field">
                    <label>Closing Date</label>
                    <input type="text" 
                           name="tests[${testId}][time_slots][${slotNumber - 1}][closing_date]" 
                           placeholder="Select date and time"
                           required>
                </div>
            </div>
        </div>
    `;
    
    container.insertAdjacentHTML('beforeend', newSlot);
    
    // Initialize flatpickr for the newly added inputs
    setTimeout(() => {
        const newInputs = $(container).find('.time-slot-row:last-child input[name*="start_date"], .time-slot-row:last-child input[name*="closing_date"]');
        if (newInputs.length > 0 && typeof window.initializeDatetimepicker === 'function') {
            window.initializeDatetimepicker(newInputs);
        }
    }, 100);
}

function removeTimeSlot(button) {
    const timeSlotRow = button.closest('.time-slot-row');
    timeSlotRow.remove();
    
    // Update slot numbers
    const container = timeSlotRow.closest('.time-slots-container');
    const slots = container.querySelectorAll('.time-slot-row');
    slots.forEach((slot, index) => {
        const header = slot.querySelector('.time-slot-header h4');
        header.textContent = 'Time Slot ' + (index + 1);
    });
}

$(document).ready(function() {
    // Check if flatpickr is loaded
    if (typeof flatpickr === 'undefined') {
        console.error('Flatpickr is not loaded!');
        return;
    }
    
    console.log('Flatpickr loaded successfully');
    
    // Generate time list (15-minute intervals, 12-hour format)
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
    
    // Initialize custom datetime picker
    window.initializeDatetimepicker = function(selector) {
        try {
            const times = generateTimeList();
            
            $(selector).each(function() {
                const input = $(this);
                console.log('Initializing flatpickr for:', input.attr('name'));
                
                // Destroy existing flatpickr instance if any
                if (input[0]._flatpickr) {
                    input[0]._flatpickr.destroy();
                }
                
                // Change input type to text for flatpickr compatibility
                input.attr('type', 'text');
                input.attr('placeholder', 'Select date and time');
                
                // Initialize flatpickr for date only
                const fp = flatpickr(input[0], {
                    dateFormat: "Y-m-d",
                    allowInput: false,
                    clickOpens: true,
                    defaultDate: new Date(),
                    onChange: function(selectedDates, dateStr, instance) {
                        updateInputValue(input);
                    },
                    onOpen: function(selectedDates, dateStr, instance) {
                        console.log('Calendar opened');
                        
                        // Set default time if not already set
                        if (!input.data('selected-time')) {
                            input.data('selected-time', '12:00 AM');
                        }
                        
                        // Create time list if not exists
                        if (!instance.calendarContainer.querySelector('.time-list-container')) {
                            const timeList = document.createElement('div');
                            timeList.className = 'time-list-container';
                            
                            times.forEach(time => {
                                const item = document.createElement('div');
                                item.className = 'time-list-item';
                                item.textContent = time;
                                
                                // Mark default time as selected
                                if (time === input.data('selected-time')) {
                                    item.classList.add('selected');
                                }
                                
                                item.onclick = function() {
                                    instance.calendarContainer.querySelectorAll('.time-list-item').forEach(i => i.classList.remove('selected'));
                                    item.classList.add('selected');
                                    input.data('selected-time', time);
                                    updateInputValue(input);
                                };
                                timeList.appendChild(item);
                            });
                            
                            instance.calendarContainer.style.position = 'relative';
                            instance.calendarContainer.appendChild(timeList);
                        }
                        
                        // Update input with default values
                        updateInputValue(input);
                    }
                });
                
                console.log('Flatpickr initialized:', fp);
                input.data('flatpickr', fp);
                
                // Add explicit click handler
                input.off('click').on('click', function(e) {
                    e.preventDefault();
                    console.log('Input clicked, opening calendar');
                    if (fp) {
                        fp.open();
                    }
                });
            });
        } catch (error) {
            console.error('Error initializing flatpickr:', error);
        }
    }
    
    function updateInputValue(input) {
        const fp = input.data('flatpickr');
        const time = input.data('selected-time') || '12:00 AM';
        if (fp && fp.selectedDates.length > 0) {
            const date = fp.selectedDates[0];
            const dateStr = date.getFullYear() + '-' + 
                           String(date.getMonth() + 1).padStart(2, '0') + '-' + 
                           String(date.getDate()).padStart(2, '0');
            input.val(dateStr + ' ' + time);
            
            // Auto-fill closing date if this is a start date input
            if (input.attr('name').includes('start_date')) {
                autoFillClosingDate(input, dateStr, time);
            }
        }
    }
    
    function autoFillClosingDate(startInput, dateStr, startTime) {
        // Find the corresponding closing date input in the same time slot
        const timeSlotRow = startInput.closest('.time-slot-row');
        const closingInput = $(timeSlotRow).find('input[name*="closing_date"]');
        
        if (closingInput.length > 0) {
            // Parse start time and add 30 minutes
            const timeParts = startTime.match(/(\d+):(\d+)\s+(AM|PM)/);
            if (timeParts) {
                let hours = parseInt(timeParts[1]);
                let minutes = parseInt(timeParts[2]);
                const ampm = timeParts[3];
                
                // Convert to 24-hour format
                if (ampm === 'PM' && hours !== 12) hours += 12;
                if (ampm === 'AM' && hours === 12) hours = 0;
                
                // Add 30 minutes
                minutes += 30;
                if (minutes >= 60) {
                    minutes -= 60;
                    hours += 1;
                }
                if (hours >= 24) {
                    hours -= 24;
                }
                
                // Convert back to 12-hour format
                const newAmpm = hours >= 12 ? 'PM' : 'AM';
                const displayHours = hours === 0 ? 12 : (hours > 12 ? hours - 12 : hours);
                const closingTime = `${String(displayHours).padStart(2, '0')}:${String(minutes).padStart(2, '0')} ${newAmpm}`;
                
                // Store the selected time first
                closingInput.data('selected-time', closingTime);
                
                // Update the flatpickr instance if it exists
                const closingFp = closingInput.data('flatpickr');
                if (closingFp) {
                    // Parse the date string to create a proper date object
                    const dateParts = dateStr.split('-');
                    const dateObj = new Date(dateParts[0], dateParts[1] - 1, dateParts[2]);
                    closingFp.setDate(dateObj, false);
                }
                
                // Set the visible input value (this is what user sees)
                closingInput.val(dateStr + ' ' + closingTime);
                
                // Trigger change event to ensure any listeners are notified
                closingInput.trigger('change');
            }
        }
    }
    
    // Initialize for existing inputs
    setTimeout(function() {
        const inputs = $('input[name*="start_date"], input[name*="closing_date"]');
        console.log('Found inputs:', inputs.length);
        if (inputs.length > 0) {
            initializeDatetimepicker(inputs);
        } else {
            console.warn('No datetime inputs found!');
        }
    }, 500);
    
    
    // Form validation
    $('#assignmentForm').on('submit', function(e) {
        let valid = true;
        
        $('input[type="datetime-local"]').each(function() {
            if (!$(this).val()) {
                valid = false;
                $(this).css('border-color', 'red');
            } else {
                $(this).css('border-color', '#ddd');
            }
        });
        
        if (!valid) {
            e.preventDefault();
            alert('Please fill in all start and closing dates');
            return false;
        }
        
        // Validate that closing date is after start date
        $('.time-slot-row').each(function() {
            const startDate = $(this).find('input[name*="start_date"]').val();
            const closingDate = $(this).find('input[name*="closing_date"]').val();
            
            if (startDate && closingDate && new Date(closingDate) <= new Date(startDate)) {
                valid = false;
                alert('Closing date must be after start date');
                e.preventDefault();
                return false;
            }
        });
    });
});
</script>
@endsection
