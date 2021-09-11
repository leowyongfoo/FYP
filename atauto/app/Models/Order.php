<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['userID','paymentStatus','amount'];

    public function car(){

        return $this->hasMany('App\Car');

    }

    public function user(){

        return $this->belongsTo(User::class,'userID');

    }
}
