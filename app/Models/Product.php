<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Contracts\Buyable;

class Product extends Model implements Buyable
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [
        'title',
        'description',
        'category',
        'price',
        'discount',
        'brand',
        'code',
        'best',
        'popular',
        'featured',
    ];

    function getCategory()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category');
    }
    function getBrand()
    {
        return $this->hasOne('App\Models\Brand', 'id', 'brand');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class, 'product', 'id')->where('status', 1); //Yorumlar tablosunda ürün id ye eşit olan yorumları getir
    }
    public function getBuyableIdentifier($options = null)
    {
        return $this->id;
    }
    public function getBuyableDescription($options = null)
    {
        return $this->title;
    }
    public function getBuyablePrice($options = null)
    {
        return $this->price;
    }
}
