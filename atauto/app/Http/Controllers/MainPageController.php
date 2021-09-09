<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryOrder;

class MainPageController extends Controller
{
    public function index()
    {
        $pendingOrders = DeliveryOrder::all()->where('statusID','pending');
        return view('index')->with('pendingOrders', $pendingOrders);
    }
}
