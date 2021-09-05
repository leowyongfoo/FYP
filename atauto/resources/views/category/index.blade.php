@extends('layouts.app')

@section('content')

<div class="content">
            <div class="dataTables">
                <br>
                <h2>Category</h2>
                <br>
                <div class="hoverColor"><a href="/category.create" class="btn btnStyleLighter">Add New Category</a></div>
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
                        <td>{{$category->statusID}}</td>
                        <td class="hoverColor"><a href="{{ route('deleteCategory', ['id' => $category->id]) }}" class="btn btnStyle"
                            onclick="return confirm('Sure Want Delete?')">Delete</a>
                            
                            <a href="{{ route('changeStatus', ['id' => $category->id]) }}" class="btn btnStyle">{{$category->statusID}}</a>
                        </td>
                        
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