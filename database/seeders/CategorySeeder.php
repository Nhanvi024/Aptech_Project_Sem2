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
        //
        Category::create([
            'catName' => 'Pome',
        ]);
        Category::create([
            'catName' => 'Drupe',
        ]);
        Category::create([
            'catName' => 'Berry',
        ]);
        Category::create([
            'catName' => 'Aggregate fruit',
        ]);
        Category::create([
            'catName' => 'Legumes',
        ]);
        Category::create([
            'catName' => 'Capsules',
        ]);
        Category::create([
            'catName' => 'Nuts',
        ]);
        Category::create([
            'catName' => 'Multiple fruits',
        ]);
    }
}
