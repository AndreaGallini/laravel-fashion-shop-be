@extends('layouts.admin')
@section('content')
<section id="admin-index">
    <nav class="d-flex justify-content-start align-items-center container">
        <h2 class="me-3">Admin's Office: Textures</h2>
        <ul class="d-flex justify-content-between align-items-center">
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'admin.products.index' ? 'active' : '' }}"
                    href="{{ route('admin.products.index') }}">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'admin.categories.index' ? 'active' : '' }}"
                    href="{{ route('admin.categories.index') }}">Categories</a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'admin.colors.index' ? 'active' : '' }}" href="{{route('admin.colors.index')}}">Colors</a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'admin.textures.index' ? 'active' : '' }}"
                    href="{{ route('admin.textures.index') }}">Textures</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'admin.brands.index' ? 'active' : '' }}"
                    href="{{ route('admin.brands.index') }}">Brands</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'admin.tags.index' ? 'active' : '' }}" href="{{route('admin.tags.index')}}">Tags</a>
            </li>
        </ul>
    </nav>
    <div id="admin-tags" class="container p-5">
        @if(session()->has('message'))
        <div class="alert alert-success mb-3 mt-3">
            {{ session()->get('message') }}
        </div>
        @endif
        <form action="{{route('admin.tags.store')}}" method="POST" class="d-flex flex-column align-items-center">
            @csrf
                <input type="text" name="name" id="name" class="form-control mb-3" placeholder="Add a tag name here">
                <button class="btn btn-outline-success" type="submit">Nuovo Tag</button>
        </form>
        <ul class="mt-5">
            @foreach ($tags as $tag)
                <li class="mb-3 pb-3 border-bottom border-dark">
                    <form id="tag-{{$tag->id}}" class="mb-3" action="{{route('admin.tags.update', $tag->slug)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <input class="border-0 bg-transparent fs-3" type="text" name="name" value="{{$tag->name}}">
                    </form>
                    <form action="{{route('admin.tags.destroy', $tag->slug)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button btn btn-danger" data-item-title="{{$tag->name}}">DELETE</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
</section>

@include('partials.admin.modal-delete')

@endsection
