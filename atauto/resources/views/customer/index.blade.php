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
                                        <th>E-mail</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                                            
                                    @foreach($customers as $customer)
                                        <tr>
                                            <td>{{$customer->id}}</td>
                                            <td>{{$customer->name}}</td>
                                            <td>{{$customer->contact}}</td>
                                            <td>{{$customer->email}}</td>
                                            <td style="Max-width:20vh;">{{$customer->address}}</td>
                                            <td><a href="{{ route('deleteCustomer', ['id' => $customer->id]) }}" class="btn btn-danger" onclick="return confirm('Sure Want Delete?')">
                                                Delete
                                                </a>
                                                <a href="/customer/{{ $customer->id }}/edit" class="btn btn-warning">
                                                <i class="fas fa-edit">Edit</i>
                                                </a> 
                                                <a href="https://wa.me/+6{{$customer->contact}}" class="btn btn-success">
                                                <i class="fa fa-whatsapp"></i>
                                                </a>
                                                <a href="mailto:{{$customer->email}}" class="btn btn-success">
                                            <i class="fa fa-envelope"></i>
                                            </a>    
                                        </td>
                                        </tr>
                                    @endforeach 
                                </table> 
                                <div class="d-flex justify-content-center pt-4">
                                    {{ $customers->links() }}
                                </div>
       
        </div>
    </div>
</div>
@endsection