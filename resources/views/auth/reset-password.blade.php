<x-tiffey::layouts.guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf
        <x-tiffey::card>
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
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
                <x-tiffey::form-button color="bg-brand-mid">
                    {{ __('Reset Password') }}
                </x-tiffey::form-button>
            </x-slot:footerActions>
        </x-tiffey::card>
    </form>
</x-tiffey::layouts.guest-layout>
