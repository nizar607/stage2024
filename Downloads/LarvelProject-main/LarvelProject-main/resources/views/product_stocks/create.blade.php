@extends('layouts.app_front')

@section('content')
@include('partials._navbar')

<div class="hero-section position-relative" style="padding: 80px 0 120px;">
    <div style="background: url('{{ asset('assets/images/donnation/donnation3.jpg') }}') no-repeat center center;
     background-size: cover; position: absolute; top: 0; left: 0; right: 0; bottom: 0; opacity: 0.7; 
     z-index: 0;"></div>
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="text-center">Add New Product Stock</h2>
                    <form action="{{ route('product_stocks.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="product_id" class="form-label">Product</label>
                            <select name="product_id" id="product_id" class="form-select" required>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" step="0.01" required>
                        </div>

                        <div class="mb-3">
                            <label for="unit" class="form-label">Unit</label>
                            <select name="unit" id="unit" class="form-select" required>
                                @foreach($units as $unit)
                                    <option value="{{ $unit }}">{{ ucfirst($unit) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="text-center d-grid">
                            <button type="submit" class="btn btn-lg btn-success rounded-pill shadow-sm">
                                Add Product Stock
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
</div>