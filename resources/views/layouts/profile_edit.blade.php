@extends('layouts.app')
@section('header')
    Hello User
@endsection

@section('content')
    <div class="wrapper media col-md-offset-1">

            {{Form::open(['route'=>['photo',$user->id],'files'=>true,'class'=>'col-md-6'])}}
            <div class="form-group">
                {{Form::label('name')}}
                {{Form::text('name', $user->name,['class'=>'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('email')}}
                {{Form::text('email', $user->email,['class'=>'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('phone')}}
                {{Form::text('phone', $user->phone,['class'=>'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('weight')}}
                {{Form::text('weight', $user->weight,['class'=>'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('height')}}
                {{Form::text('height', $user->height,['class'=>'form-control'])}}
            </div>

        @if(isset($user->photo))
            <figure class="media-right media-middle">
                <img src="../{{$user->photo->th_path}}" alt="avatar" class="media-object">
            </figure>
        @endif
            {{Form::file('image')}}
            {{Form::submit('Сохранить',['class'=>'btn btn-primary'])}}
            {{Form::close()}}
    </div>
@endsection