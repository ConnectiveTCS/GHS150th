
        <form action="{{ route('sharestory.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <!-- Event Description -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" name="email"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <!-- Event Date -->
            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                <input type="text" id="phone" name="phone" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <!-- Event Date -->
            <div class="mb-4">
                <label for="class_of" class="block text-sm font-medium text-gray-700">Class Of</label>
                <input type="number" id="class_of" name="class_of" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" min="1900" max="2099" step="1" maxlength="4" placeholder="1992">
            </div>
            <!-- Event Location -->
            <div class="mb-4">
                <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                <textarea id="message" name="message"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>
            <div class="mt-6">
                <button type="submit" class="w-full bg-black text-white px-4 py-2 rounded hover:bg-slate-600">
                    Submit
                </button>
            </div>
        </form>