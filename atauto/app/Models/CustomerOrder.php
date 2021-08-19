<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerOrder extends Model
{
    use HasFactory;
    protected $fillable=['CO_No','customerID','statusID'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customerID');
    }

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }

    public function itemlist()
    {
        return $this->hasMany(Itemlist::class);

    }

}
