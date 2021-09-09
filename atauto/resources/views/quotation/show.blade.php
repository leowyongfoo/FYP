@extends('layouts.app')

@section('content')

<div class="content">
    <div class="dataTables">
        <br>
        <h3 class=>Quotation Detail</h3>
        </br>
        @foreach($QOs as $QO)
        <p>
            <label for="QO_No" class="label">Quotation No.:</label>
            <input class="inputField" type="text" name="QO_No" id="QO_No" value="{{$QO->id}}" readonly>
        </p>
            
        <p>
            <label for="name" class="label">Name.:</label>
            <input class="inputField" type="text" name="name" id="name" value="{{$QO->name}}" readonly>
        </p>
        <p>
            <label class="label">Created At.:</label>
            <input class="inputField" type="text" name="created_at" id="created_at" value="{{$QO->created_at}}" readonly>
        </p>
        <a href="/quotation.report/{{$QO->id}}" class="btn btnStyleLighter">Print report</a>
        <a href="/quotation.{{ $QO->id }}.edit" class="btn btnStyleLighter">Edit</a>
        @endforeach
        <table class="table table-borderless" id="dataTable">
            <thead>
                <tr>               
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Agreed Price/Unit</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($quotation_lists as $quotation_lists)
                <tr>
                    <td>{{$quotation_lists->inventory->productName}}</td>
                    <td>{{$quotation_lists->quantity}}</td>
                    <td>{{$quotation_lists->agreedPriceperunit}}</td>
                    <td class="hoverColor">
                        <a href="/quotation/{{ $quotation_lists->id }}/deleteItem" class="btn btnStyle" onclick="return confirm('Sure Want delete?')">
                            Delete
                        </a>
                       
                    </td>
                </tr>      
                @endforeach   
            </tbody>    
        </table>                
    </div>
</div>
@endsection