@extends('layouts.app')
@section('content')
@if(Session::has('addSuccess'))           
        <div class="alert alert-success" role="alert">
            {{ Session::get('addSuccess')}}
        </div>       
@endif 
<div>
            <div class="dataTables">
                <br>
                <h2>Inventory</h2>
                <br>
                <div class="hoverColor d-flex">
                    <a href="/inventory.create" class="btn btnStyleLighter mr-4">Add New Inventory</a>
                    <a href="/inventory.report" class="btn btnStyleLighter">Print report</a>
                </div>
                <table class="table table-borderless" style="margin-top: 2vh;">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Product</th>
                        <th scope="col">Description</th>
                        <th scope="col">In Stock</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price/Unit</th>
                        <th scope="col">Image</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inventories as $inventory)
                        <tr>
                        <th>{{$inventory->id}}</th>
                        <td>{{$inventory->productName}}</td>
                        <td>{{$inventory->description}}</td>
                        <td>{{$inventory->quantity}}</td>
                        <td>{{$inventory->category->name}}</td>
                        <td>RM {{$inventory->pricePerUnit}}</td>
                        <td>
                            <img src="{{ asset('images/') }}/{{$inventory->image}}" alt="" width="50">
                        </td>
                        <td style="width: 15vh;">{{$inventory->statusID}}</td>
                        <td class="hoverColor" style="width: 35vh;"><a href="{{ route('deleteInventory', ['id' => $inventory->id]) }}" class="btn btnStyle" onclick="return confirm('Sure Want Delete?')">
                            Delete
                            </a>
                            <a href="/inventory.{{ $inventory->id }}.edit" class="btn btnStyle">
                            Edit
                            </a> 
                            <a href="{{ route('inventory.changeStatus', ['id' => $inventory->id]) }}" class="btn btnStyle">
                                {{$inventory->statusID}}
                            </a>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center pt-4 pl-5">
                    {{ $inventories->links() }}
                </div>
            </div>
        </div>
@endsection

