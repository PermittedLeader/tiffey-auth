<?php

namespace Permittedleader\TiffeyAuth\Livewire\Tables\Roles;

use Spatie\Permission\Models\Permission;
use Illuminate\Contracts\Database\Eloquent\Builder;
use App\Models\User;
use Permittedleader\Tables\Http\Livewire\AttachedTable;
use Permittedleader\Tables\View\Components\Actions\Action;
use Permittedleader\Tables\View\Components\Columns\Column;

class UserIndex extends AttachedTable
{
    public bool $isSearchable = false;

    public bool $isExportable = false;

    public bool $isFilterable = false;

    public string $namespace = __NAMESPACE__;

    public function query(): Builder
    {
        return User::query();
    }

    public function columns(): array
    {
        return [
            Column::make((new User)->getKeyName()),
            Column::make('name')->sortable(),
            Column::make('email')->sortable(),
        ];
    }
}
