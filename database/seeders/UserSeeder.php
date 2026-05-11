<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name'     => 'Admin Dapoer',
                'email'    => 'admin@dapoer.id',
                'password' => 'admin123',
            ],
            [
                'name'     => 'Aria Kusuma',
                'email'    => 'aria@dapoer.id',
                'password' => 'password',
            ],
            [
                'name'     => 'Budi Santoso',
                'email'    => 'budi@dapoer.id',
                'password' => 'password',
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(['email' => $user['email']], $user);
        }
    }
}
