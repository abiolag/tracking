@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Admin Dashboard</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card text-white bg-primary mb-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h5 class="card-title">Total Shipments</h5>
                                            <h2 class="mb-0">{{ $totalShipments }}</h2>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="fas fa-box fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-white bg-success mb-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h5 class="card-title">Delivered</h5>
                                            <h2 class="mb-0">{{ $deliveredShipments }}</h2>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="fas fa-check-circle fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-white bg-warning mb-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h5 class="card-title">In Transit</h5>
                                            <h2 class="mb-0">{{ $inTransitShipments }}</h2>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="fas fa-shipping-fast fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-white bg-info mb-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h5 class="card-title">Pending</h5>
                                            <h2 class="mb-0">{{ $pendingShipments }}</h2>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="fas fa-clock fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('admin.shipments.create') }}" class="btn btn-primary me-md-2">
                                    <i class="fas fa-plus me-1"></i>Create New Shipment
                                </a>
                                <a href="{{ route('admin.shipments.quick-create') }}" class="btn btn-success">
                                    <i class="fas fa-bolt me-1"></i>Quick Create
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <h5>Recent Shipments</h5>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Tracking #</th>
                                            <th>Customer</th>
                                            <th>Origin</th>
                                            <th>Destination</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($recentShipments as $shipment)
                                        <tr>
                                            <td>{{ $shipment->tracking_number }}</td>
                                            <td>{{ $shipment->user->name ?? 'N/A' }}</td>
                                            <td>{{ $shipment->origin }}</td>
                                            <td>{{ $shipment->destination }}</td>
                                            <td>
                                                <span class="badge bg-{{ $shipment->status_color }}">
                                                    {{ $shipment->status }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.shipments.show', $shipment->id) }}" class="btn btn-sm btn-info">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.shipments.edit', $shipment->id) }}" class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection