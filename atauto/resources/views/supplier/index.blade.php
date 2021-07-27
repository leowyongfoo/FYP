@extends('layouts.app')

@section('content')

<div>
    <table>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Contact</td>
            <td>Action</td>
        </tr>
                                  
        @foreach($suppliers as $supplier)
            <tr>
                <td>{{$supplier->id}}</td>
                <td>{{$supplier->name}}</td>
                <td>{{$supplier->contact}}</td>
                <td><a href="#" class="btn btn-danger"onclick="return confirm('Sure Want Delete?')">
                     Delete
                    </a>
                    <a href="/supplier/{{ $supplier->id }}/edit" class="btn btn-warning">
                       <i class="fas fa-edit">Edit</i>
                    </a> 
              </td>
            </tr>
        @endforeach
                    
    </table> 
</div>
@endsection