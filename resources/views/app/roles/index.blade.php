<x-tiffey::layouts.main-layout>
    <x-tiffey::card>
        <x-slot:header>@lang('auth::auth.roles.index.title')</x-slot:header>
        <livewire:auth::tables.roles />
    </x-tiffey::card>
</x-tiffey::layouts.main-layout>
