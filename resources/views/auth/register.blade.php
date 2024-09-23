<x-tiffey::layouts.guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <x-tiffey::card>
            <x-tiffey::input 
                label="{{ __('Name') }}" 
                name="name"
                value="{{ old('name') }}" 
                autofocus 
                autocomplete="name" 
                required 
            />

            <x-tiffey::input
                label="{{ __('Email') }}"
                name="email"
                value="{{ old('email') }}" 
                autocomplete="username" 
                required 
            />

            <x-tiffey::input
                type="password"
                name="password"
                label="{{ __('Password') }}"
                autocomplete="new-password"
            />

            <x-tiffey::input
                type="password"
                name="password_confirmation"
                label="{{ __('Confirm Password') }}"
                autocomplete="new-password"
            />

            <x-slot:footerActions>
            <x-tiffey::button href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </x-tiffey::button>

            <x-tiffey::form-button color="bg-brand-mid">
                {{ __('Register') }}
            </x-tiffey::form-button>
            </x-slot:footerActions>
        </x-tiffey::card>
    </form>
</x-tiffey::layouts.guest-layout>
