<?php

namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Cart::create([
            'userId' => 1,
            'itemsList' => [],
        ]);
        Cart::create([
            'userId' => 2,
            'itemsList' => [],
        ]);
        Cart::create([
            'userId' => 3,
            'itemsList' => [],
        ]);
        Cart::create([
            'userId' => 4,
            'itemsList' => [],
        ]);
        Cart::create([
            'userId' => 5,
            'itemsList' => [],
        ]);
        Cart::create([
            'userId' => 6,
            'itemsList' => [],
        ]);
    }
}
