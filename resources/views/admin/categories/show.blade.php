@extends('layouts.admin')

@section('content')
    <section id="admin-show">
        <div>
            <a class="back-btn btn btn-dark" href="{{route('admin.categories.index')}}">BACK</a>
            <h1>{{ $category->name }}</h1>
            <div class="infos d-flex flex-column">
                <div class="info-row d-flex justify-content-around my-3">
                    <div class="info-col d-flex justify-content-between">
                        <span>Name:</span>
                        <span>{{$category->name}}</span>
                    </div>
                    <div class="info-col d-flex justify-content-between">
                        <span>Slug:</span>
                        <span>{{$category->slug}}</span>
                    </div>
                </div>
                <div class="info-row d-flex justify-content-around my-3">
                    <div class="info-col d-flex justify-content-between">
                        <span>Created_at:</span>
                        <span>{{$category->created_at}}</span>
                    </div>
                    <div class="info-col d-flex justify-content-between">
                        <span>Updated_at:</span>
                        <span>{{$category->updated_at}}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
