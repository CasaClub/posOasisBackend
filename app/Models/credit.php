<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\credit_payment;
use App\Models\Client;

class credit extends Model
{
    public function credit_payments(){
        return $this->hasMany(credit_payment::class);
    } 

    public function client(){
        return $this->belongsTo(Client::class)->select('id','person_id');
    }
}
