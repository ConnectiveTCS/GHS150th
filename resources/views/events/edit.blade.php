<x-app-layout>
    <div class="max-w-xl mx-auto my-6 p-6 bg-white rounded shadow">
        <h2 class="text-2xl font-bold mb-4">Edit Event</h2>
        <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <!-- Event Name -->
            <div class="mb-4">
                <label for="event_name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="event_name" name="event_name" required
                    value="{{ old('event_name', $event->event_name) }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <!-- Event Description -->
            <div class="mb-4">
                <label for="event_description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="event_description" name="event_description"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('event_description', $event->event_description) }}</textarea>
            </div>
            <!-- Event Date -->
            <div class="mb-4">
                <label for="event_date" class="block text-sm font-medium text-gray-700">Date</label>
                <input type="datetime-local" id="event_date" name="event_date" required
                    value="{{ old('event_date', date('Y-m-d\TH:i', strtotime($event->event_date))) }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <!-- Event Location -->
            <div class="mb-4">
                <label for="event_location" class="block text-sm font-medium text-gray-700">Location</label>
                <input type="text" id="event_location" name="event_location"
                    value="{{ old('event_location', $event->event_location) }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <!-- Image Preview -->
            <div class="mb-4">
                @if ($event->event_image)
                    <img id="current-image" src="{{ asset('storage/' . $event->event_image) }}" alt="Current Image"
                        class="w-full rounded shadow mb-2">
                @endif
                <img id="image-preview" src="#" alt="Image Preview" class="hidden w-full rounded shadow mb-2">
            </div>
            <!-- Event Image -->
            <div class="mb-4">
                <label for="event_image" class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" id="event_image" name="event_image" accept="image/*"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <!-- Event Additional Images -->
            <div class="mb-4">
                <label for="event_additional_images" class="block text-sm font-medium text-gray-700">Additional
                    Images</label>
                <input type="file" id="event_additional_images" name="event_additional_images[]" accept="image/*"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    multiple>
            </div>

            <!-- Existing Additional Images -->
            @if ($event->event_additional_images)
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Current Additional Images</label>
                    <div class="grid grid-cols-3 gap-2">
                        @foreach (json_decode($event->event_additional_images) as $image)
                            <div class="relative">
                                <img src="{{ asset('storage/' . $image) }}" alt="Additional Image"
                                    class="w-full h-32 object-cover rounded">
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Additional Images Preview -->
            <div id="additional-images-preview" class="mb-4 grid grid-cols-3 gap-2"></div>

            <div class="mt-6">
                <button type="submit" class="w-full bg-black text-white px-4 py-2 rounded hover:bg-slate-600">
                    Update Event
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

        document.getElementById('event_additional_images').addEventListener('change', function(event) {
            const previewContainer = document.getElementById('additional-images-preview');
            previewContainer.innerHTML = '';

            Array.from(event.target.files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewItem = document.createElement('div');
                    previewItem.className = 'relative';

                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'w-full h-32 object-cover rounded';

                    previewItem.appendChild(img);
                    previewContainer.appendChild(previewItem);
                };
                reader.readAsDataURL(file);
            });
        });
    </script>
</x-app-layout>
