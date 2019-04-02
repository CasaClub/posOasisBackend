<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD

class Payment extends Model
{
    //
=======
use App\Models\Ticket;

class Payment extends Model
{
    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
>>>>>>> 2be0a8ea9313bb4c348d1398420c00ef36ae7315
}
