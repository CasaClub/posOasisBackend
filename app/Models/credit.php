<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD

class credit extends Model
{
    //
=======
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
>>>>>>> 2be0a8ea9313bb4c348d1398420c00ef36ae7315
}
