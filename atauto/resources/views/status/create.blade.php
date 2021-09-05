@extends('layouts.app')

@section('content')
<div>
    <div class="createForm"> 
        <form class="subform" method="post" action="/status" enctype="multipart/form-data">
            @csrf
            <p>
                <h3>Create Status</h3>
            </p>
            <p>
                <label for="name" class="label">Status Name:</label>
                <input class="inputField" type="text" name="name" id="name">
            </p>
            <p class="hoverColor">
                <input type="submit" name="insert" value="Insert" class="btn btnStyle">
            </p>
        </form>
    </div>
</div>


@endsection