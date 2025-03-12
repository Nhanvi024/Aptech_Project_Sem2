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
        ////////// Vietnamese fruit
        ////////// Vietnamese fruit
        ////////// Vietnamese fruit
        ////////// Vietnamese fruit
        Product::create([
            'proName' => 'An Phuoc Plum',
            'proCost' => 75 / 25 / 3,
            'proPrice' => 75 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Dong Thap',
            'proImageURL' =>    [
                "AnPhuocPlum_1.webp",
                "AnPhuocPlum_2.webp",
                "AnPhuocPlum_3.webp",
                "AnPhuocPlum_4.webp"
            ],
            'proDescription' => "
Origin: Dinh Hoa Commune, Lai Vung District, Dong Thap Province

Quality Standard:  Vietgap

Product Features
- An Phuoc plum variety is grafted from the eyes of the Thai Thongsamsri plum variety on the Vietnamese green plum rootstock. Thanks to selective breeding, this plum variety not only bears many fruits but is also sweeter than the old variety.
- Thanks to the application of plastic wrapping technique when the fruit is still small, it avoids significant impacts from the environment and insects. When grown, the plums often have a beautiful shape, a smooth, shiny skin with an attractive dark red color.
- In addition, the above plastic wrapping method also helps gardeners limit pesticides and plant protection when not really necessary. Safe for consumers' health.
- When enjoying An Phuoc plums, you can feel the fresh crispness right from the first bite. The plums are juicy, sweet and often the sweetness will be stronger in the sunny season.

Preservation and Use
- If you do not use the plums immediately after purchase, store them in the refrigerator for 3-5 days.
- Do not wash the plums before storing. Wash them as you eat them to ensure the best quality of the fruit.
- Remove damaged, bruised, or moldy fruit to avoid spreading to other normal fruits.

Benefits of An Phuoc Plum
- Strengthens immunity
- Supports weight loss
- Good for pregnant women
- Reduces accumulation of bad cholesterol
- Regulates blood sugar
- Supports the digestive system",
            'category_id' => 1,
        ]);
        Product::create([
            'proName' => 'Bao Loc Mangosteen',
            'proCost' => 125 / 25 / 3,
            'proPrice' => 125 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proDiscount' => 20,
            'proOrigin' => 'Lam Dong',
            'proImageURL' =>    [
                "BaoLocMangosteen_1.webp",
                "BaoLocMangosteen_2.webp",
                "BaoLocMangosteen_3.webp",
                "BaoLocMangosteen_4.webp"
            ],
            'proDescription' => "
Origin: Da M'ri Town, Da Hoai District, Lam Dong Province

Quality Standards: Natural Farming

Product Features
- Mangosteen is a fruit with a high price but is favored by many consumers and is chosen to buy quite a lot, because of that, the title 'queen of fruits' is not an exaggeration when talking about this fruit.
- In Southeast Asia, Vietnam and Thailand are two countries with large mangosteen export output. With a cool climate all year round, fertile water and soil, Bao Loc Mangosteen is not only beautiful in appearance but also rich in flavor.
- The fruit is not ripe enough, when eaten, you will feel the sweetness mixed with sourness stimulating the taste buds.
- Ripe mangosteen will have a strong sweet taste, mixed with a bit of characteristic sourness but not much. The flesh is firm and juicy, when eating a large piece, biting into the tooth root will feel extremely refreshing.

Preservation and Use
- Mangosteen with purple-pink skin is still green, has a sour taste. Store at room temperature for 2-3 days and the fruit will ripen.
- Fruit that has turned dark purple (black) is ripe. Soft skin, easy to open. Sweeter taste.
- Mangosteen must be stored very gently. If placed in a basket or tray, it must be placed one by one, avoid pouring it in bulk. Strong impacts from the outside can cause the inside to be damaged and leak sap.

Benefits of Mangosteen
- Anti-aging skin
- Reduce cholesterol
- Improve mood
- Prevent cancer
- Stabilize blood sugar
- Prevent cardiovascular disease",
            'category_id' => 1,
        ]);
        Product::create([
            'proName' => 'Green-skinned grapefruit',
            'proCost' => 85 / 25 / 3,
            'proPrice' => 85 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proDiscount' => 60,
            'proOrigin' => 'Binh Duong',
            'proImageURL' =>    [
                "Green-skinnedgrapefruit_1.webp",
                "Green-skinnedgrapefruit_2.webp",
                "Green-skinnedgrapefruit_3.webp",
                "Green-skinnedgrapefruit_4.webp"
            ],
            'proDescription' => "
Origin: Lac An Commune, Bac Tan Uyen District, Binh Duong Province

Quality Standards: Natural Farming

Green-skinned grapefruit is a familiar fruit of every Vietnamese family, often appearing in the five-fruit tray. Not only does it have a sweet taste, grapefruit also contains many nutrients for the body. Let's find out where to buy delicious, quality, and affordable Vietnamese fruits. Discover now!

1. Learn about green-skinned grapefruit
1.1. Origin
Premium green-skinned grapefruit, pink segments, sweet and juicy

Green-skinned grapefruit originates from Thanh Tan commune, Mo Cay district, Ben Tre province. After a long time of cultivation and being loved by local people for its sweet, juicy grapefruit flavor, this fruit has become popular throughout the country.

Currently, the area of ​​grapefruit cultivation in Ben Tre province accounts for about 5,904 hectares, equivalent to 20% of the fruit growing area. Ben Tre province has 55.5 hectares of grapefruit cultivation according to VietGap standards, with an annual output of nearly 50,000 tons.

1.2. Season
Previously, grapefruit was only grown and harvested once a year. Especially around Tet. However, thanks to the application of science and technology, farmers can produce flowers in batches. From there, grapefruit can be grown all year round. Harvest time is usually in the morning, when the weather is sunny and dry.

1.3. Characteristics and flavor
Green-skinned grapefruit is spherical and large. The grapefruit peel is thin or thick depending on whether the fruit is ripe or unripe. When ripe, the fruit has a green to yellow skin, thin and quite easy to peel. The grapefruit segments are pink, have a pleasant sweet taste, are not sour, are juicy and have a unique aroma.
Each fruit usually weighs about 1.3 - 2.5 kg. The price of each fruit ranges from 60,000 - 100,000 VND depending on the time.
Premium green-skinned grapefruit, pink segments, sweet and juicy

2. Wonderful uses of green-skinned grapefruit
Green-skinned grapefruit provides countless wonderful benefits for human health. Therefore, you should enjoy grapefruit every day.

Diabetes treatment support: This is considered a miracle drug to help treat diabetes effectively. The insulin in grapefruit is good for diabetic patients. Therefore, you should eat this fruit regularly.
Hormone regulation: Grapefruit brings many benefits to women. Because they have a great effect on reproductive health and balance the menstrual cycle. Especially for puberty. Grapefruit helps limit the effects that affect skin health.
Good for the heart: The fiber and soluble substances in grapefruit are extremely good for cardiovascular function. They help eliminate atherosclerosis and other negative effects on the heart.
Reduce the risk of cancer: According to research, green-skinned grapefruit is a fruit that helps eliminate factors that cause prostate cancer because it contains a large amount of lycopene. In addition, grapefruit also helps reduce toxins that affect stomach cancer. ",
            'category_id' => 1,
        ]);

        Product::create([
            'proName' => 'Butter Milk',
            'proCost' => 125 / 25 / 3,
            'proPrice' => 125 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Tien Giang',
            'proImageURL' =>    [
                "ButterMilk_1.webp",
                "ButterMilk_2.webp",
                "ButterMilk_3.webp",
                "ButterMilk_4.webp"
            ],
            'proDescription' => "
Origin:  Vinh Kim Commune, Chau Thanh District, Tien Giang Province

Quality Standards:  Natural Farming

Product Features
- Although not as famous as Lo Ren star apple, avocado star apple is still known and loved by many people because of its appearance and characteristic flavor.
- The size of an avocado star apple is usually quite large, the fruit is big, heavy and firm. The skin is tight, shiny and has a sweet green color that is pleasing to the eye. Thanks to its plump, vibrant appearance, avocado star apple is often bought by many people as gifts for relatives, family, friends and colleagues.
- Different from the round shape of Lo Ren star apple, avocado star apple is flatter, the flesh is soft but quite dry and firm. When eaten, you will feel the sweet, cool and slightly fatty aroma.

Preservation and Use
- Buy star apple, eat as soon as possible to limit damage.
- Star apple is soft to the touch, enjoy the best.
- Store star apple in the refrigerator, use within 1-3 days.

Benefits of Star Apple
- Rich in fiber, good for the body
- Supports weight loss
- Controls blood sugar
- Supports bone and joint health
- Good for the digestive system
- Prevents anemia",
            'category_id' => 1,
        ]);

        Product::create([
            'proName' => 'Organic Yellow Papaya',
            'proCost' => 55 / 25 / 3,
            'proPrice' => 55 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Ba Ria - Vung Tau, Dong Nai',
            'proImageURL' =>    [
                "Organicyellowpapaya_1.webp",
                "Organicyellowpapaya_2.webp",
                "Organicyellowpapaya_3.webp",
                "Organicyellowpapaya_4.webp"
            ],
            'proDescription' => "
Origin at two locations:
- Long Tan Commune, Dat Do District, Ba Ria - Vung Tau Province
- Phu Lap Commune, Tan Phu District, Dong Nai Province

Quality Standard:  Global Gap

Product Features
- Papaya is native to the lowlands of southern Mexico, eastern Central America and northern South America. This plant was introduced to the Philippines around 1550, then to tropical Asia and Africa. Today, papaya is grown in most tropical countries such as Brazil, India, Sri Lanka, the Philippines and Vietnam.
- When ripe, papaya has a rich sweet taste, soft flesh and a turmeric yellow color, with a very special natural scent.
- Because Morning Fruit papaya is grown and cared for naturally, when ripe, the fruit does not have a beautiful appearance, and many black spots appear on the skin. Just peel off the skin to enjoy the wonderful flavor of the fruit.

Preservation and Use
- When the fruit is still green, store at room temperature, the fruit will ripen in about 3-5 days.
- Absolutely do not put green fruit in the refrigerator, otherwise the fruit will not ripen, will be hard or bland.
- When the fruit is ripe, store in the refrigerator for about 1-4 days.
- Identify ripe papaya: The fruit's skin turns turmeric yellow, the darker the skin, the sweeter the fruit's flesh will be, with a light aroma.

Benefits of Papaya
- Rich in antioxidants
- Prevents macular degeneration
- Supports weight loss
- Prevents asthma
- Good for the digestive system
- Improves brain function",
            'category_id' => 1,
        ]);

        Product::create([
            'proName' => 'Golden Melon',
            'proCost' => 105 / 25 / 3,
            'proPrice' => 105 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Binh Thuan',
            'proImageURL' =>    [
                "GoldenMelon_1.webp",
                "GoldenMelon_2.webp",
                "GoldenMelon_3.webp",
                "GoldenMelon_4.webp"
            ],
            'proDescription' => "
Origin: Thuan Quy Commune, Ham Thuan Nam District, Binh Thuan Province

Quality Standard:  GlobalGAP

Product Features
- Melon is an annual herb with creeping stems, covered with short hairs, and single tendrils. Originating from Africa and India.
- Golden Melon is one of the new varieties, grown in many different provinces and cities. With a fresh golden appearance, golden melon is not only suitable for buying as a gift but also for displaying on holidays, New Year, and festivals.
- Like other melon varieties, golden melon is also juicy, sweet and fresh. However, compared to queen melon, the crispness of golden melon will be slightly higher and the sweetness will also be lighter.

Preservation and Use
- Melons with unwithered stems should be stored in a cool, dry place.
- For melons with withered stems (blackened stems), they should be enjoyed immediately or stored in the refrigerator.
- Note that the melon should not be overripe because the flesh will often become mushy, bitter or fermented.
- When choosing golden melons to eat immediately, you should choose melons with withered stems because melons with withered stems will be sweeter than melons with green stems.

Benefits of Golden Cantaloupe
- Good for pregnant women
- Helps keep eyes healthy
- Improves digestive system
- Reduces stress and anxiety
- Protects the heart",
            'category_id' => 1,
        ]);

        Product::create([
            'proName' => 'Golden Skin Mango',
            'proCost' => 55 / 25 / 3,
            'proPrice' => 55 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Ben Tre',
            'proImageURL' =>    [
                "Goldenskinmango_1.webp",
                "Goldenskinmango_2.webp",
                "Goldenskinmango_3.webp",
                "Goldenskinmango_4.webp"
            ],
            'proDescription' => "
Quality Standards: Natural Farming

Product Features
- Among the mango varieties in the Western region of Vietnam, Cat Hoa Loc Mango and Tu Quy Mango are considered the two most famous mango varieties thanks to their flavor and high economic efficiency.
- Tu Quy Mango has a large fruit size and weight, averaging from 0.5-1Kg. The fruit has a thin, fresh, hard shell, limiting the damage during transportation.
- With firm, crunchy, sweet and sour flesh when enjoyed, Tu Quy Mango is suitable for eating raw. Should be used with salted plums or fish sauce to enhance the flavor experience.

Preservation and Use
- Mangoes should be enjoyed immediately after purchase to ensure the best quality of the fruit.
- Because this is a raw mango variety, it is best to store it in the refrigerator for 2-5 days.
- Avoid leaving mangoes at room temperature because the mangoes will ripen quickly and lose their characteristic crunchy and delicious taste.

Benefits of Four Seasons Mango
- Strengthens the immune system
- Prevents macular degeneration
- Stabilizes blood pressure
- Reduces cholesterol levels
- Protects the heart
- Improves digestion",
            'category_id' => 1,
        ]);

        Product::create([
            'proName' => 'Mang Den Organic Orange',
            'proCost' => 65 / 25 / 3,
            'proPrice' => 65 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Kon Tum',
            'proImageURL' =>    [
                "MangDenorganicorange_1.webp",
                "MangDenorganicorange_2.webp",
                "MangDenorganicorange_3.webp",
                "MangDenorganicorange_4.webp"
            ],
            'proDescription' => "
Origin: Mang Den Town, Kon Plong District, Kon Tum Province

Quality Standards:  Organic Farming

Product Features
- Different from other orange varieties, Mang Den orange has a characteristic dark orange peel, a rough surface, with large and small brown patches. The browner the peel, the sweeter and more flavorful the orange will be.
- Orange has long been known as an orange variety used for squeezing juice because of its juicy, fresh pulp. The flavor of the fruit is not purely sweet but tends to be mixed with sourness to stimulate the taste buds, so that after each time enjoying it, you will feel extremely fresh and refreshing.
- However, when peeled and eaten directly, the flavor of the orange is still very delicious, not inferior to other orange varieties such as yellow orange, Vinh orange or Xoan orange.

Preservation and Use
- Oranges can be kept in the refrigerator for 5-10 days.
- The longer they are kept, the juicier and sweeter the oranges will be.
- If there is a damaged fruit (soft when pressed, smells sour), it should be removed immediately. Avoid spreading to other fruits.

Benefits of Mang Den Orange
- Protects and nourishes the skin
- Reduces stress and fatigue
- Regulates blood pressure
- Increases resistance
- Good for pregnant women
- Protects cardiovascular health",
            'category_id' => 1,
        ]);

        Product::create([
            'proName' => 'Musang King Durian',
            'proCost' => 395 / 25 / 3,
            'proPrice' => 395 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Southeast and Southwest',
            'proImageURL' =>    [
                "MusangKingDurian_1.webp",
                "MusangKingDurian_2.webp",
                "MusangKingDurian_3.webp",
                "MusangKingDurian_4.webp"
            ],
            'proDescription' => "
Origin: Purchased in Southeast and Southwest

Quality Standards:  Natural Farming

Musang King durian is a premium durian variety, known as the best in the world. Currently, durian is grown in many provinces in the Mekong Delta, with a delicious, rich flavor, so it is very popular. Discover now!

1. What is Musang King durian?
- Imported Musang King durian, rich flavor, fatty, no fiber

- Musang King durian is considered the best durian variety in the world. It originates from the state of Sabah in Malaysia. This variety was registered in 1993 under the Seedling Protection Act with code D197 in Malaysia.

- In recent years, this durian variety has been introduced to Vietnam and grown widely in the Mekong Delta provinces with good cultivation efficiency. The durian season lasts from April to August. Durian cut at the right maturity usually ripens by itself after about 2-3 days without incubation or dipping in chemicals. On the other hand, durian ripened on the tree or fallen durian is often characterized by being mushy or having a bitter aftertaste.

2. Characteristics of Musang King durian
- Musang King durian is a Vietnamese fruit with an oval shape. The stem is dark green, the thorns are large and far apart. Especially in the middle of the stem and the body of the fruit, there is a characteristic groove. When looking at the bottom of the durian, you will see 5 large segments, embracing the entire fruit.

- Imported Musang King durian, rich flavor, fatty, no fiber

- If Ri6 durian has moderate sweetness, softness and fat, Monthong durian has high softness and fat but a mild sweetness; Musang King durian has the highest softness, fat and sweetness. Although the segments are not as big as Ri6 durian, Musang King durian is soft, smooth and has a perfect sweetness, naturally fragrant. When enjoying, the durian leaves a rich, fatty taste in the mouth for a long time. The durian flesh is soft, has no fibers and a high percentage of flat seeds. It is not an exaggeration to praise this as the best durian variety in the world.

- Imported Musang King durian, rich flavor, fatty, no fiber

3. Nutritional value of Musang King durian
In addition to its world-class taste, Musang King durian also offers many health benefits, such as:

- Anti-aging: The abundant amount of vitamin B and C in durian meat helps prevent the formation and development of signs of skin aging such as freckles, melasma, etc. Vitamins also affect serotonin in the body, helping your spirit to be happier and more refreshed.
- Prevent anemia: Iron and copper are two substances with high content in durian, playing an important role in the production of red blood cells. In addition, manganese and calcium are also very good for bone and joint development. Therefore, durian is extremely beneficial for health, especially for the elderly.
- Aids digestion: Durian contains natural sugar. Therefore, when enjoyed, it will naturally ferment and this is useful for beneficial bacteria in the intestines. The abundant fiber in this fruit also helps the digestive system function better.
- Protecting cardiovascular health: The content of potassium, fiber and unsaturated fat in durian is higher than other fruits. Of which, potassium has a good effect on blood pressure, the remaining 2 substances are very important for cardiovascular health.",
            'category_id' => 1,
        ]);

        Product::create([
            'proName' => 'Purple-pink Dragon Fruit',
            'proCost' => 125 / 25 / 3,
            'proPrice' => 125 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Binh Thuan',
            'proImageURL' =>    [
                "Purple-pinkdragonfruit_1.webp",
                "Purple-pinkdragonfruit_2.webp",
                "Purple-pinkdragonfruit_3.webp",
                "Purple-pinkdragonfruit_4.webp"
            ],
            'proDescription' => "
Origin: Thuan Quy Commune, Ham Thuan Nam District, Binh Thuan Province

Quality Standard: GlobalGAP

Product Features
- Purple-pink dragon fruit is a hybrid of white-fleshed dragon fruit and red-fleshed dragon fruit, so the flesh is as firm as white-fleshed dragon fruit but the color and sweetness are more like red-fleshed dragon fruit.
- Thanks to selective breeding, purple-pink dragon fruit is very susceptible to insects and pests, so it is a suitable variety for planting and cultivating according to globalGAP standards, exported to many countries around the world.
- The fruit has a sweet and cool taste, will be sour when green and sweeter when ripe.

Preservation and Use
- Store dragon fruit in the refrigerator for about 2-5 days.
- Dragon fruit with withered skin is often sweeter than dragon fruit when newly harvested (fresh skin).

Benefits of Purple-Pink Dragon
Fruit - Rich in antioxidants -
Supports weight loss
- Protects intestinal health
- Controls blood sugar
- Reduces anemia during pregnancy
- Good for cardiovascular health",
            'category_id' => 1,
        ]);

        Product::create([
            'proName' => 'Seedless Watermelon',
            'proCost' => 102 / 25 / 3,
            'proPrice' => 102 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Long An, Tien Giang, Vinh Long, Hau Giang',
            'proImageURL' =>    [
                "Seedlesswatermelon_1.webp",
                "Seedlesswatermelon_2.webp",
                "Seedlesswatermelon_3.webp",
                "Seedlesswatermelon_4.webp"
            ],
            'proDescription' => "
Origin: Purchased in provinces: Long An, Tien Giang, Vinh Long, Hau Giang

Quality Standards:  Natural Farming

Product Features
- Watermelon is a special fruit belonging to the berry class, because of its hard shell and lack of division in the fruit.
- Seedless watermelon has a juicy, juicy flesh with a naturally sweet and cool flavor.
- Compared to seeded watermelon, the sweetness of seedless watermelon is more refreshing. However, thanks to its characteristic seedless properties and ease of enjoyment, seedless watermelon has become a suitable fruit for everyone, from the elderly to children.

Preservation and Use
- You should enjoy watermelon when the stem is wilted (the stem turns dry and black) because then the flavor of the watermelon will be stronger.
- Green-stemmed watermelons can be stored in a cool, dry place.
- Withered-stemmed watermelons should be stored in the refrigerator. When the fruit is overripe, the flesh will turn rotten and bitter.

Benefits of Seedless Watermelon
- Watermelon has a high water content (91%) and fiber, so enjoying watermelon not only helps us stay full longer, supports weight loss but is also very good for the digestive system. In addition, the amount of natural sugar and healthy minerals will help pregnant mothers reduce heartburn, morning sickness and dehydration during pregnancy.
- Two types of vitamins A and C found in watermelon play an extremely important role in the health of the skin and hair. Vitamin A helps regenerate and heal damaged skin cells. Vitamin C promotes the body to regenerate collagen, keeping the skin smooth, firm, while nourishing strong, shiny hair from the inside.
- Lycopene and vitamin C in watermelon will remove free radicals that damage cells from the body, helping to prevent arthritis, asthma, cancer and many other related diseases.",
            'category_id' => 1,
        ]);

        Product::create([
            'proName' => 'Taiwanese Green Apple',
            'proCost' => 105 / 25 / 3,
            'proPrice' => 105 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Bac Giang',
            'proImageURL' =>    [
                "Taiwanesegreenapple_1.webp",
                "Taiwanesegreenapple_2.webp",
                "Taiwanesegreenapple_3.webp",
                "Taiwanesegreenapple_4.webp"
            ],
            'proDescription' => "
Origin: Luc Ngan, Bac Giang

Quality standards: VietGAP

Product Features:
- Taiwanese green apple is an apple variety imported from Taiwan, currently grown in Luc Ngan, Bac Giang - a place with ideal natural conditions and soil to grow this type of tree.
- With advanced farming techniques according to VietGAP standards, green apples grown in Vietnam have a quality that is not inferior to apples imported from Taiwan.
- The apple has a round shape, beautiful shiny green skin, crispy, juicy flesh, sweet taste mixed with a little sourness, very pleasant.

Storage and use:
- Green apples are best stored in the refrigerator for 1 week .
- At room temperature, apples stay fresh for 5-7 days .
- Avoid exposing apples to direct sunlight or high temperatures.
- Apples should be washed before use.

Benefits of Taiwanese green apples:
- Boosts the immune system: Thanks to its high vitamin C content.
- Aids digestion: Rich in fiber, good for the digestive system.
- Weight loss: Low in calories, keeps you full for a long time.
- Protect heart health: Reduce bad cholesterol and stabilize blood pressure.
- Skin beauty: Vitamins and antioxidants help brighten skin.
- Stabilizes blood sugar: Low glycemic index, suitable for diabetics.",
            'category_id' => 1,
        ]);



        ////////// Imported fruit
        ////////// Imported fruit
        ////////// Imported fruit
        ////////// Imported fruit
        ////////// Imported fruit
        Product::create([
            'proName' => 'American Envy Apple',
            'proCost' => 155 / 25 / 3,
            'proPrice' => 155 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'USA',
            'proImageURL' =>    [
                "AmericanEnvyApple_1.webp",
                "AmericanEnvyApple_2.webp",
                "AmericanEnvyApple_3.webp",
                "AmericanEnvyApple_4.webp"
            ],
            'proDescription' => "
Origin:  Torrance, California, USA

Quality Standard:  Official Import

American Envy apples are a premium apple variety, favored by many people because of their luxurious and beautiful appearance. This is considered the 'queen' of all apples with a distinct sweet flavor along with crispness and juiciness.

1. Origin, characteristics, size of Envy apples
1.1. Origin
- Envy apples imported from the US, sweet taste, beautiful fruit, Ho Chi Minh City
- American Envy apples are a famous apple variety in the world because of many outstanding characteristics. This apple variety is the product of cross-pollination between Braeburn and Royal Gala apples.
- Envy apples were first successfully developed in New Zealand in 1980. In 2005, this apple variety began to be cultivated in Washington State, USA. This state has a temperate climate, with a large temperature difference between day and night, suitable for apple tree growth. From there, the American Envy apple is created with high sweetness and crispness, and a beautiful red apple color.
- Envy apples in the US are usually harvested in October and November every year. But thanks to modern preservation technology, apples are preserved and sold year-round while still retaining their nutritional value and delicious crispness.

1.2. Characteristics
- Compared to other American apple varieties such as Gala, Granny Smith, Honeycrisp... Envy apples are positioned in the high-end segment. That is because this apple variety has a rich, sweet taste, is fragrant, and is less sour than other varieties. When cutting the apple, you can feel the characteristic aroma and beautiful white apple flesh.
- Envy apples are the slowest browning apples on the market. The flesh of the apple can be left outside for up to 10 hours without turning black due to oxidation. The more tiny red spots on the apple skin, the sweeter and tastier it will be. However, at the end of the season, Envy apples often become powdery due to the high sugar content in the apple.
- Envy apples imported from the US, sweet taste, beautiful fruit, Ho Chi Minh City

1.3. Dimensions
- Envy apples are sized based on the number of apples in the box. For example, size 24 means there will be 24 apples per box. Similarly, size 100 means there will be 100 apples per box. The smaller the apple, the larger the size number on the apple. Conversely, if you see a large size number, the apple will be small.

2. Is it good to eat American Envy apples?
In addition to their premium beauty and excellent taste, Envy apples are also famous for their nutritional value to health. Some of the benefits of apples include:
- duce the risk of cancer: Apples contain high levels of phytonutrients. This substance can help you reduce and prevent breast cancer, lung cancer and colon cancer.
- event neurological problems: American Envy apples have a positive effect on neurological diseases such as Alzheimer's and Parkinson's. Compounds in this fruit help reduce brain tissue degeneration, increase the amount of acetylcholine in the brain for better memory and concentration.
- Vision Support: Flavonoids and phytonutrients found in apples have antioxidant properties. However, they also help reduce the effects of free radicals on the eyes, preventing cataracts, macular degeneration, and glaucoma.
- Weight Loss: The high fiber content in Envy apples helps users feel full for a long time, thereby reducing appetite. Apples also help speed up metabolism and burn calories consumed after eating much faster.",
            'category_id' => 2,
        ]);

        Product::create([
            'proName' => 'American Orange',
            'proCost' => 115 / 25 / 3,
            'proPrice' => 115 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'USA',
            'proImageURL' =>    [
                "AmericanOrange_1.webp",
                "AmericanOrange_2.webp",
                "AmericanOrange_3.webp",
                "AmericanOrange_4.webp"
            ],
            'proDescription' => "
Origin: California City, USA

Quality Standard: Official import

Product Features
- The orange is a hybrid between grapefruit (Citrus maxima) and tangerine (Citrus reticulata).
- Possessing a round shape with a bright, eye-catching orange color. The orange is a very suitable choice to buy as a gift or display on the family's fruit tray during the holidays.
- The flavor of the orange could not be fresher with the sweetness of the flesh and the juiciness of the segments. Because the sweetness depends relatively on the season and climate, there will be times when the orange has a sour aftertaste, but it still does not affect the deliciousness of the fruit much.

Preservation and Use
- Oranges can be kept in the refrigerator for 5-10 days.
- The longer they are kept, the juicier and sweeter the oranges will be.
- If there is a damaged fruit (soft when pressed, smells sour), it should be removed immediately. Avoid spreading to other fruits.

Benefits of Oranges
- Protect and nourish the skin
- Reduce stress and fatigue
- Regulate blood pressure
- Increase resistance
- Increase milk supply after giving birth
- Protect cardiovascular health",
            'category_id' => 2,
        ]);

        Product::create([
            'proName' => 'Australian Black Grapes',
            'proCost' => 315 / 25 / 3,
            'proPrice' => 315 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Australia',
            'proImageURL' =>    [
                "AustralianBlackGrapes_1.webp",
                "AustralianBlackGrapes_2.webp",
                "AustralianBlackGrapes_3.webp",
                "AustralianBlackGrapes_4.webp"
            ],
            'proDescription' => "
Origin:  Australia

Quality Standard: Official import

Product Features
- Australian black grapes have a variety of lines, the most popular of which are Autumn Royal, Midnight Beauty, Sweet Flavor,...
- Depending on the grape variety, the flavor of the fruit will be different. However, most Australian seedless black grapes are sweet and have a characteristic light astringent feeling.
- The shape of the fruit is usually not round but slightly oval and elongated. The skin is dark black, surrounded by a layer of natural powder to protect the grapes from self-attack and damage by insects.
- Australian grapes are not soft and juicy but the flesh is usually quite firm. When bitten, it will feel fresh and refreshing.
- Because Australian black grapes are seedless, children and the elderly can easily enjoy them.

Preservation and Use
- Black grapes should be used immediately after purchase or stored in the refrigerator for 1-3 days
- Do not wash in advance, wash the grapes as you eat them to ensure the best flavor of the fruit.
- Remove any fruit that shows signs of softness, rot, bruises, damage or mold to avoid affecting the remaining fruit.

Benefits of Australian Black Grapes
- Enhance eyesight
- Support to reduce blood fat
- Improve digestive system
- Prevent atherosclerosis
- Protect cardiovascular system
- Anti-inflammatory properties",
            'category_id' => 2,
        ]);

        Product::create([
            'proName' => 'Australian Red Cherry',
            'proCost' => 980 / 25 / 3,
            'proPrice' => 980 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Australia',
            'proImageURL' =>    [
                "AustralianRedCherry_1.webp",
                "AustralianRedCherry_2.webp",
                "AustralianRedCherry_3.webp",
                "AustralianRedCherry_4.webp"
            ],
            'proDescription' => "
Origin: Victoria, Australia

Quality Standard: Official import

Australian red cherries are loved by many people because of their delicious, fresh, crunchy flavor and rich nutrients. This fruit is suitable as a gift, or simply as a dessert after a meal. Discover now the address selling reputable, quality imported fruits and how to choose delicious Australian cherries!

1. Introduction to Australian red cherries
- Fresh Australian red cherries, imported officially, reputable in Ho Chi Minh City
- If American cherries are produced on a large scale, Australian cherries are produced on a small scale and with lower output. However, Australian cherries have a sustainable production process, each stage of inspection is more rigorous, so the quality of the fruit is also rated higher. Compared to American cherries, Australian cherries are more crispy, stay fresh longer and have more consistent quality between gardens. Therefore, the price of this type of cherry is also more expensive than the general level.

1.1. Origin and characteristics
- Cherries are a very popular fruit in Australia, grown in most states (except the North). Some states that specialize in exporting quality Australian cherries include Victoria, Tasmania, and New South Wales.
- Australian cherries are characterized by large, glossy, deep red fruit and are juicy. The cherries are firm, crunchy and sweet when eaten. They are popular with consumers all year round, especially in the summer and at the end of the year.

1.2. Season
- The main season of Australian red cherries falls between mid-November and early February of the following year. The main season of Australian red cherries is firm, crispy, dark red and rich in sweetness. Therefore, this is also one of the favorite choices during Tet.

1.3. Classification
Australian red cherries will range in size from 26-34 and are equivalent to a fruit diameter of 26 mm to 34 mm. The larger the cherry, the more expensive it is because the fruit is larger, crispier and juicier.

- Size 34 fruit size is about 32-34 mm.
- Size 32 fruit size is about 30-32 mm.
- Size 30 fruit size is about 28-30 mm.
- Size 28 fruit size is about 26-28 mm.
- Size 26 fruit size is less than or equal to 26 mm.

Fresh Australian red cherries, imported officially, reputable in Ho Chi Minh City

2. Health benefits of Australian red cherries
Australian cherries are an excellent source of nutrients such as vitamin A, fiber, iron, and are sodium and cholesterol free. Therefore, this fruit is considered the diamond of imported fruits, with great health benefits:

- Prevent diabetes: Although Australian cherries are sweet, this is a natural flavor. This fruit does not contain a high amount of sugar, so you can safely use it without worrying about increasing blood sugar.
- Get better sleep: Melatonin is a hormone in Australian cherries that helps improve sleep quality. You should eat cherries every day because it is like a natural sedative to help you sleep well and improve your mood.
- Strengthen the immune system: The abundant amount of vitamin C in cherries helps the body increase its ability to absorb iron. This is good for the immune system, preventing infections and sunburn.
- Cancer prevention: Cherries are a good source of cyanidin, which helps promote cell differentiation and prevents healthy cells from transforming into cancer cells. Therefore, adding this fruit to your daily diet will help reduce the risk of cancer.",
            'category_id' => 2,
        ]);

        Product::create([
            'proName' => 'Beijing Jujube',
            'proCost' => 245 / 25 / 3,
            'proPrice' => 245 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Beijing, China',
            'proImageURL' =>    [
                "Beijingjujube_1.webp",
                "Beijingjujube_2.webp",
                "Beijingjujube_3.webp",
                "Beijingjujube_4.webp"
            ],
            'proDescription' => "
1. Standard: Natural farming

2. Origin:  Shandong Province - Shaanxi - Xinjiang - Beijing, China

3. Storage instructions:
- Apples can be stored in the refrigerator for 5-7 days. The colder the refrigerator, the longer the apples can be stored.
- Wrap the apples in a sealed plastic bag. Avoid placing them near foods with strong odors such as onions, garlic, meat, fish... Avoid steam. The fruit will stay crispy longer.
- If you find any fruit that is bruised or soft... you must cut it off immediately. Avoid spreading it to other fruit.
- Wash as you eat. Washing first will make the grapes soft and mushy, losing their taste.
- Apples secrete a lot of etheryne gas. Do not place near grapes, cherries..., etheryne gas from apples causes fruits to ripen and spoil quickly.

4. Nutritional information:
- Enhance human immunity and inhibit cancer cells: Pharmacological research found that dates can promote the formation of white blood cells, reduce serum cholesterol, increase serum albumin, and protect the liver.
- Contains substances that inhibit cancer cells and can even cause the material of cancer cells to transform into normal cells. People who regularly eat fresh jujubes rarely have gallstones, because jujubes contain rich amounts of vitamin C, which helps convert excess cholesterol in the body into bile acids.
- Makes the skin rosy, because it has the effect of nourishing blood and nourishing the complexion. If you often use red dates to cook porridge or soup, it can promote blood formation, effectively prevent anemia and make the skin more and more rosy.
- Rich in vitamin C and cyclic-monophosphate adenosine, can promote the metabolism of skin cells, prevent melanin deposition, make skin whiter and smoother, protect and care for freckled skin.
- Nourishes blood and calms the mind, nourishes the spleen and stomach, the elderly with weak bodies should use it regularly, can strengthen the body, anti-aging; people with stressful work, can help eat well, reduce stress; drinking a cup of red apple tea in the evening can effectively treat insomnia.",
            'category_id' => 2,
        ]);

        Product::create([
            'proName' => 'French Golden Kiwi',
            'proCost' => 255 / 25 / 3,
            'proPrice' => 255 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'France',
            'proImageURL' =>    [
                "FrenchGoldenKiwi_1.webp",
                "FrenchGoldenKiwi_2.webp",
                "FrenchGoldenKiwi_3.webp",
                "FrenchGoldenKiwi_4.webp"
            ],
            'proDescription' => "
Origin: France

Quality Standard: Official import

Product Features
- Kiwi is considered a world famous fruit not only because of its delicious taste but also because of its extremely nutritious. Not only in New Zealand, golden kiwi is grown commercially in many places including: France, Japan, Australia, the United States, Italy, ...
- Although the kiwi tree originated in China, New Zealand is the country that people remember the most when mentioning this fruit. Most notably is the Zespri brand, with a team of experienced garden engineers, the stages of seed selection, planting, preservation and transportation are always guaranteed in the best conditions.
- When the golden kiwi is still green, the flavor will tend to be more sour than sweet. When the fruit is ripe, it will be sweet, the flesh is soft and extremely juicy.

Preservation and Use
- Store Golden Kiwi in the refrigerator for 3-7 days.
- Unripe kiwi, when gently pressed, will feel hard, eating at this time the kiwi will feel sour. You should leave the kiwi for another 1-3 days. When the fruit turns soft, it will feel sweet and fragrant. The softer the fruit, the sweeter it is.

Benefits of Golden Kiwi
- Good for the digestive system
- Helps regulate blood pressure
- Strengthens the immune system
- Prevents macular degeneration
- Protects the heart
- Suitable for diabetics",
            'category_id' => 2,
        ]);

        Product::create([
            'proName' => 'French Juliet Apple',
            'proCost' => 135 / 25 / 3,
            'proPrice' => 135 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'France',
            'proImageURL' =>    [
                "FrenchJulietApple_1.webp",
                "FrenchJulietApple_2.webp",
                "FrenchJulietApple_3.webp",
                "FrenchJulietApple_4.webp"
            ],
            'proDescription' => "
Origin:  Montayral Commune, Nouvelle-Aquitaine region, France

Quality Standard:  Official Import

Juliet apples are the first apple variety in the world to be produced exclusively using organic farming methods. Apples are officially imported from France. Eye-catching dark red skin, crispy, delicious and juicy flesh. Discover now!

1. Origin and characteristics

1.1. Origin
- Organic French Juliet apples, officially imported, beautiful deep red fruit, delicious crispy flesh
- Juliet apples are grown exclusively in France using organic methods and are very popular. Large farms in the South of France grow Juliet apples using organic methods with strict procedures. The growing process does not use any fertilizers, growth stimulants or chemicals.
- Apples are harvested in November and then stored in cold storage by lowering the oxygen concentration and maximum temperature in a closed process. Thus, apples can be stored for 6-7 months while still retaining their characteristic crispness and deliciousness.

1.2. Characteristics, flavor
- Organic Juliet apples are medium sized. The apple skin is dark red and eye-catching. Because it is an organic apple, the shape of the fruit is distorted and not balanced like other apple varieties. The apple flesh is white, fresh and firm and crunchy.
- Organic French Juliet apples, officially imported, beautiful deep red fruit, delicious crispy flesh
- Juliet apples have a distinctive candy aroma from the outside of the skin. You will clearly feel the candy aroma when opening the whole box of apples. The apple has a mild sweet taste, suitable for all ages from the elderly to children.

1.3. Dimensions
- Juliet apples are exported based on different sizes. The smaller the apple size, the bigger the fruit and the higher the price. Currently, the most popular apples on the market are sizes 80-88-100-125. Of which, size 88 is usually the most expensive and is the most popular with buyers.
- Organic French Juliet apples, officially imported, beautiful deep red fruit, delicious crispy flesh

2. Health benefits of Juliet apples
Apples are a fruit that brings countless health benefits. Especially the golden benefits for cardiovascular health.
- Protecting the heart: Apples have a great effect in reducing the risk of heart disease. Because Juliet apples contain a lot of soluble fiber, reducing cholesterol in the blood. Polyphenols are both antioxidants and have the effect of reducing blood pressure.
- Cancer Prevention: Studies have shown that the plant compounds found in apples reduce the risk of cancer. This is due to the antioxidant and anti-inflammatory properties of apples, which are two key capabilities in preventing cancer.
- Improves Digestion: Pectin in apples helps feed beneficial bacteria in the intestinal tract. This allows the fiber to reach the colon and promote the growth of healthy bacteria.
- Weight loss support: The fiber and water in apples help users feel full for a long time. In addition, some natural compounds in this fruit also promote weight loss. ",
            'category_id' => 2,
        ]);

        Product::create([
            'proName' => 'Korean Peony Grapes',
            'proCost' => 785 / 25 / 3,
            'proPrice' => 785 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Korea',
            'proImageURL' =>    [
                "Koreanpeonygrapes_1.webp",
                "Koreanpeonygrapes_2.webp",
                "Koreanpeonygrapes_3.webp",
                "Koreanpeonygrapes_4.webp"
            ],
            'proDescription' => "
Origin:  North Gyeongsang Province, Korea

Quality Standard:  Official import

Product Features
- Peony grapes are a diploid grape variety, the result of a cross between Akitsu-21 and 'Hakunan' (V. vinifera) created by the National Institute of Fruit Science (NIFTS) in Japan in 1988.
- Thanks to selective breeding, peony grapes have many outstanding characteristics such as large bunch and fruit size, the flesh is not as crunchy and hard as American grapes but has a jelly texture, soft and melts like jelly.
- Besides, although rich in flavor, the sweetness of peony grapes does not cause a harsh, unpleasant feeling in the throat. Instead, it is sweet and fragrant like milk. That is also the reason why many gardeners call this grape variety milk grapes or green milk grapes.

Preservation and Use
- If you do not use the Peony Grapes immediately after purchase, store them in the refrigerator for 1-3 days.
- Do not wash the Peony Grapes before storing. Wash them as you eat them to ensure the best quality of the fruit.
- Remove damaged, bruised, or moldy fruit to avoid spreading to other normal fruits.

Benefits of Peony Grapes
- Enhance eyesight
- Support to reduce blood fat
- Improve digestive system
- Prevent atherosclerosis
- Protect cardiovascular system
- Anti-inflammatory properties",
            'category_id' => 2,
        ]);

        Product::create([
            'proName' => 'Korean Strawberries',
            'proCost' => 900 / 25 / 3,
            'proPrice' => 900 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Korea',
            'proImageURL' =>    [
                "Koreanstrawberries_1.webp",
                "Koreanstrawberries_2.webp",
                "Koreanstrawberries_3.webp",
                "Koreanstrawberries_4.webp"
            ],
            'proDescription' => "
Origin:  Gyeongsangbuk-do Province, Korea

Quality Standard:  Official Import

Korean strawberries are known as the 'fruit queen' of the kimchi land because of their beautiful appearance and rich, naturally sweet taste. What are the health benefits of this fruit? Where to buy reputable imported fruits in Ho Chi Minh City? Discover now!

1. What are the attractive features of Korean strawberries?

1.1. Origin of strawberries
- Strawberries are a long-standing fruit, originating from the Americas. They were then brought to Europe and crossbred by gardeners to create the famous strawberry variety today. From Europe, strawberries were introduced to other countries such as the United States, Japan and Korea.
- Korean strawberries are the most popular because of their rich sweetness. They are grown mainly in the high mountains of Jeju Island, in the south of Korea. Currently, Korea exports strawberries to more than 20 countries around the world. The strawberry season usually lasts from December to May.

1.2. Characteristics of Korean Strawberries
- Korean strawberries have a beautiful appearance with bright red color, round, green stem. The size of each strawberry is quite impressive. Diameter ranges from 3-5 cm, larger than other strawberry varieties. The fruit flesh is often naturally sweet, mixed with a light sour taste and soft and juicy.
- This is an imported fruit that is quite suitable for hot summer days. Because of its sweet, fresh taste that melts in your mouth, you will feel delighted.

2. What are the health benefits of Korean strawberries?
Korean strawberries are a fruit that contains many nutrients such as vitamins and minerals that are essential for health. Therefore, they bring many significant benefits to those who enjoy them:

- Rich in vitamin C: Korean strawberries contain higher amounts of vitamin C than other types of strawberries. This helps strengthen the body's immune system, fight infections, poisoning and flu.

- Anti-cancer: The abundant amount of antioxidants in Korean strawberries helps prevent the growth of cancer cells. Thereby, helping you reduce the risk of colon cancer and breast cancer.

- Effective weight loss: Korean strawberries are low in calories, fat-free, low in sugar and sodium. You can completely consider strawberries as a snack and they will help maintain a stable weight.

- Skin beauty: The abundant vitamin C in Korean strawberries also helps produce collagen, to improve skin elasticity and prevent wrinkles. Adding foods rich in vitamin C such as strawberries to your daily diet will help keep your skin healthy and youthful.

- Maintain healthy eyes: The antioxidant properties in strawberries also help prevent cataracts effectively. Because vitamin C helps protect the eyes from free radicals from the sun's UV rays. Moreover, this nutrient also improves the cornea and retina of the eye.",
            'category_id' => 2,
        ]);

        Product::create([
            'proName' => 'New Zealand Red Cherry',
            'proCost' => 880 / 25 / 3,
            'proPrice' => 880 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'New Zealand',
            'proImageURL' =>    [
                "NewZealandRedCherry_1.webp",
                "NewZealandRedCherry_2.webp",
                "NewZealandRedCherry_3.webp",
                "NewZealandRedCherry_4.webp"
            ],
            'proDescription' => "
Origin:  Cromwell Town, Connecticut, New Zealand.

Quality Standard:  Official Import

New Zealand red cherries are a popular specialty and are often used as gifts. The fruit has a sweet, crunchy, delicious taste and many health benefits. To buy genuine imported New Zealand cherries of good quality, consumers must find reputable addresses. Discover now!

1. What are New Zealand cherry trees? How are they grown and cared for?

1.1. Origin, source and season
- New Zealand red cherry, reputable, good price

- Cherries, also known as cherries, originated in temperate countries such as Eastern Europe and Western Asia around 600 BC. After being introduced to America around the 16th century, this fruit became very popular because of its sweet taste. Since then, cherries have become popular and spread to many other countries such as Canada, Australia, and New Zealand.

- Currently, New Zealand is the main market for red cherry cultivation, with an output of 10,000-15,000 tons per year. In particular, the South Otago island of this country is considered the capital of cherries. The New Zealand cherry season lasts from November to February of the following year, which is the end of winter and the beginning of spring. Therefore, the cherries are also firmer, crispier and more delicious. That is also why the price of New Zealand cherries is more expensive than American cherries.

1.2. Planting and care process
- In New Zealand, cherry orchards are carefully planted, always ensuring the ideal temperature of 7-12 degrees. In central Otago, each row of trees must be 2m apart and each tree must be 5m apart. Because cherries can only grow in dry soil, farmers have to build a system of canals to control the moisture of the soil. They also use sprinklers to protect the trees from winter frost.

- New Zealand red cherry, reputable, good price

- In addition, the cherry tree care process is extremely meticulous and elaborate. During the cherry growing season, farmers also need to protect and prevent this fruit from contact with rainwater, pests or bacteria. Thanks to that, New Zealand red cherries have a large size, are shiny with a characteristic sweet taste, loved by consumers.

- In addition, harvesting is also extremely strict. Workers must be very careful when picking cherries. Because if too much force is used, the fruit will easily be crushed. After harvesting, exported goods must be carefully preserved and meet GAP clean food standards.

2. Why should you eat New Zealand red cherries?
New Zealand cherries are a popular imported fruit not only because of their delicious taste, but also because they have countless health benefits. For example:

- Improve sleep: Cherry is considered a miracle drug for sleep. Because this fruit contains melatonin. This is a substance that helps you fall asleep easier, reducing insomnia every night.

- Good for the eyes: The amount of vitamin A in red cherries is 20 times higher than other fruits. Vitamin A helps improve your vision, keeping your eyes bright and healthy. In addition, the amount of retinol in vitamin A also helps your skin become smoother and whiter.

- Supplement energy: Enjoying cherries every day is also a way to increase your body's energy. Calories in cherries come from natural sugars, helping to improve mood and increase happy, positive energy.",
            'category_id' => 2,
        ]);

        Product::create([
            'proName' => 'South African Green Grapes',
            'proCost' => 325 / 25 / 3,
            'proPrice' => 325 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'South Africa',
            'proImageURL' =>    [
                "SouthAfricanGreenGrapes_1.webp",
                "SouthAfricanGreenGrapes_2.webp",
                "SouthAfricanGreenGrapes_3.webp",
                "SouthAfricanGreenGrapes_4.webp"
            ],
            'proDescription' => "
Origin: South Africa

Quality Standard: Official import

Product Features
- South African seedless green grapes are medium sized, with thin green skin. The skin of the grapes always has a layer of white powder, still fresh
- The grape flesh is firm, jade green, and the branches are hard. South African green grapes have a crunchy, sweet, cool taste, not harsh, not astringent and have no seeds, so they are very suitable for children and the elderly.

Preservation and Use
- Green grapes should be used immediately after purchase or stored in the refrigerator for 1-3 days
- Do not wash in advance, wash the grapes as you eat them to ensure the best flavor of the fruit.
- Remove any fruit that shows signs of softness, rot, bruises, damage or mold to avoid affecting the remaining fruit.

Benefits of American Seedless Green Grapes
- Enhance eyesight
- Support to reduce blood fat
- Improve digestive system
- Prevent atherosclerosis
- Protect cardiovascular system
- Anti-inflammatory properties",
            'category_id' => 2,
        ]);

        Product::create([
            'proName' => 'Sunny Dolce Korean Red Peony Grapes',
            'proCost' => 495 / 25 / 3,
            'proPrice' => 495 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Korea',
            'proImageURL' =>    [
                "SunnyDolceKoreanRedPeonyGrapes_1.webp",
                "SunnyDolceKoreanRedPeonyGrapes_2.webp",
                "SunnyDolceKoreanRedPeonyGrapes_3.webp",
                "SunnyDolceKoreanRedPeonyGrapes_4.webp"
            ],
            'proDescription' => "
Origin: Hyeonpung-myeon, Korea

Quality Standard: Official import

Product Features:

- Korea is a country located in the temperate climate zone, with favorable wind and rain, so fruit trees grow very well. Among them, red peony grapes are the most trusted Korean export fruit by international friends.
- Red peony grapes are grown organically in the form of '1 branch 1 bunch'. Each bunch will be wrapped in a layer of paper to prevent insect damage.
- Red peony grapes are large, round, thin-skinned, and have a beautiful ruby ​​red color. They taste sweet and fragrant, and the flesh is chewy like jelly.

Storage and Use:

- If you do not use the purchased Peony Grapes immediately, store them in the refrigerator for 1-3 days.
- Do not wash peony grapes before storing. Wash as you eat to ensure the best quality of the fruit.
- Remove damaged, bruised, or moldy fruit to avoid spreading to other normal fruit.

Benefits of Red Peony Grapes:

- Enhance eyesight
- Support to reduce blood fat
- Improve digestive system
- Prevent atherosclerosis
- Cardiovascular protection
- Anti-inflammatory properties",
            'category_id' => 2,
        ]);




        ////////// Fruit tray
        ////////// Fruit tray
        ////////// Fruit tray
        ////////// Fruit tray
        ////////// Fruit tray

        Product::create([
            'proName' => 'Fruit Tray 017',
            'proCost' => 925 / 25 / 3,
            'proPrice' => 925 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Morning Fruit',
            'proImageURL' =>    [
                "FruitTray017.webp",
            ],
            'proDescription' => "
Tet fruit tray, wishing for all the best:
- Buddha's Hand Hanoi (Type 1)
- Dien Grapefruit from Cold Region
- French Golden Kiwi
- Seedless Black Grapes South Africa/USA/Australia (depending on season)
- An Phuoc Plum
- Australian Tangerine
- Purple-pink dragon fruit
- Offering basket
- Flowers and decorative accessories for the offering tray

How to preserve the Five Fruit Tray:
- The fruit tray is decorated and fixed before being delivered to the customer to keep the gift basket intact and avoid the fruit from shifting.

*Fruit prices may vary depending on the time
*Price does not include VAT and shipping fees ",
            'category_id' => 3,
        ]);

        Product::create([
            'proName' => 'Fruit Tray 025',
            'proCost' => 1195 / 25 / 3,
            'proPrice' => 1195 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Morning Fruit',
            'proImageURL' =>    [
                "FruitTray025.webp",
            ],
            'proDescription' => "
Tet fruit tray, wishing for all the best:
- Large size copper tray
- Coconut of Fortune Gourd
- Long Phung Coconut
- Ancient Dien grapefruit over 20 years old
- Korean pear
- American Envy Apple size 100
- 2PH Domestic Mandarin
- South African Black Grapes

How to preserve the Five Fruit Tray:
- The fruit tray is decorated and fixed before being delivered to the customer to keep the gift basket intact and avoid the fruit from shifting.

*Fruit prices may vary depending on the time
*Price does not include VAT and shipping fees ",
            'category_id' => 3,
        ]);

        Product::create([
            'proName' => 'Fruit Tray 028',
            'proCost' => 995 / 25 / 3,
            'proPrice' => 995 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Morning Fruit',
            'proImageURL' =>    [
                "FruitTray028.webp",
            ],
            'proDescription' => "
Tet fruit tray, wishing for all the best:
- Large size copper tray
- Hoa Loc sand mango
- Australian Orange
- An Phuoc Plum
- French Golden Kiwi
- South African Black Grapes
- Purple-pink dragon fruit
- Amore Honey Coconut
- 2PH Domestic Mandarin
- Lotus

How to preserve the Five Fruit Tray:
- The fruit tray is decorated and fixed before being delivered to the customer to keep the gift basket intact and avoid the fruit from shifting.

*Fruit prices may vary depending on the time
*Price does not include VAT and shipping fees ",
            'category_id' => 3,
        ]);

        Product::create([
            'proName' => 'Fruit Tray 034',
            'proCost' => 995 / 25 / 3,
            'proPrice' => 995 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Morning Fruit',
            'proImageURL' =>    [
                "FruitTray034.webp",
            ],
            'proDescription' => "
Tet fruit tray, wishing for all the best:
- Long Phung Pineapple
- Mini coconut for Tet
- Grapefruit with branches and leaves
- South African Black Grapes
- Ba Den custard apple
- Envy New Zealand Apples size 100
- Candied tangerines
- 2PH Domestic Mandarin
- An Phuoc Plum
- Yellow papaya
- Amore Honey Coconut
- Purple-pink dragon fruit
- Large size copper tray
- Lotus

How to preserve the Five Fruit Tray:
- The fruit tray is decorated and fixed before being delivered to the customer to keep the gift basket intact and avoid the fruit from shifting.

*Fruit prices may vary depending on the time
*Price does not include VAT and shipping fees ",
            'category_id' => 3,
        ]);

        Product::create([
            'proName' => 'Fruit Tray 036',
            'proCost' => 1445 / 25 / 3,
            'proPrice' => 1445 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Morning Fruit',
            'proImageURL' =>    [
                "FruitTray036.webp",
            ],
            'proDescription' => "
Tet fruit tray, wishing for all the best:
- Buddha's Hand
- Steaming basket
- Lotus flowers and decorative accessories for the fruit tray

How to preserve the Five Fruit Tray:
- The fruit tray is decorated and fixed before being delivered to the customer to keep the gift basket intact and avoid the fruit from shifting.

*Fruit prices may vary depending on the time
*Price does not include VAT and shipping fees ",
            'category_id' => 3,
        ]);

        Product::create([
            'proName' => 'Fruit Tray 037',
            'proCost' => 795 / 25 / 3,
            'proPrice' => 795 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Morning Fruit',
            'proImageURL' =>    [
                "FruitTray037.webp",
            ],
            'proDescription' => "
Tet fruit tray, wishing for all the best:
- South African Green Grapes
- American Envy Apple size 100
- Peeled coconut
- Singo Pear Inland China
- Australian Orange
- French Golden Kiwi
- D25 fox eye fruit tray
- Lotus

How to preserve the Five Fruit Tray:
- The fruit tray is decorated and fixed before being delivered to the customer to keep the gift basket intact and avoid the fruit from shifting.

*Fruit prices may vary depending on the time
*Price does not include VAT and shipping fees ",
            'category_id' => 3,
        ]);

        ////////// Pre-cut fruit
        ////////// Pre-cut fruit
        ////////// Pre-cut fruit
        ////////// Pre-cut fruit
        ////////// Pre-cut fruit

        Product::create([
            'proName' => 'CS13 Pre-cut Fruit',
            'proCost' => 350 / 25 / 3,
            'proPrice' => 350 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Morning Fruit',
            'proImageURL' =>    [
                "CS13Pre-cutFruit.webp",
            ],
            'proDescription' => "
- Amore melon (1 fruit)

*Fruit prices may vary depending on the time
*Price does not include VAT and shipping fees

Storage instructions: Use immediately to ensure fruit freshness. Store the box in a cool place.",
            'category_id' => 4,
        ]);

        Product::create([
            'proName' => 'CS17 Pre-cut Fruit',
            'proCost' => 210 / 25 / 3,
            'proPrice' => 210 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Morning Fruit',
            'proImageURL' =>    [
                "CS17Pre-cutFruit.webp",
            ],
            'proDescription' => "
- Thai Rambutan
- Australian red cherry size 26-28
- American green grapes

*Fruit prices may vary depending on the time
*Price does not include VAT and shipping fees

Storage instructions: Use immediately to ensure fruit freshness. Store the box in a cool place.",
            'category_id' => 4,
        ]);

        Product::create([
            'proName' => 'CS19 Pre-cut Fruit',
            'proCost' => 125 / 25 / 3,
            'proPrice' => 125 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Morning Fruit',
            'proImageURL' =>    [
                "CS19Pre-cutFruit.webp",
            ],
            'proDescription' => "
- Dried tamarind
- American green grapes
- Australian Tangerine

*Fruit prices may vary depending on the time
*Price does not include VAT and shipping fees

Storage instructions: Use immediately to ensure fruit freshness. Store the box in a cool place.",
            'category_id' => 4,
        ]);

        Product::create([
            'proName' => 'CS36 Pre-cut Fruit',
            'proCost' => 155 / 25 / 3,
            'proPrice' => 155 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Morning Fruit',
            'proImageURL' =>    [
                "CS36Pre-cutFruit.webp",
            ],
            'proDescription' => "
- Australian seedless green grapes
- Australian/South African Seedless Black Grapes
- Australian Tangerine
- Organic French Juliet Apples

*Fruit prices may vary depending on the time
*Price does not include VAT and shipping fees

Storage instructions: Use immediately to ensure fruit freshness. Store the box in a cool place.",
            'category_id' => 4,
        ]);

        Product::create([
            'proName' => 'CS48 Pre-cut Fruit',
            'proCost' => 169 / 25 / 3,
            'proPrice' => 169 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Morning Fruit',
            'proImageURL' =>    [
                "CS48Pre-cutFruit.webp",
            ],
            'proDescription' => "
- VIP Hmong Plum
- American red cherry
- American Orange

*Fruit prices may vary depending on the time
*Price does not include VAT and shipping fees

Storage instructions: Use immediately to ensure fruit freshness. Store the box in a cool place.",
            'category_id' => 4,
        ]);

        Product::create([
            'proName' => 'CS55 Pre-cut Fruit',
            'proCost' => 179 / 25 / 3,
            'proPrice' => 179 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Morning Fruit',
            'proImageURL' =>    [
                "CS55Pre-cutFruit.webp",
            ],
            'proDescription' => "
- Imported green grapes
- Beijing jujube
- Cabbage Label
- Australian Tangerine

*Fruit prices may vary depending on the time
*Price does not include VAT and shipping fees

Storage instructions: Use immediately to ensure fruit freshness. Store the box in a cool place.",
            'category_id' => 4,
        ]);

        Product::create([
            'proName' => 'CS58 Pre-cut Fruit',
            'proCost' => 219 / 25 / 3,
            'proPrice' => 219 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Morning Fruit',
            'proImageURL' =>    [
                "CS58Pre-cutFruit.webp",
            ],
            'proDescription' => "
- Peach Blossom
- Australian Tangerine
- Zespri Gold Kiwi

*Fruit prices may vary depending on the time
*Price does not include VAT and shipping fees

Storage instructions: Use immediately to ensure fruit freshness. Store the box in a cool place.",
            'category_id' => 4,
        ]);

        Product::create([
            'proName' => 'CS60 Pre-cut Fruit',
            'proCost' => 149 / 25 / 3,
            'proPrice' => 149 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Morning Fruit',
            'proImageURL' =>    [
                "CS60Pre-cutFruit.webp",
            ],
            'proDescription' => "
- Envy Apple
- Queen Avocado 034
- Zespri Gold Kiwi
- Red Cherry

*Fruit prices may vary depending on the time
*Price does not include VAT and shipping fees

Storage instructions: Use immediately to ensure fruit freshness. Store the box in a cool place.",
            'category_id' => 4,
        ]);


        ////////// Fruit gift
        ////////// Fruit gift
        ////////// Fruit gift
        ////////// Fruit gift
        ////////// Fruit gift

        Product::create([
            'proName' => 'Fruit Gift Basket G035',
            'proCost' => 1995 / 25 / 3,
            'proPrice' => 1995 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Morning Fruit',
            'proImageURL' =>    [
                "FruitgiftbasketG035_1.webp",
                "FruitgiftbasketG035_2.webp",
            ],
            'proDescription' => "
- 2-color brown rattan basket
- Almond & Hazelnut Milk Chocolate Gold Tin Box
- Korean peony grapes
- New Zealand Blueberries (Box of 125gr)
- Golden Melon
- Singo Domestic Chinese Pear
- American Envy apples size 100
- Australian orange
- 2PH Domestic Mandarins
- Australian red plum

*Fruit prices may vary over time.
*Price does not include VAT and shipping fees

Storage instructions: Use immediately to ensure fruit freshness. Store the box in a cool place.",
            'category_id' => 5,
        ]);

        Product::create([
            'proName' => 'Fruit Gift Box HQ231',
            'proCost' => 895 / 25 / 3,
            'proPrice' => 895 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Morning Fruit',
            'proImageURL' =>    [
                "FruitgiftboxHQ231_1.webp",
                "FruitgiftboxHQ231_2.webp",
            ],
            'proDescription' => "
- New Zealand Blueberries (Box of 125gr)
- Large cold carton box
- Large carton bag
- 2PH Domestic Mandarins
- American Envy apples size 100
- Australian orange
- Singo Domestic Chinese Pear
- Yellow-skinned Cat Chu mango
- Australian green grapes
- Australian black grapes

*Fruit prices may vary over time.
*Price does not include VAT and shipping fees

Storage instructions: Use immediately to ensure fruit freshness. Store the box in a cool place.",
            'category_id' => 5,
        ]);

        Product::create([
            'proName' => 'Fruit Gift Box HQ238',
            'proCost' => 945 / 25 / 3,
            'proPrice' => 945 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Morning Fruit',
            'proImageURL' =>    [
                "FruitgiftboxHQ238_1.webp",
                "FruitgiftboxHQ238_2.webp",
            ],
            'proDescription' => "
- Korean strawberries
- Taobao Heart Box
- Singo Domestic Chinese Pear
- Small paper bag
- Australian green grapes
- Australian black grapes
- 2PH Domestic Mandarins

*Fruit prices may vary over time.
*Price does not include VAT and shipping fees

Storage instructions: Use immediately to ensure fruit freshness. Store the box in a cool place.",
            'category_id' => 5,
        ]);

        Product::create([
            'proName' => 'Giant Fruit Candy Bouquet Pink Tone',
            'proCost' => 285 / 25 / 3,
            'proPrice' => 285 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Morning Fruit',
            'proImageURL' =>    [
                "GiantFruitCandyBouquetPinkTone_1.webp",
                "GiantFruitCandyBouquetPinkTone_2.webp",
            ],
            'proDescription' => "
- French Juliet apple size 125
- Australian green grapes
- Ferrero Rocher Chocolate Balls
- 2PH Domestic Mandarins
- 8/3 candy base
- Small paper bag

*Fruit prices may vary over time.
*Price does not include VAT and shipping fees

Storage instructions: Use immediately to ensure fruit freshness. Store the box in a cool place.",
            'category_id' => 5,
        ]);

        Product::create([
            'proName' => 'Strawberry Bouquet Size M',
            'proCost' => 885 / 25 / 3,
            'proPrice' => 885 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Morning Fruit',
            'proImageURL' =>    [
                "StrawberrybouquetsizeM_1.webp",
                "StrawberrybouquetsizeM_2.webp",
            ],
            'proDescription' => "
- Square flower base
- Valentine flower essence
- Wax Rose
- Korean strawberries
- Strawberry bouquet plastic bag

*Fruit prices may vary over time.
*Price does not include VAT and shipping fees

Storage instructions: Use immediately to ensure fruit freshness. Store the box in a cool place.",
            'category_id' => 5,
        ]);

        Product::create([
            'proName' => 'Teddy Bear Fruit Suitcase GiftBox V008',
            'proCost' => 1445 / 25 / 3,
            'proPrice' => 1445 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Morning Fruit',
            'proImageURL' =>    [
                "TeddyBearFruitSuitcaseGiftBoxV008_1.webp",
                "TeddyBearFruitSuitcaseGiftBoxV008_2.webp",
            ],
            'proDescription' => "
- Artificial flowers
- Mica suitcase
- Yellow-skinned Cat Chu mango
- Australian orange
- 2PH Domestic Mandarins
- American Envy apples size 100
- Australian green grapes
- Teddy bear size 25cm

*Fruit prices may vary over time.
*Price does not include VAT and shipping fees

Storage instructions: Use immediately to ensure fruit freshness. Store the box in a cool place.",
            'category_id' => 5,
        ]);



        ////////// Premium fruit gift
        ////////// Premium fruit gift
        ////////// Premium fruit gift
        ////////// Premium fruit gift
        ////////// Premium fruit gift

        Product::create([
            'proName' => 'Nguyet Cat 001',
            'proCost' => 4209 / 25 / 3,
            'proPrice' => 4209 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Morning Fruit',
            'proImageURL' =>    [
                "NguyetCat001_1.webp",
                "NguyetCat001_2.webp",
                "NguyetCat001_3.webp",
                "NguyetCat001_4.webp",
            ],
            'proDescription' => "
Take the image of the full moon, peaceful, always bright in the dark night.
Nguyet Cat is not only a high-end gift box for health, but also has a deep meaning: 'Wishing for a prosperous life, both materially and spiritually for the owner'.

Nguyet Cat product set includes:
* List of premium fruits
- American strawberry
- American blueberries
- American red cherry
- New Zealand Gold Kiwi
- Korean form
- Australian tangerine
- Peach Immortal Wukong
- Yellow skin cat chu mango
- Golden melon

* High-quality oak wood box with dimensions: 40x40x18.5 (cm)
* Luxurious with soft, delicate outer fabric
* Leave a beautiful card with flowers as accents
* Sturdy with 5-layer protective carton

Additional services of Nguyet Cat Gift Box

Time to complete the box:
- Customers who order Nguyet Cat gift boxes will be given priority in the order of box preparation (prepared first compared to other gift boxes)
- However, Nguyet Cat gift boxes need to be prepared meticulously, so the time to prepare the box will be from 90-120 minutes

Hand delivery:
- Due to the large weight and high value of the gift box, the driver will deliver the box to the customer's home/room
- In case the customer lives in a high-end apartment building that restricts strangers from entering and exiting, the store will contact the customer and ask the customer to lead the driver up.

Gift box preservation specifications:
Gift boxes are wrapped in 5-layer thick carton boxes during transportation to:
- Reduce shock
- Limit fruit displacement in the box
- Protect the box from weather factors that affect the fruit (sun/rain)",
            'category_id' => 6,
        ]);

        Product::create([
            'proName' => 'Nguyet Cat 002',
            'proCost' => 5219 / 25 / 3,
            'proPrice' => 5219 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Morning Fruit',
            'proImageURL' =>    [
                "NguyetCat002_1.webp",
            ],
            'proDescription' => "
Take the image of the full moon, peaceful, always bright in the dark night.
Nguyet Cat is not only a high-end gift box for health, but also has a deep meaning: 'Wishing for a prosperous life, both materially and spiritually for the owner'.

Nguyet Cat product set includes:
* List of premium fruits
- American red cherry
- Peach Immortal Wukong
- Korean peony grapes
- New Zealand Gold Kiwi
- New Zealand Rockit Apple
- Australian tangerine
- American orange
- Yellow skin cat chu mango

* High-quality oak wood box with dimensions: 40x40x18.5 (cm)
* Luxurious with soft, delicate outer fabric
* Leave a beautiful card with flowers as accents
* Sturdy with 5-layer protective carton

Additional services of Nguyet Cat Gift Box

Time to complete the box:
- Customers who order Nguyet Cat gift boxes will be given priority in the order of box preparation (prepared first compared to other gift boxes)
- However, Nguyet Cat gift boxes need to be prepared meticulously, so the time to prepare the box will be from 90-120 minutes

Hand delivery:
- Due to the large weight and high value of the gift box, the driver will deliver the box to the customer's home/room
- In case the customer lives in a high-end apartment building that restricts strangers from entering and exiting, the store will contact the customer and ask the customer to lead the driver up.

Gift box preservation specifications:
Gift boxes are wrapped in 5-layer thick carton boxes during transportation to:
- Reduce shock
- Limit fruit displacement in the box
- Protect the box from weather factors that affect the fruit (sun/rain)",
            'category_id' => 6,
        ]);

        Product::create([
            'proName' => 'Nguyet Cat 003',
            'proCost' => 3409 / 25 / 3,
            'proPrice' => 3409 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Morning Fruit',
            'proImageURL' =>    [
                "NguyetCat003_1.webp",
                "NguyetCat003_2.webp",
            ],
            'proDescription' => "
Take the image of the full moon, peaceful, always bright in the dark night.
Nguyet Cat is not only a high-end gift box for health, but also has a deep meaning: 'Wishing for a prosperous life, both materially and spiritually for the owner'.

Nguyet Cat product set includes:
* List of premium fruits
- Peach Immortal Wukong
- New Zealand Gold Kiwi
- Yellow skin cat chu mango
- American red cherry size 9
- Australian tangerine
- Korean peony grapes

* High-quality oak wood box with dimensions: 40x40x18.5 (cm)
* Luxurious with soft, delicate outer fabric
* Leave a beautiful card with flowers as accents
* Sturdy with 5-layer protective carton

Additional services of Nguyet Cat Gift Box

Time to complete the box:
- Customers who order Nguyet Cat gift boxes will be given priority in the order of box preparation (prepared first compared to other gift boxes)
- However, Nguyet Cat gift boxes need to be prepared meticulously, so the time to prepare the box will be from 90-120 minutes

Hand delivery:
- Due to the large weight and high value of the gift box, the driver will deliver the box to the customer's home/room
- In case the customer lives in a high-end apartment building that restricts strangers from entering and exiting, the store will contact the customer and ask the customer to lead the driver up.

Gift box preservation specifications:
Gift boxes are wrapped in 5-layer thick carton boxes during transportation to:
- Reduce shock
- Limit fruit displacement in the box
- Protect the box from weather factors that affect the fruit (sun/rain)",
            'category_id' => 6,
        ]);

        Product::create([
            'proName' => 'Nguyet Cat 004',
            'proCost' => 3129 / 25 / 3,
            'proPrice' => 3129 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Morning Fruit',
            'proImageURL' =>    [
                "NguyetCat004.webp",
            ],
            'proDescription' => "
Take the image of the full moon, peaceful, always bright in the dark night.
Nguyet Cat is not only a high-end gift box for health, but also has a deep meaning: 'Wishing for a prosperous life, both materially and spiritually for the owner'.

Nguyet Cat product set includes:
* List of premium fruits
- American orange
- Australian
- New Zealand Gold Kiwi
- Rockit Apple
- American seedless red candy grapes
- Korean peony grapes
- Korean pear
- Yellow skin cat chu mango
- New Zealand blueberries

* High-quality oak wood box with dimensions: 40x40x18.5 (cm)
* Luxurious with soft, delicate outer fabric
* Leave a beautiful card with flowers as accents
* Sturdy with 5-layer protective carton

Additional services of Nguyet Cat Gift Box

Time to complete the box:
- Customers who order Nguyet Cat gift boxes will be given priority in the order of box preparation (prepared first compared to other gift boxes)
- However, Nguyet Cat gift boxes need to be prepared meticulously, so the time to prepare the box will be from 90-120 minutes

Hand delivery:
- Due to the large weight and high value of the gift box, the driver will deliver the box to the customer's home/room
- In case the customer lives in a high-end apartment building that restricts strangers from entering and exiting, the store will contact the customer and ask the customer to lead the driver up.

Gift box preservation specifications:
Gift boxes are wrapped in 5-layer thick carton boxes during transportation to:
- Reduce shock
- Limit fruit displacement in the box
- Protect the box from weather factors that affect the fruit (sun/rain)",
            'category_id' => 6,
        ]);

        Product::create([
            'proName' => 'Nguyet Cat 005',
            'proCost' => 3569 / 25 / 3,
            'proPrice' => 3569 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Morning Fruit',
            'proImageURL' =>    [
                "NguyetCat005.webp",
            ],
            'proDescription' => "
Take the image of the full moon, peaceful, always bright in the dark night.
Nguyet Cat is not only a high-end gift box for health, but also has a deep meaning: 'Wishing for a prosperous life, both materially and spiritually for the owner'.

Nguyet Cat product set includes:
* List of premium fruits
- Australian Orange
- Tasmanian Red Cherry
- French Golden Kiwi
- Yellow skin mango
- Rockit New Zealand Jumbo Apples (Pack of 4, 424GR)
- Golden Melon
- Joy Farm Korean Strawberries (box of 330GR)
- New Zealand Blueberries (Box of 125GR)
- Korean Peony Grapes
- Jacob's Creek Australian Red Wine 750ml

* High-quality oak wood box with dimensions: 40x40x18.5 (cm)
* Luxurious with soft, delicate outer fabric
* Leave a beautiful card with flowers as accents
* Sturdy with 5-layer protective carton

Additional services of Nguyet Cat Gift Box

Time to complete the box:
- Customers who order Nguyet Cat gift boxes will be given priority in the order of box preparation (prepared first compared to other gift boxes)
- However, Nguyet Cat gift boxes need to be prepared meticulously, so the time to prepare the box will be from 90-120 minutes

Hand delivery:
- Due to the large weight and high value of the gift box, the driver will deliver the box to the customer's home/room
- In case the customer lives in a high-end apartment building that restricts strangers from entering and exiting, the store will contact the customer and ask the customer to lead the driver up.

Gift box preservation specifications:
Gift boxes are wrapped in 5-layer thick carton boxes during transportation to:
- Reduce shock
- Limit fruit displacement in the box
- Protect the box from weather factors that affect the fruit (sun/rain)",
            'category_id' => 6,
        ]);

        Product::create([
            'proName' => 'Nguyet Cat 006',
            'proCost' => 2499 / 25 / 3,
            'proPrice' => 2499 / 25,
            'proStock' => rand(0, 3000),
            'proSeason' => 'winter',
            'proOrigin' => 'Morning Fruit',
            'proImageURL' =>    [
                "NguyetCat006.webp",
            ],
            'proDescription' => "
Take the image of the full moon, peaceful, always bright in the dark night.
Nguyet Cat is not only a high-end gift box for health, but also has a deep meaning: 'Wishing for a prosperous life, both materially and spiritually for the owner'.

Nguyet Cat product set includes:
* List of premium fruits
- Envy New Zealand Apples
- Korean Peony Grapes / Chinese Domestic Peony Grapes
- Artisan Strawberry
- Korean pear
- Golden skin cat chu mango
- Peach Snow Lijiang
- New Zealand Gold Kiwi
- Sichuan Pomegranate
- Australian Orange
- Australian Tangerine

* High-quality oak wood box with dimensions: 40x40x18.5 (cm)
* Luxurious with soft, delicate outer fabric
* Leave a beautiful card with flowers as accents
* Sturdy with 5-layer protective carton

Additional services of Nguyet Cat Gift Box

Time to complete the box:
- Customers who order Nguyet Cat gift boxes will be given priority in the order of box preparation (prepared first compared to other gift boxes)
- However, Nguyet Cat gift boxes need to be prepared meticulously, so the time to prepare the box will be from 90-120 minutes

Hand delivery:
- Due to the large weight and high value of the gift box, the driver will deliver the box to the customer's home/room
- In case the customer lives in a high-end apartment building that restricts strangers from entering and exiting, the store will contact the customer and ask the customer to lead the driver up.

Gift box preservation specifications:
Gift boxes are wrapped in 5-layer thick carton boxes during transportation to:
- Reduce shock
- Limit fruit displacement in the box
- Protect the box from weather factors that affect the fruit (sun/rain)",
            'category_id' => 6,
        ]);
    }
}
