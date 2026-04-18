<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name'              => 'Administrator',
                'password'          => Hash::make('password'),
                'email_verified_at' => now(),
                'is_active'         => true,
            ]
        );
        $admin->assignRole('admin');
        UserProfile::firstOrCreate(['user_id' => $admin->id]);

        $owner = User::firstOrCreate(
            ['email' => 'owner@example.com'],
            [
                'name'              => 'Jan Właściciel',
                'password'          => Hash::make('password'),
                'email_verified_at' => now(),
                'is_active'         => true,
            ]
        );
        $owner->assignRole('owner');
        UserProfile::firstOrCreate(['user_id' => $owner->id]);

        $user = User::firstOrCreate(
            ['email' => 'user@example.com'],
            [
                'name'              => 'Anna Kowalska',
                'password'          => Hash::make('password'),
                'email_verified_at' => now(),
                'is_active'         => true,
            ]
        );
        $user->assignRole('user');
        UserProfile::firstOrCreate(['user_id' => $user->id]);
    }
}
