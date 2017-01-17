@extends('layouts.app')

@section('title', "Dashboard | " . config('app.name'))

@section('content')
    <div class="jumbotron">
        <h2>Welcome back, {{Auth::user()->name}}</h2>

        <p>This is the Planni Housekeeping dashboard. In here you can quickly post messages to your household, add
            Planni screens or change which slides will be shown on which screen.</p>

        <div class="row">
            <div class="col-md-6">
                <a href="{{route('messages.create')}}" class="btn btn-lg btn-block btn-primary btn-raised">Send a
                    message to your household</a>
            </div>
            <div class="col-md-6">
                <a href="{{route('screens.index')}}" class="btn btn-lg btn-block btn-default btn-raised">Manage
                    screens</a>
            </div>
        </div>
    </div>
@endsection
