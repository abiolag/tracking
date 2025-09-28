@extends('layouts.admin')

@section('title', 'Create New Shipment - MOLPSG')
@section('content')
<div class="bg-white rounded-lg shadow-sm border p-6">
    <h2 class="text-xl font-semibold mb-6">Create New Shipment</h2>

    <form action="{{ url('/admin/shipments') }}" method="POST">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <!-- Sender Information -->
            <div>
                <h3 class="text-lg font-semibold mb-4 border-b pb-2">Sender Information</h3>
                <div class="space-y-4">
                    <input type="text" name="sender_name" placeholder="Sender Name" required class="w-full px-4 py-2 border rounded-lg">
                    <input type="text" name="sender_address" placeholder="Sender Address" required class="w-full px-4 py-2 border rounded-lg">
                    <input type="text" name="sender_phone" placeholder="Sender Phone" required class="w-full px-4 py-2 border rounded-lg">
                </div>
            </div>

            <!-- Receiver Information -->
            <div>
                <h3 class="text-lg font-semibold mb-4 border-b pb-2">Receiver Information</h3>
                <div class="space-y-4">
                    <input type="text" name="receiver_name" placeholder="Receiver Name" required class="w-full px-4 py-2 border rounded-lg">
                    <input type="text" name="receiver_address" placeholder="Receiver Address" required class="w-full px-4 py-2 border rounded-lg">
                    <input type="text" name="receiver_phone" placeholder="Receiver Phone" required class="w-full px-4 py-2 border rounded-lg">
                </div>
            </div>
        </div>

        <!-- Shipment Details -->
        <div class="mb-6">
            <h3 class="text-lg font-semibold mb-4 border-b pb-2">Shipment Details</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="text" name="description" placeholder="Package Description" required class="px-4 py-2 border rounded-lg">
                <input type="number" step="0.01" name="weight" placeholder="Weight (kg)" required class="px-4 py-2 border rounded-lg">
                <input type="date" name="estimated_delivery" class="px-4 py-2 border rounded-lg">
                <select name="status" class="px-4 py-2 border rounded-lg">
                    <option value="pending">Pending</option>
                    <option value="picked_up">Picked Up</option>
                    <option value="in_transit">In Transit</option>
                    <option value="out_for_delivery">Out for Delivery</option>
                    <option value="delivered">Delivered</option>
                </select>
            </div>
        </div>

        <div class="flex justify-end space-x-4">
            <a href="{{ url('/admin/shipments') }}" class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                Cancel
            </a>
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Create Shipment
            </button>
        </div>
    </form>
</div>
@endsection