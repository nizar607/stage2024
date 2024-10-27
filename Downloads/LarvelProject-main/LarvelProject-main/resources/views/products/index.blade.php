@extends('layouts.app_front')

@section('content')
@include('partials._navbar')

<div class="container">
    <h1 class="text-center">Products</h1>
    <div class="row mb-4 align-items-center">
        <div class="col-md-6">
            <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
        </div>
        <div class="col-md-6">
            <form action="{{ route('products.index') }}" method="GET" class="d-flex justify-content-end">
                <select name="category" class="form-control me-2" style="max-width: 200px;">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
        </div>
    </div>
    
    <div class="row">
        @forelse ($products as $product)
        <div class="col-md-4">
            <div class="card mb-4">
                @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 370px; height: 200px; object-fit: cover;">
                @else
                    <img src="{{ asset('default-image.jpg') }}" style="width: 20px; height: 20px;" class="card-img-top" alt="Default Image">
                @endif
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">Description: {{ $product->description }}</p>
                    <p class="card-text"><strong>Category: {{ $product->category->name }}</strong></p>
                    <p class="card-text">Stock: {{ $product->stock_quantity }} {{ $product->stock_unit }}</p>
                    <p class="card-text">Expiration Date: {{ $product->expiration_date }}</p>

                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-warning text-center">
                <strong>No products found.</strong> Please add a product or try a different filter!
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection