@extends('layouts.app')

@section('content')
<div class="container" >
                <div class="row" style="text-align:right">
                @foreach($quotations as $quotation)
                    <form class="form-group"  method="post" action="/quotation/{{ $quotation->id }}" enctype="multipart/form-data" >
                    @csrf
                    @method('PATCH')
                    <p>
                        <h3>Edit Quotation</h3>
                    </p>
                    <p>
                        <label for="ID" class="label">Quotation ID</label>
                        <input type="text" name="ID" id="ID" value="{{$quotation->id}}" readonly>
                    </p>
                    <p>
                        <label for="name" class="label">Name</label>
                        <input type="text" name="name" id="name"  value="{{$quotation->name}}" readonly>
                    </p>

                    <p>
                        <label for="product" class="label">Product</label>
                        <input type="text" name="product" id="product" value="{{$quotation->product}}">
                    </p>

                    <p>
                        <label for="description" class="label">Description</label>
                        <input type="text" name="description" id="description" value="{{$quotation->description}}">
                    </p>
                    <p>
                        <label for="quantity" class="label">Quantity</label>
                        <input type="number" name="quantity" id="quantity" value="{{$quotation->quantity}}">
                    </p>
                    <p>
                        <label for="agreedPriceperunit" class="label">Agreed price/unit</label>
                        <input type="text" name="agreedPriceperunit" id="agreedPriceperunit" value="{{$quotation->agreedPriceperunit}}">
                    </p>
                    <p>
                    <select name="status" id="status" class="form-control">
                        @foreach($statuses as $status)
                            <option value="{{ $status->id }}"  
                                @if($quotation->statusID==$status->id)
                                selected                   
                                @endif
                                >{{ $status->name }}</option>
                                @endforeach
                    </select>
                    </p>

                    @endforeach
                    <p>
                        <button class="btn btn-primary"type="submit" name="edit" id="edit">edit</button>
                    </p>
                    <p>
                        <a href="{{route('quotation.index')}}" class="btn btn-danger"onclick="return confirm('Sure Want Cancel?')">
                          Cancel
                        </a>
                    </p>
                    </form>
                    
                </div>
            </div>
@endsection