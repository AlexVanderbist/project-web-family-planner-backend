@extends('layouts.app')

@section('title', $screen->exists ? 'Editing '.$screen->name : 'Add New screen')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">
                Add a Planni Screen to your household
            </h2>
        </div>
        <div class="panel-body">

            <form method="POST" action="{{ $screen->exists ? route('screens.update', $screen->id) : route('screens.store')  }}">

                {{ $screen->exists ? method_field('put') : '' }}

                {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="name">Screen Name</label>
                            <input id="name" name="name" type="text" required autofocus autocomplete="off" value="{{ $screen->name or old('name') }}"
                                   placeholder="e.g. 'Kitchen Planner'" class="form-control">
                            <p class="help-block">
                                The friendly name for this screen.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="type">Type</label>
                            <select name="type" class="form-control">
                                @foreach ($screen_types as $key => $val)
                                    <option value="{{ $key }}" {{ (old("type", $screen->type) == $key ? "selected":"") }}>{{ $val }}</option>
                                @endforeach
                            </select>
                            <p class="help-block">
                                Select the type of screen. Currently only 2 modes are supported. Normal is the default, mirror is a high
                                contrast theme to build into mirrors.
                            </p>
                        </div>
                    </div>
                </div>

                @if( ! $screen->exists)
                    <div class="form-group">
                        <label class="control-label" for="code">Code</label>
                        <input id="code" name="code" type="text" required autocomplete="off" value="{{ $screen->code or old('code') }}"
                               placeholder="e.g. '5DE20LK09'" class="form-control">
                        <p class="help-block">
                            The code for this screen. You can find the code on the back of the device.
                        </p>
                    </div>
                @endif

                <div class="btn-group">
                    <input type="submit" class="btn btn-raised btn-primary" value="Save screen">
                    <a href="{{ route('screens.index') }}" class="btn btn-link">or go back to all screens</a>
                </div>

            </form>
        </div>
    </div>
@endsection
