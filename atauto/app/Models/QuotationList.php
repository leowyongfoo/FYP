<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationList extends Model
{
    use HasFactory;
    protected $fillable=['quotationID','inventoryID','quantity','agreedPriceperunit'];

    public function inventory(){

        return $this->belongsTo(Inventory::class, 'inventoryID');

    }

    public function Quotation(){
        return $this->belongsTo(Quotation::class, 'quotationID');
    }
}
