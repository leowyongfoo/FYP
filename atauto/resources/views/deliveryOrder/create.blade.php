@extends('layouts.app')

@section('content')
<div>
    <div class="createForm2"> 
        <form class="subform" method="post" action="/deliveryOrder" enctype="multipart/form-data">
            @csrf
            <p>
                <h3>Add New Delivery Order</h3>
            </p>
            
            <div class="container-fluid">
            <p>
                <label for="DO_No" class="label">DO No.:</label>
                <input class="inputField" type="text" name="DO_No" id="DO_No" required>
            </p>

            <p>
                <label for="supplier" class="label">Supplier:</label>
                <select name="supplier" id="supplier" class="form-control inputField">
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </p>
            
            <h4 class="text-white mb-4">Product</h4>
                <table class="table table-borderless" id="dataTable">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th class="hoverColor"><input type="button" class="addRow btn btnStyle" value="Add row"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <select name="inventory[]" class="form-control">
                                <option selected="" value="Default" required> Please select </option>
                                @foreach($inventories as $inventory)
                                    <option value="{{ $inventory->id}}">{{ $inventory->productName }}</option>
                                @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="number" name="quantity[]" class="form-control quantity">
                            </td>
                            <td class="hoverColor"><a href="#" class="btn btnStyle remove">Remove</a></td>
                        </tr>
                    </tbody>
                </table>
                <p class="hoverColor">
                    <input type="submit" name="insert" value="Insert" style="margin-top:15px;" class="btn btnStyle"> 
                </p>
            </div>   
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
                <option selected="" value="Default" required> Please select </option>\n\
                @foreach($inventories as $inventory)\n\
                <option value="{{ $inventory->id}}">{{ $inventory->productName }}</option>\n\
                @endforeach\n\
                </select>\n\
                </td>\n\
                <td>\n\
                <input type="number" name="quantity[]" class="form-control quantity">\n\
                </td>\n\
                <td class="hoverColor"><a href="#" class="btn btnStyle remove">Remove</a></td>\n\
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