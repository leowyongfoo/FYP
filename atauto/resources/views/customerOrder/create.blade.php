@extends('layouts.app')

@section('content')

<div>
<div class="createForm2"> 
        <form class="subform" method="post" action="/customerOrder" enctype="multipart/form-data">
            @csrf
            <p>
                <h3 class="pb-4">Add New Customer Order</h3>
            </p>
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
                                        <option selected="" value="Default" required> please select </option>
                                            @foreach($inventories as $inventory)
                                                <option value="{{ $inventory->id}}">{{ $inventory->pricePerUnit }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" name="quantity[]" class="form-control">
                                    </td>
                                    <td><a href="#" class="btn btn-danger remove">Remove</a></td>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script>
    $('.addRow').on('click',function(){
        addRow();
    });

    function addRow()
    {
        var tr='<tr>\n\
                <td>\n\
                <select name="inventory[]" class="form-control">\n\
                <option selected="" value="Default" required> please select </option>\n\
                @foreach($inventories as $inventory)\n\
                <option value="{{ $inventory->id}}">{{ $inventory->productName }}</option>\n\
                @endforeach\n\
                </select>\n\
                </td>\n\
                <td>\n\
                <input type="number" name="quantity[]" class="form-control quantity">\n\
                </td>\n\
                <td><a href="#" class="btn btn-danger remove">Remove</a></td>\n\
                </tr>';
        $('tbody').append(tr);
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