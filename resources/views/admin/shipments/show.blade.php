@extends('layouts.admin')

@section('title', 'Shipment Details - MOLPSG')
@section('content')
<div class="bg-white rounded-lg shadow-sm border p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold">Shipment Details</h2>
        <a href="{{ url('/admin/shipments') }}" class="text-blue-600 hover:text-blue-800">
            <i class="fas fa-arrow-left mr-2"></i>Back to List
        </a>
    </div>

    <!-- Shipment Information -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div>
            <h3 class="text-lg font-semibold mb-4">Shipment Information</h3>
            <div class="space-y-2">
                <p><strong>Tracking Number:</strong> {{ $shipment->tracking_number }}</p>
                <p><strong>Status:</strong> 
                    <span class="px-2 py-1 rounded 
                        @if($shipment->status == 'delivered') bg-green-100 text-green-800
                        @elseif($shipment->status == 'in_transit') bg-blue-100 text-blue-800
                        @elseif($shipment->status == 'out_for_delivery') bg-yellow-100 text-yellow-800
                        @else bg-gray-100 text-gray-800 @endif">
                        {{ ucfirst(str_replace('_', ' ', $shipment->status)) }}
                    </span>
                </p>
                <p><strong>Description:</strong> {{ $shipment->description }}</p>
                <p><strong>Weight:</strong> {{ $shipment->weight }} kg</p>
            </div>
        </div>
        <div>
            <h3 class="text-lg font-semibold mb-4">Delivery Information</h3>
            <div class="space-y-2">
                <p><strong>Estimated Delivery:</strong> 
                    {{ $shipment->estimated_delivery ? $shipment->estimated_delivery->format('M d, Y') : 'Not set' }}
                </p>
                <p><strong>Current Location:</strong> {{ $shipment->current_location ?? 'Not available' }}</p>
            </div>
        </div>
    </div>

    <!-- Update Status Form -->
    <div class="border-t pt-6 mb-8">
        <h3 class="text-lg font-semibold mb-4">Update Shipment Status</h3>
        <form action="{{ url('/admin/shipments/' . $shipment->id . '/update-status') }}" method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @csrf
            <select name="status" class="px-4 py-2 border rounded-lg">
                <option value="pending">Pending</option>
                <option value="picked_up">Picked Up</option>
                <option value="in_transit">In Transit</option>
                <option value="out_for_delivery">Out for Delivery</option>
                <option value="delivered">Delivered</option>
            </select>
            <input type="text" name="location" placeholder="Current Location" class="px-4 py-2 border rounded-lg">
            <input type="text" name="description" placeholder="Status Description" class="px-4 py-2 border rounded-lg">
            <div class="md:col-span-3">
                <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                    Update Status
                </button>
            </div>
        </form>
    </div>

    <!-- Tracking History -->
    <div class="border-t pt-6">
        <h3 class="text-lg font-semibold mb-4">Tracking History</h3>
        <div class="space-y-4">
            @foreach($trackingEvents as $event)
            <div class="flex items-start space-x-4 p-4 bg-gray-50 rounded-lg">
                <div class="flex-shrink-0 w-3 h-3 bg-blue-500 rounded-full mt-2"></div>
                <div class="flex-1">
                    <p class="font-semibold">{{ ucfirst(str_replace('_', ' ', $event->status)) }}</p>
                    <p class="text-gray-600">{{ $event->description }}</p>
                    <p class="text-sm text-gray-500">{{ $event->location }}</p>
                    <p class="text-sm text-gray-500">{{ $event->event_time->format('M d, Y H:i') }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection