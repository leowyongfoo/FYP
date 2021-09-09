<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atauto</title>
</head>
<body>
    <h1>AtAuto</h1>
    <p>Delivery order detail report</p>
    <div>
        <div>
        @foreach($DODetails as $DODetail)
        <p>
            <label for="DO_No" class="label">DO No.:</label>
            <label for="DO_No" class="label">{{$DODetail->DO_No}}</label>
            
        <p>
            <label for="supplier" class="label">Supplier: </label>
            <label for="supplier" class="label">{{$DODetail->supplier->name}}</label>
            
        </p>
        @endforeach 
            <table>
                <thead>
                    <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($itemDetails as $itemDetail)
                        <tr>
                        <th>{{$itemDetail->inventory->productName}}</th>
                        <td>{{$itemDetail->quantity}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>