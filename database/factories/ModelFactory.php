<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Pitaj\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'avatar' => $faker->imageUrl('48','48'),
        'password' => $password ?: $password = bcrypt('sifra'),
        'activated' => 1,
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Pitaj\Models\Question::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->name,
        'slug' => $faker->unique()->safeEmail,
        'body' => $faker->imageUrl('48','48'),
        'author_id' => function () {
            return factory(Pitaj\Models\User::class)->create();
        },
        'views' => $faker->numberBetween(342, 999999),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Pitaj\Models\Tag::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});

