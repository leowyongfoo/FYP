<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    
    protected $guarded = [];

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
