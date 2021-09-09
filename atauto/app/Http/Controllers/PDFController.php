<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Inventory;
use App\Models\DeliveryOrder;
use App\Models\Itemlist;

class PDFController extends Controller
{
    public function print()
    {
        $data = [
            'title' => 'Southern Cart',
            'date' => date('m/d/Y')
        ];
        $inventories = Inventory::paginate(5);
        $pdf = PDF::loadView('inventory.report', compact('inventories'));
    
        return $pdf->download('report.pdf');
    }

    public function printDO($id)
    {
        $data = [
            'title' => 'Southern Cart',
            'date' => date('m/d/Y')
        ];
        $DODetails =DeliveryOrder::all()->where('id',$id);
        $itemDetails =Itemlist::all()->where('deliveryOrderID',$id);
        $pdf = PDF::loadView('deliveryOrder.report', compact('DODetails','itemDetails'));
    
        return $pdf->download('DOreport.pdf');
    }

}
