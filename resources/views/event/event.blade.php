@extends('layouts.app')

@section('content')
    <div class="container">

        <a class="btn btn-outline-dark" data-toggle="modal" data-target="#editEvent">
            {{ '#'.$event->code }}
        </a>

        <div class="modal fade" id="editEvent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Edit Event</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('event.update', $event->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{ $event->name }}">
                            </div>
                            <div class="form-group">
                                <label for="information">Information</label>
                                <input type="text" class="form-control" id="information" name="information"
                                       value="{{ $event->information }}">
                            </div>
                            <div class="form-group">
                                <label for="start_date">Start date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date"
                                       value="{{ $event->start_date }}">
                            </div>
                            <div class="form-group">
                                <label for="end_date">End date</label>
                                <input type="date" class="form-control" id="end_date" name="end_date"
                                       value="{{ $event->end_date }}">
                            </div>
                            <div class="form-group">
                                <label for="code">Code</label>
                                <input type="text" class="form-control" id="code" name="code"
                                       value="{{ $event->code }}">
                            </div>
                            <button type="submit" class="btn btn-success">Save changes</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#speakers" role="tab"
                   aria-controls="profile" aria-selected="false">
                    Speakers
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="home-tab" data-toggle="tab" href="#schedule" role="tab" aria-controls="home"
                   aria-selected="true">
                    Schedule
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="messages-tab" data-toggle="tab" href="#questions" role="tab"
                   aria-controls="messages" aria-selected="false">
                    Questions
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="settings-tab" data-toggle="tab" href="#votes" role="tab"
                   aria-controls="settings" aria-selected="false">
                    Votes
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="speakers" role="tabpanel" aria-labelledby="profile-tab">
                <a class="btn btn-outline-dark" data-toggle="modal" data-target="#addSpeaker">
                    Add Speaker
                </a>
                <div class="modal fade" id="addSpeaker" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel">Add Speaker</h4>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('event.speaker.store', $event->id) }}" method="POST">
                                    @method('POST')
                                    @csrf
                                    <div class="form-group">
                                        <label for="full_name">Full name</label>
                                        <input type="text" class="form-control" id="full_name" name="full_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="position">Position</label>
                                        <input type="text" class="form-control" id="position" name="position">
                                    </div>
                                    <div class="form-group">
                                        <label for="company">Company</label>
                                        <input type="text" class="form-control" id="company" name="company">
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="photo" name="image">
                                                <label class="custom-file-label" for="photo"
                                                       aria-describedby="inputGroupFileAddon02">Choose Photo</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="information">Information</label>
                                        <input type="text" class="form-control" id="information" name="information">
                                    </div>
                                    <button type="submit" class="btn btn-success">Add speaker</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="list-unstyled">
                    @foreach($event->speakers as $speaker)
                        <li class="media my-4">
                            <img src="{{ $speaker->photo }}" class="mr-3" alt="...">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">
                                    <a href="{{ route('event.speaker.show', [$event->id, $speaker->id]) }}">
                                        {{ $speaker->full_name }}
                                    </a>
                                </h5>
                            </div>
                            <form action="{{ route('event.speaker.destroy', [$event->id, $speaker->id]) }}"
                                  method="POST">
                                @method('DELETE')
                                @csrf
                                <span class="badge">
                                    <button type="submit" class="btn btn-outline-danger">Delete speaker</button>
                                </span>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="tab-pane" id="schedule" role="tabpanel" aria-labelledby="home-tab">
                <a class="btn btn-outline-dark" data-toggle="modal" data-target="#addBlock">
                    Add schedule's block
                </a>
                <div class="modal fade" id="addBlock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel">Add Schedule block</h4>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('event.schedule.store', $event->id) }}" method="POST">
                                    @method('POST')
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="time">Time</label>
                                        <input type="time" class="form-control" id="time" name="time">
                                    </div>
                                    <div class="form-group">
                                        <label for="day">Day</label>
                                        <select class="custom-select" id="day" name="day">
                                            <option selected disabled>Choose day...</option>
                                            @for ($i = 1; $i <= $event->dayCount(); $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="speaker">Speaker</label>
                                        <select class="custom-select" id="speaker" name="speaker_id">
                                            <option selected disabled>Choose speaker...</option>
                                            @foreach ($event->speakers as $speaker)
                                                <option value="{{ $speaker->id }}">{{ $speaker->full_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-success">Add block</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered">
                    <tbody>
                    @for ($i = 1; $i <= $event->dayCount(); $i++)
                        <tr>
                            <th scope="row">Day {{ $i }}</th>
                            @foreach($event->scheduleBlocks as $block)
                                @if($block->day == $i)
                                    <td>
                                        <div class="card" style="width: 18rem;">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $block->name }}</h5>
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">{{ $block->time }}</li>
                                                    <li class="list-group-item">
                                                        <a href="{{ route('event.speaker.show', [$event->id, $block->speaker->id]) }}">
                                                            {{ $block->speaker->full_name }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                @endif
                            @endforeach
                        </tr>
                    @endfor
                    </tbody>
                </table>
            </div>
            <div class="tab-pane" id="questions" role="tabpanel" aria-labelledby="messages-tab">
                <ul class="list-group">
                    @foreach($event->questions as $question)
                        <li class="list-group-item">

                            {{ $question->user->name }}:
                            {{ $question->question }}
                            <a class="btn btn-outline-success" data-toggle="modal" data-target="#reply">
                                Reply
                            </a>
                            <div class="modal fade" id="reply" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel">Reply question</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('event.question.reply', [$event->id, $question->id]) }}" method="POST">
                                                @method('POST')
                                                @csrf
                                                <div class="form-group">
                                                    <label for="reply">Reply</label>
                                                    <input type="text" class="form-control" id="reply" name="reply">
                                                </div>
                                                <button type="submit" class="btn btn-success">Reply</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-group">
                                @foreach($question->replies as $reply)
                                    <li class="list-group-item">
                                        {{ $reply->reply }}
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="tab-pane" id="votes" role="tabpanel" aria-labelledby="settings-tab">votes</div>
        </div>

        <script>
            $(function () {
                $('#myTab li:last-child a').tab('show')
            })
        </script>
    </div>
@endsection