@extends('layouts.sidebar')
@section('content')
<div>
        <a href="{{url('/dashboard')}}" class="btn dash1 m-2">Back to Indent</a>
    </div>
<div class="col-lg-12 mt-2" style="background-color:#D9D9D9">
    <ul class="list-unstyled">
        <!-- Your list items here -->
        <li class="row">
            <strong class="col-sm-3">Customer Name</strong>
            <span class="col-sm-7">{{ $indent->customer_name }}</span>
        </li>
        <li class="row">
            <strong class="col-sm-3">Company Name</strong>
            <span class="col-sm-7">{{ $indent->company_name }}</span>
        </li>
        <li class="row">
            <strong class="col-sm-3">Number 1</strong>
            <span class="col-sm-7">{{ $indent->number_1 }}</span>
            <div class="col-sm-2">
 
            </div>
        </li>
        <li class="row">
            <strong class="col-sm-3">Number 2</strong>
            <span class="col-sm-7">{{ $indent->number_2 }}</span>
        </li>
        <li class="row">
            <strong class="col-sm-3">Source of Lead</strong>
            <span class="col-sm-7">{{ $indent->source_of_lead }}</span>
        </li>
        <li class="row">
            <strong class="col-sm-3">Pickup Locations</strong>
            <span class="col-sm-7">
            <td>{{ $indent->pickupLocation ? $indent->pickupLocation->district : 'N/A' }}</td>
            </span>
        </li>
        <li class="row">
            <strong class="col-sm-3">Drop Locations</strong>
            <span class="col-sm-7">
            <td>{{ $indent->dropLocation ? $indent->dropLocation->district : 'N/A' }}</td>
            </span>
        </li>
        <li class="row">
            <strong class="col-sm-3">Truck Type</strong>
            <span class="col-sm-7">{{ $indent->truckType ? $indent->truckType->name : 'N/A' }}</span>
        </li>
        <li class="row">
            <strong class="col-sm-3">Body Type</strong>
            <span class="col-sm-7">{{ $indent->body_type }}</span>
        </li>
        <li class="row">
            <strong class="col-sm-3">Weight</strong>
            <span class="col-sm-7">{{ $indent->weight }}{{ $indent->weight_unit }}</span>
        </li>
        <li class="row">
            <strong class="col-sm-3">Material Type</strong>
            <span class="col-sm-7">{{ $indent->materialType ? $indent->materialType->name : 'N/A' }}</span>
        </li>
        <li class="row">
            <strong class="col-sm-3">POD Soft/Hard Copy</strong>
            <span class="col-sm-7">{{ $indent->pod_soft_hard_copy }}</span>
        </li>
        <li class="row">
            <strong class="col-sm-3">Remarks</strong>
            <span class="col-sm-7">{{ $indent->remarks }}</span>
        </li>
        <li class="row">
            <strong class="col-sm-3">Rate</strong>
            <span class="col-sm-7">
                @if($rate)
                {{ $rate->rate }}
                @else
                No rate available
                @endif
            </span>
        </li>
    </ul>
</div>
@endsection