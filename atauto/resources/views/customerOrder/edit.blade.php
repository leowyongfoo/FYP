@extends('layouts.app')

@section('content')
<style>
.subform
{
    max-width: 1208px;
    margin: 0 auto;
    max-width: 75.5rem;
}
</style>
<div>
    <div style="text-align:center"> 
        @foreach($customerOrders as $customerOrder)
        <form class="subform" method="post" action="/customerOrder/{{  $customerOrder->id  }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <p>
                <label for="CO_No" class="label">DO No.</label>
                <input type="text" name="CO_No" id="CO_No" value="{{$customerOrder->CO_No}}" required>
            </p>

            <div class="card-body">
                <label for="customer" class="label">Customer</label>
                <select name="customer" id="customer" class="form-control" value="{{$customerOrder->customer->name}}">
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
            </div>     

            

            <p>
                <input type="submit" name="edit" value="edit" style="margin-top:15px;"> 
            </p>
        </form>
        @endforeach
    </div>
</div>



@endsection