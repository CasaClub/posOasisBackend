<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cashReport extends Model
{
    protected $fillable = [
        'user_id',
        'start_report',
        'end_report',
        'effective',
        'dataphone'
    ];

    public function user(){
        return $this->belongsTo(User::class)->select('id','role_id','name','email');
    }
}
