@extends('layouts.app')

@section('title', 'Screens')

@section('content')

    <div class="container">
        <h1>Screens</h1>
        <p>Small description about screens goes here.</p>

        @if($screens->count())
            <div class="row">
                @foreach ($screens->chunk(4) as $screenChunk)
                    @foreach($screenChunk as $screen)
                        <div class="col-md-3">
                            <div class="well well-sm text-center">
                                <h2>{{$screen->name}}</h2>
                                <a href="{{route('screens.edit', $screen->id)}}">
                                    <i class="glyphicon glyphicon-cog"></i> Settings
                                </a>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-md-3">
                        <div class="well well-sm text-center">
                            <a href="{{route('screens.create')}}">
                                <i class="glyphicon glyphicon-plus h1"></i>
                                <h2>Add another screen</h2>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <h2>You don't have any screens yet!</h2>
            <a href="{{route('screens.create')}}" class="btn btn-lg btn-primary">
                <i class="glyphicon glyphicon-plus"></i>
                Add a screen
            </a>
        @endif
    </div>

@endsection