<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;
<<<<<<< HEAD

=======
use App\Models\Role;
>>>>>>> 2be0a8ea9313bb4c348d1398420c00ef36ae7315
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

<<<<<<< HEAD
$factory->define(App\User::class, function (Faker $faker) {
    return [
=======
$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'person_id'=>null,
        'role_id'=>Role::all()->random()->id,
>>>>>>> 2be0a8ea9313bb4c348d1398420c00ef36ae7315
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => Str::random(10),
    ];
});
