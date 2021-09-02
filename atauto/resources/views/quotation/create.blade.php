@extends('layouts.app')

@section('content')
<div>
    <div class="createForm2"> 
        <form class="subform" method="post" action="/quotation" enctype="multipart/form-data">
            @csrf
            <p>
                <h3>Create Quotation</h3>
            </p>
            
            <div class="container-fluid">
            <p>
                <label for="name" class="label">Name:</label>
                <input class="inputField" type="text" name="name" id="name">
            </p>
            <h4 class="text-white mb-4">Product</h4>
                    <div class="card">
                        <div class="card-header py-3">
                            <p class="text-dark m-0 fw-bold">Overview</p>
                        </div>
                        <div class="card-body">
                        <div>
                            <table class="table my-0" id="dataTabe">
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
                                                <option value="{{ $inventory->id }}">{{ $inventory->productName }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" name="quantity[]" class="form-control quantity">
                                    </td>
                                    <td><a href="#" class="btn btn-danger remove">Remove</a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <p class="pt-4">
                <label for="agreedPriceperunit" class="label">Agreed price/unit:</label>
                <input class="inputField" type="text" name="agreedPriceperunit" id="agreedPriceperunit">
            </p>
            <p>
                <label for="status">Status:</label>
                <select name="status" id="status" class="form-control">
                @foreach($statuses as $status)
                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                @endforeach
                </select>
            </p>
            <p>
                <input type="submit" name="insert" value="Insert">
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