@extends('layouts.app')

@section('content')

<div class="content">
            <div class="dataTables">
                <br>
                <h2>Supplier</h2>
                <br>
                <a href="/supplier.create" class="btn btn-danger">Add New Supplier</a>
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
                        @foreach($suppliers as $supplier)
                        <tr>
                        <th>{{$supplier->id}}</th>
                        <td>{{$supplier->name}}</td>
                        <td>{{$supplier->contact}}</td>
                        <td>{{$supplier->email}}</td>
                        <td style="Max-width:20vh;">{{$supplier->address}}</td>
                        <td><a href="{{ route('deleteSupplier', ['id' => $supplier->id]) }}" class="btn btn-danger" onclick="return confirm('Sure Want Delete?')">
                            Delete
                            </a>
                            <a href="/supplier.{{ $supplier->id }}.edit" class="btn btn-warning">
                            Edit
                            </a>
                            <a href="https://wa.me/+6{{ $supplier->contact }}" class="btn btn-success">
                            <i class="fab fa-whatsapp"></i>
                            </a>
                            <a href="mailto:{{$supplier->email}}" class="btn btn-success">
                            <i class="fa fa-envelope"></i>
                            </a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center pt-4 pl-5">
                    {{ $suppliers->links() }}
                </div>
            </div>
        </div>

@endsection