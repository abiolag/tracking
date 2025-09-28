<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use App\Models\TrackingEvent;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
     public function home()
    {
        return view('home');
    }

     public function track(Request $request)
    {
        $trackingNumber = $request->input('tracking_number') ?? $request->query('tracking_number');
        $shipment = null;
        $trackingEvents = [];

        if ($trackingNumber) {
            $shipment = Shipment::where('tracking_number', $trackingNumber)->first();
            if ($shipment) {
                $trackingEvents = $shipment->trackingEvents()->orderBy('event_time', 'desc')->get();
            }
        }

        return view('tracking', compact('shipment', 'trackingEvents', 'trackingNumber'));
    }
}