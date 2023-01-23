<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = config('fashion_array');
        // dd($products);
        foreach ($products as $product) {
            $newproduct = new Product();
            $newproduct->name = $product['name'];
            $newproduct->slug = $product['slug'];
            $newproduct->image = $product['image'];
            $newproduct->description = $product['description'];
            $newproduct->n_product = $product['n_product'];
            $newproduct->prezzo = $product['prezzo'];
            $newproduct->save();
        }
    }
}