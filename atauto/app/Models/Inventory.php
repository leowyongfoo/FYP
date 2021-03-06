<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $guarded = [];

    public function DeliveryOrder()
    {
        return $this->hasMany(DeliveryOrder::class);
    }

    public function itemlist()
    {
        return $this->hasMany(Itemlist::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class ,'categoryID');
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
