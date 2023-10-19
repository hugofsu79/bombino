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
            'image' => 'coppa.jpg',
            'price' => 7,
            'gamme_id' => 4
        ]);

        Article::create([
            'name' => 'Foccacia',
            'ingredients' => 'Huile d\'olive frantoio Franci, Tomate',
            'allergens' => 'Gluten',
            'image' => 'foccacia.jpg',
            'price' => 5,
            'gamme_id' => 4
        ]);

        Article::create([
            'name' => 'Mortadelle de sanglier',
            'ingredients' => 'Mortadelle de sanglier, truffe',
            'image' => 'mortadella_truffe_sanglier.jpg',
            'price' => 7,
            'gamme_id' => 4
        ]);

        //PIZZA NAPOLETANA
        Article::create([
            'name' => 'Marinara',
            'ingredients' => 'Tomates , ail, basilic frais, huile d’olive, origan',
            'allergens' => 'Gluten, lactose',
            'image' => 'marinara-pizza.jpg',
            'price' => 10,
            'gamme_id' => 2
        ]);
        Article::create([
            'name' => 'Red hot pizza peppers',
            'ingredients' => 'Sauce tomate, spianata piccante, parmesan , basilic et huile d\'olive',
            'allergens' => 'Gluten, lactose',
            'image' => 'red_hot_pizza_peppers.jpg',
            'price' => 15,
            'gamme_id' => 2
        ]);
        Article::create([
            'name' => 'Ortolana',
            'ingredients' => 'Sauce tomate, roquette, tomates datterino, artichauts, Stracciatella , parmesan et taralli pugliesi',
            'allergens' => 'Gluten, lactose',
            'image' => 'ortolana.jpeg',
            'price' => 16,
            'gamme_id' => 2
        ]);
        Article::create([
            'name' => 'Miss piggy',
            'ingredients' => 'Crème de parmesan, pommes de terre, fior di latte, romarin, porchetta',
            'allergens' => 'Gluten, lactose',
            'image' => 'miss_piggy.jpg',
            'price' => 17,
            'gamme_id' => 1
        ]);
        Article::create([
            'name' => 'C\'est la truffance',
            'ingredients' => 'Fior di latte, mortadelle de sanglier, truffe fraîche, Bocconcini di bufala et basilic',
            'allergens' => 'Gluten, lactose',
            'image' => 'cest_la_truffance.jpg',
            'price' => 21,
            'gamme_id' => 2
        ]);
        Article::create([
            'name' => 'Azerty',
            'ingredients' => 'Sauce tomate, bresaola, roquette, tomates datterino, parmesan et crème de vinaigre balsamique de Modène',
            'allergens' => 'Gluten, lactose',
            'image' => 'azerty.jpg',
            'price' => 18,
            'gamme_id' => 2
        ]);
        Article::create([
            'name' => 'Verratti burrata végétarienne',
            'ingredients' => 'Sauce tomate Fior di latte Roquette Tomates datterini Double burrata Parmesan',
            'allergens' => 'Gluten, lactose',
            'image' => 'verratti_burrata.jpg',
            'price' => 18,
            'gamme_id' => 2
        ]);
        Article::create([
            'name' => 'Margherita DOP',
            'ingredients' => 'Mozzarella di bufala, tomates, basilic frais, huile d’olive',
            'allergens' => 'Gluten, lactose',
            'image' => 'margherita.jpg',
            'price' => 18,
            'gamme_id' => 2
        ]);
        Article::create([
            'name' => 'Puissance 4',
            'ingredients' => 'Crème de parmesan, fior di latte, gorgonzola, provolone, huile d\'olive et basilic',
            'allergens' => 'Gluten, lactose',
            'image' => 'Puissance-4.jpg',
            'price' => 15,
            'gamme_id' => 1
        ]);
        Article::create([
            'name' => 'La reine de ton coeur',
            'ingredients' => 'Crème de parmesan, fior di latte, gorgonzola, provolone, huile d\'olive et basilic',
            'image' => 'la_reine_de_ton_coeur.jpg',
            'price' => 14,
            'gamme_id' => 1
        ]);
        Article::create([
            'name' => 'Verratti burrata',
            'ingredients' => 'Tomates, fior di latte, roquette, jambon de parme, tomates datterino, burrata, parmesan et huile d\'olive',
            'allergens' => 'Gluten, lactose',
            'image' => 'verratti_burrata.jpg',
            'price' => 18,
            'gamme_id' => 2
        ]);
        Article::create([
            'name' => 'Sexy calzedonia',
            'ingredients' => 'Pancetta, provola fumé, poivre, tomates, basilic, pancetta, provola fumé, poivre, tomates et basilic',
            'allergens' => 'Gluten, lactose',
            'image' => 'sexy_calzedonia.jpg',
            'price' => 16,
            'gamme_id' => 2
        ]);
        Article::create([
            'name' => 'Bambino',
            'ingredients' => 'Pancetta, provola fumé, poivre, tomates, basilic, pancetta, provola fumé, poivre, tomates et basilic',
            'allergens' => 'Gluten, lactose',
            'image' => 'margherita.jpg',
            'price' => 10,
            'gamme_id' => 2
        ]);

        //PANUOZZO
        Article::create([
            'name' => 'Panuozzo di parma',
            'ingredients' => 'Roquette, coppa, tomates datterino, fior di latte, parmesan, huile d\'olive',
            'allergens' => 'Gluten, lactose',
            'image' => 'panuozzo_di_parma.jpeg',
            'price' => 10.50,
            'gamme_id' => 3
        ]);
        Article::create([
            'name' => 'Panuozzo puissance 4 patate',
            'ingredients' => 'Crème de parmesan, fior di latte, gorgonzola, provolone, huile d\'olive et basilic',
            'allergens' => 'Gluten, lactose',
            'image' => 'panuozzo_4_fromages_patate.jpg',
            'price' => 10.50,
            'gamme_id' => 3
        ]);

        //SOFT
        Article::create([
            'name' => 'Cola',
            'ingredients' => 'Sodas bio siciliens, eau de source naturelle de l\'Etna',
            'image' => 'soft_cola.jpg',
            'price' => 4,
            'gamme_id' => 6
        ]);
        Article::create([
            'name' => 'Orange',
            'ingredients' => 'Sodas bio siciliens, eau de source naturelle de l\'Etna',
            'image' => 'soft_orange.jpg',
            'price' => 4,
            'gamme_id' => 6
        ]);
        Article::create([
            'name' => 'Mandarine',
            'ingredients' => 'Sodas bio siciliens, eau de source naturelle de l\'Etna',
            'image' => 'soft_mandarine.jpg',
            'price' => 4,
            'gamme_id' => 6
        ]);
        Article::create([
            'name' => 'San pellegrino',
            'ingredients' => 'Eau Gazeuses 50cl',
            'image' => 'soft_san_pellegrino.jpg',
            'price' => 2,
            'gamme_id' => 6
        ]);
        Article::create([
            'name' => 'Eau plate',
            'ingredients' => 'Sodas bio siciliens, eau de source naturelle de l\'Etna',
            'image' => 'soft_eau_san-benedetto.jpg',
            'price' => 2,
            'gamme_id' => 6
        ]);

        //VINO & BIRRA
        Article::create([
            'name' => 'Caldora bianco',
            'ingredients' => 'Blanc sec fruité 75cl',
            'image' => 'vino_caldora_bianco.png',
            'price' => 16,
            'gamme_id' => 7
        ]);
        Article::create([
            'name' => 'Lambrusco Rosso secco Emilia IGT',
            'ingredients' => 'Sec!',
            'image' => 'vino_ lambrusco_rosso_amabile_emilia.jpg',
            'price' => 13,
            'gamme_id' => 7
        ]);
        Article::create([
            'name' => 'Lambrusco Rosso Amabile Emilia IGT',
            'ingredients' => 'Gourmand!',
            'image' => 'vino_ lambrusco_rosso_amabile_emilia.jpg',
            'price' => 13,
            'gamme_id' => 7
        ]);
        Article::create([
            'name' => 'Prosecco Rosato presa n°3',
            'ingredients' => 'Gourmand!',
            'image' => 'vino_prosecco_rosato_presa_n°3.jpg',
            'price' => 19,
            'gamme_id' => 7
        ]);
        Article::create([
            'name' => 'Luccarelli',
            'ingredients' => 'Vin rouge des Pouilles Un peu de puissance, solaire, gourmand !',
            'image' => 'vino_luccarelli_primitovo.jpg',
            'price' => 18,
            'gamme_id' => 7
        ]);
        Article::create([
            'name' => 'Tignanello 2015',
            'ingredients' => 'Famille Antinori, vin depuis 1385. Tignanello, révolutionnaire : Sangiovese en fût, mélange moderne, tanins vifs. Tignanello 2015 : riche, vibrant, complexe.',
            'image' => 'vino_tignanello-2015.png',
            'price' => 190,
            'gamme_id' => 7
        ]);
        Article::create([
            'name' => 'Otello nero lambrusco secco Emilia IGT',
            'ingredients' => 'Incomparable!',
            'image' => 'vino_otello_nero_lambrusco_secco_emilia.jpg',
            'price' => 15,
            'gamme_id' => 7
        ]);
        Article::create([
            'name' => 'Etna A rina 201 Girolamo Russo',
            'ingredients' => 'La classe et l\'élégance Sicilienne ! Cépages: nerello mascalese 94%, nerello cappuccio 6%!',
            'image' => 'arina19_anv800.png',
            'price' => 43,
            'gamme_id' => 7
        ]);
        Article::create([
            'name' => 'Etna Rosso Doc 2017',
            'ingredients' => 'La classe et l\'élégance Sicilienne ! Cépages: nerello mascalese 100%',
            'image' => 'vino_etnaroso_docfeudo_2017_girolamo_russo.png',
            'price' => 88,
            'gamme_id' => 7
        ]);
        Article::create([
            'name' => 'Bière Poretti',
            'ingredients' => '33cl Blonde italienne',
            'image' => 'vino_biere_poretti.png',
            'price' => 2.5,
            'gamme_id' => 7
        ]);
        Article::create([
            'name' => 'Barbera d\'Alba',
            'ingredients' => 'Vin rouge 75cl',
            'image' => 'vino_barbera-dalba.png',
            'price' => 34,
            'gamme_id' => 7
        ]);

        //Dolce
        Article::create([
            'name' => 'Tiramissimo',
            'ingredients' => 'Œufs, café, mascarpone, biscuits, cacao.',
            'allergens' => 'Oeuf, lactose, gluten',
            'image' => 'tiramisu.jpg',
            'price' => 5.50,
            'gamme_id' => 5
        ]);
        Article::create([
            'name' => 'Cannoli',
            'ingredients' => 'Biscuits gaufrés farcis d’une crème de ricotta de brebis aux pépites de chocolat et saupoudrés de sucre glace et pistaches En Promotion',
            'allergens' => 'Lactose, gluten',
            'image' => 'cannoli.png',
            'price' => 7.50,
            'gamme_id' => 5
        ]);
    }
}
