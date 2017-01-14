@extends('layouts.app')
@section('header')
    Hello User
@endsection

@section('content')
    <div class="jumbotron">
        <div class="media media-left">
        <h1 class="media-heading">Hello {{$user->name}}</h1>
            <img src="" alt="" class="media-object">
        </div>
    </div>
@endsection