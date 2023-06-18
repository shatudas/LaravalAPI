<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;
use App\Models\category;


class category extends Model
{
    protected $fillable = [
        'name',
        'item_id',
        'status'
    ];

    public function item(){
   	return $this->belongsTo(Item::class,'item_id','id');
   }
}
