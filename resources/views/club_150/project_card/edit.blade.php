<x-app-layout>
    <div class="max-w-xl mx-auto my-6 p-6 bg-white rounded shadow">
        <h2 class="text-2xl font-bold mb-4">Edit Project Card</h2>
        <form action="{{ route('project-cards.update', $projectCard->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" id="title" name="title" required
                    value="{{ old('title', $projectCard->title) }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <!-- Current image preview -->
            <div class="mb-4">
                @if ($projectCard->image)
                    <img id="current-image" src="{{ asset('storage/' . $projectCard->image) }}" alt="Current Image"
                        class="mt-4 rounded shadow w-full">
                @endif
                <img id="image-preview" src="#" alt="Image Preview" class="hidden mt-4 rounded shadow w-full">
            </div>
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" id="image" name="image" accept="image/*"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="description" name="description"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('description', $projectCard->description) }}</textarea>
            </div>
            <div class="mb-4">
                <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
                <input type="number" id="position" name="position"
                    value="{{ old('position', $projectCard->position) }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="completion_percentage" class="block text-sm font-medium text-gray-700">Completion
                    Percentage</label>
                <input type="text" id="completion_percentage" name="completion_percentage"
                    value="{{ old('completion_percentage', $projectCard->completion_percentage) }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="project_timeline" class="block text-sm font-medium text-gray-700">Project Timeline</label>
                <input type="text" id="project_timeline" name="project_timeline"
                    value="{{ old('project_timeline', $projectCard->project_timeline) }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                {{-- <input type="text" id="status" name="status"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"> --}}
                    <select name="status" id="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="current">Current</option>
                        <option value="upcoming">Upcoming</option>
                        <option value="completed">Completed</option>
                    </select>
            </div> 
            <div class="mt-6">
                <button type="submit"
                    class="w-full bg-black text-white px-4 py-2 rounded hover:bg-slate-600">
                    Update Project Card
                </button>
            </div>
        </form>
    </div>
    <script>
        document.getElementById('image').addEventListener('change', function(event) {
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
