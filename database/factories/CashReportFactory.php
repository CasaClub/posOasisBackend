<?php

use Faker\Generator as Faker;
use App\Models\User;
$factory->define(App\Models\cashReport::class, function (Faker $faker) {
    return [
        'user_id'=>User::all()->where('role_id',2)->random()->id,
        'start_report'=>$faker->dateTime,
        'end_report'=>$faker->dateTime,
        'effective'=>$faker->randomFloat(2,3),
        'dataphone'=>$faker->randomFloat(2,2),
    ];
});
