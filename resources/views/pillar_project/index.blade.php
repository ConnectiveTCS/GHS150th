<x-app-layout>
    {{-- Hero --}}
    @include('components.hero-section', [
        'bg' => asset('assets/Pillar_ProjectBG.webp'),
        'button1' => [
            'component' => 'components.button',
            'href' => route('programme.pdf'),
            'content' => 'Reserve Your Spot',
            'bgColor' => '#DE2413',
            'mt' => 2,
        ],
        'button2' => [
            'component' => 'components.button',
            'href' => '#',
            'content' => 'See the Pillar Map',
            'bgColor' => '#262A40',
            'mt' => 2,
        ],
        'h1' => 'Join the Pillar Project',
        // 'p' => 'Explore the exciting lineup of events designed to honor our past, celebrate the present, and inspire the future. From networking with alumni to reliving treasured memories, there’s something for everyone.'
        'hideImg' => 'hidden',
        'topPHeading' => 'Your Legacy, Set in Stone',
        'p' =>
            'For 150 years, our pillars have stood strong, bearing witness to generations of GHS students. Now, you can make history by engraving your name on a pillar and ensuring your place in the school’s story forever.',
    ])
    {{-- Programme --}}
    <section class="bg-white flex flex-col justify-start items-start px-[50px] py-[100px] min-h-[100vh] relative"
        style="background-size: cover; background-position: center;">
        <h1 class="montagu-slab-h1 text-4xl mb-2 text-left w-[40%]">What is the Pillar Project?
        </h1>
        <div class="bg-[#0F1522] w-full mb-4 grid grid-cols-2 place-items-center my-4 py-4 px-4 rounded-md text-white">
            <div class="bg-[#262A40]mb-4 grid place-items-center my-4 border-r-2 ">
                <h2 class="montagu-slab-h1 text-3xl text-center mb-3 text-balance">The Pillars of Our Past, The Foundation of Our Future</h2>
                <p class="text-center mb-3 w-[80%] text-xl">The Pillars of GHS have long been a symbol of strength, unity, and tradition. Through the Pillar
                    Project, alumni can cement their connection to this legacy with a personalized engraving. Each name
                    represents a story, a journey, a contribution to the school’s 150-year heritage.</p>
                @include('components.button', [
                    'href' => '#',
                    'content' => 'Engrave Your Name',
                    'bgColor' => '#DE2413',
                    'mt' => 2,
                ])
            </div>
            <div class="flex items-center justify-center relative">
                <img src="{{ asset('assets/Frame 104.png') }}" alt="" class=" md:w-full">
            </div>
        </div>
        </section>


</x-app-layout>
