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
        <div class="club_create">
            <h3><a href="/club/create">サークル情報登録</a></h3>
        </div>
        <div class="club">
            <h3><a href="/club/{{ $club->id }}">サークル情報管理</a></h3>
        </div>
        <div>
            <h3><a href="/events/search">イベントをさがす</a></h3>
        </div>
        <div>
            <h3><a href="/events/{{ $user->id }}/favorites">お気に入りイベント</a></h3>
        </div>
    </body>
</html>