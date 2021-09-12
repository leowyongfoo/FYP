<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATAuto - Customer Order Report</title>
    <style>
        table, td, th {
            border: 1px solid black;
        }

        table {
            border-collapse: collapse;
        }

        td, th {
            padding: 5px;
        }
    </style>
</head>
<body>
    <hr>
    <h1>ATAuto</h1>
    <hr>
    <h2>Customer Order Detail Report</h2>
    <hr>
    <br>
    <div>
        <div>
        @foreach($CODetails as $CODetail)
        <p>
            <label for="CO_No" class="label">CO No.:</label>
            <label for="CO_No" class="label">{{$CODetail->CO_No}}</label>
            
        </p>
        <p>
            <label for="customer" class="label">Customer:</label>
            <label for="customer" class="label">{{$CODetail->customer->name}}</label>
            
        </p>
        <p>
            <label for="createdDate" class="label">Order Date/Time:</label>
            <label for="createdDate" class="label">{{$CODetail->created_at}}</label>
            
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