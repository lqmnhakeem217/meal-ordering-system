<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Generate Super Admin User
        $user = User::create([
            'name'=>'superadmin',
            'email'=>'admin@example.com',
            'password'=>'admin123'
        ]);

        $user->assignRole([Role::find(1)]);
        $user->givePermissionTo(Permission::all());
    }
}
