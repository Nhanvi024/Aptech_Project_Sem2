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

        // Product::create([
        //     'proName' => 'Pome 1',
        //     'proCost' => 1,
        //     'proPrice' => 2,
        //     'proStock' => 100,
        //     'proSeason' => 'spring',
        //     'proOrigin' => 'farm 1',
        //     'proImageURL' => 'pome1.jpg',
        //     'proDescription' => 'Pome demo 1',
        //     'category_id' => 1,
        // ]);
        // Product::create([
        //     'proName' => 'Pome 2',
        //     'proCost' => 1,
        //     'proPrice' => 2,
        //     'proStock' => 100,
        //     'proSeason' => 'summer',
        //     'proOrigin' => 'farm 2',
        //     'proImageURL' => 'pome2.jpg',
        //     'proDescription' => 'Pome demo 2',
        //     'category_id' => 1,
        // ]);
        // Product::create([
        //     'proName' => 'Drupe 1',
        //     'proCost' => 1,
        //     'proPrice' => 2,
        //     'proStock' => 100,
        //     'proSeason' => 'autumn',
        //     'proOrigin' => 'farm 1',
        //     'proImageURL' => 'Drupe1.jpg',
        //     'proDescription' => 'Drupe demo 1',
        //     'category_id' => 2,
        // ]);
        // Product::create([
        //     'proName' => 'Drupe 2',
        //     'proCost' => 1,
        //     'proPrice' => 2,
        //     'proStock' => 5,
        //     'proSeason' => 'winter',
        //     'proOrigin' => 'farm 1',
        //     'proImageURL' => 'Drupe2.jpg',
        //     'proDescription' => 'Drupe demo 2',
        //     'category_id' => 2,
        // ]);
        // Product::create([
        //     'proName' => 'Berry 1',
        //     'proCost' => 1,
        //     'proPrice' => 2,
        //     'proStock' => 25,
        //     'proSeason' => 'spring',
        //     'proOrigin' => 'farm 6',
        //     'proImageURL' => 'Berry1.jpg',
        //     'proDescription' => 'Berry demo 1',
        //     'category_id' => 3,
        // ]);
        // Product::create([
        //     'proName' => 'Berry 2',
        //     'proCost' => 1,
        //     'proPrice' => 2,
        //     'proStock' => 10,
        //     'proSeason' => 'winter',
        //     'proOrigin' => 'farm 3',
        //     'proImageURL' => 'Berry2.jpg',
        //     'proDescription' => 'Berry demo 2',
        //     'category_id' => 3,
        // ]);
        // Product::create([
        //     'proName' => 'Aggregate fruit 1',
        //     'proCost' => 1,
        //     'proPrice' => 2,
        //     'proStock' => 100,
        //     'proSeason' => 'summer',
        //     'proOrigin' => 'farm 1',
        //     'proImageURL' => 'Aggregatefruit1.jpg',
        //     'proDescription' => 'Aggregate fruit demo 1',
        //     'category_id' => 4,
        // ]);
        // Product::create([
        //     'proName' => 'Aggregate fruit 2',
        //     'proCost' => 1,
        //     'proPrice' => 2,
        //     'proStock' => 60,
        //     'proSeason' => 'spring',
        //     'proOrigin' => 'farm 2',
        //     'proImageURL' => 'Aggregatefruit2.jpg',
        //     'proDescription' => 'Aggregate fruit demo 2',
        //     'category_id' => 4,
        // ]);
        // Product::create([
        //     'proName' => 'Legumes 1',
        //     'proCost' => 1,
        //     'proPrice' => 2,
        //     'proStock' => 100,
        //     'proSeason' => 'autumn',
        //     'proOrigin' => 'farm 1',
        //     'proImageURL' => 'Legumes1.jpg',
        //     'proDescription' => 'Legumes demo 1',
        //     'category_id' => 5,
        // ]);
        // Product::create([
        //     'proName' => 'Legumes 2',
        //     'proCost' => 1,
        //     'proPrice' => 2,
        //     'proStock' => 88,
        //     'proSeason' => 'summer',
        //     'proOrigin' => 'farm 3',
        //     'proImageURL' => 'Legumes2.jpg',
        //     'proDescription' => 'Legumes demo 2',
        //     'category_id' => 5,

        // ]);
        // Product::create([
        //     'proName' => 'Nuts 1',
        //     'proCost' => 1,
        //     'proPrice' => 2,
        //     'proStock' => 100,
        //     'proSeason' => 'spring',
        //     'proOrigin' => 'farm 4',
        //     'proImageURL' => 'Nuts1.jpg',
        //     'proDescription' => 'Nuts demo 1',
        //     'category_id' => 7,

        // ]);
        // Product::create([
        //     'proName' => 'Nuts 2',
        //     'proCost' => 1,
        //     'proPrice' => 2,
        //     'proStock' => 35,
        //     'proSeason' => 'winter',
        //     'proOrigin' => 'farm 5',
        //     'proImageURL' => 'Nuts2.jpg',
        //     'proDescription' => 'Nuts demo 2',
        //     'category_id' => 7,
        // ]);

        Product::create([
            'proName' => 'An Phuoc Plum',
            'proCost' => 75 / 25 / 3,
            'proPrice' => 75 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Dong Thap',
            'proImageURL' =>    [
                "AnPhuocPlum_1.jpg",
                "AnPhuocPlum_2.jpg",
                "AnPhuocPlum_3.jpg",
                "AnPhuocPlum_4.jpg"
            ],
            'proDescription' =>
            "\nOrigin: Dinh Hoa Commune, Lai Vung District, Dong Thap Province

\nQuality Standard:  Vietgap

\nProduct Features
\n- An Phuoc plum variety is grafted from the eyes of the Thai Thongsamsri plum variety on the Vietnamese green plum rootstock. Thanks to selective breeding, this plum variety not only bears many fruits but is also sweeter than the old variety.
\n- Thanks to the application of plastic wrapping technique when the fruit is still small, it avoids significant impacts from the environment and insects. When grown, the plums often have a beautiful shape, a smooth, shiny skin with an attractive dark red color.
\n- In addition, the above plastic wrapping method also helps gardeners limit pesticides and plant protection when not really necessary. Safe for consumers' health.
\n- When enjoying An Phuoc plums, you can feel the fresh crispness right from the first bite. The plums are juicy, sweet and often the sweetness will be stronger in the sunny season.
\n
\nPreservation and Use
\n- If you do not use the plums immediately after purchase, store them in the refrigerator for 3-5 days.
\n- Do not wash the plums before storing. Wash them as you eat them to ensure the best quality of the fruit.
\n- Remove damaged, bruised, or moldy fruit to avoid spreading to other normal fruits.
\n
\nBenefits of An Phuoc Plum
\n- Strengthens immunity
\n- Supports weight loss
\n- Good for pregnant women
\n- Reduces accumulation of bad cholesterol
\n- Regulates blood sugar
\n- Supports the digestive system",
            'category_id' => 1,
        ]);
    }
}
