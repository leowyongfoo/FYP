<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryOrder;
use App\Models\Order;
use DB;

class MainPageController extends Controller
{
    public function index()
    {
        $pendingOrders = DeliveryOrder::where('statusID','pending')->orderBy('created_at', 'DESC')->get();
        $receivedOrders = Order::where('paymentStatus','successful')->orderBy('created_at', 'DESC')->get();
        
        return view('index')->with('pendingOrders', $pendingOrders)
                            ->with('receivedOrders', $receivedOrders);
                           
    }

    public function aboutus()
    {
       
        
        return view('aboutUs');
                           
    }


   
}
