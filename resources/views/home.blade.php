@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row center-block">
       <h1>Hello World</h1>
        I am Alexander Konopatsky. I'm 30 yeas old
        @if(isset($articles))
            @foreach($articles as $article)
                <h3>{{$article->title}}</h3>
                <p>{{$article->description}}</p>
                <p>{{$article->text}}</p>
                <p class="text-danger">{{$article->author()->name}}</p>
            @endforeach
        @endif
    </div>
</div>
@endsection
