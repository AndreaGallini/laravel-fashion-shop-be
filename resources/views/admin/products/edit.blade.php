@extends('layouts.admin')

@section('content')
    <section id="admin-show">
        <a class="back-btn btn btn-dark" href="{{ route('admin.products.index') }}">BACK</a>
        <div class="container">
            <h2 class="mt-4 mb-4 text-center">Aggiorna {{ $product->name }}</h2>

            <form action="{{ route('admin.products.update', $product->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Add name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name', $product->name) }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Add description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $product->description) }} </textarea>

                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="d-flex">
                    <div class="media me-4">
                        <img class="shadow" width="150" src="{{ asset('storage/' . $product->image) }}"
                            alt="{{ $product->image }}">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Replace products image</label>
                        <input type="file" name="image" id="image"
                            class="form-control  @error('image') is-invalid @enderror">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                        name="price" value="{{ old('name', $product->price) }}">
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="categories_id" class="form-label">Select Type</label>
                    <select name="categories_id" id="categories_id"
                        class="form-control @error('categories_id') is-invalid @enderror">
                        <option value="">Select type</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id == old('categories_id') ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('categories_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="textures_id" class="form-label">Select Type</label>
                    <select name="textures_id" id="textures_id"
                        class="form-control @error('textures_id') is-invalid @enderror">
                        <option value="">Select type</option>
                        @foreach ($textures as $texture)
                            <option value="{{ $texture->id }}"
                                {{ $texture->id == old('textures_id') ? 'selected' : '' }}>
                                {{ $texture->name }}</option>
                        @endforeach
                    </select>
                    @error('textures_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="brands_id" class="form-label">Select Type</label>
                    <select name="brands_id" id="brands_id" class="form-control @error('brands_id') is-invalid @enderror">
                        <option value="">Select type</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" {{ $brand->id == old('brands_id') ? 'selected' : '' }}>
                                {{ $brand->name }}</option>
                        @endforeach
                    </select>
                    @error('brands_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="my-5">
                    <button type="submit" class="btn btn-success">Aggiungi</button>
                    <button type="reset" class="btn btn-danger">Resetta</button>
                </div>
            </form>
        </div>
    @endsection
