@extends('layouts.app')

@section('title', 'Screens')

@section('content')


    <h1>
        {{$household->name}}
        <span class="small">Household settings</span>
    </h1>

    <div class="well">
        <form action="{{route('household.update', $household->id)}}" method="POST">
            {{ csrf_field() }}

            {{ method_field("PUT") }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="control-label">Household Name</label>

                <input id="name" type="text" class="form-control" name="name"
                       value="{{ old('name', $household->name) }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                <label for="name" class=" control-label">Town or City</label>
                <input id="address" type="text" class="form-control" name="address"
                       value="{{ old('address', $household->address) }}" required>
                <p class="help-block">This information will be used to display the weather.</p>

                @if ($errors->has('address'))
                    <span class="help-block">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
                @endif
            </div>

            <button class="btn btn-primary btn-raised">
                Save household settings
            </button>
        </form>
    </div>

@endsection
