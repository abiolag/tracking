<?php

namespace App\Http\Controllers\Admin;

 use App\Http\Controllers\Controller;
 use App\Models\Shipment;

 class DashboardController extends Controller
 {
    public function index()
    {
        $totalShipments = Shipment::count();
        $inTransitShipments = Shipment::where('status', 'in_transit')->count();
        $deliveredShipments = Shipment::where('status', 'delivered')->count();

        // Use simple view without extending layout for now
        return view('admin.dashboard', compact('totalShipments', 'inTransitShipments', 'deliveredShipments'));
    }
 }