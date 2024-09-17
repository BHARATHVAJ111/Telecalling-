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
        <div class="d-flex justify-content-center align-items-center">
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
<!-- Bulk Delete Form -->


    @if($AudioFilesSelect->isEmpty())
    @if($firstEmpAudio && $firstEmpAudio->isNotEmpty())
    @foreach($firstEmpAudio as $audio)
    <!-- Add any other details or actions you need -->
    @endforeach
    @php
    // Fetch employee data
    $employee = \App\Models\Employee::find($audio->employee_id);
    
    @endphp
    <h5 class="mt-5">Employee: {{ $employee ? $employee->name : 'Not found' }}</h5>
    @endif
    @if($firstEmpAudio && $firstEmpAudio->isNotEmpty())
    <!-- Display firstEmpAudio when AudioFilesSelect is empty -->
    <!-- Render firstEmpAudio data as needed -->

    <form id="bulk-delete-form" action="{{ route('employees.bulkDelete') }}" method="POST">
        @csrf
        @method('DELETE')

        <!-- Bulk Action Buttons -->
        <button type="button" class="btn btn-danger mb-2" id="bulk-delete-btn" disabled>Delete Selected</button>
    <table class="table text-center bg-light shadow table-striped table-bordered table-hover table-esponsive ">
        <thead>
            <tr>
                <th><input type="checkbox" id="select-all"></th>
                <th>ID</th>
                <th>File Name</th>
                <th>Mobile</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach($firstEmpAudio as $key => $audioFile)
            <tr>
                <td><input type="checkbox" name="ids[]" value="{{ $audioFile->id }}" class="select-checkbox"></td>
                <td>{{ $key + 1 }}</td>
                <td> <audio controls>
                        <source src="{{ asset('storage/' . $audioFile->file_path) }}" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </td>
                <td>{{$audioFile->customer_mobile}}</td>
                <td>
                   
                        <a href="{{route('audio.delete',['id'=>$audioFile->id])}}" id="delete-form-{{ $audioFile->id }}">
                        <button type="button" onclick="confirmDelete({{ $audioFile->id }})" class="btn"> <i class="fa-solid fa-trash-can" style="color: #f50025;"></i></button>
                        </a>

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
    </form>
<!-- Bootstrap Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="close btn btn fs-5" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete the selected employees?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-danger" id="confirm-delete-btn">Yes, Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for handling modal and form submission -->
<script>
    document.getElementById('select-all').addEventListener('click', function() {
        let checkboxes = document.querySelectorAll('.select-checkbox');
        checkboxes.forEach(checkbox => checkbox.checked = this.checked);
        toggleBulkDeleteButton();
    });

    let checkboxes = document.querySelectorAll('.select-checkbox');
    checkboxes.forEach(checkbox => checkbox.addEventListener('change', toggleBulkDeleteButton));

    function toggleBulkDeleteButton() {
        let selectedCheckboxes = document.querySelectorAll('.select-checkbox:checked');
        let deleteButton = document.getElementById('bulk-delete-btn');
        deleteButton.disabled = selectedCheckboxes.length === 0;
    }

    // Show the modal when Delete button is clicked
    document.getElementById('bulk-delete-btn').addEventListener('click', function() {
        $('#confirmDeleteModal').modal('show');
    });

    // Confirm and submit the form on Yes button click
    document.getElementById('confirm-delete-btn').addEventListener('click', function() {
        document.getElementById('bulk-delete-form').submit();
    });
</script>

@else
<p class="border text-center border-2 mt-2 p-2">No audio files available for employee.</p>
@endif


@else
<!-- Display AudioFilesSelect collection as a table -->
@foreach($AudioFilesSelect as $audioFile) @endforeach
@php
// Fetch employee data
$employee = \App\Models\Employee::find($audioFile->employee_id);

@endphp
<h5 class="mt-2 ">Employee: {{ $employee ? $employee->name : 'Not found' }}</h5>
<form id="bulk-delete-form" action="{{ route('employees.bulkDelete') }}" method="POST">
        @csrf
        @method('DELETE')

        <!-- Bulk Action Buttons -->
        <button type="button" class="btn btn-danger mb-2" id="bulk-delete-btn" disabled>Delete Selected</button>

<table class="table text-center bg-light shadow table-striped table-bordered table-hover table-esponsive">
    <thead>
        <tr>
        <th><input type="checkbox" id="select-all"></th>
            <th>ID</th>
            <th>File Name</th>
            <th>Mobile</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if($AudioFilesSelect->isEmpty())
        <tr><td colspan="4">No Audio</td></tr>
        @else
        @foreach($AudioFilesSelect as $key => $audioFile)
        <tr>
        <td><input type="checkbox" name="ids[]" value="{{ $audioFile->id }}" class="select-checkbox"></td>
            <td>{{ $key + 1 }}</td>
            <td><audio controls>
                    <source src="{{ asset('storage/' . $audioFile->file_path) }}" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
            </td>
            <td>{{$audioFile->customer_mobile}}</td>
                <td>
                <a href="{{route('audio.delete',['id'=>$audioFile->id])}}" id="delete-form-{{ $audioFile->id }}">
                        <button type="button" onclick="confirmDelete({{ $audioFile->id }})" class="btn"> <i class="fa-solid fa-trash-can" style="color: #f50025;"></i></button>
                        </a>

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
        @endif
    </tbody>
</table>
</form>

<!-- Bootstrap Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="close btn btn fs-5" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete the selected employees?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >No</button>
                <button type="button" class="btn btn-danger" id="confirm-delete-btn">Yes, Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for handling modal and form submission -->
<script>
    document.getElementById('select-all').addEventListener('click', function() {
        let checkboxes = document.querySelectorAll('.select-checkbox');
        checkboxes.forEach(checkbox => checkbox.checked = this.checked);
        toggleBulkDeleteButton();
    });

    let checkboxes = document.querySelectorAll('.select-checkbox');
    checkboxes.forEach(checkbox => checkbox.addEventListener('change', toggleBulkDeleteButton));

    function toggleBulkDeleteButton() {
        let selectedCheckboxes = document.querySelectorAll('.select-checkbox:checked');
        let deleteButton = document.getElementById('bulk-delete-btn');
        deleteButton.disabled = selectedCheckboxes.length === 0;
    }

    // Show the modal when Delete button is clicked
    document.getElementById('bulk-delete-btn').addEventListener('click', function() {
        $('#confirmDeleteModal').modal('show');
    });

    // Confirm and submit the form on Yes button click
    document.getElementById('confirm-delete-btn').addEventListener('click', function() {
        document.getElementById('bulk-delete-form').submit();
    });
</script>
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