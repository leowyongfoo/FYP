@extends('layouts.app')

@section('content')

<div class="content">
            <div class="dataTables">
                <br>
                <h2>Customer</h2>
                <br>
                <a href="/customer.create" class="btn btn-danger">Add New Customer</a>
                <table class="table table-borderless" style="margin-top: 2vh;">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Contact</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $customer)
                        <tr>
                        <th>{{$customer->id}}</th>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->contact}}</td>
                        <td>{{$customer->email}}</td>
                        <td style="Max-width:20vh;">{{$customer->address}}</td>
                        <td><a href="{{ route('deleteCustomer', ['id' => $customer->id]) }}" class="btn btn-danger" onclick="return confirm('Sure Want Delete?')">
                            Delete
                            </a>
                            <a href="/customer.{{ $customer->id }}.edit" class="btn btn-warning">Edit</a> 
                            <a href="https://wa.me/+6{{ $customer->contact }}" class="btn btn-success"><i class="fab fa-whatsapp"></i></a>
                            <a href="mailto:{{ $customer->email }}" class="btn btn-success"><i class="fa fa-envelope"></i></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center pt-4 pl-5">
                    {{ $customers->links() }}
                </div>
            </div>
        </div>
@endsection