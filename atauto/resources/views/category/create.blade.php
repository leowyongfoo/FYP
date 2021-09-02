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
                <input class="inputField" type="text" name="name" id="name">
            </p>
            <label for="status">Status:</label>
                <select name="status" id="status" class="form-control">
                    @foreach($statuses as $status)
                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                    @endforeach
                </select>
            <p>
                <input type="submit" name="insert" value="Insert" style="margin-top:15px;"> 
            </p>
        </form>
    </div>
</div>


@endsection