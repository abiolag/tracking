@extends('layouts.admin')

@section('title', 'Manage Shipments - MOLPSG')
@section('content')
<div class="bg-white rounded-lg shadow-sm border p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold">All Shipments</h2>
        <a href="{{ url('/admin/shipments/create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            <i class="fas fa-plus mr-2"></i>New Shipment
        </a>
    </div>

    @if($shipments->count() > 0)
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead>
                <tr class="bg-gray-50">
                    <th class="px-6 py-3 border-b text-left text-sm font-semibold text-gray-600">Tracking #</th>
                    <th class="px-6 py-3 border-b text-left text-sm font-semibold text-gray-600">Sender</th>
                    <th class="px-6 py-3 border-b text-left text-sm font-semibold text-gray-600">Receiver</th>
                    <th class="px-6 py-3 border-b text-left text-sm font-semibold text-gray-600">Status</th>
                    <th class="px-6 py-3 border-b text-left text-sm font-semibold text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($shipments as $shipment)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 border-b">{{ $shipment->tracking_number }}</td>
                    <td class="px-6 py-4 border-b">{{ $shipment->sender_name }}</td>
                    <td class="px-6 py-4 border-b">{{ $shipment->receiver_name }}</td>
                    <td class="px-6 py-4 border-b">
                        <span class="px-2 py-1 rounded text-xs 
                            @if($shipment->status == 'delivered') bg-green-100 text-green-800
                            @elseif($shipment->status == 'in_transit') bg-blue-100 text-blue-800
                            @elseif($shipment->status == 'out_for_delivery') bg-yellow-100 text-yellow-800
                            @else bg-gray-100 text-gray-800 @endif">
                            {{ ucfirst(str_replace('_', ' ', $shipment->status)) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 border-b">
                        <a href="{{ url('/admin/shipments/' . $shipment->id) }}" class="text-blue-600 hover:text-blue-800 mr-3">
                            <i class="fas fa-eye"></i> View
                        </a>
                        <a href="{{ url('/track?tracking_number=' . $shipment->tracking_number) }}" target="_blank" class="text-green-600 hover:text-green-800">
                            <i class="fas fa-external-link-alt"></i> Track
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="text-center py-8">
        <i class="fas fa-box-open text-4xl text-gray-400 mb-4"></i>
        <p class="text-gray-600">No shipments found.</p>
        <a href="{{ url('/admin/shipments/create') }}" class="inline-block mt-4 bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
            Create Your First Shipment
        </a>
    </div>
    @endif
</div>
@endsection