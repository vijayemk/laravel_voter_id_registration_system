{{-- resources/views/errors/419.blade.php --}}
@extends('layouts.app')

@section('title', 'Page Expired')

@section('content')
<div class="container text-center">
    <h1 class="display-1 text-info">419</h1>
    <h2>Oops! Your session has expired.</h2>
    <p>Your session may have timed out or been invalidated. Please try again.</p>
    <a href="{{ url()->previous() }}" class="btn btn-primary">Go Back</a>
</div>
@endsection
