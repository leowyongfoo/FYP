@extends('layouts.app')
@section('content') 


<div class="dataTables">
		<form method="POST" action="{!! URL::to('paypal') !!}" >
			@csrf
			<br>
			<h2>View Order</h2>
			<br>
		    <table class="table table-borderless" style="margin-top: 2vh;">
		        <thead>
		        <tr>
		            <th>ID</th>
		            <th>Name</th>
		            <th>Quantity</th>
		            <th>Amount</th>
                    <th>Status</th>
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
		            </tr> 
                @endforeach
				 
				<input type="hidden" name="amount" value="{{ $total }}">
		        </tbody>			
		    </table>	
			<div class="hoverColor"><input type="submit" name="paynow" value="Pay Now" class="btn btnStyleLighter"></div>	
		</form>
</div> 

@endsection