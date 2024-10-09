<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Permission::updateOrCreate([
            'name'=>'view permissions',
            'guard_name'=>'web'
        ]);
        Permission::updateOrCreate([
            'name'=>'list permissions',
            'guard_name'=>'web'
        ]);
        Permission::updateOrCreate([
            'name'=>'create roles',
            'guard_name'=>'web'
        ]);
        Permission::updateOrCreate([
            'name'=>'list roles',
            'guard_name'=>'web'
        ]);
        Permission::updateOrCreate([
            'name'=>'update roles',
            'guard_name'=>'web'
        ]);
        Permission::updateOrCreate([
            'name'=>'delete roles',
            'guard_name'=>'web'
        ]);
        Permission::updateOrCreate([
            'name'=>'attach roles',
            'guard_name'=>'web'
        ]);
        Permission::updateOrCreate([
            'name'=>'view roles',
            'guard_name'=>'web'
        ]);

        if(Role::where('name','Super Admin')->count() == 0){
            $role = Role::updateOrCreate([
                'name'=>'Super Admin'
            ]);

            $role->givePermissionTo(Permission::all());
        };
        

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // down
    }
};
