@extends('layouts.app')

@section('content')
    Календарь тренировок
    {!! $calendar->calendar() !!}
    {!! $calendar->script() !!}



@endsection