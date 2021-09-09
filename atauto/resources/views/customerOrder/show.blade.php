@extends('layouts.app')

@section('content')

<div>
    <div class="dataTables">
        <br>
        <h3>Customer order detail</h3>
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
                    @foreach($customer_itemlists as $customer_itemlist)
                    <tr>
                        <td>{{$customer_itemlist->inventory->productName}}</td>
                        <td>{{$customer_itemlist->quantity}}</td>
                        <td class="hoverColor">
                            <a href="/customerOrder/{{ $customer_itemlist->id }}/deleteItem" class="btn btnStyle" onclick="return confirm('Sure Want delete?')">
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