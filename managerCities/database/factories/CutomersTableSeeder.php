<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'dob' => $faker->date,
        'email' => $faker->unique()->safeEmail,
        'city_id' => $faker->numberBetween(1,50)
    ];
});
