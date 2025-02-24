<x-app-layout>
    <div class="max-w-xl w-full mx-auto my-6 p-4 sm:p-6 md:p-8 bg-white rounded shadow">
        <h2 class="text-2xl font-bold mb-4">Create Alumni Profile</h2>
        <form action="{{ route('alumni.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Profile Picture Container with clickable id -->
            <div id="profile_picture_container" class="mb-4">
                <img id="image-preview"
                    src="https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png"
                    alt="Image Preview" class="mt-4 rounded-full shadow w-[200px] h-[200px] object-cover">
            </div>
            <div class="mb-4">
                <label for="profile_picture" class="block text-sm font-medium text-gray-700">Profile Picture</label>
                <input type="file" id="profile_picture" name="profile_picture"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="first_name" class="block text-sm font-medium text-gray-700">Firt Name <span class="text-red-500">*</span></label>
                <input type="text" id="first_name" name="first_name" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    value="{{ explode(' ', $users->name)[0] }}" readonly>
            </div>
            <div class="mb-4">
                <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name (Maiden Name)<span class="text-red-500">*</span></label>
                <input type="text" id="last_name" name="last_name" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    value="{{ explode(' ', $users->name)[1] }}">
            </div>
            <div class="mb-4">
                <label for="id_number" class="block text-sm font-medium text-gray-700">ID Number</label>
                <input type="text" id="id_number" name="id_number" maxlength="13"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                <textarea id="bio" name="bio"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email<span class="text-red-500">*</span></label>
                <input type="text" id="email" name="email"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    value="{{ $users->email }}" readonly>
            </div>
            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number<span class="text-red-500">*</span></label>
                <input type="text" id="phone" name="phone"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="class_of" class="block text-sm font-medium text-gray-700">Class Of<span class="text-red-500">*</span></label>
                <input type="number" name="class_of" min="1875" max="2025" step="1" placeholder="YYYY"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="current_employer" class="block text-sm font-medium text-gray-700">Current Employer</label>
                <input type="text" id="current_employer" name="current_employer" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="current_position" class="block text-sm font-medium text-gray-700">Current Job
                    Description</label>
                <input type="text" id="current_position" name="current_position" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="current_location" class="block text-sm font-medium text-gray-700">Current Location</label>
                <input type="text" id="current_location" name="current_location" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mt-6">
                <button type="submit" class="w-full bg-black text-white px-4 py-2 rounded hover:bg-slate-600">
                    Create Alumni Profile
                </button>
            </div>
        </form>
    </div>
    <script>
        // Trigger file picker when the profile picture container is clicked
        document.getElementById('profile_picture_container').addEventListener('click', function() {
            document.getElementById('profile_picture').click();
        });
        // Image preview on file input change
        document.getElementById('profile_picture').addEventListener('change', function(event) {
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
