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
            'hiddenBTN2' => 'block',
        ],
        'button2' => [
            'component' => 'components.button',
            'href' => '/reservations/create',
            'content' => 'RSVP for Banquet',
            'bgColor' => '#262A40',
            'mt' => 2,
            'hiddenBTN2' => 'block',
        ],
        'h1' => 'A Celebration 150 Years in the Making',
        // 'p' => 'Explore the exciting lineup of events designed to honor our past, celebrate the present, and inspire the future. From networking with alumni to reliving treasured memories, there’s something for everyone.'
        'hideImg' => 'hidden',
        'topPHeading' => 'The Official Programme',
        'p' =>
            'Explore the exciting lineup of events designed to honor our past, celebrate the present, and inspire the future. From networking with alumni to reliving treasured memories, there’s something for everyone.',
    ])
    {{-- Programme --}}
    <section class="bg-white flex flex-col justify-start items-start px-[10px] md:px-[50px] py-[100px]"
        style="background-size: cover; background-position: center;">
        <h1 class="montagu-slab-h1 text-4xl mb-2 text-left w-[40%]">Programme
        </h1>

        {{-- Projects Container --}}
        <div class="flex flex-col gap-4 bg-[#262A40] w-full mt-8 rounded-[20px] p-8">
            <!-- Tabs -->

            {{-- Grouped Events Listing --}}
            <div class="mx-auto px-4 w-full bg-white rounded-lg">
                @php
                    // Month order mapping for proper chronological sorting
                    $monthOrder = [
                        'January' => 1,
                        'February' => 2,
                        'March' => 3,
                        'April' => 4,
                        'May' => 5,
                        'June' => 6,
                        'July' => 7,
                        'August' => 8,
                        'September' => 9,
                        'October' => 10,
                        'November' => 11,
                        'December' => 12,
                    ];

                    // Convert to collection and sort by month chronologically
                    $sortedGrouped = collect($grouped)->sortBy(function ($days, $month) use ($monthOrder) {
                        return $monthOrder[$month] ?? 999; // Default high value for unknown months
                    });
                @endphp

                @foreach ($sortedGrouped as $month => $days)
                    {{-- Floating Month --}}
                    <div
                        class="sticky top-0 bg-white p-2 z-10 bg-opacity-65 backdrop-blur-md rounded-3xl items-center flex">
                        <h2 class="text-3xl font-bold md:mt-0 md:pl-4">{{ $month ?? '' }}</h2>
                    </div>
                    {{-- Events for each day --}}
                    @foreach ($days as $day => $eventsForDay)
                        {{-- <h3 class="text-2xl font-semibold md:ml-3">{{ $day }}</h3> --}}
                        @foreach ($eventsForDay as $event)
                            @include('components.eventCards', ['event' => $event])
                            <hr class="border-red-500 my-4 md:my-0">
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
