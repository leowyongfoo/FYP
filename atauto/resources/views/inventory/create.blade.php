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
                <input class="inputField form-control" type="text" name="name" id="name" required>
            </p>

            <p>
                <label for="description" class="label">Description:</label>
                <textarea name="description" id="description" class="inputField form-control" cols="30" rows="8" required></textarea>
            </p>

            <p>
                <label for="quantity" class="label">Quantity:</label>
                <input class="inputField form-control" type="number" name="quantity" id="quantity" required>
            </p>
            
            <label for="category">Category:</label>
            <select name="category" id="category" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select><br>

            <p>
                <label for="priceperunit" class="label">Price per unit: RM</label>
                <input class="inputField form-control" type="text" name="priceperunit" id="priceperunit" required>
            </p>

            <p>
                <label for="retailPrice" class="label">Retail Price:</label>
                <input class="inputField form-control" type="text" name="retailPrice" id="retailPrice" required>
            </p>

            <p>
                <label for="image" class="label">Upload Image:</label><br>
                <input class="inputField" type="file" name="product-image" placeholder="select image" required>
            </p>
            
            <p class="hoverColor">
                <input type="submit" name="insert" value="Insert" class="btn btnStyleLighter" required>
            </p>
        </form>
    </div>
</div>


@endsection