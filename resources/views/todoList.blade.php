@extends('layout')

@section('content')
    <div>
        <curr-date></curr-date>
        <br>
        <to-dos></to-dos>
    </div>
    <br>
    <br>
    <br>
    <div>
    <p>The above list was handled in Vue. To see it handled in Laravel, click <a href="/tasks">HERE</a>.</p>
    </div>
@endsection