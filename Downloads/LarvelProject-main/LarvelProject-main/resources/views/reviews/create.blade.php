@extends('layouts.app_front')

@section('content')
<!-- Hero Section -->
<!-- Hero Section with Form -->
<div class="hero-section position-relative" style="background: url('{{ asset('assets/images/partner.png') }}') no-repeat center center; background-size: cover; padding: 80px 0 120px;">
    <!-- Overlay -->
     <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5);"></div>
    
        <!-- Text Content -->
        <div class="container text-center text-white position-relative mb-5" style="background-color: rgba(0, 0, 0, 0.7); padding: 20px; border-radius: 10px;">
            <h1 class="display-4" style="font-size: 3rem; font-weight: bold; text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.8);">Partner with Us to Help the Homeless</h1>
            <p class="lead" style="font-size: 1.4rem; text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);">Join our community by adding your restaurant to help distribute surplus food to those in need.</p>
        </div>

    
    <!-- Content with Form -->
    <div class="container text-white position-relative">
        <div class="row">
            <!-- Form Section -->
            <div class="col-md-8">
                <div class="card shadow-lg">
                   
                    <div class="card-body p-4">

                        {{-- route('reviews.store') --}}

                        <form action="{{ route('reviews.update', $review->id) : route('reviews.update', $review->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($review))
                                @method('PUT')
                            @endif
                            
                            <!-- Restaurant Name -->
                            <div class="form-group mb-3">
                                <label for="restaurant_id" class="form-label">
                                    <i class="mdi mdi-storefront"></i> Restaurant Name
                                </label>

                            </div>
                            

                            <div class="d-grid">
                                <button type="submit" class="btn btn-lg btn-success rounded-pill shadow-sm">
                                    <i class="mdi mdi-send"></i> {{ isset($review) ? 'Update' : 'Donate' }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Sidebar with Info -->
            <div class="col-md-4">
                <div class="card shadow-lg text-center">
                    <div class="card-body">
                        <h5 class="card-title">Why Join Us?</h5>
                        <p class="card-text">By partnering with us, you can help reduce food waste and support the community by providing surplus food to the homeless.</p>
                        <img src="{{ asset('assets/images/helping.jpg') }}" class="img-fluid rounded shadow-sm mt-3" alt="Helping Hands">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>







@endsection
