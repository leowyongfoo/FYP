<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\CustomerOrder;
use App\Models\customer_itemlist;
use App\Models\Customer;
use App\Models\Inventory;
use App\Models\Status;

class CustomerOrderController extends Controller
{
    public function index()
    {
        $customerOrders = CustomerOrder::all();
        return view('customerOrder.index')->with('customerOrders', $customerOrders);                                          
    }

    public function create()
    {
        return view('customerOrder.create')->with('customers', Customer::all())
                                            ->with('statuses', Status::all())
                                            ->with('inventories', Inventory::all());                                 
    }

    public function store(){   
        $r=request(); 
        $addCO=CustomerOrder::create([    
            'CO_No'=>$r->CO_No,  
            'customerID'=>$r->customer, 
            'statusID'=>'pending',         
        ]);

        $customerOrderID = DB::table('customer_orders')->orderBy('created_at', 'desc')->first();
        foreach($r->inventory as $item=>$v){
            $data2=array(
                'customerOrderid'=>$customerOrderID->id,
                'inventoryID'=>$r->inventory[$item],
                'quantity'=>$r->quantity[$item]
            );
        customer_itemlist::insert($data2);
      }
        return redirect()->route('customerOrder.index');       
       
    }

    public function show($id)
    {
        $customer_itemlists =customer_itemlist::all()->where('customerOrderID',$id);
        return view('customerOrder.show')->with('customer_itemlists',$customer_itemlists);
 
    }

    public function deleteItem($id)
    {
        $items=customer_itemlist::find($id);
        $items->delete();
        return redirect()->route('customerOrder.index');

    }

    public function deleteOrder($id)
    {
        $orders=CustomerOrder::find($id);
        $orders->delete();
        return redirect()->route('customerOrder.index');

    }

    public function productmenu()
    {
        return view('customerOrder.productmenu')->with('inventories', Inventory::all());
                                      
    }

    public function showDetail($id)
    {
        $inventories =Inventory::all()->where('id',$id);
        return view('customerOrder.showDetail')->with('inventories',$inventories);
                                      
    }

    public function edit($id){

        $customerOrders =CustomerOrder::all()->where('id',$id);
        return view('customerOrder.edit')->with('customerOrders', CustomerOrder::all())
                                        ->with('items',customer_itemlist::all())
                                        ->with('inventories',Inventory::all())
                                        ->with('customers', Customer::all())
                                        ->with('statuses', Status::all());
    }
    
    public function update(CustomerOrder $customerOrders)
    {
        $r=request();
        $customerOrders =CustomerOrder::find($r->id);
        $customerOrders->CO_No=$r->CO_No; 
        $customerOrders->customerID=$r->customer;
        $customerOrders->save();

        return redirect("/customerOrder");
    }
}
