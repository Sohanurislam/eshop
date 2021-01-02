<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = ['category_id', 'title', 'description', 'picture','price', 'is_active'];
    /**
     * @var mixed
     */
//    private $sizes;

    public function category() //inverse
    {
        return $this->belongsTo(Category::class);
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class);
    }
   public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    //1 to many polymorphic relation

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

}
