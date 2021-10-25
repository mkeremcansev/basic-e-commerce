<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $table = 'orderitem';
    function getProductData()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product');
    }
}
