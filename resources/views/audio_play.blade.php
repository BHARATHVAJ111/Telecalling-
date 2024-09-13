@extends('layouts.layouts')

        <table class="table w-50 container table table-bordered border-dark mt-3 table-success table-striped text-center">
  <thead>
    <tr class="">
      <th scope="col">S.No</th>
      <th scope="col">Audio</th>
      
    </tr>
  </thead>
  <tbody>
  @if($audio->isEmpty())
  <tr>
    
      <td colspan="2">No Audio Files Exist</td>
    </tr>
@else
    @foreach($audio as $key => $values)
   
    <tr>
        <td class="">{{$key+1}}</td>
      <td> <audio controls>
            <source src="{{ asset('storage/' . $values->file_path) }}" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio></td>
    </tr>
  </tbody>
</table>
    @endforeach
@endif
