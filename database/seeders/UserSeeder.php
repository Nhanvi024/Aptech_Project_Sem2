<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
            'password' => Hash::make('159357'),
            'type' => 'superAdmin',
        ]);

        /**
         * Seeding customer
         */
    }
}
