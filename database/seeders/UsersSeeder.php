<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;



class UsersSeeder extends Seeder
{

    public function run()
    {

        $super_admin = User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
        ]);
        $super_admin->assignRole('God');

        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ]);
        $admin->assignRole('Administrator');

        $moderator = User::factory()->create([
            'name' => 'Moderator',
            'email' => 'moderator@example.com',
        ]);
        $moderator->assignRole('Moderator');

        $user = User::factory()->create([
            'name' => 'User',
            'email' => 'user@example.com',
        ]);
        $user->assignRole('User');

    }
}
