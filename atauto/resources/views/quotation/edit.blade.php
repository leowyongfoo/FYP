@extends('layouts.app')

@section('content')
<div>
                <div class="createForm">
                @foreach($quotations as $quotation)
                    <form class="form-group"  method="post" action="/quotation/{{ $quotation->id }}" enctype="multipart/form-data" >
                    @csrf
                    @method('PATCH')
                    <p>
                        <h3>Edit Quotation</h3>
                    </p>
                    <p>
                        <label for="ID" class="label">Quotation ID</label>
                        <input class="inputField" type="text" name="ID" id="ID" value="{{$quotation->id}}" readonly>
                    </p>
                    <p>
                        <label for="name" class="label">Name</label>
                        <input class="inputField" type="text" name="name" id="name"  value="{{$quotation->name}}" readonly>
                    </p>
                    <p>
                        <label for="agreedPriceperunit" class="label">Agreed price/unit</label>
                        <input class="inputField" type="text" name="agreedPriceperunit" id="agreedPriceperunit" value="{{$quotation->agreedPriceperunit}}">
                    </p>
                    <p>
                        <label for="status">Status:</label>
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