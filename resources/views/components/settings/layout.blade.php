<div class="flex items-start max-md:flex-col">
    <div class="me-10 w-full pb-4 md:w-[220px]">
        <ul class="menu rounded-box w-56">
            <li>
                <a href="{{ route('settings.profile') }}" class="{{ request()->routeIs('settings.profile') ? 'active font-semibold' : '' }}">
                    {{ __('Profile') }}
                </a>
            </li>
            <li>
                <a href="{{ route('settings.password') }}" class="{{ request()->routeIs('settings.password') ? 'active font-semibold' : '' }}">
                    {{ __('Password') }}
                </a>
            </li>
            <li>
                <a href="{{ route('settings.appearance') }}" class="{{ request()->routeIs('settings.appearance') ? 'active font-semibold' : '' }}">
                    {{ __('Appearance') }}
                </a>
            </li>
        </ul>

    </div>

    <flux:separator class="md:hidden" />

    <div class="flex-1 self-stretch max-md:pt-6">
        {{-- <flux:heading>{{ $heading ?? '' }}</flux:heading>
        <flux:subheading>{{ $subheading ?? '' }}</flux:subheading> --}}
        @if (!empty($heading))
        <h1 class="text-3xl font-bold text-primary">{{ $heading }}</h1>
        @endif

        @if (!empty($subheading))
        <p class="text-lg text-base-content mt-1">{{ $subheading }}</p>
        @endif

        <div class="mt-5 w-full max-w-lg">
            {{ $slot }}
        </div>
    </div>
</div>
