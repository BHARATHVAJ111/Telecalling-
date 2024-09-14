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
    <div class="col">
        <div class="welcome-back">Hai JKGPL Admin<span class="drop-truck"></span></div>
    </div>
    @endif

    <form action="{{route('employee.index')}}" method="GET">
        @csrf
        <div class="d-flex justify-content-between">
       
        <div class="form-group mt-1">
            <label for="source_of_lead">Employee List:</label>
            <select class="form-select @error('User_id') is-invalid @enderror mt-3" id="source_of_lead" name="User_id">
                <option value="">Select Employee</option>
                @foreach($employee as $employees)
                <option value="{{$employees->id}}">{{$employees->name}}</option>
                @endforeach
            </select>
            @error('User_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="inward_search_date" class="pb-2 lable">Start Date:</label><br>
            <input type="date" id="inward_search_date" name="start_date" class=" mb-2 mt-3 input" required>
        </div>
        <div>
            <label for="inward_search_date" class="pb-2 lable">End Date:</label><br>
            <input type="date" id="inward_search_date" name="end_date" class="mt-3 mb-2 input" required>
        </div>
     
        </div>
        <div  class="d-flex justify-content-center align-items-center">
            <button type="submit" class="btn btn-primary ">Get History</button>
        </div>
    </form>

    <!-- <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-primary dash1 mt-3 text-dark" data-bs-toggle="modal" data-bs-target="#createEmployee"><i class="fa-solid fa-plus text-light pe-1"></i>Add Employee</button>
    </div> -->

    <div class="col-auto">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <!-- <a href="#."><img src="images/dashboard/search.png" height="25" width="25"></a> -->
        <!-- Inside the 'content-wrapper' div -->


        <!-- Modal -->
        <div class="modal fade container-fluid" id="createEmployee" tabindex="-1" aria-labelledby="createIndentModalLabel" aria-hidden="true">
            <div class="modal-dialog rounded" role="document">
                <div class="modal-content">
                    <div class="modal-header fw-bolder text-white text-center" style="background:#F98917;">
                        ADD EMPLOYEE
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color:white;">
                            <span aria-hidden="true"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @include('employee.create')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if($AudioFilesSelect->isEmpty())
<!-- Display firstEmpAudio when AudioFilesSelect is empty -->
@if($firstEmpAudio)
<!-- Render firstEmpAudio data as needed -->
@foreach($firstEmpAudio as $audio)
<!-- Add any other details or actions you need -->
@endforeach
@php
// Fetch employee data
$employee = \App\Models\Employee::find($audio->employee_id);

@endphp
<h5 class="mt-5">Employee: {{ $employee ? $employee->name : 'Not found' }}</h5>
<table class="table text-center bg-light shadow table-striped table-bordered table-hover table-esponsive ">
    <thead>
        <tr>
            <th>ID</th>
            <th>File Name</th>
            <th>Mobile</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

        @foreach($firstEmpAudio as $key => $audioFile)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td> <audio controls>
                    <source src="{{ asset('storage/' . $audioFile->file_path) }}" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
            </td>
            <td>{{$audioFile->customer_mobile}}</td>
            <td>
            <form action="{{route('audio.delete',['id'=>$audioFile->id])}}" method="POST" id="delete-form-{{ $audioFile->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="confirmDelete({{ $audioFile->id }})" class="btn"> <i class="fa-solid fa-trash-can" style="color: #f50025;"></i></button>
                </form>

                <script>
                    function confirmDelete(assetId) {
                        if (confirm('Are you sure you want to delete this data?')) {
                            document.getElementById('delete-form-' + assetId).submit();
                        }
                    }
                </script>
 <!-- Add any actions or links related to the audio file here -->
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p>No audio available for the first employee.</p>
@endif
@else
<!-- Display AudioFilesSelect collection as a table -->
@foreach($AudioFilesSelect as $audioFile) @endforeach
@php
// Fetch employee data
$employee = \App\Models\Employee::find($audioFile->employee_id);

@endphp
<h5>Employee: {{ $employee ? $employee->name : 'Not found' }}</h5>

<table class="table text-center bg-light shadow table-striped table-bordered table-hover table-esponsive">
    <thead>
        <tr>
            <th>ID</th>
            <th>File Name</th>
            <th>Mobile</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($AudioFilesSelect as $key => $audioFile)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td><audio controls>
                    <source src="{{ asset('storage/' . $audioFile->file_path) }}" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
            </td>
            <td>{{$audioFile->customer_mobile}}</td>
            <td>
            <form action="{{route('audio.delete',['id'=>$audioFile->id])}}" method="POST" id="delete-form-{{ $audioFile->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="confirmDelete({{ $audioFile->id }})" class="btn"> <i class="fa-solid fa-trash-can" style="color: #f50025;"></i></button>
                </form>

                <script>
                    function confirmDelete(assetId) {
                        if (confirm('Are you sure you want to delete this data?')) {
                            document.getElementById('delete-form-' + assetId).submit();
                        }
                    }
                </script>
 <!-- Add any actions or links related to the audio file here -->
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
<script>
    function myFunction() {
        var input, filter, table, tr, td, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
@endsection