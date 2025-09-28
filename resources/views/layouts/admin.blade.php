<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - MOLPSG')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <!-- Admin Header -->
    <header class="bg-white shadow-sm border-b">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <div class="bg-blue-600 text-white px-4 py-2 rounded-lg">
                        <span class="text-xl font-bold">MOLPSG</span>
                    </div>
                    <span class="ml-2 text-sm text-gray-600">Admin Panel</span>
                </div>
                <nav class="flex space-x-6">
                    <a href="{{ url('/admin') }}" class="text-gray-600 hover:text-blue-600">Dashboard</a>
                    <a href="{{ url('/admin/shipments') }}" class="text-gray-600 hover:text-blue-600">Shipments</a>
                    <a href="{{ url('/admin/shipments/create') }}" class="text-gray-600 hover:text-blue-600">New Shipment</a>
                </nav>
                <a href="{{ url('/') }}" class="text-gray-600 hover:text-blue-600">
                    <i class="fas fa-home"></i> Back to Site
                </a>
            </div>
        </div>
    </header>

    <main class="container mx-auto px-4 py-8">
        @yield('content')
    </main>
</body>
</html>