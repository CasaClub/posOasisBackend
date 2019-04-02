<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Client::class, function (Faker $faker) {
    return [
<<<<<<< HEAD
        //
    ];
});
=======
        'person_id'=>null,
    ];
});

//person_id sera null porque luego relacionaremos un cliente con la perosna creada
>>>>>>> 2be0a8ea9313bb4c348d1398420c00ef36ae7315
