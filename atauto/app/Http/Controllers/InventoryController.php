<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Category;
use App\Models\Status;

class InventoryController extends Controller
{
    public function index()
    {
        $inventories = Inventory::all();
        return view('inventory.index')->with('inventories', $inventories);
    }

    public function create()
    {
        return view('inventory.create')->with('categories', Category::all())
                                      ->with('statuses', Status::all());
                                      
    }

    public function store()
    {
        $r=request(); 
        $addinventory=Inventory::create([
            'productName'=>$r->name,
            'description'=>$r->description,
            'quantity'=>$r->quantity,
            'categoryID'=>$r->category,
            'PricePerUnit'=>$r->priceperunit,
            'retailPrice'=>$r->retailPrice,
            'statusID'=>$r->status,
        ]);

        return redirect()->route('inventory.index');
    }
    
    public function delete($id)
    {
        $inventories=Inventory::find($id);
        $inventories->delete();

        return redirect()->route('inventory.index');
    }

}
