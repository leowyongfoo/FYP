<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATAuto - Inventory Report</title>

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
    <h2>Inventory Report</h2>
    <hr>
    <br>
    <br>
    <div>
            <table>
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Product</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Category</th>
                    <th>Price/Unit</th>
                    <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($inventories as $inventory)
                        <tr>
                        <th>{{$inventory->id}}</th>
                        <td>{{$inventory->productName}}</td>
                        <td>{{$inventory->description}}</td>
                        <td>{{$inventory->quantity}}</td>
                        <td>{{$inventory->category->name}}</td>
                        <td>{{$inventory->pricePerUnit}}</td>
                        <td>{{$inventory->statusID}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</body>
</html>