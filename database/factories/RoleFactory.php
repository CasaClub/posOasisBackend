<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Role::class, function (Faker $faker) {
    return [
<<<<<<< HEAD
        //
=======
        'name'=>$faker->word,
        'description'=>$faker->sentence()
>>>>>>> 2be0a8ea9313bb4c348d1398420c00ef36ae7315
    ];
});
