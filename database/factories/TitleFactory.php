<?php

use Faker\Generator as Faker;

$factory->define(App\Title::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
    ];
});
