<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shipment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private function checkAdminAccess()
    {
        // Simple password check - change 'molpsg123' to your desired password
        $adminPassword = session('admin_authenticated');
        
        if (!$adminPassword || $adminPassword !== '1jobalarav8l') {
            // Store the intended URL so we can redirect back after login
            session(['admin_intended_url' => url()->current()]);
            return false;
        }
        
        return true;
    }

    public function index()
    {
        if (!$this->checkAdminAccess()) {
            return redirect()->route('admin.login');
        }

        $totalShipments = Shipment::count();
        $pendingShipments = Shipment::where('status', 'pending')->count();
        $inTransitShipments = Shipment::where('status', 'in_transit')->count();
        $deliveredShipments = Shipment::where('status', 'delivered')->count();

        return view('admin.dashboard', compact(
            'totalShipments',
            'pendingShipments',
            'inTransitShipments',
            'deliveredShipments'
        ));
    }
}