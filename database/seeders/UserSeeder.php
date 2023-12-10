<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission as ModelsPermission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_list  = ModelsPermission::create(['name' => 'users.list']);
        $user_get   = ModelsPermission::create(['name' => 'users.get']);
        $user_create = ModelsPermission::create(['name' => 'users.create']);
        $user_update = ModelsPermission::create(['name' => 'users.update']);
        $user_delete = ModelsPermission::create(['name' => 'users.delete']);

        $admin_role = Role::create(['name' => 'admin']);
        $admin_role->givePermissionTo([
            $user_get, 
            $user_create,
            $user_update,
            $user_delete,
            $user_list
        ]);

        $admin = User::create([
            'name'      => 'John',
            'username'  => 'Admin',
            'firstname' => 'Smiths',
            'lastname'  => 'Smith',
            'uid'       =>  'jas',
            'company_id'  => 1,
            'verified'  => true,
            'role'  => 1,
            'password'  => bcrypt(12345678),                
        ]);
        $admin->assignRole($admin_role);
        $admin->givePermissionTo([
            $user_get, 
            $user_create,
            $user_update,
            $user_delete,
            $user_list
        ]);

        $user_role = Role::create(['name' => 'user']);
        $user_role->givePermissionTo([
            $user_get, 
            $user_create,
            $user_update,
            $user_delete,
            $user_list
        ]);

        $user = User::create([
            'name'      => 'Yan',
            'username'  => 'User',
            'firstname' => 'Smiths',
            'lastname'  => 'Smith',
            'uid'       =>  'jasd',
            'company_id'  => 1,
            'verified'  => true,
            'role'  => 2,
            'password'  => bcrypt(12345678),                
        ]);
        $user->assignRole($user_role);
        $admin->givePermissionTo([
            $user_get, 
            $user_create,
            $user_update,
            $user_delete,
            $user_list
        ]);
    }
}
