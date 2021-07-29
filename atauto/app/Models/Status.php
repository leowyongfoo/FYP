<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    
    protected $guarded = [];

    public function inventory()
    {
        return $this->hasMany(Inventory::class);
    }

    public function category()
    {
        return $this->hasMany(Category::class);
    }

    public function quotation()
    {
        return $this->hasMany(Quotation::class);
    }
}
