<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Category;
use App\Models\Status;
Use Session;
use DB;

class InventoryController extends Controller
{
    public function index()
    {
        $inventories = Inventory::paginate(5);
        $product = Inventory::where('quantity', 0)->get();
        foreach($product as $item){
            $item->statusID='inactive';
            $item->save();
        }

        return view('inventory.index')->with('inventories', $inventories);  
    }

    public function search(){
        $r=request();//retrive submited form data
        $keyword=$r->searchProduct;
        $inventories =DB::table('inventories')
        ->leftjoin('categories', 'categories.id', '=', 'inventories.categoryID')
        ->select('categories.name as catname','categories.id as catid','inventories.*')
        ->where('inventories.productName', 'like', '%' . $keyword . '%')
        ->orWhere('categories.name', 'like', '%' . $keyword . '%')
        ->orderBy('productName')
        //->get();
        ->paginate(4);
        return view('customerView.customerClientView')->with('inventories',$inventories);

    }

    public function adminSearch(){
        $r=request();//retrive submited form data
        $keyword=$r->searchProduct;
        $inventories =DB::table('inventories')
        ->leftjoin('categories', 'categories.id', '=', 'inventories.categoryID')
        ->select('categories.name as catname','categories.id as catid','inventories.*')
        ->where('inventories.productName', 'like', '%' . $keyword . '%')
        ->orWhere('inventories.description', 'like', '%' . $keyword . '%')
        ->orderBy('productName')
        //->get();
        ->paginate(4);
        return view('inventory.clientView')->with('inventories',$inventories);

    }

    public function create()
    {
        return view('inventory.create')->with('categories', Category::all());                              
    }

    public function store()
    {
        $r=request(); 
        $image=$r->file('product-image');   
        $image->move('images',$image->getClientOriginalName());                
        $imageName=$image->getClientOriginalName(); 

        $addinventory=Inventory::create([
            'productName'=>$r->name,
            'description'=>$r->description,
            'quantity'=>$r->quantity,
            'categoryID'=>$r->category,
            'PricePerUnit'=>$r->priceperunit,
            'retailPrice'=>$r->retailPrice,
            'image'=>$imageName,
            'statusID'=>'active',
        ]);

        Session::flash('addSuccess',"Product add succesful!");
        return redirect()->route('inventory.index');
    }

    public function edit($id)
    {
        $inventories =Inventory::all()->where('id',$id);
        return view('inventory.edit')->with('inventories',$inventories)
                                     ->with('categories', Category::all());
    }

    public function update(Inventory $inventory)
    {
        $r=request();
        $inventories =Inventory::find($r->ID);
        if($r->file('product-image')!=''){
            $image=$r->file('product-image');        
            $image->move('images',$image->getClientOriginalName());                   
            $imageName=$image->getClientOriginalName(); 
            $inventories->image=$imageName;
        }      
        $inventories->productName=$r->name; 
        $inventories->description=$r->description; 
        $inventories->quantity=$r->quantity;
        $inventories->categoryID=$r->category; 
        $inventories->priceperunit=$r->priceperunit; 
        $inventories->retailPrice=$r->retailPrice; 
        $inventories->save();

        return redirect("/inventory/{$inventory->id}");
    }
    
    public function delete($id)
    {
        $inventories=Inventory::find($id);
        $inventories->delete();

        return redirect()->route('inventory.index');
    }

    public function clientView(Request $request)
    {
        $category=$request->category;
        $categories=Category::orderBy('name')->get();

        $data=DB::table('inventories')
        ->leftjoin('categories', 'categories.id', '=', 'inventories.categoryID')
        ->where('categories.name', $category)
        ->get();

        return view('inventory.clientView')->with('data', $data)
                                            ->with('categories',$categories)
                                            ->with('categoryName',$category);
    }

    public function clientViewAll(Request $request)
    {      
        $inventories = Inventory::orderBy('productName')->get()->where('statusID','active');
        $category=$request->category;
        $categories=Category::orderBy('name')->get();
        return view('inventory.clientViewAll')->with('inventories',$inventories)
                                                ->with('categories',$categories)
                                                ->with('categoryName',$category);
    }

    public function viewDetail($id)
    {
        $inventories =Inventory::all()->where('id',$id);
        return view('inventory.productDetail')->with('inventories',$inventories);
    }

    public function changeStatus($id)
    {
        $inventories=Inventory::findOrFail($id);

        if($inventories->statusID=='active'|| $inventories->quantity=='0'){
            $inventories->statusID='inactive'; 
            $inventories->save();
        }else{
            $inventories->statusID='active';  
            $inventories->save();
        }
        

        return redirect()->route('inventory.index');
    }

    public function customerClientView(Request $request)
    {      
        $category=$request->category;
        $categories=Category::orderBy('name')->get();

        $data=DB::table('inventories')
        ->leftjoin('categories', 'categories.id', '=', 'inventories.categoryID')
        ->where('categories.name', $category)
        ->get();

        return view('customerView.customerClientView')->with('data', $data)
                                                        ->with('categories',$categories)
                                                        ->with('categoryName',$category);
    }

    public function customerViewDetail($id)
    {
        $inventories=Inventory::all()->where('id',$id);
        return view('customerView.customerProductDetail')->with('inventories',$inventories);
    }

    public function customerClientViewAll(Request $request)
    {      
        $inventories = Inventory::orderBy('productName')->get()->where('statusID','active');
        $category=$request->category;
        $categories=Category::orderBy('name')->get();
        return view('customerView.customerClientViewAll')->with('inventories',$inventories)
                                                ->with('categories',$categories)
                                                ->with('categoryName',$category);
    }
}
