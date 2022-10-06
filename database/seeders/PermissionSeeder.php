<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'getAll']);
        Permission::create(['name' => 'getById']);
        Permission::create(['name' => 'upsert']);
        Permission::create(['name' => 'upsert important']);
        Permission::create(['name' => 'delete']);
        Permission::create(['name' => 'delete important']);

        $role1 = Role::create(['name' => 'Admin']);
        $role1->givePermissionTo('getAll');
        $role1->givePermissionTo('getById');
        $role1->givePermissionTo('upsert');
        $role1->givePermissionTo('delete');

        $role3 = Role::create(['name' => 'Super-Admin']);
        $role3->givePermissionTo('getAll');
        $role3->givePermissionTo('getById');
        $role3->givePermissionTo('upsert');
        $role3->givePermissionTo('upsert important');
        $role3->givePermissionTo('delete important');

        $user = User::create([
            'name' => 'super admin',
            'username' => 'Super Admin',
            'password' => Hash::make('UCDf0666'),
            'is_member' => false
        ]);

        $user->assignRole('Super-Admin');
    }
}
