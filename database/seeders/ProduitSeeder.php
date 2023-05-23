<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use App\Models\Produit;
  
class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produits = [
            [
                'name' => 'Adidas',
                'description' => 'Adidas Predator',
                'image' => '1684186351.png',
                'price' => 100,
                'category_id'=> 1
            ],
            [
                'name' => 'Adidas',
                'description' => 'Adidas Nemeziz X',
                'image' => '1684230028.jpg',
                'price' => 500,
                'category_id'=> 1
            ],
            [
                'name' => 'Nike',
                'description' => 'Nike Alpha',
                'image' => '1684186237.jpg',
                'price' => 400,
                'category_id'=> 1
            ],
            [
                'name' => 'Nike',
                'description' => ' Nike Phantom',
                'image' => '1a7ea0f5d21fbe5fbbe3cc975bddae9a.jpg',
                'price' => 200,
                'category_id'=> 1
            ],
            [
                'name' => 'Puma',
                'description' => 'Puma Future',
                'image' => '1684195734.jpg',
                'price' => 200,
                'category_id'=> 1
            ],
            [
                'name' => 'Puma',
                'description' => 'Puma Ultra',
                'image' => '1684186256.jpg',
                'price' => 200,
                'category_id'=> 1
            ]
        ];
  
        foreach ($produits as $key => $value) {
            Produit::create($value);
        }
    }
}