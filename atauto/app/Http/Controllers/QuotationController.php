<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Quotation;
use App\Models\QuotationList;
use App\Models\Inventory;
use App\Models\Status;

class QuotationController extends Controller
{
    public function index()
    {
        $quotations = Quotation::paginate(5);
        return view('quotation.index')->with('quotations', $quotations);
    }

    public function create()
    {
        return view('quotation.create')->with('statuses', Status::all())
                                        ->with('inventories', Inventory::all()); 
                                      
    }

    public function store()
    {
        $r=request(); 
        $addquotation=Quotation::create([
            'name'=>$r->name,
            'statusID'=>'Confirmed',
        ]);

        $quotationID = DB::table('quotations')->orderBy('created_at', 'desc')->first();
        foreach($r->inventory as $item=>$v){
            $data2=array(
                'quotationID'=>$quotationID->id,
                'inventoryID'=>$r->inventory[$item],
                'quantity'=>$r->quantity[$item],
                'agreedPriceperunit'=>$r->agreedPriceperunit[$item]
            );
        QuotationList::insert($data2);
        }
        return redirect()->route('quotation.index');
    }

    public function edit($id){
       
        $quotations =Quotation::all()->where('id',$id);
        return view('quotation.edit')->with('quotations',$quotations)
                                     ->with('statuses', Status::all());
    }

    public function show($id)
    {
        $quotation_lists =QuotationList::all()->where('quotationID',$id);
        return view('quotation.show')->with('quotation_lists',$quotation_lists);

    }

    public function update(Quotation $quotation)
    {
        $r=request();
        $quotations =Quotation::find($r->ID);
        $quotations->name=$r->name; 
        $quotations->statusID=$r->status;
        $quotations->save();

        return redirect("/quotation/{$quotation->id}");
    }

    public function delete($id)
    {
        $item=Quotation::find($id);
        $item->delete();

        return redirect()->route('quotation.index');
    }

    public function deleteItem($id)
    {
        $item=QuotationList::find($id);
        $item->delete();

        return redirect()->route('quotation.index');
    }


}
