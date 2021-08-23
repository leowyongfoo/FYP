@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <h3 class="text-white mb-4">Delivery order</h3>
            <a href="/deliveryOrder/create" class="btn btn-danger">Add New DO</a>
                    <div class="card ">
                        <div class="card-header py-3">
                            <p class="text-dark m-0 fw-bold">Overview</p>
                        </div>
                        <div class="card-body">
                        <div>
                            <table class="table my-0" id="dataTable">
                                <tr>
                                    <th>ID</th>
                                    <th>DO No.</th>
                                    <th>Supplier Name</th>
                                    <th>Order date/time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>

                                @foreach($deliveryOrders as $deliveryOrder)
                                    <tr>
                                        <td>{{$deliveryOrder->id}}</td>
                                        <td>{{$deliveryOrder->DO_No}}</td>
                                        <td>{{$deliveryOrder->supplier->name}}</td>
                                        <td>{{$deliveryOrder->created_at}}</td>
                                        <td>{{$deliveryOrder->statusID}}</td>
                                        <td>
                                            <a href="/deliveryOrder/{{$deliveryOrder->id}}/deleteOrder" 
                                            class="btn btn-danger" onclick="return confirm('Sure Want Delete?')">
                                            Delete
                                            </a>
                                            <a href="/deliveryOrder/{{ $deliveryOrder->id }}/edit" class="btn btn-warning">
                                            <i class="fas fa-edit">Edit</i>
                                            </a> 
                                            <a href="/deliveryOrder/{{ $deliveryOrder->id }}" class="btn btn-success">
                                                View detail
                                            </a> 
                                        </td>
                                    </tr>      
                                @endforeach       
                            </table>
                        </div>
    </div>
</div>
@endsection