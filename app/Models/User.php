<?php

<<<<<<< HEAD
namespace App;
=======
namespace App\Models;
>>>>>>> 2be0a8ea9313bb4c348d1398420c00ef36ae7315

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Role;
use App\Models\cashReport;
use App\Models\Workshift;
use App\Models\Ticket;
>>>>>>> 2be0a8ea9313bb4c348d1398420c00ef36ae7315

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
<<<<<<< HEAD
        'name', 'email', 'password',
=======
        'name', 'email', 'password','person_id','role_id'
>>>>>>> 2be0a8ea9313bb4c348d1398420c00ef36ae7315
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
<<<<<<< HEAD
=======

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function cashReport(){
        return $this->hasOne(cashReport::class);
    }

    public function workshift(){
        return $this->hasMany(Workshift::class);
    }

    public function person(){
        return $this->belongsTo(Person::class);
    }

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
>>>>>>> 2be0a8ea9313bb4c348d1398420c00ef36ae7315
}
