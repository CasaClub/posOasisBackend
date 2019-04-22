<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Role;
use App\Models\cashReport;
use App\Models\Workshift;
use App\Models\Ticket;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','surnames','dni','telephone','direction','email','role_id','password',
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

    public function setPasswordAttribute($password) // this must use the cnvention of laravel identify the field password
    {
        if($password !=null)
        {
            $this->attributes['password'] = bcrypt($password);
        }
    }
    
    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function cash_report(){
        return $this->hasOne(cashReport::class);
    }

    public function workshift(){
        return $this->hasMany(Workshift::class);
    }
    
    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
    public function client(){
        return $this->hasOne(Client::class);
    }
}
