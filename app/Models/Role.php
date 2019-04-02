<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
=======
use App\Models\User;
>>>>>>> 2be0a8ea9313bb4c348d1398420c00ef36ae7315

class Role extends Model
{
    const admin = 1;
<<<<<<< HEAD
    const cashier =2; 
=======
    const cashier = 2; 

    public function user(){
        return $this->hasMany(User::class);
    }
>>>>>>> 2be0a8ea9313bb4c348d1398420c00ef36ae7315
}
