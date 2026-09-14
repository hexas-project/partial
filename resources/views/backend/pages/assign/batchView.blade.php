@extends('index')

@section('content')
<style>
    .profile-container {
        display: flex;
        gap: 20px;
        padding: 0;
        background: white;
        min-height: calc(100vh - 100px);
    }
    
    .profile-sidebar {
        background: white;
        border-radius: 8px;
        padding: 30px;
        width: 300px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        height: fit-content;
    }
    
    .profile-info {
        text-align: center;
        margin-bottom: 20px;
    }
    
    .profile-info h3 {
        margin: 15px 0 5px 0;
        color: #333;
        font-size: 20px;
    }
    
    .profile-info .batch-id {
        color: #666;
        font-size: 14px;
        margin-bottom: 20px;
    }
    
    .info-item {
        display: flex;
        align-items: center;
        padding: 12px 0;
        border-bottom: 1px solid #f0f0f0;
    }
    
    .info-item:last-child {
        border-bottom: none;
    }
    
    .info-item i {
        margin-right: 10px;
        color: #666;
        width: 20px;
    }
    
    .info-item .label {
        font-weight: 600;
        color: #333;
        margin-right: 5px;
    }
    
    .info-item .value {
        color: #666;
    }
    
    .profile-content {
        flex: 1;
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        overflow: hidden;
    }
    
    .tabs {
        display: flex;
        background: #f8f9fa;
        border-bottom: 2px solid #e0e0e0;
    }
    
    .tab {
        padding: 15px 30px;
        cursor: pointer;
        border: none;
        background: transparent;
        font-size: 15px;
        font-weight: 500;
        color: #666;
        transition: all 0.3s;
    }
    
    .tab.active {
        background: #3498db;
        color: white;
        border-bottom: 3px solid #2980b9;
    }
    
    .tab:hover:not(.active) {
        background: #e9ecef;
    }
    
    .tab-content {
        display: none;
        padding: 30px;
    }
    
    .tab-content.active {
        display: block;
    }
    
    .section-title {
        font-size: 18px;
        font-weight: 600;
        color: #3498db;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #3498db;
    }
    
    .detail-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        margin-bottom: 30px;
    }
    
    .detail-item {
        padding: 15px;
        background: #f8f9fa;
        border-radius: 6px;
    }
    
    .detail-item label {
        display: block;
        font-weight: 600;
        color: #555;
        margin-bottom: 5px;
        font-size: 13px;
    }
    
    .detail-item .value {
        color: #333;
        font-size: 15px;
    }
    
    .test-section {
        margin-bottom: 30px;
    }
    
    .test-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
    }
    
    .test-table th {
        background: #3498db;
        color: white;
        padding: 12px;
        text-align: left;
        font-weight: 500;
    }
    
    .test-table td {
        padding: 12px;
        border-bottom: 1px solid #e0e0e0;
    }
    
    .test-table tr:hover {
        background: #f8f9fa;
    }
    
    .no-records {
        text-align: center;
        padding: 30px;
        color: #999;
        font-style: italic;
    }
    
    .status-badge {
        padding: 4px 12px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 500;
    }
    
    .status-enabled {
        background: #d4edda;
        color: #155724;
    }
    
    .back-button {
        display: inline-block;
        padding: 10px 20px;
        background: #6c757d;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        margin-bottom: 20px;
    }
    
    .back-button:hover {
        background: #5a6268;
        color: white;
    }
</style>

<div class="container-fluid">
    <a href="{{ route('batch.enrollment.page') }}" class="back-button">
        <i class="ti ti-arrow-left"></i> Back to Batch List
    </a>
    
    <div class="profile-container">
        <div class="profile-sidebar">
            <div class="profile-info">
                <h3>{{ $batch->exam_name }}</h3>
                <p class="batch-id">Batch ID: #{{ $batch->id }}</p>
            </div>
            
            <div class="info-item">
                <i class="ti ti-mail"></i>
                <div>
                    <div class="label">Email:</div>
                    <div class="value">{{ $batch->email }}</div>
                </div>
            </div>
            
            <div class="info-item">
                <i class="ti ti-phone"></i>
                <div>
                    <div class="label">Mobile:</div>
                    <div class="value">{{ $batch->mobile }}</div>
                </div>
            </div>
            
            <div class="info-item">
                <i class="ti ti-user"></i>
                <div>
                    <div class="label">Username:</div>
                    <div class="value">{{ $batch->username }}</div>
                </div>
            </div>
            
            <div class="info-item">
                <i class="ti ti-lock"></i>
                <div>
                    <div class="label">Password:</div>
                    <div class="value">{{ $batch->password }}</div>
                </div>
            </div>
            
            <div class="info-item">
                <i class="ti ti-calendar"></i>
                <div>
                    <div class="label">Created:</div>
                    <div class="value">{{ $batch->created_at->format('M d, Y') }}</div>
                </div>
            </div>
        </div>
        
        <div class="profile-content">
            <div class="tabs">
                <button class="tab active" onclick="switchTab('personal')">Personal Details</button>
                <button class="tab" onclick="switchTab('test')">Test Details</button>
            </div>
            
            <div id="personal-tab" class="tab-content active">
                <h4 class="section-title">Personal Information</h4>
                
                <div class="detail-grid">
                    <div class="detail-item">
                        <label>Exam Name</label>
                        <div class="value">{{ $batch->exam_name }}</div>
                    </div>
                    
                    <div class="detail-item">
                        <label>Type</label>
                        <div class="value">{{ $batch->type }}</div>
                    </div>
                    
                    <div class="detail-item">
                        <label>Email Address</label>
                        <div class="value">{{ $batch->email }}</div>
                    </div>
                    
                    <div class="detail-item">
                        <label>Mobile Number</label>
                        <div class="value">{{ $batch->mobile }}</div>
                    </div>
                    
                    <div class="detail-item">
                        <label>Username</label>
                        <div class="value">{{ $batch->username }}</div>
                    </div>
                    
                    <div class="detail-item">
                        <label>Password</label>
                        <div class="value">{{ $batch->password }}</div>
                    </div>
                    
                    <div class="detail-item">
                        <label>Joining Date</label>
                        <div class="value">{{ $batch->created_at->format('M d, Y') }}</div>
                    </div>
                </div>
            </div>
            
            <div id="test-tab" class="tab-content">
                <div class="test-section">
                    <h4 class="section-title">Test History</h4>
                    <table class="test-table">
                        <thead>
                            <tr>
                                <th>Test Name</th>
                                <th>Added Date</th>
                                <th>Marks Obtained</th>
                                <th>Total Marks</th>
                                <th>%age</th>
                                <th>Analysis</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="6" class="no-records">No Record Found</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <div class="test-section">
                    <h4 class="section-title">Upcoming Test</h4>
                    <table class="test-table">
                        <thead>
                            <tr>
                                <th>Test Name</th>
                                <th>Start Date</th>
                                <th>Due Date</th>
                                <th>Marks Obtained</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($upcomingTests as $test)
                                <tr>
                                    <td>{{ $test->test_name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($test->start_date)->format('M d, Y h:i A') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($test->closing_date)->format('M d, Y h:i A') }}</td>
                                    <td>-</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="no-records">No Record Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <div class="test-section">
                    <h4 class="section-title">Expired Test</h4>
                    <table class="test-table">
                        <thead>
                            <tr>
                                <th>Test Name</th>
                                <th>Start Date</th>
                                <th>Due Date</th>
                                <th>Marks Obtained</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($expiredTests as $test)
                                <tr>
                                    <td>{{ $test->test_name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($test->start_date)->format('M d, Y h:i A') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($test->closing_date)->format('M d, Y h:i A') }}</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="no-records">No Record Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function switchTab(tabName) {
    // Hide all tabs
    document.querySelectorAll('.tab-content').forEach(tab => {
        tab.classList.remove('active');
    });
    
    document.querySelectorAll('.tab').forEach(tab => {
        tab.classList.remove('active');
    });
    
    // Show selected tab
    document.getElementById(tabName + '-tab').classList.add('active');
    event.target.classList.add('active');
}
</script>
@endsection
