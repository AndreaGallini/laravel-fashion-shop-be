<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = config('fashion_array.products');
        // dd($products);
        foreach ($products as $product) {
            $newproduct = new Product();
            $newproduct->name = $product['name'];
            $newproduct->slug = Str::slug($newproduct->name, '-');
            $newproduct->image = ProductSeeder::storeimage($product['api_featured_image']);
            $newproduct->description = $product['description'];
         //   $newproduct->n_product = $product['n_product'];
            $newproduct->prezzo = $product['price'];
            $newproduct->save();
        }
    }
        public static function storeimage($img){
        $url = 'https:'.$img;
        $contents = file_get_contents($url);
        $temp_name = substr($url, strrpos($url, '/') + 1);
        $name = substr($temp_name, 0, strpos($temp_name, '?')) .'.jpg';
        $path = 'images/' . $name;
        Storage::put('images/'.$name, $contents);
        return $path;
    }
}
