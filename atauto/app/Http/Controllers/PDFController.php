<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Inventory;
use App\Models\DeliveryOrder;
use App\Models\Itemlist;
use App\Models\customer_itemlist;
use App\Models\CustomerOrder;
use App\Models\Quotation;
use App\Models\QuotationList;

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

    public function printQo($id)
    {
        $data = [
            'title' => 'Southern Cart',
            'date' => date('m/d/Y')
        ];
        $QODetails =Quotation::all()->where('id',$id);
        $itemDetails =QuotationList::all()->where('quotationID',$id);
        $pdf = PDF::loadView('quotation.report', compact('QODetails','itemDetails'));
    
        return $pdf->download('QOreport.pdf');
    }

    public function printCO($id)
    {
        $data = [
            'title' => 'Southern Cart',
            'date' => date('m/d/Y')
        ];
        $CODetails =CustomerOrder::all()->where('id',$id);
        $itemDetails =customer_itemlist::all()->where('customerOrderID',$id);
        $pdf = PDF::loadView('customerOrder.report', compact('CODetails','itemDetails'));
    
        return $pdf->download('COreport.pdf');
    }

}
