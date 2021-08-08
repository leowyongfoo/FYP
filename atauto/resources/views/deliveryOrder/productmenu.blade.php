@extends('layouts.app')
@section('content')

<div class="col-md-12">
    <div class="container p-4">
        <div class="row">
             @foreach($inventories as $inventory)
                 <div class="col-sm-4">
                    <div class="card h-100 card bg-dark text-white" Style="outline: 5px groove black;">
                        <div class="card-body">
                            
                            <h5 class="card-title">Name: {{$inventory->productName}}</h5>
                                    
                            <h5 class="card-title">In stock: {{$inventory->quantity}}</h5>
                                     
                            <h5 class="card-title">Description: {{$inventory->description}}</h5>
                            <div> 
                                <a href="{{ route('product.detail', ['id' => $inventory->id]) }}"><button style="float:right;" class="btn btn-danger btn-xs">View More</button></a>     
                            </div>
                        </div>
                    </div>
                 </div>
             @endforeach 
                   
        </div>        
    </div>
</div>
@endsection    