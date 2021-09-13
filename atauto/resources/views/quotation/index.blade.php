@extends('layouts.app')

@section('content')

<div>
    <div class="dataTables">
        <br>
        <h2>Quotation</h2>
        <br>
        <div class="hoverColor"><a href="/quotation.create" class="btn btnStyleLighter">Add New Quotation</a></div>
                        
        <table class="table table-borderless" style="margin-top: 2vh;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>          
            @foreach($quotations as $quotation)
            <tr>
                <th>{{$quotation->id}}</th>
                <td>{{$quotation->name}}</td>
                <td>{{$quotation->statusID}}</td>
                <td class="hoverColor"><a href="{{ route('deleteQuotation', ['id' => $quotation->id]) }}" class="btn btnStyle" onclick="return confirm('Sure Want Delete?')">
                    Delete
                    </a> 
                    <a href="/quotation.{{ $quotation->id }}" class="btn btnStyle">
                    View Detail
                    </a> 
                    <a href="{{ route('quotation.changeStatus', ['id' => $quotation->id]) }}" class="btn btnStyle">
                    {{$quotation->statusID}}
                    </a>
                </td>
            </tr>
            @endforeach 
        </tbody>   
    </table> 
    <div class="d-flex justify-content-center pt-4">
        {{ $quotations->links() }}
    </div>
    </div>
</div>
@endsection