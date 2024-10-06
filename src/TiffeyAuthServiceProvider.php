<?php
namespace Permittedleader\TiffeyAuth;

use Livewire\Livewire;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Permittedleader\TiffeyAuth\Livewire\Tables\Roles\RoleIndex;
use Permittedleader\TiffeyAuth\Livewire\Tables\Permissions\PermissionIndex;
use Permittedleader\TiffeyAuth\Livewire\Tables\Roles\UserAttach;
use Permittedleader\TiffeyAuth\Livewire\Tables\Roles\UserIndex;
use Spatie\Permission\Models\Role;

class TiffeyAuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__."/../resources/views" => resource_path('views/vendor/tiffey-auth')
        ],'tiffey-views');
        $this->loadViewsFrom(__DIR__.'/../resources/views','auth');
        Blade::componentNamespace('Permittedleader\\Tiffey\\View','auth');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        Livewire::component('auth::tables.permissions', PermissionIndex::class);
        Livewire::component('auth::tables.roles', RoleIndex::class);
        Livewire::component('auth::tables.role-users', UserIndex::class);
        Livewire::component('auth::tables.available-users', UserAttach::class);

        $this->loadTranslationsFrom(__DIR__.'/../lang', 'auth');

        Gate::define('view permissions', function (User $user) {
            return $user->hasRole('Super Admin') || $user->hasPermissionTo('list permissions');
        });

        Gate::define('create roles', function (User $user) {
            return $user->hasRole('Super Admin') || $user->hasPermissionTo('create roles');
        });

        Gate::define('attach roles', function (User $user, Role $role) {
            return $user->hasRole('Super Admin') || $user->hasPermissionTo('attach roles');
        });

        Gate::define('list roles', function (User $user) {
            return $user->hasRole('Super Admin') || $user->hasPermissionTo('list roles');
        });

        Gate::define('view roles', function (User $user, Role $role) {
            return $user->hasRole('Super Admin') || $user->hasPermissionTo('view roles');
        });

        Gate::define('update roles', function (User $user, Role $role) {
            return $user->hasRole('Super Admin') || $user->hasPermissionTo('update roles');
        });

        Gate::define('delete roles', function (User $user, Role $role) {
            return $user->hasRole('Super Admin') || $user->hasPermissionTo('delete roles');
        });
    }

    public function register()
    {
        //
    }
}