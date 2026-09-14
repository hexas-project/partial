<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Tests - Student Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fa;
        }

        .header {
            background: white;
            padding: 20px 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo img {
            height: 50px;
            width: auto;
        }

        .user-menu {
            position: relative;
        }

        .user-icon {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: #3b82f6;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 20px;
            transition: background 0.3s;
        }

        .user-icon:hover {
            background: #2563eb;
        }

        .dropdown-menu {
            position: absolute;
            top: 55px;
            right: 0;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            min-width: 200px;
            display: none;
            z-index: 1000;
        }

        .dropdown-menu.show {
            display: block;
        }

        .dropdown-item {
            padding: 12px 20px;
            color: #374151;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: background 0.2s;
            border-bottom: 1px solid #f3f4f6;
        }

        .dropdown-item:last-child {
            border-bottom: none;
        }

        .dropdown-item:hover {
            background: #f9fafb;
        }

        .dropdown-item.logout {
            color: #dc2626;
        }

        .dropdown-item.logout:hover {
            background: #fee;
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 40px;
        }

        .page-title {
            font-size: 24px;
            color: #2c3e50;
            margin-bottom: 30px;
            font-weight: 600;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .stat-icon {
            width: 70px;
            height: 70px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
        }

        .stat-card.pending .stat-icon {
            background: #dbeafe;
            color: #2563eb;
        }

        .stat-card.attempted .stat-icon {
            background: #ede9fe;
            color: #7c3aed;
        }

        .stat-card.expired .stat-icon {
            background: #fed7aa;
            color: #ea580c;
        }

        .stat-card.total .stat-icon {
            background: #d1fae5;
            color: #059669;
        }

        .stat-info h3 {
            font-size: 32px;
            font-weight: bold;
            color: #1f2937;
            margin-bottom: 5px;
        }

        .stat-info p {
            font-size: 16px;
            color: #6b7280;
            font-weight: 500;
        }

        .tests-table-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            overflow: hidden;
        }

        .tests-table {
            width: 100%;
            border-collapse: collapse;
        }

        .tests-table thead {
            background: #f9fafb;
        }

        .tests-table th {
            padding: 15px 20px;
            text-align: left;
            font-size: 14px;
            font-weight: 600;
            color: #374151;
            border-bottom: 2px solid #e5e7eb;
        }

        .tests-table td {
            padding: 15px 20px;
            font-size: 14px;
            color: #4b5563;
            border-bottom: 1px solid #f3f4f6;
        }

        .tests-table tbody tr:hover {
            background: #f9fafb;
        }

        .take-test-link {
            color: #2563eb;
            text-decoration: none;
            font-weight: 500;
        }

        .take-test-link:hover {
            text-decoration: underline;
        }

        /* ---- Student ID popup (Take Test chapar sathe sathe) ----
           Age Take Test click korlei sathe sathe server e request chole jeto —
           sob student ek sathe chapleo sob request ek sathe jeto. Ekhon age ei
           popup e ID nea hoy, request tar POR e jay. Student ra alada alada
           gotite type kore, tai request gulo nijei chhoriye jay.
           Dashboard e Bootstrap nei, tai popup ta nijeder CSS diye kora.
           Colour gula dashboard er blue (#2563eb) theke logo r accent porjonto —
           header gradient, gradient Next button, soft blue body. */
        .sid-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, .62);
            backdrop-filter: blur(3px);
            -webkit-backdrop-filter: blur(3px);
            z-index: 1050;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .sid-overlay.show {
            display: flex;
            animation: sidFade .18s ease-out;
        }

        @keyframes sidFade {
            from { opacity: 0; }
            to   { opacity: 1; }
        }

        @keyframes sidPop {
            from { opacity: 0; transform: translateY(14px) scale(.96); }
            to   { opacity: 1; transform: none; }
        }

        .sid-modal {
            background: #fff;
            border-radius: 18px;
            width: 100%;
            max-width: 430px;
            box-shadow: 0 24px 60px rgba(30, 41, 99, .35);
            overflow: hidden;
            animation: sidPop .22s cubic-bezier(.2, .8, .3, 1);
        }

        /* Rongin header — icon soho */
        .sid-modal h3 {
            margin: 0;
            padding: 20px 24px;
            font-size: 17px;
            font-weight: 600;
            color: #fff;
            background: linear-gradient(135deg, #2563eb 0%, #4f46e5 55%, #7c3aed 100%);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sid-modal h3 i {
            width: 34px;
            height: 34px;
            flex: none;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .2);
        }

        .sid-body {
            padding: 22px 24px;
            background: linear-gradient(180deg, #f5f8ff 0%, #ffffff 100%);
        }

        .sid-body p {
            margin: 0 0 16px;
            font-size: 14px;
            color: #475569;
            line-height: 1.55;
        }

        .sid-label {
            display: block;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .06em;
            color: #2563eb;
            margin-bottom: 8px;
        }

        .sid-input {
            width: 100%;
            padding: 12px 14px;
            font-size: 16px;
            color: #1e293b;
            background: #fff;
            border: 2px solid #dbe4f5;
            border-radius: 10px;
            outline: none;
            transition: border-color .2s, box-shadow .2s;
        }

        .sid-input::placeholder {
            color: #a5b4cf;
        }

        .sid-input:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 4px rgba(79, 70, 229, .15);
        }

        .sid-input.is-invalid {
            border-color: #dc2626;
            background: #fff5f5;
        }

        .sid-input.is-invalid:focus {
            box-shadow: 0 0 0 4px rgba(220, 38, 38, .15);
        }

        .sid-error {
            display: none;
            margin-top: 10px;
            padding: 8px 12px;
            font-size: 13px;
            font-weight: 500;
            color: #b91c1c;
            background: #fee2e2;
            border-left: 3px solid #dc2626;
            border-radius: 6px;
        }

        .sid-error.show {
            display: block;
        }

        .sid-footer {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            padding: 16px 24px 20px;
            background: #f5f8ff;
            border-top: 1px solid #e6ecfa;
        }

        .sid-btn {
            padding: 10px 22px;
            font-size: 14px;
            font-weight: 600;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: transform .15s, box-shadow .2s, background .2s, color .2s;
        }

        .sid-btn:active {
            transform: translateY(1px);
        }

        .sid-btn-cancel {
            background: #fff;
            color: #64748b;
            border: 1px solid #d8e0f0;
        }

        .sid-btn-cancel:hover {
            background: #eef2ff;
            color: #4f46e5;
            border-color: #c7d2fe;
        }

        .sid-btn-next {
            background: linear-gradient(135deg, #2563eb 0%, #4f46e5 60%, #7c3aed 100%);
            color: #fff;
            box-shadow: 0 6px 16px rgba(79, 70, 229, .35);
        }

        .sid-btn-next:hover {
            box-shadow: 0 8px 22px rgba(79, 70, 229, .45);
            filter: brightness(1.06);
        }

        .no-tests {
            text-align: center;
            padding: 60px 20px;
            color: #9ca3af;
        }

        .no-tests i {
            font-size: 64px;
            margin-bottom: 20px;
            opacity: 0.3;
        }

        .audio-player-container {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            margin-bottom: 30px;
            display: none;
        }

        .audio-player-container.show {
            display: block;
        }

        .audio-player-container h3 {
            font-size: 18px;
            color: #2c3e50;
            margin-bottom: 15px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .audio-player-container audio {
            width: 100%;
            outline: none;
        }

    </style>
</head>
<body>
    <div class="header">
        <div class="header-content">
            <div class="logo">
                <img src="{{ asset('images/new logo.png') }}" alt="Hexa's Zindabazar">
            </div>
            
            <div class="user-menu">
                <div class="user-icon" onclick="toggleDropdown()">
                    <i class="fas fa-user"></i>
                </div>
                <div class="dropdown-menu" id="userDropdown">
                    <div class="dropdown-item">
                        <i class="fas fa-user-circle"></i>
                        <span>{{ session('student_exam_name') }}</span>
                    </div>
                    <a href="{{ route('student.logout') }}" class="dropdown-item logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h2 class="page-title">My Tests</h2>

        @php
            $pendingCount = 0;
            $attemptedCount = 0;
            $expiredCount = 0; // Always 0 as per requirement
            $totalCount = 0; // Always 0 as per requirement
            
            $now = \Carbon\Carbon::now('Asia/Dhaka');
            
            foreach($assignments as $assignment) {
                $startDate = \Carbon\Carbon::parse($assignment->start_date, 'Asia/Dhaka');
                $closingDate = \Carbon\Carbon::parse($assignment->closing_date, 'Asia/Dhaka');
                
                if ($now->lessThan($startDate)) {
                    // Not started yet - count as pending
                    $pendingCount++;
                } elseif ($now->greaterThanOrEqualTo($startDate) && $now->lessThanOrEqualTo($closingDate)) {
                    // Currently active - count as attempted
                    $attemptedCount++;
                }
                // Expired tests are not counted (expiredCount stays 0)
            }
        @endphp

        <!-- Stats Cards -->
        <div class="stats-grid">
            <div class="stat-card pending">
                <div class="stat-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $pendingCount }}</h3>
                    <p>Pending</p>
                </div>
            </div>

            <div class="stat-card attempted">
                <div class="stat-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $attemptedCount }}</h3>
                    <p>Attempted</p>
                </div>
            </div>

            <div class="stat-card expired">
                <div class="stat-icon">
                    <i class="fas fa-tags"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $expiredCount }}</h3>
                    <p>Expired</p>
                </div>
            </div>

            <div class="stat-card total">
                <div class="stat-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $totalCount }}</h3>
                    <p>Total</p>
                </div>
            </div>
        </div>

        <!-- Audio Player for Listening Tests -->
        <div class="audio-player-container" id="audioPlayerContainer">
            <h3>
                <i class="fas fa-headphones"></i>
                Headphone Check
            </h3>
            <audio controls controlsList="nodownload">
                <source src="{{ asset('audio/Listening-check.mp3') }}" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
        </div>

        <!-- Tests Table -->
        <div class="tests-table-container">
            @if(count($assignments) > 0)
                <table class="tests-table">
                    <thead>
                        <tr>
                            <th>Test Name</th>
                            <th>Start Date</th>
                            <th>Due Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="testsTableBody">
                        @php
                            $hasActiveTests = false;
                        @endphp
                        @foreach($assignments as $assignment)
                            @php
                                $startDate = \Carbon\Carbon::parse($assignment->start_date, 'Asia/Dhaka');
                                $closingDate = \Carbon\Carbon::parse($assignment->closing_date, 'Asia/Dhaka');
                                
                                // Skip expired tests (don't show in table)
                                if ($now->greaterThan($closingDate)) {
                                    continue;
                                }
                                
                                $hasActiveTests = true;
                                
                                $isPending = false;
                                if ($now->lessThan($startDate)) {
                                    $canTake = false;
                                    $isPending = true;
                                } elseif ($now->greaterThanOrEqualTo($startDate) && $now->lessThanOrEqualTo($closingDate)) {
                                    $canTake = true;
                                } else {
                                    $canTake = false;
                                }
                            @endphp
                            <tr data-assignment-id="{{ $assignment->id }}" 
                                data-start="{{ $assignment->start_date }}" 
                                data-closing="{{ $assignment->closing_date }}"
                                data-category="{{ $assignment->test_category }}"
                                data-test-id="{{ $assignment->test_id }}">
                                <td>{{ $assignment->test_name }}</td>
                                <td>{{ $startDate->format('M d, Y h:i A') }}</td>
                                <td>{{ $closingDate->format('M d, Y h:i A') }}</td>
                                <td>
                                    @if($canTake)
                                        <a href="#" class="take-test-link" onclick="takeTest({{ $assignment->id }}, '{{ $assignment->test_category }}', {{ $assignment->test_id }}); return false;">
                                            Take Test
                                        </a>
                                    @elseif($isPending)
                                        <span style="color: #3b82f6;">Upcoming</span>
                                    @else
                                        <span style="color: #9ca3af;">Not Available</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        @if(!$hasActiveTests)
                            <tr class="no-tests-row">
                                <td colspan="4" class="no-tests">
                                    <i class="fas fa-inbox"></i>
                                    <h3>No Tests Available</h3>
                                    <p>You don't have any active tests at the moment.</p>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            @else
                <div class="no-tests">
                    <i class="fas fa-inbox"></i>
                    <h3>No Tests Assigned</h3>
                    <p>You don't have any tests assigned yet. Please check back later.</p>
                </div>
            @endif
        </div>
    </div>

    @php
        // test_id → audio ফাইল। BackendController::testConfirmation() এর $listeningRoutes আর
        // প্রতিটা listening blade এর audio মিলিয়ে তৈরি। নতুন listening test যোগ হলে এখানেও
        // একটা লাইন যোগ করতে হবে, নইলে ওই test prefetch হবে না (কিন্তু কিছু ভাঙবেও না —
        // sw.js তখন player এর request থেকেই cache ভরে নেবে)।
        $hxListeningAudio = [
            1  => 'audio/101audio.MP3',
            2  => 'audio/102.MP3',
            3  => 'audio/103partial.mp3',
            4  => 'audio/Partial104.mp3',
            5  => 'audio/105.MP3',
            6  => 'audio/106.MP3',
            7  => 'audio/107.MP3',
            8  => 'audio/108.MP3',
            9  => 'audio/109.MP3',
            10 => 'audio/110.MP3',
            49 => 'audio/111main.MP3',
            50 => 'audio/112main.MP3',
        ];

        // যে listening test গুলো এখনো expire করেনি সেগুলোর audio আগেভাগে নামানো হবে।
        // একসাথে অনেকগুলো ৪০ MB ফাইল টানলে হিতে বিপরীত, তাই due date এর ক্রমে সর্বোচ্চ ২টা।
        $hxPrefetch = [];
        foreach ($assignments as $hxA) {
            if (($hxA->test_category ?? '') !== 'Academic_Listening') continue;
            if ($now->greaterThan(\Carbon\Carbon::parse($hxA->closing_date, 'Asia/Dhaka'))) continue;
            $hxFile = $hxListeningAudio[$hxA->test_id] ?? null;
            if ($hxFile) $hxPrefetch[] = asset($hxFile);
        }
        $hxPrefetch = array_slice(array_values(array_unique($hxPrefetch)), 0, 2);
    @endphp

    <!-- Student ID popup — Take Test chaple ei ta khole, ID neowar POR e server e jay -->
    <div class="sid-overlay" id="sidOverlay" role="dialog" aria-modal="true" aria-labelledby="sidTitle">
        <div class="sid-modal">
            <h3 id="sidTitle"><i class="fas fa-id-card"></i> Enter your Student ID</h3>
            <div class="sid-body">
                <p>Please enter your Student ID and click Next to open your test.</p>
                <label class="sid-label" for="sidInput">STUDENT ID</label>
                <input type="text" id="sidInput" class="sid-input" placeholder="Enter your Student ID"
                    autocomplete="off" inputmode="text" maxlength="12">
                <div class="sid-error" id="sidError">Student ID must be at least 8 characters (letters and numbers only)</div>
            </div>
            <div class="sid-footer">
                <button type="button" class="sid-btn sid-btn-cancel" id="sidCancel">Cancel</button>
                <button type="button" class="sid-btn sid-btn-next" id="sidNext">Next</button>
            </div>
        </div>
    </div>

    <script>
        // ---------- LISTENING AUDIO PREFETCH ----------
        // student এই পেজে থাকতেই (headphone check শোনা, ডেট দেখা) background এ পুরো audio
        // নেমে যায়। Take Test চাপলে তখন listening page টা cache থেকেই audio পায় — server এ
        // একটাও request যায় না, আর test এর মাঝে net গেলেও audio থামে না।
        // কোনো UI নেই; নামা শেষ না হলেও সমস্যা নেই, sw.js তখন player এর download টাকেই
        // cache এ জমায় (দুবার নামে না)।
        (function () {
            var files = @json($hxPrefetch);
            if (!files.length || !('serviceWorker' in navigator)) return;

            // ৩০-৪০ MB এর entry যাতে ব্রাউজার জায়গার অভাবে মুছে না ফেলে
            try {
                if (navigator.storage && navigator.storage.persist) navigator.storage.persist();
            } catch (e) {}

            navigator.serviceWorker.register('/sw.js', { scope: '/' }).catch(function () {});
            navigator.serviceWorker.ready.then(function (reg) {
                if (!reg.active) return;
                files.forEach(function (url) {
                    reg.active.postMessage({ type: 'hx-prefetch-audio', url: url });
                });
            }).catch(function () {});
        })();

        // Toggle dropdown menu
        function toggleDropdown() {
            const dropdown = document.getElementById('userDropdown');
            dropdown.classList.toggle('show');
        }

        // Close dropdown when clicking outside
        window.onclick = function(event) {
            if (!event.target.matches('.user-icon') && !event.target.closest('.user-icon')) {
                const dropdown = document.getElementById('userDropdown');
                if (dropdown && dropdown.classList.contains('show')) {
                    dropdown.classList.remove('show');
                }
            }
        }

        // ---------- TAKE TEST → STUDENT ID POPUP ----------
        // Age Take Test click korlei sathe sathe server e request cholе jeto. Ekhon
        // age ei popup e Student ID nea hoy, tarpor navigate kora hoy — tai 30 jon
        // ek sathe chapleo request gula type korar somoy onujayi chhoriye jay.
        //
        // Rule: 8-12 character, sudhu letter ar number.
        //   - {8,} — 42 ta test page e ei rule-i ache (/^[a-zA-Z0-9]{8,}$/)
        //   - max 12 — listeningEight.blade.php e 8-12 er rule ache
        // Duita mile ei intersection ta nile SOB test page ID ta accept korbe,
        // tai kono page e giye student atke jabe na.
        var SID_RULE = /^[a-zA-Z0-9]{8,12}$/;
        var sidPendingUrl = null;

        function sidEls() {
            return {
                overlay: document.getElementById('sidOverlay'),
                input: document.getElementById('sidInput'),
                error: document.getElementById('sidError')
            };
        }

        function takeTest(assignmentId, category, testId) {
            var el = sidEls();
            sidPendingUrl = '/test/confirm/' + assignmentId + '/' + category + '/' + testId;

            // Popup ta na thakle (blade purono cache) purono behaviour e fire jay —
            // student kokhono atke thakbe na.
            if (!el.overlay || !el.input) {
                window.location.href = sidPendingUrl;
                return;
            }

            // Ghor ta SOB SOMOY faka thake — ekjon student ekbar-i test dey, tai age
            // er ID bosiye rakhle labh nei, boro cheye ekii PC te porer student er
            // test e bhule agher jon er ID submit hoye jawar jhuki thake.
            el.input.value = '';

            el.input.classList.remove('is-invalid');
            el.error.classList.remove('show');
            el.overlay.classList.add('show');
            el.input.focus();
        }

        function sidClose() {
            var el = sidEls();
            if (el.overlay) el.overlay.classList.remove('show');
            sidPendingUrl = null;
        }

        function sidSubmit() {
            var el = sidEls();
            var value = (el.input.value || '').trim();

            if (!SID_RULE.test(value)) {
                el.input.classList.add('is-invalid');
                el.error.classList.add('show');
                el.input.focus();
                return;
            }

            // Test page er modal ei key theke ID pore (disable-find.js), tai ekhaneo
            // hubohu ekii key use kora hoyeche.
            try { sessionStorage.setItem('examStudentId', value); } catch (e) {}

            if (sidPendingUrl) window.location.href = sidPendingUrl;
        }

        document.addEventListener('DOMContentLoaded', function () {
            var next = document.getElementById('sidNext');
            var cancel = document.getElementById('sidCancel');
            var input = document.getElementById('sidInput');

            if (next) next.addEventListener('click', sidSubmit);
            if (cancel) cancel.addEventListener('click', sidClose);

            if (input) {
                input.addEventListener('keydown', function (e) {
                    if (e.key === 'Enter') { e.preventDefault(); sidSubmit(); }
                    if (e.key === 'Escape') sidClose();
                });
                // Type korte suru korlei lal error ta sore jay
                input.addEventListener('input', function () {
                    input.classList.remove('is-invalid');
                    document.getElementById('sidError').classList.remove('show');
                });
            }

            // Ekii PC te porer student jate agher jon er ID na paay
            document.querySelectorAll('a[href*="/student/logout"]').forEach(function (a) {
                a.addEventListener('click', function () {
                    try { sessionStorage.removeItem('examStudentId'); } catch (e) {}
                });
            });
        });

        // Auto-update test status and stats cards without page reload
        function updateTestStatus() {
            const now = new Date();
            const rows = document.querySelectorAll('#testsTableBody tr');
            
            let pendingCount = 0;
            let attemptedCount = 0;
            let expiredCount = 0;
            let visibleCount = 0;
            
            rows.forEach(row => {
                const startDate = new Date(row.dataset.start);
                const closingDate = new Date(row.dataset.closing);
                const actionCell = row.querySelector('td:last-child');
                const category = row.dataset.category;
                const testId = row.dataset.testId;
                const assignmentId = row.dataset.assignmentId;
                
                let canTake = false;
                let status = '';
                
                // Determine status
                if (now < startDate) {
                    status = 'pending';
                    pendingCount++;
                    visibleCount++;
                } else if (now >= startDate && now <= closingDate) {
                    status = 'attempted';
                    attemptedCount++;
                    canTake = true;
                    visibleCount++;
                } else {
                    status = 'expired';
                    expiredCount++;
                }
                
                // Update action cell if status changed
                if (canTake && !actionCell.querySelector('.take-test-link')) {
                    actionCell.innerHTML = `<a href="#" class="take-test-link" onclick="takeTest(${assignmentId}, '${category}', ${testId}); return false;">Take Test</a>`;
                } else if (!canTake && actionCell.querySelector('.take-test-link')) {
                    actionCell.innerHTML = '<span style="color: #9ca3af;">Not Available</span>';
                }
            });
        }

        // Check if there are any active Listening tests and show audio player
        function checkListeningTests() {
            const rows = document.querySelectorAll('#testsTableBody tr');
            let hasActiveListeningTest = false;
            const now = new Date();
            
            rows.forEach(row => {
                const category = row.dataset.category;
                const closingDate = new Date(row.dataset.closing);
                
                // Check if it's a Listening test and not expired
                if (category && category.includes('Listening') && now <= closingDate) {
                    hasActiveListeningTest = true;
                }
            });
            
            const audioContainer = document.getElementById('audioPlayerContainer');
            const audioElement = audioContainer ? audioContainer.querySelector('audio') : null;
            
            if (hasActiveListeningTest && audioContainer) {
                audioContainer.classList.add('show');
            } else if (audioContainer) {
                // Pause audio before hiding
                if (audioElement && !audioElement.paused) {
                    audioElement.pause();
                    audioElement.currentTime = 0;
                }
                audioContainer.classList.remove('show');
            }
        }

        // Check status every 10 seconds
        setInterval(function() {
            updateTestStatus();
            checkListeningTests();
        }, 10000);
        
        // Also check on page load
        document.addEventListener('DOMContentLoaded', function() {
            updateTestStatus();
            checkListeningTests();
        });
    </script>
</body>
</html>
