<?php

 namespace App\Models;

 use Illuminate\Database\Eloquent\Factories\HasFactory;
 use Illuminate\Database\Eloquent\Model;

 class Shipment extends Model
    {
        use HasFactory;

        protected $fillable = [
            'tracking_number', 'sender_name', 'sender_address', 'sender_phone',
            'receiver_name', 'receiver_address', 'receiver_phone', 'description',
            'weight', 'status', 'current_location', 'estimated_delivery'
        ];

        protected $casts = [
            'estimated_delivery' => 'datetime',
        ];

        public function trackingEvents()
        {
            return $this->hasMany(TrackingEvent::class);
        }
    }