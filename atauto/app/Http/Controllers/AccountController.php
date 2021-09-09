<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;

class AccountController extends Controller
{
    public function index()
    {
        $customers = User::all()->where('role','customer');
        return view('user.index')->with('customers', $customers);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store()
    {
        $r=request(); 
        $addCustomer=User::create([
            'username'=>$r->username,
            'email'=>$r->email,
            'password'=>$r->password,
        ]);

        return redirect()->route('user.index');
    }

    public function edit($id){
       
        $customers =User::all()->where('id',$id);
        return view('user.edit')->with('customers',$customers);
    }

    public function update(User $customer)
    {
        $r=request();
        $customers =User::find($r->ID);
        $customers->username=$r->username; 
        $customers->email=$r->email; 
        $customers->password=$r->password; 
        $customers->save();

        return redirect("/user/{$customer->id}");
    }

    public function delete($id)
    {
        $customers=User::find($id);
        $customers->delete();

        return redirect()->route('user.index');
    }
}
