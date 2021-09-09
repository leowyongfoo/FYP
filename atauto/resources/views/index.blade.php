@extends('layouts.app')

@section('content')


<div class="borderbottom">
    <div class="row">
        <div class="col-md-3 content-left">
            <div class="earningsTitle">
                <h5>Earnings (Daily)</h5>
                RM100.00
            </div>

            <div class="earningsTitle">
                <hr style="width: auto; text-align: left; margin: 2vh 0; background-color: white;">
                <h5>Earnings (Monthly)</h5>
                RM12315.00
            </div>

            <div class="earningsTitle">
                <hr style="width: auto; text-align: left; margin: 2vh 0; background-color: white;">
                <h5>Earnings (Annually)</h5>
                RM128093.00
            </div>
        </div>

        <div class="col-md-6 content-mid">
            <h4>Earnings Overview</h4>
            <br>
            <canvas id="myChart" style="width:100%;"></canvas>
        </div>

        <div class="col-md-3 content-right">
            <h1><span id="day"></span></h1>
            <h4><span id="currentDate"></span></h4>
            <h4><span id="time"></span></h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 bottomleft">
        <div class="card shadow text-white bg-dark" style="height: 33vh; border-radius: 10px;">
            <div class="card-body" style="overflow: auto;">
                <h4 class="card-title">Notification</h4>
                <ul>
                    <li>
                        <h5>Notification 1</h5>
                    </li>
                    <li>
                        <h5>Notification 2</h5>
                    </li>
                    <li>
                        <h5>Notification 3</h5>
                    </li>
                    <li>
                        <h5>Notification 4</h5>
                    </li>
                    <li>
                        <h5>Notification 5</h5>
                    </li>
                    <li>
                        <h5>Notification 6</h5>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-6 bottomright">
        <div class="card shadow text-white bg-dark" style=" height: 33vh; border-radius: 10px;">
            <div class="card-body" style="overflow: auto;">
                <h4 class="card-title">Pending Order</h4>
                <table class="table table-borderless" style="margin-top: 2vh;">
                    <thead>
                        <tr>
                        <th scope="col">DO_No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendingOrders as $pendingOrder)
                        <tr>
                        <th>{{$pendingOrder->DO_No}}</th>
                        <td>{{$pendingOrder->supplier->name}}</td>
                        <td>{{$pendingOrder->statusID}}</td>
                        <td class="hoverColor"><a href="{{ route('deliveryOrder.show', ['id' => $pendingOrder->id]) }}" class="btn btnStyle"
                            onclick="return confirm('you will be redirect')">GO-To</a></td>
                        </tr>
                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection