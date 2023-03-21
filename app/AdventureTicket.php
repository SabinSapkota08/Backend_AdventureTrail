<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdventureTicket extends Model
{
    protected   $table = "adventure_tickets";

    protected $fillable = [
        'name',
        'quantity',
        'description',
        'image',
        'price',
        'category',
        'description_img'
        
    ];
   
}
