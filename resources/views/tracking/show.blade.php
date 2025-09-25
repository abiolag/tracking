@extends('layouts.app')

@section('title', 'Tracking Results')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Tracking Results</h4>
                </div>
                <div class="card-body">
                    @if(isset($error))
                        <div class="alert alert-danger">
                            <h5><i class="fas fa-exclamation-triangle me-2"></i>Tracking Number Not Found</h5>
                            <p class="mb-0">No shipment found for tracking number: <strong>{{ $trackingNumber }}</strong></p>
                            <p class="mb-0 mt-2">Please check the number and try again.</p>
                        </div>
                        <a href="{{ route('tracking.index') }}" class="btn btn-primary">
                            <i class="fas fa-search me-2"></i>Try Another Tracking Number
                        </a>
                    @else
                        <!-- Shipment Summary -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h5>Shipment Information</h5>
                                <table class="table table-sm">
                                    <tr>
                                        <th>Tracking Number:</th>
                                        <td><strong>{{ $shipment->tracking_number }}</strong></td>
                                    </tr>
                                    <tr>
                                        <th>Status:</th>
                                        <td>
                                            <span class="badge bg-{{ $shipment->status_color }}">{{ $shipment->status }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Origin:</th>
                                        <td>{{ $shipment->origin }}</td>
                                    </tr>
                                    <tr>
                                        <th>Destination:</th>
                                        <td>{{ $shipment->destination }}</td>
                                    </tr>
                                    <tr>
                                        <th>Estimated Delivery:</th>
                                        <td>{{ $shipment->estimated_delivery ? $shipment->estimated_delivery->format('M j, Y') : 'N/A' }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <h5>Package Details</h5>
                                <table class="table table-sm">
                                    <tr>
                                        <th>Description:</th>
                                        <td>{{ $shipment->description ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Weight:</th>
                                        <td>{{ $shipment->weight ? $shipment->weight . ' kg' : 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Dimensions:</th>
                                        <td>
                                            @if($shipment->dimensions)
                                                {{ $shipment->dimensions }}
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <!-- Tracking Timeline -->
                        <h5 class="mb-3">Tracking History</h5>
                        @if($trackingEvents->count() > 0)
                            <div class="timeline">
                                @foreach($trackingEvents as $event)
                                    <div class="timeline-item {{ $loop->first ? 'current' : '' }}">
                                        <div class="timeline-marker"></div>
                                        <div class="timeline-content">
                                            <div class="d-flex justify-content-between">
                                                <h6 class="mb-1">{{ $event->description }}</h6>
                                                <small class="text-muted">{{ $event->created_at->format('M j, Y g:i A') }}</small>
                                            </div>
                                            @if($event->location)
                                                <p class="mb-1 text-muted"><i class="fas fa-map-marker-alt me-1"></i>{{ $event->location }}</p>
                                            @endif
                                            @if($event->details)
                                                <p class="mb-0 small">{{ $event->details }}</p>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i>No tracking events found for this shipment.
                            </div>
                        @endif

                        <div class="mt-4">
                            <a href="{{ route('tracking.index') }}" class="btn btn-primary">
                                <i class="fas fa-search me-2"></i>Track Another Shipment
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.timeline {
    position: relative;
    padding-left: 30px;
}

.timeline-item {
    position: relative;
    margin-bottom: 20px;
}

.timeline-marker {
    position: absolute;
    left: -30px;
    top: 5px;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: #007bff;
    border: 3px solid white;
    box-shadow: 0 0 0 3px #007bff;
}

.timeline-item.current .timeline-marker {
    background: #28a745;
    box-shadow: 0 0 0 3px #28a745;
}

.timeline-content {
    background: #f8f9fa;
    padding: 15px;
    border-radius: 5px;
    border-left: 3px solid #007bff;
}

.timeline-item.current .timeline-content {
    border-left-color: #28a745;
}
</style>
@endsection