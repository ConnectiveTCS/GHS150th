<x-app-layout>
    {{-- Hero --}}
    @include('components.hero-section', [
        'bg' => asset('assets/Power23.jpg'),
        'button1' => [
            'component' => 'components.button',
            'href' => route('programme.pdf'),
            'content' => 'Reserve Your Spot',
            'bgColor' => '#DE2413',
            'mt' => 2,
            'hiddenBTN2' => 'hidden',
        ],
        'button2' => [
            'component' => 'components.button',
            'href' => 'assets\PillarMap.jpg',
            'content' => 'Download the Brochure',
            'bgColor' => '#DE2413',
            'mt' => 2,
            'hiddenBTN2' => 'block',
            'download' => 'download',
        ],
        'h1' => 'Join the Pillar Project',
        // 'p' => 'Explore the exciting lineup of events designed to honor our past, celebrate the present, and inspire the future. From networking with alumni to reliving treasured memories, there’s something for everyone.'
        'hideImg' => 'hidden',
        'hiddenBTN' => 'hidden',
        'topPHeading' => 'Your Legacy, Set in Stone',
        'popupBTN' => 'See The Pillar Map',
    
        'p' =>
            'For 150 years, our pillars have stood strong, bearing witness to generations of GHS students. Now, you can make history by engraving your name on a pillar and ensuring your place in the school’s story forever.',
    ])

    {{-- Picture Map --}}


    {{-- Programme --}}
    <section
        class="bg-white flex flex-col justify-start items-start px-4 md:px-[50px] py-8 md:py-[100px] min-h-[100vh] relative"
        style="background-size: cover; background-position: center;">
        <h1 class="montagu-slab-h1 text-4xl mb-2 text-left w-full md:w-[40%]">What is the Pillar Project?
        </h1>
        <div
            class="bg-[#0F1522] w-full mb-4 grid grid-cols-1 md:grid-cols-2 place-items-center my-4 py-4 px-4 rounded-md text-white">
            <div class=" mb-4 grid place-items-center my-4 border-r-2 ">
                <h2 class="montagu-slab-h1 text-3xl text-center mb-3 text-balance">The Pillars of Our Past, The
                    Foundation of Our Future</h2>
                <p class="text-center mb-3 w-[80%] text-xl">The Pillars of GHS have long been a symbol of
                    strength,
                    unity, and tradition. Through the Pillar
                    Project, alumni can cement their connection to this legacy with a personalized engraving.
                    Each name
                    represents a story, a journey, a contribution to the school’s 150-year heritage.</p>
                {{-- @include('components.button', [
                    'href' => '#',
                    'content' => 'Engrave Your Name',
                    'bgColor' => '#DE2413',
                    'mt' => 2,
                    'hiddenBTN2' => 'block',
                ]) --}}
                <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                    class="block text-white bg-[#DE2413] hover:bg-[#ffffff] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm px-5 py-2.5 text-center dark:bg-[#DE2413] dark:hover:bg-[#DE2413] dark:focus:ring-blue-800"
                    type="button">
                    Engrave Your Name
                </button>
            </div>
            <div class="flex items-center justify-center relative">
                <img src="{{ asset('assets/Frame 104.png') }}" alt="" class=" md:w-full">
            </div>
        </div>
    </section>
    <!-- Main modal -->
<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Terms of Service
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                </p>
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                </p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="default-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
            </div>
        </div>
    </div>
</div>
    </div>
    <style>
        area {
            background-color: rgba(255, 0, 0, 0.3);
            z-index: 100;
            display: block;
        }
    </style>
</x-app-layout>
