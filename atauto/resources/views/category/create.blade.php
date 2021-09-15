@extends('layouts.app')

@section('content')
<div>
    <div class="createForm"> 
        <form class="subform" method="post" action="/category" enctype="multipart/form-data">
            @csrf
            <p>
                <h3>Create Category</h3>
            </p>

            <p>
                <label for="name" class="label">Category Name:</label>
                <input class="inputField form-control" type="text" name="name" id="name" required>
            </p>
            <p class="hoverColor">
                <input type="submit" name="insert" value="Insert" class="btn btnStyleLighter"> 
            </p>
        </form>
    </div>
</div>


@endsection