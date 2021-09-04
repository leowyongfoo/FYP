@extends('layouts.app')

@section('content')

<div class="content">
    <div class="dataTables">
        <br>
        <h3>Delivery order detail</h3>
        <br>
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
                    <td>{{$itemlist->quantity}}</td>
                    <td class="hoverColor">
                        <a href="/deliveryOrder/{{ $itemlist->id }}/deleteItem" class="btn btnStyle" onclick="return confirm('Sure Want delete?')">
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