<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Product::class, function (Faker $faker) {
    return [
        'internal_code'=>$faker->randomNumber(5),
        'name'=>$faker->unique()->name,
        'price_cost'=>$faker->randomNumber(5),
        'price_sale'=>$faker->randomNumber(5),
        'stock'=>$faker->randomNumber(2),
        'wholesalers_price'=>$faker->randomFloat(3),
        'taxes'=>$faker->randomFloat(3),
        'description'=>$faker->text,
    ];
});
