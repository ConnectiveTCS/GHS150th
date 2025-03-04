<!-- Calendar Component -->
<div class="calendar-container w-full text-black">
    <!-- Month Navigation -->
    <div class="flex justify-between items-center mb-6">
        <button id="prevMonth" class="px-4 py-2 bg-[#DE2413] text-white rounded-lg hover:bg-red-700 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 011.414 0z"
                    clip-rule="evenodd" />
            </svg>
        </button>
        <h2 id="currentMonth" class="text-2xl font-bold text-white"></h2>
        <button id="nextMonth" class="px-4 py-2 bg-[#DE2413] text-white rounded-lg hover:bg-red-700 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd" />
            </svg>
        </button>
    </div>

    <!-- Calendar Grid -->
    <div class="calendar-grid grid grid-cols-7 gap-2">
        <!-- Day headers -->
        <div class="font-bold text-center p-2 text-white">Sun</div>
        <div class="font-bold text-center p-2 text-white">Mon</div>
        <div class="font-bold text-center p-2 text-white">Tue</div>
        <div class="font-bold text-center p-2 text-white">Wed</div>
        <div class="font-bold text-center p-2 text-white">Thu</div>
        <div class="font-bold text-center p-2 text-white">Fri</div>
        <div class="font-bold text-center p-2 text-white">Sat</div>

        <!-- Calendar cells will be generated with JavaScript -->
    </div>

    <!-- Event Details with Gallery -->
    <div id="eventDetails" class="mt-8 bg-white rounded-lg p-6 shadow-lg hidden">
        <!-- Event Image Gallery -->
        <div id="eventGallery" class="mb-6 hidden">
            <!-- Main Gallery Container -->
            <div class="relative">
                <!-- Main Image Display -->
                <div id="mainImageContainer" class="w-full overflow-hidden rounded-lg mb-4">
                    <img id="eventImage" src="" alt="Event image" class="w-full h-auto object-cover">
                </div>

                <!-- Thumbnails Container for Additional Images -->
                <div id="additionalImagesContainer" class="grid grid-cols-5 gap-3 mt-4"></div>
            </div>
        </div>

        <h3 id="eventTitle" class="text-xl font-bold mb-2"></h3>
        <p id="eventDate" class="text-gray-600 mb-2"></p>
        <p id="eventLocation" class="text-gray-600 mb-2"></p>
        <div id="eventDescription" class="mt-4"></div>
    </div>

    <!-- Store events data for JavaScript -->
    <div id="events-data" data-events="{{ json_encode($events) }}" class="hidden"></div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get events data from hidden div
        const eventsData = JSON.parse(document.getElementById('events-data').getAttribute('data-events'));

        // Current date tracking
        let currentDate = new Date();

        // Initialize calendar
        renderCalendar(currentDate);

        // Event listeners for navigation
        document.getElementById('prevMonth').addEventListener('click', function() {
            currentDate.setMonth(currentDate.getMonth() - 1);
            renderCalendar(currentDate);
        });

        document.getElementById('nextMonth').addEventListener('click', function() {
            currentDate.setMonth(currentDate.getMonth() + 1);
            renderCalendar(currentDate);
        });

        // Function to render calendar
        function renderCalendar(date) {
            const year = date.getFullYear();
            const month = date.getMonth();

            // Update header
            document.getElementById('currentMonth').textContent =
                `${new Date(year, month).toLocaleString('default', { month: 'long' })} ${year}`;

            // Get first day of month and total days
            const firstDayOfMonth = new Date(year, month, 1).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();

            // Clear existing calendar cells
            const calendarGrid = document.querySelector('.calendar-grid');
            const dayCells = calendarGrid.querySelectorAll('.day-cell');
            dayCells.forEach(cell => cell.remove());

            // Create empty cells for days before the 1st of the month
            for (let i = 0; i < firstDayOfMonth; i++) {
                const emptyCell = document.createElement('div');
                emptyCell.className = 'day-cell bg-gray-700 p-2 min-h-[100px] rounded';
                calendarGrid.appendChild(emptyCell);
            }

            // Create cells for each day of the month
            for (let day = 1; day <= daysInMonth; day++) {
                const dayCell = document.createElement('div');
                dayCell.className =
                    'day-cell bg-gray-800 p-2 min-h-[100px] rounded border border-gray-700 hover:border-[#DE2413] transition-colors';

                // Add day number
                const dayNumber = document.createElement('div');
                dayNumber.className = 'font-bold text-right text-white';
                dayNumber.textContent = day;
                dayCell.appendChild(dayNumber);

                // Find events for this day
                const eventsForDay = eventsData.filter(event => {
                    const eventDate = new Date(event.event_date);
                    return eventDate.getDate() === day &&
                        eventDate.getMonth() === month &&
                        eventDate.getFullYear() === year;
                });

                // Add events to the day cell
                if (eventsForDay.length > 0) {
                    dayCell.classList.add('cursor-pointer', 'event-day');

                    const eventsList = document.createElement('div');
                    eventsList.className = 'mt-1';

                    eventsForDay.forEach(event => {
                        const eventItem = document.createElement('div');
                        const themeColor = event.event_theme === 'blue' ? 'bg-blue-600' :
                            (event.event_theme === 'red' ? 'bg-[#DE2413]' : 'bg-[#DE2413]');
                        eventItem.className =
                            `p-1 mb-1 rounded text-xs text-white ${themeColor} truncate`;
                        eventItem.textContent = event.event_title;
                        eventItem.dataset.event = JSON.stringify(event);

                        // Event click handler
                        eventItem.addEventListener('click', function(e) {
                            e.stopPropagation();
                            showEventDetails(event);
                        });

                        eventsList.appendChild(eventItem);
                    });

                    dayCell.appendChild(eventsList);

                    // Day cell click handler (show first event)
                    dayCell.addEventListener('click', function() {
                        showEventDetails(eventsForDay[0]);
                    });
                }

                calendarGrid.appendChild(dayCell);
            }

            // Function to display event details
            function showEventDetails(event) {
                const detailsPanel = document.getElementById('eventDetails');
                document.getElementById('eventTitle').textContent = event.event_title;

                // Format date nicely
                const eventDate = new Date(event.event_date);
                document.getElementById('eventDate').textContent = eventDate.toLocaleDateString('en-US', {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });

                // Location info if available
                document.getElementById('eventLocation').textContent = event.location ?
                    `Location: ${event.location}` : '';

                // Description text
                document.getElementById('eventDescription').textContent = event.description || '';

                // Image gallery
                const galleryContainer = document.getElementById('eventGallery');
                const eventImage = document.getElementById('eventImage');
                const additionalImagesContainer = document.getElementById('additionalImagesContainer');

                // Clear any existing thumbnails
                additionalImagesContainer.innerHTML = '';

                // Check if event has additional images
                if (event.additional_images && Array.isArray(event.additional_images) && event.additional_images
                    .length > 0) {
                    // Set the main image to the first additional image
                    eventImage.src = `/storage/${event.additional_images[0]}`;

                    // Create thumbnails for all additional images
                    event.additional_images.forEach((imagePath, index) => {
                        const thumbnail = document.createElement('div');
                        thumbnail.className =
                            'thumbnail-container cursor-pointer border-2 border-transparent hover:border-red-500 transition-all rounded overflow-hidden';

                        if (index === 0) {
                            thumbnail.classList.add('border-red-500'); // Highlight the first thumbnail
                        }

                        const thumbImg = document.createElement('img');
                        thumbImg.src = `/storage/${imagePath}`;
                        thumbImg.alt = `Event image ${index + 1}`;
                        thumbImg.className = 'w-full h-16 object-cover';
                        thumbImg.dataset.imagePath = imagePath;

                        // Add the click event handler
                        thumbnail.onclick = function() {
                            // Update main image
                            eventImage.src = `/storage/${imagePath}`;

                            // Update active thumbnail styling
                            document.querySelectorAll(
                                '#additionalImagesContainer .thumbnail-container').forEach(
                            el => {
                                el.classList.remove('border-red-500');
                            });
                            thumbnail.classList.add('border-red-500');
                        };

                        thumbnail.appendChild(thumbImg);
                        additionalImagesContainer.appendChild(thumbnail);
                    });

                    galleryContainer.classList.remove('hidden');
                } else if (event.image) {
                    // If no additional images but has main image, show it
                    eventImage.src = `/storage/${event.image}`;
                    galleryContainer.classList.remove('hidden');
                } else {
                    // Hide the gallery if no image
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
        }
    });
</script>
