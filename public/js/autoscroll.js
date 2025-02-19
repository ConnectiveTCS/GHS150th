document.addEventListener('DOMContentLoaded', function() {
    const images = document.querySelectorAll('.autoscroll');

    images.forEach((img) => {
        let scrollInterval;
        // Initialize scroll position in dataset
        img.dataset.pos = 0;

        img.addEventListener('mouseenter', () => {
            // Reset position on hover start
            let pos = 0;
            img.dataset.pos = pos;
            // Adjust parameters below to control auto-scroll speed:
            const intervalDelay = 200; // Delay (ms) for each step
            const step = 1;           // Amount to increment per interval

            scrollInterval = setInterval(() => {
                pos += step;
                if (pos > 100) {
                    pos = 100;
                    clearInterval(scrollInterval);
                }
                img.dataset.pos = pos;
                img.style.objectPosition = `center ${pos}%`;
            }, intervalDelay);
        });

        img.addEventListener('mouseleave', () => {
            clearInterval(scrollInterval);
            img.style.objectPosition = 'top';
            img.dataset.pos = 0;
        });

        // New: Allow user to override auto-scroll using mouse wheel.
        img.addEventListener('wheel', (e) => {
            e.preventDefault();
            // Clear auto-scroll if active.
            if (scrollInterval) {
                clearInterval(scrollInterval);
            }
            // Read current position and update based on deltaY
            let pos = parseFloat(img.dataset.pos) || 0;
            // Adjust the scaling factor below to control manual scroll sensitivity:
            const scrollFactor = 5; // Lower value = more sensitive to wheel scrolling
            pos += e.deltaY / scrollFactor;
            if (pos < 0) pos = 0;
            if (pos > 100) pos = 100;
            img.dataset.pos = pos;
            img.style.objectPosition = `center ${pos}%`;
        });
    });
});
