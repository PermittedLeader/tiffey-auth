<x-tiffey::layouts.main-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('auth::auth.permissions.index.title')
        </h2>
    </x-slot>
    <x-tiffey::card>
        <x-slot:header>@lang('auth::auth.permissions.index.title')</x-slot:header>
        <livewire:auth::tables.permissions />
    </x-tiffey::card>
</x-tiffey::layouts.main-layout>
