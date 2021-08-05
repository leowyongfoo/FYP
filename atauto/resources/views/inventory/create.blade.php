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
        <form class="subform" method="post" action="/inventory" enctype="multipart/form-data">
            @csrf
            <p>
                <label for="name" class="label">Product Name</label>
                <input type="text" name="name" id="name">
            </p>

            <p>
                <label for="description" class="label">Description</label>
                <input type="text" name="description" id="description">
            </p>

            <p>
                <label for="quantity" class="label">Quantity</label>
                <input type="number" name="quantity" id="quantity">
            </p>
            
            <select name="category" id="category" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <p>
                <label for="priceperunit" class="label">Price per unit</label>
                <input type="text" name="priceperunit" id="priceperunit">
            </p>

            <p>
                <label for="retailPrice" class="label">Retail Price</label>
                <input type="text" name="retailPrice" id="retailPrice">
            </p>
            
            <select name="status" id="status" class="form-control">
                @foreach($statuses as $status)
                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                @endforeach
            </select>
            

            <p>
                <input type="submit" name="insert" value="Insert">
            </p>
        </form>
    </div>
</div>


@endsection