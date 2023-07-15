<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>お気に入り新歓イベント一覧</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>お気に入り新歓イベント一覧</h1>
        <div class='events'>
            @foreach ($events as $event)
            <div class='club'>
                <h2 class='name'>
                    <p class='name'>{{ $club->name }}</p>
                    <p class='genre'>({{ $genre->name }})</p>
                </h2>
            <div class='event'>
                <h2 class='title'>
                    <a href='/events/{{ $event->id }}'>{{ $event->title }}</a>
                </h2>
                <p class='place'>{{ $event->place }}</p>
                <p class='datetime'>{{ $schedule->datetime }}</p>
                <p class='detail'>{{ $event->detail }}</p>
            </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $events->links() }}
        </div>
    </body>
</html>