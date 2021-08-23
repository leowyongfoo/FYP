@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <h3 class="text-white mb-4">Customer Order</h3>
            <a href="/customerOrder/create" class="btn btn-danger">Add New CO</a>
                    <div class="card ">
                        <div class="card-header py-3">
                            <p class="text-dark m-0 fw-bold">Overview</p>
                        </div>
                        <div class="card-body">
                        <div>
                            <table class="table my-0" id="dataTable">
                                <tr>
                                    <th>ID</th>
                                    <th>CO No.</th>
                                    <th>Customer ID</th>
                                    <th>Order date/time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>

                                @foreach($customerOrders as $customerOrder)
                                    <tr>
                                        <td>{{$customerOrder->id}}</td>
                                        <td>{{$customerOrder->CO_No}}</td>
                                        <td>{{$customerOrder->customer->name}}</td>
                                        <td>{{$customerOrder->created_at}}</td>
                                        <td>{{$customerOrder->statusID}}</td>
                                        <td>
                                            <a href="/customerOrder/{{$customerOrder->id}}/deleteOrder" class="btn btn-danger" onclick="return confirm('Sure Want Delete?')">
                                            Delete
                                            </a>
                                            <a href="/customerOrder/{{ $customerOrder->id }}/edit" class="btn btn-warning">
                                            <i class="fas fa-edit">Edit</i>
                                            </a> 
                                            <a href="/customerOrder/{{ $customerOrder->id }}" class="btn btn-success">
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