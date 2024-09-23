<x-tiffey::layouts.guest-layout>
    <form method="POST" action="{{ route('password.confirm') }}">
    <x-tiffey::card>
        <x-slot:header>{{ __('Confirm your password') }}</x-slot>
        <x-tiffey::alert level="info">
            {{ __('This is a secure area of the application, please confirm your password before proceeding.') }}
        </x-tiffey::alert>

    
        @csrf

        <x-tiffey::input id="password" type="password" label="{{ __('Password') }}" required autocomplete="current-password" />

        <x-slot:footerActions>
            <x-tiffey::form-button color="bg-brand-mid">
                {{ __('Confirm') }}
            </x-tiffey::form-button>
        </x-slot>
    </x-tiffey::card>
    </form>
</x-tiffey::layouts.guest-layout>
