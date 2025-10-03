@extends('layouts.app')

@section('title', 'About MOLPSG - Global Courier Services')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Hero Section -->
    <section class="bg-blue-600 text-white py-20">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <h1 class="text-5xl font-bold mb-6">About MOLPSG</h1>
                <p class="text-xl text-blue-100 max-w-2xl mx-auto">
                    Delivering excellence in global logistics since our inception. 
                    Your trusted partner for reliable courier services worldwide.
                </p>
            </div>
        </div>
    </section>

    <!-- Our Story Section -->
    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-4xl font-bold text-gray-800 mb-6">Our Story</h2>
                    <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                        MOLPSG was founded with a simple yet powerful vision: to revolutionize global logistics 
                        by making international shipping accessible, reliable, and efficient for businesses and 
                        individuals alike.
                    </p>
                    <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                        Starting as a small courier service, we've grown into a global logistics partner, 
                        serving clients across continents with the same commitment to excellence that defined 
                        our humble beginnings.
                    </p>
                    <div class="bg-blue-50 p-6 rounded-lg">
                        <h3 class="text-xl font-semibold text-blue-800 mb-3">Our Mission</h3>
                        <p class="text-blue-700">
                            To provide seamless, secure, and efficient logistics solutions that connect people 
                            and businesses across the globe, fostering growth and enabling possibilities.
                        </p>
                    </div>
                </div>
                <div>
                    <img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" 
                         alt="MOLPSG Global Operations" 
                         class="rounded-2xl shadow-xl w-full">
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Our Values</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    The principles that guide everything we do at MOLPSG
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center p-6">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shield-alt text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Reliability</h3>
                    <p class="text-gray-600">
                        We deliver on our promises, ensuring your shipments reach their destination 
                        safely and on time, every time.
                    </p>
                </div>
                
                <div class="text-center p-6">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-bolt text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Efficiency</h3>
                    <p class="text-gray-600">
                        Streamlined processes and optimized routes ensure fast delivery without 
                        compromising on quality or security.
                    </p>
                </div>
                
                <div class="text-center p-6">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-users text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Customer Focus</h3>
                    <p class="text-gray-600">
                        Your satisfaction is our priority. We listen, adapt, and exceed expectations 
                        in every interaction.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Why Choose MOLPSG?</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-3xl font-bold text-blue-600 mb-2">50K+</div>
                    <div class="text-gray-600">Successful Deliveries</div>
                </div>
                
                <div class="text-center">
                    <div class="text-3xl font-bold text-blue-600 mb-2">150+</div>
                    <div class="text-gray-600">Countries Served</div>
                </div>
                
                <div class="text-center">
                    <div class="text-3xl font-bold text-blue-600 mb-2">24/7</div>
                    <div class="text-gray-600">Customer Support</div>
                </div>
                
                <div class="text-center">
                    <div class="text-3xl font-bold text-blue-600 mb-2">99%</div>
                    <div class="text-gray-600">On-Time Rate</div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection