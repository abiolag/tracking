<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shipment;
use App\Models\TrackingEvent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShipmentController extends Controller
{
    // ... existing methods ...

    /**
     * Show form to create shipment for a specific user
     */
    public function createForUser(User $user)
    {
        return view('admin.shipments.create-for-user', compact('user'));
    }

    /**
     * Store shipment for specific user
     */
    public function storeForUser(Request $request, User $user)
    {
        $request->validate([
            'sender_name' => 'required|string|max:255',
            'sender_address' => 'required|string|max:500',
            'recipient_name' => 'required|string|max:255',
            'recipient_address' => 'required|string|max:500',
            'description' => 'required|string|max:1000',
            'weight' => 'required|numeric|min:0.1',
            'status' => 'required|in:pending,picked_up,in_transit,out_for_delivery,delivered,cancelled',
            'estimated_delivery' => 'nullable|date|after:today'
        ]);
        
        $trackingNumber = 'MOL' . strtoupper(Str::random(9));
        
        $shipment = Shipment::create([
            'tracking_number' => $trackingNumber,
            'user_id' => $user->id,
            'sender_name' => $request->sender_name,
            'sender_address' => $request->sender_address,
            'recipient_name' => $request->recipient_name,
            'recipient_address' => $request->recipient_address,
            'description' => $request->description,
            'weight' => $request->weight,
            'status' => $request->status,
            'estimated_delivery' => $request->estimated_delivery
        ]);

        TrackingEvent::create([
            'shipment_id' => $shipment->id,
            'location' => 'Origin Facility',
            'description' => 'Shipment created and ready for processing',
            'status' => $request->status,
            'event_time' => now()
        ]);

        return redirect()->route('admin.users.shipments', $user)
            ->with('success', 'Shipment created successfully. Tracking Number: ' . $trackingNumber);
    }

    /**
     * Show user's shipments
     */
    public function userShipments(User $user)
    {
        $shipments = $user->shipments()->latest()->paginate(10);
        return view('admin.users.shipments', compact('user', 'shipments'));
    }

    /**
     * Quick create shipment with minimal info
     */
    public function quickCreate()
    {
        $users = User::where('is_admin', false)->get();
        return view('admin.shipments.quick-create', compact('users'));
    }

    /**
     * Store quick shipment
     */
    public function quickStore(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'recipient_name' => 'required|string|max:255',
            'recipient_address' => 'required|string|max:500',
            'description' => 'required|string|max:1000',
        ]);
        
        $trackingNumber = 'MOL' . strtoupper(Str::random(9));
        
        $shipment = Shipment::create([
            'tracking_number' => $trackingNumber,
            'user_id' => $request->user_id,
            'sender_name' => 'MOLPSG Courier',
            'sender_address' => 'MOLPSG Main Facility',
            'recipient_name' => $request->recipient_name,
            'recipient_address' => $request->recipient_address,
            'description' => $request->description,
            'weight' => 1.0, // default weight
            'status' => 'pending',
            'estimated_delivery' => now()->addDays(5)
        ]);

        TrackingEvent::create([
            'shipment_id' => $shipment->id,
            'location' => 'Origin Facility',
            'description' => 'Shipment registered in system',
            'status' => 'pending',
            'event_time' => now()
        ]);

        return redirect()->route('admin.shipments.index')
            ->with('success', 'Quick shipment created. Tracking Number: ' . $trackingNumber);
    }
}