@extends('layouts.app')

@section('content')

<div class="content">
    <div class="dataTables">
        <br>
        <h3 class=>Quotation Detail</h3>
        <br>
        <table class="table table-borderless" id="dataTable">
            <thead>
                <tr>               
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($quotation_lists as $quotation_lists)
                <tr>
                    <td>{{$quotation_lists->inventory->productName}}</td>
                    <td>{{$quotation_lists->quantity}}</td>
                    <td class="hoverColor">
                        <a href="/quotation/{{ $quotation_lists->id }}/deleteItem" class="btn btnStyle" onclick="return confirm('Sure Want delete?')">
                            Restock
                        </a>
                        <a href="#" class="btn btnStyle">
                            Edit
                        </a> 
                    </td>
                </tr>      
                @endforeach   
            </tbody>    
        </table>                
    </div>
</div>
@endsection