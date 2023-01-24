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
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Add description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $product->description) }} </textarea>

                    @error('description')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="d-flex">
                    <div class="media me-4">
                        {{-- <img class="shadow" width="150" src="{{ asset('storage/' . $product->image) }}"
                            alt="{{ $product->image }}"> --}}
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Replace products image</label>
                        <input type="file" name="image" id="image"
                            class="form-control  @error('image') is-invalid @enderror">
                        @error('image')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="prezzo" class="form-label">Price</label>
                    <input type="number" class="form-control @error('prezzo') is-invalid @enderror" id="prezzo"
                        name="prezzo" value="{{ old('prezzo', $product->prezzo) }}" required>
                    @error('prezzo')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Select Type</label>
                    <select name="category_id" id="category_id"
                        class="form-control @error('category_id') is-invalid @enderror">
                        <option value="">Select type</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="texture_id" class="form-label">Select Type</label>
                    <select name="texture_id" id="texture_id"
                        class="form-control @error('texture_id') is-invalid @enderror">
                        <option value="">Select type</option>
                        @foreach ($textures as $texture)
                            <option value="{{ $texture->id }}" {{ $texture->id == old('texture_id') ? 'selected' : '' }}>
                                {{ $texture->name }}</option>
                        @endforeach
                    </select>
                    @error('texture_id')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="brand_id" class="form-label">Select Type</label>
                    <select name="brand_id" id="brand_id" class="form-control @error('brand_id') is-invalid @enderror">
                        <option value="">Select type</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" {{ $brand->id == old('brand_id') ? 'selected' : '' }}>
                                {{ $brand->name }}</option>
                        @endforeach
                    </select>
                    @error('brand_id')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>


                <div class="my-5">
                    <button type="submit" class="btn btn-success">Aggiungi</button>
                    <button type="reset" class="btn btn-danger">Resetta</button>
                </div>
            </form>
        </div>
    @endsection
