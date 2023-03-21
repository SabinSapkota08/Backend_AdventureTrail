<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name',
        'quantity',
        'desc',
        'short_description',
        'image',
        'offer_to',
        'offer_from',
        'offer_price',
        'mrp',
        'category',
        
    ];
    
}
