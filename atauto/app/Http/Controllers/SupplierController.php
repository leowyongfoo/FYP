<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('supplier.index')->with('suppliers', $suppliers);
    }

    public function create()
    {
        return view('supplier.create');
    }

    public function store()
    {
        $r=request(); 
        $addSupplier=Supplier::create([
            'name'=>$r->name,
            'contact'=>$r->contact,
            'email'=>$r->email,
        ]);

        return redirect()->route('supplier.index');
    }

    public function edit($id){
       
        $suppliers =Supplier::all()->where('id',$id);
        return view('supplier.edit')->with('suppliers',$suppliers);
    }

    public function update(Supplier $supplier)
    {
        $r=request();
        $suppliers =Supplier::find($r->ID);
        $suppliers->name=$r->name; 
        $suppliers->contact=$r->contact; 
        $suppliers->email=$r->email; 
        $suppliers->save();

        return redirect("/supplier/{$supplier->id}");
    }

   

}
