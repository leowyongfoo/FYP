@extends('layouts.app')

@section('content')

<div>
            <div class="dataTables">
                <br>
                <h2>Received Order</h2>
                <br>
                <table class="table table-borderless" style="margin-top: 2vh;">
                    <thead>
                        <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">User ID</th>
                        <th scope="col">Payment Status</th>
                        <th scope="col">Total Amount</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                        <th>{{$order->id}}</th>
                        <td>{{$order->userID}}</td>
                        <td>{{$order->paymentStatus}}</td>
                        <td>{{$order->amount}}</td>
                        <td class="hoverColor">
                            <a href="{{ route('viewReceivedOrder', ['id' => $order->id]) }}" class="btn btnStyle">
                                View
                            </a>
                        </td>
                        </tr>
                        @endforeach 
                    </tbody>
                </table>
                <div class="d-flex justify-content-center pt-4 pl-5">
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
@endsection