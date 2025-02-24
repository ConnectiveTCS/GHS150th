<div class="project-card md:hidden block bg-slate-950 rounded-t-md rounded-b-2xl md:rounded-md p-4 sm:p-6" data-category="{{ strtolower($card->status ?? 'current') }}">
    <div class="flex flex-col md:flex-row p-4 rounded-lg">
        <div class="flex flex-col grow">
            <h2 class="text-2xl font-bold mb-2 montagu-slab-h1 text-left text-white">
                {{ $card->title ?? 'The Garden Revival' }}
            </h2>
            <img src="/storage/{{ $card->image }}" alt="Garden Revival"
                class="w-full md:w-full h-auto md:h-[400px] rounded-lg">
        </div>
        <div class="md:ml-6 flex flex-col items-center justify-center text-white text-center grow-0">
            <p class="my-4 text-lg md:text-2xl">
                {{ $card->description ?? 'Revamping the school’s garden, introducing indigenous plants and interactive learning stations for educational purposes.' }}
            </p>
            <p class="text-gray-300">
                {{ $card->project_timeline ?? '📅 Oct – Dec 2026' }}
            </p>
            <p class="text-gray-300">
                {{ $card->completion_percentage ?? '🏗️ 75% Completion' }}% Completion
            </p>


            <hr class=" border-red-500 w-[70%] justify-self-center my-8">
        </div>
    </div>
</div>
<div class="project-card md:block hidden bg-slate-950 rounded-t-md rounded-b-2xl md:rounded-md p-4 sm:p-6" data-category="{{ strtolower($card->status ?? 'current') }}">
    <div class="grid grid-cols-2 md:flex-row p-4 rounded-lg">
        <div class="flex flex-col grow col-span-1">
            <h2 class="text-2xl font-bold mb-2 montagu-slab-h1 text-left text-white">
                {{ $card->title ?? 'The Garden Revival' }}
            </h2>
            <img src="/storage/{{ $card->image }}" alt="Garden Revival"
                class="w-full md:w-full h-auto md:h-[400px] rounded-lg">
        </div>
        <div class="md:ml-6 flex flex-col items-center justify-center text-white text-center col-span-1">
            <p class="my-4 text-lg md:text-2xl">
                {{ $card->description ?? 'Revamping the school’s garden, introducing indigenous plants and interactive learning stations for educational purposes.' }}
            </p>
            <p class="text-gray-300">
                {{ $card->project_timeline ?? '📅 Oct – Dec 2026' }}
            </p>
            <p class="text-gray-300">
                {{ $card->completion_percentage ?? '🏗️ 75% Completion' }}% Completion
            </p>


            <hr class=" border-red-500 w-[70%] justify-self-center my-8">
        </div>
    </div>
</div>
