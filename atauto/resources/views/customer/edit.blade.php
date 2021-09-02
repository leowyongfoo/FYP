@extends('layouts.app')

@section('content')
<div>
                <div class="createForm">
                @foreach($customers as $customer)
                    <form class="form-group"  method="post" action="/customer/{{ $customer->id }}" enctype="multipart/form-data" >
                    @csrf
                    @method('PATCH')
                    <p>
                        <h3>Edit Customer</h3>
                    </p>

                    <p>
                        <label for="ID" class="label">Customer ID:</label>
                        <input class="inputField" type="text" name="ID" id="ID" value="{{$customer->id}}" readonly>
                    </p>

                    <p>
                        <label for="name" class="label">Name:</label>
                        <input class="inputField" vtype="text" name="name" id="name" value="{{$customer->name}}">
                    </p>
                    <p>
                        <label for="contact" class="label">Contact:</label>
                        <input class="inputField" type="text" name="contact" id="contact" value="{{$customer->contact}}">
                    </p>
                   
                    <p>
                        <label for="email" class="label">Email:</label>
                        <input class="inputField" type="email" name="email" id="email" value="{{$customer->email}}">
                    </p>

                    <p>
                        <label for="address" class="label">Address:</label>
                        <input class="inputField" type="text" name="address" id="address" value="{{$customer->address}}">
                    </p>

                    @endforeach
                    <p>
                        <button class="btn btn-primary"type="submit" name="edit" id="edit">edit</button>
                    </p>
                    <p>
                        <a href="{{route('customer.index')}}" class="btn btn-danger"onclick="return confirm('Sure Want Cancel?')">
                          Cancel
                        </a>
                    </p>
                    </form>
                    
                </div>
            </div>
@endsection