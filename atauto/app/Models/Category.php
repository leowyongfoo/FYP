<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded= [];


    public function status()
    {
        return $this->hasOne(Status::class , 'id');
    }

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }
}
