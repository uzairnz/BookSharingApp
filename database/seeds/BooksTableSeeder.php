<?php

use Illuminate\Database\Seeder;
use App\Books;

class BooksTableSeeder extends Seeder
{

    public function run()
    {
        Books::truncate();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 100; $i++)
        {
            Books::create([
            'id' => $faker->numberBetween(1-50),
            'isbn' => $faker->isbn13,
            'title' => $faker->title,
            'author' => $faker->name,
            'Publisher' => $faker->company,
            'language' => $faker->languageCode,
        ]);


        }

    }
}
