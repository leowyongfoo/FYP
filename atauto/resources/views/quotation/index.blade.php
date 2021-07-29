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
            <td>Product</td>
            <td>Description</td>
            <td>Quantiy</td>
            <td>Agreed price/unit</td>
            <td>Status</td>
            <td>Action</td>
        </tr>
                                  
        @foreach($quotations as $quotation)
            <tr>
                <td>{{$quotation->id}}</td>
                <td>{{$quotation->name}}</td>
                <td>{{$quotation->product}}</td>
                <td>{{$quotation->description}}</td>
                <td>{{$quotation->quantity}}</td>
                <td>{{$quotation->agreedPriceperunit}}</td>
                <td>{{$quotation->status->name}}</td>
                <td><a href="{{ route('deleteQuotation', ['id' => $quotation->id]) }}" class="btn btn-danger" onclick="return confirm('Sure Want Delete?')">
                     Delete
                    </a>
                    <a href="/quotation/{{ $quotation->id }}/edit" class="btn btn-warning">
                       <i class="fas fa-edit">Edit</i>
                    </a> 
              </td>
            </tr>
        @endforeach
                    
    </table> 
</div>
@endsection