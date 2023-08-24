<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //ANTIPASTI
        Article::create([
            'name' => 'Coppa',
            'ingredients' => 'Tradition insulaire en fines bouchées savoureuses',
            'image' => 'sage_barista_express_impress_bst_inox_noir.jpg',
            'price' => 7,
            'highlighted'=> false,
            'gamme_id' => 4
        ]);

        Article::create([
            'name' => 'Foccacia',
            'ingredients' => 'Huile d\'olive frantoio Franci, Tomate',
            'allergens' => 'Gluten',
            'image' => 'sage_barista_express_impress_bst_inox_noir.jpg',
            'price' => 5,
            'highlighted'=> false,
            'gamme_id' => 4
        ]);

        Article::create([
            'name' => 'Mortadelle de sanglier',
            'ingredients' => 'Mortadelle de sanglier, truffe',
            'image' => 'sage_barista_express_impress_bst_inox_noir.jpg',
            'price' => 7,
            'highlighted'=> false,
            'gamme_id' => 4
        ]);

        //PIZZA NAPOLETANA
        Article::create([
            'name' => 'Marinara',
            'ingredients' => 'Sauce tomate, tomates confites, ail, basilic frais, huile d’olive, origan, parmesan',
            'allergens' => 'Gluten, lactose',
            'image' => 'sage_barista_express_impress_bst_inox_noir.jpg',
            'price' => 10,
            'highlighted'=> false,
            'gamme_id' => 2
        ]);
        Article::create([
            'name' => 'Red hot pizza peppers',
            'ingredients' => 'Sauce tomate, spianata piccante, parmesan , basilic et huile d\'olive',
            'allergens' => 'Gluten, lactose',
            'image' => 'sage_barista_express_impress_bst_inox_noir.jpg',
            'price' => 15,
            'highlighted'=> false,
            'gamme_id' => 2
        ]);
        Article::create([
            'name' => 'Ortolana',
            'ingredients' => 'Sauce tomate, roquette, tomates datterino, artichauts, Stracciatella , parmesan et taralli pugliesi',
            'allergens' => 'Gluten, lactose',
            'image' => 'sage_barista_express_impress_bst_inox_noir.jpg',
            'price' => 16,
            'highlighted'=> false,
            'gamme_id' => 2
        ]);
        Article::create([
            'name' => 'Miss piggy',
            'ingredients' => 'Crème de parmesan, pommes de terre, fior di latte, romarin, porchetta',
            'allergens' => 'Gluten, lactose',
            'image' => 'sage_barista_express_impress_bst_inox_noir.jpg',
            'price' => 17,
            'highlighted'=> false,
            'gamme_id' => 1
        ]);
        Article::create([
            'name' => 'C\'est la truffance',
            'ingredients' => 'Fior di latte, mortadelle de sanglier, truffe fraîche, Bocconcini di bufala et basilic',
            'allergens' => 'Gluten, lactose',
            'image' => 'sage_barista_express_impress_bst_inox_noir.jpg',
            'price' => 21,
            'highlighted'=> false,
            'gamme_id' => 2
        ]);
        Article::create([
            'name' => 'Azerty',
            'ingredients' => 'Sauce tomate, bresaola, roquette, tomates datterino, parmesan et crème de vinaigre balsamique de Modène',
            'allergens' => 'Gluten, lactose',
            'image' => 'sage_barista_express_impress_bst_inox_noir.jpg',
            'price' => 18,
            'highlighted'=> false,
            'gamme_id' => 2
        ]);
        Article::create([
            'name' => 'Verratti burrata végétarienne',
            'ingredients' => 'Sauce tomate Fior di latte Roquette Tomates datterini Double burrata Parmesan',
            'allergens' => 'Gluten, lactose',
            'image' => 'sage_barista_express_impress_bst_inox_noir.jpg',
            'price' => 18,
            'highlighted'=> false,
            'gamme_id' => 2
        ]);
        Article::create([
            'name' => 'Margherita DOP',
            'ingredients' => 'Mozzarella di bufala, tomates, basilic frais, huile d’olive',
            'allergens' => 'Gluten, lactose',
            'image' => 'sage_barista_express_impress_bst_inox_noir.jpg',
            'price' => 18,
            'highlighted'=> false,
            'gamme_id' => 2
        ]);
        Article::create([
            'name' => 'Puissance 4',
            'ingredients' => 'Crème de parmesan, fior di latte, gorgonzola, provolone, huile d\'olive et basilic',
            'allergens' => 'Gluten, lactose',
            'image' => 'sage_barista_express_impress_bst_inox_noir.jpg',
            'price' => 15,
            'highlighted'=> false,
            'gamme_id' => 1
        ]);
        Article::create([
            'name' => 'La reine de ton coeur',
            'ingredients' => 'Crème de parmesan, fior di latte, gorgonzola, provolone, huile d\'olive et basilic',
            'image' => 'sage_barista_express_impress_bst_inox_noir.jpg',
            'price' => 14,
            'highlighted'=> true,
            'gamme_id' => 1
        ]);
        Article::create([
            'name' => 'Verratti burrata',
            'ingredients' => 'Tomates, fior di latte, roquette, jambon de parme, tomates datterino, burrata, parmesan et huile d\'olive',
            'allergens' => 'Gluten, lactose',
            'image' => 'sage_barista_express_impress_bst_inox_noir.jpg',
            'price' => 18,
            'highlighted'=> false,
            'gamme_id' => 2
        ]);
        Article::create([
            'name' => 'Sexy calzedonia',
            'ingredients' => 'Pancetta, provola fumé, poivre, tomates, basilic, pancetta, provola fumé, poivre, tomates et basilic',
            'allergens' => 'Gluten, lactose',
            'image' => 'sage_barista_express_impress_bst_inox_noir.jpg',
            'price' => 16,
            'highlighted'=> false,
            'gamme_id' => 2
        ]);
        Article::create([
            'name' => 'Bambino',
            'ingredients' => 'Pancetta, provola fumé, poivre, tomates, basilic, pancetta, provola fumé, poivre, tomates et basilic',
            'allergens' => 'Gluten, lactose',
            'image' => 'sage_barista_express_impress_bst_inox_noir.jpg',
            'price' => 10,
            'highlighted'=> false,
            'gamme_id' => 2
        ]);

        //PANUOZZO
        Article::create([
            'name' => 'Panuozzo di parma',
            'ingredients' => 'Roquette, coppa, tomates datterino, fior di latte, parmesan, huile d\'olive',
            'allergens' => 'Gluten, lactose',
            'image' => 'sage_barista_express_impress_bst_inox_noir.jpg',
            'price' => 10.50,
            'highlighted'=> false,
            'gamme_id' => 3
        ]);
        Article::create([
            'name' => 'Panuozzo puissance 4 patate',
            'ingredients' => 'Crème de parmesan, fior di latte, gorgonzola, provolone, huile d\'olive et basilic',
            'allergens' => 'Gluten, lactose',
            'image' => 'sage_barista_express_impress_bst_inox_noir.jpg',
            'price' => 10.50,
            'highlighted'=> true,
            'gamme_id' => 3
        ]);

        //SOFT
        Article::create([
            'name' => 'Cola',
            'ingredients' => 'Sodas bio siciliens, eau de source naturelle de l\'Etna',
            'image' => 'sage_barista_express_impress_bst_inox_noir.jpg',
            'price' => 4,
            'highlighted'=> false,
            'gamme_id' => 6
        ]);
        Article::create([
            'name' => 'Orange',
            'ingredients' => 'Sodas bio siciliens, eau de source naturelle de l\'Etna',
            'image' => 'sage_barista_express_impress_bst_inox_noir.jpg',
            'price' => 4,
            'highlighted'=> false,
            'gamme_id' => 6
        ]);
        Article::create([
            'name' => 'Mandarine',
            'ingredients' => 'Sodas bio siciliens, eau de source naturelle de l\'Etna',
            'image' => 'sage_barista_express_impress_bst_inox_noir.jpg',
            'price' => 4,
            'highlighted'=> false,
            'gamme_id' => 6
        ]);
        Article::create([
            'name' => 'San pellegrino',
            'ingredients' => 'Eau Gazeuses 50cl',
            'image' => 'sage_barista_express_impress_bst_inox_noir.jpg',
            'price' => 2,
            'highlighted'=> false,
            'gamme_id' => 6
        ]);
        Article::create([
            'name' => 'Eau plate',
            'ingredients' => 'Sodas bio siciliens, eau de source naturelle de l\'Etna',
            'image' => 'sage_barista_express_impress_bst_inox_noir.jpg',
            'price' => 2,
            'highlighted'=> false,
            'gamme_id' => 6
        ]);

        //VINO & BIRRA
        Article::create([
            'name' => 'Caldora bianco',
            'ingredients' => 'Blanc sec fruité 75cl',
            'image' => 'sage_barista_express_impress_bst_inox_noir.jpg',
            'price' => 16,
            'highlighted'=> false,
            'gamme_id' => 7
        ]);
        Article::create([
            'name' => 'Lambrusco Rosso secco Emilia IGT',
            'ingredients' => 'Sec!',
            'image' => 'sage_barista_express_impress_bst_inox_noir.jpg',
            'price' => 13,
            'highlighted'=> false,
            'gamme_id' => 7
        ]);
        Article::create([
            'name' => 'Lambrusco Rosso Amabile Emilia IGT',
            'ingredients' => 'Gourmand!',
            'image' => 'sage_barista_express_impress_bst_inox_noir.jpg',
            'price' => 13,
            'highlighted'=> false,
            'gamme_id' => 7
        ]);
        Article::create([
            'name' => 'Prosecco Rosato presa n°3',
            'ingredients' => 'Gourmand!',
            'image' => 'sage_barista_express_impress_bst_inox_noir.jpg',
            'price' => 19,
            'highlighted'=> false,
            'gamme_id' => 7
        ]);
        Article::create([
            'name' => 'Luccarelli',
            'ingredients' => 'Vin rouge des Pouilles Un peu de puissance, solaire, gourmand !',
            'image' => 'sage_barista_express_impress_bst_inox_noir.jpg',
            'price' => 18,
            'highlighted'=> false,
            'gamme_id' => 7
        ]);
        Article::create([
            'name' => 'Tignanello 2015',
            'ingredients' => 'Famille Antinori, vin depuis 1385. Tignanello, révolutionnaire : Sangiovese en fût, mélange moderne, tanins vifs. Tignanello 2015 : riche, vibrant, complexe.',
            'image' => 'sage_barista_express_impress_bst_inox_noir.jpg',
            'price' => 190,
            'highlighted'=> false,
            'gamme_id' => 7
        ]);
        Article::create([
            'name' => 'Otello nero lambrusco secco Emilia IGT',
            'ingredients' => 'Incomparable!',
            'image' => 'sage_barista_express_impress_bst_inox_noir.jpg',
            'price' => 15,
            'highlighted'=> false,
            'gamme_id' => 7
        ]);
        Article::create([
            'name' => 'Etna A rina 201 Girolamo Russo',
            'ingredients' => 'La classe et l\'élégance Sicilienne ! Cépages: nerello mascalese 94%, nerello cappuccio 6%!',
            'image' => 'sage_barista_express_impress_bst_inox_noir.jpg',
            'price' => 43,
            'highlighted'=> false,
            'gamme_id' => 7
        ]);
        Article::create([
            'name' => 'Etna Rosso Doc 2017',
            'ingredients' => 'La classe et l\'élégance Sicilienne ! Cépages: nerello mascalese 100%',
            'image' => 'sage_barista_express_impress_bst_inox_noir.jpg',
            'price' => 88,
            'highlighted'=> false,
            'gamme_id' => 7
        ]);
        Article::create([
            'name' => 'Bière Poretti',
            'ingredients' => '33cl Blonde italienne',
            'image' => 'sage_barista_express_impress_bst_inox_noir.jpg',
            'price' => 88,
            'highlighted'=> false,
            'gamme_id' => 7
        ]);
        Article::create([
            'name' => 'Barbera d\'Alba',
            'ingredients' => 'Vin rouge 75cl',
            'image' => 'sage_barista_express_impress_bst_inox_noir.jpg',
            'price' => 34,
            'highlighted'=> false,
            'gamme_id' => 7
        ]);

        //Dolce
        Article::create([
            'name' => 'Tiramissimo',
            'ingredients' => 'Œufs, café, mascarpone, biscuits, cacao.',
            'allergens' => 'Oeuf, lactose, gluten',
            'image' => 'sage_barista_express_impress_bst_inox_noir.jpg',
            'price' => 5.50,
            'highlighted'=> false,
            'gamme_id' => 5
        ]);
        Article::create([
            'name' => 'Cannoli',
            'ingredients' => 'Biscuits gaufrés farcis d’une crème de ricotta de brebis aux pépites de chocolat et saupoudrés de sucre glace et pistaches En Promotion',
            'allergens' => 'Lactose, gluten',
            'image' => 'sage_barista_express_impress_bst_inox_noir.jpg',
            'price' => 7.50,
            'highlighted'=> false,
            'gamme_id' => 5
        ]);

    }
}
