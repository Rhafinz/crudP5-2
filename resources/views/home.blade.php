@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="text-center mb-4">
                        <h3>{{ __('You are logged in!') }}</h3>
                        <p>Welcome to your dashboard.</p>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header bg-info text-white">
                                    {{ __('Profile') }}
                                </div>
                                <div class="card-body">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <strong>{{ __('Name') }}:</strong> {{ auth()->user()->name }}
                                        </li>
                                        <li class="list-group-item">
                                            <strong>{{ __('Email') }}:</strong> {{ auth()->user()->email }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
