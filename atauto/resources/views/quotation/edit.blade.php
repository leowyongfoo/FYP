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
                        <input class="inputField" type="text" name="name" id="name"  value="{{$quotation->name}}">
                    </p>

                    @endforeach
                    <p class="hoverColor">
                        <button class="btn btnStyle" type="submit" name="edit" id="edit">Edit</button>
                    </p>
                    <p class="hoverColor">
                        <a href="{{route('quotation.index')}}" class="btn btnStyle"onclick="return confirm('Sure Want Cancel?')">
                          Cancel
                        </a>
                    </p>
                    </form>
                    
                </div>
            </div>
@endsection