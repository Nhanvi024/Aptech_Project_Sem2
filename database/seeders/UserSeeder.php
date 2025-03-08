<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
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
         * Seeding customer
         */
        User::create([
            'name' => 'Name user01',
            'username' => 'user01',
            'gender' => 1,
            'email' => 'user01@gmail.com',
            'password' => bcrypt(159357),
            'dob' => '1990-02-01',
            'phone' => '0123456789',
            'address' => 'Q12, HCM',
            'blocked' => false,
            'email_verified_at' => now(),
        ]);
        User::create([
            'name' => 'Name user02',
            'username' => 'user02',
            'gender' => 2,
            'email' => 'user02@gmail.com',
            'password' => bcrypt(159357),
            'dob' => '1995-12-15',
            'phone' => '0987654321',
            'address' => '456 Elm St',
            'blocked' => false,
            'email_verified_at' => now(),
        ]);
        User::create([
            'name' => 'Name user03',
            'username' => 'user03',
            'gender' => 2,
            'email' => 'user03@gmail.com',
            'password' => bcrypt(159357),
            'dob' => '1992-08-25',
            'phone' => '0123456780',
            'address' => '789 Oak St',
            'blocked' => true,
            'email_verified_at' => null,
        ]);
        User::create([
            'name' => 'Name user04',
            'username' => 'user04',
            'gender' => 0,
            'email' => 'user04@gmail.com',
            'password' => bcrypt(159357),
            'dob' => '1997-06-10',
            'phone' => '0987654320',
            'address' => '123 Main St',
            'blocked' => false,
            'email_verified_at' => now(),
        ]);
    }
}
