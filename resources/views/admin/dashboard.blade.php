<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - MOLPSG</title>
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
                    <a href="{{ url('/admin') }}" class="text-blue-600 font-semibold">Dashboard</a>
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
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded-lg shadow-sm border">
                <h3 class="text-lg font-semibold mb-2">Total Shipments</h3>
                <p class="text-3xl font-bold text-blue-600">{{ $totalShipments }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-sm border">
                <h3 class="text-lg font-semibold mb-2">In Transit</h3>
                <p class="text-3xl font-bold text-yellow-600">{{ $inTransitShipments }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-sm border">
                <h3 class="text-lg font-semibold mb-2">Delivered</h3>
                <p class="text-3xl font-bold text-green-600">{{ $deliveredShipments }}</p>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm border p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-semibold">Quick Actions</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <a href="{{ url('/admin/shipments/create') }}" class="bg-blue-600 text-white px-6 py-4 rounded-lg hover:bg-blue-700 text-center">
                    <i class="fas fa-plus mr-2"></i>Create New Shipment
                </a>
                <a href="{{ url('/admin/shipments') }}" class="bg-green-600 text-white px-6 py-4 rounded-lg hover:bg-green-700 text-center">
                    <i class="fas fa-list mr-2"></i>View All Shipments
                </a>
            </div>
        </div>
    </main>
</body>
</html>