@extends('layouts.app')
@section('content')  
	<div class="row" align="left" >
        @foreach($inventories as $inventory)       
            <div class="col-md-6" Style="outline: 5px groove black;">
                <form action="#" method="post">
                    @csrf
                    <h4>{{$inventory->productName}}</h1>
                    <h5 class="card-title">Description: {{$inventory->description}}</h4>
                    <p></p>
                    <div style="height: 100px">Quantity 
                    <input type="number" name="quantity" id="qty" value="1" min="1" max="{{$inventory->quantity}}"> 
                    Available stock: {{$inventory->quantity}}
                    </div>
                    <input type="hidden" name="id" id="id" value="{{$inventory->id}}">
                    <input type="hidden" id="name" name="name" value="{{$inventory->productName}}">
                    <input type="hidden" id="amount" name="amount" value="">
                           
                    <div style="height: 100px">RM {{$inventory->pricePerUnit}} <button type="submit" style="float:right" class="btn btn-danger btn-xs">Add To Cart</button>
                </form>
            </div>
        @endforeach     
	</div>
@endsection  
