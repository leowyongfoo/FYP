<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class myCart extends Model
{
   
    protected $fillable=['orderID','userID','quantity','inventoryID'];

    
    public function inventory(){

        return $this->belongsTo('App\Inventory');

    }

    public function user(){

        return $this->belongsTo('App\User');

    }
}
