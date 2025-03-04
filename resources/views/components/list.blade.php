<div class="events-list-container">
    <!-- Month Navigation -->
    <div class="flex justify-between items-center mb-6">
        <button id="prevMonthList" class="px-4 py-2 bg-[#DE2413] text-white rounded-lg hover:bg-red-700 transition">
            <img src="{{ asset('assets/angle-left-svgrepo-com.svg') }}" alt="left arrow" class="h-5 w-5">
        </button>
        <h2 id="currentMonthList" class="text-2xl font-bold text-white"></h2>
        <button id="nextMonthList" class="px-4 py-2 bg-[#DE2413] text-white rounded-lg hover:bg-red-700 transition">
            <img src="{{ asset('assets/angle-right-svgrepo-com.svg') }}" alt="right arrow" class="h-5 w-5">
        </button>
    </div>

    <!-- Events List -->
    <div id="eventsList" class="flex flex-col gap-4"></div>

    <!-- Event Details Panel -->
    <div id="eventDetailsMobile" class="mt-8 bg-white rounded-lg p-6 shadow-lg hidden">
        <div id="eventGalleryMobile" class="mb-6 hidden">
            <div class="relative">
                <div id="mainImageContainerMobile" class="w-full overflow-hidden rounded-lg mb-4 cursor-pointer">
                    <img id="eventImageMobile" src="" alt="Event image" class="w-full h-auto object-cover">
                </div>
            </div>
        </div>

        <h3 id="eventTitleMobile" class="text-xl font-bold mb-2"></h3>
        <p id="eventDateMobile" class="text-gray-600 mb-2"></p>
        <p id="eventLocationMobile" class="text-gray-600 mb-2"></p>
        <div id="eventDescriptionMobile" class="mt-4"></div>
    </div>

    <!-- Image Lightbox for Mobile -->
    <div id="imageLightboxMobile"
        class="fixed inset-0 bg-black bg-opacity-90 z-50 hidden flex items-center justify-center">
        <div class="relative max-w-4xl w-full mx-auto">
            <button id="closeLightboxMobile"
                class="absolute top-4 right-4 text-white text-3xl hover:text-gray-300 z-10">
                &times;
            </button>
            <img id="lightboxImageMobile" src="" alt="Full size image" class="max-w-full max-h-[90vh] mx-auto">
        </div>
    </div>

    <!-- Store events data for JavaScript -->
    <div id="events-data-mobile" data-events="{{ json_encode($events) }}" class="hidden"></div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get events data from hidden div
        const eventsData = JSON.parse(document.getElementById('events-data-mobile').getAttribute(
        'data-events'));

        // Current date tracking
        let currentDate = new Date();

        // Initialize list
        renderEventsList(currentDate);

        // Event listeners for navigation
        document.getElementById('prevMonthList').addEventListener('click', function() {
            currentDate.setMonth(currentDate.getMonth() - 1);
            renderEventsList(currentDate);
        });

        document.getElementById('nextMonthList').addEventListener('click', function() {
            currentDate.setMonth(currentDate.getMonth() + 1);
            renderEventsList(currentDate);
        });

        // Lightbox functionality for mobile
        const lightbox = document.getElementById('imageLightboxMobile');
        const lightboxImg = document.getElementById('lightboxImageMobile');
        const closeLightbox = document.getElementById('closeLightboxMobile');

        // Close lightbox when clicking the close button
        closeLightbox.addEventListener('click', function() {
            lightbox.classList.add('hidden');
            document.body.style.overflow = '';
        });

        // Close lightbox when clicking outside the image
        lightbox.addEventListener('click', function(e) {
            if (e.target === lightbox) {
                lightbox.classList.add('hidden');
                document.body.style.overflow = '';
            }
        });

        // Function to render events list by month
        function renderEventsList(date) {
            const year = date.getFullYear();
            const month = date.getMonth();

            // Update header
            document.getElementById('currentMonthList').textContent =
                `${new Date(year, month).toLocaleString('default', { month: 'long' })} ${year}`;

            // Get events for this month
            const eventsForMonth = eventsData.filter(event => {
                const eventDate = new Date(event.event_date);
                return eventDate.getMonth() === month && eventDate.getFullYear() === year;
            });

            // Sort events by date
            eventsForMonth.sort((a, b) => new Date(a.event_date) - new Date(b.event_date));

            // Group events by day
            const eventsByDay = {};
            eventsForMonth.forEach(event => {
                const eventDate = new Date(event.event_date);
                const dayKey = eventDate.toISOString().split('T')[0];
                if (!eventsByDay[dayKey]) {
                    eventsByDay[dayKey] = [];
                }
                eventsByDay[dayKey].push(event);
            });

            // Clear existing events list
            const eventsListContainer = document.getElementById('eventsList');
            eventsListContainer.innerHTML = '';

            // Check if there are events this month
            if (Object.keys(eventsByDay).length === 0) {
                const noEventsMsg = document.createElement('div');
                noEventsMsg.className = 'bg-white rounded-lg p-4 text-center text-gray-600';
                noEventsMsg.textContent = 'No events scheduled for this month.';
                eventsListContainer.appendChild(noEventsMsg);
                return;
            }

            // Create list items for each day with events
            Object.keys(eventsByDay).forEach(dayKey => {
                const eventsForDay = eventsByDay[dayKey];
                const dayDate = new Date(dayKey);

                // Create day header
                const dayHeader = document.createElement('div');
                dayHeader.className = 'bg-white rounded-t-lg p-4 font-bold border-b border-gray-200';
                dayHeader.textContent = dayDate.toLocaleDateString('en-US', {
                    weekday: 'long',
                    month: 'long',
                    day: 'numeric'
                });
                eventsListContainer.appendChild(dayHeader);

                // Create event items for this day
                eventsForDay.forEach((event, index) => {
                    const eventItem = document.createElement('div');
                    eventItem.className = 'bg-white p-4 hover:bg-gray-50 cursor-pointer';

                    // Add bottom rounded corners to last item of the day
                    if (index === eventsForDay.length - 1) {
                        eventItem.classList.add('rounded-b-lg', 'mb-4');
                    }

                    // Format time if available
                    let eventTime = '';
                    if (event.event_time) {
                        const timeParts = event.event_time.split(':');
                        const hours = parseInt(timeParts[0]);
                        const minutes = timeParts[1];
                        const ampm = hours >= 12 ? 'PM' : 'AM';
                        const formattedHours = hours % 12 || 12;
                        eventTime = `${formattedHours}:${minutes} ${ampm}`;
                    }

                    // Build event item content
                    eventItem.innerHTML = `
                        <div class="flex items-start">
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-900">${event.event_title}</h3>
                                ${eventTime ? `<p class="text-sm text-gray-600">${eventTime}</p>` : ''}
                                ${event.location ? `<p class="text-sm text-gray-600">${event.location}</p>` : ''}
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    `;

                    // Event click handler
                    eventItem.addEventListener('click', function() {
                        showEventDetails(event);
                    });

                    eventsListContainer.appendChild(eventItem);
                });
            });
        }

        // Function to display event details
        function showEventDetails(event) {
            const detailsPanel = document.getElementById('eventDetailsMobile');
            document.getElementById('eventTitleMobile').textContent = event.event_title;

            // Format date nicely
            const eventDate = new Date(event.event_date);
            document.getElementById('eventDateMobile').textContent = eventDate.toLocaleDateString('en-US', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });

            // Add time if available
            if (event.event_time) {
                const timeParts = event.event_time.split(':');
                const hours = parseInt(timeParts[0]);
                const minutes = timeParts[1];
                const ampm = hours >= 12 ? 'PM' : 'AM';
                const formattedHours = hours % 12 || 12;
                document.getElementById('eventDateMobile').textContent +=
                    ` at ${formattedHours}:${minutes} ${ampm}`;
            }

            // Location info if available
            document.getElementById('eventLocationMobile').textContent = event.location ?
                `Location: ${event.location}` : '';

            // Description text
            document.getElementById('eventDescriptionMobile').textContent = event.description || '';

            // Image handling
            const galleryContainer = document.getElementById('eventGalleryMobile');
            const eventImage = document.getElementById('eventImageMobile');
            const mainImageContainer = document.getElementById('mainImageContainerMobile');

            // Check if event has image
            if (event.image) {
                eventImage.src = `/storage/${event.image}`;
                galleryContainer.classList.remove('hidden');

                // Enable lightbox for the main image
                mainImageContainer.addEventListener('click', function() {
                    const lightbox = document.getElementById('imageLightboxMobile');
                    const lightboxImg = document.getElementById('lightboxImageMobile');
                    lightboxImg.src = eventImage.src;
                    lightbox.classList.remove('hidden');
                    document.body.style.overflow = 'hidden';
                });
            } else {
                galleryContainer.classList.add('hidden');
            }

            // Show the details panel
            detailsPanel.classList.remove('hidden');

            // Scroll to event details
            detailsPanel.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
</script>
