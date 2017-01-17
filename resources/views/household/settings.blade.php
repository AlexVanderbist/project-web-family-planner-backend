@extends('layouts.app')

@section('title', 'Screens')

@section('content')

    <div class="container">

        <h1>
            {{$user->name}}
            <span class="small">Household settings</span>
        </h1>

        <form action="{{route('household.update')}}" method="POST">
            {{ csrf_field() }}

            {{ method_field("PUT") }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="control-label">Household Name</label>

                <input id="name" type="text" class="form-control" name="name"
                       value="{{ old('name') or $user->name }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                <label for="name" class=" control-label">Town or City</label>
                <p class="help-block">This information will be used to display the weather.</p>
                <input id="address" type="text" class="form-control" name="address"
                       value="{{ old('address') or $user->address }}" required autofocus>

                @if ($errors->has('address'))
                    <span class="help-block">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
                @endif
            </div>

            <button class="btn btn-primary">
                Save household settings
            </button>
        </form>

    </div>

@endsection
