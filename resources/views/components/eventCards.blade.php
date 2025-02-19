<div class="project-card bg-white rounded-md" data-category="{{ strtolower($event->status ?? 'current') }}">
    <div class="flex flex-col p-4 rounded-lg">
        <h2 class="text-2xl font-bold text-black">
            {{ $event->event_name }}
        </h2>
        <p class="text-xl text-black">
            {{ $event->event_description }}
        </p>
    </div>
    <div class="image-container text-center">
        <img src="/storage/{{$event->event_image}}" alt="{{ $event->event_name }}"
            class="h-[400px] w-full rounded-lg object-cover autoscroll">
        <div class="overlay">Hover to autoscroll image<br>-Or-<br>Scroll using mouse-wheel<br>-Or-<br>Click to open image in lightbox</div>
    </div>
</div>
