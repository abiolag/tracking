<?php

use App\Http\Controllers\TrackingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ShipmentController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [TrackingController::class, 'home'])->name('home');
Route::get('/track', [TrackingController::class, 'track'])->name('track');

// Admin Routes
Route::prefix('admin')->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    // Shipments
    Route::get('/shipments', [ShipmentController::class, 'index'])->name('admin.shipments.index');
    Route::get('/shipments/create', [ShipmentController::class, 'create'])->name('admin.shipments.create');
    Route::post('/shipments', [ShipmentController::class, 'store'])->name('admin.shipments.store');
    Route::get('/shipments/{id}', [ShipmentController::class, 'show'])->name('admin.shipments.show');
    Route::post('/shipments/{id}/update-status', [ShipmentController::class, 'updateStatus'])->name('admin.shipments.update-status');
});