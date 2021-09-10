@extends('layouts.app')
@section('content')  
	<div class="createForm">
                <form action="{{ route('add.to.cart') }}" method="post">
                    @csrf
                    <h2>Product Detail</h2>
                    <table class="table table-borderless" style="width: 50vh; margin-top: 2vh;">
                    @foreach($inventories as $inventory) 
                    <img src="{{ asset('images/') }}/{{$inventory->image}}" alt="" class="img-fluid" >
                        <thead>
                            <tr>
                                <th>Product Name:</th>
                                <th>{{$inventory->productName}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Description:</td>
                                <td>{{$inventory->description}}</td>
                            </tr>
                            <tr>
                                <td>Available stock:</td>
                                <td>{{$inventory->quantity}}</td>
                            </tr>
                            <tr>
                                <td>Quantity:</td>
                                <td><input type="number" name="quantity" id="qty" value="1" min="1" max="{{$inventory->quantity}}"></td>
                            </tr>
                            <tr>
                                <td>Price per Unit:</td>
                                <td>RM {{$inventory->pricePerUnit}}</td>
                            </tr>
                        </tbody>
                        <input type="hidden" name="id" id="id" value="{{$inventory->id}}">
                        <input type="hidden" id="name" name="name" value="{{$inventory->productName}}">
                        <input type="hidden" id="amount" name="amount" value="">
                        
                    @endforeach   
                    </table>
                    <div class="hoverColor">
                        <button type="submit" class="btn btnStyleLighter">Add To Cart</button>
                        <a href="/clientView" class="btn btnStyleLighter">Back</a>
                    </div>
                </form>
	</div>
@endsection  
