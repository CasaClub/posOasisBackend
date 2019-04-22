<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\Role;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/


$factory->define(App\Models\User::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'surnames'=>$faker->lastName,
        'dni'=>$faker->randomNumber(),
        'telephone'=>$faker->randomNumber(8),
        'direction'=>$faker->address,
        'email' => $faker->unique()->safeEmail,
        'role_id'=> $role = $faker->randomElement([2,3]),
        'password' => $role == Role::client ? null : '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'email_verified_at' => now(),
        'remember_token' => Str::random(10),
    ];
    
});
