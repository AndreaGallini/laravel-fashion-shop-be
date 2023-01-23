@extends('layouts.admin')

@section('content')
    <section id="admin-show">
        <div>
            <a class="back-btn btn btn-dark" href="{{route('admin.products.index')}}">BACK</a>
            <h1>{{ $product->name }}</h1>
            {{-- @if($activity->categories && count($activity->categories) > 0)
            @foreach ($activity->categories as $category)
                <span>{{$category->name}}</span>
            @endforeach
            @endif --}}
            <div class="image">
                @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}">
                @else
                <img src="{{Vite::asset('resources/img/not_found.jpeg')}}" alt="">
                @endif
            </div>
            <div class="infos d-flex flex-column">
                <div class="info-row d-flex justify-content-around my-3">
                    <div class="info-col d-flex justify-content-between">
                        <span>Price:</span>
                        <span>{{$product->prezzo}}</span>
                    </div>
                    <div class="info-col d-flex justify-content-between">
                        <span>Slug:</span>
                        <span>{{$product->slug}}</span>
                    </div>
                </div>
                <div class="info-row d-flex justify-content-around my-3">
                    <div class="info-col d-flex justify-content-between">
                        <span>Texture:</span>
                        <span>{{$product->texture->name}}</span>
                    </div>
                    <div class="info-col d-flex justify-content-between">
                        <span>Brand:</span>
                        <span>{{$product->brand->name}}</span>
                    </div>
                </div>
                <div class="info-row d-flex justify-content-around my-3">
                    <div class="info-col d-flex justify-content-between">
                        <span>Category:</span>
                        <span>{{$product->category->name}}</span>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <h3>Description:</h3>
                <p>{!! $product->description !!}</p>
            </div>
        </div>
    </section>
@endsection
