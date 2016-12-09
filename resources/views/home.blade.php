@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-header">
       <h1>Hello World</h1>
        I am Alexander Konopatsky. I'm 30 yeas old
    </div>
    <div class="list-group col-md-8 col-md-offset-1">
        @if(isset($articles))
            <h2 class="text-danger">Последние записи в моем блоге</h2>
            @foreach($articles as $article)
                <div class="list-group-item">
                <h3 class="list-group-item-heading">{{$article->title}}</h3>
                <p class="list-group-item-text">{{$article->description}}</p>
                <p class="text-info">{{$article->author()->name}}</p>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
