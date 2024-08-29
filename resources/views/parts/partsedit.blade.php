@extends('layouts.layouts')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6 bg-light shadow mt-3">
            <form action="{{ route('parts.update', ['id' => $edit->id]) }}" method="POST" id="indentForm">
                @csrf
                @method('PUT')
                <div class="">
                    <div class="">
                        <div class="row">
                            <div class="form-group mt-1">
                                <label for="asset">Assets Code:</label>
                                <input type="text" class="form-control @error('asset') is-invalid @enderror" id="material_name" name="material_name" value="{{ $edit->jrnum }}" disabled>
                                @error('asset')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mt-1">
                                <label for="material_name">Material Name:</label>
                                <input type="text" class="form-control @error('material_name') is-invalid @enderror" id="material_name" name="material_name" value="{{ $edit->material_name }}">
                                @error('material_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mt-1">
                                <label for="material_name">Location:</label>
                                <input type="text" class="form-control @error('location') is-invalid @enderror" id="material_name" name="location" value="{{ old('location', $edit->location) }}">
                                @error('location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mt-1">
                                <label for="material_type">Material Type:</label>
                                <select class="form-select @error('material_type') is-invalid @enderror" id="material_type" name="material_type">
                                    <option value="{{ $edit->material_type }}">{{ $edit->material_type }}</option>
                                    <!-- Add other options here -->
                                    <option value="lupricant">Lubricant</option>
                            <option value="Diesel Filter">Diesel Filter</option>
                            <option value="Oil Filter">Oil Filter</option>
                            <option value="Air Filter">Air Filter</option>
                            <option value="Alum Cables">Alum Cables</option>
                            <option value="Machine Spares">Machine Spares</option>
                            <option value="Electrical Meters">Electrical Meters</option>
                            <option value="Tools">Tools</option>
                            <option value="Paint item">Paint item</option>
                            <option value="Adhseive">Adhseive</option>
                            <option value="dg spares">dg spares</option>
                            <option value="Wires">Wires</option>
                            <option value="Board">Board</option>
                            <option value="Cleaning">Cleaning</option>
                                </select>
                                @error('material_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mt-1">
                                <label for="quantity">Quantity:</label>
                                <select class="form-select @error('quantity') is-invalid @enderror" id="quantity" name="quantity">
                                    <option value="{{ $edit->quantity }}">{{ $edit->quantity }}</option>
                                    <!-- Add other options here -->
                                    <option value="Ltr">Ltr</option>
                            <option value="Numbers">Numbers</option>
                            <option value="nos">nos</option>
                            <option value="Mtr">Mtr</option>
                            <option value="set">set</option>
                            <option value="Kg">Kg</option>
                                </select>
                                @error('quantity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mt-1">
                                <label for="number_of_quantity">Number of Quantity:</label>
                                <input type="number" class="form-control @error('number_of_quantity') is-invalid @enderror" id="number_of_quantity" name="number_of_quantity" value="{{ old('number_of_quantity', $edit->number_of_quantity) }}">
                                @error('number_of_quantity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mt-1">
                            <label for="description">Description:</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $edit->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mt-1 d-grid d-flex justify-content-center gap-1 mt-2">
                    <button type="submit" onclick="submitForm()" class="btn btn-success">Submit</button>
                    <a href="{{ route('store.index') }}" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
<style>
    .ui-autocomplete {
        z-index: 10000;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
