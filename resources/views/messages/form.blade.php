@extends('layouts.app')

@section('title', $message->exists ? 'Editing message' : 'Add new message')

@section('content')

    <h1>Send a message to your household</h1>

    <div class="well">

        @if($message->exists)
            <a href="{{route('messages.destroy', $message->id)}}" data-token="{{csrf_token()}}" data-method="delete" data-confirm="Are you sure you wish to remove this message?" class="btn btn-danger btn-raised pull-right">
                Remove message
            </a>
        @endif

        <form method="POST"
              action="{{ $message->exists ? route('messages.update', $message->id) : route('messages.store')  }}">

            {{ $message->exists ? method_field('put') : '' }}

            {{ csrf_field() }}

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label" for="color">Style</label>
                        <select name="color" class="form-control">
                            @foreach ($message_colors as $key => $val)
                                <option
                                    value="{{ $key }}" {{ (old("color", $message->type) == $key ? "selected":"") }}>{{ $val }}</option>
                            @endforeach
                        </select>
                        <p class="help-block">
                            Select the color of your message.
                        </p>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label" for="message">Message</label>
                <textarea name="message" id="message" required autofocus class="form-control">{{ old('message', $message->message) }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label" for="signature">Signature</label>
                        <input id="signature" name="signature" type="text" required autocomplete="off"
                               value="{{ old('signature', $message->signature) }}"
                               placeholder="e.g. 'XOXO Mum'" class="form-control">
                        <p class="help-block">
                            Sign your message with a name or a greeting.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="duration">Hide message after</label>
                        <select name="duration" class="form-control">
                            @foreach ($message_durations as $key => $val)
                                <option
                                    value="{{ $key }}" {{ ($key == -1 ? "selected":"") }}>{{ $val }}</option>
                            @endforeach
                        </select>
                        <p class="help-block">
                            How long should your message stay visible?
                        </p>
                    </div>
                </div>
            </div>

            <div class="btn-group">
                @if($message->exists)
                    <input type="submit" class="btn btn-raised btn-primary" value="Save message">
                @else
                    <input type="submit" class="btn btn-raised btn-primary" value="Add message">
                @endif

                <a href="{{ route('messages.index') }}" class="btn btn-link">or go back to all messages</a>
            </div>

        </form>
    </div>
@endsection
