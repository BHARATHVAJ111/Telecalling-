@extends('layouts.layouts')

@section('content')
<div class="d-flex justify-content-center vh-100 align-items-center border">
    <form action="{{ route('quantity.store', ['id' => $value->id]) }}" method="POST" class="p-5 bg-light shadow">
        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ">
            <span aria-hidden="true"></span>
        </button> -->
        <div class="d-flex justify-content-between pb-1 border-bottom border-3">
            <h4 class="">Inward</h4>
        <a href="{{route('store.index')}}" class="fs-5 text-dark btn-close" style="color:white;"></a>
        </div>
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="material_type">Material Type</label>
                    <input type="text" class="form-control" id="material_type" value="{{ $value->material_type }}" name="material_type" disabled>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date">
                    @error('date')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form text">
            <div class="form-group">
                <label for="existing_quantity">Existing Quantity</label>
                <input type="number" class="form-control" id="existing_quantity" value="{{ $value->number_of_quantity }}" name="existing_quantity" disabled>
            </div>
            <div class="form-group">
                <label for="add_quantity">Add Quantity</label>
                <input type="number" class="form-control @error('add_quantity') is-invalid @enderror" id="add_quantity" name="add_quantity">
                @error('add_quantity')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="total_quantity">Total Quantity</label>
                <input type="text" class="form-control" id="total_quantity" name="total_quantity" readonly>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description"></textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="d-flex justify-content-center gap-1 mt-2">
            <button type="submit" class="btn btn-primary text-center">Update</button>
            <a href="{{route('store.index')}}" class="btn btn-danger ">Cancel</a>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    // Update total quantity based on existing quantity and add quantity
    document.getElementById('add_quantity').addEventListener('input', function() {
        var existingQuantity = parseFloat(document.getElementById('existing_quantity').value) || 0;
        var addQuantity = parseFloat(this.value) || 0;
        var totalQuantity = existingQuantity + addQuantity;
        document.getElementById('total_quantity').value = totalQuantity.toFixed(2); // Adjust to your precision needs
    });
</script>
@endsection