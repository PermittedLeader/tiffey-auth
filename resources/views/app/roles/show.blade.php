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
        <x-tiffey::card>
            <x-slot:header>{{ trans_choice('auth::auth.roles.name',1) }}: {{ $role->name }}</x-slot:header>
            
            

            <x-tiffey::card>
                <x-slot:header>{{ trans_choice('auth::auth.permissions.name',2) }}</x-slot:header>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                @foreach (array_keys($permissions->toArray()) as $group)
                    <x-tiffey::card>
                        <x-slot:header>{{ Str::title($group) }}</x-slot:header>
                            @foreach ($permissions[$group] as $permission)
                                <div>
                                    <x-dynamic-component component="tiffey::icon.{{$role->permissions->contains($permission) ? 'true' : 'false' }}" />
                                    {{ Str::title($permission->name) }}
                                </div>    
                            @endforeach
                    </x-tiffey::card>
                @endforeach
                </div>
            </x-tiffey::card>
            <x-slot:footerActions>
                <x-tiffey::button color="bg-brand-mid" href="{{ route('roles.edit',$role) }}">
                    {{ __('auth::auth.common.edit') }}
                </x-tiffey::button>
            </x-slot:footerActions>
        </x-tiffey::card>

        <div x-data="{ showModal: false }">
            <x-tiffey::card>
                <x-slot:header>{{ trans_choice('auth::auth.users.name',2) }}</x-slot:header>
                <x-slot:actions>
                    <x-tiffey::button @click="showModal = true">
                        {{ __('tables::tables.relationships.attach')}}
                    </x-tiffey::button>
                </x-slot:actions>
                <livewire:auth::tables.role-users :model="$role" relationshipName="users" :scope="['type'=>'relation','related'=>'roles', 'value'=>$role->id]" />
            </x-tiffey::card>
            <x-tiffey::modal x-model="showModal">
                <livewire:auth::tables.available-users :model="$role" relationshipName="users" />
            </x-tiffey::modal>
        </div>
</x-tiffey::layouts.main-layout>