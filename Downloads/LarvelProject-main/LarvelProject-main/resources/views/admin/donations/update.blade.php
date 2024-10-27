@extends('layouts.app')

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
                {{ isset($restaurant) ? 'Edit Restaurant' : 'Update Donation' }}</h1>
            <p class="lead" style="font-size: 1.4rem; text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);">Manage your Donation</p>
        </div>

        <!-- Content with Form -->
        <div class="container text-white position-relative">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-lg">
                        <div class="card-body p-4">

                            <form action="{{ route('admin.donations.update', $donation->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT') 
                            
                                <div class="form-group mb-3">
                                    <label for="address" class="form-label"><i class="mdi mdi-map-marker"></i> Donation</label>
                                    <input type="text" disabled name="address" class="form-control rounded-pill shadow-sm" value="{{ old('restaurant_name', $donation->restaurant->name ?? '') }}" required>
                                </div>
                            
                                {{-- Status --}}
                                <div class="form-group mb-3">
                                    <label for="restaurant_id" class="form-label">
                                        <i class="mdi mdi-storefront"></i> Status
                                    </label>
                            
                                    <select name="status" class="form-control rounded-pill shadow-sm" required>
                                        <option value="" disabled>Select a status</option>
                                        <option value="pending" {{ (old('status', $donation->status) == 'pending') ? 'selected' : '' }}>Pending</option>
                                        <option value="valid" {{ (old('status', $donation->status) == 'valid') ? 'selected' : '' }}>Valid</option>
                                    </select>
                                </div>
                            
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-lg btn-success rounded-pill shadow-sm">
                                        <i class="mdi mdi-send"></i> {{ isset($donation) ? 'Update' : 'Donate' }}
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
