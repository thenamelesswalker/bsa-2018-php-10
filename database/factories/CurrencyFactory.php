<?php

use Faker\Generator as Faker;

$factory->define(\App\Entity\Currency::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'rate' => $faker->randomNumber(5),
    ];
});
