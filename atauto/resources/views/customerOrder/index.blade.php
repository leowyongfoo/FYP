@extends('layouts.app')

@section('content')

<div class="content">
            <div class="dataTables">
                <br>
                <h2>Customer Order</h2>
                <br>
                <div class="hoverColor"><a href="/customerOrder.create" class="btn btnStyleLighter">Add New CO</a></div>
                <table class="table table-borderless" style="margin-top: 2vh;">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">CO No.</th>
                        <th scope="col">Customer ID</th>
                        <th scope="col">Order Date/Time</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customerOrders as $customerOrder)
                        <tr>
                        <th>{{$customerOrder->id}}</th>
                        <td>{{$customerOrder->CO_No}}</td>
                        <td>{{$customerOrder->customer->name}}</td>
                        <td>{{$customerOrder->created_at}}</td>
                        <td>{{$customerOrder->statusID}}</td>
                        <td class="hoverColor"><a href="/customerOrder/{{$customerOrder->id}}/deleteOrder" class="btn btnStyle" onclick="return confirm('Sure Want Delete?')">
                                Delete
                            </a>
                            <a href="/customerOrder.{{ $customerOrder->id }}.edit" class="btn btnStyle">
                                Edit
                            </a> 
                            <a href="/customerOrder.{{ $customerOrder->id }}" class="btn btnStyle">
                                View detail
                            </a> </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection