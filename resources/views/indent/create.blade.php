<div class="container-fluid">
    <form action="{{ route('assets.store') }}" method="POST" id="indentForm">
        @csrf
        <div class="">
            <div class="row">
                <div class="form-group mt-1">
                    <label for="customer_name">Material Name:</label>
                    <input type="text" class="form-control @error('material_name') is-invalid @enderror" id="customer_name" name="material_name">
                    @error('material_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group mt-1">
                    <label for="location">Location:</label>
                    <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location">
                    @error('location')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group mt-1">
                    <label for="source_of_lead">Material Type:</label>
                    <select class="form-select @error('material_type') is-invalid @enderror" id="source_of_lead" name="material_type">
                        <option value="">select</option>
                        <option value="lubricant">Lubrication</option>
                        <option value="Diesel Filter">Diesel Filter</option>
                        <option value="Oil Filter">Oil Filter</option>
                        <option value="Air Filter">Air Filter</option>
                        <option value="Alum Cables">Alumnium Cables</option>
                        <option value="Copper Cables">Copper Cables</option>
                        <option value="Machine Spares">Machine Spares</option>
                        <option value="Electrical Meters">Electrical Meterials</option>
                        <option value="Tools">Tools</option>
                        <option value="Paint item">Paint item</option>
                        <option value="Adhesive">Adhesive</option>
                        <option value="dg spares">Dg spares</option>
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
                    <label for="source_of_lead">Unit Of Measurement:</label>
                    <select class="form-select @error('quantity') is-invalid @enderror" id="source_of_lead" name="quantity">
                        <option value="">Select</option>
                        <option value="Ltr">Ltr</option>
                        <option value="Nos">Nos</option>
                        <option value="Mtr">Mtr</option>
                        <option value="Set">Set</option>
                        <option value="Kg">Kg</option>
                    </select>
                    @error('quantity')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group mt-1">
                    <label for="number_2">Number of Quantity:</label>
                    <input type="number" class="form-control @error('number_of_quantity') is-invalid @enderror" id="number_2" name="number_of_quantity">
                    @error('number_of_quantity')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group mt-1">
                <label for="remarks">Description:</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="remarks" name="description"></textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-1 d-grid d-flex justify-content-center mt-2">
                <button type="submit" class="btn btn-success">Submit</button>
                <a href="{{ route('store.index') }}" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </form>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
