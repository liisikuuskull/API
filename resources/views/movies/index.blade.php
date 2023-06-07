<!DOCTYPE html>
<html>
<head>
    <title>Top 10 Films</title>
    <style>
        .movie {
            display: inline-block;
            width: 200px;
            margin: 10px;
        }
        .movie img {
            width: 100%;
            height: auto;
        }

        h1 {
            text-decoration: underline;
        }

        h2 {
            background-color: #66FFFF ;
        }
    </style>
</head>
<body>
    <h1>Top 10 Films</h1>
    <div class="row">
        @foreach ($movies as $movie)
            <div class="movie">
                <img src="{{ $movie['Poster'] }}" alt="{{ $movie['Title'] }} Poster">
                <h2>{{ $movie['Title'] }}</h2>
                <p>Year: {{ $movie['Year'] }}</p>
                @if (isset($movie['Plot']))
                    <p>Plot: {{ $movie['Plot'] }}</p>
                @endif
                @if (isset($movie['Response']))
                    <p>Response: {{ $movie['Response'] }}</p>
                @endif
            </div>
        @endforeach
    </div>
</body>
</html>

