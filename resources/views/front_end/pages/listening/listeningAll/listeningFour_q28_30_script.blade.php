{{-- Questions 28-30 activation script (same as listeningThree Q29-30) --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const container = document.getElementById('q28-30-container');
        const checkboxes = container ? Array.from(container.querySelectorAll('.q28-30-checkbox')) : [];
        const q28Hidden = document.getElementById('q28');
        const q29Hidden = document.getElementById('q29');
        const q30Hidden = document.getElementById('q30');

        if (!checkboxes.length || !q28Hidden || !q29Hidden || !q30Hidden) return;

        function syncHidden() {
            const selected = checkboxes.filter(cb => cb.checked).map(cb => cb.value);
            q28Hidden.value = selected[0] || '';
            q29Hidden.value = selected[1] || '';
            q30Hidden.value = selected[2] || '';

            q28Hidden.dispatchEvent(new Event('change'));
            q29Hidden.dispatchEvent(new Event('change'));
            q30Hidden.dispatchEvent(new Event('change'));

            const targetQuestion = selected.length === 1 ? '28' : (selected.length === 2 ? '29' : (selected.length === 3 ? '30' : null));
            if (targetQuestion) {
                document.querySelectorAll('.question-link').forEach(l => l.classList.remove('active'));
                const targetLink = document.querySelector(`.question-link[data-question="${targetQuestion}"]`);
                if (targetLink) targetLink.classList.add('active');
            }
        }

        // Sync only after user interaction
        checkboxes.forEach(cb => cb.addEventListener('change', syncHidden));
    });
</script>
