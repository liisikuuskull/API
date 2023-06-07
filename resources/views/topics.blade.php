<!DOCTYPE html>
<html>
<head>
    <title>Topics</title>
    <style>
        h1 {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Topics</h1>

    <ul>
        @foreach ($topics as $topic)
            <li>
                <h2>{{ $topic['title'] }}</h2>
                <p>{{ $topic['description'] }}</p>
                @if (isset($topic['image_path']))
                    <img src="{{ asset('storage/' . $topic['image_path']) }}" alt="Image">
                @endif
            </li>
        @endforeach
    </ul>
</body>
</html>


