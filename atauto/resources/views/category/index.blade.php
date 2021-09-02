@extends('layouts.app')

@section('content')

<div class="content">
            <div class="dataTables">
                <br>
                <h2>Category</h2>
                <br>
                <a href="/category.create" class="btn btn-danger">Add New Category</a>
                <table class="table table-borderless" style="margin-top: 2vh;">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                        <th>{{$category->id}}</th>
                        <td>{{$category->name}}</td>
                        <td>{{$category->status->name}}</td>
                        <td><a href="{{ route('deleteCategory', ['id' => $category->id]) }}" class="btn btn-danger"
                            onclick="return confirm('Sure Want Delete?')">Delete</a></td>
                        </tr>
                        @endforeach 
                    </tbody>
                </table>
                <div class="d-flex justify-content-center pt-4 pl-5">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>


@endsection