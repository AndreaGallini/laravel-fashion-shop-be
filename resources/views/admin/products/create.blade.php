@extends('layouts.admin')

@section('content')
    <section id="admin-show">
        <a class="back-btn btn btn-dark" href="{{ route('admin.products.index') }}">BACK</a>
        <div class="container">

            <h2 class="mt-3 mb-3 text-center">Add a new Product</h2>

            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf


                <div class="mb-3">
                    <label for="name" class="form-label">Add name </label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" required maxlength="100">
                    @error('name')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Add description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"></textarea>
                    @error('description')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <img id="uploadPreview" width="100" src="https://via.placeholder.com/300x200">
                    <label for="image" class="form-label">Immagine</label>
                    <input type="file" name="image" id="image"
                        class="form-control  @error('image') is-invalid @enderror">
                    @error('image')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="prezzo" class="form-label">Price</label>
                    <input type="number" class="form-control @error('prezzo') is-invalid @enderror" id="prezzo"
                        name="prezzo" required>
                    @error('prezzo')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Select Category</label>
                    <select name="category_id" id="category_id"
                        class="form-control @error('category_id') is-invalid @enderror">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            {{-- <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : '' }}> --}}
                            <option value="{{ $category->id }}">

                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="texture_id" class="form-label">Select Texture</label>
                    <select name="texture_id" id="texture_id"
                        class="form-control @error('texture_id') is-invalid @enderror">
                        <option value="">Select Texture</option>
                        @foreach ($textures as $texture)
                            {{-- <option value="{{ $texture->id }}" {{ $texture->id == old('texture_id') ? 'selected' : '' }}> --}}
                            <option value="{{ $texture->id }}">

                                {{ $texture->name }}</option>
                        @endforeach
                    </select>
                    @error('texture_id')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="brand_id" class="form-label">Select Brand</label>
                    <select name="brand_id" id="brand_id" class="form-control @error('brand_id') is-invalid @enderror">
                        <option value="">Select Brand</option>
                        @foreach ($brands as $brand)
                            {{-- <option value="{{ $brand->id }}" {{ $brand->id == old('brand_id') ? 'selected' : '' }}> --}}
                            <option value="{{ $brand->id }}">

                                {{ $brand->name }}</option>
                        @endforeach
                    </select>
                    @error('brand_id')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>


                <button type="submit" class="btn btn-success">Aggiungi</button>
                <button type="reset" class="btn btn-danger">Resetta</button>
            </form>
        </div>
        <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
        <script type="text/javascript">
            bkLib.onDomLoaded(nicEditors.allTextAreas);
        </script>
    @endsection
