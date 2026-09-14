@extends('index')

@section('content')
<style>
    .assign-test-container {
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
    
    .filter-section {
        padding: 30px;
        background: white;
        border-bottom: 1px solid #e0e0e0;
    }
    
    .filter-row {
        display: flex;
        gap: 20px;
        align-items: flex-end;
    }
    
    .filter-group {
        flex: 1;
    }
    
    .filter-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: #555;
    }
    
    .filter-select {
        width: 100%;
        padding: 10px 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 14px;
        background: white;
        cursor: pointer;
    }
    
    .filter-select:focus {
        outline: none;
        border-color: #3498db;
    }
    
    .search-btn {
        padding: 10px 30px;
        background: #3498db;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 500;
    }
    
    .search-btn:hover {
        background: #2980b9;
    }
    
    .view-assigned-btn {
        padding: 10px 20px;
        background: #27ae60;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
        text-decoration: none;
        display: inline-block;
    }
    
    .view-assigned-btn:hover {
        background: #229954;
        color: white;
    }
    
    .results-section {
        padding: 30px;
    }
    
    .results-table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        border-radius: 8px;
        overflow: hidden;
    }
    
    .results-table thead {
        background: #34495e;
        color: white;
    }
    
    .results-table th {
        padding: 15px;
        text-align: left;
        font-weight: 500;
    }
    
    .results-table td {
        padding: 15px;
        border-bottom: 1px solid #e0e0e0;
    }
    
    .results-table tbody tr:hover {
        background: #f8f9fa;
    }
    
    .no-results {
        text-align: center;
        padding: 50px;
        color: #999;
        font-style: italic;
    }
    
    .assign-btn {
        padding: 6px 15px;
        background: #3498db;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 13px;
    }
    
    .assign-btn:hover {
        background: #2980b9;
    }
    
    /* Custom Multiselect Dropdown */
    .multiselect-container {
        position: relative;
        width: 100%;
    }
    
    .multiselect-selected-text {
        width: 100%;
        padding: 10px 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background: white;
        cursor: pointer;
        min-height: 42px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    
    .multiselect-selected-text:hover {
        border-color: #3498db;
    }
    
    .multiselect-dropdown {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: white;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-top: 5px;
        max-height: 300px;
        overflow-y: auto;
        display: none;
        z-index: 1000;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    
    .multiselect-dropdown.show {
        display: block;
    }
    
    .multiselect-option {
        padding: 10px 15px;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .multiselect-option:hover {
        background: #f0f0f0;
    }
    
    .multiselect-option input[type="checkbox"] {
        cursor: pointer;
    }
    
    .multiselect-option.selected {
        background: #e3f2fd;
    }
    
    .multiselect-select-all {
        padding: 10px 15px;
        border-bottom: 1px solid #ddd;
        font-weight: 500;
        background: #f8f9fa;
    }
    
    .arrow-icon {
        transition: transform 0.3s;
    }
    
    .arrow-icon.rotate {
        transform: rotate(180deg);
    }
</style>

<div class="assign-test-container">
    <div class="page-header">
        <h2>Assign Test(s)</h2>
        <a href="{{ route('assigned.test.list') }}" class="view-assigned-btn">View Assigned Test</a>
    </div>
    
    <div class="filter-section">
        <form id="filterForm" method="GET" action="{{ route('assign.test.page') }}">
            <div class="filter-row">
                <div class="filter-group">
                    <label>Exam Type</label>
                    <select name="batch_type" id="batchType" class="filter-select" required>
                        <option value="">Select Exam Type</option>
                        <option value="Academic" {{ request('batch_type') == 'Academic' ? 'selected' : '' }}>Academic</option>
                        <option value="GT" {{ request('batch_type') == 'GT' ? 'selected' : '' }}>GT (General Training)</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label>Id Name</label>
                    <div class="multiselect-container">
                        <div class="multiselect-selected-text" id="multiselectButton">
                            <span id="selectedText">Select Id Names</span>
                            <span class="arrow-icon">▼</span>
                        </div>
                        <div class="multiselect-dropdown" id="multiselectDropdown">
                            <div class="multiselect-search">
                                <input type="text" id="searchInput" placeholder="Search Id Names..." style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; margin-bottom: 10px; box-sizing: border-box;">
                            </div>
                            <div class="multiselect-select-all">
                                <label style="cursor: pointer; margin: 0;">
                                    <input type="checkbox" id="selectAllCheckbox"> Select All
                                </label>
                            </div>
                            <div id="examOptionsContainer"></div>
                        </div>
                    </div>
                    <div id="hiddenInputsContainer"></div>
                </div>
                
                <button type="submit" class="search-btn">Search</button>
            </div>
        </form>
    </div>
    
    @if(isset($examNames))
    <div class="results-section">
        @if(count($examNames) > 0)
        <div style="display: flex; justify-content: flex-end; margin-bottom: 10px;">
            <form action="{{ route('select.tests.page') }}" method="POST" id="nextForm" style="margin: 0;">
                @csrf
                <div id="selectedExamsInputs"></div>
                <button type="submit" class="assign-btn" style="padding: 10px 30px; font-size: 15px;">Next</button>
            </form>
        </div>
        @endif

        <table class="results-table">
            <thead>
                <tr>
                    <th style="width: 50px;">
                        <input type="checkbox" id="selectAll" onchange="toggleAllExams()">
                    </th>
                    <th>Sr. No.</th>
                    <th>Id Name</th>
                    <th>Exam Type</th>
                    <th>Total Students</th>
                </tr>
            </thead>
            <tbody>
                @forelse($examNames as $index => $exam)
                <tr>
                    <td>
                        <input type="checkbox" class="exam-checkbox" value="{{ $exam['name'] }}" data-batch-type="{{ $exam['type'] }}">
                    </td>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $exam['name'] }}</td>
                    <td>{{ $exam['type'] }}</td>
                    <td>{{ $exam['student_count'] }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="no-results">No id names found for the selected criteria</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @endif
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    let selectedExams = [];
    
    // Toggle dropdown
    $('#multiselectButton').on('click', function(e) {
        e.stopPropagation();
        $('#multiselectDropdown').toggleClass('show');
        $('.arrow-icon').toggleClass('rotate');
    });
    
    // Close dropdown when clicking outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.multiselect-container').length) {
            $('#multiselectDropdown').removeClass('show');
            $('.arrow-icon').removeClass('rotate');
        }
    });
    
    // Select All functionality
    $('#selectAllCheckbox').on('change', function() {
        const isChecked = $(this).is(':checked');
        $('#examOptionsContainer input[type="checkbox"]').prop('checked', isChecked);
        updateSelectedExams();
    });
    
    // Search functionality for filtering Id Names
    $('#searchInput').on('keyup', function() {
        const searchTerm = $(this).val().toLowerCase();
        $('#examOptionsContainer .multiselect-option').each(function() {
            const optionText = $(this).text().toLowerCase();
            if (optionText.includes(searchTerm)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
    
    // Update selected exams display
    function updateSelectedExams() {
        selectedExams = [];
        $('#examOptionsContainer input[type="checkbox"]:checked').each(function() {
            selectedExams.push($(this).val());
        });
        
        if (selectedExams.length === 0) {
            $('#selectedText').text('Select Id Names');
        } else {
            $('#selectedText').text(selectedExams.join(', '));
        }
        
        // Update hidden inputs for form submission (as array)
        $('#hiddenInputsContainer').empty();
        selectedExams.forEach(function(examName) {
            $('#hiddenInputsContainer').append(`<input type="hidden" name="exam_names[]" value="${examName}">`);
        });
    }
    
    // Load exam names when batch type changes
    $('#batchType').on('change', function() {
        const batchType = $(this).val();
        
        console.log('Batch Type Selected:', batchType);
        
        // Clear options
        $('#examOptionsContainer').empty();
        selectedExams = [];
        $('#selectedText').text('Select Id Names');
        $('#selectAllCheckbox').prop('checked', false);
        
        if (batchType) {
            $.ajax({
                url: '{{ route("get.exam.names") }}',
                method: 'GET',
                data: { batch_type: batchType },
                success: function(response) {
                    console.log('Response:', response);
                    
                    if (response.count > 0 && response.exam_names) {
                        console.log('Exam Names Found:', response.count);
                        
                        // Add each exam name as checkbox option
                        response.exam_names.forEach(function(examName) {
                            const optionHtml = `
                                <div class="multiselect-option">
                                    <label style="cursor: pointer; margin: 0; display: flex; align-items: center; gap: 10px; width: 100%;">
                                        <input type="checkbox" value="${examName}" class="exam-checkbox">
                                        <span>${examName}</span>
                                    </label>
                                </div>
                            `;
                            $('#examOptionsContainer').append(optionHtml);
                        });
                        
                        // Add change event to checkboxes
                        $('.exam-checkbox').on('change', updateSelectedExams);
                        
                        console.log('Exam names loaded successfully');
                    } else {
                        $('#examOptionsContainer').html('<div class="multiselect-option" style="color: #999;">No exam names found</div>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', status, error);
                    $('#examOptionsContainer').html('<div class="multiselect-option" style="color: #e74c3c;">Error loading exam names</div>');
                }
            });
        }
    });
    
    // Trigger change if batch type is already selected
    @if(request('batch_type'))
        setTimeout(function() {
            $('#batchType').trigger('change');
        }, 100);
    @endif
});

function toggleAllExams() {
    const selectAll = document.getElementById('selectAll');
    const resultsTable = document.querySelector('.results-table');
    const checkboxes = resultsTable
        ? resultsTable.querySelectorAll('tbody .exam-checkbox')
        : [];
    
    checkboxes.forEach(checkbox => {
        checkbox.checked = selectAll.checked;
    });
}

// Keep header checkbox in sync when user clicks individual rows
document.addEventListener('change', function(e) {
    if (!e.target.classList || !e.target.classList.contains('exam-checkbox')) return;

    const resultsTable = document.querySelector('.results-table');
    if (!resultsTable || !resultsTable.contains(e.target)) return;

    const all = Array.from(resultsTable.querySelectorAll('tbody .exam-checkbox'));
    const checked = all.filter(cb => cb.checked);
    const header = document.getElementById('selectAll');
    if (header) {
        header.checked = all.length > 0 && checked.length === all.length;
    }
});

function assignSelectedTests() {
    const selectedExams = [];
    const checkboxes = document.querySelectorAll('.exam-checkbox:checked');
    
    if (checkboxes.length === 0) {
        alert('Please select at least one exam to assign');
        return;
    }
    
    checkboxes.forEach(checkbox => {
        selectedExams.push({
            name: checkbox.value,
            type: checkbox.getAttribute('data-batch-type')
        });
    });
    
    // For now, just show selected exams
    const examList = selectedExams.map(e => e.name).join(', ');
    alert(`Selected Exams: ${examList}\n\nTest assignment functionality will be implemented next.`);
    
    // TODO: Implement actual test assignment logic
    // This could open a modal to select tests or redirect to assignment page
}

// Populate selected exams before form submission
$('#nextForm').on('submit', function(e) {
    const selectedExams = [];
    const $table = $('.results-table');
    const $checked = $table.length ? $table.find('tbody .exam-checkbox:checked') : $();
    $checked.each(function() { selectedExams.push($(this).val()); });
    
    if (selectedExams.length === 0) {
        e.preventDefault();
        alert('Please select at least one id name from the table');
        return false;
    }
    
    // Clear and populate hidden inputs
    $('#selectedExamsInputs').empty();
    selectedExams.forEach(function(examName) {
        $('#selectedExamsInputs').append(`<input type="hidden" name="selected_exams[]" value="${examName}">`);
    });
});
</script>
@endsection
