<x-app-layout>
    {{-- Hero --}}
    @include('components.hero-section', [
        'bg' => asset('assets/AlumniBG.webp'),
        'button1' => [
            'component' => 'components.button',
            'href' => '#',
            'content' => 'Join the Alumni Network',
            'bgColor' => '#DE2413',
            'mt' => 2,
        ],
        'button2' => [
            'component' => 'components.button',
            'href' => '#',
            'content' => 'Share Your Story',
            'bgColor' => '#262A40',
            'mt' => 2,
        ],
        'h1' => 'Reconnect. Remember. Relive.',
        // 'p' => 'Explore the exciting lineup of events designed to honor our past, celebrate the present, and inspire the future. From networking with alumni to reliving treasured memories, there’s something for everyone.'
        'hideImg' => 'hidden',
        'topPHeading' => 'The GHS Alumni Community',
        'p' =>
            'As part of the Girls High School family, your journey doesn’t end after graduation. The friendships, experiences, and values you gained continue for a lifetime. Welcome back!',
    ])
    {{-- Programme --}}
    <section class="bg-white flex flex-col justify-start items-start px-[50px] py-[100px] min-h-[100vh] relative"
        style="background-image:url('{{ asset('assets/BGText.png') }}'); background-size: cover; background-position: center;">
        <div class="w-full place-items-center my-auto py-4 px-4 rounded-md text-white ">
            <p class="text-center text-black w-[60%] text-7xl tangerine-regular">
                Our alumni network is more than just a directory – it’s a lifelong sisterhood. By staying connected, you
                gain access to exclusive events, networking opportunities, and a chance to give back to the school that
                shaped you.
                <br>-Veritas Et Vertas-
            </p>
        </div>
    </section>
    <section class="bg-[#262A40] text-white flex flex-col justify-center items-center px-[50px] py-[100px] min-h-[50vh] mb-6">
        <h2 class="montagu-slab-h1 text-4xl mb-2 text-center w-[40%] text-balance">
            Be Part of the GHS Alumni Network
        </h2>
        <p class="text-center text-2xl md:text-xl text-pretty w-[50%] mb-4">
            Sign up today to receive exclusive alumni newsletters, event invites, and school updates. Reconnect with old
            friends, make new ones, and stay close to the school that helped shape you.
        </p>
        <a href="{{ $href ?? '#' }}"
            class="py-2 px-4 bg-[{{ $bgColor ?? '#DE2413' }}] text-white hover:bg-white hover:text-[#DE2413] transition-all mt-{{ $mt ?? 1 }}">Join the Alumni Network</a>
    </section>


</x-app-layout>
