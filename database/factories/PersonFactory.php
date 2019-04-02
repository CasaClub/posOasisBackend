<?php
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(App\Models\Person::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'surnames'=>$faker->lastName,
        'dni'=>$faker->randomNumber(),
        'telephone'=>$faker->randomNumber(8),
        'direction'=>$faker->address
    ];
});
