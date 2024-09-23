<?php
namespace Permittedleader\TiffeyAuth;

use Livewire\Livewire;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Permittedleader\TiffeyAuth\Livewire\Tables\Permissions\PermissionIndex;

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

        $this->loadTranslationsFrom(__DIR__.'/../lang', 'tiffey');

        Gate::define('view permissions', function (User $user) {
            return $user->hasRole('Super Admin');
        });
    }

    public function register()
    {
        //
    }
}