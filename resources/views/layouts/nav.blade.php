<nav class="relative bg-[#262A40] text-white px-4 md:px-8 py-2">
    <div class="flex items-center justify-between">
        <a href="/">
            <img src="{{ asset('assets/GHS_Badge.webp') }}" alt="GHS Logo" class="h-12 w-12 md:h-16 md:w-16">
        </a>
        <!-- Mobile menu button with ARIA attributes -->
        <button class="md:hidden text-white hover:text-[#DE2413] focus:outline-none absolute right-[16px]"
            onclick="toggleMenu()" aria-expanded="false" aria-controls="mobile-menu" aria-label="Toggle navigation">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <!-- Desktop menu -->
        <div>
            <ul class="hidden md:flex flex-row items-center justify-center gap-4">
                <li><a href="/"
                        class="{{ request()->is('/') ? 'text-white border-b-2 font-bold' : '' }} hover:border-b-2 hover:transition-colors hover:text-[#DE2413]">Home</a>
                </li>
                <li><a href="/club_150"
                        class="{{ request()->is('club_150') ? 'text-white border-b-2 font-bold' : '' }} hover:border-b-2 hover:transition-colors hover:text-[#DE2413]">Club
                        150</a></li>
                <li><a href="/programme"
                        class="{{ request()->is('programme') ? 'text-white border-b-2 font-bold' : '' }} hover:border-b-2 hover:transition-colors hover:text-[#DE2413]">Programme</a>
                </li>
                <li><a href="/pillar_project"
                        class="{{ request()->is('pillar_project') ? 'text-white border-b-2 font-bold' : '' }} hover:border-b-2 hover:transition-colors hover:text-[#DE2413]">Pillar
                        Project</a></li>
                <li><a href="/alumnis"
                        class="{{ request()->is('alumnis') ? 'text-white border-b-2 font-bold' : '' }} hover:border-b-2 hover:transition-colors hover:text-[#DE2413]">Alumni</a>
                </li>
            </ul>
            {{-- If user is logged in they can view this menu --}}
            @auth
                @if (Auth::user()->role == 'admin')
                    <h1 class="font-bold text-red-500 text-center hidden md:block text-lg">Admin Menu</h1>
                @elseif (Auth::user()->role == 'editor')
                    <h1 class="font-bold text-red-500 text-center hidden md:block text-lg">Editor</h1>
                @else
                    <h1 class="font-bold text-red-500 text-center hidden md:block text-lg">User</h1>
                @endif
                <ul class="hidden md:flex flex-row items-center justify-center gap-4">
                    @if (Auth::user()->role == 'admin')
                        <li><a href="/projects"
                                class="{{ request()->is('projects') ? 'text-white border-b-2 font-bold' : '' }} hover:border-b-2 hover:transition-colors hover:text-[#DE2413]">Projects</a>
                        </li>
                        <li><a href="/events"
                                class="{{ request()->is('events') ? 'text-white border-b-2 font-bold' : '' }} hover:border-b-2 hover:transition-colors hover:text-[#DE2413]">Events</a>
                        </li>
                        <li><a href="/reservations"
                                class="{{ request()->is('reservations') ? 'text-white border-b-2 font-bold' : '' }} hover:border-b-2 hover:transition-colors hover:text-[#DE2413]">Reservations</a>
                        </li>
                        <li><a href="{{ route('alumni.index') }}"
                                class="{{ request()->is(route('alumni.index')) ? 'text-white border-b-2 font-bold' : '' }} hover:border-b-2 hover:transition-colors hover:text-[#DE2413]">Alumni
                                Network</a>
                        </li>
                    @endif
                    <li><a href="/dashboard"
                            class="{{ request()->is('dashboard') ? 'text-white border-b-2 font-bold' : '' }} hover:border-b-2 hover:transition-colors hover:text-[#DE2413]">Alumni
                            Profile</a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a href="route('logout')"
                                onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </li>

                </ul>
            @endauth
        </div>
        <div class="hidden md:flex flex-col items-center gap-2">
            <a href="/register"
                class="bg-[#DE2413] text-white px-4 py-2 w-full text-center hover:bg-white hover:text-[#DE2413] rounded-md transition-all">Register</a>
            <a href="/login"
                class="bg-[#262A40] text-white px-4 py-2 w-full text-center hover:bg-white hover:text-[#DE2413] rounded-md transition-all border border-white">Login</a>
        </div>
    </div>

    <!-- Mobile menu with transition for smoother toggling -->
    <div id="mobile-menu" class="hidden md:hidden mt-4 transition-all duration-300">
        <ul class="flex flex-col gap-4 pb-4">
            <li><a href="/" class="block hover:text-[#DE2413]">Home</a></li>
            <li><a href="/club_150" class="block hover:text-[#DE2413]">Club 150</a></li>
            <li><a href="/programme" class="block hover:text-[#DE2413]">Programme</a></li>
            <li><a href="/pillar_project" class="block hover:text-[#DE2413]">Pillar Project</a></li>
            <li><a href="/alumni" class="block hover:text-[#DE2413]">Alumni</a></li>
        </ul>
        @auth
            <div class="mt-4 border-t border-gray-600 pt-4">
                @if (Auth::user()->role == 'admin')
                    <h1 class="font-bold text-red-500 text-center mb-2">Admin Menu</h1>
                @elseif (Auth::user()->role == 'editor')
                    <h1 class="font-bold text-red-500 text-center mb-2">Editor</h1>
                @else
                    <h1 class="font-bold text-red-500 text-center mb-2">User</h1>
                @endif
                <ul class="flex flex-col gap-2">
                    @if (Auth::user()->role == 'admin')
                        <li>
                            <a href="/projects"
                                class="block w-full px-4 py-2 hover:bg-gray-700 hover:text-[#DE2413]">Projects</a>
                        </li>
                        <li>
                            <a href="/events"
                                class="block w-full px-4 py-2 hover:bg-gray-700 hover:text-[#DE2413]">Events</a>
                        </li>
                        <li>
                            <a href="/reservations"
                                class="block w-full px-4 py-2 hover:bg-gray-700 hover:text-[#DE2413]">Reservations</a>
                        </li>
                        <li>
                            <a href="/alumni_network"
                                class="block w-full px-4 py-2 hover:bg-gray-700 hover:text-[#DE2413]">Alumni Network</a>
                        </li>
                    @endif
                    <li><a href="/dashboard"
                            class="block w-full px-4 py-2 hover:bg-gray-700 hover:text-[#DE2413]">Alumni
                            Profile</a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="route('logout')" class="block w-full px-4 py-2 hover:bg-gray-700 hover:text-[#DE2413]"
                                onclick="event.preventDefault(); this.closest('form').submit();">Log Out</a>
                        </form>
                    </li>
                </ul>
            </div>
        @endauth
        {{-- <div class="flex flex-col gap-2 pt-4 border-t border-gray-600">
            <a href="/alumni_register"
                class="bg-[#DE2413] text-white px-4 py-2 text-center hover:bg-white hover:text-[#DE2413] rounded-md transition-all">Register</a>
            <a href="/donate"
                class="bg-[#262A40] text-white px-4 py-2 text-center hover:bg-white hover:text-[#DE2413] rounded-md transition-all border border-white">Donate</a>
        </div> --}}
    </div>
</nav>

<script>
    function toggleMenu() {
        const mobileMenu = document.getElementById('mobile-menu');
        const isHidden = mobileMenu.classList.contains('hidden');
        mobileMenu.classList.toggle('hidden');
        // Update ARIA attribute for accessibility
        const toggleButton = document.querySelector('button[aria-controls="mobile-menu"]');
        toggleButton.setAttribute('aria-expanded', !isHidden);
    }
</script>
