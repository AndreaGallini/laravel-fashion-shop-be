@extends('layouts.admin')
@section('content')
    <h1>{{ $product->name }}</h1>
    <p>{{ $product->category->name }}</p>
                            @if ($product->texture)
                            <td> {{ $product->texture->name }}</td>
                             @else
                            <td>texture non attribuita</td>
                            @endif
@endsection
