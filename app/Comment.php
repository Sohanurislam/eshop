<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['body', 'commentable_id', 'commentable_type', 'user_id'];


    public function commentedBy()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
