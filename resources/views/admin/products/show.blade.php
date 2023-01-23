@extends('layouts.admin')
@section('content')
    <h1>{{ $product->name }}</h1>
    <p>{{ $product->category->name }}</p>
    <p>{{ $product->texture->name }}</p>
@endsection
