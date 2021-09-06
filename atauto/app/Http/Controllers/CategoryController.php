<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Status;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::paginate(5); 
        return view('category.index')->with('categories', $categories);
    }

    public function create()
    {
        return view('category.create')->with('statuses', Status::all());
    }

    public function store()
    {
        $r=request(); 
        $addCategory=Category::create([
            'name'=>$r->name,
            'statusID'=>'active',
        ]);

        return redirect()->route('category.index');
    }

    public function delete($id)
    {
        $categories=Category::find($id);
        $categories->delete();

        return redirect()->route('category.index');
    }

    public function changeStatus($id)
    {
        $categories=Category::find($id);

        if($categories->statusID=='active'){
            $categories->statusID='inactive'; 
            $categories->save();
        }else{
            $categories->statusID='active';  
            $categories->save();
        }
        

        return redirect()->route('category.index');
    }
}
