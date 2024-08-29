@extends('layouts.layouts')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-8">
            <div class="card bg-white shadow">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="card-title fw-bold m-0">Vehicle Details</h5>
                    <a href="{{ route('vehicle.index') }}" class="text-white">X</a>
                </div>
                <div class="card-body">
                    @foreach($vehicle as $data)
                    <p class="card-text"><strong>Vehicle Number:</strong> {{ $data->vehicle_no }}</p>
                    <p class="card-text"><strong>Type:</strong> {{ $data->type }}</p>
                    <p class="card-text"><strong>Allotted To:</strong> {{ $data->alloted_to }}</p>
                    <p class="card-text"><strong>Chassis No:</strong> {{ $data->chasis_no }}</p>
                    <p class="card-text"><strong>Engine Serial No:</strong> {{ $data->engine_srno }}</p>
                    <p class="card-text"><strong>Vehicle Make:</strong> {{ $data->vehicle_make }}</p>
                    <p class="card-text"><strong>Last Service Record:</strong> {{ $data->last_service_record }}</p>
                    <p class="card-text"><strong>Last Service KM:</strong> {{ $data->last_service_km }}</p>
                    <p class="card-text"><strong>Last Service Spares:</strong> {{ $data->last_service_spares }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
