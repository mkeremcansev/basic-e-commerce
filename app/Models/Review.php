<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'review';
    protected $fillable = [
        'title',
        'description',
        'product',
        'rating',
        'user',
    ];
    function getUser()
    {
        return $this->hasOne('App\Models\User', 'id', 'user');
    }
    function getProduct()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product');
    }
}
