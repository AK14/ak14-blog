@extends('layouts.app')

@section('content')
<div class="container">
    <header class="page-header">
       <h1>Hello World</h1>
        I am Alexander Konopatsky. I'm 30 yeas old
    </header>
    <section class="list-group col-md-8 col-md-offset-1" id="articles">
        @if(isset($articles))
            <h2>Последние записи на моем блоге</h2>
            @foreach($articles as $article)
                <a href="articles/{{$article->id}}" class="list-group-item">
                <h3 class="list-group-item-heading">{{$article->title}}</h3>
                <p class="list-group-item-text">{{$article->description}}</p>
                <p class="text-info">{{$article->author()->name}}
                    в категории:
                    @if(count($article->getCategories()) > 1)
                        @foreach($article->getCategories() as $cat)
                        {{$cat->title}}
                        @endforeach
                    @else
                     {{$article->getCategories()->first()->title}} </p>
                    @endif
                    {{$article->comments()->count()}}
                </a>
            @endforeach
        @endif
    </section>

 Нужно вынестиэтот код в оттдельный, подключаемый файл--}}
    <aside class="col-md-3">
        <h3>Категории</h3>
        <div class="list-group">
        @foreach($categories as $cat)
            <a href="categories/{{$cat->id}}" class="list-group-item">
            <h4 class="list-group-item-heading text-right">{{$cat->title}}</h4>
            </a>
        @endforeach
        </div>
    </aside>

</div>
@endsection
