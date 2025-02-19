<x-app-layout>
    {{-- Hero --}}
    @include('components.hero-section', [
        'bg' => asset('assets/ProgrammeBG.webp'),
        'button1' => [
            'component' => 'components.button',
            'href' => route('programme.pdf'),
            'content' => 'Download Full Programme',
            'bgColor' => '#DE2413',
            'mt' => 2,
        ],
        'button2' => [
            'component' => 'components.button',
            'href' => '#',
            'content' => 'RSVP for Banquet',
            'bgColor' => '#262A40',
            'mt' => 2,
        ],
        'h1' => 'A Celebration 150 Years in the Making',
        // 'p' => 'Explore the exciting lineup of events designed to honor our past, celebrate the present, and inspire the future. From networking with alumni to reliving treasured memories, there’s something for everyone.'
        'hideImg' => 'hidden',
        'topPHeading' => 'The Official Programme',
        'p' =>
            'Explore the exciting lineup of events designed to honor our past, celebrate the present, and inspire the future. From networking with alumni to reliving treasured memories, there’s something for everyone.',
    ])
    {{-- Programme --}}
    <section class="bg-white flex flex-col justify-start items-start px-[50px] py-[100px]"
        style="background-size: cover; background-position: center;">
        <h1 class="montagu-slab-h1 text-4xl mb-2 text-left w-[40%]">Programme
        </h1>

        {{-- Projects Container --}}
        <div class="flex flex-col gap-4 bg-[#262A40] w-full mt-8 rounded-[20px] p-8">
            <!-- Tabs -->

            {{-- Grouped Events Listing --}}
            <div class="mx-auto px-4 w-full bg-white rounded-lg">
                @foreach ($grouped as $month => $days)
                    <h2 class="text-3xl font-bold my-4">{{ $month }}</h2>
                    @foreach ($days as $day => $eventsForDay)
                        <h3 class="text-2xl font-semibold my-2">{{ $day }}</h3>
                        @foreach ($eventsForDay as $event)
                            @include('components.eventCards', ['event' => $event])
                            <hr class="border-red-500 my-4">
                        @endforeach
                    @endforeach
                @endforeach
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tabs = document.querySelectorAll('button');
            const cards = document.querySelectorAll('.project-card');
            // Set default: show only "current" cards
            cards.forEach(card => {
                if (card.dataset.category !== 'current') {
                    card.classList.add('hidden');
                }
            });
            // Hide hr in the last visible card on load
            updateHrDisplay();

            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    tabs.forEach(t => {
                        t.classList.remove('bg-red-600', 'rounded-t-lg');
                        t.classList.add('bg-gray-700', 'rounded-tl-2xl');
                    });
                    tab.classList.add('bg-red-600', 'rounded-t-lg');
                    tab.classList.remove('bg-gray-700', 'rounded-tl-2xl');
                    const selectedTab = tab.textContent.trim().toLowerCase();
                    cards.forEach(card => {
                        if (card.dataset.category === selectedTab) {
                            card.classList.remove('hidden');
                        } else {
                            card.classList.add('hidden');
                        }
                    });
                    updateHrDisplay();
                });
            });

            function updateHrDisplay() {
                const visibleCards = Array.from(cards).filter(card => !card.classList.contains('hidden'));
                // For each visible card, show its hr; hide hr in the last visible card.
                visibleCards.forEach((card, index) => {
                    const hr = card.querySelector('hr');
                    if (hr) {
                        hr.style.display = (index === visibleCards.length - 1) ? 'none' : '';
                    }
                });
            }
        });
    </script>
</x-app-layout>
