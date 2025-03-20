<x-app-layout>
    {{-- Hero --}}
    @include('components.hero-section', [
        'bg' => asset('assets/Home_Hero_BG.webp'),
        'button1' => [
            'component' => 'components.button',
            'href' =>
                'https://docs.google.com/forms/d/e/1FAIpQLSd6h-CXbgl5SWC6BSQVwHEfqyAevpUV5N1Ov0Oq5VEvrmvwHA/viewform?usp=sf_link',
            'content' => 'Register Now',
            'bgColor' => '#DE2413',
            'mt' => 2,
            'hiddenBTN2' => 'hidden',
        ],
        'button2' => [
            'component' => 'components.button',
            'href' => '#',
            'content' => 'Donate Now',
            'bgColor' => '#262A40',
            'mt' => 2,
            'hiddenBTN2' => 'hidden',
        ],
    
        'hidden' => 'hidden',
        'hideImg' => 'block',
        'hiddenBTN' => 'block',
        'donateBG' => 'bg-[#DE2413]',
        'donateTextColor' => 'text-white',
        'p' => 'Join us for a once-in-a-lifetime celebration of Girls’ High School’s legacy and community.',
    ])
    {{-- Red Square --}}
    <section class="bg-white h-auto md:h-[100vh] flex flex-col justify-center items-center py-[50px]">
        {{-- Overlay --}}
        <div class="w-screen h-auto md:h-[100vh] z-10 heroBG absolute"></div>
        {{-- Center Content --}}
        <div class="bg-[#DE2413] text-white text-center py-8 px-4 w-11/12 sm:w-full md:w-[80%] z-20">
            <h2 class="montagu-slab-h1 text-2xl sm:text-4xl mb-4">
                150 Years of Tradition, Excellence, and Community.
            </h2>
            <p class="text-base sm:text-xl tangerine-regular md:text-6xl">
                For 150 years, Girls’ High School has been a beacon of learning, leadership, and legacy. This year, we
                invite you to celebrate this incredible milestone with us through events that honour our history, our
                people, and our community.
            </p>
        </div>
    </section>
    <!-- Main modal -->
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
                <div class="p-4 md:p-5 space-y-4">">
                    <img src="{{ asset('assets/Once off donation.png') }}" alt="Once Off Donation"
                        class="w-full mx-auto rounded-lg">

                    <div id="accordion-collapse" data-accordion="collapse">
                        <h2 id="accordion-collapse-heading-1">
                            <button type="button"
                                class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                data-accordion-target="#accordion-collapse-body-1" aria-expanded="false"
                                aria-controls="accordion-collapse-body-1">
                                <span class="text-center">See Banking Details</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 5 5 1 1 5" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-collapse-body-1" class="hidden"
                            aria-labelledby="accordion-collapse-heading-">
                            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                    <!-- Bank Name -->
                                    <div class="mb-4">
                                        <label class="block font-semibold text-gray-200">Bank Name:</label>
                                        <div class="flex items-center">
                                            <input type="text" value="{{ $bankName ?? 'ABSA' }}"
                                                class="flex-1 bg-transparent border-none rounded-l p-2 text-white" readonly>
                                            <button onclick="copyToClipboard('{{ $bankName ?? 'ABSA' }}', this)"
                                                class="bg-red-500 text-white px-3 rounded">Copy</button>
                                        </div>
                                    </div>
                                    <!-- Account Type -->
                                    <div class="mb-4">
                                        <label class="block font-semibold text-gray-200">Bank Account Type:</label>
                                        <div class="flex items-center">
                                            <input type="text" value="{{ $accountType ?? 'Cheque Account' }}"
                                                class="flex-1 bg-transparent border-none rounded-l p-2 text-white" readonly>
                                            <button
                                                onclick="copyToClipboard('{{ $accountType ?? 'Cheque Account' }}', this)"
                                                class="bg-red-500 text-white px-3 rounded">Copy</button>
                                        </div>
                                    </div>
                                    <!-- Account Name -->
                                    <div class="mb-4">
                                        <label class="block font-semibold text-gray-200">Bank Account Name:</label>
                                        <div class="flex items-center">
                                            <input type="text"
                                                value="{{ $accountName ?? 'Old Quenstownia Association' }}"
                                                class="flex-1 bg-transparent border-none rounded-l p-2 text-white" readonly>
                                            <button
                                                onclick="copyToClipboard('{{ $accountName ?? 'Old Quenstownia Association' }}', this)"
                                                class="bg-red-500 text-white px-3 rounded">Copy</button>
                                        </div>
                                    </div>
                                    <!-- Account Number -->
                                    <div class="mb-4">
                                        <label class="block font-semibold text-gray-200">Bank Account Number:</label>
                                        <div class="flex items-center">
                                            <input type="text" value="{{ $accountNumber ?? '711651284' }}"
                                                class="flex-1 bg-transparent border-none rounded-l p-2 text-white" readonly>
                                            <button
                                                onclick="copyToClipboard('{{ $accountNumber ?? '711651284' }}', this)"
                                                class="bg-red-500 text-white px-3 rounded">Copy</button>
                                        </div>
                                    </div>
                                    <!-- Reference -->
                                    <div class="mb-4">
                                        <label class="block font-semibold text-gray-200">Reference:</label>
                                        <div class="flex items-center">
                                            <input type="text"
                                                value="{{ $reference ?? '[Your Name] [Year Group] eg. Jane Doe 2010' }}"
                                                class="flex-1 bg-transparent border-none rounded-l p-2 text-white" readonly>
                                        </div>
                                    </div>
                                    <!-- SWIFT Code -->
                                    <div>
                                        <label class="block font-semibold text-gray-200">SWIFT Code:</label>
                                        <div class="flex items-center">
                                            <input type="text" value="{{ $swiftCode ?? 'ABSAZAJJ' }}"
                                                class="flex-1 bg-transparent border-none rounded-l p-2 text-white" readonly>
                                            <button onclick="copyToClipboard('{{ $swiftCode ?? 'ABSAZAJJ' }}', this)"
                                                class="bg-red-500 text-white px-3 rounded">Copy</button>
                                        </div>
                                </div>
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
    </div>
</x-app-layout>
