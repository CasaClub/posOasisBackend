<?php

use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\Person;
use App\Models\User;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Person::class,1)->create([
            'name'=>"Logan",
            'surnames'=>'Ramirez',
            'dni'=>'117260018',
            'telephone'=>'89966245',
            'direction'=>'La granja'
        ]);

        factory(Person::class,9)->create()
        ->each(function(Person $per){
            factory(Client::class)->create(['person_id'=>$per->id]);
        });

        // factory(Person::class,4)->create()
        // ->each(function(Person $per){
        //     factory(User::class)->create(['person_id'=>$per->id]);
        // });
    }
}