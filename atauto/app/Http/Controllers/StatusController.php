<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Status;

class StatusController extends Controller
{
    public function create(){
        return view('insertStatus');
    }

    public function store(){    
        $r=request(); 
        $addStatus=Status::create([   
            'name'=>$r->name,
        ]);
        
        return redirect()->route('viewStatus');
    }

    public function show(){
        $statuses=Status::all();
        return view('viewStatus')->with('statuses',$statuses);
    }

    public function delete($id){
        $statuses=Status::find($id);
        $statuses->delete();
        return redirect()->route('viewStatus');
    }
}
