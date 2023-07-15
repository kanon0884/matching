<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>新歓イベント登録</title>
    </head>
    <body>
        <h1>新歓イベント登録</h1>
        <form action="/events" method="POST">
            @csrf
            <div class="title">
                <h2>見出し</h2>
                <input type="text" name="event[title]" placeholder="説明会" value="{{ old('event.title')}}"/>
                <p class='title_error' style="color:red">{{ $errors->first('event.title') }}</p>
            </div>
            <div class="place">
                <h2>場所</h2>
                <input type="text" name="event[place]" value="{{ old('event.place') }}"/>
                <p class='place_error' style="color:red">{{ $errors->first('event.place') }}</p>
            </div>
            <div class="datetime">
                <h2>日時</h2>
                <input type="text" name="schedule[datetime]" value="{{ old('schedule.datetime') }}"/>
                <p class='datetime_error' style="color:red">{{ $errors->first('schedule.datetime') }}</p>
            </div>
            <div class="detail">
                <h2>内容</h2>
                <textarea name="event[detail]" placeholder="部員がサークルの活動内容をお話しします！" value="{{ old('event.detail') }}"></textarea>
                <p class='place_error' style="color:red">{{ $errors->first('event.place') }}</p>
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/posts">戻る</a>
        </div>
    </body>
</html>