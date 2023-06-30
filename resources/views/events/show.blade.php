<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Events</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <img src={{ $club->image }}>
        <h1 class="name">
        {{ $club->name }} ({{ $genre->name }})
        </h1>
        <p>
        活動内容{{ $club->activity }}
        </p>
        
        <div class="content">
        <h3 class="event">
            新歓イベント情報
        </h3>
        <p>
            {{ $event->title }}
            日時：{{ $schedule->datetime }}
            場所：{{ $event->place }}
            詳細：{{ $event->detail }}
        </p>
        
        <div class="favorite">
            <form action="/favorite" method="POST">
            @csrf
            <input type="submit" value="気になる！"/>
        </div>
        
        <div class="other_events">
        <h3>その他の新歓イベントはこちら！</h3>
        <p>
            @foreach ($events as $event)
            ・{{ $event->schedule->datetime }}　{{ $event->title }}
            @endforeach
        </p>
        </div>
        <div class="footer">
            <a href="/events">戻る</a>
        </div>
    </body>
</html>