<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    const active = 1;
    const inactive = 0;
<<<<<<< HEAD
=======

    public function ticket_detail(){
        return $this->hasMany(ticket_details::class);
    }
>>>>>>> 2be0a8ea9313bb4c348d1398420c00ef36ae7315
}
