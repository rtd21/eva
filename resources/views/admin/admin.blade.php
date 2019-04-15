@extends('layouts.app')

@section('content')
<div class="container">
    <a class="btn btn-outline-dark" data-toggle="modal" data-target="#createEvent">
        Create Event
    </a>

    <div class="modal fade" id="createEvent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Create Event</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('event.store') }}" method="POST">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="information">Information</label>
                            <input type="text" class="form-control" id="information" name="information">
                        </div>
                        <div class="form-group">
                            <label for="start_date">Start date</label>
                            <input type="date" class="form-control" id="start_date" name="start_date">
                        </div>
                        <div class="form-group">
                            <label for="end_date">End date</label>
                            <input type="date" class="form-control" id="end_date" name="end_date">
                        </div>
                        <button type="submit" class="btn btn-success">Create event</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>





    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link nav-custom" href="#">Events</a>
        </li>
    </ul>
    <ul class="list-group">
        @foreach($events as $event)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a class="btn btn-link" href="{{ route('event.show', $event->id) }}" role="button">
                    {{ $event->name }}
                </a>
                <form action="{{ route('event.destroy', $event->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <span class="badge">
                        <button type="submit" class="btn btn-outline-danger">Delete event</button>
                    </span>
                </form>
            </li>
        @endforeach
    </ul>
</div>
@endsection