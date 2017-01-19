@extends('layouts.app')

@section('title', 'Messages')

@section('content')

    <h1>Messages</h1>

    <p class="lead">
        Via these messages you can leave notes on the Planni Screens in your household. Set a start and end date on your notes to make them appear at the right times.<br>
        <a href="{{route('messages.create')}}" class="btn btn-lg btn-primary btn-raised">
            <span class="glyphicon glyphicon-plus"></span>
            Send a message to household
        </a>
    </p>

    @if($messages->count())
        <div class="row">
            @foreach ($messages->chunk(4) as $messageChunk)
                @foreach($messageChunk as $message)
                    <div class="col-md-3">
                        <div class="well well-message">
                            <p>
                                {{$message->message}}
                            </p>
                            <p>
                                <strong>{{$message->signature}}</strong>
                            </p>
                            @if($message->end)
                                <div class="information">
                                    Hides {{$message->end->diffForHumans()}}
                                </div>
                            @endif
                            <a href="{{route('messages.edit', $message->id)}}"
                               class="btn btn-raised btn-primary btn-fab">
                                <i class="material-icons glyphicon glyphicon-pencil"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    @endif

@endsection
