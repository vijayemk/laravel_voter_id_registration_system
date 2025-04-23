{{-- resources/views/errors/403.blade.php --}}
@extends('layouts.app')

@section('title', 'Forbidden')

@section('content')
<div class="container text-center">
    <h1 class="display-1 text-warning">403</h1>
    <h2>Access Forbidden</h2>
    <p>You don't have permission to access this page. Please check your permissions or contact support.</p>
    <a href="{{ url('/') }}" class="btn btn-primary">Back to Home</a>
</div>
@endsection
