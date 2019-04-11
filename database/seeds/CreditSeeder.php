<?php

use Illuminate\Database\Seeder;
use App\Models\credit;
use App\Models\Client;
use App\Models\Person;

class CreditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Client::class,5)->create(['person_id'=>Person::all()->random()->id])
        ->each(function(Client $client){
            factory(credit::class,5)->create(['client_id'=>$client->id]);
        });
    }
}
