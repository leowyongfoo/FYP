@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <h3 class="text-white mb-4">User</h3>
        <a href="/user.create" class="btn btn-danger">Add New User</a>
                    <div class="card ">
                        <div class="card-header py-3">
                            <p class="text-dark m-0 fw-bold">Overview</p>
                        </div>
                        <div class="card-body">
                                <table class="table my-0" id="dataTable">
                                    <tr>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>E-mail</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                                            
                                    @foreach($customers as $customer)
                                        <tr>
                                            <td>{{$customer->id}}</td>
                                            <td>{{$customer->username}}</td>
                                            <td>{{$customer->email}}</td>
                                            <td>{{$customer->role}}</td>
                                            <td><a href="{{ route('deleteUser', ['id' => $customer->id]) }}" class="btn btn-danger" onclick="return confirm('Sure Want Delete?')">
                                                Delete
                                                </a>
                                                <a href="/user.{{ $customer->id }}.edit" class="btn btn-warning">
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