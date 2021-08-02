@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <h3 class="text-white mb-4">Category</h3>
                    <div class="card ">
                        <div class="card-header py-3">
                            <p class="text-dark m-0 fw-bold">Overview</p>
                        </div>
                        <div class="card-body">

                                <table class="table my-0" id="dataTable">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{$category->id}}</td>
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->status->name}}</td>
                                           <td><a href="{{ route('deleteCategory', ['id' => $category->id]) }}" class="btn btn-danger"
                                                 onclick="return confirm('Sure Want Delete?')">Delete</a>
                                           </td>
                                        </tr>
                                    @endforeach  
                                </table>
                                <div class="text-center">
                                {{ $categories->links() }}
                        </div>
                        </div>
                        
                    </div>
</div>


@endsection