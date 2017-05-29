@extends('layouts.app')
@section('header')
    Hello User
@endsection

@section('content')
        <div class="media">
            @if(isset($user->photo))
            <figure class="media-left media-middle">
            <img src="{{$user->photo->th_path}}" alt="avatar" class="media-object">
            </figure>
            @endif
            <div class="media-body">
                <h3 class="media-heading">Hello {{$user->name}}</h3>
                {{$user->email}}
            </div>
        </div>

        {{-- форма для добовления фотографии --}}
        {{Form::open(['route'=>['photo', $user],'files'=> true])}}
            {{Form::file('image',['class'=>'text-muted'])}}
        @if(!isset ($user->photo))
            {{Form::submit('Сохранить',['class'=>'btn btn-primary'])}}
        @else
            {{Form::submit('Изменить',['class'=>'btn btn-primary'])}}
        @endif
            {{Form::close()}}
@endsection