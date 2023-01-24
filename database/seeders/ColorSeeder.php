<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                        $colors = config('fashion_array.colors');
        // dd($categories);
        foreach ($colors as $color) {
            $newcolor = new Color();
            $newcolor->name = $color['colour_name'];
            $newcolor->hex_value = $color['hex_value'];
            $newcolor->slug = Str::slug($newcolor->name, '-');
            $newcolor->save();
        }
    }
}
