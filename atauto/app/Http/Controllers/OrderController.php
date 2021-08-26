<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Inventory; 
use App\Models\MyCart;
use App\Models\Order;
Use Auth;

class OrderController extends Controller
{
    public function add(){ 

        $r=request(); 
        $addOrder=Order::create([    
            
            'amount'=>$r->amount,             
            'paymentStatus'=>'pending',                 
            'userID'=>Auth::id(),                          
        ]); 
        
        $orderID=DB::table('orders')->where('userID','=',Auth::id())->orderBy('created_at', 'desc')->first();       
        
        $items=$r->input('item');
        foreach($items as $item => $value){
            $mycars =MyCart::find($value);
            $mycars->orderID = $orderID->id;
            $mycars->save();
        }
        
       
        return redirect()->route('order.viewOrder'); 
        
    }

    public function viewMyOrder(){

        $myorders=DB::table('orders')
        ->leftjoin('my_carts', 'orders.id', '=', 'my_carts.orderID')
        ->leftjoin('inventories', 'inventories.id', '=', 'my_carts.inventoryID')
        ->select('my_carts.*','orders.*','inventories.*','my_carts.quantity as cartQty')
        ->where('orders.userID','=',Auth::id())
        ->get();
        //->paginate(3);       
        return view('order.viewOrder')->with('myorders',$myorders);
    }

}
