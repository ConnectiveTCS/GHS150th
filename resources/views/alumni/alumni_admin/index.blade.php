<x-app-layout>
    <div class="max-w-6xl mx-auto px-4 sm:px-6 py-6 min-h-[80vh]">
        <div class="flex flex-col md:flex-col gap-2 justify-between items-center mb-6">
            <h2 class="text-3xl font-bold">Alumni Network</h2>
            <a href="{{ route('alumni.create') }}" class="bg-black text-white px-4 py-2 rounded hover:bg-slate-600">
                Create New Alumn
            </a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($alumnis as $alumni)
                <div class="bg-white rounded shadow p-4">
                    @if ($alumni->profile_picture)
                        <img src="/storage/{{ $alumni->profile_picture }}" alt="{{ $alumni->first_name }}'s profile picture"
                            class="w-full h-48 md:h-64 md:w-64 rounded-full object-cover mb-4 center place-self-center shadow-md">
                    @else
                        <div class="w-full h-48 bg-gray-200 rounded mb-4 flex items-center justify-center">
                            <span class="text-gray-500">No Image</span>
                        </div>
                    @endif
                    <h3 class="text-xl font-semibold mb-2">{{ $alumni->first_name }} {{ $alumni->last_name }}</h3>
                    <p class="text-gray-700 mb-4">{{ substr($alumni->bio, 0, 100)}}...</p>
                    <div class="flex justify-between">
                        <a href="{{ route('alumni.edit', $alumni->id) }}"
                            class="text-blue-500 hover:text-blue-700">Edit</a>
                        <form action="{{ route('alumni.destroy', $alumni->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
