<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->hasOne(Category::class ,'id');
    }

    public function status()
    {
        return $this->hasOne(Status::class ,'id');
    }
}
