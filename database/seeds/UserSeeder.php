<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\User::class)->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'role' => \App\Enums\UserRole::Admin,
            'password' => Hash::make('secret'),
        ]);
        factory(\App\Models\User::class)->create([
            'name' => 'User',
            'email' => 'user@user.com',
            'role' => \App\Enums\UserRole::User,
            'password' => Hash::make('secret'),
        ]);
    }
}
