<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::paginate(5);
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
            'address'=>$r->address,
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
        $suppliers->address=$r->address; 
        $suppliers->save();

        return redirect("/supplier/{$supplier->id}");
    }

    public function delete($id)
    {
        $suppliers=Supplier::find($id);
        $suppliers->delete();

        return redirect()->route('supplier.index');
    }

}
