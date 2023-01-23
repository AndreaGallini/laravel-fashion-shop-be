<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Texture;
use Illuminate\Support\Str;

class TextureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $textures = config('fashion_array.textures');
        // dd($textures);
        foreach ($textures as $texture) {
            $newtexture = new Texture();
            $newtexture->name = $texture;
            $newtexture->slug = Str::slug($newtexture->name, '-');
            $newtexture->save();
        }
    }
}