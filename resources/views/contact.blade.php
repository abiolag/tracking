@extends('layouts.app')

@section('title', 'Contact MOLPSG - Global Courier Services')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Hero Section -->
    <section class="bg-blue-600 text-white py-20">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <h1 class="text-5xl font-bold mb-6">Contact Us</h1>
                <p class="text-xl text-blue-100 max-w-2xl mx-auto">
                    Get in touch with our team. We're here to help with all your logistics needs 
                    and answer any questions you may have.
                </p>
            </div>
        </div>
    </section>

    <!-- Contact Form & Info Section -->
    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div class="bg-white rounded-2xl shadow-xl p-8">
                    <h2 class="text-3xl font-bold text-gray-800 mb-6">Send us a Message</h2>
                    
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        <div class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                                        Full Name *
                                    </label>
                                    <input type="text" id="name" name="name" 
                                           value="{{ old('name') }}"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                           placeholder="Your full name" required>
                                </div>
                                
                                <div>
                                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                        Email Address *
                                    </label>
                                    <input type="email" id="email" name="email" 
                                           value="{{ old('email') }}"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                           placeholder="your.email@example.com" required>
                                </div>
                            </div>
                            
                            <div>
                                <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Phone Number
                                </label>
                                <input type="tel" id="phone" name="phone" 
                                       value="{{ old('phone') }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                       placeholder="+1 (555) 123-4567">
                            </div>
                            
                            <div>
                                <label for="subject" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Subject *
                                </label>
                                <input type="text" id="subject" name="subject" 
                                       value="{{ old('subject') }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                       placeholder="What is this regarding?" required>
                            </div>
                            
                            <div>
                                <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Message *
                                </label>
                                <textarea id="message" name="message" rows="6"
                                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                          placeholder="Tell us how we can help you..." required>{{ old('message') }}</textarea>
                            </div>
                            
                            <button type="submit" 
                                    class="w-full bg-blue-600 text-white py-4 rounded-lg font-semibold hover:bg-blue-700 transition-colors text-lg">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
                
                <!-- Contact Information -->
                <div class="space-y-8">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-800 mb-6">Get in Touch</h2>
                        <p class="text-lg text-gray-600 mb-8">
                            Have questions about our services? Need a quote for your shipment? 
                            Our team is ready to assist you with personalized solutions.
                        </p>
                    </div>
                    
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="bg-blue-100 p-3 rounded-lg mr-4">
                                <i class="fas fa-map-marker-alt text-blue-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">Our Office</h3>
                                <p class="text-gray-600">
                                    3373 Ridgeway Loop Road,  <br>
                                    Ste 600. Memphis,<br>
                                    Tennessee, United States, 38125
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="bg-green-100 p-3 rounded-lg mr-4">
                                <i class="fas fa-phone text-green-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">Call Us</h3>
                                <p class="text-gray-600">
                                    +1 555 803 4333<br>
                                    +1 555 803 4334
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="bg-purple-100 p-3 rounded-lg mr-4">
                                <i class="fas fa-envelope text-purple-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">Email Us</h3>
                                <p class="text-gray-600">
                                    info@molpsg.com<br>
                                    support@molpsg.com<br>
                                    admin@molpsg.com
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="bg-orange-100 p-3 rounded-lg mr-4">
                                <i class="fas fa-clock text-orange-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">Business Hours</h3>
                                <p class="text-gray-600">
                                    Monday - Friday: 8:00 AM - 6:00 PM<br>
                                    Saturday: 9:00 AM - 4:00 PM<br>
                                    Sunday: Emergency Services Only
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Emergency Contact -->
                    <div class="bg-blue-50 border border-blue-200 rounded-xl p-6">
                        <h3 class="text-xl font-semibold text-blue-800 mb-3">Emergency Support</h3>
                        <p class="text-blue-700 mb-4">
                            For urgent shipment inquiries or emergency support outside business hours:
                        </p>
                        <div class="flex items-center">
                            <i class="fas fa-phone text-blue-600 mr-3"></i>
                            <span class="text-blue-800 font-semibold">+1 555 803 4333</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Find Us</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Visit our headquarters or connect with our global network of offices and partners.
                </p>
            </div>
            
            <!-- Simplified Map Representation -->
            <div class="bg-gray-200 rounded-2xl p-12 text-center">
                <i class="fas fa-map-marked-alt text-6xl text-blue-600 mb-4"></i>
                <h3 class="text-2xl font-semibold text-gray-800 mb-2">Global Network</h3>
                <p class="text-gray-600 max-w-md mx-auto">
                    With operations spanning across 150+ countries, MOLPSG ensures your shipments 
                    are handled with care no matter the destination.
                </p>
            </div>
        </div>
    </section>
</div>
@endsection