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
                        name="name" required maxlength="150">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-text">* Massimo 150 caratteri</div>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Add description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"></textarea>
                    @error('description')
                        <div class="invalid-feedback">
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
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                        name="price">
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="categories_id" class="form-label">Select Category</label>
                    <select name="categories_id" id="categories_id"
                        class="form-control @error('categories_id') is-invalid @enderror">
                        <option value="">Select Category</option>
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
                    <label for="textures_id" class="form-label">Select Texture</label>
                    <select name="textures_id" id="textures_id"
                        class="form-control @error('textures_id') is-invalid @enderror">
                        <option value="">Select Category</option>
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
                    <label for="brands_id" class="form-label">Select Brand</label>
                    <select name="brands_id" id="brands_id" class="form-control @error('brands_id') is-invalid @enderror">
                        <option value="">Select Category</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" {{ $brand->id == old('brands_id') ? 'selected' : '' }}>
                                {{ $brand->name }}</option>
                        @endforeach
                    </select>
                    @error('brands_id')
                        <div class="invalid-feedback">{{ $message }}</div>
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
