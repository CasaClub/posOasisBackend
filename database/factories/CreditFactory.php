<?php

use Faker\Generator as Faker;

$factory->define(App\Models\credit::class, function (Faker $faker) {
    $floatNumber = $faker->randomFloat(3);
    return [
        'client_id'=>null,
        'max'=>$floatNumber,
        'balance'=>$floatNumber,
        'status'=>$faker->randomElement([0,1])
    ];
});
