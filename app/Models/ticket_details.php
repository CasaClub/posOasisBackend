<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ticket;
use App\Models\Product;

class ticket_details extends Model
{
    public function ticket(){
        return $this->belongsTo(Ticket::class)->select('id','client_id','user_id','payment_id');
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
    
}
