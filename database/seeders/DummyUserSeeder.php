<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Admin',
                'email' => 'a@mail.com',
                'role' => 'admin',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Petugas',
                'email' => 'p@mail.com',
                'role' => 'petugas',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Masyarakat',
                'email' => 'm@mail.com',
                'role' => 'masyarakat',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Eliv Kurniawan',
                'email' => 'ek@mail.com',
                'role' => 'admin',
                'password' => bcrypt('123')
            ],
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
