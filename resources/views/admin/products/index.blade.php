@extends('layouts.admin')
@section('content')
    <section id="admin-index">
        @include('partials.admin.navbar')
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
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <th scope="row">{{ $product->id }}</th>
                            <td><a href="{{ route('admin.products.show', $product->slug) }}"
                                    title="View Product">{{ $product->name }}</a></td>
                            <td>{{ $product->prezzo }}</td>
                            {{-- <td>{{$product->categories && count($product->categories) > 0 ? count($product->categories) : 0}}</td> --}}
                            @if ($product->category)
                                <td>{{ $product->category->name }}</td>
                            @else
                                <td>Categoria non attribuita</td>
                            @endif
                            @if ($product->texture)
                                <td> {{ $product->texture->name }}</td>
                            @else
                                <td>texture non attribuita</td>
                            @endif
                            @if ($product->brand)
                                <td>{{ $product->brand->name }}</td>
                            @else
                                <td>Brand non attribuito</td>
                            @endif
                            <td><a class="link-secondary" href="{{ route('admin.products.edit', $product->slug) }}"
                                    title="Edit Product">Edit</a></td>
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
    @include('partials.admin.modal-delete')
@endsection
