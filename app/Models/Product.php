<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'internal_code',
        
    ];


    const active = 1;
    const inactive = 0;

    public function ticket_detail(){
        return $this->hasMany(ticket_details::class);
    }
}
