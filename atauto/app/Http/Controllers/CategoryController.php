<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Status;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create(){
        return view('insertCategory') ->with('statuses',Status::all());
    }

    public function store(){    
        $r=request(); 
        $addCategory=Category::create([   
            'name'=>$r->name,
            'statusID'=>$r->status,
        ]);
        
        return redirect()->route('viewCategory');
    }

    public function show(){
        //$products=Product::paginate(4);
        $categories=Category::all();
        return view('viewCategory')->with('categories',$categories);
        
    }
}
