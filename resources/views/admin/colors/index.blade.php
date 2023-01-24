@extends('layouts.admin')
@section('content')
    <section id="admin-index">
        <nav class="d-flex justify-content-start align-items-center container">
            <h2 class="me-3">Admin's Office: Colors</h2>
            <ul class="d-flex justify-content-between align-items-center">
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'admin.products.index' ? 'active' : '' }}"
                        href="{{ route('admin.products.index') }}">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'admin.categories.index' ? 'active' : '' }}"
                        href="{{ route('admin.categories.index') }}">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'admin.colors.index' ? 'active' : '' }}"
                        href="{{ route('admin.colors.index') }}">Colors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'admin.textures.index' ? 'active' : '' }}"
                        href="{{ route('admin.textures.index') }}">Textures</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'admin.brands.index' ? 'active' : '' }}"
                        href="{{ route('admin.brands.index') }}">Brands</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'admin.tags.index' ? 'active' : '' }}"
                        href="{{ route('admin.tags.index') }}">Tags</a>
                </li>
            </ul>
        </nav>
        <div id="admin-colors" class="container p-5">
            @if (session()->has('message'))
                <div class="alert alert-success mb-3 mt-3">
                    {{ session()->get('message') }}
                </div>
            @endif
            <form action="{{ route('admin.colors.store') }}" method="POST" class="d-flex flex-column align-items-center">
                @csrf
                <input type="text" name="name" id="name" class="form-control mb-3"
                    placeholder="Add a color name here">
                <input type="text" name="hex_value" id="hex_value" class="form-control mb-3"
                    placeholder="Add a color hex_value here">
                <button class="btn btn-outline-success" type="submit">Nuovo color</button>
            </form>
            <ul class="mt-5">
                @foreach ($colors as $color)
                    <li class="mb-3 pb-3 border-bottom border-dark">
                        <form id="color-{{ $color->id }}" class="mb-3"
                            action="{{ route('admin.colors.update', $color->slug) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <input class="border-0 bg-transparent fs-3" type="text" name="name"
                                value="{{ $color->name }}">
                            <input class="border-0 bg-transparent fs-3" type="text" name="hex_value"
                                value="{{ $color->hex_value }}">
                        </form>
                        <form action="{{ route('admin.colors.destroy', $color->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button btn btn-danger"
                                data-item-title="{{ $color->name }}">DELETE</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    @include('partials.admin.modal-delete')
@endsection
