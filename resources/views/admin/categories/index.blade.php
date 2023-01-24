@extends('layouts.admin')
@section('content')
    <section id="admin-index">
        <nav class="d-flex justify-content-start align-items-center container">
            <h2 class="me-3">Admin's Office: Categories</h2>
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
                {{-- <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'admin.tags.index' ? 'active' : '' }}" href="{{route('admin.tags.index')}}">Tags</a>
                </li> --}}
            </ul>
        </nav>
        <div class="create-new">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-outline-success">New Category</a>
        </div>
        <div class="activities-list mt-1">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>
                                <a href="{{ route('admin.categories.show', $category->slug) }}" title="View Category">{{ $category->name }}</a>
                            </td>

                            <td><a class="link-secondary" href="{{route('admin.categories.edit', $category->slug)}}" title="Edit Category">Edit</a></td>
                            <td>
                                <form action="{{ route('admin.categories.destroy', $category->slug) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-button btn btn-danger ms-3" data-item-title="{{ $category->name }}">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
    @include('partials.admin.modal-delete')

@endsection
