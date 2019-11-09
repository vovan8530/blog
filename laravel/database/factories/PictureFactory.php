<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Picture;
use Faker\Generator as Faker;

$factory->define(Picture::class, function (Faker $faker) {
    return [
        'path' =>$faker->imageUrl(),
        'thumbnail' =>$faker->imageUrl($with=200, $height=200),
    ];
});

