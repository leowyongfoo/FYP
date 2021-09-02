@extends('layouts.app')

@section('content')

<div class="content">
            <div class="dataTables">
                <br>
                <h2>Status</h2>
                <br>
                <a href="/status.create" class="btn btn-danger">Add New Status</a>
                <table class="table table-borderless" style="margin-top: 2vh;">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($statuses as $status)
                            <tr> 
                            <th>{{$status->id}}</th>
                            <td>{{$status->name}}</td>
                            <td><a href="{{ route('deleteStatus', ['id' => $status->id]) }}" class="btn btn-danger" 
                                onclick="return confirm('Sure Want Delete?')">Delete</a></td>
                            </tr>
                        @endforeach  
                    </tbody>
                </table>
                <div class="d-flex justify-content-center pt-4 pl-5">
                    {{ $statuses->links() }}
                </div>
            </div>
        </div>

@endsection