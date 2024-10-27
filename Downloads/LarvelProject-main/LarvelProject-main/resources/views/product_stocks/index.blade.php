@extends('layouts.app_front')

@section('content')
@include('partials._navbar')

<div class="container">
    <h1 class="text-center">Product Stocks</h1>
    <div class="row mb-4 align-items-center">
        <div class="col-md-6">
            <a href="{{ route('product_stocks.create') }}" class="btn btn-primary">Add New Stock</a>
        </div>
    </div>
    
    <div class="row">
        @forelse ($productStocks as $stock)
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $stock->product->name }}</h5>
                    <p class="card-text">Quantity: {{ $stock->quantity }}</p>
                    <p class="card-text"><strong>Unit: {{ $stock->unit }}</strong></p>

                    <a href="{{ route('product_stocks.edit', $stock->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('product_stocks.destroy', $stock->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-warning text-center">
                <strong>No product stocks found.</strong> Please add a product stock!
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection