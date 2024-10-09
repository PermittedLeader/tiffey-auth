<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Permission::create([
            'name'=>'view permissions',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'list permissions',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'create roles',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'list roles',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'update roles',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'delete roles',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'attach roles',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'view roles',
            'guard_name'=>'web'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // down
    }
};
