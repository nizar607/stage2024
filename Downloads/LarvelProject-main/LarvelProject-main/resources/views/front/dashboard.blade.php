@extends('layouts.app_front')

@section('content')

<!-- Hero Section -->
<div class="hero-section" style="background: url('{{ asset('assets/images/hero-banner.jpg') }}') no-repeat center center; background-size: cover; padding: 150px 0;">
    <div class="container text-center text-white">
        <h1 class="display-4">Help Us Reduce Food Waste, Help the Homeless</h1>
        <p class="lead">Partner with us to redistribute surplus food to those who need it the most.</p>
        <a href="#restaurants" class="btn btn-lg btn-primary">View Partner Restaurants</a>
    </div>
</div>

<!-- Section for Featured Partners -->
<div class="container my-5">
    <div class="row align-items-center">

    <!-- Description Section -->
    <div class="col-md-6 d-flex flex-column justify-content-center">
        <h2 class="fw-bold mb-4" style="font-size: 2.5rem; color: #2c3e50;">Our Latest Food Rescue Actions</h2>
        <p class="text-muted mb-4" style="font-size: 1.2rem; line-height: 1.6;">
            We partner with restaurants and organizations to rescue surplus food and redistribute it to those in need.
            Take a look at our recent efforts to reduce food waste and provide meals for the homeless.
        </p>
        <p class="fw-light" style="font-size: 1.1rem; color: #34495e;">
            Our partners, such as Restaurant 1, have helped rescue <strong>5,000 meals</strong> in the past month alone.
            Together, we make a significant impact in reducing waste and helping those in need.
        </p>
        <a href="#join-us" class="btn btn-primary btn-lg rounded-pill mt-3" 
        style="background-color: #204d6d; border: none; padding: 12px 30px; font-size: 1.1rem; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
            Join Us Now
        </a>
    </div>



        <!-- Slider Section -->
        <div class="col-md-6">
            <div id="partnerCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <!-- Slide 1 -->
                    <div class="carousel-item active">
                        <img src="{{ asset('assets/images/food-rescue-1.png') }}" class="d-block w-100 rounded" alt="Restaurant 1" style="height: 400px; object-fit: cover;">
                        
                    </div>
                    <!-- Additional Slides -->
                    <div class="carousel-item">
                        <img src="{{ asset('assets/images/food-rescue-2.jpg') }}" class="d-block w-100 rounded" alt="Restaurant 2" style="height: 400px; object-fit: cover;">
                        
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/images/food-rescue-3.jpg') }}" class="d-block w-100 rounded" alt="Restaurant 3" style="height: 400px; object-fit: cover;">
                        
                    </div>
                </div>
                <!-- Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#partnerCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#partnerCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

       
    </div>
</div>

<!-- Partner Restaurants Section -->
<div class="container" id="restaurants">
    <h2 class="text-center mb-4">Our Partner Restaurants</h2>

    @if ($restaurants->isEmpty())
        <div class="alert alert-warning text-center">
            <p>No restaurants available at the moment. Check back soon!</p>
        </div>
    @else
        <div class="row">
            @foreach ($restaurants as $restaurant)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <!-- Restaurant Image -->
                        <img src="{{ $restaurant->image ? asset('storage/' . $restaurant->image) : asset('assets/images/default.jpg') }}" 
                        class="card-img-top" 
                        alt="{{ $restaurant->name }}" 
                        style="width: 410px; height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $restaurant->name }}</h5>
                            <p class="card-text">{{ Str::limit($restaurant->description, 100) }}</p>
                            <ul class="list-unstyled">
                                <li><strong>Address:</strong> {{ $restaurant->address }}</li>
                                <li><strong>Phone:</strong> {{ $restaurant->phone }}</li>
                                <li><strong>Email:</strong> {{ $restaurant->email }}</li>
                            </ul>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('restaurants.show', $restaurant->id) }}" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>


<!-- Mission Statement Section -->
<div class="container-fluid py-5 mt-5 mb-5" style="background: linear-gradient(135deg, #f5f7fa, #c3cfe2);">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h2 class="display-4 fw-bold mb-4" style="color: #1a1a2e;">Our Mission</h2>
                <p class="lead mb-5" style="color: #4b6584; font-size: 1.2rem;">
                    We partner with restaurants and food businesses to collect surplus food and collaborate with 
                    distribution organizations to provide meals to those in need. Together, we aim to reduce food 
                    waste and help fight hunger in our community.
                </p>
                <div class="d-flex justify-content-center align-items-center">
                    <div class="rounded-circle bg-white shadow-lg p-4 mx-3" style="width: 120px; height: 120px;">
                        <img src="{{ asset('assets/images/food-donation.png') }}" class="img-fluid" alt="Food Donation">
                    </div>
                    <div class="rounded-circle bg-white shadow-lg p-4 mx-3" style="width: 120px; height: 120px;">
                        <img src="{{ asset('assets/images/community-support.png') }}" class="img-fluid" alt="Community Support">
                    </div>
                    <div class="rounded-circle bg-white shadow-lg p-4 mx-3" style="width: 120px; height: 120px;">
                        <img src="{{ asset('assets/images/eco-freindly.png') }}" class="img-fluid" alt="Eco-Friendly">
                    </div>
                </div>
                <a href="#learn-more" class="btn btn-lg mt-5" style="background-color: #1a1a2e; color: white; padding: 12px 30px; border-radius: 50px; font-size: 1.1rem;">Learn More</a>
            </div>
        </div>
    </div>
</div>













<!-- Optional Styling -->
<style>
    .carousel-inner img {
        border-radius: 10px;
    }
</style>





@endsection
