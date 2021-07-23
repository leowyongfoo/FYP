@extends('layouts.app')

@section('content')
<div>
    <div style="text-align:center"> 
        <form class="subform" method="post" action="/status" enctype="multipart/form-data">
            @csrf
            <p>
                <label for="name" class="label">Status Name</label>
                <input type="text" name="name" id="name">
            </p>
            <p>
                <input type="submit" name="insert" value="Insert">
            </p>
        </form>
    </div>
</div>


@endsection