<?php

use Faker\Generator as Faker;
use App\Models\User;
use App\Models\Payment;

$factory->define(App\Models\Ticket::class, function (Faker $faker) {
    $dniPhysical = 123456789;
    $nameCompany = "Oasis";
    $payment = Payment::all()->random()->id == 2 ? 2: null;
    $codeVoucher = $payment !=null ? $faker->randomLetter : null;
    $telephone = "2222-2222";

    return [
        'dni_physical'=>$dniPhysical,
        'name_company'=>$nameCompany,
        'client_id'=>null,
        'user_id'=>User::all()->where('role_id',2)->random()->id,
        'date_ticket'=>date('yyyy-mm-dd:hh:mm'),
        'payment_id'=>$payment,
        'code_voucher_dataphone'=>$codeVoucher,
        'telephone'=>$telephone,
        'description'=>$faker->text()
    ];
});
