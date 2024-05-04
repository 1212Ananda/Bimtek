<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['nama' => 'admin'],
            ['nama' => 'bendahara'],
            ['nama' => 'instruktur'],
            ['nama' => 'perusahaan'],
        ];

        foreach ($roles as $role) {
            Role::insert($role);
        }
    }
}
