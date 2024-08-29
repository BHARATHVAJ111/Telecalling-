@extends("layouts.layouts")
<div class="container bg-white shadow border border-1 mt-4 p-3">
    <form action="{{route('generator.update',['id' => $generator->id])}}" method="POST" id="indentForm" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="">
            <div class="">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group mt-1">
                            <label for="engine_srno">Engine Sr.No:</label>
                            <input type="text" class="form-control @error('engine_srno') is-invalid @enderror" id="customer_name" name="engine_srno" value="{{$generator->engine_srno}}">
                            @error('engine_srno')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group mt-1">
                            <label for="dg_range">DG Range:</label>
                            <input type="text" class="form-control @error('dg_range') is-invalid @enderror" id="dg_range" name="dg_range" value="{{$generator->dg_range}}">
                            @error('dg_range')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group mt-1">
                            <label for="engine_make">Engine Make:</label>
                            <input type="text" class="form-control @error('engine_make') is-invalid @enderror" id="engine_make" name="engine_make" value="{{$generator->engine_make}}">
                            @error('engine_make')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                </div>


                <div class="row">
                    <div class="col-4">

                        <div class="form-group mt-1">
                            <label for="battery_make">Battery Make:</label>
                            <input type="text" class="form-control @error('battery_make') is-invalid @enderror" id="battery_make" name="battery_make" value="{{$generator->battery_make}}">
                            @error('battery_make')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group mt-1">
                            <label for="alternator_make">Alternator Make:</label>
                            <input type="text" class="form-control @error('alternator_make') is-invalid @enderror" id="alternator_make" name="alternator_make" value="{{$generator->alternator_make}}">
                            @error('alternator_make')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4">

                        <div class="form-group mt-1">
                            <label for="battery_srno">Battery Sr.No:</label>
                            <input type="text" class="form-control @error('battery_srno') is-invalid @enderror" id="battery_srno" name="battery_srno" value="{{$generator->battery_srno}}">
                            @error('battery_srno')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                </div>


                <div class="row">
                    <div class="col-3">
                        <div class="mt-1">
                            <label for="alternator_srno">Alternator Serial Number:</label>
                            <input type="text" class="form-control @error('alternator_srno') is-invalid @enderror" id="alternator_srno" name="alternator_srno" value="{{$generator->alternator_srno}}">
                            @error('alternator_srno')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group mt-1">
                            <label for="oil_filter_part">Oil Filter part code:</label>
                            <input type="text" class="form-control @error('oil_filter_part') is-invalid @enderror" id="customer_name" name="oil_filter_part" value="{{$generator->oil_filter_part_code}}">
                            @error('oil_filter_part')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group mt-1">
                            <label for="diesel_filter_part">Diesel Filter part code:</label>
                            <input type="text" class="form-control @error('diesel_filter_part') is-invalid @enderror" id="diesel_filter_part" name="diesel_filter_part" value="{{$generator->diesel_filter_part_code}}">
                            @error('diesel_filter_part')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-3">
                    <div class="form-group mt-1">
                        <label for="air_filter_part">Air Filter part code:</label>
                        <input type="text" class="form-control @error('air_filter_part') is-invalid @enderror" id="air_filter_part" name="air_filter_part" value="{{$generator->air_filter_part_code}}">
                        @error('air_filter_part')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    </div>

                </div>

                
                <div class="row">
                    <div class="col-3">
                    <div class="form-group mt-1">
                        <label for="img-1">Image-1:</label>
                        <input type="file" class="form-control @error('img-1') is-invalid @enderror" id="asset_photos" name="img-1">
                        @error('img-1')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    </div>
                    <div class="col-3">
                    <div class="form-group mt-1">
                        <label for="img-2">Image-2:</label>
                        <input type="file" class="form-control @error('img-2') is-invalid @enderror" id="asset_photos" name="img-2">
                        @error('img-2')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    </div>
                    <div class="col-3">
                    <div class="form-group mt-1">
                        <label for="img-3">Image-3:</label>
                        <input type="file" class="form-control @error('img-3') is-invalid @enderror" id="asset_photos" name="img-3">
                        @error('img-3')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    </div>
                    <div class="col-3">
                    <div class="form-group mt-1">
                        <label for="img-4">Image-4:</label>
                        <input type="file" class="form-control @error('img-4') is-invalid @enderror" id="asset_photos" name="img-4">
                        @error('img-4')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                    <div class="form-group mt-1">
                        <label for="img-5">Image-5:</label>
                        <input type="file" class="form-control @error('img-5') is-invalid @enderror" id="asset_photos" name="img-5">
                        @error('img-5')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    </div>
                    <div class="col-4">
                    <div class="form-group mt-1">
                        <label for="img-6">Image-6:</label>
                        <input type="file" class="form-control @error('img-6') is-invalid @enderror" id="asset_photos" name="img-6">
                        @error('img-6')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    </div>
                    <div class="col-4">
                    <div class="form-group mt-1">
                        <label for="img-7">Image-7:</label>
                        <input type="file" class="form-control @error('img-7') is-invalid @enderror" id="asset_photos" name="img-7">
                        @error('img-7')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- <div class="form-group mt-1">
                        <label for="img-7">Image-7:</label>
                        <input type="file" name="images[]" multiple>
                        @error('img-8')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div> -->
                    </div>
                </div>
            </div>
            <div class="mt-1 d-grid d-flex justify-content-center mt-2 ">
                <button type="submit" onclick="submitForm()" class="btn btn-success me-2">Edit & Update</button>
                <a href="{{route('assets.index')}}" class="btn btn-danger">Cancel</a>
            </div>
    </form>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
<style>
    .ui-autocomplete {
        z-index: 10000;
        /* Set an even higher z-index value */
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!-- Include your JavaScript code here -->