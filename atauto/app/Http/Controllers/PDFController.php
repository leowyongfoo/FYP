<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Inventory;

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

}
