@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow rounded-3">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">{{ $voter->first_name }} {{ $voter->last_name }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Email:</strong> {{ $voter->email }}</p>
            <p><strong>Mobile:</strong> {{ $voter->mobile }}</p>
            <p><strong>Date of Birth:</strong> {{ $voter->dob }}</p>
            <p><strong>Address:</strong> {{ $voter->address }}</p>
            <p><strong>Taluk:</strong> {{ $voter->taluk }}</p>
            <p><strong>District:</strong> {{ $voter->district }}</p>
            <p><strong>State:</strong> {{ $voter->state }}</p>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('voters.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
        </div>
    </div>
</div>
@endsection
