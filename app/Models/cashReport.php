<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cashReport extends Model
{
    public function user(){
        return $this->belongsTo(User::class)->select('id','person_id','role_id','name','email');
    }
}
