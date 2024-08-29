@extends('layouts.layouts')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-8">
            <div class="card bg-white shadow">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="card-title fw-bold m-0">Parts Details</h5>
                    <a href="{{ route('vehicle.index') }}" class="text-white">X</a>
                </div>
                <div class="card-body">
                    
                    <p class="card-text"><strong>Asset Code::</strong> {{ $partsshow->jrnum }}</p>
                    <p class="card-text"><strong>Type:</strong> {{ $partsshow->material_name }}</p>
                    <p class="card-text"><strong>Allotted To:</strong> {{ $partsshow->location }}</p>
                    <p class="card-text"><strong>Chassis No:</strong> {{ $partsshow->material_type }}</p>
                    <p class="card-text"><strong>Engine Serial No:</strong> {{ $partsshow->quantity }}</p>
                    <p class="card-text"><strong>Vehicle Make:</strong> {{ $partsshow->number_of_quantity }}</p>
                    <p class="card-text"><strong>Last Service Record:</strong> {{ $partsshow->description }}</p>
                   
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



