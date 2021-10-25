<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    use HasFactory;
    protected $table = 'general';
    protected $fillable = [
        'title',
        'description',
        'footer',
        'keywords',
        'adress',
        'map',
        'facebook',
        'instagram',
        'twitter',
        'mail',
        'whatsapp',
        'phone',
    ];
    public $timestamps = false;
}
