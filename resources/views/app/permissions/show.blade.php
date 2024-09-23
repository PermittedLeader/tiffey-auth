<x-tiffey::layouts.main-layout>
    <x-slot name="pageTitle">
        @lang('tiffey::auth.permissions.show.title')
    </x-slot>
    <x-tiffey::card>
        <x-slot:header>
            <a href="{{ route('permissions.index') }}" class="mr-4">
                <i class="mr-1 fa-solid fa-chevron-left"></i>
            </a> 
            @lang('tiffey::auth.permissions.show.title')
        </x-slot:header>

        <div class="mt-4 px-4">
            <div class="mb-4">
                <h5 class="font-medium">
                    @lang('tiffey::auth.permissions.fields.name')
                </h5>
                <span>{{ $permission->name ?? '-' }}</span>
            </div>
        </div>
    </x-tiffey::card>
</x-tiffey::layouts.main-layout>
