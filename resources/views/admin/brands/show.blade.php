@extends('layouts.admin')

@section('content')
    <section id="admin-show">
        <div>
            <a class="back-btn btn btn-dark" href="{{route('admin.brands.index')}}">BACK</a>
            <h1>{{ $brand->name }}</h1>
            <div class="infos d-flex flex-column">
                <div class="info-row d-flex justify-content-around my-3">
                    <div class="info-col d-flex justify-content-between">
                        <span>Name:</span>
                        <span>{{$brand->name}}</span>
                    </div>
                    <div class="info-col d-flex justify-content-between">
                        <span>Slug:</span>
                        <span>{{$brand->slug}}</span>
                    </div>
                </div>
                <div class="info-row d-flex justify-content-around my-3">
                    <div class="info-col d-flex justify-content-between">
                        <span>Created_at:</span>
                        <span>{{$brand->created_at}}</span>
                    </div>
                    <div class="info-col d-flex justify-content-between">
                        <span>Updated_at:</span>
                        <span>{{$brand->updated_at}}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
