<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>新歓イベント編集画面</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class='club'>
            <h1>サークル情報確認</h1>
            <p>サークル名：{{ $club->name }}</p>
            <p>系統：{{ $club->genre->name }}</p>
            <p>活動内容：{{ $club->activity }}</p>
            <p>写真：{{ $club->image }}</p>
                <a href="/club/{{ $club->id }}/edit">サークル情報の編集</a>
        </div>
        <div class='events'>
            <h2 class='create'>
                <a href="/event/create">新歓イベントの登録へ</a>
            </h2>
            <h2 class='title'>新歓イベント一覧</h2>
            @foreach ($events as $event)
            <div class='event'>
                <h2 class='title'>
                    <a href="/club/{{ $club->id }}/{{ $event->id }}/edit">{{ $event->title }}</a>
                </h2>
                <p class='datetime'>{{ $event->schedule_id }}</p>
                <p class='place'>{{ $event->place }}</p>
                <p class='detail'>{{ $event->detail }}</p>
                <form action="/club/{{ $club->id }}" id="form_{{ $event->id }}" method="post">
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