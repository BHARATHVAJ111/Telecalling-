@extends('layouts.layouts')

@section('content')
<div class="container sticky-top bg-white">
    <div class="row">
        <div class="col-lg-12 mt-5">
            <p class="nav-item d-flex">
                <a href="{{route('employee.index')}}" class="nav-link align-middle px-0  {{ request()->route()->getName() === 'store.index' ? 'active' : '' }}">
                    <span class="ms-1 d-none d-sm-inline btn btn-primary">
                        <i class="fa-solid fa-backward"></i>
                        <span class="ms-1" title="Back to Part">Back</i></span>
                    </span>
                </a>
            </p>
        </div>
       
    </div>
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
    <div class="row mt-3">
        <div class="col-lg-12 bg-light shadow p-3 rounded">
            <form action="{{route('base.delete')}}" method="POST" class="form-group">
                @csrf
                @method('DELETE')
                <div class="d-flex justify-content-center gap-3">
                <div>
                    <label for="inward_search_date" class="pb-2 lable">Start Date:</label><br>
                    <input type="date" id="inward_search_date" name="start_date" class=" mb-2 mt-3 input" required>
                </div>
                <div>
                    <label for="inward_search_date" class="pb-2 lable">End Date:</label><br>
                    <input type="date" id="inward_search_date" name="end_date" class="mt-3 mb-2 input" required>
                </div>
                </div>
                <button type="submit" class="btn btn-danger">Delete</button>
                <!-- <script>
                    function confirmDelete(assetId) {
                        if (confirm('Are you sure you want to delete this data?')) {
                            document.getElementById('delete-form-' + assetId).submit();
                        }
                    }
                </script> -->
            </form>
        </div>
    </div>




</div>

<script>
    function myFunction() {
        var input, filter, table, tr, td1, td2, i, txtValue1, txtValue2;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td1 = tr[i].getElementsByTagName("td")[1];
            td2 = tr[i].getElementsByTagName("td")[2];
            if (td1 || td2) {
                txtValue1 = td1 ? td1.textContent || td1.innerText : "";
                txtValue2 = td2 ? td2.textContent || td2.innerText : "";
                if (txtValue1.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
@endsection