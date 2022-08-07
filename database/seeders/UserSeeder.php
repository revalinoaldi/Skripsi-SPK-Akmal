<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Akmal',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'phone_number' => '08121231231',
            'password' => Hash::make('password12'),
            'role' => 'admin',
        ]);

        $siswa = User::create([
            'name' => 'Siswa 1',
            'email' => 'siswa@example.com',
            'email_verified_at' => now(),
            'phone_number' => '081212234',
            'password' => Hash::make('password12'),
            'role' => 'siswa',
        ]);
    }
}
