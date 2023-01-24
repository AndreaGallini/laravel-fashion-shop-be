@extends('layouts.admin')
@section('content')
    <div id="admin-show">
        <div class="container-md">
            <h2>Add your Category</h2>
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                <div class="form-group mt-4 mb-4">
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Category Name">
                    @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit"  class="btn btn-primary">Add</button>
                <button type="reset" class="btn btn-primary">Reset</button>
            </form>
        </div>
    </div>
@endsection
