@extends('index')

@section('content')
<style>
    .select-tests-container {
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
    
    .filter-section {
        padding: 30px;
        background: white;
        border-bottom: 1px solid #e0e0e0;
    }
    
    .filter-row {
        display: flex;
        gap: 20px;
        align-items: flex-end;
        max-width: 800px;
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
    
    .go-btn {
        padding: 10px 30px;
        background: #3498db;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 500;
    }
    
    .go-btn:hover {
        background: #2980b9;
    }
    
    .results-section {
        padding: 30px;
    }
    
    .tests-table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        border-radius: 8px;
        overflow: hidden;
    }
    
    .tests-table thead {
        background: #34495e;
        color: white;
    }
    
    .tests-table th {
        padding: 15px;
        text-align: left;
        font-weight: 500;
    }
    
    .tests-table td {
        padding: 15px;
        border-bottom: 1px solid #e0e0e0;
    }
    
    .tests-table tbody tr:hover {
        background: #f8f9fa;
    }
    
    .no-results {
        text-align: center;
        padding: 50px;
        color: #999;
        font-style: italic;
    }
    
    .assign-icon {
        color: #3498db;
        cursor: pointer;
        font-size: 18px;
    }
    
    .assign-icon:hover {
        color: #2980b9;
    }
    
    .selected-exams-info {
        padding: 15px 30px;
        background: #e3f2fd;
        border-left: 4px solid #3498db;
        margin: 20px 30px;
        border-radius: 4px;
    }
    
    .selected-exams-info strong {
        color: #1976d2;
    }
</style>

<div class="select-tests-container">
    <div class="page-header">
        <h2>Assign Test(s)</h2>
        <a href="{{ route('assign.test.page') }}" class="back-btn">Back</a>
    </div>
    
    <div class="selected-exams-info">
        <strong>Selected Exam Names:</strong> {{ implode(', ', $selectedExams) }}
    </div>
    
    <div class="results-section">
        <form action="{{ route('assign.tests.final') }}" method="POST" id="assignTestsForm">
            @csrf
            <div id="selectedExamsInputsHidden"></div>
            <div id="selectedTestsInputsHidden"></div>
            
            <table class="tests-table">
                <thead>
                    <tr>
                        <th colspan="4" style="background: white; padding: 20px;">
                            <div class="filter-row" style="margin: 0;">
                                <div class="filter-group">
                                    <label style="color: #555;">Select Category</label>
                                    <select id="testCategory" class="filter-select">
                                        <option value="">Select Category</option>
                                        <option value="Academic_Listening">Listening</option>
                                        <option value="Academic_Reading">Academic Reading</option>
                                        <option value="GT_Reading">General Reading</option>
                                        <option value="Academic_Writing">Academic Writing</option>
                                        <option value="GT_Writing">General Writing</option>
                                    </select>
                                </div>
                                
                                <div class="filter-group">
                                    <label style="color: #555;">All</label>
                                    <select class="filter-select">
                                        <option value="all">All</option>
                                    </select>
                                </div>
                                
                                <div class="filter-group">
                                    <label style="color: #555;">Test Title / ID</label>
                                    <input type="text" id="searchTest" class="filter-select" placeholder="Search...">
                                </div>
                                
                                <button type="submit" class="go-btn" style="background: #28a745;">Next</button>
                            </div>
                        </th>
                    </tr>
                <tr>
                    <th>Sr. No.</th>
                    <th style="width: 50px;"></th>
                    <th>Test Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="testsTableBody">
                <tr>
                    <td colspan="4" class="no-results">Please select a category to view tests</td>
                </tr>
            </tbody>
        </table>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
const selectedExams = @json($selectedExams);
const allTests = @json($allTests);

// Populate selected exams as hidden inputs
$(document).ready(function() {
    selectedExams.forEach(function(examName) {
        $('#selectedExamsInputsHidden').append(`<input type="hidden" name="selected_exams[]" value="${examName}">`);
    });
});

function filterTests() {
    const category = $('#testCategory').val();
    const searchTerm = $('#searchTest').val().toLowerCase();
    
    if (!category) {
        $('#testsTableBody').html('<tr><td colspan="4" class="no-results">Please select a category</td></tr>');
        return;
    }
    
    // Filter tests by category
    const filteredTests = allTests.filter(test => {
        const matchesCategory = test.category === category;
        const matchesSearch = searchTerm === '' || 
                             test.name.toLowerCase().includes(searchTerm) ||
                             test.id.toString().includes(searchTerm);
        return matchesCategory && matchesSearch;
    });
    
    if (filteredTests.length === 0) {
        $('#testsTableBody').html('<tr><td colspan="4" class="no-results">No tests found</td></tr>');
        return;
    }
    
    // Build table rows
    let html = '';
    filteredTests.forEach((test, index) => {
        const testData = JSON.stringify({id: test.id, name: test.name}).replace(/"/g, '&quot;');
        html += `
            <tr>
                <td>${index + 1}</td>
                <td><input type="checkbox" class="test-checkbox" data-test='${testData}'></td>
                <td>${test.name}</td>
                <td>
                    <span class="assign-icon" onclick="assignSingleTest(${test.id}, '${test.name}')" title="View">
                        👁️
                    </span>
                </td>
            </tr>
        `;
    });
    
    $('#testsTableBody').html(html);
}

function assignSingleTest(testId, testName) {
    alert(`Assigning test: ${testName} to exams: ${selectedExams.join(', ')}`);
}

// Auto-filter when category changes
$('#testCategory').on('change', filterTests);

// Handle form submission
$('#assignTestsForm').on('submit', function(e) {
    const selectedTests = [];
    $('.test-checkbox:checked').each(function() {
        selectedTests.push($(this).data('test'));
    });
    
    if (selectedTests.length === 0) {
        e.preventDefault();
        alert('Please select at least one test');
        return false;
    }
    
    // Clear and populate selected tests
    $('#selectedTestsInputsHidden').empty();
    selectedTests.forEach(function(test) {
        $('#selectedTestsInputsHidden').append(`<input type="hidden" name="selected_tests[]" value='${JSON.stringify(test)}'>`);
    });
});
</script>
@endsection
