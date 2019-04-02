<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
<<<<<<< HEAD
    
=======
    public function user(){
        return $this->hasOne(User::class);
    }
    public function client(){
        return $this->hasOne(Client::class);
    }
>>>>>>> 2be0a8ea9313bb4c348d1398420c00ef36ae7315
}
