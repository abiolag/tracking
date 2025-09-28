<?php

namespace Database\Seeders;

use App\Models\Shipment;
use App\Models\TrackingEvent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ShipmentSeeder extends Seeder
{
    public function run()
    {
        // Create a sample shipment
        $shipment = Shipment::create([
            'tracking_number' => 'MOL' . date('Ymd') . 'TEST01',
            'sender_name' => 'John Smith',
            'sender_address' => '123 Main St, New York, NY 10001',
            'sender_phone' => '+1-555-0101',
            'receiver_name' => 'Sarah Johnson',
            'receiver_address' => '456 Oak Ave, Los Angeles, CA 90210',
            'receiver_phone' => '+1-555-0102',
            'description' => 'Important documents',
            'weight' => 0.5,
            'status' => 'in_transit',
            'current_location' => 'Chicago Distribution Center',
            'estimated_delivery' => now()->addDays(3),
        ]);

        // Create tracking events
        $events = [
            [
                'status' => 'pending',
                'location' => 'New York Processing Center',
                'description' => 'Shipment registered and awaiting pickup',
                'event_time' => now()->subDays(2),
            ],
            [
                'status' => 'picked_up',
                'location' => 'New York',
                'description' => 'Package picked up from sender',
                'event_time' => now()->subDays(1),
            ],
            [
                'status' => 'in_transit',
                'location' => 'Chicago Distribution Center',
                'description' => 'Package in transit to destination',
                'event_time' => now()->subHours(6),
            ],
        ];

        foreach ($events as $event) {
            TrackingEvent::create(array_merge($event, ['shipment_id' => $shipment->id]));
        }
    }
}