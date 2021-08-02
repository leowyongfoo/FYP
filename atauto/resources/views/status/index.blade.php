@extends('layouts.app')

@section('content')

<style>
table
{
    border: 1px solid black;
    padding: 15px;
    border-spacing: 5px;
}
</style>
<div class="container-fluid">
    <h3 class="text-white mb-4">Customer</h3>
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
                                    <th>Action</th>
                                </tr>
                                                        
                                @foreach($statuses as $status)
                                    <tr>
                                        <td>{{$status->id}}</td>
                                        <td>{{$status->name}}</td>
                                        <td><a href="{{ route('deleteStatus', ['id' => $status->id]) }}" class="btn btn-danger" 
                                            onclick="return confirm('Sure Want Delete?')"> Delete</a>
                                    </td>
                                    </tr>
                                @endforeach
                                            
                            </table> 
        </div>
    </div>
</div>

@endsection