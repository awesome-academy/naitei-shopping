<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Order;
use App\Comment;
use App\Category;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'price', 'img', 'price', 'status',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_category');
    }

    public function orders(){
        return $this->belongsToMany(Order::class, 'order_details', 'order_id', 'product_id');
    }
    
    public function commentByUsers(){
        return $this->belongsToMany(User::class);
    }
}
