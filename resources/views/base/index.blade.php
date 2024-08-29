@extends('layouts.sidebar')
@section('content')
<div class="container d-flex justify-content-center align-items-center flex-column mt-5">
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
    <form action="{{route('import.excel')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group mt-1">
                <label for="source_of_lead">Assign Base:</label>
                <select class="form-select @error('User_id') is-invalid @enderror" id="source_of_lead" name="User_id">
                    <option value="">Assign Base</option>
                    @foreach($assets as $employee)
                    <option value="{{$employee->id}}">{{$employee->name}}</option>
                    @endforeach
                </select>
                @error('User_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mt-3 mb-2">
            <input type="file" name="file" placeholder="" class="">
        </div>
        <button type="submit" class="btn btn-warning">Upload</button>
    </form>
    <div>
        <p>*First Download Template*</p>
        <a href="{{route('download.template')}}" class="btn btn-primary">Download Template</a>
    </div>
</div>
@endsection