<div class="project-card bg-slate-950 rounded-md" data-category="{{ strtolower($card->status ?? 'current') }}">
    <div class="flex flex-col md:flex-row  p-4 rounded-lg">
        <div class="flex flex-col">
            <h2 class="text-2xl font-bold mb-2 montagu-slab-h1 text-left text-white">
                {{ $card->title ?? 'The Garden Revival' }}
            </h2>
            <img src="/storage/{{ $card->image }}" alt="Garden Revival" class=" h-[400px] min-w-[800px] md:w-1/3 rounded-lg">
        </div>
        <div class="md:ml-6 flex flex-col items-center justify-center text-white text-center w-full">
            <p class="mb-4 text-2xl">
                {{ $card->description ?? 'Revamping the school’s garden, introducing indigenous plants and interactive learning stations for educational purposes.' }}
            </p>
            <p class="text-gray-300">
                {{ $card->project_timeline ?? '📅 Oct – Dec 2026' }}
            </p>
            <p class="text-gray-300">
                {{ $card->completion_percentage ?? '🏗️ 75% Completion' }}% Completion
            </p>
        </div>
    </div>
</div>
