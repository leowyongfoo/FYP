@extends('layouts.app')

@section('content')
<div>
    <div class="createForm"> 
        <form class="subform" method="post" action="/inventory" enctype="multipart/form-data">
            @csrf
            <p>
                <h3>Create Inventory</h3>
            </p>

            <p>
                <label for="name" class="label">Product Name:</label>
                <input class="inputField" type="text" name="name" id="name">
            </p>

            <p>
                <label for="description" class="label">Description:</label>
                <textarea name="description" id="description" class="inputField" cols="30" rows="8"></textarea>
            </p>

            <p>
                <label for="quantity" class="label">Quantity:</label>
                <input class="inputField" type="number" name="quantity" id="quantity">
            </p>
            
            <label for="category">Category:</label>
            <select name="category" id="category" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select><br>

            <p>
                <label for="priceperunit" class="label">Price per unit:</label>
                <input class="inputField" type="text" name="priceperunit" id="priceperunit">
            </p>

            <p>
                <label for="retailPrice" class="label">Retail Price:</label>
                <input class="inputField" type="text" name="retailPrice" id="retailPrice">
            </p>
            
            <p>
                <input type="submit" name="insert" value="Insert">
            </p>
        </form>
    </div>
</div>


@endsection