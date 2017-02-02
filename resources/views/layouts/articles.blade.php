@extends('layouts.app')

@section('title'){{$articles->title}} @endsection

@section('content')
    <div class=" container wrapper">
        <div class="row text-center">
            <h1>{{$articles->title}}</h1>
            <p class="lead">{{$articles->description}}</p>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <p class="col-md-12">{{$articles->text}}</p>

            @foreach($articles->getCategories() as $category)

                <span class="label label-default">
               {{$category->title}}
                </span>
                &nbsp
            @endforeach

        </div>
        {{-- Блок комментариев --}}
        <div class="col-md-8 col-md-offset-3 articles_comments">
            <h5>Комментарии</h5>
            @foreach($articles->paginate_Comments() as $comment)
               <div class="comment text-right">
                   {{$comment->text}}<br>
                   <p class="text_info">{{$comment->getAuthor->name}}<br>
                   {{ $comment->date}}
                   </p>
               </div>
            @endforeach

            <div class="text-center">
                {{$articles->paginate_Comments()->links()}}
            </div>
            <hr>
                <form method="POST" action="/articles/{{$articles->id}}/comments">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <textarea name="text" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit"> Send </button>
                    </div>
                </form>
        </div>
    </div>
@endsection


