@extends('layouts.app')

@section('content')
<div class="container" >
                <div class="row" style="text-align:right">
                @foreach($suppliers as $supplier)
                    <form class="form-group"  method="post" action="/supplier/{{ $supplier->id }}" enctype="multipart/form-data" >
                    @csrf
                    @method('PATCH')
                    <p>
                        <h3>Edit Supplier</h3>
                    </p>

                    <p>
                        <label for="ID" class="label">Supplier ID</label>
                        <input type="text" name="ID" id="ID" value="{{$supplier->id}}" readonly>
                    </p>

                    <p>
                        <label for="name" class="label">Name</label>
                        <input type="text" name="name" id="name" value="{{$supplier->name}}">
                    </p>
                    <p>
                        <label for="contact" class="label">Contact</label>
                        <input type="text" name="contact" id="contact" value="{{$supplier->contact}}">
                    </p>
                   
                    <p>
                        <label for="email" class="label">Email</label>
                        <input type="email" name="email" id="email" value="{{$supplier->email}}">
                    </p>

                    @endforeach
                    <p>
                        <button class="btn btn-primary"type="submit" name="edit" id="edit">edit</button>
                    </p>
                    <p>
                        <a href="{{route('supplier.index')}}" class="btn btn-danger"onclick="return confirm('Sure Want Cancel?')">
                          Cancel
                        </a>
                    </p>
                    </form>
                    
                </div>
            </div>
@endsection