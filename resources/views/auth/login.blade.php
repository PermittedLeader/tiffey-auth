<x-tiffey::layouts.guest-layout>
    @if (session('status'))
        <x-tiffey::alert level="info">{{ session('status') }}</x-tiffey::alert>
    @endif

    <form method="POST" action="{{ route('login') }}" class="w-full">
        @csrf
        <x-tiffey::card>
        <!-- Email Address -->
        <x-tiffey::input id="email" type="email" label="{{ __('Email') }}" :value="old('email')" required autofocus autocomplete="username" />

        <x-tiffey::input id="password" type="password" label="{{ __('Password') }}" required autocomplete="current-password" />

        <x-tiffey::input.checkbox label="{{ __('Remember me') }}" name="remember" />
            <x-slot name="footerActions">
                @if (Route::has('password.request'))
                    <x-tiffey::button href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </x-tiffey::button>
                @endif
                <x-tiffey::form-button color="bg-brand-mid">
                    {{ __('Log in') }}
                </x-tiffey::form-button>
            </x-slot>
        </x-tiffey::card>
    </form>
</x-tiffey::layouts.guest-layout>
