@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <!-- Text Content -->
        <div class="container text-center text-white position-relative mb-5"
            style="background-color: rgba(0, 0, 0, 0.7); padding: 20px; border-radius: 10px;">
            <h1 class="display-4" style="font-size: 3rem; font-weight: bold; text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.8);">My
                donations</h1>
            <p class="lead" style="font-size: 1.4rem; text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);">Manage your donations
                details for our platform.</p>
        </div>

        <div class="row">
            @foreach ($donations as $donation)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <!-- donation Image -->
                        
                            <img src="https://media.istockphoto.com/id/1391095869/vector/box-with-different-food-donation-food-for-needy-and-poor-people-food-delivery-support-and.jpg?s=612x612&w=0&k=20&c=ZueV_EtHnk1kY4OzWFBnWt4aWGEhc36_O6TRdaRVo0Q=" alt="{{ $donation->name }}"
                                class="card-img-top" style="height: 220px; object-fit: cover;">


                        <div class="card-body">
                            <h5 class="{{ $donation->status == 'pending' ? 'card-title text-warning' : 'card-title text-success' }}">
                                {{ $donation->status }}
                            </h5>
                            
                            <p class="card-text">
                                <strong>From:</strong> {{ $donation->restaurant->name }}<br>
                                <strong>To:</strong> {{ 'organisation 1' }}<br>
                            </p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <form action="{{ route('admin.donations.edit', $donation->id) }}" method="PUT">
                                @csrf
                                @method('PUT')

                                <button type="submit" class="btn btn-sm btn-warning"><i class="mdi mdi-pencil"></i> Edit</button>
                                
                            </form>
                            
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- No donations fallback -->
        @if ($donations->isEmpty())
            <div class="alert alert-warning text-center">
                <strong>No donations found.</strong> Please donate to an organisation!
            </div>
        @endif

        <!-- No donations fallback -->

    </div>
@endsection
