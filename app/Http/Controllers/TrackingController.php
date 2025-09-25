<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use App\Models\TrackingEvent;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    /**
     * Show the tracking search form
     */
    public function index()
    {
        return view('tracking.index');
    }

    /**
     * Process tracking search
     */
    public function track(Request $request)
    {
        $request->validate([
            'tracking_number' => 'required|string|max:255'
        ]);

        $trackingNumber = $request->tracking_number;
        
        return redirect()->route('tracking.show', $trackingNumber);
    }

    /**
     * Show tracking results
     */
    public function show($trackingNumber)
    {
        $shipment = Shipment::with(['trackingEvents' => function($query) {
            $query->orderBy('created_at', 'desc');
        }])
        ->where('tracking_number', $trackingNumber)
        ->first();

        if (!$shipment) {
            return view('tracking.show', [
                'error' => 'Tracking number not found',
                'trackingNumber' => $trackingNumber
            ]);
        }

        return view('tracking.show', [
            'shipment' => $shipment,
            'trackingEvents' => $shipment->trackingEvents,
            'trackingNumber' => $trackingNumber
        ]);
    }
}