@extends('layouts.app_front')

@section('content')
<div class="container mt-5">
     <!-- Text Content -->
     <div class="container text-center text-white position-relative mb-5" style="background-color: rgba(0, 0, 0, 0.7); padding: 20px; border-radius: 10px;">
        <h1 class="display-4" style="font-size: 3rem; font-weight: bold; text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.8);">My Restaurants</h1>
        <p class="lead" style="font-size: 1.4rem; text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);">Manage your restaurant details for our platform.</p>
    </div>
    <h1 class="text-center mb-4"></h1>

    <div class="row">
        @foreach ($restaurants as $restaurant)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <!-- Restaurant Image -->
                    @if($restaurant->image)
                        <img src="{{ asset('storage/' . $restaurant->image) }}" alt="{{ $restaurant->name }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                    @else
                        <img src="{{ asset('storage/restaurant_images/default.jpg') }}" alt="No Image" class="card-img-top" style="height: 200px; object-fit: cover;">
                    @endif
                    
                    <div class="card-body">
                        <h5 class="card-title">{{ $restaurant->name }}</h5>
                        <p class="card-text">
                            <strong>Address:</strong> {{ $restaurant->address }}<br>
                            <strong>Phone:</strong> {{ $restaurant->phone }}<br>
                            <strong>Email:</strong> {{ $restaurant->email }}
                        </p>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('restaurants.edit', $restaurant->id) }}" class="btn btn-sm btn-warning">
                            <i class="mdi mdi-pencil"></i> Edit
                        </a>
                        <form action="{{ route('restaurants.destroy', $restaurant->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="mdi mdi-delete"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- No restaurants fallback -->
    @if($restaurants->isEmpty())
        <div class="alert alert-warning text-center">
            <strong>No restaurants found.</strong> Please add a restaurant to get started!
        </div>
    @endif
</div>
@endsection
