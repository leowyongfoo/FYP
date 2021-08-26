<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Inventory; 
use App\Models\MyCart;
Use Auth;

class CartController extends Controller
{
    
    public function add(){ 

        $r=request(); 
        $addproduct=myCart::create([  

            'quantity'=>$r->quantity,           
            'orderID'=>'',
            'inventoryID'=>$r->id,               
            'userID'=>Auth::id(), 
                        
        ]);     
        return redirect()->route('view.mycart');
    }

    public function viewMyCart(){
        $mycarts = DB::table('my_carts')
        ->leftjoin('inventories', 'inventories.id', '=', 'my_carts.inventoryID')
        ->select('my_carts.quantity as cartQty','my_carts.id as cid','inventories.*')
        ->where('my_carts.orderID','=','') //'' haven't make payment
        ->where('my_carts.userID','=',Auth::id())
        ->paginate(12);
        return view('myCart.viewMyCart')->with('mycarts',$mycarts);
    }

    public function delete($id){
        $carts=MyCart::find($id);
        $carts->delete();
        return redirect()->route('view.mycart');
    }

}
