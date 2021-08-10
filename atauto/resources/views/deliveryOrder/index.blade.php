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
                                    <th>Supplier ID</th>
                                    <th>Inventory ID</th>
                                    <th>quantity</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>

                                @foreach($deliveryOrders as $deliveryOrder)
                                    <tr>
                                        <td>{{$deliveryOrder->id}}</td>
                                        <td>{{$deliveryOrder->DO_No}}</td>
                                        <td>{{$deliveryOrder->supplierID}}</td>
                                        <td>{{$deliveryOrder->inventoryID}}</td>
                                        <td>{{$deliveryOrder->quantity}}</td>
                                        <td>{{$deliveryOrder->statusID}}</td>
                                        <td>
                                            <a href="#" class="btn btn-danger" onclick="return confirm('Sure Want Delete?')">
                                            Delete
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