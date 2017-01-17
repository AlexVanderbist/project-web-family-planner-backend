@extends('layouts.minimal')

@section('title', config('app.name'))

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h2>Welcome to</h2>
            <h1>Planni Housekeeping</h1>
            <p>This is where you can add new Planni screens and manage existing ones for your household.</p>
            <p>Are you new to Planni and did you just buy your first screen? Click on "New Planni household".</p>
            <div class="row">
                <div class="col-md-6">
                    <a href="{{route('register')}}" class="btn btn-block btn-lg btn-raised btn-info">New Planni
                        household
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="{{route('login')}}" class="btn btn-block btn-lg btn-raised btn-default">Login to Planni
                        Housekeeping
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
