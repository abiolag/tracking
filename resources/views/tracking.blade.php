@extends('layouts.app')

@section('title', 'Track Your Shipment - MOLPSG')
@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Tracking Header -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Shipment Tracking</h1>
        
        <!-- Tracking Input -->
        <form action="{{ url('/track') }}" method="GET" class="flex flex-col md:flex-row gap-4 mb-6">
            <input type="text" 
                   name="tracking_number" 
                   value="{{ $trackingNumber ?? '' }}"
                   placeholder="Enter tracking number" 
                   class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-semibold">
                Track Shipment
            </button>
        </form>

        @if(isset($trackingNumber))
            @if($shipment)
                <!-- Shipment Details -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <h3 class="text-lg font-semibold mb-2">Shipment Information</h3>
                        <div class="space-y-2">
                            <p><strong>Tracking Number:</strong> {{ $shipment->tracking_number }}</p>
                            <p><strong>Status:</strong> 
                                <span class="px-2 py-1 rounded 
                                    @if($shipment->status == 'delivered') bg-green-100 text-green-800
                                    @elseif($shipment->status == 'in_transit') bg-blue-100 text-blue-800
                                    @elseif($shipment->status == 'out_for_delivery') bg-yellow-100 text-yellow-800
                                    @elseif($shipment->status == 'exception') bg-red-100 text-red-800
                                    @else bg-gray-100 text-gray-800 @endif">
                                    {{ ucfirst(str_replace('_', ' ', $shipment->status)) }}
                                </span>
                            </p>
                            <p><strong>Description:</strong> {{ $shipment->description }}</p>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-2">Current Location</h3>
                        <p class="text-gray-600">{{ $shipment->current_location ?? 'Location information not available' }}</p>
                        <p class="text-sm text-gray-500 mt-2">
                            <strong>Estimated Delivery:</strong> 
                            {{ $shipment->estimated_delivery ? $shipment->estimated_delivery->format('M d, Y') : 'Not available' }}
                        </p>
                    </div>
                </div>

                <!-- Tracking Timeline -->
                <div class="border-t pt-6">
                    <h3 class="text-lg font-semibold mb-4">Tracking History</h3>
                    <div class="space-y-4">
                        @foreach($trackingEvents as $event)
                        <div class="flex items-start space-x-4">
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
            @else
                <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded">
                    No shipment found with tracking number: <strong>{{ $trackingNumber }}</strong>
                </div>
            @endif
        @endif
    </div>
</div>
@endsection