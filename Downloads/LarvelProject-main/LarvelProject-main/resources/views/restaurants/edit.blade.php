@extends('layouts.app_front')

@section('content')
<!-- Hero Section -->
<div class="hero-section position-relative" style="background: url('{{ asset('assets/images/partner.png') }}') no-repeat center center; background-size: cover; padding: 80px 0 120px;">
    <!-- Overlay -->
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5);"></div>

    <!-- Text Content -->
    <div class="container text-center text-white position-relative mb-5" style="background-color: rgba(0, 0, 0, 0.7); padding: 20px; border-radius: 10px;">
        <h1 class="display-4" style="font-size: 3rem; font-weight: bold; text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.8);">{{ isset($restaurant) ? 'Edit Restaurant' : 'Add Restaurant' }}</h1>
        <p class="lead" style="font-size: 1.4rem; text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);">Manage your restaurant details for our platform.</p>
    </div>

    <!-- Content with Form -->
    <div class="container text-white position-relative">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body p-4">
                        <form action="{{ isset($restaurant) ? route('restaurants.update', $restaurant->id) : route('restaurants.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($restaurant))
                                @method('PUT')
                            @endif

                            <!-- Restaurant Name -->
                            <div class="form-group mb-3">
                                <label for="name" class="form-label"><i class="mdi mdi-storefront"></i> Restaurant Name</label>
                                <input type="text" name="name" class="form-control rounded-pill shadow-sm" value="{{ old('name', $restaurant->name ?? '') }}" required>
                            </div>

                            <!-- Address -->
                            <div class="form-group mb-3">
                                <label for="address" class="form-label"><i class="mdi mdi-map-marker"></i> Address</label>
                                <input type="text" name="address" class="form-control rounded-pill shadow-sm" value="{{ old('address', $restaurant->address ?? '') }}" required>
                            </div>

                            <!-- Phone -->
                            <div class="form-group mb-3">
                                <label for="phone" class="form-label"><i class="mdi mdi-phone"></i> Phone</label>
                                <input type="text" name="phone" class="form-control rounded-pill shadow-sm" value="{{ old('phone', $restaurant->phone ?? '') }}" required>
                            </div>

                            <!-- Email -->
                            <div class="form-group mb-3">
                                <label for="email" class="form-label"><i class="mdi mdi-email"></i> Email</label>
                                <input type="email" name="email" class="form-control rounded-pill shadow-sm" value="{{ old('email', $restaurant->email ?? '') }}" required>
                            </div>

                            <!-- Image Upload -->
                            <div class="form-group mb-3">
                                <label for="image" class="form-label"><i class="mdi mdi-image"></i> Restaurant Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <!-- Status for Admins -->
                            @if(isset($restaurant) && auth()->user()->role == 'admin')
                            <div class="form-group mb-3">
                                <label for="status" class="form-label"><i class="mdi mdi-check-circle"></i> Status</label>
                                <select name="status" class="form-control rounded-pill shadow-sm">
                                    <option value="pending" {{ old('status', $restaurant->status ?? 'pending') == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="approved" {{ old('status', $restaurant->status ?? '') == 'approved' ? 'selected' : '' }}>Approved</option>
                                </select>
                            </div>
                            @endif

                            <div class="d-grid">
                                <button type="submit" class="btn btn-lg btn-success rounded-pill shadow-sm">
                                    <i class="mdi mdi-send"></i> {{ isset($restaurant) ? 'Update' : 'Submit' }}
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
