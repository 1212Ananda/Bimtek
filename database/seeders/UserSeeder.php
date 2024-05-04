<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123123123'),
                'role_id' => '1',
            ],
            [
                'name' => 'Bendahara',
                'email' => 'Bendahara@gmail.com',
                'password' => bcrypt('123123123'),
                'role_id' => '2',
            ],
            [
                'name' => 'Instruktur',
                'email' => 'instruktur@gmail.com',
                'password' => bcrypt('123123123'),
                'role_id' => '3',
            ],
            [
                'name' => 'Perusahaan',
                'email' => 'Perusahaan@gmail.com',
                'password' => bcrypt('123123123'),
                'role_id' => '4',
            ],
        ];

        User::insert($data);
    }
}
