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
        // factory(Ticket::class,3)->create(); // sin el id del cliente debido que esta en credits

        factory(Ticket::class,1)->create(['client_id'=>3]); // aca creariamos 
        factory(Ticket::class,1)->create(['client_id'=>5]); // aca creariamos 
    }
}
