<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->sentence(6);
    return [
        'title' => $title,
        'slug' => Str::slug($title),
        'body' => $faker->paragraph(),
        'views' => $faker->numberBetween(1,100),
        'likes' => $faker->numberBetween(1,50),
        'status' => $faker->randomElement(['published','hidden']),
        'user_id' => $faker->numberBetween(1,3),
    ];
});
