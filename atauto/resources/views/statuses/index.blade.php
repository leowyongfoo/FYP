@extends('layouts.app')

@section('content')

<div>
    <table>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Action</td>
        </tr>
                                  
        @foreach($statuses as $status)
            <tr>
                <td>{{$status->id}}</td>
                <td>{{$status->name}}</td>
                <td><a href="#" class="btn btn-danger"
                    onclick="return confirm('Sure Want Delete?')">Delete</a>
              </td>
            </tr>
        @endforeach
                    
    </table> 
</div>

@endsection