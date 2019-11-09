<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->sentence(8);
    $views= $faker->numberBetween(1,100);
    return [
        'title' => $title,
        'slug' => Str::slug($title),
        'body' => $faker->paragraph(20),
        'views' => $views,
        'likes' => $faker->numberBetween(0,$views),
        'published_status' => $faker->randomElement(config('config.models.published_status')),
        'user_id' => $faker->numberBetween(1,3),
    ];
});
