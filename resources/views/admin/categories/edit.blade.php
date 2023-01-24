@extends('layouts.admin')
@section('content')
    <div class="container-md">
        <h2>Edit your category</h2>
        <form action="{{ route('admin.categories.update', $category->slug) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mt-4 mb-4">
                <label for="name">Category Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Category Name" value="{{ old('name',$category->name) }}">
                @error('name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit"  class="btn btn-primary">Edit</button>
            <button type="reset" class="btn btn-primary">Reset</button>
        </form>
    </div>
@endsection
