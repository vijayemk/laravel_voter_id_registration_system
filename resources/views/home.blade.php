@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <p>Welcome, {{ $user->name }}!</p>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Dashboard Tiles -->
                    <div class="row text-center">
                        <div class="col-md-6 mb-3">
                            <div class="card border-primary">
                                <div class="card-body">
                                    <h5>Total Registered Voters</h5>
                                    <h3>{{ $totalVoters }}</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="card border-success">
                                <div class="card-body">
                                    <h5>Today's Registrations</h5>
                                    <h3>{{ $todayRegistered }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="row text-center mt-4">
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('voters.create') }}" class="btn btn-primary btn-lg w-100">Add Voter</a>
                        </div>

                        <div class="col-md-4 mb-3">
                            <a href="{{ route('voters.index') }}" class="btn btn-secondary btn-lg w-100">View Voter List</a>
                        </div>

                        <div class="col-md-4 mb-3">
                            <!-- Voters Export Button -->
                            <a href="{{ route('voters.export') }}" class="btn btn-success btn-lg w-100">Export Voters</a>
                        </div>
                    </div>

                    <!-- System Status -->
                    <div class="card mt-4">
                        <div class="card-header">System Status</div>
                        <div class="card-body">
                            <p>System is running smoothly.</p>
                            <p>Last check: {{ now()->format('d-m-Y H:i:s') }}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
