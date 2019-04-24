<?php

use Faker\Generator as Faker;
use App\Models\User;
use App\Models\Payment;

$factory->define(App\Models\Ticket::class, function (Faker $faker) {
    $dniPhysical = 123456789;
    $nameCompany = "Oasis";
    $optionPay = Payment::all()->random()->id; // sacamos el id del pago
    $payment =  $optionPay == 2 ? 2: $optionPay; // validamo que si es 2 lo deje o sino que asigne el que viene de la consulta
    $codeVoucher = $payment == 2 ? $faker->randomNumber(4) : null; // y si fue pago con tarjeta que agregue un codigo random al codigo del vaucher
    $telephone = "2222-2222";
    
    return [
        'dni_physical'=>$dniPhysical,
        'name_company'=>$nameCompany,
        'client_id'=>null,
        'user_id'=>User::all()->where('role_id',2)->random()->id,
        'date_ticket'=>date('Y-m-d H:i:s'),
        'payment_id'=>$payment,
        'code_voucher_dataphone'=>$codeVoucher,
        'telephone'=>$telephone,
        'description'=>$faker->text()
    ];
});
