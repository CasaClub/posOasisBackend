<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Role extends Model
{
    const admin = 1;
    const cashier = 2; 
    const client = 3;

    public function user(){
        return $this->hasMany(User::class);
    }
}
