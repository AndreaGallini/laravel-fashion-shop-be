@extends('layouts.admin')

@section('content')
    <h1 class="m-3">colors</h1>
    <form action="{{ route('admin.colors.store') }}" method="POST" class="d-flex flex-column align-items-center">
        @csrf
        <input type="text" name="name" id="name" class="form-control mb-3" placeholder="Add a tag name here" required>
        <input type="text" name="hex_value" id="hex_value" class="form-control mb-3"
            placeholder="Add a tag hex_value here" required>

        <button class="btn btn-outline-success" type="submit">Nuovo Colore</button>
    </form>
    @if (session()->has('message'))
        <div class="alert alert-success mb-3 mt-3">
            {{ session()->get('message') }}
        </div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">hex code</th>
                <th scope="col">products</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($colors as $color)
                <tr>
                    <th scope="row">{{ $color->id }}</th>
                    <td>
                        <form id="color-{{ $color->id }}" action="{{ route('admin.colors.update', $color->slug) }}"
                            method="post">
                            @csrf
                            @method('PATCH')
                            <input class="border-0 bg-transparent" type="text" name="name"
                                value="{{ $color->name }}">
                        </form>

                    </td>
                    <td>
                        <form id="color-{{ $color->id }}" action="{{ route('admin.colors.update', $color->slug) }}"
                            method="post">
                            @csrf
                            @method('PATCH')
                            <input class="border-0 bg-transparent" type="text" name="hex_value"
                                style="background-color: {{ $color->hex_value }}" value="{{ $color->hex_value }}">
                        </form>
                        <a href="#" class="btn style="background-color:
                            {{ $color->hex_value }}>{{ $color->hex_value }}</a>

                    </td>


                    <td>{{ $color->products && count($color->products) > 0 ? count($color->products) : 0 }}</td>
                    <td>
                    <td>
                        <form action="{{ route('admin.colors.destroy', $color->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button btn btn-danger ms-3"
                                data-item-title="{{ $color->name }}">Delete</button>
                        </form>
                    </td>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('partials.admin.modal-delete')
@endsection
