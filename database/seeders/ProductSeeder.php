<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //['proName', 'proPrice', 'proStock', 'proDiscount',
        // 'proStatus','proImageURL','proDescription','category_id'];
        Product::create([
            'proName' => 'Pome 1',
            'proPrice' => 2,
            'proStock' => 100,
            'proImageURL' => 'pome1.jpg',
            'proDescription' => 'Pome demo 1',
            'category_id' => 1,
        ]);
        Product::create([
            'proName' => 'Pome 2',
            'proPrice' => 2,
            'proStock' => 100,
            'proImageURL' => 'pome2.jpg',
            'proDescription' => 'Pome demo 2',
            'category_id' => 1,
        ]);
        Product::create([
            'proName' => 'Drupe 1',
            'proPrice' => 2,
            'proStock' => 100,
            'proImageURL' => 'Drupe1.jpg',
            'proDescription' => 'Drupe demo 1',
            'category_id' => 2,
        ]);
        Product::create([
            'proName' => 'Drupe 2',
            'proPrice' => 2,
            'proStock' => 100,
            'proImageURL' => 'Drupe2.jpg',
            'proDescription' => 'Drupe demo 2',
            'category_id' => 2,
        ]);
        Product::create([
            'proName' => 'Berry 1',
            'proPrice' => 2,
            'proStock' => 100,
            'proImageURL' => 'Berry1.jpg',
            'proDescription' => 'Berry demo 1',
            'category_id' => 3,
        ]);
        Product::create([
            'proName' => 'Berry 2',
            'proPrice' => 2,
            'proStock' => 100,
            'proImageURL' => 'Berry2.jpg',
            'proDescription' => 'Berry demo 2',
            'category_id' => 3,
        ]);
        Product::create([
            'proName' => 'Aggregate fruit 1',
            'proPrice' => 2,
            'proStock' => 100,
            'proImageURL' => 'Aggregatefruit1.jpg',
            'proDescription' => 'Aggregate fruit demo 1',
            'category_id' => 4,
        ]);
        Product::create([
            'proName' => 'Aggregate fruit 2',
            'proPrice' => 2,
            'proStock' => 100,
            'proImageURL' => 'Aggregatefruit2.jpg',
            'proDescription' => 'Aggregate fruit demo 2',
            'category_id' => 4,
        ]);
        Product::create([
            'proName' => 'Legumes 1',
            'proPrice' => 2,
            'proStock' => 100,
            'proImageURL' => 'Legumes1.jpg',
            'proDescription' => 'Legumes demo 1',
            'category_id' => 5,
        ]);
        Product::create([
            'proName' => 'Legumes 2',
            'proPrice' => 2,
            'proStock' => 100,
            'proImageURL' => 'Legumes2.jpg',
            'proDescription' => 'Legumes demo 2',
            'category_id' => 5,
        ]);
        Product::create([
            'proName' => 'Nuts 1',
            'proPrice' => 2,
            'proStock' => 100,
            'proImageURL' => 'Nuts1.jpg',
            'proDescription' => 'Nuts demo 1',
            'category_id' => 7,
        ]);
        Product::create([
            'proName' => 'Nuts 2',
            'proPrice' => 2,
            'proStock' => 100,
            'proImageURL' => 'Nuts2.jpg',
            'proDescription' => 'Nuts demo 2',
            'category_id' => 7,
        ]);
    }
}
