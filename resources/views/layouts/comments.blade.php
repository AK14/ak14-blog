@extends('layouts.app')
@section('header')Задачи @endsection

@section('content')
<div id="my_comment">
    <article >
        <p> @{{ user }} -- @{{ date }}</p>
        <div class="body">@{{ text }}</div>
    </article>

    <tasks :list="tasks"></tasks>

    {{--<pre>@{{$data | json }}</pre>--}}

</div >

<template id="tasks-template">
    <h1>My tasks (@{{list.length}})</h1>

    <ul>
        <li :class="{ 'completed':task.completed }"
            v-for="task in list"
        @click="task.completed = ! task.completed;"
        >
        @{{ task.body }}
        </li>
    </ul>
</template>
@endsection

{{-- Подключение скрипта для комментариев--}}
<script type="text/javascript" src="/js/app.js"> </script>

</body>
</html>

