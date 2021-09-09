@extends('layouts.app')

@section('content')

<div>
    <div class="dataTables">
        <br>
        <h3>Customer order detail</h3>
        </br>
        @foreach($COs as $CO)
        <p>
            <label for="CO_No" class="label">CO No.:</label>
            <input class="inputField" type="text" name="CO_No" id="CO_No" value="{{$CO->CO_No}}" readonly>
        </p>
            
        <p>
            <label for="customer" class="label">Customer.:</label>
            <input class="inputField" type="text" name="customer" id="customer" value="{{$CO->customer->name}}" readonly>
        </p>
        <p>
            <label class="label">Created At.:</label>
            <input class="inputField" type="text" name="created_at" id="created_at" value="{{$CO->created_at}}" readonly>
        </p>
        <a href="/customerOrder.report/{{$CO->id}}" class="btn btnStyleLighter">Print report</a>
        <a href="/customerOrder.{{ $CO->id }}.edit" class="btn btnStyleLighter">Edit</a>
        @endforeach 
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