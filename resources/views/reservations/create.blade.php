<x-app-layout>
    <div class="max-w-xl mx-auto my-6 p-6 bg-white rounded shadow">
        <h2 class="text-2xl font-bold mb-4">Create Reservation</h2>
        <form action="{{ route('reservations.store') }}" method="POST">
            @csrf
            <!-- First Name -->
            <div class="mb-4">
                <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                <input type="text" id="first_name" name="first_name" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <!-- Last Name -->
            <div class="mb-4">
                <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                <input type="text" id="last_name" name="last_name" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <!-- Phone -->
            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="text" id="phone" name="phone" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <!-- Is Attending -->
            <div class="mb-4 flex items-center">
                <input type="checkbox" id="is_attending" name="is_attending" value="1" class="mr-2">
                <label for="is_attending" class="text-sm text-gray-700">Attending</label>
            </div>
            <!-- Is Paid -->
            <div class="mb-4 flex items-center">
                <input type="checkbox" id="is_paid" name="is_paid" value="1" class="mr-2">
                <label for="is_paid" class="text-sm text-gray-700">Paid</label>
            </div>
            <div class="mt-6">
                <button type="submit" class="w-full bg-black text-white px-4 py-2 rounded hover:bg-slate-600">
                    Create Reservation
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
