@extends('layouts.admin')
@section('content')
    <section id="admin-index">
        <nav class="d-flex justify-content-start align-items-center container">
            <h2 class="me-3">Admin's Office:</h2>
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
            <a href="{{ route('admin.products.create') }}" class="btn btn-outline-success">New Product</a>
        </div>
        <div class="activities-list mt-1">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Categories</th>
                        <th scope="col">Textures</th>
                        <th scope="col">Brands</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <th scope="row">{{$product->id}}</th>
                            <td><a href="{{route('admin.products.show', $product->slug)}}" title="View Product">{{$product->name}}</a></td>
                            <td>{{$product->price}}</td>
                            {{-- <td>{{$product->categories && count($product->categories) > 0 ? count($product->categories) : 0}}</td> --}}
                            <td>{{$product->category->name}}</td>
                            <td>{{$product->texture->name}}</td>
                            <td>{{$product->brand->name}}</td>
                            <td><a class="link-secondary" href="{{route('admin.products.edit', $product->slug)}}" title="Edit Product">Edit</a></td>
                            <td>
                                <form action="{{ route('admin.products.destroy', $product->slug) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-button btn btn-danger ms-3"
                                        data-item-title="{{ $product->name }}">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
