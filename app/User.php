<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Cache;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','post_office_id','dateofbirth','number','active_role_id',
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

    //database relationship

    public function profile()
    {
        return $this->hasOne(Profile::class);

    }
    public function postOffice()
    {
        return $this->belongsTo(PostOffice::class);

    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function activeRole()
    {
        return $this->belongsTo(Role::class,'active_role_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function permissions()
    {
        if ($this->activeRole)
        {
            return $this->activeRole->permissions->pluck('id')->toArray();
        }

        return [];
    }

    public function isOnline()
    {

        return Cache::has('user-is-online-'.$this->id);
    }

}
