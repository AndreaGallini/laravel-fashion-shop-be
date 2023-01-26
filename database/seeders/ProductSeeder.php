<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;

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
            // $newproduct->n_product = $product['n_product'];
            $newproduct->prezzo = $product['price'];
            $newproduct->category_id = $product['category_id'];
            $newproduct->texture_id = $product['texture_id'];
            $newproduct->brand_id = $product['brand_id'];
            $newproduct->save();

            $colors = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54];
            $tags = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23];

            $totRandColors = rand(1, 6);
            $totRandTags = rand(1, 4);

            $prodRandColors = Arr::random($colors, $totRandColors);
            $prodRandTags = Arr::random($tags, $totRandTags);


            $newproduct->colors()->sync($prodRandColors);
            $newproduct->tags()->sync($prodRandTags);
        }
    }
    public static function storeimage($img)
    {
        $url = 'https:' . $img;
        $contents = file_get_contents($url);
        $temp_name = substr($url, strrpos($url, '/') + 1);
        $name = substr($temp_name, 0, strpos($temp_name, '?')) . '.jpg';
        $path = 'images/' . $name;
        Storage::put('/public/images/' . $name, $contents);
        return $path;
    }
}
