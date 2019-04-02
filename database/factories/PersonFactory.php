<?php
<<<<<<< HEAD

=======
use Illuminate\Support\Str;
>>>>>>> 2be0a8ea9313bb4c348d1398420c00ef36ae7315
use Faker\Generator as Faker;

$factory->define(App\Models\Person::class, function (Faker $faker) {
    return [
<<<<<<< HEAD
        //
=======
        'name'=>$faker->name,
        'surnames'=>$faker->lastName,
        'dni'=>$faker->randomNumber(),
        'telephone'=>$faker->randomNumber(8),
        'direction'=>$faker->address
>>>>>>> 2be0a8ea9313bb4c348d1398420c00ef36ae7315
    ];
});
