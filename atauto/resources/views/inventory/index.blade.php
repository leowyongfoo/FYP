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
            <td>Product</td>
            <td>Description</td>
            <td>Quantity</td>
            <td>Category</td>
            <td>Price/unit</td>
            <td>Status</td>
            <td>Action</td>
        </tr>

        @foreach($inventories as $inventory)
            <tr>
                <td>{{$inventory->id}}</td>
                <td>{{$inventory->productName}}</td>
                <td>{{$inventory->description}}</td>
                <td>{{$inventory->quantity}}</td>
                <td>{{$inventory->category->name}}</td>
                <td>{{$inventory->pricePerUnit}}</td>
                <td>{{$inventory->status->name}}</td>
                <td>
                    <a href="#" class="btn btn-danger" onclick="return confirm('Sure Want Delete?')">
                       Delete
                    </a>
                </td>
            </tr>
        @endforeach       
    </table> 
</div>
@endsection

