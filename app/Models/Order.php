<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';

    public function getOrders()
    {
        return $this->hasMany(OrderItem::class, 'order', 'id'); //Yorumlar tablosunda ürün id ye eşit olan yorumları getir
    }
}
