<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Tag::class, function (Faker $faker) {
    $images = ['about-bg.jpg', 'contact-bg.jpg', 'home-bg.jpg', 'post-bg.jpg'];
    $word = $faker->word;
    return [
        'tag' => $word,
        'title' => ucfirst($word),
        'subtitle' => $faker->sentence,
        'page_image' => $images[mt_rand(0, 3)],
        'meta_description' => "Meta for $word",
        'reverse_direction' => false,
    ];
});
