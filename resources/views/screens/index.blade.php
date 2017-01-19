@extends('layouts.app')

@section('title', 'Screens')

@section('content')

    <h1>Planni Screens</h1>

    <p class="lead">
        Planni Screens are the devices you put in your livingroom, kitchen or bedroom.<br>
        You can assign appropriate slides to each screen or change settings.<br>
        @if($screens->count())
            <a href="{{route('screens.create')}}" class="btn btn-lg btn-primary btn-raised">
                <span class="glyphicon glyphicon-plus"></span>
                Add another screen
            </a>
        @endif
    </p>

    @if($screens->count())
        <div class="row">
            @foreach ($screens->chunk(4) as $screenChunk)
                @foreach($screenChunk as $screen)
                    <div class="col-md-3">
                        <div class="panel panel-default panel-screen">
                            <div class="panel-heading">
                                <a href="{{route('screens.destroy', $screen->id)}}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Are you sure you wish to delete this screen?" class="pull-right">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </a>
                                <h2 class="panel-title">{{$screen->name}}</h2>
                            </div>
                            <div class="panel-body">
                                <p>
                                    Type: <strong>{{getScreenType($screen->type)}} screen</strong>
                                </p>
                                <a href="{{route('screens.edit', $screen->id)}}"
                                   class="btn btn-raised btn-primary btn-fab">
                                    <i class="material-icons glyphicon glyphicon-cog"></i>
                                </a>

                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    @else
        <h2>You don't have any screens yet!</h2>
        <a href="{{route('screens.create')}}" class="btn btn-lg btn-raised btn-primary">
            <i class="glyphicon glyphicon-plus"></i>
            Add a screen
        </a>
    @endif

@endsection
