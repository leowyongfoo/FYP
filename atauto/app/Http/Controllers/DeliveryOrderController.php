<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryOrder;
use App\Models\Supplier;
use App\Models\Inventory;
use App\Models\Status;

class DeliveryOrderController extends Controller
{
    public function index()
    {
        $deliveryOrders = DeliveryOrder::all();
        return view('deliveryOrder.index')->with('deliveryOrders', $deliveryOrders);
    }

    public function create()
    {
        return view('deliveryOrder.create')->with('suppliers', Supplier::all())
                                            ->with('statuses', Status::all())
                                            ->with('deliveryOrders', DeliveryOrder::all());
                                      
    }

    public function store(){   
        $r=request(); 
        $addDO=DeliveryOrder::create([    
            'DO_No'=>$r->DO_No,  
            'supplierID'=>$r->supplier, 
            'statusID'=>$r->status,
            
            
        ]);
       
        return redirect()->route('deliveryOrder.index');       
       
    }

    public function productmenu()
    {
        return view('deliveryOrder.productmenu')->with('inventories', Inventory::all());
                                      
    }

    public function showDetail($id)
    {
        $inventories =Inventory::all()->where('id',$id);
        return view('deliveryOrder.showDetail')->with('inventories',$inventories);
                                      
    }

    public function add(){ 

        $r=request(); 
        $addDO=DeliveryOrder::create([    
                       
            'inventoryID'=>$r->id,
            'quantity'=>$r->quantity,                 
                        
        ]);     
        return redirect()->route('deliveryOrder.create');
    }

    


}
