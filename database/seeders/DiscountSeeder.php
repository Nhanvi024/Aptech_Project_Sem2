<?php

namespace Database\Seeders;

use App\Models\Discount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Discount::create([
            'code' => "discount10p",
            'name' => "discount 10 percent",
            'type' => "percent",
            'discount_value' => 10,
            'quantity' => 3000,
            'condition' => 500,
            'max_discount_value' => 50,
            'max_uses' => 3,
            'status' => 1,
            'used_by' => [
                "1" => 2,
                "2" => 1,
                "3" => 3
            ],
            'starts_at' => now()->subDays(10),
            'expires_at' => now()->addDays(30),
        ]);


        Discount::create([
            'code' => "discount40p",
            'name' => "discount 40 percent",
            'type' => "percent",
            'discount_value' => 40,
            'quantity' => 20,
            'condition' => 1000,
            'max_discount_value' => 400,
            'max_uses' => 1,
            'status' => 1,
            'used_by' => [
                "1" => 1,
                "3" => 1
            ],
            'starts_at' => now()->subDays(10),
            'expires_at' => now()->addDays(30),
        ]);

        Discount::create([
            'code' => "discountood",
            'name' => "discount expired",
            'type' => "percent",
            'discount_value' => 40,
            'quantity' => 20,
            'condition' => 1000,
            'max_discount_value' => 400,
            'max_uses' => 1,
            'status' => 1,
            'used_by' => [
                "1" => 1,
                "3" => 1
            ],
            'starts_at' => now()->subDays(100),
            'expires_at' => now()->subDays(30),
        ]);

        Discount::create([
            'code' => "discountDe",
            'name' => "discount inactive",
            'type' => "percent",
            'discount_value' => 40,
            'quantity' => 20,
            'condition' => 1000,
            'max_discount_value' => 400,
            'max_uses' => 1,
            'status' => 0,
            'used_by' => [
                "1" => 1,
                "3" => 1
            ],
            'starts_at' => now()->subDays(10),
            'expires_at' => now()->addDays(30),
        ]);

        Discount::create([
            'code' => "discount100f",
            'name' => "discount 100 fix",
            'type' => "fixed",
            'discount_value' => 100,
            'quantity' => 2000,
            'condition' => 1000,
            'max_discount_value' => 100,
            'max_uses' => 2,
            'status' => 1,
            'used_by' => [
                "1" => 1,
                "3" => 1
            ],
            'starts_at' => now()->subDays(10),
            'expires_at' => now()->addDays(30),
        ]);
        Discount::create([
            'code' => "discount50f",
            'name' => "discount 50 fix",
            'type' => "fixed",
            'discount_value' => 50,
            'quantity' => 20,
            'condition' => 1000,
            'max_discount_value' => 50,
            'max_uses' => 4,
            'status' => 1,
            'used_by' => [
                "1" => 1,
                "3" => 1
            ],
            'starts_at' => now()->subDays(10),
            'expires_at' => now()->addDays(30),
        ]);
        Discount::create([
            'code' => "discount25p",
            'name' => "discount 25 percent",
            'type' => "percent",
            'discount_value' => 40,
            'quantity' => 2000,
            'condition' => 1000,
            'max_discount_value' => 300,
            'max_uses' => 1,
            'status' => 1,
            'used_by' => [
                "3" => 1
            ],
            'starts_at' => now()->subDays(10),
            'expires_at' => now()->addDays(30),
        ]);
        Discount::create([
            'code' => "discountfuture",
            'name' => "discount future",
            'type' => "percent",
            'discount_value' => 10,
            'quantity' => 2000,
            'condition' => 1000,
            'max_discount_value' => 100,
            'max_uses' => 5,
            'status' => 1,
            'used_by' => [
                "3" => 1
            ],
            'starts_at' => now()->addDays(10),
            'expires_at' => now()->addDays(90),
        ]);
    }
}
