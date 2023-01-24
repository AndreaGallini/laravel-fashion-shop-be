@extends('layouts.admin')
@section('content')
    <div id="admin-show">
        <div class="container-md">
            <h2>Edit your Texture</h2>
            <form action="{{ route('admin.textures.update', $texture->slug) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mt-4 mb-4">
                    <label for="name">Texture Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="texture Name" value="{{ old('name',$texture->name) }}">
                    @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit"  class="btn btn-primary">Edit</button>
                <button type="reset" class="btn btn-primary">Reset</button>
            </form>
        </div>
    </div>
@endsection
