<?php

$factory->define(App\Film::class, function (Faker\Generator $faker) {
    return [
        'active' => 1, //random_int(0, 1),
        'author' => random_int(1, 3),
        'title' => $faker->title(),
        'exceprt' => $faker->text(1000),
        'image' => 'http://localhost:8000/background.jpg',
        'video' => 'http://localhost:8000/background.jpg',
        'country' => 'США',
        'bloor' => 'HDRip',
        'translate' => 'Профессиональный (многоголосый)',
        'long' => $faker->time(),
        'year_date' => random_int(2000, 2017),
        'premier_date' => $faker->date(),
        'director' => $faker->name(),
        'roles' => $faker->name(),
        'views' => 0,
        'created_at' => $faker->date(),
        'updated_at' => $faker->date()
    ];
});

$factory->define(App\Genre::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name(),
        'created_at' => $faker->date(),
        'updated_at' => $faker->date()
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        'active' => 1, //random_int(0, 1),
        'user_id' => random_int(1, 3),
        'film_id' => 2,
        'text' => $faker->text(200),
        'created_at' => $faker->date(),
        'updated_at' => $faker->date()
    ];
});

$factory->define(App\Image::class, function (Faker\Generator $faker) {
    return [
        'url' => 'http://localhost:8000/background.jpg',
        'alt' => $faker->title(),
        'created_at' => $faker->date(),
        'updated_at' => $faker->date()
    ];
});

//$factory->define(App\Image::class, function (Faker\Generator $faker) {
//    return [
//        'image_id' => 1,
//        'imageble_id' => random_int(2,7),
//        'imageble_type' => 'App\Film',
//    ];
//});

$factory->define(App\Vote::class, function (Faker\Generator $faker) {
    return [
        'user_id' => random_int(1,3),
        'film_id' => random_int(1,20),
        'value' => random_int(1,5),
        'created_at' => $faker->date(),
        'updated_at' => $faker->date()
    ];
});
