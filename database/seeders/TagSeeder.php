<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                $tags = config('fashion_array.tags');
        // dd($categories);
        foreach ($tags as $tag) {
            $newtag = new Tag();
            $newtag->name = $tag;
            $newtag->slug = Str::slug($newtag->name, '-');
            $newtag->save();
        }
    }
}
