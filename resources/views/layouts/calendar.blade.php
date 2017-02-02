@extends('layouts.app')
@section('header') Calendar @endsection
    @section('content')
        @if(isset($date))
            <div class="container wrapper">
                @for($i = 1; $i <= $date->daysInMonth; $i++)

                    <div class="col-md-1">
                    {{$i}}
                    </div>
                @endfor
            </div>
        @endif


    @endsection