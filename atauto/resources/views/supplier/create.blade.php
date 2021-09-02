@extends('layouts.app')

@section('content')
<div>
    <div class="createForm"> 
        <form class="subform" method="post" action="/supplier" enctype="multipart/form-data">
            @csrf
            <p>
                <h3>Create Supplier</h3>
            </p>
            <p>
                <label for="name" class="label">Supplier Name:</label>
                <input class="inputField" type="text" name="name" id="name">
            </p>

            <p>
                <label for="contact" class="label">Contact number:</label>
                <input class="inputField" type="text" name="contact" id="contact">
            </p>

            <p>
                <label for="email" class="label">E-mail:</label>
                <input class="inputField" type="email" name="email" id="email">
            </p>

            <p>
                <label for="address" class="label">Address:</label>
                <input class="inputField" type="text" name="address" id="address">
            </p>
            
            <p>
                <input type="submit" name="insert" value="Insert">
            </p>
        </form>
    </div>
</div>


@endsection