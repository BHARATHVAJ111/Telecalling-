@extends('layouts.layouts')
<div class="container mt-2 p-5 ">
    <div class="row bg-white shadow p-3 border border-3 border-primary">
        <h3 class="text-center border-bottom bg-primary rounded-pill p-2 mb-3"> <span>Generator Deatils</span></h3>
        <div class="col-2"></div>
        <div class="col-md-5">
            <div class="field-group">
                <span class="field-label text-danger">Engine Serial No:</span>
                <span class="field-value">{{ $generator->engine_srno }}</span>
            </div>
            <div class="field-group">
                <span class="field-label text-danger">DG Range:</span>
                <span class="field-value">{{ $generator->dg_range }}</span>
            </div>
            <div class="field-group">
                <span class="field-label text-danger">Engine Make:</span>
                <span class="field-value">{{ $generator->engine_make }}</span>
            </div>
            <div class="field-group">
                <span class="field-label text-danger">Battery Make:</span>
                <span class="field-value">{{ $generator->battery_make }}</span>
            </div>
            <div class="field-group">
                <span class="field-label text-danger">Alternator Make:</span>
                <span class="field-value">{{ $generator->alternator_make }}</span>
            </div>
            <div class="field-group">
                <span class="field-label text-danger" >Battery Serial No:</span>
                <span class="field-value">{{ $generator->battery_srno }}</span>
            </div>
            <div class="field-group">
                <span class="field-label text-danger">Alternator Serial No:</span>
                <span class="field-value">{{ $generator->alternator_srno }}</span>
            </div>
            <div class="field-group">
                <span class="field-label text-danger">Oil Filter Part:</span>
                <span class="field-value">{{ $generator->oil_filter_part_code}}</span>
            </div>
            <div class="field-group">
                <span class="field-label text-danger">Diesel Filter Part:</span>
                <span class="field-value">{{ $generator->diesel_filter_part_code}}</span>
            </div>
            <div class="field-group">
                <span class="field-label text-danger">Air Filter Part:</span>
                <span class="field-value">{{ $generator->air_filter_part_code }}</span>
            </div>

        </div>
        
        <div class="col-md-5">
                <div class="col-md-5">
                    <img src="{{ asset('storage/' . $generator->img_3) }}" alt="Image 1" width="250px">
                </div>
        </div>
        <div class="row mt-3">
            <div class="col-2"></div>
            <div class="col-md-5">
                <img src="{{ asset('storage/' . $generator->img_3) }}" alt="Image 1" width="250px">
            </div>
            <div class="col-md-5">
                <img src="{{ asset('storage/' . $generator->img_3) }}" alt="Image 2" width="250px">
            </div>
            <!-- <div class="col-md-4">
                <img src="{{ asset('storage/' . $generator->img_3) }}" alt="Image 2" width="250px">
            </div> -->
        </div>
    </div>
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