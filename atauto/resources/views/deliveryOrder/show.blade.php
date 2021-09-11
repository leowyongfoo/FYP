@extends('layouts.app')

@section('content')

<div>
    <div class="dataTables">
        <br>
            <h3>Delivery order detail</h3>
        <br>
        @foreach($DOs as $DO)
        <p>
            <label for="DO_No" class="label">DO No.:</label>
            <input class="inputField" type="text" name="DO_No" id="DO_No" value="{{$DO->DO_No}}" readonly>
        </p>
            
        <p>
            <label for="supplier" class="label">Supplier.:</label>
            <input class="inputField" type="text" name="supplier" id="supplier" value="{{$DO->supplier->name}}" readonly>
        </p>
        <p>
            <label class="label">Order Date/Time.:</label>
            <input class="inputField" type="text" name="created_at" id="created_at" value="{{$DO->created_at}}" readonly>
        </p>
        <div class="hoverColor">
            <a href="/deliveryOrder.report/{{$DO->id}}" class="btn btnStyleLighter">Print report</a>
            <a href="/deliveryOrder.{{ $DO->id }}.edit" class="btn btnStyleLighter">Edit</a> 
        </div>
        @endforeach 
        <table class="table table-borderless" style="margin-top: 2vh;" id="dataTable">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($itemlists as $itemlist)
                <tr>
                    <td>{{$itemlist->inventory->productName}}</td>
                    <td>{{$itemlist->orderQuantity}}</td>
                    <td class="hoverColor">
                        <a href="/deliveryOrder/{{ $itemlist->id }}/deleteItem" class="btn btnStyle" onclick="return confirm('Sure Want delete?')">
                        Delete
                        </a>
                        <a href="/deliveryOrder/{{ $itemlist->id }}/restock" class="btn btnStyle" onclick="return confirm('Sure Want restock?')">
                        Restock
                        </a>
                    </td>
                </tr>      
                @endforeach  
            </tbody>     
        </table>
    </div>
</div>

@endsection