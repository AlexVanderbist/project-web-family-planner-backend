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

                <input id="name" type="text" class="form-control" name="name" disabled="disabled" readonly="readonly"
                       value="{{ old('name', $household->name) }}">

                @if ($errors->has('name'))
                    <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
            </div>
            
            <div class="row">
                <div class="col-md-6">

                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        <label for="name" class=" control-label">Town or City</label>
                        <input id="address" type="text" class="form-control" name="address" autofocus
                               value="{{ old('address', $household->address) }}">
                        <p class="help-block">This information will be used to display the weather.</p>
        
                        @if ($errors->has('address'))
                            <span class="help-block">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                        @endif
                    </div>
                    
                </div>
                <div class="col-md-6">
                    
                    <div class="form-group{{ $errors->has('busstop') ? ' has-error' : '' }}">
                        <label for="name" class=" control-label">DeLijn Busstop ID</label>
                        <input id="busstop" type="text" class="form-control" name="busstop"
                               value="{{ old('busstop', $household->busstop) }}">
        
                        @if ($errors->has('busstop'))
                            <span class="help-block">
                            <strong>{{ $errors->first('busstop') }}</strong>
                        </span>
                        @endif
                    </div>
                    
                </div>
            </div>


            <button class="btn btn-primary btn-raised">
                Save household settings
            </button>
        </form>
    </div>

@endsection
