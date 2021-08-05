@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <h3 class="text-white mb-4">Inventory</h3>
            <a href="/inventory/create" class="btn btn-danger">Add New Inventory</a>
                    <div class="card ">
                        <div class="card-header py-3">
                            <p class="text-dark m-0 fw-bold">Overview</p>
                        </div>
                        <div class="card-body">
                            <div>
                                <table class="table my-0" id="dataTable">
                                <tr>
                                    <th>ID</th>
                                    <th>Product</th>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Category</th>
                                    <th>Price/unit</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>

                                @foreach($inventories as $inventory)
                                    <tr>
                                        <td>{{$inventory->id}}</td>
                                        <td>{{$inventory->productName}}</td>
                                        <td>{{$inventory->description}}</td>
                                        <td>{{$inventory->quantity}}</td>
                                        <td>{{$inventory->category->name}}</td>
                                        <td>{{$inventory->pricePerUnit}}</td>
                                        <td>{{$inventory->status->name}}</td>
                                        <td>
                                            <a href="{{ route('deleteInventory', ['id' => $inventory->id]) }}" class="btn btn-danger" onclick="return confirm('Sure Want Delete?')">
                                            Delete
                                            </a>
                                            <a href="/inventory/{{ $inventory->id }}/edit" class="btn btn-warning">
                                            <i class="fas fa-edit">Edit</i>
                                            </a> 
                                        </td>
                                    </tr>
                                @endforeach       
                            </table> 
        </div>
    </div>
</div>
@endsection

