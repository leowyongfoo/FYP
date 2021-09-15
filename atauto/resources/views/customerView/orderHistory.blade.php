@extends('layouts.app2')

@section('content2')


<div class="dataTables">
		<form>
			@csrf
			<br>
			<h2>Order History</h2>
			<br>
		    <table class="table table-borderless" style="margin-top: 2vh;">
		        <thead>
		        <tr>
		            <th>product_ID</th>
		            <th>Name</th>
		            <th>Quantity</th>
		            <th>Amount</th>
                    <th>Status</th>
                    <th>Order date/time</th>
		        </tr>
		    </thead>
		        <tbody>	
				@php
					$total=0;
				@endphp
                @foreach($myorders as $myorder)
		            <tr>
		                <td>{{$myorder->id}}</td>
		                <td style="max-width:300px">
		                    <h6>{{$myorder->productName}}</h6>		                   
		                </td>
		                
                        <td>{{$myorder->cartQty}}</td>
						@php
							$subtotal = $myorder->cartQty*$myorder->pricePerUnit;
							$total=$total+$subtotal;
						@endphp

                        <td>{{$subtotal}}</td>
		                <td>
		                    {{ $myorder->paymentStatus }}
		                </td>
                        <td>{{$myorder->created_at}}</td>
		            </tr> 
                @endforeach
				 
				<input type="hidden" name="amount" value="{{ $total }}">
		        </tbody>			
		    </table>	
			
		</form>
</div> 
@endsection