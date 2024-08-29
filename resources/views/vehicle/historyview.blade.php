@extends('layouts.layouts')
<div class="container">
  <h4 class="text-center mt-3"><span class="border-bottom border-primary border-3 pb-1">Vehicle History</span></h4>
  <div class="d-flex justify-content-end">
  <a href="{{route('vehicle.index')}}" class="btn btn-primary "><i class="fa-solid fa-backward text-white me-2"></i>Back</a>
  </div>
<table class="table table-bordered border-dark table-striped table-hover table-responsive mt-3">
        <thead>
          <tr>
            <th scope="col">Vehicle No</th>
            <th scope="col">Service Date</th>
            <th scope="col">Vehicle History</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($history as $value)
          <tr>
            <td>{{$value->vehicle_no}}</td>
            <td>{{$value->date}}</td>
            <td>{{$value->description}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>


    