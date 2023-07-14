<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>サークル情報編集</title>
    </head>
    <body>
        <h1>サークル情報編集</h1>
        <form action="/club/{{ $club->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="content_name">
                <h2>サークル名</h2>
                <input type="text" name="club[name]" value="{{ $club->name }}">
            </div>
            <div class="content_genre">
                <h2>系統</h2>
                <select name="club[genre_id]">
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
                <p class='name_error' style="color:red">{{ $errors->first('genre.name') }}</p>
            </div>
            <div class="content_activity">
                <h2>活動内容</h2>
                <input type="text" name="club[activity]" value="{{ $club->activity }}">
            </div>
            <div class="image">
                <h2>写真</h2>
                <input type="file" name="image" value="{{ $club->image_url }}">
            </div>
            <input type="submit" value="編集完了"/>
        </form>
        <div class="footer">
            <a href="/club/{club}">戻る</a>
        </div>
    </body>
</html>