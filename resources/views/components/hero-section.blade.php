<section class="h-[80vh] bg-black flex flex-col justify-center items-center px-4"
    style="background-image: url({{ $bg }}); background-size: cover; background-position: center;">
    {{-- Overlay --}}
    <div class="w-screen h-[80vh] z-10 heroBG absolute"></div>
    {{-- Center Content --}}
    <div
        class="text-black text-center z-20 relative flex flex-col justify-center items-center rounded-md w-full sm:max-w-[50%] text-balance py-2 px-4 sm:px-10 bg-white bg-opacity-80 backdrop-blur shadow-xl">
        <!-- Updated 150Badge image with srcset and sizes -->
        <img src="{{ asset('assets/150Badge.webp') }}" class="w-[80%] md:w-[50%] p-0 m*0">
        <div class="{{ $hidden ?? 'flex' }} flex-row items-center gap-2 " style=" ">
            <hr style="border: 2px solid red;" class="md:min-w-[100px] min-w-4">
            <p>{{ $topPHeading ?? 'Become a Part of Our Legacy' }}</p>
            <hr style="border: 2px solid red;" class="md:min-w-[100px] min-w-4">
            </p>
        </div>
        <h1 class="montagu-slab-h1 my-2 text-center text-2xl md:text-5xl text-pretty">
            {{ $h1 ?? 'Reuniting Generations, Rekindling Memories.' }}
        </h1>
        <p class="text-center mb-4 text-lg md:text-xl md:w-[82%] text-balance">
            {{ $p ?? 'Join us for a year-long celebration of our 150th anniversary, featuring events, reunions, and' }}
        </p>
        <div class="flex flex-row gap-1">
            @if (isset($button1))
                @include($button1['component'], $button1)
            @endif
            @if (isset($button2))
                @include($button2['component'], $button2)
            @endif
            <button data-modal-target="default-modal" data-modal-toggle="default-modal" type="button"
                class="py-2 px-4 {{ $donateTextColor ?? 'text-red-500' }} hover:rounded-none hover:bg-white hover:text-[#DE2413] transition-all {{ $donateBG ?? 'bg-transparent' }} mt-{{ $mt ?? 1 }} {{ $hiddenBTN ?? 'hidden' }} {{ $rounded ?? 'rounded-none' }}">{{ $popupBTN ?? 'Donate' }}</button>
        </div>
    </div>
</section>
