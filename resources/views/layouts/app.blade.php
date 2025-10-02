<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MOLPSG - Global Courier Services')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="font-sans antialiased">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <div class="flex items-center">
                    <div class="bg-blue-600 text-white px-4 py-2 rounded-lg">
                        <span class="text-2xl font-bold">MOLPSG</span>
                    </div>
                    <span class="ml-2 text-sm text-gray-600">Global Courier Services</span>
                </div>

                <!-- Navigation -->
                <nav class="hidden md:flex space-x-8">
                    <a href="{{ url('/') }}" class="text-blue-600 font-semibold">Home</a>
                    <a href="#" class="text-gray-600 hover:text-blue-600">Services</a>
                    <a href="{{ url('/track') }}" class="text-gray-600 hover:text-blue-600">Tracking</a>
                    <a href="#" class="text-gray-600 hover:text-blue-600">Locations</a>
                    <a href="#" class="text-gray-600 hover:text-blue-600">Support</a>
                </nav>

                <!-- Action Buttons -->
            <!-- <div class="flex items-center space-x-4">
                    <a href="/admin" class="text-gray-600 hover:text-blue-600">
                        <i class="fas fa-user"></i> Admin
                    </a>
                </div>  -->
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white mt-12">
        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">MOLPSG</h3>
                    <p class="text-gray-400">Global logistics and courier services you can trust.</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Services</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white">Express Delivery</a></li>
                        <li><a href="#" class="hover:text-white">Freight Services</a></li>
                        <li><a href="#" class="hover:text-white">Warehousing</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><i class="fas fa-phone"></i> +1 (555) 123-4567</li>
                        <li><i class="fas fa-envelope"></i> info@molpsg.com</li>
                        <li><i class="fas fa-map-marker-alt"></i> Worldwide Services</li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Connect</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2024 MOLPSG. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>