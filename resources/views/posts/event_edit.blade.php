<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>新歓イベント編集</title>
    </head>
    <body>
        <h1>新歓イベント編集</h1>
        <form action="/events/{{ $event->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="title">
                <h2>見出し</h2>
                <input type="text" name="event[title]" value="{{ $event->title }}"/>
                <p class='title_error' style="color:red">{{ $errors->first('event.title') }}</p>
            </div>
            <div class="place">
                <h2>場所</h2>
                <input type="text" name="event[place]" value="{{ $event->place }}"/>
                <p class='place_error' style="color:red">{{ $errors->first('event.place') }}</p>
            </div>
            <div class="datetime">
                <h2>日時</h2>
                <input type="text" name="evevt[schedule]" value="{{ $event->schedule }}"/>
                <p class='schedule_error' style="color:red">{{ $errors->first('event.schedule') }}</p>
            </div>
            <div class="detail">
                <h2>内容</h2>
                <textarea name="event[detail]" value="{{ $event->detail }}"></textarea>
                <p class='detail_error' style="color:red">{{ $errors->first('event.detail') }}</p>
            </div>
            
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/posts">戻る</a>
        </div>
    </body>
</html>