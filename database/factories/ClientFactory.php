<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Client::class, function (Faker $faker) {
    return [
        'person_id'=>null,
    ];
});

//person_id sera null porque luego relacionaremos un cliente con la perosna creada