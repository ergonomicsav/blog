<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(2, true),
        'content' => $faker->text(1000),
        'category_id' => 5,
        'user_id' => 1,
        'status' => 1,
        'views' => $faker->numberBetween(0, 900),
        'is_featured' => 0,
//        'date' => $faker->time($format = 'H:i:s', $max = 'now'),
        'date' => '15/16/16',
//        'image' => 'photo1.png'
        'image' => $faker->image('public/uploads', 800, 600),
        'description' => $faker->text(250)
    ];
});
