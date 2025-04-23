{{-- resources/views/errors/401.blade.php --}}
@extends('layouts.app')

@section('title', 'Unauthorized')

@section('content')
<div class="container text-center">
    <h1 class="display-1 text-danger">401</h1>
    <h2>Unauthorized Access</h2>
    <p>You need to log in to access this page.</p>
    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
</div>
@endsection
