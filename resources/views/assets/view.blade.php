@extends('layouts.sidebar')
@section('content')
<div class="main">
    <div class="row align-items-center">
        {{-- <div><h2 class="btn btn-primary text-white fw-bolder float-end mt-1">User Type: {{ auth()->user()->name }}</h2>
    </div> --}}
    @if ( auth()->user()->role_id == 6)
    <div class="col">
        <div class="welcome-back">Hai JKGPL Store<span class="drop-truck"></span></div>
    </div>
    @endif
    @if ( auth()->user()->role_id == 5)
    <div class="welcome-back">Hai JKGPL Admin<span class="drop-truck"></span></div>
    @endif
    <div class="col-auto">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <!-- <a href="#."><img src="images/dashboard/search.png" height="25" width="25"></a> -->
        <!-- Inside the 'content-wrapper' div -->
        {{-- @if (auth()->user()->role_id == 5 || auth()->user()->role_id == 6)
                    <button type="button" class="btn btn-success dash1 mt-3" >Add</button>
                @endif --}}


        <!-- Modal -->
        <div class="modal fade container-fluid" id="" tabindex="-1" aria-labelledby="createIndentModalLabel" aria-hidden="true">
            <div class="modal-dialog rounded" role="document">
                <div class="modal-content">
                    <div class="modal-header fw-bolder text-white text-center" style="background:#F98917;">
                        ADD GENERATOR
                        <div class="modal-body">
                            @include('assets.generator')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal for vehicle insertion -->
    <div class="modal fade container-fluid" id="Generator" tabindex="-1" aria-labelledby="createIndentModalLabel" aria-hidden="true">
        <div class="modal-dialog rounded" role="document">
            <div class="modal-content">
                <div class="modal-header fw-bolder text-white text-center" style="background:#F98917;">
                    ADD GENERATOR
                </div>
                <div class="modal-body">
                    @include('assets.generator')
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<p class="nav-item d-flex justify-content-end">
    <a href="{{ route('store.index') }}" class="nav-link align-middle px-0  {{ request()->route()->getName() === 'store.index' ? 'active' : '' }}">
        <span class="ms-1 d-none d-sm-inline btn btn-primary">
            <i class="fa-solid fa-backward"></i>
            <span class="ms-1" title="Back to Part">Back</i></span>
        </span>
    </a>
</p>

<div class="container-fluid">
    <!-- <div class="">
            <ul class="d-flex gap-5 bg-secondary shadow rounded-pill pt-3">
                <p class="nav-item">
                    <a href="{{ route('assets.index') }}"
                        class="nav-link align-middle px-0 active {{ request()->route()->getName() === 'assets.index ' ? 'active' : '' }}">
                        <span class="ms-1 d-none d-sm-inline">
                            <span class="ms-1">Assets</i></span>
                        </span>
                    </a>
                </p>
                <p class="nav-item">
                    <a href="{{ route('store.index') }}"
                        class="nav-link align-middle px-0  {{ request()->route()->getName() === 'store.index' ? 'active' : '' }}">
                        <span class="ms-1 d-none d-sm-inline">
                            <span class="ms-1">Parts</i></span>
                        </span>
                    </a>
                </p>
            </ul>
        </div> -->

</div>
<div class="container-fluid">
    <div class="d-flex justify-content-between bg-second shadow rounded-pill pt-3">
        <ul class="d-flex gap-5 ">
            <p class="nav-item">
                <a href="{{ route('assets.index') }}" class="nav-link align-middle px-0 {{ request()->route()->getName() === 'assets.index' ? 'active' : '' }}">
                    <span class="ms-1 d-none d-sm-inline">
                        <span class="ms-1">Generator</i></span>
                    </span>
                </a>
            </p>
            <p class="nav-item">
                <a href="{{route('vehicle.index')}}" class="nav-link align-middle px-0 {{ request()->route()->getName() === 'vehicle.index' ? 'active' : '' }}">
                    <span class="ms-1 d-none d-sm-inline">
                        <span class="ms-1">Vehicle</i></span>
                    </span>
                </a>
            </p>
            {{-- <p class="nav-item">
                    <a href="{{route('vehicle.view')}}"
            class="nav-link align-middle px-0 {{ request()->route()->getName() === 'vehicle.view' ? 'active' : '' }}"
            >
            <span class="ms-1 d-none d-sm-inline">
                <span class="ms-1">Service History</i></span>
            </span>
            </a>
            </p> --}}

        </ul>
        <div>
            <p class="nav-item px-5">
                <a href="" class="nav-link align-middle px-0 btn btn-primary text-white {{ request()->route()->getName() === 'store.index' ? 'active' : '' }}" data-bs-toggle="modal" data-bs-target="#Vehicle">
                    <span class="ms-1 d-none d-sm-inline">
                        <i class="fa-solid fa-plus text-light"></i>
                        <span class="ms-1">Add Vehicle</i></span>
                    </span>
                </a>
            </p>
        </div>
    </div>

    <!-- Modal for vehicle insertion -->
    <div class="modal fade container-fluid" id="vehicle" tabindex="-1" aria-labelledby="createIndentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl rounded" role="document">
            <div class="modal-content">
                <div class="modal-header fw-bolder text-white text-center" style="background:#F98917;">
                    ADD VEHICLE
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color:white;">
                    <span aria-hidden="true"></span>
                </button>
                </div>
                <div class="modal-body">
                    @include('assets.vehicle')
                </div>
            </div>
        </div>
    </div>
</div>
<table class="table table-bordered table-striped table-hover table-responsive mt-5">
    <thead>
        <tr>
            <th>Sr.No</th>
            <th scope="col">Vehicle No</th>
            <th scope="col">Type 2w/4w</th>
            <th scope="col">Alloted To</th>

            <th scope="col">Last Service Record</th>
            <th scope="col">Last Service KM</th>
            <th scope="col">Last Service Spares& Tyre Change Dates</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($vehicle as $key => $value)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$value->vehicle_no}}</td>
            <td>{{$value->type}}</td>
            <td>{{$value->alloted_to}}</td>

            <td>{{$value->last_service_record}}</td>
            <td>{{$value->last_service_km}}</td>
            <td>{{$value->last_service_spares}}</td>
            <td class="d-flex">
                <form action="{{route('vehicle.show',['vehicle_no'=>$value->id])}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn mt-2">
                        <i class="fa-sharp fa-solid fa-eye" style="color:black;" title="Detail View"></i>
                    </button>
                </form>
                <a class="mt-3" href="{{route('vehicle.history',['vehicle_no'=>$value->vehicle_no])}}"><i class="fa-solid fa-plus text-success" title="Add Vehile History"></i></a>
                <a class="mt-3 ms-2" href="{{route('vehicle.view',['vehicle_no'=>$value->vehicle_no])}}"><i class="fa-solid fa-folder-open text-warning" title="View Vehicle History"></i></a>

                <form action="{{route('vehicle.delete',['vehicle_no'=>$value->id])}}" method="post" id="delete-form-{{ $value->id }}">
    @csrf
    @method('DELETE')
    <button type="button" class="btn btn mt-2" onclick="confirmDelete({{ $value->id }})">
        <i class="fa-solid fa-trash-can text-danger" title="Delete"></i>
    </button>
</form>
<script>
    function confirmDelete(assetId) {
        if (confirm('Are you sure you want to delete this data?')) {
            document.getElementById('delete-form-' + assetId).submit();
        }
    }
</script>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>



@endsection