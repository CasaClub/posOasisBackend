<?php

use Illuminate\Database\Seeder;
use App\Models\Person;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Person::class,10)->create()
        ->each(function(Person $per){
            factory(User::class)->create(['person_id'=>$per->id]);
        }); 
    }
}
