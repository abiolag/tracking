<?php

use App\Http\Controllers\TrackingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ShipmentController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [TrackingController::class, 'home'])->name('home');
Route::get('/track', [TrackingController::class, 'track'])->name('track');

// Admin Login Routes
Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');

Route::post('/admin/login', function (\Illuminate\Http\Request $request) {
    $password = $request->input('password');
    
    // Change 'molpsg123' to your desired password
    if ($password === '1jobalarav8l') {
        session(['admin_authenticated' => $password]);
        
        // Redirect to intended URL or admin dashboard
        $intendedUrl = session('admin_intended_url', route('admin.dashboard'));
        session()->forget('admin_intended_url');
        
        return redirect($intendedUrl);
    }
    
    return back()->with('error', 'Invalid password');
})->name('admin.login.submit');

Route::post('/admin/logout', function () {
    session()->forget('admin_authenticated');
    return redirect('/')->with('success', 'Logged out successfully');
})->name('admin.logout');

// Protected Admin Routes
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