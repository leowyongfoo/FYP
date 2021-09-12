<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATAuto - Quotation Report</title>
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
    <h2>Quotation Detail Report</h2>
    <hr>
    <br>
    <div>
        <div>
        @foreach($QODetails as $QODetail)
        <p>
            <label for="QO_No" class="label">QO No.:</label>
            <label for="QO_No" class="label">{{$QODetail->id}}</label>
        </p>
        <p>
            <label for="name" class="label">Name:</label>
            <label for="name" class="label">{{$QODetail->name}}</label>
        </p>
        <p>
            <label for="createdDate" class="label">Quotation Date/Time:</label>
            <label for="createdDate" class="label">{{$QODetail->created_at}}</label>
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