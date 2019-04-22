<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Payment;
use App\Models\Client;
use App\Models\credit_payment;
use App\Models\ticket_details;

class Ticket extends Model
{
    public function user(){
        return $this->belongsTo(User::class)->select('id','person_id','role_id');
    }
    public function payment(){
        return $this->belongsTo(Payment::class);
    }

    public function client(){
        return $this->belongsTo(Client::class)->select('id','person_id');
    }

    public function credit_payments(){
        return $this->hasOne(credit_payment::class);
    }

    public function product(){
        return $this->belongsToMany(Product::class);
    }
}
