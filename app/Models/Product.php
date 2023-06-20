<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $fillable = [
        'name',
        'item_id',
        'category_id',
        'name',
        'quantity',
        'price',
        'image',
        'status'
    ];

    public function item(){
   	return $this->belongsTo(Item::class,'item_id','id');
   }

   public function category(){
   	return $this->belongsTo(category::class,'category_id','id');
   }



}
