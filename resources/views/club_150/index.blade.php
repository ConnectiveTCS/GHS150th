<x-app-layout>
    {{-- Hero --}}
    @include('components.hero-section', [
        'bg' => asset('assets/Club150_Hero_BG.webp'),
        'button1' => [
            'component' => 'components.button',
            'href' => '#',
            'content' => 'Join Club 150 Now',
            'bgColor' => '#DE2413',
            'mt' => 2,
        ],
        'button2' => [
            'component' => 'components.button',
            'href' => '#',
            'content' => 'Once Off Payment',
            'bgColor' => '#262A40',
            'mt' => 2,
        ],
        'h1' => 'Welcome to Club 150',
        'hideImg' => 'hidden',
        'p' =>
            'For 150 years, Girls High School has nurtured generations of leaders, dreamers, and changemakers. This year, as we celebrate our remarkable milestone, we invite you to be part of this historic journey.',
    ])
    {{-- Programme --}}
    <section class="bg-white flex flex-col justify-start items-start px-[10px] md:px-[50px] py-[100px]"
        style="background-image: url('') }}'); background-size: cover; background-position: center;">
        <h1 class="montagu-slab-h1 text-2xl mb:text-4xl mb-2 text-left md:w-[40%]">See Your Contributions in Action –
            Club 150 Projects
        </h1>
        <p class="text-xl md:text-xl text-pretty md:w-[35%]">Thanks to your generous support, we're transforming Girls
            High
            School for future generations. Here’s a look at the projects your donations are making possible.</p>
        {{-- Projects Container --}}
        <div class="flex flex-col gap-4 bg-[#262A40] w-full mt-8 rounded-[20px] md:p-8 p-2 md:justify-start justify-center">
            <!-- Tabs -->
            <div class="hidden justify-start my-6 md:flex">
                <button class="px-4 py-2 rounded-tl-2xl bg-red-600 text-white mr-2">Current</button>
                <button class="px-4 py-2 rounded-tl-2xl bg-gray-700 text-white mr-2">Upcoming</button>
                <button class="px-4 py-2 rounded-tl-2xl bg-gray-700 text-white">Completed</button>
            </div>
            <!-- Mobile Tabs as Dropdown -->
            <div class="flex justify-start mb-6 md:hidden">
                <select id="mobile-tab-select" class="px-4 py-2 text-black rounded-xl mr-2">
                    <option value="current" selected>Current</option>
                    <option value="upcoming">Upcoming</option>
                    <option value="completed">Completed</option>
                </select>
            </div>

            <!-- Project Cards -->
            <div class="mx-auto space-y-8 px-4 w-full">
                <!-- Garden Revival -->
                @foreach ($projectCards as $card)
                    @include('components.projectCards')
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

            // Mobile dropdown event handler
            const mobileSelect = document.getElementById('mobile-tab-select');
            if (mobileSelect) {
                mobileSelect.addEventListener('change', () => {
                    const selectedTab = mobileSelect.value.toLowerCase();
                    cards.forEach(card => {
                        card.classList.toggle('hidden', card.dataset.category !== selectedTab);
                    });
                    updateHrDisplay();
                });
            }

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
