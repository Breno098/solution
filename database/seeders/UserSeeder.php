<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Breno Souza',
            'email' => 'brenohenrique098@gmail.com',
            'password' => Hash::make('defaultAdm098'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('senhaParaAdmin@9876'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
    }
}
