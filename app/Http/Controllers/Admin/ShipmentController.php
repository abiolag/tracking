<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shipment;
use App\Models\TrackingEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShipmentController extends Controller
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

        $shipments = Shipment::orderBy('created_at', 'desc')->get();
        return view('admin.shipments.index', compact('shipments'));
    }

    public function create()
    {
        if (!$this->checkAdminAccess()) {
            return redirect()->route('admin.login');
        }

        return view('admin.shipments.create');
    }

    public function store(Request $request)
    {
        if (!$this->checkAdminAccess()) {
            return redirect()->route('admin.login');
        }

        // ... rest of your existing store method ...
        $request->validate([
            'sender_name' => 'required|string|max:255',
            'sender_address' => 'required|string',
            'sender_phone' => 'required|string|max:20',
            'receiver_name' => 'required|string|max:255',
            'receiver_address' => 'required|string',
            'receiver_phone' => 'required|string|max:20',
            'description' => 'required|string',
            'weight' => 'required|numeric|min:0.1',
        ]);

        // Generate unique tracking number
        $trackingNumber = 'MOL' . date('Ymd') . strtoupper(Str::random(6));

        // Create the shipment
        $shipment = Shipment::create([
            'tracking_number' => $trackingNumber,
            'sender_name' => $request->sender_name,
            'sender_address' => $request->sender_address,
            'sender_phone' => $request->sender_phone,
            'receiver_name' => $request->receiver_name,
            'receiver_address' => $request->receiver_address,
            'receiver_phone' => $request->receiver_phone,
            'description' => $request->description,
            'weight' => $request->weight,
            'status' => $request->status ?? 'pending',
            'estimated_delivery' => $request->estimated_delivery ?: null,
        ]);

        // Create initial tracking event
        TrackingEvent::create([
            'shipment_id' => $shipment->id,
            'status' => $shipment->status,
            'location' => 'Processing Center',
            'description' => 'Shipment registered and is being processed',
            'event_time' => now(),
        ]);

        return redirect()->route('admin.shipments.show', $shipment->id)
            ->with('success', 'Shipment created successfully! Tracking Number: ' . $trackingNumber);
    }

    public function show($id)
    {
        if (!$this->checkAdminAccess()) {
            return redirect()->route('admin.login');
        }

        $shipment = Shipment::findOrFail($id);
        $trackingEvents = $shipment->trackingEvents()->orderBy('event_time', 'desc')->get();

        return view('admin.shipments.show', compact('shipment', 'trackingEvents'));
    }

    public function updateStatus(Request $request, $id)
    {
        if (!$this->checkAdminAccess()) {
            return redirect()->route('admin.login');
        }

        $request->validate([
            'status' => 'required|string',
            'location' => 'required|string',
            'description' => 'required|string',
        ]);

        $shipment = Shipment::findOrFail($id);
        
        // Update shipment status and location
        $shipment->update([
            'status' => $request->status,
            'current_location' => $request->location,
        ]);

        // Create tracking event
        TrackingEvent::create([
            'shipment_id' => $shipment->id,
            'status' => $request->status,
            'location' => $request->location,
            'description' => $request->description,
            'event_time' => now(),
        ]);

        return back()->with('success', 'Shipment status updated successfully!');
    }
}