<x-tiffey::layouts.guest-layout>
    <form method="POST" action="{{ route('password.email') }}">
    <x-tiffey::card>
        <x-slot:header>{{ __('Forgot your password?') }}</x-slot>
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        @csrf
        @if (session('status'))
            <x-tiffey::alert level="info">
                {{ session('status') }}
            </x-tiffey::alert>
        @endif

        <x-tiffey::input id="email" type="email" label="{{ __('Email') }}" :value="old('email')" required autofocus autocomplete="username" />

        <x-slot:footerActions>
            <x-tiffey::form-button color="bg-brand-mid">
                {{ __('Email Password Reset Link') }}
            </x-tiffey::form-button>
        </x-slot>
    </x-tiffey::card>
    </form>
</x-tiffey::layouts.guest-layout>
