<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return  [
        'user_id' => 1,
        'value_total' => rand(300, 15000),
        'number' => rand(300, 15000),
        'description' => $faker->text,
    ];
});
