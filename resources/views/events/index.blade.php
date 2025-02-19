<x-app-layout>
    <div class="max-w-6xl mx-auto px-4 py-6 min-h-[80vh]">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold">Events</h2>
            <a href="{{ route('events.create') }}" class="bg-black text-white px-4 py-2 rounded hover:bg-slate-600">
                Create New Event
            </a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($events as $event)
                <div class="bg-white rounded shadow p-4">
                    @if ($event->event_image)
                        <img src="{{ asset('storage/' . $event->event_image) }}" alt="{{ $event->event_name }}"
                            class="w-full h-48 object-cover rounded mb-4">
                    @else
                        <div class="w-full h-48 bg-gray-200 rounded mb-4 flex items-center justify-center">
                            <span class="text-gray-500">No Image</span>
                        </div>
                    @endif
                    <h3 class="text-xl font-semibold mb-2">{{ $event->event_name }}</h3>
                    <p class="text-gray-700 mb-4">{{ $event->event_description }}</p>
                    <div class="flex justify-between">
                        <a href="{{ route('events.edit', $event->id) }}" class="text-blue-500 hover:text-blue-700">
                            Edit
                        </a>
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST"
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
