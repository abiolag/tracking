<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shipment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalShipments = Shipment::count();
        $deliveredShipments = Shipment::where('status', 'delivered')->count();
        $inTransitShipments = Shipment::where('status', 'in_transit')->count();
        $pendingShipments = Shipment::where('status', 'pending')->count();
        $recentShipments = Shipment::with('user')->latest()->take(10)->get();

        return view('admin.dashboard', compact(
            'totalShipments',
            'deliveredShipments',
            'inTransitShipments',
            'pendingShipments',
            'recentShipments'
        ));
    }
}