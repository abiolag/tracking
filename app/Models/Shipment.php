<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'tracking_number',
        'user_id',
        'origin',
        'destination',
        'status',
        'description',
        'weight',
        'dimensions',
        'estimated_delivery'
    ];

    protected $casts = [
        'estimated_delivery' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trackingEvents()
    {
        return $this->hasMany(TrackingEvent::class);
    }

    /**
     * Get color based on status
     */
    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'pending' => 'warning',
            'in_transit' => 'info',
            'out_for_delivery' => 'primary',
            'delivered' => 'success',
            'exception' => 'danger',
            default => 'secondary'
        };
    }
}