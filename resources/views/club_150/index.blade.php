<x-app-layout>
    {{-- Hero --}}
    @include('components.hero-section', [
        'bg' => asset('assets/Club150_Hero_BG.webp'),
        'button1' => [
            'component' => 'components.button',
            'href' =>
                'https://docs.google.com/forms/d/e/1FAIpQLSd6h-CXbgl5SWC6BSQVwHEfqyAevpUV5N1Ov0Oq5VEvrmvwHA/viewform?usp=sf_link',
            'content' => 'Join Club 150 Now',
            'bgColor' => '#DE2413',
            'mt' => 2,
            'hiddenBTN2' => 'block',
        ],
        'button2' => [
            'component' => 'components.button',
            'href' => '#',
            'content' => 'Once Off Payment',
            'bgColor' => '#262A40',
            'mt' => 2,
            'hiddenBTN2' => 'hidden',
        ],
        'h1' => 'Welcome to Club 150',
        'hideImg' => 'hidden',
        'hiddenBTN' => 'block',
        'popupBTN' => 'Once Off Payment',
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
        <div
            class="flex flex-col gap-4 bg-[#262A40] w-full mt-8 rounded-[20px] md:p-8 p-2 md:justify-start justify-center">
            <!-- Tabs -->
            <div class="hidden justify-start my-6 md:flex">
                <button class="tab-button px-4 py-2 rounded-tl-2xl bg-red-600 text-white mr-2"
                    data-category="current">Current</button>
                <button class="tab-button px-4 py-2 rounded-tl-2xl bg-gray-700 text-white mr-2"
                    data-category="upcoming">Upcoming</button>
                <button class="tab-button px-4 py-2 rounded-tl-2xl bg-gray-700 text-white"
                    data-category="completed">Completed</button>
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
    <style>
        /* Forces element to be hidden regardless of responsive classes */
        .filter-hidden {
            display: none !important;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tabs = document.querySelectorAll('.tab-button');
            const cards = document.querySelectorAll('.project-card');

            // Set default: show only "current" cards using filter-hidden class
            cards.forEach(card => {
                if (card.dataset.category !== 'current') {
                    card.classList.add('filter-hidden');
                }
            });
            updateHrDisplay();

            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    tabs.forEach(t => {
                        t.classList.remove('bg-red-600', 'rounded-t-lg');
                        t.classList.add('bg-gray-700', 'rounded-tl-2xl');
                    });
                    tab.classList.add('bg-red-600', 'rounded-t-lg');
                    tab.classList.remove('bg-gray-700', 'rounded-tl-2xl');

                    const selectedCategory = tab.dataset.category;
                    cards.forEach(card => {
                        if (card.dataset.category === selectedCategory) {
                            card.classList.remove('filter-hidden');
                        } else {
                            card.classList.add('filter-hidden');
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
                        card.classList.toggle('filter-hidden', card.dataset.category !==
                            selectedTab);
                    });
                    updateHrDisplay();
                });
            }

            function updateHrDisplay() {
                const visibleCards = Array.from(cards).filter(card => !card.classList.contains('filter-hidden'));
                visibleCards.forEach((card, index) => {
                    const hr = card.querySelector('hr');
                    if (hr) {
                        hr.style.display = (index === visibleCards.length - 1) ? 'none' : '';
                    }
                });
            }
        });
    </script>
    {{-- Main Modal --}}
    <div id="default-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <!-- Modal header -->
                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Banking Details
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <div class="bg-gray-100 rounded-lg p-4">
                        <!-- Bank Name -->
                        <div class="mb-4">
                            <label class="block font-semibold text-gray-700">Bank Name:</label>
                            <div class="flex items-center">
                                <input type="text" value="{{ $bankName ?? 'ABSA' }}"
                                    class="flex-1 bg-gray-100 border-none rounded-l p-2" readonly>
                                <button onclick="copyToClipboard('{{ $bankName ?? 'ABSA' }}', this)"
                                    class="bg-red-500 text-white px-3 rounded">Copy</button>
                            </div>
                        </div>
                        <!-- Account Type -->
                        <div class="mb-4">
                            <label class="block font-semibold text-gray-700">Bank Account Type:</label>
                            <div class="flex items-center">
                                <input type="text" value="{{ $accountType ?? 'Cheque Account' }}"
                                    class="flex-1 bg-gray-100 border-none rounded-l p-2" readonly>
                                <button onclick="copyToClipboard('{{ $accountType ?? 'Cheque Account' }}', this)"
                                    class="bg-red-500 text-white px-3 rounded">Copy</button>
                            </div>
                        </div>
                        <!-- Account Name -->
                        <div class="mb-4">
                            <label class="block font-semibold text-gray-700">Bank Account Name:</label>
                            <div class="flex items-center">
                                <input type="text" value="{{ $accountName ?? 'Old Quenstownia Association' }}"
                                    class="flex-1 bg-gray-100 border-none rounded-l p-2" readonly>
                                <button
                                    onclick="copyToClipboard('{{ $accountName ?? 'Old Quenstownia Association' }}', this)"
                                    class="bg-red-500 text-white px-3 rounded">Copy</button>
                            </div>
                        </div>
                        <!-- Account Number -->
                        <div class="mb-4">
                            <label class="block font-semibold text-gray-700">Bank Account Number:</label>
                            <div class="flex items-center">
                                <input type="text" value="{{ $accountNumber ?? '711651284' }}"
                                    class="flex-1 bg-gray-100 border-none rounded-l p-2" readonly>
                                <button onclick="copyToClipboard('{{ $accountNumber ?? '711651284' }}', this)"
                                    class="bg-red-500 text-white px-3 rounded">Copy</button>
                            </div>
                        </div>
                        <!-- Reference -->
                        <div class="mb-4">
                            <label class="block font-semibold text-gray-700">Reference:</label>
                            <div class="flex items-center">
                                <input type="text"
                                    value="{{ $reference ?? '[Your Name] [Year Group] eg. Jane Doe 2010' }}"
                                    class="flex-1 bg-gray-100 border-none rounded-l p-2" readonly>
                            </div>
                        </div>
                        <!-- SWIFT Code -->
                        <div>
                            <label class="block font-semibold text-gray-700">SWIFT Code:</label>
                            <div class="flex items-center">
                                <input type="text" value="{{ $swiftCode ?? 'ABSAZAJJ' }}"
                                    class="flex-1 bg-gray-100 border-none rounded-l p-2" readonly>
                                <button onclick="copyToClipboard('{{ $swiftCode ?? 'ABSAZAJJ' }}', this)"
                                    class="bg-red-500 text-white px-3 rounded">Copy</button>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    function copyToClipboard(text, btn) {
                        navigator.clipboard.writeText(text).then(() => {
                            var originalText = btn.innerHTML;
                            btn.innerHTML = "Copied";
                            setTimeout(() => {
                                btn.innerHTML = originalText;
                            }, 2000);
                        });
                    }
                </script>
            </div>
        </div>
    </div>
</x-app-layout>
