@extends('layouts.app_front')

@section('content')
@include('partials._navbar')

<div class="hero-section position-relative" style="padding: 80px 0 120px;">
    
    <div style="background: url('{{ asset('assets/images/donnation/donnation3.jpg') }}') no-repeat center center;
     background-size: cover; position: absolute; top: 0; left: 0; right: 0; bottom: 0; opacity: 0.7; 
     z-index: 0;"></div>
    


<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="text-center">Add Product</h2>
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="category_id" class="form-label">Category</label>
                                <select class="form-select" id="category_id" name="category_id" required>
                                    <option value="" disabled selected>Please Select</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="expiration_date" class="form-label">Expiration Date</label>
                                <input type="date" class="form-control" id="expiration_date" name="expiration_date" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Product Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>

                        <div class="text-center d-grid">
                        <button type="submit" class="btn btn-lg btn-success rounded-pill shadow-sm">
                        Save Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
</div>