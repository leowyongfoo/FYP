@extends('layouts.app')

@section('content')
<div>
                <div class="createForm">
                @foreach($suppliers as $supplier)
                    <form class="form-group"  method="post" action="/supplier/{{ $supplier->id }}" enctype="multipart/form-data" >
                    @csrf
                    @method('PATCH')
                    <p>
                        <h3>Edit Supplier</h3>
                    </p>

                    <p>
                        <label for="ID" class="label">Supplier ID:</label>
                        <input class="inputField" type="text" name="ID" id="ID" value="{{$supplier->id}}" readonly>
                    </p>

                    <p>
                        <label for="name" class="label">Name:</label>
                        <input class="inputField" type="text" name="name" id="name" value="{{$supplier->name}}">
                    </p>
                    <p>
                        <label for="contact" class="label">Contact:</label>
                        <input class="inputField" type="text" name="contact" id="contact" value="{{$supplier->contact}}">
                    </p>
                   
                    <p>
                        <label for="email" class="label">Email:</label>
                        <input class="inputField" type="email" name="email" id="email" value="{{$supplier->email}}">
                    </p>

                    <p>
                        <label for="address" class="label">Address:</label>
                        <input class="inputField" type="text" name="address" id="address" value="{{$supplier->address}}">
                    </p>

                    @endforeach
                    <p class="hoverColor">
                        <button class="btn btnStyle"type="submit" name="edit" id="edit">edit</button>
                    </p>
                    <p class="hoverColor">
                        <a href="{{route('supplier.index')}}" class="btn btnStyle"onclick="return confirm('Sure Want Cancel?')">
                          Cancel
                        </a>
                    </p>
                    </form>
                    
                </div>
            </div>
@endsection