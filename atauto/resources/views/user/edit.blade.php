@extends('layouts.app')

@section('content')

<div>
    <div class="createForm"> 
    @foreach($customers as $customer)
        <form class="subform" method="post" action="/user/{{ $customer->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <p>
                <h3>Edit User</h3>
            </p>
            <p>
                <label for="ID" class="label">ID:</label>
                <input class="inputField" type="text" name="ID" id="ID" value="{{$customer->id}}" readonly>
            </p>
            <p>
                <label for="username" class="label">Username:</label>
                <input class="inputField" type="text" name="username" id="username" value="{{$customer->username}}">
            </p>

            <p>
                <label for="email" class="label">E-mail:</label>
                <input class="inputField" type="email" name="email" id="email" value="{{$customer->email}}">
            </p>

            <p>
                <label for="password" class="label">Password:</label>
                <input class="inputField" type="text" name="password" id="password" value="{{$customer->password}}">
            </p>
            @endforeach
            <p class="hoverColor">
                <input type="submit" name="insert" value="Insert" class="btn btnStyle">
            </p>
        </form>
    </div>
</div>


@endsection