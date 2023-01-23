<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ProjectTableSeeder::class, //inseriamo i nostri seeder cosi da far seddare con un singolo comando "php artisan db:seed"
        ]);
    }
}