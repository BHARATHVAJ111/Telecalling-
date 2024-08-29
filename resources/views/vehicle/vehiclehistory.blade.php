@extends('layouts.layouts')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="container bg-light shadow p-5" style="max-width: 600px;">
        <div class="d-flex justify-content-between">
            <h2 class="text-center mb-4">Submit Your Vehicle History</h2>
            <a href="{{route('vehicle.index')}}"><strong class="fs-4" title="Back">X</strong></a>
        </div>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <form action="{{route('vehiclehistory.store',['vehicle_no'=>$vehicle])}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="dateInput">Date:</label>
                <input type="date" id="dateInput" name="date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="textArea">Description:</label>
                <textarea id="textArea" name="description" class="form-control" rows="4" required></textarea>
            </div>
            <div class="justify-content-center">
                <button type="submit" class="btn btn-primary mt-2 btn-block">Add History</button>
            </div>
            <!-- <button type="submit" class="btn btn-primary mt-2 d-flex justify-content-center align-items-center text-center ">Add History</button> -->
        </form>
    </div>
</div>
@endsection
