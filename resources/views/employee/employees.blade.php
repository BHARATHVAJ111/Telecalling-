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


    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-primary dash1 mt-3 text-dark" data-bs-toggle="modal" data-bs-target="#createEmployee"><i class="fa-solid fa-plus text-light pe-1"></i>Add Employee</button>
    </div>

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



<table class="table text-center table-striped table-bordered table-hover table-esponsive mt-5" id="myTable">
    <thead class="pb-2">
        <tr class="pb-2">
            <th>Sr.No</th>
            <th>Name</th>
            <th>Mobile Number</th>
            <!-- <th>Password</th> -->
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($employee as $key => $values)
        <tr class="bg-light shadow rounded-circle pb-5">
            <td>{{$key + 1}}</td>
            <td>{{ $values->name }}</td>
            <td>{{ $values->mobile }}</td>
            <!-- <td>{{ $values->password }}</td> -->
            <td class="d-flex justify-content-around">

                <!-- <a href="{{route('parts.show',['id'=>$values->id])}}" class="pt-2">
                    <i class="fa-sharp fa-solid fa-eye" style="color:black;"></i>
                </a> -->

                <a href="{{route('employee.edit',['id'=>$values->id])}}" class="pt-2 ps-2">
                    <i class="fa-solid fa-pencil"></i>
                </a>

                <form action="{{route('employee.delete',['id'=>$values->id])}}" method="POST" id="delete-form-{{ $values->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="confirmDelete({{ $values->id }})" class="btn"> <i class="fa-solid fa-trash-can" style="color: #f50025;"></i></button>
                </form>

                <script>
                    function confirmDelete(assetId) {
                        if (confirm('Are you sure you want to delete this data?')) {
                            document.getElementById('delete-form-' + assetId).submit();
                        }
                    }
                </script>

                <a href="{{ route('play.audio', ['id' => $values->id]) }}">
                    <i class="fa-solid fa-download mt-2 text-dark" title="">Audio</i>
                </a>


            </td>
        </tr>
        @endforeach
    </tbody>
</table>
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