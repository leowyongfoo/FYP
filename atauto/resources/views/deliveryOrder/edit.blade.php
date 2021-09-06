@extends('layouts.app')

@section('content')

<div>
    <div class="createForm"> 
        @foreach($deliveryOrders as $deliveryOrder)
        <form class="subform" method="post" action="/deliveryOrder/{{  $deliveryOrder->id  }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <br>
            <h2>Edit Delivery Order</h2>
            <br>
            <p>
                <label for="DO_No" class="label">DO No.:</label>
                <input class="inputField" type="text" name="DO_No" id="DO_No" value="{{$deliveryOrder->DO_No}}" required>
            </p>
            
            <label for="supplier" class="label">Supplier:</label>
            <select name="supplier" id="supplier" class="form-control" value="{{$deliveryOrder->supplier->name}}">
            @foreach($suppliers as $supplier)
                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
            @endforeach
            </select>

            <p class="hoverColor">
                <input type="submit" name="edit" value="Edit" style="margin-top:15px;" class="btn btnStyle"> 
            </p>
        </form>
        @endforeach
    </div>
</div>



@endsection