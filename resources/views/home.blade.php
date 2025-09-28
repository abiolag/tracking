@extends('layouts.app')

@section('title', 'MOLPSG - Global Courier & Logistics Services')
@section('content')
    <!-- Hero Section with Tracking -->
    <section class="bg-blue-600 text-white py-20">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-4">Global Courier & Logistics</h1>
            <p class="text-xl mb-8">Fast, reliable delivery services worldwide</p>
            
            <!-- Tracking Box -->
            <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Track Your Shipment</h2>
                <form action="{{ url('/track') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                    <input type="text" 
                           name="tracking_number"
                           placeholder="Enter your tracking number" 
                           class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-800">
                    <button type="submit" 
                            class="px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-semibold">
                        Track Shipment
                    </button>
                </form>
                <p class="text-gray-600 mt-3">Need help? <a href="#" class="text-blue-600">Contact support</a></p>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Our Services</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center p-6 bg-white rounded-lg shadow-sm">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shipping-fast text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Express Delivery</h3>
                    <p class="text-gray-600">Fast and reliable express delivery services worldwide.</p>
                </div>
                <div class="text-center p-6 bg-white rounded-lg shadow-sm">
                    <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-warehouse text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Freight Services</h3>
                    <p class="text-gray-600">Comprehensive freight and logistics solutions.</p>
                </div>
                <div class="text-center p-6 bg-white rounded-lg shadow-sm">
                    <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-box text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Warehousing</h3>
                    <p class="text-gray-600">Secure storage and inventory management.</p>
                </div>
            </div>
        </div>
    </section>
@endsection