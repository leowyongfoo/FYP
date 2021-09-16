<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\CustomerOrder;
use App\Models\customer_itemlist;
use App\Models\Customer;
use App\Models\Inventory;
Use Session;

class CustomerOrderController extends Controller
{
    public function index()
    {
        $customerOrders = CustomerOrder::orderBy('created_at', 'DESC')->paginate(5); 
        $items = customer_itemlist::leftjoin('customer_orders','customer_orders.id', '=','customer_itemlists.customerOrderID')
                           ->select('customer_orders.*','customer_itemlists.*')
                           ->where('customer_itemlists.statusID','Confirmed')
                           ->get();
        foreach($items as $item){
            $confirmOrders=CustomerOrder::where('id', $item->customerOrderID)->first();
            $confirmOrders->statusID ='Closed';
            $confirmOrders->save();
        }              
        return view('customerOrder.index')->with('customerOrders', $customerOrders);                           
    }

    public function create()
    {
        return view('customerOrder.create')->with('customers', Customer::all())
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
                'quantity'=>$r->quantity[$item],
                'statusID'=>'Confirm',
            );
        customer_itemlist::insert($data2);
      }
        return redirect()->route('customerOrder.index');       
       
    }

    public function show($id)
    {
        $COs=CustomerOrder::all()->where('id',$id);
        $customer_itemlists =customer_itemlist::all()->where('customerOrderID',$id);
        return view('customerOrder.show')->with('customer_itemlists',$customer_itemlists)
                                            ->with('COs',$COs);
 
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
        return view('customerOrder.edit')->with('customerOrders', CustomerOrder::all()->where('id',$id))
                                        ->with('items',customer_itemlist::all())
                                        ->with('customers', Customer::all());
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

    public function confirmOrder($id)
    {
        $customerOrders=customer_itemlist::find($id);
        if($customerOrders->statusID =='Confirm'){
        $items = Inventory::where('id', $customerOrders->inventoryID)->get();
        foreach($items as $item){
          if($item){
            Inventory::where('id', $customerOrders->inventoryID)->decrement('quantity',$customerOrders->quantity);
            $customerOrders->statusID='Confirmed';
            $customerOrders->save(); 
            return redirect()->route('customerOrder.index');
          }
        }
        }else{
            Session::flash('fail',"Product already Confirmed!");
            return redirect("/customerOrder.{$customerOrders->customerOrderID}");
        }   
    }
}
