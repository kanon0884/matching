<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>サークル情報登録</title>
    </head>
    <body>
        <h1>サークル情報登録</h1>
        <form action="/clubs" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="name">
                <h2>サークル名</h2>
                <input type="text" name="club[name]" value="{{ old('club.name')}}"/>
                <p class='name_error' style="color:red">{{ $errors->first('club.name') }}</p>
            </div>
            <div class="genre">
                <h2>系統</h2>
                <select name="club[genre_id]">
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
                <p class='name_error' style="color:red">{{ $errors->first('genre.name') }}</p>
            </div>
            <div class="activity">
                <h2>活動内容</h2>
                <input type="text" name="club[activity]" value="{{ old('club.activity') }}"/>
                <p class='activity_error' style="color:red">{{ $errors->first('club.activity') }}</p>
            </div>
            <div class="image">
                <h2>写真</h2>
                <input type="file" name="image">
            </div>
            <input type="submit" value="登録"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>