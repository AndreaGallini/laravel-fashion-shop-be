@extends('layouts.admin')
@section('content')
    <div class="container-md">
        <h2>Add your Brand</h2>
        <form action="{{ route('admin.brands.store') }}" method="POST">
            @csrf
            <div class="form-group mt-4 mb-4">
                <label for="name">Brand Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Brand Name">
                @error('name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit"  class="btn btn-primary">Add</button>
            <button type="reset" class="btn btn-primary">Reset</button>
        </form>
    </div>
@endsection
