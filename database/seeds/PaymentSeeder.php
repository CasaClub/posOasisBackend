<?php

use Illuminate\Database\Seeder;
use App\Models\Payment;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Payment::class,1)->create(['type'=>'Cheque']);
        factory(Payment::class,1)->create(['type'=>'Tarjeta']);
        factory(Payment::class,1)->create(['type'=>'Efectivo']);
        factory(Payment::class,1)->create(['type'=>'Transferencia']);
    }
}
