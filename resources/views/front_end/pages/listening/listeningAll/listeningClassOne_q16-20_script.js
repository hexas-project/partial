// JavaScript for Questions 16-20 clickable table cells with tick marks
document.addEventListener('DOMContentLoaded', function() {
    const clickableCells = document.querySelectorAll('.clickable-cell');
    
    clickableCells.forEach(cell => {
        cell.addEventListener('click', function() {
            const question = this.getAttribute('data-question');
            const value = this.getAttribute('data-value');
            const hiddenInput = document.getElementById(question);
            
            // Get all cells for this question
            const rowCells = document.querySelectorAll(`.clickable-cell[data-question="${question}"]`);
            
            // Check if this cell is already selected
            const isSelected = this.textContent === '✓';
            
            if (isSelected) {
                // Deselect - remove tick mark and clear hidden input
                this.textContent = '';
                this.style.backgroundColor = '';
                this.style.color = '';
                if (hiddenInput) {
                    hiddenInput.value = '';
                }
            } else {
                // Clear all other cells in this row first
                rowCells.forEach(c => {
                    c.textContent = '';
                    c.style.backgroundColor = '';
                    c.style.color = '';
                });
                
                // Select this cell - add tick mark
                this.textContent = '✓';
                this.style.backgroundColor = '#d4edda';
                this.style.color = '#28a745';
                this.style.fontWeight = 'bold';
                this.style.fontSize = '18px';
                
                // Update hidden input with selected value
                if (hiddenInput) {
                    hiddenInput.value = value;
                }
            }
        });
        
        // Add hover effect
        cell.addEventListener('mouseenter', function() {
            if (this.textContent !== '✓') {
                this.style.backgroundColor = '#f0f0f0';
            }
        });
        
        cell.addEventListener('mouseleave', function() {
            if (this.textContent !== '✓') {
                this.style.backgroundColor = '';
            }
        });
    });
});
