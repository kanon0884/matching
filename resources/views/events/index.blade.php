<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>新歓イベント一覧</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>新歓イベント一覧</h1>
        <div class='events'>
            @foreach ($events as $event)
            <div class='event'>
                <h2 class='title'>{{ $event->title }}</h2>
                <p class='place'>{{ $event->place }}</p>
                <p class='detail'>{{ $event->detail }}</p>
            </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $events->links() }}
        </div>
    </body>
</html>