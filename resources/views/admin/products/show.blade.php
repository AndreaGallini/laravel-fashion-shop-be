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
                        @if($product->texture)
                        <span>{{$product->texture->name}}</span>
                        @else
                        <span>Texture not specified</span>
                        @endif
                    </div>
                    <div class="info-col d-flex justify-content-between">
                        <span>Brand:</span>
                        @if($product->brand)
                        <span>{{$product->brand->name}}</span>
                        @else
                        <span>Brand not specified</span>
                        @endif
                    </div>
                </div>
                <div class="info-row d-flex justify-content-around my-3">
                    <div class="info-col d-flex justify-content-between">
                        <span>Category:</span>
                        @if($product->category)
                        <span>{{$product->category->name}}</span>
                        @else
                        <span>Category not specified</span>
                        @endif
                    </div>
                </div>
                <div class="info-row d-flex justify-content-around my-3">
                    <div class="info-col d-flex justify-content-between">
                        <span>Tags:</span>
                        <div class="tags">
                            @if($product->tags && count($product->tags) > 0)
                                @foreach ($product->tags as $tag)
                                    <small class="d-inline">{{$tag->name}}</small>
                                @endforeach
                            @else
                                <span>No tags Specified</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="info-row d-flex justify-content-around my-3">
                    <div class="info-col d-flex justify-content-between">
                        <span>Colors:</span>
                        <div>
                            @if($product->colors && count($product->colors) > 0)
                                @foreach ($product->colors as $color)
                                    <small style="background-color: {{ $color->hex_value }}" class="d-inline p-2 rounded-pill text-white">{{$color->name}}</small>
                                @endforeach
                            @else
                                <span>No Colors Specified</span>
                            @endif
                        </div>
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
