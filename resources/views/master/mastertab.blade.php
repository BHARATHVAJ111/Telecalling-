@extends('layouts.sidebar')
@section('content')
    <div class="main">
        <div class="row align-items-center">
            {{-- <div><h2 class="btn btn-primary text-white fw-bolder float-end mt-1">User Type: {{ auth()->user()->name }}</h2></div> --}}
            @if ( auth()->user()->role_id == 8)
            <div class="col">
                <div class="welcome-back">Hai JKGPL Service<span class="drop-truck"></span></div>
            </div>
            @endif
            @if ( auth()->user()->role_id == 5)
            <div class="welcome-back">Hai JKGPL Admin<span class="drop-truck"></span></div>
            @endif
            <div class="d-flex justify-content-end">
                <label for="" class="fw-bold fs-5">Search : </label>
                <input class="w3-input w3-border w3-padding p-2" type="text" placeholder="Search for material name.." id="myInput" onkeyup="myFunction()">
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
                {{-- @if (auth()->user()->role_id == 5 || auth()->user()->role_id == 6)
                    <button type="button" class="btn btn-success dash1 mt-3" data-bs-toggle="modal"
                        data-bs-target="#createIndentModal">Add</button>
                @endif --}}


                <!-- Modal -->
                <div class="modal fade container-fluid" id="createIndentModal" tabindex="-1"
                    aria-labelledby="createIndentModalLabel" aria-hidden="true">
                    <div class="modal-dialog rounded" role="document">
                        <div class="modal-content">
                            <div class="modal-header fw-bolder text-white text-center" style="background:#F98917;">
                                ADD ASSERTS
                            </div>
                            <div class="modal-body">
                                @include('sales.lead')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="">
                <ul class="d-flex gap-5 bg-secondary rounded-pill shadow pt-3 mt-2">
                    <p class="nav-item">
                        <a href="{{route('service.index')}}"
                            class="nav-link align-middle px-0 {{ request()->route()->getName() === 'service.index' ? 'active' : '' }} ">
                            <span class="ms-1 d-none d-sm-inline">
                                <span class="ms-1">Movement</i></span>
                            </span>
                        </a>
                    </p>
                    <p class="nav-item">
                        <a href="{{route('master.master')}}"
                            class="nav-link align-middle px-0 active {{ request()->route()->getName() === 'master.master' ? 'active' : '' }} ">
                            <span class="ms-1 d-none d-sm-inline">
                                <span class="ms-1">Master</i></span>
                            </span>
                        </a>
                    </p>
                    <p class="nav-item">
                        <a href="{{route('service.mobi')}}"
                            class="nav-link align-middle px-0 {{ request()->route()->getName() === 'service.mobi' ? 'active' : '' }} ">
                            <span class="ms-1 d-none d-sm-inline">
                                <span class="ms-1">Mobilization</i></span>
                            </span>
                        </a>
                    </p>
                    <p class="nav-item">
                        <a href="{{route('master.movementshow')}}"
                            class="nav-link align-middle px-0 {{ request()->route()->getName() === 'master.movementshow' ? 'active' : '' }} ">
                            <span class="ms-1 d-none d-sm-inline">
                                <span class="ms-1">Closure</i></span>
                            </span>
                        </a>
                    </p>
                </ul>
            </div>
        </div>
        <div class="container-fluid">
            <div class="">
                <ul class="d-flex gap-5 bg-secondary rounded-pill shadow pt-3 ">
                    <p class="nav-item">
                        <a href="{{route('master.engineerone')}}"
                            class="nav-link align-middle px-0 {{ request()->route()->getName() === 'master.engineerone' ? 'active' : '' }} " >
                            <span class="ms-1 d-none d-sm-inline">
                                <span class="ms-1">Service Engineer 1</i></span>
                            </span>
                        </a>
                    </p>
                    <p class="nav-item">
                        <a href="{{route('master.engineertwo')}}"
                            class="nav-link align-middle px-0 {{ request()->route()->getName() === 'master.engineertwo' ? 'active' : '' }} ">
                            <span class="ms-1 d-none d-sm-inline">
                                <span class="ms-1">Service Engineer 2</i></span>
                            </span>
                        </a>
                    </p>
                    <p class="nav-item">
                        <a href="{{route('master.engineerthree')}}"
                            class="nav-link align-middle px-0 {{ request()->route()->getName() === 'master.engineerthree' ? 'active' : '' }} ">
                            <span class="ms-1 d-none d-sm-inline">
                                <span class="ms-1">Service Engineer 3</i></span>
                            </span>
                        </a>
                    </p>
                    <p class="nav-item">
                        <a href="{{route('master.engineerfour')}}"
                            class="nav-link align-middle px-0 {{ request()->route()->getName() === 'master.engineerfour' ? 'active' : '' }} ">
                            <span class="ms-1 d-none d-sm-inline">
                                <span class="ms-1">All</i></span>
                            </span>
                        </a>
                    </p>
                </ul>
            </div>
        </div>
        <table class="table table-hover table-striped table-responsive table-bordered" id="myTable">
    <thead>
      <tr>
        <th>Sr.No</th>
        <th>Asset_Number</th>
        {{-- <th scope="col">Service Engineer Name</th> --}}
        <th scope="col">Customer Name</th>
        <th scope="col">Location</th>
        <th scope="col">Open Hour</th>
        <th scope="col">Open Date</th>
        <th scope="col">Last Os Hour</th>
        <th scope="col">Last Os Date</th>
        <th scope="col">Os Alert</th>
        <th>Mode</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($serviceengineer as $key => $values)
        <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{ $values->asset_number }}</td>
                        <td>{{ $values->customer_name }}</td>
                        <td>{{ $values->location }}</td>
                        <td>{{ $values->open_hr }}</td>
                        <td>{{ $values->open_date }}</td>
                        {{-- <td>
                            @foreach ($visitone as $visit)
                                @if ($values->asset_number == $visit->asset_number)
                                    {{ $visit->last_os_service }}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($visittwo as $visit)
                                @if ($values->asset_number == $visit->asset_number)
                                    {{ $visit->last_os_service }}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($visitthree as $visit)
                                @if ($values->asset_number == $visit->asset_number)
                                    {{ $visit->last_os_service }}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($visitfour as $visit)
                                @if ($values->asset_number == $visit->asset_number)
                                    {{ $visit->last_os_service }}
                                @endif
                            @endforeach
                        </td> --}}
                        <td>
                            @foreach ($visitfour as $visit)
                                @if ($values->asset_number == $visit->asset_number)
                                    {{ $visit->last_os_service }}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($visitfour as $visit)
                                @if ($values->asset_number == $visit->asset_number)
                                    {{ $visit->last_os_date }}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @php
                            $visitone_asset = $visitone->firstWhere('asset_number', $values->asset_number);
                            $status_asset = $status->firstWhere('asset_number', $values->asset_number);
                            $value3 = null;
                            if ($visitone_asset && $status_asset) {
                                $totalLastOsServiceValue1 = $visitone_asset->last_os_service;
                                $totalLastOsServiceValue2 = $status_asset->last_os_service;
                                $value3 = $totalLastOsServiceValue1 - $totalLastOsServiceValue2;
                            }
                        @endphp
                        @if (isset($value3))
                            @php
                                $color = '';
                                if ($value3 <= 200) {
                                    $color = 'green';
                                } elseif ($value3 > 200 && $value3 <= 250) {
                                    $color = 'yellow';
                                } elseif ($value3 > 250 && $value3 > 300) {
                                    $color = 'red';
                                }
                            @endphp
                            <div style="width: 30px; height: 20px; background-color: {{ $color }};"></div>
                        @else
                            <p></p>
                        @endif
                        </td>
                        <td>
                            <label class="switch">
                                <input type="checkbox" id="toggleSwitch" onchange="toggleLabel(this)">
                                <span class="slider round">
                                  <span class="label-text on">Running</span>
                                  <span class="label-text off">Standby</span>
                                </span>
                              </label>
                              
                        </td>
                        <td class="d-flex justify-content-between gap-2">
                            {{-- <a href="{{ route('master.show', ['id' => $values->id]) }}" class="pt-2">
                                <i class="fa-sharp fa-solid fa-eye" style="color:black;"></i>
                            </a> --}}

                            @php
                                $matchFound = false;
                            @endphp

                            @foreach ($visitone as $visit)
                                @if ($values->asset_number == $visit->asset_number)
                                    @php
                                        $matchFound = true;
                                    @endphp
                                @break
                            @endif
                        @endforeach

                        @if ($matchFound)
                            <!-- Success message -->
                            <div class="alert alert-success">
                                <i class="fa-solid fa-check" style="color: #26d110;"></i>
                            </div>
                        @else
                            <!-- Fail message -->
                            <div class="alert alert-danger">
                                <i class="fa-solid fa-times" style="color: red;"></i>
                            </div>
                        @endif
                        @php
                            $matchFound = false;
                        @endphp

                        @foreach ($visittwo as $visit)
                            @if ($values->asset_number == $visit->asset_number)
                                @php
                                    $matchFound = true;
                                @endphp
                            @break
                        @endif
                    @endforeach

                    @if ($matchFound)
                        <!-- Success message -->
                        <div class="alert alert-success">
                            <i class="fa-solid fa-check" style="color: #26d110;"></i>
                        </div>
                    @else
                        <!-- Fail message -->
                        <div class="alert alert-danger">
                            <i class="fa-solid fa-times" style="color: red;"></i>
                        </div>
                    @endif
                    @php
                        $matchFound = false;
                    @endphp

                    @foreach ($visitthree as $visit)
                        @if ($values->asset_number == $visit->asset_number)
                            @php
                                $matchFound = true;
                            @endphp
                        @break
                    @endif
                @endforeach

                @if ($matchFound)
                    <!-- Success message -->
                    <div class="alert alert-success">
                        <i class="fa-solid fa-check" style="color: #26d110;"></i>
                    </div>
                @else
                    <!-- Fail message -->
                    <div class="alert alert-danger">
                        <i class="fa-solid fa-times" style="color: red;"></i>
                    </div>
                @endif
                @php
                    $matchFound = false;
                @endphp

                @foreach ($visitfour as $visit)
                    @if ($values->asset_number == $visit->asset_number)
                        @php
                            $matchFound = true;
                        @endphp
                    @break
                @endif
            @endforeach

            @if ($matchFound)
                <!-- Success message -->
                <div class="alert alert-success">
                <i class="fa-solid fa-check" style="color: #26d110;"></i>
                </div>
            @else
                <!-- Fail message -->
                <div class="alert alert-danger">
                    <i class="fa-solid fa-times" style="color: red;"></i>
                </div>
            @endif
            <td class="d-flex gap-2">
                <a href="{{route('master.show',['id'=>$values->id])}}" class="pt-2">
                    <i class="fa-sharp fa-solid fa-eye" style="color:black;"></i>
                </a> 
                <form action="{{ route('generator.status', ['asset_number' => $values->asset_number,'engineer_id'=>$values->engineer_id]) }}"
                    method="POST">
                    @csrf
                    <button type="submit">Visit History</button>
                </form>
                <a href="{{route('master.movement',['id'=>$values->id,'asset_number'=>$values->asset_number])}}" class="btn btn-primary ">
                    Closure
                </a>

                {{-- <a href="{{route('dg.status',['id'=>$values->id])}}">
                    Standing
                </a> --}}
                 
                 {{-- <button id="toggleButton" class="toggle-button">Standing</button> --}}
            </td>
            
            {{-- <td class="d-flex justify-content-between"> --}}
                {{-- <a href="{{route('denied.store.delete',['id'=>$values->id])}}" class="btn btn-primary ">
                    Denied
                </a>
                <a href="{{route('followup.store.delete',['id'=>$values->id])}}" class="btn btn-success">
                    Follow up
                </a>
                <a href="{{route('converted.store.delete',['id'=>$values->id])}}" class="btn btn-warning">
                    Converted
                </a> --}}
               
            {{-- </td> --}}
        </tr>
        @endforeach
    </tbody>
  </table>
        @endsection
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


            // document.getElementById('toggleButton').addEventListener('click', function() {
            //     if (this.textContent === 'Standing') {
            //         this.textContent = 'Runby';
            //     } else {
            //         this.textContent = 'Standing';
            //     }
            // });

    //         function toggle(button) {
    // var buttons = button.parentElement.getElementsByClassName('toggle-button');
    // for (var i = 0; i < buttons.length; i++) {
    //     buttons[i].classList.remove('active');
    // }
    // button.classList.add('active');
    // Update the mode value in the database or perform any other necessary action
// }
function toggleLabel(checkbox) {
  const labels = checkbox.nextElementSibling.querySelectorAll('.label-text');
  labels.forEach(label => label.classList.toggle('active'));
}
// document.addEventListener('DOMContentLoaded', (event) => {
//   const checkbox = document.getElementById('toggleSwitch');
//   const isChecked = localStorage.getItem('toggleSwitchChecked') === 'true';
//   checkbox.checked = isChecked;
//   updateLabel(checkbox);
// });

// function toggleLabel(checkbox) {
//   const isChecked = checkbox.checked;
//   localStorage.setItem('toggleSwitchChecked', isChecked);
//   updateLabel(checkbox);
// }

// function updateLabel(checkbox) {
//   const labels = checkbox.nextElementSibling.querySelectorAll('.label-text');
//   labels.forEach(label => {
//     if (checkbox.checked) {
//       if (label.classList.contains('on')) {
//         label.style.opacity = '1';
//       } else {
//         label.style.opacity = '0';
//       }
//     } else {
//       if (label.classList.contains('off')) {
//         label.style.opacity = '1';
//       } else {
//         label.style.opacity = '0';
//       }
//     }
//   });
// }
        </script>

<style>
.switch {
  position: relative;
  display: inline-block;
  width: 80px; /* Adjusted width to accommodate labels */
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  transform: translateX(46px); /* Adjusted for label size */
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

.label-text {
  position: absolute;
  width: 100%;
  height: 100%;
  line-height: 34px;
  text-align: center;
  font-size: 14px;
  color: white;
  transition: .4s;
}

input:checked + .slider .off {
  opacity: 0;
}

input:not(:checked) + .slider .on {
  opacity: 0;
}
</style>
@section('managelead')
{{-- <table class="table">
    <thead>
      <tr>
        <th scope="col">Source</th>
        <th scope="col">Enquiry Date</th>
        <th scope="col">DG Capacity</th>
        <th scope="col">Duration</th>
        <th scope="col">Cost/Rent</th>
        <th scope="col">Company Name</th>
        <th scope="col">Contact Number</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($managelead as $values)
        <tr>
            <td>{{$values->source}}</td>
            <td>{{$values->enquiry_date}}</td>
            <td>{{$values->capacity}}</td>
            <td>{{$values->duration}}</td>
            <td>{{$values->cost}}</td>
            <td>{{$values->company_name}}</td>
            <td>{{$values->contact_number}}</td>
            <td class="d-flex justify-content-between">
                <a href="{{route('denied.store.delete',['id'=>$values->id])}}" class="btn btn-primary ">
                    Denied
                </a>
                <a href="{{route('followup.store.delete',['id'=>$values->id])}}" class="btn btn-success">
                    Follow up
                </a>
                <a href="{{route('converted.store.delete',['id'=>$values->id])}}" class="btn btn-warning">
                    Converted
                </a>
               
            </td>
        </tr>
        @endforeach
    </tbody>
  </table> --}}
    
@endsection
       
