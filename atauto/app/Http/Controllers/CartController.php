<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Inventory; 
use App\Models\MyCart;
use App\Models\Category;
Use Auth;
Use Session;

class CartController extends Controller
{
    
    public function add(){ 

        $r=request(); 
        $addproduct=myCart::create([  

            'quantity'=>$r->quantity,           
            'orderID'=>'',
            'inventoryID'=>$r->id,
            'inventoryStatus'=> 'active',            
            'userID'=>Auth::id(),             
        ]);
        
        return redirect()->route('inventory.clientViewAll');
    }

    public function customerAdd(){ 

        $r=request(); 
        $addproduct=myCart::create([  

            'quantity'=>$r->quantity,           
            'orderID'=>'',
            'inventoryID'=>$r->id,
            'inventoryStatus'=> 'active',            
            'userID'=>Auth::id(),    
                        
        ]);     
        
        return redirect()->route('customer.client.View');
    }

    public function viewMyCart(){

        $mycarts = DB::table('my_carts')
        ->leftjoin('inventories', 'inventories.id', '=', 'my_carts.inventoryID')
        ->select('my_carts.quantity as cartQty','my_carts.id as cid','inventories.*')
        ->where('my_carts.orderID','=','') 
        ->where('my_carts.userID','=',Auth::id())
        ->paginate(12);
        
        
        DB::table('my_carts')->where('inventoryStatus', 'inactive')->delete();                    
        
        return view('myCart.viewMyCart')->with('mycarts',$mycarts);
                                          
    }

    public function customerViewMyCart(){

        $mycarts = DB::table('my_carts')
        ->leftjoin('inventories', 'inventories.id', '=', 'my_carts.inventoryID')
        ->select('my_carts.quantity as cartQty','my_carts.id as cid','inventories.*')
        ->where('my_carts.orderID','=','') 
        ->where('my_carts.userID','=',Auth::id())
        ->paginate(12);
        
        $categories=Category::orderBy('name')->get();

        DB::table('my_carts')->where('inventoryStatus', 'inactive')->delete();

        return view('customerView.customerViewMyCart')->with('mycarts',$mycarts)
                                                        ->with('categories',$categories);
                                          
    }

    public function delete($id){
        $carts=MyCart::find($id);
        $carts->delete();
        return redirect()->route('view.mycart');
    }

    public function customerDelete($id){
        $carts=MyCart::find($id);
        $carts->delete();
        return redirect()->route('customer.view.mycart');
    }

}
