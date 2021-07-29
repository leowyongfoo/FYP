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
    <table style="width:90%">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Status</td>
            <td>Action</td>
        </tr>

        @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->status->name}}</td>
                <td><a href="#" class="btn btn-danger"
                    onclick="return confirm('Sure Want Delete?')">Delete</a>
              </td>
            </tr>
        @endforeach

    </table> 
</div>
@endsection