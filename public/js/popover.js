document.addEventListener('DOMContentLoaded', function() {
    const popoverTriggers = document.querySelectorAll('[data-popover]');
    const popoverContainer = document.getElementById('website-popover');
    const iframe = document.getElementById('website-iframe');
    let timeout;
    
    popoverTriggers.forEach(trigger => {
        trigger.addEventListener('mouseenter', function() {
            const url = this.getAttribute('data-popover');
            iframe.src = url;
            popoverContainer.classList.remove('hidden');
            
            // Position the popover above the element
            const rect = this.getBoundingClientRect();
            popoverContainer.style.bottom = (window.innerHeight - rect.top + 10) + 'px';
            popoverContainer.style.left = (rect.left + rect.width/2 - 150) + 'px';
            
            clearTimeout(timeout);
        });
        
        trigger.addEventListener('mouseleave', function() {
            timeout = setTimeout(() => {
                popoverContainer.classList.add('hidden');
            }, 300);
        });
    });
    
    popoverContainer.addEventListener('mouseenter', function() {
        clearTimeout(timeout);
    });
    
    popoverContainer.addEventListener('mouseleave', function() {
        popoverContainer.classList.add('hidden');
    });
    
    // Close popover when clicking outside
    document.addEventListener('click', function(e) {
        if (!popoverContainer.contains(e.target) && 
            !Array.from(popoverTriggers).some(el => el.contains(e.target))) {
            popoverContainer.classList.add('hidden');
        }
    });
});
