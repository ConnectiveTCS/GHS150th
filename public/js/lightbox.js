document.addEventListener("DOMContentLoaded", function() {
    // Create lightbox overlay
    const lightboxOverlay = document.createElement('div');
    lightboxOverlay.id = 'lightbox-overlay';
    lightboxOverlay.style.display = 'none';
    lightboxOverlay.style.position = 'fixed';
    lightboxOverlay.style.top = 0;
    lightboxOverlay.style.left = 0;
    lightboxOverlay.style.width = '100%';
    lightboxOverlay.style.height = '100%';
    lightboxOverlay.style.backgroundColor = 'rgba(0, 0, 0, 0.8)';
    lightboxOverlay.style.alignItems = 'center';
    lightboxOverlay.style.justifyContent = 'center';
    lightboxOverlay.style.zIndex = 1000;
    lightboxOverlay.innerHTML = '<img id="lightbox-image" style="max-width: 90%; max-height: 90%;">';
    document.body.appendChild(lightboxOverlay);

    // Close lightbox on click
    lightboxOverlay.addEventListener('click', () => {
        lightboxOverlay.style.display = 'none';
    });

    // Open lightbox on container click
    const imageContainers = document.querySelectorAll('.image-container');
    imageContainers.forEach(container => {
        container.addEventListener('click', function(e) {
            // Prevent triggering if user is just scrolling (optional)
            if (e.target.tagName.toLowerCase() === 'img' || e.target.classList.contains('overlay')) {
                const img = container.querySelector('img');
                const lightboxImg = document.getElementById('lightbox-image');
                lightboxImg.src = img.src;
                lightboxOverlay.style.display = 'flex';
            }
        });
    });
});
