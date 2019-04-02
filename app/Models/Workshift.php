<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD

class Workshift extends Model
{
    //
=======
use App\Models\User;

class Workshift extends Model
{
    public function user(){
        return $this->belongsTo(User::class)->select('id','person_id','role_id','name','email');
    }
>>>>>>> 2be0a8ea9313bb4c348d1398420c00ef36ae7315
}
