<?php

namespace Permittedleader\TiffeyAuth\Livewire\Tables\Roles;

use Spatie\Permission\Models\Permission;
use Illuminate\Contracts\Database\Eloquent\Builder;
use App\Models\User;
use Permittedleader\Tables\Http\Livewire\BelongsToManyTable;
use Permittedleader\Tables\View\Components\Actions\Action;
use Permittedleader\Tables\View\Components\Columns\Column;

class UserAttach extends BelongsToManyTable
{
    public bool $isSearchable = false;

    public bool $isExportable = false;

    public bool $isFilterable = false;

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
