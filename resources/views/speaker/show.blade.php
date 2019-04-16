@extends('layouts.app')

@section('content')
    <div class="container px-lg-5">
        <div class="row mx-lg-n5">
            <div class="col py-3 px-lg-5 bg-light">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $speaker->full_name }}</h5>
                        <p class="card-text">{{ $speaker->information }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $speaker->company }}</li>
                        <li class="list-group-item">{{ $speaker->position }}</li>
                    </ul>
                    <div class="card-body">
                        <a class="btn btn-outline-dark" data-toggle="modal" data-target="#editSpeaker">
                            Edit Speaker
                        </a>
                    </div>
                </div>
            </div>
            <div class="col py-3 px-lg-5 bg-light">
                <div class="modal fade" id="editSpeaker" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel">Edit Speaker</h4>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('event.speaker.update', [$speaker->event, $speaker->id]) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <label for="full_name">Full name</label>
                                        <input type="text" class="form-control" id="full_name" name="full_name" value="{{ $speaker->full_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="position">Position</label>
                                        <input type="text" class="form-control" id="position" name="position" value="{{ $speaker->position }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="company">Company</label>
                                        <input type="text" class="form-control" id="company" name="company" value="{{ $speaker->company }}">
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="photo" name="image">
                                                <label class="custom-file-label" for="photo" aria-describedby="inputGroupFileAddon02">Choose Photo</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="information">Information</label>
                                        <input type="text" class="form-control" id="information" name="information" value="{{ $speaker->information }}">
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
            </div>
        </div>
    </div>
@endsection