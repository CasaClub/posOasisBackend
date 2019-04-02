<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD

class credit_payment extends Model
{
    //
=======
use App\Models\Ticket;

class credit_payment extends Model
{
    public function ticket(){
        return $this->belongsTo(Ticket::class)->select('id','client_id','user_id','payment_id');
    }

    public function credit(){
        return $this->belongsTo(credit::class)->select('id','client_id');
    }
>>>>>>> 2be0a8ea9313bb4c348d1398420c00ef36ae7315
}
