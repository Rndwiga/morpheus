<?php

namespace Tyondo\Email\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = ['id'];

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
        return $this->belongsTo('App\Role', 'role_id');
    }

    public function isRoot($roleId)
    {
        //foreach ($this->roles()->get() as $role)
        //{
        if ($roleId->slug == 'root')
        {
            return true;
        }
        //}

        return false;
    }
}
