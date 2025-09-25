@extends('layouts.app')

@section('title', 'Track Your Shipment')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Track Your Shipment</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('tracking.track') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="tracking_number" class="form-label">Enter Tracking Number</label>
                            <input type="text" 
                                   class="form-control form-control-lg @error('tracking_number') is-invalid @enderror" 
                                   id="tracking_number" 
                                   name="tracking_number" 
                                   value="{{ old('tracking_number') }}" 
                                   placeholder="e.g., MOLPSG123456789" 
                                   required>
                            @error('tracking_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg w-100">
                            <i class="fas fa-search me-2"></i>Track Shipment
                        </button>
                    </form>
                </div>
            </div>

            <div class="mt-4">
                <div class="alert alert-info">
                    <h5><i class="fas fa-info-circle me-2"></i>Need Help?</h5>
                    <p class="mb-0">If you're having trouble finding your tracking number, please contact our customer service team.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection