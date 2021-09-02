@extends('layouts.app')

@section('content')

</style>
<div class="content">
            <div class="dataTables">
                <br>
                <h2>Quotation</h2>
                <br>
                <a href="/quotation.create" class="btn btn-danger">Add New Quotation</a>
                <table class="table table-borderless" style="margin-top: 2vh;">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Product</th>
                        <th scope="col">Description</th>
                        <th scope="col">Quantiy</th>
                        <th scope="col">Agreed price/unit</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($quotations as $quotation)
                        <tr>
                        <th>{{$quotation->id}}</th>
                        <td>{{$quotation->name}}</td>
                        <td>{{$quotation->product}}</td>
                        <td>{{$quotation->description}}</td>
                        <td>{{$quotation->quantity}}</td>
                        <td>{{$quotation->agreedPriceperunit}}</td>
                        <td>{{$quotation->status->name}}</td>
                        <td><a href="{{ route('deleteQuotation', ['id' => $quotation->id]) }}" class="btn btn-danger" onclick="return confirm('Sure Want Delete?')">
                            Delete
                            </a>
                            <a href="/quotation.{{ $quotation->id }}.edit" class="btn btn-warning">
                            Edit
                            </a> </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center pt-4 pl-5">
                    {{ $quotations->links() }}
                </div>
            </div>
        </div>
@endsection