@extends('layouts.app')
@section('header')
    Hello User
@endsection

@section('content')
        <div class="wrapper media col-md-offset-1">
            @if(isset($user->photo))
            <figure class="media-right media-middle">
            <img src="{{$user->photo->th_path}}" alt="avatar" class="media-object">
            </figure>
            @endif
            <div class="media-body">
                <div class="col-md-8">
                <table class="table">
                    <tr>
                        <td class="col-sm-4">Имя:</td>
                        <td>{{$user->name}}</td>
                    </tr>
                    <tr>
                        <td class="col-sm-4"> Эл.почта:</td>
                        <td>{{$user->email}}</td>
                    </tr>
                    <tr>
                        <td class="col-sm-4">Телефон:</td>
                        <td>{{$user->phone}}</td>
                    </tr>
                    <tr>
                        <td class="col-sm-4">Вес:</td>
                        <td>{{$user->weight}}</td>
                    </tr>
                    <tr>
                        <td class="col-sm-4">Рост:</td>
                        <td>{{$user->height}}</td>
                    </tr>

                </table>
                </div>
            </div>
            {{link_to_action ('UserController@edit',$title = 'Изменить',[],['class'=>'btn btn-primary'])}}
        </div>


@endsection