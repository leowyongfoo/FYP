@extends('layouts.app')
@section('content') 
	

<script>
function TotalAmount() {
	
	var prices = document.getElementsByName('pricePerUnit[]');
	
	var total=0;
	
	var cboxes = document.getElementsByName('item[]');    
	var len = cboxes.length;	    
	for (var i=0; i<len; i++) {        
		if(cboxes[i].checked){	//calculate if checked		
			subtotal=parseFloat(prices[i].value)+parseFloat(total);	
			total=subtotal;	
		}				
	}
	document.getElementById('amount').value=total.toFixed(2);
}
</script>   

<div class="container" style="text-align: center;">
	    <div class="row">
        <form  method="post" action="{{ route('create.order') }}" >
            @csrf
		    <table class="table table-striped" style="color:white; width:1100px;">
		        <thead>
		        <tr class="thead-striped ">
		            <th>ID</th>
		            <th>Name</th>
		            <th>Quantity</th>
		            <th>Amount</th>
                    <th>Action</th>
		        </tr>
		    </thead>
		        <tbody>	
                @foreach($mycarts as $mycart)
		            <tr>
		                <td><input type="checkbox" name="item[]" value="{{$mycart->cid}}" onchange="TotalAmount()"/></td>
		                <td style="max-width:300px">
		                    <h6>{{$mycart->productName}}</h6>	                    
		                </td>
                        <td>{{$mycart->cartQty}}</td>
                        
						@php
							$subtotal = $mycart->cartQty * $mycart->pricePerUnit;
						@endphp

                        <td>{{$subtotal}}</td>
						<input type="hidden" value="{{$subtotal}}" name="pricePerUnit[]" id="pricePerUnit[]"/>
		                <td>
		                    <a href="/deleteitem/{{$mycart->cid}}" class="btn btn-danger" onclick="return confirm('Sure Want Delete?')">Delete</a>
		                </td>
		            </tr> 
                @endforeach

                <tr class="thead-dark">
		            <td>&nbsp;</td>
                    <td>&nbsp;</td>
		            <td>&nbsp;</td>                   
		            <td style="color: white;"><h3>Total</h3></td>
		            <td><input type="text" name="amount" id="amount" value="" class="form-control" placeholder="0.00"></td>
                    <td><input type="submit" name="checkout" value="Checkout" class="btn btn-light"></td>
		        </tr>
				</form>
		        </tbody>
		    </table>

	</div>
    </div>
	</body>
@endsection 
