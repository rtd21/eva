@extends('layouts.app')

@section('content')
    <div class="container">

        <a class="btn btn-outline-dark" data-toggle="modal" data-target="#editEvent">
            {{ '#'.$event->code }}
        </a>

        <div class="modal fade" id="editEvent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                <input type="text" class="form-control" id="name" name="name" value="{{ $event->name }}">
                            </div>
                            <div class="form-group">
                                <label for="information">Information</label>
                                <input type="text" class="form-control" id="information" name="information" value="{{ $event->information }}">
                            </div>
                            <div class="form-group">
                                <label for="start_date">Start date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $event->start_date }}">
                            </div>
                            <div class="form-group">
                                <label for="end_date">End date</label>
                                <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $event->end_date }}">
                            </div>
                            <div class="form-group">
                                <label for="code">Code</label>
                                <input type="text" class="form-control" id="code" name="code" value="{{ $event->code }}">
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
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#schedule" role="tab" aria-controls="home" aria-selected="true">
                    Schedule
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#speakers" role="tab" aria-controls="profile" aria-selected="false">Speakers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Messages</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Settings</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane active" id="schedule" role="tabpanel" aria-labelledby="home-tab">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane" id="speakers" role="tabpanel" aria-labelledby="profile-tab">
                <ul class="list-unstyled">
                    <li class="media">
                        <img src="..." class="mr-3" alt="...">
                        <div class="media-body">
                            <h5 class="mt-0 mb-1">List-based media object</h5>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                    </li>
                    <li class="media my-4">
                        <img src="..." class="mr-3" alt="...">
                        <div class="media-body">
                            <h5 class="mt-0 mb-1">List-based media object</h5>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                    </li>
                    <li class="media">
                        <img src="..." class="mr-3" alt="...">
                        <div class="media-body">
                            <h5 class="mt-0 mb-1">List-based media object</h5>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                    </li>
                </ul>
            </div>
            <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">...</div>
            <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">...</div>
        </div>

        <script>
            $(function () {
                $('#myTab li:last-child a').tab('show')
            })
        </script>
    </div>
@endsection