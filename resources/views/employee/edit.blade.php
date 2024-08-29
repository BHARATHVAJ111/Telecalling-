<div class="container-fluid">
    <form action="{{route('employee.update')}}" method="POST" id="indentForm">
        @csrf
        @method('PUT')
        
        <div class="">
            <input type="hidden" name="id" value="{{$employee->id}}">
            <div class="row">
                <div class="form-group mt-1">
                    <label for="customer_name">Name:</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{$employee->name}}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group mt-1">
                    <label for="location">Mobile Number:</label>
                    <input type="phone" class="form-control @error('mobile') is-invalid @enderror" id="mobile" name="mobile" value="{{$employee->mobile}}">
                    @error('mobile')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group mt-1">
                    <label for="number_2">Password:</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{$employee->password}}">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mt-1 d-grid d-flex justify-content-center mt-2">
                <button type="submit" class="btn btn-success">Submit</button>
                <a href="" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </form>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
