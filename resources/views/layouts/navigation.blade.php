<nav x-data="{ open: false }" class="bg-sky-400 border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-4">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-white" />
                    </a>
                </div>
                @if(Auth::user()->roles->first()->name == 'admin')
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link class="text-white text-base" :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <x-nav-link class="text-white text-base" href="{{ route('admin.sources.index') }}"
                            :active="request()->routeIs('sources')">
                            {{ __('Read Sources') }}
                        </x-nav-link>
                        <x-nav-link class="text-white text-base" href="{{ route('admin.source.index') }}"
                            :active="request()->routeIs('admin.source')">
                            {{ __('Source Admins') }}
                        </x-nav-link>
                        <x-nav-link class="text-white text-base" href="{{ route('admin.manager.index') }}" :active="request()->routeIs('admin.manager.index')">
                            {{ __('Managers') }}
                        </x-nav-link>
                        <x-nav-link class="text-white text-base" href="{{ route('admin.stories.index') }}"
                            :active="request()->routeIs('story')">
                            {{ __('Stories') }}
                        </x-nav-link>
                        <x-nav-link class="text-white text-base" href="{{ route('users.index') }}" :active="request()->routeIs('LucaUser')">
                            {{ __('Luca Users') }}
                        </x-nav-link>
                    </div>
                </div>
                @elseif(Auth::user()->roles->first()->name == 'sadmin')
                {{-- Navigation Links FOR SourceAdmin  --}}
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link class="text-white text-base" :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link class="text-white text-base" href="{{ route('sadmin.mysource') }}" :active="request()->routeIs('sadmin.mysource')">
                        {{ __('My Source') }}
                    </x-nav-link>
                    <x-nav-link class="text-white text-base" href="{{ route('sadmin.managers') }}" :active="request()->routeIs('sadmin.managers')">
                        {{ __('Managers') }}
                    </x-nav-link>
                    <x-nav-link class="text-white text-base" href="{{ route('sadmin.readers') }}" :active="request()->routeIs('sadmin.readers')">
                        {{ __('Readers') }}
                    </x-nav-link>
                </div>
                @elseif(Auth::user()->roles->first()->name == 'manager')
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link class="text-white text-base" :href="route('user.home')" :active="request()->routeIs('user.home')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link class="text-white text-base" href="{{ route('user.stories') }}" :active="request()->routeIs('user.stories')">
                        {{ __('My Stories') }}
                    </x-nav-link>
                    <x-nav-link class="text-white text-base" href="{{ route('user.readers') }}" :active="request()->routeIs('user.readers')">
                        {{ __('My Readers') }}
                    </x-nav-link>
                </div>
                @endif

        {{-- END of Navigation Links FOR SourceAdmin  --}}
        {{-- @endif --}}
        <!-- Settings Dropdown -->
        <div class="hidden sm:flex sm:items-center sm:ml-6">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button
                        class="flex items-center text-sm font-medium text-white text-base hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                        <div class="capitalize">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</div>
                        <div class="ml-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>
                <x-slot name="content">
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
        <!-- Hamburger -->
        <div class="-mr-2 flex items-center sm:hidden">
            <button @click="open = ! open"
                class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
    </div>
    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">


                {{-- Start of Mobile Navigation for Admin --}}
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link class="text-white text-base" href="#" :active="request()->routeIs('reader')">
                    {{ __('Readers') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link class="text-white text-base" href="#" :active="request()->routeIs('story')">
                    {{ __('Stories') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link class="text-white text-base" href="#" :active="request()->routeIs('LucaUser')">
                    {{ __('Luca Users') }}
                </x-responsive-nav-link>
                {{-- End of Mobile Navigation for Admin --}}


                {{-- Start of Mobile Navigation for SourceAdmin --}}
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link class="text-white text-base" href="#" :active="request()->routeIs('reader')">
                    {{ __('Readers') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link class="text-white text-base" href="#" :active="request()->routeIs('story')">
                    {{ __('Stories') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link class="text-white text-base" href="#" :active="request()->routeIs('LucaUser')">
                    {{ __('Luca Users') }}
                </x-responsive-nav-link>
                {{-- End of Mobile Navigation for SourceAdmin --}}

        </div>
        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
