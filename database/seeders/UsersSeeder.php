<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name'     => 'Admin',
                'password' => Hash::make('rahasia1'),
                'role'     => 1,
            ]
        );

        User::updateOrCreate(
            ['email' => 'imas@gmail.com'],
            [
                'name'     => 'User',
                'password' => Hash::make('rahasia1'),
                'role'     => 0,
            ]
        );
    }
}
