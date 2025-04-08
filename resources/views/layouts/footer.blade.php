<footer>
    <div class="relative">
        {{-- Centered Badge Image --}}
        <div class="absolute w-full justify-center md:top-[40%] top-[35%] hidden md:flex">
            <img src="{{ asset('assets/GHS_Badge.webp') }}"
                srcset="{{ asset('assets/GHS_Badge_small.webp') }} 48w, {{ asset('assets/GHS_Badge.webp') }} 96w"
                sizes="(max-width: 768px) 48px, 96px" alt="GHS Badge" class="h-12 w-auto md:h-24 md:w-auto z-20">
        </div>

        {{-- Main Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-0 h-auto md:h-[70vh]">
            <a href="/club_150"
                class="bg-[#DE2413] hover:bg-[#de2413d3] montagu-slab-h1 text-white flex justify-center items-center text-xl py-4 md:text-3xl">Club
                150</a>
            <a href="/programme"
                class="bg-[#262A40] hover:bg-[#262a40e6] montagu-slab-h1 text-white flex justify-center items-center text-xl py-4 md:text-3xl">Programme</a>
            <hr class="md:hidden block border-[#DE2413] w-full">
            <a href="/pillar_project"
                class="bg-[#262A40] hover:bg-[#262a40e6] montagu-slab-h1 text-white flex justify-center items-center text-xl py-4 md:text-3xl">Pillar
                Project</a>
            <a href="https://docs.google.com/forms/d/e/1FAIpQLScth9SDgHCCNwjlAC4PqJeh64Oc76nJ3MOD5fXj2BFLwRNrfw/viewform"
                class="bg-[#DE2413] hover:bg-[#de2413d3] montagu-slab-h1 text-white flex justify-center items-center text-xl py-4 md:text-3xl">Alumni</a>
        </div>
    </div>
    <footer
        class="py-4 bg-[#1f2533] text-center text-sm text-gray-400 border-t border-gray-600 flex justify-center flex-row items-center gap-1">
        <p class="text-sm">Created By </p>
        <a href="https://www.acewebdesign.co.za">
            <img src="{{ asset('assets/AWDLogo.png') }}" alt="Ace Web Design Logo" width="30" height="20"
                class="h-[20px]">
        </a>
        <a href="https://www.acewebdesign.co.za" class="text-sm text-white font-bold hover:underline">Ace Web
            Design</a>
        <p class="text-sm">
            | Powered By Laravel</p>
    </footer>
</footer>
