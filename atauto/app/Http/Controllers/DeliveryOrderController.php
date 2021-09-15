<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\DeliveryOrder;
use App\Models\Itemlist;
use App\Models\Supplier;
use App\Models\Inventory;
use App\Models\Status;
Use Session;

class DeliveryOrderController extends Controller
{
    public function index()
    {
        $deliveryOrders = DeliveryOrder::orderBy('created_at', 'DESC')->paginate(5);
        $items = Itemlist::leftjoin('delivery_orders','delivery_orders.id', '=','itemlists.deliveryOrderID')
                           ->select('delivery_orders.*','itemlists.*')
                           ->where('itemlists.statusID','Restocked')
                           ->get();
        foreach($items as $item){
            $restockOrders=DeliveryOrder::where('id', $item->deliveryOrderID)->first();
            $restockOrders->statusID ='fully restock';
            $restockOrders->save();
        }
        return view('deliveryOrder.index')->with('deliveryOrders', $deliveryOrders);
    }

    public function create()
    {
        return view('deliveryOrder.create')->with('suppliers', Supplier::all())
                                            ->with('statuses', Status::all())
                                            ->with('inventories', Inventory::all());                          
    }

    public function store(){   
        $r=request(); 
        $addDO=DeliveryOrder::create([    
            'DO_No'=>$r->DO_No,  
            'supplierID'=>$r->supplier, 
            'statusID'=>'pending',
        ]);

        $deliveryOrderID = DB::table('delivery_orders')->orderBy('created_at', 'desc')->first();
        foreach($r->inventory as $item=>$v){
            $data2=array(
                'deliveryOrderid'=>$deliveryOrderID->id,
                'inventoryID'=>$r->inventory[$item],
                'orderQuantity'=>$r->quantity[$item],
                'statusID'=>'Restock',
            );
        Itemlist::insert($data2);
      }

        return redirect()->route('deliveryOrder.index');       
       
    }

    public function show($id)
    {
        $DOs=DeliveryOrder::all()->where('id',$id);
        $itemlists =Itemlist::all()->where('deliveryOrderID',$id);
        return view('deliveryOrder.show')->with('itemlists',$itemlists)
                                           ->with('DOs',$DOs);

    }

    public function deleteItem($id)
    {
        $items=Itemlist::find($id);
        $items->delete();
        return redirect()->route('deliveryOrder.index');

    }

    public function deleteOrder($id)
    {
        $data =DB::table('itemlists')
        ->leftJoin('delivery_orders','delivery_orders.id', '=','itemlists.deliveryOrderID')
        ->where('delivery_orders.id', $id); 
        DB::table('itemlists')->where('deliveryOrderID', $id)->delete();                           
        $data->delete();
        
        $orders=DeliveryOrder::find($id);
        $orders->delete();

        return redirect()->route('deliveryOrder.index');

    }

    public function edit($id){

        $deliveryOrders =DeliveryOrder::all()->where('id',$id);
        return view('deliveryOrder.edit')->with('deliveryOrders', DeliveryOrder::all()->where('id',$id))
                                        ->with('suppliers', Supplier::all());
    }
    
    public function update(DeliveryOrder $deliveryOrders)
    {
        $r=request();
        $deliveryOrders =DeliveryOrder::find($r->id);
        $deliveryOrders->DO_No=$r->DO_No; 
        $deliveryOrders->supplierID=$r->supplier;
        $deliveryOrders->save();

        return redirect("/deliveryOrder");
    }

    public function restock($id)
    {
        $orders=Itemlist::find($id);
        if($orders->statusID =='Restock'){
            $items = Inventory::where('id', $orders->inventoryID)->get();
            foreach($items as $item){
                if($item){
                    Inventory::where('id', $orders->inventoryID)->increment('quantity',$orders->orderQuantity);
                    $orders->statusID='Restocked';
                    $orders->save(); 
                    return redirect()->route('inventory.index');
                }
            }
        }else{
            Session::flash('fail',"Product already restock!");
            return redirect("/deliveryOrder.{$orders->deliveryOrderID}");
        }   
    }

}
