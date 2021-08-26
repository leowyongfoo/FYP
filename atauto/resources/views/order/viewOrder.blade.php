@extends('layouts.app')
@section('content') 


<div class="container"><br><br><br>
	    <div class="row" style="float:right;">
		<form   method="post" action="#" >
			@csrf
		    <table class="table table-striped table-light"  Style="outline: 5px groove black;">
				
		        <thead>
		        <tr class="thead-white">
		            <th>ID</th>
		            <th>Name</th>
		            <th>quantity</th>
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
				 
				<tr class="thead-dark">
		        <td>&nbsp;</td>
                <td>&nbsp;</td>
		        <td>&nbsp;</td>                   
		        <td>&nbsp;</td>
		        <td><input type="hidden" name="amount" value="{{ $total }}"></td>
                <td><input type="submit" name="paynow" value="Pay Now" class="btn btn-dark"></td>
				
		    </tr>
		</form>					
		        </tbody>			
		    </table>		

	</div>
    </div> 
	</body>
@endsection