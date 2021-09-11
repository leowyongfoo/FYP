@extends('layouts.app')
@section('content') 


<div class="dataTables">
		<form>
			@csrf
			<br>
			<h2>View Order detail</h2>
			<br>
            @foreach($orders as $order)
            <p>
                <label for="userID" class="label">User name:</label>
                
                <input class="inputField" type="text" name="userID" id="userID" value="{{$order->user->username}}" readonly>
            </p>
            @endforeach
		    <table class="table table-borderless" style="margin-top: 2vh;">
		        <thead>
		        <tr>
		            <th>product-ID</th>
		            <th>Name</th>
		            <th>Quantity</th>
		            <th>Amount</th>
                    <th>paymentStatus</th>
		        </tr>
		    </thead>
		        <tbody>	
				@php
					$total=0;
				@endphp
                @foreach($receivedOrders as $receivedOrder)
		            <tr>
		                <td>{{$receivedOrder->id}}</td>
		                <td style="max-width:300px">
		                    <h6>{{$receivedOrder->productName}}</h6>		                   
		                </td>
		                
                        <td>{{$receivedOrder->cartQty}}</td>
						@php
							$subtotal = $receivedOrder->cartQty*$receivedOrder->pricePerUnit;
							$total=$total+$subtotal;
						@endphp

                        <td>{{$subtotal}}</td>
		                <td>
		                    {{ $receivedOrder->paymentStatus }}
		                </td>
		            </tr> 
                @endforeach
				 
				<input type="hidden" name="amount" value="{{ $total }}">
		        </tbody>			
		    </table>	
			
		</form>
</div> 

@endsection