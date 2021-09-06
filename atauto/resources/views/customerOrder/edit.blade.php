@extends('layouts.app')

@section('content')

<div>
    <div class="createForm"> 
        @foreach($customerOrders as $customerOrder)
        <form class="subform" method="post" action="/customerOrder/{{  $customerOrder->id  }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <br>
            <h2>Edit Customer Order</h2>
            <br>
            <p>
                <label for="CO_No" class="label">CO No.:</label>
                <input class="inputField" type="text" name="CO_No" id="CO_No" value="{{$customerOrder->CO_No}}" required>
            </p>
            
            <label for="customer" class="label">Customer</label>
            <select name="customer" id="customer" class="form-control" value="{{$customerOrder->customer->name}}">
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
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