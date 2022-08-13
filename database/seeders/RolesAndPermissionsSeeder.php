<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        //Add new role call Super Admin
        $role = Role::create(['name'=>'Super Admin']);

        //list of permissions
        $permissions = [
            'display-roles',
            'create-roles',
            'store-roles',
            'edit-roles',
            'delete-roles',
         ];
         
         //insert permissions in loop
         foreach($permissions as $permission){
            Permission::create(['name'=> $permission]);
         }

         $role->syncPermissions($permissions);
         
    }
}
