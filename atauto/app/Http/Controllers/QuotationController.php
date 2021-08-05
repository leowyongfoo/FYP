<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Quotation;
use App\Models\Category;
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
        return view('quotation.create')->with('statuses', Status::all());
                                      
    }

    public function store()
    {
        $r=request(); 
        $addquotation=Quotation::create([
            'name'=>$r->name,
            'product'=>$r->product,
            'description'=>$r->description,
            'quantity'=>$r->quantity,
            'agreedPriceperunit'=>$r->agreedPriceperunit,
            'statusID'=>$r->status,
        ]);
       
        return redirect()->route('quotation.index');
    }

    public function edit($id){
       
        $quotations =Quotation::all()->where('id',$id);
        return view('quotation.edit')->with('quotations',$quotations)
                                     ->with('statuses', Status::all());
    }

    public function update(Quotation $quotation)
    {
        $r=request();
        $quotations =Quotation::find($r->ID);
        $quotations->name=$r->name; 
        $quotations->product=$r->product; 
        $quotations->description=$r->description; 
        $quotations->quantity=$r->quantity;
        $quotations->agreedPriceperunit=$r->agreedPriceperunit;
        $quotations->statusID=$r->status;
        $quotations->save();

        return redirect("/quotation/{$quotation->id}");
    }

    public function delete($id)
    {
        $quotations=Quotation::find($id);
        $quotations->delete();

        return redirect()->route('quotation.index');
    }

}
