@extends('layouts.app')
@section('content')



    <div class="content">
        <br>
        <h2>Products</h2>
        <br>
        <div class="row">
            @foreach($inventories as $inventory)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 card bg-dark text-white" Style="border: 5px groove black; border-radius: 10px;">
                        <div class="card-body">

                            <a href="{{ route('inventory.productDetail', ['id' => $inventory->id]) }}">
                                <img src="{{ asset('images/') }}/{{$inventory->image}}" alt="" class="img-fluid" >
                            </a>
                            <h5 class="card-title">Name: {{$inventory->productName}}</h5>
                                    
                            <h5 class="card-title">In stock: {{$inventory->quantity}}</h5>

                            <h5 class="card-title">Price/unit: RM {{$inventory->pricePerUnit}}</h5>
                                     
                            <h5 class="card-title">Description: {{$inventory->description}}</h5>
                            <div class="hoverColor"> 
                                <a href="/productDetail.{{ $inventory->id }}"><button style="float:right;" class="btn btnStyle">View More</button></a>     
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach      
        </div> 
        <div class="d-flex justify-content-center pt-4 pl-5">
            
        </div>
    </div>        

@endsection    