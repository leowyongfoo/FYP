@extends('layouts.app')

@section('content')

<div class="content">
            <div class="dataTables">
                <br>
                <h2>Delivery Order</h2>
                <br>
                <a href="/deliveryOrder.create" class="btn btn-danger">Add New DO</a>
                <table class="table table-borderless" style="margin-top: 2vh;">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">DO No.</th>
                        <th scope="col">Supplier Name</th>
                        <th scope="col">Order Date/Time</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($deliveryOrders as $deliveryOrder)
                        <tr>
                        <th>{{$deliveryOrder->id}}</th>
                        <td>{{$deliveryOrder->DO_No}}</td>
                        <td>{{$deliveryOrder->supplier->name}}</td>
                        <td>{{$deliveryOrder->created_at}}</td>
                        <td>{{$deliveryOrder->statusID}}</td>
                        <td><a href="/deliveryOrder/{{$deliveryOrder->id}}/deleteOrder" 
                            class="btn btn-danger" onclick="return confirm('Sure Want Delete?')">
                            Delete
                            </a>
                            <a href="/deliveryOrder.{{ $deliveryOrder->id }}.edit" class="btn btn-warning">
                            Edit
                            </a> 
                            <a href="/deliveryOrder.{{ $deliveryOrder->id }}" class="btn btn-success">
                                View Product
                            </a> </td>
                        </tr>
                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
@endsection