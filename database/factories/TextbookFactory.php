<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Textbook;
use Faker\Generator as Faker;

$factory->define(Textbook::class, function (Faker $faker) {
    return [
        //
        'image' => $faker->name.'jpg',
        'name' => $faker->realText(10),
        'date_time' => $faker->name,
        'category_id' => rand(1,12),
        'buyer_id' => rand(1,50),
        'seller_id' => rand(1,50),
        'reservation_id' => rand(1,50),
        'textbook_state_id' => rand(1,3),
        'author_id' => rand(1,50),
        'university_id' => rand(1,100),
    ];
});
