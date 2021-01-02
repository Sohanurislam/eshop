<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostOffice extends Model
{
    protected $fillable = ['post_office'];

    public function orders()
    {
        return $this->hasManyThrough(Order::class, User::class);
    }
}
