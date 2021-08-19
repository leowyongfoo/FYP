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
        <form class="subform" method="post" action="/customerOrder" enctype="multipart/form-data">
            @csrf
            <p>
                <label for="CO_No" class="label">CO No.</label>
                <input type="text" name="CO_No" id="CO_No" required>
            </p>

            <div class="card-body">
                <label for="customer" class="label">Customer</label>
                <select name="customer" id="customer" class="form-control">
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
            </div>     

            <div class="container-fluid">
            <h4 class="text-white mb-4">Product</h4>
                    <div class="card ">
                        <div class="card-header py-3">
                            <p class="text-dark m-0 fw-bold">Overview</p>
                        </div>
                        <div class="card-body">
                        <div>
                            <table class="table my-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th><input type="button" class="addRow" value="Add row"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <select name="inventory[]" class="form-control">
                                        <option selected="" value="Default" required> pleace select </option>
                                            @foreach($inventories as $inventory)
                                                <option value="{{ $inventory->id}}">{{ $inventory->productName }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" name="quantity[]" class="form-control">
                                    </td>
                                    <td><a href="#" class="btn btn-danger remove">remove</a></td>
                                </tr>

                                <tr>
                                <td>
                                        <select name="inventory[]" class="form-control">
                                            @foreach($inventories as $inventory)
                                                <option value="{{ $inventory->id}}">{{ $inventory->productName }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" name="quantity[]" class="form-control">
                                    </td>
                                    <td><a href="#" class="btn btn-danger remove">remove</a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            <p>
                <input type="submit" name="insert" value="Insert" style="margin-top:15px;"> 
            </p>
        </form>
    </div>
</div>

<script type="text/javascript">
    $('.addRow').on('click',function(){
        addRow();
    });
    function addRow()
    {
        var add='<tr>'+
        '<td><select name="inventory" class="form-control">@foreach($inventories as $inventory)<option value="{{ $inventory->id }}">{{ $inventory->productName }}</option>@endforeach</select></td>'+
        '<td <input type="number" name="quantity" class="form-control"></td>'+
        '<td><a href="#" class="btn btn-danger remove">remove</a></td>'+
        '</tr>';
        $("tbody").append(add);
    };
    $('.remove').live('click',function(){
        var last=$('tbody tr').length;
        if(last==1){
            alert("you can not remove last row");
        }
        else{
             $(this).parent().parent().remove();
        }
    });
</script>


@endsection