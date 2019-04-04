<?php

use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\Person;
class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Person::class,9)->create()
        ->each(function(Person $per){
            factory(Client::class)->create(['person_id'=>$per->id]);
        });
        
    }
}
