<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer_itemlist extends Model
{
    use HasFactory;
    protected $fillable=['customerOrderID','inventoryID','quantity'];

    public function inventory(){

        return $this->belongsTo(Inventory::class, 'inventoryID');

    }

    public function customerorder(){
        return $this->belongsTo(CustomerOrder::class, 'customerOrderID');
    }
}
