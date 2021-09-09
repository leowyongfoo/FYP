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
    <p>Quotation detail report</p>
    <div>
        <div>
        @foreach($QODetails as $QODetail)
        <p>
            <label for="QO_No" class="label">QO No.:</label>
            <label for="QO_No" class="label">{{$QODetail->id}}</label>
            
        <p>
            <label for="name" class="label">Name: </label>
            <label for="name" class="label">{{$QODetail->name}}</label>
            
        </p>
        @endforeach 
            <table>
                <thead>
                    <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Agreed Price/Unit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($itemDetails as $itemDetail)
                        <tr>
                        <th>{{$itemDetail->inventory->productName}}</th>
                        <td>{{$itemDetail->quantity}}</td>
                        <td>{{$itemDetail->agreedPriceperunit}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>