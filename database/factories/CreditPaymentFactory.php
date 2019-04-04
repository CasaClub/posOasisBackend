<?php

use Faker\Generator as Faker;

$factory->define(App\Models\credit_payment::class, function (Faker $faker) {
    return [
        'credit_id'=>null,
        'ticket_id'=>null,
        'amount'=>$faker->randomFloat(3),
        'balance'=>$faker->randomFloat(3)
    ];
});
