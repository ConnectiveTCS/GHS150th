<div class="project-card bg-white rounded-md  rounded-t-md rounded-b-2xl md:rounded-md md:p-4 sm:p-6"
    data-category="{{ strtolower($event->status ?? 'current') }}">
    <div class="flex flex-col py-1 md:p-y rounded-lg">
        <h2 class="text-2xl font-bold text-black">
            {{ $day }} | {{ $event->event_name }}
        </h2>
        <p class="text-xl text-black">
            {{ $event->event_description }}
        </p>
    </div>

    {{-- Mobile --}}
    <a href="/storage/{{ $event->event_image }}" data-lightbox="event-{{ $event->id }}">
        <img src="/storage/{{ $event->event_image }}" alt="{{ $event->event_name }} target=_blank"
            class="h-[400px] w-full rounded-lg object-contain md:object-cover md:hidden">
    </a>

    {{-- Desktop --}}
    <div class="image-container text-center md:block hidden">
        <img src="/storage/{{ $event->event_image }}" alt="{{ $event->event_name }}"
            class="h-[400px] w-full rounded-lg object-contain md:object-cover md:autoscroll">
        <div class="overlay md:block hidden">Hover to autoscroll image<br>-Or-<br>Scroll using
            mouse-wheel<br>-Or-<br>Click to open image in lightbox</div>
    </div>
</div>
