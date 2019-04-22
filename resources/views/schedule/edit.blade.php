@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('event.schedule.update', [$event->id, $block->id]) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $block->name }}">
            </div>
            <div class="form-group">
                <label for="time">Time</label>
                <input type="time" class="form-control" id="time" name="time" value="{{ $block->time }}">
            </div>
            <div class="form-group">
                <label for="day">Day</label>
                <select class="custom-select" id="day" name="day">
                    <option disabled>Choose day...</option>
                    @for ($i = 1; $i <= $event->dayCount(); $i++)
                        @if($i == $block->day)
                            <option selected value="{{ $i }}">{{ $i }}</option>
                        @else
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endif
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label for="speaker">Speaker</label>
                <select class="custom-select" id="speaker" name="speaker_id">
                    <option disabled>Choose speaker...</option>
                    @foreach ($event->speakers as $speaker)
                        @if($speaker->id == $block->speaker->id)
                            <option selected value="{{ $speaker->id }}">{{ $speaker->full_name }}</option>
                        @else
                            <option value="{{ $speaker->id }}">{{ $speaker->full_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Save changes</button>
        </form>
    </div>
@endsection