@extends('layouts.app')

@section('title', 'Messages')

@section('content')

    <h1>Calendars</h1>

    <p class="lead">
        You can show the next events on any calendar with an iCal feed. Just add the URL to the list bellow and we'll do
        the rest!<br>
    </p>

    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title">Calendar feeds (ICal/.ics format)</h2>
                </div>

                <div class="panel-body">
                    @if($calendars->count() == 0)
                        <p>Add a calendar feed bellow.</p>
                    @endif
                </div>

                <div class="list-group">
                    @foreach($calendars as $calendar)
                        <div class="list-group-item">
                            <div class="row-content">
                                <div class="action-secondary">
                                    <a href="{{route('calendars.destroy', $calendar->id)}}" data-token="{{csrf_token()}}"
                                       data-method="delete"
                                       data-confirm="Are you sure you want to delete this calendar feed?"><span
                                            class="glyphicon glyphicon-remove"></span></a>
                                </div>
                                <h4 class="list-group-item-heading">{{$calendar->name}}</h4>

                                <p class="list-group-item-text">{{$calendar->description}}</p>
                            </div>
                        </div>
                        <div class="list-group-separator"></div>
                    @endforeach
                </div>

                <div class="panel-footer">
                    <form action="{{route('calendars.store')}}" method="POST">

                        {{ csrf_field() }}

                        <div class="form-group label-floating">
                            <label class="control-label" for="url">Calendar feed URL</label>
                            <div class="input-group">
                                <input type="url" required autofocus id="url" name="url" class="form-control">
                                <span class="input-group-btn">
                                <button type="submit" class="btn btn-fab btn-raised btn-primary btn-fab-mini">
                                    <span class="glyphicon glyphicon-plus"></span>
                                </button>
                            </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection
