<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdventurePackage extends Model
{
//  protected   $table = "adventure_package";

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
