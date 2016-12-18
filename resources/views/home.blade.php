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
                     {{$article->getCategories()->first()->title}}
                    @endif
                    {{$article->comments()->count()}}
                    </p>
                </a>
            @endforeach
        @endif
    </section>

    <aside class="col-md-3" id="right_bar">
    {{-- выводим список категорий --}}
    @include('partials/right_bar')
    </aside>
</div>
@endsection
