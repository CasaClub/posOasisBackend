<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ticket;
use App\Models\User;
use App\Models\credit;

class Client extends Model
{
    protected $fillable = ['user_id'];

    public function user(){
        return $this->belongsTo(User::class)->select('id','name','surnames','dni','telephone','direction','email','role_id');
    }
    
    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
    
    public function credit(){
        return $this->hasOne(credit::class);
    }
}
