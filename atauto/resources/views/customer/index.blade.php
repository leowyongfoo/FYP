@extends('layouts.app')

@section('content')

<style>
table, tr, td
{
    border: 1px solid black;
    padding: 15px;
    border-spacing: 5px;
}

</style>

<div>
    <table>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Contact</td>
            <td>Action</td>
        </tr>
                                  
        @foreach($customers as $customer)
            <tr>
                <td>{{$customer->id}}</td>
                <td>{{$customer->name}}</td>
                <td>{{$customer->contact}}</td>
                <td><a href="#" class="btn btn-danger"onclick="return confirm('Sure Want Delete?')">
                     Delete
                    </a>
                    <a href="/customer/{{ $customer->id }}/edit" class="btn btn-warning">
                       <i class="fas fa-edit">Edit</i>
                    </a> 
              </td>
            </tr>
        @endforeach
                    
    </table> 
</div>
@endsection