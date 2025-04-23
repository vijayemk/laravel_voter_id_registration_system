{{-- resources/views/errors/404.blade.php --}}
@extends('layouts.app')

@section('title', 'Page Not Found')

@section('content')
<div class="text-center mt-5">
    <h1 class="display-4">404</h1>
    <p class="lead">Sorry, the page you’re looking for cannot be found.</p>
    <a href="{{ url('/') }}" class="btn btn-primary mt-3">Go Home</a>
</div>
@endsection
