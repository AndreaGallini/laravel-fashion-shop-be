<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = config('fashion_array.brands');
        // dd($brands);
        foreach ($brands as $brand) {
            $newbrand = new Brand();
            $newbrand->name = $brand;
            $newbrand->slug = Str::slug($newbrand->name, '-');
            $newbrand->save();
        }
    }
}