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
        <h1 class="name">
            サークル名（系統）
        </h1>
        <p>
            活動内容
        </p>
        <div class="content">
            <div class="content__post">
                <h3 class="event">
                    新歓イベント情報
                </h3>
                <p>
                    {{ $event->title }}
                    日時{{ $schedule->datetime }}
                    場所{{ $event->place }}
                    詳細{{ $event->detail }}
                </p>
                <h3>その他の新歓イベントはこちら！</h3>
                <p>
                    {{ $schedule->datetime }}　
                    {{ $event->title }}</p>    
            </div>
        </div>
        <div class="footer">
            <a href="/events">戻る</a>
        </div>
    </body>
</html>