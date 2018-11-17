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

$factory->define(App\NewsList::class, function (Faker $faker) {
    return [
        'id_user'   =>  function () {
            return factory(App\User::class)->create()->id;
        },
        'title' => $faker->sentence(5),
        'description' => $faker->text(),
        'views' => $faker->numberBetween(1, 9999),
        'slug' => function (array $title) {
            return str_slug($title['title']);
        }
    ];
});
