@extends('layouts.app')

@section('title', "Dashboard | " . config('app.name'))

@section('content')
    <div class="container">
        @if(Auth::check())
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Dashboard</div>

                        <div class="panel-body">
                            You are logged in!
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection