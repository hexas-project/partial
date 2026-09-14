// ==================== HEXAS AUDIO SERVICE WORKER ====================
// লক্ষ্য: listening test এর audio একবারই download হবে, তারপর পুরোটা Cache এ বসে থাকবে।
// test চলাকালীন internet চলে গেলেও audio তে কোনো প্রভাব পড়বে না।
//
// Cache দুইভাবে ভরে:
//   ১) dashboard থেকে prefetch message — student টেবিল/headphone check দেখার সময়ই
//      background এ পুরোটা নেমে যায়, কোনো UI ছাড়াই।
//   ২) player নিজেই চাইলে (prefetch শেষ হওয়ার আগে Take Test চাপলে) — তখন ওই একই
//      download কে tee করে player আর cache দুই দিকে পাঠানো হয়, তাই দুবার নামে না।
//
// শুধু "managed" audio ই সামলানো হয় — অর্থাৎ যেগুলো dashboard prefetch করতে বলেছে বা
// আগেই cache এ আছে। বাকি সব audio (যেমন dashboard এর headphone check) আগের মতোই সরাসরি
// network থেকে যায়, কারণ ওগুলো পুরোটা নামিয়ে জমিয়ে রাখার কোনো দরকার নেই।
//
// Range (206) request গুলো cache থেকেই বানানো হয়। এটা বাদ দিলে cache থাকা সত্ত্বেও seek
// ভাঙত — আর seek এর উপরেই resume ফিচার (disable-find.js) দাঁড়িয়ে আছে।
//
// অসম্পূর্ণ ফাইল কখনো cache এ বসে না — Content-Length মিলিয়ে তবেই put করা হয়। অর্ধেক
// নামা ফাইল cache এ ঢুকে গেলে test এর মাঝপথে গিয়ে ধরা পড়ত, সেটা সবচেয়ে খারাপ।

const CACHE_NAME = 'hx-audio-v1';
const AUDIO_RE = /\/audio\/[^\/]+\.(mp3|m4a|ogg|wav)$/i;
const MANAGED_KEY = '/__hx_managed_audio__';
const MAX_ENTRIES = 4;   // কয়েক term পর যাতে অনেকগুলো ৪০ MB ফাইল জমে না থাকে

self.addEventListener('install', function () {
    self.skipWaiting();
});

self.addEventListener('activate', function (event) {
    event.waitUntil(self.clients.claim());
});

// query string (asset version ইত্যাদি) বাদ দিয়ে key — নইলে dashboard আর test page এর
// URL সামান্য আলাদা হলে দুটো আলাদা entry হয়ে যেত, prefetch এর মানেই থাকত না
function cacheKey(url) {
    var u = new URL(url, self.location.origin);
    return u.origin + u.pathname;
}

// ---------- কোন audio গুলো আমরা সামলাই ----------
// SW যেকোনো সময় বন্ধ হয়ে যেতে পারে, তাই তালিকাটা cache এ ও লিখে রাখা হয় — নাহলে
// dashboard এ prefetch শুরু করার পর SW restart হলে test page এ এসে আর চেনা যেত না।
var managed = null;

function loadManaged() {
    if (managed) return Promise.resolve(managed);
    return caches.open(CACHE_NAME).then(function (cache) {
        return cache.match(MANAGED_KEY);
    }).then(function (res) {
        return res ? res.json() : [];
    }).then(function (list) {
        managed = {};
        for (var i = 0; i < list.length; i++) managed[list[i]] = true;
        return managed;
    }).catch(function () {
        managed = {};
        return managed;
    });
}

function addManaged(key) {
    return loadManaged().then(function (set) {
        if (set[key]) return;
        set[key] = true;
        return caches.open(CACHE_NAME).then(function (cache) {
            return cache.put(MANAGED_KEY, new Response(JSON.stringify(Object.keys(set)), {
                headers: { 'Content-Type': 'application/json' }
            }));
        });
    }).catch(function () {});
}

// ---------- একটা ফাইল মেমরিতে মনে রাখা ----------
// media element পরপর অনেকগুলো range চায়; প্রতিবার Cache থেকে ৪০ MB পড়া অপচয়।
var memo = { key: null, buf: null, type: '' };

function setMemo(key, buf, type) {
    memo = { key: key, buf: buf, type: type || 'audio/mpeg' };
}

function readCached(cache, key) {
    if (memo.key === key && memo.buf) return Promise.resolve(memo);
    return cache.match(key).then(function (res) {
        if (!res) return null;
        var type = res.headers.get('Content-Type') || 'audio/mpeg';
        return res.arrayBuffer().then(function (buf) {
            setMemo(key, buf, type);
            return memo;
        });
    });
}

// ---------- Range parsing / 206 response ----------
function parseRange(header, size) {
    var m = /^bytes=(\d*)-(\d*)$/.exec(String(header || '').trim());
    if (!m) return null;
    var start, end;
    if (m[1] === '') {
        if (m[2] === '') return null;
        start = Math.max(0, size - parseInt(m[2], 10));
        end = size - 1;
    } else {
        start = parseInt(m[1], 10);
        end = m[2] === '' ? size - 1 : parseInt(m[2], 10);
    }
    if (isNaN(start) || isNaN(end) || start > end || start >= size) return null;
    if (end >= size) end = size - 1;
    return { start: start, end: end };
}

function serveFromBuffer(entry, rangeHeader) {
    var size = entry.buf.byteLength;
    if (!rangeHeader) {
        return new Response(entry.buf, {
            status: 200,
            headers: {
                'Content-Type': entry.type,
                'Content-Length': String(size),
                'Accept-Ranges': 'bytes'
            }
        });
    }
    var r = parseRange(rangeHeader, size);
    if (!r) {
        return new Response(null, { status: 416, headers: { 'Content-Range': 'bytes */' + size } });
    }
    var slice = entry.buf.slice(r.start, r.end + 1);
    return new Response(slice, {
        status: 206,
        headers: {
            'Content-Type': entry.type,
            'Content-Length': String(slice.byteLength),
            'Content-Range': 'bytes ' + r.start + '-' + r.end + '/' + size,
            'Accept-Ranges': 'bytes'
        }
    });
}

// ---------- Cache তে লেখা (সবসময় সাইজ যাচাই করে) ----------
function storeBuffer(key, buf, type, expected) {
    if (!buf || !buf.byteLength) return Promise.resolve(false);
    if (expected && buf.byteLength !== expected) return Promise.resolve(false);
    return caches.open(CACHE_NAME).then(function (cache) {
        return cache.put(key, new Response(buf, {
            headers: { 'Content-Type': type || 'audio/mpeg', 'Content-Length': String(buf.byteLength) }
        })).then(function () {
            setMemo(key, buf, type);
            return trimCache(cache, key);
        }).then(function () { return true; });
    }).catch(function () { return false; });
}

// পুরোনো entry মুছে সর্বোচ্চ MAX_ENTRIES রাখা (Cache API insertion order ধরে রাখে)
function trimCache(cache, keepKey) {
    return cache.keys().then(function (keys) {
        var audioKeys = keys.filter(function (r) { return r.url.indexOf(MANAGED_KEY) === -1; });
        var extra = audioKeys.length - MAX_ENTRIES;
        var chain = Promise.resolve();
        for (var i = 0; i < audioKeys.length && extra > 0; i++) {
            if (audioKeys[i].url === keepKey) continue;
            (function (req) { chain = chain.then(function () { return cache.delete(req); }); })(audioKeys[i]);
            extra--;
        }
        return chain;
    }).catch(function () {});
}

// ---------- Prefetch (dashboard থেকে message এ চালু হয়) ----------
var inflight = {};   // key → AbortController

function abortPrefetch(key) {
    var ctrl = inflight[key];
    if (!ctrl) return;
    delete inflight[key];
    try { ctrl.abort(); } catch (e) {}
}

function prefetch(key) {
    if (inflight[key]) return Promise.resolve();
    return addManaged(key).then(function () {
        return caches.open(CACHE_NAME);
    }).then(function (cache) {
        return cache.match(key);
    }).then(function (hit) {
        if (hit) return;   // আগেই নামানো আছে
        var ctrl = new AbortController();
        inflight[key] = ctrl;
        return fetch(key, { signal: ctrl.signal, credentials: 'same-origin' }).then(function (res) {
            if (!res.ok || res.status !== 200) throw new Error('bad status');
            var expected = parseInt(res.headers.get('Content-Length') || '0', 10);
            var type = res.headers.get('Content-Type') || 'audio/mpeg';
            return res.arrayBuffer().then(function (buf) {
                return storeBuffer(key, buf, type, expected);
            });
        }).then(function () {
            if (inflight[key] === ctrl) delete inflight[key];
        }).catch(function () {
            if (inflight[key] === ctrl) delete inflight[key];
        });
    }).catch(function () {});
}

self.addEventListener('message', function (event) {
    var data = event.data || {};
    if (data.type !== 'hx-prefetch-audio' || !data.url) return;
    var key;
    try { key = cacheKey(data.url); } catch (e) { return; }
    if (!AUDIO_RE.test(new URL(key).pathname)) return;
    event.waitUntil(prefetch(key));
});

// ---------- Player এর request: cache miss হলে একই download tee করা ----------
// tee এর একটা শাখা player এ যায় (সাথে সাথে বাজতে থাকে), আরেকটা জমা হয়ে cache এ বসে।
// অর্থাৎ network থেকে ফাইল নামে ঠিক একবার।
function fetchTee(key, rangeHeader) {
    return fetch(key, { credentials: 'same-origin' }).then(function (res) {
        if (!res.ok || res.status !== 200 || !res.body) return null;
        var expected = parseInt(res.headers.get('Content-Length') || '0', 10);
        var type = res.headers.get('Content-Type') || 'audio/mpeg';
        if (!expected) return null;   // সাইজ না জানলে যাচাই করা যাবে না — সাধারণ পথে যাক

        var branches = res.body.tee();
        collectAndStore(key, branches[1], type, expected);

        var headers = {
            'Content-Type': type,
            'Content-Length': String(expected),
            'Accept-Ranges': 'bytes'
        };
        if (rangeHeader) {
            headers['Content-Range'] = 'bytes 0-' + (expected - 1) + '/' + expected;
            return new Response(branches[0], { status: 206, headers: headers });
        }
        return new Response(branches[0], { status: 200, headers: headers });
    }).catch(function () { return null; });
}

function collectAndStore(key, stream, type, expected) {
    var reader = stream.getReader();
    var chunks = [];
    var total = 0;
    function pump() {
        reader.read().then(function (r) {
            if (r.done) {
                if (expected && total !== expected) return;   // অসম্পূর্ণ — cache এ বসাব না
                var buf = new Uint8Array(total);
                var off = 0;
                for (var i = 0; i < chunks.length; i++) { buf.set(chunks[i], off); off += chunks[i].length; }
                storeBuffer(key, buf.buffer, type, expected);
                return;
            }
            chunks.push(r.value);
            total += r.value.length;
            pump();
        }).catch(function () {});
    }
    pump();
}

function handleAudio(request, key) {
    var range = request.headers.get('range');
    return caches.open(CACHE_NAME).then(function (cache) {
        return readCached(cache, key);
    }).then(function (entry) {
        if (entry) return serveFromBuffer(entry, range);

        // cache নেই। এই ফাইলটা আমাদের সামলানোর কথা কি না দেখে নিই — না হলে হাত দেব না।
        return loadManaged().then(function (set) {
            if (!set[key]) return fetch(request);

            // player এর এই request টা দিয়েই পুরো ফাইল নামিয়ে cache ভরা যায়, তাই prefetch
            // চললে সেটা থামিয়ে দিই — নইলে একই ফাইল দুই দিক থেকে নামত।
            if (!range || range === 'bytes=0-') {
                abortPrefetch(key);
                return fetchTee(key, range).then(function (res) {
                    return res || fetch(request);
                });
            }
            // মাঝখান থেকে চাওয়া range (seek) — cache তৈরি হওয়ার আগে সরাসরি server থেকেই যাক
            return fetch(request);
        });
    }).catch(function () {
        return fetch(request);
    });
}

self.addEventListener('fetch', function (event) {
    var request = event.request;
    if (request.method !== 'GET') return;
    var url;
    try { url = new URL(request.url); } catch (e) { return; }
    if (url.origin !== self.location.origin) return;
    if (!AUDIO_RE.test(url.pathname)) return;
    event.respondWith(handleAudio(request, cacheKey(request.url)));
});
