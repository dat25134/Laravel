<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => "Sản phẩm" . $faker->numberBetween(1000,9000),
        'description' => $faker->realText($maxNbChars = 50, $indexSize = 2),
        'price' => $faker->randomDigit*100000,
        'image' =>$faker->imageUrl($width = 300, $height = 300)
    ];
});
