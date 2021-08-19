@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <h3 class="text-white mb-4">Customer order detail</h3>
                    <div class="card ">
                        <div class="card-header py-3">
                            <p class="text-dark m-0 fw-bold">Overview</p>
                        </div>
                        <div class="card-body">
                        <div>
                            <table class="table my-0" id="dataTable">
                                <tr>
                                    
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                </tr>

                                @foreach($customer_itemlists as $customer_itemlist)
                                    <tr>
                                        <td>{{$customer_itemlist->inventory->productName}}</td>
                                        <td>{{$customer_itemlist->quantity}}</td>
                                        <td>
                                            <a href="/customerOrder/{{ $customer_itemlist->id }}/deleteItem" class="btn btn-danger" onclick="return confirm('Sure Want delete?')">
                                            Restock
                                            </a>
                                            <a href="#" class="btn btn-warning">
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