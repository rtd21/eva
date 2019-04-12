@extends('layouts.app')

@section('content')
<div class="container">
    <nav class="navbar navbar-light" style="background: blueviolet">
        <a class="navbar-brand">Данные</a>
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-dark my-2 my-sm-0" type="submit">Search</button>
        </form>
        <a class="btn btn-light btn-circle" role="button">LK</a>
    </nav>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link nav-custom" href="#">Events</a>
        </li>
    </ul>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <a class="btn btn-link" href="#" role="button">Event 1</a>
        </li>
        <li class="list-group-item">
            <a class="btn btn-link" href="#" role="button">Event 2</a>
        </li>
    </ul>
</div>
@endsection