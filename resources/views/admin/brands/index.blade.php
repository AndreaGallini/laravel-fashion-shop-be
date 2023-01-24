@extends('layouts.admin')
@section('content')
    <section id="admin-index">
        @include('partials.admin.navbar')
        <div class="create-new">
            <a href="{{ route('admin.brands.create') }}" class="btn btn-outline-success">New Brand</a>
        </div>
        <div class="activities-list mt-1">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brands as $brand)
                        <tr>
                            <th scope="row">{{ $brand->id }}</th>
                            <td>
                                <a href="{{ route('admin.brands.show', $brand->slug) }}" title="View Brand">{{ $brand->name }}</a>
                            </td>

                            <td><a class="link-secondary" href="{{route('admin.brands.edit', $brand->slug)}}" title="Edit brnad">Edit</a></td>
                            <td>
                                <form action="{{ route('admin.brands.destroy', $brand->slug) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-button btn btn-danger ms-3" data-item-title="{{ $brand->name }}">Delete</button>
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
