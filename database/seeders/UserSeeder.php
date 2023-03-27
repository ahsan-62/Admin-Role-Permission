<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Admin
        $adminRoleId = Role::where('role_slug', 'admin')->first()->id;

        User::updateOrCreate([
            'role_id' => $adminRoleId,
            'name' => 'Admin1',
            'email' => 'admin1@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1234'), // 1234
            'remember_token' => Str::random(10),
        ]);

        User::updateOrCreate([
            'role_id' => $adminRoleId,
            'name' => 'Admin2',
            'email' => 'admin2@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1234'), // 1234
            'remember_token' => Str::random(10),
        ]);


        // Create User
        $userRoleId = Role::where('role_slug', 'user')->first()->id;
        User::updateOrCreate([
            'role_id' => $userRoleId,
            'name' => 'User1',
            'email' => 'user1@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1234'), // 1234
            'remember_token' => Str::random(10),
        ]);

    }
}
