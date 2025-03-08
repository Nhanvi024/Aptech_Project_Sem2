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

        Product::create([
            'proName' => 'Pome 1',
            'proCost' => 1,
            'proPrice' => 2,
            'proStock' => 100,
            'proSeason' => 'spring',
            'proOrigin' => 'farm 1',
            'proImageURL' => 'pome1.jpg',
            'proDescription' => 'Pome demo 1',
            'category_id' => 1,
        ]);
        Product::create([
            'proName' => 'Pome 2',
            'proCost' => 1,
            'proPrice' => 2,
            'proStock' => 100,
            'proSeason' => 'summer',
            'proOrigin' => 'farm 2',
            'proImageURL' => 'pome2.jpg',
            'proDescription' => 'Pome demo 2',
            'category_id' => 1,
        ]);
        Product::create([
            'proName' => 'Drupe 1',
            'proCost' => 1,
            'proPrice' => 2,
            'proStock' => 100,
            'proSeason' => 'autumn',
            'proOrigin' => 'farm 1',
            'proImageURL' => 'Drupe1.jpg',
            'proDescription' => 'Drupe demo 1',
            'category_id' => 2,
        ]);
        Product::create([
            'proName' => 'Drupe 2',
            'proCost' => 1,
            'proPrice' => 2,
            'proStock' => 5,
            'proSeason' => 'winter',
            'proOrigin' => 'farm 1',
            'proImageURL' => 'Drupe2.jpg',
            'proDescription' => 'Drupe demo 2',
            'category_id' => 2,
        ]);
        Product::create([
            'proName' => 'Berry 1',
            'proCost' => 1,
            'proPrice' => 2,
            'proStock' => 25,
            'proSeason' => 'spring',
            'proOrigin' => 'farm 6',
            'proImageURL' => 'Berry1.jpg',
            'proDescription' => 'Berry demo 1',
            'category_id' => 3,
        ]);
        Product::create([
            'proName' => 'Berry 2',
            'proCost' => 1,
            'proPrice' => 2,
            'proStock' => 10,
            'proSeason' => 'winter',
            'proOrigin' => 'farm 3',
            'proImageURL' => 'Berry2.jpg',
            'proDescription' => 'Berry demo 2',
            'category_id' => 3,
        ]);
        Product::create([
            'proName' => 'Aggregate fruit 1',
            'proCost' => 1,
            'proPrice' => 2,
            'proStock' => 100,
            'proSeason' => 'summer',
            'proOrigin' => 'farm 1',
            'proImageURL' => 'Aggregatefruit1.jpg',
            'proDescription' => 'Aggregate fruit demo 1',
            'category_id' => 4,
        ]);
        Product::create([
            'proName' => 'Aggregate fruit 2',
            'proCost' => 1,
            'proPrice' => 2,
            'proStock' => 60,
            'proSeason' => 'spring',
            'proOrigin' => 'farm 2',
            'proImageURL' => 'Aggregatefruit2.jpg',
            'proDescription' => 'Aggregate fruit demo 2',
            'category_id' => 4,
        ]);
        Product::create([
            'proName' => 'Legumes 1',
            'proCost' => 1,
            'proPrice' => 2,
            'proStock' => 100,
            'proSeason' => 'autumn',
            'proOrigin' => 'farm 1',
            'proImageURL' => 'Legumes1.jpg',
            'proDescription' => 'Legumes demo 1',
            'category_id' => 5,
        ]);
        Product::create([
            'proName' => 'Legumes 2',
            'proCost' => 1,
            'proPrice' => 2,
            'proStock' => 88,
            'proSeason' => 'summer',
            'proOrigin' => 'farm 3',
            'proImageURL' => 'Legumes2.jpg',
            'proDescription' => 'Legumes demo 2',
            'category_id' => 5,

        ]);
        Product::create([
            'proName' => 'Nuts 1',
            'proCost' => 1,
            'proPrice' => 2,
            'proStock' => 100,
            'proSeason' => 'spring',
            'proOrigin' => 'farm 4',
            'proImageURL' => 'Nuts1.jpg',
            'proDescription' => 'Nuts demo 1',
            'category_id' => 7,

        ]);
        Product::create([
            'proName' => 'Nuts 2',
            'proCost' => 1,
            'proPrice' => 2,
            'proStock' => 35,
            'proSeason' => 'winter',
            'proOrigin' => 'farm 5',
            'proImageURL' => 'Nuts2.jpg',
            'proDescription' => 'Nuts demo 2',
            'category_id' => 7,

        ]);
    }
}
