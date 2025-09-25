<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MOLPSG Courier Service</title>
    @vite('resources/css/app.css')
</head>
<body class="antialiased bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-blue-800 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ url('/') }}" class="text-xl font-bold">MOLPSG Courier</a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('tracking.index') }}" class="hover:text-blue-200">Track Shipment</a>
                    @auth
                        @if(auth()->user()->is_admin)
                            <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-200">Admin Dashboard</a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" 
                               onclick="event.preventDefault(); this.closest('form').submit();" 
                               class="hover:text-blue-200">Logout</a>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="hover:text-blue-200">Login</a>
                        <a href="{{ route('register') }}" class="hover:text-blue-200">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative bg-blue-800 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">MOLPSG Courier Service</h1>
            <p class="text-xl mb-8">Reliable, fast, and secure delivery solutions worldwide</p>
            
            <!-- Tracking Form -->
            <div class="max-w-2xl mx-auto">
                <form action="{{ route('tracking.track') }}" method="POST" class="flex">
                    @csrf
                    <input type="text" name="tracking_number" 
                           placeholder="Enter your tracking number" 
                           class="flex-grow px-4 py-3 rounded-l-lg text-gray-800 focus:outline-none">
                    <button type="submit" 
                            class="bg-orange-500 px-6 py-3 rounded-r-lg font-semibold hover:bg-orange-600 transition">
                        Track
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center mb-12">Our Services</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center p-6 rounded-lg shadow-md">
                    <div class="text-blue-600 mb-4">
                        <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Fast Delivery</h3>
                    <p class="text-gray-600">Quick and efficient delivery services to meet your deadlines</p>
                </div>
                
                <div class="text-center p-6 rounded-lg shadow-md">
                    <div class="text-blue-600 mb-4">
                        <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Secure Handling</h3>
                    <p class="text-gray-600">Your packages are handled with care and security</p>
                </div>
                
                <div class="text-center p-6 rounded-lg shadow-md">
                    <div class="text-blue-600 mb-4">
                        <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Worldwide Coverage</h3>
                    <p class="text-gray-600">We deliver to destinations across the globe</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p>&copy; {{ date('Y') }} MOLPSG Courier Service. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>