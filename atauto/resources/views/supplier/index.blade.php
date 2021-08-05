@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <h3 class="text-white mb-4">Supplier</h3>
        <a href="/supplier/create" class="btn btn-danger">Add New Supplier</a>
                    <div class="card ">
                        <div class="card-header py-3">
                            <p class="text-dark m-0 fw-bold">Overview</p>
                        </div>
                        <div class="card-body">
                            <div>
                                <table class="table my-0" id="dataTable">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                                                        
                                @foreach($suppliers as $supplier)
                                    <tr>
                                        <td>{{$supplier->id}}</td>
                                        <td>{{$supplier->name}}</td>
                                        <td>{{$supplier->contact}}</td>
                                        <td>Null</td>
                                        <td><a href="{{ route('deleteSupplier', ['id' => $supplier->id]) }}" class="btn btn-danger" onclick="return confirm('Sure Want Delete?')">
                                            Delete
                                            </a>
                                            <a href="/supplier/{{ $supplier->id }}/edit" class="btn btn-warning">
                                            <i class="fas fa-edit">Edit</i>
                                            </a> 
                                    </td>
                                    </tr>
                                @endforeach   
                                </table> 
                                <div class="d-flex justify-content-center pt-4">
                                    {{ $suppliers->links() }}
                                </div>
        </div>
    </div>
</div>
@endsection