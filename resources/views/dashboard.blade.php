<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-6">{{ __('Your Alumni Profile') }}</h3>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Profile Image Section -->
                        <div class="md:col-span-1">
                            <div class="flex flex-col items-center">
                                <div class="w-40 h-40 rounded-full bg-gray-200 overflow-hidden mb-4">
                                    @if ($alumni && $alumni->profile_picture)
                                        <img src="{{ asset('storage/' . $alumni->profile_picture) }}"
                                            alt="Profile Photo" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center">
                                            <span
                                                class="text-gray-400 text-4xl">{{ substr(Auth::user()->name ?? 'User', 0, 1) }}</span>
                                        </div>
                                    @endif
                                </div>
                                <h4 class="text-xl font-semibold">{{ Auth::user()->name ?? 'Not provided' }}</h4>
                                <p class="text-gray-600">Class of
                                    {{ $alumni->class_of ?? 'Not provided' }}</p>
                            </div>
                        </div>

                        <!-- Main Profile Information -->
                        <div class="md:col-span-2">
                            <div class="bg-gray-50 p-5 rounded-lg mb-6">
                                <h4 class="font-medium text-lg mb-3 text-gray-800">Contact Information</h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <p class="text-sm text-gray-600">Email</p>
                                        <p>{{ Auth::user()->email ?? 'Not provided' }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600">Phone</p>
                                        <p>{{ $alumni->phone ?? 'Not provided' }}</p>
                                    </div>

                                </div>
                            </div>

                            <div class="bg-gray-50 p-5 rounded-lg mb-6">
                                <h4 class="font-medium text-lg mb-3 text-gray-800">Alumni Details</h4>
                                <div class="mb-4">
                                    <p class="text-sm text-gray-600">Current Employer</p>
                                    <p>{{ $alumni->current_employer ?? 'Not provided' }}</p>
                                </div>
                                <div class="mb-4">
                                    <p class="text-sm text-gray-600">Current Occupation</p>
                                    <p>{{ $alumni->current_position ?? 'Not provided' }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Bio</p>
                                    <p class="whitespace-pre-line">
                                        {{ $alumni->bio ?? 'Not provided' }}</p>
                                </div>
                            </div>

                            <div class="mt-6 text-right">
                                @if ($alumni->user_id == Auth::id())
                                    <a href="{{ route('alumni.edit', $alumni->id) }}"
                                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        Edit Profile
                                    </a>
                                @else
                                    <a href="{{ route('alumni.create') }}"
                                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        Create Profile
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Spare container --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            </div>
        </div>
    </div>
</x-app-layout>
