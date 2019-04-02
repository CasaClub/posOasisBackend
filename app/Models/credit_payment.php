<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ticket;

class credit_payment extends Model
{
    public function ticket(){
        return $this->belongsTo(Ticket::class)->select('id','client_id','user_id','payment_id');
    }

    public function credit(){
        return $this->belongsTo(credit::class)->select('id','client_id');
    }
}
