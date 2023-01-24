@extends('layouts.admin')
@section('content')
    <section id="admin-index">
        @include('partials.admin.navbar')
        <div id="admin-many" class="container p-5">
            @if (session()->has('message'))
                <div class="alert alert-success mb-3 mt-3">
                    {{ session()->get('message') }}
                </div>
            @endif
            <form action="{{ route('admin.colors.store') }}" method="POST" class="d-flex flex-column align-items-center">
                @csrf
                <input type="text" name="name" id="name" class="form-control mb-3"
                    placeholder="Add a color name here">
                {{-- <input type="text" name="hex_value" id="hex_value" class="form-control mb-3"
                    placeholder="Add a color hex_value here"> --}}
                <input type="color" name="hex_value" id="hex_value" value="#45f3ff" class="mb-3">

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
                            <input class="border-0 fs-3 text-white" style="background-color: {{ $color->hex_value }}" type="text" name="hex_value"
                                value="{{ $color->hex_value }}">
                            <input type="submit" style="position: absolute; left: -9999px; width: 1px; height: 1px;" />
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
