<x-app-layout>
    <div class="max-w-6xl mx-auto px-4 py-6 min-h-[80vh]">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold">Reservations</h2>
            <a href="{{ route('reservations.create') }}" class="bg-black text-white px-4 py-2 rounded hover:bg-slate-600">
                Create New Reservation
            </a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($reservations as $reservation)
                <div class="bg-white rounded shadow p-4">
                    <h3 class="text-xl font-semibold mb-2">
                        {{ $reservation->first_name }} {{ $reservation->last_name }}
                    </h3>
                    <p class="text-gray-700 mb-1">Email: {{ $reservation->email }}</p>
                    <p class="text-gray-700 mb-1">Phone: {{ $reservation->phone }}</p>
                    <p class="text-gray-700 mb-1">Year Group: {{ $reservation->class_of ?? '2010'}}</p>
                    <p class="text-gray-700 mb-4">Paid: {{ $reservation->is_paid ? 'Yes' : 'No' }}</p>
                    <div class="flex justify-between">
                        <a href="{{ route('reservations.edit', $reservation->id) }}"
                            class="text-blue-500 hover:text-blue-700">
                            Edit
                        </a>
                        <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
