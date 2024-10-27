@extends('layouts.app_front')

@section('content')
    <!-- Hero Section -->
    <div class="hero-section position-relative"
        style="background: url('{{ asset('assets/images/partner.png') }}') no-repeat center center; background-size: cover; padding: 80px 0 120px;">
        <!-- Overlay -->
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5);"></div>

        <!-- Text Content -->
        <div class="container text-center text-white position-relative mb-5"
            style="background-color: rgba(0, 0, 0, 0.7); padding: 20px; border-radius: 10px;">
            <h1 class="display-4" style="font-size: 3rem; font-weight: bold; text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.8);">
                {{ isset($restaurant) ? 'Edit Restaurant' : 'Add Restaurant' }}</h1>
            <p class="lead" style="font-size: 1.4rem; text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);">Manage your restaurant
                details for our platform.</p>
        </div>

        <!-- Content with Form -->
        <div class="container text-white position-relative">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-lg">
                        <div class="card-body p-4">
                            <form action="{{ route('donations.update', $donation->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <label class="form-label" for="">Change Restaurant :</label>
                                <!-- Restaurant Name -->
                                <select name="restaurant_id" class="form-control rounded-pill shadow-sm my-3" required>
                                    <option value="" disabled>Select a Restaurant</option>
                                    @foreach ($restaurants as $restaurant)
                                        <option value="{{ $restaurant->id }}"
                                            {{ (old('restaurant_id') ?? $donation->restaurant_id) == $restaurant->id ? 'selected' : '' }}>
                                            {{ $restaurant->name }}
                                        </option>
                                    @endforeach
                                </select>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-lg btn-success rounded-pill shadow-sm">
                                        <i class="mdi mdi-send"></i> Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
