<?php

use App\Http\Controllers\TrackingController;
use App\Http\Controllers\Admin\ShipmentController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Tracking routes
Route::get('/track', [TrackingController::class, 'index'])->name('tracking.index');
Route::post('/track', [TrackingController::class, 'track'])->name('tracking.track');
Route::get('/track/{tracking_number}', [TrackingController::class, 'show'])->name('tracking.show');

// Authentication routes (from Breeze)
require __DIR__.'/auth.php';

// Regular user dashboard route (ADD THIS)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        // Redirect users based on their role
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return view('dashboard'); // Regular user dashboard
    })->name('dashboard'); // This creates the 'dashboard' route
});

// Admin routes with proper naming
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    // Admin dashboard
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    
    // Shipments resource with proper naming
    Route::resource('shipments', ShipmentController::class);
    
    // Additional shipment routes
    Route::get('shipments/quick-create', [ShipmentController::class, 'quickCreate'])->name('shipments.quick-create');
    Route::post('shipments/quick-create', [ShipmentController::class, 'quickStore'])->name('shipments.quick-store');
    Route::post('shipments/{shipment}/tracking-event', [ShipmentController::class, 'addTrackingEvent'])->name('shipments.add-tracking');
    
    // User shipment management
    Route::get('users/{user}/shipments', [ShipmentController::class, 'userShipments'])->name('users.shipments');
    Route::get('users/{user}/shipments/create', [ShipmentController::class, 'createForUser'])->name('shipments.create-for-user');
    Route::post('users/{user}/shipments', [ShipmentController::class, 'storeForUser'])->name('shipments.store-for-user');
});