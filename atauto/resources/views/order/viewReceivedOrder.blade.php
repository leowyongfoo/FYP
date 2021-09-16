@extends('layouts.app')
@section('content') 


<div class="dataTables">
		<form>
			@csrf
			<br>
			<h2>Order detail</h2>
			<br>
            @foreach($orders as $order)
            <p>
                <label for="userID" class="label">Username:</label>
                <input class="inputField form-control" type="text" name="userID" id="userID" value="{{$order->user->username}}" readonly>
            </p>

			<p>
                <label for="address" class="label">Address:</label>
                <textarea class="inputField form-control" type="text" name="address" id="address" cols="30" rows="5" readonly>{{$order->user->address}}</textarea>
            </p>
			<p>
                <label for="date" class="label">Order date/time</label>
                <input class="inputField form-control" type="text" name="date" id="date" value="{{$order->created_at}}" readonly>
            </p>
            @endforeach
		    <table class="table table-borderless" style="margin-top: 2vh;">
		        <thead>
		        <tr>
		            <th>Product ID</th>
		            <th>Product Name</th>
		            <th>Quantity</th>
		            <th>Amount</th>
                    <th>Payment Status</th>
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
				 <p>
				 <label for="total" class="label">Total amount:</label>
			     <input  class="inputField form-control" type="text" id="total" name="amount" value="RM {{ $total }}" readOnly>
			    </p> 
				
		        </tbody>			
		    </table>	
			
		</form>
</div> 

@endsection