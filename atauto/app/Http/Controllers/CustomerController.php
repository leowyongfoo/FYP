<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::paginate(5);
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
            'address'=>$r->address,
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
        $customers->address=$r->address; 
        $customers->save();

        return redirect("/customer/{$customer->id}");
    }

    public function delete($id)
    {
        $customers=Customer::find($id);
        $customers->delete();

        return redirect()->route('customer.index');
    }

}
