<?php

use Illuminate\Support\Facades\Route;
use Permittedleader\TiffeyAuth\Http\Controllers\PermissionController;
use Permittedleader\TiffeyAuth\Http\Controllers\RoleController;

Route::resource('permissions', PermissionController::class)->only(['index','show'])->middleware(['auth','web']);

Route::resource('roles', RoleController::class)->middleware(['auth','web']);