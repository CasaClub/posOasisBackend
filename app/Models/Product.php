<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'internal_code',
        'price_cost',
        'price_sale',
        'stock',
        'taxes',
        'description',
        'status'
    ];
    
    const active = 1;
    const inactive = 0;

    public function ticket(){
        return $this->belongsToMany(Ticket::class)->select('id','client_id','user_id','payment_id');
    }
}
