<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>イベントを探す</title>
    </head>
    <body>
        <h1>イベントを探す</h1>
        <form action="/event/search" method='GET'>
            @csrf
            <div class="name">
                <h2>サークル名</h2>
                <input type="search" name="club[name]"/>
            </div>
            <div class="genre">
                <h2>系統</h2>
                <select name="club[genre_id]">
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="schedule">
                <h2>イベント日時</h2>
                <input type="search" name="event[schedule_id]"/>
            </div>
            <input type="submit" value="検索"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>