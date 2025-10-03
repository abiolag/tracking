<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOLPSG - Global Courier & Logistics Services</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        .hero-bg {
            background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 50%, #3b82f6 100%);
        }
        .service-card:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }
        .tracking-input {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }
    </style>
</head>
<body class="font-inter">
    <!-- Header -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <div class="flex items-center">
                    <div class="bg-blue-600 text-white px-4 py-3 rounded-lg">
                        <span class="text-2xl font-bold">MOLPSG</span>
                    </div>
                    <span class="ml-2 text-sm text-gray-600 hidden md:block">Global Courier Services</span>
                </div>

                <!-- Navigation -->
        <nav class="hidden md:flex space-x-8">
            <a href="{{ url('/') }}" class="text-blue-600 font-semibold border-b-2 border-blue-600 pb-1">Home</a>
            <a href="{{ route('about') }}" class="text-gray-600 hover:text-blue-600 transition-colors">About</a>
            <a href="{{ url('/track') }}" class="text-gray-600 hover:text-blue-600 transition-colors">Tracking</a>
            <a href="{{ route('contact') }}" class="text-gray-600 hover:text-blue-600 transition-colors">Contact</a>
        </nav>

                <!-- Action Buttons -->
                <div class="flex items-center space-x-4">
                    <a href="{{ url('/track') }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors font-semibold">
                        Track Shipment
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-bg text-white">
        <div class="container mx-auto px-4 py-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h1 class="text-5xl lg:text-6xl font-bold leading-tight mb-6">
                        Global Logistics<br>
                        <span class="text-blue-200">Made Simple</span>
                    </h1>
                    <p class="text-xl text-blue-100 mb-8 leading-relaxed">
                        Fast, reliable, and secure courier services worldwide. 
                        Trust MOLPSG for all your shipping needs with real-time tracking and exceptional customer support.
                    </p>
                    
                    <!-- Tracking Form -->
                    <div class="bg-white rounded-xl p-8 shadow-2xl tracking-input">
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Track Your Shipment</h3>
                        <form action="{{ route('track') }}" method="GET" class="space-y-4">
                            <div>
                                <label class="block text-gray-700 text-sm font-semibold mb-2">Tracking Number</label>
                                <input type="text" name="tracking_number" 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                       placeholder="Enter your tracking number" required>
                            </div>
                            <button type="submit" 
                                    class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors flex items-center justify-center">
                                <i class="fas fa-search mr-2"></i>
                                Track Now
                            </button>
                        </form>
                    </div>
                </div>
                
                            <div class="hidden lg:block">
                <img src="{{ asset('images/image1.jpg') }}" 
                    alt="MOLPSG Global Courier Services" 
                    class="rounded-2xl shadow-2xl w-full h-auto">
            </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Our Services</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Comprehensive logistics solutions tailored to meet your business and personal shipping needs
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Service 1 -->
                <div class="service-card bg-white rounded-xl p-8 shadow-lg text-center">
                    <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-shipping-fast text-blue-600 text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Express Delivery</h3>
                    <p class="text-gray-600 mb-6">
                        Fast and reliable express delivery services with guaranteed timeframes and real-time tracking.
                    </p>
                    <a href="#" class="text-blue-600 font-semibold hover:text-blue-700 inline-flex items-center">
                        Learn More <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
                
                <!-- Service 2 -->
                <div class="service-card bg-white rounded-xl p-8 shadow-lg text-center">
                    <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-globe-americas text-green-600 text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">International Shipping</h3>
                    <p class="text-gray-600 mb-6">
                        Seamless cross-border shipping with customs clearance and worldwide coverage.
                    </p>
                    <a href="#" class="text-blue-600 font-semibold hover:text-blue-700 inline-flex items-center">
                        Learn More <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
                
                <!-- Service 3 -->
                <div class="service-card bg-white rounded-xl p-8 shadow-lg text-center">
                    <div class="w-20 h-20 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-warehouse text-purple-600 text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Warehouse & Storage</h3>
                    <p class="text-gray-600 mb-6">
                        Secure storage solutions with inventory management and flexible distribution options.
                    </p>
                    <a href="#" class="text-blue-600 font-semibold hover:text-blue-700 inline-flex items-center">
                        Learn More <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                                <div>
                    <img src="{{ asset('images/image2.jpg') }}" 
                        alt="Why Choose MOLPSG" 
                        class="rounded-2xl shadow-xl w-full h-auto">
                </div>
                
                <div>
                    <h2 class="text-4xl font-bold text-gray-800 mb-6">Why Choose MOLPSG?</h2>
                    
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="bg-blue-100 p-3 rounded-lg mr-4">
                                <i class="fas fa-shield-alt text-blue-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">Secure & Reliable</h3>
                                <p class="text-gray-600">Your shipments are protected with advanced security measures and insurance coverage.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="bg-green-100 p-3 rounded-lg mr-4">
                                <i class="fas fa-bolt text-green-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">Fast Delivery</h3>
                                <p class="text-gray-600">Optimized routes and efficient logistics ensure timely deliveries across the globe.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="bg-purple-100 p-3 rounded-lg mr-4">
                                <i class="fas fa-headset text-purple-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">24/7 Support</h3>
                                <p class="text-gray-600">Round-the-clock customer support to assist you with any queries or concerns.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-16 bg-blue-600 text-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="text-4xl font-bold mb-2">50K+</div>
                    <div class="text-blue-200">Shipments Delivered</div>
                </div>
                <div>
                    <div class="text-4xl font-bold mb-2">150+</div>
                    <div class="text-blue-200">Countries Served</div>
                </div>
                <div>
                    <div class="text-4xl font-bold mb-2">24/7</div>
                    <div class="text-blue-200">Customer Support</div>
                </div>
                <div>
                    <div class="text-4xl font-bold mb-2">99%</div>
                    <div class="text-blue-200">On-Time Delivery</div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gray-900 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold mb-6">Ready to Ship with Confidence?</h2>
            <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
                Join thousands of satisfied customers who trust MOLPSG for their logistics needs.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ url('/track') }}" class="bg-blue-600 text-white px-8 py-4 rounded-lg font-semibold hover:bg-blue-700 transition-colors text-lg">
                    Track Your Shipment
                </a>
                <a href="#" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-gray-900 transition-colors text-lg">
                    Contact Sales
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="bg-blue-600 text-white px-4 py-3 rounded-lg inline-block mb-4">
                        <span class="text-2xl font-bold">MOLPSG</span>
                    </div>
                    <p class="text-gray-400 mb-4">
                        Global logistics and courier services you can trust. Fast, reliable, and secure shipping solutions.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-facebook text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-linkedin text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ url('/') }}" class="text-gray-400 hover:text-white transition-colors">Home</a></li>
                        <li><a href="#services" class="text-gray-400 hover:text-white transition-colors">Services</a></li>
                        <li><a href="{{ url('/track') }}" class="text-gray-400 hover:text-white transition-colors">Tracking</a></li>
                        <li><a href="#about" class="text-gray-400 hover:text-white transition-colors">About Us</a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-white transition-colors">Contact</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">Services</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Express Delivery</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">International Shipping</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Warehouse Storage</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Freight Services</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Customs Clearance</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact Info</h3>
                    <ul class="space-y-3 text-gray-400">
                        <li class="flex items-center">
                            <i class="fas fa-phone mr-3 text-blue-400"></i>
                            +1 (555) 123-4567
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-3 text-blue-400"></i>
                            info@molpsg.com
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-map-marker-alt mr-3 text-blue-400"></i>
                            Global Headquarters
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-clock mr-3 text-blue-400"></i>
                            24/7 Customer Support
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-700 mt-12 pt-8 text-center text-gray-400">
                <p>&copy; 2025 MOLPSG Global Courier Services. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html><!DOCTYPE html>