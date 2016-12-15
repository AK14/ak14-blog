@extends('layouts.app')

@section('title'){{$articles->title}} @endsection

@section('content')
    <h1>{{$articles->title}}</h1>
    @foreach($articles->getCategories() as $category)
        {{$category->title}}<br>
    @endforeach

@endsection