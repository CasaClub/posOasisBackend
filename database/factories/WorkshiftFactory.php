<?php

use Faker\Generator as Faker;
use App\Models\User;


$factory->define(App\Models\Workshift::class, function (Faker $faker) {
    $total = $faker->randomFloat(2,3);
    $totalTaxes = $faker->randomFloat(2,2);
    
    return [
        'user_id'=>User::all()->random()->id,
        'start_workshifts'=>$faker->dateTime,
        'total'=>$total,
        'total_taxes'=>$totalTaxes,
        'total_earnings'=>($total-$totalTaxes),
        'status'=>$faker->randomElement([1,2]),
    ];
});
