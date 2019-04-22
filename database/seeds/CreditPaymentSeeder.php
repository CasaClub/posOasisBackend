<?php

use Illuminate\Database\Seeder;
use App\Models\credit_payment;
use App\Models\credit;
use App\Models\Ticket;

class CreditPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(credit_payment::class,5)->create([
            'credit_id'=>credit::all()->random()->id,
            'ticket_id'=>Ticket::all()->random()->id
        ]);
    }
}
