<x-app-layout>
    {{-- Hero --}}
    @include('components.hero-section', [
        'bg' => asset('assets/Home_Hero_BG.jpg'),
        'button1' => [
            'component' => 'components.button',
            'href' => '#',
            'content' => 'Register Now',
            'bgColor' => '#DE2413',
            'mt' => 2
],
        'button2' => [
            'component' => 'components.button',
            'href' => '#',
            'content' => 'Donate Now',
            'bgColor' => '#262A40',
            'mt' => 2
],
'hidden' => 'hidden',
'hideImg' => 'block',
    ])
    {{-- Red Square --}}
    <section class="bg-white h-[70vh] flex flex-col justify-center items-center" style="background-image: url('') }}'); background-size: cover; background-position: center;">
        {{-- Overlay --}}
        <div class="w-screen h-[70vh] z-10 heroBG absolute"></div>
        {{-- Center Content --}}
        <div class="bg-[#DE2413] text-white text-center py-8 px-8 w-full md:w-2/3 lg:w-1/3 z-20">
            <h2 class="montagu-slab-h1 text-4xl mb-2">
                150 Years of Tradition, Excellence, and Community.
            </h2>
            <p class="text-5xl tangerine-regular">
                For 150 years, Girls High School has been a beacon of learning, leadership, and legacy. This year, we
                invite you to celebrate this incredible milestone with us through events that honor our history, our
                people, and our community.
            </p>
        </div>
    </section>
</x-app-layout>
