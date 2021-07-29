<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customer.index')->with('customers', $customers);
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store()
    {
        $r=request(); 
        $addCustomer=Customer::create([
            'name'=>$r->name,
            'contact'=>$r->contact,
            'email'=>$r->email,
        ]);

        return redirect()->route('customer.index');
    }

    public function edit($id){
       
        $customers =Customer::all()->where('id',$id);
        return view('customer.edit')->with('customers',$customers);
    }

    public function update(Customer $customer)
    {
        $r=request();
        $customers =Customer::find($r->ID);
        $customers->name=$r->name; 
        $customers->contact=$r->contact; 
        $customers->email=$r->email; 
        $customers->save();

        return redirect("/customer/{$customer->id}");
    }

}
