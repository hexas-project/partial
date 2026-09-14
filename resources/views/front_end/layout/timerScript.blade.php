{{-- Timer countdown and auto-submit script only --}}

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const timerElement = document.getElementById('timer');
        // Find any form with writing.submit action
        const testForm = document.querySelector('form[action*="writing/submit"]') || 
                        document.getElementById('taskoneClassThree') || 
                        document.getElementById('taskoneClassFour') ||
                        document.getElementById('taskoneClassEight') ||
                        document.getElementById('taskoneClassNine') ||
                        document.getElementById('testForm');

        // Only start timer if not already started
        if (!window.__hexasTimerStarted) {
            let timeLeft = 60 * 60; // 60 minutes in seconds
            let countdown;

            // Listen for start button click
            const startButton = document.getElementById('startTestButton');
            if (startButton) {
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
                        
                        if (timerElement) {
                            timerElement.textContent = `${mins < 10 ? '0' : ''}${mins} : ${secs < 10 ? '0' : ''}${secs} minutes remaining`;
                        }
                        
                        timeLeft--;
                        
                        if (timeLeft < 0) {
                            clearInterval(countdown);
                            if (timerElement) {
                                timerElement.textContent = "Time's up!";
                            }
                            
                            // Create custom notification popup
                            const notification = document.createElement('div');
                            notification.style.cssText = `
                                position: fixed;
                                top: 50%;
                                left: 50%;
                                transform: translate(-50%, -50%);
                                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                                color: white;
                                padding: 30px 50px;
                                border-radius: 15px;
                                font-size: 18px;
                                font-weight: 600;
                                z-index: 10000;
                                box-shadow: 0 10px 40px rgba(0,0,0,0.3);
                                text-align: center;
                            `;
                            notification.innerHTML = '⏰ Time\'s up!<br>Auto-submitting your test...';
                            document.body.appendChild(notification);
                            
                            // Auto-submit after 2 seconds
                            setTimeout(() => {
                                if (testForm) {
                                    testForm.submit();
                                }
                            }, 2000);
                        }
                    }, 1000);
                    
                    window.__hexasCountdown = countdown;
                });
            }
        }
    });
</script>
