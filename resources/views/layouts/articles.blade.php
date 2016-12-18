@extends('layouts.app')

@section('title'){{$articles->title}} @endsection

@section('content')
<section class="container" >
        <div class="row text-center">
            <h1>{{$articles->title}}</h1>
            <p class="lead">{{$articles->description}}</p>
        </div>
    <div class="col-md-10">
        <p class="col-md-12">{{$articles->text}}</p>
        @foreach($articles->getCategories() as $category)
            <p class="text-info col-md-1">{{$category->title}}</p>
        @endforeach
    </div>
@endsection
    </section>

