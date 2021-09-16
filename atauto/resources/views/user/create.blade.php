@extends('layouts.app')

@section('content')

<div>
    <div class="createForm"> 
        <form class="subform" method="post" action="/user" enctype="multipart/form-data">
            @csrf
            <p>
                <h3>Create User</h3>
            </p>
            <p>
                <label for="username" class="label">Username:</label>
                <input class="inputField form-control" type="text" name="username" id="username" required>
            </p>

            <p>
                <label for="email" class="label">E-mail:</label>
                <input class="inputField form-control" type="email" name="email" id="email" required>
            </p>

            <p>
                <label for="password" class="label">Password:</label>
                <input class="inputField form-control" type="text" name="password" id="password" required>
            </p>

            <p>
                <label for="address" class="label">Address:</label>
                <textarea name="address" id="address" class="inputField form-control" cols="30" rows="8" required></textarea>
            </p>
            
            <p class="hoverColor">
                <input type="submit" name="insert" value="Insert" class="btn btnStyle">
            </p>
        </form>
    </div>
</div>


@endsection