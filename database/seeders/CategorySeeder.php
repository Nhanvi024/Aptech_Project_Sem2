<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'catName' => 'Vietnamese fruit',
        ]);
        Category::create([
            'catName' => 'Imported fruit',
        ]);
        Category::create([
            'catName' => 'Fruit tray',
        ]);
        Category::create([
            'catName' => 'Pre-cut fruit',
        ]);
        Category::create([
            'catName' => 'Fruit gift',
        ]);
        Category::create([
            'catName' => 'Premium fruit gift',
        ]);
    }
}
