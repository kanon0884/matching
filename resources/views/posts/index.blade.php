<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>新歓イベント編集画面</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>新歓イベント一覧</h1>
        <div class='events'>
            @foreach ($events as $event)
            <div class='event'>
                <h2 class='title'>
                    <a href='/posts/{{ $event->id }}/edit'>{{ $event->title }}</a>
                </h2>
                <p class='datetime'>{{ $schedule->datetime }}</p>
                <p class='place'>{{ $event->place }}</p>
                <p class='detail'>{{ $event->detail }}</p>
                <form action="/posts/{{ $event->id }}" id="form_{{ $event->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="button" onclick="deleteEvent({{ $event->id }})">delete</button> 
                </form>
            </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $events->links() }}
        </div>
    <script>
        function deleteEvent(id) {
            'use strict'
    
            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById(`form_${id}`).submit();
            }
        }
    </script>
    </body>
</html>