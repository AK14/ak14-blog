<html>
<head>
    <meta charset="UTF-8">
<title>book</title>
</head>

<body class="container">
{{dd($categories )}}
<div id="comm">
    <article v-repeat="comments" >
        <h3>@{{ date }}</h3>
        <div class="body">@{{ text }}</div>
    </article>
    <pre>@{{data | json }}</pre>

</div >

<div id="app">
    <example></example>
</div>

{{-- Подключение скрипта для комментариев--}}
<script type="text/javascript" src="/js/app.js"> </script>
<script type="text/javascript" src="/js/comments.js"> </script>

</body>
</html>

