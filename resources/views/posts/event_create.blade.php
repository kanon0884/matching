<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>新歓イベント登録</title>
    </head>
    <body>
        <h1>新歓イベント登録</h1>
        <form action="/events/{{ $club->id }}" method="POST">
            @csrf
            <div class="title">
                <h2>見出し</h2>
                <input type="text" name="event[title]" placeholder="例）説明会" value="{{ old('event.title')}}"/>
                <p class='title_error' style="color:red">{{ $errors->first('event.title') }}</p>
            </div>
            <div class="place">
                <h2>場所</h2>
                <input type="text" name="event[place]" placeholder="例）集会所" value="{{ old('event.place') }}"/>
                <p class='place_error' style="color:red">{{ $errors->first('event.place') }}</p>
            </div>
            <div class="datetime">
                <h2>日時</h2>
                <input type="text" name="event[schedule]" placeholder="例）2023-04-01 18:30:00"value="{{ old('event.schedule') }}"/>
                <p class='schedule_error' style="color:red">{{ $errors->first('event.schedule') }}</p>
            </div>
            <div class="detail">
                <h2>内容</h2>
                <textarea name="event[detail]" placeholder="例）部員がサークルの活動内容をお話しします！" value="{{ old('event.detail') }}"></textarea>
                <p class='detail_error' style="color:red">{{ $errors->first('event.detail') }}</p>
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>