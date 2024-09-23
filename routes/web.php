<?php

use Illuminate\Support\Facades\Route;
use Permittedleader\TiffeyAuth\Http\Controllers\PermissionController;


Route::resource('permissions', PermissionController::class)->only(['index','show'])->middleware(['auth','web']);