@extends('layouts.app')

@section('content')

<div class="content">
<div class="dataTables">
    <h3 class="text-white mb-4">Quotation</h3>
    <a href="/quotation.create" class="btn btn-danger">Add New Quotation</a>
                    <div class="card ">
                        <div class="card-header py-3">
                            <p class="text-dark m-0 fw-bold">Overview</p>
                        </div>
                        <div class="card-body">
                            <div>
                                <table class="table my-0" id="dataTable">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Agreed price/unit</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                                        
                                @foreach($quotations as $quotation)
                                    <tr>
                                        <td>{{$quotation->id}}</td>
                                        <td>{{$quotation->name}}</td>
                                        <td>{{$quotation->agreedPriceperunit}}</td>
                                        <td>{{$quotation->status->name}}</td>
                                        <td><a href="{{ route('deleteQuotation', ['id' => $quotation->id]) }}" class="btn btn-danger" onclick="return confirm('Sure Want Delete?')">
                                            Delete
                                            </a>
                                            <a href="/quotation.{{ $quotation->id }}.edit" class="btn btn-warning">
                                            <i class="fas fa-edit">Edit</i>
                                            </a> 
                                            <a href="/quotation.{{ $quotation->id }}" class="btn btn-success">
                                                View detail
                                            </a> 
                                    </td>
                                    </tr>
                                @endforeach   
                            </table> 
                            <div class="d-flex justify-content-center pt-4">
                                {{ $quotations->links() }}
                            </div>
        </div>
        </div>
@endsection