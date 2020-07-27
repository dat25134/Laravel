<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'title'=>$faker->jobTitle,
        'content'=>$faker->realText($maxNbChars = 200, $indexSize = 2),
        'image' =>$faker->imageUrl($width = 200, $height = 50)
    ];
});
