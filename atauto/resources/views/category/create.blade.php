@extends('layouts.app')

@section('content')
<style>
.subform
{
    max-width: 1208px;
    margin: 0 auto;
    max-width: 75.5rem;
}
</style>
<div>
    <div style="text-align:center"> 
        <form class="subform" method="post" action="/category" enctype="multipart/form-data">
            @csrf
            <p>
                <label for="name" class="label">Category Name</label>
                <input type="text" name="name" id="name">
            </p>
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