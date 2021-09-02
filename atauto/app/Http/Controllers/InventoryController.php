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
        $inventories = Inventory::paginate(5); 
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

    public function edit($id){
       
        $inventories =Inventory::all()->where('id',$id);
        return view('inventory.edit')->with('inventories',$inventories)
                                     ->with('categories', Category::all())
                                     ->with('statuses', Status::all());
    }

    public function update(Inventory $inventory)
    {
        $r=request();
        $inventories =Inventory::find($r->ID);
        $inventories->productName=$r->name; 
        $inventories->description=$r->description; 
        $inventories->quantity=$r->quantity;
        $inventories->categoryID=$r->category; 
        $inventories->priceperunit=$r->priceperunit; 
        $inventories->retailPrice=$r->retailPrice; 
        $inventories->statusID=$r->status; 
        $inventories->save();

        return redirect("/inventory/{$inventory->id}");
    }
    
    public function delete($id)
    {
        $inventories=Inventory::find($id);
        $inventories->delete();

        return redirect()->route('inventory.index');
    }

    public function clientView()
    {
        $inventories = Inventory::all();
        return view('inventory.clientView')->with('inventories',$inventories);
    }

    public function viewDetail($id)
    {
        $inventories =Inventory::all()->where('id',$id);
        return view('inventory.productDetail')->with('inventories',$inventories);
    }



}
