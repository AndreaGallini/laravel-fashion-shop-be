@extends('layouts.admin')

@section('content')
    <section id="admin-show">
        <div>
            <a class="back-btn btn btn-dark" href="{{route('admin.products.index')}}">BACK</a>
            <h1>{{ $product->name }}</h1>
            @if($product->categories && count($product->categories) > 0)
            @foreach ($product->categories as $category)
                <span>{{$category->name}}</span>
            @endforeach
            @endif
            @if($product->brands && count($product->brands) > 0)
            @foreach ($product->brands as $brand)
                <span>{{$brand->name}}</span>
            @endforeach
            @endif
            @if($product->textures && count($product->textures) > 0)
            @foreach ($product->textures as $texture)
                <span>{{$texture->name}}</span>
            @endforeach
            @endif
            <div class="image">
                {{-- @if($product->image) --}}
                {{-- <img src="{{ asset('storage/' . $product->image) }}"> --}}
                {{-- @else --}}
                {{-- <img src="{{Vite::asset('resources/img/not_found.jpeg')}}" alt=""> --}}
                {{-- @endif --}}
            </div>
            <div class="infos d-flex flex-column">
                <div class="info-row d-flex justify-content-around my-3">
                    <div class="info-col d-flex justify-content-between">
                        <span>Price:</span>
                        <span>{{$product->price}}</span>
                    </div>
                    <div class="info-col d-flex justify-content-between">
                        <span>Slug:</span>
                        <span>{{$product->slug}}</span>
                    </div>
                </div>
            </div>
            <p>{!! $product->description !!}</p>
        </div>
    </section>
@endsection
