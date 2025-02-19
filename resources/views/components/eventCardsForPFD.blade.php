<div class="project-card bg-white rounded-md" data-category="{{ strtolower($event->status ?? 'current') }}">
    <div class="flex flex-col p-4 rounded-lg">
        <h2 class="text-2xl font-bold text-black">
            {{ $event->event_name }}
        </h2>
        <p class="text-sm text-black">
            {{ $event->event_description }}
        </p>
    </div>
</div>
