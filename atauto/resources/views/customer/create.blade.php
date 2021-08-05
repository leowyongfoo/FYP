@extends('layouts.app')

@section('content')

<div>
    <div style="text-align:center"> 
        <form class="subform" method="post" action="/customer" enctype="multipart/form-data">
            @csrf
            <p>
                <label for="name" class="label">Customer Name</label>
                <input type="text" name="name" id="name">
            </p>

            <p>
                <label for="contact" class="label">Contact number</label>
                <input type="text" name="contact" id="contact">
            </p>

            <p>
                <label for="email" class="label">E-mail</label>
                <input type="email" name="email" id="email">
            </p>

            <p>
                <label for="address" class="label">Address</label>
                <input type="text" name="address" id="address" value="address">
            </p>
            
            <p>
                <input type="submit" name="insert" value="Insert">
            </p>
        </form>
    </div>
</div>


@endsection