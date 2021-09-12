@extends('layouts.app')

@section('content')

<div class="dataTables">
    <br>
    <h2>User</h2>
    <br>
    <div class="hoverColor">
        <a href="/user.create" class="btn btnStyleLighter">Add New User</a>
    </div>              
    <table class="table table-borderless" style="margin-top: 2vh;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>E-mail</th>
                <th>Role</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
                <tr>
                    <th>{{$customer->id}}</th>
                    <td>{{$customer->username}}</td>
                    <td>{{$customer->email}}</td>
                    <td>{{$customer->role}}</td>
                    <td style="Max-width:20vh;">{{$customer->address}}</td>
                        <td class="hoverColor"><a href="{{ route('deleteUser', ['id' => $customer->id]) }}" class="btn btnStyle" onclick="return confirm('Sure Want Delete?')">
                        Delete
                        </a>
                        <a href="/user.{{ $customer->id }}.edit" class="btn btnStyle">
                        Edit
                        </a>                
                    </td>
                </tr>
             @endforeach 
        </tbody>
    </table> 
</div>
@endsection