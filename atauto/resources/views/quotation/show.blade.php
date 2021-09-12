@extends('layouts.app')

@section('content')

<div>
    <div class="dataTables">
        <br>
        <h3 class=>Quotation Detail</h3>
        </br>
        @foreach($QOs as $QO)
        <p>
            <label for="QO_No" class="label">Quotation No.:</label>
            <input class="inputField form-control" type="text" name="QO_No" id="QO_No" value="{{$QO->id}}" readonly>
        </p>
            
        <p>
            <label for="name" class="label">Name:</label>
            <input class="inputField form-control" type="text" name="name" id="name" value="{{$QO->name}}" readonly>
        </p>
        <p>
            <label class="label">Created at:</label>
            <input class="inputField form-control" type="text" name="created_at" id="created_at" value="{{$QO->created_at}}" readonly>
        </p>
        <div class="hoverColor">
            <a href="/quotation.report/{{$QO->id}}" class="btn btnStyleLighter">Print report</a>
            <a href="/quotation.{{ $QO->id }}.edit" class="btn btnStyleLighter">Edit</a>
        </div>
        @endforeach
        <table class="table table-borderless" style="margin-top: 2vh;" id="dataTable">
            <thead>
                <tr>               
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Agreed Price/Unit</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($quotation_lists as $quotation_list)
                <tr>
                    <td>{{$quotation_list->inventory->productName}}</td>
                    <td>{{$quotation_list->quantity}}</td>
                    <td>{{$quotation_list->agreedPriceperunit}}</td>
                    <td>
                        <img src="{{ asset('images/') }}/{{$quotation_list->inventory->image}}" alt="" width="50">
                    </td>
                    <td class="hoverColor">
                        <a href="/quotation/{{ $quotation_list->id }}/deleteItem" class="btn btnStyle" onclick="return confirm('Sure Want delete?')">
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