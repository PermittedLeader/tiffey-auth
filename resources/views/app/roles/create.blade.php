<x-tiffey::layouts.main-layout>
    <x-slot:pageTitle>{{ __('auth::auth.roles.create_title') }}</x-slot:pageTitle>
    @if($errors->any())
        <x-tiffey::alert level="warning">
            <x-slot name="header">
                {{ __('You have errors in your form') }}
            </x-slot>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </x-tiffey::alert>
    @endif
    <form method="POST" action="{{ route('roles.store') }}">
        @csrf
        <x-tiffey::card>
            <x-slot:header>{{ __('auth::auth.roles.create_title') }}</x-slot:header>
            
            <x-tiffey::input
                label="{{ __('auth::auth.roles.inputs.name') }}"
                name="name"
                autocomplete="false"
                value="{{ old('name') }}"
                />

            <x-slot:footerActions>
                <x-tiffey::form-button color="bg-brand-mid">
                    {{ __('auth::auth.common.create') }}
                </x-tiffey::form-button>
            </x-slot:footerActions>
        </x-tiffey::card>
    </form>
</x-tiffey::layouts.main-layout>
