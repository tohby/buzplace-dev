<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Message::class, function (Faker $faker) {
    do {
        # code...
        $from = rand(1, 15);
        $to = rand(1, 15);
    } while ($from === $to);
    return [
        'from' => $from,
        'to' => $to,
        'text' => $faker->sentence,
    ];
});

$factory->define(App\Directory::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'description' => $faker->realText($maxNbChars = 2000, $indexSize = 2),
        'location' => $faker->state,
    ];
});

$factory->define(App\News::class, function (Faker $faker) {
    return [
        'Headline' => $faker->sentence,
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'content' => $faker->realText($maxNbChars = 2000, $indexSize = 2),
        'slug' => $faker->slug()
    ];
});

$factory->define(App\Products::class, function  (Faker $faker) {
    return [
        'user_id' => 1,
        'name' => $faker->name,
        'description' => $faker->sentence,
        'image' => $faker->imageUrl($width = 640, $height = 480)
    ];
});

$factory->define(App\Posts::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'image' => $faker->imageUrl($width = 400, $height = 400),
        'title' => $faker->sentence(7, 11),
        'content' => $faker->paragraphs(rand(3, 5), true),
        'slug' => $faker->slug()
    ];
});
