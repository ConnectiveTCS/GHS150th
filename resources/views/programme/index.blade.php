<x-app-layout>
    {{-- Hero --}}
    @include('components.hero-section', [
        'bg' => asset('assets/ProgrammeBG.webp'),
        'button1' => [
            'component' => 'components.button',
            'href' => asset('assets/updated launch program pdf.pdf'),
            'content' => 'Download Full Programme',
            'bgColor' => '#DE2413',
            'mt' => 2,
            'hiddenBTN2' => 'block',
            'download' => 'download',
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
        'hideImg' => 'hidden',
        'topPHeading' => 'The Official Programme',
        'p' =>
            'Explore the exciting lineup of events designed to honour our past, celebrate the present, and inspire the future. From networking with alumni to reliving treasured memories, there’s something for everyone.',
    ])
    {{-- Programme --}}
    <section class="bg-white flex flex-col justify-start items-start px-[10px] md:px-[50px] py-[100px]"
        style="background-size: cover; background-position: center;">
        <h1 class="montagu-slab-h1 text-4xl mb-2 text-left w-[40%]">Programme
        </h1>

        {{-- Projects Container --}}
        {{-- Desktop --}}
        <div class="hidden md:flex md:flex-col md:gap-4 md:bg-[#DE2413] md:w-full md:mt-8 md:rounded-[20px] md:p-8">
            <!-- Calendar component with events from database -->
            @include('components.calendar', ['events' => $events ?? []])
        </div>
        {{-- Mobile --}}
        <div class="md:hidden flex flex-col gap-4 bg-[#DE2413] w-full mt-8 rounded-[20px] p-8">
            <!-- Calendar component with events from database -->
            @include('components.list', ['events' => $events ?? []])
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
