@extends('layouts.app')
@section('content')  

            @foreach($inventories as $inventory)
            <div class="col-lg-4 col-md-6 mb-4 mb-md-0" Style="outline: 5px groove black;">
            <form action="{{ route('add.to.DO') }}" method="post">

                       @csrf
                    <h5 class="card-title"><strong> Product Name: </strong>{{$inventory->productName}}</h5>
                    <h5 class="card-title"><strong> Category: </strong>{{$inventory->category->name}}</h5>
                    <h5 class="card-title"><strong> Quantity: </strong> 
                    <input type="number" name="quantity" id="quantity" value="1" min="1" max="{{$inventory->quantity}}"></h5>
                    <input type="hidden" name="id" id="id" value="{{$inventory->id}}">
                    
                    <p style="text-align:center">
                            <input type="submit" name="insert" value="Add To DO" class="btn btn-success">
                    </p>
                </form>
                </div>
        @endforeach
        
@endsection