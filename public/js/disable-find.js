// ==================== AUDIO SERVICE WORKER ====================
// sw.js listening audio কে Cache এ রেখে দেয়, তাই test চলাকালীন net গেলেও audio চলতে থাকে।
// এখানে শুধু register করা হয় — বাকি সব sw.js নিজেই সামলায়, blade গুলোতে হাত দিতে হয় না।
// SW শুধু https বা localhost এ চলে; না চললে কিছু ভাঙে না, audio আগের মতোই network থেকে আসে।
(function () {
    if (!('serviceWorker' in navigator)) return;
    try {
        navigator.serviceWorker.register('/sw.js', { scope: '/' }).catch(function () {});
    } catch (e) {}
})();

// ==================== START MODAL: DASHBOARD থেকে আসা STUDENT ID ====================
// Dashboard এ Take Test চাপলে এখন আগে একটা popup এ Student ID নেওয়া হয়, তারপর server
// এ request যায় — এতে সবাই একসাথে চাপলেও request গুলো টাইপ করার সময় অনুযায়ী ছড়িয়ে যায়।
//
// ID টা sessionStorage.examStudentId তে বসে আসে। এখানে সেটা test page এর start modal
// এর input এ বসিয়ে input টা লুকিয়ে দেওয়া হয় — student আর দ্বিতীয়বার টাইপ করে না,
// শুধু OK চাপে, আর তারপর timer/audio/fullscreen হুবহু আগের মতোই চলে।
//
// ⚠️ input টা DOM থেকে সরানো হয় না, শুধু আড়াল করা হয়। কারণ ৫০টা blade এর নিজের
// startTestButton handler ওই input এর value পড়ে validate করে। value আগেই বসানো
// থাকলে ওদের কোডে এক লাইনও হাত না দিয়ে সব আগের মতো কাজ করে।
(function () {
    if (!/\/(listening|reading|writing)\//.test(window.location.pathname)) return;

    // blade ভেদে input এর id আলাদা — তিন রকমই দেখা হয়
    var INPUT_IDS = ['studentIdInput', 'modal_student_id', 'student_id_input'];
    var ERROR_IDS = ['studentIdError', 'student_id_error'];

    // Dashboard এর rule এর সাথে হুবহু এক। এর বাইরে হলে (যেমন পুরোনো tab এ ১৫ অক্ষরের
    // ID পড়ে আছে) input লুকানো হয় না — কারণ listeningEight এ ৮-১২ এর সীমা আছে, লুকিয়ে
    // দিলে ওই page এ OK চেপেও কিছু হতো না, student আটকে যেত।
    var SAFE_RULE = /^[a-zA-Z0-9]{8,12}$/;

    function apply() {
        var stored = '';
        try { stored = (sessionStorage.getItem('examStudentId') || '').trim(); } catch (e) {}
        if (!stored) return;   // সরাসরি URL/নতুন tab — আগের মতোই input দেখাবে

        // hidden field (submit এ এটাই server এ যায়)
        var hidden = document.getElementById('examStudentIdField');
        if (hidden && !hidden.value) hidden.value = stored;

        var input = null;
        for (var i = 0; i < INPUT_IDS.length; i++) {
            var el = document.getElementById(INPUT_IDS[i]);
            if (el) { input = el; break; }
        }
        if (!input) return;    // start modal এ ID input নেই এমন page — কিছু করার নেই

        input.value = stored;
        try { input.dispatchEvent(new Event('input', { bubbles: true })); } catch (e) {}

        if (!SAFE_RULE.test(stored)) return;   // নিরাপদে আগের আচরণে ফিরে যায়

        // ---- ID এর ঘরটা পুরো আড়াল ----
        // Student dashboard এই ID দিয়ে এসেছে, তাই এখানে আর কিছু দেখানোর দরকার নেই।
        // modal এ শুধু এক লাইন লেখা আর START TEST button থাকে।
        var wrap = input.closest('.student-id-card, .form-group, .mb-3') || input.parentElement;
        if (!wrap || wrap.classList.contains('modal-body')) wrap = input;   // guard: পুরো body লুকিয়ে ফেলা যাবে না
        wrap.style.display = 'none';

        ERROR_IDS.forEach(function (id) {
            var e = document.getElementById(id);
            if (e) e.style.display = 'none';
        });

        // ঘরটা চলে যাওয়ায় modal এ শুধু এক লাইন থাকে — সেটা যেন ফাঁকা না দেখায়,
        // তাই লেখাটা একটু বড় করে মাঝে বসানো হয়।
        var note = document.querySelector('#startModal .instruction-text');
        if (note) {
            note.textContent = 'Click OK to begin your test.';
            note.style.cssText = 'text-align:center;font-size:16px;color:#374151;margin:6px 0 2px;';
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', apply);
    } else {
        apply();
    }
})();

// ==================== RESUME: SAVE TIME + AUDIO ====================
(function () {
    var path = window.location.pathname;
    if (!/\/(listening|reading|writing|speaking)\//.test(path)) return;

    // assignmentId blade থেকে আসে — key আলাদা রাখে প্রতিটা assignment এর জন্য
    // reading/writing এ blade var না থাকলে URL এর assignment_id থেকে নেয়, যাতে আগের
    // অন্য assignment এর পুরোনো entry এর সাথে key collide না করে
    var _aidVal = window._hxAssignmentId;
    if (!_aidVal && (path.indexOf('/reading/') !== -1 || path.indexOf('/writing/') !== -1)) {
        try { _aidVal = new URLSearchParams(window.location.search).get('assignment_id'); } catch (e) {}
    }
    var _aid = _aidVal ? ('_' + _aidVal) : '';
    var BASE_KEY = 'hx_resume_' + path + _aid;
    var isListening = path.includes('/listening/');

    // ---------- STUDENT IDENTITY ----------
    // assignment_id ব্যাচ অনুযায়ী (batch_id + test_id), student অনুযায়ী নয় — তাই শুধু
    // path + assignment_id দিয়ে key বানালে এক ব্যাচের সব student এর state এক হয়ে যেত:
    // একজন সময় বাকি রেখে বেরিয়ে গেলে ওই PC তে পরের student ওর বাকি সময়টাই পেত।
    // start modal এ টাইপ করা Student ID-ই একমাত্র per-student পরিচয়, তাই সেটা key তে যোগ হয়।
    //
    // ID না পেলে (যেসব page এ start modal নেই — speaking, কিছু GT reading/writing)
    // আগের মতোই BASE_KEY ব্যবহার হয় — ওই page গুলোর আচরণ অপরিবর্তিত থাকে।
    function hxStudentId() {
        var v = '';
        try { v = sessionStorage.getItem('examStudentId') || ''; } catch (e) {}
        if (!v) {
            // blade ভেদে ID কখনো hidden field এ, কখনো modal input এ বসে — দুটোই দেখা হয়
            var ids = ['examStudentIdField', 'studentIdInput', 'modal_student_id', 'student_id_input'];
            for (var i = 0; i < ids.length; i++) {
                var el = document.getElementById(ids[i]);
                if (el && el.value && el.value.trim()) { v = el.value.trim(); break; }
            }
        }
        v = String(v || '').trim();
        // key তে বসবে বলে separator (_) আর whitespace সরিয়ে নিরাপদ করা হয়
        return v ? v.replace(/[^a-zA-Z0-9]/g, '') : '';
    }
    function hxKey() {
        var sid = hxStudentId();
        return sid ? (BASE_KEY + '_' + sid) : BASE_KEY;
    }
    // blade গুলো নিজেরাও localStorage পড়ে (audio resume) — তারা যেন সবসময় একই key দেখে
    try {
        Object.defineProperty(window, '_hxResumeKey', { configurable: true, get: hxKey });
    } catch (e) { window._hxResumeKey = BASE_KEY; }

    // ---------- পুরোনো page-নির্দিষ্ট key মুছে ফেলা ----------
    // listeningSeven এর নিজস্ব 'listeningSeven_progress' key টা তুলে দেওয়া হয়েছে (ওটা
    // path/assignment/student কিছুই আলাদা করত না, ২৪ ঘণ্টা টিকত)। যেসব PC তে ওটা এখনো
    // পড়ে আছে সেখান থেকে একবার মুছে দেওয়া হয়, নইলে শুধু জমে থাকত।
    try { localStorage.removeItem('listeningSeven_progress'); } catch (e) {}

    // ---------- STATE FORMAT: PAUSED CLOCK ----------
    // remainingSeconds = কত সময় বাকি (deadline নয়)। test থেকে বেরিয়ে থাকলে ঘড়ি থেমে
    // থাকে, তাই ফিরে এসে timer আর audio ঠিক একই জায়গা থেকে শুরু হয় — ১০ মিনিট দিয়ে
    // tab বন্ধ/current চলে গেলে পরে এসে ওই ১০ মিনিট থেকেই চলবে।
    //
    // আগের format এ endTimestamp (deadline) থাকত। deploy এর সময় যাদের browser এ পুরোনো
    // entry পড়ে আছে তাদের জন্য একবার convert করে নেওয়া হয়, নইলে ওই test গুলো resume হারাত।
    function hxReadState(raw) {
        var v = null;
        try { v = JSON.parse(raw); } catch (e) {}
        if (!v) return null;
        if (typeof v.remainingSeconds !== 'number') {
            if (typeof v.endTimestamp !== 'number') return null;
            v = {
                remainingSeconds: Math.max(0, Math.floor((v.endTimestamp - Date.now()) / 1000)),
                audioTime: v.audioTime || 0,
                savedAt: Date.now()
            };
        }
        return v;
    }
    function hxLoadState() {
        try { return hxReadState(localStorage.getItem(hxKey())); } catch (e) { return null; }
    }
    // পুরোনো format পেলে সাথে সাথেই নতুন format এ লিখে রাখা হয়, যাতে blade এর audio-resume
    // কোড (যেটা নিজে localStorage পড়ে) সবসময় একই format দেখে।
    (function () {
        try {
            var k = hxKey();
            var raw = localStorage.getItem(k);
            if (raw && raw.indexOf('remainingSeconds') === -1) {
                var conv = hxReadState(raw);
                if (conv && conv.remainingSeconds > 0) localStorage.setItem(k, JSON.stringify(conv));
                else localStorage.removeItem(k);
            }
        } catch (e) {}
    })();

    // ---------- SERVER-SIDE RESUME (cross-device / power-loss) ----------
    // localStorage শুধু ওই browser এই থাকে — অন্য PC তে বা current চলে গিয়ে আবার
    // login করলে পাওয়া যায় না। তাই একই remainingSeconds + audioTime server এও রাখা হয়।
    function hxCsrf() {
        var el = document.querySelector('input[name="_token"]');
        if (el) return el.value;
        var m = document.querySelector('meta[name="csrf-token"]');
        return m ? m.getAttribute('content') : '';
    }
    // Server POST প্রতি ৫ সেকেন্ডে না পাঠিয়ে ~২০ সেকেন্ডে throttle করা হয় (server load কম)।
    // localStorage তবু ৫ সেকেন্ডেই লেখে — same-device resume এর নির্ভুলতা অক্ষত।
    // force=true (পেজ বন্ধ হওয়ার সময়) হলে throttle উপেক্ষা করে শেষ অবস্থা পাঠায়।
    var _lastServerSave = 0;
    var SERVER_SAVE_MS = 20000;
    function serverSaveProgress(remainingSecs, audio, force) {
        try {
            var now = Date.now();
            if (!force && (now - _lastServerSave) < SERVER_SAVE_MS) return;
            _lastServerSave = now;
            fetch('/test-progress/save', {
                method: 'POST', credentials: 'same-origin', keepalive: true,
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': hxCsrf(), 'Accept': 'application/json' },
                body: JSON.stringify({ path: path, assignment_id: _aidVal || null, exam_student_id: hxStudentId(), remaining_ms: Math.round(remainingSecs * 1000), audio_time: audio })
            }).catch(function () {});
        } catch (e) {}
    }
    function serverClearProgress() {
        try {
            fetch('/test-progress/clear', {
                method: 'POST', credentials: 'same-origin', keepalive: true,
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': hxCsrf(), 'Accept': 'application/json' },
                body: JSON.stringify({ path: path, assignment_id: _aidVal || null, exam_student_id: hxStudentId() })
            }).catch(function () {});
        } catch (e) {}
    }
    // localStorage খালি (cross-device / নতুন browser) হলে server থেকে এনে localStorage এ
    // বসিয়ে রাখা হয় — এতে নিচের বিদ্যমান resume পথ অপরিবর্তিত থাকে, শুধু state টা চলে আসে।
    //
    // server এর row-ও এখন Student ID ধরে আলাদা, তাই ID না জেনে fetch করলে ভুল student এর
    // state আসতে পারত। তাই দুই সময়ে চেষ্টা হয়:
    //   ১. page load — ওই tab এ আগেই ID দেওয়া থাকলে (refresh / back করে আসা)
    //   ২. modal এ ID টাইপ করার সাথে সাথে — Start চাপার আগেই localStorage এ বসে যায়
    // Start এর click এ fetch করা যেত না: fullscreen এর user-gesture ভেঙে যেত।
    var _srvTried = {};
    function serverFetchProgress(sid, allowReload) {
        try {
            var key = sid ? (BASE_KEY + '_' + sid) : BASE_KEY;
            var doneKey = 'hx_srv_resume_done_' + key;
            if (_srvTried[key]) return;
            _srvTried[key] = true;
            try { if (sessionStorage.getItem(doneKey)) return; } catch (e) {}
            var cur = hxReadState(localStorage.getItem(key));
            if (cur && cur.remainingSeconds > 5) return;   // same-device fast path — server লাগবে না
            var url = '/test-progress/get?path=' + encodeURIComponent(path) +
                (_aidVal ? ('&assignment_id=' + encodeURIComponent(_aidVal)) : '') +
                '&exam_student_id=' + encodeURIComponent(sid || '');
            fetch(url, { credentials: 'same-origin', headers: { 'Accept': 'application/json' } })
                .then(function (r) { return r.json(); })
                .then(function (d) {
                    try { sessionStorage.setItem(doneKey, '1'); } catch (e) {}
                    if (d && d.remaining_ms > 5000) {
                        localStorage.setItem(key, JSON.stringify({
                            remainingSeconds: Math.floor(d.remaining_ms / 1000),
                            audioTime: d.audio_time || 0,
                            savedAt: Date.now(),
                            sid: sid || ''
                        }));
                        // page load এর বেলায় আগের মতোই একবার reload, যাতে blade এর audio-resume
                        // কোডও নতুন state টা দেখে। ID টাইপের বেলায় reload করা যাবে না — modal
                        // খোলা, টাইপ করা ID মুছে যেত; ওখানে state বসিয়ে রাখাই যথেষ্ট।
                        if (allowReload) location.reload();
                    }
                })
                .catch(function () { try { sessionStorage.setItem(doneKey, '1'); } catch (e) {} });
        } catch (e) {}
    }
    // এই স্ক্রিপ্ট <head> এ চলে, তখন startModal এখনো DOM এ নেই — তাই "modal আছে কিনা"
    // দেখা এবং listener বসানো দুটোই DOMContentLoaded এ।
    document.addEventListener('DOMContentLoaded', function () {
        try {
            var sm = document.getElementById('startModal');

            // ১. page load: ওই tab এ আগেই ID দেওয়া থাকলে (refresh / back করে আসা)
            var sid = hxStudentId();
            if (sid) {
                serverFetchProgress(sid, true);
            } else if (!sm) {
                // start modal নেই এমন page (speaking, কিছু GT reading/writing) — ওখানে
                // per-student পরিচয় পাওয়ার উপায়ই নেই, তাই আগের মতোই ID ছাড়া
                serverFetchProgress('', true);
            }

            // ২. modal এ ID টাইপ হলে আগেভাগেই server state এনে রাখা হয় (debounce করে)
            if (!sm) return;
            var t = null;
            sm.addEventListener('input', function () {
                var typed = hxStudentId();
                if (!typed || typed.length < 8) return;
                if (t) clearTimeout(t);
                t = setTimeout(function () { serverFetchProgress(typed, false); }, 400);
            });
        } catch (e) {}
    });

    // ---------- STALE ENTRY CLEANUP ----------
    // ঘড়ি এখন pause হয় বলে "deadline পেরিয়ে গেছে" দিয়ে আর মোছা যায় না — সময় বাকি থাকা
    // entry অনির্দিষ্টকাল বসে থাকতে পারত। তাই দুটো শর্তে মোছা হয়: সময় ফুরিয়ে গেছে,
    // অথবা entry টা অনেক পুরোনো (৩০ দিন) — assignment এর closing date এমনিতেই আসল সীমা,
    // এটা শুধু localStorage জমতে না দেওয়ার জন্য।
    //
    // যেসব entry তে sid নেই সেগুলো হয় এই fix এর আগের পুরোনো entry, নয়তো ID-হীন page এর —
    // ওগুলো কোন student এর তা জানার উপায় নেই, তাই ওদের সীমা একই দিন। এতে "কাল যে সময়
    // বাকি রেখে গিয়েছিল আজ পরের student সেটা পাচ্ছে" — সমস্যাটা ওখানেও বন্ধ হয়।
    (function () {
        try {
            var MAX_AGE = 30 * 24 * 60 * 60 * 1000;
            var now = Date.now();
            var today = new Date().toDateString();
            for (var i = localStorage.length - 1; i >= 0; i--) {
                var k = localStorage.key(i);
                if (!k || k.indexOf('hx_resume_') !== 0) continue;
                var v = hxReadState(localStorage.getItem(k));
                var stale = !v || !(v.remainingSeconds > 0) || (v.savedAt && now - v.savedAt > MAX_AGE);
                if (!stale && !v.sid) {
                    stale = !v.savedAt || new Date(v.savedAt).toDateString() !== today;
                }
                if (stale) localStorage.removeItem(k);
            }
        } catch (e) {}
    })();

    function getTimerSeconds() {
        var el = document.getElementById('timer');
        if (!el) return 0;
        var m = el.textContent.match(/(\d+)\s*[:\s]+\s*(\d+)/);
        return m ? parseInt(m[1]) * 60 + parseInt(m[2]) : 0;
    }

    function getAudioTime() {
        if (!isListening || !window._hxAudio) return 0;
        return window._hxAudio.currentTime || 0;
    }

    var submitted = false;
    function saveState(flush) {
        if (submitted) return;   // আসল submit হয়ে গেলে beforeunload আর re-save করবে না
        if (window.__hxSeekPending) return;   // audio এখনো আগের জায়গায় পৌঁছায়নি — ভুল position save করা যাবে না
        var secs = getTimerSeconds();
        var audio = getAudioTime();
        if (isListening) {
            if (secs <= 0 || audio <= 0) return;
        } else {
            if (secs <= 0) return;
            // reading/writing: test শুরুর আগে (start modal খোলা অবস্থায়) save করব না।
            // না হলে modal এ বসে থাকার সময়ই full-time entry জমে যায়, যা পরে আবার পেজ
            // খুললে timer ছোট করে দেয়। modal hide হওয়া = test সত্যিই শুরু হয়েছে।
            if (path.indexOf('/reading/') !== -1 || path.indexOf('/writing/') !== -1) {
                var sm = document.getElementById('startModal');
                if (sm && sm.classList.contains('show')) return;
            }
        }
        localStorage.setItem(hxKey(), JSON.stringify({
            remainingSeconds: secs,
            audioTime: audio,
            savedAt: Date.now(),
            sid: hxStudentId()
        }));
        serverSaveProgress(secs, audio, flush === true);   // cross-device resume এর জন্য server এও
    }

    setInterval(saveState, 5000);
    // পেজ বন্ধ হওয়ার সময় throttle উপেক্ষা করে শেষ অবস্থা server এ পাঠানো হয়
    window.addEventListener('beforeunload', function () { saveState(true); });

    // আসল submit হলে (event বা programmatic দুই পথেই) key clear — resume আর লাগবে না।
    // programmatic auto-submit গুলো (Continue / time's-up / extra time) form.submit() ডাকে,
    // ওতে submit event fire হয় না। আগে শুধু form instance এর submit মোড়ানো হতো, কিন্তু
    // LISTENING EXTRA TIME module পরে testForm.submit আবার সেট করে ওই মোড়ক চাপা দিত এবং
    // HTMLFormElement.prototype.submit.call() দিয়ে সরাসরি native এ যেত — তাই prototype-ই
    // patch করা হলো, এতে কোনো পথেই clear বাদ যায় না।
    function clearKey() {
        submitted = true;
        try { localStorage.removeItem(hxKey()); } catch (e) {}
        serverClearProgress();
        // highlight/note persistence module কেও জানানো হয় — submit মানে test শেষ
        try { document.dispatchEvent(new Event('hx-test-submitted')); } catch (e) {}
    }
    document.addEventListener('submit', clearKey, true);
    var _protoSubmit = HTMLFormElement.prototype.submit;
    HTMLFormElement.prototype.submit = function () {
        clearKey();
        return _protoSubmit.apply(this, arguments);
    };

    // ---------- AUDIO NETWORK RECOVERY ----------
    // wifi চলে গেলে audio এর error event হয় এবং HTML5 audio নিজে থেকে আর ফেরে না —
    // load() + seek + play() আবার ডাকতে হয়। নেট ফিরলে যাতে ঠিক আগের position থেকেই
    // আবার বাজে, তার ব্যবস্থা। timer এ হাত দেওয়া হয় না — সময় আগের মতোই চলতে থাকে।
    //
    // blade গুলো window._hxAudio এ audio বসায়, তাই ওখানে setter পেতে দিলেই ১২টা blade এর
    // একটাও বদলাতে হয় না। আমাদের কোড পরে চললে আগেই বসানো থাকতে পারে — দুই ক্ষেত্রেই ধরা হয়।
    if (isListening) (function () {
        var RETRY_MIN = 2000, RETRY_MAX = 15000, STALL_MS = 20000;

        function guard(a) {
            if (!a || a.__hxNetGuard) return;
            a.__hxNetGuard = true;

            // error এর পর currentTime প্রায়ই ০ হয়ে যায় — তাই শেষ ভালো position আলাদা রাখা
            var lastGood = a.currentTime || 0;
            var ourPending = false, recovering = false, tries = 0, retryTimer = null, stallTimer = null;

            a.addEventListener('timeupdate', function () {
                if (!recovering && !a.seeking && a.currentTime > 0) lastGood = a.currentTime;
            });

            function done() {
                recovering = false; tries = 0;
                if (ourPending) { ourPending = false; window.__hxSeekPending = false; }
            }

            function bufferedCovers(t) {
                try {
                    for (var i = 0; i < a.buffered.length; i++) {
                        if (a.buffered.start(i) <= t && t <= a.buffered.end(i)) return true;
                    }
                } catch (e) {}
                return false;
            }

            function attempt() {
                if (submitted) { done(); return; }
                var target = lastGood;
                try { a.load(); } catch (e) {}
                var seek = function () { try { a.currentTime = target; } catch (e) {} };
                if (a.readyState >= 1) seek();
                else a.addEventListener('loadedmetadata', seek, { once: true });
                try { var p = a.play(); if (p && p.catch) p.catch(function () {}); } catch (e) {}

                // সফলতা যাচাই বিদ্যমান resume-seek এর মতোই: কোনো seek pending নেই, position টিকে আছে
                var checks = 0;
                var iv = setInterval(function () {
                    if (submitted) { clearInterval(iv); done(); return; }
                    if (!a.seeking && a.currentTime >= target - 1.5 && !a.paused) {
                        clearInterval(iv); done(); return;
                    }
                    if (!a.seeking && bufferedCovers(target)) seek();
                    if (++checks > 20) { clearInterval(iv); schedule(); }   // ~৫ সেকেন্ডে না হলে আবার
                }, 250);
            }

            function schedule() {
                if (submitted || retryTimer) return;
                var wait = Math.min(RETRY_MIN * Math.pow(2, tries++), RETRY_MAX);
                retryTimer = setTimeout(function () { retryTimer = null; attempt(); }, wait);
            }

            function recover() {
                if (submitted || recovering) return;
                // পেজ খোলার সময়কার প্রথম resume-seek চললে হাত দেব না — দুটো seek মারামারি করবে
                if (window.__hxSeekPending && !ourPending) return;
                recovering = true;
                ourPending = true;
                window.__hxSeekPending = true;   // recovery চলাকালীন ভুল (০) position save হবে না
                schedule();
            }

            a.addEventListener('error', recover);

            // শুধু slow wifi এ browser নিজেই buffer ভরে আবার চালায়। কিন্তু দীর্ঘ stall এ
            // মাঝে মাঝে আটকে বসে থাকে — position না নড়লে ওই একই recovery চালানো হয়।
            a.addEventListener('waiting', function () {
                if (stallTimer) return;
                var at = a.currentTime;
                stallTimer = setTimeout(function () {
                    stallTimer = null;
                    if (!recovering && !submitted && a.currentTime <= at + 0.25 && a.readyState < 3) recover();
                }, STALL_MS);
            });
            a.addEventListener('playing', function () {
                if (stallTimer) { clearTimeout(stallTimer); stallTimer = null; }
                done();
            });

            // নেট ফেরার মুহূর্তেই চেষ্টা — backoff এর অপেক্ষা না করে
            window.addEventListener('online', function () {
                if (!recovering || submitted) return;
                if (retryTimer) { clearTimeout(retryTimer); retryTimer = null; }
                tries = 0;
                attempt();
            });

            document.addEventListener('hx-test-submitted', function () {
                if (retryTimer) { clearTimeout(retryTimer); retryTimer = null; }
                if (stallTimer) { clearTimeout(stallTimer); stallTimer = null; }
                done();
            });
        }

        try {
            if (window._hxAudio) { guard(window._hxAudio); return; }   // আমাদের আগেই বসানো হয়ে গেছে
            var held;
            Object.defineProperty(window, '_hxAudio', {
                configurable: true,
                get: function () { return held; },
                set: function (v) { held = v; guard(v); }
            });
        } catch (e) {}
    })();

    // ---------- TIMER RESUME ----------
    // state আগে page load এই পড়া হতো। কিন্তু Student ID আসে start modal থেকে, অর্থাৎ
    // page load এর সময় এখনো জানা নেই — তখন পড়লে ভুল (ID-হীন) key দেখা হতো।
    // তাই পড়াটা সরিয়ে আনা হলো ঠিক ওই মুহূর্তে যখন blade timer চালু করে (setInterval),
    // কারণ ততক্ষণে Start চাপা হয়ে গেছে এবং ID জানা।
    //
    // "state আছে কিনা" এখানে দেখা যায় না — cross-device resume এ state টা server থেকে
    // আসে modal এ ID টাইপ করার পর, অর্থাৎ এই মুহূর্তের পরে। তাই wrapper সবসময় বসে,
    // কিন্তু state না পেলে হুবহু আসল setInterval-ই চালায় (আচরণ অপরিবর্তিত), এবং
    // প্রথম 1000ms interval এর পরেই window.setInterval আগের জায়গায় ফিরে যায়।
    var origSetInterval = window.setInterval;
    var origSetTimeout = window.setTimeout;
    var intercepted = false;
    window.setInterval = function (fn, delay) {
        if (delay === 1000 && !intercepted) {
            intercepted = true;
            window.setInterval = origSetInterval;

            var saved = hxLoadState();
            if (!saved || saved.remainingSeconds <= 5) {
                return origSetInterval.apply(window, arguments);   // resume নেই — স্বাভাবিক timer
            }
            // Closing date check — blade sets window._hxClosingTime from server
            if (window._hxClosingTime && Date.now() >= window._hxClosingTime) {
                try { localStorage.removeItem(hxKey()); } catch (e) {}
                return origSetInterval.apply(window, arguments);
            }

            // ঘড়ি pause করা ছিল — যেখানে থেমেছিল ঠিক সেখান থেকেই চলবে
            var secs = saved.remainingSeconds;
            var id = origSetInterval.call(window, function () {
                if (secs <= 0) {
                    clearInterval(id);
                    try { fn(); } catch (e) {}
                    // "0 : 00" লেখাটা fn() এর *পরে* — কারণ blade এর updateTimer নিজের
                    // (আমাদের countdown এর সাথে না নামা) timeRemaining দিয়ে timer এর লেখা
                    // আবার বসিয়ে দেয়। আগে লিখলে ওটা মুছে যেত, আর LISTENING EXTRA TIME module
                    // timer এর লেখা পড়ে "এখনো ৩১ মিনিট বাকি" ভেবে extra time না দিয়ে
                    // সরাসরি submit করে দিত।
                    var el0 = document.getElementById('timer');
                    if (el0) el0.textContent = '0 : 00 minutes left';
                    // blade এর নিজের timeRemaining আমাদের countdown এর সাথে নামেনি, তাই ওর
                    // updateTimer এ "সময় শেষ" শর্তটা নাও মিলতে পারে — resume করা test তখন
                    // সময় ফুরালেও submit হতো না। নিশ্চিত করতে এখান থেকেই একবার submit।
                    // extra time এর popup উঠে গেলে হাত দেওয়া যাবে না — ওই ২ মিনিট শেষে
                    // ও নিজেই submit করে।
                    origSetTimeout(function () {
                        if (submitted || window.__hexasTimeUpShown) return;
                        var f = document.getElementById('testForm') ||
                                document.querySelector('form[action*="submit"]');
                        if (f) { try { f.submit(); } catch (e) {} }
                    }, 1500);
                    return;
                }
                var el = document.getElementById('timer');
                if (el) {
                    var m = Math.floor(secs / 60), s = secs % 60;
                    el.textContent = m + ' : ' + (s < 10 ? '0' : '') + s + ' minutes left';
                }
                secs--;
            }, 1000);
            return id;
        }
        return origSetInterval.apply(window, arguments);
    };
})();

// Disable Ctrl+F and Cmd+F browser find functionality
document.addEventListener('keydown', function(e) {
    // Disable Ctrl+F (Windows/Linux) and Cmd+F (Mac)
    if ((e.ctrlKey || e.metaKey) && e.key === 'f') {
        e.preventDefault();
        e.stopPropagation();
        return false;
    }

    // Disable F12 (Developer Tools)
    if (e.key === 'F12') {
        e.preventDefault();
        e.stopPropagation();
        return false;
    }

    // Disable Ctrl+Shift+I (Inspect Element)
    // if (e.ctrlKey && e.shiftKey && e.key === 'I') {
    //     e.preventDefault();
    //     e.stopPropagation();
    //     return false;
    // }

    // Disable Ctrl+Shift+J (Console)
    if (e.ctrlKey && e.shiftKey && e.key === 'J') {
        e.preventDefault();
        e.stopPropagation();
        return false;
    }

    // Disable Ctrl+Shift+C (Inspect Element)
    if (e.ctrlKey && e.shiftKey && e.key === 'C') {
        e.preventDefault();
        e.stopPropagation();
        return false;
    }

    // Disable Ctrl+U (View Source)
    if (e.ctrlKey && e.key === 'u') {
        e.preventDefault();
        e.stopPropagation();
        return false;
    }
}, true);

// Disable right-click context menu entirely (capture phase + stopImmediatePropagation blocks all other listeners)
document.addEventListener('contextmenu', function(e) {
    e.preventDefault();
    e.stopImmediatePropagation();
    return false;
}, true);

// ==================== HIGHLIGHT AND NOTE FUNCTIONALITY ====================
// This will work on all pages that include this JS file

document.addEventListener('DOMContentLoaded', function() {


    // Always inject note-indicator CSS (applies to all pages using this file)
    if (!document.getElementById('__noteIndicatorStyle')) {
        const style = document.createElement('style');
        style.id = '__noteIndicatorStyle';
        style.textContent = `
            /* ===== GLOBAL FONT ===== */
            body { font-family: Arial, sans-serif !important; }
            *:not(.material-icons):not(.material-icons-outlined):not(.material-icons-round):not(.material-icons-sharp):not(.material-symbols-outlined):not([class*="fa"]):not([class*="icon"]) {
                font-family: Arial, sans-serif !important;
            }

            mark[data-note] { position: relative; cursor: pointer; }
            mark[data-note]::after {
                content: '\\270E';
                position: absolute;
                top: -13px;
                left: 50%;
                transform: translateX(-50%);
                font-size: 11px;
                color: #333;
                background: #ffe066;
                border: 1px solid #bbb;
                border-radius: 3px;
                padding: 0 3px;
                line-height: 1.5;
                opacity: 0;
                pointer-events: none;
                transition: opacity 0.15s;
                z-index: 1001;
                white-space: nowrap;
            }
            mark[data-note]:hover::after { opacity: 1; }

            /* ===== TOP TIMER NAVBAR: fixed, reduced height ===== */
            nav.navbar {
                position: fixed !important;
                top: 0 !important;
                left: 0 !important;
                right: 0 !important;
                z-index: 1050 !important;
                padding: 0 16px !important;
                min-height: unset !important;
                height: 50px !important;
            }
            nav.navbar .container-fluid {
                padding: 0 !important;
                height: 50px !important;
                align-items: center !important;
            }
            nav.navbar .navbar-collapse,
            nav.navbar #navbarSupportedContent {
                height: 50px !important;
                display: flex !important;
                align-items: center !important;
            }
            nav.navbar .navbar-nav {
                align-items: center !important;
                margin-bottom: 0 !important;
            }
            nav.navbar .navbar-nav .nav-item,
            nav.navbar .navbar-nav .nav-link {
                padding: 0 8px !important;
                margin: 0 !important;
                line-height: 50px !important;
                display: flex !important;
                align-items: center !important;
            }
            nav.navbar .navbar-nav .mb-2 {
                margin-bottom: 0 !important;
            }
            #noteToggle {
                display: flex !important;
                align-items: center !important;
                justify-content: center !important;
                cursor: pointer;
                font-size: 22px !important;
                line-height: 1 !important;
            }
            #main-content {
                padding-top: 54px !important;
            }

            /* ===== SIDEBAR: সবার উপরে, পূর্ণ opacity ===== */
            #sidebar,
            #noteSidebar {
                z-index: 99999 !important;
                opacity: 1 !important;
                background-color: #f8f9fa !important;
            }
        `;
        document.head.appendChild(style);
    }

    // Skip event listeners if this page registers its own note/highlight handlers
    if (window.__pageNoteHandlers) return;

    // Create popup HTML if not exists
    if (!document.getElementById('selectionPopup')) {
        const popupHTML = `
            <!-- AUTO POPUP FOR TEXT SELECTION -->
            <div id="selectionPopup" style="position: absolute; background: rgba(255,255,255,0.25); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); border: 1px solid rgba(255,255,255,0.4); border-radius: 12px; padding: 6px 10px; z-index: 9999; display: none; gap: 8px; align-items: center; box-shadow: 0 2px 12px rgba(0,0,0,0.12);">
                <button type="button" id="highlightBtn" style="display: inline-flex; align-items: center; gap: 5px; padding: 5px 13px; border-radius: 20px; border: none; font-size: 12px; font-weight: 600; background: linear-gradient(135deg,#f7c948,#f0a500); color: #fff; cursor: pointer; letter-spacing: 0.3px; box-shadow: 0 2px 6px rgba(240,165,0,0.35);">
                    ✏️ Highlight
                </button>
                <button type="button" id="noteBtn" style="display: inline-flex; align-items: center; gap: 5px; padding: 5px 13px; border-radius: 20px; border: none; font-size: 12px; font-weight: 600; background: linear-gradient(135deg,#4f8ef7,#1a5fd4); color: #fff; cursor: pointer; letter-spacing: 0.3px; box-shadow: 0 2px 6px rgba(79,142,247,0.35);">
                    📝 Note
                </button>
                <button type="button" id="clearBtn" style="display: none; align-items: center; gap: 5px; padding: 5px 13px; border-radius: 20px; border: none; font-size: 12px; font-weight: 600; background: linear-gradient(135deg,#f76b6b,#d42020); color: #fff; cursor: pointer; letter-spacing: 0.3px; box-shadow: 0 2px 6px rgba(212,32,32,0.35);">
                    🗑️ Clear
                </button>
            </div>

            <!-- SIDEBAR FOR NOTES -->
            <div id="noteSidebar" style="position: fixed; top: 0; right: -300px; width: 300px; height: 100vh; background: #f9f9f9; border-left: 1px solid #ccc; z-index: 1000; overflow-y: auto; transition: right 0.3s ease; padding: 10px;">
                <h4>Notes</h4>
                <button id="closeSidebar" style="position: absolute; top: 10px; right: 10px; background: none; border: none; font-size: 20px; cursor: pointer;">&times;</button>
            </div>
        `;
        document.body.insertAdjacentHTML('beforeend', popupHTML);
    }

    // Variables
    let selectionRange = null;
    let clickedMark = null;
    let activePopup = null;

    const selectionPopup = document.getElementById('selectionPopup');
    const highlightBtn = document.getElementById('highlightBtn');
    const noteBtn = document.getElementById('noteBtn');
    const clearBtn = document.getElementById('clearBtn');
    
    // Use existing sidebar if available, otherwise use created one
    let noteSidebar = document.getElementById('sidebar') || document.getElementById('noteSidebar');
    const toggleSidebar = document.getElementById('toggleSidebar');
    let closeSidebar = document.querySelector('.close-btn') || document.getElementById('closeSidebar');

    // Only add toggle listener if using created sidebar (not existing page sidebar)
    // Existing pages like listeningOne already have their own toggle logic
    if (toggleSidebar && document.getElementById('noteSidebar')) {
        toggleSidebar.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const sidebar = document.getElementById('noteSidebar');
            
            if (sidebar) {
                if (sidebar.style.right === '0px') {
                    sidebar.style.right = '-300px';
                } else {
                    sidebar.style.right = '0px';
                }
            }
        });
    }

    // Sidebar close button - attach listener
    function attachCloseSidebarListener() {
        // Try to find close button (both existing and created sidebars)
        const closeBtn = document.querySelector('.close-btn') || document.getElementById('closeSidebar');
        
        if (closeBtn) {
            // Remove old listener if exists
            const newCloseBtn = closeBtn.cloneNode(true);
            closeBtn.parentNode.replaceChild(newCloseBtn, closeBtn);
            
            // Add new listener
            newCloseBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                // Update reference to sidebar
                const sidebar = document.getElementById('sidebar') || document.getElementById('noteSidebar');
                
                if (sidebar) {
                    // Check if sidebar uses class-based toggle or inline style
                    if (sidebar.classList.contains('open')) {
                        sidebar.classList.remove('open');
                        const mainContent = document.getElementById('main-content');
                        if (mainContent) mainContent.classList.remove('shifted');
                    } else {
                        sidebar.style.right = '-300px';
                    }
                }
            });
        }
    }
    
    // Initial attach
    attachCloseSidebarListener();

    // Show popup when text is selected
    document.addEventListener('mouseup', function(e) {
        setTimeout(() => {
            const selection = window.getSelection();
            const selectedText = selection.toString().trim();
            
            if (selectedText !== '' && selection.rangeCount > 0) {
                selectionRange = selection.getRangeAt(0).cloneRange();
                
                // Check if selection contains highlighted text
                let isHighlighted = false;
                let hasNote = false;
                let selectedMark = null;
                
                const range = selection.getRangeAt(0);
                const container = range.commonAncestorContainer;
                
                // Check if we're selecting a mark element or inside one
                let checkNode = container.nodeType === Node.TEXT_NODE ? container.parentNode : container;
                if (checkNode && checkNode.tagName === 'MARK') {
                    isHighlighted = true;
                    selectedMark = checkNode;
                    if (checkNode.dataset.note) {
                        hasNote = true;
                    }
                } else {
                    // Check if selection contains any mark elements (for multi-mark selections)
                    const marks = [];
                    if (container.querySelectorAll) {
                        marks.push(...container.querySelectorAll('mark'));
                    }
                    // Also check if any parent is a mark
                    let parent = checkNode;
                    while (parent && parent !== document.body) {
                        if (parent.tagName === 'MARK') {
                            marks.push(parent);
                            break;
                        }
                        parent = parent.parentNode;
                    }
                    
                    if (marks.length > 0) {
                        isHighlighted = true;
                        selectedMark = marks[0];
                        // Check if any mark has a note
                        hasNote = marks.some(mark => mark.dataset.note && mark.dataset.note.trim() !== '');
                    }
                }
                
                // Smart button display logic
                if (isHighlighted && hasNote) {
                    // Already highlighted with note: show Highlight, Clear
                    highlightBtn.style.display = 'inline-flex';
                    noteBtn.style.display = 'none';
                    clearBtn.style.display = 'inline-flex';
                    clickedMark = selectedMark;
                } else if (isHighlighted && !hasNote) {
                    // Only highlighted: show Note, Clear
                    highlightBtn.style.display = 'none';
                    noteBtn.style.display = 'inline-flex';
                    clearBtn.style.display = 'inline-flex';
                    clickedMark = selectedMark;
                } else {
                    // Not highlighted: show Highlight, Note
                    highlightBtn.style.display = 'inline-flex';
                    noteBtn.style.display = 'inline-flex';
                    clearBtn.style.display = 'none';
                    clickedMark = null;
                }
                
                const rect = range.getBoundingClientRect();
                const popupWidth = selectionPopup.offsetWidth || 310;
                const rawLeft = rect.left + window.scrollX + rect.width / 2 - popupWidth / 2;
                const clampedLeft = Math.max(8, Math.min(rawLeft, window.innerWidth + window.scrollX - popupWidth - 8));
                selectionPopup.style.left = clampedLeft + 'px';
                selectionPopup.style.top = (rect.top + window.scrollY - 50) + 'px';
                selectionPopup.style.display = 'flex';
            } else {
                if (selectionPopup) selectionPopup.style.display = 'none';
            }
        }, 10);
    });

    // Hide selection popup on click elsewhere
    document.addEventListener('click', function(e) {
        if (selectionPopup && !selectionPopup.contains(e.target)) {
            if (!e.target.closest('mark')) {
                selectionPopup.style.display = 'none';
            }
        }
    });

    // Helper function to check if node is inside a table
    function isInsideTable(node) {
        let parent = node.parentNode;
        while (parent) {
            if (parent.tagName === 'TABLE' || parent.tagName === 'TD' || parent.tagName === 'TH' || parent.tagName === 'TR') {
                return true;
            }
            parent = parent.parentNode;
        }
        return false;
    }
    
    // Helper function to get the table cell containing a node
    function getTableCell(node) {
        let parent = node.nodeType === Node.TEXT_NODE ? node.parentNode : node;
        while (parent) {
            if (parent.tagName === 'TD' || parent.tagName === 'TH') {
                return parent;
            }
            parent = parent.parentNode;
        }
        return null;
    }

    // Advanced helper function to highlight range (handles tables, mixed content, etc.)
    function highlightRange(range) {
        const createdMarks = [];
        
        try {
            // Get all text nodes in the range
            const startContainer = range.startContainer;
            const endContainer = range.endContainer;
            const startOffset = range.startOffset;
            const endOffset = range.endOffset;
            
            // Check if selection crosses table cell boundaries
            const startCell = getTableCell(startContainer);
            const endCell = getTableCell(endContainer);
            
            // If selection is inside table and crosses cell boundaries, only highlight within the start cell
            if (startCell && endCell && startCell !== endCell) {
                // Only highlight text in the starting cell
                if (startContainer.nodeType === Node.TEXT_NODE) {
                    const mark = document.createElement('mark');
                    mark.style.backgroundColor = 'yellow';
                    const selectedText = startContainer.textContent.substring(startOffset);
                    if (selectedText.trim()) {
                        mark.textContent = selectedText;
                        
                        const beforeText = startContainer.textContent.substring(0, startOffset);
                        const parent = startContainer.parentNode;
                        if (beforeText) parent.insertBefore(document.createTextNode(beforeText), startContainer);
                        parent.insertBefore(mark, startContainer);
                        parent.removeChild(startContainer);
                        createdMarks.push(mark);
                    }
                }
                return createdMarks;
            }
            
            // If start and end are in the same text node
            if (startContainer === endContainer && startContainer.nodeType === Node.TEXT_NODE) {
                const mark = document.createElement('mark');
                mark.style.backgroundColor = 'yellow';
                const selectedText = startContainer.textContent.substring(startOffset, endOffset);
                mark.textContent = selectedText;
                
                const beforeText = startContainer.textContent.substring(0, startOffset);
                const afterText = startContainer.textContent.substring(endOffset);
                
                const parent = startContainer.parentNode;
                if (beforeText) parent.insertBefore(document.createTextNode(beforeText), startContainer);
                parent.insertBefore(mark, startContainer);
                if (afterText) parent.insertBefore(document.createTextNode(afterText), startContainer);
                parent.removeChild(startContainer);
                createdMarks.push(mark);
                return createdMarks;
            }
            
            // For multi-node selection, collect all text nodes in range
            const textNodes = [];
            const walker = document.createTreeWalker(
                range.commonAncestorContainer,
                NodeFilter.SHOW_TEXT,
                null,
                false
            );
            
            let node;
            while (node = walker.nextNode()) {
                // Only include nodes that intersect with the range
                if (range.intersectsNode(node)) {
                    // Skip nodes that are in different table cells if we started in a table
                    if (startCell) {
                        const nodeCell = getTableCell(node);
                        if (nodeCell && nodeCell !== startCell) continue;
                    }
                    textNodes.push(node);
                }
            }
            
            // Highlight each text node
            textNodes.forEach((textNode, index) => {
                let start = 0;
                let end = textNode.textContent.length;
                
                if (textNode === startContainer) start = startOffset;
                if (textNode === endContainer) end = endOffset;
                
                if (start >= end) return;
                
                const selectedText = textNode.textContent.substring(start, end);
                if (!selectedText.trim()) return;

                const mark = document.createElement('mark');
                mark.style.backgroundColor = 'yellow';
                mark.textContent = selectedText;
                
                const beforeText = textNode.textContent.substring(0, start);
                const afterText = textNode.textContent.substring(end);
                
                const parent = textNode.parentNode;
                if (beforeText) parent.insertBefore(document.createTextNode(beforeText), textNode);
                parent.insertBefore(mark, textNode);
                if (afterText) parent.insertBefore(document.createTextNode(afterText), textNode);
                parent.removeChild(textNode);
                createdMarks.push(mark);
            });
        } catch (err) {
            console.log('Highlight error:', err);
        }
        
        return createdMarks;
    }

    // Reload এর পর highlight/note ফিরিয়ে আনার module (নিচে) এই দুটো reuse করে
    window.__hxHighlightRange = highlightRange;
    window.__hxShowNotePopup = function (mark) { showNotePopup(mark); };

    // Highlight Button
    if (highlightBtn) {
        highlightBtn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            if (selectionRange) {
                try {
                    const createdMarks = highlightRange(selectionRange);
                    
                    // Set markId for all created marks so Clear can find them
                    if (createdMarks.length > 0) {
                        const markId = Date.now().toString();
                        createdMarks.forEach(mark => {
                            mark.dataset.markId = markId;
                        });
                    }
                    
                    window.getSelection().removeAllRanges();
                    selectionPopup.style.display = 'none';
                } catch (err) {
                    console.log('Highlight error:', err);
                }
            }
        });
    }

    // Clear Button (from popup)
    if (clearBtn) {
        clearBtn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const markIdsToRemove = new Set();
            
            // Try to use the stored selectionRange first
            if (selectionRange) {
                const container = selectionRange.commonAncestorContainer;
                const marksInSelection = [];
                
                // Check if container itself is a mark
                let checkNode = container.nodeType === Node.TEXT_NODE ? container.parentNode : container;
                if (checkNode && checkNode.tagName === 'MARK') {
                    marksInSelection.push(checkNode);
                }
                
                // Find all marks within the container
                if (container.querySelectorAll) {
                    const marks = container.querySelectorAll('mark');
                    marks.forEach(mark => {
                        if (!marksInSelection.includes(mark)) {
                            marksInSelection.push(mark);
                        }
                    });
                }
                
                // Also check parent chain for marks
                let parent = checkNode;
                while (parent && parent !== document.body) {
                    if (parent.tagName === 'MARK' && !marksInSelection.includes(parent)) {
                        marksInSelection.push(parent);
                    }
                    parent = parent.parentNode;
                }
                
                // Collect all markIds from selected marks
                marksInSelection.forEach(mark => {
                    if (mark.dataset.markId) {
                        markIdsToRemove.add(mark.dataset.markId);
                    }
                });
            }
            
            // Also try current selection
            const selection = window.getSelection();
            if (selection.rangeCount > 0) {
                const range = selection.getRangeAt(0);
                const container = range.commonAncestorContainer;
                
                // Find all marks in the selection
                const marksInSelection = [];
                
                // Check if container itself is a mark
                let checkNode = container.nodeType === Node.TEXT_NODE ? container.parentNode : container;
                if (checkNode && checkNode.tagName === 'MARK') {
                    marksInSelection.push(checkNode);
                }
                
                // Find all marks within the container
                if (container.querySelectorAll) {
                    const marks = container.querySelectorAll('mark');
                    marks.forEach(mark => {
                        if (!marksInSelection.includes(mark)) {
                            marksInSelection.push(mark);
                        }
                    });
                }
                
                // Also check parent chain for marks
                let parent = checkNode;
                while (parent && parent !== document.body) {
                    if (parent.tagName === 'MARK' && !marksInSelection.includes(parent)) {
                        marksInSelection.push(parent);
                    }
                    parent = parent.parentNode;
                }
                
                // Collect all markIds from selected marks
                marksInSelection.forEach(mark => {
                    if (mark.dataset.markId) {
                        markIdsToRemove.add(mark.dataset.markId);
                    }
                });
            }
            
            // Fallback to clickedMark
            if (markIdsToRemove.size === 0 && clickedMark && clickedMark.dataset.markId) {
                markIdsToRemove.add(clickedMark.dataset.markId);
            }
            
            // Now remove ALL marks with any of these markIds (including multi-line highlights)
            markIdsToRemove.forEach(markId => {
                // Find all marks with this markId
                const allMarksWithId = document.querySelectorAll(`mark[data-mark-id="${markId}"]`);
                
                allMarksWithId.forEach(mark => {
                    // Remove highlight and restore original text
                    const parent = mark.parentNode;
                    if (parent) {
                        while (mark.firstChild) {
                            parent.insertBefore(mark.firstChild, mark);
                        }
                        parent.removeChild(mark);
                    }
                });
                
                // Remove from sidebar (only once per markId)
                const sidebarItem = document.querySelector(`.sidebar-note-item[data-mark-id="${markId}"]`);
                if (sidebarItem) sidebarItem.remove();
            });
            
            clickedMark = null;
            selectionRange = null;
            selectionPopup.style.display = 'none';
            window.getSelection().removeAllRanges();
        });
    }

    // Note Button
    if (noteBtn) {
        noteBtn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            if (selectionRange) {
                try {
                    const selectedText = selectionRange.toString();
                    const createdMarks = highlightRange(selectionRange);
                    
                    if (createdMarks.length > 0) {
                        const markId = Date.now().toString();
                        const firstMark = createdMarks[0];
                        
                        createdMarks.forEach((mark) => {
                            mark.setAttribute('data-note', '');
                            mark.dataset.markId = markId;
                            mark.dataset.headerText = selectedText;
                            
                            mark.addEventListener('click', function(ev) {
                                ev.stopPropagation();
                                showNotePopup(mark);
                            });
                        });

                        const noteDiv = document.createElement('div');
                        noteDiv.classList.add('sidebar-note-item');
                        noteDiv.innerHTML = `
                            <div style="margin-bottom: 3px; cursor: pointer; font-weight: bold;">${selectedText}</div>
                            <div class="sidebar-note-content" style="color: #666; white-space: pre-wrap;"></div>
                        `;
                        noteDiv.style.borderBottom = '1px solid #ccc';
                        noteDiv.style.padding = '8px';
                        noteDiv.dataset.markId = markId;
                
                        // Get current sidebar reference - check for sidebar-notes-list container first
                        const sidebarNotesList = document.getElementById('sidebar-notes-list');
                        const currentSidebar = document.getElementById('sidebar') || document.getElementById('noteSidebar');
                        
                        if (sidebarNotesList) {
                            // If sidebar-notes-list exists (like in listeningTwelve), append there
                            sidebarNotesList.appendChild(noteDiv);
                        } else if (currentSidebar) {
                            // Otherwise append directly to sidebar
                            currentSidebar.appendChild(noteDiv);
                        }
                        // Don't auto-open sidebar - let user click note icon to open
                        // Don't show floating toggle button - use top note icon instead

                        noteDiv.addEventListener('click', () => {
                            showNotePopup(firstMark);
                        });

                        showNotePopup(firstMark);
                    }
                    
                    window.getSelection().removeAllRanges();
                    selectionPopup.style.display = 'none';
                } catch (err) {
                    console.log('Note error:', err);
                }
            }
        });
    }

    // Show note popup (listeningOne style)
    function showNotePopup(mark) {
        if (activePopup) {
            activePopup.remove();
        }

        const notePopup = document.createElement('div');
        notePopup.classList.add('note-popup');
        notePopup.style.position = 'absolute';
        notePopup.style.background = 'yellow';
        notePopup.style.padding = '10px';
        notePopup.style.border = '1px solid #ccc';
        notePopup.style.cursor = 'move';
        notePopup.style.zIndex = '10000';
        notePopup.style.width = '200px';
        notePopup.style.boxShadow = '2px 2px 8px rgba(0, 0, 0, 0.2)';

        const headerText = mark.dataset.headerText || mark.textContent;
        const existingNote = mark.dataset.note || '';

        notePopup.innerHTML = `
            <div class="drag-handle" style="background: linear-gradient(to bottom, #f0f0f0, #d0d0d0); padding: 8px; cursor: move; border-bottom: 2px solid #999; display: flex; justify-content: space-between; align-items: center; user-select: none;">
                <span style="font-size: 12px; color: #666;">Drag to move</span>
                <span class="close-note" style="cursor: pointer; font-size: 20px; font-weight: bold; color: #666;">&times;</span>
            </div>
            <div class="popup-header" contenteditable="true" style="font-weight: bold; cursor: text; padding: 8px; background: rgba(0,0,0,0.05); margin-bottom: 5px; border: 1px solid #ccc; outline: none;">${headerText}</div>
            <textarea placeholder="Add your note here..." style="width:100%; border:1px solid #ccc; background-color:yellow; min-height: 60px; cursor: text; padding: 5px; resize: vertical;">${existingNote}</textarea>
        `;

        document.body.appendChild(notePopup);
        activePopup = notePopup;

        // Position popup near mark
        const rect = mark.getBoundingClientRect();
        notePopup.style.left = (rect.left + window.scrollX) + 'px';
        notePopup.style.top = (rect.bottom + window.scrollY + 5) + 'px';

        // Close button
        notePopup.querySelector('.close-note').addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            notePopup.remove();
            activePopup = null;
        });

        // Close popup when clicking outside
        function handleOutsideClick(e) {
            if (notePopup && !notePopup.contains(e.target)) {
                notePopup.remove();
                activePopup = null;
                document.removeEventListener('click', handleOutsideClick);
            }
        }
        
        // Add listener after a small delay to prevent immediate closing
        setTimeout(() => {
            document.addEventListener('click', handleOutsideClick);
        }, 100);

        // Real-time save on input
        const textarea = notePopup.querySelector('textarea');
        
        function updateNote() {
            mark.dataset.note = textarea.value;
            
            const markId = mark.dataset.markId;
            if (markId) {
                const sidebarItem = document.querySelector(`.sidebar-note-item[data-mark-id="${markId}"]`);
                if (sidebarItem) {
                    const sidebarNoteContent = sidebarItem.querySelector('.sidebar-note-content');
                    if (sidebarNoteContent) {
                        sidebarNoteContent.textContent = textarea.value;
                    }
                }
            }
        }
        
        textarea.addEventListener('input', updateNote);
        textarea.addEventListener('blur', updateNote);
        
        // Focus textarea
        setTimeout(() => {
            textarea.focus();
            const length = textarea.value.length;
            textarea.setSelectionRange(length, length);
            textarea.scrollTop = textarea.scrollHeight;
        }, 100);

        // Save header text changes
        const popupHeader = notePopup.querySelector('.popup-header');
        popupHeader.addEventListener('input', function() {
            const markId = mark.dataset.markId;
            if (markId) {
                const sidebarItem = document.querySelector(`.sidebar-note-item[data-mark-id="${markId}"]`);
                if (sidebarItem) {
                    const sidebarText = sidebarItem.querySelector('div');
                    if (sidebarText) {
                        sidebarText.textContent = popupHeader.innerText;
                    }
                }
            }
        });
        
        // Make popup draggable
        let isDragging = false, offsetX, offsetY;
        const dragHandle = notePopup.querySelector('.drag-handle');
        
        dragHandle.addEventListener('mousedown', function(e) {
            if (!e.target.classList.contains('close-note')) {
                isDragging = true;
                offsetX = e.clientX - notePopup.offsetLeft;
                offsetY = e.clientY - notePopup.offsetTop;
                e.preventDefault();
            }
        });
        
        document.addEventListener('mousemove', function(e) {
            if (isDragging) {
                notePopup.style.left = (e.clientX - offsetX) + 'px';
                notePopup.style.top = (e.clientY - offsetY) + 'px';
            }
        });
        
        document.addEventListener('mouseup', function() {
            isDragging = false;
        });
    }
});

// ==================== HIGHLIGHT / NOTE PERSISTENCE (localStorage only) ====================
// reload করলে highlight ও note যেন মুছে না যায়। server এ কিছুই যায় না — resume payload
// (hx_resume_*) থেকে সম্পূর্ণ আলাদা key তে শুধু browser এর localStorage এ রাখা হয়।
// mark গুলো HTML হিসেবে নয়, container এর textContent এর character offset হিসেবে সেভ হয় —
// mark বসালে text node ভাঙে কিন্তু textContent এর ক্রম বদলায় না, তাই offset স্থিতিশীল।
// মেয়াদ: test submit হলে, অথবা assign করা test এর closing time পেরিয়ে গেলে auto clear।
(function () {
    var path = window.location.pathname;
    if (!/\/(listening|reading|writing|speaking)\//.test(path)) return;

    var _aid = window._hxAssignmentId;
    if (!_aid) { try { _aid = new URLSearchParams(window.location.search).get('assignment_id'); } catch (e) {} }
    // resume এর মতোই key তে Student ID যোগ হয় — নইলে এক PC তে আগের student এর
    // highlight/note পরের student দেখতে পেত (assignment_id ব্যাচ অনুযায়ী, student অনুযায়ী নয়)।
    // ID না পাওয়া গেলে আগের মতোই ID-হীন key — ওই page গুলোর আচরণ অপরিবর্তিত।
    var ANN_BASE = 'hx_ann_' + path + (_aid ? ('_' + _aid) : '');
    function annSid() {
        var sid = '';
        try { sid = sessionStorage.getItem('examStudentId') || ''; } catch (e) {}
        return String(sid).trim().replace(/[^a-zA-Z0-9]/g, '');
    }
    function annKey() {
        var sid = annSid();
        return sid ? (ANN_BASE + '_' + sid) : ANN_BASE;
    }
    var CLOSING = window._hxClosingTime || null;   // blade থেকে আসে (assignment এর closing date)
    var SAVE_DEBOUNCE = 500;
    var MAX_MARKS = 300, MAX_NOTE = 1000;
    var EXCLUDE = 'nav, #sidebar, #noteSidebar, #selectionPopup, .note-popup, .sidebar-note-item, #startModal, script, style, textarea, input, select, button, .modal';

    var regions = null, busy = false, submitted = false, timer = null;

    // ---- মেয়াদ পেরোনো entry cleanup ----
    // প্রতিটা entry তে ওই test এর closing time (ct) রাখা হয়, তাই অন্য পেজ থেকেও
    // এক জায়গায় সব বাসি entry মুছে ফেলা যায়। ct না থাকলে (assign নয় / practice)
    // entry শুধু submit এই মুছবে।
    // sid না থাকা entry (এই fix এর আগের, বা ID-হীন page এর) কার তা জানার উপায় নেই —
    // resume এর মতোই ওগুলোর সীমা একই দিন, যাতে পরদিন অন্য student ওগুলো না দেখে।
    try {
        var _now = Date.now();
        var _today = new Date().toDateString();
        for (var i = localStorage.length - 1; i >= 0; i--) {
            var k = localStorage.key(i);
            if (!k || k.indexOf('hx_ann_') !== 0) continue;
            var v = null;
            try { v = JSON.parse(localStorage.getItem(k)); } catch (e) {}
            var drop = !v || !v.a || (v.ct && _now >= v.ct);
            if (!drop && !v.sid) {
                drop = !v.at || new Date(v.at).toDateString() !== _today;
            }
            if (drop) localStorage.removeItem(k);
        }
    } catch (e) {}

    // এই পেজের test এর সময় ইতিমধ্যেই শেষ — restore করার কিছু নেই
    if (CLOSING && Date.now() >= CLOSING) {
        try { localStorage.removeItem(annKey()); } catch (e) {}
        return;
    }

    function excluded(el) {
        try { return !!(el.closest && el.closest(EXCLUDE)); } catch (e) { return false; }
    }

    // region = যেসব element এর সরাসরি text আছে। load এর সময় একবারই তোলা হয় এবং
    // reference ধরে রাখা হয়, তাই পরে mark বসলেও index এলোমেলো হয় না।
    function collectRegions() {
        var out = [], all = document.body.querySelectorAll('*');
        for (var i = 0; i < all.length; i++) {
            var el = all[i];
            if (excluded(el)) continue;
            for (var c = el.firstChild; c; c = c.nextSibling) {
                if (c.nodeType === 3 && c.nodeValue && c.nodeValue.trim()) { out.push(el); break; }
            }
        }
        return out;
    }

    function regionIndexOf(node) {
        var el = node.nodeType === 3 ? node.parentNode : node;
        while (el && el !== document.body) {
            var idx = regions.indexOf(el);
            if (idx >= 0) return idx;
            el = el.parentNode;
        }
        return -1;
    }

    function textOffset(region, node) {
        var w = document.createTreeWalker(region, NodeFilter.SHOW_TEXT, null, false), n, off = 0;
        while ((n = w.nextNode())) {
            if (n === node) return off;
            off += n.nodeValue.length;
        }
        return -1;
    }

    function rangeFor(region, s, e) {
        var w = document.createTreeWalker(region, NodeFilter.SHOW_TEXT, null, false),
            n, off = 0, range = document.createRange(), okS = false, okE = false;
        while ((n = w.nextNode())) {
            var len = n.nodeValue.length;
            if (!okS && s >= off && s < off + len) { range.setStart(n, s - off); okS = true; }
            if (okS && e > off && e <= off + len) { range.setEnd(n, e - off); okE = true; break; }
            off += len;
        }
        return (okS && okE) ? range : null;
    }

    function collect() {
        var res = [], marks = document.querySelectorAll('mark');
        for (var i = 0; i < marks.length && res.length < MAX_MARKS; i++) {
            var m = marks[i];
            if (excluded(m)) continue;
            var t = m.firstChild;
            if (!t || t.nodeType !== 3) continue;
            var r = regionIndexOf(m);
            if (r < 0) continue;
            var s = textOffset(regions[r], t);
            if (s < 0) continue;
            var txt = m.textContent;
            res.push({
                r: r, s: s, e: s + txt.length,
                x: txt.slice(0, 80),
                g: m.dataset.markId || '',
                n: m.hasAttribute('data-note') ? String(m.dataset.note || '').slice(0, MAX_NOTE) : null,
                h: String(m.dataset.headerText || '').slice(0, 200)
            });
        }
        return res;
    }

    function save() {
        if (submitted || busy || !regions) return;
        try {
            var a = collect();
            if (!a.length) { localStorage.removeItem(annKey()); return; }
            localStorage.setItem(annKey(), JSON.stringify({ v: 1, ct: CLOSING, a: a, sid: annSid(), at: Date.now() }));
        } catch (e) {}
    }

    function schedule() {
        if (submitted) return;
        clearTimeout(timer);
        timer = setTimeout(save, SAVE_DEBOUNCE);
    }

    function addSidebarItem(gid, headerText, noteText, firstMark) {
        var list = document.getElementById('sidebar-notes-list');
        var sidebar = document.getElementById('sidebar') || document.getElementById('noteSidebar');
        var host = list || sidebar;
        if (!host) return;
        if (host.querySelector('.sidebar-note-item[data-mark-id="' + gid + '"]')) return;
        var div = document.createElement('div');
        div.classList.add('sidebar-note-item');
        div.style.borderBottom = '1px solid #ccc';
        div.style.padding = '8px';
        div.dataset.markId = gid;
        var head = document.createElement('div');
        head.style.cssText = 'margin-bottom:3px;cursor:pointer;font-weight:bold;';
        head.textContent = headerText;
        var body = document.createElement('div');
        body.className = 'sidebar-note-content';
        body.style.cssText = 'color:#666;white-space:pre-wrap;';
        body.textContent = noteText;
        div.appendChild(head);
        div.appendChild(body);
        div.addEventListener('click', function () {
            if (window.__hxShowNotePopup) window.__hxShowNotePopup(firstMark);
        });
        host.appendChild(div);
    }

    function restore() {
        if (!window.__hxHighlightRange) return;   // নিজস্ব handler ওয়ালা পেজ — বাদ
        var data = null;
        try { data = JSON.parse(localStorage.getItem(annKey())); } catch (e) {}
        if (!data || !data.a || !data.a.length) return;

        busy = true;
        var seen = {};
        data.a.forEach(function (it) {
            try {
                var region = regions[it.r];
                if (!region) return;
                // blade বদলে গেলে বা text না মিললে ওই entry চুপচাপ বাদ
                if (it.x && region.textContent.substr(it.s, it.e - it.s).slice(0, 80) !== it.x) return;
                var range = rangeFor(region, it.s, it.e);
                if (!range) return;
                var created = window.__hxHighlightRange(range);
                if (!created || !created.length) return;

                var gid = it.g || ('r' + Date.now() + Math.random().toString(36).slice(2, 7));
                created.forEach(function (m) {
                    m.dataset.markId = gid;
                    if (it.n !== null && it.n !== undefined) {
                        m.setAttribute('data-note', '');
                        m.dataset.note = it.n;
                        m.dataset.headerText = it.h || m.textContent;
                        m.addEventListener('click', function (ev) {
                            ev.stopPropagation();
                            if (window.__hxShowNotePopup) window.__hxShowNotePopup(m);
                        });
                    }
                });
                if (it.n !== null && it.n !== undefined && !seen[gid]) {
                    seen[gid] = true;
                    addSidebarItem(gid, it.h || created[0].textContent, it.n, created[0]);
                }
            } catch (e) {}
        });
        busy = false;
    }

    // mark যোগ/বাদ বা note এর লেখা বদলালে তবেই save — কোনো interval নেই
    function watch() {
        try {
            var obs = new MutationObserver(function (muts) {
                if (busy || submitted) return;
                for (var i = 0; i < muts.length; i++) {
                    var mu = muts[i];
                    if (mu.type === 'attributes') {
                        if (mu.target && mu.target.nodeName === 'MARK') { schedule(); return; }
                        continue;
                    }
                    var lists = [mu.addedNodes, mu.removedNodes];
                    for (var l = 0; l < 2; l++) {
                        var nodes = lists[l];
                        for (var j = 0; j < nodes.length; j++) {
                            var nd = nodes[j];
                            if (nd.nodeType !== 1) continue;
                            if (nd.nodeName === 'MARK' || (nd.querySelector && nd.querySelector('mark'))) {
                                schedule(); return;
                            }
                        }
                    }
                }
            });
            obs.observe(document.body, {
                childList: true, subtree: true,
                attributes: true, attributeFilter: ['data-note']
            });
        } catch (e) {}
    }

    // Test submit — highlight, note সাথে সাথে localStorage থেকে মুছে যাবে
    function clearAnnotations() {
        submitted = true;
        clearTimeout(timer);
        try { localStorage.removeItem(annKey()); } catch (e) {}
    }
    window.__hxClearAnnotations = clearAnnotations;
    document.addEventListener('submit', clearAnnotations, true);
    document.addEventListener('hx-test-submitted', clearAnnotations);
    // programmatic submit (Continue / time's-up / extra time) submit event fire করে না
    var _annProtoSubmit = HTMLFormElement.prototype.submit;
    HTMLFormElement.prototype.submit = function () {
        clearAnnotations();
        return _annProtoSubmit.apply(this, arguments);
    };

    window.addEventListener('pagehide', function () { if (!submitted) save(); });

    document.addEventListener('DOMContentLoaded', function () {
        // blade এর নিজের script গুলো DOM বানানো শেষ করার পর
        setTimeout(function () {
            regions = collectRegions();
            restore();
            watch();
        }, 300);
    });
})();

// ==================== LISTENING EXTRA TIME ====================
(function () {
    var path = window.location.pathname;
    if (!path.includes('/listening/')) return;

    function parseTimerSeconds(text) {
        var m = text.match(/(\d+)\s*[:\-]\s*(\d+)/);
        if (m) return parseInt(m[1]) * 60 + parseInt(m[2]);
        return -1;
    }

    function showTimeUpAndExtraTime(timerEl) {
        if (window.__hexasTimeUpShown) return;
        window.__hexasTimeUpShown = true;

        var popup = document.createElement('div');
        popup.style.cssText = 'position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.6);z-index:99999;display:flex;align-items:center;justify-content:center;';
        popup.innerHTML =
            '<div style="background:white;padding:35px 40px;border-radius:12px;text-align:center;max-width:420px;box-shadow:0 10px 40px rgba(0,0,0,0.3);">' +
            '<h4 style="margin-bottom:10px;">&#9200; Time is Up!</h4>' +
            '<p style="color:#555;margin-bottom:20px;">Extra time starting: <strong>2 minutes</strong></p>' +
            '<button id="__hexasTimeUpOkBtn" style="background:#0d6efd;color:#fff;border:none;padding:8px 28px;font-size:15px;border-radius:6px;cursor:pointer;">OK</button>' +
            '</div>';
        document.body.appendChild(popup);

        var autoClose = setTimeout(function () { popup.style.display = 'none'; }, 5000);
        var okBtn = document.getElementById('__hexasTimeUpOkBtn');
        if (okBtn) {
            okBtn.addEventListener('click', function () {
                clearTimeout(autoClose);
                popup.style.display = 'none';
            });
        }

        var extraTime = 2 * 60;
        var extraInterval = setInterval(function () {
            extraTime--;
            if (timerEl) {
                var em = Math.floor(extraTime / 60), es = extraTime % 60;
                timerEl.textContent = 'Extra: ' + em + ' : ' + (es < 10 ? '0' : '') + es;
            }
            if (extraTime <= 0) {
                clearInterval(extraInterval);
                var f = document.getElementById('testForm');
                if (f) HTMLFormElement.prototype.submit.call(f);
            }
        }, 1000);
    }

    document.addEventListener('DOMContentLoaded', function () {
        var testForm = document.getElementById('testForm');
        var timerEl = document.getElementById('timer');
        if (!testForm || !timerEl) return;
        if (testForm.__hexasIntercepted) return;
        testForm.__hexasIntercepted = true;

        testForm.submit = function () {
            var secs = parseTimerSeconds(timerEl.textContent);
            if (secs <= 0 && !window.__hexasTimeUpShown) {
                showTimeUpAndExtraTime(timerEl);
                return;
            }
            HTMLFormElement.prototype.submit.call(testForm);
        };
    });
})();
