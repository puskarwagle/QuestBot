<!DOCTYPE html>
<html data-theme="dark">
<head>
    @include('partials.head')
</head>
<body class="min-h-screen">
    <div class="navbar bg-base-200 shadow-sm">
        <div class="navbar-start">
            <div class="dropdown">
                <button tabindex="0" class="btn btn-ghost btn-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                </button>
                <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[100] p-2 bg-base-200 shadow w-64 text-base">
                    {{-- <li class="menu-title text-sm font-bold uppercase tracking-wide">
                        <span>Platform</span>
                    </li>
                    <li>
                        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 {{ request()->routeIs('dashboard') ? 'active font-semibold' : '' }}" wire:navigate>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0h6" />
                            </svg>
                            <span>{{ __('Dashboard') }}</span>
                        </a>
                    </li> --}}

                    <li class="menu-title text-sm font-bold uppercase tracking-wide mt-2">
                        <span>My Details</span>
                    </li>
                    <li>
                        <a href="{{ route('personal-info') }}" class="flex items-center gap-3 {{ request()->routeIs('personal-info') ? 'active font-semibold' : '' }}" wire:navigate>
                            <span class="text-lg">👤</span>
                            <span>{{ __('Personal Info') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('secret-info') }}" class="flex items-center gap-3 {{ request()->routeIs('secret-info') ? 'active font-semibold' : '' }}" wire:navigate>
                            <span class="text-lg">🔐</span>
                            <span>{{ __('Secret Info') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('bot-config') }}" class="flex items-center gap-3 {{ request()->routeIs('bot-config') ? 'active font-semibold' : '' }}" wire:navigate>
                            <span class="text-lg">⚙️</span>
                            <span>{{ __('Bot Config') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('question-info') }}" class="flex items-center gap-3 {{ request()->routeIs('question-info') ? 'active font-semibold' : '' }}" wire:navigate>
                            <span class="text-lg">ℹ️</span>
                            <span>{{ __('Question Info') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('search-info') }}" class="flex items-center gap-3 {{ request()->routeIs('search-info') ? 'active font-semibold' : '' }}" wire:navigate>
                            <span class="text-lg">🔍</span>
                            <span>{{ __('Search Info') }}</span>
                        </a>
                    </li>
                    <li class="menu-title text-sm font-bold uppercase tracking-wide mt-2">
                        <span>Bot Management</span>
                    </li>
                    <li>
                        <a href="{{ route('run-python') }}" class="flex items-center gap-3 {{ request()->routeIs('run-python') ? 'active font-semibold' : '' }}" wire:navigate>
                            <span class="text-lg">🤖</span>
                            <span>{{ __('Run The Bot') }}</span>
                        </a>
                    </li>
                </ul>
            </div>
            <a class="btn btn-ghost text-xl" href="{{ route('dashboard') }}">QuestBot</a>
        </div>

        <!-- Center Brand -->
        <div class="navbar-center">

        </div>

        <!-- Right Controls -->
        <div class="navbar-end flex gap-2 items-center">
            <!-- Theme Switcher -->
            <div class="dropdown">
                <button tabindex="0" class="btn btn-sm">
                    Theme
                    <svg width="12px" height="12px" class="ml-1 h-2 w-2 fill-current opacity-60" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2048 2048">
                        <path d="M1799 349l242 241-1017 1017L7 590l242-241 775 775 775-775z" />
                    </svg>
                </button>
                <ul tabindex="0" class="dropdown-content z-[100] mt-2 w-52 p-2 bg-base-200 shadow-2xl rounded-box">
                    <li data-theme="light">
                        <input type="radio" name="theme-dropdown" value="Light" aria-label="light" class="theme-controller w-full btn btn-sm btn-ghost justify-start" />
                    </li>
                    <li data-theme="dark">
                        <input type="radio" name="theme-dropdown" value="dark" aria-label="Dark" class="theme-controller w-full btn btn-sm btn-ghost justify-start" />
                    </li>
                    <li data-theme="luxury">
                        <input type="radio" name="theme-dropdown" value="luxury" aria-label="Luxury" class="theme-controller w-full btn btn-sm btn-ghost justify-start" />
                    </li>
                    <li data-theme="valentine">
                        <input type="radio" name="theme-dropdown" value="valentine" aria-label="Valentine" class="theme-controller w-full btn btn-sm btn-ghost justify-start" />
                    </li>
                    <li data-theme="cyberpunk">
                        <input type="radio" name="theme-dropdown" value="cyberpunk" aria-label="Cyberpunk" class="theme-controller w-full btn btn-sm btn-ghost justify-start" />
                    </li>
                </ul>
            </div>

            <!-- Search Input -->
            {{-- <input type="text" placeholder="Search" class="input input-bordered w-24 md:w-auto" /> --}}

            <!-- Profile Dropdown -->
            <div class="dropdown dropdown-end">
                <button tabindex="0" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img alt="User avatar" src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
                    </div>
                </button>
                <ul tabindex="0" class="menu menu-sm dropdown-content z-[100] mt-3 p-2 shadow bg-base-200 rounded-box w-64">
                    <li class="">
                        <div class="flex items-center gap-3">

                            <div class="avatar avatar-placeholder">
                                <div class="bg-neutral text-neutral-content w-8 rounded-full">
                                    <span class="text-xl">{{ auth()->user()->initials() }}</span>
                                </div>
                            </div>

                            <div>
                                <p class="font-semibold text-sm truncate">{{ auth()->user()->name }}</p>
                                <p class="text-xs truncate">{{ auth()->user()->email }}</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="{{ route('settings.profile') }}" class="flex items-center gap-3 {{ request()->routeIs('settings.profile') ? 'active font-semibold' : '' }}">
                            <span class="text-lg">⚙️</span>
                            <span>{{ __('Settings') }}</span>
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="flex items-center gap-3 w-full text-left">
                                <span class="text-lg">🚪</span>
                                <span>{{ __('Log Out') }}</span>
                            </button>
                        </form>
                    </li>

                </ul>
            </div>
        </div>
    </div>

    <div class="p-6">
        {{ $slot }}
    </div>
    @fluxScripts
    @livewireScripts
</body>
</html>
