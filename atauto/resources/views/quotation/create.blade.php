@extends('layouts.app')

@section('content')
<div>
    <div class="createForm"> 
        <form class="subform" method="post" action="/quotation" enctype="multipart/form-data">
            @csrf
            <p>
                <h3>Create Quotation</h3>
            </p>

            <p>
                <label for="name" class="label">Customer Name:</label>
                <input class="inputField" type="text" name="name" id="name">
            </p>

            <p>
                <label for="product" class="label">Product:</label>
                <input class="inputField" type="text" name="product" id="product">
            </p>

            <p>
                <label for="description" class="label">Description:</label>
                <input class="inputField" type="text" name="description" id="description">
            </p>
            <p>
                <label for="quantity" class="label">Quantity:</label>
                <input class="inputField" type="number" name="quantity" id="quantity">
            </p>
            <p>
                <label for="agreedPriceperunit" class="label">Agreed price/unit:</label>
                <input class="inputField" type="text" name="agreedPriceperunit" id="agreedPriceperunit">
            </p>
            <p>
                <label for="status">Status:</label>
                <select name="status" id="status" class="form-control">
                @foreach($statuses as $status)
                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                @endforeach
                </select>
            </p>
            <p>
                <input type="submit" name="insert" value="Insert">
            </p>
        </form>
    </div>
</div>


@endsection