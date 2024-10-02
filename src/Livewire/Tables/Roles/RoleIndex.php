<?php

namespace Permittedleader\TiffeyAuth\Livewire\Tables\Roles;

use Spatie\Permission\Models\Role;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Gate;
use Permittedleader\Tables\Http\Livewire\Table;
use Permittedleader\Tables\View\Components\Actions\Action;
use Permittedleader\Tables\View\Components\Columns\Column;

class RoleIndex extends Table
{
    public bool $isSearchable = false;

    public bool $isExportable = false;

    public bool $isFilterable = false;

    public function query(): Builder
    {
        return Role::query();
    }

    public function columns(): array
    {
        return [
            Column::make('name')->sortable(),
        ];
    }

    public function actions(): array
    {
        return [
            Action::show('roles.show')->gate(function($role){
                return Gate::allows('view roles', $role);
            }),
            Action::edit('roles.edit')->gate(function($role){
                return Gate::allows('update roles', $role);
            }),
            Action::delete('roles.destroy')->gate(function($role){
                return Gate::allows('delete roles', $role);
            }),
        ];
    }

    public function tableActions(): array
    {
        return [
            Action::create('roles.create')->gate(function($role){
                return Gate::allows('create roles');
            }),
        ];
    }
}
