<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cashReport extends Model
{
<<<<<<< HEAD
    //
=======
    public function user(){
        return $this->belongsTo(User::class)->select('id','person_id','role_id','name','email');
    }
>>>>>>> 2be0a8ea9313bb4c348d1398420c00ef36ae7315
}
