<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'author' => 1,
            'category' => 2,
            'title' => "Pineapple: Fruit of the Month – A Tropical Delight",
            'content' => [
                "Welcome to another exciting edition of our Fruit of the Month series! This month, we are diving into the tropical goodness of Pineapple. It’s available in our most popular monthly fruit club, HarvestClub™ Americana, where it’s delivered fresh to your door each month. Pineapple is a delicious treat and a powerhouse of health benefits.",
                "The Tropical Treasure
Pineapple, scientifically known as Ananas comosus, is a tropical fruit from the bromeliad family.

Pineapple is native to South America but is widely cultivated in tropical regions worldwide. Known for its distinct spiky skin and sweet, juicy flesh, It has become a favorite among fruit lovers.

How to Select & Store:
Look for one that is heavy for its size and has a sweet aroma.
To store, keep it at room temperature for 1-2 days or in the refrigerator for 4-5 days.
Nutritional Value & Health Benefits
One of the most enticing aspects of Pineapple is its impressive nutritional profile. It is rich in essential vitamins and minerals, including Vitamin C, Vitamin A, Vitamin B6, Manganese, and Potassium.

Why is it a must-have in your diet? Here’s how these essential vitamins and minerals benefit your overall health:

Immune Support: It’s a natural source of Vitamin C, a powerful antioxidant that helps boost the immune system and protect against infections.
Digestive Aid: The enzyme bromelain aids digestion by breaking down proteins and promoting healthy gut function.
Anti-Inflammatory Properties: Bromelain also exhibits anti-inflammatory properties, making it beneficial for reducing inflammation and alleviating symptoms like arthritis.
Heart Health: Potassium and fiber contribute to heart health by regulating blood pressure and cholesterol levels.  ",
                "Delicious Ways to Enjoy Pineapple
Prepare to be amazed by its versatility in the kitchen.

Salads: Incorporate it into fruit or savory salads for flavor and texture.
Desserts: Include it in upside-down cakes, tarts, or fruit sorbets for a tropical punch.
Fresh and Juicy: Enjoy fresh slices for a refreshing snack.
Smoothies: Add chunks to your favorite smoothie recipe for a tropical twist.
Grilled: Grill it to enhance the sweetness and flavor; perfect for summer barbecues.
Check out some fantastic Recipes from The Fruit Company:


Image by freepik
Fresh Pineapple, Lime, and Mint Juice
Grilled Pineapple Bacon Fried Rice
Thai Pineapple Curry  ",
                "Fun Facts About Pineapple
It was historically considered a symbol of wealth and hospitality in many cultures.
It is a living plant that releases carbon dioxide as a byproduct of respiration, heat, and moisture.
Planting the crown of a Pineapple can help grow a new Pineapple plant, making it a sustainable and eco-friendly fruit.
Conclusion
Pineapple deserves a prime spot in your fruit baskets because of its flavor and health benefits. Please share your favorite Pineapple recipes and experiences with us! Stay tuned for more exciting Fruit of the Month features as we explore the world of delicious and nutritious fruits together!",
            ],
            'post_featured_image' => "blog_1_fea.png",
            'content_image' => [
                "blog_1_1.jpg",
                "blog_1_2.jpg",
                "blog_1_3.jpg",
            ],
            'tags' => "fruits",
            'meta_keywords' => "keyword",
            'meta_description' => "description",
            'visibility' => 1
        ]);









        Post::create([
            'author' => 1,
            'category' => 2,
            'title' => "October Fruit of the Month: Imperial Asian Pears",
            'content' => [
                "Experience the unparalleled sweetness and satisfying crunch of Imperial Asian Pears, a late summer treat ripening from August to September and lingering through the early spring months. Boasting over 1,000 varieties, these “apple pears” are cherished for their yellow-green to pale yellow skin adorned with smooth lenticels, encasing a white flesh that is remarkably sweet, firm, and juicy. Not only do they provide a refreshing cross between a pear and an apple, but they are also packed with fiber, low in calories, and rich in essential nutrients

Why Asian Pears are a Healthier Choice

Asian Pears are renowned for their exceptional nutritional profile. Being high in fiber and low in calories, they are a guilt-free indulgence. Moreover, they are a rich source of Potassium, supporting heart health, and Vitamin C, boosting your immune system. Additionally, they are a good source of Potassium, Vitamin C, Vitamin K, and Copper. Asian Pears are high in fiber and low in calories. Added bonus, this fruit is a delicious addition to salads like our Fall Asian Pear Salad.",
                "Versatile and Flavorful: Perfect for Culinary Adventures
Apart from being a delightful snack, Asian Pears serve as a fantastic culinary addition. Their crisp texture and natural sweetness make them an excellent choice for salads. Try our Fall Asian Pear Salad, where the refreshing crunch of Asian Pears perfectly complements the autumnal flavors, creating a harmonious blend for your taste buds

Rave Reviews from Our Valued Customers
“The Fruit Co’s packaging was excellent, and our Asian Pears arrived a day early. We were introduced to Asian Pears by our neighbors, and now, we’re hooked! The crispness and sweetness make them our top choice. Definitely a refreshing cross between a pear and an apple.”

“I gifted these Asian Pears to my grandma last Christmas, and she absolutely loved them! A unique and delightful present that won her heart.”

Fruit of the Month
Experience the unparalleled delight of gifting Imperial Asian Pears—an exquisite and unique present sure to brighten anyone’s day! These delectable pears, a true fall favorite, are available in limited quantities. Ensure you secure your share of this exceptional harvest before it’s gone! Dive into the unmatched taste of Imperial Asian Pears today by clicking here and placing your order. Embrace the season’s flavors with this extraordinary gift, a treat that will be remembered long after it’s savored. Hurry, as these delightful pears won’t last long!",

            ],
            'post_featured_image' => "blog_2_fea.jpg",
            'content_image' => [
                "blog_2_1.jpg",
            ],
            'tags' => "fruits",
            'meta_keywords' => "keyword",
            'meta_description' => "description",
            'visibility' => 1
        ]);


        Post::create([
            'author' => 1,
            'category' => 2,
            'title' => "Caramel Apples – A Halloween Tradition Made Easy",
            'content' => [
                "As the leaves turn golden and the air fills with the scent of cinnamon and spice, it’s time to embrace the enchantment of fall. Halloween, with its delightful treats and spooky festivities, is just around the corner. At The Fruit Company, we believe in adding a touch of sweetness to your celebrations. Introducing our exclusive Halloween Caramel Apple Kit – a magical experience that will transform your ordinary evening into a memorable autumnal adventure.

Our Halloween Caramel Apple Kit is not just a gift; it’s a creative experience waiting to happen. Inside the charming box, you’ll find crisp, juicy apples – nature’s perfect canvas for caramel magic. Dive into the art of caramel making with our easy-to-follow instructions, ensuring your apples are coated in the smoothest, most decadent caramel. Whether you’re planning a family Halloween night or a spooky-themed party with friends, our Caramel Apple Kit is the ideal centerpiece. Watch as kids and adults alike indulge in the joy of dipping, decorating, and, of course, savoring these delightful treats. It’s an activity that fosters creativity and leaves everyone with a sweet, sticky smile.

INGREDIENTS

6 Apples (any very crisp variety such as Honeycrisp or Granny Smith, etc.)
Caramel apple sticks or other baking dowel rods
1 Package of chewy caramels (14 oz)
2 Tbsp. Heavy Cream
Toppings- (M&M pieces, crushed Oreos, crushed Butterfinger, crushed almonds, crushed peanuts, or your other favorite combos)
DIRECTIONS

Prepare selection of toppings in separate small bowls and set aside.
Prepare baking Rinse and thoroughly dry apples with a paper towel.  Insert a stick.
Prepare a baking sheet with a parchment paper liner and nonstick cooking spray over the parchment.
Stirring frequently, heat unwrapped caramels and heavy cream in a saucepan over medium-low heat until caramels are fully melted and smooth.
As soon as the caramel is smooth, tip the saucepan slightly and dip apple, rotating until surface completely covered.
Dip caramel apple in preferred toppings (or just leave it au natural) and place upright on parchment-lined sheet. OPTIONAL:  After placing on sheet, drizzle with melted chocolate or add sea salt.
Let apples stand, at least 10 min.   Apples can be refrigerated up to a week.  If consuming after refrigeration, let set at room temperature for 15 min. prior to eating to soften.    OPTIONAL:  Make them into gifts!  Let caramel set in refrigerator for 15 minutes then wrap in plastic.
ENJOY!",
                "INGREDIENTS

6 Apples (any very crisp variety such as Honeycrisp or Granny Smith, etc.)
Caramel apple sticks or other baking dowel rods
1 Package of chewy caramels (14 oz)
2 Tbsp. Heavy Cream
Toppings- (M&M pieces, crushed Oreos, crushed Butterfinger, crushed almonds, crushed peanuts, or your other favorite combos)
DIRECTIONS

Prepare selection of toppings in separate small bowls and set aside.
Prepare baking Rinse and thoroughly dry apples with a paper towel.  Insert a stick.
Prepare a baking sheet with a parchment paper liner and nonstick cooking spray over the parchment.
Stirring frequently, heat unwrapped caramels and heavy cream in a saucepan over medium-low heat until caramels are fully melted and smooth.
As soon as the caramel is smooth, tip the saucepan slightly and dip apple, rotating until surface completely covered.
Dip caramel apple in preferred toppings (or just leave it au natural) and place upright on parchment-lined sheet. OPTIONAL:  After placing on sheet, drizzle with melted chocolate or add sea salt.
Let apples stand, at least 10 min.   Apples can be refrigerated up to a week.  If consuming after refrigeration, let set at room temperature for 15 min. prior to eating to soften.    OPTIONAL:  Make them into gifts!  Let caramel set in refrigerator for 15 minutes then wrap in plastic.
ENJOY!",
            ],
            'post_featured_image' => "blog_3_fea.webp",
            'content_image' => [
                "blog_3_1.webp",
                "blog_3_2.webp",
            ],
            'tags' => "fruits",
            'meta_keywords' => "keyword",
            'meta_description' => "description",
            'visibility' => 1
        ]);


        Post::create([
            'author' => 1,
            'category' => 2,
            'title' => "Caramel Apple Pie Recipe",
            'content' => [
                "Apple pie – a classic dish just begging to be reinvented! People always crave new, provocative recipes while simultaneously wishing to preserve traditional flavors. Our take on classic Apple Pie is a homage to the past with an inspired, modern twist. We give you the Fall Harvest Caramel Apple Pie!

Americans have had a long love affair with apple pie. There is evidence that recipes for apple pie have been around since the 1300s, but it wasn’t until the Civil War that apple pie became an integral part of American cooking. By 1902, an editorial in the New York Times proclaimed that pie had become “the American synonym for prosperity.” By the 1920s, the phrase as American as apple pie was being used frequently in print and became particularly popular during World War II, when soldiers would say they were fighting “for mom and apple pie” before returning home to enjoy a slice.

Our Caramel Apple Pie is a relatively straightforward, uncomplicated dish to create and is fun to prepare with your kids or grandkids. For example, kids can help by unwrapping caramels for the sauce and be instructed on how to mix the ingredients for the streusel topping.

Be prepared; filling your home with the smell of baking pie will stir the appetite of everyone within. A slice of this warm, crusty, buttery, sweet Caramel Apple Pie – especially if you serve it al-a-mode, will exponentially enhance any holiday party or family gathering. Don’t expect leftovers! ",
                "We have a wide variety of apples to choose from at The Fruit Company, including; Honeycrisp, Jonagold, imperial Fuji, Royal Red, Golden Supreme, Royal Gala and Pink Lady, but we think Granny Smiths are the perfect choice for this pie. Granny Smith apples hold their shape and don’t get mushy while baking, and their light texture and tart flavor notes complement the rich, gooey caramel and crunchy streusel topping.

Let’s be honest: who doesn’t love a slice of crusty, buttery pie with a scoop of delicious vanilla ice cream? Especially at the end of the day. The rich, buttery flavor of this delectable dessert is what home and hearth are all about. This apple pie can be easily customized by using your favorite nuts or fruit in lieu of apple pie filling. The crunch both on top of the pie as well as incorporated in the topping adds great texture, modernizing this classic dish for our sophisticated tastes.

Ingredients:
For the crust – this makes a 9 to 10-inch pie:

2 cups of flour
3 tsp sugar
1 tsp salt (you can reduce this)
2/3 cup oil (canola)
3 tbs mil (or more as needed)
For the caramel sauce:

1 16 oz bag of caramels
1 tbs water
For the filling:

2 lbs Granny Smith Apples
2/3 cup brown sugar (can adjust to taste)
1 tsp cinnamon
2 tbs flour
2 tbs butter
1/3 cup of caramel sauce
1/4 cup nut topping (used for sundaes or caramel apples)
For the streusel topping – before baking:

1/3 cup brown sugar
1 cup flour
6 tbs butter
For the topping – after baking:

1/2 cup caramel sauce
1/2 cup nut topping
Instructions:

For the crust – this makes a 9 to 10-inch pie:

Mix together the dry ingredients and make a well in the center.
Add the oil and milk (keep more milk if too dry).
Press dough into the pie plate – starting with the edge and working towards the middle.
For the caramel sauce:

Unwrap and add half the bag of caramels to a microwave-safe bowl
Add 1 tablespoon of water and microwave on high for 1 minute. Stir.
Return to microwave and cook for about 1 more minute. Stir well. Keep warm.
For the filling:

Peel and slice the apples, toss with sugar, flour and cinnamon.
Line prepared pie crust with caramel sauce and nuts, place apples, don’t with butter and top with streusel topping.
If you do not want the edges of your cust to get brown, wrap the edges of your pie plate with aluminum foil. (You’ll need to check the pie the last 10-15 minutes and remove the foil if the edges are too light.) The pie bakes at 375 degrees for 45 minutes or until the apples are tender when pierced with a fork.
For the streusel topping – before baking:

Melt butter, stir in sugar and flour; let rest for 5 minutes and then stir with fork and crumble over apples.
For the topping – after baking:

Drizzle caramel over top of slightly cooled pie and sprinkle with nuts.",
            ],
            'post_featured_image' => "blog_4_fea.jpg",
            'content_image' => [
                "blog_4_1.jpg",
            ],
            'tags' => "fruits",
            'meta_keywords' => "keyword",
            'meta_description' => "description",
            'visibility' => 1
        ]);


        Post::create([
            'author' => 1,
            'category' => 2,
            'title' => "Get Lucky with The Fruit Company’s Saint Patrick’s Day Collection",
            'content' => [
                "Saint Patrick’s Day, celebrated on March 17th every year, is a cultural and religious holiday that honors the patron saint of Ireland, St. Patrick. This day is celebrated by people worldwide, not just in Ireland, to commemorate Irish culture and history. As with any holiday, food plays a crucial role in the celebrations. The Fruit Company has assembled a fantastic collection of Saint Patrick’s Day-themed treats that will make your celebrations even more special.

The Fruit Company’s Saint Patrick’s Day collection includes a range of fruit baskets, gourmet treats, and gift boxes perfect for anyone looking to indulge in the St. Paddy’s Day spirit. In addition, the collection is full of vibrant greens and gold traditionally associated with St. Patrick’s Day. Here are some of the highlights:

 St. Patrick’s Day Tower: This tower includes a selection of gourmet treats such as chocolate-covered cherries, mixed nuts, and caramel popcorn that are perfect for sharing with friends and loved ones during the holiday. The tower comes in three beautifully designed green and gold boxes tied with a ribbon, making it an impressive gift for anyone. The boxes are stacked one on the other, giving the tower an elegant and stylish look that will make an excellent centerpiece for any St. Patrick’s Day celebration.  ",
                "Sweet and Savory Gift Tower: This gift tower includes four beautifully designed boxes, each containing gourmet treats such as mixed nuts, dried fruits, chocolate-covered cherries, and caramel popcorn. It’s a thoughtful and impressive gift that will satisfy any taste bud.

Ultimate Gourmet Gift Box: Filled with a variety of gourmet treats such as mixed nuts, dried fruits, chocolate-covered cherries, and delicious caramel popcorn. The box also includes a selection of gourmet cheeses and meats, making it a perfect choice for any charcuterie board. With its beautiful design and delicious selection of treats, this gift box will impress any recipient and make their St. Patrick’s Day celebration even more special.  ",
                "Signature Gourmet Gift Box: This box includes a selection of gourmet treats such as mixed nuts, dried fruits, chocolate-covered cherries, and caramel popcorn that will satisfy any taste bud. The box also features a beautiful design that will impress any recipient. With its delicious treats and elegant presentation, The Signature Holiday Gourmet Gift Box is the perfect way to show someone how much you care this St. Patrick’s Day.

The Fruit Company’s Saint Patrick’s Day collection is delicious and visually stunning. The collection is filled with vibrant greens and gold, making it perfect for anyone who wants to celebrate Saint Patrick’s Day in style. Best of all, with the code LUCKY23 at checkout, all these gifts come with free shipping. So, whether you are looking for a thoughtful gift for a loved one or want to treat yourself, this is the perfect opportunity to indulge in some delicious snacks without worrying about shipping costs. So, add some green to your celebrations this year with The Fruit Company’s Saint Patrick’s Day collection. ",


            ],
            'post_featured_image' => "blog_5_fea.png",
            'content_image' => [
                "blog_5_1.png",
                "blog_5_2.png",
                "blog_5_3.png",
                "blog_5_4.png",
            ],
            'tags' => "fruits",
            'meta_keywords' => "keyword",
            'meta_description' => "description",
            'visibility' => 1
        ]);

        Post::create([
            'author' => 1,
            'category' => 2,
            'title' => "Mango, Coconut, and Blackberry Popsicles",
            'content' => [
                "Summer is here!  We crave the light, cool options with the hot weather. And nothing says summer like fruit-filled popsicles. Unlike store bought popsicles that are filled with too much sugar and syrup, ours are packed full of nutritious  pureed mango, blackberries, and coconut milk.
                The best part is, this recipe is easy and fun to make with your kids. They will enjoy blending the ingredients, designing their own layers and impatiently waiting for the popsicles to freeze!",
                "For our popsicles we chose mango as the main ingredient because it is not only sweet and tropical, but when blended, mangos create the perfect rich and creamy texture.

Mango, Coconut, Blackberry Popsicle Recipe on The Fruit Company Blog

Mango, Coconut & Blackberry Popsicles
Author: The Fruit Company
Serves: 8-12
Ingredients
2 cups ripe mangos chopped
1 cup blackberries
3/4 cup coconut milk
1 tablespoon sugar, honey or agave
1 cup of orange juice or water
1/2 lemon, juiced
Instructions
Place chopped mangos into a blender or food processor. (If you are unsure of how to cube a mango, click here for a quick tutorial video with our resident “fruit expert”!) Begin blending and slowly add in lemon juice with orange juice or water, about 1/4-1/2 cup to help thin the mango. This also helps the mango puree easier and quicker. Once completed blended, and the mango mixture is thick and creamy, set aside.
Place the blackberries into a blender or food processor. Begin blending and slowly add in orange juice or water, about 1/4 cup to help puree the berries. Once blended, set aside.
Add 3/4 cup coconut milk and sugar into blender or food processor. Blend for 30 seconds until the coconut milk is whipped and creamy. Set aside.
Using a popsicle mold or a paper cup, begin adding your first layer, anywhere between 1/2″-1″ thick. Place in the freezer for 1 hour. Once the first layer is frozen. Add the second layer. This can be anywhere between 1″-2″. Place in the freezer for 45 minutes. At this point you can carefully insert your popsicle sticks. Continue to freeze this layer for another hour. Once the second layer is frozen, add your final layer, anywhere between 1/2″-1″. Place in the freezer for 1-2 additional hours.
If using paper cups, like we did, simply make a slit at the end and peel the cup off.",


            ],
            'post_featured_image' => "blog_6_fea.jpg",
            'content_image' => [
                "blog_6_1.jpg",
                "blog_6_2.jpg",
                "blog_6_3.jpg",
            ],
            'tags' => "fruits",
            'meta_keywords' => "keyword",
            'meta_description' => "description",
            'visibility' => 1
        ]);

        Post::create([
            'author' => 1,
            'category' => 2,
            'title' => "White and Dark Chocolate Dipped Rainier Cherries",
            'content' => [
                "Rainier cherry season in the Pacific Northwest is starting, and since we can never get enough of this sweet summer fruit, we are constantly looking for new recipes to try. This chocolate dipped Rainier cherries recipe is really simple, but will leave you absolutely addicted.
                We used our Rainier cherries, famous in the Northwest for their sweet, creamy, and extremely juicy flavor, and paired it with both white and dark chocolate. Dark, sweet cherries would be equally delicious!",
                "Keep the cherries cold and crisp to allow the melted chocolate to harden. When you bite in the burst of sweet cherry juice combined with the savory chocolate you get will be sure to leave you wanting more.",
                "White & Dark Chocolate Covered Cherries
Author: Ashley Marti
Ingredients
1 pound of [url href=”https://www.thefruitcompany.com/gourmet-gifts/premium-fruit-boxes/rainier-cherries” target=”_blank” title=”Rainier Cherries from The Fruit Company”]Rainier Cherries[/url]
4 ounces of dark chocolate, roughly chopped
4 ounces of white chocolate, roughly chopped
Instructions
Place the cherries in a strainer and give them a good wash under cold water. Using a kitchen towel, thoroughly dry the cherries and place them in the refrigerator.
Line a baking sheet with parchment paper and set aside.
Using a double broiler fill the bottom pan with 1 inch of water and place over medium heat. Add chopped chocolate to the broiler and stir occasionally until the chocolate is almost completely melted.
Remove the chocolate from the heat and continue to stir until all bits of chopped chocolate are melted.
Dip one cherry at a time into the melted chocolate, giving it a gentle shake before setting the cherry on the parchment lined pan. Once all cherries have been dipped, place the pan in the refrigerator for about 10 minutes until the chocolate has hardened.
Store the chocolate covered cherries in the refrigerator until ready to serve.",

            ],
            'post_featured_image' => "blog_7_fea.jpg",
            'content_image' => [
                "blog_7_1.jpg",
                "blog_7_2.jpg",
                "blog_7_3.jpg",
            ],
            'tags' => "fruits",
            'meta_keywords' => "keyword",
            'meta_description' => "description",
            'visibility' => 1
        ]);



        Post::create([
            'author' => 1,
            'category' => 2,
            'title' => "Holiday Appetizers: Pear and Persimmon Tarts",
            'content' => [
                "Holiday appetizers that will impress your guests and only take 15 minutes to prepare!

                With the holidays around the corner, we have started gathering a few of our favorite recipes that are great for last minute parties and quick appetizers. A simple puff pastry, combined with fresh seasonal fruit creates a tart that is both visually appealing and delicious.

We suggest during this busy season that you keep a few boxes of puff pastry in the freezer, your favorite cheese on hand, and a good supply of pears, persimmons and apples. With these few ingredients, you will have the perfect recipe, and more time on your hands to gather with friends and family.",
                "A few favorite combinations:
Pears + Blue Cheese + Pancetta with a drizzle of honey
Persimmons + Goat Cheese + Pancetta with a drizzle of Balsamic Vinegar
Figs + Blue Cheese with a drizzle of honey and flaky sea salt
Apples + Parmesan with sea salt and black pepper

Holiday Appetizers: Pear & Persimmon Tarts
Author: Ashley Marti
Prep time: 15 mins
Cook time: 30 mins
Total time: 45 mins
Ingredients
2 sheets of puff pastry (defrosted in fridge overnight)
2 ripe pear ([url href=”https://www.thefruitcompany.com/red-danjou-pears” target=”_blank”]Red d’Anjou[/url] or [url href=”https://www.thefruitcompany.com/webster-comice-pears” target=”_blank”]Comice[/url] both work great), cored and cut into thin wedges
1/2 cup blue cheese, crumbled
1 package of pancetta
2 persimmons, cut into thin slices
1/2 cup goat cheese, crumbled
More Topping Suggestions:
- Thyme Sprigs
- Figs
- Apples
- Ricotta Cheese
- Honey
- Balsamic Vinegar
Instructions
- Heat your oven to 400 degrees.
- Line 2 baking sheets with parchment paper and set aside.
- On a lightly floured surface, unfold defrosted puff pastry sheets. Using a 4″ circle cookie cutter, or cutting 4″ squares by hand, cut out the pastry dough. Set circles aside, Press the uncut pastry dough back together, with a rolling pin quickly roll it out and continue cutting out circles. Do the same with the second sheet.
- Place the cut out pastry dough onto the parchment lined baking sheets.
- Place 2 tablespoons of cheese on top of the dough. Layer with 1 piece of pancetta (if using) and place fruit over top.
- Sprinkle with a pinch of salt and pepper.
- Making sure there is 2 inches between each tart, place the baking pan into the oven and bake for 30 minutes, until puffed and golden.
- Remove from the oven, transfer the tarts to a cooling wrack. Sprinkle with additional cheese if you like. Serve warm or slightly cooled.",
                "",
                "",

            ],
            'post_featured_image' => "blog_8_fea.jpg",
            'content_image' => [
                "blog_8_1.jpg",
                "blog_8_2.jpg",
                "blog_8_3.jpg",
                "blog_8_4.jpg",
            ],
            'tags' => "fruits",
            'meta_keywords' => "keyword",
            'meta_description' => "description",
            'visibility' => 1
        ]);
    }
}
