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
                'image' => 'https://dummyimage.com/200x300/000/fff&text=Samsung',
                'price' => 100
            ],
            [
                'name' => 'Adidas',
                'description' => 'Adidas Nemeziz X',
                'image' => 'https://dummyimage.com/200x300/000/fff&text=Iphone',
                'price' => 500
            ],
            [
                'name' => 'Nike',
                'description' => 'Nike Alpha',
                'image' => 'https://dummyimage.com/200x300/000/fff&text=Google',
                'price' => 400
            ],
            [
                'name' => 'Nike',
                'description' => ' Nike Phantom',
                'image' => 'https://dummyimage.com/200x300/000/fff&text=LG',
                'price' => 200
            ],
            [
                'name' => 'Puma',
                'description' => 'Puma Future',
                'image' => 'https://dummyimage.com/200x300/000/fff&text=LG',
                'price' => 200
            ],
            [
                'name' => 'Puma',
                'description' => 'Puma Ultra',
                'image' => '1684185351.jpg',
                'price' => 200
            ]
        ];
  
        foreach ($produits as $key => $value) {
            Produit::create($value);
        }
    }
}