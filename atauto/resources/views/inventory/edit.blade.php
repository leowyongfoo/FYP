@extends('layouts.app')

@section('content')
<div>
                <div class="createForm">
                @foreach($inventories as $inventory)
                    <form class="form-group"  method="post" action="/inventory/{{ $inventory->id }}" enctype="multipart/form-data" >
                    @csrf
                    @method('PATCH')
                        <p>
                            <h3>Edit Inventory</h3>
                        </p>

                        <p>
                            <label for="ID" class="label">Inventory ID</label>
                            <input class="inputField" type="text" name="ID" id="ID" value="{{$inventory->id}}" readonly>
                        </p>

                        <p>
                            <label for="name" class="label">Product Name:</label>
                            <input class="inputField" type="text" name="name" id="name" value="{{$inventory->productName}}">
                        </p>

                        <p>
                            <label for="description" class="label">Description:</label>
                            <textarea name="description" id="description" class="inputField" cols="30" rows="8" >{{$inventory->description}}</textarea>
                        </p>

                        <p>
                            <label for="quantity" class="label">Quantity:</label>
                            <input class="inputField" type="number" name="quantity" id="quantity" value="{{$inventory->quantity}}">
                        </p>
                        
                        <label for="category">Category:</label>
                        <select name="category" id="category" class="form-control">
                        @foreach($categories as $category)
                        <option  value="{{ $category->id }}"
                        @if($inventory->categoryID==$category->id)
                        selected                    
                        @endif
                        >{{ $category->name }}</option>
                        @endforeach
                        </select><br>

                        <p>
                            <label for="priceperunit" class="label">Price per unit:</label>
                            <input class="inputField" type="text" name="priceperunit" id="priceperunit" value="{{$inventory->pricePerUnit}}">
                        </p>

                        <p>
                            <label for="retailPrice" class="label">Retail Price:</label>
                            <input class="inputField" type="text" name="retailPrice" id="retailPrice" value="{{$inventory->retailPrice}}">
                        </p>

                        <p>
                        <label for="image" class="label">upload image:</label><br>
                        <input class="inputField" type="file" name="product-image" placeholder="select image" value=""> 
                        </p>

                        <p class="hoverColor">
                            <input class="btn btnStyle" type="submit" name="insert" value="Insert">
                        </p>
                    </form>
                @endforeach
            </div>
</div>
@endsection