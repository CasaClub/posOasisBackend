<?php

use Illuminate\Database\Seeder;
use App\Models\Ticket;
use App\Models\Client;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Ticket::class,3)->create(); // sin el id del cliente debido que esta en credits

        factory(Ticket::class,2)->create(['client_id'=>Client::all()->random()->id]); // aca creariamos 
    }
}
