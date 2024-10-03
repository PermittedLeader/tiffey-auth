<x-tiffey::layouts.main-layout>
    <x-slot:pageTitle>{{ __('auth::auth.roles.edit_title') }}</x-slot:pageTitle>
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
    <form method="POST" action="{{ route('roles.update',$role) }}">
        @csrf
        @method('PATCH')
        <x-tiffey::card>
            <x-slot:header>{{ __('auth::auth.roles.edit_title') }}</x-slot:header>
            
            <x-tiffey::input
                label="{{ __('auth::auth.roles.inputs.name') }}"
                name="name"
                autocomplete="false"
                value="{{ old('name', $role->name) }}"
                />

            <x-tiffey::card>
                <x-slot:header>{{ trans_choice('auth::auth.permissions.name',2) }}</x-slot:header>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                @foreach (array_keys($permissions->toArray()) as $group)
                    <x-tiffey::card>
                        <x-slot:header>{{ Str::title($group) }}</x-slot:header>
                        @foreach ($permissions[$group] as $permission)
                        <x-tiffey::input.checkbox
                            label="{{ Str::title($permission->name) }}"
                            name="permissions[]"
                            value="{{ $permission->id }}"
                            checked="{{ old('permissions',$role->permissions->contains($permission)) }}"
                            :checked="old('permissions',$role->permissions->contains($permission))"
                            />
                            
                        @endforeach
                    </x-tiffey::card>
                @endforeach
                </div>
            </x-tiffey::card>

            <x-slot:footerActions>
                <x-tiffey::form-button color="bg-brand-mid">
                    {{ __('auth::auth.common.save') }}
                </x-tiffey::form-button>
            </x-slot:footerActions>
        </x-tiffey::card>
    </form>
</x-tiffey::layouts.main-layout>