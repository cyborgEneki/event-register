<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    protected $with = ["roles"];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'role_user',
            'user_id', 'role_id');
    }

    public function activities()
    {
        return $this->belongsToMany(Activity::class, 'activity_user',
            'user_id', 'activity_id');
    }

    public function getIsAdminAttribute()
    {
        return $this->roles()->get()->where("name", "admin")->count() == 1;
    }


}
