<x-tiffey::layouts.guest-layout>
    <x-tiffey::card>
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        @if (session('status') == 'verification-link-sent')
            <x-tiffey::alert level="info">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </x-tiffey::alert>
        @endif
        <x-slot:footerActions>
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <x-tiffey::form-button color="bg-brand-mid">
                    {{ __('Resend Verification Email') }}
                </x-tiffey::form-button>
            </form>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-tiffey::form-button>
                    {{ __('Log Out') }}
                </x-tiffey::form-button>
            </form>
        </x-slot:footerActions>
    </x-tiffey::card>
</x-tiffey::layouts.guest-layout>
