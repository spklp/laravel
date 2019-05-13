<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {

    $name = $faker->word(rand(3, 10));
    $descr = $faker->realText(rand(10, 40));
    $price = $faker->numberBetween(200, 5000);
    $originalPrice = round($price * 0.8, 0);
    $link_name = $name;
    $created = $faker->dateTimeBetween('-30 days', '-1 days');
    $flag = ['new', 'sale', 'hot', null];

    return [
        'category_id' => rand(2, 5),
        'name' => $name,
        'flag' => $flag[rand(0, 3)],
        'descr' => $descr,
        'price' => $price,
        'original_price' => $originalPrice,
        'link_name' => $link_name,
        'created_at' => $created,
        'updated_at' => $created,
    ];
});
