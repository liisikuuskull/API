<!DOCTYPE html>
<html>
<head>
    <title>Ankeet</title>
    <style>
        .container {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .row {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .row label {
            width: 100px;
        }

        .row input,
        .row textarea {
            flex-grow: 1;
            max-width: 300px; /* Vähendage seda väärtust vastavalt soovile */
        }

        .submit-row {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .submit-row:hover button {
            background-color: greenyellow;
        }
    </style>
</head>
<body>
    <h1>Loo uus ankeet</h1>

    <form method="POST" action="{{ route('topics.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="container">
            <div class="row">
                <label for="title">Pealkiri:</label>
                <input type="text" name="title" id="title">
            </div>
            <div class="row">
                <label for="description">Kirjeldus:</label>
                <textarea name="description" id="description"></textarea>
            </div>
            <div class="row">
                <label for="image">Pilt:</label>
                <input type="file" name="image" id="image">
            </div>
            <div class="row">
                <label for="topic1">Teema 1:</label>
                <input type="text" name="topic1" id="topic1">
            </div>
            <div class="row">
                <label for="topic2">Teema 2:</label>
                <input type="text" name="topic2" id="topic2">
            </div>
            <div class="submit-row">
                <button type="submit">Salvesta ankeet</button>
            </div>
        </div>
    </form>
</body>
</html>
