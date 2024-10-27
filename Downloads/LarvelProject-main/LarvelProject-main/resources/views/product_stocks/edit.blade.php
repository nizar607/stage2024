@extends('layouts.app_front')

@section('content')
@include('partials._navbar')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="text-center">Edit Product Stock</h2>
                    <form action="{{ route('product_stocks.update', $productStock) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="product_id" class="form-label">Product</label>
                            <select name="product_id" id="product_id" class="form-select" required>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" {{ $productStock->product_id == $product->id ? 'selected' : '' }}>
                                        {{ $product->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" step="0.01" value="{{ $productStock->quantity }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="unit" class="form-label">Unit</label>
                            <select name="unit" id="unit" class="form-select" required>
                                @foreach($units as $unit)
                                    <option value="{{ $unit }}" {{ $productStock->unit == $unit ? 'selected' : '' }}>
                                        {{ ucfirst($unit) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="text-center d-grid">
                            <button type="submit" class="btn btn-lg btn-primary rounded-pill shadow-sm">
                                Update Product Stock
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection