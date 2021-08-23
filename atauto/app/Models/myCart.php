<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class myCart extends Model
{
    use HasFactory;
    protected $fillable=['orderID','userID','quantity','inventoryID'];

    
    public function inventory(){

        return $this->belongsTo(Inventory::class, 'inventoryID');

    }

    public function user(){

        return $this->belongsTo('App\User');

    }
}
