@extends('layouts.admin')
@section('content')
    <section id="admin-index">
        @include('partials.admin.navbar')
        <div class="create-new">
            <a href="{{ route('admin.textures.create') }}" class="btn btn-outline-success">New Texture</a>
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
                    @foreach ($textures as $texture)
                        <tr>
                            <th scope="row">{{ $texture->id }}</th>
                            <td>
                                <a href="{{ route('admin.textures.show', $texture->slug) }}" title="View Texture">{{ $texture->name }}</a>
                            </td>

                            <td><a class="link-secondary" href="{{route('admin.textures.edit', $texture->slug)}}" title="Edit texture">Edit</a></td>
                            <td>
                                <form action="{{ route('admin.textures.destroy', $texture->slug) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-button btn btn-danger ms-3" data-item-title="{{ $texture->name }}">Delete</button>
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
