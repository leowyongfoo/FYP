@extends('layouts.app2')

@section('content2')

    <div class="content">
        <br>
        <h2>Products - All</h2>
        <br>
        <p>
            <label for="category">Sort by Category:</label>
            <select name="category" id="category" class="form-control" style="width: 20%;" onchange="location = this.value;">
                <option disabled selected value>Select a category</option>
                <option value="customer.clientViewAll">All</option>
                @foreach($categories as $category)
                    <option value="customer.clientView.{{ $category->name }}">{{ $category->name }}</option>
                @endforeach
            </select><br>
        </p>
        <div class="row">
            @foreach($inventories as $inventory)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 card bg-dark text-white" Style="border: 5px groove black; border-radius: 10px;">
                        <div class="card-body">
                            <div style="height: 55%; width: 80%; margin-left: auto; margin-right: auto;">
                                <a href="/customer.productDetail.{{ $inventory->id }}">
                                    <img src="{{ asset('images/') }}/{{$inventory->image}}" alt="" class="img-fluid" >
                                </a>
                            </div>

                            <h5 class="card-title pt-3">Name: {{$inventory->productName}}</h5>
                                    
                            <h5 class="card-title">In Stock: {{$inventory->quantity}}</h5>

                            <h5 class="card-title">Price/Unit: RM {{$inventory->pricePerUnit}}</h5>
                                     
                            <h5 class="card-title">Description: {{$inventory->description}}</h5>
                            <div class="hoverColor"> 
                                <a href="/customer.productDetail.{{ $inventory->id }}"><button style="float:right;" class="btn btnStyle">View More</button></a>     
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