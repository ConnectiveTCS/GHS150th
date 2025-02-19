<x-app-layout>
    <div class="max-w-6xl mx-auto px-4 py-6 min-h-[80vh]">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold">Project Cards</h2>
            <a href="/create"
                class="bg-black text-white px-4 py-2 rounded hover:bg-slate-600">
                Create New Card
            </a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($projectCards as $card)
                <div class="bg-white rounded shadow p-4">
                    @if ($card->image)
                        <img src="{{ asset('storage/' . $card->image) }}" alt="{{ $card->title }}"
                            class="w-full h-48 object-cover rounded mb-4">
                    @else
                        <div class="w-full h-48 bg-gray-200 rounded mb-4 flex items-center justify-center">
                            <span class="text-gray-500">No Image</span>
                        </div>
                    @endif
                    <h3 class="text-xl font-semibold mb-2">{{ $card->title }}</h3>
                    <p class="text-gray-700 mb-4">{{ $card->description }}</p>
                    <div class="flex justify-between">
                        <a href="{{ route('project-cards.edit', $card->id) }}"
                            class="text-blue-500 hover:text-blue-700">Edit</a>
                        <form action="{{ route('project-cards.destroy', $card->id) }}" method="POST"
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
