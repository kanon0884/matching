<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>イベントを探す</title>
    </head>
    <body>
        <h1>イベントを探す</h1>
        <form action="/events/search" method='GET'>
            @csrf
            <div class="name">
                <h2>サークル名</h2>
                <input type="text" name="keyword" value="{{ $keyword }}"/>
            </div>
            <div class="genre">
                <h2>系統</h2>
                <select name="genre" data-toggle="select">
                    <option value="">全て</option>
                    @foreach($genre_list as $genre)
                        <option value="{{ $genre->name }}" @if($genre=='{{ $genre->name }}')selected @endif>{{ $genre->name }}</option>
                    @endforeach
                </select>
            </div>
            {{--<div class="schedule">
                <h2>イベント日時</h2>
                <input type="search" name="event[schedule_id]"/>
            </div>--}}
            <div>
                <input type="submit" class="btn" value="検索"/>
            </div>
        </form>
        <table>
            <tr>
                <th>イベント名</th>
            </tr>
            @if(!empty($clubs))
                @foreach($clubs as $club)
                <tr>
                    @foreach($club->events as $event)
                        <td>{{ $club->name }}</td>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->schedule }}</td>
                        <td>{{ $event->place }}</td>
                        <td>{{ $event->detail }}</td>
                    @endforeach
                </tr>
                @endforeach
            @endif
           {{-- @if(!empty($genres))
                @foreach($genres as $genre)
                <tr>
                    @foreach($genre->clubs->events as $event)
                        {{--<td>{{ $club->name }}</td>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->schedule }}</td>
                        <td>{{ $event->place }}</td>
                        <td>{{ $event->detail }}</td>
                    @endforeach
                </tr>
                @endforeach
                <p>検索結果なし</p>
            @endif---}}
            
        </table>

       
            
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>