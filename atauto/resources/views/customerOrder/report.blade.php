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
    <p>Customer order detail report</p>
    <div>
        <div>
        @foreach($CODetails as $CODetail)
        <p>
            <label for="CO_No" class="label">CO No.:</label>
            <label for="CO_No" class="label">{{$CODetail->CO_No}}</label>
            
        <p>
            <label for="customer" class="label">Customer: </label>
            <label for="customer" class="label">{{$CODetail->customer->name}}</label>
            
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