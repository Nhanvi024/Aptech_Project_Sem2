<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * Seeding admin users
         */

        Admin::create([
            'username' => 'superAdmin',
            'email' => 'superadmin@example.com',
            'password' => bcrypt(159357),
            'role' => 'superAdmin',
        ]);
        Admin::create([
            'username' => 'superAdmin2',
            'email' => 'superadmin2@example.com',
            'password' => bcrypt(159357),
            'role' => 'superAdmin',
        ]);
        Admin::create([
            'username' => 'admin01',
            'email' => 'admin01@example.com',
            'password' => bcrypt(159357),
            'role' => 'admin',
        ]);
        Admin::create([
            'username' => 'admin02',
            'email' => 'admin02@example.com',
            'password' => bcrypt(159357),
            'role' => 'admin',
        ]);
        Admin::create([
            'username' => 'admin03',
            'email' => 'admin03@example.com',
            'password' => bcrypt(159357),
            'role' => 'admin',
        ]);
        Admin::create([
            'username' => 'adminblock',
            'email' => 'adminblock@example.com',
            'password' => bcrypt(159357),
            'role' => 'admin',
            'blocked' => 1,
        ]);
    }
}
