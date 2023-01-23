@extends('layouts.admin')
@section('content')
    @foreach ($categories as $category)
        <p>{{ $category->name }}</p>
    @endforeach
@endsection
