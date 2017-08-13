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
        'avatarUrl' => $faker->imageUrl('48','48'),
        'password' => $password ?: $password = bcrypt('sifra'),
        'activated' => 1,
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Pitaj\Models\Question::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->realText(50),
        'slug' => $faker->slug(),
        'body' => $faker->realText(),
        'views' => $faker->numberBetween(342, 99999),
        'author_id' => function () {
            return factory(Pitaj\Models\User::class)->create()->id;
        }
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Pitaj\Models\Tag::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Pitaj\Models\Answer::class, function (Faker\Generator $faker) {
    return [
        'body' => $faker->realText(),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Pitaj\Models\Vote::class, function (Faker\Generator $faker) {
    return [
        'vote_value' => $faker->randomElement([1, -1])
    ];
});

