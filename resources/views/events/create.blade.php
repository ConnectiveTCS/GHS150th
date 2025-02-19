<x-app-layout>
    <div class="max-w-xl mx-auto my-6 p-6 bg-white rounded shadow">
        <h2 class="text-2xl font-bold mb-4">Create Event</h2>
        <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Event Name -->
            <div class="mb-4">
                <label for="event_name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="event_name" name="event_name" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <!-- Event Description -->
            <div class="mb-4">
                <label for="event_description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="event_description" name="event_description" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>
            <!-- Event Date -->
            <div class="mb-4">
                <label for="event_date" class="block text-sm font-medium text-gray-700">Date</label>
                <input type="datetime-local" id="event_date" name="event_date" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <!-- Event Location -->
            <div class="mb-4">
                <label for="event_location" class="block text-sm font-medium text-gray-700">Location</label>
                <input type="text" id="event_location" name="event_location" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <!-- Image Preview -->
            <div class="mb-4">
                <img id="image-preview" src="#" alt="Image Preview" class="hidden w-full rounded shadow mb-2">
            </div>
            <!-- Event Image -->
            <div class="mb-4">
                <label for="event_image" class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" id="event_image" name="event_image" accept="image/*"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mt-6">
                <button type="submit"
                    class="w-full bg-black text-white px-4 py-2 rounded hover:bg-slate-600">
                    Create Event
                </button>
            </div>
        </form>
    </div>
    <script>
        document.getElementById('event_image').addEventListener('change', function(event) {
            const [file] = event.target.files;
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('image-preview');
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</x-app-layout>
