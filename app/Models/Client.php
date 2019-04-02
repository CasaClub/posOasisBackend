<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ticket;
use App\Models\Person;
use App\Models\credit;

class Client extends Model
{
    public function person(){
        return $this->belongsTo(Person::class);
    }
    
    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
    
    public function credit(){
        return $this->hasOne(credit::class);
    }
}
