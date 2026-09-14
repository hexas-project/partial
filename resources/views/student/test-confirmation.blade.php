@extends('index')

@section('content')
<style>
    /* Hide sidebar and navbar elements */
    .layout-menu,
    .layout-menu-toggle,
    .navbar-nav.flex-row.align-items-center.ms-md-auto {
        display: none !important;
    }
    
    /* Adjust content to full width */
    .layout-page {
        padding-left: 0 !important;
    }
    
    .layout-navbar {
        left: 0 !important;
    }
    
    /* Align navbar with content */
    .layout-navbar .container-xxl {
        max-width: none !important;
        width: 1200px !important;
        margin: 0 auto !important;
        padding-left: 20px !important;
        padding-right: 20px !important;
    }
    
    .confirmation-wrapper {
        background: #f5f7fa;
        min-height: 100vh;
        padding: 40px 20px;
    }
    
    .confirmation-container {
        width: 800px;
        margin: 0 auto;
    }
    
    .test-info-card {
        background: white;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        padding: 30px;
        position: relative;
    }
    
    .test-title {
        font-size: 28px;
        font-weight: 600;
        color: #333;
        margin-bottom: 10px;
    }
    
    .test-status {
        color: #dc3545;
        font-size: 16px;
        font-weight: 500;
        margin-bottom: 20px;
    }
    
    .test-timing {
        color: #666;
        font-size: 14px;
        margin-bottom: 30px;
    }
    
    .test-confirmation-box {
        background: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 6px;
        padding: 20px;
        margin-bottom: 30px;
    }
    
    .confirmation-header {
        display: flex;
        align-items: center;
        gap: 12px;
        cursor: pointer;
        user-select: none;
    }
    
    .arrow-icon {
        font-size: 20px;
        font-weight: bold;
        transition: transform 0.3s;
    }
    
    .arrow-icon.expanded {
        transform: rotate(180deg);
    }
    
    .confirmation-text {
        color: #333;
        font-size: 14px;
    }
    
    .confirmation-text .not-confirmed {
        color: #dc3545;
        font-weight: 500;
    }
    
    .confirmation-text .confirmed {
        color: #28a745;
        font-weight: 500;
    }
    
    .video-container {
        display: none;
        margin-top: 20px;
    }
    
    .video-container.show {
        display: block;
    }
    
    .video-container video {
        width: 100%;
        border-radius: 6px;
        background: #000;
    }
    
    .ready-section {
        display: none;
        margin-top: 20px;
        padding: 15px;
        background: white;
        border-radius: 6px;
    }
    
    .ready-section.show {
        display: block;
    }
    
    .ready-section.hidden {
        display: none;
    }
    
    .ready-section h4 {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 10px;
    }
    
    .ready-section p {
        font-size: 14px;
        color: #666;
        margin-bottom: 15px;
    }
    
    .confirm-btn {
        background: #000;
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 14px;
        border-radius: 4px;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .confirm-btn:hover {
        background: #333;
    }
    
    .start-test-btn {
        background: #000;
        color: white;
        border: none;
        padding: 12px 30px;
        font-size: 14px;
        font-weight: 600;
        border-radius: 4px;
        cursor: pointer;
        transition: background 0.3s;
        display: none;
        margin-top: 20px;
    }
    
    .start-test-btn.show {
        display: block;
    }
    
    .start-test-btn:hover {
        background: #333;
    }
    
    .start-test-btn::before {
        content: '→ ';
        margin-right: 5px;
    }
    
    .instructions-card {
        background: #fff9c4;
        border: 1px solid #f9a825;
        border-radius: 8px;
        padding: 25px;
        position: relative;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        align-self: start;
        max-height: fit-content;
    }
    
    .close-instructions {
        position: absolute;
        top: 10px;
        right: 10px;
        background: transparent;
        border: 1px solid #333;
        width: 24px;
        height: 24px;
        border-radius: 4px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        font-weight: bold;
    }
    
    .instructions-card h3 {
        font-size: 16px;
        font-weight: 600;
        color: #333;
        margin-bottom: 15px;
        line-height: 1.5;
    }
    
    @media (max-width: 968px) {
        .confirmation-container {
            grid-template-columns: 1fr;
        }
        
        .instructions-card {
            order: -1;
        }
    }
</style>

<div class="confirmation-wrapper">
    <div class="confirmation-container">
        <!-- Left Side - Test Information -->
        <div class="test-info-card">
            <button class="start-test-btn show" id="startTestBtn" onclick="startTest()" style="position: absolute; top: 30px; right: 30px; margin-top: 0;">
                Next
            </button>
            <h1 class="test-title">{{ $testCategory }}</h1>
            <p class="test-status">Not completed</p>
            <p class="test-timing">Timing: {{ $timing }} minutes</p>
            
            <div class="test-confirmation-box">
                <div class="confirmation-header" onclick="toggleVideo()">
                    <span class="arrow-icon expanded" id="arrowIcon">▼</span>
                    <span class="confirmation-text">
                        Test information. <span class="not-confirmed">Not confirmed.</span>
                    </span>
                </div>
                
                <div class="video-container show" id="videoContainer">
                    <video id="instructionVideo" controls controlsList="nodownload" preload="none">
                        <source src="{{
                            str_contains($testCategory, 'Writing')
                                ? asset('video/writing.mp4')
                                : (str_contains($testCategory, 'Reading')
                                    ? asset('video/reading.mp4')
                                    : asset('video/listening.mp4'))
                        }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
                
                </div>
        </div>
    </div>
</div>

<script>
    function toggleVideo() {
        const videoContainer = document.getElementById('videoContainer');
        const arrowIcon = document.getElementById('arrowIcon');
        
        if (videoContainer.classList.contains('show')) {
            videoContainer.classList.remove('show');
            arrowIcon.classList.remove('expanded');
        } else {
            videoContainer.classList.add('show');
            arrowIcon.classList.add('expanded');
        }
    }
    
    function startTest() {
        // Ek click er por button bondho. Slow line e student bar bar click korle
        // protita click e ekta kore page request jeto — sob mile server e chap barto.
        var btn = document.getElementById('startTestBtn');
        if (btn) {
            if (btn.disabled) return;
            btn.disabled = true;
        }

        window.location.href = '{{ $testRoute }}' + '?assignment_id={{ $assignmentId }}';
    }
</script>
@endsection
