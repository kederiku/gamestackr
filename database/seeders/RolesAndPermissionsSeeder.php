<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Spatie\Permission\PermissionRegistrar;


class RolesAndPermissionsSeeder extends Seeder
{

    public function run()
    {

        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'access.panel.admin']);
        Permission::create(['name' => 'user.view']);
        Permission::create(['name' => 'user.create']);
        Permission::create(['name' => 'user.edit']);
        Permission::create(['name' => 'user.delete']);
        Permission::create(['name' => 'role.view']);
        Permission::create(['name' => 'role.create']);
        Permission::create(['name' => 'role.edit']);
        Permission::create(['name' => 'role.delete']);
        Permission::create(['name' => 'permission.view']);
        Permission::create(['name' => 'permission.create']);
        Permission::create(['name' => 'permission.edit']);
        Permission::create(['name' => 'permission.delete']);

        // SUPER ADMINISTRATOR
        $role_super_admin = Role::create(['name' => 'God']);
        $role_super_admin->givePermissionTo('access.panel.admin');

        // ADMINISTRATOR
        $role_admin = Role::create(['name' => 'Administrator']);
        $role_admin->givePermissionTo('access.panel.admin');
        $role_admin->givePermissionTo('permission.view');
        $role_admin->givePermissionTo('role.view');
        $role_admin->givePermissionTo('user.view');
        $role_admin->givePermissionTo('user.create');
        $role_admin->givePermissionTo('user.edit');
        $role_admin->givePermissionTo('user.delete');

        // MODERATOR
        $role_moderator = Role::create(['name' => 'Moderator']);
        $role_moderator->givePermissionTo('access.panel.admin');
        $role_moderator->givePermissionTo('user.view');
        
        // USER
        $user = Role::create(['name' => 'User']);
    }
}

// https://spatie.be/docs/laravel-permission/v5/advanced-usage/seeding
