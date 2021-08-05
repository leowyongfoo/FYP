@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <h3 class="text-white mb-4">Customer</h3>
        <a href="/customer/create" class="btn btn-danger">Add New Customer</a>
                    <div class="card ">
                        <div class="card-header py-3">
                            <p class="text-dark m-0 fw-bold">Overview</p>
                        </div>
                        <div class="card-body">
                                <table class="table my-0" id="dataTable">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                                            
                                    @foreach($customers as $customer)
                                        <tr>
                                            <td>{{$customer->id}}</td>
                                            <td>{{$customer->name}}</td>
                                            <td>{{$customer->contact}}</td>
                                            <td>Null</td>
                                            <td><a href="{{ route('deleteCustomer', ['id' => $customer->id]) }}" class="btn btn-danger" onclick="return confirm('Sure Want Delete?')">
                                                Delete
                                                </a>
                                                <a href="/customer/{{ $customer->id }}/edit" class="btn btn-warning">
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