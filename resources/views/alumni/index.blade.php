<x-app-layout>
    
<!-- Main modal -->
<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-white">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900">
                    Share Your Story With Us
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
                @include('engrave.partials.form')
            </div>
        </div>
    </div>
</div>
    {{-- Hero --}}
    @include('components.hero-section', [
        'bg' => asset('assets/AlumniBG.webp'),
        'button1' => [
            'component' => 'components.button',
            'href' => 'https://docs.google.com/forms/d/e/1FAIpQLScth9SDgHCCNwjlAC4PqJeh64Oc76nJ3MOD5fXj2BFLwRNrfw/viewform', // Fixed: direct call to route()
            'content' => 'Join the Alumni Network',
            'bgColor' => '#DE2413',
            'mt' => 2,
            'hiddenBTN2' => 'block',
        ],
        'button2' => [
            'component' => 'components.button',
            'href' => 'mailto:oqa@qtghs.co.za',
            'content' => 'Share Your Story',
            'bgColor' => '#262A40',
            'mt' => 2,
            'hiddenBTN2' => 'hidden',
        ],
        'h1' => 'Reconnect. Remember. Relive.',
        // 'p' => 'Explore the exciting lineup of events designed to honor our past, celebrate the present, and inspire the future. From networking with alumni to reliving treasured memories, there’s something for everyone.'
        'hideImg' => 'hidden',
        'topPHeading' => 'The GHS Alumni Community',
        'hidden' => 'hidden',
        'hiddenBTN' => 'block',
        'donateBG' => 'bg-transparent',
        'donateTextColor' => 'text-black',
        'popupBTN' => 'Share Your Story',
        'p' =>
            'As part of the Girls’ High School family, your journey doesn’t end after matric. The friendships, experiences, and values you gained continue for a lifetime. Welcome back!',
    ])
    {{-- Alumni Main --}}
    <section
        class="bg-white flex flex-col justify-start items-start px-2 md:px-[50px] py-[100px] md:min-h-[100vh] relative"
        style="background-image:url('{{ asset('assets/BGText.png') }}'); background-size: cover; background-position: center;">
        <div class="w-full place-items-center my-auto py-4 md:px-4 rounded-md text-white ">
            <p class="text-center text-black md:w-[60%] text-2xl md:text-7xl tangerine-regular">
                Our alumni network is more than just a directory – it’s a lifelong sisterhood. By staying connected, you
                gain access to exclusive events, networking opportunities, and a chance to give back to the school that
                shaped you.
                <br>-Veritas et Virtus-
            </p>
        </div>
    </section>
    <section
        class="bg-[#262A40] text-white flex flex-col justify-center items-center md:px-[50px] px-2 py-[100px] min-h-[50vh] mb-6">
        <h2 class="montagu-slab-h1 text-3xl md:text-4xl mb-2 text-center md:w-[40%] text-balance">
            Be Part of the GHS Alumni Network
        </h2>
        <p class="text-center text-2xl md:text-xl text-pretty md:w-[50%] mb-4">
            Sign up today to receive exclusive alumni newsletters, event invites, and school updates. Reconnect with old
            friends, make new ones, and stay close to the school that helped shape you.
        </p>
        <a href="https://docs.google.com/forms/d/e/1FAIpQLScth9SDgHCCNwjlAC4PqJeh64Oc76nJ3MOD5fXj2BFLwRNrfw/viewform"
            class="py-2 px-4 bg-[{{ $bgColor ?? '#DE2413' }}] text-white hover:bg-white hover:text-[#DE2413] transition-all mt-{{ $mt ?? 1 }}">Join
            the Alumni Network</a>
    </section>

</x-app-layout>
