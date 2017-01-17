@extends('layouts.app')

@section('title', $screen->exists ? 'Editing '.$screen->name : 'Add New screen')

@section('content')

    <form method="POST" action="{{ $screen->exists ? route('screens.update', $screen->id) : route('screens.store')  }}">

        {{ $screen->exists ? method_field('put') : '' }}

        {{ csrf_field() }}

        <div class="form-group">
            <label class="control-label" for="name">Screen Name</label>
            <p class="help-block">
                The friendly name for this screen.
            </p>
            <input id="name" name="name" type="text" required autofocus value="{{ $screen->name or old('name') }}"
                   placeholder="e.g. 'Kitchen Planner'" class="form-control">
        </div>

        @if( ! $screen->exists)
            <div class="form-group">
                <label class="control-label" for="code">Code</label>
                <p class="help-block">
                    The code for this screen. You can find the code on the back of the device.
                </p>
                <input id="code" name="code" type="text" required autofocus value="{{ $screen->code or old('code') }}"
                       placeholder="e.g. '5DE20LK09'" class="form-control">
            </div>
        @endif

        <div class="form-group">
            <label class="control-label" for="type">Type</label>
            <p class="help-block">
                Select the type of screen. Currently only 2 modes are supported. Normal is the default, mirror is a high
                contrast theme to build into mirrors.
            </p>
            <select name="type" class="form-control">
                @foreach ($screen_types as $key => $val)
                    <option value="{{ $key }}" {{ (old("type", $screen->type) == $key ? "selected":"") }}>{{ $val }}</option>
                @endforeach
            </select>
        </div>

        <input type="submit" class="btn btn-primary" value="Save screen">
        <a href="{{ route('screens.index') }}" class="">or go back to all screens.</a>

    </form>
@endsection