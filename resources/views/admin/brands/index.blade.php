@extends('layouts.admin')
@section('content')
    @foreach ($brands as $brand)
        <p>{{ $brand->name }}</p>
    @endforeach
@endsection
