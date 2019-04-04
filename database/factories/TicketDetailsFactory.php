<?php

use Faker\Generator as Faker;

$factory->define(App\Models\ticket_details::class, function (Faker $faker) {
    return [
        'ticket_id'=>null,
        'product_id'=>null,
        'quantity'=>$faker->random_int(1,99),
        'amount'=>$faker->randomFloat(2),
        'discount'=>$faker->randomFloat(2),
        'total_taxes'=>$faker->randomFloat(1),
        'Subtotal'=>$faker->randomFloat(2),
        'total'=>$faker->randomFloat(3)
    ];
});
