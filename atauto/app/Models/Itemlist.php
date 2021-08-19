<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itemlist extends Model
{
    use HasFactory;
    protected $fillable=['deliveryOrderID','inventoryID','quantity'];

    public function inventory(){

        return $this->belongsTo(Inventory::class, 'inventoryID');

    }

    public function deliveryorder(){
        return $this->belongsTo(DeliveryOrder::class, 'deliveryOrderID');
    }
}
