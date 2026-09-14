// Drag and Drop for Questions 31-40 with swap functionality
document.addEventListener('DOMContentLoaded', function() {
    const draggableFeatures = document.querySelectorAll('.draggable-q31');
    const dropZones = document.querySelectorAll('.drop-zone-q31');
    let draggedElement = null;
    let draggedFromInput = false;
    
    // Function to calculate input width based on text content
    function calculateInputWidth(text) {
        // Create temporary span to measure text width
        const span = document.createElement('span');
        span.style.visibility = 'hidden';
        span.style.position = 'absolute';
        span.style.whiteSpace = 'nowrap';
        span.style.padding = '8px 16px';
        span.style.fontSize = window.getComputedStyle(document.querySelector('.drop-zone-q31')).fontSize;
        span.textContent = text;
        document.body.appendChild(span);
        const width = span.offsetWidth;
        document.body.removeChild(span);
        return width + 10; // Add small buffer
    }
    
    // Function to update input style based on whether it has a value
    function updateInputStyle(input) {
        if (input.value && input.value.trim() !== '') {
            // Calculate dynamic width based on content
            const dynamicWidth = calculateInputWidth(input.value);
            // Has value - apply shadow, remove border, dynamic width
            input.setAttribute('style', `padding: 8px 16px; width: ${dynamicWidth}px; margin: 0 5px; border-radius: 4px; border: none !important; box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.08) !important; background: #e8e8e8 !important;`);
        } else {
            // Empty - restore border, remove shadow
            input.setAttribute('style', 'padding: 8px 12px; width: 150px; margin: 0 5px; border: 1px solid #ccc; border-radius: 4px; box-shadow: none; background: white;');
        }
    }
    
    // Add drag events to draggable features
    draggableFeatures.forEach(feature => {
        feature.addEventListener('dragstart', function(e) {
            draggedElement = this;
            draggedFromInput = false;
            e.dataTransfer.setData('text/plain', this.getAttribute('data-value'));
            e.dataTransfer.setData('element-id', this.getAttribute('data-value'));
            this.style.opacity = '0.4';
        });
        
        feature.addEventListener('dragend', function(e) {
            this.style.opacity = '1';
        });
    });
    
    // Add drop events to input fields
    dropZones.forEach(zone => {
        // Make inputs draggable to drag back to list
        zone.setAttribute('draggable', 'true');
        
        zone.addEventListener('dragstart', function(e) {
            if (this.value) {
                draggedFromInput = true;
                draggedElement = this;
                e.dataTransfer.setData('text/plain', this.value);
                e.dataTransfer.setData('from-input', 'true');
                this.style.opacity = '0.4';
            } else {
                e.preventDefault();
            }
        });
        
        zone.addEventListener('dragend', function(e) {
            this.style.opacity = '1';
        });
        
        zone.addEventListener('dragover', function(e) {
            e.preventDefault();
            e.dataTransfer.dropEffect = 'move';
            this.style.backgroundColor = '#e3f2fd';
            this.style.borderColor = '#2196F3';
        });
        
        zone.addEventListener('dragleave', function(e) {
            this.style.backgroundColor = '';
            this.style.borderColor = '#ccc';
        });
        
        zone.addEventListener('drop', function(e) {
            e.preventDefault();
            const value = e.dataTransfer.getData('text/plain');
            const fromInput = e.dataTransfer.getData('from-input');
            
            // If there's already a value in this input, return it to the list
            if (this.value && this.value.trim() !== '') {
                const oldValue = this.value;
                // Find and show the feature with this value
                draggableFeatures.forEach(feature => {
                    if (feature.getAttribute('data-value') === oldValue) {
                        feature.style.display = 'inline-block';
                    }
                });
            }
            
            // Set new value
            this.value = value;
            
            // Hide the dragged feature from list (if not from input)
            if (!fromInput && draggedElement) {
                draggedElement.style.display = 'none';
            }
            
            // If dragged from input, clear that input and restore its border
            if (fromInput && draggedElement && draggedElement !== this) {
                draggedElement.value = '';
                updateInputStyle(draggedElement);
            }
            
            // Apply shadow style immediately
            updateInputStyle(this);

            if (typeof window.setActiveQuestionByNumber === 'function') {
                window.setActiveQuestionByNumber(this.id);
            }
            
            // Brief green flash for feedback
            this.style.backgroundColor = '#e8f5e9';
            setTimeout(() => {
                updateInputStyle(this);
            }, 300);
        });
    });
    
    // Allow dropping back to the list area
    const listContainer = document.querySelector('.col-md-5');
    if (listContainer) {
        listContainer.addEventListener('dragover', function(e) {
            const fromInput = e.dataTransfer.types.includes('from-input');
            if (fromInput) {
                e.preventDefault();
                e.dataTransfer.dropEffect = 'move';
            }
        });
        
        listContainer.addEventListener('drop', function(e) {
            const fromInput = e.dataTransfer.getData('from-input');
            if (fromInput && draggedElement) {
                e.preventDefault();
                const value = e.dataTransfer.getData('text/plain');
                
                // Show the feature back in list
                draggableFeatures.forEach(feature => {
                    if (feature.getAttribute('data-value') === value) {
                        feature.style.display = 'inline-block';
                    }
                });
                
                // Clear the input and restore border style
                if (draggedElement.tagName === 'INPUT') {
                    draggedElement.value = '';
                    updateInputStyle(draggedElement);
                }
            }
        });
    }
    
    // Initialize all input styles on page load
    dropZones.forEach(zone => {
        updateInputStyle(zone);
    });
});
