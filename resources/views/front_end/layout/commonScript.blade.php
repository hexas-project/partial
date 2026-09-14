    {{-- alart and timer script and finished test script  --}}

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const startModal = new bootstrap.Modal(document.getElementById('startModal'));
        const finishModal = new bootstrap.Modal(document.getElementById('finishModal'));
        const startButton = document.getElementById('startTestButton');
        const finishButton = document.getElementById('finishButton');
        const continueButton = document.getElementById('continueButton');
        const timerElement = document.getElementById('timer');
        const testForm = document.getElementById('testForm');

        let timeLeft = 60 * 60; // 60 minutes in seconds
        let countdown;

        // Show start modal on page load
        startModal.show();

        // Start test: start timer when OK button is clicked
        startButton.addEventListener('click', function() {
            if (window.__hexasTimerStarted) return;
            window.__hexasTimerStarted = true;
            if (window.__hexasCountdown) {
                clearInterval(window.__hexasCountdown);
                window.__hexasCountdown = null;
            }
            countdown = setInterval(() => {
                const mins = Math.floor(timeLeft / 60);
                const secs = timeLeft % 60;
                timerElement.textContent =
                    `${mins < 10 ? '0' : ''}${mins} : ${secs < 10 ? '0' : ''}${secs} minutes remaining`;
                timeLeft--;
                if (timeLeft < 0) {
                    clearInterval(countdown);
                    timerElement.textContent = "Time's up!";
                    alert("⏰ Time's up! Auto-submitting your test...");
                    testForm.submit();
                }
            }, 1000);
            window.__hexasCountdown = countdown;
        });

        // Show finish modal when Finish Test button clicked
        finishButton.addEventListener('click', function(e) {
            e.preventDefault();
            finishModal.show();
        });

        // When user clicks "Continue" → submit form
        let __hexasSubmittingTest = false;
        continueButton.addEventListener('click', function() {
            if (__hexasSubmittingTest) return;
            __hexasSubmittingTest = true;
            continueButton.disabled = true;
            testForm.submit();
        });

        // ---- AUTOSAVE EKHAN THEKE SORANO HOLO ----
        // Ekhane ekta autosave chilo ja SOB SOMOY `reading.autosave` e pathato, ar
        // shurutei `if (!auth()->id()) return;` kore theme jeto. Student ra auth()
        // diye login kore na (batch session diye kore), tai eta kono din-i chaleni.
        //
        // Ei layout ta reading AR writing — duita page eI include kora hoy. Chalu kore
        // dile writing page theke `reading.autosave` e request jeto ar `readings`
        // table e writing er test_name diye bhul row toiri hoto.
        //
        // Dorkar-o nei: ei layout byabohar kora protita page er NIJER autosave ache
        // (reading page gulo reading.autosave e, writing page gulo writing.autosave e).
        // Ekmatro readingUnified/writingUnified er nei, kintu oi duita file kono
        // route eI use hoy na.

    });
</script>