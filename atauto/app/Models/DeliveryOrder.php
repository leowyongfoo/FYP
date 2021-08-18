<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryOrder extends Model
{
    use HasFactory;
    protected $fillable=['DO_No','supplierID','statusID'];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplierID');
    }

    public function inventory()
    {
        return $this->belongsTo('App\Inventory');
    }

    public function itemlist()
    {
        return $this->hasMany(Itemlist::class);

    }

}
