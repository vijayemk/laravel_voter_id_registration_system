{{-- resources/views/errors/500.blade.php --}}
@extends('layouts.app')

@section('title', 'Internal Server Error')

@section('content')
<div class="container text-center">
    <h1 class="display-1 text-danger">500</h1>
    <h2>Oops! Something went wrong on our end.</h2>
    <p>Don't worry, we're on it. Our team is looking into it.</p>
    <a href="{{ url('/') }}" class="btn btn-primary">Back to Home</a>
</div>
@endsection
