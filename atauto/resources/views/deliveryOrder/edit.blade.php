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
        @foreach($deliveryOrders as $deliveryOrder)
        <form class="subform" method="post" action="/deliveryOrder/{{  $deliveryOrder->id  }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <p>
                <label for="DO_No" class="label">DO No.</label>
                <input type="text" name="DO_No" id="DO_No" value="{{$deliveryOrder->DO_No}}" required>
            </p>

            <div class="card-body">
                <label for="supplier" class="label">Supplier</label>
                <select name="supplier" id="supplier" class="form-control" value="{{$deliveryOrder->supplier->name}}">
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </div>     

            

            <p class="hoverColor">
                <input type="submit" name="edit" value="edit" style="margin-top:15px;" class="btn btnStyle"> 
            </p>
        </form>
        @endforeach
    </div>
</div>



@endsection