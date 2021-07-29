<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded= [];


    public function status()
    {
        return $this->belongsTo(Status::class, 'statusID');
    }

    public function inventory()
    {
        return $this->hasMany(Inventory::class);
    }
}
